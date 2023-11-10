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
            <form class="form-horizontal bv-form" role="form" id="taskForm" method="post" enctype="multipart/form-data" action="<?php echo base_url().'task/add_task_list'?>" onsubmit="return myFunction()">
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label" style="text-align: left;">Client:</label>
                        <div class="col-sm-7"> 
                            <select class="form-control" name="client_name" id="client_name" onchange="get_project(this.value, 'project_name')" required>
                                <option value="">Select</option>
                                <?php foreach($clent_details as $client){ ?>
                                    <option value="<?php echo $client->client_name; ?>"><?php echo $client->client_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>    
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align: left;">Project:</label>
                    <div class="col-sm-7"> 
                    <select class="form-control" name="project_name" id="project_name" required>
                        <option value="">Select</option>
                        
                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="text-align: left;">File:</label>
                    <div class="col-sm-7">
                        <input type="file" name="user_image" id="task_file" />
                    </div>
                    <div class="col-sm-5" style="margin-top: 20px;">    
                            <a download="Sample-file" href="<?php echo base_url().'uploads/company/sample_upload/sample.xlsx'?>" style="border:none; color:black">Sample Download</a>
                    </div>
                </div>    
                <img id="addloader" src="http://localhost/timesheet/assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;">
                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-8"> 
                    <button type="submit" class="btn btn-success pull-right" fdprocessedid="21qqk">Save</button>
                </div>
            </form>
        </div>    
    </div>            
</div> 
<script>
    function get_project(client_name, id) {
        var request = $.ajax({
            url: CURRENT_URL + '/project/get_project_assign_time',
            type: "POST",
            data: {client_name: client_name},
            dataType: "html"
        });
        request.done(function (data) {
            $('#' + id).html(data);
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function myFunction() {
        if($("#client_name").val() == ""){
            alert('Please select client');
            return false;
        }
        if($("#project_name").val() == ""){
            alert('Please select project');
            return false;
        } 
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
