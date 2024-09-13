<?php defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

//-------------------------------------------------------------
//                      SIGN_UP
//-------------------------------------------------------------
    public function sign_up_db($sign_up_data)//-TO INSERT DATA INTO USER_DATA TABLE
    {
        $this->db->set($sign_up_data);
        return $this->db->insert('user_data');
    }

    public function user_image()//TO GET THE USER_DATA
    {
        return $this->db->get('user_data')->result_array();
    }


//-------------------------------------------------------------
//                      LOGIN
//-------------------------------------------------------------
    public function fetch_user_details($user_name, $password)//-TO GET THE DATA FROM USER_DATA TABLE
    {
        return $this->db->where('user_name', $user_name)->where('password', $password)->get('user_data');
    }

}