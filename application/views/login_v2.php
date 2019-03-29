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
          <h2 class="normal">Sign in to aprimi</h2>
          <p>Use your email at aprimi.org to sign in.<br></p>
          <!-- <button type="button" class="btn btn-primary btn-cons" id="login_toggle">Login</button> -->
        </div>
		<div class="tiles grey p-t-20 p-b-20 text-black">
			<form id="frm_login" class="animated fadeIn" method="post" action='<?php echo site_url()?>/auth/do_login'>    
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                      <div class="col-md-6 col-sm-6 ">
                        <input name="email" id="login_username" type="text"  class="form-control" placeholder="Username">
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <input name="password" id="login_pass" type="password"  class="form-control" placeholder="Password">
                      </div>
                    </div>
				<div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
				  <div class="control-group  col-md-9">
					<div class="checkbox checkbox check-success"> <a href="#">Forget Password?</a><!-- &nbsp;&nbsp;
					  <input type="checkbox" id="checkbox1" value="1">
					  <label for="checkbox1">Keep me reminded </label> -->
					</div>
				  </div>
          <div class="control-group  col-md-3">
            <button type="submit" class="btn btn-primary btn-cons" id="login_toggle">Sign In</button>

          </div>
				  </div>
			  </form>
			
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