<?php

$date = date('Y-m-d');
$appointed_date = ($detail[0]['appointed_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['appointed_date'])) : "";
$resigned_date = ($detail[0]['resigned_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['resigned_date'])) : "";
$director_birth_date = ($detail[0]['director_birth_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['director_birth_date'])) : "";
$date_of_issue = ($detail[0]['date_of_issue'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_of_issue'])) : "";
$date_of_expiry = ($detail[0]['date_of_expiry'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date_of_expiry'])) : "";
$bank_ref_date = ($detail[0]['date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['date'])) : "";
$address_proof_date = ($detail[0]['address_proof_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['address_proof_date'])) : "";
$is_form16_filled_yes = ($detail[0]['is_form16_filled'] == "1") ? 'checked=checked' : '';
$is_form16_filled_no = ($detail[0]['is_form16_filled'] == "0") ? 'checked=checked' : '';
$recieved_date = ($detail[0]['recieved_date'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($detail[0]['recieved_date'])) : "";

$is_form17_filled_yes = ($detail[0]['is_form17_filled'] == "1") ? 'checked=checked' : '';
$is_form17_filled_no = ($detail[0]['is_form17_filled'] == "0") ? 'checked=checked' : '';

$directorship_in_public_yes = ($detail[0]['directorship_in_public'] == "1") ? 'checked=checked' : '';
$directorship_in_public_no = ($detail[0]['directorship_in_public'] == "0") ? 'checked=checked' : '';
$directorship_textarea_show_hide_div = ($detail[0]['directorship_in_public'] == "1") ? 'block' : 'none';

$has_passport_yes = ($detail[0]['has_passport'] == "1") ? 'checked=checked' : '';
$has_passport_no = ($detail[0]['has_passport'] == "0") ? 'checked=checked' : '';
$kyc_passport_hide_show_div = ($detail[0]['has_passport'] == "1") ? 'block' : 'none';

$has_cv_yes = ($detail[0]['has_cv'] == "1") ? 'checked=checked' : '';
$has_cv_no = ($detail[0]['has_cv'] == "0") ? 'checked=checked' : '';
$director_page_cv_show_hide_div_edit = ($detail[0]['has_cv'] == "1") ? 'block' : 'none';

$has_bank_ref_yes = ($detail[0]['has_bank_ref'] == "1") ? 'checked=checked' : '';
$has_bank_ref_no = ($detail[0]['has_bank_ref'] == "0") ? 'checked=checked' : '';
$bank_refrence_show_hide_div = ($detail[0]['has_bank_ref'] == "1") ? 'block' : 'none';

$is_address_proof_yes = ($detail[0]['is_address_proof'] == "1") ? 'checked=checked' : '';
$is_address_proof_no = ($detail[0]['is_address_proof'] == "0") ? 'checked=checked' : '';
$proof_of_address_show_hide_div = ($detail[0]['is_address_proof'] == "1") ? 'block' : 'none';

$CI =& get_instance();
$CI->load->model('databaseinfo_model');
$common_data = $CI->databaseinfo_model->getCommonDirector();


?>

<form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-director-individual-form"  role="form">
    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
            <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>Director information</strong></label>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Name of director</label>
            <div class="col-md-10" style="padding-left:0px;">
                <select onclick="fill_common_values_dir_ind(this.value,'_edit');" class="form-control height_25 plahole_font" name="director_list" id="director_company_data_edit" style="width: 100%;">
                    <option value="">Select Director</option>
                    <?php foreach ($common_data as $item) { ?>
                    <option data-surname="<?php echo $item['director_surname']; ?>" value="<?php echo $item['id'];?>" <?php if($item['director_name']==$detail[0]['director_name']){ ?> selected="selected"<?php } ?>> <?php echo $item['director_name'];?> </option>

                    <?php } 
                    ?>
                </select>
                <input name="director_name" id="director_name_edit" type="hidden" value="<?php echo $detail[0]['director_name'];?>">
            </div>
            
        </div>
        
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important; ">
             <div class="col-md-10" style="padding-left:0px;">
                <label class="client-detailes-sub_heading" style="width:100%;">Surname of director</label>                                
                <input name="director_surname" id="director_surname_edit" type="text" value="<?php echo $detail[0]['director_surname'];?>" class="form-control height_25 plahole_font" style="width: 100%;" readonly>
             </div>    
       </div>  
        

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date appointed</label>
            <div class="input-group date stDate">
                <input id="appointed_date_edit" name="appointed_date" class="form-control height_25" type="text" value="<?php echo $appointed_date; ?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Form 16 filed</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input  type="radio" class="radioYesBtn" name="is_form16_filled" <?php echo $is_form16_filled_yes; ?> value="1"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="is_form16_filled" <?php echo $is_form16_filled_no; ?> value="0"> 
                    No
                </label> 
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date resigned </label>
            <div class="input-group date stDate">
                <input id="resigned_date_edit" name="resigned_date" class="form-control height_25" type="text" value="<?php echo $resigned_date; ?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Form 17 filed</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="is_form17_filled" <?php echo $is_form17_filled_yes; ?> value="1"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="is_form17_filled" <?php echo $is_form17_filled_no; ?> value="0"> 
                    No
                </label> 
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of birth of director</label>
            
                <input id="director_birth_date_edit"  name="director_birth_date" class="form-control height_25" type="text" value="<?php echo $director_birth_date; ?>" >
                
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Age</label>
            <input id="director_age_edit" readonly="" name="director_age" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['director_age']; ?>">
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Directorship in public company</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="directorship_in_public" id="direcgorship_textarea_show_div_edit" <?php echo $directorship_in_public_yes; ?> value="1"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="directorship_in_public" id="direcgorship_textarea_hide_div_edit" <?php echo $directorship_in_public_no; ?> value="0"> 
                    No
                </label> 
            </div>
        </div>

        <div class="form-group td-area-form-marg" id="directorship_textarea_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $directorship_textarea_show_hide_div; ?>;">
            <textarea name="directorship_desc" style="width:100%;resize:vertical;"><?php echo $detail[0]['directorship_desc']; ?></textarea>
        </div>
    </div>	

    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
            <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>KYC documents on director</strong></label>
        </div> 
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
            <input name="represented_by" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['represented_by']; ?>">
        </div>
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="has_passport1" id="kyc_passport_show_div_edit" <?php echo $has_passport_yes; ?> value="1"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="has_passport1" id="kyc_passport_hide_div_edit" <?php echo $has_passport_no; ?> value="0"> 
                    No
                </label> 
            </div>
        </div>

        <div id="kyc_passport_hide_show_div_edit" style="display:<?php echo $kyc_passport_hide_show_div; ?>;">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                <input id="passport_no_edit" name="passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['passport_no']; ?>">
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                <select id="country_of_issue_edit" name="country_of_issue"  class="form-control plahole_font" style="width: 100%;">
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
                <label class="client-detailes-sub_heading" style="width:100%;">Date of issue</label>
                
                    <input id="date_of_issue_edit" name="date_of_issue" class="form-control height_25" type="text" value="<?php echo $date_of_issue; ?>" >
                   
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>
                
                    <input id="date_of_expiry_edit" name="date_of_expiry" class="form-control height_25" type="text" value="<?php echo $date_of_expiry; ?>" >
                   
            </div>

        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">CV</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="has_cv1" <?php echo $has_cv_yes; ?> id="director_cv_yes_edit" value="1"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="has_cv1" <?php echo $has_cv_no; ?> id="director_cv_no_edit" value="0"> 
                    No
                </label> 
            </div>
        </div>

        <div class="form-group td-area-form-marg" id="director-page-cv_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $director_page_cv_show_hide_div_edit; ?>;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date received</label>

            
                <input id="recieved_date_edit" name="recieved_date" class="form-control height_25" type="text" value="<?php echo $recieved_date; ?>">
                
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="has_bank_ref1" id="bank_refrence_show_div_edit" <?php echo $has_bank_ref_yes; ?> value="1"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="has_bank_ref1" id="bank_refrence_hide_div_edit" <?php echo $has_bank_ref_no; ?> value="0"> 
                    No
                </label> 
            </div>
        </div>

        <div id="bank_refrence_show_hide_div_edit" style="display:<?php echo $bank_refrence_show_hide_div ?>;">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Name of bank</label>
                <input type="text" class="form-control height_25 plahole_font" name="bank_name" id="accounting_done_by_edit" style="width: 100%;" value="<?php echo $detail[0]['bank_name']; ?>">
            </div>
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                
                    <input id="date_edit" name="date" class="form-control height_25" type="text" value="<?php echo $bank_ref_date; ?>">
                    
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%">Proof of address</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="is_address_proof1" id="proof_of_address_show_div_edit" <?php echo $is_address_proof_yes; ?> value="1"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="is_address_proof1" id="proof_of_address_hide_div_edit" <?php echo $is_address_proof_no; ?> value="0"> 
                    No
                </label> 
            </div> 
        </div>

        <div id="proof_of_address_show_hide_div_edit" style="display:<?php echo $proof_of_address_show_hide_div; ?>;">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Name of address</label>
                <textarea id="address_detail" name="address_detail" style="width:100%;resize:vertical;" class="readonly"><?php echo $detail[0]['address_detail']; ?></textarea>
            </div>
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                <select id="country_edit" name="country"  class="form-control plahole_font" style="width: 100%;">
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
                <label class="client-detailes-sub_heading" style="width:100%;">Date of proof of address.</label>
                <div class="input-group  col-sm-12">
                    <input id="address_proof_date_edit" name="address_proof_date" class="form-control height_25" type="text" value="<?php echo $address_proof_date; ?>">
                    <span class="input-group-addon padding_3"></span>
                </div>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
            <textarea id="other_detail_edit" name="other_detail" style="width:100%;resize:vertical;" class="readonly"><?php echo $detail[0]['other_detail']; ?></textarea>
        </div>
        
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
         <label class="client-detailes-sub_heading" style="width:100%;">NIC</label>
         <textarea id="nic_remark" name="nic_remark" style="width:100%;resize:vertical;"> <?php echo $detail[0]['nic_remark']; ?></textarea>
        </div>
        
    </div>	

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden"  name="id" id="" style="width: 100%;" value="<?php echo $detail[0]['dtr_individual_id']; ?>">
            <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="edit">
            
            <input type="hidden" id="hp_edit"  name="has_passport"  value="<?php echo $detail[0]['has_passport']; ?>">
            <input type="hidden" id="hc_edit"  name="has_cv"  value="<?php echo $detail[0]['has_cv']; ?>">
            <input type="hidden" id="hbr_edit"  name="has_bank_ref"  value="<?php echo $detail[0]['has_bank_ref']; ?>">
            <input type="hidden" id="iap_edit"  name="is_address_proof"  value="<?php echo $detail[0]['is_address_proof']; ?>">
            <input type="hidden" id="coi_edit"  name="country_of_issue"  value="<?php echo $detail[0]['country_of_issue']; ?>">
            <input type="hidden" id="co_edit"  name="country"  value="<?php echo $detail[0]['country']; ?>">
            
            <button type="submit" class="btn btn-success pull-right">Save</button>
            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

        </div>
    </div>
</form>


<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
                $(document).ready(function () {
                    update_common_element()
                    fill_common_values_dir_ind(<?php echo $detail[0]['dtr_individual_id']; ?>,'edit')
                    ready_on_db();
                    stuff_on_ready();
                    $('.stDate').bdatepicker({
                        format: "dd MM yyyy",
                        autoclose: true,
                    });
//        $('.stDate').bdatepicker("update",new Date());
                    // select 
                    var country_of_issue = '<?php echo $detail[0]['country_of_issue']; ?>';
                    $('#country_of_issue_edit').children().each(function () {
                        if ($(this).attr('value') == country_of_issue) {
                            $(this).attr('selected', 'selected')
                        }
                    });

                    var country = '<?php echo $detail[0]['country']; ?>';
                    $('#country_edit').children().each(function () {
                        if ($(this).attr('value') == country) {
                            $(this).attr('selected', 'selected')
                        }
                    });
                    
                    $('#director_company_data_edit').change(function(){                    
                        var element = $("option:selected", this);
                        var director_surname = element.attr("data-surname"); 
                        $("#director_surname_edit").val(director_surname);                      
                     
                     });
    
                    $("#direcgorship_textarea_show_div_edit").click(function () {
                        $("#directorship_textarea_show_hide_div_edit").slideDown();
                    });
                    $("#direcgorship_textarea_hide_div_edit").click(function () {
                        $("#directorship_textarea_show_hide_div_edit").slideUp();
                    });
                    /*********START KYC passport yes no radio button**********/
                    $("#kyc_passport_show_div_edit").click(function () {
                        $("#kyc_passport_hide_show_div_edit").slideDown();
                    });
                    $("#kyc_passport_hide_div_edit").click(function () {
                        $("#kyc_passport_hide_show_div_edit").slideUp();
                    });
                    /***********END KYC passport yes no radio button**********/

                    /*********START KYC bank refrence yes no radio button**********/
                    $("#bank_refrence_show_div_edit").click(function () {
                        $("#bank_refrence_show_hide_div_edit").slideDown();
                    });
                    $("#bank_refrence_hide_div_edit").click(function () {
                        $("#bank_refrence_show_hide_div_edit").slideUp();
                    });
                    /***********END KYC refrence yes no radio button**************/

                    /*********START Proof of address yes no radio button**********/
                    $("#proof_of_address_show_div_edit").click(function () {
                        $("#proof_of_address_show_hide_div_edit").slideDown();
                    });
                    $("#proof_of_address_hide_div_edit").click(function () {
                        $("#proof_of_address_show_hide_div_edit").slideUp();
                    });
                    /***********END Proof of address yes no radio button**********/
                });
                
                function update_common_element(){
                    var addedit="_edit";
                    $('#director_name'+addedit).attr('readonly','readonly');
                    $('#passport_no'+addedit).attr('readonly','readonly');
                    $('#country_of_issue'+addedit).attr('readonly','readonly');
                    $('#date_of_issue'+addedit).attr('readonly','readonly');
                    $('#date_of_expiry'+addedit).attr('readonly','readonly');
                    $('#recieved_date'+addedit).attr('readonly','readonly');
                    $('#accounting_done_by'+addedit).attr('readonly','readonly');
                    $('#date'+addedit).attr('readonly','readonly');
                    $('#country'+addedit).attr('readonly','readonly');
                    $('#address_detail'+addedit).attr('readonly','readonly');
                    $('#address_proof_date'+addedit).attr('readonly','readonly');
                    $('#other_detail'+addedit).attr('readonly','readonly');
                    $('#director_birth_date'+addedit).attr('readonly','readonly');
                    
                    $('#country_of_issue'+addedit).attr('disabled','disabled');
                    $('#country'+addedit).attr('disabled','disabled');
                    
                    
                    var passport_id_1 = "kyc_passport_show_div"+addedit
                    var passport_id_0 = "kyc_passport_hide_div"+addedit

                    var cv_id_1 = "director_cv_yes"+addedit
                    var cv_id_0 = "director_cv_no"+addedit

                    var bank_id_1 = "bank_refrence_show_div"+addedit
                    var bank_id_0 = "bank_refrence_hide_div"+addedit

                    var proof_id_1 = "proof_of_address_show_div"+addedit
                    var proof_id_0 = "proof_of_address_hide_div"+addedit 
                    $('#' + passport_id_1).attr('disabled','disabled');
                    $('#' + passport_id_0).attr('disabled','disabled');

                    $('#' + cv_id_1).attr('disabled','disabled');
                    $('#' + cv_id_0).attr('disabled','disabled');

                    $('#' + bank_id_1).attr('disabled','disabled');
                    $('#' + bank_id_0).attr('disabled','disabled');

                    $('#' + proof_id_1).attr('disabled','disabled');
                    $('#' + proof_id_0).attr('disabled','disabled');
                }




                function stuff_on_ready() {
                    // calculate director age.
                    $('.stDate_dbc').bdatepicker({
                        format: "dd MM yyyy",
                        autoclose: true
                    }).on('changeDate', function (e) {
                        //var input1 = new Date($('#director_birth_date_edit').val()).getTime();
                        var input1 = $('#director_birth_date_edit').val('');
                        var input2 = $.now();
                        var one_day = 1000 * 60 * 60 * 24;
                        // Calculate the difference in milliseconds
                        var difference_ms = input2 - input1;
                        // Convert back to days and return
                        var days = Math.round(difference_ms / one_day);

                        var diff = Math.floor(input2 - input1);
                        var day = 1000 * 60 * 60 * 24;

                        var days = Math.floor(diff / day);
                        var months = Math.floor(days / 31);
                        var years = Math.floor(months / 12);

                        if (input1 < input2)
                            $('#director_age_edit').val(years);
                        else
                            $('#director_age_edit').val(0);
//  		console.log(years);

                    });

                    $('#director_cv_yes_edit').click(function () {
                        $('#director-page-cv_show_hide_div_edit').slideDown();
                    });
                    $('#director_cv_no_edit').click(function () {
                        $('#director-page-cv_show_hide_div_edit').slideUp();
                    });
                    var core_url = CURRENT_URL;
                    // ACCOUNT
                    $('.stDate').bdatepicker({
                        format: "dd MM yyyy",
                        autoclose: true
                    }).on('changeDate', function (e) {
                        // Revalidate the date field
//                        $('#edit-director-individual-form').bootstrapValidator('revalidateField', 'date_of_issue');
//                        $('#edit-director-individual-form').bootstrapValidator('revalidateField', 'date_of_expiry');
//                        $('#edit-director-individual-form').bootstrapValidator('revalidateField', 'appointed_date');
//                        $('#edit-director-individual-form').bootstrapValidator('revalidateField', 'resigned_date');
                    });
                    var validator = $('#edit-director-individual-form').bootstrapValidator({
                        message: 'This value is not valid',
                        fields: {
                            director_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'This field is required'
                                    }
                                }
                            },
//                            date_of_issue: {
//                                validators: {
//                                    callback: {
//                                        message: 'This field is required',
//                                        callback: function (value, validator, $field) {
//                                            var input1 = new Date($('#date_of_issue_edit').val()).getTime();
//                                            var input2 = new Date($('#date_of_expiry_edit').val()).getTime();
//                                            if (input2 != 0 || input1 != 0) {
//                                                if (input1 == 0) {
//                                                    return {
//                                                        valid: false,
//                                                        message: 'This field is required'
//                                                    };
//                                                }
//                                                if (input2 != 0) {
//                                                    if (input2 <= input1) {
//                                                        return {
//                                                            valid: false,
//                                                            message: 'Date of issue should be less than date of expiry'
//                                                        };
//                                                    } else {
//                                                        return true;
//                                                    }
//                                                } else {
//                                                    return true;
//                                                }
//                                            } else {
//                                                return true;
//                                            }
//
//                                        }
//                                    }
//                                }
//                            },
//                            date_of_expiry: {
//                                validators: {
//                                    callback: {
//                                        message: 'Date of expiry should be greater than date of issue',
//                                        callback: function (value, validator, $field) {
//                                            var input1 = new Date($('#date_of_issue_edit').val()).getTime();
//                                            var input2 = new Date($('#date_of_expiry_edit').val()).getTime();
//                                            //console.log(input1);
//                                            //console.log(input2);
//                                            if (input2 != 0 || input1 != 0) {
//
//                                                if (input2 == 0) {
//                                                    return {
//                                                        valid: false,
//                                                        message: 'This field is required'
//                                                    };
//                                                }
//                                                if (input1 != 0) {
//                                                    if (input2 <= input1) {
//                                                        return {
//                                                            valid: false,
//                                                            message: 'Date of expiry should be greater than date of issue'
//                                                        };
//                                                    } else {
//                                                        return true;
//                                                    }
//                                                } else {
//                                                    return true;
//                                                }
//                                            } else {
//                                                return true;
//                                            }
//                                        }
//                                    }
//                                }
//                            },
//                            appointed_date: {
//                                validators: {
//                                    callback: {
//                                        message: 'This field is required',
//                                        callback: function (value, validator, $field) {
//                                            var input1 = new Date($('#appointed_date_edit').val()).getTime();
//                                            var input2 = new Date($('#resigned_date_edit').val()).getTime();
//                                            if (input2 != 0 || input1 != 0) {
//                                                if (input1 == 0) {
//                                                    return {
//                                                        valid: false,
//                                                        message: 'This field is required'
//                                                    };
//                                                }
//                                                if (input2 != 0) {
//                                                    if (input2 <= input1) {
//                                                        return {
//                                                            valid: false,
//                                                            message: 'Date of appointment should be less than date of resignation'
//                                                        };
//                                                    } else {
//                                                        return true;
//                                                    }
//                                                } else {
//                                                    return true;
//                                                }
//                                            } else {
//                                                return true;
//                                            }
//
//                                        }
//                                    }
//                                }
//                            },
//                            resigned_date: {
//                                validators: {
//                                    callback: {
//                                        message: 'Date of resignation should be greater than date of appointment',
//                                        callback: function (value, validator, $field) {
//                                            var input1 = new Date($('#appointed_date_edit').val()).getTime();
//                                            var input2 = new Date($('#resigned_date_edit').val()).getTime();
//                                            //console.log(input1);
//                                            //console.log(input2);
//                                            if (input2 != 0 || input1 != 0) {
//
//                                                if (input2 == 0) {
//                                                    return {
//                                                        valid: false,
//                                                        message: 'This field is required'
//                                                    };
//                                                }
//                                                if (input1 != 0) {
//                                                    if (input2 <= input1) {
//                                                        return {
//                                                            valid: false,
//                                                            message: 'Date of resignation should be greater than date of appointment'
//                                                        };
//                                                    } else {
//                                                        return true;
//                                                    }
//                                                } else {
//                                                    return true;
//                                                }
//                                            } else {
//                                                return true;
//                                            }
//                                        }
//                                    }
//                                }
//                            },
                            director_age: {
                                validators: {
                                    integer: {
                                        message: 'The value should be numeric',
                                        // The default separators
                                        thousandsSeparator: '',
                                        decimalSeparator: '.'
                                    }
                                }
                            }
                            //

                        }
                    })
                            .on('success.form.bv', function (e) {
                                e.preventDefault();
                                submit_director_individual_form('edit-director-individual-form', 'edit', '<?php echo $detail[0]['dtr_individual_id']; ?>');
                            });

                    $(".close,.cancel").click(function () {
                        $('.form-group').removeClass('has-error has-feedback');
                        $('.form-group').find('small.help-block').hide();
                        $('.form-group').find('i.form-control-feedback').hide();
                    });
                }
</script>

