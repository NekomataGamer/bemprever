<?php

class BinarioHandler
{
    private int $maxNivel = 50;

    private $pontuacoes = [
        '110' => 30,
        '60' => 15,
    ];

    public function getPontuacaoByValor($valor)
    {
        return $this->pontuacoes[$valor];
    }

    private function sobePonto(&$CI, $usuario, $lado, $pontos, $nivel = 1)
    {
        if (!$usuario || $nivel > $this->maxNivel) return true;

        $saldo_usuario = getSaldo($usuario[0]['id']);

        if (!$saldo_usuario) {
            if (is_null($usuario[0]['id_indicador'])) return true;

            $indicador = $CI->model->selecionaBusca('aluno', "WHERE id='{$usuario[0]['id_indicador']}' ");

            return $this->sobePonto($CI, $indicador, $usuario[0]['lado'], $pontos, $nivel + 1);
        }

        $saldo_usuario['pontos_' . $lado] += $pontos;
        $CI->model->update('saldo_usuario', $saldo_usuario, $saldo_usuario['id']);

        if (is_null($usuario[0]['id_indicador'])) return true;

        $indicador = $CI->model->selecionaBusca('aluno', "WHERE id='{$usuario[0]['id_indicador']}' ");

        return $this->sobePonto($CI, $indicador, $usuario[0]['lado'], $pontos, $nivel + 1);
    }

    public function subirPontosByAssinatura($pontos, $assinatura, $checa = true)
    {
        $CI = &get_instance();
        $usuario = $CI->model->selecionaBusca('aluno', "WHERE id='{$assinatura['id_aluno']}' ");

        if (!$usuario || is_null($usuario[0]['id_indicador'])) return true;

        if ($checa && !$this->checaSubida($usuario)) return true;

        $indicador = $CI->model->selecionaBusca('aluno', "WHERE id='{$usuario[0]['id_indicador']}' ");

        if (!$indicador) return true;

        $this->sobePonto($CI, $indicador, $usuario[0]['lado'], $pontos);
    }

    public function subirPontosByUsuario($pontos, $usuario, $checa = true)
    {
        $CI = &get_instance();

        $usuario = isset($usuario[0]['id']) ? $usuario[0] : $usuario;

        if (!$usuario || is_null($usuario['id_indicador'])) return true;

        if ($checa && !$this->checaSubida($usuario)) return true;

        $indicador = $CI->model->selecionaBusca('aluno', "WHERE id='{$usuario['id_indicador']}' ");

        if (!$indicador) return true;

        $this->sobePonto($CI, $indicador, $usuario['lado'], $pontos);
    }


    public function checaSubida($usuario)
    {
        $usuario = isset($usuario[0]['id']) ? $usuario[0] : $usuario;
        $CI = &get_instance();
        $n_usuarios = $CI->db->query("SELECT id FROM aluno WHERE id_indicador = '{$usuario['id_indicador']}' ")->num_rows();

        if ($n_usuarios >= 4) return true;
    }

    public function checaUserBinario($usuario)
    {
        $CI = &get_instance();

        $usuario = isset($usuario[0]['id']) ? $usuario[0] : $usuario;

        $assinatura = $CI->model->selecionaBusca('assinaturas_rede', "WHERE id_aluno = '{$usuario['id']}' ");

        if (!$assinatura || is_null($assinatura[0]['id_adesao_master'])) return null;

        $master = $CI->model->selecionaBusca('adesoes_master', "WHERE id='{$assinatura[0]['id_adesao_master']}' ");

        if (!$master) return null;

        $master[0]['id_assinatura'] = $assinatura[0]['id'];

        return $master;
    }

    public function convertePontos($master, $saldo, $usuario)
    {
        $CI = &get_instance();
        $usuario = isset($usuario[0]['id']) ? $usuario[0] : $usuario;
        $saldo = isset($saldo[0]['id']) ? $saldo[0] : $saldo;
        $master = isset($master[0]['id']) ? $master[0] : $master;

        $lado = ($saldo['pontos_direita'] < $saldo['pontos_esquerda']) ? 'direita' : 'esquerda';

        $porcentagemConversao = $master['pct_conversao'];

        $valor = $saldo['pontos_' . $lado] * $porcentagemConversao / 100;

        if (addSaldo($usuario['id'], $valor, $master['id_assinatura'], 'binario')) {
            $saldo['pontos_' . $lado] = 0;
            $CI->model->update('saldo_usuario', $saldo, $saldo['id']);
        }
    }

    public function rodarBinario()
    {
        $CI = &get_instance();
        $zerarBinario = $CI->model->selecionaBusca('zerar_binario', "LIMIT 1");

        if ($zerarBinario) {
            $dataHoje = date('Y-m-d');
            $dataRodou = explode(' ', $zerarBinario[0]['last_verify'])[0];
            if ($dataHoje == $dataRodou) return true;
        }

        $saldos = $CI->model->selecionaBusca('saldo_usuario', "WHERE pontos_esquerda > 0 AND pontos_direita > 0");

        foreach ($saldos as $saldo) {
            $usuario = $CI->model->selecionaBusca('aluno', "WHERE id='{$saldo['id_aluno']}' ");
            if (!$usuario) continue;

            $master = $this->checaUserBinario($usuario);
            if (!$master) continue;

            $this->convertePontos($master, $saldo, $usuario);
        }

        $this->checaZerarBinario();
    }

    public function rodaReset()
    {
        $CI = &get_instance();
        $saldos = $CI->model->selecionaBusca('saldo_usuario', "WHERE pontos_esquerda > 0 OR pontos_direita > 0");

        foreach ($saldos as $saldo) {
            $usuario = $CI->model->selecionaBusca('aluno', "WHERE id='{$saldo['id_aluno']}' ");
            if (!$usuario) continue;

            $master = $this->checaUserBinario($usuario);
            if ($master) continue;

            $novaPontuacao = [
                'pontos_esquerda' => 0,
                'pontos_direita' => 0
            ];

            $CI->model->update('saldo_usuario', $novaPontuacao, $saldo['id']);
        }

        $this->checaZerarBinario();
    }

    public function checaZerarBinario()
    {
        $CI = &get_instance();
        $zerarBinario = $CI->model->selecionaBusca('zerar_binario', "LIMIT 1");

        if (!$zerarBinario) {
            $nvZerar = [
                'last_reset' => date('Y-m-01 H:i:s')
            ];
            $nvZerar['id'] = $CI->model->insere_id('zerar_binario', $nvZerar);
            $zerarBinario[0] = $nvZerar;
        }

        $dataUltimoZeramento = new DateTime($zerarBinario[0]['last_reset']);
        $dataUltimoZeramento->modify('next month');
        $dataUltimoZeramento->modify('next month');

        $hoje = new DateTime();
        if ($dataUltimoZeramento->format('Y-m-d') <= $hoje->format('Y-m-d')) {
            $this->rodaReset();
            $updateZerar = [
                'last_reset' => date('Y-m-d H:i:s'),
                'last_verify' => date('Y-m-d H:i:s')
            ];
            return $CI->model->update('zerar_binario', $updateZerar, $zerarBinario[0]['id']);
        }

        $CI->model->update('zerar_binario', ['last_verify' => date('Y-m-d H:i:s')], $zerarBinario[0]['id']);
    }
}
