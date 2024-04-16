<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_landing extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

	public function verify_user($nik, $password) {
        $query = $this->db->get_where('user', array('nik' => $nik));
        $user = $query->row();

        if ($user && $user->password === $password) {
            return $user;
        } else {
            return false;
        }
    }
}
