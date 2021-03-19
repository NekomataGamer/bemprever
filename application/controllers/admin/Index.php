<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Index extends CI_Controller {

  public function __construct() {
    parent::__construct();
    
    if ($this->session->userdata('nivel_adm') != 1){
        redirect('admin/login');
    }
  }
  
  protected $totalUsers = [
    '1' => 0,
    '2' => 0,
    '3' => 0,
    '4' => 0,
    '5' => 0
  ];

  protected function last_users(){
    return $this->model->selecionaBusca('aluno', "WHERE id_niveis LIKE '1%'  ORDER BY id DESC LIMIT 3 ");
  }

  protected function getAssEspera(){
    return $this->db->query("SELECT id FROM assinaturas_rede WHERE status='espera' ")->num_rows();
  }

  protected function getAssAtivas(){
    return $this->db->query("SELECT id FROM assinaturas_rede WHERE status='ativo' ")->num_rows();
  }

  protected function getAssInativas(){
    return $this->db->query("SELECT id FROM assinaturas_rede WHERE status='inativo' ")->num_rows();
  }

  public function getNv($n){
    $aln = searchActivesByLevel($this->session->userdata('id'), $n);
    if (isset($aln[0]['id'])){
      $aln = count($aln);
    } else {
      $aln = 0;
    }
    $sum = $n > 1 ? $this->totalUsers[$n - 1] : 0;
    $aln += $sum;
    $this->totalUsers[$n] = $aln;
    
    echo $aln;
  }

  public function index() {
    $data['lastUsers'] = $this->last_users();
    $data['assEspera'] = $this->getAssEspera();
    $data['assAtivas'] = $this->getAssAtivas();
    $data['assInativas'] = $this->getAssInativas();
    $data['config'] = $this->model->selecionaBusca('ganho_residual', "");

    $this->load->view('admin/index', $data);
  }
  
}