<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apn extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        http_response_code(404);
        $this->load->view('errors/html/error_404'); // provide your own HTML for the error page
        die();
        
        $file = getcwd(). '/assets/apn/BPV-APN-2604021.pdf';
        $filename = 'Bemprever Vida - APN.pdf';

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));
        header('Accept-Ranges: bytes');

        @readfile($file);
    }
}
