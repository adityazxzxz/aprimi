<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Folder_management extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->model('Auth_model','auth');
	}

	public function index(){
		$data['mainpage'] = 'mainpage/folder_management';
		$this->load->view('index',$data);
	}
}
