<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->model('Config_model');
		$this->load->helper('auth_helper');
		check_session();
		if($this->session->userdata('role') === 'member'){
			$this->session->set_flashdata('error','you cannot access this page!');
			redirect('/home');
		}
	}

	public function index(){
		$data['analytic'] = $this->Config_model->find(null,array('variable_name'=>'dashboard_analytic'))->row();
        $data['title'] = $this->Config_model->find(null,array('variable_name'=>'dashboard_title'))->row();
        $data['mainpage'] = 'mainpage/dashboard';
        $this->load->view('index',$data);
    }

    public function do_upload()
    {
       if($this->session->userdata('role') === 'komite'){
        $this->session->set_flashdata('error','you cannot access this page!');
        redirect('/home');
    }
    $title = $this->input->post('title');
    $path = $_FILES['userfile']['name'];

    $checkImage = $this->Config_model->find(null,array('variable_name'=>'dashboard_analytic'));
    $checkTitle = $this->Config_model->find(null,array('variable_name'=>'dashboard_title'));

    
        if(empty($checkTitle->row())){
            $this->Config_model->create(array(
                'variable_name'=>'dashboard_title',
                'value'=>(!empty($title)) ? $title : 'Aprimi.org Web Traffic'
            ));
        }else{
            $this->Config_model->update(array('variable_name'=>'dashboard_title'),array('value'=>$title));
        }
    

    if(!empty($path)){
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename = 'analytic_april2019';

        $config['upload_path']          = './img_upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $filename;
        $config['overwrite']            = TRUE;
        $config['file_ext_tolower']     = TRUE;
                   /* $config['max_size']             = 100;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;*/

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('userfile'))
                    {
                        $this->session->set_flashdata('error','Failed');
                        redirect('/dashboard');
                    }else{
                        $checkImage = $this->Config_model->find(null,array('variable_name'=>'dashboard_analytic'));
                        $checkTitle = $this->Config_model->find(null,array('variable_name'=>'dashboard_title'));
                        if(empty($checkImage->row())){
                            $this->Config_model->create(array('variable_name'=>'dashboard_analytic','value'=>$filename.'.'.$ext));
                        }else{
                            $this->Config_model->update(array('variable_name'=>'dashboard_analytic'),array('value'=>$filename.'.'.$ext));
                        }
                    }
                }

                $this->session->set_flashdata('success','Dashboard analytic has been change!');
                redirect('/dashboard');

            }

        }
