<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carta_de_orientacao_ao_associado extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $file = getcwd(). '/assets/documentos/carta-orientacao.docx';
        $filename = 'CARTA DE ORIENTAÇÃO AO ASSOCIADO DECLARAÇÃO DE SAUDE.docx';

        header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));
        header('Accept-Ranges: bytes');

        @readfile($file);
    }
}
