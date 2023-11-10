<?php
    $date = date('Y-m-d');
    $date_of_incorporation = ($detail[0]['date_of_incorporation']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_incorporation'])):"";
    $date_of_appointment = ($detail[0]['date_of_appointment']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_appointment'])):"";
    $date_of_resigned = ($detail[0]['date_of_resigned']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_resigned'])):"";
    $member_register_date = ($detail[0]['member_register_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['member_register_date'])):"";
    $director_register_date = ($detail[0]['director_register_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['director_register_date'])):"";
    $date_of_issue = ($detail[0]['date_of_issue']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_issue'])):"";
    $date_of_expiry = ($detail[0]['date_of_expiry']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_expiry'])):"";
    $date1 = ($detail[0]['date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date'])):"";
    $finantial_year_end_date = ($detail[0]['finantial_year_end_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['finantial_year_end_date'])):"";
    $proof_of_address_date = ($detail[0]['proof_of_address_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['proof_of_address_date'])):"";
    $date_c = ($detail[0]['date_c']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_c'])):"";
        
    $is_register_of_members_yes = ($detail[0]['is_register_of_members']==1)?'checked=checked':'';
    $is_register_of_members_no = ($detail[0]['is_register_of_members']==0)?'checked=checked':'';
    $show_hide_director_dt_reg_meb_btn = ($detail[0]['is_register_of_members']==1)?'block':'none';
    
    $is_register_directors_yes = ($detail[0]['is_register_directors']==1)?'checked=checked':'';
    $is_register_directors_no = ($detail[0]['is_register_directors']==0)?'checked=checked':'';
    $show_hide_director_dt_reg_directors_btn = ($detail[0]['is_register_directors']==1)?'block':'none';
    
    $is_passport_yes = ($detail[0]['is_passport']==1)?'checked=checked':'';
    $is_passport_no = ($detail[0]['is_passport']==0)?'checked=checked':'';
    $passport_show_hide_div = ($detail[0]['is_passport']==1)?'block':'none';
    
    $is_bank_ref_yes = ($detail[0]['is_bank_ref']==1)?'checked=checked':'';
    $is_bank_ref_no = ($detail[0]['is_bank_ref']==0)?'checked=checked':'';
    $bank_refrence_show_div2_edit = ($detail[0]['is_bank_ref']==1)?'block':'none';
    
    $is_proof_address_yes = ($detail[0]['is_proof_address']==1)?'checked=checked':'';
    $is_proof_address_no = ($detail[0]['is_proof_address']==0)?'checked=checked':'';
    $director_show_hide_div = ($detail[0]['is_proof_address']==1)?'block':'none';
    
    $is_corporate_profile_yes = ($detail[0]['is_corporate_profile']==1)?'checked=checked':'';
    $is_corporate_profile_no = ($detail[0]['is_corporate_profile']==0)?'checked=checked':'';
    
    $is_audited_accounts_yes = ($detail[0]['is_audited_accounts']==1)?'checked=checked':'';
    $is_audited_accounts_no = ($detail[0]['is_audited_accounts']==0)?'checked=checked':'';
    $audited_accounts_show_hide_div = ($detail[0]['is_audited_accounts']==1)?'block':'none';
    
    
?>
<form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-director-corporate-form"  role="form">
    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Name of entity</label>
            <input name="entity_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['entity_name'];?>">
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Registered in</label>
            <input name="registered_in" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['registered_in'];?>">
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of incorporation</label>
            <div class="input-group date stDate col-sm-12">
                <input name="date_of_incorporation" class="form-control height_25" type="text" value="<?php echo $date_of_incorporation;?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date appointed</label>
            <div class="input-group date stDate">
                <input id="date_of_appointment_edit" name="date_of_appointment" class="form-control height_25" type="text" value="<?php echo $date_of_appointment;?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date resigned</label>
            <div class="input-group date stDate">
                <input id="date_of_resigned_edit" name="date_of_resigned" class="form-control height_25" type="text" value="<?php echo $date_of_resigned;?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
            <label class="client-detailes-sub_heading" style="margin-botom:0px;"><strong>KYC documents on Corporate Director</strong></label>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Register of members</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="is_register_of_members" id="show_director_dt_reg-meb_btn_edit" value="1" <?php echo $is_register_of_members_yes;?> > 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="is_register_of_members" id="hide_director_dt_reg-meb_btn_edit" value="0" <?php echo $is_register_of_members_no;?> > 
                    No
                </label> 
            </div>
        </div>

        <div class="form-group td-area-form-marg" id="show-hide_director_dt_reg-meb_btn_edit" style="margin-bottom:10px !important;display:<?php echo $show_hide_director_dt_reg_meb_btn;?>;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of register of members</label>
            <div class="input-group date stDate col-sm-12">
                <input name="member_register_date" class="form-control height_25" type="text" value="<?php echo $member_register_date;?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Register of directors</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="is_register_directors" id="show_director_dt_reg-directors_btn_edit" value="1" <?php echo $is_register_directors_yes;?> > 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" id="hide_director_dt_reg-directors_btn_edit" name="is_register_directors" value="0" <?php echo $is_register_directors_no;?> > 
                    No
                </label> 
            </div>
        </div>

        <div class="form-group td-area-form-marg" id="show-hide_director_dt_reg-directors_btn_edit" style="margin-bottom:10px !important;display:<?php echo $show_hide_director_dt_reg_directors_btn;?>">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of register of directors</label>
            <div class="input-group date stDate col-sm-12">
                <input name="director_register_date" class="form-control height_25" type="text" value="<?php echo $director_register_date;?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
            <input name="represented_by" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['represented_by'];?>">
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="is_passport" id="passport_show_div_edit" value="1" <?php echo $is_passport_yes;?> > 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="is_passport" id="passport_hide_div_edit" value="0" <?php echo $is_passport_no;?> > 
                    No
                </label> 
            </div>
        </div>

        <div id="passport_show_hide_div_edit" style="display:<?php echo $passport_show_hide_div;?>;">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                <input name="passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['passport_no'];?>">
            </div>
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                <select name="country_of_issue" id="country_of_issue" class="form-control plahole_font" style="width: 100%;">
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

                <div class="input-group date stDate">
                    <input id="date_of_issue1_edit" name="date_of_issue" class="form-control height_25" type="text" value="<?php echo $date_of_issue;?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                <div class="input-group date stDate">
                    <input id="date_of_expiry1_edit" name="date_of_expiry" class="form-control height_25" type="text" value="<?php echo $date_of_expiry;?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input <?php echo $is_bank_ref_yes;?> type="radio" class="radioYesBtn" name="is_bank_ref" id="bank_refrence_show_div2_edit"> 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input <?php echo $is_bank_ref_no;?> type="radio" class="radioNoBtn" name="is_bank_ref" id="bank_refrence_hide_div2_edit"> 
                    No
                </label> 
            </div>
        </div>

        <div id="bank_refrence_show_hide_div2_edit" style="display:<?php echo $bank_refrence_show_div2_edit;?>">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Name of bank</label>
                <input type="text" class="form-control height_25 plahole_font" name="bank_name_c" value="<?php echo $detail[0]['bank_name_c'];?>" id="accounting_done_by" style="width: 100%;">
            </div>
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                <div class="input-group date stDate col-sm-12">
                    <input name="date_c" class="form-control height_25" value="<?php echo $date_c;?>" type="text">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="is_proof_address" id="director_show_div_edit" value="1" <?php echo $is_proof_address_yes;?> > 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left" style="margin-right:30px;"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="is_proof_address" id="director_hide_div_edit" value="0" <?php echo $is_proof_address_no;?> > 
                    No
                </label> 
            </div>

        </div>

        <div id="director_show_hide_div_edit" style="display:<?php echo $director_show_hide_div;?>;">
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                <textarea name="address" style="width:100%;resize:vertical;"><?php echo $detail[0]['address'];?></textarea>
            </div>
            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                <select name="country" id="country" class="form-control plahole_font" style="width: 100%;">
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
                <div class="input-group date stDate col-sm-12">
                    <input name="date" class="form-control height_25" type="text" value="<?php echo $date1;?>">
                    <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                </div>
            </div>

        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Corporate profile</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="is_corporate_profile" value="1" <?php echo $is_corporate_profile_yes;?> > 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="is_corporate_profile" value="0" <?php echo $is_corporate_profile_no;?> > 
                    No
                </label> 
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Audited accounts</label>
            <div class="radio pull-left" style="margin-right:30px;">
                <label class="radio-custom-none">
                    <input type="radio" class="radioYesBtn" name="is_audited_accounts" id="audited_accounts_show_div_edit" value="1" <?php echo $is_audited_accounts_yes;?> > 
                    Yes
                </label> 
            </div>

            <div class="radio pull-left"> 
                <label class="radio-custom-none"> 
                    <input type="radio" class="radioNoBtn" name="is_audited_accounts" id="audited_accounts_hide_div_edit" value="0" <?php echo $is_audited_accounts_no;?> > 
                    No
                </label> 
            </div>
        </div>

        <div class="form-group td-area-form-marg" id="audited_accounts_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $audited_accounts_show_hide_div;?>">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of financial year end</label>

            <div class="input-group date stDate col-sm-12" style="margin-bottom:10px !important;">
                <input name="finantial_year_end_date" class="form-control height_25" type="text" value="<?php echo $finantial_year_end_date;?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>

        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
            <label class="client-detailes-sub_heading" style="width:100%;">Date of proof of address</label>
            <div class="input-group date stDate col-sm-12">
                <input name="proof_of_address_date" class="form-control height_25" type="text" value="<?php echo $proof_of_address_date;?>">
                <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
            </div>
        </div>
    </div>	

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden"  name="id" id="" style="width: 100%;" value="<?php echo $detail[0]['director_corp_id'];?>">
            <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="edit">
            <button type="submit" class="btn btn-success pull-right">Save</button>
            <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

        </div>
    </div>
</form>

<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    $(document).ready(function() {
        $('.radioYesBtn').val('1');
        $('.radioNoBtn').val('0');
        ready_on_db();
        stuff_on_ready();
        $('.stDate').bdatepicker({
               format: "dd MM yyyy",
               autoclose: true,
        });
//        $('.stDate').bdatepicker("update",new Date());
        // select 
        var country_of_issue = '<?php echo $detail[0]['country_of_issue']; ?>';
        $('#country_of_issue').children().each(function(){
            if($(this).attr('value')==country_of_issue){
               $(this).attr('selected','selected') 
            }
        });
        
        var country = '<?php echo $detail[0]['country']; ?>';
        $('#country').children().each(function(){
            if($(this).attr('value')==country){
               $(this).attr('selected','selected') 
            }
        });
        
        /******************START show-hide_director_dt_reg-meb_btn*************/
        $("#show_director_dt_reg-meb_btn_edit").click(function() {
            $("#show-hide_director_dt_reg-meb_btn_edit").slideDown();
        });

        $("#hide_director_dt_reg-meb_btn_edit").click(function() {
            $("#show-hide_director_dt_reg-meb_btn_edit").slideUp();
        });
        /******************END show-hide_director_dt_reg-meb_btn*************/
        /******************START show-hide_director_dt_reg-directors_btn*************/
        $("#show_director_dt_reg-directors_btn_edit").click(function() {
            $("#show-hide_director_dt_reg-directors_btn_edit").slideDown();
        });

        $("#hide_director_dt_reg-directors_btn_edit").click(function() {
            $("#show-hide_director_dt_reg-directors_btn_edit").slideUp();
        });
        /******************END show-hide_director_dt_reg-directors_btn*************/
        $("#director_show_div_edit").click(function() {
            $("#director_show_hide_div_edit").slideDown();
        });
        $("#director_hide_div_edit").click(function() {
            $("#director_show_hide_div_edit").slideUp();
        });
        
        /*********START passport yes no radio button**********/
        $("#passport_show_div_edit").click(function(){
            $("#passport_show_hide_div_edit").slideDown();
        });
        $("#passport_hide_div_edit").click(function(){
            $("#passport_show_hide_div_edit").slideUp();
        });
        /***********END passport yes no radio button**********/
        
        /*********START passport yes no radio button**********/
        $("#audited_accounts_show_div_edit").click(function(){
            $("#audited_accounts_show_hide_div_edit").slideDown();
        });
        $("#audited_accounts_hide_div_edit").click(function(){
            $("#audited_accounts_show_hide_div_edit").slideUp();
        });
        /***********END passport yes no radio button**********/
        $("#bank_refrence_show_div2_edit").click(function(){
                $("#bank_refrence_show_hide_div2_edit").slideDown();
            });
        $("#bank_refrence_hide_div2_edit").click(function(){
            $("#bank_refrence_show_hide_div2_edit").slideUp();
        });

        
    });
   
    function stuff_on_ready(){
        var core_url=CURRENT_URL;
        // ACCOUNT
        $('.stDate').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
            // Revalidate the date field
            //$('#edit-director-corporate-form').bootstrapValidator('revalidateField', 'date_of_issue');
           // $('#edit-director-corporate-form').bootstrapValidator('revalidateField', 'date_of_expiry');
           // $('#edit-director-corporate-form').bootstrapValidator('revalidateField', 'date_of_appointment');
           // $('#edit-director-corporate-form').bootstrapValidator('revalidateField', 'date_of_resigned');
	});
        var validator = $('#edit-director-corporate-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                entity_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
//                date_of_issue: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#date_of_issue1_edit').val()).getTime();
//                                var input2 = new Date($('#date_of_expiry1_edit').val()).getTime();
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
//                date_of_expiry: {
//                    validators: {
//                        callback: {
//                            message: 'Date of expiry should be greater than date of issue',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#date_of_issue1_edit').val()).getTime();
//                                var input2 = new Date($('#date_of_expiry1_edit').val()).getTime();
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
//                date_of_appointment: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#date_of_appointment_edit').val()).getTime();
//                                var input2 = new Date($('#date_of_resigned_edit').val()).getTime();
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
//                                            message: 'Date of appointment should be less than date of resignation'
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
//                date_of_resigned: {
//                    validators: {
//                        callback: {
//                            message: 'Date of resignation should be greater than date of appointment',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#date_of_appointment_edit').val()).getTime();
//                                var input2 = new Date($('#date_of_resigned_edit').val()).getTime();
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
//                                            message: 'Date of resignation should be greater than date of appointment',
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
            submit_director_corporate_form('edit-director-corporate-form', 'edit', '<?php echo $detail[0]['director_corp_id']; ?>');
        });
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
      }
</script>