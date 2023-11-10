/* Common Js use for common script to all pages */
//function calBalanceLeave(val,replaceId,leave_emp_id){   
var PATHARRAY = window.location.pathname.split('/');
//var CURRENT_URL = "https://" + window.location.host + "/" + PATHARRAY[1];
// var CURRENT_URL = "https://"+window.location.host;
var CURRENT_URL = "http://"+window.location.host+"/timesheet";
function checkLoginCondition() {
    // alert('Test'); 
    // return false;
}

var Login = function () {

    var handleLogin = function () {

        var validateLoginForm = $('#loginForm').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }

            },
            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit   
                $('.alert-danger', $('#loginForm')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },
            submitHandler: function (form) {
                form.submit(); // form validation success, call ajax form submit
            }
        });

        $('#loginForm input').keypress(function (e) {
            if (e.which == 13) {
                if ($('#loginForm').validate().form()) {
                    $('#loginForm').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });

        $('.btn-primary').click(function () {
            //var validator = $('.register-form').validate();
            validateLoginForm.resetForm();
        });

    }
    return {
        //main function to initiate the module
        init: function () {

            handleLogin();

        }

    };

}();

function actionOnClose() {

}

function pending_leave() {
    var request = $.ajax({
        url: CURRENT_URL + '/employee_leave/pending_leave',
        type: "POST",
        dataType: "json"
    });
    request.done(function (msg) {
        if (msg != null) {
            $('#pending_leave_url').attr('href', CURRENT_URL + '/employee_leave/view_employee_leave?ei=' + msg.emp_id_str);
            $('#leave_count').text(msg.leave_count);
        }
        else {
            $('#pending_leave_url').attr('href', CURRENT_URL + '/employee_leave/view_employee_leave?ei=');
            $('#leave_count').text('');
        }
    });
    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}


function pending_time() {
    var request = $.ajax({
        url: CURRENT_URL + '/timesheet/pending_time',
        type: "POST"
    });
    request.done(function (msg) {
        $('#pending_time_url').attr('href', CURRENT_URL + '/timesheet/time_list?w=' + msg);
        $('#time_count').text(msg);
    });
    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}



function overdue_timesheet() {
    var request = $.ajax({
        url: CURRENT_URL + '/timesheet/overdue_timesheet',
        type: "POST"
    });
    request.done(function (msg) {
        if (msg) {
            $('#pending_time_submit_url').attr('href', CURRENT_URL + '/timesheet/time_list?f=1');
            $('#pending_time_count').text(msg);
        }
        else {
            $('#pending_time_submit_url').attr('href', CURRENT_URL + '/timesheet/time_list?f=');
            $('#pending_time_count').text('');
        }
    });
    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}

/* Start code for modal box */
function data_modal_box_add(title, element_id, placeholder, dbname, action, db_field_name, db_field_id, item_id, add_div, edit_delete_div, success_msg_id, error_msg_id, loader_element_id, message_title) {
    $('#item_name').css('border', 'solid 1px #e1e0df');
    bootbox.dialog({
        message: '<input type="text" id="item_name" name="name" style="height:28px;" class="form-control" placeholder="' + placeholder + '"><div id="err_cat" style="color:#a94442;margin-top:4px;display:none;font-size: 13px;">This field is required.</div>',
        title: title,
        buttons: {
            success: {
                label: "Save",
                className: "btn-sm btn-success pull-right modal-custom-button",
                callback: function () {
                    var item_name = $('#item_name').val();
                    if ($('#item_name').val() == "") {
                        $('#err_cat').show();
                        $('#item_name').css('border', 'solid 1px #ebccd1');
                        $('#item_name').focus();
                        return false;
                    }
                    submit_item(title, element_id, placeholder, dbname, action, item_name, db_field_name, db_field_id, item_id, add_div, edit_delete_div, success_msg_id, error_msg_id, loader_element_id, message_title)
                }
            },
            danger: {
                label: "Cancel",
                className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                callback: function () {

                }
            }
        }
    });
    $('#item_name').on('keyup', function () {
        $('#item_name').css('border', 'solid 1px #e1e0df');
        $('#err_cat').hide();
    });

}

function data_modal_box_edit(title, element_id, placeholder, dbname, action, db_field_name, db_field_id, item_id, add_div, edit_delete_div, item_name_pre, success_msg_id, error_msg_id, loader_element_id, message_title) {
    $('#item_name').css('border', 'solid 1px #e1e0df');

    bootbox.dialog({
        message: '<input type="text" id="item_name" value="' + item_name_pre + '" name="name" style="height:28px;" class="form-control" placeholder="' + placeholder + '"><div id="err_cat" style="color:#a94442;margin-top:4px;display:none;font-size: 13px;">This field is required.</div>',
        title: title,
        buttons: {
            success: {
                label: "Save Changes",
                className: "btn-sm btn-success pull-right modal-custom-button",
                callback: function () {
                    var item_name = $('#item_name').val();
                    if ($('#item_name').val() == "") {
                        $('#err_cat').show();
                        $('#item_name').css('border', 'solid 1px #ebccd1');
                        $('#item_name').focus();
                        return false;
                    }
                    submit_item(title, element_id, placeholder, dbname, action, item_name, db_field_name, db_field_id, item_id, add_div, edit_delete_div, success_msg_id, error_msg_id, loader_element_id, message_title)
                }
            },
            danger: {
                label: "Cancel",
                className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                callback: function () {

                }
            }
        }
    });
    $('#item_name').on('keyup', function () {
        $('#item_name').css('border', 'solid 1px #e1e0df');
        $('#err_cat').hide();
    });

}
function data_modal_box_delete(title, element_id, placeholder, dbname, action, db_field_name, db_field_id, item_id, add_div, edit_delete_div, success_msg_id, error_msg_id, loader_element_id, message_title) {
    $('#item_name').css('border', 'solid 1px #e1e0df');
    item_id = $('#' + item_id).val();
    console.log(item_id);
    bootbox.dialog({
        message: 'Are you sure you want to delete this record?',
        title: title,
        buttons: {
            success: {
                label: "Yes",
                className: "btn-sm btn-success pull-right modal-custom-button",
                callback: function () {
                    var item_name = '';
                    submit_item(title, element_id, placeholder, dbname, action, item_name, db_field_name, db_field_id, item_id, add_div, edit_delete_div, success_msg_id, error_msg_id, loader_element_id, message_title)
                }
            },
            danger: {
                label: "No",
                className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                callback: function () {

                }
            }
        }
    });
    $('#item_name').on('keyup', function () {
        $('#item_name').css('border', 'solid 1px #e1e0df');
        $('#err_cat').hide();
    });

}

function submit_item(title, element_id, placeholder, dbname, action, item_name, db_field_name, db_field_id, item_id, add_div, edit_delete_div, success_msg_id, error_msg_id, loader_element_id, message_title) {
    blockUI(loader_element_id);
    item_name = $.trim(item_name);
    var object = {
        title: title,
        element_id: element_id,
        placeholder: placeholder,
        dbname: dbname,
        item_name: item_name,
        item_id: item_id,
        db_field_name: db_field_name,
        db_field_id: db_field_id,
        action: action,
        message_title: message_title
    }
    var url = CURRENT_URL;
    $.ajax({
        type: "POST",
        url: url + "/databaseinfo/modal_box_data",
        dataType: 'json',
        data: object,
        success: function (msg) {
            var status = msg.status;
            var message = msg.message;
            var item_data = msg.data;
            var insert_id = msg.insert_id;
            var str = '';
            str += '<option value="" selected="selected">Select</option>';
            $.each(item_data, function (i) {
                if (item_data[i][db_field_name] == item_name)
                    str += '<option value="' + item_data[i][db_field_id] + '" selected="selected">' + item_data[i][db_field_name] + '</option>';
                else
                    str += '<option value="' + item_data[i][db_field_id] + '">' + item_data[i][db_field_name] + '</option>';
            });
            if (action == "delete") {
                if (insert_id == "") {
                    $('#' + add_div).show();
                    $('#' + edit_delete_div).hide();
                }
            } else {
                if (action == "add" && status == 0) {
                    $('#' + add_div).show();
                    $('#' + edit_delete_div).hide();
                } else {
                    $('#' + add_div).hide();
                    $('#' + edit_delete_div).show();
                }
            }
            if (status == 1)
                $('#' + element_id).html(str);
            // last message and refresh list
            if (status == 1) {
                $('.success-msg').text(message)
                $('#' + success_msg_id).fadeIn();
                setTimeout(function () {
                    $('#' + success_msg_id).fadeOut();
                }, 4000);
            } else {
                $('.error-msg').text(message)
                $('#' + error_msg_id).fadeIn();
                setTimeout(function () {
                    $('#' + error_msg_id).fadeOut();
                }, 4000);
            }
            unblockUI(loader_element_id);
        }
    });
}

function blockUI(element_id) {
    $('#' + element_id).append('<div id="load_by_id" style="display:block;position:absolute;top:45%;left:48%;"><img src="' + CURRENT_URL + '/assets/images/loader.gif"/></div>')
}

function unblockUI(element_id) {
    $('#load_by_id').fadeOut(function () {
        $('#load_by_id').remove();
    });
}

function submit_form(form, load_data_body, url, action, id, callback) {
    $('.close').trigger('click');
    $.ajax({
        type: "POST",
        url: url + "/" + $('#client_info').attr('client_id'),
        data: $('#' + form).serialize(),
        dataType: 'json',
        beforeSend: function () {
            // $('#result').html('<img src="loading.gif" />');
        },
        success: function (data) {
            if (typeof callback == "function") {
                callback(data);
                var message = data.message;
                var success = data.success;
                if (success == 1) {
                    $('.item-success-msg').text(message);
                    $('#item_success_msg').fadeIn();
                    setTimeout(function () {
                        $('#item_success_msg').fadeOut();
                    }, 5000);
                } else {
                    $('.item-error-msg').text(message);
                    $('#item_err_msg').fadeIn();
                    setTimeout(function () {
                        $('#item_err_msg').fadeOut();
                    }, 5000);
                }
            }
        }
    });
}

function submit_form_common(form, load_data_body, url, action, id, callback) {
    $('.close').trigger('click');
    $.ajax({
        type: "POST",
        url: url,
        data: $('#' + form).serialize(),
        dataType: 'json',
        beforeSend: function () {
            // $('#result').html('<img src="loading.gif" />');
        },
        success: function (data) {
            if (typeof callback == "function") {
                callback(data);
                var message = data.message;
                var success = data.success;
                if (success == 1) {
                    $('.item-success-msg').text(message);
                    $('#item_success_msg').fadeIn();
                    setTimeout(function () {
                        $('#item_success_msg').fadeOut();
                    }, 5000);
                } else {
                    $('.item-error-msg').text(message);
                    $('#item_err_msg').fadeIn();
                    setTimeout(function () {
                        $('#item_err_msg').fadeOut();
                    }, 5000);
                }
            }
        }
    });
}
function grid_data(load_data_body, url, dataTable) {
//        alert(dataTable);
    $.ajax({
        type: "POST",
        url: url,
        data: {client_id: $('#client_info').attr('client_id')},
        beforeSend: function () {
            // $('#result').html('<img src="loading.gif" />');
        },
        success: function (data) {
            $('#' + load_data_body).html(data);
            unblockUI(load_data_body);
            initTablesForDB(dataTable);
        }
    });

}

function edit_box(load_data_body, url, id, db_name, db_field_id, tag, view_folder) {
    $.ajax({
        type: "POST",
        url: url,
        data: {id: id, db_name: db_name, tag: tag, view_folder: view_folder, db_field_id: db_field_id},
        beforeSend: function () {
            // $('#result').html('<img src="loading.gif" />');
        },
        success: function (data) {
            $('#' + load_data_body).html(data);
            unblockUI(load_data_body);
        }
    });
}
function delete_box(load_data_body, url, id, db_name, db_field_id, title, grid_url, dataTable, tag) {
    bootbox.dialog({
        message: 'Are you sure you want to delete this record?',
        title: title,
        buttons: {
            success: {
                label: "Yes",
                className: "btn-sm btn-success pull-right modal-custom-button",
                callback: function () {
                    blockUI(load_data_body);
                    delete_item(load_data_body, url, id, db_name, db_field_id, grid_url, dataTable, tag)
                }
            },
            danger: {
                label: "No",
                className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                callback: function () {

                }
            }
        }
    });
}
function delete_item(load_data_body, url, id, db_name, db_field_id, grid_url, dataTable, item_name) {
    $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: {id: id, db_name: db_name, db_field_id: db_field_id, item_name: item_name},
        beforeSend: function () {
            // $('#result').html('<img src="loading.gif" />');
        },
        success: function (data) {
            grid_data(load_data_body, grid_url, dataTable)
            var message = data.message;
            var success = data.success;
            if (success == 1) {
                $('.item-success-msg').text(message);
                $('#item_success_msg').fadeIn();
                setTimeout(function () {
                    $('#item_success_msg').fadeOut();
                }, 5000);
            } else {
                $('.item-error-msg').text(message);
                $('#item_err_msg').fadeIn();
                setTimeout(function () {
                    $('#item_err_msg').fadeOut();
                }, 5000);
            }
        }
    });
}

function add_edit_delete_list_on_modal(action, add_div, edit_delete_div, element_id, dbname, placeholder, db_field_name, db_field_id, loader_element_id, message_title, success_msg_id, error_msg_id, title_on_add, title_on_edit, title_on_delete, item_id_on_add, item_id_on_edit, item_id_on_delete, item_name_on_edit) {
    if (action == "add") {
        data_modal_box_add(title_on_add, element_id, placeholder, dbname, action, db_field_name, db_field_id, item_id_on_add, add_div, edit_delete_div, success_msg_id, error_msg_id, loader_element_id, message_title)
    } else if (action == "edit") {
        data_modal_box_edit(title_on_edit, element_id, placeholder, dbname, action, db_field_name, db_field_id, item_id_on_edit, add_div, edit_delete_div, item_name_on_edit, success_msg_id, error_msg_id, loader_element_id, message_title)
    } else if (action == "delete") {
        data_modal_box_delete(title_on_delete, element_id, placeholder, dbname, action, db_field_name, db_field_id, item_id_on_delete, add_div, edit_delete_div, success_msg_id, error_msg_id, loader_element_id, message_title)
    }
}

function show_detail(activity) {
    $('#detail_loader').fadeIn();
    var core_url = CURRENT_URL;
    var url = core_url + "/databaseinfo/get_activity_detail";
    $.ajax({
        type: "POST",
        url: url,
        data: {activity: activity},
        beforeSend: function () {
            // $('#result').html('<img src="loading.gif" />');
        },
        success: function (data) {
            $('#activity_detail_name').val(data);
            $('#detail_loader').fadeOut();
        }
    });
}


function data_modal_box_director(type, addedit, title, form_id) {
    var list_val = '';
    if(type=="add"){
        var name = '';
    } else {
        var name = $('#director_name').val();
        var list_val = $('#director_company_data').val();
    }
    form_id = "#add-director-individual-form";
//      $(form_id).data('bootstrapValidator').resetForm(); 
    $(form_id).data('bootstrapValidator').resetField($('#director_company_data'));
    var placeholder = 'Director Name';
    bootbox.dialog({
        message: '<input value="'+name+'" type="text" id="item_name" name="name" style="height:28px;" class="form-control" placeholder="' + placeholder + '"><div id="err_cat" style="color:#a94442;margin-top:4px;display:none;font-size: 13px;">This field is required.</div>',
        title: title,
        buttons: {
            success: {
                label: "Save",
                className: "btn-sm btn-success pull-right modal-custom-button",
                callback: function () {
                    var item_name = $('#item_name').val();
                    if ($('#item_name').val() == "") {
                        $('#err_cat').show();
                        $('#item_name').css('border', 'solid 1px #ebccd1');
                        $('#item_name').focus();
                        return false;
                    }
                    update_shadow_data(item_name,type,list_val,addedit);
                }
            },
            danger: {
                label: "Cancel",
                className: "btn-sm btn-primary pull-right modal-custom-button modal-custom-button_left",
                callback: function () {

                }
            }
        }
    });
}

function update_shadow_data(item_name,type,list_val,addedit) {
    if(type=="add"){
        $("#director_company_data option[value='" + $('#client_info').attr('last_dir_com') + "']").remove();
        $('#director_company_data').append($('<option>', {
            value: item_name,
            text: item_name,
            selected: 'selected'
        }));
        $('#client_info').attr('last_dir_com', item_name)
    } else {
        $('#director_company_data option[value="'+list_val+'"]').text(item_name);
        
    }
    $('#director_name').val(item_name);
    $('#add_button'+addedit).hide(); 
    $('#editdelete_button'+addedit).show(); 
}

function fill_common_values_dir_ind(director_id,addedit){
    var passport_id_1 = "kyc_passport_show_div"+addedit
    var passport_id_0 = "kyc_passport_hide_div"+addedit

    var cv_id_1 = "director_cv_yes"+addedit
    var cv_id_0 = "director_cv_no"+addedit

    var bank_id_1 = "bank_refrence_show_div"+addedit
    var bank_id_0 = "bank_refrence_hide_div"+addedit

    var proof_id_1 = "proof_of_address_show_div"+addedit
    var proof_id_0 = "proof_of_address_hide_div"+addedit 
   fill_common_values_ind(director_id,addedit, passport_id_1, passport_id_0, cv_id_1, cv_id_0, bank_id_1, bank_id_0, proof_id_1, proof_id_0) 
}



function fill_common_values_dir_corp(director_id,addedit){
    
}

function fill_common_values_share_ind(director_id,addedit){
    var passport_id_1 = "shareholder-passport-2_show_div"+addedit
    var passport_id_0 = "shareholder-passport-2_hide_div"+addedit

    var cv_id_1 = "shareholder-cv_show_div"+addedit
    var cv_id_0 = "shareholder-cv_hide_div"+addedit

    var bank_id_1 = "shareholder-bank-reference_show_div"+addedit
    var bank_id_0 = "shareholder-bank-reference_hide_div"+addedit

    var proof_id_1 = "shareholder-proof_add_show_div"+addedit
    var proof_id_0 = "shareholder-proof_add_hide_div"+addedit 
   fill_common_values_ind(director_id,addedit, passport_id_1, passport_id_0, cv_id_1, cv_id_0, bank_id_1, bank_id_0, proof_id_1, proof_id_0) 
}

function fill_common_values_share_corp(director_id,addedit){
}

function fill_common_values_benef_ind(director_id,addedit){
    var passport_id_1 = "beneficial-owner-passport_show_div"+addedit
    var passport_id_0 = "beneficial-owner-passport_hide_div"+addedit

    var cv_id_1 = "beneficial-owner-cv_show_div"+addedit
    var cv_id_0 = "beneficial-owner-cv_hide_div"+addedit

    var bank_id_1 = "beneficial-owner-bank-reference_show_div"+addedit
    var bank_id_0 = "beneficial-owner-bank-reference_hide_div"+addedit

    var proof_id_1 = "beneficial-owner-proof_add_show_div"+addedit
    var proof_id_0 = "beneficial-owner-proof_add_hide_div"+addedit 
    fill_common_values_ind(director_id,addedit, passport_id_1, passport_id_0, cv_id_1, cv_id_0, bank_id_1, bank_id_0, proof_id_1, proof_id_0) 
  
}

function fill_common_values_benef_corp(director_id){
    
}

function fill_common_values_ind(director_id,addedit, passport_id_1, passport_id_0, cv_id_1, cv_id_0, bank_id_1, bank_id_0, proof_id_1, proof_id_0) {
    
    blockUI("add-director-individual-form");
    var core_url = CURRENT_URL;
    var url = core_url + "/databaseinfo/get_director_detail";
    $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: {id: director_id},
        beforeSend: function () {
            // $('#result').html('<img src="loading.gif" />');
        },
        success: function (msg) {
            var data = msg[0];
            var director_name = '';
            var has_passport = 0;
            var passport_no = '';
            var country_of_issue = '';
            var date_of_issue = '';
            var date_of_expiry = '';
            var has_cv = 0;
            var recieved_date = '';
            var has_bank_ref = 0;
            var bank_name = '';
            var date = '';
            var is_address_proof = 0;
            var address_detail = '';
            var country = '';
            var address_proof_date = '';
            var other_detail = '';
            var director_age = 0;
            var director_birth_date = '';
            var nic_remark = '';
            if ($.isEmptyObject(data)) {
            } else {
                director_name = data.director_name;
                director_age = data.director_age;
                director_birth_date = data.director_birth_date;
                has_passport = data.has_passport;
                passport_no = data.passport_no;
                country_of_issue = data.country_of_issue;
                date_of_issue = data.date_of_issue;
                date_of_expiry = data.date_of_expiry;
                has_cv = data.has_cv;
                recieved_date = data.recieved_date;
                has_bank_ref = data.has_bank_ref;
                bank_name = data.bank_name;
                date = data.date;
                is_address_proof = data.is_address_proof;
                address_detail = data.address_detail;
                country = data.country;
                address_proof_date = data.address_proof_date;
                other_detail = data.other_detail;
                nic_remark   = data.nic_remark;

                
            }
                $('#' + passport_id_1).removeAttr('disabled');
                $('#' + passport_id_0).removeAttr('disabled');

                $('#' + cv_id_1).removeAttr('disabled');
                $('#' + cv_id_0).removeAttr('disabled');

                $('#' + bank_id_1).removeAttr('disabled');
                $('#' + bank_id_0).removeAttr('disabled');

                $('#' + proof_id_1).removeAttr('disabled');
                $('#' + proof_id_0).removeAttr('disabled');
                if (has_passport == 1)
                    $('#' + passport_id_1).trigger('click');
                else
                    $('#' + passport_id_0).trigger('click');

                if (has_cv == 1)
                    $('#' + cv_id_1).trigger('click');
                else
                    $('#' + cv_id_0).trigger('click');

                if (has_bank_ref == 1)
                    $('#' + bank_id_1).trigger('click');
                else
                    $('#' + bank_id_0).trigger('click');

                if (is_address_proof == 1)
                    $('#' + proof_id_1).trigger('click');
                else
                    $('#' + proof_id_0).trigger('click');
                
                
                
                $('#country_of_issue'+addedit).children().each(function() {
                    if ($(this).attr('value') == country_of_issue) {
                        $(this).attr('selected', 'selected')
                    }
                });
                
                $('#country'+addedit).children().each(function() {
                    if ($(this).attr('value') == country) {
                        $(this).attr('selected', 'selected')
                    }
                });
            
                $('#director_name'+addedit).val(director_name);
                $('#director_age'+addedit).val(director_age);
                $('#director_birth_date'+addedit).val(director_birth_date);
                
                $('#passport_no'+addedit).val(passport_no);
                $('#country_of_issue'+addedit).val(country_of_issue);
                $('#date_of_issue'+addedit).val(date_of_issue);
                ($('#date_of_issue'+addedit).val(date_of_issue));
                $('#date_of_expiry'+addedit).val(date_of_expiry);
                $('#recieved_date'+addedit).val(recieved_date);
                $('#accounting_done_by'+addedit).val(bank_name);
                $('#date'+addedit).val(date);
                $('#country'+addedit).val(country);
                $('#address_detail'+addedit).val(address_detail);
                $('#address_proof_date'+addedit).val(address_proof_date);
                $('#other_detail'+addedit).val(other_detail);
                
                
                $('#hp'+addedit).val(has_passport);
                $('#hc'+addedit).val(has_cv);
                $('#hbr'+addedit).val(has_bank_ref);
                $('#iap'+addedit).val(is_address_proof);
                $('#coi'+addedit).val(country_of_issue);
                $('#co'+addedit).val(country);
                
                $('#nic_remark'+addedit).val(nic_remark);


                
                
                
                if(director_id==""){
                   $('#add_button'+addedit).show(); 
                   $('#editdelete_button'+addedit).hide(); 
                } else {
                   $('#editdelete_button'+addedit).show();
                   $('#add_button'+addedit).hide(); 
                }
                
                // make items disabled
                $('#director_name'+addedit).attr('readonly','readonly');
                $('#passport_no'+addedit).attr('readonly','readonly');
                $('#date_of_issue'+addedit).attr('readonly','readonly');
                $('#date_of_expiry'+addedit).attr('readonly','readonly');
                $('#recieved_date'+addedit).attr('readonly','readonly');
                $('#accounting_done_by'+addedit).attr('readonly','readonly');
                $('#date'+addedit).attr('readonly','readonly');
                $('#address_detail'+addedit).attr('readonly','readonly');
                $('#address_proof_date'+addedit).attr('readonly','readonly');
                $('#other_detail'+addedit).attr('readonly','readonly');
                $('#director_age'+addedit).attr('readonly','readonly');
                $('#director_birth_date'+addedit).attr('readonly','readonly');
                
                $('#country_of_issue'+addedit).attr('disabled','disabled');
                $('#country'+addedit).attr('disabled','disabled');
                
                
                $('#' + passport_id_1).attr('disabled','disabled');
                $('#' + passport_id_0).attr('disabled','disabled');

                $('#' + cv_id_1).attr('disabled','disabled');
                $('#' + cv_id_0).attr('disabled','disabled');

                $('#' + bank_id_1).attr('disabled','disabled');
                $('#' + bank_id_0).attr('disabled','disabled');

                $('#' + proof_id_1).attr('disabled','disabled');
                $('#' + proof_id_0).attr('disabled','disabled');
                
                
                
                
            unblockUI("add-director-individual-form");
            console.log(msg);
        }
    });
}


