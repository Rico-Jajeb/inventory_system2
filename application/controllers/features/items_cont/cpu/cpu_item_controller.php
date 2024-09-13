<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cpu_item_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper("url");
                $this->load->library('session');
                $this->load->library('pagination');
                $this->load->model('items_model/all_items_model');
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('template/header');
                $this->load->view('features/items/item_table/cpu_table');
                $this->load->view('template/footer');
        }


//-------------------------------------------------------------
//                      INSERT CPU DATA
//-------------------------------------------------------------

        // public function insert_cpu_data()
        // {
        //     $config['upload_path'] = FCPATH . 'assets/image/cpu_item_img';
        //     $config['allowed_types'] = 'gif|jpg|png';
        //     $config['max_size'] = 5323400;
        //     $config['max_width'] = 12024;
        //     $config['max_height'] = 12682;
        
        //     $this->load->library('upload', $config);
        
        //     if (!$this->upload->do_upload('userfile')) {

        //         // Get CPU data  from form inputs using POST method
        //         $name_model = $this->input->post('name_model');
        //         $brand = $this->input->post('brand');
        //         $description = $this->input->post('description');
        //         $quantity = $this->input->post('quantity');
        //         $price = $this->input->post('price');
        //         $category = $this->input->post('category');
        //         $supplier = $this->input->post('supplier');
        //         $cost = $this->input->post('cost');
        
        //         // Store CPU data in an array with name, brand, description, quantity, price, and category fields
        //         $cpu_data = [
        //                 'item_name_model' => $name_model,
        //                 'item_brand' => $brand,
        //                 'item_description' => $description,
        //                 'item_quantity' => $quantity,
        //                 'item_price' => $price,
        //                 'item_category' => $category,
        //                 'supplier' => $supplier,
        //                 'item_cost' => $cost,
                       
        //         ];
        
        //         // Call the insert_cpu_db function from model to insert the CPU data into the database
        //         $this->all_items_model->insert_cpu_db($cpu_data);

        //     } else {
        //         $upload_data = $this->upload->data();
        //         $filename = $upload_data['file_name'];
        //         $id = uniqid(); // generate a unique ID for the image
        
        //         // rename the uploaded file to the unique ID
        //         $userfile = $id . '_' . $filename;
        //         $new_path = $config['upload_path'] . '/' . $userfile;
        //         rename($upload_data['full_path'], $new_path);
        
        //         // Get CPU dat and image filename from form inputs using POST method
        //         $name_model = $this->input->post('name_model');
        //         $brand = $this->input->post('brand');
        //         $description = $this->input->post('description');
        //         $quantity = $this->input->post('quantity');
        //         $price = $this->input->post('price');
        //         $category = $this->input->post('category');
        //         $supplier = $this->input->post('supplier');
        //         $cost = $this->input->post('cost');
        
        //         // Store CPU data in an array with name, brand, description, quantity, price, and category fields
        //         $cpu_data = [
        //                 'item_name_model' => $name_model,
        //                 'item_brand' => $brand,
        //                 'item_description' => $description,
        //                 'item_quantity' => $quantity,
        //                 'item_price' => $price,
        //                 'item_category' => $category,
        //                 'supplier' => $supplier,
        //                 'item_cost' => $cost,
        //                 'item_image' => $userfile,
        //         ];
        
        //         $this->all_items_model->insert_cpu_db($cpu_data);
                
        //     }
        // }
        

        



        public function insert_item_data($modl1)
        {
            $config['upload_path'] = FCPATH . 'assets/image/cpu_item_img';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5323400;
            $config['max_width'] = 12024;
            $config['max_height'] = 12682;
        
            $this->load->library('upload', $config);
        
            if (!$this->upload->do_upload('userfile')) {

                // Get CPU data  from form inputs using POST method
                $name_model = $this->input->post('name_model');
                $brand = $this->input->post('brand');
                $description = $this->input->post('description');
                $quantity = $this->input->post('quantity');
                $price = $this->input->post('price');
                $category = $this->input->post('category');
                $supplier = $this->input->post('supplier');
                $cost = $this->input->post('cost');
        
                // Store CPU data in an array with name, brand, description, quantity, price, and category fields
                $cpu_data = [
                        'item_name_model' => $name_model,
                        'item_brand' => $brand,
                        'item_description' => $description,
                        'item_quantity' => $quantity,
                        'item_price' => $price,
                        'item_category' => $category,
                        'supplier' => $supplier,
                        'item_cost' => $cost,
                       
                ];
        
                // Call the insert_cpu_db function from model to insert the CPU data into the database
                $this->all_items_model->$modl1($cpu_data);

            } else {
                $upload_data = $this->upload->data();
                $filename = $upload_data['file_name'];
                $id = uniqid(); // generate a unique ID for the image
        
                // rename the uploaded file to the unique ID
                $userfile = $id . '_' . $filename;
                $new_path = $config['upload_path'] . '/' . $userfile;
                rename($upload_data['full_path'], $new_path);
        
                // Get CPU dat and image filename from form inputs using POST method
                $name_model = $this->input->post('name_model');
                $brand = $this->input->post('brand');
                $description = $this->input->post('description');
                $quantity = $this->input->post('quantity');
                $price = $this->input->post('price');
                $category = $this->input->post('category');
                $supplier = $this->input->post('supplier');
                $cost = $this->input->post('cost');
        
                // Store CPU data in an array with name, brand, description, quantity, price, and category fields
                $cpu_data = [
                        'item_name_model' => $name_model,
                        'item_brand' => $brand,
                        'item_description' => $description,
                        'item_quantity' => $quantity,
                        'item_price' => $price,
                        'item_category' => $category,
                        'supplier' => $supplier,
                        'item_cost' => $cost,
                        'item_image' => $userfile,
                ];
        
                $this->all_items_model->$modl1($cpu_data);
                
            }
        }




        public function cpu_item() {
                // Call insert_item_data function with model function names as parameters
                $this->insert_item_data('insert_cpu_db');
        }
        public function gpu_item() {
                // Call insert_item_data function with model function names as parameters
                $this->insert_item_data('insert_gpu_db');
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
    $allcount = $this->all_items_model->get_admin_logs_count($search_text);

    // Get the records based on the search text, row position and number of rows per page
    $admin_logs_record = $this->all_items_model->get_audit_admin_Data($rowno, $rowperpage, $search_text);

    // Pagination Configuration
    $config['base_url'] = base_url('index.php/features/items_cont/cpu/cpu_item_controller/retrieve_cpu_data');
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





	// public function retrieve_cpu_data($rowno=0)
	// {
	// 	$search_text = "";// Search text
	// 	if($this->input->post('submit') != NULL )
	// 	{
	// 		$search_text = $this->input->post('search');
	// 		$this->session->unset_userdata(array("search"=>$search_text));
	// 	} elseif($this->input->post('submit') == NULL ){
	// 		$search_text = $this->input->post('search');
	// 		$this->session->unset_userdata(array("search"=>$search_text));
	// 	}else{
	// 		if($this->session->userdata('search') != NULL){
	// 			$search_text = $this->session->userdata('search');
	// 		}
	// 	}

	// 	$rowperpage = 5;// Row per page
	
	// 	if($rowno != 0){// Row position
	// 	  $rowno = ($rowno-1) * $rowperpage;
	// 	}
	// 	$allcount = $this->all_items_model->get_admin_logs_count($search_text);// All records count
	// 	$admin_logs_record = $this->all_items_model->get_audit_admin_Data($rowno,$rowperpage,$search_text);// Get records
	 
	// 	// Pagination Configuration
	// 	$config['base_url'] = base_url('index.php/features/items_cont/cpu/cpu_item_controller/retrieve_cpu_data');
	// 	$config['use_page_numbers'] = TRUE;
	// 	$config['total_rows'] = $allcount;
	// 	$config['per_page'] = $rowperpage;
	// 	$config['num_links'] = 1;
	// 	$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
	// 	$config['full_tag_close'] = '</ul></nav>';
	// 	$config['first_tag_open'] = '<li class="page-item">';
	// 	$config['first_tag_close'] = '</li>';
	// 	$config['last_tag_open'] = '<li class="page-item">';
	// 	$config['last_tag_close'] = '</li>';
	// 	$config['next_tag_open'] = '<li class="page-item">';
	// 	$config['next_tag_close'] = '</li>';
	// 	$config['prev_tag_open'] = '<li class="page-item">';
	// 	$config['prev_tag_close'] = '</li>';
	// 	$config['num_tag_open'] = '<li class="page-item">';
	// 	$config['num_tag_close'] = '</li>';
	// 	$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
	// 	$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
	// 	$config['attributes'] = array('class' => 'page-link');

	// 	$this->pagination->initialize($config);
	 
	// 	$data['pagination'] = $this->pagination->create_links();
	// 	$data['result'] = $admin_logs_record;
	// 	$data['row'] = $rowno;
	// 	$data['search'] = $search_text;
	
	// 	// Load view
	// 	$this->load->view('template/header');
	// 	$this->load->view('features/items/item_table/cpu_table', $data);
	// 	$this->load->view('template/footer');	
	// }


}