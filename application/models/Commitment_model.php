<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Commitment_model extends CI_MODEL{
	public $table;

	function __construct(){
		parent::__construct();
		$this->table = 'ap_commitment';
	}

	function find($field,$cond){
		$this->db->select($field);
		$this->db->where($cond);
		$q = $this->db->get($this->table);
		return $q;
	}

	function find_one($email,$pass){
		$q = $this->db->get_where($this->table,array('email'=>$email,'password'=>md5($pass)));
		return $q->row();
	}

	function create($data){
		$q = $this->db->insert($this->table,$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function update($id,$value){
		$this->db->set($value);
		$this->db->where($id);
		$q = $this->db->update($this->table);
		return $q;
	}

}