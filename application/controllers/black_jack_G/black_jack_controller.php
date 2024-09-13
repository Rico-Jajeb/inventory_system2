<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class black_jack_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('black_jack_model');
	}


    public function index()
    {
        $cards = ['1','2','3','4','5','6','7','8','9','10','J','Q','K'];

        $rd_num = rand(0,12);

        $card_val1 = $rd_num;

        $card_value = array( 
            "cd1" => $cards[$rd_num],
            // 'rd' => $rd_num,
            'rd' => $card_val1, 

        );


        $this->load->view('template/header');
        $this->load->view('black_jack_game/black_jack');
        $this->load->view('template/footer');
    }

    public function bet()
   
    {
       

        // $final_cd = $cards[$rd_num];

        // $card_value = array( 
        //     "cd1" => $cards[$rd_num],
        //     // 'rd' => $rd_num,
        //     'rd' => $card_val1, 
        // );
   
        $cards = ['A','2','3','4','5','6','7','8','9','10','J','Q','K'];

        $rd_num1 = rand(0,12);
        $rd_num2 = rand(0,12);
        $rd_num3 = rand(0,12);
        $rd_num4 = rand(0,12);
        $rd_num5 = rand(0,12);
        $rd_num6 = rand(0,12);
    
        $card1 = $cards[$rd_num1];
        $card2 = $cards[$rd_num2];
        $card3 = $cards[$rd_num3];
        $card4 = $cards[$rd_num4];
        $card5 = $cards[$rd_num5];
        $card6 = $cards[$rd_num6];


        $bet = $this->input->post('bet');
        
        $data = array(
            'bet' => $bet,
            'card1' => $card1,
            'card2' => $card2,
            'card3' => $card3,
            'card4' => $card4,
            'card5' => $card5,
            'card6' => $card6,
        );

        $this->black_jack_model->bets($data);

        redirect('res');
    }

    public function res()
    {
        $data = array(
            "result" =>   $this->black_jack_model->get_latest_card(),
        ); 

        

        $this->load->view('template/header');
        $this->load->view('black_jack_game/black_jack2', $data);
        $this->load->view('template/footer');
    }

    // public function hit()
    // {
    //     $data = array(
    //         "result" =>   $this->black_jack_model->get_latest_card(),
    //     ); 

    //     $this->load->view('template/header');
    //     $this->load->view('black_jack_game/black_jack2', $data);
    //     $this->load->view('template/footer');
    // }




    public function login()
    {



    }


    public function gc(){


    }


    public function retrieve(){


    }




    public function user_data(){

    }

    public function insert_data($data){

    }




    public function sign_up(){


    }
}