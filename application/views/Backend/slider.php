<!DOCTYPE html>
<html>
  <?php 
  $this->load->view('backend/head');
  ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php 
    $this->load->view('backend/header');
    $this->load->view('backend/nav');
    ?>
    <?php
        $id = '';
        $gambar = '';
        $judul_slider = '';
        $konten_slider = '';
        
       
        if(isset($slider)){
         foreach($slider as $row){
          $id = $row->id;
          $gambar = $row->gambar;
          $judul_slider = $row->judul_slider;
          $konten_slider = $row->konten_slider;

        }
      }
    ?>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Slider
          <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="form"><i class="fa fa-tachometer"></i>Dashboard</a></li>
          <li class="active">Slider</li>
        </ol>
      </section>
      <!-- Main Content -->
      <section class="content">
        <div class="row" style="margin-left: 50px">
          <!-- ISI KONTEN -->
          <form method="post" action="tambahslider" enctype="multipart/form-data">
            <div class="form-group">
              <div style="padding: 30px"></div>
              <label class="col-sm-2 control-label">Judul</label>
              <div class="col-sm-5">
                <textarea name="judul_slider" value="<?php echo $judul_slider ?>" class="form-control" id="textarea"></textarea>
              </div>

              <div style="padding: 30px"></div>
              <label class="col-sm-2 control-label">Konten</label>
              <div class="col-sm-5">
                <textarea name="konten_slider" value="<?php echo $konten_slider ?>" class="form-control" id="textarea"></textarea>
              </div>



              <div style="padding: 30px"></div>
              <label class="col-sm-2 control-label">Upload Image</label>
              <div class="col-sm-5">
              <?php if ($gambar !='') { ?>

              <img id='gambar_nodin'  src="<?php echo base_url();?>/assets/img/slider/<?php echo $gambar?>" height='200px'>

              <input  type="file" class="form-control" value="<?php echo $gambar?>" name="foto" id="preview_gambar"  accept="image/x-png, image/gif, image/jpeg"/> 

              <input type="hidden" class="form-control" name="fotoOld"  value="<?=$gambar?>">  

            <?php } else { ?>

             <img id='gambar_nodin' src='<?php echo base_url()."assets/backend/img/docc.png";?>' height='200px'>
             <input type="file" class="form-control" name="foto" id="preview_gambar" accept="image/x-png, image/gif, image/jpeg"/ required="">  
           
             <?php } ?>  

              </div>

              <div style="padding: 30px"></div>
              <div class="col-sm-5">
                <button type="botton" class="btn btn-primary mb-3" class="form-control">Save</button>
              </div>
            </div>
          </form>
  
  <div class="control-sidebar-bg"></div>
  
<?php 
$this->load->view('backend/js');
?>

<script>
  function bacaGambar(input) {
   if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#gambar_nodin').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
$("#preview_gambar").change(function(){
  bacaGambar(this);
});

</script>

</body>
</html>

