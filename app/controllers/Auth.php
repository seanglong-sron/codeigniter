<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

	function __construct() 
	{
		parent::__construct();		
		$this->load->model('Auth_model');
	}

	public function index(){
		$this->login();
	}

	private function hash_password($pass){
		return password_hash($pass, PASSWORD_BCRYPT);
	}

	public function login(){
		if($this->session->userdata("logged_in")){
			redirect('students/');
		}

		$data = new stdClass();
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			$this->load->view('auth/login', $data);
			
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->auth_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->auth_model->get_user_id_from_username($username);
				$user    = $this->auth_model->get_user($user_id);

				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['logged_in']    = (bool)true;
				
				redirect("vehicles/");
				
			} else {
				$data->error = 'Wrong username or password.';
				$this->load->view('auth/login', $data);
			}
		}
	}

	public function logout() 
	{		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}			
			redirect('login/');
		} else {
			redirect('/');
		}
	}
}