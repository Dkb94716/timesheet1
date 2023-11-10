<?php 
    $CI =& get_instance();
    $CI->load->model('databaseinfo_model');
    $grid_data = $CI->databaseinfo_model->getCommonDirector();
?>

<div class="col-lg-12" style="margin-top:20px;"> 
    <div class="col-sm-4"><h4></h4></div>
   
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
        <a href="#modal-add" data-toggle="modal" class="btn-sm btn-warning pull-right addbtn" style="margin-left:8px;">Add Director</a>
    </div>
   
</div>
<div class="innerLR" style="margin-top:60px;">
    <div class="widget widget-body-white widget-heading-simple">
        <div id="director_common_data" class="widget-body overflow-x" style="padding:10px;">
            <table class="dynamicTable1 tableTools table table-striped overflow-x">
    <thead>
        <tr style="background-color:#c72a25; color:#FFF;">
            <th class="thead-th-padg" width="120px">Name of director</th>
            <th class="thead-th-padg" width="120px">Passport</th>
            <th class="thead-th-padg" width="120px">Date of expiry</th>
            <th class="thead-th-padg" width="120px">CV</th>
            <th class="thead-th-padg" width="120px">Bank Reference</th>
            <th class="thead-th-padg" width="120px" style="text-align:center;">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grid_data as $item) { 
        ?>
        <tr class="gradeX">
            <td><span class="td-text-area" style="width:130px;"><?php  echo $item['director_name'].' '.$item['director_surname'];?></span></td>
            <td><span class="td-text-area" style="width:130px;"><?php
                                                                    if($item['has_passport']==1)
                                                                        echo "Yes";
                                                                    else
                                                                        echo "No";
                                                                ?></span></td>
            <td><span class="td-text-area" style="width:130px;"><?php
                if($item['date_of_expiry']=="0000-00-00 00:00:00")
                    echo "";
                else
                    echo date('d F Y', strtotime($item['date_of_expiry'])); 
            ?></span></td>
            <td><span class="td-text-area" style="width:130px;"><?php
                                                                    if($item['has_cv']==1)
                                                                        echo "Yes";
                                                                    else
                                                                        echo "No";
                                                                ?>
            </span></td>
            <td><span class="td-text-area" style="width:130px;"><?php
                                                                    if($item['has_bank_ref']==1)
                                                                        echo "Yes";
                                                                    else
                                                                        echo "No";
                                                                ?></span></td>
            <td style="width:100px !important; text-align:center;" class="">
                <a onclick="edit_director_ind_bar(<?php echo $item['id'];?>);" href="#edit-individual-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
        </div>
    </div>
</div>

<div class="modal fade"  id="modal-add">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Add KYC director</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>/databaseinfo/submit_data" id="add-director-individual-form"  role="form">
                        <div class="col-md-6">
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>Director information</strong></label>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Name of director</label>                                
                                <input name="director_name" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>

                           <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Surname of director</label>                                
                                <input name="director_surname" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                            </div>                       

                            

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Date of birth of director</label>
                                
                                
<!--                                <div class="input-group date stDate_dbc col-sm-12">
                                    <input id="director_birth_date" name="director_birth_date"  class="form-control height_25 stDate_current" type="text">
                                    <span name="director_birth_date" class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                </div>-->

                                    <div class="input-group date stDate col-sm-12">
                                        <input id="director_birth_date" name="director_birth_date" class="form-control height_25 " type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                
                                
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Age</label>
                                <input id="director_age" readonly="" name="director_age" type="text" class="form-control height_25 plahole_font" style="width: 100%;" value="0">
                            </div>

                            

                           
                        </div>	

                        <div class="col-md-6">
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;border-bottom:1px solid #ddd;">
                                <label class="client-detailes-sub_heading" style="margin-bottom:0px;"><strong>KYC documents on director</strong></label>
                            </div> 
                            
                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Passport</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="has_passport" id="kyc_passport_show_div"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="has_passport" id="kyc_passport_hide_div" checked="checked"> 
                                        No
                                    </label> 
                                </div>
                            </div>

                            <div id="kyc_passport_hide_show_div" style="display:none;">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Passport number</label>
                                    <input id="passport_no"  name="passport_no" type="text" class="form-control height_25 plahole_font" style="width: 100%;">
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Country of issue</label>
                                    <select id="country_of_issue" name="country_of_issue" class="form-control plahole_font" style="width: 100%;">
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
                                        <input  name="date_of_issue" id="date_of_issue" class="form-control height_25" type="text" >
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date of expiry</label>
                                    <div class="input-group date stDate">
                                        <input name="date_of_expiry" id="date_of_expiry" class="form-control height_25" type="text" >
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">CV</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" id="director_cv_yes" name="has_cv"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" id="director_cv_no" name="has_cv" checked="checked"> 
                                        No
                                    </label> 
                                </div>
                            </div>
                            
                            <div class="form-group td-area-form-marg" id="director-page-cv_show_hide_div" style="margin-bottom:10px !important;display:none;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date received</label>

                                    <div class="input-group date stDate col-sm-12">
                                        <input id="recieved_date" name="recieved_date" class="form-control height_25" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Bank reference</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="has_bank_ref" id="bank_refrence_show_div"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="has_bank_ref" id="bank_refrence_hide_div" checked="checked"> 
                                        No
                                    </label> 
                                </div>
                            </div>

                            <div id="bank_refrence_show_hide_div" style="display:none;">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of bank</label>
                                    <input type="text" class="form-control height_25 plahole_font"  name="bank_name" id="accounting_done_by" style="width: 100%;">
                                </div>
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Date</label>
                                    <div class="input-group date stDate col-sm-12">
                                        <input id="date" name="date" class="form-control height_25" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%">Proof of address</label>

                                <div class="radio pull-left" style="margin-right:30px;">
                                    <label class="radio-custom-none">
                                        <input type="radio" class="radioYesBtn" name="is_address_proof" id="proof_of_address_show_div"> 
                                        Yes
                                    </label> 
                                </div>

                                <div class="radio pull-left"> 
                                    <label class="radio-custom-none"> 
                                        <input type="radio" class="radioNoBtn" name="is_address_proof" id="proof_of_address_hide_div" checked="checked"> 
                                        No
                                    </label> 
                                </div> 
                            </div>

                            <div id="proof_of_address_show_hide_div" style="display:none;">
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Name of address</label>
                                    <textarea id="address_detail" name="address_detail" style="width:100%;resize:vertical;"></textarea>
                                </div>
                                <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                    <label class="client-detailes-sub_heading" style="width:100%;">Country</label>
                                    <select id="country" name="country" class="form-control plahole_font" style="width: 100%;">
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
                                    <div class="input-group date stDate col-sm-12">
                                        <input id="address_proof_date" name="address_proof_date" class="form-control height_25" type="text">
                                        <span class="input-group-addon padding_3"><i class="fa fa-th"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">Other</label>
                                <textarea id="other_detail" name="other_detail" style="width:100%;resize:vertical;"></textarea>
                            </div>

                            <div class="form-group td-area-form-marg" style="margin-bottom:10px !important;">
                                <label class="client-detailes-sub_heading" style="width:100%;">NIC</label>
                                <textarea id="nic_remark" name="nic_remark" style="width:100%;resize:vertical;"></textarea>
                            </div>
                            
                            
                        </div>	

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden"  name="id" id="" style="width: 100%;" value="">
                                <input type="hidden"  name="action"  class="add_action"  style="width: 100%;" value="add">
                                <button type="submit" class="btn btn-success pull-right">Save</button>
                                <a href="#" class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right:20px;">Cancel</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- // Modal body END -->
        </div>
    </div>
</div>
<div class="modal fade"  id="modal-edit">

    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit Client</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerAll">
                    <div class="innerLR">
                        <form class="form-horizontal" role="form" id="editForm">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align:left;margin-bottom:10px">Client Name</label>
                                <div class="col-sm-7">
                                    <input type="text" name="edit_client_name" id="edit_client_name" maxlength="200" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Company Name</label>
                                <div class="col-sm-7">
                                    <select type="text" class="form-control" name="edit_company_name" id="edit_company_name">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($company_detail as $company) {
                                            ?>
                                            <option value="<?php echo $company->company_name; ?>"><?php echo $company->company_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align: left; margin-bottom:10px;">Team Assigned</label>
                                <div class="col-sm-7">
                                    <select type="text" class="form-control" name="edit_team_name" id="edit_team_name" multiple="">
                                       <optgroup label="Select">
    
  
                            <?php
                            foreach ($team_detail as $team) {
                                ?>
                                                <option value="<?php echo $team->team_name; ?>"><?php echo $team->team_name; ?></option>
                            <?php } ?>
                                                </optgroup>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="edit_client_id" value="">
                            <img id="editloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;margin-left: 200px;"/>
                            <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-10">
                                    <button class="btn btn-success pull-right">Save</button>
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
<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/db_ready.js"></script>
<script>
    
    function CalculateDiff() {
 
    if($('#director_birth_date').val()!="" && $.now()!=""){
 
var From_date = new Date($('#director_birth_date').val());
var To_date = new Date($.now());
var diff_date =  To_date - From_date;
 
var years = Math.floor(diff_date/31536000000);
var months = Math.floor((diff_date % 31536000000)/2628000000);
var days = Math.floor(((diff_date % 31536000000) % 2628000000)/86400000);
//alert(years+" year(s) "+months+" month(s) "+days+" and day(s)");
////$("#Result").html(years+" year(s) "+months+" month(s) "+days+" and day(s)");
////alert( years+" year(s) "+months+" month(s) "+days+" and day(s)");
$('#director_age').val(years);
}
else{
//    alert("Please select dates");
//    return false;
}
    }
    
    
    dynamicTable_dtr_individual = 'dynamicTable1';
    $(document).ready(function() {
        $('#date_of_issue').val("");
        // calculate director age.
        $('.stDate').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
             CalculateDiff()
//            var input1 = new Date($('#director_birth_date').val()).getTime();
//            var input2 = $.now();
//                var one_day=1000*60*60*24;
//                // Calculate the difference in milliseconds
//                var difference_ms = input2 - input1;
//                // Convert back to days and return
//                var days =  Math.round(difference_ms/one_day); 
//  
//                var diff = Math.floor(input2 - input1);
//                var day = 1000 * 60 * 60 * 24;
//
//                var days = Math.floor(diff/day);
//                var months = Math.floor(days/31);
//                var years = Math.floor(months/12);
//                if(input1<input2)
//                    $('#director_age').val(years);
//                else
//                    $('#director_age').val(0);
  
  
//  		console.log(years);

	});
        
        
        ready_on_db();
        stuff_on_ready();
        var cur_date = get_current_date();
        $(".stDate").val(cur_date);
        $('.stDate').bdatepicker({
            format: "dd MM yyyy",
            autoclose: true,
        });
        $('.addbtn').on('click',function(){
            $('#director_birth_date').val("");
            setTimeout(function(){
                $("#add-director-individual-form").data('bootstrapValidator').resetForm(); 
                var cur_date = get_current_date();
                $(".stDate_current").val(cur_date);
                var currentDate = new Date(); 
                $(".stDate_dbc").datepicker("setDate",currentDate);

                $(".stDate_current").val("");
                $('.stDate, .stDate_current, .stDate_dbc').bdatepicker({
                    format: "dd MM yyyy",
                    autoclose: true,
                });
                $('.stDate').bdatepicker({
                    format: "dd MM yyyy",
                    autoclose: true,
                });
                //$('.stDate_di').bdatepicker("update",cur_date);
                //$('.stDate_di_kyc').bdatepicker("update",cur_date);
                //$('.stDate_dc').bdatepicker("update",cur_date);
                //$('.stDate_dc_o').bdatepicker("update",cur_date);
                $('#add_button').show();
                $('#editdelete_button').hide();
                $('#date_of_issue').val("");
                $('#date_of_expiry').val("");
                $('#recieved_date').val("");
                $('#date').val("");
                $('#address_proof_date').val("");
            },400)
            
                
//            $("#add-director-individual-form").data('bootstrapValidator').resetForm(); 
                   $('#date_of_issue').val("");
                   $('#date_of_expiry').val("");
                   $('#recieved_date').val("");
                   $('#date').val("");
                   $('#address_proof_date').val("");
                   

        });
    });
    function stuff_on_ready() {
        $('#director_cv_yes').click(function(){
            $('#director-page-cv_show_hide_div').slideDown();
        });
        $('#director_cv_no').click(function(){
            $('#director-page-cv_show_hide_div').slideUp();
        });
        
        var core_url = CURRENT_URL;
        // For load default grid.
        var load_data_body1 = "director_individual_data_body";
        blockUI(load_data_body1);
        var url1 = core_url + "/databaseinfo/get_director_individual_grid_data";
        grid_data(load_data_body1, url1, dynamicTable_dtr_individual);
        
        $('#kyc_passport_show_div').click(function(){
            setTimeout(function(){
                $("#add-director-individual-form").data('bootstrapValidator').resetForm(); 
            },200)
        });
        $('.stDate_di').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
//                $('#add-director-individual-form').bootstrapValidator('revalidateField', 'appointed_date');
//		$('#add-director-individual-form').bootstrapValidator('revalidateField', 'resigned_date');	
	});
        $('.stDate_di_kyc').bdatepicker({
	  format: "dd MM yyyy",
	   autoclose: true
	 }).on('changeDate', function(e) {
		// Revalidate the date field
//		$('#add-director-individual-form').bootstrapValidator('revalidateField', 'date_of_issue');
//		$('#add-director-individual-form').bootstrapValidator('revalidateField', 'date_of_expiry');	
	});
        var validator = $('#add-director-individual-form').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                director_name: {
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
//                                var input1 = new Date($('#date_of_issue').val()).getTime();
//                                var input2 = new Date($('#date_of_expiry').val()).getTime();
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
//                               var input1 = new Date($('#date_of_issue').val()).getTime();
//                                var input2 = new Date($('#date_of_expiry').val()).getTime();
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
//                appointed_date: {
//                    validators: {
//                        callback: {
//                            message: 'This field is required',
//                            callback: function (value, validator, $field) {
//                                var input1 = new Date($('#appointed_date').val()).getTime();
//                                var input2 = new Date($('#resigned_date').val()).getTime();
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
//                resigned_date: {
//                    validators: {
//                        callback: {
//                            message: 'Date of resignation should be greater than date of appointment',
//                            callback: function (value, validator, $field) {
//                               var input1 = new Date($('#appointed_date').val()).getTime();
//                                var input2 = new Date($('#resigned_date').val()).getTime();
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
//                                            message: 'Date of resignation should be greater than date of appointment'
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
        .on('success.form.bv', function(e) {
            e.preventDefault();
            submit_director_individual_form('add-director-individual-form', 'add', '');
        });
        
        

        $(".close,.cancel").click(function() {
            $('.form-group').removeClass('has-error has-feedback');
            $('.form-group').find('small.help-block').hide();
            $('.form-group').find('i.form-control-feedback').hide();
        });

        // for corporate data
        /******************START show-hide_director_dt_reg-meb_btn*************/
        $("#show_director_dt_reg-meb_btn").click(function() {
            $("#show-hide_director_dt_reg-meb_btn").slideDown();
        });

        $("#hide_director_dt_reg-meb_btn").click(function() {
            $("#show-hide_director_dt_reg-meb_btn").slideUp();
        });
        /******************END show-hide_director_dt_reg-meb_btn*************/
        /******************START show-hide_director_dt_reg-directors_btn*************/
        $("#show_director_dt_reg-directors_btn").click(function() {
            $("#show-hide_director_dt_reg-directors_btn").slideDown();
        });

        $("#hide_director_dt_reg-directors_btn").click(function() {
            $("#show-hide_director_dt_reg-directors_btn").slideUp();
        });
        /******************END show-hide_director_dt_reg-directors_btn*************/
        $("#director_show_div").click(function() {
            $("#director_show_hide_div").slideDown();
        });
        $("#director_hide_div").click(function() {
            $("#director_show_hide_div").slideUp();
        });
        
        $("#bank_refrence_show_div2").click(function(){
                $("#bank_refrence_show_hide_div2").slideDown();
            });
        $("#bank_refrence_hide_div2").click(function(){
            $("#bank_refrence_show_hide_div2").slideUp();
        });

    }

    function submit_director_individual_form(form, action, id) {
        var load_data_body = 'director_common_data';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/submit_director_individual_common";
        blockUI(load_data_body);
        submit_form_common(form, load_data_body, url, action, id, function(data) {
            var url = core_url + "/databaseinfo/get_director_common_grid_data";
            grid_data(load_data_body, url, dynamicTable_dtr_individual);
        });
    }

    function edit_director_ind_bar(id) {
        blockUI('director_common_edit_bar');
        var load_data_body = 'director_common_edit_bar';
        var db_name = 'db_director_individual_common';
        var db_field_id = 'id';
        var tag = 'director_common';
        var view_folder = 'Director';
        var core_url = CURRENT_URL;
        var url = core_url + "/databaseinfo/get_item_detail_for_edit";
        edit_box(load_data_body, url, id, db_name, db_field_id, tag, view_folder)
    }
    
    function delete_director_ind_bar(id){
        var load_data_body = 'director_individual_data_body';
        var db_name = 'db_director_individual';
        var db_field_id = 'dtr_individual_id';
        var core_url=CURRENT_URL;
        var url = core_url+"/databaseinfo/delete_item";
        var title = "Delete Director's Individual Information";
        var grid_url = CURRENT_URL+"/databaseinfo/get_director_individual_grid_data";
        var tag = "Director's individual information"
        delete_box(load_data_body,url,id,db_name,db_field_id,title,grid_url,dynamicTable_dtr_individual,tag)
    }
    
    

</script>

<!---------START Edit Individual Modal box-------->
<div class="modal fade"  id="edit-individual-modal-box">
    <div class="modal-dialog modal_box_custome_size">
        <div class="modal-content">
            <!-- Modal heading -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Edit KYC Director</h3>
            </div>
            <!-- // Modal heading END -->

            <!-- Modal body -->
            <div class="modal-body">
                <div class="innerLR" style="padding:0;" id="director_common_edit_bar">

                </div>
            </div>
            <!-- // Modal body END -->
        </div>
    </div>
</div>
<!---------END Edit Individual Modal box---------->