<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FaturasHandler
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    //DEFINE A FATURA COMO PAGA CASO O PAGAMENTO SEJA EFETUADO COM SUCESSO.
    public function pagarFatura($id_ipn, $id)
    {

        $dados = $this->CI->model->selecionaBusca('faturas', "WHERE `id`='{$id}' ");

        if (!$dados) return false;

        $ass = $this->CI->model->selecionaBusca('assinaturas_rede', "WHERE id_aluno='{$dados[0]['id_aluno']}' ");

        if (!$ass) return false;

        $data_pagamento = date('Y-m-d H:i:s');
        $nvarr = [
            'pagamento' => $data_pagamento,
            'paga' => 1,
            'custom' => $id_ipn
        ];
        $valpaid = $ass[0]['pago'] + $dados[0]['valor'];
        $nvarr2 = [
            'pago' => $valpaid,
            'data_ultimo_pagamento' => $data_pagamento
        ];

        if ($this->CI->model->update('faturas', $nvarr, $id)) {
            $this->CI->model->update("assinaturas_rede", $nvarr2, $ass[0]['id']);

            checarPendencias($dados[0]['id_aluno']); //financeiro_helper
        }
    }


    public function pagarContaAluno($id)
    {
        $this->pagarFatura(99999999, $id);
    }
}
