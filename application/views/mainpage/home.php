<div class="page-content"> 
        <div class="content">
        <div class="row">
                <div class="col-lg-12 text-center">
                    <?php $error_msg = $this->session->flashdata('error'); if(!empty($error_msg)){ ?>
                        <div class="alert alert-block alert-danger fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>Permission Denied!</strong> <?php  echo $error_msg; ?>
                        </div>
                    <?php } ?>

                </div>
            </div>  
            <!-- BEGIN PAGE TITLE -->
              <div class="jumbotron">
                 <div class="panel-body">
                     <h1>Hello, <?php echo $this->session->userdata('name')?></h1>
                     <p>Welcome to Aprimi Management System</p>

    
                 </div>                  
                </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            
            <!-- END PLACE PAGE CONTENT HERE -->
        </div>
    </div>