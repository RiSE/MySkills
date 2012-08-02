<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of course_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Group_model extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();

        $this->table = 'companygroup';
    }

    public function listGroup() {

        $result = array();

        $this->db->select('id_group, group, order');
             
        $this->db->order_by('order', 'ASC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function listGroupCompany($idCompany) {

        $result = array();
        
        $this->db->select('id_company, id_group');
        $this->db->where('id_company', $idCompany);

        $query = $this->db->get('company_group');

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

}

?>
