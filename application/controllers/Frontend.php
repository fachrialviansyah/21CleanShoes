<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	function __Construct()
	{
		parent::__construct();
		$this->load->model('M_slider');	
		$this->load->model('M_service');
		$this->load->model('M_product');
		$this->load->model('M_about');
		$this->load->model('M_testimoni');
		$this->load->model('M_setting');
		$this->load->model('M_form');
	}


	public function index()
	{
		$data['slider'] = $this->M_slider->tampilslider();
		$data['service'] = $this->M_service->tampilservice();
		$data['product'] = $this->M_product->tampilproduct();
		$data['about'] = $this->M_about->tampilabout();
		$data['testimoni'] = $this->M_testimoni->tampiltestimoni();
		$data['setting'] = $this->M_setting->tampilWhere('Product Title');
		$data['setting1'] = $this->M_setting->tampilWhere('Footer About');
		$data['setting2'] = $this->M_setting->tampilWhere('Alamat');
		$data['setting3'] = $this->M_setting->tampilWhere('Link');

		  if($_POST) {

	      $data = array(
	        'fname' => 		$this->input->post('fname'),
	        'lname' => 		$this->input->post('lname'),
	        'email' =>  	$this->input->post('email'),
	        'subject' =>  	$this->input->post('subject'),
	        'message' =>  	$this->input->post('message'),
	      
	      );

    $this->M_form->simpan_form($data);

    	$data['slider'] = $this->M_slider->tampilslider();
		$data['service'] = $this->M_service->tampilservice();
		$data['product'] = $this->M_product->tampilproduct();
		$data['about'] = $this->M_about->tampilabout();
		$data['testimoni'] = $this->M_testimoni->tampiltestimoni();
		$data['setting'] = $this->M_setting->tampilWhere('Product Title');
		$data['setting1'] = $this->M_setting->tampilWhere('Footer About');
		$data['setting2'] = $this->M_setting->tampilWhere('Alamat');
		$data['setting3'] = $this->M_setting->tampilWhere('Link');
     
     echo"<script> alert('Input Berhasil!'); window.location.href=<?=base_url();?> </script>";

    } 
		$this->load->view('index.php',$data);
	}

	
}
