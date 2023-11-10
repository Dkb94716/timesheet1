<?php
// echo base_url(); die;
$all_userdata = $this->session->userdata('status_msg');
$status = '';
$smgDisplay = '';
if (isset($all_userdata['status'])) {
    $status = $all_userdata['status'];
}

if (isset($all_userdata['smgDisplay'])) {
    $smgDisplay = $all_userdata['smgDisplay'];
}
$this->session->unset_userdata('status_msg');
?>
<!DOCTYPE html>
<html class="paceSimple">
    <head>
        <title>Welcome to ANEX</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin/module.admin.stylesheet-complete.min.css" />
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T5QJJNT');</script>
<!-- End Google Tag Manager -->
        <script src="<?php echo base_url(); ?>assets/library/jquery/jquery.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/library/jquery/jquery-migrate.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/library/modernizr/modernizr.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/core_less-js/less.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/charts_flot/excanvas.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <!--<script src="<?php echo base_url(); ?>assets/plugins/adi/sha512.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/adi/profile_sha.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/plugins/core_browser/ie/ie.prototype.polyfill.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>    <script>if (/*@cc_on!@*/false && document.documentMode === 10) {
                document.documentElement.className += ' ie ie10';
            }</script>
        <script src="<?php echo base_url(); ?>assets/js/common.js"></script> 
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
        <script>
            $(document).ready(function () {   
                <?php if ($status == 'danger') { ?>
                $('.alert-danger').fadeOut(6000);
                <?php } ?>
                    $('#CloseButton').click(function(){
                        $('.alert-danger').hide();
                    });
                $('#loginForm').bootstrapValidator({
                    message: 'This value is not valid',
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        emailId: {
                            validators: {
                                notEmpty: {
                                    message: 'The User Name is required'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'The Password is required'
                                }


                            }
                        }

                    }
                })

                        .on('success.form.bv', function (e) {
                            e.preventDefault();

                            var emailId = $('#emailId').val();
                            var password = $('#password').val();
                            $.ajax({
                                async: true,
                                type: "POST",
                                url: CURRENT_URL + '/login/verify_login',
                                data: {emailId: emailId, password: password},
                                beforeSend: function ()
                                {
                                    $("#addloader1").show();

                                },
                                success: function (data) {
                                    // console.log(data);  
                                    //return false;
                                    if (data == 1) {
                                        //window.location.replace(CURRENT_URL + '/dashboard/index');
                                        window.location.replace(CURRENT_URL + '/timesheet/time_list');
                                    } else if(data == 2){
                                        window.location.replace(CURRENT_URL + '/dashboard/index');
                                    } else {
                                        window.location.replace(CURRENT_URL + '/login/index');
                                    }
//alert(data);
                                },
                                error: function (xhr, status, error) {
                                    alert(status);
                                },
                                complete: function ()
                                {
                                    $("#addloader1").hide();
                                }
                            });

                        });

            });
        </script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-2SDDRGTJMT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2SDDRGTJMT');
</script> -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-238173381-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-238173381-1');
</script>

    <script id="chatBT" chatKey= "EZFjdyxBq4su2Ik9AHb8" src="https://dev.zyratalk.com/contractorschatbot/js/botdistribution.js" type="text/javascript"></script>
    
    </head>
    <body class=" loginWrapper">
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5QJJNT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <!-- Main Container Fluid -->
        <div class="container-fluid menu-hidden">		
            <!-- Content -->
            <div id="content">
                <div class="navbar hidden-print main navbar-default" role="navigation">
                    <div class="user-action user-action-btn-navbar pull-right">
                        <button class="btn btn-sm btn-navbar btn-inverse btn-stroke hidden-lg hidden-md"><i class="fa fa-bars fa-2x"></i></button>
                    </div>
                    <a href="#" class="logo">
                        <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="SMART" width="150" height="28"/>
                    </a>
                </div>
                <div class="row innerT inner-2x">
                    <div class="col-md-4 col-md-offset-4 innerT inner-2x">
                        <div class="innerT inner-2x">
                            <div class="widget innerLR innerB margin-none">
                                <h3 class="innerTBLogin text-center">Account Access</h3>
                                <div class="lock-container">
                                    <div class=" text-center">
                                        <a href="" > 
                                            <img src="<?php echo base_url(); ?>assets/img/user_male_1-512.png" alt="people" class="" style="height:150px; margin-bottom:20px;"/>
                                        </a>
                                        <!--<form id="loginForm" class="form-horizontal" method="post" role="form" action="<?php echo base_url(); ?>login/varifyLogin">-->
                                       <?php if ($status == 'danger') { ?>
                                                    <div class="alert alert-danger">
                                                        <button id="CloseButton" class="close" data-close="alert"></button>
                                                        <strong>Error!</strong> <?php echo $smgDisplay; ?>
                                                    </div>
<?php } ?> 
                                        <form id="loginForm" class="form-horizontal" role="form" onClick="return checkLoginCondition()">    
                                            <div align="center">

                                                <div class="form-group" style="width:250px;">
                                                    <input class="form-control text-center bg-gray" type="email" id="emailId" name="emailId" placeholder="Username"/>
                                                </div>
                                                <!--<div class="innerB half"></div>-->
                                                <div class="form-group" style="width:250px;">
                                                    <input class="form-control text-center bg-gray" type="password" id ="password" name="password" placeholder="Enter Password"/>
                                                    <img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;"/>
                                                </div>
                                                <div class="innerT half" >
                                                    <button type="submit"  class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right innerT half">
                                Forgot your password? <a href="<?php echo base_url(); ?>login/reset_password" class=" strong margin-none">Reset Password</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CREATE TASK MODAL -->
                <!-- // END MODAL -->		
            </div>
            <!-- // Content END -->	
            <div class="clearfix"></div>
            <!-- // Sidebar menu & content wrapper END -->
            <!-- // Footer END -->
        </div>
        <!-- // Main Container Fluid END -->
        <!-- Global -->
        <script data-id="App.Config">
            var App = {};
            var basePath = '',
                    commonPath = '<?php echo base_url(); ?>assets/',
                    rootPath = '../',
                    DEV = false,
                    componentsPath = '<?php echo base_url(); ?>assets/components/';

            var primaryColor = '#c72a25',
                    dangerColor = '#b55151',
                    successColor = '#609450',
                    infoColor = '#4a8bc2',
                    warningColor = '#ab7a4b',
                    inverseColor = '#45484d';

            var themerPrimaryColor = primaryColor;

        </script>
        <script src="<?php echo base_url(); ?>assets/library/bootstrap/js/bootstrap.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/core_nicescroll/jquery.nicescroll.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/core_preload/pace.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/components/core_preload/preload.pace.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/components/core/core.init.js?v=v1.0.0-rc1"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
    </body>
</html>
