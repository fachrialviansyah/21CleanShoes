<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();	
	}

	function simpanproduct($data){
		$this->db->insert('product',$data);
	}

	function tampilproduct(){
		$this->db->select('*');
		$this->db->from('product');
	
		$query = $this->db->get();
		return $query->result();
	}

	function delete_data($id){
		$this->db->where($id);
		$this->db->delete('product');
	}

	function edit_data($id){
		return $this->db->get_where('product',$datae);
	
	}

	public function save($data){
      $this->db->insert($this->$table, $data);
      return $this->db->insert_id();
    }

	function update_data($data){
		// var_dump($data['id']);
		// die();
		$update = $this->db->where('id', $data['id'])
							->set($data)
							->update('product');
		 return $update;
		// $this->db->where($where);
		// $this->db->update($datae);
	}

	function getProductById($id) {
		$sql = $this->db->select()
						->from('product')
						->where('id', $id)
						->get();

		return $sql->row_array();
	}

	


}