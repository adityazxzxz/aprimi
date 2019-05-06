<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->model('Agenda_model','agenda');
		$this->load->model('Absensi_model','absensi');
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
		$deskripsi = $this->input->post('deskripsi');

		$req = $this->agenda->create(array(
			'nama'=>$nama,
			'deskripsi'=>$deskripsi,
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

	public function absensi_list($page=null){
		if($this->session->userdata('role') !== 'admin'){
			$this->session->set_flashdata('error','you cannot access this page!');
			redirect('/home');
		}
		if(empty($page) || !is_numeric($page)){
			$page = 1;
		}
		$cond = array('ap_absensi.status'=>1);
		$req = $this->absensi->pagination($page,$cond);
		$config['base_url'] = site_url('commitment/list_commitment/');
        $config['total_rows'] = (!empty($this->absensi->total_record)) ? $this->absensi->total_record : 0;
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

		$data['mainpage'] = 'mainpage/absensi_list';
		$data['data'] = $req;
		$data['total_page'] = $this->absensi->total_page;
		$data['start'] = $this->absensi->page_num;
		$data['total_record'] = $this->absensi->total_record;
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('index',$data);
	}
}
