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
					Service Offer
					<small>Control Panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>
			<!-- Main Content -->
			<section class="content">
				<div class="row" style="margin-left: 50px">
					<!-- ISI KONTEN -->
				</div>
			</section>
		</div>
	</div>
	
	<div class="control-sidebar-bg">
	</div>
	
<?php 
$this->load->view('backend/js');
?>
</body>
</html>
