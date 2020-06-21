<!DOCTYPE html>
<html>
<head>
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
    ?>
		
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Contact Form
					<small>Control Panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="form"><i class="fa fa-tachometer"></i>Dashboard</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>
			<!-- Main Content -->
			<section class="content">
				<div class="row" style="margin-left:  50px">
					<!-- ISI KONTEN -->
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="table-responsive">
								<table id="mytable" class="table table-bordered table-striped table-hover">
									<thead>
										<th width="30px">No</th>
										<th>Nama</th>
										<th width="30px">Email</th>
										<th>Subject</th>
										<th>Message</th>
										<th width="35px">Delete</th>

									</thead>
									<tbody>
										<?php $no = 1;
										 foreach ($form as $row) { ?>
											<tr>
												<td><?=$no?></td>
											    <td><?php echo $row->fname; ?> <?php echo $row->lname; ?></td>
											    <td><?php echo $row->email; ?></td>
											    <td><?php echo $row->subject; ?></td>
											    <td><?php echo $row->message; ?></td>
											    <td><p data-placement="top" data-toggle="tooltip" title="Delete">
											    	<button value="<?php echo $id ?>" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#modal-delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
										   </tr>
										 <?php $no++; } ?>
									</tbody>
								</table>
								<div class="clearfix"></div>
								<!-- <ul class="pagination pull-right">
									<li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
								</ul> -->
							</div>
						</div>
					</div>
				</div>
			</div>

<!-- Modal-Delete -->
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
         
                <div class="modal-body">
                    <p>Do you want to proceed?</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo 'deleteform/'.$row->id; ?>"><button value="<?php echo $id ?>" class="btn btn-danger btn-ok">Delete</a></button>
                </div>
            </div>
        </div>
    </div>

	<!-- </div> Modal Fade -->
</section>

<?php 
$this->load->view('backend/js');
?>

</body>
</html>
