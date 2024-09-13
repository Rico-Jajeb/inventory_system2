<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class insert_item_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper("url");
                $this->load->library('session');
                $this->load->library('pagination');
                $this->load->model('items_model/insert_item/insert_item_model');
                $this->load->model('items_model/item_category/item_category_model');
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('template/header');
                $this->load->view('features/items/item_table/cpu_table');
                $this->load->view('template/footer');
        }


//-------------------------------------------------------------
//                      INSERT ITEM DATA
//-------------------------------------------------------------


        public function insert_item()
        {
                $config['upload_path'] = FCPATH . 'assets/image/all_item_img';
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
                        $item_data = [
                                'item_name_model' => $name_model,
                                'item_brand' => $brand,
                                'item_description' => $description,
                                'item_quantity' => $quantity,
                                'item_price' => $price,
                                'category_name' => $category,
                                'supplier' => $supplier,
                                'item_cost' => $cost,
                                
                        ];

                        // Call the insert_cpu_db function from model to insert the CPU data into the database
                        $this->item_category_model->insert_into_all_item_db($item_data);
                        $this->session->set_flashdata('status2', 'Save Successfully!');
                        // redirect('defective');
                        redirect($_SERVER['HTTP_REFERER']);

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
                        $active = $this->input->post('active');

                        // Store CPU data in an array with name, brand, description, quantity, price, and category fields
                        $item_data = [
                                'item_name_model' => $name_model,
                                'item_brand' => $brand,
                                'item_description' => $description,
                                'item_quantity' => $quantity,
                                'item_price' => $price,
                                'category_name' => $category,
                                'supplier' => $supplier,
                                'item_cost' => $cost,
                                'active' => $active,
                                'item_image' => $userfile,

                        ];

                        $this->item_category_model->insert_into_all_item_db($item_data);
                        $this->session->set_flashdata('status2', 'Save Successfully!');
                        // redirect('defective');
                        redirect($_SERVER['HTTP_REFERER']);
                }
        }




//     public function items_active_update(){
//         // this code is for the active checkbox update 

//         $itemid = $this->input->post('itemid');
//         $active = $this->input->post('active');
        
//         $data = array(
//             'active' => $active,
//         );
//         $this->item_category_model->updating_item_active($data, $itemid );
//         $this->session->set_flashdata('status3', 'Update Successfully!');
//         // redirect($_SERVER['HTTP_REFERER']);
//         redirect('defective');
//     }



}