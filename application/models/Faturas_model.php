<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faturas_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    protected $table = 'faturas';

    public function getType($type = 'abertas'){
        
        $paga = ($type == 'abertas' || $type == 0 ) ? 0 : 1;

        echo $paga;
        return $this->db->query("SELECT ft.*,aln.id AS id_aln, aln.email AS email, aln.login AS login, aln.cpf AS cpf, aln.nome AS nome
        FROM faturas AS ft 
        INNER JOIN aluno AS aln ON aln.id=ft.id_aluno 
        WHERE ft.paga = '{$paga}' 
        ORDER BY vencimento DESC")->result_array();
    }
}