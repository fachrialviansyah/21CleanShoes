<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __Construct()
	{
		parent::__construct();
		$this->load->model('M_form');
    $this->load->model('M_slider');
		$this->load->model('M_service');
    $this->load->model('M_product');
    $this->load->model('M_about');
    $this->load->model('M_testimoni');
    $this->load->model('M_setting');
    $this->load->model('M_login');
    $this->load->library('form_validation');
    if ($this->session->userdata('status') != "login"){
              redirect(base_url("admin/login"));
    }	
	}
 public function index()
  {
        // load view admin/overview.php
        $this->load->view('Backend/form');
  }

  public function form()
  {
    $data['form'] = $this->M_form->tampilform();
    $this->load->view('Backend/form.php',$data); 
  }
	public function slider()
	{
		$data['slider'] = $this->M_slider->tampilslider();
		$this->load->view('Backend/slider.php',$data);
	}
	public function service()
	{
		$data['service'] = $this->M_service->tampilservice();
    $this->load->view('Backend/service.php',$data);
	}
  public function product()
	{
    $data['product'] = $this->M_product->tampilproduct();
    $this->load->view('Backend/product.php',$data); 
  }
	public function about()
	{
		$data['about'] = $this->M_about->tampilabout();
    $this->load->view('Backend/about.php',$data);
	}
	public function testimoni()
	{
    $data['testimoni'] = $this->M_testimoni->tampiltestimoni();
		$this->load->view('Backend/testimoni.php',$data);
	}
  public function footer()
  {
    $data['footer1'] = $this->M_setting->tampilWhere('Footer About');
    $data['footer2'] = $this->M_setting->tampilWhere('Alamat');
    $data['footer3'] = $this->M_setting->tampilWhere('Link');

    $this->load->view('Backend/footer.php',$data);
  }
	public function tambahslider()
	{
		$this->load->library('upload');
        $nmfile = $_FILES['foto']['name']; //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/img/slider/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '10000'; //maksimum besar file 2M
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
        
    $fotox = $_FILES['foto']['name'];
		if($fotox)
        {
        	//die();
        	    $this->upload->initialize($config);
        		  $this->upload->do_upload('foto', $config);
            	
                $gbr = $this->upload->data();
			
                $data = array(
                  'gambar' =>$gbr['file_name'],
        				  'judul_slider'=>$this->input->post('judul_slider'),
        				  'konten_slider' =>$this->input->post('konten_slider'),
                );              
              
				$this->M_slider->simpanslider($data);
				echo"<script> alert('Input Berhasil!'); window.location.href='slider'; </script>";

        } else {
           
        echo"<script> alert('Error! Upload Gagal'); window.location.href='slider'; </script>";
        
        }
	}

	public function tambahservice() {
		$this->load->library('upload');
        $nmfile = $_FILES['logo']['name']; //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/img/service/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '10000'; //maksimum besar file 2M
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
        
        $fotox = 1; //$_FILES['foto']['name'];
		
		    if($fotox) {
        	
            $this->upload->initialize($config);
            $this->upload->do_upload('logo', $config);
            $gbr = $this->upload->data();



		 	$dataService = array(
				  'konten_service' => $this->input->post('konten'),
				  'judul' => $this->input->post('judul'),
				  'logo' => $gbr['file_name'],
         	);             

			$this->M_service->simpanservice($dataService);
			echo"<script> alert('Input Berhasil!'); window.location.href='service'; </script>";


   	} else {

   		echo"<script> alert('Error! Upload Gagal'); window.location.href='service'; </script>";
   	}

  }

  public function deleteservice($id) {
 		$hapus = array(
 			'id' => $id
 		);

 		$this->M_service->delete_data($hapus);

 		 redirect('Backend/service');
 	}

  public function deleteproduct($id) {
    $hapus = array(
      'id' => $id
    );

    $this->M_product->delete_data($hapus);

     redirect('Backend/product');
  }    

  public function getServiceById() {
    $id = $this->input->post('id');

    $service = $this->M_service->getServiceById($id);
    // var_dump($service);

    echo json_encode($service);
  }

  public function update_service(){    
    $this->load->library('upload');
      $nmfile = $_FILES['gbr']['name']; //nama file saya beri nama langsung dan diikuti fungsi time
      $config['upload_path'] = './assets/img/service/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['max_size'] = '10000'; //maksimum besar file 2M
      $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
        $fotox = 1; //$_FILES['foto']['name'];
    
        if($fotox) {
          
          $this->upload->initialize($config);
          $this->upload->do_upload('logo', $config);
          $gbr = $this->upload->data();            

      $data = array(
        'id' => $this->input->post('id_service'),
        'judul' => $this->input->post('judul'),
        'konten_service' =>  $this->input->post('konten'),
        'logo' => $gbr['file_name'],
      );

    $this->M_service->update_data($data);

     echo"<script> alert('Input Berhasil!'); window.location.href='service'; </script>";

     } else {

     echo"<script> alert('Error! Upload Gagal'); window.location.href='service'; </script>";
     }
   }

  public function tambahproduct(){
    $this->load->library('upload');
        $nmfile = $_FILES['image']['name']; //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/img/product/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '10000'; //maksimum besar file 2M
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
        $fotox = $_FILES['image']['name'];
    
  if($fotox){
    $this->upload->initialize($config);
    $this->upload->do_upload('image', $config);
      
        $gbr = $this->upload->data();

        $data = array(
          'image' => $gbr['file_name'],
        );              
              
    $this->M_product->simpanproduct($data);

      echo"<script> alert('Input Berhasil!'); window.location.href='product'; </script>";

      } else {
           
      echo"<script> alert('Error! Upload Gagal'); window.location.href='product'; </script>";
        
      }
  }

  public function update_product(){
    $this->load->library('upload');
      $nmfile = $_FILES['image']['name']; //nama file saya beri nama langsung dan diikuti fungsi time
      $config['upload_path'] = './assets/img/product/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['max_size'] = '10000'; //maksimum besar file 2M
      $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
      $fotox = 1; //$_FILES['foto']['name'];
    
      if($fotox) {

    $this->upload->initialize($config);
    $this->upload->do_upload('image', $config);
    $gbr = $this->upload->data();            

      $data = array(
        'id' => $this->input->post('id_product'),
        'image' => $gbr['file_name'],
      );

    $this->M_product->update_data($data);

     echo"<script> alert('Input Berhasil!'); window.location.href='product'; </script>";

     } else {

     echo"<script> alert('Error! Upload Gagal'); window.location.href='product'; </script>";
     }
  }

  public function getProductById() {
    $id = $this->input->post('id');
    $product = $this->M_product->getProductById($id);

    echo json_encode($product);  
  }

  public function getProductTitle() {
    $where = "Product Title";
    $product = $this->M_setting->getProductTitle($where);
      
      // var_dump($product);
      // die();

      echo json_encode($product);
    }

  public function updateProductTitle(){
    $data = array(
        'content' => $this->input->post('konten'),
      );

    $id = $this->input->post('id');
    $where = "Product Title";
    $update = $this->M_setting->update_data($id, $data, $where); 

  if($update)
    echo"<script> alert('Input Berhasil!'); window.location.href='product'; </script>";
  else 
    echo"<script> alert('Error! Upload Gagal'); window.location.href='product'; </script>";
  }
  
  public function tambahabout(){
    $this->load->library('upload');
      $nmfile = $_FILES['foto']['name']; //nama file saya beri nama langsung dan diikuti fungsi time
      $config['upload_path'] = './assets/img/about/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['max_size'] = '10000'; //maksimum besar file 2M
      $config['file_name'] = $nmfile; //nama yang terupload nantinya
          
      $fotox = $_FILES['foto']['name'];

  if($fotox){

    $this->upload->initialize($config);
    $this->upload->do_upload('foto', $config);
              
      $gbr = $this->upload->data();
      $data = array(
        'image' =>$gbr['file_name'],
        'judul_about'=>$this->input->post('judul_about'),
        'konten_about' =>$this->input->post('konten_about'),
      );              
              
    $this->M_about->simpanabout($data);
        
      echo"<script> alert('Input Berhasil!'); window.location.href='about'; </script>";

      } else {

      echo"<script> alert('Error! Upload Gagal'); window.location.href='about'; </script>";
        
      }
  }

  public function tambahtestimoni() {
    $this->load->library('upload');
        $nmfile = $_FILES['foto']['name']; //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/img/testimoni/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '10000'; //maksimum besar file 2M
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
        
        $fotox = 1; //$_FILES['foto']['name'];
    
  if($fotox) {         
    $this->upload->initialize($config);
    $this->upload->do_upload('foto', $config);
      
      $gbr = $this->upload->data();
      $dataTestimoni = array(
        'konten_testimoni' => $this->input->post('konten'),
        'nama' => $this->input->post('nama'),
        'foto' => $gbr['file_name'],
        );             

    $this->M_testimoni->simpantestimoni($dataTestimoni);

      echo"<script> alert('Input Berhasil!'); window.location.href='testimoni'; </script>";

    } else {

      echo"<script> alert('Error! Upload Gagal'); window.location.href='testimoni'; </script>";
    }
  }

  public function deletetestimoni($id) {
      $hapus = array(
        'id' => $id
      );

    $this->M_testimoni->delete_data($hapus);

       redirect('Backend/testimoni');
  }

  public function update_testimoni(){    
    $this->load->library('upload');
      $nmfile = $_FILES['gbr']['name']; //nama file saya beri nama langsung dan diikuti fungsi time
      $config['upload_path'] = './assets/img/testimoni/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['max_size'] = '10000'; //maksimum besar file 2M
      $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
      $fotox = 1; //$_FILES['foto']['name'];
    
  if($fotox) {
          
    $this->upload->initialize($config);
    $this->upload->do_upload('foto', $config);
      $gbr = $this->upload->data();            

      $data = array(
        'id' => $this->input->post('id_testimoni'),
        'nama' => $this->input->post('nama'),
        'konten_testimoni' => $this->input->post('konten'),
        'foto' => $gbr['file_name'],
      );

    $this->M_testimoni->update_data($data);

     echo"<script> alert('Input Berhasil!'); window.location.href='testimoni'; </script>";

     } else {

     echo"<script> alert('Error! Upload Gagal'); window.location.href='testimoni'; </script>";
     }
  }

  public function getTestimoniById() {
    $id = $this->input->post('id');
    $testimoni = $this->M_testimoni->getTestimoniById($id);

    echo json_encode($testimoni);
  }

  public function edit_footer() {
    $data1 = array (
      'content'=>$this->input->post('content1'),
    );

    $id = $this->input->post('id');
    $where1 = "Footer About";

    $update = $this->M_setting->update_data2($data1, $where1);

    $data2 = array (
      'content'=>$this->input->post('content2'),
    );

    $id = $this->input->post('id');
    $where2 = "Alamat";

    $update = $this->M_setting->update_data2($data2, $where2);

    $data3 = array (
      'content'=>$this->input->post('content3'),
    );

    $id = $this->input->post('id');
    $where3 = "Link";

    $update = $this->M_setting->update_data3($data3, $where3);    

    if($update)
      echo"<script> alert('input berhasil'); window.location.href='footer';</script>";
    else
      echo"<script> alert('input gagal'); window.location.href='footer';</script>";
  }

  public function deleteform($id) {
      $hapus = array(
        'id' => $id
      );

    $this->M_form->delete_data($hapus);

       redirect('Backend/form');
  }

  // public function pagination1(){
  //       //konfigurasi pagination
  //       $config['base_url'] = site_url('localhost/kp'); //site url
  //       $config['total_rows'] = $this->db->count_all('form'); //total row
  //       $config['per_page'] = 5;  //show record per halaman
  //       $config["uri_segment"] = 3;  // uri parameter
  //       $choice = $config["total_rows"] / $config["per_page"];
  //       $config["num_links"] = floor($choice);

  //       // Membuat Style pagination untuk BootStrap v4
  //       $config['first_link']       = 'First';
  //       $config['last_link']        = 'Last';
  //       $config['next_link']        = 'Next';
  //       $config['prev_link']        = 'Prev';
  //       $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
  //       $config['full_tag_close']   = '</ul></nav></div>';
  //       $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
  //       $config['num_tag_close']    = '</span></li>';
  //       $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
  //       $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
  //       $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
  //       $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
  //       $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
  //       $config['prev_tagl_close']  = '</span>Next</li>';
  //       $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
  //       $config['first_tagl_close'] = '</span></li>';
  //       $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
  //       $config['last_tagl_close']  = '</span></li>';
 
  //       $this->pagination->initialize($config);
  //       $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

  //       //panggil function get_form_list yang ada pada model M_form. 
  //       $data['data'] = $this->M_form->get_form_list($config["per_page"], $data['page']);

  //       $data['pagination'] = $this->pagination->create_links();

  //       //load view form view
  //       $this->load->view('form_view',$data); 
  // }

}