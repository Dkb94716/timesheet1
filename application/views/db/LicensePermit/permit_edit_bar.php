<?php 
$CI =& get_instance();
$CI->load->model('databaseinfo_model');
$type_data = $CI->databaseinfo_model->getTypeOfLicensePermit();
//echo "<pre>"; print_r($type_data); die;
?>
<div id="permit_success_msg_edit" class="alert alert-success padding-for-modal" style="display:none;">
                                <button type="button" class="custom_close" >&times;</button>
                                <span class="success-msg">Best check yo self, you're not looking too good.</span>
                            </div>
                            <div id="permit_err_msg_edit" class="alert alert-danger padding-for-modal" style="display:none;">
                                <button type="button" class="custom_close" >&times;</button>
                                <span class="error-msg"> Best check yo self, you're not looking too good. </span>
                            </div>
<form class="form-horizontal" action="<?php echo base_url();?>/client/submit_data" id="edit-permit-form" role="form">
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Type of permit</label>
										<div class="col-md-10" style="padding-left:0px;">
											<select class="form-control height_25 plahole_font" name="permit_type" id="permit-type-show-hide_div_edit" style="width: 100%;">
												<option value="">Select Permit</option>
                                                                                                <?php foreach ($type_data['permit'] as $item) { ?>
                                                                                                <option value="<?php echo $item['type_id'];?>" <?php if($item['type_id']==$detail[0]['permit_type']){?> selected="selected"<?php } ?>><?php echo $item['type_name'];?></option>

                                                                                                <?php } 
                                                                                                ?>
											</select>
										</div>
										<div class="col-md-2" style="padding:0px;">
											<a href="#add-more-permit-modal-box" id="permit-type-plus-icon_edit" onclick="data_modal_box_permit_type('add','permit-type-plus-icon_edit','permit-type-edit-delete-icon_edit','edit');" data-toggle="modal" class="btn-xs btn-success pull-right">
											<span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i><span>
											</a>
											<span id="permit-type-edit-delete-icon_edit" style="display:none;">
												<a href="#delete-more-permit-modal-box" onclick="data_modal_box_permit_type('delete','permit-type-plus-icon_edit','permit-type-edit-delete-icon_edit','edit');" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
												<span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
												</a>
												<a href="#edit-more-permit-modal-box" data-toggle="modal" onclick="data_modal_box_permit_type('edit','permit-type-plus-icon_edit','permit-type-edit-delete-icon_edit','edit');" class="btn-xs btn-warning pull-right">
												<span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
												</a>
											</span>
										</div>
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Name of permit holder</label>
										<input type="text" class="form-control height_25 plahole_font" name="name_of_permit_holder" id="accounting_done_by" value="<?php echo $detail[0]['name_of_permit_holder'];?>" style="width: 100%;">
									</div>

									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>
										<div class="input-group date stDate">
											<input class="form-control height_25 " id="issue_date1_edit" name="issue_date" value="<?php if($detail[0]['issue_date']=="" ||$detail[0]['issue_date']=="0000-00-00 00:00:00"){echo '';}else{echo date('d F Y', strtotime($detail[0]['issue_date']));} ?>" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>
										<div class="input-group date stDate">
											<input class="form-control height_25 " id="expiry_date1_edit" value="<?php if($detail[0]['expiry_date']=="" ||$detail[0]['expiry_date']=="0000-00-00 00:00:00"){echo '';}else{echo date('d F Y', strtotime($detail[0]['expiry_date']));} ?>" name="expiry_date" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>

									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
										<textarea style="width:100%;resize:vertical;" name="remark"><?php echo $detail[0]['remark'];?></textarea>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        
                                        <input type="hidden" class="form-control height_25 plahole_font" name="id"  style="width: 100%;" value="<?php echo $detail[0]['permit_id'];?>">
                                        <input type="hidden" class="form-control height_25 plahole_font" name="action"  style="width: 100%;" value="edit">

                                        <button type="submit" class="btn btn-success pull-right">Save</button>
                                        <a href="#" class="btn btn-primary pull-right cancel" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                    </div>
                                </div>
                            </form>
<script>
    $(document).ready(function(){
        $('.custom_close').on('click',function(){
            $(this).parent().fadeOut();
        });
        
        $('.stDate').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		//$('#edit-permit-form24').bootstrapValidator('revalidateField', 'issue_date');
		//$('#edit-permit-form24').bootstrapValidator('revalidateField', 'expiry_date');	
	});
        
        $('#edit-permit-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
               permit_type: {
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
//                                var input1 = new Date($('#issue_date1_edit').val()).getTime();
//                                var input2 = new Date($('#expiry_date1_edit').val()).getTime();
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
//                expiry_date: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than Date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#issue_date1_edit').val()).getTime();
//                                var input2 = new Date($('#expiry_date1_edit').val()).getTime();
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
                submit_permit_form('edit-permit-form','edit','<?php echo $detail[0]['permit_id'];?>');   
            });
        
        $('#permit-type-plus-icon_edit').hide();
        $('#permit-type-edit-delete-icon_edit').show();
        $('#permit-type-show-hide_div_edit').on('change', function() {
            if ($('#permit-type-show-hide_div_edit').val() == "") {
                $('#permit-type-plus-icon_edit').show();
                $('#permit-type-edit-delete-icon_edit').hide();
            } else {
                $('#permit-type-plus-icon_edit').hide();
                $('#permit-type-edit-delete-icon_edit').show();

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