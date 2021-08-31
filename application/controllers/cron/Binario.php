<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Binario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function binarioCron()
    {
        $this->load->library('BinarioHandler', null, 'bhandler');
        $this->bhandler->rodarBinario();
    }
}
