<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PagamentosHandler
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    //PAGAMENTO EFETUADO COM SUCESSO.
    protected function paidIpn($id_ipn, $ref)
    {
        $rf = explode('-', $ref);
        if (!isset($rf[1])) return false;

        if ($rf[0] == 'aluno_espera') {
            //rf[1] = id do aluno
            $this->CI->load->library('CadastroHandler', null, 'cadastroh');
            return $this->CI->cadastroh->cadastrarAluno($rf[1]);
        } else {
            $this->CI->load->library('FaturasHandler', null, 'faturas');
            return $this->CI->faturas->pagarFatura($id_ipn, $rf[1]);
        }
    }

    //RESPOSTA CANCELADA NA IPN.
    protected function canceledIpn($ref)
    {
        $rf = explode('-', $ref);

        if (!isset($rf[1])) return false;

        if ($rf[0] == 'aluno_espera') {
            $this->CI->load->library('CadastroHandler', null, 'cadastroh');
            return $this->CI->cadastroh->cancelarAluno($rf[1]);
        }
    }

    //RESPOSTA FALHA NA IPN.
    protected function failedIpn($ref)
    {
        $rf = explode('-', $ref);
        if (!isset($rf[1])) return false;

        if ($rf[0] == 'aluno_espera') {
            $this->CI->load->library('CadastroHandler', null, 'cadastroh');
            return $this->CI->cadastroh->cancelarAluno($rf[1]);
        }
    }

    //VERIFICA O CÓDIGO DA IPN
    /* ==================================================================================
    FUNÇÃO QUE TRATA O CÓDIGO IPN RECEBIDO */
    protected function verifyIpnCode($id_ipn, $status, $reference)
    {
        switch ($status) {
            case "PAID":
                return $this->paidIpn($id_ipn, $reference);
                break;
            case "CANCELLED":
                return $this->canceledIpn($reference);
                break;
            case "FAILED":
                return $this->failedIpn($reference);
                break;
            default:
                return true;
        }
    }


    //RETORNO DA IPN
    /* ==================================================================================
    FUNÇÃO QUE RECEBE O RETORNO GERAL DA IPN */
    public function ipnFaturas()
    {
        $data['response_json'] = $this->input->raw_input_stream;
        $array = json_decode($data['response_json'], true);
        $data['response_post'] = print_r($array, TRUE);

        if (isset($array['data'][0]['attributes']['status'])) {
            $tipo = $array['eventType'];
            $data['status'] = $array['data'][0]['attributes']['status'];
            $data['reference'] = $array['data'][0]['attributes']['reference'];

            $idipn = $this->CI->model->insere_id('ipn_juno', $data);
            if ($tipo == "CHARGE_STATUS_CHANGED") {
                $this->verifyIpnCode($idipn, $data['status'], $data['reference']);
                //chamando a função de tratamento do status recebido
            }
        }
    }


    public function removeWebhook()
    {
        if (removeWebhook()) {
            echo 'WebHook removido com sucesso!';
        }
    }
}
