<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_controller extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->helper("url");
            $this->load->library('session');
            $this->load->library('pagination');
            $this->load->model('items_model/retrieve_item/retrieve_item_model');
            $this->load->model('user_interface/user_interface_model');
            $this->load->model('customized/customize_model');
            $this->load->model('items_model/item_category/item_category_model');
            $this->load->model('order_management/order_management_model');
            $this->load->helper(array('form', 'url'));
           
    }



	public function index()
    {
  
        $item_info = array(
            "result" => $this->retrieve_item_model->retrieve_best_selling_products(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );

        $data = array(
            'data1' => $item_info,
            'data2' => $shop_data,
            'data3' => $category,
        );

        $this->load->view('template/header_for_user_page', $shop_data );
        $this->load->view('user_page/user_page', $data );
        $this->load->view('template/footer_for_user_page');
    }

//-------------------------------------------------------------
//                  SEARCH ITEMS IN THE USERPAGE
//-------------------------------------------------------------
    // public function search_products() {
    //     $query = $this->input->get('query'); // Get the search query from the URL

    //     $item_info = array(
    //         "result" => $this->user_interface_model->search_items($query), // Call a new method in your model to perform the search
    //     );

    //     $shop_data = array(
    //         "result" => $this->customize_model->get_system_info(),
    //     );

    //     $category = array(
    //         "result" => $this->item_category_model->get_categories(),
    //     );

    //     $data = array(
    //         'data1' => $item_info,
    //         'data2' => $shop_data,
    //         'data3' => $category,
    //     );

    //     $this->load->view('template/header_for_user_page', $shop_data);
    //     $this->load->view('user_page/all_products/search_items', $data);
    //     $this->load->view('template/footer_for_user_page');
    // }


    // public function search_products()
    // {
    //     $search_text = ""; // Search text
    
    //     // Check if the search form is submitted
    //     if ($this->input->post('submit') != NULL) {
    //         $search_text = $this->input->post('search_defective_items');
    //         $this->session->unset_userdata(array("search_defective_items" => $search_text));
    //     }
    //     // Check if the search form is not submitted and there is a search text in session
    //     elseif ($this->input->post('submit') == NULL && $this->session->userdata('search_defective_items') != NULL) {
    //         $search_text = $this->session->userdata('search_defective_items');
    //     }
    
    //     $rowperpage = 5; // Row per page
    
    //     // Get the total count of records
    //     $allcount = $this->user_interface_model->get_defective_logs_count($search_text);
    
    //     // Get all records based on the search text
    //     $admin_logs_record = $this->user_interface_model->get_inactive_defective_items(0, $allcount, $search_text);
    
    //     // Store the search text in session
    //     $this->session->set_userdata('search_defective_items', $search_text);
    
    //     $shop_data = array(
    //         "result" => $this->customize_model->get_system_info(),
    //     );

    //     $category = array(
    //         "result" => $this->item_category_model->get_categories(),
    //     );

    //     $data = array(
    //         'result' => $admin_logs_record,
    //         'search' => $search_text,
    //         'data2' => $shop_data,
    //         'data3' => $category,
    //     );
    
    //     $this->load->view('template/header_for_user_page', $shop_data);
    //     $this->load->view('user_page/all_products/search_items', $data);
    //     $this->load->view('template/footer_for_user_page');
    // }
    
//     public function search_products()
// {
//     $search_text = ""; // Search text

//     // Check if the search form is submitted
//     if ($this->input->post('submit') != NULL && !empty($this->input->post('search_defective_items'))) {
//         $search_text = $this->input->post('search_defective_items');
//         $this->session->unset_userdata(array("search_defective_items" => $search_text));
//     }
//     // Check if the search form is not submitted and there is a search text in session
//     elseif ($this->input->post('submit') == NULL && $this->session->userdata('search_defective_items') != NULL) {
//         $search_text = $this->session->userdata('search_defective_items');
//     }

//     $rowperpage = 5; // Row per page

//     // Get the total count of records
//     $allcount = $this->user_interface_model->get_defective_logs_count($search_text);

//     // Get all records based on the search text
//     $admin_logs_record = $this->user_interface_model->get_inactive_defective_items(0, $allcount, $search_text);

//     // Store the search text in session
//     $this->session->set_userdata('search_defective_items', $search_text);

//     $shop_data = array(
//         "result" => $this->customize_model->get_system_info(),
//     );

//     $category = array(
//         "result" => $this->item_category_model->get_categories(),
//     );

//     $data = array(
//         'result' => $admin_logs_record,
//         'search' => $search_text,
//         'data2' => $shop_data,
//         'data3' => $category,
//     );

//         $this->load->view('template/header_for_user_page', $shop_data);
//         $this->load->view('user_page/all_products/search_items', $data);
//         $this->load->view('template/footer_for_user_page');
//     }

public function search_products()
{
    // Retrieve the search query
    $search_text = $this->input->post('search_defective_items');

    if (!empty($search_text)) {
        // Store the search query in session
        $this->session->set_userdata('search_defective_items', $search_text);
    }

    // Redirect to page 2
    redirect('display_search_results');
}



    public function display_search_results()
    {
        // Retrieve the search query from session
        $search_text = $this->session->userdata('search_defective_items');
    
        $rowperpage = 5; // Row per page
    
        // Get the total count of records
        $allcount = $this->user_interface_model->get_defective_logs_count($search_text);
    
        // Get all records based on the search text
        $admin_logs_record = $this->user_interface_model->get_inactive_defective_items(0, $allcount, $search_text);
    
        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );
    
        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );
    
        $data = array(
            'result' => $admin_logs_record,
            'search' => $search_text,
            'data2' => $shop_data,
            'data3' => $category,
        );
    
        $this->load->view('template/header_for_user_page', $shop_data);
        $this->load->view('user_page/all_products/search_items', $data);
        $this->load->view('template/footer_for_user_page');
    }







//-------------------------------------------------------------
//                  TO DISPLAY ITEMS IN THE USERPAGE
//-------------------------------------------------------------


    public function display_best_selling_products()
    {

        $item_info = array(
            "result" => $this->retrieve_item_model->retrieve_best_selling_products(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );

        $data = array(
            'data1' => $item_info,
            'data2' => $shop_data,
            'data3' => $category,
        );

        $this->load->view('template/header_for_user_page', $shop_data );
        $this->load->view('user_page/user_page', $data );
        $this->load->view('template/footer_for_user_page');
    }




    public function display_all_products()
    {

        $item_info = array(
            "result" => $this->retrieve_item_model->retrieve_all_item_for_userpage(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );

        $data = array(
            'data1' => $item_info,
            'data2' => $shop_data,
            'data3' => $category,
        );

        $this->load->view('template/header_for_user_page', $shop_data);
        $this->load->view('user_page/all_products/all_products', $data );
        $this->load->view('template/footer_for_user_page');
    }

    

    public function user_profile_order()
    {
        $order_info = array(
			"result" => $this->user_interface_model->retrieve_order(),
		);

        $order_to_recieve = array(
			"result" => $this->user_interface_model->retrieve_on_deliver_order(),
		);
        $order_completed = array(
			"result" => $this->user_interface_model->retrieve_completed_order(),
		);

        $item_info = array(
            "result" => $this->retrieve_item_model->retrieve_all_item_for_userpage(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );

        $data = array(
            'data1' => $item_info,
            'data2' => $shop_data,
            'data3' => $category,
            'data4' => $order_info,
            'data5' => $order_to_recieve,
            'data6' => $order_completed,
        );

        $this->load->view('template/header_for_user_page', $shop_data);
        $this->load->view('user_page/user_profile/my_purchase', $data );
        $this->load->view('template/footer_for_user_page');
    }


    public function user_profile_user_page()
    {
        $order_info = array(
			"result" => $this->user_interface_model->retrieve_order(),
		);

        $order_to_recieve = array(
			"result" => $this->user_interface_model->retrieve_on_deliver_order(),
		);
        $order_completed = array(
			"result" => $this->user_interface_model->retrieve_completed_order(),
		);

        $item_info = array(
            "result" => $this->retrieve_item_model->retrieve_all_item_for_userpage(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );

        $data = array(
            'data1' => $item_info,
            'data2' => $shop_data,
            'data3' => $category,
            'data4' => $order_info,
            'data5' => $order_to_recieve,
            'data6' => $order_completed,
        );

        $this->load->view('template/header_for_user_page', $shop_data);
        $this->load->view('user_page/user_profile/user_profile', $data );
        $this->load->view('template/footer_for_user_page');
    }







//-------------------------------------------------------------
//                  TO ADD ITEMS INTO THE SHOPPING CART
//-------------------------------------------------------------

    public function add_to_cart()
    {
        if ($this->session->userdata('connect') == true ){
            $sess = $this->session->userdata('user_name');
            }
            $item_id = $this->input->post('item_id');
            $customer_id = $this->input->post('customer_id');
            $item_quantity = $this->input->post('item_quantity');
            $item_price = $this->input->post('item_price');

            $order_total = $item_quantity * $item_price;

            $data = [
                'item_id' => $item_id,
                'customer_id' => $customer_id,
                'item_quantity' => $item_quantity,
                'item_price' => $order_total,
            ]; 
            
            $this->user_interface_model->insert_to_shopping_cart_db($data);
            $this->session->set_flashdata('status', 'Save Successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }

//-------------------------------------------------------------
//                  TO DISPLAY ITEMS INTO SHOPPING CART
//-------------------------------------------------------------

    public function add_to_cart_page()
    {
        $cart_info = array(
			"result" => $this->user_interface_model->retrieve_message(),
		);

        $item_info = array(
			"result" => $this->user_interface_model->retrieve_items(),
		);

        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $data = array(
            "data1" => $cart_info,
            "data2" => $item_info,
            "data3" => $category,
            "data4" => $shop_data,
        );

        $this->load->view('template/header_for_user_page' , $shop_data);
        $this->load->view('user_page/add_to_cart/add_to_cart', $data );
        $this->load->view('template/footer_for_user_page');
    }

//-------------------------------------------------------------
//                  TO DISPLAY ITEMS INTO IN EACH CATEGORY 
//-------------------------------------------------------------
    public function display_item_on_each_category(){
        $all_items = array(
                //so this code will get the data of all the items form all_Item_table
            "result" => $this->item_category_model->get_category_table(),
        );
    
        $all_category = array(
                //this code will get the data of categories_tbl
            "result" => $this->item_category_model->get_categories(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );


        $data = array(
            "data1" => $all_items,
            "data2" => $all_category,
            "data3" => $shop_data,
        );
    
        $this->load->view('template/header_for_user_page' , $shop_data);
        $this->load->view('user_page/product_category/product_category', $data);
        $this->load->view('template/footer_for_user_page');
    }


//-------------------------------------------------------------
//                  TO CHECKOUT ITEMS
//-------------------------------------------------------------





    public function check_out_item_page($id)
    {
        $cart_info = array(
			"result" => $this->user_interface_model->get_shopping_cart_Form($id),
		);

        $item_info = array(
			"result" => $this->user_interface_model->get_shopping_cart_Items(),
		);

        $data = array(
            "data1" => $cart_info,
            "data2" => $item_info,
        );

        $this->load->view('template/header_for_user_page' , $shop_data);
        $this->load->view('user_page/check_out/check_out', $data );
        $this->load->view('template/footer_for_user_page');
    }


    public function views_item_details($id)
    {
        $cart_info = array(
			"result" => $this->user_interface_model->get_shopping_cart_Form($id),
		);

        $item_info = array(
			"result" => $this->retrieve_item_model->get_item_details($id),
		);

        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $data = array(
            "data1" => $cart_info,
            "data2" => $item_info,
            "data3" => $category,
            "data4" => $shop_data,
        );

        $this->load->view('template/header_for_user_page' , $shop_data);
        $this->load->view('user_page/add_to_cart/display_item_details', $data );
        $this->load->view('template/footer_for_user_page');
    }


    public function check_out()
    {
        $cart = $this->input->post('cart');
        
        $cart_info = array(
            'cart_id' =>$cart,
        );

        $this->user_interface_model->insert_into_check_out($cart_info);
        redirect($_SERVER['HTTP_REFERER']);

    }



 

    public function get_cart_item_details($cart_id, $item_id)
    {
        $cart_info = array(
			"result" => $this->user_interface_model->get_cart_item_info($cart_id),
		);

        $item_info = array(
			"result" => $this->user_interface_model->get_item_details($item_id),
		);

        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $data = array(
            "data1" => $cart_info,
            "data2" => $item_info,
            "data3" => $category,
            "data4" => $shop_data,
        );


        $this->load->view('template/header_for_user_page' , $shop_data);
        $this->load->view('user_page/add_to_cart/cart_item_details', $data );
        $this->load->view('template/footer_for_user_page');
    }


    public function get_transac_item_details($order_item_id)
    {
        $cart_info = array(
			"result" => $this->user_interface_model->retrieve_place_order(),
		);

        $item_info = array(
			"result" => $this->user_interface_model->get_order_item_details($order_item_id),
		);

        $transac_info = array(
			"result" => $this->user_interface_model->retrieve_transaction_info(),
		);

        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );


        $data = array(
            "data1" => $cart_info,
            "data2" => $item_info,
            "data3" => $category,
            "data4" => $shop_data,
            "data5" => $transac_info,
        );

        $this->load->view('template/header_for_user_page' , $shop_data);
        $this->load->view('user_page/check_out/transaction_details', $data);
        $this->load->view('template/footer_for_user_page');
    }

//-------------------------------------------------------------
//                              UPDATE
//-------------------------------------------------------------

  public function update_add_to_cart_item(){
        // this code is for the active checkbox update 
    
        $cart_id = $this->input->post('cart_id');
        $item_quantity = $this->input->post('item_quantity');
        $item_price = $this->input->post('item_price');

        $order_total = $item_quantity * $item_price;
        $data = array(
            'item_quantity' => $item_quantity,
            'item_price' => $order_total,
        );
        $this->user_interface_model->updating_cart_item($data, $cart_id );
        $this->session->set_flashdata('status3', 'Update Successfully!');
        redirect('add_to_cart_page');
    }

    
  public function update_order_status(){
        $order_id = $this->input->post('order_id');
        $data = array(
            'status' => "Completed",
        );

        $transaction_data = array(
            'status' => "Completed",
            'order_id' => $order_id,
            'message' => "Parcel has been delivered",
        );
      

        $this->user_interface_model->updating_order_status($data, $order_id );
        $this->order_management_model->insert_order_transaction($transaction_data);
        $this->session->set_flashdata('status4', 'Update Successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }



//-------------------------------------------------------------
//                              DELETE
//-------------------------------------------------------------

    public function delete_cart_item($id){
        $this->user_interface_model->delete_cart_item_byId($id);
        redirect('add_to_cart_page');
    }


//-------------------------------------------------------------
//                              CHECK OUT
//-------------------------------------------------------------
   




    public function checkout_items() {
        // Get the checked items from the form
        $cart_ids = $this->input->post('cart');
    
        // Check if there is enough quantity for each item in the shopping cart
        foreach ($cart_ids as $cart_id) {
            $item = $this->user_interface_model->get_cart_item($cart_id);
            $item_info = $this->user_interface_model->get_item_info($item['item_id']);
            if ($item['item_quantity'] > $item_info['item_quantity']) {
                // There is not enough quantity for this item
                // Display an error message and redirect back to the cart page
                $this->session->set_flashdata('status2', 'Insufficient quantity for some items!');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    
        // Array to hold the selected items
        $selected_items = array();
    
        // Insert the checked items into the order_management table (without subtracting the quantity)
        foreach ($cart_ids as $cart_id) {
            $item = $this->user_interface_model->get_cart_item($cart_id);
            $user = $this->user_interface_model->get_user_info($item['customer_id']);
            $item_info = $this->user_interface_model->get_item_info($item['item_id']);
    
            // Add the selected item to the array
            $selected_items[] = array(
                'item_id' => $item['item_id'],
                'customer_id' => $item['customer_id'],
                'cart_id' => $item['cart_id'],
                'item_quantity' => $item['item_quantity'],
                'item_price' => $item['item_price'],
                'customer_name' => $user['user_Fname'] . ' ' . $user['user_Lname'],
                'item_name_model' => $item_info['item_name_model'],
                'item_image' => $item_info['item_image'],
                'item_brand' => $item_info['item_brand'],
                'status' => "Pending",
            );
        }
    
        // Store the selected items array in the session
        $this->session->set_userdata('selected_items', $selected_items);
    
        redirect('place_order');
    }
    











    public function place_order()
    {
        $cart_info = array(
			"result" => $this->user_interface_model->retrieve_place_order(),
		);

        $item_info = array(
			"result" => $this->user_interface_model->retrieve_items(),
		);

        $category = array(
            "result" => $this->item_category_model->get_categories(),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        

        $data = array(
            "data1" => $cart_info,
            "data2" => $item_info,
            "data3" => $category,
            "data4" => $shop_data,
        );

        $this->load->view('template/header_for_user_page' , $shop_data);
        $this->load->view('user_page/check_out/place_order', $data);
        $this->load->view('template/footer_for_user_page');
    }







public function placer_order_process() {
    // Get the checked items from the form
    $cart_ids = $this->input->post('cart');
    $payment_method = $this->input->post('payment_method');
    $address = $this->input->post('address');
    $phone_no = $this->input->post('phone_no');
   

    $address2 = $this->input->post('address2');
    $phone_no2 = $this->input->post('phone_no2');
    $customer_name2 = $this->input->post('customer_name2');

    // Group the selected items by their item_id and calculate the total quantity for each item
    $itemQuantities = [];
    foreach ($cart_ids as $cart_id) {
        $item = $this->user_interface_model->get_cart_item($cart_id);
        if (isset($itemQuantities[$item['item_id']])) {
            $itemQuantities[$item['item_id']] += $item['item_quantity'];
        } else {
            $itemQuantities[$item['item_id']] = $item['item_quantity'];
        }
    }

    // Check if there is sufficient quantity for all selected items
    $insufficientItems = [];
    foreach ($itemQuantities as $item_id => $totalQuantity) {
        $item_info = $this->user_interface_model->get_item_info($item_id);
        if ($totalQuantity > $item_info['item_quantity']) {
            // There is not enough quantity for this item
            $insufficientItems[] = $item_info['item_name_model'];
        }
    }

    if (!empty($insufficientItems)) {
        // Display an error message with the names of items with insufficient quantity
        $itemsList = implode(', ', $insufficientItems);
        $this->session->set_flashdata('status2', 'Insufficient quantity for the following items: ' . $itemsList);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Insert the checked items into the order_management table and subtract the quantity from the corresponding item in the item table
    foreach ($cart_ids as $cart_id) {
        $item = $this->user_interface_model->get_cart_item($cart_id);
        $user = $this->user_interface_model->get_user_info($item['customer_id']);
        $item_info = $this->user_interface_model->get_item_info($item['item_id']);
        
        // Check if the total quantity of this item exceeds the available quantity
        $totalQuantity = $itemQuantities[$item['item_id']];
        if ($totalQuantity > $item_info['item_quantity']) {
            // Skip this item as the total quantity exceeds the available quantity
            continue;
        }

        // Subtract the quantity from the corresponding item in the item table
        $new_quantity = $item_info['item_quantity'] - $totalQuantity;
        $this->user_interface_model->update_item_quantity($item['item_id'], $new_quantity);

        // Insert the checked items into the order_management table
        $data = array(
            'item_id' => $item['item_id'],
            'customer_id' => $item['customer_id'],
            'cart_id' => $item['cart_id'],
            'item_quantity' => $item['item_quantity'],
            'item_price' => $item['item_price'],
            // 'customer_name' => $user['user_Fname'] . ' ' . $user['user_Lname'],
            'customer_name' => ($customer_name2 !== null && $customer_name2 !== '') ? $customer_name2 : ($user['user_Fname'] . ' ' . $user['user_Lname']),
            'item_name_model' => $item_info['item_name_model'],
            'item_image' => $item_info['item_image'],
            'item_brand' => $item_info['item_brand'],
            'status' => "Pending",
            'payment_method' => $payment_method,
            // 'customer_address' => $address,
            // 'phone_number' => $phone_no,

            'customer_address' => ($address2 !== null && $address2 !== '') ? $address2 : $address,
            'phone_number' => ($phone_no2 !== null && $phone_no2 !== '') ? $phone_no2 : $phone_no,
        );

        $this->user_interface_model->insert_checkout_item($data);
        $this->session->set_flashdata('status4', 'Save Successfully!');
    }
            // Remove the checked items from the shopping cart
            $this->user_interface_model->remove_cart_items($cart_ids);
            
            // Redirect to the user's cart page
            redirect('add_to_cart_page');
}










}