<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->helper('auth_helper');
		check_session();
		if($this->session->userdata('role') === 'member'){
			$this->session->set_flashdata('error','you cannot access this page!');
			redirect('/home');
		}
	}

	public function index(){
		$data['mainpage'] = 'mainpage/dashboard';
		$this->load->view('index',$data);
	}

}
