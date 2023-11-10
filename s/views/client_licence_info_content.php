<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal margin-none">
			<div class="overflow-x">   
				<?php if ($userPrivileges->client_database->licence->Add == 1) { ?>
				<a href="#add-licence-info" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
				<?php } ?>
				<table class="dynamicTable tableTools table table-striped overflow-x">
					<thead class="bg-gray">
						<tr role="row">
						   <th class="thead-th-tr-textarea" style="padding-left: 5px !important;">Type of licences</th>
							<th class="thead-th-tr-textarea">Date of issue of the licence</th>
							<th class="thead-th-tr-textarea">Date of expiry of the licence</th>
							<th style="width:100px !important; text-align:right"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (!empty($client_licence_info_detail)) {
						foreach ($client_licence_info_detail as $client_licence_info) {
							?>
						<tr role="row" id="add-more_tr">
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_licence_info->licence_type_name; ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area drectorship_hidden-filed">
								<div class="td-area-form-marg">
									<?php echo $client_licence_info->issue_date; ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area drectorship_hidden-filed">
								<div class="td-area-form-marg">
									<?php echo $client_licence_info->expiry_date; ?> 
								</div>
							</td>
							
							<td style="width:100px !important; padding:3px; text-align:center;">
								<?php if ($userPrivileges->client_database->licence->Delete == 1) { ?>
								<a href="#delete-popup_div" data-toggle="modal" onclick="delete_client_licence_info('<?php echo $client_licence_info->client_licence_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon" style="margin-left:5px;"><i class="fa fa-trash-o td-icon_font-size"></i></a>
								<?php } 
							    if ($userPrivileges->client_database->licence->Edit == 1) { ?>
								<a href="#edit-licence-info" data-toggle="modal" onclick="edit_client_licence_info('<?php echo $client_licence_info->client_licence_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon"><i class="fa fa-pencil td-icon_font-size"></i></a>
								 <?php } ?>
							</td>
						</tr>
						<?php
						}
						}
						?>
					</tbody>
				</table>
			</div>
		</form>
	</div>
</div>
<div class="modal fade"  id="add-licence-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Other Type of licences Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_licence_info">
                        <input type="hidden" name="client_id" id="client_id" value="<?php echo $client_id;?>">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Type of licences</label>
                            <select class="form-control input_area plahole_font height_25" name="licence_type_id" id="licence_type_id" style="width:100%; padding-top: 0px;">
                                <option value="">-- select one --</option>
                                <?php  foreach ($licence_type_detail as $licence_type) { 
                        ?>
                            <option value="<?php echo $licence_type->licence_type_id;?>"><?php echo $licence_type->licence_type_name;?></option>
                        <?php
                        }
                        ?>

                            </select>
                        </div>
                        
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of issue of the licence</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="issue_date" id="issue_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of expiry of the licence</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="expiry_date" id="expiry_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Special licensing conditions</label>
                            <textarea type="text" class="form-control height_25 plahole_font" name="licensing_conditions" id="licensing_conditions" style="resize: vertical; height:75px; width: 100%;"></textarea>
                        </div>
                        <div class="form-group td-area-form-marg" style="padding-bottom: 15px;float: inherit; margin-top:30px;">
                            <button class="btn btn-success pull-right">Save</button>
                            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:10px;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade"  id="edit-licence-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Other Type of licences Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="edit_licence_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Type of Trust</label>
                            <select class="form-control input_area plahole_font height_25" name="edit_licence_type_id" id="edit_licence_type_id" style="width:100%; padding-top: 0px;">
                                <option value="">-- select one --</option>
                                <?php  foreach ($licence_type_detail as $licence_type) { 
                        ?>
                            <option value="<?php echo $licence_type->licence_type_id;?>"><?php echo $licence_type->licence_type_name;?></option>
                        <?php
                        }
                        ?>

                            </select>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of issue of the licence</label>
                            <div class="input-group date datepicker2" id="edit_issue_date_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_issue_date" id="edit_issue_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of expiry of the licence</label>
                            <div class="input-group date datepicker2" id="edit_expiry_date_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_expiry_date" id="edit_expiry_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Special licensing conditions</label>
                            <textarea type="text" class="form-control height_25 plahole_font" name="edit_licensing_conditions" id="edit_licensing_conditions" style="resize: vertical; height:75px; width: 100%;"></textarea>
                        </div>
                         <input type="hidden" name="edit_client_licence_info_id" id="edit_client_licence_info_id" value="">
                        <div class="form-group td-area-form-marg" style="padding-bottom: 15px;float: inherit; margin-top:30px;">
                            <button class="btn btn-success pull-right">Save</button>
                            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:10px;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
         $('.datepicker2').bdatepicker({
		format: "dd MM yyyy",
		 autoclose: true
	}).on('changeDate', function(e) {
            // Revalidate the date field
            $('#add_licence_info').bootstrapValidator('revalidateField', 'issue_date');
            $('#edit_licence_info').bootstrapValidator('revalidateField', 'edit_issue_date');
        });
         
        $('#add-licence-info').on('shown.bs.modal', function () {
            $('#add_licence_info').bootstrapValidator('resetForm', true);
        });
        $('#add_licence_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                licence_type_id: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                issue_date: {
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
            $('.btn-success').attr("disabled", "disabled");
                    var data = $( "#add_licence_info" ).serialize();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client_licence_info',
                        dataType: "json",
                        data: data,
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#add-licence-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#add-licence-info").modal("show");
                                }

                            });

                        },
                        error: function (xhr, status, error) {
                            bootbox.alert(status);
                        },
                        complete: function ()
                        {
                            $("#addloader").hide();
                        }
                    });
                });


        $('#edit_licence_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                  edit_licence_type_id: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                edit_issue_date: {
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
            $('.btn-success').attr("disabled", "disabled");
                    var data = $( "#edit_licence_info" ).serialize();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client_licence_info',
                        dataType: "json",
                        data: data,
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#edit-licence-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#edit-licence-info").modal("show");
                                }

                            });
                        },
                        error: function (xhr, status, error) {
                            alert(status);
                        },
                        complete: function ()
                        {
                            $("#editloader").hide();
                        }
                    });



                });
        initTables();
         $('.dataTables_filter').hide();
    });

    function edit_client_licence_info(id) {
    var client_id = <?php echo $client_id;?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_licence_info',
            type: "POST",
            data: {client_id:client_id,client_licence_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_licence_info_id').val(item.client_licence_info_id);
                $('#edit_licence_type_id').val(item.licence_type_id);
                $('#edit_issue_date').val(item.issue_date);
                $('#edit_issue_date_datepicker').bdatepicker("update", item.issue_date);
                $('#edit_expiry_date').val(item.expiry_date);
                $('#edit_expiry_date_datepicker').bdatepicker("update", item.expiry_date);
                $('#edit_licensing_conditions').val(item.licensing_conditions);
                
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_licence_info(id) {
        bootbox.confirm("Are you sure you want to delete licence information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_licence_info',
                    type: "POST",
                    data: {client_licence_info_id: id},
                    dataType: "json"
                });
                request.done(function (data) {
                    bootbox.alert(data.message, function () {
                        if (data.status == "SUCCESS")
                        {

                           window.stop();
                                   window_location();
                        }


                    });
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            }
        });

    }
    function window_location(){
        <!--
                            window.location="<?php echo site_url('client/client_detail/'.$client_id);?>?tab_id=<?php echo $tab_id;?>";
                        //-->
    }
</script>