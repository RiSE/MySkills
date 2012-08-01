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

    public function listJobsApplied($idProfessional , $idJob = null) {

        $result = array();
        
        $this->db->select('id_professional, id_job');
        $this->db->where('id_professional', $idProfessional);
        
        if (isset($idJob) && !empty($idJob)) {
            $this->db->where('id_job', $idJob);
        }

        $query = $this->db->get('jobs_professional');

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }
    
    public function listJobsAppliedUser($idUser , $idJob = null) {

        $result = array();
        
        $this->db->select('id_user, id_job');
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

    public function insertJobProfessional($data = array()) {

        $this->db->trans_start();
        $this->db->insert('jobs_professional', $data);
        $this->db->trans_complete();
    }

}

?>
