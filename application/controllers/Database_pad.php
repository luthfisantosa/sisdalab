<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database_pad extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_database_pad');
		// Load the URL Helper
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('errors/error_404');
	}

	public function Form_pad()
	{
		if ($this->session->userdata('user_id') != null) {
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
		} else {
			redirect(base_url('Landing/index'));
		}
	}

	public function Form_pad2()
	{
		if ($this->session->userdata('user_id') != null) {
			// Example WHERE condition
			$where_condition = "";
			$table = "pad";

			$data['title'] = "Form PAD | SISDALAB";
			$data['card_title'] = "Form PAD";
			$data['last_num'] = $this->Model_database_pad->last_val() + 1; // Get users with the WHERE condition

			$this->load->view('template/assets', $data);
			$this->load->view('template/header', $data);
			$this->load->view('form_pad2', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url('Landing/index'));
		}
	}

	public function tambahUraian()
	{
		if ($this->input->post('action') == null) {
			$no_pad = $this->input->post('no_pad');
			$cv = $this->input->post('cv');
			$nama_pemborong = $this->input->post('nama_pemborong');
			$kode_rekening = $this->input->post('kode_rekening');
			$tgl_spk = $this->input->post('tanggal_spk');
			$lokasi = $this->input->post('lokasi');
			$jenis_pengujian = $this->input->post('jenis_pengujian');
			$kegiatan = $this->input->post('kegiatan');
			$uraian = 1;

			$data['uraian'] = $uraian;
			$data['kegiatan'] = $kegiatan;
			$data['no_pad'] = $no_pad;
			$data['penyedia_jasa'] = $cv;
			$data['nama_pemborong'] = $nama_pemborong;
			$data['kode_rekening'] = $kode_rekening;
			$data['tanggal'] = $tgl_spk;
			$data['lokasi'] = $lokasi;
			$data['jenis_pengujian'] = $jenis_pengujian;

			$data['title'] = "Form PAD | Tambah Uraian | SISDALAB";
			$data['card_title'] = "Tambah Uraian PAD";

			$this->load->view('template/assets', $data);
			$this->load->view('template/header', $data);
			$this->load->view('tambah_uraian', $data);
			$this->load->view('template/footer');
		} else if ($this->input->post('action') == 'add_more') {
			$uraian = $this->input->post('uraian') + 1;
			$this->save_pad();

			echo $uraian;
		} else if ($this->input->post('action') == 'no_more') {
			$this->save_pad();

			redirect(base_url('All_database/index'));
		}
	}

	public function save_pad()
	{
		date_default_timezone_set("Asia/Jakarta");
		if ($this->session->userdata('user_id') != null) {

			$datas = array(
				'no_pad' => $this->input->post('no_pad'),
				'tanggal' => $this->input->post('tanggal_spk'),
				'kode_rekening' => $this->input->post('kode_rekening'),
				'rekening' => $this->input->post('no_rekening'),
				'kegiatan' => $this->input->post('kegiatan'),
				'penyedia_jasa' => $this->input->post('cv'),
				'pemborong' => $this->input->post('nama_pemborong'),
				'lokasi' => $this->input->post('lokasi'),
				'jenis_pengujian' => $this->input->post('jenis_pengujian'),
				'uraian_pengujian' => $this->input->post('uraian_pengujian'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'harga' => $this->input->post('harga'),
				'jumlah_rp' => $this->input->post('jumlah_rp'),
				'total' => $this->input->post('total'),
				'created_by' => $this->session->userdata('name'),
				'created_date' => date("Y-mm-dd h:i:sa")
			);
			$this->Model_database_pad->save($datas);
		} else {
			redirect(base_url('Landing/index'));
		}
	}

	public function get_summary()
	{
		$id = $this->input->get('no_pad');  // Get the ID from the AJAX request

		$summary = $this->Model_database_pad->summarize_columns($id);

		echo $summary->jumlah_rp;
	}

	public function DB_PAD()
	{
		if ($this->session->userdata('user_id') != null) {
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
		} else {
			redirect(base_url('Landing/index'));
		}
	}

	public function fetchData() {
        $data = $this->Model_database_pad->getData();
        echo json_encode(['data' => $data]);
    }
}
