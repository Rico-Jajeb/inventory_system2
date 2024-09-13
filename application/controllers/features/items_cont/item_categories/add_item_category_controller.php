<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class add_item_category_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper("url");
                $this->load->library('session');
                $this->load->library('pagination');
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




        public function insert_item_category()
        {
            $config['upload_path'] = FCPATH . 'assets/image/item_categories';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5323400;
            $config['max_width'] = 12024;
            $config['max_height'] = 12682;
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('userfile')) {
    
                // Get CPU data  from form inputs using POST method
                $category_name = $this->input->post('category_name');
                $active = $this->input->post('active');
                
    
                // Store CPU data in an array with name, brand, description, quantity, price, and category fields
                $category = [
                        'category_name' => $category_name,
                        'active' => $active,
                ];
    
                // Call the insert_cpu_db function from model to insert the CPU data into the database
                $this->item_category_model->insert_category_db($category);
                $this->session->set_flashdata('status', 'Save Successfully!');
                redirect('items');
    
            } else {
                $upload_data = $this->upload->data();
                $filename = $upload_data['file_name'];
                $id = uniqid(); // generate a unique ID for the image
    
                // rename the uploaded file to the unique ID
                $userfile = $id . '_' . $filename;
                $new_path = $config['upload_path'] . '/' . $userfile;
                rename($upload_data['full_path'], $new_path);
    
                // Get CPU dat and image filename from form inputs using POST method
                $category_name = $this->input->post('category_name');
                $active = $this->input->post('active');
    
                // Store CPU data in an array with name, brand, description, quantity, price, and category fields
                $category = [
                        'category_name' => $category_name,
                        'active' => $active,
                        'category_img' => $userfile,
                ];
    
                $this->item_category_model->insert_category_db($category);
                $this->session->set_flashdata('status', 'Save Successfully!');
                redirect('items');
            }
        }
    
   

//-------------------------------------------------------------
//                     RETRIEVE CATEGORY SECTION
//-------------------------------------------------------------
        public function retrieve_category(){
                $category = array(
                        "result" => $this->item_category_model->get_categories(),
                );

                $shop_data = array(
                    "result" => $this->customize_model->get_system_info(),
                );

                $data = array(
                    "data1" => $category,
                    "data2" => $shop_data
                );

                $this->load->view('template/header', $shop_data);
                $this->load->view('features/items/items', $data);
                $this->load->view('template/footer');
        }
        public function retrieve_category_into_userpage(){
                $category = array(
                        "result" => $this->item_category_model->get_categories(),
                );

                $shop_data = array(
                    "result" => $this->customize_model->get_system_info(),
                );

                $data = array(
                    "data1" => $category,
                    "data2" => $shop_data
                );

                $this->load->view('template/header',$shop_data);
                $this->load->view('features/items/items', $data);
                $this->load->view('template/footer');
        }


        // public function retrieve_category(){
        //         $data = array(
        //                 "result" => $this->item_category_model->get_categories(),
        //         );

        //         $this->load->view('template/header');
        //         $this->load->view('features/items/items', $data);
        //         $this->load->view('template/footer');
        // }

        


//-------------------------------------------------------------
//                     DELETE CATEGORY TABLE SECTION
//-------------------------------------------------------------


	public function delete_category_table($rowno=0)
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
            $allcount = $this->item_category_model->get_category_logs_count($search_text);

            // Get the records based on the search text, row position and number of rows per page
            $admin_logs_record = $this->item_category_model->get_category_items_Data($rowno, $rowperpage, $search_text);

            // Pagination Configuration
            $config['base_url'] = base_url('index.php/features/items_cont/item_categories/add_item_category_controller/delete_category_table');
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

            // Get all categories
            $all_categories = $this->item_category_model->get_categories();

            $shop_data = array(
                "result" => $this->customize_model->get_system_info(),
            );
            // Load view with data
            $data = array(
                "pagination" => $pagination_links,
                "result" => $admin_logs_record,
                "row" => $rowno,
                "search" => $search_text,
                "categories" => $all_categories,
                "data2" => $shop_data,
            );

            $this->load->view('template/header',$shop_data);
            $this->load->view('features/items/delete_category_table/category_delete_table', $data);
            $this->load->view('template/footer');
   
    }

 








//-------------------------------------------------------------
//                       UPDATE  ACTIVE CATEGORY
//-------------------------------------------------------------

    public function active_update_category (){
        // this code is for the active checkbox update 

        $categories_id = $this->input->post('categories_id');
        $active = $this->input->post('active');
        
        $data = array(
            'active' => $active,
        );
        $this->item_category_model->updating_category_active($data, $categories_id );
        $this->session->set_flashdata('status3', 'Update Successfully!');
        redirect('active_category_table');
    }



    public function inactive_update_category(){
        // this code is for the active checkbox update 

        $categories_id = $this->input->post('categories_id');
        $active = $this->input->post('active');
        
        $data = array(
            'active' => $active,
        );
        $this->item_category_model->updating_category_active($data, $categories_id );
        $this->session->set_flashdata('status4', 'Update Successfully!');
        redirect('category_inactive_table');
    }












//-------------------------------------------------------------
//                       DEFECTIVE INACTIVE TABLE SECTION
//-------------------------------------------------------------

    public function category_inactive_table($rowno=0)
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
            $allcount = $this->item_category_model->get_category_logs_count($search_text);

            // Get the records based on the search text, row position and number of rows per page
            $admin_logs_record = $this->item_category_model->get_inactive_category_items_Data($rowno, $rowperpage, $search_text);

            // Pagination Configuration
            $config['base_url'] = base_url('index.php/features/items_cont/item_categories/add_item_category_controller/category_inactive_table');
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

            // Get all categories
            $all_categories = $this->item_category_model->get_categories();

            $shop_data = array(
                "result" => $this->customize_model->get_system_info(),
            );
            // Load view with data
            $data = array(
                "pagination" => $pagination_links,
                "result" => $admin_logs_record,
                "row" => $rowno,
                "search" => $search_text,
                "categories" => $all_categories,
                "data2" => $shop_data,
            );

            $this->load->view('template/header', $shop_data);
            $this->load->view('features/items/delete_category_table/inactive_table/inactive_category', $data);
            $this->load->view('template/footer');

    }




//-------------------------------------------------------------
//                       GET THE CATEGORY DETAILS FOR UPDATE SECTION
//-------------------------------------------------------------


    public function get_category_Details($id){
        $all_items = array(
            "result" => $this->item_category_model->get_category_Form($id),
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
            "data2" => $all_category
        );
        
        $this->load->view('template/header', $shop_data);
        $this->load->view('features/items/delete_category_table/update_category/update_category', $data);
        $this->load->view('template/footer');
    }




//-------------------------------------------------------------
//                       UPDATE CATEGORY SECTION
//-------------------------------------------------------------

        public function update_category()
        {
            $config['upload_path'] = FCPATH . 'assets/image/item_categories';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5323400;
            $config['max_width'] = 12024;
            $config['max_height'] = 12682;
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('userfile')) {
    
                // Get CPU data  from form inputs using POST method
                $category_name = $this->input->post('category_name');
                $categories_id = $this->input->post('categories_id');
                
    
                // Store CPU data in an array with name, brand, description, quantity, price, and category fields
                $category = [
                        'category_name' => $category_name,
                ];
    
                // Call the insert_cpu_db function from model to insert the CPU data into the database
                $this->item_category_model->update_category_db($category, $categories_id);
                $this->session->set_flashdata('status', 'Save Successfully!');
                redirect('items');
    
            } else {
                $upload_data = $this->upload->data();
                $filename = $upload_data['file_name'];
                $id = uniqid(); // generate a unique ID for the image
    
                // rename the uploaded file to the unique ID
                $userfile = $id . '_' . $filename;
                $new_path = $config['upload_path'] . '/' . $userfile;
                rename($upload_data['full_path'], $new_path);
    
                // Get CPU dat and image filename from form inputs using POST method
                $category_name = $this->input->post('category_name');
                $categories_id = $this->input->post('categories_id');
    
                // Store CPU data in an array with name, brand, description, quantity, price, and category fields
                $category = [
                        'category_name' => $category_name,
                        'category_img' => $userfile,
                ];
    
                $this->item_category_model->update_category_db($category, $categories_id);
                $this->session->set_flashdata('status', 'Save Successfully!');
                redirect('items');
            }
        }





}