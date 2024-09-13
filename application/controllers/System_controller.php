<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->library('pagination');
        $this->load->library('session');
		$this->load->model('login_model');
        $this->load->model('customized/customize_model');
        $this->load->library('form_validation');

	}

	public function index()
	{
        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $this->load->view('template/header', $shop_data);
		$this->load->view('login/login');
        $this->load->view('template/footer');
	}


//-------------------------------------------------------------
//                  SIGNUP
//-------------------------------------------------------------
    public function signup()//TO-DISPlAY SIGN_UP
    {
        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );
        
        $this->load->view('template/header',$shop_data);
        $this->load->view('login/sign_up');
        $this->load->view('template/footer');
    }



    public function user_signUp() //SIGN_UP-FORM PROCESS
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[1]|max_length[25]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[1]|max_length[25]');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|min_length[1]|max_length[25]');
        $this->form_validation->set_rules('phone_no', 'phone No', 'required|min_length[11]|max_length[11]');
        $this->form_validation->set_rules('province', 'Province', 'required|min_length[1]|max_length[25]');
        $this->form_validation->set_rules('city', 'City', 'required|min_length[1]|max_length[25]');
        $this->form_validation->set_rules('barangay', 'Barangay', 'required|min_length[1]|max_length[25]');
        $this->form_validation->set_rules('user_name', 'Username', 'required|min_length[1]|max_length[25]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE)
        {
            // Get all the validation errors in an array
            $errors = $this->form_validation->error_array();

            // Check which field/s have errors
            if (isset($errors['password2'])) {
                $this->session->set_flashdata('alert2', 'Failed! Confirm Password is required and should match Password');
            } elseif (isset($errors['password'])) {
                $this->session->set_flashdata('alert', 'Failed! Password is required and should have at least 6 characters');
            } elseif (isset($errors['phone_no'])) {
                $this->session->set_flashdata('ph_no', 'Please enter a 11-digit phone number.');
            } else {
                $this->session->set_flashdata('status', 'Failed! Some fields have errors. Please check again.');
            }

            // Redirect to the signup page with the error messages
            redirect('signup');

            $this->session->set_flashdata('status', 'failed!');
            redirect('signup');
        }
        else
        {

            $user_Fname     =   $this->input->post('first_name');
            $user_Lname     =   $this->input->post('last_name');
            $user_Mname     =   $this->input->post('middle_name');
            $user_email     =   $this->input->post('email');
            $user_name      =   $this->input->post('user_name');
            $phone_no       =   $this->input->post('phone_no');
            $province       =   $this->input->post('province');
            $city           =   $this->input->post('city');
            $barangay      =   $this->input->post('barangay');

            $user_password  =   $this->input->post('password');
            $user_password2 =   $this->input->post('password2');

            $sign_up_data = [
                'user_Fname'    => $user_Fname,
                'user_Lname'    => $user_Lname,
                'user_Mname'    => $user_Mname,
                'user_email'    => $user_email,
                'phone_no'    => $phone_no,
                'province'    => $province,
                'city'    => $city,
                'barangay'    => $barangay,
                'user_name'     => $user_name,
                'user_password' => $user_password,
            ];

            $this->login_model->sign_up_db($sign_up_data);

            // redirect($_SERVER['HTTP_REFERER']); //THIS CODE REDIRECT TO THE SAME PAGE
            $this->session->set_flashdata('status', 'Registered Successfully!');
            redirect('System_controller');
        }
    }
  

  

//-------------------------------------------------------------
//                      LOGIN
//-------------------------------------------------------------

    public function user_login()
    {
        $username  = $this->input->post('username');
        $password   = $this->input->post('password');
        $consult_admin = $this->login_model->fetch_admin_details($username, $password);
        $consult_user = $this->login_model->fetch_user_details($username, $password);
        $result_admin = $consult_admin->row();
        $result_user = $consult_user->row();
        if ($result_admin) {
            $session = array(
                'admin_username' => $username,
                'admin_password' => $password,
                'admin_id'       => $result_admin->admin_id,
                'admin_level'    => $result_admin->admin_level,
                'connect'        => true,
            );
            $this->session->set_userdata($session);
            if ($this->session->userdata('connect') == true ){
                $sess = $this->session->userdata('admin_username');
                $sess2 = $this->session->userdata('admin_id');
                $admin_level = $this->session->userdata('admin_level');
            }

            //this code is for inserting into the audit trails
            $data = array(
                'admin_username' => $username, 
                'admin_id'       => $result_admin->admin_id,
                'date_time_out'   => NULL,
            );
            $this->login_model->insert_admin_audit($data);
            $this->session->set_flashdata('status', 'success!');
            redirect('dashboard');

        } elseif($result_user) {
            $session = array(
                'user_name' => $username,
                'user_password'  => $password,
                'user_id'       => $result_user->user_id,
                'user_Fname'     => $result_user->user_Fname, 
                'user_Lname'     => $result_user->user_Lname, 
                'phone_no'     => $result_user->phone_no, 
                'province'     => $result_user->province, 
                'city'     => $result_user->city, 
                'barangay'     => $result_user->barangay, 
                'connect'   => true,
            );
            $this->session->set_userdata($session);
            if ($this->session->userdata('connect') == true ){
                $sess = $this->session->userdata('user_name');
                $sess2 = $this->session->userdata('user_id');
                $user_Fname = $this->session->userdata('user_Fname'); 
                $user_Lname = $this->session->userdata('user_Lname'); 
                $phone_no = $this->session->userdata('phone_no'); 
                $province = $this->session->userdata('province'); 
                $city = $this->session->userdata('city'); 
                $barangay = $this->session->userdata('barangay'); 
            }

            //this code is for inserting into the audit trails
            $data = array(
                'user_name' => $username, 
                'user_id'       => $result_user->user_id,
                'date_time_out'   => NULL,
            );
            $this->login_model->insert_user_audit($data);

            redirect('user_page');
        } else {
            $this->session->set_flashdata('alert', 'INVALID Username/Password!');
            redirect('System_controller');
        }
    }

  

    public function user_logout()
    {
        //to get  the admin username and id from the session
        $user_name = $this->session->userdata('user_name');
        $user_id = $this->session->userdata('user_id');
        //to insert the admin username and id to the audit_trail table and to set also the time in into null
        $data = array(
            'user_name' => $user_name, 
            'user_id' => $user_id,
            'date_time_in'   => NULL, 
        );

        $this->login_model->insert_user_audit($data);

        $this->session->sess_destroy();
        redirect('System_controller');
    }



    public function admin_logout()
    {
        //to get  the admin username and id from the session
        $admin_username = $this->session->userdata('admin_username');
        $admin_id = $this->session->userdata('admin_id');
        //to insert the admin username and id to the audit_trail table and to set also the time in into null
        $data = array(
            'admin_username' => $admin_username, 
            'admin_id' => $admin_id,
            'date_time_in'   => NULL, 
        );

        $this->login_model->insert_admin_audit($data);

        $this->session->sess_destroy();
        redirect('System_controller');
    }


}
