<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{
	
public function ambillogin($username,$password){
	$this->db->where('username',$username);
	$this->db->where('password',$password);
		$query = $this->db->get('admin');
		if ($query->num_rows()>0){
		foreach ($query->result() as $row) {
			$sess = array ('username' => $row->username,
							'password' => $row->password,
							'status' => "login" ); 
			}
	$this->session->set_userdata($sess);
	redirect('Backend/form');
		}
		else {
			$this->session->set_flashdata('info','MAAF Username dan Password Anda salah!, Mohon diperiksa kembali');
			redirect('admin/login');
		}
	}

public function isNotLogin(){
	return $this->session->set_userdata('user_logged') === null;
}

public function keamanan(){
	$username = $this->session->userdata('username');
	if(empty($username)){
		$this->session->sess_destroy();
		redirect('admin/login');
		}
	}
}
