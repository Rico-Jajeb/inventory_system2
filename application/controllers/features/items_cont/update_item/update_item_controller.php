<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class update_item_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper("url");
                $this->load->library('session');
                $this->load->library('pagination');
                $this->load->model('items_model/update_item/update_item_model');
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
//                       GET ITEM DETAILS
//-------------------------------------------------------------


        public function get_item_Details($id){
            $all_items = array(
                "result" => $this->update_item_model->get_item_data_ById($id),
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
            $this->load->view('features/items/update_item/update_cpu', $data);
            $this->load->view('template/footer');
        }





//-------------------------------------------------------------
//                       UPDATE  ITEM DETAILS
//-------------------------------------------------------------

    
        public function updating_items_Form(){


            $config['upload_path'] = FCPATH . 'assets/image/all_item_img/';
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
                $product_id = $this->input->post('item_id');
        
                // Store CPU data in an array with name, brand, description, quantity, price, and category fields
                $product = [
                        'item_id'  => $product_id,
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
                $this->update_item_model->updating_items($product, $product_id);
    
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
                $product_id = $this->input->post('item_id');
        
                // Store CPU data in an array with name, brand, description, quantity, price, and category fields
                $product = [
                        'item_id'  => $product_id,
                        'item_name_model' => $name_model,
                        'item_brand' => $brand,
                        'item_description' => $description,
                        'item_quantity' => $quantity,
                        'item_price' => $price,
                        'category_name' => $category,
                        'supplier' => $supplier,
                        'item_cost' => $cost,
                        'item_image' => $userfile,
                ];
        
                $this->update_item_model->updating_items($product, $product_id);
                
            }

        
            $this->update_item_model->updating_items($product, $product_id );
            $this->session->set_flashdata('status2', 'Save Successfully!');
            redirect('items');
            
        }
        



//-------------------------------------------------------------
//                       UPDATE  ACTIVE 
//-------------------------------------------------------------



    public function active_update_item(){
        // this code is for the active checkbox update 

        $defective_id = $this->input->post('defective_id');
        $active = $this->input->post('active');
        
        $data = array(
            'active' => $active,
        );
        $this->update_item_model->updating_active($data, $defective_id );
        $this->session->set_flashdata('status3', 'Update Successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function inactive_update_item(){
        // this code is for the active checkbox update 

        $defective_id = $this->input->post('defective_id');
        $active = $this->input->post('active');
        
        $data = array(
            'active' => $active,
        );
        $this->update_item_model->updating_active($data, $defective_id );
        $this->session->set_flashdata('status4', 'Update Successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function best_selling_item(){
        // this code is for the best selling checkbox update 

        $defective_id = $this->input->post('defective_id');
        $active = $this->input->post('active');
        
        $data = array(
            'best_selling' => $active,
        );
        $this->update_item_model->updating_best_selling($data, $defective_id );
        $this->session->set_flashdata('status4', 'Update Successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }






//     public function item_active_update(){
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



// public function inactive_update(){
//     // this code is for the active checkbox update 

//     $defective_id = $this->input->post('defective_id');
//     $active = $this->input->post('active');
    
//     $data = array(
//         'active' => $active,
//     );
//     $this->defective_model->updating_active($data, $defective_id );
//     $this->session->set_flashdata('status4', 'Update Successfully!');
//     redirect('defective');
// }







        
}