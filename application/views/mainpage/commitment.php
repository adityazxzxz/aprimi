<div class="page-content"> 
		<div class="content">
			<ul class="breadcrumb">
				<li>   
				  <p>You are here</p>  					 							
				</li>     	 
				<li><a href="#" class="active">Comitment</a></li>                    
            </ul>
            <div class="row">
                <div class="col-lg-12 text-center">
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
            </div>
            <div class="page-title">	
				<i class="icon-custom-left"></i>
				<h3>List of <span class="semi-bold">Committee Comitment</span></h3>		
			</div>
			<div class="row">
				<div class="col-md-12">
				    <div class="grid simple ">
						<div class="grid-title no-border">
							<h4> <span class="semi-bold"></span></h4>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
							</div>
						</div>
						<div class="grid-body no-border">
                            <div class="col-md-6">
                                <p>Referring to the APRIMI Annual Meeting which was held in Sanur, Bali on December 14th 2018, the APRIMI Committee for the period of 2016 through 2018 has completed their assignment. As a result of that, a new APRIMI Committee for the period of 2019 - 2021 should be established.</p>
                                <p>Considering the credibility and your capability as HR professional in compensation, you are invited to join the new APRIMI Committee. The function, you will be responsible on, is as follow:</p>
                                <p><b>Committee Member Formation December 2019 – December 2021</b></p>
                                <br>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Chairman</td>
                                            <td><ul><li>Adityo Nugroho</li></ul></td>
                                        </tr>
                                        <tr>
                                            <td>V. Chairman	& Operation</td>
                                            <td><ul><li>M. Aditia Eka Putra</li></ul></td>
                                        </tr>
                                        <tr>
                                            <td>Secretary</td>
                                            <td><ul><li>Annalia D Budi</li></ul></td>
                                        </tr>
                                        <tr>
                                            <td>Treasury</td>
                                            <td><ul><li>Angela Lisje</li></ul></td>
                                        </tr>
                                        <tr>
                                            <td>Survey Coordinator</td>
                                            <td><ul>
                                                <li>Alwin Yogaswara Gunawan</li>
                                                <li>Suryantoro</li>
                                                <li>Andria Rahmawati</li>
                                            </ul></td>
                                        </tr>
                                        <tr>
                                            <td>Competency & Development</td>
                                            <td><ul>
                                                <li>Ratna Kusumaningtyas</li>
                                                <li>AngdisatyaraRamadhana</li>
                                            </ul></td>
                                        </tr>
                                        <tr>
                                            <td>Research & External Relations</td>
                                            <td><ul>
                                                <li>Dian Febrianti</li>
                                                <li>Basaria Pakpahan</li>
                                            </ul></td>
                                        </tr>
                                        <tr>
                                            <td>IT & Communication</td>
                                            <td><ul>
                                                <li>Ardhian Pratama</li>
                                                <li>Agus Prabowo</li>
                                            </ul></td>
                                        </tr>
                                        <tr>
                                            <td>Resources</td>
                                            <td><ul>
                                                <li>Sigit Hadiawan</li>
                                                <li>N. Bayu Atmaji (NBA)</li>
                                                <li>Ralph Tehupuring (RT)</li>
                                            </ul></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>Shall you agree to become the new APRIMI Committee member, please indicate your commitment by signing at the end of this letter. </p>
                                <p>I look forward to work with you in four years ahead.</p>
                                <p>Regards,</p>
                                <p>APRIMI Chief Liaison Officer</p>
                                <br><br><br>
                                <p>Adityo Nugroho</p>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                        <h1>Acknowledgement</h1>
                                </div>
                                <p>APRIMI will run the work program yearly, in order to manage the program done in timely manner, please inform your availability by fill the form below.</p>
                                <br>
                                <form action="<?php echo site_url()?>/commitment/add_commitment" method="POST">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class="form-label">Company</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="company">
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="confirm" id="" value="yes" checked>
                                            Yes	I agree to join the APRIMI Committee
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="confirm" id="" value="no">
                                            No	I am not available to join the APRIMI Committee
                                        </label>
                                    </div>
                                    <br>
                                    <h4>available Meeting</h4>
                                    <div class="form-group">
                                        <label for="company" class="form-label">Time</label>
                                        <div class="controls">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="time" id="" value="Weekdays after office hour" checked>
                                                Weekdays after office hour
                                            </label>
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="time" id="" value="Weekend (Saturday)">
                                                Weekend (Saturday)
                                            </label>
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="time" id="" value="other">
                                                Other
                                                <input type="text" name="other_time" id="" class="form-control">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Notes</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="note">
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div>
                                </form>
                                
                            </div>
						</div>
					</div>
				</div>
			</div>



		</div>
	</div>