<style>
    th{
        font-size:11px !important;
          width:6% !important;
    }
    td{
        font-size:11px !important;
          width:90px !important;
          text-align: left;
    }
    spam#rqrd_msg {
    font-size: small;
    margin-left: 265px;
    color: red;
    display:none;
}
</style>


    <div class="kt-portlet__body--fit">
    <?php 
                $flash_message = @$this->session->flashdata('flash_message');
                $flash_message1 = @$this->session->flashdata('fail_flash_message');
            if(trim($flash_message)!=null){?>
            <div class="alert alert-success display-hide" style="margin:7px;" id="success_msg">
                <?php echo @$flash_message;?>
            </div>
            <?php } ?>
            <?php if(trim($flash_message1)!=null){?>
            <div class="alert alert-danger display-hide" style="margin:7px;" id="err_msg">
                <?php echo @$flash_message1;?>
            </div>
            <?php } ?>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="widget widget-body-white widget-heading-simple">
            <div class="widget-body overflow-x" style="  background: #eaeaea !important;">
                    <div class=" col-md-12" style="padding:0px; margin-top: 10px; margin-bottom: 20px;">
                        <span style="font-size:12px;  width:95px !important; float:left; margin-right: 15px;" colspan="7">
                                <img src="<?php echo base_url();  ?>assets/img/ANEX-LOGO.png" style=" margin-top:-3px; width:95px;" class="pull-right" />                                
                        </span>
                        <span style="font-size:16px; float: left;margin-top: -5px;" colspan="8">Clavis Technologies</span>     
                    </div>
        <table id="pending" style="width:100%;">
            <thead class="bg-gray">
                    <tr >
                        <th >Company</th>
                        <th >Client</th>
                        <th >Project</th>
                        <th >Team</th>
                        <th >User</th>
                        <th >Activity</th>
                        <th >Disbursement</th>
                        <th >Billable</th>
                        <th >Date</th>
                        <th >Start Date</th>
                        <th >End Date</th>
                        <th >Time (HH:mm) </th>
                        <th >Amount</th>
                        <th >Added Date</th>
                        <th  >Status</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (!empty($pending_report)) {
                     foreach ($pending_report as $project)
                         {
                            ?>
          <tr class="gradeX">
            <td><?php echo $project->company_name; ?> </td>
            <td><?php echo $project->client_name;  ?></td>
            <td><?php echo $project->project_name;  ?></td>
            <td><span><?php echo $project->team_name; ?> </td>
            <td><?php echo $project->empName.$project->surname;  ?></td>
            <td><?php echo $project->activity_name;  ?></td>
            <td><?php echo $project->disbursement; ?></td>
            <td><?php echo $project->billable;  ?></td>
            <td><?php echo $project->timesheet_date;  ?></td>
            <td><?php echo $project->start_time; ?> </td>
            <td><?php echo $project->end_time;  ?></td>
            <td><?php echo "0".$project->time_units.":".$project->time_minutes."0";  ?></td>
            <td><?php echo "0.00"; ?></td>
            <td><?php echo date_format(date_create($project->created), "d F Y"); ?></td>
            <td><?php if($project->status =="1") { echo "Pending"; }else if($project->status =="3"){ echo "Rejected";}else{{ echo "Approved";}} ?></td>
            <td><button style="padding: 6px 14px; font-size: 12px; line-height: 0.5;" class="btn-xs btn-danger td-btn-marg-right" onclick="submit_pending('<?php echo $project->timesheet_id; ?>')" data-id="<?php echo $project->timesheet_id; ?>">Action</button></td>
          </tr>
          <?php  } } ?>
        </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<div class="modal fade"  id="change_stats">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">ACTION</h3>
      </div>
      <!-- // Modal heading END --> 
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="innerAll">
          <div class="innerLR">
            <form class="form-horizontal" role="form" id="">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Action</label>
                <div class="col-sm-7">
                <select id="selected_option" for="postage" class="btn-lg text-dark td-btn-marg-right" style="width: 135px;font-size: 13px;">
                                <option value="2">Approved</option>
                                <option value="3">Rejected</option>
                            </select>                
                        </div>
              </div>      
              <div class="form-group" style="margin-bottom: 0px;">
                  <label class="col-sm-4 control-label"style="text-align: left;">Remarks<p>(Write remarks in max 255 characters.)</p></label>  
                  <div class="col-sm-7">
                      <textarea id="remarks" name="details" style="margin-top: 5px;width: 270px;height: 90px;border-radius: 5px;" type="text" maxlength="250"></textarea>                        </div>
              </div>   
              <spam id="rqrd_msg">This is required field.</spam>   
              <img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;"/>
              <div class="form-group" style="margin-top: 16px;">
                <div class="col-sm-offset-1 col-sm-10" style="padding: 0px 75px !important;"> 
                  <a class="btn btn-success pull-right" onclick="change_stats();">Save</a>
                   <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a> </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<input id="timesheet_id" type="hidden" value=""/>
<script>
    function submit_pending(t_id){
          document.getElementById('timesheet_id').value=t_id;
          $('#change_stats').modal({
                                  backdrop: "static",
                                  keyboard: false
                                  });
        
    }

    function change_stats(){
      document.getElementById('rqrd_msg').style.display="none"; 
          var remarks = document.getElementById('remarks').value;
            if(document.getElementById('remarks').value.trim()==""){
              document.getElementById('rqrd_msg').style.display="block";  
            }else{
                  $('#change_stats').modal('hide');
                var status = document.getElementById('selected_option').value;
                  var id = document.getElementById('timesheet_id').value;
                  $.ajax({
                          type:"POST",
                          url: CURRENT_URL + '/report/approve_pending_report',
                          data:{'id': id, status: status, remarks: remarks},
                          success:function (data) {
                            location.reload();
                      }
                  });
            }

    }
    setTimeout(function() {
      $('#success_msg, #err_msg').fadeOut('fast');
    }, 3000); 
</script>