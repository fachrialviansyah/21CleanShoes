<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_service extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();	
	}

	function simpanservice($data){
		$this->db->insert('service',$data);
	}

	function tampilservice(){
		$this->db->select('*');
		$this->db->from('service');
	
		$query = $this->db->get();
		return $query->result();
	}

	function delete_data($id){
		$this->db->where($id);
		$this->db->delete('service');
	}

	function edit_data($id){
		return $this->db->get_where('service',$datae);
	
	}

	public function save($data){
      $this->db->insert($this->table, $data);
      return $this->db->insert_id();
    }

	function update_data($data){
		// var_dump($data['id']);
		// die();
		$update = $this->db->where('id', $data['id'])
							->set($data)
							->update('service');
		 return $update;
		// $this->db->where($where);
		// $this->db->update($datae);
	}

	function getServiceById($id) {
		$sql = $this->db->select()
						->from('service')
						->where('id', $id)
						->get();

		return $sql->row_array();
	}
}