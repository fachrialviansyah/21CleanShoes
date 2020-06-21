<!DOCTYPE html>
<html lang="en">
<head>
  <?php
	$this->load->view('template/head');
  ?>
  
</head>

<body style="overflow: visible;" class="leftpanel-collapsed">

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<!-- Preloader -->

<section>
  
  <?php $this->load->view('template/admin'); ?>
  
 <div class="mainpanel">
    
	<?php $this->load->view('template/top'); ?>
    
	<div class="contentpanel">
		<div class="panel panel-default">
			<div class="panel-body">
				
				<div class="col-md-12">
					<h2>Dasboard PT.Aster Decotiles</h2>
				</div>
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table" id="table2">
					<thead>
					  <tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Pesan</th>
						
						<th></th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td style="width: 50px"></td>
					  </tr>
					</tbody>
				  </table>
				</div>
			</div>
		</div>
	</div>
  </div>
  
</section>

<?php
  $this->load->view('template/js');
?>
	
	
	
	
<script>
//	diagram();
  jQuery(document).ready(function() {
	  // Chosen Select
      jQuery("select").chosen({
        'min-width': '100px',
        'white-space': 'nowrap',
        disable_search_threshold: 10
      });
	  
	  // Date Picker
	  jQuery('#datepicker1').datepicker({dateFormat: 'yy-mm-dd'});
	  jQuery('#datepicker2').datepicker({dateFormat: 'yy-mm-dd'});
	  jQuery('#datepicker3').datepicker({dateFormat: 'yy-mm-dd'});	
  });
</script>

</body>
</html>