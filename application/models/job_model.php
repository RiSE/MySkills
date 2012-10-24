<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of job_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Job_model extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();

        $this->table = 'job';
    }

    public function listJobs($data = array()) {
        
        $result = array();

        $this->db->select('id_job, title, created');
        
        if (isset($data['id_user']) && !empty($data['id_user'])) {
            $this->db->where('id_user', $data['id_user']);
            
        }        
        $this->db->where('published', '1');
        if (isset($data['exist']) && $data['exist'] == false) {
            $this->db->limit(0, 0);
        }
        
        $this->db->order_by('created', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }
    public function listJobsInMyJobs($data = array()) {
        
        $result = array();

        $this->db->select('id_job, title,description, created, published, period');
        
        if (isset($data['id_user']) && !empty($data['id_user'])) {
            $this->db->where('id_user', $data['id_user']);
            
        }        
        if (isset($data['id_job']) && !empty($data['id_job'])) {
            $this->db->where('id_job', $data['id_job']);
            
        }        
        
        if (isset($data['exist']) && $data['exist'] == false) {
            $this->db->limit(0, 0);
        }
        
        $this->db->order_by('created', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }
	public function listJobsAppliedUserWithFeddback($idUser){
		$result = array();
		
		$this->db->select("job.title,jobs_user.status,job.period,job.id_job,jobs_user.id_user,job.id_user as idRecruter");
		//$this->db->select("*");
		$this->db->from("job");
		$this->db->join("jobs_user","jobs_user.id_job = job.id_job");
		//$this->db->join("job_message","job.id_job = job_message.id_job");
		$this->db->where("jobs_user.id_user",$idUser);
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
		
	}
   
    public function listJobsAppliedUser($idUser , $idJob = null) {

        $result = array();
        
        $this->db->select('id_user, id_job, status');
        $this->db->where('id_user', $idUser);
        
        if (isset($idJob) && !empty($idJob)) {
            $this->db->where('id_job', $idJob);
        }

        $query = $this->db->get('jobs_user');

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function listJobsAppliedUserByJob($idJob = null) {

        $result = array();
        
        $this->db->select('id_user, id_job, status');
                
        if (isset($idJob) && !empty($idJob)) {
            $this->db->where('id_job', $idJob);

        }
		
        $query = $this->db->get('jobs_user');

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    
    
    public function insertJobUser($data = array()) {

        $this->db->trans_start();
        $this->db->insert('jobs_user', $data);
        $this->db->trans_complete();
    }
    
    public function insertJobMessage($data = array()) {

        $this->db->trans_start();
        $this->db->insert('job_message', $data);
        $this->db->trans_complete();
    }
    
    public function insertJob($data = array()) {

        $this->db->trans_start();
        $this->db->insert('job', $data);
        $this->db->trans_complete();
    }
    
    public function deleteJob($idJob) {

        $this->db->where('id_job', $idJob);
		$this->db->delete('job');
    }
	
	public function updatesJobUser($data) {
	
	        $this->db->trans_start();
	        if(!empty($data['id_user'])){
	        	$this->db->where('id_user', $data['id_user']);
	        }
	        if(!empty($data['id_job'])){
	        	$this->db->where('id_job', $data['id_job']);
	        }
	        $this->db->update('jobs_user', $data);
	        $this->db->trans_complete();
	}
	
	public function updatesJob($data) {

        $this->db->trans_start();
        
        if(!empty($data['id_job'])){
        	$this->db->where('id_job', $data['id_job']);
        }
        $this->db->update('job', $data);
        $this->db->trans_complete();
    }
	
    public function updatesJobMessage($data) {

        $this->db->trans_start();
        
        if(!empty($data['id_job_message'])){
        	$this->db->where('id_job_message', $data['id_job_message']);
        }
        $this->db->update('job_message', $data);
        $this->db->trans_complete();
    }
    
	public function listMessageJobByUserDeveloper($idUserDev){
			$result = 0;
	        
	        $this->db->select('count(*) as qtd');
	                
	        $this->db->where('id_user_recebeu', $idUserDev);
	        $this->db->where('read','0');
	        $query = $this->db->get('job_message');
	
	        if ($query->num_rows() > 0) {
	            $result = $query->result_object();
	        }
	
	        return $result;
	}

	public function listMessageJobByJob($job,$iduser){
		$result = 0;
        
        $this->db->select('count(*) as qtd');
                
        $this->db->where('id_job', $job);
        $this->db->where('id_user_recebeu', $iduser);
        $this->db->where('read', '0');
        $query = $this->db->get('job_message');

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
	}

	public function seeMessageJobByJob($job,$iduser){
			$result = 0;
	        
	        $this->db->select('*');
	                
	        $this->db->where('id_job', $job);
	        $this->db->where('id_user_recebeu', $iduser);
	        $this->db->order_by("created", "asc");
	        $query = $this->db->get('job_message');
	
	        if ($query->num_rows() > 0) {
	            $result = $query->result_object();
	        }
	
	        return $result;
	}

}

?>
