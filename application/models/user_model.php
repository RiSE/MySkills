<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of user_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class User_model extends CI_Model {

    private $table;

    public function __construct() {

        parent::__construct();

        $this->table = 'user';
    }

    public function insertUser($data) {

        $this->db->trans_start();

        $this->db->insert($this->table, $data);

        $this->db->trans_complete();

        return $this->db->insert_id();
    }

    public function updatesUser($data) {

        $fbuid = $data['fbuid'];

        $this->db->trans_start();

        $this->db->where('fbuid', $fbuid);

        $this->db->update($this->table, $data);

        $this->db->trans_complete();
    }

    public function loadUser($data) {

        $result = array();
        
        $this->db->select('user.id_user, user.created, user.email,user.surname, user.video_url, user.id_profile,user.name, user.fbuid, user.state,
        				   user.trainee, user.another_city, user.another_country, user.employee, user.freelancer, user.vizify_portfolio');

        if (isset($data['fbuid']) && !empty($data['fbuid'])) {

            $this->db->where('user.fbuid', $data['fbuid']);
        }

        if (isset($data['company']) && !empty($data['company'])) {

            $this->db->join('company', 'company.id_company=user.id_company', 'INNER');
            $this->db->where('lower(company.name)', $data['company']);
        }

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }
	
    public function listUserOfCourse($idCourse){
    	 $result = array();
        /* user.id_profile,*/
        $this->db->select('user.id_user, user.name, user.surname, user.fbuid, user.state, courses_user.created');
		$this->db->join('courses_user', 'courses_user.id_user=user.id_user', 'INNER');
		$this->db->join('courses', 'courses.id_course = courses_user.id_course', 'INNER');
        $this->db->where('courses.id_course', $idCourse);
        $this->db->group_by('user.state');
        $this->db->group_by('user.id_user');
        $this->db->group_by('user.name');
        $this->db->group_by('user.fbuid');
        $this->db->group_by('courses_user.created');
        $this->db->order_by('user.state', 'ASC');
        $this->db->order_by('courses_user.created', 'DESC');
        $this->db->order_by('user.name', 'ASC');
        

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }
    public function updateUser($data = array()) {

        $this->db->trans_start();

        $idUser = (int) $data['id_user'];
        unset($data['id_user']);

        $this->db->where('id_user', $idUser);

        $this->db->update($this->table, $data);

        $this->db->trans_complete();
    }

    public function loadUserOfFacebookId($fbuid = 0) {

        $result = array();

        $this->db->select('id_user, name, surname, created, email, id_profile,points');
        
        if ($fbuid > 0) {
            $this->db->where('fbuid', $fbuid);
        }
        
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function loadUserOfUserId($userid = 0) {

        $result = array();

        $this->db->select('id_user, fbuid, created, email, name, surname, id_profile,video_url,points');
        
        if ($userid > 0) {
            $this->db->where('id_user', $userid);
        }

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function listUsers() {

        $result = array();
        $Profile = array('2','3');
        $this->db->select('id_user, fbuid, points, created, name, surname, video_url');
        $this->db->where('published', "1");
        //$this->db->where('id_profile', "is null");
        $this->db->where_not_in('id_profile', $Profile);
        $this->db->order_by('points', 'DESC');
        $this->db->order_by('created', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function listProfessionals() {

        $result = array();

        $this->db->select('id_user as id_professional, fbuid, points, created, name, surname');
        $this->db->where('id_profile', 1);
        $this->db->order_by('points', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

}

?>
