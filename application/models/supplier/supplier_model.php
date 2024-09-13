<?php defined('BASEPATH') OR exit('No direct script access allowed');

class supplier_model extends CI_Model {

//-------------------------------------------------------------
//                      INSERT ITEMS  SECTION
//-------------------------------------------------------------
  
    public function insert_supplier_into_db($supplier_data)
    {
        $this->db->set($supplier_data);
        return $this->db->insert('tbl_all_suppliers');
    }






//-------------------------------------------------------------
//                      RETRIEVE ITEMS  SECTION
//-------------------------------------------------------------
    
     // Fetch records
     public function get_supplier_items_Data($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('tbl_all_suppliers');
     
         if ($search != '') {
             $this->db->like('all_supplier_id', $search);
             $this->db->or_like('supplier_id', $search);
             $this->db->or_like('supplier_name', $search);
             $this->db->or_like('contact_email', $search);
             $this->db->or_like('contact_phone', $search);
             $this->db->or_like('address', $search);
             $this->db->or_like('product', $search);
         }
 
         $this->db->order_by('all_supplier_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }
 
     // Select total records
     public function get_supplier_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('tbl_all_suppliers');
     
         if ($search != '') {
            $this->db->like('all_supplier_id', $search);
            $this->db->or_like('supplier_id', $search);
            $this->db->or_like('supplier_name', $search);
            $this->db->or_like('contact_email', $search);
            $this->db->or_like('contact_phone', $search);
            $this->db->or_like('address', $search);
            $this->db->or_like('product', $search);
         }
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }



//-------------------------------------------------------------
//                     DELETE SUPPLIER SECTION
//-------------------------------------------------------------
    public function delete_supplier_item_byId($id){
        $this->db->set($id);
        $this->db->where('all_supplier_id', $id)->delete('tbl_all_suppliers');
    }


//-------------------------------------------------------------
//                     GET THE DEFECTIVE ITEM  FORM 
//-------------------------------------------------------------
    public function get_supplier_Form($id)
    {
        return $this->db->where('all_supplier_id', $id)->get('tbl_all_suppliers')->row_array();
    } 



//-------------------------------------------------------------
//                      UPDATE ITEMS  SECTION
//-------------------------------------------------------------

    public function updating_supplier($product, $supplier_id){
        $this->db->set($product);
        $this->db->where('all_supplier_id', $supplier_id)->update('tbl_all_suppliers',$product);

    }


}