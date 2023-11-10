<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal margin-none">
			<div class="overflow-x">   
				<?php if ($userPrivileges->client_database->bank->Add == 1) { ?>
				<a href="#add-bank-info" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
				<?php } ?>
				<table class="dynamicTable tableTools table table-striped overflow-x">
					<thead class="bg-gray">
						<tr role="row">
							<th class="thead-th-tr-textarea" style="padding-left: 5px !important;">Name of bank</th>
							<th class="thead-th-tr-textarea">Type of account</th>
							<th class="thead-th-tr-textarea">Currency</th>
							<th class="thead-th-tr-textarea">Date account opened </th>
							<th class="thead-th-tr-textarea">Name of <br />bank signatories </th>
							<th class="thead-th-tr-textarea">Is the company on <br />internet banking?</th>
							<th style="width:100px !important; text-align:right"></th>
						</tr>
					</thead>
                        <tbody>
                        <?php
                    	if (!empty($client_bank_info_detail)) {
                        	foreach ($client_bank_info_detail as $client_bank_info) {
                        ?>
							<tr role="row" id="add-more_tr">
								<td class="tbody-tr-td-area">
									<div class="td-area-form-marg">
										<?php echo $client_bank_info->bank_name; ?> 
									</div>
								</td>
								<td class="tbody-tr-td-area drectorship_hidden-filed">
									<div class="td-area-form-marg">
										<?php echo $client_bank_info->account_type; ?> 
									</div>
								</td>
								<td class="tbody-tr-td-area">
									<div class="td-area-form-marg">
										<?php echo $client_bank_info->currency_name; ?> 
									</div>
								</td>
								<td class="tbody-tr-td-area">
									<div class="td-area-form-marg">
										<?php echo $client_bank_info->date_account_opened; ?> 
									</div>
								</td>
								<td class="tbody-tr-td-area">
									<div class="td-area-form-marg">
										<?php echo $client_bank_info->bank_signatories; ?> 
									</div>
								</td>
								<td class="tbody-tr-td-area">
									<div class="td-area-form-marg">
										<?php echo $client_bank_info->internet_banking; ?> 
									</div>
								</td>
								<td style="width:100px !important; padding:3px; text-align:center;">
									<?php if ($userPrivileges->client_database->bank->Delete == 1) { ?>
									<a href="#delete-popup_div" data-toggle="modal" onclick="delete_client_bank_info('<?php echo $client_bank_info->client_bank_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon" style="margin-left:5px;"><i class="fa fa-trash-o td-icon_font-size"></i></a>
									<?php } 
									if ($userPrivileges->client_database->bank->Edit == 1) { ?>
									<a href="#edit-bank-info" data-toggle="modal" onclick="edit_client_bank_info('<?php echo $client_bank_info->client_bank_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon"><i class="fa fa-pencil td-icon_font-size"></i></a>
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
<div class="modal fade"  id="add-bank-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Bank Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_bank_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of bank</label>
                            <input type="text" class="form-control height_25 plahole_font" name="bank_name" id="bank_name" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Type of account</label>
                            <input type="text" class="form-control height_25 plahole_font" name="account_type" id="account_type" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Currency</label>
                            <select class="form-control input_area plahole_font height_25" name="currency_id" id="currency_id" style="width:100%; padding-top: 0px;">
                                <option value="">-- select one --</option>
                                <?php  foreach ($currency_detail as $currency) { 
                        ?>
                            <option value="<?php echo $currency->currency_id;?>"><?php echo $currency->currency_name;?></option>
                        <?php
                        }
                        ?>

                            </select>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date account opened</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="date_account_opened" id="date_account_opened"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of bank signatories</label>
                            <input type="text" class="form-control height_25 plahole_font" name="bank_signatories" id="bank_signatories" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Internet banking</label>
                            <input type="radio" name="internet_banking" style="float:left" value="Yes" checked>
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="internet_banking" style="margin-left:10px;float:left" value="No">
                            <span style="float:left">&nbsp;No</span>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Additional information</label>
                            <textarea type="text" class="form-control plahole_font" name="additional_info" id="additional_info" style="resize: vertical; height:75px; width: 100%;"></textarea>
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
<div class="modal fade"  id="edit-bank-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Bank Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="edit_bank_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of bank</label>
                            <input type="text" placeholder="Name of bank" class="form-control height_25 plahole_font" name="edit_bank_name" id="edit_bank_name" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Type of account</label>
                            <input type="text" placeholder="Type of account" class="form-control height_25 plahole_font" name="edit_account_type" id="edit_account_type" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Currency</label>
                            <select class="form-control input_area plahole_font height_25" name="edit_currency_id" id="edit_currency_id" style="width:100%; padding-top: 0px;">
                                <option value="">-- select one --</option>
                                <?php  foreach ($currency_detail as $currency) { 
                        ?>
                            <option value="<?php echo $currency->currency_id;?>"><?php echo $currency->currency_name;?></option>
                        <?php
                        }
                        ?>

                            </select>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date account opened</label>
                            <div class="input-group date datepicker2" id="edit_date_account_opened_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_date_account_opened" id="edit_date_account_opened"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of bank signatories</label>
                            <input type="text" placeholder="Name of bank signatories" class="form-control height_25 plahole_font" name="edit_bank_signatories" id="edit_bank_signatories" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Internet Banking</label>
                            <input type="radio" name="edit_internet_banking" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="edit_internet_banking" style="margin-left:10px;float:left" value="No">
                            <span style="float:left">&nbsp;No</span>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Additional Info</label>
                            <textarea type="text" class="form-control plahole_font" name="edit_additional_info" id="edit_additional_info" style="resize: vertical; height:75px; width: 100%;"></textarea>
                        </div>
                        <input type="hidden" id="edit_client_bank_info_id" value="">
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
            $('#add_bank_info').bootstrapValidator('revalidateField', 'date_account_opened');
            $('#edit_bank_info').bootstrapValidator('revalidateField', 'edit_date_account_opened');
        });
         
        $('#add-bank-info').on('shown.bs.modal', function () {
            $('#add_bank_info').bootstrapValidator('resetForm', true);
        });
        $('#add_bank_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                bank_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                account_type: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                date_account_opened: {
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
                    comp.bank_name = $('#bank_name').val();
                    comp.account_type = $('#account_type').val();
                    comp.currency_id = $('#currency_id').val();
                    comp.date_account_opened = $('#date_account_opened').val();
                    comp.bank_signatories = $("#bank_signatories").val();
                    comp.internet_banking = $("input[name=internet_banking]:checked").val();
                    comp.additional_info = $("#additional_info").val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client_bank_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#add-bank-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#add-bank-info").modal("show");
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


        $('#edit_bank_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                 edit_bank_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                edit_account_type: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                edit_date_account_opened: {
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
                    comp.client_bank_info_id = $('#edit_client_bank_info_id').val();
                    comp.bank_name = $('#edit_bank_name').val();
                    comp.account_type = $('#edit_account_type').val();
                    comp.currency_id = $('#edit_currency_id').val();
                    comp.date_account_opened = $('#edit_date_account_opened').val();
                    comp.bank_signatories = $("#edit_bank_signatories").val();
                    comp.internet_banking = $("input[name=edit_internet_banking]:checked").val();
                    comp.additional_info = $("#edit_additional_info").val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client_bank_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#edit-bank-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#edit-bank-info").modal("show");
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

    function edit_client_bank_info(id) {
    var client_id = <?php echo $client_id;?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_bank_info',
            type: "POST",
            data: {client_id:client_id,client_bank_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_bank_info_id').val(item.client_bank_info_id);
                $('#edit_bank_name').val(item.bank_name);
                $('#edit_account_type').val(item.account_type);
                $('#edit_currency_id').val(item.currency_id);
                $('#edit_date_account_opened').val(item.date_account_opened);
                $('#edit_date_account_opened_datepicker').bdatepicker("update", item.date_account_opened);
                $('#edit_bank_signatories').val(item.bank_signatories);
                $('input[name=edit_internet_banking][value=' + item.internet_banking + ']').prop('checked',true);
                $('#edit_additional_info').val(item.additional_info);
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_bank_info(id) {
        bootbox.confirm("Are you sure you want to delete bank information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_bank_info',
                    type: "POST",
                    data: {client_bank_info_id: id},
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