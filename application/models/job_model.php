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

    public function listJobs() {

        $result = array();

        $this->db->select('id_job, title, created');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function listJobsApplied($idProfessional) {

        $result = array();
        
        $this->db->select('id_professional, id_job');
        $this->db->where('id_professional', $idProfessional);

        $query = $this->db->get('jobs_professional');

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
