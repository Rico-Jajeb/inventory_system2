<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->library('pagination');
        $this->load->library('session');
		$this->load->model('dashboard/dashboard_model');
		$this->load->model('customized/customize_model');
		$this->load->model('items_model/retrieve_item/retrieve_item_model');
	}

    
	public function index()
    {
		$shop_data = array(
            "result" => $this->customize_model->get_system_info(),
            "total_items2" => $this->retrieve_item_model->retrieve_out_of_stock_items(),
            "low_stock" => $this->retrieve_item_model->retrieve_low_of_stock_items(),
            "all_products" => $this->retrieve_item_model->retrieve_all_products(),
            "sales" => $this->retrieve_item_model->sales(),
            "sold_product" => $this->retrieve_item_model->item_sold(),
        );

		
        $this->load->view('template/header',$shop_data);
        $this->load->view('features/Dashboard/dashboard', $shop_data);
        $this->load->view('template/footer', $shop_data);
    }

	

//-------------------------------------------------------------
//                  TO DISPLAY THE DASHBOARD
//-------------------------------------------------------------



	public function out_of_stock($rowno=0)
	{
		$search_text = "";// Search text

		// Check if the search form is submitted
		if($this->input->post('submit') != NULL )
		{
			$search_text = $this->input->post('search_gpu_items');
			$this->session->unset_userdata(array("search_gpu_items"=>$search_text));
		}
		// Check if the search form is not submitted and there is a search text in session
		elseif($this->input->post('submit') == NULL && $this->session->userdata('search_gpu_items') != NULL)
		{
			$search_text = $this->session->userdata('search_gpu_items');
		}

		$rowperpage = 5;// Row per page

		// Check if the row position is specified
		if($rowno != 0)
		{
			$rowno = ($rowno-1) * $rowperpage;
		}

		// Get the total count of records
		$allcount = $this->dashboard_model->get_out_of_stock_logs_count($search_text);

		// Get the records based on the search text, row position and number of rows per page
		$admin_logs_record = $this->dashboard_model->get_out_of_stock_Data($rowno, $rowperpage, $search_text);

		// Pagination Configuration
		$config['base_url'] = base_url('index.php/features/dashboard_cont/Dashboard_controller/out_of_stock');
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
		$this->session->set_userdata('search_gpu_items', $search_text);

		$shop_data = array(
            "result" => $this->customize_model->get_system_info(),
        );

		// Load view
		// $data['pagination'] = $pagination_links;
		// $data['result'] = $admin_logs_record;
		// $data['row'] = $rowno;
		// $data['search'] = $search_text;
		// $data['result2'] = $shop_data;

		$data = array(
			'pagination' => $pagination_links,
			'result' => $admin_logs_record,
			'row' => $rowno,
			'search' => $search_text,
			'data2' => $shop_data,
		);

		$this->load->view('template/header', $shop_data);
		$this->load->view('features/Dashboard/out_of_stock/out_of_stock', $data);
		$this->load->view('template/footer');    
	}


	public function low_of_stock($rowno=0)
	{
		$search_text = "";// Search text

		// Check if the search form is submitted
		if($this->input->post('submit') != NULL )
		{
			$search_text = $this->input->post('search_gpu_items');
			$this->session->unset_userdata(array("search_gpu_items"=>$search_text));
		}
		// Check if the search form is not submitted and there is a search text in session
		elseif($this->input->post('submit') == NULL && $this->session->userdata('search_gpu_items') != NULL)
		{
			$search_text = $this->session->userdata('search_gpu_items');
		}

		$rowperpage = 5;// Row per page

		// Check if the row position is specified
		if($rowno != 0)
		{
			$rowno = ($rowno-1) * $rowperpage;
		}

		// Get the total count of records
		$allcount = $this->dashboard_model->get_low_of_stock_logs_count($search_text);

		// Get the records based on the search text, row position and number of rows per page
		$admin_logs_record = $this->dashboard_model->get_low_of_stock_Data($rowno, $rowperpage, $search_text);

		// Pagination Configuration
		$config['base_url'] = base_url('index.php/features/dashboard_cont/Dashboard_controller/low_of_stock');
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
		$this->session->set_userdata('search_gpu_items', $search_text);

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
		$this->load->view('features/Dashboard/low_of_stock/low_of_stock', $data);
		$this->load->view('template/footer');    
	}
	

	public function all_product($rowno=0)
	{
		$search_text = "";// Search text

		// Check if the search form is submitted
		if($this->input->post('submit') != NULL )
		{
			$search_text = $this->input->post('search_gpu_items');
			$this->session->unset_userdata(array("search_gpu_items"=>$search_text));
		}
		// Check if the search form is not submitted and there is a search text in session
		elseif($this->input->post('submit') == NULL && $this->session->userdata('search_gpu_items') != NULL)
		{
			$search_text = $this->session->userdata('search_gpu_items');
		}

		$rowperpage = 5;// Row per page

		// Check if the row position is specified
		if($rowno != 0)
		{
			$rowno = ($rowno-1) * $rowperpage;
		}

		// Get the total count of records
		$allcount = $this->dashboard_model->get_gpu_logs_count($search_text);

		// Get the records based on the search text, row position and number of rows per page
		$admin_logs_record = $this->dashboard_model->get_all_product_Data($rowno, $rowperpage, $search_text);

		// Pagination Configuration
		$config['base_url'] = base_url('index.php/features/dashboard_cont/Dashboard_controller/all_product');
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
		$this->session->set_userdata('search_gpu_items', $search_text);

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
		$this->load->view('features/Dashboard/all_product/all_product', $data);
		$this->load->view('template/footer');    
	}
	
	

}