<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of eventgroup_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Eventgroup_model extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();

        $this->table = 'eventgroup';
    }

    public function listGroup() {

        $result = array();

        $this->db->select('id_event_group, name, order');

        $this->db->order_by('order', 'ASC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

}

?>
