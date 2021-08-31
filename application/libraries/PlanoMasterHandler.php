<?php

class PlanoMasterHandler
{
    public function addMaster($id_master, $id_assinatura, $sobeGanhos = true)
    {
        $CI = &get_instance();

        $planoMaster = $CI->model->selecionaBusca('adesoes_master', "WHERE id='{$id_master}' ");
        $assinatura = $CI->model->selecionaBusca('assinaturas_rede', "WHERE id='{$id_assinatura}' ");

        if (!$planoMaster || !$assinatura) return false;

        $data_update = [
            'pmaster' => $planoMaster[0]['valor'],
            'id_adesao_master' => $id_master
        ];
        
        if ($CI->model->update('assinaturas_rede', $data_update, $assinatura[0]['id']) && $sobeGanhos) {
            //Ganhos
            $CI->load->library('Ganhos', null, 'ganhos');
            $CI->ganhos->addGanhoIndicacaoByAssinatura($planoMaster[0]['valor'], $assinatura, 10);


            $CI->load->library('BinarioHandler', null, 'binarioh');
            return $CI->binarioh->subirPontosByAssinatura(
                $planoMaster[0]['pontos_sobe'], 
                $assinatura[0],
                true
            );
        }
    }
}
