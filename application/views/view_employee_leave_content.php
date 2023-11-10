
<div class="col-lg-12" style="margin-top:20px;"> 
    <div class="col-sm-4"><h4></h4></div>
</div>
<div class="innerLR" style="margin-top:60px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">
            <div class="year_select">
                <select class="selectpicker col-md-2"  data-style="btn-default" onchange="get_employee_leave_year(this.value)">

                    <?php
                    foreach (range(EARLIEST_YEAR, date('Y', strtotime('+1 year'))) as $x) {
                        echo '<option value="' . $x . '"' . ($x == $year ? ' selected="selected"' : '') . '>' . $x . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-lg-12" style="padding-right: 0px;">
                <a style="cursor: pointer; margin-right: 0px;" onclick="downloadAssets('XLS','1','DXLX')" data-toggle="modal" class="btn-sm btn-success pull-right td-btn-marg-right" >Descriptive XLS<div id="pdf-xls-loader1" class="pdf-xls-loader"><img src="<?php echo base_url('assets/images')?>/loader.gif" height="20px"></div></a>
                <a style="cursor: pointer; margin-right: 10px;" onclick="downloadAssets('XLS','1')" data-toggle="modal" class="btn-sm btn-success pull-right td-btn-marg-right" >Consolidated XLS<div id="pdf-xls-loader1" class="pdf-xls-loader"><img src="<?php echo base_url('assets/images')?>/loader.gif" height="20px"></div></a>
                <a style="cursor: pointer;" onclick="downloadAssets('PDF','2')" data-toggle="modal" class="btn-sm btn-success pull-right td-btn-marg-right">Consolidated PDF <div id="pdf-xls-loader2" class="pdf-xls-loader"><img src="<?php echo base_url('assets/images')?>/loader.gif" height="20px"></div></a>
            </div>

            <table class="dynamicTable tableTools table table-striped overflow-x checkboxs dataTable">
                
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                       <!-- <th style="padding:0px;">
                            <input id="all_rows" type="checkbox" class="checkboxes" value="all" style="margin-left: 12px;margin-bottom: 8px;">
                        </th>-->
                        <th class="thead-th-padg">Employee Name</th>
                         <th class="thead-th-padg">Available Leaves</th>
                         <th class="thead-th-padg" align="right" style="text-align: right;width:267px">Approved Leaves</th>
                         <th class="thead-th-padg">
                                                     </th>
                    </tr>
                </thead>
                <tbody>
<?php

if (!empty($employee_leave_detail)) {
    $ei = '';
    if(!empty($emp_id_str)){
     $ei =  $emp_id_str;  
    }
            $empName = array();
            $balance_leave = '';
            $approve_leave = 0;
            $employee_leave_arr = array();
    foreach ($employee_leave_detail as $employee_leave) {
                     $employee_leave_arr[$employee_leave->id][]=array(
                         'emp_id'=>$employee_leave->id,
                         'empName'=>$employee_leave->empName,
                         'legend'=>$employee_leave->legend,
                         'balance_leave'=>$employee_leave->balance_leave,
                         'approve_leave'=>($employee_leave->no_of_leaves==0)? $employee_leave->last_year_forward_leaves-$employee_leave->balance_leave : $employee_leave->approve_leave,
                     );
    }
    
    foreach($employee_leave_arr as $employee){
        $c = count($employee);
            $j = 0;
            $balance_leave = '';
            $approve_leave = 0;
            foreach ($employee as $res) {
                $comma = ($c - 1 == $j) ? '' : ',&nbsp;&nbsp;';
                $balance_leave.=$res['legend'] . '&nbsp;:&nbsp;&nbsp;' . $res['balance_leave'] . $comma;
                //$approve_leave += intval($res['approve_leave']);
                if ($c - 1 == $j) {
                   $approve_leave_res = $this->employee_leave_model->getEmployeeApproveLeave($res['emp_id'],$year);
                   $approve_leave = $approve_leave_res[0]->approve_leave;
                
  
          
        
        ?>
                            <tr class="gradeX">
                              <!--  <td><div class="checkbox checkbox-single margin-none" style="height: 25px; line-height:1;">
                                    <label class="checkbox-custom">
                                        <i class="fa fa-fw fa-square-o"></i>
                                        <input type="checkbox" class="checkboxes"  value="<?php echo $res['emp_id']; ?>">
                                    </label>
                                </div></td>-->
                                <td><span><?php echo $res['empName']; ?> </span></td>
                                <td><span><?php echo $balance_leave; ?> </span></td>
                                <td align="right"><span><?php echo ($approve_leave) ? $approve_leave : 0; ?> </span></td>
                                <td> 
                                     <?php if (($userPrivileges->leave_management->manageleave->Leave_PDF == 1) ) { ?>
                                        <a href="<?php echo base_url();?>employee_leave/download_leave_xls/<?php echo $res['emp_id'].'/'.$year;?>" data-toggle="modal" class="btn-xs btn-success pull-right td-btn-marg-right">XLS</a>
                                        <a href="<?php echo base_url();?>employee_leave/download_leave_pdf/<?php echo $res['emp_id'].'/'.$year;?>" data-toggle="modal" class="btn-xs btn-success pull-right td-btn-marg-right">PDF</a>
                                     <?php }
                            if (($userPrivileges->leave_management->manageleave->View == 1) || (@$userPrivileges->leave_management->manageleave->approve_reject == 1)) { ?>
                                    
                                       <a href="<?php echo base_url();?>employee_leave/manage_employee_leave/<?php echo $res['emp_id'].'/'.$year;?>?ei=<?php echo $ei;?>" class="btn-xs btn-warning pull-right td-btn-marg-right">View Details</a>
        <?php }
         ?>
                                </td>
                            </tr>    
                                    <?php
}
                $j++;
            }
            
    }
                            }
                            ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {
        $('#modal-add').on('shown.bs.modal', function () {
            $('#addForm').bootstrapValidator('resetForm', true);
        });
        $('#addForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                 holiday_date: {
                    validators: {
                        notEmpty: {
                            message: 'The Holiday Date is required'
                        }
                    }
                },
                holiday_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Holiday Name is required'
                        }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();
                    var data = $("#addForm").serialize();


                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/holiday/add_holiday',
                        dataType: "json",
                        data: data,
                        beforeSend: function ()
                        {
                            $("#addloader").show();
                        },
                        success: function (data) {
                            $("#modal-add").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {
                                    location.reload();
                                }
                                else
                                {
                                    $("#modal-add").modal("show");
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


        $('#editForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                edit_holiday_date: {
                    validators: {
                        notEmpty: {
                            message: 'The Holiday Date is required'
                        }
                    }
                },
                edit_holiday_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Holiday Name is required'
                        }
                    }
                }
            }
        })
                .on('success.form.bv', function (e) {
                    e.preventDefault();

                    var data = $("#editForm").serialize();

                    $.ajax({
                        async: true,
                        type: "POST",
                        url: CURRENT_URL + '/holiday/submit_edit_holiday',
                        dataType: "json",
                        data: data,
                        beforeSend: function ()
                        {
                            $("#editloader").show();

                        },
                        success: function (data) {
                            $("#modal-edit").modal("hide");
                            bootbox.alert(data.message, function () {
                                if (data.status == "SUCCESS")
                                {

                                    window.stop();
                                    location.reload();
                                }
                                else
                                {
                                    $("#modal-edit").modal("show");
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
    });

    function edit_holiday(id) {
        var request = $.ajax({
            url: CURRENT_URL + '/holiday/edit_holiday',
            type: "POST",
            data: {holiday_id: id},
            dataType: "json"
        });
        request.done(function (msg) {
            $.each(msg, function (i, item) {
                $('#edit_holiday_date').val(item.holiday_date);
                $('#edit_holiday_name').val(item.holiday_name);
                $('#edit_holiday_id').val(item.holiday_id);
            });
        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_holiday(id) {
        bootbox.confirm("Are you sure you want to remove holiday?", function (result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/holiday/delete_holiday',
                    type: "POST",
                    data: {holiday_id: id},
                    dataType: "json"
                });
                request.done(function (data) {
                    bootbox.alert(data.message, function () {
                        if (data.status == "SUCCESS")
                        {

                            window.stop();
                            location.reload();
                        }


                    });
                });
                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            }
        });

    }
       function get_employee_leave_year(year)
                    {
                        <!--
                        
                       window.location=CURRENT_URL + '/employee_leave/view_employee_leave/'+year+'?ei=<?php echo (!empty($emp_id_str)) ? $emp_id_str : '';?>';
                     
                    //-->
                    }
                    
    function downloadAssets(asset_type,flag,other_flag){
        //if ($('.checkboxes:checked').length == 0) {
        if (0) {    
            bootbox.dialog({
                message: "Atleast select one user.",
                title: "Download "+asset_type,
                buttons: {
                    success: {
                        label: "Ok",
                        className: "btn-success",
                        callback: function() {

                        }
                    }
                }
            });
        } else {
                //$('#pdf-xls-loader'+flag).fadeIn();
//                var id_arr = new Array();
//                $('.checkboxes:checked').each(function() {
//                    id_arr.push($(this).val());
//                });
               // var data_str = id_arr.join('@');
               // console.log(data_str);
                //return false;
                if(other_flag=="DXLX"){
                    var year = "<?php echo $year;?>";
                    window.location.href='<?php echo base_url(); ?>employee_leave/download_consolidated_descriptive_leave_xls/'+year;
                } else {
                    var data_str = '1'; 
                    if(asset_type=="PDF")
                        window.location.href='<?php echo base_url(); ?>employee_leave/download_consolidated_leave_pdf/'+data_str;
                    else
                        window.location.href='<?php echo base_url(); ?>employee_leave/download_consolidated_leave_xls/'+data_str;
                }
        }
    }
</script>