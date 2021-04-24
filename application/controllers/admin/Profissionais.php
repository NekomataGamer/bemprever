<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Profissionais extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('nivel_adm') != 1) {
      redirect('admin/login');
    } else if (!buscaPermissao('servico')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
    }
  }

  protected $table = "profissionais";
  protected $label = "serviço";
  protected $sChar = 'o'; //define o sexo do item da tabela ex: "o" professor para tabela professor, ou "a" professora para tabela professora
  protected $errRedirect = 'admin/profissionais'; //redirecionamento em caso de erro
  protected $successRedirect = 'admin/profissionais'; //redirectionamento em caso de sucesso

  public function index(){
    $profissionais = $this->db->get('profissionais')->result_array();
    
    
    $this->load->view('admin/profissionais/listar', [
        'profissionais'=>$profissionais,
        
    ]);
  }

  public function cadastrar(){
    if (!buscaPermissao('servico', 'cadastro')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $cat = $this->db->get('servicos_categoria')->result_array();
    $this->load->view('admin/profissionais/cadastrar', [
        'cat' => $cat,
    ]);
  }

  public function editar($id){
    if (!buscaPermissao('servico', 'editar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $fornecedores = $this->model->setTable('fornecedores')->all();
    $servico = $this->model->setTable($this->table)->get($id);

    if (!$servico) gera_aviso('erro', ucfirst($this->label).' não encontrado.', $this->errRedirect);

    $this->load->view('admin/editar_servico', [
        'fornecedores' => $fornecedores,
        'servico' => $servico
    ]);
  }

  public function insere()
  {
      $toDb = array(
            'nome_fant'  =>  $_POST['nome_fant'], 
            'raz_soc'  =>  $_POST['raz_soc'], 
            'cnpj'  =>  $_POST['cnpj'], 
            'cep'  =>  $_POST['cep'], 
            'uf'  =>  $_POST['uf'], 
            'endereco'  =>  $_POST['endereco'], 
            'id_categoria'  =>  $_POST['id_categoria'], 
            'map'  =>  $_POST['map'], 
        );
    if (!buscaPermissao('servico', 'cadastro')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    // $update = returnArray($this->table);

    if ($this->model->insere($this->table, $toDb)){
        gera_aviso('sucesso', ucfirst($this->label).' cadastrad'.$this->sChar.' com sucesso.', $this->successRedirect);
    }
    gera_aviso('erro', 'Falha ao cadastrar '.$this->sChar.' '.$this->label.', tente novamente.', $this->errRedirect);
  }
  
  public function update($id)
  {
    if (!buscaPermissao('servico', 'editar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $checker =  $this->model->selecionaBusca($this->table, "WHERE id='{$id}' ");
    if (isset($checker[0]['id'])){
        $update = returnArray($this->table);

        if ($this->model->update($this->table, $update, $checker[0]['id'])){
            gera_aviso('sucesso', ucfirst($this->label).' atualizad'.$this->sChar.' com sucesso.', $this->successRedirect);
        }
    }
    gera_aviso('erro', 'Falha ao atualizar '.$this->sChar.' '.$this->label.', tente novamente.', $this->errRedirect);
  }

  public function remove($id)
  {
      
      if ($this->model->remove('servicos_categoria', $id)){
            gera_aviso('sucesso', ucfirst($this->label).' removid'.$this->sChar.' com sucesso.', $this->successRedirect);
        }
      
    // if (!buscaPermissao('servico', 'remover')) {
    //   gera_aviso('erro', 'Ação não permitida!', 'admin/index');
    //   exit;
    // }
    // $checker =  $this->model->selecionaBusca($this->table, "WHERE id='{$id}' ");
    // if (isset($checker[0]['id'])){
        
    // }
    // gera_aviso('erro', 'Falha ao remover '.$this->sChar.' '.$this->label.', tente novamente.', $this->errRedirect);
  }
}
