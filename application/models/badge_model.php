<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of badge_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.myskills.com>
 */
class Badge_model extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();

        $this->table = 'badge';
    }

    public function listBadges() {

        $result = array();

        $this->db->select('id_badge, name, created');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function loadBadge($idBadge) {

        $result = array();

        $this->db->select('id_badge, name, created');
        $this->db->where('id_badge', $idBadge);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }
    
    public function listBadgesProfessional($idProfessional, $idBadge) {
        
        $result = array();
        
        $this->db->select('id_professional, id_badge');
        $this->db->where('id_professional', $idProfessional);
        $this->db->where('id_badge', $idBadge);
        
        $query = $this->db->get('badges_professional');
        
        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }
        
        return $result;
    }

    public function insertBadgeProfessional($data = array()) {

        $this->db->trans_start();
        $this->db->insert('badges_professional', $data);
        $this->db->trans_complete();
    }

}

?>
