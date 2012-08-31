<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of badge_model
 *
 * @author Eliakim Ramos <Eliakim.Ramos at www.myskills.com>
 */
class Message_model extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();

        $this->table = 'message';
    }

    public function listMessages() {

        $result = array();

        $this->db->select('id_message, message, created, id_user');
        $this->db->order_by('created', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }


    public function insertMessage($data = array()) {

        $this->db->trans_start();
        $this->db->insert('message', $data);
        $this->db->trans_complete();
    }

    public function deleteMessage($idMessage) {
		try{
	        $this->db->where('id_message', $idMessage);
			$this->db->delete('message');
			return true;
		}catch (Exception $e){
			return false;
		}
    }

}

?>
