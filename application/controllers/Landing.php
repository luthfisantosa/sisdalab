<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_landing');
    }

	public function index()
	{
		$data['title'] = "Welcome to SISDALAB | Login";
		$this->load->view('template/assets', $data);
		$this->load->view('landing', $data);
		// $this->load->view('template/footer');
	}

	public function Login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$user = $this->Model_landing->verify_user($username, $password);

        if ($user) {
            // Set user session or redirect to dashboard
            $this->session->set_userdata('user_id', $user->username);
            $this->session->set_userdata('name', $user->nama);
            $this->session->set_userdata('status', $user->status);
            $this->session->set_flashdata('notif', 'login success');
            redirect(base_url('Landing/Home'));
        } else {
            // Invalid credentials, redirect back to login page
            $this->session->set_flashdata('notif', 'Username atau Password Salah');
            redirect(base_url('Landing/index'));
        }
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('status');
        redirect(base_url('Landing/index'));
	}

	public function Home()
	{
		if($this->session->userdata('user_id')!=null){
			$data['title'] = "Home";
			$this->load->view('template/assets', $data);
			$this->load->view('template/header', $data);
			$this->load->view('template/footer');
		}else{
			redirect(base_url('Landing/index'));
		}		
	}
}
