<?php
$date = date('Y-m-d');

// Beneficiary
$is_beneficiary_yes = ($detail[0]['is_beneficiary'] == 1) ? 'checked=checked' : '';
$is_beneficiary_no = ($detail[0]['is_beneficiary'] == 0) ? 'checked=checked' : '';
$trust_beneficial_beneficiary_show_div_edit = ($detail[0]['is_beneficiary'] == 1) ? 'block' : 'none';
$trust_beneficial_beneficiary_hide_div_edit = ($detail[0]['is_beneficiary'] == 0) ? 'block' : 'none';

// by
$by_date_of_issue = ($detail[0]['by_date_of_issue'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['by_date_of_issue'])) :"";
$by_date_of_expiry = ($detail[0]['by_date_of_expiry'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['by_date_of_expiry'])) :"";
$by_recieved_date = ($detail[0]['by_recieved_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['by_recieved_date'])) :"";
$by_date = ($detail[0]['by_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['by_date'])) : "";
$by_address_proof_date = ($detail[0]['by_address_proof_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['by_address_proof_date'])) :"";

$by_is_passport_yes = ($detail[0]['by_is_passport'] == "1") ? 'checked=checked' : '';
$by_is_passport_no = ($detail[0]['by_is_passport'] == "0") ? 'checked=checked' : '';
$by_shareholder_passport_2_show_hide_div_edit = ($detail[0]['by_is_passport'] == "1") ? 'block' : 'none';

$by_has_cv_yes = ($detail[0]['by_has_cv'] == 1) ? 'checked=checked' : '';
$by_has_cv_no = ($detail[0]['by_has_cv'] == 0) ? 'checked=checked' : '';
$by_shareholder_cv_show_hide_div_edit = ($detail[0]['by_has_cv'] == 1) ? 'block' : 'none';

$by_is_bank_ref_yes = ($detail[0]['by_is_bank_ref'] == 1) ? 'checked=checked' : '';
$by_is_bank_ref_no = ($detail[0]['by_is_bank_ref'] == 0) ? 'checked=checked' : '';
$by_shareholder_bank_reference_show_hide_div_edit = ($detail[0]['by_is_bank_ref'] == 1) ? 'block' : 'none';

$by_has_address_proof_yes = ($detail[0]['by_has_address_proof'] == 1) ? 'checked=checked' : '';
$by_has_address_proof_no = ($detail[0]['by_has_address_proof'] == 0) ? 'checked=checked' : '';
$by_shareholder_proof_add_show_hide_div_edit = ($detail[0]['by_has_address_proof'] == 1) ? 'block' : 'none';


// bn
$bn_date_of_incorp = ($detail[0]['bn_date_of_incorp'] == "0000-00-00 00:00:00") ? "" : date('d F Y', strtotime($detail[0]['bn_date_of_incorp']));
$bn_member_register_date = ($detail[0]['bn_member_register_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['bn_member_register_date'])) : "";
$bn_director_register_date = ($detail[0]['bn_director_register_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['bn_director_register_date'])) : "";
$bn_date_of_finantial_year_end = ($detail[0]['bn_date_of_finantial_year_end'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['bn_date_of_finantial_year_end'])) : "";
$bn_date = ($detail[0]['bn_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['bn_date'])) :"";
$bn_address_proof_date = ($detail[0]['bn_address_proof_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['bn_address_proof_date'])) : "";

$bn_is_member_register_yes = ($detail[0]['bn_is_member_register'] == "1") ? 'checked=checked' : '';
$bn_is_member_register_no = ($detail[0]['bn_is_member_register'] == "0") ? 'checked=checked' : '';
$bn_show_hide_shareholder_dt_reg_meb_btn = ($detail[0]['bn_is_member_register'] == "1") ? 'block' : 'none';

$bn_is_director_register_yes = ($detail[0]['bn_is_director_register'] == "1") ? 'checked=checked' : '';
$bn_is_director_register_no = ($detail[0]['bn_is_director_register'] == "0") ? 'checked=checked' : '';
$bn_register_of_directors_show_hide_div_edit = ($detail[0]['bn_is_director_register'] == "1") ? 'block' : 'none';

$bn_is_corporate_profile_yes = ($detail[0]['bn_is_corporate_profile'] == "1") ? 'checked=checked' : '';
$bn_is_corporate_profile_no = ($detail[0]['bn_is_corporate_profile'] == "0") ? 'checked=checked' : '';

$bn_is_audited_account_yes = ($detail[0]['bn_is_audited_account'] == "1") ? 'checked=checked' : '';
$bn_is_audited_account_no = ($detail[0]['bn_is_audited_account'] == "0") ? 'checked=checked' : '';
$bn_shareholder_audited_accounts_show_hide_div_edit = ($detail[0]['bn_is_audited_account'] == "1") ? 'block' : 'none';

$bn_is_bank_ref_yes = ($detail[0]['bn_is_bank_ref'] == "1") ? 'checked=checked' : '';
$bn_is_bank_ref_no = ($detail[0]['bn_is_bank_ref'] == "0") ? 'checked=checked' : '';
$bn_shareholder_bank_reference_2_show_hide_div_edit = ($detail[0]['bn_is_bank_ref'] == "1") ? 'block' : 'none';

$bn_has_address_proof_yes = ($detail[0]['bn_has_address_proof'] == "1") ? 'checked=checked' : '';
$bn_has_address_proof_no = ($detail[0]['bn_has_address_proof'] == "0") ? 'checked=checked' : '';
$bn_shareholder_proof_add_2_show_hide_div_edit = ($detail[0]['bn_has_address_proof'] == "1") ? 'block' : 'none';

// Protector
$is_protector_yes = ($detail[0]['is_protector'] == 1) ? 'checked=checked' : '';
$is_protector_no = ($detail[0]['is_protector'] == 0) ? 'checked=checked' : '';
$trust_beneficial_Protector_show_div_edit = ($detail[0]['is_protector'] == 1) ? 'block' : 'none';
$trust_beneficial_Protector_hide_div_edit = ($detail[0]['is_protector'] == 0) ? 'block' : 'none';
// by
$py_date_of_issue = ($detail[0]['py_date_of_issue'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['py_date_of_issue'])) : "";
$py_date_of_expiry = ($detail[0]['py_date_of_expiry'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['py_date_of_expiry'])) : "";
$py_recieved_date = ($detail[0]['py_recieved_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['py_recieved_date'])) : "";
$py_date = ($detail[0]['py_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['py_date'])) : "";
$py_address_proof_date = ($detail[0]['py_address_proof_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['py_address_proof_date'])) : "";

$py_is_passport_yes = ($detail[0]['py_is_passport'] == "1") ? 'checked=checked' : '';
$py_is_passport_no = ($detail[0]['py_is_passport'] == "0") ? 'checked=checked' : '';
$py_shareholder_passport_2_show_hide_div_edit = ($detail[0]['py_is_passport'] == "1") ? 'block' : 'none';

$py_has_cv_yes = ($detail[0]['py_has_cv'] == 1) ? 'checked=checked' : '';
$py_has_cv_no = ($detail[0]['py_has_cv'] == 0) ? 'checked=checked' : '';
$py_shareholder_cv_show_hide_div_edit = ($detail[0]['py_has_cv'] == 1) ? 'block' : 'none';

$py_is_bank_ref_yes = ($detail[0]['py_is_bank_ref'] == 1) ? 'checked=checked' : '';
$py_is_bank_ref_no = ($detail[0]['py_is_bank_ref'] == 0) ? 'checked=checked' : '';
$py_shareholder_bank_reference_show_hide_div_edit = ($detail[0]['py_is_bank_ref'] == 1) ? 'block' : 'none';

$py_has_address_proof_yes = ($detail[0]['py_has_address_proof'] == 1) ? 'checked=checked' : '';
$py_has_address_proof_no = ($detail[0]['py_has_address_proof'] == 0) ? 'checked=checked' : '';
$py_shareholder_proof_add_show_hide_div_edit = ($detail[0]['py_has_address_proof'] == 1) ? 'block' : 'none';


// bn
$pn_date_of_incorp = ($detail[0]['pn_date_of_incorp'] == "0000-00-00 00:00:00") ? "" : date('d F Y', strtotime($detail[0]['pn_date_of_incorp']));
$pn_member_register_date = ($detail[0]['pn_member_register_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['pn_member_register_date'])) : "";
$pn_director_register_date = ($detail[0]['pn_director_register_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['pn_director_register_date'])) : "";
$pn_date_of_finantial_year_end = ($detail[0]['pn_date_of_finantial_year_end'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['pn_date_of_finantial_year_end'])) : "";
$pn_date = ($detail[0]['pn_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['pn_date'])) :"";
$pn_address_proof_date = ($detail[0]['pn_address_proof_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['pn_address_proof_date'])) : "";

$pn_is_member_register_yes = ($detail[0]['pn_is_member_register'] == "1") ? 'checked=checked' : '';
$pn_is_member_register_no = ($detail[0]['pn_is_member_register'] == "0") ? 'checked=checked' : '';
$pn_show_hide_shareholder_dt_reg_meb_btn = ($detail[0]['pn_is_member_register'] == "1") ? 'block' : 'none';

$pn_is_director_register_yes = ($detail[0]['pn_is_director_register'] == "1") ? 'checked=checked' : '';
$pn_is_director_register_no = ($detail[0]['pn_is_director_register'] == "0") ? 'checked=checked' : '';
$pn_register_of_directors_show_hide_div_edit = ($detail[0]['pn_is_director_register'] == "1") ? 'block' : 'none';

$pn_is_corporate_profile_yes = ($detail[0]['pn_is_corporate_profile'] == "1") ? 'checked=checked' : '';
$pn_is_corporate_profile_no = ($detail[0]['pn_is_corporate_profile'] == "0") ? 'checked=checked' : '';

$pn_is_audited_account_yes = ($detail[0]['pn_is_audited_account'] == "1") ? 'checked=checked' : '';
$pn_is_audited_account_no = ($detail[0]['pn_is_audited_account'] == "0") ? 'checked=checked' : '';
$pn_shareholder_audited_accounts_show_hide_div_edit = ($detail[0]['pn_is_audited_account'] == "1") ? 'block' : 'none';

$pn_is_bank_ref_yes = ($detail[0]['pn_is_bank_ref'] == "1") ? 'checked=checked' : '';
$pn_is_bank_ref_no = ($detail[0]['pn_is_bank_ref'] == "0") ? 'checked=checked' : '';
$pn_shareholder_bank_reference_2_show_hide_div_edit = ($detail[0]['pn_is_bank_ref'] == "1") ? 'block' : 'none';

$pn_has_address_proof_yes = ($detail[0]['pn_has_address_proof'] == "1") ? 'checked=checked' : '';
$pn_has_address_proof_no = ($detail[0]['pn_has_address_proof'] == "0") ? 'checked=checked' : '';
$pn_shareholder_proof_add_2_show_hide_div_edit = ($detail[0]['pn_has_address_proof'] == "1") ? 'block' : 'none';



?>




<form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-trust-beneficiary-form"  role="form">

    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
            <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>KYC documents on Beneficiaries</strong></label>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Beneficiary - Individual</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input name="is_beneficiary" <?php echo $is_beneficiary_yes; ?> type="radio" class="radioYesBtn"  id="trust-beneficial-beneficiary_show_btn_edit"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input name="is_beneficiary" <?php echo $is_beneficiary_no; ?> type="radio" class="radioNoBtn"  id="trust-beneficial-beneficiary_hide_btn_edit" > 
                    No
                </label> 
            </div>
        </div>

        <div id="trust-beneficial-beneficiary_show_div_edit" style="display:<?php echo $trust_beneficial_beneficiary_show_div_edit;?>;">

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Name of beneficiary</label>
                <input name="by_name_of_beneficiary" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['by_name_of_beneficiary'] ?>">
            </div>



            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $by_is_passport_yes; ?> name="by_is_passport" id="by_edit_shareholder-passport-2_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $by_is_passport_no; ?> name="by_is_passport" id="by_edit_shareholder-passport-2_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="by_edit_shareholder-passport-2_show_hide_div_edit" style="display:<?php echo $by_shareholder_passport_2_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                    <input name="by_passport_no" type="text" value="<?php echo $detail[0]['by_passport_no'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                    <select name="by_country_of_issue" id="by_edit_country_of_issue" class="form-control plahole_font" style="width: 100%;">
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>has_
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>

                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>

                    <div class="input-group date stDate_edit">
                        <input name="by_date_of_issue" id="by_date_of_issue_edit" class="form-control height_25" type="text" value="<?php echo $by_date_of_issue; ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>

                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                    <div class="input-group date stDate_edit">
                        <input name="by_date_of_expiry" id="by_date_of_expiry_edit" class="form-control height_25" type="text" value="<?php echo $by_date_of_expiry; ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">CV</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $by_has_cv_yes; ?> name="by_has_cv" id="by_edit_shareholder-cv_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $by_has_cv_no; ?> name="by_has_cv" id="by_edit_shareholder-cv_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div class="form-group td-area-form-marg" id="by_edit_shareholder-cv_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $by_shareholder_cv_show_hide_div_edit; ?>;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date received</label>

                <div class="input-group date stDate_edit col-sm-12">
                    <input name="by_recieved_date" class="form-control height_25" type="text" value="<?php echo $by_recieved_date; ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $by_is_bank_ref_yes; ?> name="by_is_bank_ref" id="by_edit_shareholder-bank-reference_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $by_is_bank_ref_no; ?> name="by_is_bank_ref" id="by_edit_shareholder-bank-reference_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="by_edit_shareholder-bank-reference_show_hide_div_edit" style="display:<?php echo $by_shareholder_bank_reference_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Bank</label>
                    <input name="by_bank_name" type="text" value="<?php echo $detail[0]['by_bank_name']; ?>" class="form-control height_25 plahole_font" style="width: 100%;">
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>

                    <div class="input-group date stDate_edit col-sm-12">
                        <input name="by_date" class="form-control height_25" type="text" value="<?php echo $by_date; ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $by_has_address_proof_yes; ?> name="by_has_address_proof" id="by_edit_shareholder-proof_add_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $by_has_address_proof_no; ?> name="by_has_address_proof" id="by_edit_shareholder-proof_add_hide_div_edit" > 
                        No
                    </label> 
                </div>

            </div>

            <div id="by_edit_shareholder-proof_add_show_hide_div_edit" style="display:<?php echo $by_shareholder_proof_add_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                    <textarea name="by_address" style="width:100%;resize:vertical;"><?php echo $detail[0]['by_address']; ?></textarea>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                    <select name="by_country" id="by_edit_country" class="form-control plahole_font" style="width: 100%;">
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                    <div class="input-group date stDate_edit col-sm-12">
                        <input name="by_address_proof_date" class="form-control height_25" type="text" value="<?php echo $by_address_proof_date ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>

            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
                <textarea name="by_other_detail" style="width:100%;resize:vertical;"><?php echo $detail[0]['by_other_detail'] ?></textarea>
            </div>











        </div>


        <div id="trust-beneficial-beneficiary_hide_div_edit" style="display:<?php echo $trust_beneficial_beneficiary_hide_div_edit;?>">










            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Name of company</label>
                <input name="bn_name_of_company" type="text" value="<?php echo $detail[0]['bn_name_of_company'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
                <input name="bn_represented_by" type="text" value="<?php echo $detail[0]['bn_represented_by'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of incorporation</label>
                <div class="input-group date stDate_edit col-sm-12">
                    <input name="bn_date_of_incorp" class="form-control height_25" type="text" value="<?php echo $bn_date_of_incorp; ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Registered in</label>
                <input name="bn_registered_in" type="text" value="<?php echo $detail[0]['bn_registered_in'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Register of members</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $bn_is_member_register_yes; ?> name="bn_is_member_register" id="bn_edit_show_shareholder_dt_reg-meb_btn_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $bn_is_member_register_no; ?> name="bn_is_member_register" id="bn_edit_hide_shareholder_dt_reg-meb_btn_edit" > 
                        No
                    </label> 
                </div>
            </div>
            <div class="form-group td-area-form-marg" id="bn_edit_show-hide_shareholder_dt_reg-meb_btn_edit" style="margin-bottom:10px !important;display:<?php echo $bn_show_hide_shareholder_dt_reg_meb_btn; ?>">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of member of directors</label>
                <div class="input-group date stDate_edit col-sm-12" style="margin-bottom:10px !important;">
                    <input name="bn_member_register_date" class="form-control height_25" type="text" value="<?php echo $bn_member_register_date; ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Register of directors</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $bn_is_director_register_yes; ?> name="bn_is_director_register" id="bn_edit_register_of_directors_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $bn_is_director_register_no; ?> name="bn_is_director_register" id="bn_edit_register_of_directors_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div class="form-group td-area-form-marg" id="bn_edit_register_of_directors_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $bn_register_of_directors_show_hide_div_edit; ?>;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of register of directors</label>
                <div class="input-group date stDate_edit col-sm-12">
                    <input name="bn_director_register_date" class="form-control height_25" type="text" value="<?php echo $bn_director_register_date ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Corporate profile</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $bn_is_corporate_profile_yes; ?> name="bn_is_corporate_profile"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $bn_is_corporate_profile_no; ?> name="bn_is_corporate_profile" > 
                        No
                    </label> 
                </div>

            </div>


            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Audited accounts</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $bn_is_audited_account_yes; ?> name="bn_is_audited_account" id="bn_edit_shareholder-audited-accounts_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $bn_is_audited_account_no; ?> name="bn_is_audited_account" id="bn_edit_shareholder-audited-accounts_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="bn_edit_shareholder-audited-accounts_show_hide_div_edit" style="display:<?php echo $bn_shareholder_audited_accounts_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date of financial year end</label>
                    <div class="input-group date stDate_edit col-sm-12">
                        <input name="bn_date_of_finantial_year_end" class="form-control height_25" type="text" value="<?php echo $bn_date_of_finantial_year_end ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>


            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $bn_is_bank_ref_yes; ?> name="bn_is_bank_ref" id="bn_edit_shareholder-bank-reference-2_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $bn_is_bank_ref_no; ?> name="bn_is_bank_ref" id="bn_edit_shareholder-bank-reference-2_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="bn_edit_shareholder-bank-reference-2_show_hide_div_edit" style="display:<?php echo $bn_shareholder_bank_reference_2_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Name of bank </label>
                    <input name="bn_bank_name" type="text" value="<?php echo $detail[0]['bn_bank_name'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                    <div class="input-group date stDate_edit col-sm-12">
                        <input name="bn_date" class="form-control height_25" type="text" value="<?php echo $bn_date ?>">
                        <span class="input-group-addon pbn_show_shareholder_dt_reg-meb_btnadding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $bn_has_address_proof_yes; ?> name="bn_has_address_proof" id="bn_edit_shareholder-proof_add-2_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $bn_has_address_proof_no; ?> name="bn_has_address_proof" id="bn_edit_shareholder-proof_add-2_hide_div_edit" > 
                        No
                    </label> 
                </div>

            </div>

            <div id="bn_edit_shareholder-proof_add-2_show_hide_div_edit" style="display:<?php echo $bn_shareholder_proof_add_2_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                    <textarea name="bn_address" style="width:100%;resize:vertical;"><?php echo $detail[0]['bn_address'] ?></textarea>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                    <select name="bn_country" id="bn_edit_country" class="form-control plahole_font" style="width: 100%;">
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                    <div class="input-group date stDate_edit col-sm-12">
                        <input name="bn_address_proof_date" class="form-control height_25" type="text" value="<?php echo $bn_address_proof_date ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>

            </div>

            <div class="form-group td-area-form-marg">
                <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                <textarea name="bn_remarks" style="width:100%;resize:vertical;"><?php echo $detail[0]['bn_remarks'] ?></textarea>
            </div>
































        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
            <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>KYC documents on Protector</strong></label>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Protector - Individual</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" <?php echo $is_protector_yes;?> class="radioYesBtn" name="is_protector" id="trust-beneficial-Protector_show_btn_edit"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input type="radio" <?php echo $is_protector_no;?> class="radioNoBtn" name="is_protector" id="trust-beneficial-Protector_hide_btn_edit"> 
                    No
                </label> 
            </div>
        </div>
        <div id="trust-beneficial-Protector_show_div_edit" style="display:<?php echo $trust_beneficial_Protector_show_div_edit;?>;">

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Name of protector</label>
                <input name="py_name_of_protector" value="<?php echo $detail[0]['py_name_of_protector'] ?>" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>











            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $py_is_passport_yes; ?> name="py_is_passport" id="py_edit_shareholder-passport-2_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $py_is_passport_no; ?> name="py_is_passport" id="py_edit_shareholder-passport-2_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="py_edit_shareholder-passport-2_show_hide_div_edit" style="display:<?php echo $py_shareholder_passport_2_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                    <input name="py_passport_no" type="text" value="<?php echo $detail[0]['py_passport_no'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                    <select name="py_country_of_issue" id="py_edit_country_of_issue" class="form-control plahole_font" style="width: 100%;">
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>has_
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>

                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>

                    <div class="input-group date stDate_edit">
                        <input name="py_date_of_issue" id="py_date_of_issue_edit" class="form-control height_25" type="text" value="<?php echo $py_date_of_issue; ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>

                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                    <div class="input-group date stDate_edit">
                        <input name="py_date_of_expiry" id="py_date_of_expiry_edit" class="form-control height_25" type="text" value="<?php echo $py_date_of_expiry; ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">CV</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $py_has_cv_yes; ?> name="py_has_cv" id="py_edit_shareholder-cv_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $py_has_cv_no; ?> name="py_has_cv" id="py_edit_shareholder-cv_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div class="form-group td-area-form-marg" id="py_edit_shareholder-cv_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $py_shareholder_cv_show_hide_div_edit; ?>;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date received</label>

                <div class="input-group date stDate_edit col-sm-12">
                    <input name="py_recieved_date" class="form-control height_25" type="text" value="<?php echo $py_recieved_date; ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $py_is_bank_ref_yes; ?> name="py_is_bank_ref" id="py_edit_shareholder-bank-reference_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $py_is_bank_ref_no; ?> name="py_is_bank_ref" id="py_edit_shareholder-bank-reference_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="py_edit_shareholder-bank-reference_show_hide_div_edit" style="display:<?php echo $py_shareholder_bank_reference_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Bank</label>
                    <input name="py_bank_name" type="text" value="<?php echo $detail[0]['py_bank_name']; ?>" class="form-control height_25 plahole_font" style="width: 100%;">
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>

                    <div class="input-group date stDate_edit col-sm-12">
                        <input name="py_date" class="form-control height_25" type="text" value="<?php echo $py_date; ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $py_has_address_proof_yes; ?> name="py_has_address_proof" id="py_edit_shareholder-proof_add_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $py_has_address_proof_no; ?> name="py_has_address_proof" id="py_edit_shareholder-proof_add_hide_div_edit" > 
                        No
                    </label> 
                </div>

            </div>

            <div id="py_edit_shareholder-proof_add_show_hide_div_edit" style="display:<?php echo $py_shareholder_proof_add_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                    <textarea name="py_address" style="width:100%;resize:vertical;"><?php echo $detail[0]['py_address']; ?></textarea>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                    <select name="py_country" id="py_edit_country" class="form-control plahole_font" style="width: 100%;">
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                    <div class="input-group date stDate_edit col-sm-12">
                        <input name="py_address_proof_date" class="form-control height_25" type="text" value="<?php echo $py_address_proof_date ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>

            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
                <textarea name="py_other_detail" style="width:100%;resize:vertical;"><?php echo $detail[0]['py_other_detail'] ?></textarea>
            </div>



















        </div>

        <div id="trust-beneficial-Protector_hide_div_edit" style="display:<?php echo $trust_beneficial_Protector_hide_div_edit;?>">













            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Name of company</label>
                <input name="pn_name_of_company" type="text" value="<?php echo $detail[0]['pn_name_of_company'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
                <input name="pn_represented_by" type="text" value="<?php echo $detail[0]['pn_represented_by'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of incorporation</label>
                <div class="input-group date stDate_edit col-sm-12">
                    <input name="pn_date_of_incorp" class="form-control height_25" type="text" value="<?php echo $pn_date_of_incorp; ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Registered in</label>
                <input name="pn_registered_in" type="text" value="<?php echo $detail[0]['pn_registered_in'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Register of members</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $pn_is_member_register_yes; ?> name="pn_is_member_register" id="pn_edit_show_shareholder_dt_reg-meb_btn_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $pn_is_member_register_no; ?> name="pn_is_member_register" id="pn_edit_hide_shareholder_dt_reg-meb_btn_edit" > 
                        No
                    </label> 
                </div>
            </div>
            <div class="form-group td-area-form-marg" id="pn_edit_show-hide_shareholder_dt_reg-meb_btn_edit" style="margin-bottom:10px !important;display:<?php echo $pn_show_hide_shareholder_dt_reg_meb_btn; ?>">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of member of directors</label>
                <div class="input-group date stDate_edit col-sm-12" style="margin-bottom:10px !important;">
                    <input name="pn_member_register_date" class="form-control height_25" type="text" value="<?php echo $pn_member_register_date; ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Register of directors</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $pn_is_director_register_yes; ?> name="pn_is_director_register" id="pn_edit_register_of_directors_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $pn_is_director_register_no; ?> name="pn_is_director_register" id="pn_edit_register_of_directors_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div class="form-group td-area-form-marg" id="pn_edit_register_of_directors_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $pn_register_of_directors_show_hide_div_edit; ?>;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of register of directors</label>
                <div class="input-group date stDate_edit col-sm-12">
                    <input name="pn_director_register_date" class="form-control height_25" type="text" value="<?php echo $pn_director_register_date ?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Corporate profile</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $pn_is_corporate_profile_yes; ?> name="pn_is_corporate_profile"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $pn_is_corporate_profile_no; ?> name="pn_is_corporate_profile" > 
                        No
                    </label> 
                </div>

            </div>


            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Audited accounts</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $pn_is_audited_account_yes; ?> name="pn_is_audited_account" id="pn_edit_shareholder-audited-accounts_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $pn_is_audited_account_no; ?> name="pn_is_audited_account" id="pn_edit_shareholder-audited-accounts_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="pn_edit_shareholder-audited-accounts_show_hide_div_edit" style="display:<?php echo $pn_shareholder_audited_accounts_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date of financial year end</label>
                    <div class="input-group date stDate_edit col-sm-12">
                        <input name="pn_date_of_finantial_year_end" class="form-control height_25" type="text" value="<?php echo $pn_date_of_finantial_year_end ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>


            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>
                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $pn_is_bank_ref_yes; ?> name="pn_is_bank_ref" id="pn_edit_shareholder-bank-reference-2_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $pn_is_bank_ref_no; ?> name="pn_is_bank_ref" id="pn_edit_shareholder-bank-reference-2_hide_div_edit" > 
                        No
                    </label> 
                </div>
            </div>

            <div id="pn_edit_shareholder-bank-reference-2_show_hide_div_edit" style="display:<?php echo $pn_shareholder_bank_reference_2_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Name of bank </label>
                    <input name="pn_bank_name" type="text" value="<?php echo $detail[0]['pn_bank_name'] ?>" class="form-control height_25 plahole_font" style="width: 100%;">
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                    <div class="input-group date stDate_edit col-sm-12">
                        <input name="pn_date" class="form-control height_25" type="text" value="<?php echo $pn_date ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                <div class="radio pull-left" style="margin-right:30px;">
                    <label class="radio-custom-none">
                        <input type="radio" class="radioYesBtn" <?php echo $pn_has_address_proof_yes; ?> name="pn_has_address_proof" id="pn_edit_shareholder-proof_add-2_show_div_edit"> 
                        Yes
                    </label> 
                </div>

                <div class="radio pull-left" style="margin-right:30px;"> 
                    <label class="radio-custom-none"> 
                        <input type="radio" class="radioNoBtn" <?php echo $pn_has_address_proof_no; ?> name="pn_has_address_proof" id="pn_edit_shareholder-proof_add-2_hide_div_edit" > 
                        No
                    </label> 
                </div>

            </div>

            <div id="pn_edit_shareholder-proof_add-2_show_hide_div_edit" style="display:<?php echo $pn_shareholder_proof_add_2_show_hide_div_edit; ?>;">
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                    <textarea name="pn_address" style="width:100%;resize:vertical;"><?php echo $detail[0]['pn_address'] ?></textarea>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                    <select name="pn_country" id="pn_edit_country" class="form-control plahole_font" style="width: 100%;">
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>
                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                    <div class="input-group date stDate_edit col-sm-12">
                        <input name="pn_address_proof_date" class="form-control height_25" type="text" value="<?php echo $pn_address_proof_date ?>">
                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                    </div>
                </div>

            </div>

            <div class="form-group td-area-form-marg">
                <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                <textarea name="pn_remarks" style="width:100%;resize:vertical;"><?php echo $detail[0]['pn_remarks'] ?></textarea>
            </div>










        </div>

    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden"  name="id" id="" style="width: 100%;" value="<?php echo $detail[0]['beneficiary_id'] ?>">
            <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="edit">
            <button type="submit" class="btn btn-success pull-right">Save</button>
            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

        </div>
    </div>
</form>
<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>

<script>
$(document).ready(function() {
        ready_on_db();
        stuff_on_ready();
        var cur_date = get_current_date();
        $(".stDate_edit").val(cur_date);
        $('.stDate_edit').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        for_beneficiary();
        $('.radioYesBtn').val('1');
        $('.radioNoBtn').val('0');
    });
    
    function stuff_on_ready() {
        var core_url = CURRENT_URL;
        // For load default grid.
        
        $('.stDate_edit').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		//$('#edit-trust-beneficiary-form24').bootstrapValidator('revalidateField', 'by_date_of_issue');
		//$('#edit-trust-beneficiary-form24').bootstrapValidator('revalidateField', 'by_date_of_expiry');
               // $('#edit-trust-beneficiary-form24').bootstrapValidator('revalidateField', 'py_date_of_issue');
		//$('#edit-trust-beneficiary-form24').bootstrapValidator('revalidateField', 'py_date_of_expiry');	
	});        
        var validator = $('#edit-trust-beneficiary-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                is_beneficiary: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
               },
//                by_date_of_issue: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#by_date_of_issue_edit').val()).getTime();
//                                var input2 = new Date($('#by_date_of_expiry_edit').val()).getTime();
//                                if(input2!=0 || input1!=0){
//                                    if(input1==0){
//                                        return {
//                                            valid: false,
//                                            message: 'This field is required'
//                                        };
//                                    }
//                                    if(input2!=0){
//                                        if (input2 <= input1) {
//                                            return {
//                                            valid: false,
//                                            message: 'Date of issue should be less than date of expiry'
//                                            };
//                                        } else {
//                                            return true;
//                                        }
//                                    } else {
//                                        return true;
//                                    }
//                                } else {
//                                    return true;
//                                }
//                                
//                            }
//                        }
//                    }
//                },
//                by_date_of_expiry: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#by_date_of_issue_edit').val()).getTime();
//                                var input2 = new Date($('#by_date_of_expiry_edit').val()).getTime();
//                                //console.log(input1);
//                                //console.log(input2);
//                                if(input2!=0 || input1!=0){
//
//                                    if(input2==0){
//                                        return {
//                                            valid: false,
//                                            message: 'This field is required'
//                                        };
//                                    }
//                                    if(input1!=0){
//                                        if (input2 <= input1) {
//                                            return {
//                                            valid: false,
//                                            message: 'Date of expiry should be greater than date of issue'
//                                        };
//                                        } else {
//                                            return true;
//                                        }
//                                    } else {
//                                            return true;
//                                    }
//                                } else {
//                                    return true;
//                                }
//                            }
//                        }
//                    }
//                },
//                py_date_of_issue: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#py_date_of_issue_edit').val()).getTime();
//                                var input2 = new Date($('#py_date_of_expiry_edit').val()).getTime();
//                                if(input2!=0 || input1!=0){
//                                    if(input1==0){
//                                        return {
//                                            valid: false,
//                                            message: 'This field is required'
//                                        };
//                                    }
//                                    if(input2!=0){
//                                        if (input2 <= input1) {
//                                            return {
//                                            valid: false,
//                                            message: 'Date of issue should be less than date of expiry'
//                                            };
//                                        } else {
//                                            return true;
//                                        }
//                                    } else {
//                                        return true;
//                                    }
//                                } else {
//                                    return true;
//                                }
//                                
//                            }
//                        }
//                    }
//                },
//                py_date_of_expiry: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#py_date_of_issue_edit').val()).getTime();
//                                var input2 = new Date($('#py_date_of_expiry_edit').val()).getTime();
//                                //console.log(input1);
//                                //console.log(input2);
//                                if(input2!=0 || input1!=0){
//
//                                    if(input2==0){
//                                        return {
//                                            valid: false,
//                                            message: 'This field is required'
//                                        };
//                                    }
//                                    if(input1!=0){
//                                        if (input2 <= input1) {
//                                            return {
//                                            valid: false,
//                                            message: 'Date of expiry should be greater than date of issue'
//                                        };
//                                        } else {
//                                            return true;
//                                        }
//                                    } else {
//                                            return true;
//                                    }
//                                } else {
//                                    return true;
//                                }
//                            }
//                        }
//                    }
//                }
                //

            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_trust_beneficiary_form('edit-trust-beneficiary-form', 'edit', '<?php echo $detail[0]['beneficiary_id'] ?>');
        });
    }
    
    function for_beneficiary(){
    
        var by_edit_country_of_issue = '<?php echo $detail[0]['by_country_of_issue']; ?>';
        $('#by_edit_country_of_issue').children().each(function() {
            if ($(this).attr('value') == by_edit_country_of_issue) {
                $(this).attr('selected', 'selected')
            }
        });
        
        var by_edit_country = '<?php echo $detail[0]['by_country']; ?>';
        $('#by_edit_country').children().each(function() {
            if ($(this).attr('value') == by_edit_country) {
                $(this).attr('selected', 'selected')
            }
        });
        
        var bn_edit_country = '<?php echo $detail[0]['bn_country']; ?>';
        $('#bn_edit_country').children().each(function() {
            if ($(this).attr('value') == bn_edit_country) {
                $(this).attr('selected', 'selected')
            }
        });
        
        var py_edit_country_of_issue = '<?php echo $detail[0]['py_country_of_issue']; ?>';
        $('#py_edit_country_of_issue').children().each(function() {
            if ($(this).attr('value') == py_edit_country_of_issue) {
                $(this).attr('selected', 'selected')
            }
        });
        
        var py_edit_country = '<?php echo $detail[0]['py_country']; ?>';
        $('#py_edit_country').children().each(function() {
            if ($(this).attr('value') == py_edit_country) {
                $(this).attr('selected', 'selected')
            }
        });
        
        var pn_edit_country = '<?php echo $detail[0]['pn_country']; ?>';
        $('#pn_edit_country').children().each(function() {
            if ($(this).attr('value') == pn_edit_country) {
                $(this).attr('selected', 'selected')
            }
        });
        
        /******************START trust-beneficial-beneficiary-show-_hide_div*************/
        $("#trust-beneficial-beneficiary_show_btn_edit").click(function(){
            $("#trust-beneficial-beneficiary_show_div_edit").slideDown();
            $("#trust-beneficial-beneficiary_hide_div_edit").slideUp();
        });

        $("#trust-beneficial-beneficiary_hide_btn_edit").click(function(){
            $("#trust-beneficial-beneficiary_show_div_edit").slideUp();
            $("#trust-beneficial-beneficiary_hide_div_edit").slideDown();
        });
        /******************END trust-beneficial-beneficiary-show-_hide_div*************/
        /******************START trust-beneficial-beneficiary-show-_hide_div*************/
        $("#trust-beneficial-Protector_show_btn_edit").click(function(){
                $("#trust-beneficial-Protector_show_div_edit").slideDown();
                $("#trust-beneficial-Protector_hide_div_edit").slideUp();
        });

        $("#trust-beneficial-Protector_hide_btn_edit").click(function(){
                $("#trust-beneficial-Protector_show_div_edit").slideUp();
                $("#trust-beneficial-Protector_hide_div_edit").slideDown();
        });
        /******************END trust-beneficial-beneficiary-show-_hide_div*************/
        
        // b 
        $("#by_edit_shareholder-passport-2_show_div_edit").click(function() {
            $("#by_edit_shareholder-passport-2_show_hide_div_edit").slideDown();
        });
        $("#by_edit_shareholder-passport-2_hide_div_edit").click(function() {
            $("#by_edit_shareholder-passport-2_show_hide_div_edit").slideUp();
        });

        $("#by_edit_shareholder-cv_show_div_edit").click(function() {
            $("#by_edit_shareholder-cv_show_hide_div_edit").slideDown();
        });
        $("#by_edit_shareholder-cv_hide_div_edit").click(function() {
            $("#by_edit_shareholder-cv_show_hide_div_edit").slideUp();
        });
        /***********END shareholder-cv_show_hide_div yes no radio button**********/

        /*********START  shareholder-bank-reference_show_hide_div yes no radio button**********/
        $("#by_edit_shareholder-bank-reference_show_div_edit").click(function() {
            $("#by_edit_shareholder-bank-reference_show_hide_div_edit").slideDown();
        });
        $("#by_edit_shareholder-bank-reference_hide_div_edit").click(function() {
            $("#by_edit_shareholder-bank-reference_show_hide_div_edit").slideUp();
        });
        /***********END  shareholder-bank-reference_show_hide_div yes no radio button**********/

        /*********START shareholder-proof_add_show_hide_div yes no radio button**********/
        $("#by_edit_shareholder-proof_add_show_div_edit").click(function() {
            $("#by_edit_shareholder-proof_add_show_hide_div_edit").slideDown();
        });
        $("#by_edit_shareholder-proof_add_hide_div_edit").click(function() {
            $("#by_edit_shareholder-proof_add_show_hide_div_edit").slideUp();
        });
        /***********END shareholder-proof_add_show_hide_div yes no radio button**********/

        $("#bn_edit_show_shareholder_dt_reg-meb_btn_edit").click(function() {
            $("#bn_edit_show-hide_shareholder_dt_reg-meb_btn_edit").slideDown();
        });

        $("#bn_edit_hide_shareholder_dt_reg-meb_btn_edit").click(function() {
            $("#bn_edit_show-hide_shareholder_dt_reg-meb_btn_edit").slideUp();
        });
        
        /*********START register_of_directors_show_hide_div yes no radio button**********/
        $("#bn_edit_register_of_directors_show_div_edit").click(function(){
            $("#bn_edit_register_of_directors_show_hide_div_edit").slideDown();
        });
        $("#bn_edit_register_of_directors_hide_div_edit").click(function(){
            $("#bn_edit_register_of_directors_show_hide_div_edit").slideUp();
        });
        /***********END register_of_directors_show_hide_div yes no radio button**********/

        
        /*********START shareholder-audited-accounts_show_hide_div yes no radio button**********/
        $("#bn_edit_shareholder-audited-accounts_show_div_edit").click(function() {
            $("#bn_edit_shareholder-audited-accounts_show_hide_div_edit").slideDown();
        });
        $("#bn_edit_shareholder-audited-accounts_hide_div_edit").click(function() {
            $("#bn_edit_shareholder-audited-accounts_show_hide_div_edit").slideUp();
        });
        /***********END shareholder-audited-accounts_show_hide_div yes no radio button**********/

        $("#bn_edit_shareholder-bank-reference-2_show_div_edit").click(function() {
            $("#bn_edit_shareholder-bank-reference-2_show_hide_div_edit").slideDown();
        });
        $("#bn_edit_shareholder-bank-reference-2_hide_div_edit").click(function() {
            $("#bn_edit_shareholder-bank-reference-2_show_hide_div_edit").slideUp();
        });

        /*********START shareholder-proof_add-2_show_hide_div yes no radio button**********/
        $("#bn_edit_shareholder-proof_add-2_show_div_edit").click(function() {
            $("#bn_edit_shareholder-proof_add-2_show_hide_div_edit").slideDown();
        });
        $("#bn_edit_shareholder-proof_add-2_hide_div_edit").click(function() {
            $("#bn_edit_shareholder-proof_add-2_show_hide_div_edit").slideUp();
        });
        
        // p 
        $("#py_edit_shareholder-passport-2_show_div_edit").click(function() {
            $("#py_edit_shareholder-passport-2_show_hide_div_edit").slideDown();
        });
        $("#py_edit_shareholder-passport-2_hide_div_edit").click(function() {
            $("#py_edit_shareholder-passport-2_show_hide_div_edit").slideUp();
        });

        $("#py_edit_shareholder-cv_show_div_edit").click(function() {
            $("#py_edit_shareholder-cv_show_hide_div_edit").slideDown();
        });
        $("#py_edit_shareholder-cv_hide_div_edit").click(function() {
            $("#py_edit_shareholder-cv_show_hide_div_edit").slideUp();
        });
        /***********END shareholder-cv_show_hide_div yes no radio button**********/

        /*********START  shareholder-bank-reference_show_hide_div yes no radio button**********/
        $("#py_edit_shareholder-bank-reference_show_div_edit").click(function() {
            $("#py_edit_shareholder-bank-reference_show_hide_div_edit").slideDown();
        });
        $("#py_edit_shareholder-bank-reference_hide_div_edit").click(function() {
            $("#py_edit_shareholder-bank-reference_show_hide_div_edit").slideUp();
        });
        /***********END  shareholder-bank-reference_show_hide_div yes no radio button**********/

        /*********START shareholder-proof_add_show_hide_div yes no radio button**********/
        $("#py_edit_shareholder-proof_add_show_div_edit").click(function() {
            $("#py_edit_shareholder-proof_add_show_hide_div_edit").slideDown();
        });
        $("#py_edit_shareholder-proof_add_hide_div_edit").click(function() {
            $("#py_edit_shareholder-proof_add_show_hide_div_edit").slideUp();
        });
        /***********END shareholder-proof_add_show_hide_div yes no radio button**********/

        $("#pn_edit_show_shareholder_dt_reg-meb_btn_edit").click(function() {
            $("#pn_edit_show-hide_shareholder_dt_reg-meb_btn_edit").slideDown();
        });

        $("#pn_edit_hide_shareholder_dt_reg-meb_btn_edit").click(function() {
            $("#pn_edit_show-hide_shareholder_dt_reg-meb_btn_edit").slideUp();
        });
        
        /*********START register_of_directors_show_hide_div yes no radio button**********/
        $("#pn_edit_register_of_directors_show_div_edit").click(function(){
            $("#pn_edit_register_of_directors_show_hide_div_edit").slideDown();
        });
        $("#pn_edit_register_of_directors_hide_div_edit").click(function(){
            $("#pn_edit_register_of_directors_show_hide_div_edit").slideUp();
        });
        /***********END register_of_directors_show_hide_div yes no radio button**********/

        
        /*********START shareholder-audited-accounts_show_hide_div yes no radio button**********/
        $("#pn_edit_shareholder-audited-accounts_show_div_edit").click(function() {
            $("#pn_edit_shareholder-audited-accounts_show_hide_div_edit").slideDown();
        });
        $("#pn_edit_shareholder-audited-accounts_hide_div_edit").click(function() {
            $("#pn_edit_shareholder-audited-accounts_show_hide_div_edit").slideUp();
        });
        /***********END shareholder-audited-accounts_show_hide_div yes no radio button**********/

        $("#pn_edit_shareholder-bank-reference-2_show_div_edit").click(function() {
            $("#pn_edit_shareholder-bank-reference-2_show_hide_div_edit").slideDown();
        });
        $("#pn_edit_shareholder-bank-reference-2_hide_div_edit").click(function() {
            $("#pn_edit_shareholder-bank-reference-2_show_hide_div_edit").slideUp();
        });

        /*********START shareholder-proof_add-2_show_hide_div yes no radio button**********/
        $("#pn_edit_shareholder-proof_add-2_show_div_edit").click(function() {
            $("#pn_edit_shareholder-proof_add-2_show_hide_div_edit").slideDown();
        });
        $("#pn_edit_shareholder-proof_add-2_hide_div_edit").click(function() {
            $("#pn_edit_shareholder-proof_add-2_show_hide_div_edit").slideUp();
        });
    }
</script>