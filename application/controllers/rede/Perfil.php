<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Perfil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('nivel_rede') == '') {
      redirect('rede/login');
    }
  }

  public function index($erros = 0)
  {
    $id = $this->session->userdata('id');
    $data['aluno'] = $this->model->selecionaBusca('aluno', "WHERE id='{$id}' ");

    if (!$data['aluno']) gera_aviso('erro', 'Aluno não encontrado', 'rede/index');
    $data['estados'] = $this->model->selecionaBusca('estados', "");
    $data['cidades'] = $this->model->selecionaBusca('cidades', "");
    $data['title'] = 'Meu Perfil';
    $data['subTitle'] = 'Atualizar Dados';
    $data['cat'] = $this->db->get('servicos_categoria')->result_array();
    $data['erros'] = $erros;
    $this->load->view('rede/perfil', $data);
  }

  //INSERE O DOCUMENTO DO ALUNO
  private function insereDocumento($cpf_aluno)
  {
    $rootPath = getRootDocumentos($cpf_aluno);

    $documentos = $this->input->post('documentos');

    return uploadByBase64($rootPath, $documentos);
  }

  public function update()
  {
    $id = $this->session->userdata('id');
    $data = returnArray('aluno');

    if (empty($data)) {
      gera_aviso('erro', 'Dados inválidos', 'rede/perfil');
    }

    if (!loginValidator($data['login'])) {
      gera_aviso('erro', 'O login não pode ter espaços em branco nem caracteres especiais.', 'rede/perfil');
    }

    $args = [
      [
        'row' => 'login',
        'op' => '=',
        'value' => $data['login']
      ],
      [
        'row' => 'id',
        'op' => '!=',
        'value' => $id
      ]
    ];

    $args2 = [
      [
        'row' => 'cpf',
        'op' => '=',
        'value' => $data['cpf']
      ],
      [
        'row' => 'id',
        'op' => '!=',
        'value' => $id
      ]
    ];

    if (!checa_ja_cadastrado_multiple($args) && !checa_ja_cadastrado_multiple($args2)) {
      gera_aviso('erro', 'Login, CPF já cadastrados em outro usuário!', 'rede/perfil');
    }

    if ($this->model->update('aluno', $data, $id)) {

      $documento = $this->model->selecionaBusca('documento_termos', "WHERE id_aluno = '{$id}' ");
      if (!$documento) {
        $docPass = $this->insereDocumento($data['cpf']);
        if ($docPass) {
          $this->model->insere('documento_termos', [
            'id_aluno'      => $id,
            'root'          => $docPass['full_path'],
            'arquivo'       => $docPass['file_name']
          ]);
        }
      }

      $alunoNv = $this->model->setTable('aluno')->get($id);
      $this->session->set_userdata($alunoNv[0]);
      gera_aviso('success', 'Perfil atualizado com sucesso!', 'rede/perfil');
    }

    gera_aviso('erro', 'Falha ao atualizar o perfil, tente novamente!', 'rede/perfil');
  }

  public function minhas_credenciais()
  {
    $data['title'] = 'Minhas Credenciais';
    $data['subTitle'] = 'Credenciais SPL';
    $data['cat'] = $this->db->get('servicos_categoria')->result_array();

    $this->load->view('rede/minhas_credenciais', $data);
  }
}
