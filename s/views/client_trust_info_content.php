<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal margin-none">
            <div class="overflow-x">   
                <?php if ($userPrivileges->client_database->trust->Add == 1) { ?>
                <a href="#add-trust-info" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
                <?php } ?>
                <table class="dynamicTable tableTools table table-striped overflow-x">
                    <thead class="bg-gray">
                        <tr role="row">
                            <th class="thead-th-tr-textarea" style="padding-left: 5px !important;">Trust type</th>
                            <th class="thead-th-tr-textarea">Trustee name</th>
                            <th class="thead-th-tr-textarea">Settlor name</th>
                            <th class="thead-th-tr-textarea">Beneficiaries name</th>
                            <th style="width:100px !important; text-align:right"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($client_trust_info_detail)) {
                            foreach ($client_trust_info_detail as $client_trust_info) {
                                ?>
                                <tr role="row" id="add-more_tr">
                                    <td class="tbody-tr-td-area">
                                        <div class="td-area-form-marg">
                                            <?php echo $client_trust_info->trust_type_name; ?> 
                                        </div>
                                    </td>
                                    <td class="tbody-tr-td-area drectorship_hidden-filed">
                                        <div class="td-area-form-marg">
                                            <?php echo $client_trust_info->trustee_name; ?> 
                                        </div>
                                    </td>
                                    <td class="tbody-tr-td-area">
                                        <div class="td-area-form-marg">
                                            <?php echo $client_trust_info->settlor_name; ?> 
                                        </div>
                                    </td>
                                    <td class="tbody-tr-td-area">
                                        <div class="td-area-form-marg">
                                            <?php echo $client_trust_info->beneficiaries_name; ?> 
                                        </div>
                                    </td>

                                    <td style="width:100px !important; padding:3px; text-align:center;">
                                        <?php if ($userPrivileges->client_database->trust->Delete == 1) { ?>
                                        <a href="#delete-popup_div" data-toggle="modal" onclick="delete_client_trust_info('<?php echo $client_trust_info->client_trust_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon" style="margin-left:5px;"><i class="fa fa-trash-o td-icon_font-size"></i></a>
                                        <?php } 
                                         if ($userPrivileges->client_database->trust->Edit == 1) { 
                                        ?>
                                        <a href="#edit-trust-info" data-toggle="modal" onclick="edit_client_trust_info('<?php echo $client_trust_info->client_trust_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon"><i class="fa fa-pencil td-icon_font-size"></i></a>
        <?php }  ?>
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
<div class="modal fade"  id="add-trust-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Trust Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_trust_info">
                        <input type="hidden" name="client_id" id="client_id" value="<?php echo $client_id; ?>">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Type of Trust</label>
                            <select class="form-control input_area plahole_font height_25" name="trust_type_id" id="trust_type_id" style="width:100%; padding-top: 0px;">
                                <option value="">-- select one --</option>
                                <?php foreach ($trust_type_detail as $trust_type) {
                                    ?>
                                    <option value="<?php echo $trust_type->trust_type_id; ?>"><?php echo $trust_type->trust_type_name; ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group td-area-form-marg" id="trust_type_id-hidden_filed" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Other Type of Trust</label>
                            <input type="text" class="form-control height_25 plahole_font" name="trust_type_other" id="trust_type_other" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Does the Trust hold a global business licence</label>
                            <input type="radio" name="global_business_licence" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="global_business_licence" style="margin-left:10px;float:left" value="No">
                            <span style="float:left">&nbsp;No</span>
                            <input type="radio" name="global_business_licence" style="margin-left:10px;float:left" value="NA" checked>
                            <span style="float:left">&nbsp;NA</span>

                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Trust Deed available</label>
                            <input type="radio" name="trust_deed_available" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="trust_deed_available" style="margin-left:10px;float:left" value="No" checked>
                            <span style="float:left">&nbsp;No</span>

                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of Trustees</label>
                            <input type="text" class="form-control height_25 plahole_font" name="trustee_name" id="trustee_name" style="width: 100%;">
                        </div>
                        <h4 class="modal-title">KYC on non-resident trustee</h4>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of Expiry of passport</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="non_resident_trustee_passport_expiry_date" id="non_resident_trustee_passport_expiry_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Utility bill available and dated</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="non_resident_trustee_utility_bill_available_and_dated" id="non_resident_trustee_utility_bill_available_and_dated"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>

                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of Settlor</label>
                            <input type="text" class="form-control height_25 plahole_font" name="settlor_name" id="settlor_name" style="width: 100%;">
                        </div>
                        <h4 class="modal-title">KYC available on Settlors</h4>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of Expiry of passport</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="settlor_passport_expiry_date" id="settlor_passport_expiry_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Utility bill available and dated</label>
                            <div class="input-group date datepicker2" style="width:100%;">
                                <input class="form-control height_25" type="text" name="settlor_utility_bill_available_and_dated" id="settlor_utility_bill_available_and_dated"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of Beneficiaries</label>
                            <input type="text" class="form-control height_25 plahole_font" name="beneficiaries_name" id="beneficiaries_name" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Letter of wishes available for non-discretionary trust</label>
                        	<div style="margin-left:300px;position: absolute;">
								<input type="radio" name="letter_of_wishes" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="letter_of_wishes" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Declaration of non-residence available</label>
                            <div style="margin-left:300px;position: absolute;">
								<input type="radio" name="declaration_of_non_residence_available" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="declaration_of_non_residence_available" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Are accounts prepared?</label>
                             <div style="margin-left:300px;position: absolute;">
								<input type="radio" name="accounts_prepared" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="accounts_prepared" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
							</div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Tax returns filed?</label>
                             <div style="margin-left:300px;position: absolute;">
								<input type="radio" name="tax_returns" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="tax_returns" style="margin-left:10px;float:left" value="No" checked>
								<span style="float:left">&nbsp;No</span>
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
<div class="modal fade"  id="edit-trust-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Trust Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="edit_trust_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Type of Trust</label>
                            <select class="form-control input_area plahole_font height_25" name="edit_trust_type_id" id="edit_trust_type_id" style="width:100%; padding-top: 0px;">
                                <option value="">-- select one --</option>
                                <?php foreach ($trust_type_detail as $trust_type) {
                                    ?>
                                    <option value="<?php echo $trust_type->trust_type_id; ?>"><?php echo $trust_type->trust_type_name; ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group td-area-form-marg" id="edit_trust_type_id-hidden_filed" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Other Type of Trust</label>
                            <input type="text" class="form-control height_25 plahole_font" name="edit_trust_type_other" id="edit_trust_type_other" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Does the Trust hold a global business licence</label>
                            <input type="radio" name="edit_global_business_licence" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="edit_global_business_licence" style="margin-left:10px;float:left" value="No">
                            <span style="float:left">&nbsp;No</span>
                            <input type="radio" name="edit_global_business_licence" style="margin-left:10px;float:left" value="NA">
                            <span style="float:left">&nbsp;NA</span>

                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Trust Deed available</label>
                            <input type="radio" name="edit_trust_deed_available" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="edit_trust_deed_available" style="margin-left:10px;float:left" value="No">
                            <span style="float:left">&nbsp;No</span>

                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of Trustees</label>
                            <input type="text" class="form-control height_25 plahole_font" name="edit_trustee_name" id="edit_trustee_name" style="width: 100%;">
                        </div>
                        <h4 class="modal-title">KYC on non-resident trustee</h4>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of Expiry of passport</label>
                            <div class="input-group date datepicker2" id="edit_non_resident_trustee_passport_expiry_date_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_non_resident_trustee_passport_expiry_date" id="edit_non_resident_trustee_passport_expiry_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Utility bill available and dated</label>
                            <div class="input-group date datepicker2" id="edit_non_resident_trustee_utility_bill_available_and_dated_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_non_resident_trustee_utility_bill_available_and_dated" id="edit_non_resident_trustee_utility_bill_available_and_dated"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>

                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of Settlor</label>
                            <input type="text" class="form-control height_25 plahole_font" name="edit_settlor_name" id="edit_settlor_name" style="width: 100%;">
                        </div>
                        <h4 class="modal-title">KYC available on Settlors</h4>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Date of Expiry of passport</label>
                            <div class="input-group date datepicker2" id="edit_settlor_passport_expiry_date_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_settlor_passport_expiry_date" id="edit_settlor_passport_expiry_date"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Utility bill available and dated</label>
                            <div class="input-group date datepicker2" id="edit_settlor_utility_bill_available_and_dated_datepicker" style="width:100%;">
                                <input class="form-control height_25" type="text" name="edit_settlor_utility_bill_available_and_dated" id="edit_settlor_utility_bill_available_and_dated"/>
                                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of Beneficiaries</label>
                            <input type="text" class="form-control height_25 plahole_font" name="edit_beneficiaries_name" id="edit_beneficiaries_name" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Letter of wishes available for non-discretionary trust</label>
                             <div style="margin-left:300px;position: absolute;">
								<input type="radio" name="edit_letter_of_wishes" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="edit_letter_of_wishes" style="margin-left:10px;float:left" value="No">
								<span style="float:left">&nbsp;No</span>
							</div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Declaration of non-residence available</label>
                        	 <div style="margin-left:300px;position: absolute;">
								<input type="radio" name="edit_declaration_of_non_residence_available" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="edit_declaration_of_non_residence_available" style="margin-left:10px;float:left" value="No">
								<span style="float:left">&nbsp;No</span>
							</div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Are accounts prepared?</label>
                             <div style="margin-left:300px;position: absolute;">
								<input type="radio" name="edit_accounts_prepared" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="edit_accounts_prepared" style="margin-left:10px;float:left" value="No">
								<span style="float:left">&nbsp;No</span>
							</div>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Tax returns filed?</label>
                             <div style="margin-left:300px;position: absolute;">
								<input type="radio" name="edit_tax_returns" style="float:left" value="Yes">
								<span style="float:left">&nbsp;Yes</span>
								<input type="radio" name="edit_tax_returns" style="margin-left:10px;float:left" value="No">
								<span style="float:left">&nbsp;No</span>
							</div>
                        </div>
                        <input type="hidden" name="edit_client_trust_info_id" id="edit_client_trust_info_id" value="">
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
        $("#trust_type_id-hidden_filed").hide();
        $('.datepicker2').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true
        });
        $('#trust_type_id').on('change', function () {
            if ($("#trust_type_id option:selected").text() == 'Other') {
                $("#trust_type_id-hidden_filed").show();
            }
            else {
                $("#trust_type_id-hidden_filed").hide();
                $('#trust_type_other').val('');
            }
        });
        $('#edit_trust_type_id').on('change', function () {
            if ($("#edit_trust_type_id option:selected").text() == 'Other') {
                $("#edit_trust_type_id-hidden_filed").show();
            }
            else {
                $("#edit_trust_type_id-hidden_filed").hide();
                $('#edit_trust_type_other').val('');
            }
        });
        $('#add-trust-info').on('shown.bs.modal', function () {
            $('#add_trust_info').bootstrapValidator('resetForm', true);
        });
        $('#add_trust_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                trust_type_id: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                trustee_name: {
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
                    var data = $("#add_trust_info").serialize();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client_trust_info',
                        dataType: "json",
                        data: data,
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#add-trust-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    window.stop();
                                    window_location();
                                }
                                else
                                {
                                    $("#add-trust-info").modal("show");
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


        $('#edit_trust_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                edit_trust_type_id: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                edit_trustee_name: {
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
                    var data = $("#edit_trust_info").serialize();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client_trust_info',
                        dataType: "json",
                        data: data,
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#edit-trust-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                    window.stop();
                                    window_location();
                                }
                                else
                                {
                                    $("#edit-trust-info").modal("show");
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

    function edit_client_trust_info(id) {
        var client_id = <?php echo $client_id; ?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_trust_info',
            type: "POST",
            data: {client_id: client_id, client_trust_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_trust_info_id').val(item.client_trust_info_id);
                $('#edit_trust_type_id').val(item.trust_type_id);
                if ($("#edit_trust_type_id option:selected").text() == 'Other') {
                    $("#edit_trust_type_id-hidden_filed").show();
                    $('#edit_trust_type_other').val(item.trust_type_other);
                }
                else {
                    $("#edit_trust_type_id-hidden_filed").hide();
                    $('#edit_trust_type_other').val('');
                }

                $('input[name=edit_global_business_licence][value=' + item.global_business_licence + ']').prop('checked', true);
                $('input[name=edit_trust_deed_available][value=' + item.trust_deed_available + ']').prop('checked', true);
                $('#edit_trustee_name').val(item.trustee_name);
                $('#edit_non_resident_trustee_passport_expiry_date').val(item.non_resident_trustee_passport_expiry_date);
                $('#edit_non_resident_trustee_passport_expiry_date_datepicker').bdatepicker("update", item.non_resident_trustee_passport_expiry_date);
                $('#edit_non_resident_trustee_utility_bill_available_and_dated').val(item.non_resident_trustee_utility_bill_available_and_dated);
                $('#edit_non_resident_trustee_utility_bill_available_and_dated_datepicker').bdatepicker("update", item.non_resident_trustee_utility_bill_available_and_dated);
                $('#edit_settlor_name').val(item.settlor_name);
                $('#edit_settlor_passport_expiry_date').val(item.settlor_passport_expiry_date);
                $('#edit_settlor_passport_expiry_date_datepicker').bdatepicker("update", item.settlor_passport_expiry_date);
                $('#edit_settlor_utility_bill_available_and_dated').val(item.settlor_utility_bill_available_and_dated);
                $('#edit_settlor_utility_bill_available_and_dated_datepicker').bdatepicker("update", item.settlor_utility_bill_available_and_dated);
                $('#edit_beneficiaries_name').val(item.beneficiaries_name);
                $('input[name=edit_letter_of_wishes][value=' + item.letter_of_wishes + ']').prop('checked', true);
                $('input[name=edit_declaration_of_non_residence_available][value=' + item.declaration_of_non_residence_available + ']').prop('checked', true);
                $('input[name=edit_accounts_prepared][value=' + item.accounts_prepared + ']').prop('checked', true);
                $('input[name=edit_tax_returns][value=' + item.tax_returns + ']').prop('checked', true);

            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_trust_info(id) {
        bootbox.confirm("Are you sure you want to delete trust information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_trust_info',
                    type: "POST",
                    data: {client_trust_info_id: id},
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
    function window_location() {
        <!--
                window.location = "<?php echo site_url('client/client_detail/' . $client_id); ?>?tab_id=<?php echo $tab_id; ?>";
                        //-->
                    }
</script>