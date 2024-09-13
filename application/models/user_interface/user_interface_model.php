<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_interface_model extends CI_Model {

//-------------------------------------------------------------
//                     INSERT MESSAGE INTO DB
//-------------------------------------------------------------

    public function insert_to_shopping_cart_db($data)
    {
        $this->db->set($data);
        return $this->db->insert('shopping_cart');
    }

    public function insert_into_order_management($data)
    {
        $this->db->set($data);
        return $this->db->insert('order_management');
    }

    public function insert_into_check_out($cart_info)
    {
        $this->db->set($cart_info);
        return $this->db->insert('check_out_items');
    }


//-------------------------------------------------------------
//                     SEARCH ITEMS
//-------------------------------------------------------------

    // public function search_items($query) {
    //     // Perform the search query using the $query parameter
    //     // Modify this code according to your database structure and search logic
    //     $this->db->like('item_name_model', $query);
    //     $this->db->or_like('item_price', $query);
    //     $results = $this->db->get('all_Item_table')->result();
    //     return $results;
    // }

    // public function search_items($query) {
    //     $this->db->select('*');
    //     $this->db->from('all_Item_table');
    //     $this->db->like('item_name_model', $query);
    //     $this->db->or_like('item_price', $query);
    //     $results = $this->db->get()->result();
    
    //     return $results;
    // }
    
    
    // public function get_inactive_defective_items($rowno, $rowperpage, $search = "")
    // {
    //     $this->db->select('*');
    //     $this->db->from('all_Item_table');
    //     $this->db->where('active', 1); // added condition to retrieve only active columns with a value of 0
        
    //     if ($search != '') {
    //         $this->db->like('item_id', $search);
    //         $this->db->or_like('item_name_model', $search);
    //         $this->db->or_like('item_brand', $search);
    //         $this->db->or_like('item_category', $search);
    //         $this->db->or_like('item_quantity', $search);
    //     }
    
    //     $this->db->order_by('item_id', 'desc'); // added order by clause
    //     $this->db->limit($rowperpage, $rowno);
    //     $query = $this->db->get();
    
    //     return $query->result_array();
    // }
    
    // public function get_defective_logs_count($search = '')
    // {
    //     $this->db->select('count(*) as allcount');
    //     $this->db->from('all_Item_table');
    
    //     if ($search != '') {
    //        $this->db->like('item_id', $search);
    //        $this->db->or_like('item_name_model', $search);
    //        $this->db->or_like('item_brand', $search);
    //        $this->db->or_like('item_category', $search);

    //     }
    
    //     $query = $this->db->get();
    //     $result = $query->result_array();
    
    //     return $result[0]['allcount'];
    // }


    // public function get_inactive_defective_items($rowno, $rowperpage, $search = "")
    // {
    //     $this->db->select('*');
    //     $this->db->from('all_Item_table');
    //     $this->db->where('active', 1); // added condition to retrieve only active columns with a value of 0
        
    //     if (!empty($search)) {
    //         $this->db->group_start();
    //         $this->db->like('item_id', $search);
    //         $this->db->or_like('item_name_model', $search);
    //         $this->db->or_like('item_brand', $search);
    //         $this->db->or_like('item_category', $search);
    //         $this->db->or_like('item_quantity', $search);
    //         $this->db->group_end();
    //     }
        
    //     $this->db->order_by('item_id', 'desc'); // added order by clause
    //     $this->db->limit($rowperpage, $rowno);
    //     $query = $this->db->get();
        
    //     return $query->result_array();
    // }
    

    public function get_inactive_defective_items($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('all_Item_table');
        $this->db->where('active', 1);
    
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('item_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->or_like('item_price', $search);
            $this->db->group_end();
        } else {
            return array();
        }
    
        $this->db->order_by('item_id', 'desc');
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
    
        return $query->result_array();
    }
    
    
    
    public function get_defective_logs_count($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('all_Item_table');
        $this->db->where('active', 1); // added condition to retrieve only active columns with a value of 0
        
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('item_id', $search);
            $this->db->or_like('item_name_model', $search);
            $this->db->or_like('item_brand', $search);
            $this->db->or_like('item_price', $search);
            $this->db->or_like('item_quantity', $search);
            $this->db->group_end();
        }
        
        $query = $this->db->get();
        $result = $query->row_array();
        
        return $result['allcount'];
    }
    
    









//-------------------------------------------------------------
//                     GET MESSAGE FROM DB
//-------------------------------------------------------------

    public function retrieve_message()
    {
        $this->db->select('*');
        $this->db->from('shopping_cart');
        // $this->db->where('active', 0);

        $this->db->order_by('cart_id', 'desc');
        $query = $this->db->get();
    
        return $query->result_array();
    }

    public function retrieve_place_order()
    {
        $this->db->select('*');
        $this->db->from('check_out_items');
        // $this->db->where('active', 0);

        $this->db->order_by('check_out_id', 'desc');
        $query = $this->db->get();
    
        return $query->result_array();
    }

    public function retrieve_transaction_info()
    {
        $this->db->select('*');
        $this->db->from('order_transaction');
        // $this->db->where('active', 0);

        $this->db->order_by('transaction_id', 'desc');
        $query = $this->db->get();
    
        return $query->result_array();
    }


    public function retrieve_items()
    {
        $this->db->select('*');
        $this->db->from('all_Item_table');
        // $this->db->where('active', 0);

        $this->db->order_by('item_id', 'desc');
        $query = $this->db->get();
    
        return $query->result_array();
    }



    public function get_quantity($item_id) {
        $this->db->select('item_quantity');
        $this->db->where('item_id', $item_id);
        $query = $this->db->get('all_Item_table');
        $result = $query->row();
        return $result->item_quantity;
    }


    public function get_shopping_cart_Form($id)
    {
        return $this->db->where('cart_id', $id)->get('shopping_cart')->row_array();
    } 


    public function get_shopping_cart_Items()
    {
        $this->db->select('*');
        $this->db->from('all_Item_table');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function retrieve_order()
    {
        $this->db->select('*');
        $this->db->from('order_management');
        $this->db->where('status', 'Preparing');
        $this->db->or_where('status', 'Pending');

        $this->db->order_by('order_id', 'desc');
        $query = $this->db->get();
    
        return $query->result_array();
    }

    public function retrieve_on_deliver_order()
    {
        $this->db->select('*');
        $this->db->from('order_management');
        $this->db->where('status', 'On Delivery');

        $this->db->order_by('order_id', 'desc');
        $query = $this->db->get();
    
        return $query->result_array();
    }

    public function retrieve_completed_order()
    {
        $this->db->select('*');
        $this->db->from('order_management');
        $this->db->where('status', 'Completed');

        $this->db->order_by('order_id', 'desc');
        $query = $this->db->get();
    
        return $query->result_array();
    }
    

//-------------------------------------------------------------
//                     Update MESSAGE FROM DB
//-------------------------------------------------------------


    // Update the quantity of an item
    public function update_quantity($item_id, $new_qty) {
        $data = array(
            'item_quantity' => $new_qty
        );
        $this->db->where('item_id', $item_id);
        $this->db->update('all_Item_table', $data);
    }















    // public function get_shopping_cart_Items()
    // {
    //     return $this->db->get('all_Item_table')->row_array();
    // } 




    public function insert_checkout_item($data) {
        $this->db->insert('order_management', $data);
    }


    public function insert_order_item($data) {
        $this->db->insert('check_out_items', $data);
    }
    

    public function get_cart_item($cart_id) {
        $this->db->where('cart_id', $cart_id);
        $query = $this->db->get('shopping_cart');
        return $query->row_array();
    }

    public function get_check_out_item($cart_id) {
        $this->db->where('check_out_id', $cart_id);
        $query = $this->db->get('check_out_items');
        return $query->row_array();
    }

    public function get_user_info($cart_id) {
        $this->db->where('user_id', $cart_id);
        $query = $this->db->get('all_customer_user');
        return $query->row_array();
    }

    
    public function get_item_info($item_id) {
        $this->db->where('item_id', $item_id);
        $query = $this->db->get('all_Item_table');
        return $query->row_array();
    }
    

    // public function remove_cart_items($cart_ids){
    //     $this->db->set($cart_ids);
    //     $this->db->where('cart_id', $cart_ids)->delete('shopping_cart');
    // }

    public function remove_cart_items($cart_ids) {
        foreach ($cart_ids as $cart_id) {
            $this->db->where('cart_id', $cart_id);
            $this->db->delete('shopping_cart');
        }
    }
    public function remove_check_out_items($cart_ids) {
        foreach ($cart_ids as $cart_id) {
            $this->db->where('check_out_id', $cart_id);
            $this->db->delete('check_out_items');
        }
    }

//-------------------------------------------------------------
//                     Update MESSAGE FROM DB
//-------------------------------------------------------------


    public function update_item_quantity($item_id, $new_quantity) {
        $this->db->where('item_id', $item_id);
        $this->db->update('all_Item_table', array('item_quantity' => $new_quantity));
    }
    








//-------------------------------------------------------------
//                             GET
//-------------------------------------------------------------

    
    public function get_cart_item_info($cart_id)
    {
        return $this->db->where('cart_id', $cart_id)->get('shopping_cart')->row_array();
    } 

    public function get_item_details($item_id)
    {
        return $this->db->where('item_id', $item_id)->get('all_Item_table')->row_array();
    }

    public function get_order_item_details($order_item_id)
    {
        return $this->db->where('order_id', $order_item_id)->get('order_management')->row_array();
    }

//-------------------------------------------------------------
//                              UPDATE
//-------------------------------------------------------------


    public function updating_cart_item($data, $cart_id){
        $this->db->set($data);
        $this->db->where('cart_id', $cart_id)->update('shopping_cart',$data);
    }

    public function updating_order_status($data, $order_id){
        $this->db->set($data);
        $this->db->where('order_id', $order_id)->update('order_management',$data);
    }

//-------------------------------------------------------------
//                             DELETE
//-------------------------------------------------------------

    public function delete_cart_item_byId($id){
        $this->db->set($id);
        $this->db->where('cart_id', $id)->delete('shopping_cart');
    }


}