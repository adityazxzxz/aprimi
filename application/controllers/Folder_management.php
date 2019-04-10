<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Folder_management extends CI_Controller {
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
		redirect('folder_management/list');
	}

	public function list($folder=null){
		$path = './media/';
		if(!empty($folder)){
			$path .=$folder.'/';
		}
		if(!is_dir($path)){
			redirect('folder_management/list');
		}
		$scan = scandir($path);
		$scanned = array_diff($scan, array('..', '.'));
		$data['mainpage'] = 'mainpage/folder_management';
		$data['path'] = $path;
		$data['list_file'] = $scanned;
		$this->load->view('index',$data);
	}

	public function download($folder=null,$file=null){
		$path = './media';
		if(!empty($folder))
			$path .= "/$folder";

		if(!empty($file))
			$path .= "/$file";


		if(is_dir($path))
			redirect('folder_management/list');

		force_download($path, NULL);

		echo $path;


	}

}
