<div class="page-content"> 
  <div class="content">

    <ul class="breadcrumb">
      <li>   
        <p>You are here</p>                         
      </li>        
      <li><a href="#" class="active">Agenda</a></li>                    
    </ul>
    <div class="page-title">  
      <i class="icon-custom-left"></i>
      <h3>List of <span class="semi-bold">Agenda</span></h3>  
      <div class="pull-right actions">
        <!-- <button class="btn btn-primary btn-cons" type="button" id="btn-new-ticket">New Agenda</button> -->
        <button class="btn btn-primary btn-cons" type="button" data-toggle="modal" data-target="#myModal">New Agenda</button>
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
            <p ><span class="text-success bold">Agenda #1</span> - Created on <?php echo $row->created_at?> - <?php echo ($daysleft >= 0)?$daysleft.' Days remaining':substr($daysleft,1).' Day ago'?> &nbsp;&nbsp;<span class="label label-important">ALERT</span></p>
            <div class="actions"> <a class="view" href="javascript:;"><i class="fa fa-search"></i></a> <a class="remove" href="javascript:;"><i class="fa fa-times"></i></a> </div>
          </div>
          <div class="grid-body  no-border" style="display:none">
            <div class="post">
              <div class="user-profile-pic-wrapper">
                <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="<?php echo base_url()?>assets/img/profiles/avatar_small2x.jpg" data-src="<?php echo base_url()?>assets/img/profiles/avatar_small.jpg" src="<?php echo base_url()?>assets/img/profiles/avatar_small.jpg" alt=""> </div>
              </div>
              <div class="info-wrapper">
                <div class="info"> Hi I have installed agent to monitor the usage of the droplet done via Anturis <br>
                  and lately there was a lot of down time. One that caught my eye was this <br>
                  Incident report<br>
                  <br>
                  New Critical Incident started at 13:10 MST on Monday, October 28 <br>
                  Critical Incident started at 13:10 MST on Monday, October 28 with ace has ended at 13:51 MST on Monday, October 28.<br>
                  <br>
                  Incident duration was 41 minutes.<br>
                  <br>
                  The server did not respond for 41 minutes.As you see 41 minutes is a big deal for us as we are going to lose alot of revenue we need you guys to check if these records are correct and if so why and will this happen again? or do we need to purchase some sort of cluster ? this is a very critical situation <br>
                  <br>
                Waiting for your reply </div>
                <div class="clearfix"></div>
              </div>
              <div class="clearfix"></div>
            </div>
            <br>
            <div class="form-actions">
              <div class="post col-md-12">
                <div class="user-profile-pic-wrapper">
                  <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="<?php echo base_url()?>assets/img/profiles/c2x.jpg" data-src="<?php echo base_url()?>assets/img/profiles/c.jpg" src="<?php echo base_url()?>assets/img/profiles/c.jpg" alt=""> </div>
                </div>
                <div class="info-wrapper">
                  <div class="info"> Hi,<br>
                    <br>
                    Thank you for reaching us, We are looking into this issue and will update you.<br>
                    <br>
                    Alex<br>
                    <hr>
                    <p class="small-text">Posted on 10/29/13 at 07:21</p>
                  </div>
                  <div class="form-group">
                    <label class="form-label"><i class="fa fa-reply"></i>&nbsp;Post a reply</label>
                    <div class="controls">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
          <?php
        }
      ?>
      <!-- <div class="col-md-12">
        <div class="grid simple no-border">
          <div class="grid-title no-border descriptive clickable">
            <h4 class="semi-bold">First Agenda on 1 April 2019</h4>
            <p ><span class="text-success bold">Agenda #1</span> - Created on 01/01/19 at 06:33 - 3 Days remaining&nbsp;&nbsp;<span class="label label-important">ALERT</span></p>
            <div class="actions"> <a class="view" href="javascript:;"><i class="fa fa-search"></i></a> <a class="remove" href="javascript:;"><i class="fa fa-times"></i></a> </div>
          </div>
          <div class="grid-body  no-border" style="display:none">
            <div class="post">
              <div class="user-profile-pic-wrapper">
                <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="<?php echo base_url()?>assets/img/profiles/avatar_small2x.jpg" data-src="<?php echo base_url()?>assets/img/profiles/avatar_small.jpg" src="<?php echo base_url()?>assets/img/profiles/avatar_small.jpg" alt=""> </div>
              </div>
              <div class="info-wrapper">
                <div class="info"> Hi I have installed agent to monitor the usage of the droplet done via Anturis <br>
                  and lately there was a lot of down time. One that caught my eye was this <br>
                  Incident report<br>
                  <br>
                  New Critical Incident started at 13:10 MST on Monday, October 28 <br>
                  Critical Incident started at 13:10 MST on Monday, October 28 with ace has ended at 13:51 MST on Monday, October 28.<br>
                  <br>
                  Incident duration was 41 minutes.<br>
                  <br>
                  The server did not respond for 41 minutes.As you see 41 minutes is a big deal for us as we are going to lose alot of revenue we need you guys to check if these records are correct and if so why and will this happen again? or do we need to purchase some sort of cluster ? this is a very critical situation <br>
                  <br>
                Waiting for your reply </div>
                <div class="clearfix"></div>
              </div>
              <div class="clearfix"></div>
            </div>
            <br>
            <div class="form-actions">
              <div class="post col-md-12">
                <div class="user-profile-pic-wrapper">
                  <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="<?php echo base_url()?>assets/img/profiles/c2x.jpg" data-src="<?php echo base_url()?>assets/img/profiles/c.jpg" src="<?php echo base_url()?>assets/img/profiles/c.jpg" alt=""> </div>
                </div>
                <div class="info-wrapper">
                  <div class="info"> Hi,<br>
                    <br>
                    Thank you for reaching us, We are looking into this issue and will update you.<br>
                    <br>
                    Alex<br>
                    <hr>
                    <p class="small-text">Posted on 10/29/13 at 07:21</p>
                  </div>
                  <div class="form-group">
                    <label class="form-label"><i class="fa fa-reply"></i>&nbsp;Post a reply</label>
                    <div class="controls">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
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
            <label for="exampleInputEmail1">Lokasi</label>
            <input type="ext" class="form-control" name="lokasi" placeholder="Enter Lokasi">
          </div>
          <div class="form-group">
            <input class="form-control m-b-10" name="tanggal" id="start_date" data-date-format="yyyy-mm-dd" value="" readonly="">

          </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" id="submit_agenda">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>  