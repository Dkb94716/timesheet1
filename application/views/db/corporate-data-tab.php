<?php
    $CI =& get_instance();
    $CI->load->model('databaseinfo_model');
    $corporate_data = $CI->databaseinfo_model->getCorporateDataValues($client_id);
    $select_menu_data = $CI->databaseinfo_model->getCorporateSelectMenuData();
    $client_within_yes = ($corporate_data[0]['within_group']==1)?'checked=checked':'';
    $client_within_no = ($corporate_data[0]['within_group']==0)?'checked=checked':'';
    $name_of_group = ($corporate_data[0]['within_group']==1)?'block':'none';
    $date = date('Y-m-d');
    $global_license_issue_date = ($corporate_data[0]['global_license_issue_date']=="0000-00-00 00:00:00")?"":date('d F Y', strtotime($corporate_data[0]['global_license_issue_date']));
    $date_of_change_name = ($corporate_data[0]['date_of_change_name']=="0000-00-00 00:00:00")?"":date('d F Y', strtotime($corporate_data[0]['date_of_change_name']));
    $date_of_incorp = ($corporate_data[0]['date_of_incorp']=="0000-00-00 00:00:00")?"":date('d F Y', strtotime($corporate_data[0]['date_of_incorp']));
    
    $status_add = ($corporate_data[0]['status']=="")?'block':'none';
    $status_edit_delete = ($corporate_data[0]['status']!="")?'block':'none';
    $type_of_company_add = ($corporate_data[0]['type_of_company']=="")?'block':'none';
    $type_of_company_edit_delete = ($corporate_data[0]['type_of_company']!="")?'block':'none';
    $activity_add = ($corporate_data[0]['activity']==0)?'block':'none';
    $activity_edit_delete = ($corporate_data[0]['activity']!=0)?'block':'none';
    
    
//    echo "<pre>"; print_r($corporate_data); die;
?>

<div class="box-generic" style="padding:0px;box-shadow:none;">

                            <!-----START Corporate data sub tab------>
                            <div class="tabsbar" style="height:30px;">
                                <ul style="height:30px;">
                                    <li class="camera active" style="height:30px;">
                                        <a href="#company-refrence-tab" data-toggle="tab" style="height:24px;line-height:24px;">Company Reference</a>
                                    </li>

                                    <li class="folder_open" style="height:30px;">
                                        <a href="#portfolio-atb" data-toggle="tab" style="height:24px;line-height:24px;">Portfolio</a>
                                    </li>

                                    <li class="folder_open" style="height:30px;">
                                        <a href="#client-info-tab" data-toggle="tab" style="height:24px;line-height:24px;">Information on Client</a>
                                    </li>

                                    <li class="folder_open" style="height:30px;">
                                        <a href="#activity-tab" data-toggle="tab" style="height:24px;line-height:24px;">Activity</a>
                                    </li>

                                    <li class="folder_open" style="height:30px;">
                                        <a href="#address-tab" data-toggle="tab" style="height:24px;line-height:24px;">Address</a>
                                    </li>

                                    <li class="folder_open" style="height:30px;">
                                        <a href="#introducer-tab" data-toggle="tab" style="height:24px;line-height:24px;">Introducer</a>
                                    </li>
                                </ul>
                            </div>
                            <!-----END Corporate data sub tab------>

                            <div class="tab-content" style="padding-left:11px;padding-right:10px;">

                                <!------START Company refrance tab------->
                                <div class="tab-pane active" id="company-refrence-tab">
                                    <div class="row">
                                        <div class="col-md-12"><span class="corporate-data-sub-headding-tab">Company Reference</span></div>
                                        <form class="form-horizontal" role="form" id="company_refrence">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input value="<?php echo $corporate_data[0]['company_refrence'];?>" name="company_refrence"  type="text" class="form-control height_25 plahole_font">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div  class="col-md-6" style="clear:both;margin-bottom:20px;margin-top:20px;">
                                                <a href="#" class="btn-sm btn-success pull-right" type="button" onclick="save_form('company_refrence')" style="margin-left:10px;">Save</a>
                                                <a href="#" class="btn-sm btn-danger pull-right" onclick="reset_form('company_refrence')" type="button">Cancel</a>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                                <!------END Company refrance tab--------->

                                <!------START portfolio tab--------->
                                <div class="tab-pane" id="portfolio-atb">
                                    <div class="row">
                                        <div class="col-md-12"><span class="corporate-data-sub-headding-tab">Portfolio</span></div>
                                        <form class="form-horizontal" role="form" id="portfolio">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input value="<?php echo $corporate_data[0]['portfolio'];?>" name="portfolio" type="text" class="form-control height_25 plahole_font">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div  class="col-md-6" style="clear:both;margin-bottom:20px;margin-top:20px;">
                                                <a href="#" class="btn-sm btn-success pull-right" type="button" onclick="save_form('portfolio')" style="margin-left:10px;">Save</a>
                                                <a href="#" class="btn-sm btn-danger pull-right" onclick="reset_form('portfolio')" type="button">Cancel</a>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <!------END portfolio tab--------->


                                <!------START Information on Client tab--------->
                                <div class="tab-pane" id="client-info-tab">
                                    
                                    <div class="row">
                                        <div class="col-md-12"><span class="corporate-data-sub-headding-tab">Information on Client</span></div>
                                        
                                        <form class="form-horizontal" role="form" id="client_info_form">
                                            <!-- start success and error message -->
                                            <div id="client_info_success_msg" class="alert alert-success padding-for-modal" style="display:none;height: 31px;margin-top: 42px;width: 98%;margin-left: 1%;">
                                                <button type="button" class="custom_close" >&times;</button>
                                                <span class="success-msg">Best check yo self, you're not looking too good.</span>
                                            </div>
                                            <div id="client_info_err_msg" class="alert alert-danger padding-for-modal" style="display:none;height: 31px;margin-top: 42px;width: 98%;margin-left: 1%;">
                                                <button type="button" class="custom_close" >&times;</button>
                                                <span class="error-msg"> Best check yo self, you're not looking too good. </span>
                                            </div>    
                                            <!-- end success and error message -->
                                            <div class="col-md-6">
                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of client</label>
                                                    <input value="<?php echo $client_name;?>" name="client_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;" readonly="readonly">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Previous name (If any)</label>
                                                    <input value="<?php echo $corporate_data[0]['previous_name'];?>" name="previous_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of change of name</label>
                                                    <div class="input-group date stDate_edit col-sm-12">
                                                        <input value="<?php echo $date_of_change_name;?>" name="date_of_change_name" class="form-control height_25" type="text">
                                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                                    </div>
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of incorporation</label>
                                                    <div class="input-group date stDate_edit col-sm-12">
                                                        <input value="<?php echo $date_of_incorp;?>" name="date_of_incorp" class="form-control height_25" type="text">
                                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                                    </div>
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Status</label>
                                                    <div class="col-md-10" style="padding-left:0px;">
                                                        <select name="status" class="form-control height_25 plahole_font" id="clint-info-status-show-hide_div" style="width: 100%;">
                                                            <option value="">Select</option>
                                                            <?php foreach ($select_menu_data['status'] as $value) { ?>
                                                            <option value="<?php echo $value['status_id'];?>"<?php if($value['status_id']==$corporate_data[0]['status']){?> selected="selected"<?php } ?>><?php echo $value['status'];?></option>
                                                            <?php } ?>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2" style="padding:0px;">
                                                        <a href="#add-more-client-info-status-modal-box" style="display:<?php echo $status_add;?>" onclick="data_modal_box_status('add')" id="client-inof-status-plus-icon" class="btn-xs btn-success pull-right" data-toggle="modal">
                                                            <span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></span></a>
                                                        <span id="client-inof-status-edit-delete-icon" style="display:<?php echo $status_edit_delete;?>">
                                                            <a onclick="data_modal_box_status('delete')" href="#delete-more-client-info-status-modal-box" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
                                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
                                                            </a>
                                                            <a onclick="data_modal_box_status('edit')" href="#edit-more-client-info-status-modal-box" data-toggle="modal" class="btn-xs btn-warning pull-right">
                                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">ROC file number</label>
                                                    <input value="<?php echo $corporate_data[0]['roc_file_no'];?>" name="roc_file_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Type of company</label>
                                                    <div class="col-md-10" style="padding-left:0px;">
                                                        <select name="type_of_company" class="form-control height_25 plahole_font" id="client-inof-type-of-company-show-hide_div" style="width: 100%;">
                                                            <option value="">Select</option>
                                                            <?php foreach ($select_menu_data['company_type'] as $value) { ?>
                                                            <option value="<?php echo $value['ctype_id'];?>" <?php if($value['ctype_id']==$corporate_data[0]['type_of_company']){?> selected="selected"<?php } ?>><?php echo $value['company_type'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2" style="padding:0px;">
                                                        <a onclick="data_modal_box_company_type('add')" style="display:<?php echo $type_of_company_add;?>" href="#add-more-client-inof-type-of-company-modal-box" id="client-inof-type-of-company-plus-icon" class="btn-xs btn-success pull-right" data-toggle="modal">
                                                            <span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i><span>
                                                                </span></span></a>
                                                        <span id="client-inof-type-of-company-edit-delete-icon" style="display:<?php echo $type_of_company_edit_delete;?>">
                                                            <a onclick="data_modal_box_company_type('delete')" href="#delete-more-client-inof-type-of-company-modal-box" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
                                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
                                                            </a>
                                                            <a onclick="data_modal_box_company_type('edit')" href="#edit-more-client-inof-type-of-company-modal-box" data-toggle="modal" class="btn-xs btn-warning pull-right">
                                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">GBL license no.</label>
                                                    <input value="<?php echo $corporate_data[0]['gbl_license_no'];?>" name="gbl_license_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of issue of global business license</label>
                                                    <div class="input-group date stDate_edit col-sm-12">
                                                        <input value="<?php echo $global_license_issue_date;?>" name="global_license_issue_date" class="form-control height_25" type="text">
                                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                                    </div>
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Business registration number</label>
                                                    <input value="<?php echo $corporate_data[0]['business_reg_no'];?>" name="business_reg_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Conversion or transfer registration</label>
                                                    <input value="<?php echo $corporate_data[0]['transfer_reg'];?>" name="transfer_reg" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Transfer from/to another management company</label>
                                                    <input value="<?php echo $corporate_data[0]['transfer_from_to'];?>" name="transfer_from_to" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Is the client within a group?</label>
                                                    <div class="radio pull-left" style="margin-right:30px;">
                                                            <input <?php echo $client_within_yes;?> type="radio" name="within_group" id="client-info-group-company_show_div" value="1"> 
                                                             Yes
                                                    </div>

                                                    <div class="radio pull-left"> 
                                                        <input <?php echo $client_within_no;?> type="radio" name="within_group" id="client-info-group-company_hide_div"  value="0"> 
                                                             No
                                                    </div>
                                                </div>

                                                <div class="form-group td-area-form-marg" id="client-info-group-company_show_hide_div" style="margin-bottom:10px !important;display:<?php echo $name_of_group;?>">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of the group</label>
                                                    <input value="<?php echo $corporate_data[0]['name_of_group'];?>" name="name_of_group" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                            </div>
                                            <div  class="col-md-12" style="clear:both;margin-bottom:20px;margin-top:20px;">
                                                <a href="#" class="btn-sm btn-success pull-right" onclick="save_form('client_info_form')" type="button" style="margin-left:10px;">Save</a>
                                                <a href="#" class="btn-sm btn-danger pull-right" onclick="reset_form('client_info_form','client')" type="button">Cancel</a>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <!------END Information on Client tab--------->

                                <!-------------START Activity Tab-------------->
                                <div class="tab-pane" id="activity-tab">
                                    <div class="row">
                                        <div class="col-md-12"><span class="corporate-data-sub-headding-tab">Activity</span></div>
                                        <form class="form-horizontal" role="form" id="activity_info">
                                            <div id="activity_success_msg" class="alert alert-success padding-for-modal" style="display:none;height: 31px;margin-top: 42px;width: 98%;margin-left: 1%;">
                                                <button type="button" class="close_button close-on-client" data-dismiss="alert">&times;</button>
                                                <span class="success-msg"></span>
                                            </div>
                                            <div id="activity_err_msg" class="alert alert-danger padding-for-modal" style="display:none;height: 31px;margin-top: 42px;width: 98%;margin-left: 1%;">
                                                <button type="button" class="close_button1 close-on-client" data-dismiss="alert">&times;</button>
                                                <span class="error-msg"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-10" style="padding-left:0px;">
                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                        <select name="activity" onclick="show_detail(this.value);"  class="form-control height_25 plahole_font" id="client-info-activity-show-hide_div" style="width: 100%;">
                                                                <option value="">Select</option>
                                                                <?php foreach ($select_menu_data['activity'] as $value) { ?>
                                                                <option value="<?php echo $value['activity_id'];?>" <?php if($value['activity_id']==$corporate_data[0]['activity']){?> selected="selected"<?php } ?>><?php echo $value['activity'];?></option>
                                                                <?php } ?>
                                                        </select>
                                                </div>
                                                </div>
                                                <div class="col-md-2" style="padding:0px;">
                                                <a href="#add-more-client-info-activity-modal-box" style="display:<?php echo $activity_add;?>" onclick="data_modal_box_activity('add');" id="client-info-activity-plus-icon" class="btn-xs btn-success pull-right" data-toggle="modal" style="display: block;">
                                                    <span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></span>
                                                </a>
                                                <span id="client-info-activity-edit-delete-icon" style="display:<?php echo $activity_edit_delete;?>">
                                                        <a onclick="data_modal_box_activity('delete');" href="#delete-more-client-info-activity-modal-box" data-toggle="modal" class="btn-xs btn-danger pull-right" style="margin-left:5px;">
                                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Delete" data-placement="top"><i class="fa fa-trash-o" style="font-size:14px;"></i></span>
                                                        </a>
                                                        <a onclick="data_modal_box_activity('edit');" href="#edit-more-client-info-activity-modal-box" data-toggle="modal" class="btn-xs btn-warning pull-right">
                                                                <span class="tooltip_area" data-toggle="tooltip" data-original-title="Edit" data-placement="top"><i class="fa fa-edit" style="font-size:14px;"></i></span>
                                                        </a>
                                                </span>
                                                </div>
                                                <div class="form-group td-area-form-marg" id="client-info-activity_show_hide_input_filed" style="margin-bottom:10px !important;display:<?php echo $activity_edit_delete;?>;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Details of activities <img id="detail_loader" style="display:none;" src="<?php echo base_url();?>/assets/images/ajax-loader.gif"></label>
                                                    <textarea  name="activity_detail" id="activity_detail_name" class="form-control height_25 plahole_font" style="width: 100%;"><?php echo $corporate_data[0]['activity_detail'];?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div  class="col-md-6" style="clear:both;margin-bottom:20px;margin-top:20px;">
                                                <a href="#" class="btn-sm btn-success pull-right" type="button" onclick="save_form('activity_info');" style="margin-left:10px;">Save</a>
                                                <a href="#" class="btn-sm btn-danger pull-right" onclick="reset_form('activity_info')" type="button">Cancel</a>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <!-------------END Activity Tab-------------->

                                <div class="tab-pane" id="address-tab">
                                    <!-------START Address tab--------->
                                    <div class="row">
                                        <div class="col-md-12"><span class="corporate-data-sub-headding-tab">Address</span></div>
                                        <form class="form-horizontal" role="form" id="address_info">
                                            <div class="col-md-6">
                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Registered office</label>
                                                    <input value="<?php echo $corporate_data[0]['registered_office'];?>" name="registered_office" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Business address</label>
                                                    <input value="<?php echo $corporate_data[0]['business_address'];?>" name="business_address" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">File location</label>
                                                    <input value="<?php echo $corporate_data[0]['file_location'];?>" name="file_location" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Archives reference number no.</label>
                                                    <input value="<?php echo $corporate_data[0]['archieves_ref_no'];?>" name="archieves_ref_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                            </div>
                                            <div  class="col-md-12" style="clear:both;margin-bottom:20px;margin-top:20px;">
                                                <a href="#" class="btn-sm btn-success pull-right" type="button" onclick="save_form('address_info')" style="margin-left:10px;">Save</a>
                                                <a href="#" class="btn-sm btn-danger pull-right" onclick="reset_form('address_info')" type="button">Cancel</a>
                                            </div>

                                        </form>
                                    </div>
                                    <!-------END Addresa tab----------->
                                </div>

                                <div class="tab-pane" id="introducer-tab">
                                    <!--------START Introducer tab----------->
                                    <div class="row">
                                        <div class="col-md-12"><span class="corporate-data-sub-headding-tab">Introducer</span></div>
                                        <form class="form-horizontal" role="form" id="introducer_info">
                                            <div class="col-md-6">
                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Introduced by</label>
                                                    <input value="<?php echo $corporate_data[0]['introduced_by'];?>" name="introduced_by" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Address of the introducer</label>
                                                    <input value="<?php echo $corporate_data[0]['introducer_address'];?>" name="introducer_address" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Country of the introducer</label>
                                                    <input value="<?php echo $corporate_data[0]['introducer_country'];?>" name="introducer_country" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Email of the introducer</label>
                                                    <input value="<?php echo $corporate_data[0]['introducer_email'];?>" name="introducer_email" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                    <label class="client-detailes-sub_heading" style="width:100%;">Phone number of the introducer</label>
                                                    <input value="<?php echo $corporate_data[0]['introducer_phone'];?>" name="introducer_phone" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                                </div>

                                            </div>
                                            <div  class="col-md-12" style="clear:both;margin-bottom:20px;margin-top:20px;">
                                                <a href="#" class="btn-sm btn-success pull-right" type="button" onclick="save_form('introducer_info');" style="margin-left:10px;">Save</a>
                                                <a href="#" class="btn-sm btn-danger pull-right" onclick="reset_form('introducer_info')" type="button">Cancel</a>
                                            </div>

                                        </form>
                                    </div>
                                    <!--------END Introducer tab------------->
                                </div>

                            </div>

                        </div>

<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    $(document).ready(function() {
        ready_on_db();
        stuff_on_ready();
        $('.close_button').on('close',function(){
            $('#activity_success_msg')
        });
        
        $('.close_button1').on('close',function(){
            $('#activity_err_msg')
        });
        var activity = '<?php echo $corporate_data[0]['activity'];?>';
        var found = 0;
        $('#client-info-activity-show-hide_div').each(function(){
            var ThisVal = $(this).val();
            if(ThisVal==activity){
                found = 1
            }
        });
        
        if(found==0)
            $('#client-info-activity_show_hide_input_filed').hide();
        
        
    });
    function stuff_on_ready(){
        var cur_date=get_current_date();
            $('.stDate_edit').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
    }
    
    function save_form(form_id){
        var load_data_body = form_id;
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/save_cd_"+form_id;
        var action = "edit";
        var id = $('#client_info').attr('client_id');
        blockUI(load_data_body);
        submit_form(form_id,load_data_body,url,action,id,function(data){
            unblockUI(load_data_body);
        });
    }
    
    function data_modal_box_status(action){
        var add_div = 'client-inof-status-plus-icon';
        var edit_delete_div = 'client-inof-status-edit-delete-icon';
        var element_id = 'clint-info-status-show-hide_div';
        var success_msg_id = 'client_info_success_msg';
        var error_msg_id = 'client_info_err_msg';
        var placeholder = 'Status';
        var dbname = 'db_cd_status';
        var db_field_name = 'status';
        var db_field_id = 'status_id';
        var loader_element_id = 'client_info_form'
        var item_id = 0;
        var message_title = 'status';
        if(action=="add"){
            var title = 'Add status';
            data_modal_box_add(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
        } else if(action=="edit"){
            var item_id = $("#"+element_id+" :selected").val();
            var item_name = $("#"+element_id+" :selected").text();
            var title = 'Edit status';
            data_modal_box_edit(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,item_name,success_msg_id,error_msg_id,loader_element_id,message_title)
        } else if(action=="delete"){
            var title = 'Delete status';
            item_id = element_id;
            data_modal_box_delete(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
        }
    }
    
    function data_modal_box_company_type(action){
        var add_div = 'client-inof-type-of-company-plus-icon';
        var edit_delete_div = 'client-inof-type-of-company-edit-delete-icon';
        var element_id = 'client-inof-type-of-company-show-hide_div';
        var success_msg_id = 'client_info_success_msg';
        var error_msg_id = 'client_info_err_msg';
        var placeholder = 'Type of company';
        var dbname = 'db_cd_company_type';
        var db_field_name = 'company_type';
        var db_field_id = 'ctype_id';
        var loader_element_id = 'client_info_form'
        var item_id = 0;
        var message_title = 'type of company';
        if(action=="add"){
            var title = 'Add type of company';
            data_modal_box_add(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
        } else if(action=="edit"){
            var item_id = $("#"+element_id+" :selected").val();
            var item_name = $("#"+element_id+" :selected").text();
            var title = 'Edit type of company';
            data_modal_box_edit(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,item_name,success_msg_id,error_msg_id,loader_element_id,message_title)
        } else if(action=="delete"){
            var title = 'Delete type of company';
            item_id = element_id;
            data_modal_box_delete(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
        }
    }
    
    function data_modal_box_activity(action){
        var add_div = 'client-info-activity-plus-icon';
        var edit_delete_div = 'client-info-activity-edit-delete-icon';
        var element_id = 'client-info-activity-show-hide_div';
        var success_msg_id = 'activity_success_msg';
        var error_msg_id = 'activity_err_msg';
        var placeholder = 'Activity';
        var dbname = 'db_cd_activity';
        var db_field_name = 'activity';
        var db_field_id = 'activity_id';
        var loader_element_id = 'client_info_form'
        var item_id = 0;
        var message_title = 'activity';
        if(action=="add"){
            var title = 'Add activity';
            data_modal_box_add_a(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
        } else if(action=="edit"){
            var item_id = $("#"+element_id+" :selected").val();
            var item_name = $("#"+element_id+" :selected").text();
            var title = 'Edit activity';
            data_modal_box_edit_a(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,item_name,success_msg_id,error_msg_id,loader_element_id,message_title)
        } else if(action=="delete"){
            var title = 'Delete activity';
            item_id = element_id;
            data_modal_box_delete_a(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
        }
    }
    
    function reset_form(form_id,tag){
        if(tag=="client"){
            var client_within = '<?php echo $corporate_data[0]['within_group'];?>';
            if(client_within==1){
                $('#client-info-group-company_show_hide_div').fadeIn();
            } else {
                $('#client-info-group-company_show_hide_div').fadeOut();
            }
        }
        
        if(form_id=="activity_info" && $('#client-info-activity-show-hide_div').val()==""){
            $('#client-info-activity_show_hide_input_filed').fadeIn();
        }
        $('#'+form_id)[0].reset();
    }
    
    /* Start code for modal box */
function data_modal_box_add_a(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title){
        $('#item_name').css('border','solid 1px #e1e0df');
        bootbox.dialog({
            message: '<input type="text" id="item_name" name="name" style="height:28px;" class="form-control" placeholder="'+placeholder+'"><div id="err_cat" style="color:#a94442;margin-top:4px;display:none;font-size: 13px;">This field is required.</div>',
            title: title,
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-sm btn-success pull-right modal-custom-button",
                    callback: function() {
                        var item_name = $('#item_name').val();
                        if($('#item_name').val()==""){
                            $('#err_cat').show();
                            $('#item_name').css('border','solid 1px #ebccd1');
                            $('#item_name').focus();
                            return false;
                        }
                        submit_item_a(title,element_id,placeholder,dbname,action,item_name,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
                    }
                },
                danger: {
                    label: "Cancel",
                    className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                    callback: function() {

                    }
                }
            }
        });
        $('#item_name').on('keyup',function(){
            $('#item_name').css('border','solid 1px #e1e0df');
            $('#err_cat').hide();
        });
        
    }
    
    function data_modal_box_edit_a(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,item_name_pre,success_msg_id,error_msg_id,loader_element_id,message_title){
        $('#item_name').css('border','solid 1px #e1e0df');
        
        bootbox.dialog({
            message: '<input type="text" id="item_name" value="'+item_name_pre+'" name="name" style="height:28px;" class="form-control" placeholder="'+placeholder+'"><div id="err_cat" style="color:#a94442;margin-top:4px;display:none;font-size: 13px;">This field is required.</div>',
            title: title,
            buttons: {
                success: {
                    label: "Save Changes",
                    className: "btn-sm btn-success pull-right modal-custom-button",
                    callback: function() {
                        var item_name = $('#item_name').val();
                        if($('#item_name').val()==""){
                            $('#err_cat').show();
                            $('#item_name').css('border','solid 1px #ebccd1');
                            $('#item_name').focus();
                            return false;
                        }
                        submit_item_a(title,element_id,placeholder,dbname,action,item_name,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
                    }
                },
                danger: {
                    label: "Cancel",
                    className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                    callback: function() {

                    }
                }
            }
        });
        $('#item_name').on('keyup',function(){
            $('#item_name').css('border','solid 1px #e1e0df');
            $('#err_cat').hide();
        });
        
    }
    function data_modal_box_delete_a(title,element_id,placeholder,dbname,action,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title){
        $('#item_name').css('border','solid 1px #e1e0df');
        item_id = $('#'+item_id).val();
        console.log(item_id);
        bootbox.dialog({
            message: 'Are you sure you want to delete this record?',
            title: title,
            buttons: {
                success: {
                    label: "Yes",
                    className: "btn-sm btn-success pull-right modal-custom-button",
                    callback: function() {
                        var item_name = '';
                        submit_item_a(title,element_id,placeholder,dbname,action,item_name,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title)
                    }
                },
                danger: {
                    label: "No",
                    className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                    callback: function() {

                    }
                }
            }
        });
        $('#item_name').on('keyup',function(){
            $('#item_name').css('border','solid 1px #e1e0df');
            $('#err_cat').hide();
        });
        
    }
    
    function submit_item_a(title,element_id,placeholder,dbname,action,item_name,db_field_name,db_field_id,item_id,add_div,edit_delete_div,success_msg_id,error_msg_id,loader_element_id,message_title){
        blockUI(loader_element_id);
        item_name = $.trim(item_name);
        var object = {
                        title:title,
                        element_id:element_id,
                        placeholder:placeholder,
                        dbname:dbname,
                        item_name:item_name,
                        item_id:item_id,
                        db_field_name:db_field_name,
                        db_field_id:db_field_id,
                        action:action,
                        message_title:message_title
                    }
        var url=CURRENT_URL;
        $.ajax({
            type: "POST",
            url: url+"/databaseinfo/modal_box_data",
            dataType: 'json',
            data: object,
            success: function(msg){
                var status = msg.status;
                var message = msg.message;
                var item_data = msg.data;
                var insert_id = msg.insert_id;
                var str = '';
                str += '<option value="" selected="selected">Select</option>';
                $.each(item_data, function(i) {
                        if(item_data[i][db_field_name]==item_name)
                            str += '<option value="' + item_data[i][db_field_id] + '" selected="selected">' + item_data[i][db_field_name] + '</option>';
                        else
                            str += '<option value="' + item_data[i][db_field_id] + '">' + item_data[i][db_field_name] + '</option>';
                });
                if(action=="delete"){
                    $('#'+add_div).show();
                    $('#'+edit_delete_div).hide();
                    $('#client-info-activity_show_hide_input_filed').hide();


                } else {
                    if(action=="add" && status==0){
                        $('#'+add_div).show();
                        $('#'+edit_delete_div).hide();
                    } else {
                        $('#'+add_div).hide();
                        $('#'+edit_delete_div).show();
                    }
                }
                if(status==1){
                    $('#'+element_id).html(str);
                }
                
                if(status==1 && action=='add'){
                    $('#client-info-activity_show_hide_input_filed').show();
                }
                // last message and refresh list
                if(status==1){
                    $('.success-msg').text(message)
                    $('#'+success_msg_id).fadeIn();
                    setTimeout(function(){
                        $('#'+success_msg_id).fadeOut();
                    },4000);
                } else {
                    $('.error-msg').text(message)
                    $('#'+error_msg_id).fadeIn();
                    setTimeout(function(){
                        $('#'+error_msg_id).fadeOut();
                    },4000);
                }
                unblockUI(loader_element_id);
            }
        });
    }
    
    
</script>
