<?php
class HookCron
{
    public function initialize()
    {
        $CI = &get_instance();
        $jaRodou = $CI->model->selecionaBusca('logs_internos', "WHERE log='CRON_" . date('Y-m-d') . "' ");

        if ($CI->session->userdata('nivel_rede') == 1) {
            if (!checarPendencias($CI->session->userdata('id'))) {
                $CI->load->helper('url');
                $currentURL = current_url();

                if ($currentURL != site_url('rede/faturas/abertas') 
                && $currentURL != site_url('rede/cron/cronFaturas')
                && $currentURL != site_url('rede/login/logoff')) {
                    return gera_aviso(
                        'erro',
                        'Você possui faturas em atraso, para continuar, regularize sua conta. <b>Obs: seu contrato será renovado e reiniciado do zero!</b>',
                        'rede/faturas/abertas'
                    );
                }
            }
        }

        if ($jaRodou) return;

        $CI->model->insere('logs_internos', [
            'log' => "CRON_" . date('Y-m-d')
        ]);

        $CI->load->library('BackgroundExecuter', null, 'back');

        $CI->back->handle("cron/Rede", "cronFaturas");
    }
}
