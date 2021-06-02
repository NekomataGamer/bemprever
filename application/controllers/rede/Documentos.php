<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documentos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    private function checkEntries($id): ?array
    {
        $documento = $this->model->selecionaBusca('documento_termos', "WHERE id_aluno = '{$id}' ");

        if (isset($documento[0]['id'])) return null;

        $aluno = $this->model->selecionaBusca('aluno', "WHERE id = '{$id}' ");

        if (!isset($aluno[0]['id']) || $aluno[0]['cadastro_confirmado'] == 1) return null;

        return $aluno[0];
    }

    //INSERE O DOCUMENTO DO ALUNO
    private function insereDocumento($cpf_aluno)
    {
        $rootPath = getRootDocumentos($cpf_aluno);

        $documentos = $this->input->post('documentos');

        return uploadByBase64($rootPath, $documentos);
    }

    public function reenviar($id)
    {
        $aluno = $this->checkEntries($id);
        if (isset($aluno['id'])) {
            $docPass = $this->insereDocumento($aluno['cpf']);
            if ($docPass) {
                $this->model->insere_id('documento_termos', [
                    'id_aluno'      => $aluno['id'],
                    'root'          => $docPass['full_path'],
                    'arquivo'       => $docPass['file_name']
                ]);

                gera_aviso('sucesso', 'Seu documento foi enviado novamente com sucesso, aguarde a analise da administração.', 'rede/login');
            } else {
                gera_aviso('erro', 'Falha ao enviar seu documento assinado, tente novamente.', 'rede/login');
            }
        } else {
            redirect('rede/login');
        }
    }
}
