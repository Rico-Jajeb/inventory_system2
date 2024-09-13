<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class retrieve_items_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper("url");
                $this->load->library('session');
                $this->load->library('pagination');
                $this->load->model('items_model/retrieve_item/retrieve_item_model');
                $this->load->model('items_model/item_category/item_category_model');
                $this->load->model('customized/customize_model');
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('template/header');
                $this->load->view('features/items/item_table/cpu_table');
                $this->load->view('template/footer');
        }



//-------------------------------------------------------------
//                      RETRIEVE CPU DATA
//-------------------------------------------------------------


        public function retrieve_cpu_data($rowno=0)
        {
            $search_text = "";// Search text

            // Check if the search form is submitted
            if($this->input->post('submit') != NULL )
            {
                $search_text = $this->input->post('search_cpu_items');
                $this->session->unset_userdata(array("search_cpu_items"=>$search_text));
            }
            // Check if the search form is not submitted and there is a search text in session
            elseif($this->input->post('submit') == NULL && $this->session->userdata('search_cpu_items') != NULL)
            {
                $search_text = $this->session->userdata('search_cpu_items');
            }

            $rowperpage = 5;// Row per page

            // Check if the row position is specified
            if($rowno != 0)
            {
                $rowno = ($rowno-1) * $rowperpage;
            }

            // Get the total count of records
            $allcount = $this->retrieve_item_model->get_cpu_logs_count($search_text);

            // Get the records based on the search text, row position and number of rows per page
            $admin_logs_record = $this->retrieve_item_model->get_cpu_Data($rowno, $rowperpage, $search_text);

            // Pagination Configuration
            $config['base_url'] = base_url('index.php/features/items_cont/retrieve_item/retrieve_items_controller/retrieve_cpu_data');
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
            $this->session->set_userdata('search_cpu_items', $search_text);

            // Load view
            $data['pagination'] = $pagination_links;
            $data['result'] = $admin_logs_record;
            $data['row'] = $rowno;
            $data['search'] = $search_text;

            $this->load->view('template/header');
            $this->load->view('features/items/item_table/cpu_table', $data);
            $this->load->view('template/footer');    
        }


//-------------------------------------------------------------
//                      RETRIEVE GPU DATA
//-------------------------------------------------------------


        public function retrieve_gpu_data($rowno=0)
        {
            $search_text = "";// Search text

            // Check if the search form is submitted
            if($this->input->post('submit') != NULL )
            {
                $search_text = $this->input->post('search_gpu_items');
                $this->session->unset_userdata(array("search_gpu_items"=>$search_text));
            }
            // Check if the search form is not submitted and there is a search text in session
            elseif($this->input->post('submit') == NULL && $this->session->userdata('search_gpu_items') != NULL)
            {
                $search_text = $this->session->userdata('search_gpu_items');
            }

            $rowperpage = 5;// Row per page

            // Check if the row position is specified
            if($rowno != 0)
            {
                $rowno = ($rowno-1) * $rowperpage;
            }

            // Get the total count of records
            $allcount = $this->retrieve_item_model->get_gpu_logs_count($search_text);

            // Get the records based on the search text, row position and number of rows per page
            $admin_logs_record = $this->retrieve_item_model->get_gpu_Data($rowno, $rowperpage, $search_text);

            // Pagination Configuration
            $config['base_url'] = base_url('index.php/features/items_cont/retrieve_item/retrieve_items_controller/retrieve_gpu_data');
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
            $this->session->set_userdata('search_gpu_items', $search_text);

            // Load view
            $data['pagination'] = $pagination_links;
            $data['result'] = $admin_logs_record;
            $data['row'] = $rowno;
            $data['search'] = $search_text;

            $this->load->view('template/header');
            $this->load->view('features/items/item_table/gpu_table', $data);
            $this->load->view('template/footer');    
        }


        
      



        public function retrieve_items(){
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

            $inactive_item = array(
                    //this code will get the data of categories_tbl
                "result" => $this->retrieve_item_model->retrieve_inactive_items(),
            );
        

            $data = array(
                "data1" => $all_items,
                "data2" => $all_category,
                "data3" => $inactive_item,
                "data4" => $shop_data,
            );
        



            $this->load->view('template/header', $shop_data);
            $this->load->view('features/items/item_table/cpu_table', $data);
            $this->load->view('template/footer');
        }
        
        // public function retrieve_items(){
        //     $all_items = array(
        //             //so this code will get the data of all the items form all_Item_table
        //         "result" => $this->item_category_model->get_category_table(),
        //     );
        
        //     $all_category = array(
        //             //this code will get the data of categories_tbl
        //         "result" => $this->item_category_model->get_categories(),
        //     );
        
        //     $data = array(
        //         "data1" => $all_items,
        //         "data2" => $all_category
        //     );
        
        //     $this->load->view('template/header');
        //     $this->load->view('features/items/item_table/cpu_table', $data);
        //     $this->load->view('template/footer');
        // }
        









        public function Items_inactive_table($rowno=0)
        {
            $search_text = "";// Search text
    
                // Check if the search form is submitted
                if($this->input->post('submit') != NULL )
                {
                    $search_text = $this->input->post('search_defective_items');
                    $this->session->unset_userdata(array("search_defective_items"=>$search_text));
                }
                // Check if the search form is not submitted and there is a search text in session
                elseif($this->input->post('submit') == NULL && $this->session->userdata('search_defective_items') != NULL)
                {
                    $search_text = $this->session->userdata('search_defective_items');
                }
    
                $rowperpage = 5;// Row per page
    
                // Check if the row position is specified
                if($rowno != 0)
                {
                    $rowno = ($rowno-1) * $rowperpage;
                }
    
                // Get the total count of records
                $allcount = $this->retrieve_item_model->get_inactive_logs_count($search_text);
    
                // Get the records based on the search text, row position and number of rows per page
                $admin_logs_record = $this->retrieve_item_model->get_inactive_defective_items($rowno, $rowperpage, $search_text);
    
                // Pagination Configuration
                $config['base_url'] = base_url('index.php/features/items_cont/retrieve_item/retrieve_items_controller/Items_inactive_table');
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
                $this->session->set_userdata('search_defective_items', $search_text);

                $shop_data = array(
                    "result" => $this->customize_model->get_system_info(),
                );
                // Load view
                $data['pagination'] = $pagination_links;
                $data['result'] = $admin_logs_record;
                $data['row'] = $rowno;
                $data['search'] = $search_text;
                $data['data2'] = $shop_data;
    
                $this->load->view('template/header', $shop_data);
                $this->load->view('features/items/inactive_table/inactive_item', $data);
                $this->load->view('template/footer');    
        }








        
}