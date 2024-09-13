<?php defined('BASEPATH') OR exit('No direct script access allowed');

class black_jack_model extends CI_Model {

//-------------------------------------------------------------
//                      SIGN_UP
//-------------------------------------------------------------

    public function bets($data) //insert
    {
        $this->db->insert('black_jack', $data);
    }

    // public function get_cards()
    // {
    //    return $this->db->get('black_jack')->result_array();
    // }

    public function get_latest_card()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get('black_jack')->result_array();
    }
}