<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(!function_exists('check_session')){
	function check_session(){
		$ci =& get_instance();
		$ci->load->model('auth_model','auth');
		$ci->load->library('session');
		$session = $ci->session->userdata('session');
		$fields = ['session'];
		$condition = array(
			'session'=>$session
		);
		$q = $ci->auth->find($fields,$condition);
		if(!empty($q->row()) && !empty($session)){
			return true;
		}else{
			$data = array(
				'email',
				'name',
				'role',
				'logged_in',
				'session'
			);
			$ci->session->unset_userdata($data);
			redirect('/');
		}
	}
	
}

if(!function_exists('create_session')){
	function create_session($id){
		$ci =& get_instance();
		$ci->load->model('auth_model','auth');
		$ci->load->library('session');
		$newsession = md5($id.date('Y-m-d H:i:s'));
		$condition = array(
			'id'=>$id
		);
		$value = array(
			'session'=>$newsession
		);
		$ci->auth->update($condition,$value);
		return $newsession;
	}
}
