<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_pad extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_database_pad');
    }

    public function index()
	{
		$this->load->view('errors/error_404');
	}

	public function Form_pad()
	{
		if($this->session->userdata('user_id')!=null){
			// Example WHERE condition
	        $where_condition = "";
	        $table = "pad";

			$data['title'] = "Form PAD | SISDALAB";
			$data['card_title'] = "Form PAD";
			$data['last_num'] = $this->Model_database_pad->last_val() + 1; // Get users with the WHERE condition
			
			$this->load->view('template/assets', $data);
			$this->load->view('template/header', $data);
			$this->load->view('form_pad', $data);
			$this->load->view('template/footer');
		}else{
			redirect(base_url('Landing/index'));
		}
	}

	public function save_pad()
	{
		if($this->session->userdata('user_id')!=null){
			
		}else{
			redirect(base_url('Landing/index'));
		}
	}


	public function DB_PAD()
	{
		if($this->session->userdata('user_id')!=null){
			// Example WHERE condition
	        $where_condition = "";
	        $table = "pad";

	        $data['datatables'] = $this->Model_database_pad->get_data($table, $where_condition); // Get users with the WHERE condition

			$data['title'] = "Database PAD | SISDALAB";
			$data['card_title'] = "List PAD";
			$this->load->view('template/assets', $data);
			$this->load->view('template/header', $data);
			$this->load->view('database_pad', $data);
			$this->load->view('template/footer');
		}else{
			redirect(base_url('Landing/index'));
		}
	}

	
}
