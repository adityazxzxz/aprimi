<div class="page-content"> 
  <div class="content">

    <ul class="breadcrumb">
      <li>   
        <p>You are here</p>                         
      </li>        
      <li><a href="#" class="active">Agenda</a></li>                    
    </ul>
    <div class="page-title">  
      <a href="<?php echo site_url('home')?>"><i class="icon-custom-left"></i></a>
      <h3>List of <span class="semi-bold">Agenda</span></h3>  
      <div class="pull-right actions">
        <!-- <button class="btn btn-primary btn-cons" type="button" id="btn-new-ticket">New Agenda</button> -->
        <?php
        if($this->session->userdata('role') === 'admin'){
          ?>
          <button class="btn btn-primary btn-cons" type="button" data-toggle="modal" data-target="#myModal">New Agenda</button>
          <?php
        }
        ?>
      </div>  
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple transparent" id="new-ticket-wrapper" style="display:none">
          <div class="grid-title no-border">
            <h4 class="semi-bold">How can we help you?</h4>
          </div>
          <div class="grid-body">
            <form class="" id="new-ticket-form">
              <div class="row form-row">
                <div class="col-md-8">
                  <input type="text" placeholder="Subject" class="form-control" id="txtSubject" name="txtSubject">
                </div>
                <div class="col-md-4">
                  <input type="text" placeholder="Department" class="form-control" id="txtDept" name="txtDept">
                </div>
              </div>
              <div class="row form-row">
                <div class="col-md-12">
                  <textarea rows="8" class="form-control" id="txtMessage"  placeholder="Please detail your issue or question"></textarea>
                </div>
              </div>
              <div class="row form-row">
                <div class="col-md-12 margin-top-10">
                  <div class="pull-left">
                    <div class="checkbox checkbox check-success"> &nbsp;
                      <input type="checkbox" id="checkbox1" value="1">
                      <label for="checkbox1">I Here by agree on the Term and condition. </label>
                    </div>
                  </div>
                  <div class="pull-right">
                    <button class="btn btn-cons" type="button" id="btn-close-ticket">Close</button>
                    <button class="btn btn-primary btn-cons" type="submit" >Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <h4>Open <span class="semi-bold">Agenda</span></h4>
    <br>
    <div class="row">
      <!-- FROM HERE -->
      <?php
      if(empty($data)){
        ?>
        <div class="col-md-12">
          <div class="grid simple no-border">
            <div class="grid-title no-border descriptive">
              Data not found
            </div>
            
          </div>
        </div>
        <?php
      }else{

        $count = 1;
        foreach ($data as $key => $row) {
          $agendatime = strtotime($row->tanggal);
          $currentdate = strtotime(date('Y-m-d'));
          $timeleft = $agendatime-$currentdate;
          $daysleft = round((($timeleft/24)/60)/60); 
          ?>
          <div class="col-md-12">
            <div class="grid simple no-border">
              <div class="grid-title no-border descriptive clickable">
                <h4 class="semi-bold"><?php echo $row->nama?></h4>
                <p ><span class="text-success bold">Agenda #<?php echo $count?></span> - on <?php echo date('d M Y',strtotime($row->tanggal))?> - <?php echo ($daysleft >= 0)?$daysleft.' Days remaining':substr($daysleft,1).' Day ago'?> &nbsp;&nbsp;<span class="label label-important">ALERT</span></p>
                <div class="actions"> <a class="view" href="javascript:;"><i class="fa fa-search"></i></a> <a class="remove" href="javascript:;"><i class="fa fa-times"></i></a> </div>
              </div>
              <div class="grid-body  no-border" style="display:none">
                <div class="post">
                  <div class="user-profile-pic-wrapper">
                    <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="<?php echo base_url()?>assets/img/profiles/avatar_small2x.jpg" data-src="<?php echo base_url()?>assets/img/profiles/avatar_small.jpg" src="<?php echo base_url()?>assets/img/profiles/avatar_small.jpg" alt=""> </div>
                  </div>
                  <div class="info-wrapper">
                    <div class="info">
                      <?php echo $row->deskripsi?>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <br>
              </div>
            </div>
          </div>
          <?php
          $count++;
        }

      }
      ?>
    </div>
    <!-- END HERE -->         



  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('#start_date').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
    });

    $('#submit_agenda').on('click',function(e){
      e.preventDefault();
      console.log($('#form_add_agenda').serialize());
      $.ajax({
        url:'<?php echo site_url()?>/agenda/create',
        data:$('#form_add_agenda').serialize(),
        type:'POST',
        success:function(e){
          var data = $.parseJSON(e);
          console.log(data);
          if(data.error == false){
            swal({
              title: "Success!",
              text: data.message,
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }else{
            swal("Failed!", data.message, "error");
            return false;
          }
        }
      });
      return false;
    });
  });
</script>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Agenda</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="form_add_agenda">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Enter Nama">
          </div>
          <div class="form-group">
            <label for="input-title-category">Description</label><br/> &nbsp;<span style="color:red;font-style:italic;">*Drag-and-Drop image here to upload</span>
            <textarea class="editor_new" name="deskripsi" rows="80"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Lokasi</label>
            <input type="ext" class="form-control" name="lokasi" placeholder="Enter Lokasi">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal</label>
            <input class="form-control m-b-10" name="tanggal" id="start_date" data-date-format="yyyy-mm-dd" value="" readonly="">

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="submit_agenda">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>  
<script type="text/javascript">
  $(document).ready(function(){
    $('.editor_new').summernote({
     height: 100,
     toolbar: [],
     styleWithSpan: false,
     onImageUpload: function(files, editor, welEditable) {
      sendFile(files[0], editor, welEditable);
    }
  });
  });
</script>