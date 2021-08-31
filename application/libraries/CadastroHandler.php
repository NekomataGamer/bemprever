<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CadastroHandler extends CI_Controller
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    //TRANSFORMA O CADASTRO TEMPORÁRIO DE ALUNO EM PERMANENTE CASO O PAGAMENTO TENHA SIDO EFETUADO COM SUCESSO.
    public function cadastrarAluno($id, $sobeGanhos = true)
    {
        $dados = $this->CI->model->selecionaBusca('aluno_espera', "WHERE `id`='{$id}' ");
        if (!$dados) return false;

        $documento = $this->CI->model->selecionaBusca('documento_termos', "WHERE `id_aluno_pre`='{$id}' ");

        $arr = $dados[0];
        unset($arr['gerou_pagamento']);
        unset($arr['id']);
        $id_niveis = buscarNivelNovo($arr['id_indicador']);
        $plano = $this->CI->model->selecionaBusca('plano_rede', "WHERE id='{$arr['id_plano']}' ");
        unset($arr['id_plano']);
        $arr['tipo'] = 'rede';

        if (!$plano) return false;
        if (!$id_niveis) return false;

        $arr['id_niveis'] = $id_niveis;
        $arr['cadastro_confirmado'] = 1;

        unset($arr['plano_master']);

        $idusuario = $this->CI->model->insere_id('aluno', $arr);
        if ($idusuario) {
            if (isset($documento[0]['id'])) {
                $updateDocumento = [
                    'id_aluno_pre'  => null,
                    'id_aluno'      => $idusuario
                ];
                $this->CI->model->update('documento_termos', $updateDocumento, $documento[0]['id']);
            }

            $id_assinatura = $this->CI->model->insere_id('assinaturas_rede', [
                'id_aluno' => $idusuario,
                'id_plano' => $plano[0]['id'],
                'valor' => $plano[0]['valor'],
                'pago' => $plano[0]['valor'],
                'recebido' => 0,
                'status' => 'ativo',
                'data_pagamento_inicial' => date('Y-m-d H:i:s')
            ]);

            if ($sobeGanhos) {
                $this->CI->load->library('Ganhos', null, 'ganhos');
                $this->CI->ganhos->addGanhoIndicacao($plano[0]['valor'], $dados);



                $this->CI->load->library('BinarioHandler', null, 'binarioh');
                $pontos = $this->CI->binarioh->getPontuacaoByValor($plano[0]['valor']);
                $this->CI->binarioh->subirPontosByAssinatura($pontos, [
                    'id_aluno' => $idusuario
                ], true);
            }

            if (!is_null($dados[0]['plano_master']) && $dados[0]['plano_master'] !== 0) {
                $this->CI->load->library('PlanoMasterHandler', null, 'pmasterh');
                $this->CI->pmasterh->addMaster($dados[0]['plano_master'], $id_assinatura, $sobeGanhos);
            }

            return $this->CI->model->remove('aluno_espera', $dados[0]['id']);
        }
        return false;
    }


    //REMOVE O CADASTRO TEMPORÁRIO DE ALUNO CASO O PAGAMENTO SEJA CANCELADO.
    public function cancelarAluno($id)
    {
        $dados = $this->CI->model->selecionaBusca('aluno_espera', "WHERE `id`='{$id}' ");
        if (!$dados) return false;

        return $this->CI->model->remove('aluno_espera', $id);
    }
}
