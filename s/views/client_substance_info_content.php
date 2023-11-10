<div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" role="form" id="add_substance_info">
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Arbitration clause in the constitution</label>
                            <input type="radio" name="arbitration_clause" style="float:left" value="Yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="arbitration_clause" style="margin-left:10px;float:left" value="No" checked>
                            <span style="float:left">&nbsp;No</span>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading" style="float:left; margin-right:50px;">Office in Mauritius</label>
                            <input type="radio" name="office_in_mauritius" style="float:left" value="Yes" id="add_btn-yes">
                            <span style="float:left">&nbsp;Yes</span>
                            <input type="radio" name="office_in_mauritius" style="margin-left:10px;float:left" value="No" id="add_btn-no" checked>
                            <span style="float:left">&nbsp;No</span>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px!important; display:none;" id="address_hidden-filed">
                            <label class="client-detailes-sub_heading">Address</label>
                            <textarea type="text" name="office_address" id="office_address" class="form-control height_25 plahole_font" style="width: 100%;resize: vertical;"></textarea>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Other substance conditions</label>
                            
                            <textarea type="text" name="other_substance_conditions" id="other_substance_conditions" class="form-control plahole_font" rows="5" style="resize: vertical;"></textarea>
                        </div>
                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                            <label class="client-detailes-sub_heading">Employ one person in Mauritius on a full time basis</label>
                            <input type="text" name="mauritius_employ" id="mauritius_employ" class="form-control height_25 plahole_font" style="width: 100%;">
                        </div>
                        <div id="submit_btn" class="form-group td-area-form-marg" style="padding-bottom: 15px;float: inherit; margin-top:30px;">
                            <button class="btn btn-success pull-right">Save</button>
                            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:10px;">Cancel</a>
                        </div>
                    </form>
                            </div>
                        </div>




<script>
    $(document).ready(function () {
        <?php 
        if ($userPrivileges->client_database->substance->Edit != 1) { ?>
        $("#add_substance_info :input").attr("disabled","disabled");
        $('#submit_btn').html('');
        <?php } ?>
        $('input[name="office_in_mauritius"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#address_hidden-filed").show();
        }
        else {
            $("#address_hidden-filed").hide();
            $('#office_address').val('');
        }
    });
     $('input[name="edit_office_in_mauritius"]').on('click', function() {
        if ($(this).val() == 'Yes') {
            $("#edit_address_hidden-filed").show();
        }
        else {
            $("#edit_address_hidden-filed").hide();
            $('#edit_office_address').val('');
        }
    });
         
        
        $('#add_substance_info').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                arbitration_clause: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                office_in_mauritius: {
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
                    comp.arbitration_clause = $("input[name=arbitration_clause]:checked").val();
                    comp.office_in_mauritius = $("input[name=office_in_mauritius]:checked").val();
                    comp.office_address = $('#office_address').val();
                    comp.other_substance_conditions = $('#other_substance_conditions').val();
                    comp.mauritius_employ = $('#mauritius_employ').val();
                    <?php if(!empty($client_substance_info_id)){ ?>
                    comp.client_substance_info_id = <?php echo $client_substance_info_id;?>;
                     var url = CURRENT_URL + '/client/submit_edit_client_substance_info';
                    <?php }
                    else { ?>
                     var url = CURRENT_URL + '/client/add_client_substance_info';
                    <?php } ?>
                    $.ajax({
                        async: true,
                        type: "POST",
                        url: url,
                        dataType: "json",
                        data: $.param(comp),
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    window.stop();
                                   window_location();
                                }
                                else
                                {
                                    
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


        
        initTables();
         $('.dataTables_filter').hide();
    });
    <?php if(!empty($client_substance_info_id)){?>
edit_client_substance_info(<?php echo $client_substance_info_id;?>);
    <?php } ?>
    function edit_client_substance_info(id) {
    var client_id = <?php echo $client_id;?>;
        var request = $.ajax({
            url: CURRENT_URL + '/client/edit_client_substance_info',
            type: "POST",
            data: {client_id:client_id,client_substance_info_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#client_substance_info_id').val(item.client_substance_info_id);
                $('input[name=arbitration_clause][value=' + item.arbitration_clause + ']').prop('checked',true);
                $('input[name=office_in_mauritius][value=' + item.office_in_mauritius + ']').prop('checked',true);
                if(item.office_in_mauritius=='Yes'){
                   $("#address_hidden-filed").show();
                }
                else{
                   $("#address_hidden-filed").hide(); 
                }
                $('#office_address').val(item.office_address);
                $('#other_substance_conditions').val(item.other_substance_conditions);
                $('#mauritius_employ').val(item.mauritius_employ);
                
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function window_location(){
        <!--
                            window.location="<?php echo site_url('client/client_detail/'.$client_id);?>?tab_id=<?php echo $tab_id;?>";
                        //-->
    }
</script>