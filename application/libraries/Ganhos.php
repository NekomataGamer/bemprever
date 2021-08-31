<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ganhos
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function addGanhoIndicacao($valor, $usuarioGerador)
    {
        $indicador = $usuarioGerador[0]['id_indicador'];
        $configurer = $this->CI->model->selecionaBusca('configuracoes', " LIMIT 1");
        if ($configurer) {
            $pctGanhoIndicacao = $configurer[0]['ganho_indicacao'];
            $valorIndicacao = $valor * $pctGanhoIndicacao / 100;

            $planoUser = $this->CI->model->selecionaBusca('assinaturas_rede', "WHERE id_aluno='{$indicador}' AND status='ativo' ");

            $aluno = $this->CI->model->selecionaBusca('aluno', "WHERE id='{$indicador}' AND bloqueado='0' ");

            if (!$planoUser || !$aluno) return false; #usuário não tem plano ou está bloqueado! Não recebe indicação

            return addSaldo($indicador, $valorIndicacao, $planoUser[0]['id'], 'indicacao');
        }
    }


    public function addGanhoIndicacaoByAssinatura($valor, $assinatura, $pct = null)
    {
        $assinatura = isset($assinatura[0]['id']) ? $assinatura[0] : $assinatura;
        $usuarioGerador = $this->CI->model->selecionaBusca('aluno', "WHERE id='{$assinatura['id_aluno']}' ");

        if (!$usuarioGerador) return true;

        $indicador = $usuarioGerador[0]['id_indicador'];
        $configurer = $this->CI->model->selecionaBusca('configuracoes', " LIMIT 1");
        if ($configurer) {
            $pctGanhoIndicacao = (is_null($pct)) ? $configurer[0]['ganho_indicacao'] : $pct;
            $valorIndicacao = $valor * $pctGanhoIndicacao / 100;

            $planoUser = $this->CI->model->selecionaBusca('assinaturas_rede', "WHERE id_aluno='{$indicador}' AND status='ativo' ");

            $aluno = $this->CI->model->selecionaBusca('aluno', "WHERE id='{$indicador}' AND bloqueado='0' ");

            if (!$planoUser || !$aluno) return false; #usuário não tem plano ou está bloqueado! Não recebe indicação

            return addSaldo($indicador, $valorIndicacao, $planoUser[0]['id'], 'indicacao');
        }
    }
}
