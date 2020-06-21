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
        $image = '';
        $judul_about = '';
        $konten_about = '';
        
       
        if(isset($about)){
         foreach($about as $row){
          $id = $row->id;
          $image = $row->image;
          $judul_about = $row->judul_about;
          $konten_about = $row->konten_about;

        }
      }
    ?>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          About
          <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="form"><i class="fa fa-tachometer"></i>Dashboard</a></li>
          <li class="active">About</li>
        </ol>
      </section>
      <!-- Main Content -->
      <section class="content">
        <div class="row" style="margin-left: 50px">
          <!-- ISI KONTEN -->
          <form method="post" action="tambahabout" enctype="multipart/form-data">
            <div class="form-group">
              <div style="padding: 30px"></div>
              <label class="col-sm-2 control-label">Judul</label>
              <div class="col-sm-5">
                <textarea name="judul_about" value="<?php echo $judul_about ?>" class="form-control" id="textarea"></textarea>
              </div>

              <div style="padding: 30px"></div>
              <label class="col-sm-2 control-label">Konten</label>
              <div class="col-sm-5">
                <textarea name="konten_about" value="<?php echo $konten_about ?>" class="form-control" id="textarea"></textarea>
              </div>



              <div style="padding: 30px"></div>
              <label class="col-sm-2 control-label">Upload Image</label>
              <div class="col-sm-5">
              <?php if ($image !='') { ?>

              <img id='image_nodin'  src="<?php echo base_url();?>/assets/img/about/<?php echo $image?>" height='200px'>

              <input  type="file" class="form-control" value="<?php echo $image?>" name="foto" id="preview_image"  accept="image/x-png, image/gif, image/jpeg"/> 

              <input type="hidden" class="form-control" name="fotoOld"  value="<?=$image?>">  

            <?php } else { ?>

             <img id='image_nodin' src='<?php echo base_url()."assets/backend/img/docc.png";?>' height='200px'>
             <input type="file" class="form-control" name="foto" id="preview_image" accept="image/x-png, image/gif, image/jpeg"/ required="">  
           
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
  function bacaimage(input) {
   if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#image_nodin').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
$("#preview_image").change(function(){
  bacaimage(this);
});

</script>

</body>
</html>