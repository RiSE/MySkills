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

        $result1 = array();
        $result = array();
        
        $this->db->select('id_company');
        $this->db->where('id_company_group', $idGroup);

        $query = $this->db->get('groups_company');

        if ($query->num_rows() > 0) {
            $result1 = $query->result_object();
            foreach ($result1 as $dadosresult1){
            	$aux[] = $dadosresult1->id_company;
            }
	       
	        $aux = implode(",",$aux);
	        
	        $sql="select * from company where id_company in (".$aux.")and published = 1 order by company";
	        $query = $this->db->query($sql);
	        $objResult = $query->result();
	        if (!empty($objResult)) {
	            $result = $objResult;
	        }else{
	        	$result = "";
	        }
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
