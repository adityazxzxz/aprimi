<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Config_model extends CI_MODEL{
	public $table;
	public $page_num;
	public $total_page;
    public $total_record;

	function __construct(){
		parent::__construct();
		$this->table = 'ap_config';
	}

	function get_all($page=1,$cond=null,$field=null){
		$offset = ($page == 1) ? 0 :  ($page*10)-(10);

		$this->page_num = (empty($offset)) ? 1 : $offset+1;
		if(!empty($field))
			$this->db->select($field);

		if(!empty($cond))
			$this->db->where($cond);
		$this->db->limit(10, $offset);
		$q = $this->db->get($this->table);
		$this->total_record = $this->total_data($cond);
        $this->total_page = ($this->total_record > 0 ) ? ceil($this->total_record/10) : 1;

		return $q->result();
	}

	function find($field=null,$cond=null){
		if(!empty($field))
			$this->db->select($field);

		if(!empty($cond))
			$this->db->where($cond);
		
		$q = $this->db->get($this->table);
		return $q;
	}
	function create($data){
		$q = $this->db->insert($this->table,$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function update($cond,$value){
		$this->db->set($value);
		$this->db->where($cond);
		$q = $this->db->update($this->table);
		return $q;
	}

	public function total_data($cond=null)
    {
        if(!empty($cond))
            $this->db->where($cond);
        return $this->db->count_all_results($this->table);
    }


}