<!DOCTYPE html>
<html>
<?php $this->load->view('parts/head')?>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top lazy"  data-original="assets/img/work.jpg"  style="background-image: url('<?php echo base_url()?>assets/img/work.jpg')"> 
<div class="container">
  <div class="row login-container animated fadeInUp">  
        <div class="col-md-7 col-md-offset-2 tiles white no-padding">
		 <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10"> 
          <h2 class="normal">Get QRCode</h2>
          <p>Pilih Agenda untuk menampilkan QRCode<br></p>
          <!-- <button type="button" class="btn btn-primary btn-cons" id="login_toggle">Login</button> -->
        </div>
		<div class="tiles grey p-t-20 p-b-20 text-black">
			<div class="grid-body no-border">
							<!-- <p>
								<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> New folder</button>
							</p> -->
							<table class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Name</th>
										<th>Lokasi</th>
										<th>Date</th>

									</tr>
								</thead>
								<tbody>
									<?php
										if(!empty($data)){
											foreach ($data as $key => $row) :
												?>
												<tr>
													<td>
														<?php echo $total_page++?>
													</td>
													<td>
														<?php echo $row->nama?>
													</td>
													<td>
														<?php echo $row->lokasi?>
													</td>
													<td>
														<?php echo date('d M Y',strtotime($row->tanggal))?>
													</td>
													<td>
														<a class="btn btn-info" target="_blank" href="<?php echo site_url().'/absensi/getqrcode/'.$row->id?>">QRCode</a>
													</td>
												</tr>
												<?php
											endforeach;
										}
									?>
								</tbody>
								<tfoot>
							</table>				
				
						</div>
			
		</div>   
      </div>   
  </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<?php $this->load->view('parts/script')?>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>

</html>