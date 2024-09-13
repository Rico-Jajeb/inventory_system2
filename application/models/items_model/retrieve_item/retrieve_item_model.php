<?php defined('BASEPATH') OR exit('No direct script access allowed');

class retrieve_item_model extends CI_Model {


//-------------------------------------------------------------
//                      RETRIEVE ITEMS  SECTION
//-------------------------------------------------------------
    
     // Fetch records
     public function get_cpu_Data($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('items_cpu');
     
         if ($search != '') {
             $this->db->like('item_id', $search);
             $this->db->or_like('item_name_model', $search);
             $this->db->or_like('item_brand', $search);
             $this->db->or_like('item_category', $search);
             $this->db->or_like('item_quantity', $search);
             $this->db->or_like('item_price', $search);
             $this->db->or_like('item_cost', $search);
             $this->db->or_like('supplier', $search);
             $this->db->or_like('date_time', $search);
         }
 
         $this->db->order_by('item_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }
 
     // Select total records
     public function get_cpu_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('items_cpu');
     
         if ($search != '') {
            $this->db->like('item_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_category', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('item_price', $search);
            $this->db->or_like('item_cost', $search);
            $this->db->or_like('supplier', $search);
            $this->db->or_like('date_time', $search);
         }
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }

//-------------------------------------------------------------
//                      RETRIEVE GPU ITEMS  SECTION
//-------------------------------------------------------------
    
     // Fetch records
     public function get_gpu_Data($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('items_gpu');
     
         if ($search != '') {
             $this->db->like('item_id', $search);
             $this->db->or_like('item_name_model', $search);
             $this->db->or_like('item_brand', $search);
             $this->db->or_like('item_category', $search);
             $this->db->or_like('item_quantity', $search);
             $this->db->or_like('item_price', $search);
             $this->db->or_like('item_cost', $search);
             $this->db->or_like('supplier', $search);
             $this->db->or_like('date_time', $search);
         }
 
         $this->db->order_by('item_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }
 
     // Select total records
     public function get_gpu_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('items_gpu');
     
         if ($search != '') {
            $this->db->like('item_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_category', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('item_price', $search);
            $this->db->or_like('item_cost', $search);
            $this->db->or_like('supplier', $search);
            $this->db->or_like('date_time', $search);
         }
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }







//-------------------------------------------------------------
//                      RETRIEVE  ITEMS  INACTIVE SECTION
//-------------------------------------------------------------
    


     // Select total records
     public function get_inactive_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('all_Item_table');
         $this->db->where('active', 0);

     
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
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }


     public function get_inactive_defective_items($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('all_Item_table');
         $this->db->where('active', 0); // added condition to retrieve only active columns with a value of 0
         
         if ($search != '') {
             $this->db->like('item_id', $search);
             $this->db->or_like('category_name', $search);
             $this->db->or_like('item_name_model', $search);
             $this->db->or_like('item_brand', $search);
             $this->db->or_like('item_description', $search);
             $this->db->or_like('item_quantity', $search);
             $this->db->or_like('item_price', $search);
             $this->db->or_like('item_cost', $search);
             $this->db->or_like('supplier', $search);

         }
     
         $this->db->order_by('item_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }
     






//-------------------------------------------------------------
//                RETRIEVE INACTIVE ITEMS 
//-------------------------------------------------------------

     public function retrieve_inactive_items()
     {
         $this->db->select('*');
         $this->db->from('all_Item_table');
         $this->db->where('active', 0);
 
         $this->db->order_by('item_id', 'desc');
         $query = $this->db->get();
     
         return $query->result_array();
     }

     public function retrieve_out_of_stock_items()
     {
         $this->db->select('COUNT(*) as total_items');
         $this->db->from('all_Item_table');
         $this->db->where('item_quantity', 0);
         $this->db->where('active', 1 );
         
         $query = $this->db->get();
         
         $result = $query->row_array();
         return $result['total_items'];
     }
     
     public function retrieve_low_of_stock_items()
     {
         $this->db->select('COUNT(*) as total_items');
         $this->db->from('all_Item_table');
         $this->db->where('item_quantity <=', 5 );
         $this->db->where('item_quantity >=', 1 );
         $this->db->where('active', 1 );
         
         $query = $this->db->get();
         
         $result = $query->row_array();
         return $result['total_items'];
     }

     public function retrieve_all_products()
     {
         $this->db->select('COUNT(*) as total_items');
         $this->db->from('all_Item_table');
         $this->db->where('active', 1 );
         
         $query = $this->db->get();
         
         $result = $query->row_array();
         return $result['total_items'];
     }

     public function sales()
     {
         $this->db->select('SUM(item_price) as total_price');
         $this->db->from('order_management');
         $this->db->where('status', "Completed");
         
         $query = $this->db->get();
         
         $result = $query->row_array();
         return $result['total_price'];
     }

     public function item_sold()
    {
        $this->db->select('COUNT(*) as total_completed_orders');
        $this->db->from('order_management');
        $this->db->where('status', "Completed");
        
        $query = $this->db->get();
        
        $result = $query->row_array();
        return $result['total_completed_orders'];
    }

     





//-------------------------------------------------------------
//                RETRIEVE ACTIVE ITEMS INTO USERPAGE SECTION
//-------------------------------------------------------------
     public function retrieve_best_selling_products()
     {
        $this->db->select('*');
        $this->db->from('all_Item_table');
        $this->db->where('active', 1);
        $this->db->where('best_selling', 1); // added condition to retrieve only active columns with a value of 1
        $this->db->where('item_quantity !=', 0); // added condition to retrieve only quantity columns with a value of not eqaul to zero
        
         
         $this->db->order_by('item_id', 'desc'); // added order by clause
         $query = $this->db->get();
     
         return $query->result_array();
     }


     public function retrieve_all_item_for_userpage()
     {
         $this->db->select('*');
         $this->db->from('all_Item_table');
         $this->db->where('active', 1); // added condition to retrieve only active columns with a value of 0
         $this->db->where('item_quantity !=', 0); // added condition to retrieve only active columns with a value of 0
         
         $this->db->order_by('item_id', 'desc'); // added order by clause
         $query = $this->db->get();
     
         return $query->result_array();
     }


     public function get_item_details($id)
     {
         return $this->db->where('item_id', $id)->get('all_Item_table')->row_array();
     }

    






}