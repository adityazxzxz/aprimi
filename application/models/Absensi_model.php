<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Absensi_model extends CI_MODEL{
	public $table;
	public $page_num;
	public $total_page;
    public $total_record;

	function __construct(){
		parent::__construct();
		$this->table = 'ap_absensi';
	}

	function find($field,$cond){
		$this->db->select($field);
		$this->db->where($cond);
		$q = $this->db->get($this->table);
		return $q;
	}

	function find_one($agenda_id,$code){
		$q = $this->db->get_where($this->table,array('agenda_id'=>$agenda_id,'code'=>$code));
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

	function pagination($page=1,$cond=null){
		$offset = ($page == 1) ? 0 :  ($page*10)-(10);

		$this->page_num = (empty($offset)) ? 1 : $offset+1;

		if(!empty($cond))
			$this->db->where($cond);
		$this->db->limit(10, $offset);
		$this->db->join('ap_agenda', 'ap_agenda.id = ap_absensi.agenda_id');
		$this->db->join('ap_users', 'ap_users.id = ap_absensi.user_id');
		$q = $this->db->get($this->table);
		$this->total_record = $this->total_data($cond);
        $this->total_page = ($this->total_record > 0 ) ? ceil($this->total_record/10) : 1;

		return $q->result();
	}

	public function total_data($cond=null)
    {
        if(!empty($cond))
            $this->db->where($cond);
        return $this->db->count_all_results($this->table);
    }

}