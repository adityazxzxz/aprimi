<div class="page-content"> 
	<div class="content">  
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<!-- <h1>Aprimi.org Web Traffic March 2019 </h1> -->
			<h1><?php echo (!empty($title->value)) ? $title->value : 'Aprimi.org Web Traffic'?> </h1>
		</div>
		<?php
		if($this->session->userdata('role') === 'admin'){
			?>
			<div class="pull-right actions">
				<button class="btn btn-primary btn-cons" type="button" data-toggle="modal" data-target="#myModal">Change Analytic</button>
			</div> 
			<?php
		}
		?>


		<img src="<?php echo base_url()?>img_upload/<?php echo $analytic->value?>" style="width: 100%;
		height: auto;">
		<!-- END PAGE TITLE -->
		<!-- BEGIN PlACE PAGE CONTENT HERE -->

		<!-- END PLACE PAGE CONTENT HERE -->
	</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload Analytic</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('dashboard/do_upload');?>
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input type="text" class="form-control" name="title" size="20" value="<?php echo (!empty($title->value)) ? $title->value : 'Aprimi.org Web Traffic'?>" >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nama</label>
					<input type="file" class="form-control" name="userfile" size="20" >
				</div>


			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="submit_agenda">Submit</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>

</div>
</div> 	