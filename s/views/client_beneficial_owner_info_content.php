<div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal margin-none">
                                    <div class="overflow-x">   
                                        <?php if ($userPrivileges->client_database->beneficial->Add == 1) { ?>
                                        <a href="#add-beneficial-owner-info" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
                                        <?php } ?>
                                        <table class="dynamicTable tableTools table table-striped overflow-x">
                                            <thead class="bg-gray">
                                                <tr role="row">
                                                    <th class="thead-th-tr-textarea" style="padding-left: 5px !important;">Contact Details</th>
                                                    <th class="thead-th-tr-textarea">Country</th>
                                                    <th class="thead-th-tr-textarea">Name of the <br />Authorised Person</th>
                                                    <th class="thead-th-tr-textarea">Email of the <br />Authorised Person</th>
                                                    <th class="thead-th-tr-textarea">Phone number of <br />the Authorised Person</th>
                                                    <th style="width:72px !important; text-align:right"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                    if (!empty($client_beneficial_owner_info_detail)) {
                        foreach ($client_beneficial_owner_info_detail as $client_beneficial_owner_info) {
                            ?>
                                                <tr role="row" id="add-more_tr">
                                                    <td class="tbody-tr-td-area">
                                                        <div class="td-area-form-marg">
                                                            <?php echo $client_beneficial_owner_info->contact_details; ?> 
                                                        </div>
                                                    </td>
                                                    <td class="tbody-tr-td-area">
                                                        <div class="td-area-form-marg">
                                                            <?php echo $client_beneficial_owner_info->country_name; ?> 
                                                        </div>
                                                    </td>
                                                    <td class="tbody-tr-td-area">
                                                        <div class="td-area-form-marg">
                                                            <?php echo $client_beneficial_owner_info->name_of_authorised_person; ?> 
                                                        </div>
                                                    </td>
                                                    <td class="tbody-tr-td-area drectorship_hidden-filed">
                                                        <div class="td-area-form-marg">
                                                            <?php echo $client_beneficial_owner_info->email_of_the_authorised_person; ?> 
                                                        </div>
                                                    </td>
                                                    <td class="tbody-tr-td-area">
                                                        <div class="td-area-form-marg">
                                                            <?php echo $client_beneficial_owner_info->phone_number_of_the_authorised_person; ?> 
                                                        </div>
                                                    </td>
                                                    <td style="width:72px !important; padding:3px; text-align:right;">
                                                        <?php if ($userPrivileges->client_database->beneficial->Delete == 1) { ?>
                                                        <a href="#delete-popup_div" data-toggle="modal" onclick="delete_client_beneficial_owner_info('<?php echo $client_beneficial_owner_info->client_beneficial_owner_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon" style="margin-left:5px;"><i class="fa fa-trash-o td-icon_font-size"></i></a>
                                                        <?php } 
                                                        if ($userPrivileges->client_database->beneficial->Edit == 1) { ?>
                                                        <a href="#edit-beneficial-owner-info" data-toggle="modal" onclick="edit_client_beneficial_owner_info('<?php echo $client_beneficial_owner_info->client_beneficial_owner_info_id; ?>')" class="btn btn-stroke btn-circle btn-danger td-icon"><i class="fa fa-pencil td-icon_font-size"></i></a>
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
<div class="modal fade"  id="add-beneficial-owner-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Beneficial Owner Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="add_beneficial_owner_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Contact details</label>
                            <textarea class="form-control height_25 plahole_font" name="contact_details" id="contact_details" style="resize: vertical; height:75px; width: 100%;"></textarea>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Country</label>
                            <select class="form-control input_area plahole_font height_25" name="country_id" id="country_id" style="width:100%; padding-top: 0px;">
                                <option value="">-- select one --</option>                
                                <?php  foreach ($country_detail as $country) { 
                        ?>
                            <option value="<?php echo $country->country_id;?>"><?php echo $country->country_name;?></option>
                        <?php
                        }
                        ?>
                            </select>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of authorised Person</label>
                            <input type="text" name="name_of_authorised_person" id="name_of_authorised_person" class="form-control height_25 plahole_font" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Email of the authorised person</label>
                            <input type="email" name="email_of_the_authorised_person" id="email_of_the_authorised_person" class="form-control height_25 plahole_font" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float: left;margin-right: 30px">Phone number of the authorised person</label>
                            <input type="text" name="phone_number_of_the_authorised_person" id="phone_number_of_the_authorised_person" class="form-control height_25 plahole_font" style="width: 100%;">
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
<div class="modal fade"  id="edit-beneficial-owner-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Beneficial Owner Information</h3>
            </div>
            <div class="modal-body">
                <div class="innerAll" style="padding: 0px;">
                    <form class="form-horizontal" role="form" id="edit_beneficial_owner_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Contact details</label>
                            <textarea class="form-control height_25 plahole_font" name="edit_contact_details" id="edit_contact_details" style="resize: vertical; height:75px; width: 100%;"></textarea>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Country</label>
                            <select class="form-control input_area plahole_font height_25" name="edit_country_id" id="edit_country_id" style="width:100%; padding-top: 0px;">
                                <option value="">-- select one --</option>                
                                <?php  foreach ($country_detail as $country) { 
                        ?>
                            <option value="<?php echo $country->country_id;?>"><?php echo $country->country_name;?></option>
                        <?php
                        }
                        ?>
                            </select>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Name of authorised Person</label>
                            <input type="text" name="edit_name_of_authorised_person" id="edit_name_of_authorised_person" class="form-control height_25 plahole_font" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Email of the authorised person</label>
                            <input type="email" name="edit_email_of_the_authorised_person" id="edit_email_of_the_authorised_person" class="form-control height_25 plahole_font" style="width: 100%;">
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float: left;margin-right: 30px">Phone number of the authorised person</label>
                            <input type="text" name="edit_phone_number_of_the_authorised_person" id="edit_phone_number_of_the_authorised_person" class="form-control height_25 plahole_font" style="width: 100%;">
                        </div>
                        <input type="hidden" name="edit_client_beneficial_owner_info_id" id="edit_client_beneficial_owner_info_id" value="">
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
        $('#add-beneficial-owner-info').on('shown.bs.modal', function () {
            $('#add_director_info').bootstrapValidator('resetForm', true);
        });
        $('#add_beneficial_owner_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                contact_details: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                country_id: {
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
                    comp.contact_details = $('#contact_details').val();
                    comp.country_id = $('#country_id').val();
                    comp.name_of_authorised_person = $('#name_of_authorised_person').val();
                    comp.email_of_the_authorised_person = $('#email_of_the_authorised_person').val();
                    comp.phone_number_of_the_authorised_person = $("#phone_number_of_the_authorised_person").val();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/add_client_beneficial_owner_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#add-beneficial-owner-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#add-beneficial-owner-info").modal("show");
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


        $('#edit_beneficial_owner_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                 edit_contact_details: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                edit_country_id: {
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
                    comp.client_beneficial_owner_info_id = $('#edit_client_beneficial_owner_info_id').val();
                    comp.contact_details = $('#edit_contact_details').val();
                    comp.country_id = $('#edit_country_id').val();
                    comp.name_of_authorised_person = $('#edit_name_of_authorised_person').val();
                    comp.email_of_the_authorised_person = $('#edit_email_of_the_authorised_person').val();
                    comp.phone_number_of_the_authorised_person = $("#edit_phone_number_of_the_authorised_person").val();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/client/submit_edit_client_beneficial_owner_info',
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#edit-beneficial-owner-info").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                   window.stop();
                                   window_location();
                                }
                                else
                                {
                                    $("#edit-beneficial-owner-info").modal("show");
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

    function edit_client_beneficial_owner_info(id) {
    	var client_id = <?php echo $client_id;?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_beneficial_owner_info',
            type: "POST",
            data: {client_id:client_id,client_beneficial_owner_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_client_beneficial_owner_info_id').val(item.client_beneficial_owner_info_id);
                $('#edit_contact_details').val(item.contact_details);
                $('#edit_country_id').val(item.country_id);
                $('#edit_name_of_authorised_person').val(item.name_of_authorised_person);
                $('#edit_email_of_the_authorised_person').val(item.email_of_the_authorised_person);
                $('#edit_phone_number_of_the_authorised_person').val(item.phone_number_of_the_authorised_person);
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_client_beneficial_owner_info(id) {
        bootbox.confirm("Are you sure you want to delete beneficial owner information?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/client/delete_client_beneficial_owner_info',
                    type: "POST",
                    data: {client_beneficial_owner_info_id: id},
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