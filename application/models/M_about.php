<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_about extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}
	function simpanabout($data)
	{
		$this->db->insert("about",$data);
	}
	function tampilabout()
	{
		$this->db->select('*');
		$this->db->from('about');
	
		$query = $this->db->get();
		return $query->result();
	}
}
