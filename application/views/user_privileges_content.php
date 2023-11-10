
<?php
if (!empty($user_role_detail)) { 
    foreach ($user_role_detail as $role) {
        $role1 = $role->user_privileges;
        $role2 = $role->role_id;
        if (!empty($role2)) {
            $data = json_decode($role1, true);
            // print_r($data);die;
            $arr = $data['administration_control']['company'];
            $arr1 = $data['administration_control']['clients'];
            $arr2 = $data['administration_control']['projects'];
            $arr_administration_control = $data['administration_control']['assign_projects'];
            $upload_task_control = $data['administration_control']['upload_task'];
            $project_wise_report_control = $data['administration_control']['project_wise_report'];
            $project_expense_control = $data['administration_control']['project_expense'];
            $arr3 = $data['administration_control']['activity'];
            $arr4 = $data['administration_control']['task'];
            $arr5 = $data['administration_control']['team'];
            $arr6 = $data['administration_control']['department'];
            $arr7 = $data['administration_control']['user'];
            $arr8 = $data['administration_control']['report'];
            $arr9 = $data['administration_control']['user_role'];
            $arr_client_database = $data['client_database']['database'];
            $arr10 = $data['client_database']['client'];
            $arr_client_report = $data['client_database']['client_report'];
            $arr11 = $data['client_database']['accounts'];
            $arr12 = $data['client_database']['director'];
            $arr13 = $data['client_database']['shareholder'];
            $arr14 = $data['client_database']['beneficial'];
            $arr15 = $data['client_database']['bank'];
            $arr16 = $data['client_database']['compliance'];
            $arr17 = $data['client_database']['substance'];
            $arr18 = $data['client_database']['occupation'];
            $arr_trust = $data['client_database']['trust'];
            // echo "<pre>";
            //print_r($arr_trust);

            $arr_licence = $data['client_database']['licence'];
            $arr_agm = $data['client_database']['agm'];
            $arr19 = $data['leave_management']['setholidaylist'];
            $arr20 = $data['leave_management']['setleaves'];
            $arr21 = $data['leave_management']['manageleave'];
            $arr22 = $data['leave_management']['applyleave'];
            $manage_employee = $data['leave_management']['allemployee'];


            $arr_manage_timesheet = $data['timesheet']['managetimesheet'];
            $arr_timesheet = $data['timesheet']['timesheet_status'];
            $arr_all_timesheet = $data['timesheet']['alltimesheet'];
			$arr_dms = $data['dms']['dms'];
             //print_r($arr_dms);die;
            ?>


            <div class="col-lg-12" style="margin-top:20px;"> 


                <div class="col-sm-4"><h4>Set Privileges - <?php echo $role->role_name; ?>

                        <input type="hidden" id="role_id" name="role_id" value="<?php echo $role->role_id; ?>" />

                    </h4></div>
                <div class="col-sm-4 pull-right" style="padding-right:2%">
                    <button class="btn btn-danger pull-right" onclick="return_back()">Back</button>


                </div>
                <div class="innerLR" style="margin-top:60px;">

                    <div class="widget widget-body-white widget-heading-simple">
                        <div class="widget-body overflow-x" style="padding:10px;">
                            <table class="dynamicTable tableTools table table-striped overflow-x">
                                <thead>
                                    <tr class="roll-mangt_sub-heading">
                                        <th class="roll-mangt-th" style="text-align:left;padding-left: 10px !important; width: 323px !important;"><strong>Administration Control</strong></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Company</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="1" name="com_1" value="<?php if ($arr['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>"<?php if ($arr['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="2" name="com_2" value="<?php if ($arr['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="3"  name="com_3" value="<?php if ($arr['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="4" name="com_4" value="<?php if ($arr['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Clients</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="5" name="cli_5" value="<?php if ($arr1['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr1['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="6"  name="cli_6" value="<?php if ($arr1['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr1['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="7" name="cli_7" value="<?php if ($arr1['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr1['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="8"  name="cli_8" value="<?php if ($arr1['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr1['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Projects</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="9"  name="pro_9" value="<?php if ($arr2['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr2['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="10"  name="pro_10" value="<?php if ($arr2['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr2['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="11" name="pro_11" value="<?php if ($arr2['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr2['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="12" name="pro_12" value="<?php if ($arr2['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr2['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Assign Projects</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="9"  name="assign_pro_9" value="<?php if ($arr_administration_control['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_administration_control['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="10"  name="assign_pro_10" value="<?php if ($arr_administration_control['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_administration_control['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="11" name="assign_pro_11" value="<?php if ($arr_administration_control['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_administration_control['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="12" name="assign_pro_12" value="<?php if ($arr_administration_control['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_administration_control['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Activity - Sub Activity</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="13" name="act_13" value="<?php if ($arr3['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr3['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="14" name="act_14" value="<?php if ($arr3['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr3['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="15" name="act_15" value="<?php if ($arr3['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr3['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="16"  name="act_16"value="<?php if ($arr3['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr3['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Task</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="17"  name="task_17" value="<?php if ($arr4['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr4['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="18" name="task_18" value="<?php if ($arr4['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr4['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="19" name="task_19" value="<?php if ($arr4['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr4['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="20" name="task_20"  value="<?php if ($arr4['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr4['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Upload Task</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="10"  name="upload_task_10" value="<?php if ($upload_task_control['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($upload_task_control['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Team</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="21" name="team_21" value="<?php if ($arr5['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr5['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="22"  name="team_22"  value="<?php if ($arr5['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr5['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="23"  name="team_23"  value="<?php if ($arr5['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr5['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="24"  name="team_24" value="<?php if ($arr5['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr5['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Department</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="25"  name="Depa_25" value="<?php if ($arr6['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr6['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="26" name="Depa_26" value="<?php if ($arr6['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr6['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="27" name="Depa_27" value="<?php if ($arr6['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr6['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="28" name="Depa_28" value="<?php if ($arr6['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr6['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">User</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="29"  name="user_29" value="<?php if ($arr7['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr7['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="30" name="user_30" value="<?php if ($arr7['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr7['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="31" name="user_31" value="<?php if ($arr7['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr7['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="32" name="user_32" value="<?php if ($arr7['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr7['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="user_pdf" name="user_pdf" value="<?php if ($arr7['user_pdf'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr7['user_pdf'] == 1) { ?>checked="checked" <?php } ?>>Download PDF
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>


                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Report</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="33"  name="report_33" value="<?php if ($arr8['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr8['View'] == 1) { ?>checked="checked"<?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="34"  name="report_34" value="<?php if ($arr8['PrintReport'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr8['PrintReport'] == 1) { ?>checked="checked"<?php } ?>>Print Report
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="35"  name="report_35" value="<?php if ($arr8['ExportExcel'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr8['ExportExcel'] == 1) { ?>checked="checked"<?php } ?>>Export Excel
                                                </label>
                                            </div>
                                        </td>
                                       <!-- <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="36"  name="report_36" value="<?php  //if ($arr8['Delete'] == 1) { ?><?php //echo "1"; ?><?php //} else { ?><?php //echo "0"; ?><?php //} ?>" <?php //if ($arr8['Delete'] == 1) { ?><?php //} ?>>Delete
                                                </label>
                                            </div>
                                        </td>  -->
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Project Wise Report</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="33"  name="project_wise_report_33" value="<?php if ($project_wise_report_control['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($project_wise_report_control['View'] == 1) { ?>checked="checked"<?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="34"  name="project_wise_report_34" value="<?php if ($project_wise_report_control['PrintReport'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($project_wise_report_control['PrintReport'] == 1) { ?>checked="checked"<?php } ?>>Print Report
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Project Expense</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="33"  name="project_expense_33" value="<?php if ($project_expense_control['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($project_expense_control['View'] == 1) { ?>checked="checked"<?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="30" name="project_expense_30" value="<?php if ($project_expense_control['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($project_expense_control['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="34"  name="project_expense_34" value="<?php if ($project_expense_control['PrintReport'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($project_expense_control['PrintReport'] == 1) { ?>checked="checked"<?php } ?>>Print Report
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">User Roles</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="37"  name="user_role_37" value="<?php if ($arr9['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr9['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="38" name="user_role_38" value="<?php if ($arr9['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr9['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="39" name="user_role_39" value="<?php if ($arr9['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr9['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="40" name="user_role_40" value="<?php if ($arr9['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr9['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                       <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="41" name="user_role_41" value="<?php if (@$arr9['Privileges'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if (@$arr9['Privileges'] == 1) { ?>checked="checked" <?php } ?>>Set Privileges
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="dynamicTable tableTools table table-striped overflow-x">
                                <thead>
                                    <tr class="roll-mangt_sub-heading">
                                        <th class="roll-mangt-th" style="text-align:left;padding-left: 10px !important; width: 323px !important;"><strong>Client Database</strong></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Database</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="41" name="database_pdf" value="<?php if ($arr_client_database['download_pdf'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_client_database['download_pdf'] == 1) { ?>checked="checked"<?php } ?>>Download PDF
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="42" name="excel_export" value="<?php if ($arr_client_database['excel_export'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_client_database['excel_export'] == 1) { ?>checked="checked" <?php } ?>>Export Excel
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="43" name="database_view_edit" value="<?php if ($arr_client_database['view_edit_details'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_client_database['view_edit_details'] == 1) { ?>checked="checked" <?php } ?>>View/Edit Details
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>

                                    </tr>
                                    
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Client Report</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="43" name="client_view_edit" value="<?php if ($arr_client_report['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_client_report['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="41" name="print_client_report" value="<?php if ($arr_client_report['Print'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_client_report['Print'] == 1) { ?>checked="checked" <?php } ?>>Print
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="42" name="client_excel_export" value="<?php if ($arr_client_report['ExportExcel'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_client_report['ExportExcel'] == 1) { ?>checked="checked" <?php } ?>>Export Excel
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>

                                    </tr>
                                <tbody style="display: none;">
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Client</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="41" name="client_41" value="<?php if ($arr10['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr10['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="42" name="client_42" value="<?php if ($arr10['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr10['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="43" name="client_43" value="<?php if ($arr10['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr10['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="44" name="client_44" value="<?php if ($arr10['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr10['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Accounts, Tax and Audit</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="45" name="Accounts_45" value="<?php if ($arr11['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr11['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="46" name="Accounts_46" value="<?php if ($arr11['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr11['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="47" name="Accounts_47" value="<?php if ($arr11['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr11['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="48" name="Accounts_48"  value="<?php if ($arr11['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr11['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Director Information
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="49" name="Director_49" value="<?php if ($arr12['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr12['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="50" name="Director_50" value="<?php if ($arr12['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr12['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="51" name="Director_51" value="<?php if ($arr12['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr12['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="52" name="Director_52" value="<?php if ($arr12['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr12['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Shareholder Information
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="53" name="Shareholder_53"  value="<?php if ($arr13['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr13['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="54" name="Shareholder_54" value="<?php if ($arr13['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr13['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="55" name="Shareholder_55" value="<?php if ($arr1['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr13['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="56" name="Shareholder_56" value="<?php if ($arr13['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr13['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Beneficial Owner
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="57" name="Beneficial_57" value="<?php if ($arr14['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr14['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="58" name="Beneficial_58" value="<?php if ($arr14['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr14['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="59" name="Beneficial_59" value="<?php if ($arr14['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr14['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="60" name="Beneficial_60" value="<?php if ($arr14['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr14['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Bank</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="61" name="Bank_61" value="<?php if ($arr15['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr15['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="62" name="Bank_62" value="<?php if ($arr15['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr15['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="63" name="Bank_63" value="<?php if ($arr15['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr15['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="64" name="Bank_64" value="<?php if ($arr15['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr15['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Compliance</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="65" name="Compliance_65" value="<?php if ($arr16['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr16['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="66" name="Compliance_66" value="<?php if ($arr16['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr16['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="67" name="Compliance_67" value="<?php if ($arr16['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr16['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="68" name="Compliance_68" value="<?php if ($arr16['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr16['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Substance Condition</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="69" name="Substance_69" value="<?php if ($arr17['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr17['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="70" name="Substance_70"  value="<?php if ($arr17['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr17['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="71" name="Substance_71"  value="<?php if ($arr17['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr17['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="72" name="Substance_72"  value="<?php if ($arr17['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr17['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Occupation Permit</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="73" name="Occupation_73"  value="<?php if ($arr18['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr18['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="74" name="Occupation_74" value="<?php if ($arr18['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr18['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="75" name="Occupation_75" value="<?php if ($arr18['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr18['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="76" name="Occupation_76" value="<?php if ($arr18['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr18['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Trust</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="trust_id1" name="trust_id1"  value="<?php if ($arr_trust['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_trust['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="trust_id2" name="trust_id2" value="<?php if ($arr_trust['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_trust['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="trust_id3" name="trust_id3" value="<?php if ($arr_trust['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_trust['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="trust_id4" name="trust_id4" value="<?php if ($arr_trust['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_trust['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Other Type of Licences</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="licence_id1" name="licence_id1"  value="<?php if ($arr_licence['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_licence['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="licence_id2" name="licence_id2" value="<?php if ($arr_licence['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_licence['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="licence_id3" name="licence_id3" value="<?php if ($arr_licence['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_licence['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="licence_id4" name="licence_id4" value="<?php if ($arr_licence['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_licence['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">AGM and Constitution</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="agm_id1" name="agm_id1"  value="<?php if ($arr_agm['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_agm['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="agm_id2" name="agm_id2" value="<?php if ($arr_agm['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_agm['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="agm_id3" name="agm_id3" value="<?php if ($arr_agm['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_agm['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="agm_id4" name="agm_id4" value="<?php if ($arr_agm['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_agm['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </tbody>
                            </table>
                            <table class="dynamicTable tableTools table table-striped overflow-x">
                                <thead>
                                    <tr class="roll-mangt_sub-heading">
                                        <th class="roll-mangt-th" style="text-align:left;padding-left: 10px !important; width: 323px !important;"><strong>Leave Management</strong></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Set Holiday List</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="77" name="SetHolidayList_77" value="<?php if ($arr19['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr19['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="78"  name="SetHolidayList_78" value="<?php if ($arr19['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr19['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="79" name="SetHolidayList_79" value="<?php if ($arr19['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr19['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="80" name="SetHolidayList_80" value="<?php if ($arr19['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr19['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Set Leaves</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="81" name="SetLeaves_81" value="<?php if ($arr20['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr20['View'] == 1) { ?>checked="checked" <?php } ?>>View

                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="82" name="SetLeaves_82" value="<?php if ($arr20['Add'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr20['Add'] == 1) { ?>checked="checked" <?php } ?>>Add
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="83" name="SetLeaves_83" value="<?php if ($arr20['Edit'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr20['Edit'] == 1) { ?>checked="checked" <?php } ?>>Edit
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="84" name="SetLeaves_84" value="<?php if ($arr20['Delete'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr20['Delete'] == 1) { ?>checked="checked" <?php } ?>>Delete
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="setleaves_forward" name="setleaves_forward" value="<?php if ($arr20['Forward'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr20['Forward'] == 1) { ?>checked="checked" <?php } ?>>Forward
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="setleaves_grant" name="setleaves_grant" value="<?php if ($arr20['Grant'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr20['Grant'] == 1) { ?>checked="checked" <?php } ?>>Grant
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Manage Leave</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="85" name="ManageLeave_85" value="<?php if ($arr21['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr21['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                               <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox"  id="leave_pdf" name="leave_pdf" value="<?php if ($arr21['Leave_PDF'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr21['Leave_PDF'] == 1) { ?>checked="checked" <?php } ?>>Download PDF
                                                </label> 
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                
                                            </div>
                                        </td>

                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Apply Leave</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom leave">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="applyleave" name="applyleave" value="<?php if ($arr22['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr22['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Manage All Employee</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom all_employee_leave">
                                                    <i class="fa fa-fw fa-square-o"></i>
                                                    <input type="checkbox" class="checkbox" id="manage_all_employee" name="manage_all_employee" value="<?php if ($manage_employee['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($manage_employee['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="dynamicTable tableTools table table-striped overflow-x">
                                <thead>
                                    <tr class="roll-mangt_sub-heading">
                                        <th class="roll-mangt-th" style="text-align:left;padding-left: 10px !important; width: 323px !important;"><strong>Timesheet</strong></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Manage Timesheet</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom timesheet">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="manage_timesheet" name="manage_timesheet" value="<?php if ($arr_manage_timesheet['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_manage_timesheet['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                 <label class="checkbox-custom timesheet">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="weekend_submission" name="weekend_submission" value="<?php if ($arr_manage_timesheet['weekend_submission'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_manage_timesheet['weekend_submission'] == 1) { ?>checked="checked" <?php } ?>>Weekend Submission
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                               
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>


                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Timesheet</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom timesheet">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="timesheet_view" name="timesheet_view" value="<?php if ($arr_timesheet['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_timesheet['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;display: none;">
                                                
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;display: none;">
                                                
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;display: none;">
                                                
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>

                                    


                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">Manage All Timesheet</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="all_timesheet" name="all_timesheet" value="<?php if ($arr_all_timesheet['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_all_timesheet['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                            <table class="dynamicTable tableTools table table-striped overflow-x">
                                <thead>
                                    <tr class="roll-mangt_sub-heading">
                                        <th class="roll-mangt-th" style="text-align:left;padding-left: 10px !important; width: 323px !important;"><strong>DMS</strong></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                        <th class="roll-mangt-th"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="gradeX">
                                        <td class="roll-mangt-tbody-td">DMS</td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                <label class="checkbox-custom timesheet">
                                                    <i class="fa fa-fw fa-square-o checked"></i>
                                                    <input type="checkbox" class="checkbox" id="dms" name="dms" value="<?php if ($arr_dms['View'] == 1) { ?><?php echo "1"; ?><?php } else { ?><?php echo "0"; ?><?php } ?>" <?php if ($arr_dms['View'] == 1) { ?>checked="checked" <?php } ?>>View
                                                </label>
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                                
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                               
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">
                                               
                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                        <td class="roll-mangt-tbody-td">
                                            <div class="checkbox" style="height: 20px; line-height:0;">

                                            </div>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>

                            <img id="addloader" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" style="display:none;"/>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button  id="submit" class="btn btn-success pull-right" >Save</button>
                                </div>
                            </div> 

                        </div>

                    </div>
                </div>

        <?php }
    }
} ?>
    <script>
        function return_back()
        {

            window.history.back();

        }


        $("input[type='checkbox']").on("change", function () {
            if ($(this).is(":checked"))
                $(this).val("1");
            else
                $(this).val("0");
        });







    </script>

    <script>
        $(document).ready(function () {
           
            $('#database_view_html').hide();
            $("#submit").click(function () {
                // var id1=document.getElementById('1').value;
                //alert(id1);
                var sel = $('input[type=checkbox]').map(function (_, el) {
                    return $(el).val();
                }).get();
                //////administration_control//////////
                //////company////////
                var company = new Object();

                company.View = $('input[name=com_1]').val();
                company.Add = $('input[name=com_2]').val();
                company.Edit = $('input[name=com_3]').val();
                company.Delete = $('input[name=com_4]').val();
                //////Clients////////
                var clients = new Object();
                clients.View = $('input[name=cli_5]').val();
                clients.Add = $('input[name=cli_6]').val();
                clients.Edit = $('input[name=cli_7]').val();
                clients.Delete = $('input[name=cli_8]').val();
                //////Projects////////
                var projects = new Object();
                projects.View = $('input[name=pro_9]').val();
                projects.Add = $('input[name=pro_10]').val();
                projects.Edit = $('input[name=pro_11]').val();
                projects.Delete = $('input[name=pro_12]').val();
                //////AssignProjects////////
                var assign_projects = new Object();
                assign_projects.View = $('input[name=assign_pro_9]').val();
                assign_projects.Add = $('input[name=assign_pro_10]').val();
                assign_projects.Edit = $('input[name=assign_pro_11]').val();
                assign_projects.Delete = $('input[name=assign_pro_12]').val();
                //////Activity////////
                var activity = new Object();
                activity.View = $('input[name=act_13]').val();
                activity.Add = $('input[name=act_14]').val();
                activity.Edit = $('input[name=act_15]').val();
                activity.Delete = $('input[name=act_16]').val();
                //////Task////////
                var task = new Object();
                task.View = $('input[name=task_17]').val();
                task.Add = $('input[name=task_18]').val();
                task.Edit = $('input[name=task_19]').val();
                task.Delete = $('input[name=task_20]').val();
                var team = new Object();
                //////Team////////
                team.View = $('input[name=team_21]').val();
                team.Add = $('input[name=team_22]').val();
                team.Edit = $('input[name=team_23]').val();
                team.Delete = $('input[name=team_24]').val();
                //////Department////////
                var department = new Object();

                department.View = $('input[name=Depa_25]').val();
                department.Add = $('input[name=Depa_26]').val();
                department.Edit = $('input[name=Depa_27]').val();
                department.Delete = $('input[name=Depa_28]').val();
                //////User////////
                var user = new Object();
                user.View = $('input[name=user_29]').val();
                user.Add = $('input[name=user_30]').val();
                user.Edit = $('input[name=user_31]').val();
                user.Delete = $('input[name=user_32]').val();
                user.user_pdf = $('input[name=user_pdf]').val();

                //////Report////////
                var report = new Object();
                report.View = $('input[name=report_33]').val();
                report.PrintReport = $('input[name=report_34]').val();
                report.ExportExcel = $('input[name=report_35]').val();
                report.Delete = $('input[name=report_36]').val();
                //////User Roll////////
                var user_role = new Object();
                user_role.View = $('input[name=user_role_37]').val();
                user_role.Add = $('input[name=user_role_38]').val();
                user_role.Edit = $('input[name=user_role_39]').val();
                user_role.Delete = $('input[name=user_role_40]').val();
                user_role.Privileges = $('input[name=user_role_41]').val();
                //////Upload Task////////
                var upload_task = new Object();
                upload_task.Add = $('input[name=upload_task_10]').val();
                //////Project Wise Report////////
                var project_wise_report = new Object();
                project_wise_report.View = $('input[name=project_wise_report_33]').val();
                project_wise_report.PrintReport = $('input[name=project_wise_report_34]').val();
                //////Project Expense////////
                var project_expense = new Object();
                project_expense.View = $('input[name=project_expense_33]').val();
                project_expense.Add = $('input[name=project_expense_30]').val();
                project_expense.PrintReport = $('input[name=project_expense_34]').val();
                ///////////client_database/////////////
                ///////////database////
                var database = new Object();
                database.download_pdf = $('input[name=database_pdf]').val();
                database.excel_export = $('input[name=excel_export]').val();
                database.view_edit_details = $('input[name=database_view_edit]').val();
                //////Client////////
                var client = new Object();
                client.View = 1;
                client.Add = 1;
                client.Edit = 1;
                client.Delete = 1;
                //////Client Report////////
                var client_report = new Object();
                client_report.Print = $('input[name=print_client_report]').val();
                client_report.ExportExcel = $('input[name=client_excel_export]').val();
                client_report.View = $('input[name=client_view_edit]').val();

                //////Accounts////////
                var accounts = new Object();
                accounts.View = 1;
                accounts.Add = 1;
                accounts.Edit = 1;
                accounts.Delete = 1;
                //////Director////////
                var director = new Object();
                director.View = 1;
                director.Add = 1;
                director.Edit = 1;
                director.Delete = 1;
                //////Shareholder////////
                var shareholder = new Object();
                shareholder.View = 1;
                shareholder.Add = 1;
                shareholder.Edit = 1;
                shareholder.Delete = 1;
                //////Beneficial////////
                var beneficial = new Object();
                beneficial.View = 1;
                beneficial.Add = 1;
                beneficial.Edit = 1;
                beneficial.Delete = 1;
                //////Bank////////
                var bank = new Object();
                bank.View = 1;
                bank.Add = 1;
                bank.Edit = 1;
                bank.Delete = 1;
                //////Compliance////////
                var compliance = new Object();
                compliance.View = 1;
                compliance.Add = 1;
                compliance.Edit = 1;
                compliance.Delete = 1;
                //////Substance////////
                var substance = new Object();
                substance.View = 1;
                substance.Add = 1;
                substance.Edit = 1;
                substance.Delete = 1;
                //////Occupation////////
                var occupation = new Object();
                occupation.View = 1;
                occupation.Add = 1;
                occupation.Edit = 1;
                occupation.Delete = 1;

                //////Trust////////
                var trust = new Object();
                trust.View = 1;
                trust.Add = 1;
                trust.Edit = 1;
                trust.Delete = 1;

                //////Licence////////
                var licence = new Object();
                licence.View = 1;
                licence.Add = 1;
                licence.Edit = 1;
                licence.Delete = 1;

                //////Agm////////
                var agm = new Object();
                agm.View = 1;
                agm.Add = 1;
                agm.Edit = 1;
                agm.Delete = 1;

                ///////////leave_management/////////////

                //////Set Holiday List////////
                var setholidaylist = new Object();
                setholidaylist.View = $('input[name=SetHolidayList_77]').val();
                setholidaylist.Add = $('input[name=SetHolidayList_78]').val();
                setholidaylist.Edit = $('input[name=SetHolidayList_79]').val();
                setholidaylist.Delete = $('input[name=SetHolidayList_80]').val();
                //////Set Leaves////////
                var setleaves = new Object();
                setleaves.View = $('input[name=SetLeaves_81]').val();
                setleaves.Add = $('input[name=SetLeaves_82]').val();
                setleaves.Edit = $('input[name=SetLeaves_83]').val();
                setleaves.Delete = $('input[name=SetLeaves_84]').val();
                setleaves.Forward = $('input[name=setleaves_forward]').val();
                setleaves.Grant = $('input[name=setleaves_grant]').val();
                //////Manage Leave////////
                var manageleave = new Object();
                manageleave.View = $('input[name=ManageLeave_85]').val();
                manageleave.Leave_PDF = $('input[name=leave_pdf]').val();
                //////Apply Leave////////
                var applyleave = new Object();
                applyleave.View = $('input[name=applyleave]').val();

                //////Pending Leave////////
                

                //////Pending Leave////////
                var allemployee = new Object();
                allemployee.View = $('input[name=manage_all_employee]').val();





                //////All Employee View////////
                var managetimesheet = new Object();
                managetimesheet.View = $('input[name=manage_timesheet]').val();
                managetimesheet.weekend_submission = $('input[name=weekend_submission]').val();

                //////Timesheet ////////
                var timesheet_status = new Object();
                timesheet_status.View = $('input[name=timesheet_view]').val();
//                timesheet_status.Add = $('input[name=timesheet_add]').val();
//                timesheet_status.Edit = $('input[name=timesheet_edit]').val();
//                timesheet_status.Delete = $('input[name=timesheet_delete]').val();
                
                //////Pending Timesheet////////
               
                //////All Timesheet////////
                var alltimesheet = new Object();
                alltimesheet.View = $('input[name=all_timesheet]').val();

                 //////DMS View////////
                var dms = new Object();
                dms.View = $('input[name=dms]').val();

                ///////////////////////////Json User ////////////////////////////////////////////////////////
                var role_id = $('#role_id').val();
                
                //var user_privileges='text';

                // Returns successful data submission message when the entered information is stored in database.
                var dms_management = {};
                var data5 = {};
                data5["dms"] = dms;
                
                var timesheet = {};
                var data4 = {};
                data4["managetimesheet"] = managetimesheet;
                data4["timesheet_status"] = timesheet_status;
                data4["alltimesheet"] = alltimesheet;

                var leave_management = {};
                var data3 = {};
                data3["setholidaylist"] = setholidaylist;
                data3["setleaves"] = setleaves;
                data3["manageleave"] = manageleave;
                data3["applyleave"] = applyleave;
                data3["allemployee"] = allemployee;


                var client_database = {};
                var data2 = {};
                data2["database"] = database;
                data2["client"] = client;
                data2["client_report"] = client_report;
                data2["accounts"] = accounts;
                data2["director"] = director;
                data2["shareholder"] = shareholder;
                data2["beneficial"] = beneficial;
                data2["bank"] = bank;
                data2["compliance"] = compliance;
                data2["substance"] = substance;
                data2["occupation"] = occupation;
                data2["trust"] = trust;
                data2["licence"] = licence;
                data2["agm"] = agm;

                var a_control_data = {};
                var data1 = {};
                data1["company"] = company;
                data1["clients"] = clients;
                data1["projects"] = projects;
                data1["assign_projects"] = assign_projects;
                data1["activity"] = activity;
                data1["task"] = task;
                data1["team"] = team;
                data1["department"] = department;
                data1["user"] = user;
                data1["report"] = report;
                data1["user_role"] = user_role;
                data1["upload_task"] = upload_task;
                data1["project_wise_report"] = project_wise_report;
                data1["project_expense"] = project_expense;

                a_control_data["administration_control"] = data1;
                a_control_data["client_database"] = data2;
                a_control_data["leave_management"] = data3;
                a_control_data["timesheet"] = data4;
                a_control_data["dms"] = data5;
                var jsonData = JSON.stringify(a_control_data);
                // jsonString = JSON.stringify(company,clients)

                var dataString = 'role_id=' + role_id + '&user_privileges=' + jsonData;
                $('.btn-success').attr("disabled", "disabled");
                $.ajax({
                    type: "POST",
                    url: CURRENT_URL + '/user_role/submit_edit_user_privilages',
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        $('.btn-success').removeAttr("disabled");
                        bootbox.alert(result, function () {
                            location.reload();
                        });
                    }
                });

                return false;

            });
        });


    </script>

    <script>
        $(document).ready(function () {
                <?php //if ($manage_employee['View'] == 1) { ?>
                  //  $('.leave input').prop("disabled", true);
            <?php //} 
            //if ($arr_all_timesheet['View'] == 1) { ?>
                   // $('.timesheet input').prop("disabled", true);
            <?php //} ?>
//            $('#manage_all_employee').change(function () {
//                
//                if ($(this).is(":checked")) {
//                    $('.leave i').addClass('checked');
//                    $('.leave input').attr('value', 1);
//                    $('.leave input').prop("disabled", true);
//                    $('.leave i').addClass("disabled");
//                }
//                else {
//                    //$('.leave i').removeClass('checked');
//                    //$('.leave input').attr('value', 0);
//                    $('.leave input').prop("disabled", false);
//                    $('.leave i').removeClass('disabled');
//                }
//
//            });
//            $('#all_timesheet').change(function () {
//                
//                if ($(this).is(":checked")) {
//                    $('.timesheet i').addClass('checked');
//                    $('.timesheet input').attr('value', 1);
//                    $('.timesheet input').prop("disabled", true);
//                    $('.timesheet i').addClass("disabled");
//                }
//                else {
//                    //$('.leave i').removeClass('checked');
//                   // $('.timesheet input').attr('value', 0);
//                    $('.timesheet input').prop("disabled", false);
//                     $('.timesheet i').removeClass('disabled');
//                }
//
//            });

        });

    </script>