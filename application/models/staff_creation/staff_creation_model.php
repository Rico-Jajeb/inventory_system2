<?php defined('BASEPATH') OR exit('No direct script access allowed');

class staff_creation_model extends CI_Model {

//-------------------------------------------------------------
//                      INSERT STAFF DATA INTO DB
//-------------------------------------------------------------
    public function insert_staff_db($staff_data)//-TO INSERT DATA INTO USER_DATA TABLE
    {
        $this->db->set($staff_data);
        return $this->db->insert('all_admin_user');
    }


}