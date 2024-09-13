<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class staff_creation_controller extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->model('staff_creation/staff_creation_model');
        $this->load->model('customized/customize_model');
	}

    
	public function index()
    {

        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $this->load->view('template/header', $shop_data);
        $this->load->view('features/staff_creation/staff_creation', $shop_data );
        $this->load->view('template/footer');
    }


	public function create_staff()
	{

		$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[1]|max_length[16]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[1]|max_length[16]');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|min_length[1]|max_length[16]');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[1]|max_length[16]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('admin_level', 'admin_level', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {

            // Get all the validation errors in an array
            $errors = $this->form_validation->error_array();

            // Check which field/s have errors
            if (isset($errors['password2'])) {
                $this->session->set_flashdata('alert2', 'Failed! Confirm Password is required and should match Password');
            } elseif (isset($errors['password'])) {
                $this->session->set_flashdata('alert', 'Failed! Password is required and should have at least 6 characters');
            } else {
                $this->session->set_flashdata('status', 'Failed! Some fields have errors. Please check again.');
            }

            // Redirect to the signup page with the error messages
            redirect('staff_creation');

            $this->session->set_flashdata('status', 'failed!');
            redirect('staff_creation');

        }else
        {

			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$midle_name = $this->input->post('middle_name');
			$email= $this->input->post('email');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password2 = $this->input->post('password2');
			$admin_level = $this->input->post('admin_level');
	
			$staff_data = array(
				'admin_Fname' => $first_name,
				'admin_Lname' => $last_name,
				'admin_Mname' => $midle_name,
				'admin_email' => $email,
				'admin_username' => $username,
				'admin_password' => $password,
				'admin_level' => $admin_level,
			);

            $this->staff_creation_model->insert_staff_db($staff_data);

            // redirect($_SERVER['HTTP_REFERER']); //THIS CODE REDIRECT TO THE SAME PAGE
            $this->session->set_flashdata('status', 'Save Successfully!');
            redirect('staff_creation');
        }



	}

}