<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of profile_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Profile_model extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();

        $this->table = 'profile';
    }

    public function loadProfile($idProfile) {

        $result = array();

        $this->db->select('id_profile, name, created');
        $this->db->where('id_profile', $idProfile);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

}

?>
