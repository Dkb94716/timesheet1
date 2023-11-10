<?php
$this->load->library('session');
$session_val = $this->session->all_userdata();
$success_msg = @$this->session->userdata('success_company');
$error_msg = @$this->session->userdata('error_company');
$success_msg1 = @$this->session->userdata('success_company1');
$error_msg1 = @$this->session->userdata('error_company1');
?>

<div class="col-lg-12" style="margin-top:20px;"> 
    <div class="col-sm-4"><h4></h4></div>
    <?php if ($userPrivileges->administration_control->company->Add == 1) { ?>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
            <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right" style="margin-left:8px;">Add Company</a>
        </div>
    <?php } ?>
</div>
<div class="innerLR" style="margin-top:60px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body overflow-x" style="padding:10px;">

            <?php if ($success_msg) { ?>
               <script>
                    $(document).ready(function() 
                    {
                        bootbox.alert("<?php echo $success_msg;   ?>", function() {
                        
                       });
                     });

                </script>
                <?php $this->session->unset_userdata('success_company'); ?> 
            <?php } ?>
            <?php if ($success_msg1) { ?>
                <script>
                    $(document).ready(function() 
                    {
                        bootbox.alert("<?php echo $success_msg1;   ?>", function() {
                        
                       });
                     });

                </script>

               
                <?php $this->session->unset_userdata('success_company1'); ?> 
            <?php } ?>        

            <?php if ($error_msg) { ?>
                 <script>
                    $(document).ready(function() 
                    {
                        bootbox.alert("<?php echo $error_msg;   ?>", function() {
                        
                       });
                     });

                </script>
                <?php $this->session->unset_userdata('error_company'); ?>  
            <?php } ?>

            <?php if ($error_msg1) { ?>
                <script>
                    $(document).ready(function() 
                    {
                        bootbox.alert("<?php echo $error_msg1;   ?>", function() {
                        
                       });
                     });

                </script>
                <?php $this->session->unset_userdata('error_company1'); ?>  
            <?php } ?>


            <table class="dynamicTable tableTools table table-striped overflow-x">
                <thead>
                    <tr style="background-color:#c72a25; color:#FFF;">
                        <th class="thead-th-padg">Company Name</th>
                        <th class="thead-th-padg">Company Logo</th>
                        <th class="thead-th-padg"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($company_detail)) {
                        foreach ($company_detail as $company) {
                            ?>
                            <tr class="gradeX">
                                <td><span><?php echo $company->company_name; ?> </span></td>
                                <td><span>
                                         <?php if(!empty($company->company_logo)){
                                
                            if(file_exists(realpath("uploads/user").'/'.$company->company_logo)){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/company/<?php echo $company->company_logo; ?>" width="100px;"/>
                                        <?php } 
                           
                            }
                             ?>
                                    </span></td>
                                <td>                           
                                    <?php if ($userPrivileges->administration_control->company->Edit == 1) { ?>
                                        <a href="#modal-edit" onclick="edit_company('<?php echo $company->company_id; ?>')" data-toggle="modal" class="btn-xs btn-success pull-right td-btn-marg-right">Edit</a>
                                    <?php }
                                    if ($userPrivileges->administration_control->company->Delete == 1) {
                                        ?>
                                        <a href="#nogo" class="btn-xs btn-danger pull-right td-btn-marg-right" onclick="delete_company('<?php echo $company->company_id; ?>')">Delete</a>
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
    </div>
</div>

<div class="modal fade"  id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add Company</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form"  method="post" id="addForm" enctype="multipart/form-data" action="<?php echo base_url(); ?>company/add_company/">
                            <div class="form-group moduleditform">
                                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Company Name</label>
                                <div class="col-sm-7">
                                    <input type="text" name="company_name" id="company_name" maxlength="200" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"style="text-align: left;">Company Logo</label>
                                <div class="col-sm-7">
                                  <input type="file" id="company_logo" name="company_logo" style="height:24px; padding-bottom:30px; border-radius: 0;"/>

                                </div>
                            </div>
                            <input type="hidden" id="edit_company_id" value="">
                            <img id="editloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;"/>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success pull-right">Save</button>
                                    <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade"  id="modal-edit">

    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Company</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" method="post" id="editForm" enctype="multipart/form-data" action="<?php echo base_url(); ?>company/submit_edit_company/">
                            <div class="form-group moduleditform">
                                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Company Name</label>
                                <div class="col-sm-7">
                                    <input type="text" name="edit_company_name" id="edit_company_name" maxlength="200" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"style="text-align: left;">Company Logo</label>
                                <div class="col-sm-7">
                                  <!--  <input type="file" class="form-control" name="company_logo" style="height:24px; padding-bottom:30px; border-radius: 0;"/> -->
<?php echo "<input type='file' class='form-control'  id='company_logo' name='company_logo' style='height:24px; padding-bottom:30px; border-radius: 0;' />"; ?><!--<img src="<?php //echo  base_url() ?>uploads/company/imag1es2.jpeg" height="100px;" width="100px" />  -->                                  
                                </div>
                            </div>

                            <input type="hidden" id="edit_company_id" value="">
                            <img id="editloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;"/>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" id="edit_hobver" class='btn btn-success pull-right' id="savebtn">Save</button>
                                    <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- // Modal body END -->

        </div>
    </div>

</div>
<script>




    $(document).ready(function() {


        setTimeout(function() {
            $('#company_add').fadeOut('slow');
        }, 5000);
        setTimeout(function() {
            $('#company_add1').fadeOut('slow');
        }, 5000);
        setTimeout(function() {
            $('#company_error').fadeOut('slow');
        }, 5000);
        setTimeout(function() {
            $('#company_error1').fadeOut('slow');
        }, 5000);

        $('#modal-add').on('shown.bs.modal', function() {
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
                company_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Company Name is required'
                        }
                    }
                },
                company_logo: {
                    validators: {
                        file: {
                            extension: 'jpeg,png,jpg',
                            type: 'image/jpeg,image/png,image/jpg',
                            maxSize: 100024, // 2048 * 1024
                            message: 'The selected file is not valid'
                        }
                    }
                },
            }



        })

        /*.on('success.form.bv', function (e) {
         e.preventDefault();
         var company_name = $('#company_name').val();
         
         $.ajax({
         async: true,
         type: "POST",
         url: CURRENT_URL + '/company/add_company',
         dataType: "json",
         data: {company_name: company_name},
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
         }); */


        $('#editForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                edit_company_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Company Name is required'
                        }
                    }
                },
                company_logo: {
                    validators: {
                        file: {
                            extension: 'jpeg,png,jpg',
                            type: 'image/jpeg,image/png,image/jpg',
                            maxSize: 100024, // 2048 * 1024
                            message: 'The selected file is not valid'
                        }
                    }
                },
            }
        })

        initTables();

        $('#edit_hobver').hover(function() {
            var companyID = $('#edit_company_id').val();
            var companyLogo = $('#edit_company_logo').val();
            var formAction = $('#editForm').attr('action');
            $('#editForm').attr('action', formAction + companyID);
        });


    });

    function edit_company(id) {
        var request = $.ajax({
            url: CURRENT_URL + '/company/edit_company',
            type: "POST",
            data: {company_id: id},
            dataType: "json"
        });
        request.done(function(msg) {
            $.each(msg, function(i, item) {
                $('#edit_company_logo').val(item.company_logo);
                $('#edit_company_name').val(item.company_name);
                $('#edit_company_id').val(item.company_id);


            });
        });
        request.fail(function(jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    function delete_company(id) {
        bootbox.confirm("Are you sure you want to delete company?", function(result) {

            if (result == true) {

                var request = $.ajax({
                    url: CURRENT_URL + '/company/delete_company',
                    type: "POST",
                    data: {company_id: id},
                    dataType: "json"
                });
                request.done(function(data) {
                    bootbox.alert(data.message, function() {
                        if (data.status == "SUCCESS")
                        {

                            window.stop();
                            location.reload();
                        }


                    });
                });
                request.fail(function(jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            }
        });

    }

    var _URL = window.URL || window.webkitURL;

    $("#company_logo").change(function(e) {

        var image, file;

        if ((file = this.files[0])) {

            image = new Image();

            image.onload = function() {
                if (this.width > 300)
                {
                    alert("Width is greter than 300");
                    var input = $("#company_logo");
                    input.replaceWith(input.val('').clone(true));
                    return false;
                }
                if (this.height > 300)
                {
                    alert("Hight is greter than 300");
                    var input = $("#company_logo");
                    input.replaceWith(input.val('').clone(true));
                    return false;
                }
                // alert("The image width is " +this.width + " and image height is " + this.height);
            };

            image.src = _URL.createObjectURL(file);


        }

    });





</script>