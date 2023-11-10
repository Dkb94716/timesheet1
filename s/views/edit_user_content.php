<?php
$user_id = $this->uri->segment(3);
$this->load->library('session');
$account= 0;
if(isset($_GET['account'])){
    $account = 1;
}
?>
<script>
    $(document).ready(function() {
        <?php 
        if ($account== 1) { ?>
        $("#addForm :input").attr("disabled","disabled");
        $('#submit_btn').remove();
        $('#emailId').removeAttr('disabled');
        
        $(".datepicker2").bind("click", function() {
            
            return false;
        });
        $(".input-group-addon").css("pointer-events", "none");
        <?php } ?>
        $("#1").bind("click", function() {
            return false;
        });
        $("#2").bind("click", function() {
            return false;
        });
        $("#3").bind("click", function() {
            return false;
        });
        $("#4").bind("click", function() {
            return false;
        });
        $("#5").bind("click", function() {
            return false;
        });
        $("#6").bind("click", function() {
            return false;
        });

    });

</script>
<style>
    #dvPreview img{
      width:100px !important;
      height:100px !important;
      margin-top: 23px !important;
      margin-bottom: 23px !important;
      float:right !important;
    }
    .fileUpload {
 position: relative;
 overflow: hidden;
 margin: 10px;
}
.fileUpload input.upload {
 position: absolute;
 top: 0;
 right: 0;
 margin: 0;
 padding: 0;
 font-size: 20px;
 cursor: pointer;
 opacity: 0;
 filter: alpha(opacity=0);
}
</style>
<div id="rootwizard" class="wizard">

    <!-- Wizard heading -->
    <div class="wizard-head">
        <ul>
            <li><a href="#tab1" data-toggle="tab" id="1">PERSONAL DETAILS</a></li>
            <li><a href="#tab2" data-toggle="tab" id="2">CONTACT  DETAIL</a></li>
            <li><a href="#tab3" data-toggle="tab" id="3">DOCUMENT DETAIL</a></li>
            <li><a href="#tab4" data-toggle="tab" id="4">JOB DETAIL</a></li>
            <li><a href="#tab5" data-toggle="tab" id="5">TRAINING</a></li>
            <li><a href="#tab6" data-toggle="tab" id="6">INSURANCE</a></li>

        </ul>
    </div>

    <!-- // Wizard heading END -->

    <div class="widget">

        <!-- Wizard Progress bar -->
        <div class="widget-head progress progress-primary" id="bar">
            <div class="progress-bar">Step <strong class="step-current">1</strong> of <strong class="steps-total">3</strong> - <strong class="steps-percent">100%</strong></div>
        </div>

                
                
        <!-- // Wizard Progress bar END -->
        <form  role="form" id="addForm" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>userdetails/update_user_data/<?php echo $user_id; ?>"> 

            <div class="widget-body">
                <div id="error_flag">0</div>


                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
<?php
foreach ($employee_presonal_details as $userdetail):
   
    ?>
                            <div class="row">


                                <div class="col-md-9">

                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group modal-title">
                                                <label style="font-size: 15px;">PERSONAL DETAILS</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">	
                                            <div class="form-group modal-title" style="margin-top: 0px;">
                                                <label style="font-size: 15px;">&nbsp;</label>
                                            </div>
                                        </div>	
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-12" style="padding-left:0px;">
                                            <div class="col-sm-5" style="padding-left:0px;padding-right:8px;">
                                                <div class="form-group">
                                                    <label class="control-label inputtext_formating" for="fullname">First Name <span style="color:#a94442">*</span>:</label>
                                                    <input class="form-control height_25 plahole_font"  type="text" id="username1" name="username1" placeholder="Name" value="<?php echo $userdetail->empName; ?>">
                                                    
                                                </div>	
                                            </div>
                                            <div class="col-sm-5" style="padding-left: 20px; padding-right: 0px;">
                                                <div class="form-group">

                                                    <label class="control-label inputtext_formating" for="fullname">Last Name :</label>
                                                    <input class="form-control height_25 plahole_font"  type="text" id="surname" name="surname" placeholder="Surname" value="<?php echo $userdetail->surname; ?>">
                                                </div>	
                                            </div>
                                        </div>        
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="fullname">Other Names :</label>
                                                <input class="form-control height_25 plahole_font"  type="text" id="othername" name="othername" placeholder="Other Names" value="<?php echo $userdetail->other; ?>">
                                            </div>	
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="password" >Date of Birth :</label>
                                                <div class="input-group date datepicker2">
                                                   <input  class="form-control height_25 plahole_font" type="text" placeholder="Date of Birth"  id="dob" name="dob"  style="background-color : #fff;"  value="<?php   echo ($userdetail->dob!='0000-00-00')? date('d F Y',  strtotime($userdetail->dob)) : ''; ?>" />
                                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="email">Employee ID <span style="color:#a94442">*</span>:</label>
                                                <input class="form-control height_25 plahole_font" type="text" id="employeeId" name="employeeId" placeholder="Employee ID" value="<?php echo $userdetail->empId; ?>" onchange="check_emp_id(this.value,<?php echo $employee_id;?>)">
                                                <span id="emp_id_error" style="color:#a94442;font-size: 13px;"></span>

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="PlaceOfBirth">Place Of Birth :</label>
                                                <input class="form-control height_25 plahole_font" type="text" id="placeOfBirth" name="placeOfBirth" placeholder="Place Of Birth" value="<?php echo $userdetail->placeOfBirth; ?>">
                                            </div>
                                        </div>
                                    </div>
                               
                                    <div class="col-sm-12" style="padding-left:0px;">
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="email">Company :</label>
                                                 <select class="form-control height_24 plahole_font" id="companyId"  name="companyId">
                                                   <option value="">Select Company</option>
                                                <?php foreach ($company_detail as $company) { ?>
                                                  <option value="<?php echo $company->company_id; ?>" <?php if($company->company_id == $userdetail->company_id){   ?> selected="selected" <?php } ?>><?php echo $company->company_name; ?></option>
                                                <?php } ?>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                           
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating"  for="email">Designation :</label>
                                                <input class="form-control height_25 plahole_font" type="text" id="designation" name="designation" placeholder="Designation"  value="<?php echo $userdetail->placeOfBirth; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="password_confirmation">Occupation :</label>
                                                <input class="form-control height_25 plahole_font" type="text" id="occupation" name="occupation" placeholder="Occupation" value="<?php echo $userdetail->occupation; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="password">Team :</label>
                                                <select class="form-control height_24 plahole_font" id="team"  name="team">
<option value="">Select Team</option>

    <?php foreach ($team_detail as $teams) { ?>

                                                        <option value="<?php echo $teams->team_id; ?> "<?php if ($teams->team_id == $userdetail->currentTeamId) { ?>  selected="selected" <?php } ?>><?php echo $teams->team_name; ?></option>
    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="email">City :</label>
                                                <input class="form-control height_25 plahole_font" type="text" id="city" name="city" placeholder="City" onFocus="errorFadeOut('cityVal')" value="<?php echo $userdetail->city; ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="password_confirmation">Department :</label>
                                                <select class="form-control height_24 plahole_font" id="department" name="department">
                                                    <option value="">Select  Department</option>
    <?php foreach ($department_detail as $department) { ?>

                                                        <option value="<?php echo $department->department_id; ?>" <?php if ($department->department_id == $userdetail->deptId) { ?>  selected="selected" <?php } ?>><?php echo $department->department_name; ?></option>
    <?php } ?>


                                                </select>
                                            </div>
                                        </div>
    <?php //cho $userdetail->country_id;    ?>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="password">Country :</label>
                                                <select id="country" name="country" class="form-control height_24 plahole_font" >
                                                    <option value="">-- select one --</option>
    <?php foreach ($country_detail as $country) { ?>
                                                        <option value="<?php echo $country->country_id; ?>"<?php if ($country->country_id == $userdetail->country) { ?>  selected="selected" <?php } ?>><?php echo $country->country_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="password_confirmation">Email <span style="color:#a94442">*</span>:</label>
                                                <input class="form-control height_25 plahole_font" type="Email" name="emailId" id="emailId" placeholder="Email ID" value="<?php echo $userdetail->emailId; ?>" onchange="check_email_id(this.value,<?php echo $employee_id;?>)">
                                                <span id="email_id_error" style="color:#a94442;font-size: 13px;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="email">Home Telephone :</label>
                                                <input class="form-control height_25 plahole_font" type="text" id="homeTel" name="homeTel" placeholder="Home Telephone No" value="<?php echo $userdetail->homePhone; ?>">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="password">Gender :</label>
                                                <select id="gender" name="gender" class="form-control height_24 plahole_font">
                                                    <option value="Male"<?php if ($userdetail->gender == 'Male') { ?>selected="selected"<?php } ?>>Male</option>
                                                    <option value="Female"<?php if ($userdetail->gender == 'Female') { ?>selected="selected"<?php } ?>>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="email" class="control-label inputtext_formating">Mobile :</label>
                                                <input class="form-control height_25 plahole_font" type="text" id="mobileNo" name="mobileNo" placeholder="Mobile No." value="<?php echo $userdetail->mobile; ?>">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label for="email" class="control-label inputtext_formating">Nationality :</label>
                                                <select id="nationality" name="nationality" class="form-control height_24 plahole_font">	

                                                    <option value="">-- select one --</option>
    <?php foreach ($country_detail as $country) { ?>
                                                        <option value="<?php echo $country->country_id; ?>"<?php if ($country->country_id == $userdetail->country) { ?>  selected="selected" <?php } ?> ><?php echo $country->country_name; ?></option>
                                                    <?php } ?> ?>



                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="password" class="control-label inputtext_formating">Access Level <span style="color:#a94442">*</span>:</label>
                                                <select id="accesslevel" name="accesslevel" class="form-control height_24 plahole_font" onFocus="errorFadeOut('accesslevelVal')">
                                                    <option value="">-- select one --</option>
    <?php foreach ($user_role_detail as $role_details) { ?>
                                                        <option value="<?php echo $role_details->role_id; ?>" <?php if ($role_details->role_id == $userdetail->usrRoleld) { ?>  selected="selected" <?php } ?>><?php echo $role_details->role_name; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <small id="accesslevelVal" class="help-block" style="display:none" data-bv-validator="notEmpty" data-bv-for="accesslevel" data-bv-result="INVALID">Access Level is required</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label for="dtJoin" class="control-label inputtext_formating">Date Joining :</label>
                                                <div class="input-group date datepicker2">
                                                 
                                                  
                                                    <input  class="form-control height_25 plahole_font" type="text"  id="dtJoin" name="dtJoin" placeholder="Date Joining"  style="background-color : #fff;" value="<?php   echo ($userdetail->dateJoining!='0000-00-00')? date('d F Y',  strtotime($userdetail->dateJoining)) : ''; ?>">
                                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="email" class="control-label inputtext_formating">Address :</label>
                                                <textarea class="form-control height_25 plahole_font" id="address" name="address" placeholder="Address"  style="resize:none;height: 100px;"><?php echo $userdetail->address; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px;">
                                        <div class="col-sm-5" style="padding-left:0px; margin-top:-75px;">
                                            <div class="form-group">
                                                <label for="pro-period" class="control-label inputtext_formating">Probation Period :</label>
                                                <select id="pro_period" name="pro_period" class="form-control height_24 plahole_font">
                                                    <option value="">-- select Month --</option>
                                                       <?php for ($i = 1; $i <=12; $i++) { 
                                                          $month = ($i==1) ? 'Month' : 'Months';
                                                           ?>
                                                        <option value="<?php echo $i; ?>" <?php if ($userdetail->probation_period == $i) { ?>selected="selected"<?php } ?>><?php echo $i.' '.$month; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label for="dtconfirm" class="control-label inputtext_formating">Date of Confirmation :</label>
                                                <div class="input-group date datepicker2">
                                                    
                                                    <input  class="form-control height_25 plahole_font" type="text"  id="dtconfirm" name="dtconfirm" placeholder="Date of Confirmation"  style="background-color : #fff;" value="<?php  echo ($userdetail->dateOfConfirmation!='0000-00-00')? date('d F Y',  strtotime($userdetail->dateOfConfirmation)) : ''; ?>" />
                                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="password" class="control-label inputtext_formating">Status :</label>
                                                <select class="form-control height_24 plahole_font" id="status" name="status">
                                                    <option value="">Select Status</option>
                                                    <option value="Occupation permit" <?php if ($userdetail->status == 'Occupation permit') { ?>  selected="selected" <?php } ?>>Occupation permit </option>
                                                    <option value="Resident" <?php if ($userdetail->status == 'Resident') { ?>  selected="selected" <?php } ?>>Resident</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5" style="padding-left:0px;">
                                            <div class="form-group">
                                                <label for="dtconfirm" class="control-label inputtext_formating">Date Left :</label>
                                                <div class="input-group date datepicker2">
                                                   <input  class="form-control height_25 plahole_font" type="text" value="<?php echo ($userdetail->dateLeft!='0000-00-00')? date('d F Y',  strtotime($userdetail->dateLeft)) : '';?>" id="dtLeft" name="dtLeft" placeholder="Date of Confirmation" style="background-color : #fff;"/>
                                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="password" class="control-label inputtext_formating">Manager :</label>
                                                <select class="form-control height_24 plahole_font" id="manager_id" name="manager_id">
                                                    <option value="">Select Manager</option>
                                                   <?php foreach ($manager_details as $details1) { ?>
                                                    
                                                    <option value="<?php echo $details1->id; ?>" <?php if ($details1->id == $userdetail->managerId) { ?> selected="selected" <?php } ?> ><?php echo $details1->empName; ?></option><?php } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                  
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">


                                        <input type="checkbox" name="apply_leave" id="apply_leave" value="1" onclick="$(this).attr('value', this.checked ? 1 : 0)" style="float:left;" <?php if($userdetail->apply_leave==1){  ?>checked="checked" <?php } ?> >
                                        &nbsp;&nbsp;Allow leave application during probation period
                                    </div>
                                </div>
                                </div>
                              
                                <div class="col-sm-2 col-xs-12" id="dvPreview" >
                                    <input type="hidden" name="prev_profilepic" value="<?php echo $userdetail->profilepic;?>" />
                                    <a href="#"><img src="<?php if ($userdetail->profilepic) { ?><?php echo base_url(); ?>uploads/user/<?php echo $userdetail->profilepic; ?><?php } else { ?><?php echo base_url(); ?>assets/images/people/80/22.png   <?php } ?>" class="pull-right thumbnail imgupolad" id="imgupload" alt="Profile" style="margin-top:23px; width:110px; height:110px;"></a>
                                </div> 
                                   <div class="col-sm-2 col-xs-12">
                                <!--<input id="uploadFile" placeholder="Choose File" disabled="disabled" style="display:none;" />-->
                                       <div class="form-group">
                                       <div class="fileUpload btn btn-primary" style="margin-left: 82px;">
                                    <span>Upload</span>
                                    <input id="user_image" type="file" class="upload" name="user_image" />
                                </div>
                                           </div>
                            </div>

                            </div>
<?php endforeach; ?>
                    </div>

                    <div class="tab-pane" id="tab2">

<?php

if(!empty($employee_contact_details))
{

foreach ($employee_contact_details as $contact_detail) { ?>

                            <div class="col-sm-12" style="padding-left:0px; margin-top:40px;">
                                <div class="col-sm-10" style="padding-left:0px;">
                                    <div class="form-group modal-title" >
                                        <label style="font-size: 15px;" >CONTACT PERSONS IN CASE OF EMERGENCY</label>
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="col-sm-10" style="padding-left:0px;">
                                        <div class="form-group modal-title">
                                            <label style="font-size: 12px;">CONTACT DETAIL - 1</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="name" class="control-label inputtext_formating">Name :</label>
                                            <!--<input class="form-control height_25 plahole_font"  type="text" id="name" name="name1" placeholder="Full Name">-->
                                            <input class="form-control height_25 plahole_font"  type="text"  id="c_name1" name="c_name1" placeholder="Full Name" value="<?php echo @$contact_detail->name1; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="relation" class="control-label inputtext_formating">Relationship :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" id="c_relationship1" name="c_relationship1" placeholder="Relationship" value="<?php echo $contact_detail->releationship1; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="rel-telno" class="control-label inputtext_formating">Tel No. :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="c_tel_no1" name="c_tel_no1" placeholder="Tel No." value="<?php echo $contact_detail->telephone1; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="rel-address" class="control-label inputtext_formating">Address :</label>
                                            <textarea class="form-control height_25 plahole_font" id="c_address1" placeholder="Address" name="c_address1"  style="resize:none;height: 100px;"><?php echo $contact_detail->address1; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="col-sm-10" style="padding-left:0px;">
                                        <div class="form-group modal-title">
                                            <label style="font-size: 12px;">CONTACT DETAIL - 2</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="name" class="control-label inputtext_formating">Name :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" name="c_name2" id="c_name2" placeholder="Full Name" value="<?php echo $contact_detail->name2; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group" class="control-label inputtext_formating">
                                            <label for="relation" class="control-label inputtext_formating">Relatioship :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" name="c_relationship2"  id="c_relationship2" placeholder="Relatioship" value="<?php echo $contact_detail->releationship2; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="rel-telno" class="control-label inputtext_formating">Tel No. :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="c_tel_no2" name="c_tel_no2" placeholder="Tel No." value="<?php echo $contact_detail->telephone2; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="rel-address" class="control-label inputtext_formating">Address :</label>
                                            <textarea class="form-control height_25 plahole_font" type="text" placeholder="Address" id="c_address2" name="c_address2"  style="resize:none;height: 100px;"><?php echo $contact_detail->address2; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php } }else { ?>
                   <div class="col-sm-12" style="padding-left:0px; margin-top:40px;">
                                <div class="col-sm-10" style="padding-left:0px;">
                                    <div class="form-group modal-title" >
                                        <label style="font-size: 15px;" >CONTACT PERSONS IN CASE OF EMERGENCY</label>
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="col-sm-10" style="padding-left:0px;">
                                        <div class="form-group modal-title">
                                            <label style="font-size: 12px;">CONTACT DETAIL - 1</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="name" class="control-label inputtext_formating">Name :</label>
                                            <!--<input class="form-control height_25 plahole_font"  type="text" id="name" name="name1" placeholder="Full Name">-->
                                            <input class="form-control height_25 plahole_font"  type="text"  id="c_name1" name="c_name1" placeholder="Full Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="relation" class="control-label inputtext_formating">Relationship :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" id="c_relationship1" name="c_relationship1" placeholder="Relationship" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="rel-telno" class="control-label inputtext_formating">Tel No. :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="c_tel_no1" name="c_tel_no1" placeholder="Tel No." value="" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="rel-address" class="control-label inputtext_formating">Address :</label>
                                            <textarea class="form-control height_25 plahole_font" id="c_address1" placeholder="Address" name="c_address1"  style="resize:none;height: 100px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="col-sm-10" style="padding-left:0px;">
                                        <div class="form-group modal-title">
                                            <label style="font-size: 12px;">CONTACT DETAIL - 2</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="name" class="control-label inputtext_formating">Name :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" name="c_name2" id="c_name2" placeholder="Full Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group" class="control-label inputtext_formating">
                                            <label for="relation" class="control-label inputtext_formating">Relatioship :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" name="c_relationship2"  id="c_relationship2" placeholder="Relatioship" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="rel-telno" class="control-label inputtext_formating">Tel No. :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="c_tel_no2" name="c_tel_no2" placeholder="Tel No." value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="rel-address" class="control-label inputtext_formating">Address :</label>
                                            <textarea class="form-control height_25 plahole_font" placeholder="Address" id="c_address2" name="c_address2" style="resize:none;height: 100px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        
                        
                        <?php } ?>
                    </div>

                    <div class="tab-pane" id="tab3">

<?php 
if(!empty($employee_document_details)){

foreach ($employee_document_details as $document_details) { ?>

                           
                            <div class="col-sm-12" style="padding-left:0px; margin-top:40px;">
                                <div class="col-sm-6" style="padding-left:0px;">
                                    <div class="form-group modal-title">
                                        <label style="font-size: 15px;">DOCUMENT</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="padding-left:0px;">
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label for="passport" class="control-label inputtext_formating"> Identity Card/Passport :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="identity_card_passport" name="identity_card_passport" placeholder="Identity Card/Passport" value="<?php echo $document_details->identity_card; ?>">
                                    </div>
                                </div>

                                <div class="col-sm-5" >
                                    <div class="form-group">
                                        <label for="edfform" class="control-label inputtext_formating"> EDF forms  :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="edf_forms" name="edf_forms" placeholder="EDF forms" value="<?php echo $document_details->eds_form; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label for="otherdocument" class="control-label inputtext_formating">  Other Documents  :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="other_documents" name="other_documents" placeholder="Other Documents" value="<?php echo $document_details->other_documents; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-5" >
                                    <div class="form-group">
                                        <label for="account" class="control-label inputtext_formating">Bank :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="bank_account" name="bank_account" placeholder="Account" value="<?php echo $document_details->bank; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label for="contract" class="control-label inputtext_formating">Contract :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="contract" name="contract" placeholder="Contract" value="<?php echo $document_details->contract; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="password_confirmation"class="control-label inputtext_formating">Driving Licence :</label>
                                        <input class="form-control height_25 plahole_font" type="text" id="driving_licence" name="driving_licence" placeholder="Driving Licence" value="<?php echo $document_details->driving_licence; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group" class="control-label inputtext_formating">
                                        <label for="certificates_memberships">Certificates/Memberships :</label>
                                        <input class="form-control height_25 plahole_font" type="text" id="certificates_memberships" name="certificates_memberships" placeholder="Certificates/Memberships" value="<?php echo $document_details->certificates_memberships; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-5" >
                                    <div class="form-group">
                                        <label for="Personal_questionnaires" class="control-label inputtext_formating">Personal Questionnaires (FSC) :</label>
                                        <input class="form-control height_25 plahole_font" type="text" id="personal_questionnaires_fsc" name="personal_questionnaires_fsc" placeholder="Personal Questionnaires (FSC)" value="<?php echo $document_details->personal_questionnaires; ?>">
                                    </div>
                                </div>
                                <!--<div class="col-sm-5">
                                        <div class="form-group">
                                                <label for="progress_sheet">Study Progress Sheet :</label>
                                                <input class="form-control height_25 plahole_font" type="text" id="study_progress_sheet" name="study_progress_sheet" placeholder="Study Progress Sheet">
                                        </div>
                                </div>-->
                            </div>
<?php } } else { ?>
                 <div class="col-sm-12" style="padding-left:0px; margin-top:40px;">
                                <div class="col-sm-6" style="padding-left:0px;">
                                    <div class="form-group modal-title">
                                        <label style="font-size: 15px;">DOCUMENT</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="padding-left:0px;">
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label for="passport" class="control-label inputtext_formating"> Identity Card/Passport :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="identity_card_passport" name="identity_card_passport" placeholder="Identity Card/Passport" value="">
                                    </div>
                                </div>

                                <div class="col-sm-5" >
                                    <div class="form-group">
                                        <label for="edfform" class="control-label inputtext_formating"> EDF forms  :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="edf_forms" name="edf_forms" placeholder="EDF forms" value="">
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label for="otherdocument" class="control-label inputtext_formating">  Other Documents  :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="other_documents" name="other_documents" placeholder="Other Documents" value="">
                                    </div>
                                </div>
                                <div class="col-sm-5" >
                                    <div class="form-group">
                                        <label for="account" class="control-label inputtext_formating">Bank :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="bank_account" name="bank_account" placeholder="Account" value="">
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label for="contract" class="control-label inputtext_formating">Contract :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="contract" name="contract" placeholder="Contract" value="">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="password_confirmation"class="control-label inputtext_formating">Driving Licence :</label>
                                        <input class="form-control height_25 plahole_font" type="text" id="driving_licence" name="driving_licence" placeholder="Driving Licence" value="">
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group" class="control-label inputtext_formating">
                                        <label for="certificates_memberships">Certificates/Memberships :</label>
                                        <input class="form-control height_25 plahole_font" type="text" id="certificates_memberships" name="certificates_memberships" placeholder="Certificates/Memberships" value="">
                                    </div>
                                </div>
                                <div class="col-sm-5" >
                                    <div class="form-group">
                                        <label for="Personal_questionnaires" class="control-label inputtext_formating">Personal questionnaires (FSC) :</label>
                                        <input class="form-control height_25 plahole_font" type="text" id="personal_questionnaires_fsc" name="personal_questionnaires_fsc" placeholder="Personal questionnaires (FSC)" value="">
                                    </div>
                                </div>
                                <!--<div class="col-sm-5">
                                        <div class="form-group">
                                                <label for="progress_sheet">Study Progress Sheet :</label>
                                                <input class="form-control height_25 plahole_font" type="text" id="study_progress_sheet" name="study_progress_sheet" placeholder="Study Progress Sheet">
                                        </div>
                                </div>-->
                            </div>       
                        
                        <?php } ?>
                    </div>

                    <div class="tab-pane" id="tab4">
                        <div class="col-sm-12" style="padding-left:0px; margin-top:40px;">
                            <div class="col-sm-5" style="padding-left:0px;">
                                <div class="form-group modal-title">
                                    <label style="font-size: 15px;">JOB DETAIL</label>
                                </div>
                            </div>										
                        </div>
                        <div class="col-sm-12" style="padding-left:0px;" id="jobDetailHeader">
                            <?php if($account != 1) { ?>
                            <a href="#nogo" title="Add More" id="add_more_1">    
                                <i class="fa fa-fw icon-add-symbol add_moreiconjobdetail"></i>
                            </a>
                            <?php } ?>
                             <div id="addinput">
<?php
if(!empty($employee_job_details))
{
    $i=0;
foreach ($employee_job_details as $jobdetails) { 
    $i++;
    ?>
                                 <div id="job_detail_<?php echo $i;?>">

                               
                                   


                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label for="title1" class="control-label inputtext_formating">Title :</label>
                                            <input class="form-control height_25 plahole_font"  type="text"  name="j_title[]"  placeholder="Title" value="<?php echo $jobdetails->title; ?>">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="remarks" class="control-label inputtext_formating">Special Remarks :</label>
                                            <textarea class="form-control height_25 plahole_font" name="j_special_remarks[]" placeholder="Special Remarks " style="resize:none;height: 100px;"><?php echo $jobdetails->special_remarks; ?></textarea>
                                        </div>
                                    </div>
                                 <?php if($i>1){ ?>
                                 <i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail" onclick="deleteEditDiv('job_detail_<?php echo $i;?>')"></i>
                                 <?php } ?>
                                    <div class="col-sm-5" style="padding-left:0px; margin-top:-75px;">
                                        <div class="form-group">
                                            <label for="password" class="control-label inputtext_formating" >Date of Promotion :</label>
                                            <div class="input-group date datepicker2">
                                                
                                                 
                                                
                                                <input  class="form-control height_25 plahole_font" type="text" name="j_date_of_promotion[]" placeholder="Date of Promotion"  style="background-color : #fff;"  value="<?php   echo ($jobdetails->pormotion_date!='0000-00-00')? date('d F Y',  strtotime($jobdetails->pormotion_date)) : ''; ?>"/>
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                               

<?php }} else { ?>
                       
                                    


                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label for="title1" class="control-label inputtext_formating">Title :</label>
                                            <input class="form-control height_25 plahole_font"  type="text"  name="j_title[]"  placeholder="Title" value="">
                                           
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="remarks" class="control-label inputtext_formating">Special Remarks :</label>
                                            <textarea class="form-control height_25 plahole_font" type="text"  name="j_special_remarks[]" placeholder="Special Remarks " style="resize:none;height: 100px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-5" style="padding-left:0px; margin-top:-75px;">
                                        <div class="form-group">
                                            <label for="password" class="control-label inputtext_formating" >Date of Promotion :</label>
                                            <div class="input-group date datepicker2">
                                                <input  class="form-control height_25 plahole_font" type="text" name="j_date_of_promotion[]" placeholder="Date of Promotion"  style="background-color : #fff;"  value=""/>
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                           
                                    
                            
                            <?php } ?>
                                    <div id="job_detail"></div>
                           </div>  
                        </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                        <div class="col-sm-12" style="padding-left:0px; margin-top:40px;">
                            <div class="col-sm-5" style="padding-left:0px;">
                                <div class="form-group modal-title" >
                                    <label style="font-size: 15px;">TRAINING</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="padding-left:0px;" id="jobDetailHeader_2">
                            <?php if($account != 1) { ?>
                            <a href="#nogo" title="Add More" id="add_more_2">    
                                <i class="fa fa-fw icon-add-symbol add_moreiconjobdetail"></i>
                            </a>
                            <?php } ?>
                            <div id="addinput_2">

<?php 
$j=0;
if(!empty($employee_traning_details))
{
foreach ($employee_traning_details as $trainingdetails) {
    $j++;
    ?>


                                <div id="training_append_id_<?php echo $j;?>">
                                    
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label for="CourseName" class="control-label inputtext_formating">Course Name :</label>
                                            <input class="form-control height_25 plahole_font"  type="text"  name="t_course_name[]" placeholder="Course Name" value="<?php echo $trainingdetails->course_name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="relation" class="control-label inputtext_formating">Purpose :</label>
                                            <input class="form-control height_25 plahole_font"  type="text"  name="t_purpose[]" placeholder="Purpose" value="<?php echo $trainingdetails->purpose; ?>">
                                        </div>
                                    </div>
                                    <?php if($j>1){ ?>
                                 <i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail" onclick="deleteEditDiv('training_append_id_<?php echo $j;?>')"></i>
                                 <?php } ?>
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label for="offBy" class="control-label inputtext_formating">Offered By :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" name="t_offered_by[]" placeholder="Offered By" value="<?php echo $trainingdetails->offered_by; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="relation" class="control-label inputtext_formating">CPD Points :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" id="cpdPoints" name="t_cpd_points[]" placeholder="CPD Points" value="<?php echo $trainingdetails->cpd_points; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-10" style="padding-left:0px;">
                                        <div class="col-sm-6" style="padding-left:0px; padding-right:2px;">
                                            <div class="form-group">
                                                <label for="dtCourse" class="control-label inputtext_formating">Date :</label>
                                                <div class="input-group date datepicker2">
                                                   
                                                    <input  class="form-control height_25 plahole_font" type="text"  name="t_training_date[]" placeholder="Date of Training"  style="background-color : #fff;" value="<?php   echo ($trainingdetails->training_date!='0000-00-00')? date('d F Y',  strtotime($trainingdetails->training_date)) : ''; ?>" />
                                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>		
                                
 </div>
<?php } } else {?>
                
                                    
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label for="CourseName" class="control-label inputtext_formating">Course Name :</label>
                                            <input class="form-control height_25 plahole_font"  type="text"  name="t_course_name[]" placeholder="Course Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="relation" class="control-label inputtext_formating">Purpose :</label>
                                            <input class="form-control height_25 plahole_font"  type="text"  name="t_purpose[]" placeholder="Purpose" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label for="offBy" class="control-label inputtext_formating">Offered By :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" name="t_offered_by[]" placeholder="Offered By" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="relation" class="control-label inputtext_formating">CPD Points :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" id="cpdPoints" name="t_cpd_points[]" placeholder="CPD Points" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-10" style="padding-left:0px;">
                                        <div class="col-sm-6" style="padding-left:0px; padding-right:2px;">
                                            <div class="form-group">
                                                <label for="dtCourse" class="control-label inputtext_formating">Date :</label>
                                                <div class="input-group date datepicker2">
                                                    <input  class="form-control height_25 plahole_font" type="text"  name="t_training_date[]" placeholder="Date of Training"  style="background-color : #fff;" value="" />
                                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                     
                            <?php  } ?>
                             <div id="training_append_id"></div>
                                </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="tab6">

                        <div class="col-sm-12" style="padding-left:0px; margin-top:40px;">
                            <div class="col-sm-5" style="padding-left:0px;">
                                <div class="form-group modal-title">
                                    <label style="font-size: 15px;">INSURANCE</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="padding-left:0px;" id="jobDetailHeader_3">
                            <?php if($account != 1) { ?>
                            <a href="#nogo" title="Add More" id="add_more_3">    
                                <i class="fa fa-fw icon-add-symbol add_moreiconjobdetail hiddenpension_filed maging-top-50"></i>
                            </a>
                            <?php } ?>
                            <div class="col-sm-10" style="padding-left:0px;">
                                <div class="form-group">
                                    <label for="PensionPlan" style="float:left;">Pension Plan :</label>
                                    <div id="radio_btnuser">														
                                        <input  type="radio" class="radiobtnuser" name="pensionPlan" value="yes" id="pensionyes_radio" <?php echo ($userdetail->pension_status=='yes') ? 'checked="checked"' : '';?>> <span style="float:left;">Yes</span>
                                        <input type="radio" class="radiobtnuser" name="pensionPlan" value="no" id="pensionno_radio" <?php echo ($userdetail->pension_status=='no') ? 'checked="checked"' : '';?>> <span style="float:left;">No</span>
                                    </div>

                                </div>
                            </div>
                             <div id="addinput_3">
<?php 
$k=0;
if(!empty($employee_pension_details))
{
foreach ($employee_pension_details as $pension_details) {
    $k++;
    ?>

                               
                                    <div id="p_plan_<?php echo $k;?>">
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="hiddenpension_filed" for="PensionPlan" style="float:left;">Pension Plan :</label>

                                            <input class="form-control hiddenpension_filed"  type="text" name="i_pension_plan[]" placeholder="Pension Plan" style="float:left;" value="<?php echo $pension_details->pension_plan; ?>"  >
                                        </div>
                                    </div>

                                    <div class="col-sm-5 hiddenpension_filed">
                                        <div class="form-group">
                                            <label for="dtpen">Date Joined :</label>
                                            <div class="input-group date datepicker2">
                                                 
                                                
                                                
                                                <input  class="form-control height_25 plahole_font" type="text" name="i_pension_date_joined[]" name="Date Joined" placeholder="Date Joined"  style="background-color : #fff;" value=" <?php  echo ($pension_details->pension_join_date!='0000-00-00')? date('d F Y',  strtotime($pension_details->pension_join_date)) : ''; ?>"  />
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                         <?php if($k>1){ ?>
                                 <i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail" onclick="deleteEditDiv('p_plan_<?php echo $k;?>')"></i>
                                 <?php } ?>
                                        </div>
                                    
<?php } } else{ ?>
                            
                      <div id="addinput_3">
                                    
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="hiddenpension_filed" for="PensionPlan" style="float:left;">Pension Plan :</label>

                                            <input class="form-control hiddenpension_filed" id="i_pension_plan_text" type="text" name="i_pension_plan[]" placeholder="Pension Plan" style="float:left;" value=""  >
                                        </div>
                                    </div>

                                    <div class="col-sm-5 hiddenpension_filed">
                                        <div class="form-group">
                                            <label for="dtpen">Date Joined :</label>
                                            <div class="input-group date datepicker2">
                                                <input  class="form-control height_25 plahole_font" id="i_pension_plan_date" type="text" name="i_pension_date_joined[]" name="Date Joined" placeholder="Date Joined"  style="background-color : #fff;" value=""  />
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                            
                            <?php } ?>
                            <div id="p_plan">
                            </div>
                           </div>  
                        </div>	
                        <div class="col-sm-12" style="padding-left:0px;" id="jobDetailHeader_4">
                            <?php if($account != 1) { ?>
                            <a href="#nogo" title="Add More" id="add_more_4">    
                                <i class="fa fa-fw icon-add-symbol add_moreiconjobdetail hiddenmedical_filed maging-top-50"></i>
                            </a>
                            <?php } ?>
                            <div class="col-sm-10" style="padding-left:0px;">
                                <div class="form-group">
                                    <label for="MedicalPlan" style="float:left;">Medical Plan :</label>
                                    <div id="radio_btnmedical">														
                                        <input type="radio" class="radiobtnuser" name="medicalPlan" value="yes" id="medicalyes_radio" <?php echo ($userdetail->medical_status=='yes') ? 'checked="checked"' : '';?>> <span style="float:left;">Yes</span>
                                        <input type="radio" class="radiobtnuser" name="medicalPlan" value="no" id="medicalno_radio"  <?php echo ($userdetail->medical_status=='no') ? 'checked="checked"' : '';?>> <span style="float:left;">No</span>
                                    </div>

                                </div>
                            </div>
                            <div id="addinput_4">
                            
<?php $l=0;
if(!empty($employee_medical_details)){
    
    foreach ($employee_medical_details as $medical_details) { 
        $l++;
        ?>

                                
                                    
                                    <div id="m_plan_<?php echo $l;?>">

                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="hiddenmedical_filed" for="MedicalPlan" style="float:left;">Medical Plan :</label>

                                            <input class="form-control hiddenmedical_filed"  type="text" id="i_medical_plan_text"  name="i_medical_plan[]" placeholder="Medical Plan" style="float:left;" value="<?php echo $medical_details->medical_plan; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-sm-5 hiddenmedical_filed">
                                        <div class="form-group">
                                            <label for="dtmed">Date Joined :</label>
                                            <div class="input-group date datepicker2">
                                                
                                                <input  class="form-control height_25 plahole_font" type="text" id="i_medical_plan_date"   name="i_medical_date_Joined[]" placeholder="Date Joined"  style="background-color : #fff;" value=" <?php   echo ($medical_details->medical_paln_joined!='0000-00-00')? date('d F Y',  strtotime($medical_details->medical_paln_joined)) : ''; ?>"/>
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                        <?php if($l>1){ ?>
                                 <i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail" onclick="deleteEditDiv('m_plan_<?php echo $l;?>')"></i>
                                 <?php } ?>
                                    
                                </div>

<?php }} else { ?>
                       
                                    
                                   

                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="hiddenmedical_filed" for="MedicalPlan" style="float:left;">Medical Plan :</label>

                                            <input class="form-control hiddenmedical_filed"  type="text"  name="i_medical_plan[]" placeholder="Medical Plan" style="float:left;" value="" >
                                        </div>
                                    </div>
                                    <div class="col-sm-5 hiddenmedical_filed">
                                        <div class="form-group">
                                            <label for="dtmed">Date Joined :</label>
                                            <div class="input-group date datepicker2">
                                                <input  class="form-control height_25 plahole_font" type="text"  name="i_medical_date_Joined[]" placeholder="Date Joined"  style="background-color : #fff;" value=""/>
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                  
                            <?php } ?>
                            <div id="m_plan"></div>
                        </div> 




                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success pull-right" id="submit_btn">Save</button>
                                <a onclick="window_back()" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                            </div>
                        </div>

                    </div>


                </div>


<?php // }   ?>

            </div> 

        </form>

        <!-- Wizard pagination controls -->
           <ul class="pagination" style="min-height:35px;padding-left: 20px;">

            <li class="primary previous disabled"><a href="#" class="no-ajaxify">Previous</a></li>

            <li class="primary next"><a href="#" class="no-ajaxify">Next</a></li>     
<!--                  <button class=" next primaryno-ajaxify btn btn-success" >Next</button>-->


            </ul>




        <!-- // Wizard pagination controls END  -->
    </div>

    <script type="text/javascript">
        setInterval(function(){ $('.btn-success').removeAttr("disabled");}, 1000);
 function deleteEditDiv(divId){
     $('#'+divId).remove();
 }
 function deleteDiv(myDiv) {
            $(myDiv).parent().remove();
        }
        $('#add_more_1').on('click', function() {
            var inputToCopy = '<div><div class="col-sm-5" style="padding-left:0px;"><div class="form-group"><label for="title1" class="control-label inputtext_formating">Title :</label><input class="form-control height_25 plahole_font"  type="text"  name="j_title[]"  placeholder="Title"></div></div><div class="col-sm-5"><div class="form-group"><label for="remarks" class="control-label inputtext_formating">Special Remarks :</label><textarea class="form-control height_25 plahole_font" name="j_special_remarks[]" placeholder="Special Remarks "  style="resize:none;height: 100px;"></textarea></div></div><div class="col-sm-5" style="padding-left:0px; margin-top:-75px;"><div class="form-group"><label for="password" class="control-label inputtext_formating" >Date of Promotion :</label><div class="input-group date datepicker2"><input  class="form-control height_25 plahole_font" type="text" name="j_date_of_promotion[]" placeholder="Date of Promotion"  style="background-color : #fff;" /><span class="input-group-addon"><i class="fa fa-th"></i></span></div></div></div></div>';
            $('#job_detail').append(inputToCopy);
            $("#job_detail > :last-child").find(".col-sm-5").eq(1).after('<i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail" onClick="deleteDiv(this)"></i>');
            $("#job_detail > :last-child").find("#radio_btnuser").remove();
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
        });


       
        $('#add_more_2').on('click', function() {
            var inputToCopy = '<div> <div class="col-sm-5" style="padding-left:0px;"><div class="form-group"><label for="CourseName" class="control-label inputtext_formating">Course Name :</label><input class="form-control height_25 plahole_font"  type="text"  name="t_course_name[]" placeholder="Course Name"></div></div><div class="col-sm-5"><div class="form-group"><label for="relation" class="control-label inputtext_formating">Purpose :</label><input class="form-control height_25 plahole_font"  type="text"  name="t_purpose[]" placeholder="Purpose"></div></div><div class="col-sm-5" style="padding-left:0px;"><div class="form-group"><label for="offBy" class="control-label inputtext_formating">Offered By :</label><input class="form-control height_25 plahole_font"  type="text" name="t_offered_by[]" placeholder="Offered By"></div></div><div class="col-sm-5"><div class="form-group"><label for="relation" class="control-label inputtext_formating">CPD Points :</label><input class="form-control height_25 plahole_font"  type="text" id="cpdPoints" name="t_cpd_points[]" placeholder="CPD Points"></div></div><div class="col-sm-10" style="padding-left:0px;"><div class="col-sm-6" style="padding-left:0px; padding-right:2px;"><div class="form-group"><label for="dtCourse" class="control-label inputtext_formating">Date :</label><div class="input-group date datepicker2"><input  class="form-control height_25 plahole_font" type="text" value="" name="t_training_date[]" placeholder="Date of Training"  style="background-color : #fff;"/><span class="input-group-addon"><i class="fa fa-th"></i></span></div></div></div></div>	</div>';
            $('#training_append_id').append(inputToCopy);
            $("#training_append_id > :last-child").find(".col-sm-5").eq(1).after('<i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail" onClick="deleteDiv(this)"></i>');
            $("#training_append_id > :last-child").find("#radio_btnuser").remove();
         $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
        });


        
      
        $('#add_more_3').on('click', function() {
            var inputToCopy = '<div><div class="col-sm-5" style="padding-left:0px;"><div class="form-group"><label for="PensionPlan" style="float:left;">Pension Plan :</label><input class="form-control"  type="text" name="i_pension_plan[]" placeholder="Pension Plan" style="float:left;"></div></div><div class="col-sm-5"><div class="form-group"><label for="dtpen">Date Joined :</label><div class="input-group date datepicker2"> <input  class="form-control height_25 plahole_font" type="text" name="i_pension_date_joined[]" name="Date Joined" placeholder="Date Joined"  style="background-color : #fff;"/><span class="input-group-addon"><i class="fa fa-th"></i></span></div></div></div></div>';
            $('#p_plan').append(inputToCopy);
            $("#p_plan > :last-child").find(".col-sm-5").eq(1).after('<i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail pension" onClick="deleteDiv(this)"></i>');
            $("#p_plan > :last-child").find("#radio_btnuser").remove();
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
            
         
        });


        
        $('#add_more_4').on('click', function() {
            var inputToCopy = '<div><div class="col-sm-5" style="padding-left:0px;"><div class="form-group"><label for="MedicalPlan" style="float:left;">Medical Plan :</label><input class="form-control"  type="text"  name="i_medical_plan[]" placeholder="Medical Plan" style="float:left;"></div></div><div class="col-sm-5"><div class="form-group"><label for="dtmed">Date Joined :</label><div class="input-group date datepicker2"><input  class="form-control height_25 plahole_font" type="text"  name="i_medical_date_Joined[]" placeholder="Date Joined"  style="background-color : #fff;"/><span class="input-group-addon"><i class="fa fa-th"></i></span></div></div></div></div>';

            $('#m_plan').append(inputToCopy);
            $("#m_plan > :last-child").find(".col-sm-5").eq(1).after('<i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail medical" onClick="deleteDiv(this)"></i>');
            $("#m_plan > :last-child").find("#radio_btnmedical").remove();
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
        });


        

        $("#pensionyes_radio").on('click', function() {
            $(".hiddenpension_filed").css('display', 'block');
            $(".pension").css('display', 'block');
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
        });
        $("#pensionno_radio").on('click', function() {
            $(".hiddenpension_filed").css('display', 'none');
            $(".pension").css('display', 'none');
            $('#i_pension_plan_text').val('');
            $('#i_pension_plan_date').val('');
            $('#p_plan').html('');
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
        });
        $("#medicalyes_radio").on('click', function() {
            $(".hiddenmedical_filed").css('display', 'block');
            $(".medical").css('display', 'block');
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
        });
        $("#medicalno_radio").on('click', function() {
            $(".hiddenmedical_filed").css('display', 'none');
            $(".medical").css('display', 'none');
            $('#i_medical_plan_text').val('');
            $('#i_medical_plan_date').val('');
            $('#m_plan').html('');
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
        });

    </script>	

    <script src="<?php echo base_url(); ?>assets/plugins/forms_wizards/jquery.bootstrap.wizard.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
    <script src="<?php echo base_url(); ?>assets/components/forms_wizards/form-wizards.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>

    <script>
        $(document).ready(function() {
                  $('#addForm').on("keyup keypress", function(e) {
  var code = e.keyCode || e.which; 
  if (code  == 13) {               
    e.preventDefault();
    return false;
  }
});
            <?php if($userdetail->pension_status=='yes'){ ?>
                $(".hiddenpension_filed").css('display', 'block');
            $(".pension").css('display', 'block');
        <?php }  
        if($userdetail->medical_status=='yes'){ ?>
             $(".hiddenmedical_filed").css('display', 'block');
            $(".medical").css('display', 'block');
        <?php }  ?>
            $('#error_flag').hide();
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
            $('#addForm').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
              
                    username1: {
                        validators: {
                            notEmpty: {
                                message: 'The First Name is required'
                            }
                        }
                    },
                    employeeId: {
                        validators: {
                            notEmpty: {
                                message: 'The Employee ID is required'
                            }
                        }
                    },
                    emailId: {
                        validators: {
                            notEmpty: {
                                message: 'The Email ID is required'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'The value is not a valid email address'
                            }
                        }
                    },
                    accesslevel: {
                        validators: {
                            notEmpty: {
                                message: 'Please Select Access level'
                            }
                        }
                    },
                    c_tel_no1: {
                        validators: {
                        digits: {
                            message: 'Please enter only numbers.'
                        }
                    }
                    },
                    c_tel_no2: {
                        validators: {
                        digits: {
                            message: 'Please enter only numbers.'
                        }
                    }
                    },
                   
                     homeTel: {
                    validators: {
                        digits: {
                            message: 'Please enter only numbers.'
                        }
                    }
                }, mobileNo: {
                    validators: {
                        digits: {
                            message: 'Please enter only numbers.'
                        }
                    }
                },
                user_image: {
                validators: {
                    file: {
                        extension: 'jpeg,png,jpg',
                        type: 'image/jpeg,image/png,image/jpg',
                        maxSize: 102400,   // 2048 * 1024
                        message: 'Image file format should be jpg or png and file size not more than 100kb.'
                    }
                }
            }
                }
            })

        });


    </script>

   <script language="javascript" type="text/javascript">
       
$(function () {
    $("#user_image").change(function () {
        $("#dvPreview").html("");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        if (regex.test($(this).val().toLowerCase())) {
            if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                $("#dvPreview").show();
                $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
            }
            else {
                if (typeof (FileReader) != "undefined") {
                    $("#dvPreview").show();
                    $("#dvPreview").append("<img />");
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#dvPreview img").attr("src", e.target.result);
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }
        } else {
                    $("#dvPreview").html('<a href="#"><img src="<?php echo base_url(); ?>assets/images/people/80/22.png" class="pull-right thumbnail imgupolad" id="imgupload" alt="Profile" style="margin-top:23px; width:110px; height:110px;"></a>');
                }
    });
});
 function check_emp_id(emp_id,employee_id){
          var request = $.ajax({
            url: CURRENT_URL + '/userdetails/check_emp_id',
            type: "POST",
            data: {emp_id: emp_id,employee_id:employee_id}
        });
        request.done(function (msg) {
           if(msg!=1){
              $('#emp_id_error').text('Emp Id already exist.'); 
              $('#error_flag').text(1);
           }
           else{
              $('#emp_id_error').text(''); 
              $('#error_flag').text(0);
           }
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
        }
        
        
        function check_email_id(emailId,employee_id){
          
          var request = $.ajax({
            url: CURRENT_URL + '/userdetails/check_email_id',
            type: "POST",
            data: {emailId: emailId,employee_id:employee_id},
            dataType: "json"
        });
        request.done(function (msg) {
            if(msg!=1){
             $('#email_id_error').text('Email Id already exist.');  
             $('#error_flag').text(1);
           } 
           else{
              $('#email_id_error').text(''); 
              $('#error_flag').text(0);
           }
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
        }
         function window_back(){
        location.href = document.referrer;
    }
</script>  