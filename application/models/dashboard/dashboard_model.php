<?php defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model {


//-------------------------------------------------------------
//                      RETRIEVE ITEMS  SECTION
//-------------------------------------------------------------
      
     // Fetch records
    //  public function get_gpu_Data($rowno, $rowperpage, $search = "")
    //  {
    //      $this->db->select('*');
    //      $this->db->from('items_cpu');
     
    //      if ($search != '') {
    //          $this->db->like('item_id', $search);
    //          $this->db->or_like('item_name_model', $search);
    //          $this->db->or_like('item_brand', $search);
    //          $this->db->or_like('item_category', $search);
    //          $this->db->or_like('item_quantity', $search);
    //          $this->db->or_like('item_price', $search);
    //          $this->db->or_like('item_cost', $search);
    //          $this->db->or_like('supplier', $search);
    //          $this->db->or_like('date_time', $search);
    //      }
 
    //      $this->db->order_by('item_id', 'desc'); // added order by clause
    //      $this->db->limit($rowperpage, $rowno);
    //      $query = $this->db->get();
     
    //      return $query->result_array();
    //  }
 

    // public function get_gpu_Data($rowno, $rowperpage, $search = "")
    // {
    //     $this->db->select('*');
    //     $this->db->from('items_cpu');
    
    //     // Add a WHERE clause to filter by quantity
    //     $this->db->where('item_quantity', 0);
    
    //     if ($search != '') {
    //         $this->db->like('item_id', $search);
    //         $this->db->or_like('item_name_model', $search);
    //         $this->db->or_like('item_brand', $search);
    //         $this->db->or_like('item_category', $search);
    //         $this->db->or_like('item_quantity', $search);
    //         $this->db->or_like('item_price', $search);
    //         $this->db->or_like('item_cost', $search);
    //         $this->db->or_like('supplier', $search);
    //         $this->db->or_like('date_time', $search);
    //     }
    
    //     $this->db->order_by('item_id', 'desc'); // added order by clause
    //     $this->db->limit($rowperpage, $rowno);
    //     $query = $this->db->get();
    
    //     return $query->result_array();
    // }


   

    public function get_out_of_stock_Data($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('all_Item_table');
        $this->db->where('item_quantity', 0);
        $this->db->where('active', 1 );

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
    


    public function get_low_of_stock_Data($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('all_Item_table');
        $this->db->where('item_quantity <=', 5 );
        $this->db->where('item_quantity >=', 1 );
        $this->db->where('active', 1 );
        if ($search != '') {
            $this->db->like('item_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('category_name', $search);
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

    public function get_all_product_Data($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('all_Item_table');
        $this->db->where('active', 1 );
        if ($search != '') {
            $this->db->like('item_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('category_name', $search);
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
         $this->db->from('all_Item_table');
         $this->db->where('active', 1 );
     
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

     public function get_out_of_stock_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('all_Item_table');
         $this->db->where('item_quantity', 0 );
         $this->db->where('active', 1 );
     
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
     public function get_low_of_stock_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('all_Item_table');
         $this->db->where('item_quantity <=', 5 );
         $this->db->where('item_quantity >=', 1 );
         $this->db->where('active', 1 );
     
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



     





}