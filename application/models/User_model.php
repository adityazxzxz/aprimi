<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class User_model extends CI_MODEL{
	public $table;
	public $page_num;
	public $total_page;
    public $total_record;

	function __construct(){
		parent::__construct();
		$this->table = 'ap_users';
	}

	function find($fields=null,$cond=null){
		if(!empty($fields))
			$this->db->select();

		if(!empty($cond))
			$this->db->where($cond);

		return $this->db->get($this->table);

	}

	function pagination($page=1,$cond=null){
		$offset = ($page == 1) ? 0 :  ($page*10)-(10);

		$this->page_num = (empty($offset)) ? 1 : $offset+1;

		if(!empty($cond))
			$this->db->where($cond);
		$this->db->limit(10, $offset);
		$q = $this->db->get($this->table);
		$this->total_record = $this->total_data($cond);
        $this->total_page = ($this->total_record > 0 ) ? ceil($this->total_record/10) : 1;

		return $q->result();
	}

	function create($data){
		$q = $this->db->insert($this->table,$data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function update($id,$value){
		$this->db->set($value);
		$this->db->where($id);
		$q = $this->db->update($this->table);
		//$this->db->error();
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function delete($cond){
		$this->db->where($cond);	
		$q = $this->db->delete($this->table);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function total_data($cond=null)
    {
        if(!empty($cond))
            $this->db->where($cond);
        return $this->db->count_all_results($this->table);
    }

}