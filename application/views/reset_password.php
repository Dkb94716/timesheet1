
<!DOCTYPE html>
<html class="paceSimple">
<head>
    <title>Welcome to ANEX</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin/module.admin.stylesheet-complete.min.css" />
        <script src="<?php echo base_url(); ?>assets/library/jquery/jquery.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/library/jquery/jquery-migrate.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/library/modernizr/modernizr.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/core_less-js/less.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/charts_flot/excanvas.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/adi/sha512.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/adi/profile_sha.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/core_browser/ie/ie.prototype.polyfill.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>    <script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>
        <script src="<?php echo base_url(); ?>assets/js/common.js"></script> 
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
        
<script>
$(document).ready( function() {
        $('#CloseButton').click(function(){
                //    alert('test');
                    $('#displaySmg').css('display','none');
                });
	$('#resetForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
 
	      email: {
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required'
                    }
                }
            }
        }
    })
	.on('success.form.bv', function(e) {
		e.preventDefault();
                var emailId = $('#emailadd').val();
			$.ajax({
				
				async: true , 
				type: "POST" , 
				
				url: CURRENT_URL +'/login/reset_submit', 
				dataType: "json" , 
				data: {emailId: emailId}, 
				beforeSend: function()
				{
					$("#addloader").show();
				},
				success: function(data) {
					       
                                                
                                        if(data.status=='success'){
                                        $('#displaySmg').html('<div class="alert alert-success" style="width:324px;"><button  class="close2" id="CloseButton" data-close="alert"></button>'+ data.smgDisplay+'</div>');     
                                        }else{
                                        $('#displaySmg').html('<div class="alert alert-danger" style="width:324px;"><button  class="close2" id="CloseButton"  data-close="alert"></button><strong>Error!</strong>'+ data.smgDisplay+'</div>');   
                                        }
                                        
				},
				error: function(xhr,status,error) { 
					bootbox.alert(status);
				},
				complete:function()
				{
					$("#addloader").hide();
				}
			});
	});
        
             
	});
	

</script>
</head>

<body class=" loginWrapper">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid menu-hidden">
		
				
		<!-- Content -->
		<div id="content">

			<div class="navbar hidden-print main navbar-default" role="navigation">
	<div class="user-action user-action-btn-navbar pull-right">
		<button class="btn btn-sm btn-navbar btn-inverse btn-stroke hidden-lg hidden-md"><i class="fa fa-bars fa-2x"></i></button>
	</div>
	<a href="dashboard.php" class="logo">
		<img src="<?php echo base_url(); ?>assets/img/ANEX-LOGO.png" alt="SMART" />
	</a>
	
	
</div>
<!-- // END navbar -->





<div class="row innerT inner-2x">
    <div class="col-md-4 col-md-offset-4 innerT inner-2x">
        <div class="innerT inner-2x">
                <div class="widget innerLR innerB margin-none">
                    <h3 class="text-center" style="padding-top: 20px;padding-bottom: 20px;">Reset Password</h3>
                    <div class="lock-container">
                        <div class=" text-center">
                            <a href="" > 
                            	<img src="<?php echo base_url(); ?>assets/img/user_male_1-512.png" alt="people" class="" style="margin-bottom:20px; height:150px;">
                            </a>
							<p class="text-center" style="font-size:16px;">
								<strong>To reset your password, enter your registered email address</strong>
							</p>							
		           <form id="resetForm" class="form-horizontal" role="form">
                             <div align="center">  
                             <div id="displaySmg"></div>    
                            <div class="form-group" style="padding-bottom:0px; width:324px;">
                                <input class="form-control text-center bg-gray" type="email" required name="email" id="emailadd" placeholder="Email"/>
                                <div class="innerB half">
				  <img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;"/>
				</div>
                            </div>
                            <div class="innerT half">
                                <button type="submit" class="btn btn-success" style="width:90%;">Send me my password</button>
                            </div>
                          </div>       
			</form>

                        </div>

                    </div>
                </div>
                <div class="text-center innerT half resetpasswordborder">
					<a href="<?php echo base_url(); ?>login/index" class=" strong" style="color:#1fae66 !important;">Login</a>
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
        var App = {};        var basePath = '',
            commonPath = 'assets/',
            rootPath = '../',
            DEV = false,
            componentsPath = 'assets/components/';

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
