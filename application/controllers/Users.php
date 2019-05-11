<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->model('User_model','user');
		$this->load->helper('auth_helper');
		$this->load->library('form_validation');
		check_session();
		if($this->session->userdata('role') !== 'admin'){
			$this->session->set_flashdata('error','you cannot access this page!');
			redirect('/home');
		}
	}

	public function index(){
		
		if($this->session->userdata('role') !== 'admin'){
			$this->session->set_flashdata('error','you cannot access this page!');
			redirect('/home');
		}
		if(empty($page) || !is_numeric($page)){
			$page = 1;
		}
		$req = $this->user->pagination($page);
        $config['total_rows'] = (!empty($this->commit->total_record)) ? $this->commit->total_record : 0;
        $config['full_tag_open']    = '<div class="pagging text-right"><nav><ul class="pagination justify-content-center">';
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

		$data['mainpage'] = 'mainpage/users/users';
		$data['data'] = $req;
		$data['total_page'] = $this->user->total_page;
		$data['start'] = $this->user->page_num;
		$data['total_record'] = $this->user->total_record;
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('index',$data);
	}

	public function create(){
		$data = array(
			'mainpage' => 'mainpage/users/user_form',
			'button' => 'Save',
			'form_action' => 'users/save',
			'readonly' => '',
			'name' => set_value('name'),
			'email' => set_value('email'),
			'password' => '',
			'no_tlp' => set_value('no_telp'),
			'job_title' => set_value('job_title'),
			'jabatan_komite' => set_value('jabatan_komite'),
			'company' => set_value('company'),
			'hide' => FALSE

		);

		$this->load->view('index',$data);
	}

	public function read(){
		$data = array(
			'mainpage' => 'mainpage/users/user_form',
			'button' => 'Update',
			'form_action' => site_url('users/save'),
			'readonly' => 'readonly',
			'name' => set_value('name'),
			'email' => set_value('email'),
			'password' => set_value('password'),
			'no_tlp' => set_value('no_telp'),
			'job_title' => set_value('job_title'),
			'jabatan_komite' => set_value('jabatan_komite'),
			'company' => set_value('company'),
			'hide' => TRUE

		);

		$this->load->view('index',$data);
	}

	public function edit(){
		$data = array(
			'mainpage' => 'mainpage/users/user_form',
			'button' => 'Update',
			'form_action' => site_url('users/save'),
			'readonly' => '',
			'name' => set_value('name'),
			'email' => set_value('email'),
			'password' => set_value('password'),
			'no_tlp' => set_value('no_telp'),
			'job_title' => set_value('job_title'),
			'jabatan_komite' => set_value('jabatan_komite'),
			'company' => set_value('company')

		);

		$this->load->view('index',$data);
	}

	public function save(){
		$this->_rules();
		if ($this->form_validation->run() === FALSE){
			$this->create();
		}else{
			$cond = array(
	 			'email' => $this->input->post('email',TRUE)
	 		);
	        $check = $this->user->find(null,$cond);
	        if($check->row() > 0){
	        	$this->session->set_flashdata('success', 'Email already exists!');
	        	redirect('users/create');
	        }

	        
	        $data = array(
	        	'name' => $this->input->post('name',TRUE),
	        	'email' => $this->input->post('email',TRUE),
	        	'password' => md5($this->input->post('password',TRUE)),
	        	'no_tlp' => $this->input->post('no_tlp',TRUE),
	        	'job_title' => $this->input->post('job_title',TRUE),
	        	'jabatan_komite' => $this->input->post('jabatan_komite',TRUE),
	        	'company' => $this->input->post('company',TRUE),
	        	'role' => $this->input->post('role',TRUE),
	        	'created_at' => date('Y-m-d H:i:s')
	        );

	        $req = $this->user->create($data);
	        if($req){
	        	$this->session->set_flashdata('success', 'Create user succeed!');
	        }else{
	        	$this->session->set_flashdata('error', 'Created user failed!');
	        }
	        redirect(site_url('users/'));
		} 
			
 		
 		

	}

	public function _rules(){
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password_conf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('no_tlp', 'No Telp', 'trim|numeric');
        $this->form_validation->set_rules('job_title', 'Job Title', 'trim');
        $this->form_validation->set_rules('jabatan_komite', 'Job Title', 'trim');
        $this->form_validation->set_rules('company', 'Company', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

        

}
