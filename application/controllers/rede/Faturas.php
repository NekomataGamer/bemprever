<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Faturas extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('nivel_rede') == ''){
        redirect('rede/login');
    }
  }

  public function abertas() {
    $data['title'] = 'Faturas';
    $data['subTitle'] = 'Abertas';
    $data['faturas'] = getFaturas($this->session->userdata('id'), 0);
    $data['cat'] = $this->db->get('servicos_categoria')->result_array();
    
    $this->load->view('rede/faturas/abertas', $data);
  }

  public function pagas() {
    $data['title'] = 'Faturas';
    $data['subTitle'] = 'Pagas';
    $data['faturas'] = getFaturas($this->session->userdata('id'), 1);
    $data['cat'] = $this->db->get('servicos_categoria')->result_array();

    $this->load->view('rede/faturas/pagas', $data);
  }


  public function pagar($id) {
    $fatura = $this->model->selecionaBusca("faturas", "WHERE id='{$id}' AND id_aluno='".$this->session->userdata('id')."' ");

    if (!$fatura) gera_aviso('erro', 'Fatura não encontrada.', 'rede/faturas/abertas');

    $fatura = $fatura[0];

    $aluno = $this->model->selecionaBusca('aluno', "WHERE id='".$this->session->userdata('id')."' ");
    if (!$aluno) gera_aviso('erro', 'Erro desconhecido.', 'rede/login');
    
    $config = $this->model->selecionaBusca('configuracoes', "");
    if (!$config) gera_aviso('erro', 'Configurações não encontradas.', 'rede/faturas/abertas');

    if (isset($fatura['link_pagamento']) && $fatura['vencimento'] >= date('Y-m-d H:i:s')){
        redirect($fatura['link_pagamento'], 'refresh');
        exit();
        die();
    }

    $venc = retornaDataArray($fatura['vencimento']);
    $vencimento = $venc['ano'].'-'.$venc['mes'].'-'.$venc['dia'];
    $linkpay = gerarPagamentoJuno($fatura['id'], $fatura['valor'], $fatura['nome_plano'], $vencimento, $aluno[0], 'faturas');
    if ($linkpay){
        $upd = ['link_pagamento' => $linkpay];
        $upd['vencimento'] = ($vencimento <= date('Y-m-d')) ? addDataDias(1, date('Y-m-d H:i:s'), "Y-m-d H:i:s") : $vencimento;

        $this->model->update('faturas', $upd, $id);
        redirect($linkpay, 'refresh');
        exit();
        die();
    }

    gera_aviso('erro', 'Falha ao gerar pagamento, contate a administração.', 'rede/faturas/abertas');
  }
}
