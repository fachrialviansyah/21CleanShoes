<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      $this->load->view('header');
        foreach ($slider as $row) {
          $gambar = $row->gambar;
          $judul_slider = $row->judul_slider;
          $konten_slider = $row->konten_slider;
        }
        foreach ($product as $row) {
          $image = $row->image;
        }
        foreach ($about as $row) {
          $image = $row->image;
          $judul_about = $row->judul_about;
          $konten_about = $row->konten_about;
        }
        foreach ($testimoni as $row) {
          $foto = $row->foto;
          $nama = $row->nama;
          $konten_testimoni = $row->konten_testimoni;
        }
    ?>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="top-bar py-3 bg-light" id="home-section">
      <div class="container">
        <div class="row align-items-center">
         
          <div class="col-6 text-left">
            <ul class="social-media">
              <li><a href="#" class=""><span class="icon-facebook"></span></a></li>
              <li><a href="#" class=""><span class="icon-twitter"></span></a></li>
              <li><a href="https://www.instagram.com/21cleanshoes/?hl=id" class=""><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
          <div class="col-6">
            <p class="mb-0 float-right">
              <span class="mr-3"><a href="tel://#"> <span class="icon-phone mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">(+62) 822-1047-9331 </span></a></span>
              <span><a href="#"><span class="icon-envelope mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">21cleanshoes@gmail.com</span></a></span>
            </p>
            
          </div>
        </div>
      </div> 
    </div>
    <!-- HEADER -->
    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h2 class="mb-8 site-logo">
               <img src="<?= base_url('assets');?>/images/newlogo.png" width="59px" alt="Image" class="img-fluid posisi-logo">

              <a href="index.html" class="text-black mb-4 posisi-nama">21cleanshoes<span class="text-primary"></span> </a></h2>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <?php $this->load->view('navbar');?>
          </div>
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
    <!-- #HEADER -->
  
     <!-- SLIDER -->
    <div class="site-blocks-cover overlay" style="background-image: url(<?=base_url('assets');?>/img/slider/<?php echo $gambar; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        
            <div class="row mb-4">
              <div class="col-md-7">
                <h1><?php echo $judul_slider ?></h1>
                <p class="mb-5 lead"><?php echo $konten_slider ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- #SLIDER -->

<!-- TAMPILAN SERVICE --> 
    <div class="site-section bg-light" id="services-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h3 class="section-sub-title">Our Services</h3>
            <h2 class="section-title mb-3">We Offer Services</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <?php
            foreach ($service as $row) { ?>
              <div class="col-lg-4 col-md-6" align="justify" >
                <h3 style="color:black"><?php echo $row->judul; ?></h3>
                <p><?php echo $row->konten_service; ?></p>
              </div>
          <?php } ?>
            <div class="unit-4 d-flex">
              <!-- <div class="unit-4-icon mr-4"><span class="text-primary icon-pie_chart"></span></div> -->
            </div>
        </div>
      </div>
    </div>

<!-- Product -->
    <div class="site-section" id="products-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h3 class="section-sub-title">Popular Products</h3>
            <h2 class="section-title mb-3">Our Products</h2>
            <p><?php echo $setting[0]->content ?></p>
          </div>
        </div>
        <div class="row">
          <?php
            $this->db->select('id');  // memilih database berdasarkan id / auto increment di database
            $this->db->select('image'); // memilih kolom pict dari tabel yg ada di database untuk didefinisikan lebih lanjut
            $query = $this->db->get('product'); // memanggil database berdasarkan nama table
              foreach ($query->result() as $row){ // fungsi memanggil hasil dari query menjadi $row
                $gambar = array (                  // membuat array untuk handle definisi dari database
                  'img' => $row->image
                );
            ?>
                <!-- PERULANGAN -->
          <div class="col-lg-4 col-md-6">
            <div class="product-item">
              <figure class="img-fluid" alt="Image">
                <img width="300px" height="300px" src="<?=base_url('assets');?>/img/product/<?=$gambar['img']; ?>"/>
              </figure>
            </div>
          </div>
                <!-- PERULANGAN END -->
          <?php } ?>
        </div>
      </div>
    </div>

    <!-- #SLIDER_NOTIF -->
  <div class="site-blocks-cover inner-page-cover overlay get-notification"  style="background-image: url(<?= base_url('assets');?>/images/imgnew2.jpg); background-attachment: fixed;" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <form class="col-md-7" method="post">
          <h2>Get notified on each updates.</h2>
          <div class="d-flex mb-4">
            <input type="text" class="form-control rounded-0" placeholder="Enter your email address">
            <input type="submit" class="btn btn-white btn-outline-white rounded-0" value="Subscribe">
          </div>
          <p>Silahkan masukan email anda untuk mendapatakan informasi seputar 21Cleanshoes dan diskon 10% atau penawaran kami lainnya. </p>
        </form>
      </div>
    </div>
  </div>
  <!-- #SLIDER_NOTIF -->

  <!-- #ABOUT -->  
    <div class="site-section" id="about-section">
      <div class="container">
        <div class="row align-items-lg-center">
          <div class="col-md-8 mb-5 mb-lg-0 position-relative">
            <?php 
              $this->db->select('id');
              $this->db->select('image');
              $query = $this->db->get('about');
                $image = array (
                  'img'=> $image
                );
             ?>
            <img width="500px" alt="Image" src="<?php echo base_url().'assets/img/about/'.$image['img']; ?>"/>
          </div>
          <div class="col-md-4 ml-auto">
            <h3 class="section-sub-title mb-5">About Us</h3>
            <h2 class="section-title mb-3"><?php echo $judul_about ?></h2>
            <p class="mb-4"><?php echo $konten_about ?></p>
            <!-- <p><a href="#" class="btn btn-black btn-black--hover rounded-0">Learn More</a></p> -->
          </div>
        </div>
      </div>
    </div>
    <!-- #ABOUT -->
     
    <!-- #Testimonials -->
    <div class="site-section testimonial-wrap" id="testimonials-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h3 class="section-sub-title">People Says</h3>
            <h2 class="section-title mb-3">Testimonials</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
        <?php
          $this->db->select('id');  //deklarasi
          $this->db->select('foto');
          $this->db->select('nama');
          $this->db->select('konten_testimoni');
        $query = $this->db->get('testimoni'); // memanggil database berdasarkan nama table
          foreach ($query->result() as $row){ // fungsi memanggil hasil dari query menjadi $row
            $foto = array (                  // membuat array untuk handle definisi dari database
              'img' => $row ->foto
            );
            $nama = array(
              'img' => $row ->nama
            );
            $konten_testimoni = array(
              'img' => $row ->konten_testimoni
            );
        ?>
          <!-- PERULANGAN -->
          <div>
            <div class="testimonial">
              <figure class="mb-4 d-block align-items-center justify-content-center">
                <div class="w-100 img-fluid mb-3">
                  <img src="<?=base_url('assets');?>/img/testimoni/<?=$foto['img']; ?>" alt="Image">
                </div>
              </figure>
              <blockquote class="mb-3">
                <p>&ldquo;<?php echo $row->konten_testimoni ?>&rdquo;</p>
              </blockquote>
              <p class="text-black"><strong>~ <?php echo $row->nama ?> ~</strong></p>
          </div>
        </div>
         <!-- PERULANGAN END -->
          <?php } ?>
      </div>
    </div>
    <!-- #Testimonials -->
   
    <!-- ISI FORM -->
    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row ">
          <div class="col-12 text-center">
            <h3 class="section-sub-title">Contact Form</h3>
            <h2 class="section-title mb-3">Get In Touch</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-7 mb-5">
            <form action="<?=base_url('frontend')?>/index" method="post" class="p-5 bg-form">
              <h2 class="h4 text-black mb-5">Contact Form</h2> 

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input type="text" name="fname" id="fname" class="form-control rounded-0">
                </div>
                
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" name="lname" id="lname" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" name="email" id="email" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input type="subject" name="subject" id="subject" class="form-control rounded-0">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control rounded-0" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-black rounded-0 py-3 px-4">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- ISI FORM -->

    <div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5457384449255!2d106.91665301431749!3d-6.9447636699146535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e684804a327efe3%3A0x1d1620d831779e37!2s21cleanshoes!5e0!3m2!1sid!2sid!4v1567096262666!5m2!1sid!2sid" width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

  <!-- FOOTER -->
  <footer class="site-footer bg-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              <h2 class="footer-heading mb-4">Contact Us</h2>
              <p><?php echo $setting1[0]->content ?></p>
            </div>
            <div class="col-md-4">
              <h2 class="footer-heading mb-4">We Are Open</h2>
              <p><?php echo $setting2[0]->content ?></p>
            </div>
            <div class="col-md-4">
              <h2 class="footer-heading mb-4">Follow Us</h2>
              <a href="#" class="pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="https://www.instagram.com/21cleanshoes/?hl=id" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
  <?php
      $this->load->view('js');
    ?>
    <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
  </body>
</html>