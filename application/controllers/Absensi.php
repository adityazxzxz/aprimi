<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		//$this->load->helper('auth_helper');
		$this->load->model('Auth_model','auth');
		$this->load->model('Agenda_model','agenda');
		$this->load->model('Absensi_model','absensi');
	}
	public function index()
	{
		$this->list_agenda();
	}

	public function list_agenda(){
		$page = $this->uri->segment(3);
		$page = (!empty($page)) ? $page : 1;
		$cond = array('status'=>1);
		$data['data'] = $this->agenda->find($page,$cond);
		$data['total_page'] = $this->agenda->total_page;
		$data['total_record'] = $this->agenda->total_record;
		$this->load->view('mainpage/absensi/list_agenda',$data);
	}


	//Generate QRCODE dan create record db
	public function getqrcode($id){
		$this->load->library('ciqrcode');
		$ucode = substr(md5(rand()),0,7);
		$req = $this->absensi->create(array('agenda_id'=>$id,'code'=>$ucode,'created_at'=>date('Y-m-d H:i:s')));
		if($req){
			$params['data'] = site_url()."/absensi/login/$id/$ucode";
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH."/assets/qrcode/$ucode.png";
			$this->ciqrcode->generate($params);

			echo "<img src=".base_url()."assets/qrcode/$ucode.png>";
		}else{
			echo "invalid";
		}
		
	}

	public function login(){
		$id = $this->uri->segment(3);
		$code = $this->uri->segment(4);
		$data['agenda_id'] = $id;
		$data['ucode'] = $code;

		$this->load->view('mainpage/absensi/login',$data);



	}

	public function do_login(){
		$agenda_id = $this->input->post('agenda_id');
		$ucode = $this->input->post('ucode');
		if(empty($agenda_id) || empty($ucode)){
			$this->session->set_flashdata('error','invalid qrcode!');
			redirect('/absensi/login');
		}

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if(empty($email) || empty($password)){
			$this->session->set_flashdata('error','email or password is empty!');
			redirect('/absensi/login');
		}
			
		$req = $this->auth->find_one($email,$password);
		$date = date('Y-m-d H:i:s');
		if($req){
			$req2 = $this->absensi->find(null,array('agenda_id'=>$agenda_id,'code'=>$ucode,'status'=>0));
			if($req2->row()){
				$update = $this->absensi->update(array('id'=>$req2->row()->id),array('user_id'=>$req->id,'status'=>1,'updated_at'=>$date));
				$this->session->set_flashdata('success','Anda berhasil Absen!');
				redirect('/absensi/login');
			}else{
				$this->session->set_flashdata('error','Absensi gagal!');
				redirect('/absensi/login');
			}
			
		}else{
			//to login page with flash data
			$this->session->set_flashdata('error','Email or password invalid!');
			redirect("/absensi/login/$agenda_id/$ucode");
		}
	}

	public function do_logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
