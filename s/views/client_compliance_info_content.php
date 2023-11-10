<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal margin-none">
			<div class="overflow-x">    
				<?php if ($userPrivileges->client_database->compliance->Add == 1) { ?>
				<a href="#add-compliance-info" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
				<?php } ?>
				<table class="dynamicTable tableTools table table-striped overflow-x">
					<thead class="bg-gray">
						<tr role="row">
							<th class="thead-th-tr-textarea" style="padding-left: 5px !important;">Checklist number</th>
							<th class="thead-th-tr-textarea">Date of last review</th>
							<th style="width:10% !important; text-align:right"></th>
						</tr>
					</thead>
                    <tbody>
                    <?php
                    if (!empty($client_compliance_info_detail)) {
                        foreach ($client_compliance_info_detail as $client_compliance_info) {
                            ?>
						<tr role="row" id="add-more_tr">
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_compliance_info->checklist_number; ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area drectorship_hidden-filed">
								<div class="td-area-form-marg">
									<?php echo $client_compliance_info->date_last_review; ?> 
								</div>
							</td>

							<td style="width:10% !important; padding:3px; text-align:centre;">
								<?php if ($userPrivileges->client_database->compliance->Delete == 1) { ?>
								<a href="#delete-popup_div" data-toggle="modal" onclick="delete_client_compliance_info('<?php echo $client_compliance_info->client_compliance_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon" style="margin-left:5px;"><i class="fa fa-trash-o td-icon_font-size"></i></a>
								<?php } 
								if ($userPrivileges->client_database->compliance->Edit == 1) { ?>
								<a href="#edit-compliance-info" data-toggle="modal" onclick="edit_client_compliance_info('<?php echo $client_compliance_info->client_compliance_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon"><i class="fa fa-pencil td-icon_font-size"></i></a>
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
<div class="modal fade"  id="add-compliance-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Compliance Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_compliance_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Checklist number</label>
                            <input type="text" name="checklist_number" id="checklist_number" class="form-control height_25 plahole_font" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of last review</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="date_last_review" id="date_last_review"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
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
<div class="modal fade"  id="add-compliance-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Compliance Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_compliance_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Checklist number</label>
                            <input type="text" placeholder="Checklist number" name="checklist_number" id="checklist_number" class="form-control height_25 plahole_font" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of Last review</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="date_last_review" id="date_last_review"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
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
<div class="modal fade"  id="edit-compliance-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Compliance Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="edit_compliance_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Checklist number</label>
                            <input type="text" placeholder="Checklist number" name="edit_checklist_number" id="edit_checklist_number" class="form-control height_25 plahole_font" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of Last review</label>
                            <div class="input-group date datepicker2" id="edit_date_last_review_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_date_last_review" id="edit_date_last_review"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <input type="hidden" id="edit_client_compliance_info_id" value="">
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
            $('#add_compliance_info').bootstrapValidator('revalidateField', 'date_last_review');
            $('#edit_compliance_info').bootstrapValidator('revalidateField', 'edit_date_last_review');
        });
         
        $('#add-compliance-info').on('shown.bs.modal', function () {
            $('#add_compliance_info').bootstrapValidator('resetForm', true);
        });
        $('#add_compliance_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                checklist_number: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                date_last_review: {
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
                    var comp = new Object();
                    comp.client_id = <?php echo $client_id;?>;
                    comp.checklist_number = $('#checklist_number').val();
                    comp.date_last_review = $('#date_last_review').val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client_compliance_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#add-compliance-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#add-compliance-info").modal("show");
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


        $('#edit_compliance_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                 edit_checklist_number: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                edit_date_last_review: {
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
                    var comp = new Object();
                    comp.client_compliance_info_id = $('#edit_client_compliance_info_id').val();
                    comp.checklist_number = $('#edit_checklist_number').val();
                    comp.date_last_review = $('#edit_date_last_review').val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client_compliance_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#edit-compliance-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#edit-compliance-info").modal("show");
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

    function edit_client_compliance_info(id) {
    var client_id = <?php echo $client_id;?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_compliance_info',
            type: "POST",
            data: {client_id:client_id,client_compliance_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_compliance_info_id').val(item.client_compliance_info_id);
                $('#edit_checklist_number').val(item.checklist_number);
                $('#edit_date_last_review').val(item.date_last_review);
                $('#edit_date_last_review_datepicker').bdatepicker("update", item.date_last_review);
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_compliance_info(id) {
        bootbox.confirm("Are you sure you want to delete compliance information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_compliance_info',
                    type: "POST",
                    data: {client_compliance_info_id: id},
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