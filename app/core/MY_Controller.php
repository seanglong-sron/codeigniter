<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("logged_in")){
			redirect("login");
		}
	}

	public function page_construct($page, $meta =array()){
		$this->load->view('templates/header', $meta);
		$this->load->view($page, $meta);
		$this->load->view('templates/footer');
	}
}