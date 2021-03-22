<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rede extends CI_Controller
{
    /*
    * ESSA CLASSE TEM COMO OBJETIVO RODAR FUNÇÕES CRON (AUTOMÁTICAS) PARA DIVERSAS FUNÇÕES DO SISTEMA
    * HELPERS UTILIZADOS: financeiro_helper, carreira_helper, datas_helper, indexer_helper, cadastro_helper
    * Todos os direitos reservados para AGÊNCIA ZAP.
    ## CRONS==============================================================================================
    https://agenciaennove.com.br/clientes/keroser/cron/rede/cronFaturas
    https://agenciaennove.com.br/clientes/keroser/cron/rede/cron/residual
    https://agenciaennove.com.br/clientes/keroser/cron/rede/cron/carreira
    */
    protected $debug = FALSE;
    public function __construct()
    {
        parent::__construct();
    }

    /* ==================================================================================================================================================

    => => FUNÇÕES AJUDANTES DIVERSAS

    ===================================================================================================================================================== */

    /* RECEBE AS CONFIGURAÇÕES DO ADMINISTRADOR */
    protected function getConfig()
    {
        $config = $this->model->selecionaBusca('configuracoes', "WHERE id='1' ");
        if ($config) return $config[0];
        return null;
    }

    /* RECEBE AS CONFIGURAÇÕES DE GANHO RESIDUAL DO ADMINISTRADOR */
    protected function getGanhoResidual()
    {
        $config = $this->model->selecionaBusca('ganho_residual', "");
        if ($config) return $config[0];
        return null;
    }

    /* RECEBE AS CONFIGURAÇÕES DE PLANOS DE CARREIRA DO ADMINISTRADOR */
    protected function getPlanosCarreira()
    {
        $config = $this->model->selecionaBusca('plano_carreira', "");
        if ($config) return $config;
        return null;
    }

    /* RECEBE AS CONFIGURAÇÕES DE REGRAS RESIDUAIS DO ADMINISTRADOR */
    protected function getRegrasResidual()
    {
        $config = $this->model->selecionaBusca('regras_fidelidade', "ORDER BY ganho_pct DESC");
        if ($config) return $config;
        return null;
    }

    /* RECEBE AS CONFIGURAÇÕES DE REGRAS DE CARREIRA DO ADMINISTRADOR */
    protected function getRegrasCarreira()
    {
        $config = $this->model->selecionaBusca('regras_carreira', "ORDER BY ganho_pct DESC");
        if ($config) return $config;
        return null;
    }

    // RECEBE A ULTIMA FATURA DE UM USUÁRIO DA REDE
    protected function getLastFatura($id)
    {
        $fatura = $this->model->selecionaBusca('faturas', "WHERE id_aluno='{$id}' ORDER BY vencimento DESC LIMIT 1");
        if ($fatura) return $fatura[0];
        return null;
    }

    //retorna o plano do aluno ou null caso não encontrado
    protected function buscarPlanoAluno($id)
    {
        $plano_rede = $this->model->selecionaBusca('assinaturas_rede', "WHERE id_aluno='{$id}' ");
        if (!$plano_rede) return null;

        $plano = $this->model->selecionaBusca('plano_rede', "WHERE id='{$plano_rede[0]['id_plano']}' ");
        if (!$plano) return null;

        $plano[0]['id_assinatura'] = $plano_rede[0]['id'];
        $plano[0]['estado'] = $plano_rede[0]['status'];

        return $plano[0];
    }

    //salva o histórico de verificação da cron (para saber se ela rodou no dia ou não)
    function insereCronGanho($cron, $descricao = '', $last_update = null)
    {
        $busca = $this->model->selecionaBusca('cron_ganhos', "WHERE tipo='{$cron}' ");
        if (isset($busca[0]['id'])) {
            $nvarr['descricao'] = $descricao;
            if (isset($last_update)) {
                $nvarr['last_update'] = $last_update;
            }
            $this->model->update('cron_ganhos', $nvarr, $busca[0]['id']);
        } else {
            $nvarr = [
                'tipo' => $cron,
                'descricao' => $descricao
            ];
            if (isset($last_update)) {
                $nvarr['last_update'] = $last_update;
            }
            $this->model->insere('cron_ganhos', $nvarr);
        }
        return true;
    }

    //retorna o histórico da ultima cron salva do tipo enviado
    function getCronGanho($cron)
    {
        $busca = $this->model->selecionaBusca('cron_ganhos', "WHERE tipo='{$cron}' ");
        if ($busca) return $busca[0];
        return null;
    }

    /* ==================================================================================================================================================

    => => FATURAS

    ===================================================================================================================================================== */

    //verifica se existe a fatura, se ela está vencida e, caso esteja a mais de 5 dias, desativa o usuário
    //retorna true caso seja possível criar uma nova fatura ou false caso ja exista uma em aberto.
    protected function verifyVencida($fatura)
    {
        $fatura = isset($fatura[0]['id']) ? $fatura[0] : $fatura;
        if (!$fatura) return true;
        $config = $this->getConfig();
        $dateVenc = addDataDias($config['tempo_desativar_usuario'], $fatura['vencimento']);
        if ($dateVenc < date('Y-m-d H:i:s')) {
            desativarUsuario($fatura['id_aluno'], $fatura['id']);
        }
        return false;
    }

    //verificador de geração de nova fatura
    //retorna a data de vencimento da próxima fatura caso ela possa ser criada ou FALSE caso já exista uma fatura em aberto.
    protected function checkerFatura($fatura, $aluno)
    {
        $fatura = isset($fatura[0]['id']) ? $fatura[0] : $fatura;
        $aluno = isset($aluno[0]['id']) ? $aluno[0] : $aluno;
        if ($fatura) {
            if ($this->verifyVencida($fatura)) {
                return addDataMeses(1, $fatura['vencimento']);
            } else {
                return false;
            }
        }
        return addDataMeses(1, $aluno['criado_em']);
    }

    //Gera faturas mensais pros usuários
    //faturas geradas baseadas na configuração de dias
    //================================================
    /* ESTA CRON DEVE RODAR 1X AO DIA */
    public function cronFaturas()
    {
        $config = $this->getConfig();
        $alunos = $this->model->selecionaBusca('aluno', "");

        $descricao = '';
        foreach ($alunos as $aln) {
            $lastFatura = $this->getLastFatura($aln['id']);
            $nextVencimento = $this->checkerFatura($lastFatura, $aln);
            if ($nextVencimento) {
                $minVencimento = addDataDias($config['dias_gerar_fatura'], date('Y-m-d 23:59:59'));
                if ($nextVencimento <= $minVencimento) {
                    $plano = $this->buscarPlanoAluno($aln['id']);
                    $refer = retornaDataArray($nextVencimento, false, true);

                    $novaFatura = [
                        'id_aluno' => $aln['id'],
                        'id_plano' => $plano['id'],
                        'id_assinatura' => $plano['id_assinatura'],
                        'valor' => $plano['valor'],
                        'vencimento' => $nextVencimento,
                        'custom' => "Fatura mensal do plano " . $plano['nome'],
                        'nome_plano' => $plano['nome'],
                        'referencia' => $refer['mes'] . ' / ' . $refer['ano']
                    ];
                    $descricao .= $descricao == '' ? '' : '\r\n\r\n';
                    $descricao .= 'Fatura gerada para o aluno ' . $aln['login'] . ' - valor: ' . $plano['valor'] . ', plano: ' . $plano['nome'];
                    $this->model->insere('faturas', $novaFatura);
                }
            }
        }
        $this->insereCronGanho('faturas', $descricao);
    }





    /* ==================================================================================================================================================

    => => RESIDUAL

    ===================================================================================================================================================== */
    //FUNÇÃO DE ENTRADA DE GANHO RESIDUAL DE 1 ALUNO ATÉ 10 NÍVEIS ACIMA.
    protected function entrarGanhoResidual($aluno)
    {
        #echo '<br/><hr>ENTRANDO GANHO PELO ALUNO: '.$aluno['login'].'<br/>';

        if (!isset($aluno['id_indicador'])) return true;

        #echo '<br>ALUNO TEM INDICADOR!';

        $valoresResidual = $this->getGanhoResidual();
        $atual = $aluno;

        if (!$valoresResidual) {
            #echo '<br>Valores de residual não encontrados';
            errorCallback('cron/Rede/rodarResidual', "Valores de residual não encontrados");
            return false;
        }

        $planoUsuarioInicio = $this->buscarPlanoAluno($atual['id']);

        if (!$planoUsuarioInicio || $planoUsuarioInicio['estado'] != 'ativo') return false; #usuário não tem plano ativo e não gera residual.
        
        #echo '<br/>buscando usuarios';
        $searcherID = $atual['id_niveis'];
        for ($i = 0; $i < 7; $i++) {
            #busca apenas caso não seja a raiz!
            #echo '<br/>nivel = '.$atual['id_niveis'];
            if (strlen($atual['id_niveis'] . '') > 1) {

                $searcherID = substr($searcherID, 0, -1); #tira o ultimo numero do codigo atual de rede, subindo 1 nível
                if ($searcherID == "") return true; #usuario é raiz;

                $atual = $this->model->selecionaBusca('aluno', "WHERE id_niveis='{$searcherID}' "); #busca no banco de dados o usuário com o código correspondente

                if (!$atual) return true; #caso o usuário não exista, retorna da função

                

                $atual = $atual[0]; #formatação da array

                $planoUsuario = $this->buscarPlanoAluno($atual['id']); #recebe o plano atual do usuário, caso esteja inativo, ele não recebe o residual
                if ($planoUsuario && $planoUsuario['estado'] == 'ativo') {
                    $j = $i + 1;
                    $pctNew = $valoresResidual['n' . $j];
                    $sum = ($pctNew / 100) * $planoUsuarioInicio['valor'];
                    if ($sum > 0) {
                        //Caso a soma do residual seja maior que 0, adciona o valor ao usuário
                        addSaldo($atual['id'], $sum, $planoUsuario['id'], 'residual');
                    }
                }
            } else {
                return true; #retorna true caso o usuário seja a raiz
            }
        }
        return false;
    }


    /* ==================================================================================================================================================

    => => CARREIRA

    ===================================================================================================================================================== */
    //FUNÇÃO DE ENTRADA DE GANHO CARREIRA DE 1 ALUNO.
    protected function entrarGanhoCarreira($aluno)
    {
        /*

        Não UTILIZADO
        $regras = $this->getRegrasCarreira();
        $planosCarreira = $this->getPlanosCarreira();
        $atual = $aluno;

        if (!$regras) {
            errorCallback('cron/Rede/rodarCarreira', "Regras de carreira não encontradas");
            return false;
        }
        if (!$planosCarreira) {
            errorCallback('cron/Rede/rodarCarreira', "Planos de carreira não encontrados");
            return false;
        }

        $carreira = getCarreira($aluno['id']); //FUNÇÃO DO HELPER QUE RETORNA SE O USUÁRIO POSSUI ALGUM PLANO DE CARREIRA
        if (isset($carreira['id'])) {
            $planoUsuario = $this->buscarPlanoAluno($atual['id']);
            if ($planoUsuario) {
                addSaldo($aluno['id'], $carreira['ganho'], $planoUsuario['id'], 'carreira');
            }
        } */
        return true;
    }

    function getDataAssAluno($id_aluno){
        $assinatura = $this->model->selecionaBusca('assinaturas_rede', "WHERE id_aluno='{$id_aluno}' ");
        if (!$assinatura) return null;
        
        if (isset($assinatura[0]['data_ultimo_pagamento'])){
            $exploder = explode(' ', $assinatura[0]['data_ultimo_pagamento'])[0].' 23:59:59';

            if ($exploder < date('Y-m-d'). ' 00:00:00') return null;
        }


        $gResidual = $this->model->selecionaBusca('gResidual', "WHERE id_ass='{$assinatura[0]['id']}' ");
        if ($gResidual){
            $prevResidual = $gResidual[0]['data_ganho'];
            if (isset($assinatura[0]['data_ultimo_pagamento'])){

                return $assinatura[0]['data_ultimo_pagamento'] > $prevResidual ? [
                    'data' => $assinatura[0]['data_ultimo_pagamento'], 
                    'id' => $assinatura[0]['id']
                ] : null;
            }
            return null;
        }

        return isset($assinatura[0]['data_ultimo_pagamento']) ? [
            'data' => $assinatura[0]['data_ultimo_pagamento'], 
            'id' => $assinatura[0]['id']
        ] : [
            'data' => $assinatura[0]['data_pagamento_inicial'],
            'id' => $assinatura[0]['id']
        ];
    }



    /* ==================================================================================================================================================

    => => GANHOS RESIDUAL E CARREIRA
    FUNÇÕES COMUNS A AMBOS \/

    ===================================================================================================================================================== */

    //CASO SEJA HORA DE RODAR O GANHO
    //ENTRA NA FUNÇÃO DE ADCIONAR O MESMO AOS USUÁRIOS!
    protected function rodarGanho($tipo, $efetivo = false, $funcData = null, $t = null)
    {
        $alunos = $this->model->selecionaBusca('aluno', "WHERE bloqueado='0' "); //alunos bloqueados não recebem ganho
        foreach ($alunos as $aln) {
            if (!$efetivo) {
                if ($tipo == 'residual') {
                    $this->entrarGanhoResidual($aln); //entrada de ganho residual caso o tipo seja esse
                } /* else if ($tipo == 'carreira'){
                    $this->entrarGanhoCarreira($aln); //NÃO EXISTE GANHO CARREIRA
                } */
            } else {
                $config = $this->getConfig();
                $assAluno = $this->getDataAssAluno($aln['id'], $funcData, $t);

                if (!isset($assAluno)) return false;

                $dataAssAluno = $assAluno['data'];

                $dataX = retornaDataArray($dataAssAluno);
                if ($config['dia_' . $tipo] > 0){
                    $dataX = retornaDataArray(addDataDias($config['dia_' . $tipo], $dataAssAluno));
                }
                $checkerData = $dataX['ano'] . '-' . $dataX['mes'] . '-' . $dataX['dia'];
                //verifica se o dia atual é o numero definido nas configurações a mais que o cadastro do usuário, se for, gera o ganho.
                if ($checkerData == date('Y-m-d')) {
                    if ($tipo == 'residual') {
                        $this->entrarGanhoResidual($aln); //entrada de ganho residual caso o tipo seja esse

                        $temGanho = $this->model->selecionaBusca('gResidual', "WHERE id_ass='{$assAluno['id']}' ");

                        if ($temGanho){
                            $this->model->update('gResidual', [
                                'id_ass'     => $assAluno['id']
                            ], $temGanho[0]['id']);
                        } else {
                            $this->model->insere('gResidual', [
                                'id_ass'     => $assAluno['id']
                            ]);
                        }
                    }
                }
            }
        }
    }

    //FUNÇÃO DE GANHOS
    //RODA BASEADO NA FUNÇÃO ENVIADA DE ADCIONAR DATAS EM $funcData
    protected function funcGanhos($tipo, $funcData, $t)
    {
        $config = $this->getConfig();
        //o primeiro ganho é em 1 dia fixo do mês
        if ($config['tipo_' . $tipo] == 'fixo') {
            if ($config['dia_' . $tipo] == date('d')) {
                $this->rodarGanho($tipo);
            }
        } else {
            //o primeiro ganho é após n dias do cadastro efetivo
            $this->rodarGanho($tipo, true, $funcData, $t);
        }
    }

    //Ganhos Dos Usuários
    //Ganhos Baseado Nas Configurações Salvas
    //================================================
    /* ESTA CRON DEVE RODAR 1X AO DIA */
    //$tipo = 'residual' ou 'carreira' => RODAR 1X PRA CADA
    public function cron($tipo)
    {
        $config = $this->getConfig();
        if (!$config) {
            die();
        }

        $utm = $this->getCronGanho($tipo); //TIPO = residual ou carreira
        $jaVerificado = false;
        /*if (isset($utm['last_verify'])) {
            $dtchk = retornaDataArray($utm['last_verify']);
            if ($dtchk['ano'] . '-' . $dtchk['mes'] . '-' . $dtchk['dia'] == date('Y-m-d')) {
                $jaVerificado = true;
            }
        } SEMPRE GERA NOVA VERIFICAÇÃO */

        if (!$jaVerificado) {
            switch ($config['timer_residual']) {
                case "diario":
                    $this->funcGanhos($tipo, 'addDataDias', 1);
                    break;
                case "semanal":
                    $this->funcGanhos($tipo, 'addDataDias', 7);
                    break;
                case "mensal":
                    $this->funcGanhos($tipo, 'addDataMeses', 1);
                    break;
                case "semestral":
                    $this->funcGanhos($tipo, 'addDataMeses', 6);
                    break;
                case "anual":
                    $this->funcGanhos($tipo, 'addDataAnos', 1);
                    break;
                default:
            }

            $this->insereCronGanho($tipo, '', date('Y-m-d H:i:s'));
        }
    }
}
