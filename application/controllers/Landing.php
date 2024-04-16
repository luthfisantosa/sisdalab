<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_landing');
    }

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('template/assets', $data);
		$this->load->view('landing', $data);
		$this->load->view('template/footer');
	}

	public function Login()
	{
		$nik = $this->input->post('nik');
		$password = md5($this->input->post('password'));

		$user = $this->Model_landing->verify_user($nik, $password);

        if ($user) {
            // Set user session or redirect to dashboard
            // $this->session->set_userdata('user_id', $user->id);
            redirect(base_url('Home'));
        } else {
            // Invalid credentials, redirect back to login page
            redirect(base_url());
        }
	}

	public function Home()
	{
		$data['title'] = "Home";
		$this->load->view('template/assets', $data);
		$this->load->view('template/header', $data);
		$this->load->view('template/footer');
	}
}
