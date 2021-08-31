<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Assinatura extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('nivel_rede') == ''){
        redirect('rede/login');
    }
  }

  public function detalhes() {
    $data['title'] = 'Assinatura';
    $data['subTitle'] = 'Detalhes';
    $data['assinatura'] = $this->model->selecionaBusca('assinaturas_rede', "WHERE id_aluno='".$this->session->userdata('id')."' ");
    $data['cat'] = $this->db->get('servicos_categoria')->result_array();
    if (!$data['assinatura']) gera_aviso('erro', 'Assinatura não encontrada.', 'rede/index');

    $data['plano'] = $this->model->selecionaBusca('plano_rede', "WHERE id='".$data['assinatura'][0]['id_plano']."' ");
    if (!$data['plano']) gera_aviso('erro', 'Plano não encontrado.', 'rede/index');

    if (!is_null($data['assinatura'][0]['id_adesao_master'])){
      $master = $this->model->selecionaBusca('adesoes_master', "WHERE id='{$data['assinatura'][0]['id_adesao_master']}' ");
      $data['master'] = isset($master[0]['id']) ? $master[0] : null;
  }

    $this->load->view('rede/assinaturas/detalhes', $data);
  }
}
