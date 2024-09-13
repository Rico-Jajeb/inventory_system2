<?php defined('BASEPATH') OR exit('No direct script access allowed');

class item_category_model extends CI_Model {

//-------------------------------------------------------------
//                     INSERT CATEGORY SECTION
//-------------------------------------------------------------

    public function insert_category_db($category_name)
    {
        $this->db->set($category_name);
        return $this->db->insert('categories_tbl');
    }


//-------------------------------------------------------------
//                     RETRIEVE CATEGORY SECTION
//-------------------------------------------------------------

    // public function get_categories(){
    //     return $this->db->get('categories_tbl')->result_array();
    //  } 

    public function get_categories(){
        $this->db->where('active', 1);
        return $this->db->get('categories_tbl')->result_array();
     } 







     public function get_category_table()
     {
         return $this->db->get('all_item_table')->result_array();
     } 



 




    public function insert_into_all_item_db($item_data)
    {
        $this->db->set($item_data);
        return $this->db->insert('all_Item_table');
    }



//-------------------------------------------------------------
//                      UPDATE CATEGORY  SECTION
//-------------------------------------------------------------

    public function get_category_Form($id)
    {
        return $this->db->where('categories_id', $id)->get('categories_tbl')->row_array();
    } 








    public function update_category_db($category, $categories_id)
    {
        $this->db->set($category);
        return $this->db->where('categories_id', $categories_id)->update('categories_tbl', $category);
    }













//-------------------------------------------------------------
//                      UPDATE ACTIVE !!!!!!!!!ITEMS!!!!!!!!!  SECTION
//-------------------------------------------------------------

    public function updating_item_active($data, $itemid){
        $this->db->set($data);
        $this->db->where('item_id', $itemid)->update('all_Item_table',$data);
    }




public function updating_active($data, $defective_id){
    $this->db->set($data);
    $this->db->where('defective_id', $defective_id)->update('tbl_defectives',$data);
}


//-------------------------------------------------------------
//                      UPDATE ACTIVE !!!!!!!!!CATEGORY!!!!!!!  SECTION
//-------------------------------------------------------------

public function updating_defective($product, $product_id){
    $this->db->set($product);
    $this->db->where('defective_id', $product_id)->update('tbl_defectives',$product);
}



public function updating_category_active($data, $categories_id){
    $this->db->set($data);
    $this->db->where('categories_id', $categories_id)->update('categories_tbl',$data);
}











//-------------------------------------------------------------
//                      RETRIEVE CATEGORY FOR DELETE  SECTION
//-------------------------------------------------------------
    
     // Fetch records
     public function get_category_items_Data($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('categories_tbl');
         $this->db->where('active', 1);

         if ($search != '') {
             $this->db->like('categories_id', $search);
             $this->db->or_like('category_name', $search);
             $this->db->or_like('category_img', $search);

         }
 
         $this->db->order_by('categories_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }
 
     



     // Select total records
     public function get_category_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('categories_tbl');
     
         if ($search != '') {
            $this->db->like('categories_id', $search);
            $this->db->or_like('category_name', $search);
            $this->db->or_like('category_img', $search);
         }
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }


//-------------------------------------------------------------
//                      RETRIEVE CATEGORY FOR DELETE  SECTION
//-------------------------------------------------------------
    

     public function get_inactive_category_items_Data($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('categories_tbl');
         $this->db->where('active', 0);

         if ($search != '') {
             $this->db->like('categories_id', $search);
             $this->db->or_like('category_name', $search);
             $this->db->or_like('category_img', $search);

         }
 
         $this->db->order_by('categories_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }











}