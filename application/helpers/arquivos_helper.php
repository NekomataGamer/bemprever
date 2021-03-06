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

function removeDocumento($id_documento)
{
    $CI = &get_instance();
    $doc = $CI->model->selecionaBusca('documento_termos', "WHERE id='{$id_documento}' ");
    if (isset($doc[0]['id'])) {
        $CI->model->remove('documento_termos', $doc[0]['id']);
        $arrayRemoval = (strpos($doc[0]['root'], ';') !== false) ? explode(";", $doc[0]['root']) : [$doc[0]['root']];

        foreach ($arrayRemoval as $remove) {
            if (file_exists($remove)) {
                unlink($remove);
            }
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

    return 'uploads/' . $arr[1];
}



function uploadByBase64($rootPath, $documentos)
{
    $retorno = null;

    if ($documentos && is_array($documentos)) {
        $dataSendFullPath = [];
        $dataSendFileName = [];
        if (!is_dir($rootPath)) {
            mkdir($rootPath, 0777, TRUE);
        }
        for ($i = 0; $i < count($documentos); $i++) {
            $doc = $documentos[$i];
            $baseDataFormat = explode(',', $doc)[0];
            $baseDataOptions = explode('/', $baseDataFormat);
            $baseDataType = str_replace("data:", "", $baseDataOptions[0]);
            $baseDataExt = str_replace(";base64", "", $baseDataOptions[1]);

            if ($baseDataType !== "image") {
                throw new Exception("Tipo de arquivo inv??lido!");
            } else if ($baseDataExt !== "jpeg" && $baseDataExt !== "png" && $baseDataExt !== "gif" && $baseDataExt !== "jpg") {
                throw new Exception("Formato de arquivo inv??lido!");
            }

            $number = $i + 1;
            $fileName = (new Datetime())->format('U') . "-doc-assinado-(" . $number . ")." . $baseDataExt;
            $output_file = $rootPath . $fileName;

            if (file_put_contents($output_file, file_get_contents($doc))) {
                $dataSendFullPath[] = $output_file;
                $dataSendFileName[] = $fileName;
            }
        }

        $retorno['full_path'] = implode(';', $dataSendFullPath);
        $retorno['file_name'] = implode(';', $dataSendFileName);
    }

    return $retorno;
}
