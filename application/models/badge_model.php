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
        $this->db->order_by('created', 'DESC');

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
    
    public function listBadgesProfessional($idUser, $idBadge) {
        
        $result = array();
        
        $this->db->select('id_user, id_badge, active');
        $this->db->where('id_user', $idUser);
        $this->db->where('id_badge', $idBadge);
        
        
        $query = $this->db->get('badges_user');
        
        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }
        
        return $result;
    }
    
    public function listBadgesProfessionalByProfessional($idUser) {
        
        $result = array();
        
        $this->db->select('id_user, id_badge, active');
        $this->db->where('id_user', $idUser);
        
        $query = $this->db->get('badges_user');
        
        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }
        
        return $result;
    }
    
    public function listBadgesProfessionalByUser($idUser) {
        
        $result = array();
        
        $this->db->select('id_user, id_badge, active');
        $this->db->where('id_user', $idUser);
        
        $query = $this->db->get('badges_user');
        
        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }
        
        return $result;
    }

 public  function getImgBadgs($idBadges){
    	$img = "";
    	switch($idBadges){
    		case 1:
    			 $img = "iOSBadge100.png";
    		break;
    		case 2:
    			 $img = "php.png";
    		break;
    		case 3:
    			 $img = "androidbadges.png";
    		break;
    		case 4:
    			 $img = "php.png";
    		break;
    		case 5:
    			 $img = "campus-badge.png";
    		break;
    		case 6:
    			 $img = "java-badge.png";
    		break;
    		case 7:
    			 $img = "php5-badge.png";
    		break;
    		case 8:
    			 $img = "php53-badge.png";
    		break;
    		case 9:
    			 $img = "tryruby-badge.png";
    		break;
    		case 10:
    			 $img = "trygit-badge.png";
    		break;
    		/*case 1:
    			 $img = "iOSBadge100.png";
    		break;
    		case 1:
    			 $img = "iOSBadge100.png";
    		break;
    		case 1:
    			 $img = "iOSBadge100.png";
    		break;*/
    	}
    	return $img;
    }
    public function insertBadgeProfessional($data = array()) {

        $this->db->trans_start();
        $this->db->insert('badges_user', $data);
        $this->db->trans_complete();
    }

}

?>
