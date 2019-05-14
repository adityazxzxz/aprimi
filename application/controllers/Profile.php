<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct(){
		parent::__construct();
		//load model
		$this->load->model('User_model');
		$this->load->helper('auth_helper');
		check_session();
		if($this->session->userdata('role') === 'member'){
			$this->session->set_flashdata('error','you cannot access this page!');
			redirect('/home');
		}
	}

	public function index(){
		$this->edit();
    }

    public function edit(){
        $req = $this->User_model->find(null,array('id'=>$this->session->userdata('user_id')))->row();
        if($req){
                $data = array(
                'mainpage' => 'mainpage/profile',
                'button' => 'Update',
                'form_action' => 'profile/update',
                'readonly' => '',
                'name' => $req->name,
                'email' => $req->email,
                'no_tlp' => $req->no_tlp,
                'job_title' => $req->job_title,
                'jabatan_komite' => $req->jabatan_komite,
                'company' => $req->company,
                'hide' => FALSE,
                'action' => 'update'

            );
                $this->load->view('index',$data);
        }else{
            $this->session->set_flashdata('error','Profile not found!');
            redirect('/home');
        }
    }

    public function edit_password(){
        $req = $this->User_model->find(null,array('id'=>$this->session->userdata('user_id')))->row();
        if($req){
                $data = array(
                'mainpage' => 'mainpage/edit_password',
                'button' => 'Update',
                'form_action' => 'profile/update_password',
                'readonly' => '',
                'hide' => FALSE,
                'action' => 'update'

            );
                $this->load->view('index',$data);
        }else{
            $this->session->set_flashdata('error','Profile not found!');
            redirect('/home');
        }
    }


    public function update(){
        $this->_rules();
        if ($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('error', validation_errors());
            echo "<script>window.history.back();</script>";
        }else{
            $cond = array(
                'id' => $this->session->userdata('user_id')
            );
            $check = $this->User_model->find(null,$cond);
            if(empty($check->row())){
                $this->session->set_flashdata('error', 'user not found!');
                echo "<script>window.history.back();</script>";
            }else{
                $data = array(
                    'name' => $this->input->post('name',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'no_tlp' => $this->input->post('no_tlp',TRUE),
                    'job_title' => $this->input->post('job_title',TRUE),
                    'jabatan_komite' => $this->input->post('jabatan_komite',TRUE),
                    'company' => $this->input->post('company',TRUE),
                    'role' => ($this->session->userdata('role') === 'admin') ? 'admin' : $this->input->post('role',TRUE),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $cond = array(
                    'id' => $this->session->userdata('user_id')
                );
                $req = $this->User_model->update($cond,$data);
                if($req){
                    $this->session->set_flashdata('success', 'Update profile succeed!');
                }else{
                    $this->session->set_flashdata('error', 'Update profile failed!');
                }
                redirect(site_url('profile/'));
            }
        }
    }

    public function update_password(){
        $this->_password_rules();
        if ($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('error', validation_errors());
            echo "<script>window.history.back();</script>";
        }else{
            $cond = array(
                'id' => $this->session->userdata('user_id'),
                'password' => md5($this->input->post('old_password'))
            );
            $check = $this->User_model->find(null,$cond);
            if(empty($check->row())){
                $this->session->set_flashdata('error', 'Old password is wrong!');
                echo "<script>window.history.back();</script>";
            }else{
                $data = array(
                    'password' => md5($this->input->post('password')),
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $cond = array(
                    'id' => $this->session->userdata('user_id')
                );
                $req = $this->User_model->update($cond,$data);
                if($req){
                    $this->session->set_flashdata('success', 'Update password succeed!');
                }else{
                    $this->session->set_flashdata('error', 'Update password failed!');
                }
                redirect(site_url('home/'));
            }
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            
        $this->form_validation->set_rules('no_tlp', 'No Telp', 'trim|numeric');
        $this->form_validation->set_rules('job_title', 'Job Title', 'trim');
        $this->form_validation->set_rules('jabatan_komite', 'Job Title', 'trim');
        $this->form_validation->set_rules('company', 'Company', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _password_rules(){
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password_conf', 'Re-type Password', 'trim|required|matches[password]');
    }



}


    
