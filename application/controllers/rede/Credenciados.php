<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Credenciados extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('nivel_rede') == ''){
        redirect('rede/login');
    }
  }

  public function Categoria($id_cat) {
    
    $data['title'] = "Profissionais Credenciados";
    $data['subTitle'] = "Inicial";
    
    if(isset($_GET['cidade']) && !empty($_GET['cidade'])){
        $data['credenciados'] = $this->db->get_where('profissionais', array('id_categoria' => $id_cat, 'cidade' => $_GET['cidade']))->result_array();
    }else{
        $data['credenciados'] = $this->db->get_where('profissionais', array('id_categoria' => $id_cat))->result_array();
    }
    
    $data['cat'] = $this->db->get('servicos_categoria')->result_array();
    
    $this->load->view('rede/credenciados/categorias', $data);
  }
}
?>