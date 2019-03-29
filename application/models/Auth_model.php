<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Auth_model extends CI_MODEL{
	function __construct(){
		parent::__construct();
	}

	function find_one($email,$pass){
		$q = $this->db->get_where('ap_users',array('email'=>$email,'password'=>md5($pass)));
		return $q->row();
	}

}