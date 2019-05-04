<div class="page-content"> 
	<div class="content">  
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1>Aprimi.org Web Traffic March 2019 </h1>
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


		<img src="<?php echo base_url()?>img_upload/dashboard-sample.jpg" style="width: 100%;
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
				<h4 class="modal-title">Create Agenda</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('dashboard/do_upload');?>
				<div class="form-group">
					<label for="exampleInputEmail1">Nama</label>
					<input type="file" class="form-control" name="userfile" size="20">
				</div>


			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default" id="submit_agenda">Submit</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>

</div>
</div> 	