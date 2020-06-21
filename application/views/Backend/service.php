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
					Service Offer
					<small>Control Panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="form"><i class="fa fa-tachometer"></i>Dashboard</a></li>
					<li class="active">Service</li>
				</ol>
			</section>
			<!-- Main Content -->
			<section class="content">
				<div class="row" style="margin-left:  50px">
					<!-- ISI KONTEN -->
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<form method="post" action="tambahservice">
								<button type="button" class="btn btn-primary" class="form-control" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-plus"></i> Tambah</button>
							</form>
							<div class="table-responsive">
								<table id="mytable" class="table table-bordered table-striped table-hover">
									<thead>
										<th width="30px">No</th>
										<th width="50px">Logo</th>
										<th>Judul</th>
										<th>Konten</th>
										<th width="30px">Edit</th>
										<th width="35px">Delete</th>

									</thead>
									<tbody>
										<?php $no = 1;
										 foreach ($service as $row) { ?>
											<tr>
												<td><?=$no?></td>
											    <td><img src="<?php echo base_url('assets/img/service/'.$row->logo.'');?>" height='50px'></td>
											    <td><?php echo $row->judul; ?></td>
											    <td><?php echo $row->konten_service; ?></td>

											    <td><p data-placement="top" data-toggle="tooltip" title="Edit">
											    	<button type="button" onclick="return getServiceById(<?php echo $row->id; ?>)" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p>
											    </td>
											    <td>
											    	<p data-placement="top" data-toggle="tooltip" title="Delete">
											    	<button value="<?php echo $id ?>" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#modal-delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
											    </td>
										   </tr>
										 <?php $no++; } ?>
									</tbody>
								</table>
								<!-- <div class="clearfix"></div>
								<ul class="pagination pull-right">
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


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-lableledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				<h4 class="modal-title contom-align" id="Heading">Edit Your Detail</h4>
			</div>
			<div class="modal-body">
				<form id="update_service" action="update_service" enctype="multipart/form-data" method="post">
				<!-- <table style="margin:20px auto;"> -->
					<div class="box-body">
						<input type="text" id="id_service" name="id_service" class="form-control hide" value="">
						<label for="judul">Judul</label><br>
						<!-- <textarea name="judul" value="<?php  $judul ?>" id="textarea" class="form-control"><?php  $judul ?></textarea> -->
						<input type="text" id="judul" name="judul" class="form-control" value="">
						<span class="help-block"></span>
					</div> 
					<div class="box-body">
						<label for="konten">Konten</label>
						<textarea name="konten" id="konten" value="" id="textarea" class="form-control"></textarea>
					</div>
					<div class="box-body">
						<label for="logo">Upload Image</label>
						<div id="photo-preview" style="width: 150px;"></div>
						<input type="file" value="" name="gbr" id="gbr" class="form-control">
					</div>

					<!-- </table> -->
				
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>Update
				</button>
			</div>
		</form>
			</div> <!-- Modal content -->
		</div> <!-- Modal Dialog -->
	<!-- </div> Modal Fade -->
</section>

<div class="control-sidebar-bg"></div>
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Input Service Offer</h4>
				</div>
				<div class="modal-body">
					<form action="tambahservice" enctype="multipart/form-data" method="post">
						<div class="box-body">
							<label for="judul">Judul</label><br>
							<textarea name="judul" value="" id="textarea" class="form-control"></textarea>
						</div> 
						<div class="box-body">
							<label for="konten">Konten</label>
							<textarea name="konten" value="" id="textarea" class="form-control"></textarea>
						</div>
						<div class="box-body">
							<label for="logo">Upload Image</label>
							<input type="file" value="" name="logo" class="form-control" id="exampleInputtitle">
						</div>

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
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
                    <a href="<?php echo 'deleteservice/'.$row->id; ?>"><button value="<?php echo $id ?>" class="btn btn-danger btn-ok">Delete</a></button>
                </div>
            </div>
        </div>
    </div>

<?php 
$this->load->view('backend/js');
?>
<script type="text/javascript">
	function getServiceById(id) {
		var data = {
			id : id
		};
		$('photo-preview').html(''); //tampil gambar
		$.ajax({
			type: 'post',
			url : '<?php echo base_url()?>/Backend/getServiceById',
			data : data,
			success : function(response){
				var service = JSON.parse(response);
				var base_url = '<?php echo base_url(); ?>';
				$("#update_service")[0].reset();

				document.getElementById("id_service").value = service.id;
				document.getElementById("judul").value = service.judul;
				document.getElementById("konten").value = service.konten_service;
				
				$('#photo-preview').append('<img src = "'+base_url+'assets/img/service/'+service.logo+'" class = "img-responsive">'); //tampil foto
				$('#edit').modal('show');
			}
		});
	}

</script>
</body>
</html>
