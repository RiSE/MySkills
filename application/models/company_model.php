<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of company_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Company_model extends CI_Model {

    private $table;

    public function __construct() {

        parent::__construct();

        $this->table = 'company';
    }

    public function listCompanies($data = array()) {

        $result = array();

        $this->db->select('id_company, company , created');
        
        if (isset($data['id_company']) && !empty($data['id_company'])) {
            $this->db->where('id_company', $data['id_company']);
        }
        
        if (isset($data['name']) && !empty($data['name'])) {
            $this->db->where('LOWER(company)', $data['name']);
        }
                
        $this->db->order_by('created', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

}

?>
