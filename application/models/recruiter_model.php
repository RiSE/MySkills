<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of recruiter_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Recruiter_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertRecruiter($data = array()) {

        $this->db->insert('recrutador', $data);
    }

}

?>
