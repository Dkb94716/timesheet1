<div class="innerLR" style="margin-top:30px;">

    <!-- Tabs -->
    <div class="relativeWrap">
        <div class="widget widget-tabs widget-tabs-double-2 widget-tabs-responsive">

            <!-- Tabs Heading -->
            <div class="widget-head">
                <ul>
                    <li id="corporate-data-tab" onclick="get_tab_content('corporate-data-tab');" class="active"><a class="list" href="#corporate-data-tab" data-toggle="tab"><i></i><span>Corporate Data</span></a></li>

                    <li id="licenses_tab" onclick="get_tab_content('licenses_tab');" ><a class="list"  href="#licenses_tab" data-toggle="tab"><i></i><span> Licenses and Permits</span></a></li>

                    <li id="bank_accounts_tab" onclick="get_tab_content('bank_accounts_tab');" ><a class="list"  href="#bank_accounts_tab" data-toggle="tab"><i></i><span> Bank Accounts</span></a></li>

                    <li id="finance_tax_tab" onclick="get_tab_content('finance_tax_tab');" ><a class="list" href="#finance_tax_tab" data-toggle="tab"><i></i><span>Finance, Tax and Audit</span></a></li>

                    <li id="director_tab" onclick="get_tab_content('director_tab');"><a class="credit_card" href="#director_tab" data-toggle="tab"><i></i><span>Director</span></a></li>

                    <li id="shareholder_tab"  onclick="get_tab_content('shareholder_tab');"><a class="cogwheel" href="#shareholder_tab" data-toggle="tab"><i></i><span> Shareholder</span></a></li>

                    <li id="beneficial_tab" onclick="get_tab_content('beneficial_tab');"><a class="snowflake" href="#beneficial_tab" data-toggle="tab"><i></i><span>Beneficial Owner</span></a></li>

                    <li id="compliance_tab" onclick="get_tab_content('compliance_tab');"><a class="snowflake" href="#compliance_tab" data-toggle="tab"><i></i><span>Compliance</span></a></li>

                    <li id="agreement_tab" onclick="get_tab_content('agreement_tab');"><a class="snowflake" href="#agreement_tab" data-toggle="tab"><i></i><span> Agreement and Contracts</span></a></li>

                    <li id="trusts_tab" onclick="get_tab_content('trusts_tab');"><a class="snowflake" href="#trusts_tab" data-toggle="tab"><i></i><span> Trusts</span></a></li>


                </ul>
            </div>
            <div id="item_success_msg" class="alert alert-success padding-for-modal" style="display:none;margin: 5px;">
                <button type="button" class="close-on-client" data-dismiss="alert">&times;</button>
                <span class="item-success-msg"></span>
            </div>
            <div id="item_err_msg" class="alert alert-danger padding-for-modal" style="display:none;margin: 5px;">
                <button type="button" class="close-on-client" data-dismiss="alert">&times;</button>
                <span class="item-error-msg"> </span>
            </div>
            <!-- // Tabs Heading END -->

            <div class="widget-body">
                <div class="tab-content">
                 <!-- for ajax load content-->
                    <div id="tab_bar" class="tab-pane active widget-body-regular" style="padding:0;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="wait" style="display:none;position:absolute;top:50%;left:50%;"><img src="<?php echo base_url();?>assets/images/loader.gif"/></div>


<!-- Global -->
<script data-id="App.Config">
    var App = {};
    var basePath = '',
            commonPath = '../assets/',
            rootPath = '../',
            DEV = false,
            componentsPath = '../assets/components/';

    var primaryColor = '#c72a25',
            dangerColor = '#b55151',
            successColor = '#609450',
            infoColor = '#4a8bc2',
            warningColor = '#ab7a4b',
            inverseColor = '#45484d';

    var themerPrimaryColor = primaryColor;

</script>
<script>
    $(document).ready(function() {
        get_tab_content('corporate-data-tab','first')
        
        /********END Reset Modal Box***************/

    });
    function deleteDiv(myDiv) {
        $(myDiv).parent().parent().parent().remove()
    }
    function deleteDiv1(myDiv) {
        $(myDiv).parent().parent().remove()
    }
</script>
<!--    <script src="../assets/library/bootstrap/js/bootstrap.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="../assets/plugins/core_nicescroll/jquery.nicescroll.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="../assets/plugins/core_preload/pace.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="../assets/components/core_preload/preload.pace.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="../assets/components/forms_elements_fuelux-checkbox/fuelux-checkbox.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->

<script src="<?php echo base_url(); ?>assets/components/forms_elements_fuelux-radio/fuelux-radio.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/plugins/forms_elements_jasny-fileupload/js/bootstrap-fileupload.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/plugins/forms_editors_wysihtml5/js/wysihtml5-0.3.0_rc2.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/plugins/forms_editors_wysihtml5/js/bootstrap-wysihtml5-0.0.2.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/components/forms_editors_wysihtml5/wysihtml5.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/components/forms_elements_button-states/button-loading.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<!--    <script src="../assets/plugins/forms_elements_bootstrap-select/js/bootstrap-select.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->
<!--    <script src="../assets/components/forms_elements_bootstrap-select/bootstrap-select.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->
<!--    <script src="../assets/plugins/forms_elements_select2/js/select2.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->
<script src="<?php echo base_url(); ?>assets/components/forms_elements_select2/select2.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/plugins/forms_elements_multiselect/js/jquery.multi-select.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/components/forms_elements_multiselect/multiselect.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/plugins/forms_elements_inputmask/jquery.inputmask.bundle.min.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<script src="<?php echo base_url(); ?>assets/components/forms_elements_inputmask/inputmask.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<!--    <script src="../assets/plugins/forms_elements_bootstrap-datepicker/js/bootstrap-datepicker.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->
<!--    <script src="../assets/components/forms_elements_bootstrap-datepicker/bootstrap-datepicker.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>-->
<!--    <script src="../assets/components/menus/sidebar.main.init.js?v=v1.0.0-rc1"></script>-->
<!--    <script src="../assets/components/menus/sidebar.collapse.init.js?v=v1.0.0-rc1"></script>-->

<script src="<?php echo base_url(); ?>assets/components/ui_modals/modals.init.js?v=v1.0.0-rc1&amp;sv=v0.0.1.2"></script>
<!--	<script src="http://dev.clavistechnologies.com/newtimesheet/assets/js/bootstrapValidator.min.js"></script>-->
<script>
    $(document).ready(function(){
        get_tab_content('corporate-data-tab','first')
    });    
    function get_tab_content(tab,flag){
        if($('#'+tab).attr('class')=="active" && flag!="first"){
        } else {
            $('#wait').fadeIn();
            var client_id = '<?php echo $client_id;?>';
			var client_name = '<?php echo $client_info_id_detail[0]->client_name; ?>';
            $.ajax({
                    url: CURRENT_URL + '/databaseinfo/get_tab',
                    type: "GET",
                    data: {tab:tab,client_id:client_id,client_name:client_name},
                    success: function(msg){
                        setTimeout(function(){
                            $('#tab_bar').html(msg);
                            $('#wait').fadeOut();
                        },1000)
                        

                    }
            });
        }
    }
</script>


<div id="client_info" client_id = "<?php echo $client_id;?>" style="display:none;" last_dir_com="!@#$%^&*()"></div>

