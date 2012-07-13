<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of recruiter_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.myskills.com>
 */
class Recruiter_model extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();

        $this->table = 'recruiter';
    }

    public function insertRecruiter($data = array()) {

        $this->db->insert($this->table, $data);
    }

    public function loadRecruiter($fbuid = null, $company = null) {

        $result = array();

        $this->db->select('id_recruiter, created, email');
        $this->db->where('lower(company)', $company);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

}

?>
