<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_form extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();	
	}

	function get_form_list($limit,$start){
		$query = $this->db->get('form',$limit,$start);
		return $query;
	}

	function simpan_form($data){
		$this->db->insert('form',$data);
	}

	function tampilform(){
		$this->db->select('*');
		$this->db->from('form');
	
		$query = $this->db->get();
		return $query->result();
	}

	function delete_data($id){
		$this->db->where($id);
		$this->db->delete('form');
	}

}