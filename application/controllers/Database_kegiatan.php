<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database_kegiatan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_kegiatan');
	}

	public function form_laporan_kegiatan()
	{
		if ($this->session->userdata('user_id') != null) {
			// Example WHERE condition
			$where_condition = "";
			$table = "laporan_kegiatan";

			$data['datatables'] = $this->Model_kegiatan->get_data($table, $where_condition); // Get users with the WHERE condition
			$data['last_num'] = $this->Model_kegiatan->last_val() + 1; // Get users with the WHERE condition

			$data['title'] = "Form Laporan Hasil Kegiatan | SISDALAB";
			$data['card_title'] = "Form Laporan Hasil Kegiatan";
			$this->load->view('template/assets', $data);
			$this->load->view('template/header', $data);
			$this->load->view('form_laporan_kegiatan', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url('Landing/index'));
		}
	}

	public function form_submit()
	{
		// Set the timezone to Jakarta
		$jakarta_timezone = new DateTimeZone('Asia/Jakarta');
		// Create a DateTime object for the current date and time in Jakarta timezone
		$current_time = new DateTime('now', $jakarta_timezone);
		// Format the datetime as needed
		$current_time_str = $current_time->format('Y-m-d H:i:s');

		if ($this->session->userdata('user_id') != null) {
			$data = array(
				'no_reg' => $this->input->post('no_registrasi'),
				'tanggal_dibuat' => $this->input->post('tanggal_dibuat'),
				'no_laporan' => $this->input->post('no_laporan'),
				'kode_rekening' => $this->input->post('kode_rekening'),
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'nama_lokasi' => $this->input->post('nama_lokasi'),
				'cv' => $this->input->post('cv'),
				'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
				'tipe_pekerjaan' => $this->input->post('tipe_pekerjaan'),
				'nama_pemborong' => $this->input->post('nama_pemborong'),
				'wilayah' => $this->input->post('wilayah'),
				'abt' => $this->input->post('abt'),
				'date_created' => $current_time_str,
				'created_by' => $this->session->userdata('name'),
			);

			try{
				$this->Model_kegiatan->insert_data($data);
				$this->session->set_flashdata('notif_title', 'Sukses');
				$this->session->set_flashdata('notif', 'Input Success');
				$this->session->set_flashdata('notif_icon', 'success');
				redirect(base_url('Database_kegiatan/laporan_kegiatan'));
			}catch(Exception $e){
				$this->Model_kegiatan->insert_data($data);
				$this->session->set_flashdata('notif', $e);
				$this->session->set_flashdata('notif_title', 'Maaf');
				$this->session->set_flashdata('notif_icon', 'error');
				redirect(base_url('Database_kegiatan/laporan_kegiatan'));
			}

		} else {
			redirect(base_url('Landing/index'));
		}
	}

	public function laporan_kegiatan()
	{
		if ($this->session->userdata('user_id') != null) {
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
		} else {
			redirect(base_url('Landing/index'));
		}
	}

	public function delete_row() {
        $id = $this->input->post('id');
        if ($this->Model_kegiatan->delete_row($id)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}
