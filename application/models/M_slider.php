<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_slider extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}
	function simpanslider($data)
	{
		$this->db->insert("slider",$data);
	}
	function tampilslider()
	{
		$this->db->select('*');
		$this->db->from('slider');
	
		$query = $this->db->get();
		return $query->result();
	}

}
