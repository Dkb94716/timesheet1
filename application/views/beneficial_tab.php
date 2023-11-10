<?php echo "hi".$client_info_id_detail[0]->client_info_id;?>

<div class="innerLR" style="margin-top:30px;">

    <!-- Tabs -->
    <div class="relativeWrap">
        <div class="widget widget-tabs widget-tabs-double-2 widget-tabs-responsive">

            <!-- Tabs Heading -->
            <div class="widget-head">
                <ul>
                    <li onclick="get_tab_content('corporate-data-tab');" class="active"><a class="list" href="#corporate-data-tab" data-toggle="tab"><i></i><span>Corporate Data</span></a></li>

                    <li onclick="get_tab_content('licenses_tab');" class="user"><a class="list"  href="#licenses_tab" data-toggle="tab"><i></i><span> Licenses and Permits</span></a></li>

                    <li onclick="get_tab_content('bank_accounts_tab');" class="user"><a class="list"  href="#bank_accounts_tab" data-toggle="tab"><i></i><span> Bank Accounts</span></a></li>

                    <li onclick="get_tab_content('finance_tax_tab');" class="user"><a class="list" href="#finance_tax_tab" data-toggle="tab"><i></i><span>Finance, Tax and Audit</span></a></li>

                    <li onclick="get_tab_content('director_tab');"><a class="credit_card" href="#director_tab" data-toggle="tab"><i></i><span>Director</span></a></li>

                    <li onclick="get_tab_content('shareholder_tab');"><a class="cogwheel" href="#shareholder_tab" data-toggle="tab"><i></i><span> Shareholder</span></a></li>

                    <li onclick="get_tab_content('beneficial_tab');"><a class="snowflake" href="#beneficial_tab" data-toggle="tab"><i></i><span>Beneficial Owner</span></a></li>

                    <li onclick="get_tab_content('compliance_tab');"><a class="snowflake" href="#compliance_tab" data-toggle="tab"><i></i><span>Compliance</span></a></li>

                    <li onclick="get_tab_content('agreement_tab');"><a class="snowflake" href="#agreement_tab" data-toggle="tab"><i></i><span> Agreement and Contracts</span></a></li>

                    <li onclick="get_tab_content('trusts_tab');"><a class="snowflake" href="#trusts_tab" data-toggle="tab"><i></i><span> Trusts</span></a></li>


                </ul>
            </div>
            <!-- // Tabs Heading END -->

            <div class="widget-body">
                <div class="tab-content">
                 <!-- for ajax load content-->
                    <div id="tab_bar" class="tab-pane active widget-body-regular" style="padding:0;">
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    
                    
                    <!-----END Licenses Tab------------->

                    <!-----START bank_accounts_tab----------->
                    <div id="bank_accounts_tab" class="tab-pane widget-body-regular" style="padding:0px;">
                        <div class="tab-content" style="padding-left:11px;padding-right:10px;">
                            <a href="#add-bank-accounts-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
                            <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;">
                                <table class="dynamicTable tableTools table table-striped overflow-x">
                                    <thead>
                                        <tr style="background-color:#c72a25; color:#FFF;">
                                            <th class="thead-th-padg" width="160px">Name of bank</th>
                                            <th class="thead-th-padg" width="160px">Type of account</th>
                                            <th class="thead-th-padg" width="160px">Currency</th>
                                            <th class="thead-th-padg" width="160px">Account no.</th>
                                            <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeX">
                                            <td><span class="td-text-area">HDFC</span></td>
                                            <td><span class="td-text-area">Saving</span></td>
                                            <td><span class="td-text-area">Indian</span></td>
                                            <td><span class="td-text-area">A0052368</span></td>
                                            <td style="width:100px !important; text-align:center;" class="">
                                                <a href="#edit-bank-accounts-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                                <a href="#delete-bank-accounts-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                                            </td>
                                        </tr>                           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-----END bank_accounts_tab------------->

                    <!-----START Finance Tax Addit Tab----->
                    
                    <!-----END Finance Tax Addit Tab----->

                    <!-----START Director Tab------->
                    
                    <!-----END Director Tab------->

                    <!-----START Shareholder Tab------>
                    
                    <!-----END Shareholder Tab------>

                    <!-----START Beneficial Owner and Authorised Persons Tab------>
                    <div id="beneficial_tab" class="tab-pane widget-body-regular" style="padding:0px;">
                        <div class="box-generic" style="padding:0px;box-shadow:none;">
                            <!-----START Beneficial Sub tab----->
                            <div class="tabsbar" style="height:30px;">
                                <ul style="height:30px;">
                                    <li class="camera active" style="height:30px;">
                                        <a href="#beneficial_owner_individual-tab" data-toggle="tab" style="height:24px;line-height:24px;">Individual</a>
                                    </li>

                                    <li class="folder_open" style="height:30px;">
                                        <a href="#beneficial_owner_corporate-tab" data-toggle="tab" style="height:24px;line-height:24px;">Corporate</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" style="padding-left:11px;padding-right:10px;">

                                <!---START beneficial_owner_individual-tab--->
                                <div class="tab-pane active" id="beneficial_owner_individual-tab">
                                    <a href="#add-beneficial-owner-individual-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
                                    <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;">
                                        <table class="dynamicTable tableTools table table-striped overflow-x">
                                            <thead>
                                                <tr style="background-color:#c72a25; color:#FFF;">
                                                    <th class="thead-th-padg" width="160px">Name of beneficial owner</th>
                                                    <th class="thead-th-padg" width="160px">CV</th>
                                                    <th class="thead-th-padg" width="160px">Bank reference</th>
                                                    <th class="thead-th-padg" width="160px">Proof of address</th>
                                                    <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="gradeX">
                                                    <td><span class="td-text-area">Shiju jacob</span></td>
                                                    <td><span class="td-text-area">No</span></td>
                                                    <td><span class="td-text-area">No</span></td>
                                                    <td><span class="td-text-area">No</span></td>
                                                    <td style="width:100px !important; text-align:center;" class="">
                                                        <a href="#edit-beneficial-owner-individual-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                                        <a href="#delete-beneficial-owner-individual-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                                                    </td>
                                                </tr>                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!---END beneficial_owner_individual-tab--->

                                <!---START beneficial_owner_corporate-tab--->
                                <div class="tab-pane" id="beneficial_owner_corporate-tab">
                                    <a href="#add-beneficial-owner-corporate-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
                                    <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;">
                                        <table class="dynamicTable tableTools table table-striped overflow-x">
                                            <thead>
                                                <tr style="background-color:#c72a25; color:#FFF;">
                                                    <th class="thead-th-padg" width="160px">Name of company</th>
                                                    <th class="thead-th-padg" width="160px">Represented by</th>
                                                    <th class="thead-th-padg" width="160px">Registered in</th>
                                                    <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="gradeX">
                                                    <td><span class="td-text-area">ANEX</span></td>
                                                    <td><span class="td-text-area">Team</span></td>
                                                    <td><span class="td-text-area">Company</span></td>
                                                    <td style="width:100px !important; text-align:center;" class="">
                                                        <a href="#edit-beneficial-owner-corporate-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                                        <a href="#delete-beneficial-owner-corporate-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                                                    </td>
                                                </tr>                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!---END beneficial_owner_corporate-tab--->
                            </div>
                            <!-----END Beneficial Sub tab------->
                        </div>
                    </div>
                    <!-----END Beneficial Owner and Authorised Persons Tab------>

                    <!----------------START compliance_tab---------------------->
                    <div id="compliance_tab" class="tab-pane widget-body-regular">
                        <!--<h5>Agreement and Contracts</h5>-->
                        <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;">
                            <a href="#add-compliance-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
                            <table class="dynamicTable tableTools table table-striped overflow-x">
                                <thead>
                                    <tr style="background-color:#c72a25; color:#FFF;">
                                        <th class="thead-th-padg" width="160px">Checklist number</th>
                                        <th class="thead-th-padg" width="160px">Remark</th>
                                        <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gradeX">
                                        <td><span class="td-text-area">982472974239847</span></td>
                                        <td><span class="td-text-area">There is some text</span></td>
                                        <td style="width:100px !important; text-align:center;" class="">
                                            <a href="#edit-compliance-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                            <a href="#delete-compliance-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                                        </td>
                                    </tr>                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!----------------END compliance_tab------------------------->

                    <!-----START Agreement and Contracts Tab------>
                    <div id="agreement_tab" class="tab-pane widget-body-regular">
                        <!--<h5>Agreement and Contracts</h5>-->
                        <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;">
                            <a href="#add-agreements-and-contracts-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
                            <table class="dynamicTable tableTools table table-striped overflow-x">
                                <thead>
                                    <tr style="background-color:#c72a25; color:#FFF;">
                                        <th class="thead-th-padg" width="160px">Type of agreement </th>
                                        <th class="thead-th-padg" width="160px">Date signed</th>
                                        <th class="thead-th-padg" width="160px">Date of termination</th>
                                        <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gradeX">
                                        <td><span class="td-text-area">ANEX</span></td>
                                        <td><span class="td-text-area">31 March 2023</span></td>
                                        <td><span class="td-text-area">31 March 2023</span></td>
                                        <td style="width:100px !important; text-align:center;" class="">
                                            <a href="#edit-agreements-and-contracts-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                            <a href="#delete-agreements-and-contracts-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                                        </td>
                                    </tr>                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-----END Agreement and Contracts Tab------>

                    <!-----START Trusts Tab------>
                    <div id="trusts_tab" class="tab-pane widget-body-regular" style="padding:0px;">
                        <div class="box-generic" style="padding:0px;box-shadow:none;">
                            <!-----START Trusts Sub tab----->
                            <div class="tabsbar" style="height:30px;">
                                <ul style="height:30px;">
                                    <li class="camera active" style="height:30px;">
                                        <a href="#trusts_individual-tab" data-toggle="tab" style="height:24px;line-height:24px;">Individual</a>
                                    </li>

                                    <li class="folder_open" style="height:30px;">
                                        <a href="#trusts_corporate-tab" data-toggle="tab" style="height:24px;line-height:24px;">Corporate</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" style="padding-left:11px;padding-right:10px;">

                                <!---START Trusts_individual-tab--->
                                <div class="tab-pane active" id="trusts_individual-tab">
                                    <a href="#add-trusts_individual-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
                                    <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;">
                                        <table class="dynamicTable tableTools table table-striped overflow-x">
                                            <thead>
                                                <tr style="background-color:#c72a25; color:#FFF;">
                                                    <th class="thead-th-padg" width="160px">Are there trustees other than anex</th>
                                                    <th class="thead-th-padg" width="160px">Trust deed available</th>
                                                    <th class="thead-th-padg" width="160px">Declaration of non-residence available</th>
                                                    <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="gradeX">
                                                    <td><span class="td-text-area">No</span></td>
                                                    <td><span class="td-text-area">Yes</span></td>
                                                    <td><span class="td-text-area">No</span></td>
                                                    <td style="width:100px !important; text-align:center;" class="">
                                                        <a href="#edit-trusts_individual-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                                        <a href="#delete-trusts_individual-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                                                    </td>
                                                </tr>                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!---END Trusts_individual-tab--->

                                <!---START Trusts_corporate-tab--->
                                <div class="tab-pane" id="trusts_corporate-tab">
                                    <a href="#add-trusts_corporate-modal-box" data-toggle="modal" class="btn-xs btn-success pull-right" style="margin-bottom:5px;">Add More</a>
                                    <div class="widget-body overflow-x" style="padding:10px 0px;width:100%;">
                                        <table class="dynamicTable tableTools table table-striped overflow-x">
                                            <thead>
                                                <tr style="background-color:#c72a25; color:#FFF;">
                                                    <th class="thead-th-padg" width="160px">Name of company</th>
                                                    <th class="thead-th-padg" width="160px">Represented by</th>
                                                    <th class="thead-th-padg" width="160px">Registered in</th>
                                                    <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="gradeX">
                                                    <td><span class="td-text-area">ANEX</span></td>
                                                    <td><span class="td-text-area">Team</span></td>
                                                    <td><span class="td-text-area">Company</span></td>
                                                    <td style="width:100px !important; text-align:center;" class="">
                                                        <a href="#edit-trusts_corporate-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                                        <a href="#delete-trusts_corporate-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                                                    </td>
                                                </tr>                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!---END Trusts_corporate-tab--->
                            </div>
                            <!-----END Trusts Sub tab------->
                        </div>
                    </div>
                    <!-----END Trusts Tab------>

                </div>
            </div>
        </div>
    </div>
</div>

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

        /*********START Accounts yes no radio button**********/
        $("#show_date_of_special").click(function() {
            $("#date_of_special").slideDown();
        });

        $("#hide_date_of_special").click(function() {
            $("#date_of_special").slideUp();
        });
        /*********END Accounts yes no radio button**********/

        /*********START Accounts yes no radio button-edit**********/
        $("#show_date_of_special-edit").click(function() {
            $("#date_of_special-edit").slideDown();
        });

        $("#hide_date_of_special-edit").click(function() {
            $("#date_of_special-edit").slideUp();
        });
        /*********END Accounts yes no radio button-edit**********/

        /*********START TXA/TRC yes no radio button**********/
        $("#show_trc_available").click(function() {
            $("#show_hide_trc_available_div").slideDown();
        });
        $("#hide_trc_available").click(function() {
            $("#show_hide_trc_available_div").slideUp();
        });
        /***********END TXA/TRC yes no radio button**********/

        /*********START Substance Conditions Adopted yes no radio button**********/
        $("#show_address").click(function() {
            $("#show-hide_address").slideDown();
        });
        $("#hide_address").click(function() {
            $("#show-hide_address").slideUp();
        });
        /***********END Substance Conditions Adopted yes no radio button**********/

        /*********START Adopted Arbitration yes no radio button**********/
        $("#show_adopted_arbitration").click(function() {
            $("#show_hide_adopted_arbitration_div").slideDown();
        });
        $("#hide_adopted_arbitration").click(function() {
            $("#show_hide_adopted_arbitration_div").slideUp();
        });
        /***********END Adopted Arbitration yes no radio button**********/

        /*********START shares_are_listed yes no radio button**********/
        $("#direcgorship_textarea_show_div").click(function() {
            $("#directorship_textarea_show_hide_div").slideDown();
        });
        $("#direcgorship_textarea_hide_div").click(function() {
            $("#directorship_textarea_show_hide_div").slideUp();
        });
        /***********END shares_are_listed yes no radio button**********/

        /*********START Directorship yes no radio button**********/
        $("#show_share_are_listed").click(function() {
            $("#show_hide_shares_are_listed").slideDown();
        });
        $("#hide_share_are_listed").click(function() {
            $("#show_hide_shares_are_listed").slideUp();
        });
        /***********END Directorship yes no radio button**********/

        /*********START KYC passport yes no radio button**********/
        $("#kyc_passport_show_div").click(function() {
            $("#kyc_passport_hide_show_div").slideDown();
        });
        $("#kyc_passport_hide_div").click(function() {
            $("#kyc_passport_hide_show_div").slideUp();
        });
        /***********END KYC passport yes no radio button**********/

        /*********START KYC bank refrence yes no radio button**********/
        $("#bank_refrence_show_div").click(function() {
            $("#bank_refrence_show_hide_div").slideDown();
        });
        $("#bank_refrence_hide_div").click(function() {
            $("#bank_refrence_show_hide_div").slideUp();
        });
        /***********END KYC refrence yes no radio button**************/

        /*********START Proof of address yes no radio button**********/
        $("#proof_of_address_show_div").click(function() {
            $("#proof_of_address_show_hide_div").slideDown();
        });
        $("#proof_of_address_hide_div").click(function() {
            $("#proof_of_address_show_hide_div").slideUp();
        });
        /***********END Proof of address yes no radio button**********/

        /*********START passport yes no radio button**********/
        $("#audited_accounts_show_div").click(function() {
            $("#audited_accounts_show_hide_div").slideDown();
        });
        $("#audited_accounts_hide_div").click(function() {
            $("#audited_accounts_show_hide_div").slideUp();
        });
        /***********END passport yes no radio button**********/

        /*********START passport yes no radio button**********/
        $("#passport_show_div").click(function() {
            $("#passport_show_hide_div").slideDown();
        });
        $("#passport_hide_div").click(function() {
            $("#passport_show_hide_div").slideUp();
        });
        /***********END passport yes no radio button**********/

        /*********START beneficial-owner-passport_show_hide_div yes no radio button**********/
        $("#beneficial-owner-passport_show_div").click(function() {
            $("#beneficial-owner-passport_show_hide_div").slideDown();
        });
        $("#beneficial-owner-passport_hide_div").click(function() {
            $("#beneficial-owner-passport_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-passport_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-cv_show_hide_div yes no radio button**********/
        $("#beneficial-owner-cv_show_div").click(function() {
            $("#beneficial-owner-cv_show_hide_div").slideDown();
        });
        $("#beneficial-owner-cv_hide_div").click(function() {
            $("#beneficial-owner-cv_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-cv_show_hide_div yes no radio button**********/

        /*********START  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/
        $("#beneficial-owner-bank-reference_show_div").click(function() {
            $("#beneficial-owner-bank-reference_show_hide_div").slideDown();
        });
        $("#beneficial-owner-bank-reference_hide_div").click(function() {
            $("#beneficial-owner-bank-reference_show_hide_div").slideUp();
        });
        /***********END  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-proof_add_show_hide_div yes no radio button**********/
        $("#beneficial-owner-proof_add_show_div").click(function() {
            $("#beneficial-owner-proof_add_show_hide_div").slideDown();
        });
        $("#beneficial-owner-proof_add_hide_div").click(function() {
            $("#beneficial-owner-proof_add_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-proof_add_show_hide_div yes no radio button**********/

        /*********START register_of_directors_show_hide_div yes no radio button**********/
        $("#register_of_directors_show_div").click(function() {
            $("#register_of_directors_show_hide_div").slideDown();
        });
        $("#register_of_directors_hide_div").click(function() {
            $("#register_of_directors_show_hide_div").slideUp();
        });
        /***********END register_of_directors_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-passport_show_hide_div yes no radio button**********/
        $("#beneficial-owner-passport-2_show_div").click(function() {
            $("#beneficial-owner-passport-2_show_hide_div").slideDown();
        });
        $("#beneficial-owner-passport-2_hide_div").click(function() {
            $("#beneficial-owner-passport-2_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-passport_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-audited-accounts_show_hide_div yes no radio button**********/
        $("#beneficial-owner-audited-accounts_show_div").click(function() {
            $("#beneficial-owner-audited-accounts_show_hide_div").slideDown();
        });
        $("#beneficial-owner-audited-accounts_hide_div").click(function() {
            $("#beneficial-owner-audited-accounts_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-audited-accounts_show_hide_div yes no radio button**********/

        /*********START  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/
        $("#beneficial-owner-bank-reference-2_show_div").click(function() {
            $("#beneficial-owner-bank-reference-2_show_hide_div").slideDown();
        });
        $("#beneficial-owner-bank-reference-2_hide_div").click(function() {
            $("#beneficial-owner-bank-reference-2_show_hide_div").slideUp();
        });
        /***********END  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-proof_add-2_show_hide_div yes no radio button**********/
        $("#beneficial-owner-proof_add-2_show_div").click(function() {
            $("#beneficial-owner-proof_add-2_show_hide_div").slideDown();
        });
        $("#beneficial-owner-proof_add-2_hide_div").click(function() {
            $("#beneficial-owner-proof_add-2_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-proof_add-2_show_hide_div yes no radio button**********/

        /*********START trusts_individual-are-there_show_hide_div yes no radio button**********/
        $("#trusts_individual-are-there_show_div").click(function() {
            $("#trusts_individual-are-there_show_hide_div").slideDown();
        });
        $("#trusts_individual-are-there_hide_div").click(function() {
            $("#trusts_individual-are-there_show_hide_div").slideUp();
        });
        /***********END trusts_individual-are-there_show_hide_div yes no radio button**********/

        /*********START trusts_individual-letter_of_wishes_show_div yes no radio button**********/
        $("#trusts_individual-letter_of_wishes_show_div").click(function() {
            $("#trusts_individual-letter_of_wishes_show_hide_div").slideDown();
        });
        $("#trusts_individual-letter_of_wishes_hide_div").click(function() {
            $("#trusts_individual-letter_of_wishes_show_hide_div").slideUp();
        });
        /***********END trusts_individual-letter_of_wishes_show_div yes no radio button**********/

        /*********START trusts_individual-are_accounts_show_hide_div yes no radio button**********/
        $("#trusts_individual-are_accounts_show_div").click(function() {
            $("#trusts_individual-are_accounts_show_hide_div").slideDown();
        });
        $("#trusts_individual-are_accounts_hide_div").click(function() {
            $("#trusts_individual-are_accounts_show_hide_div").slideUp();
        });
        /***********END trusts_individual-are_accounts_show_hide_div yes no radio button**********/

        /*********START trusts_individual-is_the_tax_show_hide_div yes no radio button**********/
        $("#trusts_individual-is_the_tax_show_div").click(function() {
            $("#trusts_individual-is_the_tax_show_hide_div").slideDown();
        });
        $("#trusts_individual-is_the_tax_hide_div").click(function() {
            $("#trusts_individual-is_the_tax_show_hide_div").slideUp();
        });
        /***********END trusts_individual-is_the_tax_show_hide_div yes no radio button**********/

        /*********START trusts_individual-settlor_hide_show_div yes no radio button**********/
        $("#trusts_individual-settlor-pas_show_div").click(function() {
            $("#trusts_individual-settlor-pas_hide_show_div").slideDown();
        });
        $("#trusts_individual-settlor-pas_hide_div").click(function() {
            $("#trusts_individual-settlor-pas_hide_show_div").slideUp();
        });
        /***********END trusts_individual-settlor_hide_show_div yes no radio button**********/

        /*********START trusts_individual-settlor_show_hide_div yes no radio button**********/
        $("#trusts_individual-settlor_show_div").click(function() {
            $("#trusts_individual-settlor_show_hide_div").slideDown();
        });
        $("#trusts_individual-settlor_hide_div").click(function() {
            $("#trusts_individual-settlor_show_hide_div").slideUp();
        });
        /***********END trusts_individual-settlor_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-cv-2_show_hide_div yes no radio button**********/
        $("#beneficial-owner-cv-2_show_div").click(function() {
            $("#beneficial-owner-cv-2_show_hide_div").slideDown();
        });
        $("#beneficial-owner-cv-2_hide_div").click(function() {
            $("#beneficial-owner-cv-2_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-cv-2_show_hide_div yes no radio button**********/

        /*********START  beneficial-owner-bank-reference-3_show_hide_div yes no radio button**********/
        $("#beneficial-owner-bank-reference-3_show_div").click(function() {
            $("#beneficial-owner-bank-reference-3_show_hide_div").slideDown();
        });
        $("#beneficial-owner-bank-reference-3_hide_div").click(function() {
            $("#beneficial-owner-bank-reference-3_show_hide_div").slideUp();
        });
        /***********END  beneficial-owner-bank-reference-3_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-proof_add-3_show_hide_div yes no radio button**********/
        $("#beneficial-owner-proof_add-3_show_div").click(function() {
            $("#beneficial-owner-proof_add-3_show_hide_div").slideDown();
        });
        $("#beneficial-owner-proof_add-3_hide_div").click(function() {
            $("#beneficial-owner-proof_add-3_show_hide_div").slideUp();
        });
        /***********END beneficial-owner-proof_add-3_show_hide_div yes no radio button**********/

        /*********START trusts_carporate_regs_director_show_hide_div yes no radio button**********/
        $("#trusts_carporate_regs_director_show_div").click(function() {
            $("#trusts_carporate_regs_director_show_hide_div").slideDown();
        });
        $("#trusts_carporate_regs_director_hide_div").click(function() {
            $("#trusts_carporate_regs_director_show_hide_div").slideUp();
        });
        /***********END trusts_carporate_regs_director_show_hide_div yes no radio button**********/

        /*********START trusts_carporate-settlor-pas_hide_show_div yes no radio button**********/
        $("#trusts_carporate-settlor-pas_show_div").click(function() {
            $("#trusts_carporate-settlor-pas_hide_show_div").slideDown();
        });
        $("#trusts_carporate-settlor-pas_hide_div").click(function() {
            $("#trusts_carporate-settlor-pas_hide_show_div").slideUp();
        });
        /***********END trusts_carporate-audited_account_show_hide_div yes no radio button**********/

        /*********START trusts_carporate-audited_account_show_hide_div yes no radio button**********/
        $("#trusts_carporate-audited_account_show_div").click(function() {
            $("#trusts_carporate-audited_account_show_hide_div").slideDown();
        });
        $("#trusts_carporate-audited_account_hide_div").click(function() {
            $("#trusts_carporate-audited_account_show_hide_div").slideUp();
        });
        /***********END trusts_carporate-settlor-pas_hide_show_div yes no radio button**********/

        /*********START trusts_carporate-bank_ref_show_hide_div yes no radio button**********/
        $("#trusts_carporate-bank_ref_show_div").click(function() {
            $("#trusts_carporate-bank_ref_show_hide_div").slideDown();
        });
        $("#trusts_carporate-bank_ref_hide_div").click(function() {
            $("#trusts_carporate-bank_ref_show_hide_div").slideUp();
        });
        /***********END trusts_carporate-bank_ref_show_hide_div yes no radio button**********/

        /*********START trusts_carporate-proof_add_show_hide_div yes no radio button**********/
        $("#trusts_carporate-proof_add_show_div").click(function() {
            $("#trusts_carporate-proof_add_show_hide_div").slideDown();
        });
        $("#trusts_carporate-proof_add_hide_div").click(function() {
            $("#trusts_carporate-proof_add_show_hide_div").slideUp();
        });
        /***********END trusts_carporate-proof_add_show_hide_div yes no radio button**********/

        /*********START share-holder-individual-pas_show_hide_div yes no radio button**********/
        $("#share-holder-individual-pas_show_div").click(function() {
            $("#share-holder-individual-pas_show_hide_div").slideDown();
        });
        $("#share-holder-individual-pas_hide_div").click(function() {
            $("#share-holder-individual-pas_show_hide_div").slideUp();
        });
        /***********END share-holder-individual-pas_show_hide_div yes no radio button**********/

        /*********START share-holder-individula-cv_show_hide_div yes no radio button**********/
        $("#share-holder-individula-cv_show_div").click(function() {
            $("#share-holder-individula-cv_show_hide_div").slideDown();
        });
        $("#share-holder-individula-cv_hide_div").click(function() {
            $("#share-holder-individula-cv_show_hide_div").slideUp();
        });
        /***********END share-holder-individula-cv_show_hide_div yes no radio button**********/

        /*********START share-holder-individula-bank-reference_show_hide_div yes no radio button**********/
        $("#share-holder-individula-bank-reference_show_div").click(function() {
            $("#share-holder-individula-bank-reference_show_hide_div").slideDown();
        });
        $("#share-holder-individula-bank-reference_hide_div").click(function() {
            $("#share-holder-individula-bank-reference_show_hide_div").slideUp();
        });
        /***********END share-holder-individula-bank-reference_show_hide_div yes no radio button**********/

        /*********START share-holder-individual-proof_add_show_hide_div yes no radio button**********/
        $("#share-holder-individual-proof_add_show_div").click(function() {
            $("#share-holder-individual-proof_add_show_hide_div").slideDown();
        });
        $("#share-holder-individual-proof_add_hide_div").click(function() {
            $("#share-holder-individual-proof_add_show_hide_div").slideUp();
        });
        /***********END share-holder-individual-proof_add_show_hide_div yes no radio button**********/

        /*********START share-holder-individual-reg-dict_show_hide_div yes no radio button**********/
        $("#share-holder-individual-reg-dict_show_div").click(function() {
            $("#share-holder-individual-reg-dict_show_hide_div").slideDown();
        });
        $("#share-holder-individual-reg-dict_hide_div").click(function() {
            $("#share-holder-individual-reg-dict_show_hide_div").slideUp();
        });
        /***********END share-holder-individual-reg-dict_show_hide_div yes no radio button**********/

        /*********START share-holder-corporate-pas_show_hide_div yes no radio button**********/
        $("#share-holder-corporate-pas_show_div").click(function() {
            $("#share-holder-corporate-pas_show_hide_div").slideDown();
        });
        $("#share-holder-corporate-pas_hide_div").click(function() {
            $("#share-holder-corporate-pas_show_hide_div").slideUp();
        });
        /***********END share-holder-corporate-pas_show_hide_div yes no radio button**********/

        /*********START share-holder-corporate-audited-acco_show_hide_div yes no radio button**********/
        $("#share-holder-corporate-audited-acco_show_div").click(function() {
            $("#share-holder-corporate-audited-acco_show_hide_div").slideDown();
        });
        $("#share-holder-corporate-audited-acco_hide_div").click(function() {
            $("#share-holder-corporate-audited-acco_show_hide_div").slideUp();
        });
        /***********END share-holder-corporate-audited-acco_show_hide_div yes no radio button**********/

        /*********START share-holder-corporate-bank-reference_show_hide_div yes no radio button**********/
        $("#share-holder-corporate-bank-reference_show_div").click(function() {
            $("#share-holder-corporate-bank-reference_show_hide_div").slideDown();
        });
        $("#share-holder-corporate-bank-reference_hide_div").click(function() {
            $("#share-holder-corporate-bank-reference_show_hide_div").slideUp();
        });
        /***********END share-holder-corporate-bank-reference_show_hide_div yes no radio button**********/

        /*********START share-holder-corporate-proof_add_show_hide_div yes no radio button**********/
        $("#share-holder-corporate-proof_add_show_div").click(function() {
            $("#share-holder-corporate-proof_add_show_hide_div").slideDown();
        });
        $("#share-holder-corporate-proof_add_hide_div").click(function() {
            $("#share-holder-corporate-proof_add_show_hide_div").slideUp();
        });
        /***********END share-holder-corporate-proof_add_show_hide_div yes no radio button**********/

        /*********START bank-accou-net-banking_show_hide_div yes no radio button**********/
        $("#bank-accou-net-banking_show_div").click(function() {
            $("#bank-accou-net-banking_show_hide_div").slideDown();
        });
        $("#bank-accou-net-banking_hide_div").click(function() {
            $("#bank-accou-net-banking_show_hide_div").slideUp();
        });
        /***********END bank-accou-net-banking_show_hide_div yes no radio button**********/

        /*********START client-info-group-company_show_hide_div yes no radio button**********/
        $("#client-info-group-company_show_div").click(function() {
            $("#client-info-group-company_show_hide_div").slideDown();
        });
        $("#client-info-group-company_hide_div").click(function() {
            $("#client-info-group-company_show_hide_div").slideUp();
        });
        /***********END client-info-group-company_show_hide_div yes no radio button**********/


        /*************START reset add div element*****************/
        $(".btn-primary").click(function() {
            $(".removed_div").html('');
        });
        /*************END reset add div element*****************/

        /*********START license-type-show-hide_div on change function**********/
        $('#license-type-show-hide_div').on('change', function() {
            if ($('#license-type-show-hide_div').val() == '1') {
                $('#license-type-plus-icon').show();
                $('#license-type-edit-delete-icon').hide();
            } else {
                $('#license-type-plus-icon').hide();
                $('#license-type-edit-delete-icon').show();

            }
        });
        /***********END license-type-show-hide_div on change function**********/

        /*********START permit-type-show-hide_div on change function**********/
        $('#permit-type-show-hide_div').change(function() {
            if ($('#permit-type-show-hide_div').val() == '1') {
                $('#permit-type-plus-icon').show();
                $('#permit-type-edit-delete-icon').hide();
            } else {
                $('#permit-type-plus-icon').hide();
                $('#permit-type-edit-delete-icon').show();

            }
        });
        /***********END permit-type-show-hide_div on change function**********/

        /*********START permit-type-show-hide_div-edit on change function**********/
        $('#permit-type-show-hide_div-edit').change(function() {
            if ($('#permit-type-show-hide_div-edit').val() == '') {
                $('#permit-type-plus-icon-edit').show();
                $('#permit-type-edit-delete-icon-edit').hide();
            } else {
                $('#permit-type-plus-icon-edit').hide();
                $('#permit-type-edit-delete-icon-edit').show();

            }
        });
        /***********END permit-type-show-hide_div-edit on change function**********/

        /*********START license-type-show-hide_div-edit on change function**********/
        $('#license-type-show-hide_div-edit').change(function() {
            if ($('#license-type-show-hide_div-edit').val() == '1') {
                $('#license-type-plus-icon-edit').show();
                $('#license-type-edit-delete-icon-edit').hide();
            } else {
                $('#license-type-plus-icon-edit').hide();
                $('#license-type-edit-delete-icon-edit').show();

            }
        });
        /***********END license-type-show-hide_div-edit on change function**********/

        /*********START bank-onwer_bank-name-show-hide_div on change function**********/
        $('#bank-onwer_bank-name-show-hide_div').on('change', function() {
            if ($('#bank-onwer_bank-name-show-hide_div').val() == '') {
                $('#bank-onwer_bank-name-plus-icon').show();
                $('#bank-onwer_bank-name-edit-delete-icon').hide();
            } else {
                $('#bank-onwer_bank-name-plus-icon').hide();
                $('#bank-onwer_bank-name-edit-delete-icon').show();

            }
        });
        /***********END bank-onwer_bank-name-show-hide_div on change function**********/

        /*********START bank-onwer_account-type-show-hide_div on change function**********/
        $('#bank-onwer_account-type-show-hide_div').on('change', function() {
            if ($('#bank-onwer_account-type-show-hide_div').val() == '') {
                $('#bank-onwer_account-type-plus-icon').show();
                $('#bank-onwer_account-type-edit-delete-icon').hide();
            } else {
                $('#bank-onwer_account-type-plus-icon').hide();
                $('#bank-onwer_account-type-edit-delete-icon').show();

            }
        });
        /***********END bank-onwer_account-type-show-hide_div on change function**********/

        /*********START bank-onwer_currency-show-hide_div on change function**********/
        $('#bank-onwer_currency-show-hide_div').on('change', function() {
            if ($('#bank-onwer_currency-show-hide_div').val() == '') {
                $('#bank-onwer_currency-plus-icon').show();
                $('#bank-onwer_currency-edit-delete-icon').hide();
            } else {
                $('#bank-onwer_currency-plus-icon').hide();
                $('#bank-onwer_currency-edit-delete-icon').show();

            }
        });
        /***********END bank-onwer_currency-show-hide_div on change function**********/

        /*********START bank-onwer_account-no-show-hide_div on change function**********/
        $('#bank-onwer_account-no-show-hide_div').on('change', function() {
            if ($('#bank-onwer_account-no-show-hide_div').val() == '') {
                $('#bank-onwer_account-no-plus-icon').show();
                $('#bank-onwer_account-no-edit-delete-icon').hide();
            } else {
                $('#bank-onwer_account-no-plus-icon').hide();
                $('#bank-onwer_account-no-edit-delete-icon').show();

            }
        });
        /***********END bank-onwer_account-no-show-hide_div on change function**********/

        /*********START bank-onwer_bank-name-show-hide_div-edit on change function**********/
        $('#bank-onwer_bank-name-show-hide_div-edit').on('change', function() {
            if ($('#bank-onwer_bank-name-show-hide_div-edit').val() == '') {
                $('#bank-onwer_bank-name-plus-icon-edit').show();
                $('#bank-onwer_bank-name-edit-delete-icon-edit').hide();
            } else {
                $('#bank-onwer_bank-name-plus-icon-edit').hide();
                $('#bank-onwer_bank-name-edit-delete-icon-edit').show();

            }
        });
        /***********END bank-onwer_bank-name-show-hide_div-edit on change function**********/

        /*********START bank-onwer_account-type-show-hide_div-edit on change function**********/
        $('#bank-onwer_account-type-show-hide_div-edit').on('change', function() {
            if ($('#bank-onwer_account-type-show-hide_div-edit').val() == '') {
                $('#bank-onwer_account-type-plus-icon-edit').show();
                $('#bank-onwer_account-type-edit-delete-icon-edit').hide();
            } else {
                $('#bank-onwer_account-type-plus-icon-edit').hide();
                $('#bank-onwer_account-type-edit-delete-icon-edit').show();

            }
        });
        /***********END bank-onwer_account-type-show-hide_div-edit on change function**********/

        /*********START bank-onwer_currency-show-hide_div-edit on change function**********/
        $('#bank-onwer_currency-show-hide_div-edit').on('change', function() {
            if ($('#bank-onwer_currency-show-hide_div-edit').val() == '') {
                $('#bank-onwer_currency-plus-icon-edit').show();
                $('#bank-onwer_currency-edit-delete-icon-edit').hide();
            } else {
                $('#bank-onwer_currency-plus-icon-edit').hide();
                $('#bank-onwer_currency-edit-delete-icon-edit').show();

            }
        });
        /***********END bank-onwer_currency-show-hide_div-edit on change function**********/

        /*********START bank-onwer_account-no-show-hide_div-edit on change function**********/
        $('#bank-onwer_account-no-show-hide_div-edit').on('change', function() {
            if ($('#bank-onwer_account-no-show-hide_div-edit').val() == '') {
                $('#bank-onwer_account-no-plus-icon-edit').show();
                $('#bank-onwer_account-no-edit-delete-icon-edit').hide();
            } else {
                $('#bank-onwer_account-no-plus-icon-edit').hide();
                $('#bank-onwer_account-no-edit-delete-icon-edit').show();

            }
        });
        /***********END bank-onwer_account-no-show-hide_div-edit on change function**********/


        /*********START clint-info-status-show-hide_div change function**********/
        $('#clint-info-status-show-hide_div').on('change', function() {
            if ($('#clint-info-status-show-hide_div').val() == '0') {
                //alert("test");
                $('#client-inof-status-plus-icon').show();
                $('#client-inof-status-edit-delete-icon').hide();
            } else {
                $('#client-inof-status-plus-icon').hide();
                $('#client-inof-status-edit-delete-icon').show();

            }
        });
        /***********END clint-info-status-show-hide_div on change function**********/

        /*********START client-inof-type-of-company-show-hide_div change function**********/
        $('#client-inof-type-of-company-show-hide_div').on('change', function() {
            if ($('#client-inof-type-of-company-show-hide_div').val() == '0') {
                //alert("test");
                $('#client-inof-type-of-company-plus-icon').show();
                $('#client-inof-type-of-company-edit-delete-icon').hide();
            } else {
                $('#client-inof-type-of-company-plus-icon').hide();
                $('#client-inof-type-of-company-edit-delete-icon').show();

            }
        });
        /***********END client-inof-type-of-company-show-hide_div on change function**********/

        /*********START client-info-activity-show-hide_div change function**********/
        $('#client-info-activity-show-hide_div').on('change', function() {
            if ($('#client-info-activity-show-hide_div').val() == '0') {
                //alert("test");
                //$('#client-info-activity-plus-icon').show();
                //$('#client-info-activity-edit-delete-icon').hide();
                $("#client-info-activity_show_hide_input_filed").slideUp();
            } else {
                //$('#client-info-activity-plus-icon').hide();
                //$('#client-info-activity-edit-delete-icon').show();
                $("#client-info-activity_show_hide_input_filed").slideDown();

            }
        });
        /***********END client-info-activity-show-hide_div on change function**********/



        /*********START share-type-type-show-hide_div on change function**********/
        $('#share-type-type-show-hide_div').on('change', function() {
            if ($('#share-type-type-show-hide_div').val() == '') {
                $('#share-type-plus-icon').show();
                $('#share-type-edit-delete-icon').hide();
            } else {
                $('#share-type-plus-icon').hide();
                $('#share-type-edit-delete-icon').show();

            }
        });
        /***********END share-type-type-show-hide_div on change function**********/

        /*********START share-type-type-show-hide_div-corporate on change function**********/
        $('#share-type-type-show-hide_div-corporate').on('change', function() {
            if ($('#share-type-type-show-hide_div-corporate').val() == '') {
                $('#share-type-plus-icon-corporate').show();
                $('#share-type-edit-delete-icon-corporate').hide();
            } else {
                $('#share-type-plus-icon-corporate').hide();
                $('#share-type-edit-delete-icon-corporate').show();

            }
        });
        /***********END share-type-type-show-hide_div-corporate on change function**********/

        /*********START share-type-type-show-hide_div-corporate-transfer on change function**********/
        $('#share-type-type-show-hide_div-corporate-transfer').on('change', function() {
            if ($('#share-type-type-show-hide_div-corporate-transfer').val() == '') {
                $('#share-type-plus-icon-corporate-transfer').show();
                $('#share-type-edit-delete-icon-corporate-transfer').hide();
            } else {
                $('#share-type-plus-icon-corporate-transfer').hide();
                $('#share-type-edit-delete-icon-corporate-transfer').show();

            }
        });
        /***********END share-type-type-show-hide_div-corporate-transfer on change function**********/

        $('.modal').modal({backdrop: 'static', show: false, keyboard: false})

        $('.datepicker2').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        $('.datepicker2').bdatepicker("update", new Date());


        /********START adding more div elements********/
        $('#add_filed').on('click', function() {
            var inputToCopy = '<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">' + $('#addinput :first-child').html() + '</div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">' + $('#addinput').children().eq(1).html() + '</div></div>';
            $(inputToCopy).appendTo($('#addinput'));
            $("#addinput").children().last().children().eq(0).find("label").append('<a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onClick="deleteDiv(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a>');
            /*$('#addinput').children().children().find('label').after('<a href="#nogo" class="btn-xs btn-danger pull-right"><i class="fa fa-fw icon-delete-symbol pull-right removed_color" onClick="deleteDiv(this)"></i></a>');*/
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
            $('.datepicker2').bdatepicker("update", new Date());
        });

        $('#add_date_of_review_btn').on('click', function() {
            var str = '<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Date of review</label><div class="col-md-10" style="padding-left:0px;"><div class="input-group date datepicker2 col-sm-12"><input class="form-control height_25 stDate" type="text"><span class="input-group-addon padding_3"><i class="fa fa-th"></i></span></div></div><div class="col-md-2" style="padding:0px;"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" style="padding-left:0;"><i class="fa fa-fw icon-delete-symbol removed_icon_btn pull-right removed_color" onClick="deleteDiv(this)"></i></a></div></div></div>';
            $(str).appendTo($('#add_date_of_review_div'));
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
            $('.datepicker2').bdatepicker("update", new Date());
        });

        $('#add_checlist_no_btn').on('click', function() {
            var str = '<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Checklist number</label><div class="col-md-10" style="padding-left:0px;"><div class="input-group date datepicker2 col-sm-12"><input class="form-control height_25 stDate" type="text"></div></div><div class="col-md-2" style="padding:0px;"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" style="padding-left:0;"><i class="fa fa-fw icon-delete-symbol removed_icon_btn pull-right removed_color" onClick="deleteDiv(this)"></i></a></div></div></div>';
            $(str).appendTo($('#add_checlist_no_div'));
        });

        $('#add_date_of_review-edit_btn').on('click', function() {
            var str = '<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Date of review</label><div class="col-md-10" style="padding-left:0px;"><div class="input-group date datepicker2 col-sm-12"><input class="form-control height_25 stDate" type="text"><span class="input-group-addon padding_3"><i class="fa fa-th"></i></span></div></div><div class="col-md-2" style="padding:0px;"><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" style="padding-left:0;"><i class="fa fa-fw icon-delete-symbol removed_icon_btn pull-right removed_color" onClick="deleteDiv(this)"></i></a></div></div></div>';
            $(str).appendTo($('#add_date_of_review-edit_div'));
            $('.datepicker2').bdatepicker({
                format: "dd MM yyyy",
                autoclose: true
            });
            $('.datepicker2').bdatepicker("update", new Date());
        });


        $('#add_authoried_filed-btn').on('click', function() {
            var str = '<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Name of authorised persons</label><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv1(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a><input type="text" class="form-control height_25 plahole_font" style="width: 100%;"></div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Address</label><input type="text" class="form-control height_25 plahole_font" style="width: 100%;"></div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Email</label><input type="text" class="form-control height_25 plahole_font" style="width: 100%;"></div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Phone number</label><input type="text" class="form-control height_25 plahole_font" style="width: 100%;"></div></div>';
            $(str).appendTo($('#add_authoried_filed'));
        });


        /********END adding more div elements********/

        /********START Reset Modal Box***************/
        $('.modal').on('hidden.bs.modal', function() {

            for (var k = 0; k < $(this).find(".radioNoBtn").length; k++) {
                $(this).find(".radioNoBtn").eq(k).attr('checked', true).trigger('click');
            }
            $(this).find(".iradioNoBtn").addClass("checked");
            $(this).find(".iradioYesBtn").removeClass("checked");

            //$(this).find("#hide_date_of_special-edit").eq(0).attr('checked', true).trigger('click');
            //$(this).find("#hide_date_of_special-edit-i").addClass("checked");
            //$(this).find("#show_date_of_special-edit-i").removeClass("checked");

            $(this).find("#show_date_of_special-edit").eq(0).attr('checked', true).trigger('click');
            $(this).find("#show_date_of_special-edit-i").addClass("checked");
            $(this).find("#hide_date_of_special-edit-i").removeClass("checked");

            $(this).find("#show_date_of_special").eq(0).attr('checked', true).trigger('click');
            $(this).find("#show_date_of_special-i").addClass("checked");
            $(this).find("#hide_date_of_special-i").removeClass("checked");

            $(this).find('input').val('');
            $(this).find('textarea').val('');
            $(this).find('select').find('option:first').attr('selected', 'selected');
            $(this).find('input.stDate').bdatepicker("update", new Date());
            $('#license-type-show-hide_div').trigger('change');
            $('#license-type-show-hide_div-edit').trigger('change');
            $('#permit-type-show-hide_div').trigger('change');
            $('#permit-type-show-hide_div-edit').trigger('change');
            $('#bank-onwer_bank-name-show-hide_div').trigger('change');
            $('#bank-onwer_account-type-show-hide_div').trigger('change');
            $('#bank-onwer_currency-show-hide_div').trigger('change');
            $('#bank-onwer_account-no-show-hide_div').trigger('change');
            $('#bank-onwer_bank-name-show-hide_div-edit').trigger('change');
            $('#bank-onwer_account-type-show-hide_div-edit').trigger('change');
            $('#bank-onwer_currency-show-hide_div-edit').trigger('change');
            $('#bank-onwer_account-no-show-hide_div-edit').trigger('change');
            $('#share-type-type-show-hide_div').trigger('change');
            $('#share-type-type-show-hide_div-corporate-transfer').trigger('change');
            $('#share-type-type-show-hide_div-corporate').trigger('change');

        });
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

<script>
function get_tab_content(tab){
    var client_id = '<?php echo $client_id;?>';
    $.ajax({
            url: CURRENT_URL + '/client/get_tab',
            type: "GET",
            data: {tab:tab,client_id:client_id},
            success: function(msg){
                $('#tab_bar').html(msg);
            }
    });
}
</script>