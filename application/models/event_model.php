<?php defined('BASEPATH') OR exit('No direct script access allowed');

class event_model extends CI_Model {

//-------------------------------------------------------------
//                     INSERT MESSAGE INTO DB
//-------------------------------------------------------------

    public function insert_gc_message_db($data)
    {
        $this->db->set($data);
        return $this->db->insert('group_chat_tb');
    }

//-------------------------------------------------------------
//                     GET MESSAGE FROM DB
//-------------------------------------------------------------

    public function retrieve_message()
    {
       return $this->db->get('group_chat_tb')->result_array();
    }

}