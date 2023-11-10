<?php 
$CI =& get_instance();
$CI->load->model('databaseinfo_model');
$type_data = $CI->databaseinfo_model->getTypeOfLicensePermit();

$license_no='';
$license_permit_data1 = $CI->databaseinfo_model->getCorporateDataValues($detail[0]['client_id']);
if(!empty($license_permit_data1)){
$license_no = $license_permit_data1[0]['gbl_license_no'];
}
//echo "<pre>"; print_r($detail); die;
?>
<div id="license_success_msg_edit" class="alert alert-success padding-for-modal" style="display:none;">
                                <button type="button" class="custom_close" >&times;</button>
                                <span class="success-msg">Best check yo self, you're not looking too good.</span>
                            </div>
                            <div id="license_err_msg_edit" class="alert alert-danger padding-for-modal" style="display:none;">
                                <button type="button" class="custom_close" >&times;</button>
                                <span class="error-msg"> Best check yo self, you're not looking too good. </span>
                            </div>    
<form class="form-horizontal" action="<?php echo base_url();?>/client/submit_data" id="edit-license-form"  role="form">
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Type of license</label>
										<div class="col-md-10" style="padding-left:0px;">
											<select class="form-control height_25 plahole_font" id="license-type-show-hide_div_edit" name="license_type" style="width: 100%;">
												<option value="">Select License</option>
                                                                                                <?php foreach ($type_data['license'] as $item) { ?>
                                                                                                    <option value="<?php echo $item['type_id'];?>" <?php if($item['type_id']==$detail[0]['license_type']){?> selected="selected" <?php } ?>><?php echo $item['type_name'];?></option>

                                                                                                <?php } 
                                                                                                ?>
												
											</select>
										</div>
										<div class="col-md-2" style="padding:0px;">
											<a href="#add-more-license-modal-box11" onclick="data_modal_box_license_type('add','add-button-icon_edit','edit-delete-button-icon_edit','edit');" id="add-button-icon_edit" class="btn-xs btn-success pull-right" data-toggle="modal">
											<span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i><span>
											</a>
											<span id="edit-delete-button-icon_edit" style="display:none;">
												<a href="#delete-more-license-modal-box" data-toggle="modal" onclick="data_modal_box_license_type('delete','add-button-icon_edit','edit-delete-button-icon_edit','edit');" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
													<span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
												</a>
												<a href="#edit-more-license-modal-box" data-toggle="modal" onclick="data_modal_box_license_type('edit','add-button-icon_edit','edit-delete-button-icon_edit','edit');" class="btn-xs btn-warning pull-right">
												<span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
												</a>
											</span>
										</div>
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>
										<div class="input-group date stDate">
                                                                                        <input class="form-control height_25 " id="issue_date_edit" name="issue_date" type="text" value="<?php if($detail[0]['issue_date']=="" ||$detail[0]['issue_date']=="0000-00-00 00:00:00"){echo '';}else{echo date('d F Y', strtotime($detail[0]['issue_date']));} ?>">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>
										<div class="input-group date stDate">
                                                                                        <input class="form-control height_25 " name="expiry_date" id="expiry_date_edit" type="text" value="<?php if($detail[0]['expiry_date']=="" ||$detail[0]['expiry_date']=="0000-00-00 00:00:00"){echo '';}else{echo date('d F Y', strtotime($detail[0]['expiry_date']));} ?>">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Licensing conditions</label>
										<input type="text" class="form-control height_25 plahole_font" name="licensing_cond" style="width: 100%;" value="<?php echo $detail[0]['licensing_cond'];?>">
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">License number</label>
                                                                                <input type="text" class="form-control height_25 plahole_font" name="license_no" id="accounting_done_by" style="width: 100%;" value="<?php echo $detail[0]['license_no'];?>">
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="hidden" class="form-control height_25 plahole_font" name="id" id="accounting_done_by" style="width: 100%;" value="<?php echo $detail[0]['license_id'];?>">
                                        <input type="hidden" class="form-control height_25 plahole_font" name="action" id="accounting_done_by" style="width: 100%;" value="edit">

                                        <button type="submit" class="btn btn-success pull-right" >Save</button>
                                        <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                    </div>
                                </div>
                            </form>
<script>
    $(document).ready(function(){
        $('.custom_close').on('click',function(){
            $(this).parent().fadeOut();
        })
        $('.stDate').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		//$('#edit-license-form').bootstrapValidator('revalidateField', 'issue_date');
		//$('#edit-license-form').bootstrapValidator('revalidateField', 'expiry_date');	
	});
        $('#edit-license-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
               license_type: {
                            validators: {
                                    notEmpty: {
                                            message: 'This field is required'
                                    }
                            }
                    },
                    //
//                    issue_date: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#issue_date_edit').val()).getTime();
//                                var input2 = new Date($('#expiry_date_edit').val()).getTime();
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
//                    expiry_date: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than Date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#issue_date_edit').val()).getTime();
//                                var input2 = new Date($('#expiry_date_edit').val()).getTime();
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
        .on('success.form.bv', function (e) {
            e.preventDefault();
            submit_license_form('edit-license-form','edit','<?php echo $detail[0]['license_id'];?>');   
        });
        
        $('#add-button-icon_edit').hide();
        $('#edit-delete-button-icon_edit').show();
        $('#license-type-show-hide_div_edit').on('change', function() {
            if ($('#license-type-show-hide_div_edit').val() == '') {
                $('#add-button-icon_edit').show();
                $('#edit-delete-button-icon_edit').hide();
            } else {
                $('#add-button-icon_edit').hide();
                $('#edit-delete-button-icon_edit').show();

            }
        });
        var cur_date=get_current_date();
        $('.stDate').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        $(this).find('input.stDate').bdatepicker();

    });
</script>