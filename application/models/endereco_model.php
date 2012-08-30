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

    public function loadUfs() {

        $result = array();
       
		$this->db->select('id_state, name, initials');
		$this->db->order_by('name', 'ASC');
        
        $query = $this->db->get('state');

        if ($query->num_rows() > 0) {

            $result[] = $query->result_object();
        }
        return $result;
    }

}

?>
