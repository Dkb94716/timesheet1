<!--<h5>Agreement and Contracts</h5>-->
<a href="#add-agreements-and-contracts-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn" style="margin-bottom:5px;">Add More</a>
<div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="agreement_data_body">
</div>
                        
<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    dynamicTable_agreement = 'dynamicTable1';
    $(document).ready(function() {
        ready_on_db();
        stuff_on_ready();
        var cur_date=get_current_date();
            $(".stDate").val(cur_date);
            $('.stDate').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
    });
    function stuff_on_ready(){
        var core_url=CURRENT_URL;
        // ACCOUNT
        // For load default grid.
        var load_data_body1 = "agreement_data_body";
        blockUI(load_data_body1);
        var url1 = core_url+"/databaseinfo/get_agreement_grid_data";
        grid_data(load_data_body1,url1,dynamicTable_agreement);
        
        $('.addbtn').on('click',function(){
            setTimeout(function(){
                $("#add-agreement-form").data('bootstrapValidator').resetForm();
                var cur_date = get_current_date();
                //$(".stDate_current").val(cur_date);
                $('.stDate').bdatepicker({
                    format: "dd MM yyyy",
                    autoclose: true,
                });
            },400)
//            $("#add-director-individual-form").data('bootstrapValidator').resetForm(); 
            
        });
        
        $('.stDate').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		$('#add-agreement-form24').bootstrapValidator('revalidateField', 'signed_date');
		$('#add-agreement-form24').bootstrapValidator('revalidateField', 'termination_date');	
	});
        var validator =  $('#add-agreement-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           agreement_type: {
                        validators: {
                                notEmpty: {
                                        message: 'This field is required'
                                }
                        }
                },
//                signed_date: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#signed_date').val()).getTime();
//                                var input2 = new Date($('#termination_date').val()).getTime();
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
//                                            message: 'Date of signed should be less than date of termination'
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
//                termination_date: {
//                    validators: {
//                        callback: {
//                            message: 'Date of termination should be greater than date of signed',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#signed_date').val()).getTime();
//                                var input2 = new Date($('#termination_date').val()).getTime();
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
//                                            message: 'Date of termination should be greater than date of signed'
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
//                //

            }
        })
        .on('success.form.bv', function (e) {
            e.preventDefault();
            submit_agreement_form('add-agreement-form','add','');   
        });
        
        
      }
    function submit_agreement_form(form,action,id){
        var load_data_body = 'agreement_data_body';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/submit_agreement_form";
        blockUI(load_data_body);
        submit_form(form,load_data_body,url,action,id,function(data){
            var url = core_url+"/databaseinfo/get_agreement_grid_data";
            grid_data(load_data_body,url,dynamicTable_agreement);
        });
    }
    function edit_agreement_bar(id){
        blockUI('edit_agreement_bar');
        var load_data_body = 'agreement_edit_bar';
        var db_name = 'db_agreement_contracts';
        var db_field_id = 'agreement_co_id';
        var tag = 'agreement';
        var view_folder = 'Agreement';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body,url,id,db_name,db_field_id,tag,view_folder)
    }
    
    function delete_agreement_bar(id){
        var load_data_body = 'agreement_data_body';
        var db_name = 'db_agreement_contracts';
        var db_field_id = 'agreement_co_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete agreement and contract Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_agreement_grid_data";
        var tag = 'Agreement and compliance'
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_agreement,tag)
    }
    
</script>

    <!---------START Add AGREEMENTS AND CONTRACTS Modal box-------->
        <div class="modal fade"  id="add-agreements-and-contracts-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Add Agreements and Contracts</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;">
                            <form class="form-horizontal" action="<?php echo base_url();?>/databaseinfo/submit_data" id="add-agreement-form"  role="form">
                                <div class="col-md-6">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Type of agreement</label>
                                        <input name="agreement_type" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date signed</label>
                                        <div class="input-group date stDate">
                                            <input id="signed_date" name="signed_date" class="form-control height_25 stDate_current" type="text" value="">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Date of termination</label>
                                        <div class="input-group date stDate">
                                            <input id="termination_date" name="termination_date" class="form-control height_25 stDate_current" type="text" value="">
                                            <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                        <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                        <textarea name="remarks" style="width:100%;resize:vertical;"></textarea>
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
        <!---------END Add AGREEMENTS AND CONTRACTS Modal box---------->

        <!---------START Edit AGREEMENTS AND CONTRACTS Modal box-------->
        <div class="modal fade"  id="edit-agreements-and-contracts-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit Agreements and Contracts</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;" id="agreement_edit_bar">
                            
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END Edit AGREEMENTS AND CONTRACTS Modal box---------->
