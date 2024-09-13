<?php defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

//-------------------------------------------------------------
//                      SIGN_UP
//-------------------------------------------------------------
    public function sign_up_db($sign_up_data)//-TO INSERT DATA INTO USER_DATA TABLE
    {
        $this->db->set($sign_up_data);
        return $this->db->insert('all_customer_user');
    }

    public function user_image()//TO GET THE USER_DATA
    {
        return $this->db->get('user_data')->result_array();
    }


//-------------------------------------------------------------
//                      LOGIN
//-------------------------------------------------------------

    public function fetch_user_details($username, $password)//-TO GET THE DATA FROM ALL_CUSTOMER_USER TABLE
    {
        return $this->db->where('user_name', $username)->where('user_password', $password)->get('all_customer_user');
    }

    public function fetch_admin_details($username, $password)//-TO GET THE DATA FROM ALL_ADMIN_USER TABLE
    {
        return $this->db->where('admin_username', $username)->where('admin_password', $password)->get('all_admin_user');
    }

    // public function fetch_admin_details($username, $password)//-TO GET THE DATA FROM ALL_ADMIN_USER TABLE
    // {
    //     return $this->db->where('admin_username', $username)->where('admin_password', $password)->get('all_admin_user');
    // }


//-------------------------------------------------------------
//                      AUDIT TRAIL
//-------------------------------------------------------------


    public function insert_admin_audit($data){
        $this->db->set($data);
        return $this->db->insert('audit_trail_admin');
    }


    public function insert_user_audit($data){
        $this->db->set($data);
        return $this->db->insert('audit_trail_user');
    }




    // public function retrieve_admin_data()
    // {
    //     $query = $this->db->select('admin_id')->get('all_admin_user');
    //     $result = $query->result_array();
    //     $admin_ids = array();
    //     foreach ($result as $row) {
    //         $admin_ids[] = $row['admin_id'];
    //     }
    //     return $admin_ids;
    // }
    

    // public function fetch_user_details($user_name, $password)//-TO GET THE DATA FROM USER_DATA TABLE
    // {
    //     return $this->db->where('user_name', $user_name)->where('password', $password)->get('user_data');
    // }

}