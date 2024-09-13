<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_audit_logs_controller extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('audit_logs/audit_logs_model');
		$this->load->model('customized/customize_model');
	}

    
	public function index()
    {
        $this->load->view('template/header');
        $this->load->view('features/audit_logs/user_logs');
        $this->load->view('template/footer');
    }



	public function user_logs_data($rowno=0)
	{
		$search_text = "";// Search text
	
		// Check if the search form is submitted
		if($this->input->post('submit') != NULL )
		{
			$search_text = $this->input->post('search_user_logs');
			$this->session->unset_userdata(array("search_user_logs"=>$search_text));
		}
		// Check if the search form is not submitted and there is a search text in session
		elseif($this->input->post('submit') == NULL && $this->session->userdata('search_user_logs') != NULL)
		{
			$search_text = $this->session->userdata('search_user_logs');
		}
	
		$rowperpage = 5;// Row per page
	
		// Check if the row position is specified
		if($rowno != 0)
		{
			$rowno = ($rowno-1) * $rowperpage;
		}
	
		// Get the total count of records
		$allcount = $this->audit_logs_model->get_user_logs_count($search_text);
	
		// Get the records based on the search text, row position and number of rows per page
		$admin_logs_record = $this->audit_logs_model->get_audit_user_Data($rowno, $rowperpage, $search_text);
	
		// Pagination Configuration
		$config['base_url'] = base_url('index.php/features/audit_logs/user_audit_logs_controller/user_logs_data');
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		$config['num_links'] = 1;
		$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['attributes'] = array('class' => 'page-link');
	
		$this->pagination->initialize($config);
	
		// Generate pagination links
		$pagination_links = $this->pagination->create_links();
	
		// Store the search text in session
		$this->session->set_userdata('search_user_logs', $search_text);
	
		$shop_data = array(
			"result" => $this->customize_model->get_system_info(),
		);

		// Load view
		$data['pagination'] = $pagination_links;
		$data['result'] = $admin_logs_record;
		$data['row'] = $rowno;
		$data['search'] = $search_text;
		$data['data2'] = $shop_data;
	
		$this->load->view('template/header', $shop_data);
		$this->load->view('features/audit_logs/user_logs', $data);
		$this->load->view('template/footer');    
	}
	
	
}