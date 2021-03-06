<?php
/* FUNÇÕES DIVERSAS DO USUÁRIO ENTRAM NESSE HELPER */

/* PEGAR ASSINATURA DO USUÁRIO */
function getAssinatura($id_aluno)
{
    $CI = &get_instance();
    $assinatura = $CI->model->selecionaBusca('assinaturas_rede', "WHERE `id_aluno`='{$id_aluno}' ");
    if (isset($assinatura[0]['id'])) {
        $retorno = $assinatura[0];
        $plano = $CI->model->selecionaBusca('plano_rede', "WHERE id='{$assinatura[0]['id_plano']}' ");
        $retorno['plano'] = isset($plano[0]['id']) ? $plano[0] : null;

        if (!is_null($assinatura[0]['id_adesao_master'])){
            $master = $CI->model->selecionaBusca('adesoes_master', "WHERE id='{$assinatura[0]['id_adesao_master']}' ");
            $retorno['master'] = isset($master[0]['id']) ? $master[0] : null;
        }

        return $retorno;
    } else if ($id_aluno == 1) {
        return [];
    }
    return null;
}

function getDocumentoBySession(): ?array
{
    $CI = &get_instance();
    $id_aluno = $CI->session->userdata('id');

    $doc = $CI->model->selecionaBusca('documento_termos', "WHERE id_aluno = '{$id_aluno}' ");
    return getDocumentoByData($doc[0]);
}

function getDocumentoByData($doc): ?array
{
    if (!isset($doc['root']) || empty($doc['root']) || trim($doc['root']) == "") return null;

    $urls = (strpos($doc['root'], ";") !== false) ? explode(";", $doc["root"]) : [ $doc["root"] ];

    $retorno = [];
    foreach($urls as $url) {
        $retorno[] = site_url(getDocumentoByRoot($url));
    }

    return $retorno;
}

function getCategoriasHeader(): array
{
    $CI = &get_instance();
    $CI->load->library('ApiClubeCerto', [$CI], 'clubeCerto');
    return $CI->clubeCerto->getCategorias();
}

function checkIfDataIsMissing(): ?array
{
    $CI = &get_instance();
    $CI->load->model('Redes_model', 'modelo');
    $aluno = $CI->modelo->getUsuario($CI->session->userdata('id'));

    if (!$aluno) return null;

    $documento = getDocumentoByData($aluno);
    if (
        !$aluno['profissao']
        ||  !$aluno['estado_civil']
        ||  !$aluno['nome_benef']
        ||  !$aluno['cpf_benef']
        ||  !$aluno['parentesco_benef']
    ) {
        $CI->session->set_flashdata([
            'aviso_tipo' => "danger",
            'aviso_mensagem' => "Seu cadastro está incompleto, por favor, atualize seus dados para continuar utilizando a SPL!",
            'tem-erros-data' => 'erro'
        ]);
        return [
            'type'  => null,
            'data'  => $documento
        ];
    }

    /*
    if (!$documento) {
        $CI->session->set_flashdata([
            'aviso_tipo' => "danger",
            'aviso_mensagem' => "Seu cadastro está incompleto, por favor, atualize seus dados para continuar utilizando a SPL!",
            'tem-erros-data' => 'erro'
        ]);
        return [
            'type'  => null,
            'data'  => $documento
        ];
    } */

    return [
        'type'  => true,
        'data'  => $documento
    ];
}

function getById($id_aluno)
{
    $CI = &get_instance();
    $aluno = $CI->model->selecionaBusca('aluno', "WHERE `id`='{$id_aluno}' ");
    if ($aluno) {
        return $aluno[0];
    }

    return null;
}

//PEGA FATURAS DO USUÁRIO
function getFaturas($id_aluno, $tipo = '', $vencidas = true)
{
    $CI = &get_instance();

    $querytipo = $tipo !== '' ? "AND `paga`='{$tipo}' " : "";
    $queryvencidas = !$vencidas ? "AND `vencimento`<='" . date('Y-m-d H:i:s') . "' " : "";

    $faturas = $CI->model->queryString("SELECT 
    fat.id, 
    fat.id_aluno, 
    fat.id_plano, 
    fat.valor, 
    fat.vencimento_inicial,
    fat.taxas,
    fat.vencimento, 
    fat.custom, 
    fat.paga, 
    fat.pagamento,
    fat.criado_em, 
    fat.ultima_att, 
    pln.nome as nome_plano, 
    pln.descricao as descricao_plano,
    pln.valor as valor_plano,
    pln.criado_em as criado_em_plano,
    pln.ultima_att as ultima_att_plano,
    aln.nome as nome_aluno,
    aln.id_niveis as id_niveis_aluno,
    aln.id_indicador as id_indicador_aluno,
    aln.foto as foto_aluno,
    aln.login as login_aluno,
    aln.email as email_aluno,
    aln.telefone as telefone_aluno,
    aln.cpf as cpf_aluno,
    aln.estado as estado_aluno,
    aln.cidade as cidade_aluno,
    aln.endereco as endereco_aluno,
    aln.numero as numero_aluno,
    aln.bairro as bairro_aluno,
    aln.cep as cep_aluno,
    aln.ativo as ativo_aluno,
    aln.bloqueado as bloqueado_aluno,
    aln.criado_em as criado_em_aluno,
    aln.ultima_att as ultima_att_aluno
    FROM faturas as fat
    JOIN (SELECT * FROM plano_rede ) AS pln ON pln.id = fat.id_plano
    JOIN (SELECT * FROM aluno ) AS aln ON aln.id = fat.id_aluno
    WHERE id_aluno=$id_aluno
    $querytipo
    $queryvencidas ");

    return $faturas;
}

function formatterRede($nivel1, $nivel2, $nivel3)
{
    $arr['formato'] = [];

    foreach ($nivel1 as $nvl) {
        $insert = $nvl;
        $insert['nivel_2'] = [];
        $arr['formato'][] = $insert;
    }

    foreach ($nivel2 as $k => $v) {
        $nivel2[$k]['nivel_3'] = [];
        foreach ($nivel3 as $nv3) {
            if (startsWith($nv3['id_niveis'], $v['id_niveis'])) {
                $nivel2[$k]['nivel_3'][] = $nv3;
            }
        }
    }

    foreach ($arr['formato'] as $k => $v) {
        foreach ($nivel2 as $nv2) {
            if (startsWith($nv2['id_niveis'], $v['id_niveis'])) {
                $arr['formato'][$k]['nivel_2'][] = $nv2;
            }
        }
    }

    return $arr;
}
