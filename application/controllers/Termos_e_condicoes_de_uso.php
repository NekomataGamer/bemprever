<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Termos_e_condicoes_de_uso extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $file = getcwd(). '/assets/termos-de-adesao/TERMO-DE-ADESAO.pdf';
        $filename = 'TERMOS DE ADESÃO _ DECLARACAO DE SAÚDE E ANEXOS 1º alteração.pdf';

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));
        header('Accept-Ranges: bytes');

        @readfile($file);
    }
}
