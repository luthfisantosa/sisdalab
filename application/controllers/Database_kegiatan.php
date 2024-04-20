<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_kegiatan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_kegiatan');
    }

	public function laporan_kegiatan()
	{
		if($this->session->userdata('user_id')!=null){
			// Example WHERE condition
	        $where_condition = "";
	        $table = "laporan_kegiatan";

	        $data['datatables'] = $this->Model_kegiatan->get_data($table, $where_condition); // Get users with the WHERE condition

			$data['title'] = "Laporan Hasil Kegiatan | SISDALAB";
			$data['card_title'] = "Laporan Hasil Kegiatan";
			$this->load->view('template/assets', $data);
			$this->load->view('template/header', $data);
			$this->load->view('laporan_kegiatan', $data);
			$this->load->view('template/footer');
		}else{
			redirect(base_url('Landing/index'));
		}
	}

	
}
