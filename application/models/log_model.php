<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of course_model
 *
 * @author Eliakim Ramos <eliakim.ramos at www.myskills.com.br>
 */
class log_model extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();

        $this->table = 'log';
    }

    public function listLog() {

        $result = array();

        $this->db->select('id_log, id_fbuid, date, descryption,points');
             
        $this->db->order_by('created', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }
    
    public function loadLog($idfbu,$date){
    	$result = array();
    	$this->db->select('id_log, id_fbuid, date, descryption,points');
    	$this->db->where('id_fbuid',$idfbu);
    	$this->db->where('date',$date);
    	$query = $this->db->get($this->table);
    	if($query->num_rows() > 0){
    		$result = $query->result_object();
    	}
    	
    	return $result;
    }

    

    public function insertLog($data = array()) {

        $this->db->trans_start();
        $this->db->insert('log', $data);
        $this->db->trans_complete();
    }

}

?>
