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
        $file = getcwd(). '/assets/apn/BPV_APN_2604021.pdf';
        $filename = 'Bemprever Vida - APN.pdf';

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));
        header('Accept-Ranges: bytes');

        @readfile($file);
    }
}
