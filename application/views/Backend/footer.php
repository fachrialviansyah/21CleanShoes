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
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Footer
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
          <form method="post" action="edit_footer" enctype="multipart/form-data">
            <div class="form-group">
              <div style="padding: 30px"></div>
              <label class="col-sm-2 control-label">Konten 1</label>
              <div class="col-sm-5">
                <textarea name="content1" class="form-control" id="textarea"><?php echo $footer1[0]->content; ?></textarea>
              </div>

              <div style="padding: 30px"></div>
              <label class="col-sm-2 control-label">Konten 2</label>
              <div class="col-sm-5">
                <textarea name="content2" class="form-control" id="textarea"><?php echo $footer2[0]->content; ?></textarea>
              </div>

              <div style="padding: 30px"></div>
              <label class="col-sm-2 control-label">Konten 3</label>
              <div class="col-sm-5">
                <textarea name="content3" class="form-control" id="textarea"><?php echo $footer3[0]->content; ?></textarea>
              </div>

            <div style="padding: 30px"></div>
              	<div class="col-sm-5">
                	<button type="submit" class="btn btn-primary mb-3" class="form-control">Save</button>
              	</div>
            </div>
          </form>
  
  <div class="control-sidebar-bg"></div>
  
<?php 
$this->load->view('backend/js');
?>

<!-- <script>
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

</script> -->

</body>
</html>