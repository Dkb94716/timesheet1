
<script>
    $(document).ready(function() {
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
        <form  role="form" id="addForm" method="post" enctype="multipart/form-data" action="add_user_data" >
         
            <div class="widget-body">

                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
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
                                                <input class="form-control height_25 plahole_font"  type="text" id="username1" name="username1" placeholder="Name" onFocus="errorFadeOut('usernameVal')">
                                                <small id="usernameVal" class="help-block" style="display:none" data-bv-validator="notEmpty" data-bv-for="username1" data-bv-result="INVALID">The User Name is required</small>
                                            </div>	
                                        </div>
                                        <div class="col-sm-5" style="padding-left: 20px; padding-right: 0px;">
                                            <div class="form-group">
                                                <label class="control-label inputtext_formating" for="fullname">Last Name :</label>
                                                <input class="form-control height_25 plahole_font"  type="text" id="surname" name="surname" placeholder="Surname">
                                            </div>	
                                        </div>
                                    </div>        
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                           


                                            <label class="control-label inputtext_formating" for="fullname">Other Names :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" id="othername" name="othername" placeholder="Other Names">
                                        </div>	
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="password" >Date of Birth :</label>
                                            <div class="input-group date datepicker2">
                                                <input  class="form-control height_25 plahole_font" type="text" placeholder="Date of Birth"  id="dob" name="dob"  style="background-color : #fff;" />
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px;">
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="email">Employee ID <span style="color:#a94442">*</span>:</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="employeeId" name="employeeId" placeholder="Employee ID" onFocus="errorFadeOut('employeeIdVal')">
                                            <small id="employeeIdVal" class="help-block" style="display:none" data-bv-validator="notEmpty" data-bv-for="username1" data-bv-result="INVALID">The Employee ID is required</small>

                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="PlaceOfBirth">Place Of Birth :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="placeOfBirth" name="placeOfBirth" placeholder="Place Of Birth">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px;">
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating"  for="email">Designation :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="designation" name="designation" placeholder="Designation">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="password_confirmation">Occupation :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="occupation" name="occupation" placeholder="Occupation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px;">
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="password">Team :</label>
                                            <select class="form-control height_24 plahole_font" id="team"  name="team">


                                                <?php foreach ($team_detail as $teams) { ?>

                                                    <option value="<?php echo $teams->team_id; ?>"><?php echo $teams->team_name; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="email">City :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="city" name="city" placeholder="City" onFocus="errorFadeOut('cityVal')">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px;">
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="password_confirmation">Department :</label>
                                            <select class="form-control height_24 plahole_font" id="department" name="department">
                                                <?php foreach ($department_detail as $department) { ?>

                                                    <option value="<?php echo $department->department_id; ?>"><?php echo $department->department_name; ?></option>
                                                <?php } ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="password">Country :</label>
                                            <select id="country" name="country" class="form-control height_24 plahole_font" >
                                                <?php foreach ($country_detail as $country) { ?>
                                                    <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
                                                <?php } ?>


                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="padding-left:0px;">
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="password_confirmation">Email <span style="color:#a94442">*</span>:</label>
                                            <input class="form-control height_25 plahole_font" type="Email" name="emailId" id="emailId" placeholder="Email ID" onFocus="errorFadeOut('emailIdVal')">
                                            <small id="emailIdVal" class="help-block" style="display:none;" data-bv-validator="notEmpty" data-bv-for="emailId" data-bv-result="INVALID">User Email is required</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="email">Home Telephone :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="homeTel" name="homeTel" placeholder="Home Telephone No" onFocus="errorFadeOut('homeTelVal')">
                                            <small id="homeTelVal" class="help-block" style="display:none" data-bv-validator="notEmpty" data-bv-for="username1" data-bv-result="INVALID"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px;">
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label class="control-label inputtext_formating" for="password">Gender :</label>
                                            <select id="gender" name="gender" class="form-control height_24 plahole_font">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="email" class="control-label inputtext_formating">Mobile :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="mobileNo" name="mobileNo" placeholder="Mobile No." onFocus="errorFadeOut('mobileNoVal')">
                                            <small id="mobileNoVal" class="help-block" style="display:none" data-bv-validator="notEmpty" data-bv-for="username1" data-bv-result="INVALID"></small>
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
                                                    <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
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
                                                    <option value="<?php echo $role_details->role_id; ?>"><?php echo $role_details->role_name; ?></option>
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
                                                <input  class="form-control height_25 plahole_font" type="text" value="" id="dtJoin" name="dtJoin" placeholder="Date Joining"  style="background-color : #fff;"/>
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="email" class="control-label inputtext_formating">Address :</label>
                                            <textarea rows="5" cols="50" class="form-control height_25 plahole_font" type="textarea" id="address" name="address" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px;">
                                    <div class="col-sm-5" style="padding-left:0px; margin-top:-75px;">
                                        <div class="form-group">
                                            <label for="pro-period" class="control-label inputtext_formating">Probation Period :</label>
                                            <select id="pro_period" name="pro_period" class="form-control height_24 plahole_font">
                                                <option value="">-- select Month --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label for="dtconfirm" class="control-label inputtext_formating">Date of Confirmation :</label>
                                            <div class="input-group date datepicker2">
                                                <input  class="form-control height_25 plahole_font" type="text" value="" id="dtconfirm" name="dtconfirm" placeholder="Date of Confirmation"  style="background-color : #fff;"/>
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="password" class="control-label inputtext_formating">Status :</label>
                                            <select class="form-control height_24 plahole_font" id="status" name="status">
                                                <option value="">Select Status</option>
                                                <option value="2">Occupation permit </option>
                                                <option value="1">Resident</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5" style="padding-left:0px;">
                                        <div class="form-group">
                                            <label for="dtconfirm" class="control-label inputtext_formating">Date Left :</label>
                                            <div class="input-group date datepicker2">
                                                <input  class="form-control height_25 plahole_font" type="text" value="" id="dtLeft" name="dtLeft" placeholder="Date of Confirmation" style="background-color : #fff;"/>
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="password" class="control-label inputtext_formating">Manager :</label>
                                            <select class="form-control height_24 plahole_font" id="manager_id" name="manager_id">
                                                <option value="">Select Status</option>
                                                <?php foreach ($user_detail as $details) { ?>

                                                    <option value="<?php echo $details->id; ?>"><?php echo $details->empName; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-2 col-xs-12">

                                <a href="#"><img src="assets/images/people/80/22.png" class="pull-right thumbnail" id="imgupload" alt="Profile" style="margin-top:23px; width:110px; height:110px;"></a>


                                <form id="upload" method="post" action="php/addupload.php" enctype="multipart/form-data">
                                    <div id="drop">

                                        <a><li class="fa fa-cloud-upload"></li>&nbsp;Upload</a>
                                        <input type="file" name="upl" multiple />
                                    </div>

                                    <ul>
                                        <!-- The file uploads will be shown here -->
                                    </ul>

                                </form>
                            </div> 

                        </div>


                    </div>

                    <div class="tab-pane" id="tab2">
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
                                        <input class="form-control height_25 plahole_font"  type="text"  id="c_name1" name="c_name1" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                    <div class="form-group">
                                        <label for="relation" class="control-label inputtext_formating">Relationship :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="c_relationship1" name="c_relationship1" placeholder="Relationship">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                    <div class="form-group">
                                        <label for="rel-telno" class="control-label inputtext_formating">Tel No :</label>
                                        <input class="form-control height_25 plahole_font" type="text" id="c_tel_no1" name="c_tel_no1" placeholder="Tel No.">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                    <div class="form-group">
                                        <label for="rel-address" class="control-label inputtext_formating">Address :</label>
                                        <textarea rows="4" cols="50" class="form-control height_25 plahole_font" type="text" id="c_address1" placeholder="Address" name="c_address1"></textarea>
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
                                        <input class="form-control height_25 plahole_font"  type="text" name="c_name2" id="c_name2" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                    <div class="form-group" class="control-label inputtext_formating">
                                        <label for="relation" class="control-label inputtext_formating">Relatioship :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" name="c_relationship2"  id="c_relationship2" placeholder="Relatioship">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                    <div class="form-group">
                                        <label for="rel-telno" class="control-label inputtext_formating">Tel No :</label>
                                        <input class="form-control height_25 plahole_font" type="text" id="c_tel_no2" name="c_tel_no2" placeholder="Tel No.">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="padding-left:0px; padding-right:2px;">
                                    <div class="form-group">
                                        <label for="rel-address" class="control-label inputtext_formating">Address :</label>
                                        <textarea rows="4" cols="50" class="form-control height_25 plahole_font" type="text" placeholder="Address" id="c_address2" name="c_address2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3">
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
                                    <input class="form-control height_25 plahole_font"  type="text" id="identity_card_passport" name="identity_card_passport" placeholder="Identity Card/Passport">
                                </div>
                            </div>
                            <!--<div class="col-sm-5">
                                    <div class="form-group">
                                            <label for="cv">CV :</label>
                                            <input class="form-control height_25 plahole_font"  type="text" id="cv" name="cv" placeholder="CV">
                                    </div>
                            </div>-->
                            <div class="col-sm-5" >
                                <div class="form-group">
                                    <label for="edfform" class="control-label inputtext_formating"> EDF forms  :</label>
                                    <input class="form-control height_25 plahole_font"  type="text" id="edf_forms" name="edf_forms" placeholder="EDF forms ">
                                </div>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px;">
                                <div class="form-group">
                                    <label for="otherdocument" class="control-label inputtext_formating">  Other Documents  :</label>
                                    <input class="form-control height_25 plahole_font"  type="text" id="other_documents" name="other_documents" placeholder="Other Documents ">
                                </div>
                            </div>
                            <div class="col-sm-5" >
                                <div class="form-group">
                                    <label for="account" class="control-label inputtext_formating">Bank :</label>
                                    <input class="form-control height_25 plahole_font"  type="text" id="bank_account" name="bank_account" placeholder="Account">
                                </div>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px;">
                                <div class="form-group">
                                    <label for="contract" class="control-label inputtext_formating">Contract :</label>
                                    <input class="form-control height_25 plahole_font"  type="text" id="contract" name="contract" placeholder="Contract">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="password_confirmation"class="control-label inputtext_formating">Driving Licence :</label>
                                    <input class="form-control height_25 plahole_font" type="text" id="driving_licence" name="driving_licence" placeholder="Driving Licence">
                                </div>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px;">
                                <div class="form-group" class="control-label inputtext_formating">
                                    <label for="certificates_memberships">Certificates/Memberships :</label>
                                    <input class="form-control height_25 plahole_font" type="text" id="certificates_memberships" name="certificates_memberships" placeholder="Certificates/Memberships">
                                </div>
                            </div>
                            <div class="col-sm-5" >
                                <div class="form-group">
                                    <label for="Personal_questionnaires" class="control-label inputtext_formating">Personal questionnaires (FSC) :</label>
                                    <input class="form-control height_25 plahole_font" type="text" id="personal_questionnaires_fsc" name="personal_questionnaires_fsc" placeholder="Personal questionnaires (FSC)">
                                </div>
                            </div>
                            <!--<div class="col-sm-5">
                                    <div class="form-group">
                                            <label for="progress_sheet">Study Progress Sheet :</label>
                                            <input class="form-control height_25 plahole_font" type="text" id="study_progress_sheet" name="study_progress_sheet" placeholder="Study Progress Sheet">
                                    </div>
                            </div>-->
                        </div>
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
                            <a href="#nogo" title="Add More" id="add_more_1">    
                                <i class="fa fa-fw icon-add-symbol add_moreiconjobdetail"></i>
                            </a>
                            <div id="addinput">
                                <script>
                                    $('.datepicker2').bdatepicker({
                                        format: "dd MM yyyy",
                                        autoclose: true,
                                        todayBtn: true
                                    });
                                </script>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label for="title1" class="control-label inputtext_formating">Title :</label>
                                        <input class="form-control height_25 plahole_font"  type="text"  name="j_title[]"  placeholder="Title">
                                        <small data-bv-result="INVALID" data-bv-for="username1" data-bv-validator="notEmpty" style="display: none;" class="help-block" id="usernameVal">The title is required</small>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="remarks" class="control-label inputtext_formating">Special Remarks :</label>
                                        <textarea rows="5" cols="50" class="form-control height_25 plahole_font" type="text"  name="j_special_remarks[]" placeholder="Special Remarks "></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left:0px; margin-top:-75px;">
                                    <div class="form-group">
                                        <label for="password" class="control-label inputtext_formating" >Date of Promotion :</label>
                                        <div class="input-group date datepicker2">
                                            <input  class="form-control height_25 plahole_font" type="text" name="j_date_of_promotion[]" placeholder="Date of Promotion"  style="background-color : #fff;" />
                                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>
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
                            <a href="#nogo" title="Add More" id="add_more_2">    
                                <i class="fa fa-fw icon-add-symbol add_moreiconjobdetail"></i>
                            </a>
                            <div id="addinput_2">
                                <script>
                                    $('.datepicker2').bdatepicker({
                                        format: "dd MM yyyy",
                                        autoclose: true,
                                        todayBtn: true
                                    });
                                </script>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label for="CourseName" class="control-label inputtext_formating">Course Name :</label>
                                        <input class="form-control height_25 plahole_font"  type="text"  name="t_course_name[]" placeholder="Course Name">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="relation" class="control-label inputtext_formating">Purpose :</label>
                                        <input class="form-control height_25 plahole_font"  type="text"  name="t_purpose[]" placeholder="Purpose">
                                    </div>
                                </div>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label for="offBy" class="control-label inputtext_formating">Offered By :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" name="t_offered_by[]" placeholder="Offered By">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="relation" class="control-label inputtext_formating">CPD Points :</label>
                                        <input class="form-control height_25 plahole_font"  type="text" id="cpdPoints" name="t_cpd_points[]" placeholder="CPD Points">
                                    </div>
                                </div>
                                <div class="col-sm-10" style="padding-left:0px;">
                                    <div class="col-sm-6" style="padding-left:0px; padding-right:2px;">
                                        <div class="form-group">
                                            <label for="dtCourse" class="control-label inputtext_formating">Date :</label>
                                            <div class="input-group date datepicker2">
                                                <input  class="form-control height_25 plahole_font" type="text" value="" name="t_training_date[]" placeholder="Date of Training"  style="background-color : #fff;"/>
                                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>		
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
                            <a href="#nogo" title="Add More" id="add_more_3">    
                                <i class="fa fa-fw icon-add-symbol add_moreiconjobdetail hiddenpension_filed maging-top-50"></i>
                            </a>
                            <div class="col-sm-10" style="padding-left:0px;">
                                <div class="form-group">
                                    <label for="PensionPlan" style="float:left;">Pension Plan :</label>
                                    <div id="radio_btnuser">														
                                        <input  type="radio" class="radiobtnuser" name="pensionPlan" value="yes" id="pensionyes_radio"> <span style="float:left;">Yes</span>
                                        <input type="radio" class="radiobtnuser" name="pensionPlan" value="no" id="pensionno_radio" checked> <span style="float:left;">No</span>
                                    </div>
                                    <!--<input class="form-control hiddenpension_filed"  type="text" name="i_pension_plan[]" placeholder="Pension Plan" style="float:left;">-->
                                </div>
                            </div>
                            <div id="addinput_3">
                                <script>
                                    $('.datepicker2').bdatepicker({
                                        format: "dd MM yyyy",
                                        autoclose: true,
                                        todayBtn: true
                                    });
                                </script>
                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label class="hiddenpension_filed" for="PensionPlan" style="float:left;">Pension Plan :</label>

                                        <input class="form-control hiddenpension_filed"  type="text" name="i_pension_plan[]" placeholder="Pension Plan" style="float:left;">
                                    </div>
                                </div>

                                <div class="col-sm-5 hiddenpension_filed">
                                    <div class="form-group">
                                        <label for="dtpen">Date Joined :</label>
                                        <div class="input-group date datepicker2">
                                            <input  class="form-control height_25 plahole_font" type="text" name="i_pension_date_joined[]" name="Date Joined" placeholder="Date Joined"  style="background-color : #fff;"/>
                                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>	
                        <div class="col-sm-12" style="padding-left:0px;" id="jobDetailHeader_4">
                            <a href="#nogo" title="Add More" id="add_more_4">    
                                <i class="fa fa-fw icon-add-symbol add_moreiconjobdetail hiddenmedical_filed maging-top-50"></i>
                            </a>
                            <div class="col-sm-10" style="padding-left:0px;">
                                <div class="form-group">
                                    <label for="MedicalPlan" style="float:left;">Medical Plan :</label>
                                    <div id="radio_btnmedical">														
                                        <input type="radio" class="radiobtnuser" name="medicalPlan" value="yes" id="medicalyes_radio"> <span style="float:left;">Yes</span>
                                        <input type="radio" class="radiobtnuser" name="medicalPlan" value="no" id="medicalno_radio" checked> <span style="float:left;">No</span>
                                    </div>

                                </div>
                            </div>
                            <div id="addinput_4">
                                <script>
                                    $('.datepicker2').bdatepicker({
                                        format: "dd MM yyyy",
                                        autoclose: true,
                                        todayBtn: true
                                    });
                                </script>

                                <div class="col-sm-5" style="padding-left:0px;">
                                    <div class="form-group">
                                        <label class="hiddenmedical_filed" for="MedicalPlan" style="float:left;">Medical Plan :</label>

                                        <input class="form-control hiddenmedical_filed"  type="text"  name="i_medical_plan[]" placeholder="Medical Plan" style="float:left;">
                                    </div>
                                </div>
                                <div class="col-sm-5 hiddenmedical_filed">
                                    <div class="form-group">
                                        <label for="dtmed">Date Joined :</label>
                                        <div class="input-group date datepicker2">
                                            <input  class="form-control height_25 plahole_font" type="text"  name="i_medical_date_Joined[]" placeholder="Date Joined"  style="background-color : #fff;"/>
                                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 




                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success pull-right">Save</button>
                                <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                            </div>
                        </div>

                    </div>


                </div>


            </div>

            <!-- Wizard pagination controls -->
            <ul class="pagination margin-bottom-none">
                <li class="primary previous first"><a href="#" class="no-ajaxify">First</a></li>

                <button class=" next primaryno-ajaxify btn btn-success" >Next</button>


            </ul>



            <!-- // Wizard pagination controls END  -->
    </div>
</form>
<script type="text/javascript">

    $('#add_more_1').on('click', function() {
        var inputToCopy = '<div>' + $('#addinput').html() + '</div>';
        $(inputToCopy).appendTo($(this).parent());
        $("#jobDetailHeader > :last-child").find(".col-sm-5").eq(1).after('<i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail" onClick="deleteDiv(this)"></i>');
    });


    function deleteDiv(myDiv) {
        $(myDiv).parent().remove();
    }
    $('#add_more_2').on('click', function() {
        var inputToCopy = '<div>' + $('#addinput_2').html() + '</div>';
        $(inputToCopy).appendTo($(this).parent());
        $("#jobDetailHeader_2 > :last-child").find(".col-sm-5").eq(1).after('<i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail" onClick="deleteDiv(this)"></i>');
    });


    function deleteDiv(myDiv) {
        $(myDiv).parent().remove();
    }
    $('#add_more_3').on('click', function() {
        var inputToCopy = '<div>' + $('#addinput_3').html() + '</div>';
        $(inputToCopy).appendTo($(this).parent());
        $("#jobDetailHeader_3 > :last-child").find(".col-sm-5").eq(1).after('<i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail pension" onClick="deleteDiv(this)"></i>');
        $("#jobDetailHeader_3 > :last-child").find("#radio_btnuser").remove();
    });


    function deleteDiv(myDiv) {
        $(myDiv).parent().remove();
    }
    $('#add_more_4').on('click', function() {
        var inputToCopy = '<div>' + $('#addinput_4').html() + '</div>';

        $(inputToCopy).appendTo($(this).parent());
        $("#jobDetailHeader_4 > :last-child").find(".col-sm-5").eq(1).after('<i class="fa fa-fw icon-delete-symbol pull-right removed_color-jobdetail medical" onClick="deleteDiv(this)"></i>');
        $("#jobDetailHeader_4 > :last-child").find("#radio_btnmedical").remove();
    });


    function deleteDiv(myDiv) {
        $(myDiv).parent().remove();
    }

    $("#pensionyes_radio").on('click', function() {
        $(".hiddenpension_filed").css('display', 'block');
        $(".pension").css('display', 'block');
    });
    $("#pensionno_radio").on('click', function() {
        $(".hiddenpension_filed").css('display', 'none');
        $(".pension").css('display', 'none');

    });
    $("#medicalyes_radio").on('click', function() {
        $(".hiddenmedical_filed").css('display', 'block');
        $(".medical").css('display', 'block');
    });
    $("#medicalno_radio").on('click', function() {
        $(".hiddenmedical_filed").css('display', 'none');
        $(".medical").css('display', 'none');
    });

</script>	

<script src="<?php echo base_url(); ?>assets/plugins/forms_wizards/jquery.bootstrap.wizard.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/components/forms_wizards/form-wizards.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>

<script>
  $(document).ready(function() {

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
                          message: 'The Employee ID is required '
                      }
                  }
              },
              emailId: {
                  validators: {
                      notEmpty: {
                          message: 'The Email ID is required'
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
          }
      })

  });


</script>

