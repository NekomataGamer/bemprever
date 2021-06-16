<?php

defined('BASEPATH') or exit('No direct script access allowed');

include(getcwd() . '/application/libraries/JsonParser.php');

class ApiClubeCerto
{
    private $user;
    private $token;
    private $jsonParser;
    private $CI; //instancia do codeigniter

    public function __construct(&$CI)
    {
        $this->user         = "bemprever";
        $this->token        = "bem@prever01172";
        $this->CI           = $CI[0];
        $this->jsonParser   = new JsonParser();
    }

    private function fetchCurl($url, $dados = []): ?array
    {
        $dados['user'] = $this->user;
        $dados['token'] = $this->token;
        $jsonData = "";

        foreach ($dados as $k => $v) {
            $jsonData .= ($jsonData !== "") ? "&{$k}={$v}" : "{$k}={$v}";
        }
        $url .= '?' . $jsonData;


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "charset:UTF-8"
        ]);
        $result = curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpcode == 200) {
            $data = json_decode($result, true);
            if (is_null($data) || empty($data) || !isset($data)) $data = json_decode($this->jsonParser->parseJson($result), true);

            return $data;
        } else {
            return null;
        }
    }

    private function fetchCategorias(): ?array
    {
        $dados = $this->fetchCurl("https://www.clubecerto.com.br/ws/api/1/categorias.php");

        if (!$dados) return null;

        return $dados;
    }

    private function fetchEstabelecimentos(string $codigo_categoria): ?array
    {
        $dados = $this->fetchCurl("www.clubecerto.com.br/ws/api/1/estabelecimentos.php", [
            'categoria' => $codigo_categoria
        ]);

        if (!$dados) return null;

        return $dados;
    }

    private function dadosEstabelecimentos(string $codigo_estabelecimento): ?array
    {
        $dados = $this->fetchCurl("www.clubecerto.com.br/ws/api/1/estabelecimento_dados.php", [
            'estabelecimento' => $codigo_estabelecimento
        ]);

        if (!$dados) return null;

        return $dados;
    }

    public function getCategorias(): array
    {
        $categorias = $this->CI->session->userdata('categorias');
        $last_timer = $this->CI->session->userdata('last_timer');

        if (isset($categorias) && is_array($categorias) && !empty($categorias)
        && isset($last_timer) && !empty($last_timer) && $last_timer !== "") {
           
            $now = date('Y-m-d H:i:s');
            $datetime1 = new DateTime($last_timer); //inicio
            $datetime2 = new DateTime($now); //agora
            $interval = $datetime1->diff($datetime2);

            $y = $interval->format('%Y');
            $m = $interval->format('%m');
            $d = $interval->format('%d');
            $h = $interval->format('%H');

            if ($d <= 0 && $m <= 0 && $y <= 0 && $h < 6) {
                return $categorias;
            }
        }

        $categorias = $this->fetchCategorias();

        if (!$categorias) {
            return [];
        }

        $this->CI->session->set_userdata('categorias', $categorias);
        $this->CI->session->set_userdata('last_timer', date('Y-m-d H:i:s'));

        return $categorias;
    }

    public function getEstabelecimentos(string $codigo_categoria): array
    {
        $estabelecimentos = $this->CI->session->userdata('estabelecimentos_'.$codigo_categoria);
        $last_timer = $this->CI->session->userdata('last_timer_'.$codigo_categoria);

        if (isset($estabelecimentos) && is_array($estabelecimentos) && !empty($estabelecimentos)
        && isset($last_timer) && !empty($last_timer) && $last_timer !== "") {
           
            $now = date('Y-m-d H:i:s');
            $datetime1 = new DateTime($last_timer); //inicio
            $datetime2 = new DateTime($now); //agora
            $interval = $datetime1->diff($datetime2);

            $y = $interval->format('%Y');
            $m = $interval->format('%m');
            $d = $interval->format('%d');

            if ($d <= 1 && $m <= 0 && $y <= 0) {
                return $estabelecimentos;
            }
        }

        $estabelecimentos = $this->fetchEstabelecimentos($codigo_categoria);

        if (!$estabelecimentos) {
            return [];
        }

        $this->CI->session->set_userdata('estabelecimentos_'.$codigo_categoria, $estabelecimentos);
        $this->CI->session->set_userdata('last_timer_'.$codigo_categoria, date('Y-m-d H:i:s'));

        return $estabelecimentos;
    }

    public function getDadosEstabelecimentos(string $codigo_estabelecimento): array
    {
        $estabelecimento = $this->CI->session->userdata('dado_estabelecimento_'.$codigo_estabelecimento);
        $last_timer = $this->CI->session->userdata('last_timer_dado_'.$codigo_estabelecimento);

        if (isset($estabelecimento) && is_array($estabelecimento) && !empty($estabelecimento)
        && isset($last_timer) && !empty($last_timer) && $last_timer !== "") {
           
            $now = date('Y-m-d H:i:s');
            $datetime1 = new DateTime($last_timer); //inicio
            $datetime2 = new DateTime($now); //agora
            $interval = $datetime1->diff($datetime2);

            $y = $interval->format('%Y');
            $m = $interval->format('%m');
            $d = $interval->format('%d');

            if ($d <= 1 && $m <= 0 && $y <= 0) {
                return $estabelecimento;
            }
        }

        $estabelecimento = $this->dadosEstabelecimentos($codigo_estabelecimento);

        if (!$estabelecimento) {
            return [];
        }

        $this->CI->session->set_userdata('dado_estabelecimento_'.$codigo_estabelecimento, $estabelecimento);
        $this->CI->session->set_userdata('last_timer_dado_'.$codigo_estabelecimento, date('Y-m-d H:i:s'));

        return $estabelecimento;
    }
}
