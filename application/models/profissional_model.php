<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Profissional_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Profissional_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insertProfissional($data = array()) {
        
        $this->db->insert('profissional', $data);
    }
    
    public function updateProfissional($data = array()) {
        
        $this->db->where('fbuid', $data['fbuid']);
        $this->db->update('profissional', $data);
    }
}

?>
