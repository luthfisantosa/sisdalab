<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_database extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_All_database');
    }

	public function index()
	{
		if($this->session->userdata('user_id')!=null){
			// Example WHERE condition
	        $where_condition = "";
	        $table = "pad";

	        $data['datatables'] = $this->Model_All_database->get_data_union($table, $where_condition); // Get users with the WHERE condition

			$data['title'] = "Database Hasil Penyaduran | SISDALAB";
			$data['card_title'] = "Hasil Penyaduran basis data";
			$this->load->view('template/assets', $data);
			$this->load->view('template/header', $data);
			$this->load->view('all_database', $data);
			$this->load->view('template/footer');
		}else{
			redirect(base_url('Landing/index'));
		}
	}

	
}
