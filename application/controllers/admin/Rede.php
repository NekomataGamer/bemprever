<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Rede extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if ($this->session->userdata('nivel_adm') != 1) {
      redirect('admin/login');
    } else if (!buscaPermissao('rede', 'visualizar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
    }
    $this->load->model('Redes_model', 'modelo');
  }

  public function ativar($id)
  {
    if (!buscaPermissao('rede', 'administrar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $check = $this->modelo->selecionaBusca('aluno', "WHERE id='{$id}' ");

    if (!$check) gera_aviso('erro', 'Aluno não encontrado', 'admin/rede/unilevel');

    $nvarr = ['ativo' => 1];

    $this->model->update('aluno', $nvarr, $id);

    gera_aviso('erro', 'Aluno ativado com sucesso!', 'admin/rede/unilevel');
  }

  public function desativar($id)
  {
    if (!buscaPermissao('rede', 'administrar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $check = $this->modelo->selecionaBusca('aluno', "WHERE id='{$id}' ");

    if (!$check) gera_aviso('erro', 'Aluno não encontrado', 'admin/rede/unilevel');

    $nvarr = ['ativo' => 0];

    $this->model->update('aluno', $nvarr, $id);

    gera_aviso('erro', 'Aluno desativado com sucesso!', 'admin/rede/unilevel');
  }

  public function configuracoes()
  {
    if (!buscaPermissao('rede', 'configurar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $data['indice'] = $this->input->get('indice');
    $data['indice'] = $data['indice'] != '' ? $data['indice'] : 'geral';
    $data['configuracoes'] = $this->modelo->selecionaBusca('configuracoes', " ORDER BY ID LIMIT 1");
    $data['fidelidade'] = $this->modelo->selecionaBusca('ganho_residual', " ORDER BY ID LIMIT 1");
    $data['carreira'] = $this->modelo->selecionaBusca('plano_carreira', "");
    $data['regras_carreira'] = $this->modelo->selecionaBusca('regras_carreira', "");
    $data['regras_fidelidade'] = $this->modelo->selecionaBusca('regras_fidelidade', "");

    $this->load->view('admin/rede/configuracoes', $data);
  }

  public function update()
  {
    if (!buscaPermissao('rede', 'configurar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $updater = [
      'max_inativo' => $this->input->post('max_inativo', true),
      'timer_residual' => $this->input->post('timer_residual', true),
      'tipo_residual' => $this->input->post('tipo_residual', true),
      'dia_residual' => $this->input->post('dia_residual', true),
      'tipo_carreira' => $this->input->post('tipo_carreira', true),
      'dia_carreira' => $this->input->post('dia_carreira', true),
      'timer_carreira' => $this->input->post('timer_carreira', true),
      'taxa_saque' => $this->input->post('taxa_saque', true),
    ];
    $checker =  $this->modelo->selecionaBusca('configuracoes', " ORDER BY ID LIMIT 1");
    if (isset($checker[0]['id'])) {
      if ($this->modelo->update('configuracoes', $updater, $checker[0]['id'])) {
        gera_aviso('sucesso', 'Configurações da rede atualizadas com sucesso.', 'admin/rede/configuracoes');
      }
    } else {
      if ($this->modelo->insere('configuracoes', $updater)) {
        gera_aviso('sucesso', 'Configurações da rede atualizadas com sucesso.', 'admin/rede/configuracoes');
      }
    }
    gera_aviso('erro', 'Falha ao atualizar as configurações da rede.', 'admin/rede/configuracoes');
  }

  public function planos()
  {
    if (!buscaPermissao('rede', 'visualizar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $data['planos'] = $this->modelo->selecionaBusca('plano_rede', "");
    $data['servicos'] = $this->model->selecionaBusca('servico', "");
    foreach ($data['servicos'] as &$s) {
      $fornecedor = $this->model->selecionaBusca('fornecedor', "WHERE id='{$s['id_fornecedor']}' ");
      $s['fornecedor'] = $fornecedor[0] ?? [];
    }
    $this->load->view('admin/rede/planos', $data);
  }

  public function listar_usuarios()
  {
    if (!buscaPermissao('rede', 'visualizar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $data['tables'] = true;
    $data['usuarios'] = $this->modelo->getUsuarios();

    $this->load->view('admin/rede/listar_usuarios', $data);
  }

  public function confirmar_cadastros()
  {
    if (!buscaPermissao('rede', 'administrar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $data['tables'] = true;
    $data['usuarios'] = $this->modelo->getCadastrosPendentes();

    $this->load->view('admin/rede/confirmar_usuarios', $data);
  }

  public function ativar_usuarios()
  {
    if (!buscaPermissao('rede', 'administrar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $data['tables'] = true;
    $data['usuarios'] = $this->modelo->selecionaBusca('aluno_espera', "");

    $this->load->view('admin/rede/ativar_usuarios', $data);
  }

  protected function addGanhoIndicacao($valor, $enviado)
  {
    $indicador = $enviado[0]['id_indicador'];
    $configurer = $this->model->selecionaBusca('configuracoes', " LIMIT 1");
    if ($configurer) {
      $pctGanhoIndicacao = $configurer[0]['ganho_indicacao'];
      $valorIndicacao = $valor * $pctGanhoIndicacao / 100;

      $planoUser = $this->model->selecionaBusca('assinaturas_rede', "WHERE id_aluno='{$indicador}' AND status='ativo' ");

      $aluno = $this->model->selecionaBusca('aluno', "WHERE id='{$indicador}' AND bloqueado='0' ");

      if (!$planoUser || !$aluno) return false; #usuário não tem plano ou está bloqueado! Não recebe indicação

      return addSaldo($indicador, $valorIndicacao, $planoUser[0]['id'], 'indicacao');
    }
  }

  //TRANSFORMA O CADASTRO TEMPORÁRIO DE ALUNO EM PERMANENTE CASO O PAGAMENTO TENHA SIDO EFETUADO COM SUCESSO.
  protected function cadastrarAluno($id, $sobeGanho = true)
  {
    $dados = $this->model->selecionaBusca('aluno_espera', "WHERE `id`='{$id}' ");
    if (!$dados) return false;

    $documento = $this->model->selecionaBusca('documento_termos', "WHERE `id_aluno_pre`='{$id}' ");

    $arr = $dados[0];
    unset($arr['gerou_pagamento']);
    unset($arr['id']);
    $id_niveis = buscarNivelNovo($arr['id_indicador']);
    $plano = $this->model->selecionaBusca('plano_rede', "WHERE id='{$arr['id_plano']}' ");
    unset($arr['id_plano']);
    $arr['tipo'] = 'rede';

    if (!$plano) return false;
    if (!$id_niveis) return false;

    $arr['id_niveis'] = $id_niveis;
    $arr['cadastro_confirmado'] = 1;

    $idusuario = $this->model->insere_id('aluno', $arr);
    if ($idusuario) {
      if (isset($documento[0]['id'])) {
        $updateDocumento = [
          'id_aluno_pre'  => null,
          'id_aluno'      => $idusuario
        ];
        $this->model->update('documento_termos', $updateDocumento, $documento[0]['id']);
      }

      $this->model->insere('assinaturas_rede', [
        'id_aluno' => $idusuario,
        'id_plano' => $plano[0]['id'],
        'valor' => $plano[0]['valor'],
        'pago' => $plano[0]['valor'],
        'recebido' => 0,
        'status' => 'ativo',
        'data_pagamento_inicial' => date('Y-m-d H:i:s')
      ]);
      if ($sobeGanho) $this->addGanhoIndicacao($plano[0]['valor'], $dados);
      return $this->model->remove('aluno_espera', $dados[0]['id']);
    }
    return false;
  }

  //REMOVE ALUNO DA LISTA DE ESPERA

  protected function removeAlunoEspera($id)
  {

    return $this->model->remove('aluno_espera', $id);
  }

  public function desativar_rede($id)
  {
    if (!buscaPermissao('rede', 'administrar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    if ($this->removeAlunoEspera($id)) {
      gera_aviso('success', 'Usuário removido na rede com sucesso', 'admin/rede/ativar_usuarios');
    }


    gera_aviso('erro', 'Usuário não encontrado', 'admin/rede/ativar_usuarios');
  }

  public function ativar_rede($id, $tipo = 0)
  {
    if (!buscaPermissao('rede', 'administrar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }

    $sobeGanhos = ($tipo === 0) ? true : false;
    if ($this->cadastrarAluno($id, $sobeGanhos)) {
      gera_aviso('success', 'Usuário ativado na rede com sucesso', 'admin/rede/ativar_usuarios');
    }


    gera_aviso('erro', 'Usuário não encontrado', 'admin/rede/ativar_usuarios');
  }

  public function confirmar_cadastro($id)
  {
    if (!buscaPermissao('rede', 'administrar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }

    $dados = $this->model->selecionaBusca('aluno', "WHERE `id`='{$id}' ");
    if (!$dados) {
      gera_aviso('erro', 'Usuário não encontrado!', 'admin/index');
      redirect('admin/rede/confirmar_cadastros');
      exit;
    }

    $updater = [
      'cadastro_confirmado' => 1
    ];

    $this->model->update('aluno', $updater, $id);

    gera_aviso('success', 'Cadastro do usuário confirmado com sucesso', 'admin/rede/confirmar_cadastros');
  }

  public function nao_confirmar_cadastro($id)
  {
    if (!buscaPermissao('rede', 'administrar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }

    $dados = $this->model->selecionaBusca('aluno', "WHERE `id`='{$id}' ");
    if (!$dados) {
      gera_aviso('erro', 'Usuário não encontrado!', 'admin/index');
      redirect('admin/rede/confirmar_cadastros');
      exit;
    }

    $documento = $this->model->selecionaBusca('documento_termos', "WHERE `id_aluno`='{$id}' ");

    if (isset($documento[0]['id'])) {
      removeDocumento($documento[0]['id']);
    }

    gera_aviso('success', 'Remoção dos documentos do usuário efetuada com sucesso, novos documentos serão solicitados.', 'admin/rede/confirmar_cadastros');
  }


  public function unilevel($nivel = 1, $user = 1)
  {
    if (!buscaPermissao('rede', 'visualizar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $data['tables'] = true;
    if ($nivel != 1) {
      $search = $nivel - 1;
      $data['unilevel'] = searchActivesByLevel($user, $search);
    } else {
      $data['unilevel'] = $this->model->selecionaBusca('aluno', "WHERE id='1' ");
    }
    $data['selected'] = $nivel;
    $this->load->view('admin/rede/unilevel', $data);
  }

  public function unilevel_usuario($nivel = 1, $user = 1)
  {
    if (!buscaPermissao('rede', 'visualizar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    $data['tables'] = true;
    $data['unilevel'] = searchActivesByLevel($user, $nivel);
    $data['selected'] = $nivel;
    $data['user'] = $user;
    $this->load->view('admin/rede/unilevel', $data);
  }

  public function visualizar($idNetwork = '')
  {
    if (!buscaPermissao('rede', 'visualizar')) {
      gera_aviso('erro', 'Ação não permitida!', 'admin/index');
      exit;
    }
    if ($idNetwork === '') {
      $idNetwork = '1';
    }

    if (!startsWith($idNetwork, '1')) {
      gera_aviso('erro', 'Usuário não encontrado.', 'admin/rede/visualizar'); //caso o usuário não pertença a rede do atual.
    }

    $user = $this->model->selecionaBusca('aluno', "WHERE id_niveis='{$idNetwork}' ");

    if (!$user) {
      gera_aviso('erro', 'Usuário não encontrado.', 'admin/rede/visualizar'); //usuário não encontrado
    }

    $data['user'] = $user[0];

    $nivel1 = searchActivesByLevel($user[0]['id'], 1); //primeiro nível do usuário
    $nivel2 = searchActivesByLevel($user[0]['id'], 2); //segundo nível do usuário
    $nivel3 = searchActivesByLevel($user[0]['id'], 3); //terceiro nível do usuário

    $data = array_merge($data, formatterRede($nivel1, $nivel2, $nivel3));

    $this->load->view('admin/rede/visualizar', $data);
  }
}
