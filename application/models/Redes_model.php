<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Redes_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    

    public function getCadastrosPendentes() {
        $query = $this->db->query("SELECT aln.*, doc.id_aluno, doc.root, doc.arquivo FROM aluno as aln 
        LEFT JOIN documento_termos as doc ON doc.id_aluno = aln.id
        WHERE aln.cadastro_confirmado = 0
        AND tipo='rede' ");

        return $query->result_array();
    }


    public function getUsuarios() {
        $query = $this->db->query("SELECT aln.*, doc.id_aluno, doc.root, doc.arquivo FROM aluno as aln 
        LEFT JOIN documento_termos as doc ON doc.id_aluno = aln.id
        WHERE aln.cadastro_confirmado = 1
        AND tipo='rede' ");

        return $query->result_array();
    }
}