<?php
const MAX_REDE = 4;

//RECEBER ULTIMO ALUNO CADASTRADO
function get_last_user(){
    $CI = &get_instance();

    return $CI->model->selecionaBusca('aluno', "ORDER BY id_niveis DESC LIMIT 1");
}

//RECEBER ULTIMO ID DE REDE CADASTRADO
function get_last_user_id(){
    $CI = &get_instance();
    $aluno = $CI->model->selecionaBusca('aluno', "ORDER BY id_niveis DESC LIMIT 1");
    return ($aluno) ? $aluno[0]['id_niveis'] : '';
}

//RECEBER ULTIMO ALUNO CADASTRADO EM RELAÇÃO A UM ID DE ALUNO
function get_last_user_relative($id){
    $CI = &get_instance();
    $aluno = $CI->model->selecionaBusca('aluno', "WHERE id='{$id}' ");
    if ($aluno) return $CI->model->selecionaBusca('aluno', "WHERE id_niveis LIKE '{$aluno[0]['id_niveis']}%' ORDER BY id_niveis DESC LIMIT 1");
    return array();
}


//RECEBER ULTIMO ALUNO CADASTRADO EM RELAÇÃO A UM ID DE ALUNO UM NÍVEL ABAIXO
function get_last_user_relative_one_level($id_niveis){
    $CI = &get_instance();

    $lengthat = strlen($id_niveis) + 1;
    return $CI->model->selecionaBusca('aluno', "WHERE id_niveis LIKE '{$id_niveis}%' AND LENGTH(id_niveis) = {$lengthat} ORDER BY id_niveis DESC LIMIT 1");

    return array();
}

//RECEBER ULTIMO ID DE REDE CADASTRADO EM RELAÇÃO A UM ID DE ALUNO
function get_last_user_id_relative($id){
    $CI = &get_instance();
    $aluno = $CI->model->selecionaBusca('aluno', "WHERE id='{$id}' ");
    if ($aluno){
        $check = $CI->model->selecionaBusca('aluno', "WHERE id_niveis LIKE '{$aluno[0]['id_niveis']}%' ORDER BY id_niveis DESC LIMIT 1");
        return ($check) ? $check[0]['id_niveis'] : '';
    }
    
    return '';
}

//RECEBER ULTIMO ALUNO CADASTRADO EM RELAÇÃO A UM ID DE REDE
function get_last_user_rel($id_niveis){
    $CI = &get_instance();
    return $CI->model->selecionaBusca('aluno', "WHERE id_niveis LIKE '{$id_niveis}%' ORDER BY id_niveis DESC LIMIT 1");
}

//RECEBER ULTIMO ID DE REDE CADASTRADO EM RELAÇÃO A UM ID DE REDE
function get_last_user_id_rel($id_niveis){
    $CI = &get_instance();
    $check = $CI->model->selecionaBusca('aluno', "WHERE id_niveis LIKE '{$id_niveis}%' ORDER BY id_niveis DESC LIMIT 1");
    return ($check) ? $check[0]['id_niveis'] : '';
}


//Busca o ultimo cadastro válido do id de rede atual
function get_valid_last($id_niveis, $lengthat=null){
    $CI = &get_instance();
    
    $lengthat = isset($lengthat) ? $lengthat + 1 : strlen($id_niveis) + 1;

    $busca = $CI->model->selecionaBusca('aluno', "WHERE id_niveis LIKE '{$id_niveis}%' AND LENGTH(id_niveis) = $lengthat ORDER BY id_niveis DESC LIMIT 1");
    if (!$busca) {
        $append = $id_niveis;
        for ($i=strlen($id_niveis); $i<$lengthat; $i++){
            $append .= '1';
        }
        return $append;
    }

    $substr = str_replace_first($id_niveis, '', $busca[0]['id_niveis']);

    $length = strlen($substr);
    $lC = $substr[$length - 1];
    if ($length == 1 && $lC == MAX_REDE){
        return get_valid_last($id_niveis, $lengthat);
    } else {
        for ($i=$length -1; $i>=0; $i--){
            
            $v = intval($substr[$i]);
            if ($v < MAX_REDE){
                $v++;
                $string = $substr;
                $string[$i] = $v;
                for ($j=$i+1; $j<$length; $j++){
                    $string[$j] = 1;
                }
                return $id_niveis.$string;
            }
        }
        return get_valid_last($id_niveis, $lengthat);
    }
    return false;
}


function getNewNivel($id_niveis){
    return $id_niveis . '1';
}

function getLastChar($string){
    return $string[strlen($string) - 1];
}


/* RETORNA O NÍVEL A BUSCAR USUÁRIO */
function checarNivelBusca(){
    $CI = &get_instance();
    $nivelAtual = 2;

    $maxI = 3000;
    $i=0;
    while(true){
        $nElementos = MAX_REDE ** ($nivelAtual - 2);
        $elementos = $CI->db->query("SELECT id_niveis FROM aluno WHERE id_niveis LIKE '%".MAX_REDE."' AND LENGTH(id_niveis) = $nivelAtual ")->num_rows();
        if ($elementos != $nElementos){
            return $nivelAtual;
        }
        $i++;
        $nivelAtual++;
        if ($i>$maxI) break;
    }
}

/* PERMUTA OS NÚMEROS PARA RETORNAR OS NÍVEIS COM FINAL 4 */
function permute(&$arrayNumbers, $indice, $j, $nivelBuscar, $str){
    if ($indice < $nivelBuscar){
        $i = $indice - 1;
        $str[$i] = $j;
        $arrayNumbers[$str] = $str;
        $nextIndex = ($indice + 1);

        if ($nextIndex < $nivelBuscar){
            for ($k=1; $k<=MAX_REDE; $k++){
                permute($arrayNumbers, $nextIndex, $k, $nivelBuscar, $str);
            }
        } else {
            for ($k=MAX_REDE; $k<=MAX_REDE; $k++){
                permute($arrayNumbers, $nextIndex, $k, $nivelBuscar, $str);
            }
        }
    } else {
        $indice -= 1;
        $str[$indice] = $j;
        $arrayNumbers[$str] = $str;
    }
}

//Busca o próximo cadastro válido partindo da raiz
function get_valid_last_root(){
    $CI = &get_instance();
    $nivelBuscar = checarNivelBusca();

    $str = '';
    for($i=1; $i<=$nivelBuscar; $i++){
        $str .= $i == $nivelBuscar ? ''.MAX_REDE : '1';
    }

    $numeros = [];
    for ($i=0; $i<$nivelBuscar-1; $i++){
        if ($i == 0 ){
            for ($j=MAX_REDE; $j<=MAX_REDE; $j++){
                $indice = $nivelBuscar - $i;
                permute($numeros, $indice, $j, $nivelBuscar, $str);
            }
        } else {
            for ($j=1; $j<=MAX_REDE; $j++){
                $indice = $nivelBuscar - $i;
                permute($numeros, $indice, $j, $nivelBuscar, $str);
            }
        }
    }

    $stringC = '';
    foreach($numeros as $n){
        $user = $CI->db->query("SELECT id_niveis FROM aluno WHERE id_niveis = '{$n}' ")->num_rows();
        if ($user == 0){
            $stringC = $n;
            $found = false;
            for ($i=1; $i<=MAX_REDE; $i++){
                $stringC[$nivelBuscar - 1] = $i;
                $counter = $CI->db->query("SELECT id_niveis FROM aluno WHERE id_niveis = '{$stringC}' ")->num_rows();
                if ($counter == 0){
                    $found = true;
                    break;
                }
            }
            if ($found) break;
        }
    }
    return $stringC;
}

//Busca o próximo cadastro válido do id_niveis de rede atual, caso todos os 4 primeiros ja estejam preenchidos, retorna false
function get_valid_last_rel($id_niveis){
    $lengthat = strlen($id_niveis);
    $lC = $id_niveis[$lengthat - 1];
    $lC = intval($lC);

    if ($lC >= MAX_REDE) return false;

    $c = $lC + 1;
    $substr = substr($id_niveis, 0, -1);
    return $substr . $c;
}

//Busca o próximo nível do usuário a ser cadastrado baseado no ID de usuário
function buscarNivel($id_usuario, $maxLength){
    $CI = &get_instance();
    $user = $CI->model->selecionaBusca('aluno', "WHERE id='{$id_usuario}' ");
    if (!$user) return false;

    return get_valid_last($user[0]['id_niveis']);
}

# ==================================================================================================================
#
#
//busca o próximo lugar disponível abaixo do usuário e, caso ele não exista, busca o lugar em relação à raiz forçado
function buscarNivelNovo($id_usuario){
    $CI = &get_instance();
    $user = $CI->model->selecionaBusca('aluno', "WHERE id='{$id_usuario}' ");
    if (!$user) return false;

    $ultimoUserCadastrado = get_last_user_relative_one_level($user[0]['id_niveis']);

    //caso o usuário não tenha nada no seu primeiro nível
    if (!$ultimoUserCadastrado) return $user[0]['id_niveis'].'1';

    
    $lastIndex = strlen($ultimoUserCadastrado[0]['id_niveis']) - 1; //último índice da string idniveis do usuário
    if (    $ultimoUserCadastrado[0]['id_niveis'][$lastIndex] != 4    ){

        $lastValid = get_valid_last_rel($ultimoUserCadastrado[0]['id_niveis']); //busca o próximo id disponível no nível 1
        
        if (!$lastValid) throw new Exception('Falha ao encontrar níveis de usuário!'); #se retornar false, algo de errado ocorreu
        
        return $lastValid; 
    }

    #caso todo o primeiro nível esteja preenchido, busca pela raiz o próximo disponível na rede
    return get_valid_last_root();
}


//Salva relatório de erros em alguma função
function errorCallback($callback, $descricao){
    $CI = &get_instance();
    $arr = [
        'descricao' => $descricao,
        'callback' => $callback
    ];
    $CI->model->insere('relatorio_erros', $arr);
}

/* RETORNA USUÁRIOS ATIVOS NO NÍVEL INFORMADO */
function searchActivesByLevel($id_aluno, $nivel = 1){
    $CI = &get_instance();
    $aluno = $CI->model->selecionaBusca('aluno', "WHERE id='{$id_aluno}' ");
    if (isset($aluno[0]['id'])){
        $lenghter = strlen($aluno[0]['id_niveis']);
        $lenbusca = $lenghter+$nivel;
        $searcherNv = 'AND LENGTH(id_niveis) = '.$lenbusca;
        $retorno = $CI->model->selecionaBusca("aluno",
        "WHERE id_niveis LIKE '".$aluno[0]['id_niveis']."%'
        AND id_niveis != '".$id_aluno."'
        AND ativo = '1'
        ".$searcherNv);
        return $retorno;
    }
    return false;
}

/* RETORNA USUÁRIOS ATIVOS ATÉ O NÍVEL INFORMADO ABAIXO DO ALUNO */
function searchActives($id_aluno, $nivel = 0){
    $CI = &get_instance();
    $aluno = $CI->model->selecionaBusca('aluno', "WHERE id='{$id_aluno}' ");
    if (isset($aluno[0]['id'])){
        $lenghter = strlen($aluno[0]['id_niveis']);
        $lenbusca = $lenghter+$nivel;
        $searcherNv = ($nivel != 0) ? 'AND LENGTH(id_niveis) <= '.$lenbusca : "";
        $retorno = $CI->model->selecionaBusca("aluno",
        "WHERE id_niveis LIKE '".$aluno[0]['id_niveis']."%'
        AND id_niveis != '".$id_aluno."'
        AND ativo = '1'
        ".$searcherNv);
        return $retorno;
    }
    return false;
}

/* RETORNA A PORCENTAGEM DE GANHO DE 1 ALUNO BASEADO EM 1 REGRA INSERIDA NO BANCO DE DADOS */
/* FORMATO DA REGRA DEVE SER 
    n_ativos => NUMERO DE ATIVOS QUE O USUÁRIO PRECISA TER
    ganho_pct => GANHO EM PORCENTAGEM CASO A REGRA SEJA CUMPRIDA
*/
function verifyCond($rules, $id_aluno){
    $CI = &get_instance();
    $indicados = $CI->db->query("SELECT id FROM aluno WHERE id_indicador='{$id_aluno}' ")->num_rows();
    $returnpct = 0;
    foreach($rules as $rule){
        if ($rule['n_ativos'] <= $indicados && $rule['ganho_pct'] > $returnpct){
            $returnpct = $rule['ganho_pct'];
        }
    }
    return $returnpct;
}