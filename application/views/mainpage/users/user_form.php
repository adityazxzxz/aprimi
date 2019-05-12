<div class="page-content"> 
  <div class="content">
     <ul class="breadcrumb">
        <li>   
          <p>User Management</p>  					 							
      </li>     	 
      <!-- <li><a href="#" class="active">Folder 1</a></li>   -->                  
  </ul>
  <div class="page-title">	
    <a href="<?php echo site_url('users/')?>"><i class="icon-custom-left"></i></a>
    <h3>User <span class="semi-bold">Management</span></h3>		
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
            <?php
                if($action === 'edit'){
                    ?>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id?>" <?php echo $readonly?>>
                    <?php
                }
            ?>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <div class="controls">
                    <input type="text" class="form-control" name="name" value="<?php echo $name?>" <?php echo $readonly?>>
                    <?php echo form_error('name'); ?>
                </div>

            </div>
            <div class="form-group">
                <label for="name" class="form-label">Email</label>
                <div class="controls">
                    <input type="text" class="form-control" name="email" value="<?php echo $email?>" <?php echo $readonly?>>
                    <?php echo form_error('email'); ?>

                </div>

            </div>
            <?php if($action === "save"){
                ?>
                <div class="form-group">
                <label for="name" class="form-label">Password</label>
                <div class="controls">
                    <input type="password" class="form-control" name="password" value="<?php echo $password?>" <?php echo $readonly?>>
                    <?php echo form_error('password'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Password</label>
                <div class="controls">
                    <input type="password" class="form-control" name="password_conf" value="" <?php echo $readonly?>>
                    <?php echo form_error('password_conf'); ?>
                </div>
            </div>
                <?php
            }?>
            
            <div class="form-group">
                <label for="name" class="form-label">No Telp</label>
                <div class="controls">
                    <input type="text" class="form-control" name="no_tlp" value="<?php echo $no_tlp?>" <?php echo $readonly?>>
                    <?php echo form_error('no_tlp'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Job Title</label>
                <div class="controls">
                    <input type="text" class="form-control" name="job_title" value="<?php echo $job_title?>" <?php echo $readonly?>>
                    <?php echo form_error('job_title'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Role</label>
                <div class="controls">
                    <select name="role" class="form-control" <?php echo $readonly?>>
                        <option value="komite" <?php echo set_select('role','komite')?>>Komite</option>
                        <option value="member" <?php echo set_select('role','member')?>>Member</option>
                    </select>
                    <?php echo form_error('role'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Jabatan Komite</label>
                <div class="controls">
                    <input type="text" class="form-control" name="jabatan_komite" value="<?php echo $jabatan_komite?>"  <?php echo $readonly?>>
                    <?php echo form_error('jabatan_komite'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="company" class="form-label">Company</label>
                <div class="controls">
                    <input type="text" class="form-control" name="company" value="<?php echo $company?>" <?php echo $readonly?>>
                    <?php echo form_error('company'); ?>
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