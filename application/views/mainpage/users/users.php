<div class="page-content"> 
		<div class="content">
			<ul class="breadcrumb">
				<li>   
				  <p>List Users</p>  					 							
				</li>     	 
				<!-- <li><a href="#" class="active">Folder 1</a></li>   -->                  
			</ul>
			<div class="page-title">	
				<i class="icon-custom-left"></i>
				<h3>List <span class="semi-bold">Users</span></h3>		
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
                        <?php $error_msg = $this->session->flashdata('error'); if(!empty($error_msg)){ ?>
                            <div class="alert alert-block alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Error!</strong> <?php  echo $error_msg; ?>
                            </div>
                        <?php } ?>

                        <?php $ok_msg = $this->session->flashdata('success'); if(!empty($ok_msg)){ ?>
                            <div class="alert alert-block alert-success fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                            </button>
                            <strong>Success!</strong> <?php  echo $ok_msg; ?>
                            </div>
                        <?php } ?>

                    </div>
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
							<a class="btn-md btn btn-default" href="<?php echo site_url('users/create') ?>" ><i class="fa fa-plus"></i> New User</a>
							<!-- <p>
								<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> New folder</button>
							</p> -->
							<table class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Name</th>
										<th>Email</th>
										<th>Company</th>
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
														<?php echo $row->email?>
													</td>
													<td>
														<?php echo $row->company?>
													</td>
												</tr>
												<?php
											endforeach;
										}
									?>
								</tbody>
							</table>
							<table width="100%">
								<tr>
										<td colspan="2">
											Total Record : <?php echo $total_record ?>
										</td>
										<td color="green" colspan="3" align="right"><?php echo $pagination ?></td>
									</tr>
							</table>				
				
						</div>
					</div>
				</div>
			</div>



		</div>
	</div>