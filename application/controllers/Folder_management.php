<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Folder_management extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->model('Auth_model','auth');
		$this->load->helper('auth_helper');
		check_session();
	}

	public function index(){
		redirect('folder_management/list');
	}

	public function list($folder=null){
		$path = './media/';
		if(!empty($folder)){
			$path .=$folder.'/';
		}
		$scan = scandir($path);
		$scanned = array_diff($scan, array('..', '.'));
		$data['mainpage'] = 'mainpage/folder_management';
		$data['path'] = $path;
		$data['list_file'] = $scanned;
		$this->load->view('index',$data);
		/*foreach ($scanned as $dir => $value) {
			echo $value;if(is_dir($path.$value)) echo "directory"; else echo "bukan dir";echo date("F d Y H:i:s",filemtime($path.$value))."<br>";
		}*/
	}
}
