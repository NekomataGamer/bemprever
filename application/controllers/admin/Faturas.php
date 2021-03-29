<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faturas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('nivel_adm') != 1) {
            redirect('admin/login');
        } else if (!buscaPermissao('rede', 'visualizar')) {
            gera_aviso('erro', 'Ação não permitida!', 'admin/index');
        }
        $this->load->model('Faturas_model', 'modelo');
    }

    public function abertas()
    {
        $data['tables'] = true;
        $data['title'] = "Listagem De Faturas Em Aberto";
        $data['alert'] = "";
        $data['faturas'] = $this->modelo->getType();

        $this->load->view('admin/faturas/index', $data);
    }

    public function pagas()
    {
        $data['tables'] = true;
        $data['title'] = "Listagem De Faturas Pagas";
        $data['alert'] = "";
        $data['faturas'] = $this->modelo->getType(1);

        $this->load->view('admin/faturas/index', $data);
    }


    public function dar_baixa()
    {
        if (!buscaPermissao('rede', 'administrar')) {
            gera_aviso('erro', 'Ação não permitida!', 'admin/index');
            exit;
        }
        $data['tables'] = true;
        $data['edit'] = true;
        $data['title'] = "Dar Baixa Em Faturas";
        $data['alert'] = "Ao pagar 1 fatura, será gerado ganho residual correspondente e o usuário voltará a ter acesso caso esteja bloqueado";
        $data['faturas'] = $this->modelo->getType(0);

        $this->load->view('admin/faturas/index', $data);
    }
}
