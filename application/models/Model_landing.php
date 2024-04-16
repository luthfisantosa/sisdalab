<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_landing extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

	public function verify_user($nik, $password) {
        $query = $this->db->get_where('user', array('NIK' => $nik));
        $user = $query->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }
}
