<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Perguntas_frequentes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('nivel_rede') == ''){
            redirect('rede/login');
        }
    }

    public function index() {
        $faq = $this->model->setTable('faq')
        ->where('tipo', "rede")
        ->fetch('array');

        $this->load->view('comuns/faq', [
            'title' => "Perguntas Frequentes",
            'tipo'  => "rede",
            'faq'   => $faq,
            'cat' => $this->db->get('servicos_categoria')->result_array()
        ]);
    }
}