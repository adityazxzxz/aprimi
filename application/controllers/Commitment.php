<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commitment extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->model('Commitment_model','commit');
		$this->load->helper('auth_helper');
		check_session();
		if($this->session->userdata('role') === 'member'){
			$this->session->set_flashdata('error','you cannot access this page!');
			redirect('/home');
		}
	}

	public function index(){
		$data['mainpage'] = 'mainpage/commitment';
		$this->load->view('index',$data);
	}

	public function add_commitment(){
		$user_id = $this->session->userdata('user_id');
		$name = $this->input->post('name');
		$company = $this->input->post('company');
		$note = $this->input->post('note');
		$confirm = $this->input->post('confirm');
		$time = ($this->input->post('time')==="other") ? $this->input->post('other_time') : $this->input->post('time');

		$exists = $this->commit->find($page=1,array('user_id'=>$user_id,'YEAR(created_at)'=>date('Y')));
		if($exists){
			$this->session->set_flashdata('error','Commitment this year already exist!');
			return redirect('/commitment');
		}
		$req = $this->commit->create(array(
			'user_id'=>$this->session->userdata('user_id'),
			'name'=>$name,
			'company'=>$company,
			'confirmed'=>$confirm,
			'time'=>$time,
			'note'=>$note
		));
		if($req){
			$this->session->set_flashdata('success','Create Commitment succeed!');
			redirect('/commitment');
		}else{
			$this->session->set_flashdata('error','Create Commitment failed!');
			redirect('/commitment');
		}
	}

	public function list_commitment($page=null){
		if($this->session->userdata('role') !== 'admin'){
			$this->session->set_flashdata('error','you cannot access this page!');
			redirect('/home');
		}
		if(empty($page) || !is_numeric($page)){
			$page = 1;
		}
		$req = $this->commit->find($page);
		$config['base_url'] = site_url('commitment/list_commitment/');
        $config['total_rows'] = (!empty($this->commit->total_record)) ? $this->commit->total_record : 0;
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		//$config['total_rows'] = 11;
        $this->load->library('pagination');
        $this->pagination->initialize($config);

		$data['mainpage'] = 'mainpage/commitment_list';
		$data['data'] = $req;
		$data['total_page'] = $this->commit->total_page;
		$data['start'] = $this->commit->page_num;
		$data['total_record'] = $this->commit->total_record;
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('index',$data);
	}
}
