<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_landing extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

	public function verify_user($username, $password) {
        $query = $this->db->get_where('user', array('username' => $username));
        $user = $query->row();

        if ($user && $user->password === $password) {
            return $user;
        } else {
            return false;
        }
    }
}
