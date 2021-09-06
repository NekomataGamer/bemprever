<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagamentos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }



    //RETORNO DA IPN
    /* ==================================================================================
    FUNÇÃO QUE RECEBE O RETORNO GERAL DA IPN */
    public function ipn()
    {
        $this->load->library('PagamentosHandler', null, 'phandler');
        $this->phandler->ipnFaturas();
    }


    public function removeWebhook()
    {
        if (removeWebhook()) {
            echo 'WebHook removido com sucesso!';
        }
    }

    public function testaNiveis()
    {
        echo get_valid_last_root();
    }

    public function pagarContaAluno($id)
    {
        if ($this->session->userdata('nivel_adm') == 1) {
            if (!buscaPermissao('rede', 'administrar')) {
                gera_aviso('erro', 'Ação não permitida!', 'admin/index');
                exit;
            }

            $this->load->library('FaturasHandler', null, 'fhandler');
            $this->fhandler->pagarContaAluno($id);
            
            gera_aviso('sucesso', 'Fatura paga com sucesso!', 'admin/faturas/dar_baixa');
        } else {
            gera_aviso('erro', 'Ação não permitida.', 'rede/index');
        }
    }

    public function AlteraVencimentos()
    {
        $faturas = $this->model->selecionaBusca('faturas', "WHERE vencimento < '2021-09-10 00:00:00' AND paga='0' ");

        foreach($faturas as $fat){
            $usuario = $this->model->selecionaBusca('aluno', "WHERE id = '{$fat['id_aluno']}' ");

            if (!$usuario) continue;

            $nvUser['bloqueado'] = 0;
            $nvFatura['vencimento'] = '2021-09-10 23:59:59';
            $this->model->update('faturas', $nvFatura, $fat['id']);

            $this->model->update('aluno', $nvUser, $nvUser['id']);
        }
    }
}
