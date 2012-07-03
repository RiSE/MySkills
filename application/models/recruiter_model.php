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

}

?>
