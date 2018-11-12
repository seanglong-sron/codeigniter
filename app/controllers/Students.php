<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller{
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$bc = array(array('link' => '#', 'page' => '<i class="fa fa-users"></i> Students'));
		$meta = array(
			'page_title' => 'Students Lists',
			'page_header' => 'Students Lists',
			'page_desc' => 'This is a welcome description',
			'bc' => $bc,
			// 'nav' => 'manage-people',
			// 'sub' => 'manage-student'
		);

		$this->page_construct('students/index', $meta);
	}

	public function add_student(){
		$bc = array(array('link' => site_url('/students'), 'page' => '<i class="fa fa-users"></i> Students'), array('link' => '#', 'page' => 'Add Student'));
		$meta = array(
			'page_title' => 'Add Students',
			'page_header' => 'Add Students',
			'page_desc' => 'This is a welcome description',
			'bc' => $bc,
		);

		$this->page_construct('students/index', $meta);
	}
}