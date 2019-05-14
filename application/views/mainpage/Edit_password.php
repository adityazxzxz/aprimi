<div class="page-content"> 
  <div class="content">
     <ul class="breadcrumb">
        <li>   
          <p>Profile</p>  					 							
      </li>     	 
      <!-- <li><a href="#" class="active">Folder 1</a></li>   -->                  
  </ul>
  <div class="page-title">	
    <a href="<?php echo site_url('home/')?>"><i class="icon-custom-left"></i></a>
    <h3>User <span class="semi-bold">Profile</span></h3>		
</div>
<div class="row">
    <div class="panel">
       <div class="panel-body">
           <div class="col-md-12">
            <div class="col-md-12 text-center">
                <?php $error_msg = $this->session->flashdata('error'); if(!empty($error_msg)){ ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                        </button>
                        <strong>Error!</strong> <?php  echo $error_msg; ?>
                    </div>
                <?php } ?>

                <?php $ok_msg = $this->session->flashdata('success'); if(!empty($ok_msg)){ ?>
                    <div class="alert alert-block alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">

                        </button>
                        <strong>Success!</strong> <?php  echo $ok_msg; ?>
                    </div>
                <?php } ?>

            </div>
            <?php echo form_open($form_action);?>
            <div class="form-group">
                <label for="name" class="form-label">Old Password</label>
                <div class="controls">
                    <input type="password" class="form-control" name="old_password" value="" <?php echo $readonly?>>
                    <?php echo form_error('old_password'); ?>
                </div>
            </div>
                <div class="form-group">
                <label for="name" class="form-label">New Password</label>
                <div class="controls">
                    <input type="password" class="form-control" name="password" value="" <?php echo $readonly?>>
                    <?php echo form_error('password'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Re-type New Password</label>
                <div class="controls">
                    <input type="password" class="form-control" name="password_conf" value="" <?php echo $readonly?>>
                    <?php echo form_error('password_conf'); ?>
                </div>
            </div>
            
            <div class="form-group text-right">
                <?php
                if($action !== "read"){
                    ?>
                    <button type="submit" class="btn btn-primary"><?php echo $button?></button>
                    <?php
                }
                ?>
                
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
            <?php echo form_close()?>

        </div>
    </div>
</div>
</div>



</div>
</div>