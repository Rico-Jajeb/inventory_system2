<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_controller extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->helper("url");
            $this->load->library('session');
            $this->load->library('pagination');
            $this->load->model('supplier/supplier_model');
            $this->load->model('items_model/update_item/update_item_model');
            $this->load->model('customized/customize_model');
            $this->load->helper(array('form', 'url'));
    }


	public function index()
    {
        $this->load->view('template/header');
        $this->load->view('features/suppliers/suppliers');
        $this->load->view('template/footer');
    }


//-------------------------------------------------------------
//                  TO DISPLAY THE DATA INTO THE TABLE
//-------------------------------------------------------------


    public function all_supplier_tbl($rowno=0)
    {
        $search_text = "";// Search text

            // Check if the search form is submitted
            if($this->input->post('submit') != NULL )
            {
                $search_text = $this->input->post('search_supplier_items');
                $this->session->unset_userdata(array("search_supplier_items"=>$search_text));
            }
            // Check if the search form is not submitted and there is a search text in session
            elseif($this->input->post('submit') == NULL && $this->session->userdata('search_supplier_items') != NULL)
            {
                $search_text = $this->session->userdata('search_supplier_items');
            }

            $rowperpage = 5;// Row per page

            // Check if the row position is specified
            if($rowno != 0)
            {
                $rowno = ($rowno-1) * $rowperpage;
            }

            // Get the total count of records
            $allcount = $this->supplier_model->get_supplier_logs_count($search_text);

            // Get the records based on the search text, row position and number of rows per page
            $admin_logs_record = $this->supplier_model->get_supplier_items_Data($rowno, $rowperpage, $search_text);

            // Pagination Configuration
            $config['base_url'] = base_url('index.php/features/supplier_cont/Supplier_controller/all_supplier_tbl');
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
            $this->session->set_userdata('search_supplier_items', $search_text);

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
            $this->load->view('features/suppliers/suppliers', $data);
            $this->load->view('template/footer');    
    }














//-------------------------------------------------------------
//                  TO INSERT DATA INTO SUPPLIER
//-------------------------------------------------------------

    public function insert_supplier_item()
    {
        $config['upload_path'] = FCPATH . 'assets/image/supplier_img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5323400;
        $config['max_width'] = 12024;
        $config['max_height'] = 12682;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {

            // Get CPU data  from form inputs using POST method
            $supplier_name = $this->input->post('supplier_name');
            $contact_email = $this->input->post('contact_email');
            $contact_phone = $this->input->post('contact_phone');
            $address = $this->input->post('address');
            $product = $this->input->post('product');

            // Store CPU data in an array with name, brand, description, quantity, price, and category fields
            $supplier_data = [
                    'supplier_name' => $supplier_name,
                    'contact_email' => $contact_email,
                    'contact_phone' => $contact_phone,
                    'address' => $address,
                    'product' => $product,
            ];

            // Call the insert_cpu_db function from model to insert the CPU data into the database
            $this->supplier_model->insert_supplier_into_db($supplier_data);
            $this->session->set_flashdata('status', 'Save Successfully!');
            redirect('supplier');

        } else {
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
            $id = uniqid(); // generate a unique ID for the image

            // rename the uploaded file to the unique ID
            $userfile = $id . '_' . $filename;
            $new_path = $config['upload_path'] . '/' . $userfile;
            rename($upload_data['full_path'], $new_path);

            // Get CPU dat and image filename from form inputs using POST method
            $supplier_name = $this->input->post('supplier_name');
            $contact_email = $this->input->post('contact_email');
            $contact_phone = $this->input->post('contact_phone');
            $address = $this->input->post('address');
            $product = $this->input->post('product');

            // Store CPU data in an array with name, brand, description, quantity, price, and category fields
            $supplier_data = [
                    'supplier_name' => $supplier_name,
                    'contact_email' => $contact_email,
                    'contact_phone' => $contact_phone,
                    'address' => $address,
                    'product' => $product,
                    'supplier_image' => $userfile,
            ];

            $this->supplier_model->insert_supplier_into_db($supplier_data);
            $this->session->set_flashdata('status', 'Save Successfully!');
            redirect('supplier');
        }
    }




//-------------------------------------------------------------
//                      DELETE DEFECTIVE ITEM DATA
//-------------------------------------------------------------


    public function delete_supplier_data($id){
        $this->supplier_model->delete_supplier_item_byId($id);
        redirect('supplier');
    }




//-------------------------------------------------------------
//                       GET DEFECTIVE ITEM DETAILS
//-------------------------------------------------------------


    public function get_supplier_Details($id){
        $data = array(
            "result" => $this->supplier_model->get_supplier_Form($id),
        );

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $this->load->view('template/header', $shop_data);
        $this->load->view('features/suppliers/update_supplier/update_supplier', $data);
        $this->load->view('template/footer');
    }





//-------------------------------------------------------------
//                       UPDATE  ITEM DETAILS
//-------------------------------------------------------------

    
    public function updating_supplier_info(){


        $config['upload_path'] = FCPATH . 'assets/image/supplier_img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5323400;
        $config['max_width'] = 12024;
        $config['max_height'] = 12682;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {

            // Get CPU data  from form inputs using POST method
            $supplier_name = $this->input->post('supplier_name');
            $contact_email = $this->input->post('contact_email');
            $contact_phone = $this->input->post('contact_phone');
            $address = $this->input->post('address');
            $product = $this->input->post('product');
            $supplier_id = $this->input->post('all_supplier_id');

            // Store CPU data in an array with name, brand, description, quantity, price, and category fields
            $product = [
                'supplier_name' => $supplier_name,
                'contact_email' => $contact_email,
                'contact_phone' => $contact_phone,
                'address' => $address,
                'product' => $product,
                    
            ];

            // Call the insert_cpu_db function from model to insert the CPU data into the database
            $this->supplier_model->updating_supplier($product, $supplier_id);
            $this->session->set_flashdata('status2', 'Update Successfully!');
            redirect('supplier');

        } else {

            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
            $id = uniqid(); // generate a unique ID for the image

            // rename the uploaded file to the unique ID
            $userfile = $id . '_' . $filename;
            $new_path = $config['upload_path'] . '/' . $userfile;
            rename($upload_data['full_path'], $new_path);

            // Get CPU dat and image filename from form inputs using POST method
            $supplier_name = $this->input->post('supplier_name');
            $contact_email = $this->input->post('contact_email');
            $contact_phone = $this->input->post('contact_phone');
            $address = $this->input->post('address');
            $product = $this->input->post('product');
            $supplier_id = $this->input->post('all_supplier_id');

            // Store CPU data in an array with name, brand, description, quantity, price, and category fields
            $product = [
                'supplier_name' => $supplier_name,
                'contact_email' => $contact_email,
                'contact_phone' => $contact_phone,
                'address' => $address,
                'product' => $product,
                'supplier_image' => $userfile,
            ];

            $this->supplier_model->updating_supplier($product, $supplier_id);
            $this->session->set_flashdata('status2', 'Update Successfully!');
            redirect('supplier');
            
        }


        $this->supplier_model->updating_supplier($product, $supplier_id );
        $this->session->set_flashdata('status2', 'Update Successfully!');
        redirect('supplier');
        
    }





  










}