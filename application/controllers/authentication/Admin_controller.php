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
        $this->load->library('password');
	}

	public function index()
	{
        $this->load->view('template/header');
		$this->load->view('login/login');
        $this->load->view('template/footer');
	}


//-------------------------------------------------------------
//                  SIGNUP
//-------------------------------------------------------------
public function signup()//TO-DISPlAY SIGN_UP
{
    $this->load->view('template/header');
    $this->load->view('login/sign_up');
    $this->load->view('template/footer');
}



public function user_signUp() //SIGN_UP-FORM PROCESS
{
    if(isset($_FILES['files']) && isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['email'])){
        $name = $_FILES['files']['name'];
        $type = explode('.',$name);
        $type = end($type);
        $size = $_FILES['files']['size'];
        $random_name = rand();
        $tmp = $_FILES['files']['tmp_name'];
        $destination = $random_name.'.'.$type;
        move_uploaded_file($tmp, "image/user_img/".$destination);

        $user_name  =   $this->input->post('user_name');
        $email      =   $this->input->post('email');
        $password   =   $this->input->post('password');

        $sign_up_data = [
            "image" => $destination,
            'user_name' => $user_name,
            'email'     => $email,
            'password'  => $password,
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
        $user_name  = $this->input->post('user_name');
        $password   = $this->input->post('password');
        $consult = $this->login_model->fetch_user_details($user_name, $password);
        $result = $consult->row();
        if ($result) {
            $session = array(
                'user_name' => $result->user_name,
                'password'  => $password,
                'image'     => $result->image,
                'connect'   => true,
            );
            $this->session->set_userdata($session);
            if ($this->session->userdata('connect') == true ){
                $sess = $this->session->userdata('user_name');
            }
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('alert', 'INVALID Username/Password!');
            redirect('System_controller');
        }
    }



//-------------------------------------------------------------
//                      LOG-OUT
//-------------------------------------------------------------
    public function user_logout()
    {
        $this->session->sess_destroy();
        redirect('System_controller');
    }


}
