<div class="page-content"> 
		<div class="content">
			<ul class="breadcrumb">
				<li>   
				  <p>List Absensi</p>  					 							
				</li>     	 
				<!-- <li><a href="#" class="active">Folder 1</a></li>   -->                  
			</ul>
			<div class="page-title">	
				<i class="icon-custom-left"></i>
				<h3>List <span class="semi-bold">Absensi</span></h3>		
			</div>
			<div class="row">
				<div class="col-md-12">
				    <div class="grid simple ">
						<div class="grid-title no-border">
							<!-- <h4>Folder <span class="semi-bold">1</span></h4> -->
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
							</div>
						</div>
						<div class="grid-body no-border">
							<!-- <p>
								<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> New folder</button>
							</p> -->
							<table class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Name</th>
										<th>Agenda</th>
										<th>Updated Date</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if(!empty($data)){
											foreach ($data as $key => $row) :
												?>
												<tr>
													<td>
														<?php echo $start++?>
													</td>
													<td>
														<?php echo $row->name?>
													</td>
													<td>
														<?php echo $row->nama?>
													</td>
													<td>
														<?php echo $row->updated_at?>
													</td>
												</tr>
												<?php
											endforeach;
										}
									?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2">
											Total Record : <?php echo $total_record ?>
										</td>
										<td colspan="5" align="right"><?php echo $pagination ?></td>
									</tr>
								</tfoot>
							</table>				
				
						</div>
					</div>
				</div>
			</div>



		</div>
	</div>