<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Descontos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('nivel_rede') == '') {
            redirect('rede/login');
        }
    }
    
    public function categoria()
    {
        redirect('rede/index');
        exit();
        $id = $this->db->escape_str($this->input->get('id', true));
        $nome = $this->db->escape_str($this->input->get('nome', true));

        if (!isset($id) || !isset($nome) || empty($id) || empty($nome)) {
            gera_aviso('erro', 'Categoria de desconto inválida.', 'rede/index');
            exit();
        }

        $this->load->view('rede/descontos/categoria', [
            'title'     => "Descontos",
            'subTitle'  => $nome,
            'id'        => $id,
            'nome'      => $nome
        ]);
    }

    public function estabelecimentos(string $codigo_categoria)
    {
        redirect('rede/index');
        exit();
        $this->load->library('ApiClubeCerto', [$this], 'clubeCerto');
        $data = $this->clubeCerto->getEstabelecimentos($codigo_categoria);

        echo json_encode($data);
    }

    public function detalhes_estabelecimento()
    {
        redirect('rede/index');
        exit();
        $id = $this->db->escape_str($this->input->get('id', true));
        $nome = $this->db->escape_str($this->input->get('nome', true));
        $categoria = $this->db->escape_str($this->input->get('categoria', true));

        $cat_array = explode('-', $categoria);

        if (!isset($id) || !isset($nome) || !isset($cat_array[0]) || !isset($cat_array[1]) || empty($id) || empty($nome) || empty($cat_array[0]) || empty($cat_array[1])) {
            gera_aviso('erro', 'Estabelecimento inválido.', 'rede/index');
            exit();
        }

        $this->load->view('rede/descontos/detalhes_estabelecimento', [
            'title'         => "Descontos",
            'subTitle'      => $nome,
            'id'            => $id,
            'nome'          => $nome,
            'id_categoria'  => $cat_array[0],
            'categoria'     => $cat_array[1]
        ]);
    }


    public function detalhes(string $codigo_estabelecimento)
    {
        redirect('rede/index');
        exit();
        $this->load->library('ApiClubeCerto', [$this], 'clubeCerto');
        $data = $this->clubeCerto->getDadosEstabelecimentos($codigo_estabelecimento);

        echo json_encode($data);
    }
}
