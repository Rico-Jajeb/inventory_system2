<?php defined('BASEPATH') OR exit('No direct script access allowed');

class update_item_model extends CI_Model {


//-------------------------------------------------------------
//                      RETRIEVE ITEMS  SECTION
//-------------------------------------------------------------

    public function get_item_data_ById($id)
    {
        return $this->db->where('item_id', $id)->get('all_Item_table')->row_array();
    } 
    



//-------------------------------------------------------------
//                      UPDATE ITEMS  SECTION
//-------------------------------------------------------------

    public function updating_items($product, $product_id){
        $this->db->set($product);
        $this->db->where('item_id', $product_id)->update('all_Item_table',$product);

    }






    public function updating_gpu($product, $product_id){
        $this->db->set($product);
        $this->db->where('item_id', $product_id)->update('items_gpu',$product);

    }


//-------------------------------------------------------------
//                      UPDATE ITEMS  SECTION
//-------------------------------------------------------------


    public function updating_active($data, $defective_id){
        $this->db->set($data);
        $this->db->where('item_id', $defective_id)->update('all_Item_table',$data);
    }

    
    public function updating_best_selling($data, $defective_id){
        $this->db->set($data);
        $this->db->where('item_id', $defective_id)->update('all_Item_table',$data);
    }


}