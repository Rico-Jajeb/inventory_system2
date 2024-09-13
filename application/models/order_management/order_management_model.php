<?php defined('BASEPATH') OR exit('No direct script access allowed');

class order_management_model extends CI_Model {

//-------------------------------------------------------------
//                      INSERT ITEMS  SECTION
//-------------------------------------------------------------
  
    public function insert_defective_into_db($defective_data)
    {
        $this->db->set($defective_data);
        return $this->db->insert('tbl_defectives');
    }


    public function insert_order_transaction($transaction_data)
    {
        //to insert order transaction data
        $this->db->set($transaction_data);
        return $this->db->insert('order_transaction');
    }






//-------------------------------------------------------------
//                      RETRIEVE ITEMS  SECTION
//-------------------------------------------------------------
    
     // Fetch records
     public function get_order_items_Data($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('order_management');
         $this->db->where('status', 'Preparing');
      

         if ($search != '') {
            $this->db->like('order_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('customer_name', $search);
            $this->db->or_like('customer_address', $search);
            $this->db->or_like('payment_method', $search);
         }
 
         $this->db->order_by('order_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }

     public function get_order_status_on_pending($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('order_management');
         $this->db->where('status', 'Pending');
      

         if ($search != '') {
            $this->db->like('order_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('customer_name', $search);
            $this->db->or_like('customer_address', $search);
            $this->db->or_like('payment_method', $search);
         }
 
         $this->db->order_by('order_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }
     public function get_order_status_on_delivery($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('order_management');
         $this->db->where('status', 'On Delivery');
      

         if ($search != '') {
            $this->db->like('order_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('customer_name', $search);
            $this->db->or_like('customer_address', $search);
            $this->db->or_like('payment_method', $search);
         }
 
         $this->db->order_by('order_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }

     public function get_order_status_completed($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('order_management');
         $this->db->where('status', 'Completed');
      

         if ($search != '') {
            $this->db->like('order_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('customer_name', $search);
            $this->db->or_like('customer_address', $search);
            $this->db->or_like('payment_method', $search);
         }
 
         $this->db->order_by('order_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }
 
     
     // Select total records
     public function get_order_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('order_management');
     
         if ($search != '') {
            $this->db->like('order_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('customer_name', $search);
            $this->db->or_like('customer_address', $search);
            $this->db->or_like('payment_method', $search);
         }
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }

     public function get_pending_order_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('order_management');
         $this->db->where('status', 'Pending');
     
         if ($search != '') {
            $this->db->like('order_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('customer_name', $search);
            $this->db->or_like('customer_address', $search);
            $this->db->or_like('payment_method', $search);
         }
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }

     public function get_preparing_order_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('order_management');
         $this->db->where('status', 'Preparing');
     
         if ($search != '') {
            $this->db->like('order_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('customer_name', $search);
            $this->db->or_like('customer_address', $search);
            $this->db->or_like('payment_method', $search);
         }
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }

     public function get_on_deliver_order_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('order_management');
         $this->db->where('status', 'On Delivery');
     
         if ($search != '') {
            $this->db->like('order_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('customer_name', $search);
            $this->db->or_like('customer_address', $search);
            $this->db->or_like('payment_method', $search);
         }
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }

     public function get_completed_order_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('order_management');
         $this->db->where('status', 'Completed');
     
         if ($search != '') {
            $this->db->like('order_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('customer_name', $search);
            $this->db->or_like('customer_address', $search);
            $this->db->or_like('payment_method', $search);
         }
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }





//-------------------------------------------------------------
//                     DELETE DEFECTIVE ITEM SECTION
//-------------------------------------------------------------
    public function delete_defective_item_byId($id){
        $this->db->set($id);
        $this->db->where('defective_id', $id)->delete('tbl_defectives');
    }


//-------------------------------------------------------------
//                     GET THE DEFECTIVE ITEM  FORM 
//-------------------------------------------------------------
    public function get_defective_Form($id)
    {
        return $this->db->where('defective_id', $id)->get('tbl_defectives')->row_array();
    } 



//-------------------------------------------------------------
//                      UPDATE ITEMS  SECTION
//-------------------------------------------------------------

    public function updating_defective($product, $product_id){
        $this->db->set($product);
        $this->db->where('defective_id', $product_id)->update('tbl_defectives',$product);
    }


    
    public function updating_active($data, $defective_id){
        $this->db->set($data);
        $this->db->where('defective_id', $defective_id)->update('tbl_defectives',$data);
    }


    public function updating_ordermanagement_status($data, $order_id){
        $this->db->set($data);
        $this->db->where('order_id', $order_id)->update('order_management',$data);
    }



//-------------------------------------------------------------
//                      RETRIEVE INACTIVE ITEMS  SECTION
//-------------------------------------------------------------

    public function get_inactive_defective_items($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_defectives');
        $this->db->where('active', 0); // added condition to retrieve only active columns with a value of 0
        
        if ($search != '') {
            $this->db->like('defective_id', $search);
            $this->db->or_like('item_name/model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_category', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('Notes', $search);
            $this->db->or_like('status', $search);
            $this->db->or_like('item_supplier', $search);
            $this->db->or_like('date_found', $search);
        }
    
        $this->db->order_by('defective_id', 'desc'); // added order by clause
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
    
        return $query->result_array();
    }
    









}