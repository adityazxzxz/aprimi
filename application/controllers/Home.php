<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->model('Auth_model','auth');
	}

	public function index(){
		$data['mainpage'] = 'mainpage/dashboard';
		$this->load->view('index',$data);
	}
}
