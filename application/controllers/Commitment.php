<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commitment extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->model('Commitment_model','commit');
		$this->load->helper('auth_helper');
		check_session();
	}

	public function index(){
		$data['mainpage'] = 'mainpage/commitment';
		$this->load->view('index',$data);
	}

	public function add_commitment(){
		$user_id = $this->session->userdata('user_id');
		$name = $this->input->post('name');
		$company = $this->input->post('company');
		$confirm = $this->input->post('confirm');
		$time = ($this->input->post('time')==="other") ? $this->input->post('other_time') : $this->input->post('time');

		$exists = $this->commit->find('*',array('user_id'=>$user_id,'YEAR(created_at)'=>date('Y')));
		if($exists){
			$this->session->set_flashdata('error','Commitment this year already exist!');
			return redirect('/commitment');
		}
		$req = $this->commit->create(array(
			'user_id'=>$this->session->userdata('id'),
			'name'=>$name,
			'company'=>$company,
			'confirmed'=>$confirm,
			'time'=>$time
		));
		if($req){
			$this->session->set_flashdata('success','Create Commitment succeed!');
			redirect('/commitment');
		}else{
			$this->session->set_flashdata('error','Create Commitment failed!');
			redirect('/commitment');
		}
	}
}
