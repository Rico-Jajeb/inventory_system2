<?php defined('BASEPATH') OR exit('No direct script access allowed');

class delete_item_model extends CI_Model {

//-------------------------------------------------------------
//                     DELETE ITEM SECTION
//-------------------------------------------------------------
        public function delete_cpu_byId($id){
            $this->db->set($id);
            $this->db->where('item_id', $id)->delete('items_cpu');
        }
        public function delete_gpu_byId($id){
            $this->db->set($id);
            $this->db->where('item_id', $id)->delete('items_gpu');
        }
    
}