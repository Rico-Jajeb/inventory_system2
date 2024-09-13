<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_management_controller extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->helper("url");
            $this->load->library('session');
            $this->load->library('pagination');
            $this->load->model('defectives/defective_model');
            $this->load->model('items_model/item_category/item_category_model');
            $this->load->model('order_management/order_management_model');
            $this->load->model('customized/customize_model');
            $this->load->helper(array('form', 'url'));
    }




	public function index()
    {
      
    }

//-------------------------------------------------------------
//                  DEFECTIVES TABLES
//-------------------------------------------------------------


	public function orders_table($rowno=0)
    {
        $search_text = "";// Search text

            // Check if the search form is submitted
            if($this->input->post('submit') != NULL )
            {
                $search_text = $this->input->post('search_order_items');
                $this->session->unset_userdata(array("search_order_items"=>$search_text));
            }
            // Check if the search form is not submitted and there is a search text in session
            elseif($this->input->post('submit') == NULL && $this->session->userdata('search_order_items') != NULL)
            {
                $search_text = $this->session->userdata('search_order_items');
            }

            $rowperpage = 5;// Row per page

            // Check if the row position is specified
            if($rowno != 0)
            {
                $rowno = ($rowno-1) * $rowperpage;
            }

            // Get the total count of records
            $allcount = $this->order_management_model->get_preparing_order_logs_count($search_text);

            // Get the records based on the search text, row position and number of rows per page
            $admin_logs_record = $this->order_management_model->get_order_items_Data($rowno, $rowperpage, $search_text);

            // Pagination Configuration
            $config['base_url'] = base_url('index.php/features/order_management/Order_management_controller/orders_table');
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $allcount;
            $config['per_page'] = $rowperpage;
            $config['num_links'] = 1;
            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);

            // Generate pagination links
            $pagination_links = $this->pagination->create_links();

            // Store the search text in session
            $this->session->set_userdata('search_order_items', $search_text);

            $shop_data = array(
                "result" => $this->customize_model->get_system_info(),
            );
            // Load view with data
            $data = array(
                "pagination" => $pagination_links,
                "result" => $admin_logs_record,
                "row" => $rowno,
                "search" => $search_text,
                "data2" => $shop_data,
            );

            $this->load->view('template/header', $shop_data);
            $this->load->view('features/order_management/order_management', $data);
            $this->load->view('template/footer');
   
    }

	public function orders_complete_table($rowno=0)
    {
        $search_text = "";// Search text

            // Check if the search form is submitted
            if($this->input->post('submit') != NULL )
            {
                $search_text = $this->input->post('search_order_items');
                $this->session->unset_userdata(array("search_order_items"=>$search_text));
            }
            // Check if the search form is not submitted and there is a search text in session
            elseif($this->input->post('submit') == NULL && $this->session->userdata('search_order_items') != NULL)
            {
                $search_text = $this->session->userdata('search_order_items');
            }

            $rowperpage = 5;// Row per page

            // Check if the row position is specified
            if($rowno != 0)
            {
                $rowno = ($rowno-1) * $rowperpage;
            }

            // Get the total count of records
            $allcount = $this->order_management_model->get_completed_order_logs_count($search_text);

            // Get the records based on the search text, row position and number of rows per page
            $admin_logs_record = $this->order_management_model->get_order_status_completed($rowno, $rowperpage, $search_text);

            // Pagination Configuration
            $config['base_url'] = base_url('index.php/features/order_management/Order_management_controller/orders_complete_table');
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $allcount;
            $config['per_page'] = $rowperpage;
            $config['num_links'] = 1;
            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);

            // Generate pagination links
            $pagination_links = $this->pagination->create_links();

            // Store the search text in session
            $this->session->set_userdata('search_order_items', $search_text);

            $shop_data = array(
                "result" => $this->customize_model->get_system_info(),
            );
            // Load view with data
            $data = array(
                "pagination" => $pagination_links,
                "result" => $admin_logs_record,
                "row" => $rowno,
                "search" => $search_text,
                "data2" => $shop_data,
            );

            $this->load->view('template/header', $shop_data);
            $this->load->view('features/order_management/complete_order/complete_order_management', $data);
            $this->load->view('template/footer');
   
    }

	public function orders_on_delivery($rowno=0)
    {
        $search_text = "";// Search text

            // Check if the search form is submitted
            if($this->input->post('submit') != NULL )
            {
                $search_text = $this->input->post('search_order_items');
                $this->session->unset_userdata(array("search_order_items"=>$search_text));
            }
            // Check if the search form is not submitted and there is a search text in session
            elseif($this->input->post('submit') == NULL && $this->session->userdata('search_order_items') != NULL)
            {
                $search_text = $this->session->userdata('search_order_items');
            }

            $rowperpage = 5;// Row per page

            // Check if the row position is specified
            if($rowno != 0)
            {
                $rowno = ($rowno-1) * $rowperpage;
            }

            // Get the total count of records
            $allcount = $this->order_management_model->get_on_deliver_order_logs_count($search_text);

            // Get the records based on the search text, row position and number of rows per page
            $admin_logs_record = $this->order_management_model->get_order_status_on_delivery($rowno, $rowperpage, $search_text);

            // Pagination Configuration
            $config['base_url'] = base_url('index.php/features/order_management/Order_management_controller/orders_on_delivery');
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $allcount;
            $config['per_page'] = $rowperpage;
            $config['num_links'] = 1;
            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);

            // Generate pagination links
            $pagination_links = $this->pagination->create_links();

            // Store the search text in session
            $this->session->set_userdata('search_order_items', $search_text);

            $shop_data = array(
                "result" => $this->customize_model->get_system_info(),
            );
            // Load view with data
            $data = array(
                "pagination" => $pagination_links,
                "result" => $admin_logs_record,
                "row" => $rowno,
                "search" => $search_text,
                "data2" => $shop_data,
            );

            $this->load->view('template/header', $shop_data);
            $this->load->view('features/order_management/on_delivery/deliver_order_management', $data);
            $this->load->view('template/footer');
   
    }


	public function orders_on_pending($rowno=0)
    {
        $search_text = "";// Search text

            // Check if the search form is submitted
            if($this->input->post('submit') != NULL )
            {
                $search_text = $this->input->post('search_order_items');
                $this->session->unset_userdata(array("search_order_items"=>$search_text));
            }
            // Check if the search form is not submitted and there is a search text in session
            elseif($this->input->post('submit') == NULL && $this->session->userdata('search_order_items') != NULL)
            {
                $search_text = $this->session->userdata('search_order_items');
            }

            $rowperpage = 5;// Row per page

            // Check if the row position is specified
            if($rowno != 0)
            {
                $rowno = ($rowno-1) * $rowperpage;
            }

            // Get the total count of records
            $allcount = $this->order_management_model->get_pending_order_logs_count($search_text);

            // Get the records based on the search text, row position and number of rows per page
            $admin_logs_record = $this->order_management_model->get_order_status_on_pending($rowno, $rowperpage, $search_text);

            // Pagination Configuration
            $config['base_url'] = base_url('index.php/features/order_management/Order_management_controller/orders_on_pending');
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $allcount;
            $config['per_page'] = $rowperpage;
            $config['num_links'] = 1;
            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);

            // Generate pagination links
            $pagination_links = $this->pagination->create_links();

            // Store the search text in session
            $this->session->set_userdata('search_order_items', $search_text);

            $shop_data = array(
                "result" => $this->customize_model->get_system_info(),
            );
            // Load view with data
            $data = array(
                "pagination" => $pagination_links,
                "result" => $admin_logs_record,
                "row" => $rowno,
                "search" => $search_text,
                "data2" => $shop_data,
            );

            $this->load->view('template/header', $shop_data);
            $this->load->view('features/order_management/pending_order/pending_order', $data);
            $this->load->view('template/footer');
   
    }





//-------------------------------------------------------------
//                  TO INSERT DATA INTO DEFECTIVES
//-------------------------------------------------------------



//-------------------------------------------------------------
//                      DELETE DEFECTIVE ITEM DATA
//-------------------------------------------------------------




   
//-------------------------------------------------------------
//                       GET DEFECTIVE ITEM DETAILS
//-------------------------------------------------------------



//-------------------------------------------------------------
//                       UPDATE  ITEM DETAILS
//-------------------------------------------------------------

 



    // public function update_ordermanegement_status(){
    //     $order_id = $this->input->post('order_id');
    //     $status = $this->input->post('status2');

    //     $data = array(
    //         'status' => $status,
    //     );

    //     $transaction_data = array(
    //         'status' => $status,
    //         'order_id' => $order_id,
    //         'message' => 'Your parcel has been picked up by our logistics partner',
    //     );
      
    //     $this->order_management_model->updating_ordermanagement_status($data, $order_id );

    //     $this->order_management_model->insert_order_transaction($transaction_data);

    //     $this->session->set_flashdata('status4', 'Update Successfully!');
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

    public function update_ordermanegement_status(){
        $order_id = $this->input->post('order_id');
        $status = $this->input->post('status2');
    
        $data = array(
            'status' => $status,
        );
    
        $message = '';
    
        if ($status === 'Preparing') {
            $message = 'Sender is preparing to ship your parcel';
        } elseif ($status === 'On Delivery') {
            $message = 'Your parcel has been picked up by our logistics partner and is now on its way.';
        } elseif ($status === 'Completed') {
            $message = 'Parcel has been delivered';
        }
    
        $transaction_data = array(
            'status' => $status,
            'order_id' => $order_id,
            'message' => $message,
        );
      
        $this->order_management_model->updating_ordermanagement_status($data, $order_id );
    
        $this->order_management_model->insert_order_transaction($transaction_data);
    
        $this->session->set_flashdata('status4', 'Update Successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }
    
//-------------------------------------------------------------
//                       UPDATE  ACTIVE 
//-------------------------------------------------------------


//-------------------------------------------------------------
//                       DEFECTIVE INACTIVE TABLE SECTION
//-------------------------------------------------------------



}