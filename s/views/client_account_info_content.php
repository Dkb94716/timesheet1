<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal margin-none">
			<div class="overflow-x">    
				 <?php if ($userPrivileges->client_database->accounts->Add == 1) { ?>
				<a href="#account-tax_pop-up" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
				<?php } ?>
				<table class="dynamicTable tableTools table table-striped overflow-x">
					<thead class="bg-gray">
						<tr role="row">
							<th class="thead-th-tr-textarea" style="padding-left: 5px !important;">Financial year <br />ending</th>
							<th class="thead-th-tr-textarea">Accounting <br />done by</th>
							<th class="thead-th-tr-textarea">Date of last <br />audited financial <br />statements filing</th>
							<th class="thead-th-tr-textarea">Auditors</th>
							<th class="thead-th-tr-textarea">Date of last <br />annual returns <br />filing</th>
							<th class="thead-th-tr-textarea">Date of last <br />tax returns <br />filing</th>
							<th class="thead-th-tr-textarea">Date of last <br />financial summaries filing</th>
							<th style="width:100px !important; text-align:right"></th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($client_account_info_detail)) {
							foreach ($client_account_info_detail as $client_account_info) {
						?>
						<tr role="row" id="add-more_tr">
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_account_info->financial_year_end; ?> 
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_account_info->accounting_done_by; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
								   <?php echo $client_account_info->date_last_accounts_filed; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_account_info->auditors; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_account_info->date_last_annual_returns; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_account_info->date_last_tax_returns; ?>
								</div>
							</td>
							<td class="tbody-tr-td-area">
								<div class="td-area-form-marg">
									<?php echo $client_account_info->add_date_last_financial_summaries_filed; ?>
								</div>
							</td>
							<td style="width:100px !important; text-align:center;">
								<?php if ($userPrivileges->client_database->accounts->Delete == 1) { ?>
								<a href="#delete-popup_div" onclick="delete_client_account_info('<?php echo $client_account_info->client_account_info_id; ?>')" data-toggle="modal" class="btn btn-stroke btn-circle btn-danger td-icon" style="margin-left:5px;"><i class="fa fa-trash-o td-icon_font-size"></i></a>
								<?php } 
								if ($userPrivileges->client_database->accounts->Edit == 1) { ?>
								<a href="#edit-account-tax_pop-up" onclick="edit_client_account_info('<?php echo $client_account_info->client_account_info_id; ?>')" data-toggle="modal" class="btn btn-stroke btn-circle btn-danger td-icon"><i class="fa fa-pencil td-icon_font-size"></i></a>
								<?php } ?>
							</td>
						</tr>
						<?php }
					}?>
                    </tbody>
                </table>
			</div>
		</form>
	</div>
</div>
<div class="modal fade"  id="account-tax_pop-up">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Account, Tax and Audit Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_account_info">    
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Financial year end</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="financial_year_end" id="financial_year_end"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                            
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Accounting done by</label>
                            <input type="text" class="form-control height_25 plahole_font" name="accounting_done_by" id="accounting_done_by" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date last audited financial statements filed</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="date_last_accounts_filed" id="date_last_accounts_filed"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Auditors</label>
                            <input type="text" class="form-control height_25 plahole_font" name="auditors" id="auditors" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date last annual returns filed</label>
                            <div class="input-group date datepicker2" style="width: 100%;">
                                <input class="form-control height_25" type="text" name="date_last_annual_returns" id="date_last_annual_returns"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>

                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date last tax returns filed</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="date_last_tax_returns" id="date_last_tax_returns"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date last financial summaries filed</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="add_date_last_financial_summaries_filed" id="add_date_last_financial_summaries_filed"/>
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
<div class="modal fade"  id="edit-account-tax_pop-up">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Account, Tax and Audit Information</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    
                        <form class="form-horizontal" role="form" id="edit_account_info">
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Financial Year End</label>
                           
                            <div class="input-group date datepicker2" id="edit_financial_year_end_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_financial_year_end" id="edit_financial_year_end"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                            </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Accounting done by</label>
                            <input type="text" class="form-control height_25 plahole_font" name="edit_accounting_done_by" id="edit_accounting_done_by" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date last audited financial statements filed</label>
                            <div class="input-group date datepicker2" id="edit_date_last_accounts_filed_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_date_last_accounts_filed" id="edit_date_last_accounts_filed"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Auditors</label>
                            <input type="text" class="form-control height_25 plahole_font" name="edit_auditors" id="edit_auditors" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date last annual returns filed</label>
                            <div class="input-group date datepicker2" id="edit_date_last_annual_returns_datepicker" style="width: 100%;">
                                <input class="form-control height_25" type="text" name="edit_date_last_annual_returns" id="edit_date_last_annual_returns"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>

                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date last Tax returns filed</label>
                            <div class="input-group date datepicker2" id="edit_date_last_tax_returns_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_date_last_tax_returns" id="edit_date_last_tax_returns"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Add Date last financial summaries filed</label>
                            <div class="input-group date datepicker2" id="edit_add_date_last_financial_summaries_filed_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_add_date_last_financial_summaries_filed" id="edit_add_date_last_financial_summaries_filed"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                            <input type="hidden" id="edit_client_account_info_id" value="">
                        <div class="form-group td-area-form-marg" style="padding-bottom: 15px;float: inherit; margin-top:30px;">
                            <button class="btn btn-success pull-right">Save</button>
                            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:10px;">Cancel</a>
                        </div>
                        </form>
                   
                </div>
            </div>
            <!-- // Modal body END -->

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
            $('#add_account_info').bootstrapValidator('revalidateField', 'financial_year_end');
            $('#edit_account_info').bootstrapValidator('revalidateField', 'edit_financial_year_end');
        });
        $('#account-tax_pop-up').on('shown.bs.modal', function () {
            $('#add_account_info').bootstrapValidator('resetForm', true);
        });
        $('#add_account_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                financial_year_end: {
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
                    comp.financial_year_end = $('#financial_year_end').val();
                    comp.accounting_done_by = $('#accounting_done_by').val();
                    comp.date_last_accounts_filed = $('#date_last_accounts_filed').val();
                    comp.auditors = $('#auditors').val();
                    comp.date_last_annual_returns = $('#date_last_annual_returns').val();
                    comp.date_last_tax_returns = $('#date_last_tax_returns').val();
                    comp.add_date_last_financial_summaries_filed = $('#add_date_last_financial_summaries_filed').val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client_account_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#account-tax_pop-up").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                   window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#account-tax_pop-up").modal("show");
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


        $('#edit_account_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                edit_financial_year_end: {
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
                    comp.client_account_info_id = $('#edit_client_account_info_id').val();
                    comp.financial_year_end = $('#edit_financial_year_end').val();
                    comp.accounting_done_by = $('#edit_accounting_done_by').val();
                    comp.date_last_accounts_filed = $('#edit_date_last_accounts_filed').val();
                    comp.auditors = $('#edit_auditors').val();
                    comp.date_last_annual_returns = $('#edit_date_last_annual_returns').val();
                    comp.date_last_tax_returns = $('#edit_date_last_tax_returns').val();
                    comp.add_date_last_financial_summaries_filed = $('#edit_add_date_last_financial_summaries_filed').val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client_account_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#edit-account-tax_pop-up").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                  window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#edit-account-tax_pop-up").modal("show");
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

    function edit_client_account_info(id) {
    var client_id = <?php echo $client_id;?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_account_info',
            type: "POST",
            data: {client_id:client_id,client_account_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_account_info_id').val(item.client_account_info_id);
                $('#edit_financial_year_end').val(item.financial_year_end);
                $('#edit_financial_year_end_datepicker').bdatepicker("update", item.passport_expiry_date);
                $('#edit_accounting_done_by').val(item.accounting_done_by);
                $('#edit_date_last_accounts_filed').val(item.date_last_accounts_filed);
                $('#edit_date_last_accounts_filed_datepicker').bdatepicker("update", item.passport_expiry_date);
                $('#edit_auditors').val(item.auditors);
                $('#edit_date_last_annual_returns').val(item.date_last_annual_returns);
                $('#edit_date_last_annual_returns_datepicker').bdatepicker("update", item.passport_expiry_date);
                $('#edit_date_last_tax_returns').val(item.date_last_tax_returns);
                $('#edit_date_last_tax_returns_datepicker').bdatepicker("update", item.passport_expiry_date);
                $('#edit_add_date_last_financial_summaries_filed').val(item.add_date_last_financial_summaries_filed);
                $('#edit_add_date_last_financial_summaries_filed_datepicker').bdatepicker("update", item.passport_expiry_date);
                
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_account_info(id) {
        bootbox.confirm("Are you sure you want to delete Account, Tax and Audit information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_account_info',
                    type: "POST",
                    data: {client_account_info_id: id},
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