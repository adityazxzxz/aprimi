<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->helper('auth_helper');
		$this->load->model('Auth_model','auth');
	}
	public function index()
	{
		$this->load->view('login_v2');
	}

	public function do_login(){
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$req = $this->auth->find_one($email,$pass);
		if($req){
			//to dashboard
			$newsession = create_session($req->id);
			$data = array(
				'user_id'=>$req->id,
				'email'=>$email,
				'name'=>$req->name,
				'role'=>$req->role,
				'logged_in'=>TRUE,
				'session'=>$newsession
			);
			$this->session->set_userdata($data);
			redirect('/home');
		}else{
			//to login page with flash data
			$this->session->set_flashdata('error','Email or password invalid!');
			redirect('/');
		}
	}

	public function do_logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
