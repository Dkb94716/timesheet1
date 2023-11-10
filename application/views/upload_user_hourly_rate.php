<?php
$this->load->library('session');
$session_val = $this->session->all_userdata();
// $success_msg = @$this->session->userdata('error_msg');
?>
<div class="innerLR" style="margin-top:60px;">
    <?php
 
 if(!empty(@$this->session->userdata('error_msg'))){
 ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Eroor!</strong> <?php echo @$this->session->userdata('error_msg');?>
</div>
<?php 
    $user_message1 = array(
        'error_msg' => ''
    );
    $this->session->set_userdata($user_message1); 
}  if(!empty(@$this->session->userdata('success_msg'))) { ?> 
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> <?php echo @$this->session->userdata('success_msg');?>
    </div>
<?php 
    $user_message1 = array(
        'success_msg' => ''
    );
    $this->session->set_userdata($user_message1);
}?>                
</div>            
<div class="container">
    <div class="row">
        <div class="col-lg-6" style="margin-top: 30px;">
            <form class="form-horizontal bv-form" role="form" id="taskForm" method="post" enctype="multipart/form-data" action="<?php echo base_url().'timesheet/add_user_hourly_rate_list'?>" onsubmit="return myFunction()">
                <div class="form-group">
                    <label class="col-sm-5 control-label" style="text-align: left;">Upload Users Hourly Rate File:</label>
                    <div class="col-sm-5">
                        <input type="file" name="user_image" id="task_file" style="margin-top: 5px;" />
                    </div>
                </div>    
                <img id="addloader" src="http://localhost/timesheet/assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;">
                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-7"> 
                    <button type="submit" class="btn btn-success pull-right" fdprocessedid="21qqk">Upload</button>
                </div>
            </form>
        </div>    
    </div>            
</div> 
<script>
    function myFunction() {
        var fileVal=document.getElementById("task_file");
        if(fileVal.value == "") {
            alert('Please upload file');
            return false;
        } else{
            var fileName = fileVal.value;
            var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
            if(ext =="xlsx" || ext=="xls") {
                document.getElementById('taskForm').submit();
            } else {
                alert("Upload xlsx file only");
                return false;
            }
        }
    }
</script> 
