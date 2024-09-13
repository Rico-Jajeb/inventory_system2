<?php defined('BASEPATH') OR exit('No direct script access allowed');

class insert_item_model extends CI_Model {

//-------------------------------------------------------------
//                     INSERT CPU SECTION
//-------------------------------------------------------------

    public function insert_cpu_db($cpu_data)
    {
        $this->db->set($cpu_data);
        return $this->db->insert('items_cpu');
    }

    public function insert_gpu_db($cpu_data)
    {
        $this->db->set($cpu_data);
        return $this->db->insert('items_gpu');
    }


    
}