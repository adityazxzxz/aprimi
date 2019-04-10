<div class="page-content"> 
		<div class="content">
			<ul class="breadcrumb">
				<li>   
				  <p>Folder Management</p>  					 							
				</li>     	 
				<li><a href="#" class="active">Folder 1</a></li>                    
			</ul>
			<div class="page-title">	
				<i class="icon-custom-left"></i>
				<h3>Folder <span class="semi-bold">Management</span></h3>		
			</div>
			<div class="row">
				<div class="col-md-12">
				    <div class="grid simple ">
						<div class="grid-title no-border">
							<h4>Folder <span class="semi-bold">1</span></h4>
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
										<th>Filename</th>
										<th>Modified</th>
									</tr>
								</thead>
								<tbody>
									<?php
									/*$last = $this->uri->total_segments();
									$lastUri = $this->uri->segment($last);*/
									$url = site_url().'/folder_management/download';
									if(!empty($this->uri->segment(3)))
										$url .= '/'.$this->uri->segment(3);
									foreach ($list_file as $dir => $value) {

										//echo (is_dir($dir_path.$value)) ? "<span class="\glyphicon glyphicon-folder-open\"></span>" : '';
										echo "<tr>";
										echo "<td>";
										echo (is_dir($path.$value)) ? "<a href=".site_url()."/folder_management/list/".$value."><span class=\"glyphicon glyphicon-folder-open\" style=\"margin-right:10px\"></span>$value" : "<span class=\"glyphicon glyphicon-file\" style=\"margin-right:10px\"></span>$value</a>";
										echo "</td>";
										echo "<td>".date('Y-m-d H:i:s',filemtime($path.$value))."</td>";
										echo (!is_dir($path.$value)) ? "<td><a href=\"$url/$value\"><i class=\"fa fa-download\"></i>&nbsp;Download</a></td>" : '';
										echo "</tr>";
									}
									?>
									<!-- <tr>
										<td>File 2</td>
										<td>21-03-2019</td>
										<td><a href="#"><i class="fa fa-download"></i>&nbsp;Download</a></td>
									</tr>
									<tr>
										<td>File 3</td>
										<td>21-03-2019</td>
										<td><a href="#"><i class="fa fa-download"></i>&nbsp;Download</a></td>
									</tr>
									<tr>
										<td>File 4</td>
										<td>21-03-2019</td>
										<td><a href="#"><i class="fa fa-download"></i>&nbsp;Download</a></td>
									</tr>
									<tr>
										<td>File 5</td>
										<td>21-03-2019</td>
										<td><a href="#"><i class="fa fa-download"></i>&nbsp;Download</a></td>
									</tr> -->
								</tbody>
							</table>				
				
						</div>
					</div>
				</div>
			</div>



		</div>
	</div>