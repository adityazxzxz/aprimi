<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->model('Agenda_model','agenda');
		$this->load->helper('auth_helper');
		check_session();
		if($this->session->userdata('role') !== 'admin'){
			$this->session->set_flashdata('error','you cannot access this page!');
			redirect('/home');
		}
	}

	public function index(){
		$page = $this->uri->segment(2);
		$page = (!empty($page)) ? $page : 1;
		$data['mainpage'] = 'mainpage/agenda';
		$data['data'] = $this->agenda->find($page);
		$data['total_page'] = $this->agenda->total_page;
		$data['total_record'] = $this->agenda->total_record;
		$this->load->view('index',$data);
	}

	public function create(){
		$nama = $this->input->post('nama');
		$lokasi = $this->input->post('lokasi');
		$tanggal = $this->input->post('tanggal');
		$user_created = $this->session->userdata('user_id');

		$req = $this->agenda->create(array(
			'nama'=>$nama,
			'lokasi'=>$lokasi,
			'tanggal'=>$tanggal,
			'user_created'=>$user_created
		));
		if($req){
			echo json_encode(array(
				'error'=>false,
				'message'=>'Agenda has been created!'
			));
		}else{
			echo json_encode(array(
				'error'=>true,
				'message'=>'Failed to create agenda!'
			));
		}
	}
}
