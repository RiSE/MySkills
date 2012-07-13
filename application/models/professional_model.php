<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Professional_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.myskills.com>
 */
class Professional_model extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();

        $this->table = 'professional';
    }

    public function listProfessionals() {
        
        $result = array();

        $this->db->select('id_professional, fbuid , created');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function insertProfessional($data = array()) {

        $this->db->trans_start();
        $this->db->insert($this->table, $data);
        $this->db->trans_complete();
    }

    public function updateProfessional($data = array()) {

        $this->db->where('fbuid', $data['fbuid']);
        $this->db->update($this->table, $data);
    }

    public function loadProfessional($fbuid) {

        $result = array();
		
        $this->db->select('id_professional, created, email');
        $this->db->where('fbuid', $fbuid);
		
        $query = $this->db->get($this->table);
		
        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

}

?>
