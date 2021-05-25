<?php

function upload_files($nome, $path, $rootpath, $field = 'arquivos')
{
    $CI = &get_instance();
    $config = array(
        'upload_path'   => $path
    );
    $config['allowed_types'] = 'gif|jpg|png|jpeg|xls|txt|doc|docx|bmp|ppt|psd|zip|rar';

    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);
    $retorno = array();

    if (isset($_FILES[$field])) {

        if (!is_dir($rootpath)) {
            mkdir($rootpath, 0777, TRUE);
        }

        $files = $_FILES;
        $cpt = count($_FILES[$field]['name']);

        for ($i = 0; $i < $cpt; $i++) {

            $name = time() . $files[$field]['name'][$i];
            $_FILES[$field]['name'] = $name;
            $_FILES[$field]['type'] = $files[$field]['type'][$i];
            $_FILES[$field]['tmp_name'] = $files[$field]['tmp_name'][$i];
            $_FILES[$field]['error'] = $files[$field]['error'][$i];
            $_FILES[$field]['size'] = $files[$field]['size'][$i];

            if (!($CI->upload->do_upload($field)) || $files[$field]['error'][$i] != 0) {
                return array();
            } else {
                $retorno[] = $name;
            }
        }
    } else {
        return false;
    }

    return $retorno;
}


function upload_file($path, $rootpath, $field = 'arquivos')
{
    $CI = &get_instance();
    $config = array(
        'upload_path'   => $path
    );
    $config['allowed_types'] = 'gif|jpg|png|jpeg|xls|txt|doc|docx|bmp|ppt|psd|zip|rar';

    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);
    $retorno = array();

    if (isset($_FILES[$field])) {
        if (!is_dir($rootpath)) {
            mkdir($rootpath, 0777, TRUE);
        }

        if (!$CI->upload->do_upload($field)) return false;

        return $CI->upload->data();
    } else {
        return false;
    }

    return $retorno;
}

function removeDocumento($id_documento) {
    $CI = &get_instance();
    $doc = $CI->model->selecionaBusca('documento_termos', "WHERE id='{$id_documento}' ");
    if (isset($doc[0]['id'])) {
        $CI->model->remove('documento_termos', $doc[0]['id']);
        if (file_exists($doc[0]['root'])) {
            unlink($doc[0]['root']);
        }
    }
}

function getRootDocumentos($cpfAluno)
{
    return ROOT_PATH . '/uploads/documentos/' . preg_replace('/[^0-9]/', '', $cpfAluno) . '/';
}

function getPathDocumentos($cpfAluno)
{
    return ROOT_PATH . '/uploads/documentos/' . preg_replace('/[^0-9]/', '', $cpfAluno) . '/';
}

function getDocumento($documento, $cpfAluno)
{
    return ROOT_PATH . '/uploads/documentos/' . preg_replace('/[^0-9]/', '', $cpfAluno) . '/' . $documento;
}

function getDocumentoByRoot($documentoRoot): ?string
{
    $arr = explode('uploads/', $documentoRoot);
    if (!isset($arr[1])) return null;

    return 'uploads/'.$arr[1];
}