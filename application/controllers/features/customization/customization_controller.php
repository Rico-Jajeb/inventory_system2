<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customization_controller extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->library('pagination');
        $this->load->library('session');
		$this->load->model('dashboard/dashboard_model');
		$this->load->model('customized/customize_model');
	}

    
	public function index()
    {
        $this->load->view('template/header');
        $this->load->view('features/customization/customization');
        $this->load->view('template/footer');
    }
    
	public function Customize()
    {
        $this->load->view('template/header');
        $this->load->view('features/customization/customization');
        $this->load->view('template/footer');
    }

//-------------------------------------------------------------
//                  TO DISPLAY THE SHOP INFO
//-------------------------------------------------------------

    public function get_defective_Details(){
        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $this->load->view('template/header', $shop_data);
        $this->load->view('features/customization/customization', $shop_data );
        $this->load->view('template/footer');
    }


//-------------------------------------------------------------
//                  TO UPDATE THE SHOP INFO
//-------------------------------------------------------------
    public function update_shop_name(){
        // this code is for the SHOP NAME
    
        $shop_name = $this->input->post('shop_name');
        $custom_id = 1;
        $data = array(
            'system_tittle' => $shop_name,
        );
        $this->customize_model->updating_shop_info($data, $custom_id );
        $this->session->set_flashdata('status3', 'Update Successfully!');
        redirect('Customize');
    }


    public function update_shop_quote(){
        // this code is for the SHOP QUOTE 
    
        $shop_quote = $this->input->post('shop_quote');
        $custom_id = 1;
        $data = array(
            'system_quote' => $shop_quote,
        );
        $this->customize_model->updating_shop_info($data, $custom_id );
        $this->session->set_flashdata('status3', 'Update Successfully!');
        redirect('Customize');
    }


    public function update_shop_logo(){
        // this code is for the SHOP LOGO
        $config['upload_path'] = FCPATH . 'assets/image/system_logo';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5323400;
        $config['max_width'] = 12024;
        $config['max_height'] = 12682;
    
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('userfile')) {
            redirect('Customize');
        } else {
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
            $id = uniqid(); // generate a unique ID for the image

            // rename the uploaded file to the unique ID
            $userfile = $id . '_' . $filename;
            $new_path = $config['upload_path'] . '/' . $userfile;
            rename($upload_data['full_path'], $new_path);
            
            $custom_id = 1;
            $data = [
                    'system_logo' => $userfile,
            ];
    
            $this->customize_model->updating_shop_info($data, $custom_id );
            $this->session->set_flashdata('status3', 'Update Successfully!');
            redirect('Customize');
            
        }
        redirect('Customize');
    }

    public function update_shop_background_image(){
        // this code is for the SHOP BACKGROUND IMAGE
        $config['upload_path'] = FCPATH . 'assets/image/system_background_img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5323400;
        $config['max_width'] = 12024;
        $config['max_height'] = 12682;
    
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('userfile')) {
            redirect('Customize');
        } else {
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
            $id = uniqid(); // generate a unique ID for the image

            // rename the uploaded file to the unique ID
            $userfile = $id . '_' . $filename;
            $new_path = $config['upload_path'] . '/' . $userfile;
            rename($upload_data['full_path'], $new_path);
            
            $custom_id = 1;
            $data = [
                    'system_background_image' => $userfile,
            ];
    
            $this->customize_model->updating_shop_info($data, $custom_id );
            $this->session->set_flashdata('status3', 'Update Successfully!');
            redirect('Customize');
            
        }
        redirect('Customize');
    }
    




	
	

}