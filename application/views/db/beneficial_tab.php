<?php 
    $CI =& get_instance();
    $CI->load->model('databaseinfo_model');
    $common_data = $CI->databaseinfo_model->getCommonDirector();
?>
<div class="box-generic" style="padding:0px;box-shadow:none;">
    <!-----START Beneficial Sub tab----->
    <div class="tabsbar" style="height:30px;">
        <ul style="height:30px;">
            <li class="camera active" style="height:30px;">
                <a href="#beneficial_owner_individual-tab" data-toggle="tab" style="height:24px;line-height:24px;">Individual</a>
            </li>

            <li class="folder_open" style="height:30px;">
                <a href="#beneficial_owner_corporate-tab" data-toggle="tab" style="height:24px;line-height:24px;">Corporate</a>
            </li>
        </ul>
    </div>

    <div class="tab-content" style="padding-left:11px;padding-right:10px;">

        <!---START beneficial_owner_individual-tab--->
        <div class="tab-pane active" id="beneficial_owner_individual-tab">
            <a href="#add-beneficial-owner-individual-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="bo_individual_data_body">
                
            </div>
        </div>
        <!---END beneficial_owner_individual-tab--->

        <!---START beneficial_owner_corporate-tab--->
        <div class="tab-pane" id="beneficial_owner_corporate-tab">
            <a href="#add-beneficial-owner-corporate-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="bo_corporate_data_body">
                
            </div>
        </div>
        <!---END beneficial_owner_corporate-tab--->
    </div>
    <!-----END Beneficial Sub tab------->
</div>

<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    dynamicTable_bo_individual = 'dynamicTable1';
    dynamicTable_bo_corporate = 'dynamicTable2';
    $(document).ready(function() {
        ready_on_db();
        stuff_on_ready();
        var cur_date = get_current_date();
        $(".stDate").val(cur_date);
        $('.stDate').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        
        $('#director_company_data_edit').change(function(){                    
                        var element = $("option:selected", this);
                        var director_surname = element.attr("data-surname"); 
                        $("#owner_surname").val(director_surname);                      
                     
        });
    });
    function stuff_on_ready() {
        $('#add_authoried_filed-btn').on('click', function(){
				var str='<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Name of authorised persons</label><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv1(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a><input name="person_name[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Address</label><input name="person_address[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Email</label><input name="email[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Phone number</label><input name="phone_no[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;"></div>';
				$( str ).appendTo($('#add_authoried_filed'));
            });
        
        $('.addbtn').on('click',function(){
            $('#add_authoried_filed').children().each(function(i){
                if(i==0 || i==1 || i==2 || i==3){
                } else {
                    $(this).remove();
                }
            });
        });
        
        var core_url = CURRENT_URL;
        // For load default grid.
        var load_data_body1 = "bo_individual_data_body";
        blockUI(load_data_body1);
        var url1 = core_url + "/databaseinfo/get_bo_individual_grid_data";
        grid_data(load_data_body1, url1, dynamicTable_bo_individual);
        
        $('.addbtn').on('click',function(){
            setTimeout(function(){
                $("#add-bo-individual-form").data('bootstrapValidator').resetForm();
                $("#add-bo-corporate-form").data('bootstrapValidator').resetForm();
                
                var cur_date = get_current_date();
                //$(".stDate_current").val(cur_date);
                $('.stDate').bdatepicker({
                    format: "dd MM yyyy",
                    autoclose: true,
                });
                 $('.stDate_bo_i').val('');
                 $('.stDate_bo_c').val('');
               // $('.stDate_bo_i').bdatepicker("update",cur_date);
               // $('.stDate_bo_c').bdatepicker("update",cur_date);
            },200)
//            $("#add-director-individual-form").data('bootstrapValidator').resetForm(); 
            
        });
        
              
        $('#beneficial-owner-passport_show_div').click(function(){
            setTimeout(function(){
                $("#add-bo-individual-form").data('bootstrapValidator').resetForm(); 
            },200)
        });
        $('.stDate_bo_i').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		//$('#add-bo-individual-form24').bootstrapValidator('revalidateField', 'date_of_issue');
		//$('#add-bo-individual-form24').bootstrapValidator('revalidateField', 'date_of_expiry');	
	});
        var validator = $('#add-bo-individual-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                owner_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
//                date_of_issue: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#date_of_issue').val()).getTime();
//                                var input2 = new Date($('#date_of_expiry').val()).getTime();
//                                if(input2!=0 || input1!=0){
//                                    if(input1==0){
//                                        return {
//                                            valid: false,
//                                            message: 'This field is required'
//                                        };
//                                    }
//                                    if(input2!=0){
//                                        if (input2 <= input1) {
//                                            return {
//                                            valid: false,
//                                            message: 'Date of issue should be less than date of expiry'
//                                            };
//                                        } else {
//                                            return true;
//                                        }
//                                    } else {
//                                        return true;
//                                    }
//                                } else {
//                                    return true;
//                                }
//                                
//                            }
//                        }
//                    }
//                },
//                date_of_expiry: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#date_of_issue').val()).getTime();
//                                var input2 = new Date($('#date_of_expiry').val()).getTime();
//                                //console.log(input1);
//                                //console.log(input2);
//                                if(input2!=0 || input1!=0){
//
//                                    if(input2==0){
//                                        return {
//                                            valid: false,
//                                            message: 'This field is required'
//                                        };
//                                    }
//                                    if(input1!=0){
//                                        if (input2 <= input1) {
//                                            return {
//                                            valid: false,
//                                            mstDate_bo_iessage: 'Date of expiry should be greater than date of issue'
//                                        };
//                                        } else {
//                                            return true;
//                                        }
//                                    } else {
//                                            return true;
//                                    }
//                                } else {
//                                    return true;
//                                }
//                            }
//                        }
//                    }
//                }
                //

            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_bo_individual_form('add-bo-individual-form', 'add', '');
        });
        
        /*********START beneficial-owner-passport_show_hide_div yes no radio button**********/
        $("#beneficial-owner-passport_show_div").click(function(){
            $("#beneficial-owner-passport_show_hide_div").slideDown();
        });
        $("#beneficial-owner-passport_hide_div").click(function(){
            $("#beneficial-owner-passport_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-passport_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-cv_show_hide_div yes no radio button**********/
        $("#beneficial-owner-cv_show_div").click(function(){
            $("#beneficial-owner-cv_show_hide_div").slideDown();
        });
        $("#beneficial-owner-cv_hide_div").click(function(){
            $("#beneficial-owner-cv_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-cv_show_hide_div yes no radio button**********/

        /*********START  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/
        $("#beneficial-owner-bank-reference_show_div").click(function(){
            $("#beneficial-owner-bank-reference_show_hide_div").slideDown();
        });
        $("#beneficial-owner-bank-reference_hide_div").click(function(){
            $("#beneficial-owner-bank-reference_show_hide_div").slideUp();
        });
        /***********END  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-proof_add_show_hide_div yes no radio button**********/
        $("#beneficial-owner-proof_add_show_div").click(function(){
            $("#beneficial-owner-proof_add_show_hide_div").slideDown();
        });
        $("#beneficial-owner-proof_add_hide_div").click(function(){
            $("#beneficial-owner-proof_add_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-proof_add_show_hide_div yes no radio button**********/
        
        
        // Corporate
        var load_data_body1 = "bo_corporate_data_body";
        blockUI(load_data_body1);
        var url1 = core_url + "/databaseinfo/get_bo_corporate_grid_data";
        grid_data(load_data_body1, url1, dynamicTable_bo_corporate);
        
        $('#beneficial-owner-passport-2_show_div').click(function(){
            setTimeout(function(){
                $("#add-bo-corporate-form").data('bootstrapValidator').resetForm(); 
            },200)
        });
        $('.stDate_bo_c').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		$('#add-bo-corporate-form').bootstrapValidator('revalidateField', 'date_of_issue');
		$('#add-bo-corporate-form').bootstrapValidator('revalidateField', 'date_of_expiry');	
	});
        var validator = $('#add-bo-corporate-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                name_of_company: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
//                date_of_issue: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#date_of_issue1').val()).getTime();
//                                var input2 = new Date($('#date_of_expiry1').val()).getTime();
//                                if(input2!=0 || input1!=0){
//                                    if(input1==0){
//                                        return {
//                                            valid: false,
//                                            message: 'This field is required'
//                                        };
//                                    }
//                                    if(input2!=0){
//                                        if (input2 <= input1) {
//                                            return {
//                                            valid: false,
//                                            message: 'Date of issue should be less than date of expiry'
//                                            };
//                                        } else {
//                                            return true;
//                                        }
//                                    } else {
//                                        return true;
//                                    }
//                                } else {
//                                    return true;
//                                }
//                                
//                            }
//                        }
//                    }
//                },
//                date_of_expiry: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#date_of_issue1').val()).getTime();
//                                var input2 = new Date($('#date_of_expiry1').val()).getTime();
//                                //console.log(input1);
//                                //console.log(input2);
//                                if(input2!=0 || input1!=0){
//
//                                    if(input2==0){
//                                        return {
//                                            valid: false,
//                                            message: 'This field is required'
//                                        };
//                                    }
//                                    if(input1!=0){
//                                        if (input2 <= input1) {
//                                            return {
//                                            valid: false,
//                                            message: 'Date of expiry should be greater than date of issue'
//                                        };
//                                        } else {
//                                            return true;
//                                        }
//                                    } else {
//                                            return true;
//                                    }
//                                } else {
//                                    return true;
//                                }
//                            }
//                        }
//                    }
//                }
                //

            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_bo_corporate_form('add-bo-corporate-form', 'add', '');
        });
        $("#show_beneficial_owner_dt_reg-meb_btn").click(function(){
            $("#show-hide_beneficial_owner_dt_reg-meb_btn").slideDown();
        });
				
        $("#hide_beneficial_owner_dt_reg-meb_btn").click(function(){
            $("#show-hide_beneficial_owner_dt_reg-meb_btn").slideUp();
        });
    }
    
    function submit_bo_individual_form(form, action, id) {
        var load_data_body = 'bo_individual_data_body';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/submit_bo_individual_form";
        blockUI(load_data_body);
        submit_form(form, load_data_body, url, action, id, function(data) {
            var url = core_url + "/databaseinfo/get_bo_individual_grid_data";
            grid_data(load_data_body, url, dynamicTable_bo_individual);
        });
    }
    
    function edit_beneficial_ind_bar(id) {
        blockUI('bo_individual_edit_bar');
        var load_data_body = 'bo_individual_edit_bar';
        var db_name = 'db_beneficial_individual';
        var db_field_id = 'beneficial_ind_id';
        var tag = 'bo_individual';
        var view_folder = 'Beneficial';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body, url, id, db_name, db_field_id, tag, view_folder)
    }
    
    function delete_beneficial_ind_bar(id){
        var load_data_body = 'bo_individual_data_body';
        var db_name = 'db_beneficial_individual';
        var db_field_id = 'beneficial_ind_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Beneficial Owner Individual Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_bo_individual_grid_data";
        var tag = "Beneficial owner's individual info"
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_bo_individual,tag)
    }
    
    function submit_bo_corporate_form(form, action, id) {
        var load_data_body = 'bo_corporate_data_body';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/submit_bo_corporate_form";
        blockUI(load_data_body);
        submit_form(form, load_data_body, url, action, id, function(data) {
            var url = core_url + "/databaseinfo/get_bo_corporate_grid_data";
            grid_data(load_data_body, url, dynamicTable_bo_corporate);
        });
    }
    
    function edit_beneficial_corp_bar(id) {
        blockUI('bo_corporate_edit_bar');
        var load_data_body = 'bo_corporate_edit_bar';
        var db_name = 'db_beneficial_corporate';
        var db_field_id = 'beneficial_crp_id';
        var tag = 'bo_corporate';
        var view_folder = 'Beneficial';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body, url, id, db_name, db_field_id, tag, view_folder)
    }
    
    function delete_beneficial_corp_bar(id){
        var load_data_body = 'bo_corporate_data_body';
        var db_name = 'db_beneficial_corporate';
        var db_field_id = 'beneficial_crp_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Beneficial Owner Corporate Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_bo_corporate_grid_data";
        var tag = "Beneficial owner's corporate info"
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_bo_corporate,tag)
    }
</script>


<!---------START Add Beneficial Owner Individual Modal box-------->
<div class="modal fade"  id="add-beneficial-owner-individual-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Beneficial Owner Individual</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="add-bo-individual-form"  role="form">
                        <div class="col-md-6">
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;"><strong>Name of beneficial owner</strong></label>
<!--                                <input name="owner_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">-->
                                <div class="col-md-10" style="padding-left:0px;">
                                    <select onclick="fill_common_values_benef_ind(this.value,'');" class="form-control height_25 plahole_font" name="director_list" id="director_company_data_edit" style="width: 100%;">
                                        <option value="">Select shareholder</option>
                                        <?php foreach ($common_data as $item) { ?>
                                            <option  data-surname="<?php echo $item['director_surname']; ?>" value="<?php echo $item['id'];?>" ><?php echo $item['director_name'];?></option>
                                        <?php } 
                                        ?>
                                    </select>
                                    <input name="owner_name" id="director_name" type="hidden" value="">
                                </div>
                            </div>                            
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Surname of shareholder</label><!--
                                      <input name="name_of_shareholder" type="text" class="form-control height_25 plahole_font" style="width: 100%;">-->
                                  <div class="col-md-10" style="padding-left:0px;">                                   
                                  <input name="owner_surname" id="owner_surname" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="" readonly>
                                  </div>
                           </div>   

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>
                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="has_passport" id="beneficial-owner-passport_show_div"> 
                                         Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="has_passport" id="beneficial-owner-passport_hide_div" checked="checked"> 
                                         No
                                    </label> 
                                </div>
                            </div>

                            <div id="beneficial-owner-passport_show_hide_div" style="display:none;">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                                    <input id="passport_no" name="passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                                    <select id="country_of_issue" name="country_of_issue" class="form-control plahole_font" style="width: 100%;">
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>

                                   
                                        <input id="date_of_issue" name="date_of_issue" class="form-control height_25 stDate_current" type="text">
                                      
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                                    
                                        <input id="date_of_expiry" name="date_of_expiry" class="form-control height_25 stDate_current" type="text">
                                       
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">CV</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="has_cv" id="beneficial-owner-cv_show_div"> 
                                         Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="has_cv" id="beneficial-owner-cv_hide_div" checked="checked"> 
                                         No
                                    </label> 
                                </div>
                            </div>	

                            <div class="form-group td-area-form-marg" id="beneficial-owner-cv_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Date received</label>

                                
                                    <input id="recieved_date" name="recieved_date" class="form-control height_25 stDate_current" type="text">
                                   
                            </div>
                        </div>
                        <div class="col-md-6">	
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_bank_ref" id="beneficial-owner-bank-reference_show_div"> 
                                         Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_bank_ref" id="beneficial-owner-bank-reference_hide_div" checked="checked"> 
                                         No
                                    </label> 
                                </div>
                            </div>

                            <div id="beneficial-owner-bank-reference_show_hide_div" style="display:none;">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Bank</label>
                                    <input id="accounting_done_by" name="bank_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>

                                   
                                        <input id="date" name="date" class="form-control height_25 stDate_current" type="text">
                                        
                                </div>
                            </div>    

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="has_address_proof" id="beneficial-owner-proof_add_show_div"> 
                                         Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="has_address_proof" id="beneficial-owner-proof_add_hide_div" checked="checked"> 
                                         No
                                    </label> 
                                </div>

                            </div>

                            <div id="beneficial-owner-proof_add_show_hide_div" style="display:none;">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                    <textarea id="address_detail" name="address" style="width:100%;resize:vertical;" class="readonly"></textarea>
                                </div>
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                    <select id="country" name="country" class="form-control plahole_font" style="width: 100%;">
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                                    
                                        <input id="address_proof_date" name="address_proof_date" class="form-control height_25 stDate_current" type="text">
                                        
                                </div>

                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
                                <textarea id="other_detail" name="other_detail" style="width:100%;resize:vertical;" class="readonly"></textarea>
                            </div>
                            
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">NIC</label>
                                        <textarea id="nic_remark" name="nic_remark" style="width:100%;resize:vertical;" class="readonly" readonly> </textarea>
                            </div>
                            
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Certification of KYC</label>
                                <textarea name="remark" style="width:100%;resize:vertical;"></textarea>
                            </div>
                            
                        </div>	
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden"  name="id" id="" style="width: 100%;" value="">
                                <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                
                                <input type="hidden" id="hp"  name="has_passport"  value="">
                                <input type="hidden" id="hc"  name="has_cv"  value="">
                                <input type="hidden" id="hbr"  name="is_bank_ref"  value="">
                                <input type="hidden" id="iap"  name="has_address_proof"  value="">
                                
                                <input type="hidden" id="coi"  name="country_of_issue"  value="">
                                <input type="hidden" id="co"  name="country"  value="">
                                
                                <button type="submit" class="btn btn-success pull-right">Save</button>
                                <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- // Modal body END -->
        </div>
    </div>
</div>
<!---------END Add Beneficial Owner Individual Modal box---------->

<!---------START Add Beneficial Owner Individual Modal box-------->
<div class="modal fade"  id="edit-beneficial-owner-individual-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"> Edit Beneficial Owner Individual </h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;" id="bo_individual_edit_bar">
                    
                </div>
            </div>
            <!-- // Modal body END -->
        </div>
    </div>
</div>
<!---------END Add Beneficial Owner Individual Modal box---------->

<!---------START Add Beneficial Owner Corporate Modal box-------->
      <div class="modal fade"  id="add-beneficial-owner-corporate-modal-box">
          <div class="modal-dialog modal_box_custome_size">
              <div class="modal-content">
                  <!-- Modal heading -->
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h3 class="modal-title">Add Beneficial Owner Corporate</h3>
                  </div>
                  <!-- // Modal heading END -->

                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="innerLR" style="padding:0;">
                          <form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="add-bo-corporate-form"  role="form">
                              <div class="col-md-6">	
                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;"><strong>Name of company</strong></label>
                                      <input name="name_of_company" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Registered in</label>
                                      <input name="registered_in" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Date of incorporation:</label>
                                      <div class="input-group date stDate col-sm-12">
                                          <input name="date_of_incorp" class="form-control height_25 stDate_current" type="text">
                                          <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                      <label class="client-detailes-sub_heading" style="width:100%;"><strong>KYC documents on corporate beneficial owner </strong></label>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Certificate of incorporation dated</label>
                                      <div class="input-group date stDate col-sm-12">
                                          <input name="date_of_certification_of_incorp" class="form-control height_25 stDate_current" type="text">
                                          <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Type of company</label>
                                      <input name="type_of_company"  type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Register of members</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" class="radioYesBtn" name="is_member_register" id="show_beneficial_owner_dt_reg-meb_btn"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" class="radioNoBtn" name="is_member_register" id="hide_beneficial_owner_dt_reg-meb_btn" checked="checked"> 
                                              No
                                          </label> 
                                      </div>
                                  </div>
                                  <div class="form-group td-area-form-marg" id="show-hide_beneficial_owner_dt_reg-meb_btn" style="margin-bottom:10px !important;display:none;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Date of member of directors</label>
                                      <div class="input-group date stDate col-sm-12" style="margin-bottom:10px !important;">
                                          <input name="member_register_date" class="form-control height_25 stDate_current" type="text">
                                          <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Register of directors</label>

                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" class="radioYesBtn" name="is_director_register" id="register_of_directors_show_div"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" class="radioNoBtn" name="is_director_register" id="register_of_directors_hide_div" checked="checked"> 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" id="register_of_directors_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Date of register of directors</label>
                                      <div class="input-group date stDate col-sm-12">
                                          <input name="director_register_date" class="form-control height_25 stDate_current" type="text">
                                          <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
                                      <input name="represented_by" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                  </div>	

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" class="radioYesBtn" name="is_passport" id="beneficial-owner-passport-2_show_div"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" class="radioNoBtn" name="is_passport" id="beneficial-owner-passport-2_hide_div" checked="checked"> 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div id="beneficial-owner-passport-2_show_hide_div" style="display:none;">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                                          <input name="passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                      </div>
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                                          <select name="country_of_issue" class="form-control plahole_font" style="width: 100%;">
                                              <option value="AF">Afghanistan</option>
                                              <option value="AX">Åland Islands</option>
                                              <option value="AL">Albania</option>
                                              <option value="DZ">Algeria</option>
                                              <option value="AS">American Samoa</option>
                                              <option value="AD">Andorra</option>
                                              <option value="AO">Angola</option>
                                              <option value="AI">Anguilla</option>
                                              <option value="AQ">Antarctica</option>
                                              <option value="AG">Antigua and Barbuda</option>
                                              <option value="AR">Argentina</option>
                                              <option value="AM">Armenia</option>
                                              <option value="AW">Aruba</option>
                                              <option value="AU">Australia</option>
                                              <option value="AT">Austria</option>
                                              <option value="AZ">Azerbaijan</option>
                                              <option value="BS">Bahamas</option>
                                              <option value="BH">Bahrain</option>
                                              <option value="BD">Bangladesh</option>
                                              <option value="BB">Barbados</option>
                                              <option value="BY">Belarus</option>
                                              <option value="BE">Belgium</option>
                                              <option value="BZ">Belize</option>
                                              <option value="BJ">Benin</option>
                                              <option value="BM">Bermuda</option>
                                              <option value="BT">Bhutan</option>
                                              <option value="BO">Bolivia, Plurinational State of</option>
                                              <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                              <option value="BA">Bosnia and Herzegovina</option>
                                              <option value="BW">Botswana</option>
                                              <option value="BV">Bouvet Island</option>
                                              <option value="BR">Brazil</option>
                                              <option value="IO">British Indian Ocean Territory</option>
                                              <option value="BN">Brunei Darussalam</option>
                                              <option value="BG">Bulgaria</option>
                                              <option value="BF">Burkina Faso</option>
                                              <option value="BI">Burundi</option>
                                              <option value="KH">Cambodia</option>
                                              <option value="CM">Cameroon</option>
                                              <option value="CA">Canada</option>
                                              <option value="CV">Cape Verde</option>
                                              <option value="KY">Cayman Islands</option>
                                              <option value="CF">Central African Republic</option>
                                              <option value="TD">Chad</option>
                                              <option value="CL">Chile</option>
                                              <option value="CN">China</option>
                                              <option value="CX">Christmas Island</option>
                                              <option value="CC">Cocos (Keeling) Islands</option>
                                              <option value="CO">Colombia</option>
                                              <option value="KM">Comoros</option>
                                              <option value="CG">Congo</option>
                                              <option value="CD">Congo, the Democratic Republic of the</option>
                                              <option value="CK">Cook Islands</option>
                                              <option value="CR">Costa Rica</option>
                                              <option value="CI">Côte d'Ivoire</option>
                                              <option value="HR">Croatia</option>
                                              <option value="CU">Cuba</option>
                                              <option value="CW">Curaçao</option>
                                              <option value="CY">Cyprus</option>
                                              <option value="CZ">Czech Republic</option>
                                              <option value="DK">Denmark</option>
                                              <option value="DJ">Djibouti</option>
                                              <option value="DM">Dominica</option>
                                              <option value="DO">Dominican Republic</option>
                                              <option value="EC">Ecuador</option>
                                              <option value="EG">Egypt</option>
                                              <option value="SV">El Salvador</option>
                                              <option value="GQ">Equatorial Guinea</option>
                                              <option value="ER">Eritrea</option>
                                              <option value="EE">Estonia</option>
                                              <option value="ET">Ethiopia</option>
                                              <option value="FK">Falkland Islands (Malvinas)</option>
                                              <option value="FO">Faroe Islands</option>
                                              <option value="FJ">Fiji</option>
                                              <option value="FI">Finland</option>
                                              <option value="FR">France</option>
                                              <option value="GF">French Guiana</option>
                                              <option value="PF">French Polynesia</option>
                                              <option value="TF">French Southern Territories</option>
                                              <option value="GA">Gabon</option>
                                              <option value="GM">Gambia</option>
                                              <option value="GE">Georgia</option>
                                              <option value="DE">Germany</option>
                                              <option value="GH">Ghana</option>
                                              <option value="GI">Gibraltar</option>
                                              <option value="GR">Greece</option>
                                              <option value="GL">Greenland</option>
                                              <option value="GD">Grenada</option>
                                              <option value="GP">Guadeloupe</option>
                                              <option value="GU">Guam</option>
                                              <option value="GT">Guatemala</option>
                                              <option value="GG">Guernsey</option>
                                              <option value="GN">Guinea</option>
                                              <option value="GW">Guinea-Bissau</option>
                                              <option value="GY">Guyana</option>
                                              <option value="HT">Haiti</option>
                                              <option value="HM">Heard Island and McDonald Islands</option>
                                              <option value="VA">Holy See (Vatican City State)</option>
                                              <option value="HN">Honduras</option>
                                              <option value="HK">Hong Kong</option>
                                              <option value="HU">Hungary</option>
                                              <option value="IS">Iceland</option>
                                              <option value="IN">India</option>
                                              <option value="ID">Indonesia</option>
                                              <option value="IR">Iran, Islamic Republic of</option>
                                              <option value="IQ">Iraq</option>
                                              <option value="IE">Ireland</option>
                                              <option value="IM">Isle of Man</option>
                                              <option value="IL">Israel</option>
                                              <option value="IT">Italy</option>
                                              <option value="JM">Jamaica</option>
                                              <option value="JP">Japan</option>
                                              <option value="JE">Jersey</option>
                                              <option value="JO">Jordan</option>
                                              <option value="KZ">Kazakhstan</option>
                                              <option value="KE">Kenya</option>
                                              <option value="KI">Kiribati</option>
                                              <option value="KP">Korea, Democratic People's Republic of</option>
                                              <option value="KR">Korea, Republic of</option>
                                              <option value="KW">Kuwait</option>
                                              <option value="KG">Kyrgyzstan</option>
                                              <option value="LA">Lao People's Democratic Republic</option>
                                              <option value="LV">Latvia</option>
                                              <option value="LB">Lebanon</option>
                                              <option value="LS">Lesotho</option>
                                              <option value="LR">Liberia</option>
                                              <option value="LY">Libya</option>
                                              <option value="LI">Liechtenstein</option>
                                              <option value="LT">Lithuania</option>
                                              <option value="LU">Luxembourg</option>
                                              <option value="MO">Macao</option>
                                              <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                              <option value="MG">Madagascar</option>
                                              <option value="MW">Malawi</option>
                                              <option value="MY">Malaysia</option>
                                              <option value="MV">Maldives</option>
                                              <option value="ML">Mali</option>
                                              <option value="MT">Malta</option>
                                              <option value="MH">Marshall Islands</option>
                                              <option value="MQ">Martinique</option>
                                              <option value="MR">Mauritania</option>
                                              <option value="MU">Mauritius</option>
                                              <option value="YT">Mayotte</option>
                                              <option value="MX">Mexico</option>
                                              <option value="FM">Micronesia, Federated States of</option>
                                              <option value="MD">Moldova, Republic of</option>
                                              <option value="MC">Monaco</option>
                                              <option value="MN">Mongolia</option>
                                              <option value="ME">Montenegro</option>
                                              <option value="MS">Montserrat</option>
                                              <option value="MA">Morocco</option>
                                              <option value="MZ">Mozambique</option>
                                              <option value="MM">Myanmar</option>
                                              <option value="NA">Namibia</option>
                                              <option value="NR">Nauru</option>
                                              <option value="NP">Nepal</option>
                                              <option value="NL">Netherlands</option>
                                              <option value="NC">New Caledonia</option>
                                              <option value="NZ">New Zealand</option>
                                              <option value="NI">Nicaragua</option>
                                              <option value="NE">Niger</option>
                                              <option value="NG">Nigeria</option>
                                              <option value="NU">Niue</option>
                                              <option value="NF">Norfolk Island</option>
                                              <option value="MP">Northern Mariana Islands</option>
                                              <option value="NO">Norway</option>
                                              <option value="OM">Oman</option>
                                              <option value="PK">Pakistan</option>
                                              <option value="PW">Palau</option>
                                              <option value="PS">Palestinian Territory, Occupied</option>
                                              <option value="PA">Panama</option>
                                              <option value="PG">Papua New Guinea</option>
                                              <option value="PY">Paraguay</option>
                                              <option value="PE">Peru</option>
                                              <option value="PH">Philippines</option>
                                              <option value="PN">Pitcairn</option>
                                              <option value="PL">Poland</option>
                                              <option value="PT">Portugal</option>
                                              <option value="PR">Puerto Rico</option>
                                              <option value="QA">Qatar</option>
                                              <option value="RE">Réunion</option>
                                              <option value="RO">Romania</option>
                                              <option value="RU">Russian Federation</option>
                                              <option value="RW">Rwanda</option>
                                              <option value="BL">Saint Barthélemy</option>
                                              <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                              <option value="KN">Saint Kitts and Nevis</option>
                                              <option value="LC">Saint Lucia</option>
                                              <option value="MF">Saint Martin (French part)</option>
                                              <option value="PM">Saint Pierre and Miquelon</option>
                                              <option value="VC">Saint Vincent and the Grenadines</option>
                                              <option value="WS">Samoa</option>
                                              <option value="SM">San Marino</option>
                                              <option value="ST">Sao Tome and Principe</option>
                                              <option value="SA">Saudi Arabia</option>
                                              <option value="SN">Senegal</option>
                                              <option value="RS">Serbia</option>
                                              <option value="SC">Seychelles</option>
                                              <option value="SL">Sierra Leone</option>
                                              <option value="SG">Singapore</option>
                                              <option value="SX">Sint Maarten (Dutch part)</option>
                                              <option value="SK">Slovakia</option>
                                              <option value="SI">Slovenia</option>
                                              <option value="SB">Solomon Islands</option>
                                              <option value="SO">Somalia</option>
                                              <option value="ZA">South Africa</option>
                                              <option value="GS">South Georgia and the South Sandwich Islands</option>
                                              <option value="SS">South Sudan</option>
                                              <option value="ES">Spain</option>
                                              <option value="LK">Sri Lanka</option>
                                              <option value="SD">Sudan</option>
                                              <option value="SR">Suriname</option>
                                              <option value="SJ">Svalbard and Jan Mayen</option>
                                              <option value="SZ">Swaziland</option>
                                              <option value="SE">Sweden</option>
                                              <option value="CH">Switzerland</option>
                                              <option value="SY">Syrian Arab Republic</option>
                                              <option value="TW">Taiwan, Province of China</option>
                                              <option value="TJ">Tajikistan</option>
                                              <option value="TZ">Tanzania, United Republic of</option>
                                              <option value="TH">Thailand</option>
                                              <option value="TL">Timor-Leste</option>
                                              <option value="TG">Togo</option>
                                              <option value="TK">Tokelau</option>
                                              <option value="TO">Tonga</option>
                                              <option value="TT">Trinidad and Tobago</option>
                                              <option value="TN">Tunisia</option>
                                              <option value="TR">Turkey</option>
                                              <option value="TM">Turkmenistan</option>
                                              <option value="TC">Turks and Caicos Islands</option>
                                              <option value="TV">Tuvalu</option>
                                              <option value="UG">Uganda</option>
                                              <option value="UA">Ukraine</option>
                                              <option value="AE">United Arab Emirates</option>
                                              <option value="GB">United Kingdom</option>
                                              <option value="US">United States</option>
                                              <option value="UM">United States Minor Outlying Islands</option>
                                              <option value="UY">Uruguay</option>
                                              <option value="UZ">Uzbekistan</option>
                                              <option value="VU">Vanuatu</option>
                                              <option value="VE">Venezuela, Bolivarian Republic of</option>
                                              <option value="VN">Viet Nam</option>
                                              <option value="VG">Virgin Islands, British</option>
                                              <option value="VI">Virgin Islands, U.S.</option>
                                              <option value="WF">Wallis and Futuna</option>
                                              <option value="EH">Western Sahara</option>
                                              <option value="YE">Yemen</option>
                                              <option value="ZM">Zambia</option>
                                              <option value="ZW">Zimbabwe</option>
                                          </select>
                                      </div>

                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>

                                          <div class="input-group date stDate_bo_c">
                                              <input id="date_of_issue1" name="date_of_issue" class="form-control height_25 stDate_current" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>

                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                                          <div class="input-group date stDate_bo_c">
                                              <input id="date_of_expiry1" name="date_of_expiry" class="form-control height_25 stDate_current" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" class="radioYesBtn" name="is_bank_ref" id="beneficial-owner-bank-reference-2_show_div"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" class="radioNoBtn" name="is_bank_ref" id="beneficial-owner-bank-reference-2_hide_div" checked="checked"> 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div id="beneficial-owner-bank-reference-2_show_hide_div" style="display:none;">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Name of bank </label>
                                          <input name="name_of_bank" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                      </div>
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                                          <div class="input-group date stDate col-sm-12">
                                              <input name="date" class="form-control height_25 stDate_current" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" class="radioYesBtn" name="is_address_proof" id="beneficial-owner-proof_add-2_show_div"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" class="radioNoBtn" name="is_address_proof" id="beneficial-owner-proof_add-2_hide_div" checked="checked"> 
                                              No
                                          </label> 
                                      </div>

                                  </div>

                                  <div id="beneficial-owner-proof_add-2_show_hide_div" style="display:none;">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                          <textarea name="address" style="width:100%;resize:vertical;"></textarea>
                                      </div>
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                          <select name="country" class="form-control plahole_font" style="width: 100%;">
                                              <option value="AF">Afghanistan</option>
                                              <option value="AX">Åland Islands</option>
                                              <option value="AL">Albania</option>
                                              <option value="DZ">Algeria</option>
                                              <option value="AS">American Samoa</option>
                                              <option value="AD">Andorra</option>
                                              <option value="AO">Angola</option>
                                              <option value="AI">Anguilla</option>
                                              <option value="AQ">Antarctica</option>
                                              <option value="AG">Antigua and Barbuda</option>
                                              <option value="AR">Argentina</option>
                                              <option value="AM">Armenia</option>
                                              <option value="AW">Aruba</option>
                                              <option value="AU">Australia</option>
                                              <option value="AT">Austria</option>
                                              <option value="AZ">Azerbaijan</option>
                                              <option value="BS">Bahamas</option>
                                              <option value="BH">Bahrain</option>
                                              <option value="BD">Bangladesh</option>
                                              <option value="BB">Barbados</option>
                                              <option value="BY">Belarus</option>
                                              <option value="BE">Belgium</option>
                                              <option value="BZ">Belize</option>
                                              <option value="BJ">Benin</option>
                                              <option value="BM">Bermuda</option>
                                              <option value="BT">Bhutan</option>
                                              <option value="BO">Bolivia, Plurinational State of</option>
                                              <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                              <option value="BA">Bosnia and Herzegovina</option>
                                              <option value="BW">Botswana</option>
                                              <option value="BV">Bouvet Island</option>
                                              <option value="BR">Brazil</option>
                                              <option value="IO">British Indian Ocean Territory</option>
                                              <option value="BN">Brunei Darussalam</option>
                                              <option value="BG">Bulgaria</option>
                                              <option value="BF">Burkina Faso</option>
                                              <option value="BI">Burundi</option>
                                              <option value="KH">Cambodia</option>
                                              <option value="CM">Cameroon</option>
                                              <option value="CA">Canada</option>
                                              <option value="CV">Cape Verde</option>
                                              <option value="KY">Cayman Islands</option>
                                              <option value="CF">Central African Republic</option>
                                              <option value="TD">Chad</option>
                                              <option value="CL">Chile</option>
                                              <option value="CN">China</option>
                                              <option value="CX">Christmas Island</option>
                                              <option value="CC">Cocos (Keeling) Islands</option>
                                              <option value="CO">Colombia</option>
                                              <option value="KM">Comoros</option>
                                              <option value="CG">Congo</option>
                                              <option value="CD">Congo, the Democratic Republic of the</option>
                                              <option value="CK">Cook Islands</option>
                                              <option value="CR">Costa Rica</option>
                                              <option value="CI">Côte d'Ivoire</option>
                                              <option value="HR">Croatia</option>
                                              <option value="CU">Cuba</option>
                                              <option value="CW">Curaçao</option>
                                              <option value="CY">Cyprus</option>
                                              <option value="CZ">Czech Republic</option>
                                              <option value="DK">Denmark</option>
                                              <option value="DJ">Djibouti</option>
                                              <option value="DM">Dominica</option>
                                              <option value="DO">Dominican Republic</option>
                                              <option value="EC">Ecuador</option>
                                              <option value="EG">Egypt</option>
                                              <option value="SV">El Salvador</option>
                                              <option value="GQ">Equatorial Guinea</option>
                                              <option value="ER">Eritrea</option>
                                              <option value="EE">Estonia</option>
                                              <option value="ET">Ethiopia</option>
                                              <option value="FK">Falkland Islands (Malvinas)</option>
                                              <option value="FO">Faroe Islands</option>
                                              <option value="FJ">Fiji</option>
                                              <option value="FI">Finland</option>
                                              <option value="FR">France</option>
                                              <option value="GF">French Guiana</option>
                                              <option value="PF">French Polynesia</option>
                                              <option value="TF">French Southern Territories</option>
                                              <option value="GA">Gabon</option>
                                              <option value="GM">Gambia</option>
                                              <option value="GE">Georgia</option>
                                              <option value="DE">Germany</option>
                                              <option value="GH">Ghana</option>
                                              <option value="GI">Gibraltar</option>
                                              <option value="GR">Greece</option>
                                              <option value="GL">Greenland</option>
                                              <option value="GD">Grenada</option>
                                              <option value="GP">Guadeloupe</option>
                                              <option value="GU">Guam</option>
                                              <option value="GT">Guatemala</option>
                                              <option value="GG">Guernsey</option>
                                              <option value="GN">Guinea</option>
                                              <option value="GW">Guinea-Bissau</option>
                                              <option value="GY">Guyana</option>
                                              <option value="HT">Haiti</option>
                                              <option value="HM">Heard Island and McDonald Islands</option>
                                              <option value="VA">Holy See (Vatican City State)</option>
                                              <option value="HN">Honduras</option>
                                              <option value="HK">Hong Kong</option>
                                              <option value="HU">Hungary</option>
                                              <option value="IS">Iceland</option>
                                              <option value="IN">India</option>
                                              <option value="ID">Indonesia</option>
                                              <option value="IR">Iran, Islamic Republic of</option>
                                              <option value="IQ">Iraq</option>
                                              <option value="IE">Ireland</option>
                                              <option value="IM">Isle of Man</option>
                                              <option value="IL">Israel</option>
                                              <option value="IT">Italy</option>
                                              <option value="JM">Jamaica</option>
                                              <option value="JP">Japan</option>
                                              <option value="JE">Jersey</option>
                                              <option value="JO">Jordan</option>
                                              <option value="KZ">Kazakhstan</option>
                                              <option value="KE">Kenya</option>
                                              <option value="KI">Kiribati</option>
                                              <option value="KP">Korea, Democratic People's Republic of</option>
                                              <option value="KR">Korea, Republic of</option>
                                              <option value="KW">Kuwait</option>
                                              <option value="KG">Kyrgyzstan</option>
                                              <option value="LA">Lao People's Democratic Republic</option>
                                              <option value="LV">Latvia</option>
                                              <option value="LB">Lebanon</option>
                                              <option value="LS">Lesotho</option>
                                              <option value="LR">Liberia</option>
                                              <option value="LY">Libya</option>
                                              <option value="LI">Liechtenstein</option>
                                              <option value="LT">Lithuania</option>
                                              <option value="LU">Luxembourg</option>
                                              <option value="MO">Macao</option>
                                              <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                              <option value="MG">Madagascar</option>
                                              <option value="MW">Malawi</option>
                                              <option value="MY">Malaysia</option>
                                              <option value="MV">Maldives</option>
                                              <option value="ML">Mali</option>
                                              <option value="MT">Malta</option>
                                              <option value="MH">Marshall Islands</option>
                                              <option value="MQ">Martinique</option>
                                              <option value="MR">Mauritania</option>
                                              <option value="MU">Mauritius</option>
                                              <option value="YT">Mayotte</option>
                                              <option value="MX">Mexico</option>
                                              <option value="FM">Micronesia, Federated States of</option>
                                              <option value="MD">Moldova, Republic of</option>
                                              <option value="MC">Monaco</option>
                                              <option value="MN">Mongolia</option>
                                              <option value="ME">Montenegro</option>
                                              <option value="MS">Montserrat</option>
                                              <option value="MA">Morocco</option>
                                              <option value="MZ">Mozambique</option>
                                              <option value="MM">Myanmar</option>
                                              <option value="NA">Namibia</option>
                                              <option value="NR">Nauru</option>
                                              <option value="NP">Nepal</option>
                                              <option value="NL">Netherlands</option>
                                              <option value="NC">New Caledonia</option>
                                              <option value="NZ">New Zealand</option>
                                              <option value="NI">Nicaragua</option>
                                              <option value="NE">Niger</option>
                                              <option value="NG">Nigeria</option>
                                              <option value="NU">Niue</option>
                                              <option value="NF">Norfolk Island</option>
                                              <option value="MP">Northern Mariana Islands</option>
                                              <option value="NO">Norway</option>
                                              <option value="OM">Oman</option>
                                              <option value="PK">Pakistan</option>
                                              <option value="PW">Palau</option>
                                              <option value="PS">Palestinian Territory, Occupied</option>
                                              <option value="PA">Panama</option>
                                              <option value="PG">Papua New Guinea</option>
                                              <option value="PY">Paraguay</option>
                                              <option value="PE">Peru</option>
                                              <option value="PH">Philippines</option>
                                              <option value="PN">Pitcairn</option>
                                              <option value="PL">Poland</option>
                                              <option value="PT">Portugal</option>
                                              <option value="PR">Puerto Rico</option>
                                              <option value="QA">Qatar</option>
                                              <option value="RE">Réunion</option>
                                              <option value="RO">Romania</option>
                                              <option value="RU">Russian Federation</option>
                                              <option value="RW">Rwanda</option>
                                              <option value="BL">Saint Barthélemy</option>
                                              <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                              <option value="KN">Saint Kitts and Nevis</option>
                                              <option value="LC">Saint Lucia</option>
                                              <option value="MF">Saint Martin (French part)</option>
                                              <option value="PM">Saint Pierre and Miquelon</option>
                                              <option value="VC">Saint Vincent and the Grenadines</option>
                                              <option value="WS">Samoa</option>
                                              <option value="SM">San Marino</option>
                                              <option value="ST">Sao Tome and Principe</option>
                                              <option value="SA">Saudi Arabia</option>
                                              <option value="SN">Senegal</option>
                                              <option value="RS">Serbia</option>
                                              <option value="SC">Seychelles</option>
                                              <option value="SL">Sierra Leone</option>
                                              <option value="SG">Singapore</option>
                                              <option value="SX">Sint Maarten (Dutch part)</option>
                                              <option value="SK">Slovakia</option>
                                              <option value="SI">Slovenia</option>
                                              <option value="SB">Solomon Islands</option>
                                              <option value="SO">Somalia</option>
                                              <option value="ZA">South Africa</option>
                                              <option value="GS">South Georgia and the South Sandwich Islands</option>
                                              <option value="SS">South Sudan</option>
                                              <option value="ES">Spain</option>
                                              <option value="LK">Sri Lanka</option>
                                              <option value="SD">Sudan</option>
                                              <option value="SR">Suriname</option>
                                              <option value="SJ">Svalbard and Jan Mayen</option>
                                              <option value="SZ">Swaziland</option>
                                              <option value="SE">Sweden</option>
                                              <option value="CH">Switzerland</option>
                                              <option value="SY">Syrian Arab Republic</option>
                                              <option value="TW">Taiwan, Province of China</option>
                                              <option value="TJ">Tajikistan</option>
                                              <option value="TZ">Tanzania, United Republic of</option>
                                              <option value="TH">Thailand</option>
                                              <option value="TL">Timor-Leste</option>
                                              <option value="TG">Togo</option>
                                              <option value="TK">Tokelau</option>
                                              <option value="TO">Tonga</option>
                                              <option value="TT">Trinidad and Tobago</option>
                                              <option value="TN">Tunisia</option>
                                              <option value="TR">Turkey</option>
                                              <option value="TM">Turkmenistan</option>
                                              <option value="TC">Turks and Caicos Islands</option>
                                              <option value="TV">Tuvalu</option>
                                              <option value="UG">Uganda</option>
                                              <option value="UA">Ukraine</option>
                                              <option value="AE">United Arab Emirates</option>
                                              <option value="GB">United Kingdom</option>
                                              <option value="US">United States</option>
                                              <option value="UM">United States Minor Outlying Islands</option>
                                              <option value="UY">Uruguay</option>
                                              <option value="UZ">Uzbekistan</option>
                                              <option value="VU">Vanuatu</option>
                                              <option value="VE">Venezuela, Bolivarian Republic of</option>
                                              <option value="VN">Viet Nam</option>
                                              <option value="VG">Virgin Islands, British</option>
                                              <option value="VI">Virgin Islands, U.S.</option>
                                              <option value="WF">Wallis and Futuna</option>
                                              <option value="EH">Western Sahara</option>
                                              <option value="YE">Yemen</option>
                                              <option value="ZM">Zambia</option>
                                              <option value="ZW">Zimbabwe</option>
                                          </select>
                                      </div>
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                                          <div class="input-group date stDate col-sm-12">
                                              <input name="address_proof_date" class="form-control height_25 stDate_current" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>

                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Corporate profile</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" class="radioYesBtn" name="is_corporate_profile"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" class="radioNoBtn" name="is_corporate_profile" checked="checked"> 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Audited accounts</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" class="radioYesBtn" name="is_audited_account" id="beneficial-owner-audited-accounts_show_div"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" class="radioNoBtn" name="is_audited_account" id="beneficial-owner-audited-accounts_hide_div" checked="checked"> 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div id="beneficial-owner-audited-accounts_show_hide_div" style="display:none;">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date of financial year end</label>
                                          <div class="input-group date stDate col-sm-12">
                                              <input name="date_of_finantial_year_end" class="form-control height_25 stDate_current" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                      <textarea name="remarks" style="width:100%;resize:vertical;"></textarea>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                      <label class="client-detailes-sub_heading" style="width:90%;"><strong>Authorised persons as per company formation document</strong></label>
                                      <a href="#" id="add_authoried_filed-btn" class="btn-xs btn-success pull-right" data-toggle="modal">
                                          <span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></span>	
                                      </a>
                                  </div>
                                  <div id="add_authoried_filed">	
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Name of authorised persons</label>
                                          <input name="person_name[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                      </div>

                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                          <input name="person_address[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                      </div>

                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Email</label>
                                          <input name="email[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                      </div>

                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Phone number</label>
                                          <input name="phone_no[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                    <input type="hidden"  name="id" id="" style="width: 100%;" value="">
                                    <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                    <button type="submit" class="btn btn-success pull-right">Save</button>
                                    <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
                  <!-- // Modal body END -->
              </div>
          </div>
      </div>
      <!---------END Add Beneficial Owner Corporate Modal box---------->
      
      <!---------START Edit Beneficial Owner Corporate Modal box-------->
      <div class="modal fade"  id="edit-beneficial-owner-corporate-modal-box">
          <div class="modal-dialog modal_box_custome_size">
              <div class="modal-content">
                  <!-- Modal heading -->
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h3 class="modal-title">Edit Beneficial Owner Corporate</h3>
                  </div>
                  <!-- // Modal heading END -->

                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="innerLR" style="padding:0;" id="bo_corporate_edit_bar" >
                          
                      </div>
                  </div>
                  <!-- // Modal body END -->
              </div>
          </div>
      </div>
      <!---------END edit Beneficial Owner Corporate Modal box---------->










