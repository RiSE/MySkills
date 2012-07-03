<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of endereco_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Endereco_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function loadUfs($dados = array()) {

        $result = array();
        $data = array();

        $sql = 'SELECT * FROM uf WHERE 1=1';

        if (isset($dados['id_uf']) && !empty($dados['id_uf'])) {
            $sql .= ' AND id_uf = ?';
            $data[] = $dados['id_uf'];
        }

        $query = $this->db->query($sql, $data);

        if ($query->num_rows() > 0) {

            foreach ($query->result_object() as $row) {

                if ($row->sigla == 'OC') {
                    $row->sigla = 'Other Country';
                }

                array_push($result, $row);
            }
        }
        return $result;
    }

}

?>
