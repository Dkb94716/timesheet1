                        <!--<h5>Agreement and Contracts</h5>-->
                        <a href="#add-compliance-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right addbtn addbtn" style="margin-bottom:5px;">Add More</a>
                        <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;" id="compliance_data_body">
                            
                        </div>
                        
                        
<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    dynamicTable_compliance = 'dynamicTable1';
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
        var load_data_body1 = "compliance_data_body";
        blockUI(load_data_body1);
        var url1 = core_url+"/databaseinfo/get_compliance_grid_data";
        grid_data(load_data_body1,url1,dynamicTable_compliance);
        
        var validator =  $('#add-compliance-form').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
           check_list_no: {
                        validators: {
                                notEmpty: {
                                        message: 'This field is required'
                                }
                        }
                }

            }
        })
        .on('success.form.bv', function (e) {
            e.preventDefault();
            submit_compliance_form('add-compliance-form','add','');   
        });
        
        
      }
      
      $('.addbtn').on('click',function(){
            setTimeout(function(){
                $("#add-compliance-form").data('bootstrapValidator').resetForm();
                
            },200)});
            
    function submit_compliance_form(form,action,id){
        var load_data_body = 'compliance_data_body';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/submit_compliance_form";
        blockUI(load_data_body);
        submit_form(form,load_data_body,url,action,id,function(data){
            var url = core_url+"/databaseinfo/get_compliance_grid_data";
            grid_data(load_data_body,url,dynamicTable_compliance);
        });
    }
    function edit_compliance_bar(id){
        blockUI('compliance_edit_bar');
        var load_data_body = 'compliance_edit_bar';
        var db_name = 'db_compliance_info';
        var db_field_id = 'compliance_id';
        var tag = 'compliance';
        var view_folder = 'Compliance';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body,url,id,db_name,db_field_id,tag,view_folder)
    }
    
    function delete_compliance_bar(id){
        var load_data_body = 'compliance_data_body';
        var db_name = 'db_compliance_info';
        var db_field_id = 'compliance_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Compliance Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_compliance_grid_data";
        var tag = 'Compliance info'
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_compliance,tag)
    }
      
      </script>
                        
                        <!---------START Add Compliance Modal box-------->
        <div class="modal fade"  id="add-compliance-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Add Compliance</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;">
                            <form class="form-horizontal" action="<?php echo base_url();?>/databaseinfo/submit_data" id="add-compliance-form"  role="form">
								<div class="col-md-6">
									
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading">Checklist number</label>
										<input name="check_list_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
									</div>
									
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading">Date of review</label>
										<div class="input-group date stDate col-sm-12">
											<input name="review_date" class="form-control height_25 stDate_current" type="text">
											<span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
										</div>
									</div>
									
								</div>
								<div class="col-md-6">
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
										<textarea name="remarks" style="width:100%;resize:vertical;"></textarea>
									</div>
									
									<div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
										<label class="client-detailes-sub_heading" style="width:100%;">Level of risk</label>
										<input name="risk_level" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
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
        <!---------END Add Compliance Modal box---------->
		
		<!---------START Edit Compliance Modal box-------->
        <div class="modal fade"  id="edit-compliance-modal-box">
            <div class="modal-dialog modal_box_custome_size">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit Compliance</h3>
                    </div>
                    <!-- // Modal heading END -->

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="innerLR" style="padding:0;" id="compliance_edit_bar">
                            
                        </div>
                    </div>
                    <!-- // Modal body END -->
                </div>
            </div>
        </div>
        <!---------END Edit Compliance Modal box---------->
