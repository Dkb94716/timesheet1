<?php 
$CI =& get_instance();
$CI->load->model('databaseinfo_model');
$type_data = $CI->databaseinfo_model->getTypeOfLicensePermit();
$license_permit_data = $CI->databaseinfo_model->getLicensePermitData();

$license_permit_data1 = $CI->databaseinfo_model->getCorporateDataValues($client_id);
$license_no='';
if(!empty($license_permit_data1)){
$license_no = $license_permit_data1[0]['gbl_license_no'];
}
//echo "<pre>"; print_r($license_permit_data1);
//die;


?>
<div class="box-generic" style="padding:0px;box-shadow:none;">
                            <!-----START Licenses Sub tab----->
                            <div class="tabsbar" style="height:30px;">
                                <ul style="height:30px;">
                                    <li class="camera active" style="height:30px;">
                                        <a href="#add_license-tab" data-toggle="tab" style="height:24px;line-height:24px;">ADD LICENSE</a>
                                    </li>

                                    <li class="folder_open" style="height:30px;">
                                        <a href="#add_permit-tab" data-toggle="tab" style="height:24px;line-height:24px;">ADD PERMIT</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" style="padding-left:11px;padding-right:10px;">

                                <!---START Add Linceses Tab--->
                                <div class="tab-pane active" id="add_license-tab">
                                    <a href="#add-license-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
                                    <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="license_data_body">

                                    </div>
                                </div>
                                <!---END Add Linceses Tab--->

                                <!---START Add Permit Tab--->
                                <div class="tab-pane" id="add_permit-tab">
                                    <a href="#add-permit-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
                                    <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="permit_data_body">
                                        
                                    </div>
                                </div>
                                <!---END Add Permit Tab--->

                            </div>
                            <!-----END Licenses Sub tab------->

                        </div>



<!---------START Add License Modal box-------->
        <div class="modal fade"  id="add-license-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Add License</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body" id="modal-body-license-add">
                        <div class="innerLR" style="padding:0;">
                            <!-- start success and error message -->
                            <div id="license_success_msg_add" class="alert alert-success padding-for-modal" style="display:none;">
                                <button type="button" class="custom_close" >&times;</button>
                                <span class="success-msg">Best check yo self, you're not looking too good.</span>
                            </div>
                            <div id="license_err_msg_add" class="alert alert-danger padding-for-modal" style="display:none;">
                                <button type="button" class="custom_close" >&times;</button>
                                <span class="error-msg"> Best check yo self, you're not looking too good. </span>
                            </div>    
                            <!-- end success and error message -->
                            
                            <form class="form-horizontal" action="<?php echo base_url();?>/databaseinfo/submit_data" id="add-license-form"  role="form">
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Type of license</label>
										<div class="col-md-10" style="padding-left:0px;">
											<select class="form-control height_25 plahole_font" id="license-type-show-hide_div" name="license_type" style="width: 100%;">
												<option value="">Select License</option>
                                                                                                <?php foreach ($type_data['license'] as $item) { ?>
                                                                                                    <option value="<?php echo $item['type_id'];?>"><?php echo $item['type_name'];?></option>

                                                                                                <?php } 
                                                                                                ?>
												
											</select>
										</div>
										<div class="col-md-2" style="padding:0px;">
											<a href="#add-more-license-modal-box11" onclick="data_modal_box_license_type('add','add-button-icon','edit-delete-button-icon','add');" id="add-button-icon" class="btn-xs btn-success pull-right" data-toggle="modal">
											<span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i><span>
											</a>
											<span id="edit-delete-button-icon" style="display:none;">
												<a href="#delete-more-license-modal-box" data-toggle="modal" onclick="data_modal_box_license_type('delete','add-button-icon','edit-delete-button-icon','add');" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
													<span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
												</a>
												<a href="#edit-more-license-modal-box" data-toggle="modal" onclick="data_modal_box_license_type('edit','add-button-icon','edit-delete-button-icon','add');" class="btn-xs btn-warning pull-right">
												<span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
												</a>
											</span>
										</div>
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>
										<div class="input-group date stDate">
											<input class="form-control height_25 stDate_current" id="issue_date" name="issue_date" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>
										<div class="input-group date stDate">
											<input class="form-control height_25 stDate_current" id="expiry_date" name="expiry_date" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Licensing conditions</label>
										<input type="text" class="form-control height_25 plahole_font" name="licensing_cond" style="width: 100%;">
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">License number</label>
                                                                                <input type="text" class="form-control height_25 plahole_font" name="license_no" value="<?php if($license_no!=''){echo $license_no;}else{echo '';} ?>" id="accounting_done_by" style="width: 100%;">
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="hidden"  name="id" id="accounting_done_by" style="width: 100%;" value="">
                                        <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                        <button type="submit" class="btn btn-success pull-right" >Save</button>
                                        <a href="#" class="btn btn-primary pull-right cancel" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END Add License Modal box---------->
        
        <!---------START Edit License Modal box-------->
        <div class="modal fade"  id="edit-license-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit License</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body modal-min-height" id="license_edit_box">
                        <div class="innerLR" id="license_edit_bar" style="padding:0;">
                            
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        
        
		
		
        <!---------START Add Permit Modal box-------->
        <div class="modal fade"  id="add-permit-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Add Permit</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body" id="modal-body-permit-add">
                        <div class="innerLR" style="padding:0;">
                            <div id="permit_success_msg_add" class="alert alert-success padding-for-modal" style="display:none;">
                                <button type="button" class="custom_close" data-dismiss="alert">&times;</button>
                                <span class="success-msg">Best check yo self, you're not looking too good.</span>
                            </div>
                            <div id="permit_err_msg_add" class="alert alert-danger padding-for-modal" style="display:none;">
                                <button type="button" class="custom_close" data-dismiss="alert">&times;</button>
                                <span class="error-msg"> Best check yo self, you're not looking too good. </span>
                            </div>
                            <form class="form-horizontal" action="<?php echo base_url();?>/databaseinfo/submit_data" id="add-permit-form" role="form">
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Type of permit</label>
										<div class="col-md-10" style="padding-left:0px;">
											<select class="form-control height_25 plahole_font" name="permit_type" id="permit-type-show-hide_div" style="width: 100%;">
												<option value="">Select Permit</option>
                                                                                                <?php foreach ($type_data['permit'] as $item) { ?>
                                                                                                    <option value="<?php echo $item['type_id'];?>"><?php echo $item['type_name'];?></option>

                                                                                                <?php } 
                                                                                                ?>
											</select>
										</div>
										<div class="col-md-2" style="padding:0px;">
											<a href="#add-more-permit-modal-box" id="permit-type-plus-icon" onclick="data_modal_box_permit_type('add','permit-type-plus-icon','permit-type-edit-delete-icon','add');" data-toggle="modal" class="btn-xs btn-success pull-right">
											<span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i><span>
											</a>
											<span id="permit-type-edit-delete-icon" style="display:none;">
												<a href="#delete-more-permit-modal-box" onclick="data_modal_box_permit_type('delete','permit-type-plus-icon','permit-type-edit-delete-icon','add');" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
												<span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
												</a>
												<a href="#edit-more-permit-modal-box" data-toggle="modal" onclick="data_modal_box_permit_type('edit','permit-type-plus-icon','permit-type-edit-delete-icon','add');" class="btn-xs btn-warning pull-right">
												<span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
												</a>
											</span>
										</div>
									</div>
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Name of permit holder</label>
										<input type="text" class="form-control height_25 plahole_font" name="name_of_permit_holder" id="accounting_done_by" style="width: 100%;">
									</div>

									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>
										<div class="input-group date stDate ">
											<input class="form-control height_25 stDate_current" id="issue_date1" name="issue_date" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>
										<div class="input-group date stDate ">
											<input class="form-control height_25 stDate_current" id="expiry_date1" name="expiry_date" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>

									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
										<textarea style="width:100%;resize:vertical;" name="remark"></textarea>
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="hidden"  name="id"  style="width: 100%;" value="">
                                        <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                        <button type="submit" class="btn btn-success pull-right">Save</button>
                                        <a href="#" class="btn btn-primary pull-right cancel" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------End Add License Modal box-------->
        <!---------START Edit Permit Modal box-------->
        <div class="modal fade"  id="edit-permit-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit Permit</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;" id="permit_edit_box">
                            
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END Edit Permit Modal box---------->

        
        
<!-- <script src="<?php echo base_url(); ?>assets/plugins/tables_datatables/js/jquery.dataTables.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/tables_datatables/extras/TableTools/media/js/TableTools.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/tables_datatables/extras/ColVis/media/js/ColVis.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
	<script src="<?php echo base_url(); ?>assets/components/tables_datatables/js/DT_bootstrap.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
	<script src="<?php echo base_url(); ?>assets/components/tables_datatables/js/datatables.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/tables_datatables/extras/FixedHeader/FixedHeader.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/tables_datatables/extras/ColReorder/media/js/ColReorder.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>        
-->	<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>    

<script>
    dynamicTable_license = 'dynamicTable1';
    dynamicTable_permit = 'dynamicTable2';
    $(document).ready(function(){
        // default stuff
        stuff_on_ready();
        init();
    });
    
    function init(){
        $('.custom_close').on('click',function(){
            $(this).parent().fadeOut();
        })
        $('.modal').modal({backdrop: 'static',show:false, keyboard: false}) 
        var cur_date=get_current_date();
            $(".stDate_current").val(cur_date);
            $('.stDate').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        
        $('.modal').on('hidden.bs.modal', function () {

            for(var k=0;k<$(this).find(".radioNoBtn").length; k++){
                    $(this).find(".radioNoBtn").eq(k).attr('checked', true).trigger('click');
            }
            $(this).find(".iradioNoBtn").addClass("checked");
            $(this).find(".iradioYesBtn").removeClass("checked");

            $(this).find("#show_date_of_special-edit").eq(0).attr('checked', true).trigger('click');
            $(this).find("#show_date_of_special-edit-i").addClass("checked");
            $(this).find("#hide_date_of_special-edit-i").removeClass("checked");

            $(this).find("#show_date_of_special").eq(0).attr('checked', true).trigger('click');
            $(this).find("#show_date_of_special-i").addClass("checked");
            $(this).find("#hide_date_of_special-i").removeClass("checked");

            $(this).find('input').val('');
            $(this).find('textarea').val('');
            $(this).find('select').find('option:first').attr('selected', 'selected');
            $('.stDate').bdatepicker("update",cur_date);            
            $('#license-type-show-hide_div').trigger('change');
            $('#license-type-show-hide_div-edit').trigger('change');
            $('#permit-type-show-hide_div').trigger('change');
            $('#permit-type-show-hide_div-edit').trigger('change');
            $('#bank-onwer_bank-name-show-hide_div').trigger('change');
            $('#bank-onwer_account-type-show-hide_div').trigger('change');
            $('#bank-onwer_currency-show-hide_div').trigger('change');
            $('#bank-onwer_account-no-show-hide_div').trigger('change');
            $('#bank-onwer_bank-name-show-hide_div-edit').trigger('change');
            $('#bank-onwer_account-type-show-hide_div-edit').trigger('change');
            $('#bank-onwer_currency-show-hide_div-edit').trigger('change');
            $('#bank-onwer_account-no-show-hide_div-edit').trigger('change');
            $('#share-type-type-show-hide_div').trigger('change');
            $('#share-type-type-show-hide_div-corporate-transfer').trigger('change');
            $('#share-type-type-show-hide_div-corporate').trigger('change');

        });

        /*********START license-type-show-hide_div on change function**********/
        $('#license-type-show-hide_div').on('change', function() {
            if ($('#license-type-show-hide_div').val() == '') {
                $('#add-button-icon').show();
                $('#edit-delete-button-icon').hide();
            } else {
                $('#add-button-icon').hide();
                $('#edit-delete-button-icon').show();

            }
        });
        /***********END license-type-show-hide_div on change function**********/
        /*********START permit-type-show-hide_div on change function**********/
        $('#permit-type-show-hide_div').change(function() {
            if ($('#permit-type-show-hide_div').val() == '') {
                $('#permit-type-plus-icon').show();
                $('#permit-type-edit-delete-icon').hide();
            } else {
                $('#permit-type-plus-icon').hide();
                $('#permit-type-edit-delete-icon').show();

            }
        });
        /***********END permit-type-show-hide_div on change function**********/
        $(this).find('input.stDate').bdatepicker("update", new Date());
    }
    function stuff_on_ready(){
        $('.addbtn').on('click',function(){
            $('.add_action').val('add');
                   
            setTimeout(function(){
                $("#add-license-form").data('bootstrapValidator').resetForm(); 
                $("#add-permit-form").data('bootstrapValidator').resetForm(); 
                $('#accounting_done_by').val('<?php echo $license_no;?>');
                               
                
            },200);
            var cur_date = get_current_date();
           // $(".stDate_current").val(cur_date);
            $('.stDate').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true,
            });
         
// $("#add-director-individual-form").data('bootstrapValidator').resetForm(); 
        });
        
        var core_url=CURRENT_URL;
        // LICENSE
        // For load default grid.
        var load_data_body1 = "license_data_body";
        blockUI(load_data_body1);
        var url1 = core_url+"/databaseinfo/get_license_grid_data";
        grid_data(load_data_body1,url1,dynamicTable_license);

        // validation
        
        $('.stDate').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		$('#add-license-form24').bootstrapValidator('revalidateField', 'issue_date');
		$('#add-license-form24').bootstrapValidator('revalidateField', 'expiry_date');	
	});
        
       var validator =  $('#add-license-form').bootstrapValidator({
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
//                issue_date: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#issue_date').val()).getTime();
//                                var input2 = new Date($('#expiry_date').val()).getTime();
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
//                            message: 'Date of expiry should be greater than date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#issue_date').val()).getTime();
//                                var input2 = new Date($('#expiry_date').val()).getTime();
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
            submit_license_form('add-license-form','add','');   
        });
        
        
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
        
        
        // PERMIT
        // For load default grid.
       // setTimeout(function(){
        var load_data_body2 = "permit_data_body";
        blockUI(load_data_body2);
        var url2 = core_url+"/databaseinfo/get_permit_grid_data";
        grid_data(load_data_body2,url2,dynamicTable_permit);
       // },10000);
        
        
        $('.stDate').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		//$('#add-permit-form').bootstrapValidator('revalidateField', 'issue_date');
		//$('#add-permit-form').bootstrapValidator('revalidateField', 'expiry_date');	
	});
        $('#add-permit-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           permit_type: {
                        validators: {
                                notEmpty: {
                                        message: 'This field is required'
                                }
                        }
                },
//                issue_date: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#issue_date1').val()).getTime();
//                                var input2 = new Date($('#expiry_date1').val()).getTime();
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
//                            message: 'Date of expiry should be greater than date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#issue_date1').val()).getTime();
//                                var input2 = new Date($('#expiry_date1').val()).getTime();
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
            submit_permit_form('add-permit-form','add','');   
        });
        
    }
    
    function data_modal_box_license_type(action,add_div,edit_delete_div,form_type){
        

        if(form_type=="add"){
            $("#add-license-form").data('bootstrapValidator').resetForm(); 
            var success_msg_id = 'license_success_msg_add';
            var error_msg_id = 'license_err_msg_add';
            var element_id = 'license-type-show-hide_div';

        } else {
            $("#edit-license-form").data('bootstrapValidator').resetForm(); 
            var element_id = 'license-type-show-hide_div_edit';
            var success_msg_id = 'license_success_msg_edit';
            var error_msg_id = 'license_err_msg_edit';
        }
        var placeholder = 'Type of license';
        var dbname = 'db_lp_license_type';
        var db_field_name = 'type_name';
        var db_field_id = 'type_id';
        var loader_element_id = 'modal-body-license-add'
        var item_id = 0;
        var message_title = 'license type';
        if(action=="add"){
            var title = 'Add type of license';
            data_modal_box_add(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
        } else if(action=="edit"){
            var item_id = $("#"+element_id+" :selected").val();
            var item_name = $("#"+element_id+" :selected").text();
            var title = 'Edit type of license';
            data_modal_box_edit(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,item_name,success_msg_id,error_msg_id,loader_element_id,message_title)
        } else if(action=="delete"){
            var title = 'Delete type of license';
            item_id = element_id;
            data_modal_box_delete(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
        }
    }
    
    function edit_license_bar(id){
        blockUI('license_edit_box');
        var load_data_body = 'license_edit_box';
        var db_name = 'db_lp_license';
        var db_field_id = 'license_id';
        var tag = 'license';
        var view_folder = 'LicensePermit';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body,url,id,db_name,db_field_id,tag,view_folder)
    }
    
    function submit_license_form(form,action,id){
        
        var load_data_body = 'license_data_body';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/submit_license_form";
        blockUI(load_data_body);
        submit_form(form,load_data_body,url,action,id,function(data){
            var url = core_url+"/databaseinfo/get_license_grid_data";
            grid_data(load_data_body,url,dynamicTable_license);
        });
        
       
    }
    
    function delete_license_bar(id){
        var load_data_body = 'license_data_body';
        var db_name = 'db_lp_license';
        var db_field_id = 'license_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete License";
        var tag = 'License';
        var grid_url = CURRENT_URL+"/databaseinfo/get_license_grid_data";
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_license,tag)
    }
    
    // for Permit
    
    function data_modal_box_permit_type(action,add_div,edit_delete_div,form_type){
        if(form_type=="add"){
            $("#add-permit-form").data('bootstrapValidator').resetForm(); 
            var element_id = 'permit-type-show-hide_div';
            var success_msg_id = 'permit_success_msg_add';
            var error_msg_id = 'permit_err_msg_add';
        } else {
            $("#edit-permit-form").data('bootstrapValidator').resetForm(); 
            var element_id = 'permit-type-show-hide_div_edit';
            var success_msg_id = 'permit_success_msg_edit';
            var error_msg_id = 'permit_err_msg_edit';
        }
        var placeholder = 'Type of permit';
        var dbname = 'db_lp_permit_type';
        var db_field_name = 'type_name';
        var db_field_id = 'type_id';
        var loader_element_id = 'modal-body-permit-add'
        var item_id = 0;
        var message_title = 'permit type';

        if(action=="add"){
            var title = 'Add type of permit';
            data_modal_box_add(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
        } else if(action=="edit"){
            var item_id = $("#"+element_id+" :selected").val();
            var item_name = $("#"+element_id+" :selected").text();
            var title = 'Edit type of permit';
            data_modal_box_edit(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,item_name,success_msg_id,error_msg_id,loader_element_id,message_title)
        } else if(action=="delete"){
            var title = 'Delete type of permit';
            item_id = element_id;
            data_modal_box_delete(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
        }
    }
    
    function edit_permit_bar(id){
        blockUI('permit_edit_box');
        var load_data_body = 'permit_edit_box';
        var db_name = 'db_lp_permit';
        var db_field_id = 'permit_id';
        var tag = 'permit';
        var view_folder = 'LicensePermit';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body,url,id,db_name,db_field_id,tag,view_folder)
    }
    
    function submit_permit_form(form,action,id){
        var load_data_body = 'permit_data_body';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/submit_permit_form";
        blockUI(load_data_body);
        submit_form(form,load_data_body,url,action,id,function(data){
            var url = core_url+"/databaseinfo/get_permit_grid_data";
            grid_data(load_data_body,url,dynamicTable_permit);
        });
        
       
    }
    
    function delete_permit_bar(id){
        var load_data_body = 'permit_data_body';
        var db_name = 'db_lp_permit';
        var db_field_id = 'permit_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Permit";
        var grid_url = CURRENT_URL+"/databaseinfo/get_permit_grid_data";
        var tag = 'Permit';
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_permit,tag)
    }
    
    function get_current_date(){
    var monthNames = [
      "January", "February", "March",
      "April", "May", "June", "July",
      "August", "September", "October",
      "November", "December"
    ];

    var date = new Date();
    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();
    return day + ' ' + monthNames[monthIndex] + ' ' + year;
  
  }
</script>               