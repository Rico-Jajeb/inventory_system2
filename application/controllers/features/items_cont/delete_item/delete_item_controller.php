<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class delete_item_controller extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->helper("url");
            $this->load->library('session');
            $this->load->library('pagination');
            $this->load->model('items_model/delete_item/delete_item_model');
            $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
            $this->load->view('template/header');

            $this->load->view('template/footer');
    }



//-------------------------------------------------------------
//                      DELETE ITEM DATA
//-------------------------------------------------------------


    public function delete_cpu_data($id){
        $this->delete_item_model->delete_cpu_byId($id);
        redirect('retrieve_cpu_data');
    }

    public function delete_gpu_data($id){
        $this->delete_item_model->delete_gpu_byId($id);
        redirect('retrieve_gpu_data');
    }
        
    

        
}