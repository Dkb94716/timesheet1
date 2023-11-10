<?php
$CI =& get_instance();
$CI->load->model('databaseinfo_model');
$beneficial_crp_id = $detail[0]['beneficial_crp_id'];
$corporate_auth_person = $CI->databaseinfo_model->getAuthPersonInfo($beneficial_crp_id);
//echo "<pre>"; print_r($corporate_auth_person); die;
    
$date = date('Y-m-d');
$date_of_incorp = ($detail[0]['date_of_incorp']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_incorp'])):"";
$date_of_certification_of_incorp = ($detail[0]['date_of_certification_of_incorp']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_certification_of_incorp'])):"";
$member_register_date = ($detail[0]['member_register_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['member_register_date'])):"";
$director_register_date = ($detail[0]['director_register_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['director_register_date'])):"";
$date_of_issue = ($detail[0]['date_of_issue']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_issue'])):"";
$date_of_expiry = ($detail[0]['date_of_expiry']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_expiry'])):"";
$date = ($detail[0]['date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date'])):"";
$address_proof_date = ($detail[0]['address_proof_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['address_proof_date'])):"";
$date_of_finantial_year_end = ($detail[0]['date_of_finantial_year_end']!="0000-00-00 00:00:00")?date('d F Y', strtotime($detail[0]['date_of_finantial_year_end'])):"";

$is_member_register_yes = ($detail[0]['is_member_register']=="1")?'checked=checked':'';
$is_member_register_no = ($detail[0]['is_member_register']=="0")?'checked=checked':'';
$show_hide_beneficial_owner_dt_reg_meb_btn = ($detail[0]['is_member_register']=="1")?'block':'none';

$is_director_register_yes = ($detail[0]['is_director_register']=="1")?'checked=checked':'';
$is_director_register_no = ($detail[0]['is_director_register']=="0")?'checked=checked':'';
$register_of_directors_show_hide_div = ($detail[0]['is_director_register']=="1")?'block':'none';

$is_passport_yes = ($detail[0]['is_passport']=="1")?'checked=checked':'';
$is_passport_no = ($detail[0]['is_passport']=="0")?'checked=checked':'';
$beneficial_owner_passport_2_show_hide_div = ($detail[0]['is_passport']=="1")?'block':'none';

$is_bank_ref_yes = ($detail[0]['is_bank_ref']=="1")?'checked=checked':'';
$is_bank_ref_no = ($detail[0]['is_bank_ref']=="0")?'checked=checked':'';
$beneficial_owner_bank_reference_2_show_hide_div = ($detail[0]['is_bank_ref']=="1")?'block':'none';

$is_address_proof_yes = ($detail[0]['is_address_proof']=="1")?'checked=checked':'';
$is_address_proof_no = ($detail[0]['is_address_proof']=="0")?'checked=checked':'';
$beneficial_owner_proof_add_2_show_hide_div = ($detail[0]['is_address_proof']=="1")?'block':'none';

$is_corporate_profile_yes = ($detail[0]['is_corporate_profile']=="1")?'checked=checked':'';
$is_corporate_profile_no = ($detail[0]['is_corporate_profile']=="0")?'checked=checked':'';

$is_audited_account_yes = ($detail[0]['is_audited_account']=="1")?'checked=checked':'';
$is_audited_account_no = ($detail[0]['is_audited_account']=="0")?'checked=checked':'';
$beneficial_owner_audited_accounts_show_hide_div = ($detail[0]['is_audited_account']=="1")?'block':'none';



?>


<form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="edit-bo-corporate-form"  role="form">
                              <div class="col-md-6">	
                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;"><strong>Name of company</strong></label>
                                      <input value="<?php echo $detail[0]['name_of_company'];?>" name="name_of_company" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Registered in</label>
                                      <input value="<?php echo $detail[0]['registered_in'];?>" name="registered_in" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Date of incorporation:</label>
                                      <div class="input-group date stDate_edit col-sm-12">
                                          <input value="<?php echo $date_of_incorp;?>" name="date_of_incorp" class="form-control height_25" type="text">
                                          <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                      <label class="client-detailes-sub_heading" style="width:100%;"><strong>KYC documents on corporate beneficial owner </strong></label>
                                  </div><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Certificate of incorporation dated</label>
                                      <div class="input-group date stDate_edit col-sm-12">
                                          <input value="<?php echo $date_of_certification_of_incorp;?>" name="date_of_certification_of_incorp" class="form-control height_25" type="text">
                                          <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Type of company</label>
                                      <input value="<?php echo $detail[0]['type_of_company'];?>" name="type_of_company"  type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Register of members</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" <?php echo $is_member_register_yes;?> class="radioYesBtn" name="is_member_register" id="show_beneficial_owner_dt_reg-meb_btn_edit"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" <?php echo $is_member_register_no;?> class="radioNoBtn" name="is_member_register" id="hide_beneficial_owner_dt_reg-meb_btn_edit" > 
                                              No
                                          </label> 
                                      </div>
                                  </div>
                                  <div class="form-group td-area-form-marg" id="show-hide_beneficial_owner_dt_reg-meb_btn_edit" style="margin-bottom:10px !important;display:<?php echo $show_hide_beneficial_owner_dt_reg_meb_btn;?>">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Date of member of directors</label>
                                      <div class="input-group date stDate_edit col-sm-12" style="margin-bottom:10px !important;">
                                          <input value="<?php echo $member_register_date;?>" name="member_register_date" class="form-control height_25" type="text">
                                          <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Register of directors</label>

                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" <?php echo $is_director_register_yes;?> class="radioYesBtn" name="is_director_register" id="register_of_directors_show_div_edit"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" <?php echo $is_director_register_no;?> class="radioNoBtn" name="is_director_register" id="register_of_directors_hide_div_edit" > 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" id="register_of_directors_show_hide_div_edit" style="margin-bottom:10px !important;display:<?php echo $register_of_directors_show_hide_div;?>">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Date of register of directors</label>
                                      <div class="input-group date stDate_edit col-sm-12">
                                          <input value="<?php echo $director_register_date;?>" name="director_register_date" class="form-control height_25" type="text">
                                          <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Represented by</label>
                                      <input value="<?php echo $detail[0]['represented_by'];?>" name="represented_by" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                  </div>	

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" <?php echo $is_passport_yes;?> class="radioYesBtn" name="is_passport" id="beneficial-owner-passport-2_show_div_edit"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" <?php echo $is_passport_no;?> class="radioNoBtn" name="is_passport" id="beneficial-owner-passport-2_hide_div_edit" > 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div id="beneficial-owner-passport-2_show_hide_div_edit" style="display:<?php echo $beneficial_owner_passport_2_show_hide_div;?>">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                                          <input value="<?php echo $detail[0]['passport_no'];?>" name="passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                      </div>
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                                          <select name="country_of_issue" id="country_of_issue"  class="form-control plahole_font" style="width: 100%;">
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

                                          <div class="input-group date stDate_edit">
                                              <input id="date_of_issue1_edit" value="<?php echo $date_of_issue;?>" name="date_of_issue" class="form-control height_25" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>

                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>

                                          <div class="input-group date stDate_edit">
                                              <input id="date_of_expiry1_edit" value="<?php echo $date_of_expiry;?>" name="date_of_expiry" class="form-control height_25" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" <?php echo $is_bank_ref_yes;?> class="radioYesBtn" name="is_bank_ref" id="beneficial-owner-bank-reference-2_show_div_edit"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" <?php echo $is_bank_ref_no;?> class="radioNoBtn" name="is_bank_ref" id="beneficial-owner-bank-reference-2_hide_div_edit" > 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div id="beneficial-owner-bank-reference-2_show_hide_div_edit" style="display:<?php echo $beneficial_owner_bank_reference_2_show_hide_div;?>">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Name of bank </label>
                                          <input value="<?php echo $detail[0]['name_of_bank'];?>" name="name_of_bank" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                      </div>
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                                          <div class="input-group date stDate_edit col-sm-12">
                                              <input value="<?php echo $date;?>" name="date" class="form-control height_25" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Proof of address</label>

                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input type="radio" <?php echo $is_address_proof_yes;?> class="radioYesBtn" name="is_address_proof" id="beneficial-owner-proof_add-2_show_div_edit"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input type="radio" <?php echo $is_address_proof_no;?> class="radioNoBtn" name="is_address_proof" id="beneficial-owner-proof_add-2_hide_div_edit" > 
                                              No
                                          </label> 
                                      </div>

                                  </div>

                                  <div id="beneficial-owner-proof_add-2_show_hide_div_edit" style="display:<?php echo $beneficial_owner_proof_add_2_show_hide_div;?>">
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
                                          <div class="input-group date stDate_edit col-sm-12">
                                              <input value="<?php echo $address_proof_date;?>" name="address_proof_date" class="form-control height_25" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>

                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Corporate profile</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input <?php echo $is_corporate_profile_yes;?> type="radio" class="radioYesBtn" name="is_corporate_profile"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input <?php echo $is_corporate_profile_no;?> type="radio" class="radioNoBtn" name="is_corporate_profile" > 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Audited accounts</label>
                                      <div class="radio pull-left" style="margin-right:30px;">
                                          <label class="radio-custom-none">
                                              <input <?php echo $is_audited_account_yes;?> type="radio" class="radioYesBtn" name="is_audited_account" id="beneficial-owner-audited-accounts_show_div_edit"> 
                                              Yes
                                          </label> 
                                      </div>

                                      <div class="radio pull-left" style="margin-right:30px;"> 
                                          <label class="radio-custom-none"> 
                                              <input <?php echo $is_audited_account_no;?> type="radio" class="radioNoBtn" name="is_audited_account" id="beneficial-owner-audited-accounts_hide_div_edit"> 
                                              No
                                          </label> 
                                      </div>
                                  </div>

                                  <div id="beneficial-owner-audited-accounts_show_hide_div_edit" style="display:<?php echo $beneficial_owner_audited_accounts_show_hide_div;?>">
                                      <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                          <label class="client-detailes-sub_heading" style="width:100%;">Date of financial year end</label>
                                          <div class="input-group date stDate_edit col-sm-12">
                                              <input value="<?php echo $date_of_finantial_year_end;?>" name="date_of_finantial_year_end" class="form-control height_25" type="text">
                                              <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                      <label class="client-detailes-sub_heading" style="width:100%;">Remarks</label>
                                      <textarea name="remarks" style="width:100%;resize:vertical;"><?php echo $detail[0]['remarks'];?></textarea>
                                  </div>

                                  <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                      <label class="client-detailes-sub_heading" style="width:90%;"><strong>Authorised persons as per company formation document</strong></label>
                                      <a href="#" id="add_authoried_filed-btn_edit" class="btn-xs btn-success pull-right" data-toggle="modal">
                                          <span class="tooltip_area" data-toggle="tooltip" data-original-title="Add" data-placement="top"> <i class="fa fa-plus" style="font-size:14px;margin-top:3px;"></i></span>	
                                      </a>
                                  </div>
                                  <div id="add_authoried_filed_edit">
                                      <?php

                                    $i=0;
                                    foreach ($corporate_auth_person as $_corporate_auth_person) { 
                                      $i++;  
                                    ?>
                                        <?php if($i==1) { ?>
                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                            <label class="client-detailes-sub_heading" style="width:100%;">Name of authorised persons</label>
                                            <input value="<?php echo $_corporate_auth_person['person_name'];?>" name="person_name[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                            <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                            <input value="<?php echo $_corporate_auth_person['address'];?>" name="person_address[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                            <label class="client-detailes-sub_heading" style="width:100%;">Email</label>
                                            <input value="<?php echo $_corporate_auth_person['email'];?>" name="email[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>

                                        <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                            <label class="client-detailes-sub_heading" style="width:100%;">Phone number</label>
                                            <input value="<?php echo $_corporate_auth_person['phone_no'];?>" name="phone_no[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                        </div>
                                      
                                        <?php }  else { ?>
                                        <div id="remove_div">
                                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Name of authorised persons</label>
                                                <a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv1(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a>
                                                <input value="<?php echo $_corporate_auth_person['person_name'];?>" name="person_name[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                            </div>

                                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Address</label>
                                                <input value="<?php echo $_corporate_auth_person['address'];?>" name="person_address[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                            </div>

                                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Email</label>
                                                <input value="<?php echo $_corporate_auth_person['email'];?>" name="email[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                            </div>

                                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                                <label class="client-detailes-sub_heading" style="width:100%;">Phone number</label>
                                                <input value="<?php echo $_corporate_auth_person['phone_no'];?>" name="phone_no[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                            </div>
                                         </div>
                                        <?php }  ?>
                                    <?php }  ?>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                    <input type="hidden"  name="id" id="" style="width: 100%;" value="<?php echo $detail[0]['beneficial_crp_id'];?>">
                                    <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="edit">
                                    <button type="submit" class="btn btn-success pull-right">Save</button>
                                    <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>
                                  </div>
                              </div>
                          </form>


<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    $(document).ready(function() {
        ready_on_db();
        stuff_on_ready();
        $('.stDate_edit').bdatepicker({
               format: "dd MM yyyy",
               autoclose: true,
        });
//        $('.stDate_edit').bdatepicker("update",new Date());
        // select 
        var country = '<?php echo $detail[0]['country'];?>';
        $('#country').children().each(function(){
            if($(this).attr('value')==country){
               $(this).attr('selected','selected') 
            }
        });
        
        var country_of_issue = '<?php echo $detail[0]['country_of_issue'];?>';
        $('#country_of_issue').children().each(function(){
            if($(this).attr('value')==country_of_issue){
               $(this).attr('selected','selected') 
            }
        });
        
        $("#show_beneficial_owner_dt_reg-meb_btn_edit").click(function(){
            $("#show-hide_beneficial_owner_dt_reg-meb_btn_edit").slideDown();
        });
				
        $("#hide_beneficial_owner_dt_reg-meb_btn_edit").click(function(){
            $("#show-hide_beneficial_owner_dt_reg-meb_btn_edit").slideUp();
        });
        /*********START register_of_directors_show_hide_div yes no radio button**********/
        $("#register_of_directors_show_div_edit").click(function(){
            $("#register_of_directors_show_hide_div_edit").slideDown();
        });
        $("#register_of_directors_hide_div_edit").click(function(){
            $("#register_of_directors_show_hide_div_edit").slideUp();
        });
        /***********END register_of_directors_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-passport_show_hide_div yes no radio button**********/
        $("#beneficial-owner-passport-2_show_div_edit").click(function(){
            $("#beneficial-owner-passport-2_show_hide_div_edit").slideDown();
        });
        $("#beneficial-owner-passport-2_hide_div_edit").click(function(){
            $("#beneficial-owner-passport-2_show_hide_div_edit").slideUp();
        });
        /***********END beneficial-owner-passport_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-audited-accounts_show_hide_div yes no radio button**********/
        $("#beneficial-owner-audited-accounts_show_div_edit").click(function(){
            $("#beneficial-owner-audited-accounts_show_hide_div_edit").slideDown();
        });
        $("#beneficial-owner-audited-accounts_hide_div_edit").click(function(){
            $("#beneficial-owner-audited-accounts_show_hide_div_edit").slideUp();
        });
        /***********END beneficial-owner-audited-accounts_show_hide_div yes no radio button**********/

        /*********START  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/
        $("#beneficial-owner-bank-reference-2_show_div_edit").click(function(){
            $("#beneficial-owner-bank-reference-2_show_hide_div_edit").slideDown();
        });
        $("#beneficial-owner-bank-reference-2_hide_div_edit").click(function(){
            $("#beneficial-owner-bank-reference-2_show_hide_div_edit").slideUp();
        });
        /***********END  beneficial-owner-bank-reference_show_hide_div yes no radio button**********/

        /*********START beneficial-owner-proof_add-2_show_hide_div yes no radio button**********/
        $("#beneficial-owner-proof_add-2_show_div_edit").click(function(){
            $("#beneficial-owner-proof_add-2_show_hide_div_edit").slideDown();
        });
        $("#beneficial-owner-proof_add-2_hide_div_edit").click(function(){
            $("#beneficial-owner-proof_add-2_show_hide_div_edit").slideUp();
        });
        /***********END beneficial-owner-proof_add-2_show_hide_div yes no radio button**********/
        
        $('#add_authoried_filed-btn_edit').on('click', function(){
            var str='<div class="removed_div"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading">Name of authorised persons</label><a href="#nogo" class="btn-xs btn-danger pull-right" data-toggle="tooltip" data-original-title="Delete" data-placement="top" onclick="deleteDiv1(this)"><i class="fa fa-fw icon-delete-symbol" style="width:10px;color:#fff;font-size:10px;"></i></a><input name="person_name[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Address</label><input name="person_address[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Email</label><input name="email[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;"><div class="form-group td-area-form-marg" style="margin-bottom:10px !important;"><label class="client-detailes-sub_heading" style="width:100%;">Phone number</label><input name="phone_no[]" type="text" class="form-control height_25 plahole_font" style="width: 100%;"></div>';
            $( str ).appendTo($('#add_authoried_filed_edit'));
        });
                
    });
    
   


    function stuff_on_ready(){
        var core_url=CURRENT_URL;
        // ACCOUNT
               
        $('.stDate_edit').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
		//$('#edit-bo-corporate-form').bootstrapValidator('revalidateField', 'date_of_issue');
		//$('#edit-bo-corporate-form').bootstrapValidator('revalidateField', 'date_of_expiry');	
	});
        var validator = $('#edit-bo-corporate-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                name_of_company: {
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
//                }
                //

            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_bo_corporate_form('edit-bo-corporate-form', 'edit', '<?php echo $detail[0]['beneficial_crp_id'];?>');
        });
        
        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });
        
        
        $('.radioYesBtn').val('1');
        $('.radioNoBtn').val('0');
      }
      </script>