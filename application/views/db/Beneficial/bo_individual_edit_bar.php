<?php
    $date = date('Y-m-d');
    $date_of_issue = ($detail[0]['date_of_issue']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_issue'])):"";
    $date_of_expiry = ($detail[0]['date_of_expiry']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_expiry'])):"";
    $recieved_date = ($detail[0]['recieved_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['recieved_date'])):"";
    $address_proof_date = ($detail[0]['address_proof_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['address_proof_date'])):"";
    $date = ($detail[0]['date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date'])):"";
            
    $has_passport_yes = ($detail[0]['has_passport']==1)?'checked=checked':'';
    $has_passport_no = ($detail[0]['has_passport']==0)?'checked=checked':'';
    $beneficial_owner_passport_show_hide_div = ($detail[0]['has_passport']==1)?'block':'none';
    
    $has_cv_yes = ($detail[0]['has_cv']==1)?'checked=checked':'';
    $has_cv_no = ($detail[0]['has_cv']==0)?'checked=checked':'';
    $beneficial_owner_cv_show_hide_div = ($detail[0]['has_cv']==1)?'block':'none';
    
    $is_bank_ref_yes = ($detail[0]['is_bank_ref']==1)?'checked=checked':'';
    $is_bank_ref_no = ($detail[0]['is_bank_ref']==0)?'checked=checked':'';
    $beneficial_owner_bank_reference_show_hide_div = ($detail[0]['is_bank_ref']==1)?'block':'none';
    
    $has_address_proof_yes = ($detail[0]['has_address_proof']==1)?'checked=checked':'';
    $has_address_proof_no = ($detail[0]['has_address_proof']==0)?'checked=checked':'';
    $beneficial_owner_proof_add_show_hide_div = ($detail[0]['has_address_proof']==1)?'block':'none';
    
    $CI =& get_instance();
    $CI->load->model('databaseinfo_model');
    $common_data = $CI->databaseinfo_model->getCommonDirector();

?>


<form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-bo-individual-form"  role="form">
                        <div class="col-md-6">
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;"><strong>Name of beneficial owner</strong></label>
                                <div class="col-md-10" style="padding-left:0px;">
                                    <select onclick="fill_common_values_benef_ind(this.value,'_edit');" class="form-control height_25 plahole_font director_company_data_edit" name="director_list" id="director_company_data_edit" style="width: 100%;">
                                        <option value="">Select beneficial owner</option>
                                        <?php foreach ($common_data as $item) { ?>
                                            <option data-surname="<?php echo $item['director_surname']; ?>"  value="<?php echo $item['id'];?>" <?php if($detail[0]['owner_name']==$item['director_name']){?> selected="selected" <?php } ?>  ><?php echo $item['director_name'];?></option>
                                        <?php } 
                                        ?>
                                    </select>
                                    <input name="owner_name" id="director_name_edit" type="hidden" value="<?php echo $detail[0]['owner_name']; ?>">
                                </div>
                                
<!--                                <input name="owner_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['owner_name']; ?>">-->
                            </div>
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                  <label class="client-detailes-sub_heading" style="width:100%;">Surname of shareholder</label>
                                  <div class="col-md-10" style="padding-left:0px;">                                   
                                  <input name="owner_surname" id="owner_surname_edit" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['owner_surname']; ?>" readonly>
                                  </div>
                           </div>   
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>
                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="has_passport" id="beneficial-owner-passport_show_div_edit" <?php echo $has_passport_yes;?>> 
                                         Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="has_passport" id="beneficial-owner-passport_hide_div_edit" <?php echo $has_passport_no;?>> 
                                         No
                                    </label> 
                                </div>
                            </div>

                            <div id="beneficial-owner-passport_show_hide_div_edit" style="display:<?php echo $beneficial_owner_passport_show_hide_div;?>">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                                    <input id="passport_no_edit" name="passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['passport_no'];?>">
                                </div>
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                                    <select name="country_of_issue" id="country_of_issue_edit" class="form-control plahole_font" style="width: 100%;">
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

                                        <input id="date_of_issue_edit" name="date_of_issue" class="form-control height_25" type="text" value="<?php echo $date_of_issue;?>">
                                        
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                                    
                                        <input id="date_of_expiry_edit" name="date_of_expiry" class="form-control height_25" type="text" value="<?php echo $date_of_expiry;?>">
                                       
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">CV</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="has_cv" id="beneficial-owner-cv_show_div_edit" value="1" <?php echo $has_cv_yes;?>> 
                                         Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="has_cv" id="beneficial-owner-cv_hide_div_edit" value="0" <?php echo $has_cv_no;?>> 
                                         No
                                    </label> 
                                </div>
                            </div>	

                            <div class="form-group td-area-form-marg" id="beneficial-owner-cv_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $beneficial_owner_cv_show_hide_div;?>">
                                <label class="client-detailes-sub_heading" style="width:100%;">Date received</label>

                               
                                    <input id="recieved_date_edit" name="recieved_date" class="form-control height_25" type="text" value="<?php echo $recieved_date;?>">
                                    
                            </div>
                        </div>
                        <div class="col-md-6">	
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_bank_ref" id="beneficial-owner-bank-reference_show_div_edit" value="1" <?php echo $is_bank_ref_yes;?>> 
                                         Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_bank_ref" id="beneficial-owner-bank-reference_hide_div_edit" value="0" <?php echo $is_bank_ref_no;?>> 
                                         No
                                    </label> 
                                </div>
                            </div>

                            <div id="beneficial-owner-bank-reference_show_hide_div_edit" style="display:<?php echo $beneficial_owner_bank_reference_show_hide_div;?>">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Bank</label>
                                    <input id="accounting_done_by_edit" name="bank_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="<?php echo $detail[0]['bank_name'];?>">
                                </div>
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>

                                    
                                        <input id="date_edit" name="date" class="form-control height_25" type="text" value="<?php echo $date;?>">
                                        
                                </div>
                            </div>    

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="has_address_proof" id="beneficial-owner-proof_add_show_div_edit" value="1" <?php echo $has_address_proof_yes;?>> 
                                         Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left" style="margin-right:30px;"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="has_address_proof" id="beneficial-owner-proof_add_hide_div_edit" value="0" <?php echo $has_address_proof_no;?>> 
                                         No
                                    </label> 
                                </div>

                            </div>

                            <div id="beneficial-owner-proof_add_show_hide_div_edit" style="display:<?php echo $beneficial_owner_proof_add_show_hide_div;?>">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                    <textarea id="address_detail_edit" name="address" style="width:100%;resize:vertical;" class="readonly"><?php echo $detail[0]['address'];?></textarea>
                                </div>
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                    <select name="country" id="country_edit" class="form-control plahole_font" style="width: 100%;">
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
                                    
                                        <input id="address_proof_date_edit" name="address_proof_date" class="form-control height_25" type="text" value="<?php echo $address_proof_date;?>">
                                        
                                </div>

                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
                                <textarea id="other_detail_edit" name="other_detail" style="width:100%;resize:vertical;" class="readonly"><?php echo $detail[0]['other_detail'];?></textarea>
                            </div>
                            
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">NIC</label>
                                <textarea type="text" id="nic_remark_edit" name="nic_remark" style="width:100%;resize:vertical;" class="readonly" readonly> <?php echo $detail[0]['nic_remark']; ?></textarea>
                            </div>
                            
                            
                             <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Certification of KYC</label>
                                <textarea name="remark" style="width:100%;resize:vertical;"><?php echo $detail[0]['remark'];?></textarea>
                            </div>
                            
                            
                        </div>	
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden"  name="id" id="" style="width: 100%;" value="<?php echo $detail[0]['beneficial_ind_id'];?>">
                                <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="edit">
                                
                                <input type="hidden" id="hp_edit"  name="has_passport"  value="<?php echo $detail[0]['has_passport'];?>">
                                <input type="hidden" id="hc_edit"  name="has_cv"  value="<?php echo $detail[0]['has_cv'];?>">
                                <input type="hidden" id="hbr_edit"  name="is_bank_ref"  value="<?php echo $detail[0]['is_bank_ref'];?>">
                                <input type="hidden" id="iap_edit"  name="has_address_proof"  value="<?php echo $detail[0]['has_address_proof'];?>">
                                
                                <input type="hidden" id="coi_edit"  name="country_of_issue"  value="<?php echo $detail[0]['country_of_issue'];?>">
                                <input type="hidden" id="co_edit"  name="country"  value="<?php echo $detail[0]['country'];?>">
                                
                                <button type="submit" class="btn btn-success pull-right">Save</button>
                                <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>
                            </div>
                        </div>
                    </form>

<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    $(document).ready(function() {
        
        
        
        update_common_element()
        ready_on_db();
        stuff_on_ready();
        $('.stDate_edit').bdatepicker({
               format: "dd MM yyyy",
               autoclose: true,
        });
//        $('.stDate_edit').bdatepicker("update",new Date());
        // select 
        
        
        
        
        var country = '<?php echo $detail[0]['country'];?>';
        $('#country_edit').children().each(function(){
            if($(this).attr('value')==country){
               $(this).attr('selected','selected') 
            }
        });
         var country_of_issue = '<?php echo $detail[0]['country_of_issue'];?>';
//                 alert(country_of_issue);

        $('#country_of_issue_edit').children().each(function(){
            if($(this).attr('value')==country_of_issue){
               $(this).attr('selected','selected') 
            }
        });
        
        $('.director_company_data_edit').change(function(){                  
                        var element = $("option:selected", this);
                        var director_surname = element.attr("data-surname");                         
                        $("#owner_surname_edit").val(director_surname);                      
                     
        });
                
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

        var passport_id_1 = "beneficial-owner-passport_show_div"+addedit
        var passport_id_0 = "beneficial-owner-passport_hide_div"+addedit

        var cv_id_1 = "beneficial-owner-cv_show_div"+addedit
        var cv_id_0 = "beneficial-owner-cv_hide_div"+addedit

        var bank_id_1 = "beneficial-owner-bank-reference_show_div"+addedit
        var bank_id_0 = "beneficial-owner-bank-reference_hide_div"+addedit

        var proof_id_1 = "beneficial-owner-proof_add_show_div"+addedit
        var proof_id_0 = "beneficial-owner-proof_add_hide_div"+addedit  
        
        $('#' + passport_id_1).attr('disabled','disabled');
        $('#' + passport_id_0).attr('disabled','disabled');

        $('#' + cv_id_1).attr('disabled','disabled');
        $('#' + cv_id_0).attr('disabled','disabled');

        $('#' + bank_id_1).attr('disabled','disabled');
        $('#' + bank_id_0).attr('disabled','disabled');

        $('#' + proof_id_1).attr('disabled','disabled');
        $('#' + proof_id_0).attr('disabled','disabled');  
    }
    
   


    function stuff_on_ready(){
        var core_url=CURRENT_URL;
        // ACCOUNT
               
        $('.stDate_edit').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		$('#edit-bo-individual-form').bootstrapValidator('revalidateField', 'date_of_issue');
		$('#edit-bo-individual-form').bootstrapValidator('revalidateField', 'date_of_expiry');	
	});
        var validator = $('#edit-bo-individual-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                owner_name: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        }
                    }
                },
                date_of_issue: {
                    validators: {
                        callback: {
                            message: 'This field is required',
                            callback: function (value, validator, $field) {
                                var input1 = new Date($('#date_of_issue_edit').val()).getTime();
                                var input2 = new Date($('#date_of_expiry_edit').val()).getTime();
                                if(input2!=0 || input1!=0){
                                    if(input1==0){
                                        return {
                                            valid: false,
                                            message: 'This field is required'
                                        };
                                    }
                                    if(input2!=0){
                                        if (input2 <= input1) {
                                            return {
                                            valid: false,
                                            message: 'Date of issue should be less than date of expiry'
                                            };
                                        } else {
                                            return true;
                                        }
                                    } else {
                                        return true;
                                    }
                                } else {
                                    return true;
                                }
                                
                            }
                        }
                    }
                },
                date_of_expiry: {
                    validators: {
                        callback: {
                            message: 'Date of expiry should be greater than date of issue',
                            callback: function (value, validator, $field) {
                               var input1 = new Date($('#date_of_issue_edit').val()).getTime();
                                var input2 = new Date($('#date_of_expiry_edit').val()).getTime();
                                //console.log(input1);
                                //console.log(input2);
                                if(input2!=0 || input1!=0){

                                    if(input2==0){
                                        return {
                                            valid: false,
                                            message: 'This field is required'
                                        };
                                    }
                                    if(input1!=0){
                                        if (input2 <= input1) {
                                            return {
                                            valid: false,
                                            message: 'Date of expiry should be greater than date of issue'
                                        };
                                        } else {
                                            return true;
                                        }
                                    } else {
                                            return true;
                                    }
                                } else {
                                    return true;
                                }
                            }
                        }
                    }
                }
                //

            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_bo_individual_form('edit-bo-individual-form', 'edit', '<?php echo $detail[0]['beneficial_ind_id'];?>');
        });
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
        
        /*********START beneficial-owner-passport_show_hide_div yes no radio button**********/
        $("#beneficial-owner-passport_show_div_edit").click(function(){
            $("#beneficial-owner-passport_show_hide_div_edit").slideDown();
        });
        $("#beneficial-owner-passport_hide_div_edit").click(function(){
            $("#beneficial-owner-passport_show_hide_div_edit").slideUp();
        });
        /***********END beneficial-owner-passport_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-cv_show_hide_div yes no radio button**********/
        $("#beneficial-owner-cv_show_div_edit").click(function(){
            $("#beneficial-owner-cv_show_hide_div_edit").slideDown();
        });
        $("#beneficial-owner-cv_hide_div_edit").click(function(){
            $("#beneficial-owner-cv_show_hide_div_edit").slideUp();
        });
        /***********END beneficial-owner-cv_show_hide_div yes no radio button**********/

        /*********START  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/
        $("#beneficial-owner-bank-reference_show_div_edit").click(function(){
            $("#beneficial-owner-bank-reference_show_hide_div_edit").slideDown();
        });
        $("#beneficial-owner-bank-reference_hide_div_edit").click(function(){
            $("#beneficial-owner-bank-reference_show_hide_div_edit").slideUp();
        });
        /***********END  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-proof_add_show_hide_div yes no radio button**********/
        $("#beneficial-owner-proof_add_show_div_edit").click(function(){
            $("#beneficial-owner-proof_add_show_hide_div_edit").slideDown();
        });
        $("#beneficial-owner-proof_add_hide_div_edit").click(function(){
            $("#beneficial-owner-proof_add_show_hide_div_edit").slideUp();
        });
        /***********END beneficial-owner-proof_add_show_hide_div yes no radio button**********/
        $('.radioYesBtn').val('1');
        $('.radioNoBtn').val('0');
      }
      </script>