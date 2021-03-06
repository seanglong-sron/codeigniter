<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function resolve_user_login($username, $password) {
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
	}

	public function get_user_id_from_username($username) {
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');
	}

	public function get_user($user_id) {	
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
	}

	private function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}
}