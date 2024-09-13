<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class events_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('event_model');
	}



	public function index()
    {
        $this->load->view('template/header');
        $this->load->view('features/event/events');
        $this->load->view('template/footer');
    }

//-------------------------------------------------------------
//                  TO INSERT MESSAGE TO DB
//-------------------------------------------------------------
    public function insert_message_data()
    {
        if ($this->session->userdata('connect') == true ){
            $sess = $this->session->userdata('admin_username');
            }
            $message = $this->input->post('message');
            $data = [
                'admin_id' => $sess,
                'group_message' => $message,
            ]; 
            
            $this->event_model->insert_gc_message_db($data);
        
        redirect('display_messages');
       
    }

//-------------------------------------------------------------
//                  TO GET & DISPLAY MESSAGES 
//-------------------------------------------------------------
    public function display_messages()
    {
        $data = array(
			"result" => $this->event_model->retrieve_message(),
		);
        $this->load->view('template/header');
        $this->load->view('features/event/events', $data);
        $this->load->view('template/footer');
    }

}