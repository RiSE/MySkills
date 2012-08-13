<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of event_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Event_model extends CI_Model {

    private $table;

    public function __construct() {

        parent::__construct();

        $this->table = 'event';
    }

    public function listEvents($data = array()) {

        $result = array();

        $this->db->select('id_event, name, description, created');

        if (isset($data['id_event']) && !empty($data['id_event'])) {
            $this->db->where('id_event', $data['id_event']);
        }

        if (isset($data['name']) && !empty($data['name'])) {
            $this->db->where('LOWER(name)', $data['name']);
        }

        $this->db->order_by('created', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }
    
    public function listEventInGroup($idEventGroup = 0) {
        
        $result = array();
        
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('groups_event', 'event.id_event=groups_event.id_event', 'INNER');
        
        if ($idEventGroup > 0) {
            $this->db->where('groups_event.id_event_group', $idEventGroup);
        }
        
        $result = $this->db->get()->result_object();
        
        return $result;
    } 

}

?>
