<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller{
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$bc = array(array('link' => '#', 'page' => '<i class="fa fa-dashboard"></i> Dashboard'));
		$meta = array(
			'page_title' => 'Dashboard',
			'page_header' => '',
			'page_desc' => '',
			'bc' => $bc
		);
		$this->page_construct('dashboard', $meta);
	}
}