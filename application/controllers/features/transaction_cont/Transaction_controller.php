<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_controller extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->library('pagination');
        $this->load->library('session');
		$this->load->model('customized/customize_model');
	}



	public function index()
    {
        $shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

        $this->load->view('template/header');
        $this->load->view('features/transactions/transaction',$shop_data );
        $this->load->view('template/footer');
    }

//-------------------------------------------------------------
//                  TO DISPLAY THE DASHBOARD
//-------------------------------------------------------------


}