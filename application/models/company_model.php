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

    public function listCompanyInGroup($idGroup) {

        $result = array();
        
        $this->db->select('id_company, id_group');
        $this->db->where('id_group', $idGroup);

        $query = $this->db->get('company_group');

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }
    
 public function loadCompany($idCompany){
   		  $result = array();
        
        $this->db->select('id_company, company, created');
        $this->db->where('id_company', $idCompany);

        $query = $this->db->get('company');

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
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
