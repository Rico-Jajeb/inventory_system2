<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->library('pagination');
	}

	public function index()
	{
                $this->load->view('template/header');
                $this->load->view('features/items/items');
                $this->load->view('template/footer');
	}

        // This function display cpu_table
        public function cpu_table()
        {
                $this->load->view('template/header');
                $this->load->view('features/items/item_table/cpu_table');
                $this->load->view('template/footer');
        }


}