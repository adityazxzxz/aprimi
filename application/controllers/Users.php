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
		$this->list();
	}

	public function list($page=null){

		if($this->session->userdata('role') !== 'admin'){
			$this->session->set_flashdata('error','you cannot access this page!');
			redirect('/home');
		}
		if(empty($page) || !is_numeric($page)){
			$page = 1;
		}
		$cond = array('role !='=>'admin');
		$req = $this->user->pagination($page,$cond);
		$config['base_url'] = site_url('users/list');
        $config['total_rows'] = (!empty($this->user->total_record)) ? $this->user->total_record : 0;
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
			'no_tlp' => set_value('no_tlp'),
			'job_title' => set_value('job_title'),
			'jabatan_komite' => set_value('jabatan_komite'),
			'company' => set_value('company'),
			'hide' => FALSE,
			'action' => 'save'

		);
		$this->load->view('index',$data);
	}

	public function read($id=null){
		if(empty($id))
			redirect('users/');

		$cond = array(
				'id' => $id
			);
		$req = $this->user->find(null,$cond);
		if(!$req->row())
			redirect('/users');

		$data = array(
			'mainpage' => 'mainpage/users/user_form',
			'button' => 'Update',
			'form_action' => '#',
			'readonly' => 'readonly',
			'id' => $req->row()->id,
			'name' => $req->row()->name,
			'email' => $req->row()->email,
			'password' => '',
			'no_tlp' => $req->row()->no_tlp,
			'job_title' => $req->row()->job_title,
			'jabatan_komite' => $req->row()->jabatan_komite,
			'company' => $req->row()->company,
			'hide' => TRUE,
			'action' => 'read'

		);

		$this->load->view('index',$data);
	}

	public function edit($id=null){
		if(empty($id))
			redirect('users/');

		$cond = array(
				'id' => $id
			);
		$req = $this->user->find(null,$cond);
		if(!$req->row())
			redirect('/users');

		$data = array(
			'mainpage' => 'mainpage/users/user_form',
			'button' => 'Update',
			'form_action' => site_url('users/update'),
			'readonly' => '',
			'id' => $req->row()->id,
			'name' => $req->row()->name,
			'email' => $req->row()->email,
			'password' => '',
			'no_tlp' => $req->row()->no_tlp,
			'job_title' => $req->row()->job_title,
			'jabatan_komite' => $req->row()->jabatan_komite,
			'company' => $req->row()->company,
			'hide' => TRUE,
			'action' => 'edit'

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
			//var_dump($check->row());;exit;
			if(!empty($check->row())){
				$this->session->set_flashdata('error', 'Email already exists!');
				$this->create();
			}else{
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
	}

	public function update(){
		$id = $this->input->post('id');
		$this->_rules();
		if ($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('error', validation_errors());
			echo "<script>window.history.back();</script>";
		}else{
			$cond = array(
				'email' => $this->input->post('email',TRUE)
			);
			$check = $this->user->find(null,$cond);
			if(!empty($check->row())){
				$this->session->set_flashdata('error', 'Email already exists!');
				echo "<script>window.history.back();</script>";
			}else{
				$data = array(
					'name' => $this->input->post('name',TRUE),
					'email' => $this->input->post('email',TRUE),
					'no_tlp' => $this->input->post('no_tlp',TRUE),
					'job_title' => $this->input->post('job_title',TRUE),
					'jabatan_komite' => $this->input->post('jabatan_komite',TRUE),
					'company' => $this->input->post('company',TRUE),
					'role' => $this->input->post('role',TRUE),
					'updated_at' => date('Y-m-d H:i:s')
				);
				$cond = array(
					'id' => $this->input->post('id')
				);
				$req = $this->user->update($cond,$data);
				if($req){
					$this->session->set_flashdata('success', 'Update user succeed!');
				}else{
					$this->session->set_flashdata('error', 'Update user failed!');
				}
				redirect(site_url('users/'));
			}
		}
	}


	public function delete($id){
		if(empty($id))
			redirect('users/');

		$cond = array('id'=>$id);
		$req = $this->user->delete($cond);
		if($req){
			$this->session->set_flashdata('success', 'Delete user succeed!');
		}else{
			$this->session->set_flashdata('error', 'Delete user failed!');
		}
		redirect(site_url('users/'));
		
	}
	public function _rules(){
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if(empty($this->input->post('id'))){
        	$this->form_validation->set_rules('password', 'Password', 'trim|required');
        	$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'trim|required|matches[password]');
        }
        	
        $this->form_validation->set_rules('no_tlp', 'No Telp', 'trim|numeric');
        $this->form_validation->set_rules('job_title', 'Job Title', 'trim');
        $this->form_validation->set_rules('jabatan_komite', 'Job Title', 'trim');
        $this->form_validation->set_rules('company', 'Company', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

        

}
