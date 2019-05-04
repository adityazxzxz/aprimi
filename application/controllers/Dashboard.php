<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$data['mainpage'] = 'mainpage/dashboard';
		$this->load->view('index',$data);
	}

	public function do_upload()
        {
        	if($this->session->userdata('role') === 'komite'){
				$this->session->set_flashdata('error','you cannot access this page!');
				redirect('/home');
			}
                $config['upload_path']          = './img_upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']			= 'dashboard-sample';
                $config['overwrite']			= TRUE;
               /* $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;*/

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $this->session->set_flashdata('error','Failed');
						redirect('/dashboard');
                }
                else
                {
                        $this->session->set_flashdata('success','Dashboard analytic has been change!');
						redirect('/dashboard');
                }
        }

}
