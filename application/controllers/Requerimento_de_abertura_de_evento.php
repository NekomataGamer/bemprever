<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Requerimento_de_abertura_de_evento extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $file = getcwd(). '/assets/documentos/requerimento-abertura.docx';
        $filename = 'REQUERIMENTO DE ABERTURA DE EVENTO.docx';

        header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));
        header('Accept-Ranges: bytes');

        @readfile($file);
    }
}

