<?php //echo $description; die;     ?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns:x="urn:schemas-microsoft-com:office:excel"
      xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
      xmlns:mv="http://macVmlSchemaUri" xmlns="http://www.w3.org/TR/REC-html40">

    <head>
        <style>
            <!--
            /* Font Definitions */
            @font-face
            {font-family:Arial;
             panose-1:2 11 6 4 2 2 2 2 2 4;
             mso-font-charset:0;
             mso-generic-font-family:auto;
             mso-font-pitch:variable;
             mso-font-signature:-536859905 -1073711037 9 0 511 0;}
            @font-face
            {font-family: "ＭＳ 明朝";
             mso-font-charset:78;
             mso-generic-font-family:auto;
             mso-font-pitch:variable;
             mso-font-signature:1 134676480 16 0 131072 0;}
            @font-face
            {font-family: "ＭＳ 明朝";
             mso-font-charset:78;
             mso-generic-font-family:auto;
             mso-font-pitch:variable;
             mso-font-signature:1 134676480 16 0 131072 0;}
            @font-face
            {font-family:"Lucida Grande";
             panose-1:2 11 6 0 4 5 2 2 2 4;
             mso-font-charset:0;
             mso-generic-font-family:auto;
             mso-font-pitch:variable;
             mso-font-signature:-520090897 1342218751 0 0 447 0;}
            /* Style Definitions */
            p.MsoNormal, li.MsoNormal, div.MsoNormal
            {mso-style-unhide:no;
             mso-style-qformat:yes;
             mso-style-parent:"";
             margin:0cm;
             margin-bottom:.0001pt;
             mso-pagination:widow-orphan;
             font-size:12.0pt;
             font-family:Cambria;
             mso-ascii-font-family:Cambria;
             mso-ascii-theme-font:minor-latin;
             mso-fareast-font-family: "ＭＳ 明朝";
             mso-fareast-theme-font:minor-fareast;
             mso-hansi-font-family:Cambria;
             mso-hansi-theme-font:minor-latin;
             mso-bidi-font-family:"Times New Roman";
             mso-bidi-theme-font:minor-bidi;
             mso-ansi-language:EN-US;}
            p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
            {mso-style-noshow:yes;
             mso-style-priority:99;
             mso-style-link:"Balloon Text Char";
             margin:0cm;
             margin-bottom:.0001pt;
             mso-pagination:widow-orphan;
             font-size:9.0pt;
             font-family:"Lucida Grande";
             mso-fareast-font-family:"ＭＳ 明朝";
             mso-fareast-theme-font:minor-fareast;
             mso-ansi-language:EN-US;}
            span.BalloonTextChar
            {mso-style-name:"Balloon Text Char";
             mso-style-noshow:yes;
             mso-style-priority:99;
             mso-style-unhide:no;
             mso-style-locked:yes;
             mso-style-link:"Balloon Text";
             mso-ansi-font-size:9.0pt;
             mso-bidi-font-size:9.0pt;
             font-family:"Lucida Grande";
             mso-ascii-font-family:"Lucida Grande";
             mso-hansi-font-family:"Lucida Grande";
             mso-bidi-font-family:"Lucida Grande";}
            span.SpellE
            {mso-style-name:"";
             mso-spl-e:yes;}
            span.GramE
            {mso-style-name:"";
             mso-gram-e:yes;}
            .MsoChpDefault
            {mso-style-type:export-only;
             mso-default-props:yes;
             font-family:Cambria;
             mso-ascii-font-family:Cambria;
             mso-ascii-theme-font:minor-latin;
             mso-fareast-font-family:"ＭＳ 明朝";
             mso-fareast-theme-font:minor-fareast;
             mso-hansi-font-family:Cambria;
             mso-hansi-theme-font:minor-latin;
             mso-bidi-font-family:"Times New Roman";
             mso-bidi-theme-font:minor-bidi;
             mso-ansi-language:EN-US;}
            @page WordSection1
            {size:595.0pt 842.0pt;
             margin:42.55pt 42.55pt 42.55pt 42.55pt;
             mso-header-margin:35.4pt;
             mso-footer-margin:35.4pt;
             mso-paper-source:0;}
            div.WordSection1
            {page:WordSection1;}
            -->
        </style>
    </head>

    <body lang=EN-IN style='tab-interval:36.0pt'>
        <div class=WordSection1>
            <p class=MsoNormal>
                <span lang=EN-US style='font-family:Arial;mso-no-proof:yes'>
                        <table width="100%" style="margin-bottom: 10px;">
                            <tr>
                                <th style="font-size:11px;  width:70px !important;">Company</th>
                                <th style="font-size:11px;  width:70px !important;">Client</th>
                                <th style="font-size:11px;  width:70px !important;">Project</th>
                                <th style="font-size:11px;  width:70px !important;">Team</th>
                                <th style="font-size:11px;  width:70px !important;">User</th>
                                <th style="font-size:11px;  width:70px !important;">Activity</th>
                                <th style="font-size:11px;  width:70px !important;">Disbursement</th>
                                <?php if ($description == 1) { ?>
                                    <th style="font-size:11px;  width:110px !important;">Descriptions</th>
                                <?php } ?>
                                
                                <th style="font-size:11px;  width:70px !important;">Billable</th>
                                <th style="font-size:11px;  width:70px !important;">Date</th>
                                <th style="font-size:11px;  width:70px !important;">Start Time</th>
                                <th style="font-size:11px;  width:70px !important;">End TIme </th>
                                <th style="font-size:11px;  width:70px !important;">Time (HH:mm) </th>


                                <?php 
                                $all_userdata = $this->session->userdata('logged_in');
                                if($all_userdata['usrRoleld']==1){?>
                                <th style="font-size:11px;  width:70px !important;">Amount </th>
                                <?php }?>

                               
                                
                            </tr>
                        </table>
                    <?php
                    // Added by Satish - add this method to common helper
                    function convertToHoursMins($time, $format = "%'.02d:%'.02d") {
                        settype($time, 'integer');
                        if ($time < 1) {
                            return;
                        }
                        $hours = floor($time / 60);
                        $minutes = ($time % 60);
                        return sprintf($format, $hours, $minutes);
                    }
                    // end of method
                    
                    $counter = 0;
                    $companyName = '';
                    $oldVal = '';
                    $to = 0;
                    $toMinute = 0;
                    $totalFinaMurVal = 0;
                    if (!empty($employee_detail)) {
                        ?>
                        <?php
                        // echo '<pre>';
                        // print_r($employee_detail);
                        $common = new Common();
                        foreach ($employee_detail as $emp_detail) {

                            //print_r($emp_detail);
                            $counter++;
                            ?>
                            <table width="100%" class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
                                   style='border-collapse:collapse;mso-table-layout-alt:fixed;
                                   border:none;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
                                   mso-border-insideh:none;mso-border-insidev:none'>
                                <h5></h5>
                                <?php
                                $tempVal = getViewByVal($viewBy, $emp_detail);
                                if ($oldVal == "" && $counter == 1) {
                                    //print a row here. 
                                    $oldVal = $tempVal;
                                    ?>	
                                    <tr style='mso-yfti-irow:3'>
                                        <td style="font-size:11px;background-color:lightgray; padding-left: 5px; font-weight: bold;" colspan="14"><?php echo $tempVal . '&nbsp;'; ?></td>
                                    </tr>
                                <?php
                                } else if ($oldVal == $tempVal) {
                                    /// do nothing. Same entity going on.
                                    //timeUnits = timeUnits + parseInt(item.timeUnits); 
                                } 
                                else {
                                    if ($tempVal != '') {
                                        $oldVal = $tempVal;                                    
                                        ?> 
                                        <tr height="40" style='mso-yfti-irow:3'>
                                            <?php if ($description == 1) { ?>
                                                <td  colspan="8" style="font-size:12px;  width:65px !important;"><b>Total</b></td>
                                            <?php }  else { ?>
                                                <td  colspan="9" style="font-size:12px;  width:65px !important;"><b>Total</b></td>
                                            <?php } ?>
                                            <?php if ($description == 1) { ?>
                                            <td style="font-size:11px;  width:90px !important; text-align: center;"></td>
                                            <?php } ?>
                                            <td style="font-size:11px;  width:90px !important; padding-left: 20px;font-weight: bold;" align="left" ><?php if (@$total_units >= 0) { ?><?php //echo @$total_units; ?> <?php } ?></td>
                                            <td style="font-size:11px;  width:90px !important;text-align: center;font-weight: bold; "><?php //echo @$total_end_time;      ?></td>
                                            <td style="font-size:11px;  width:90px !important;text-align: center;font-weight: bold;" > </td>
                                            <td style="font-size:11px;  width:90px !important;text-align: left;font-weight: bold;" ><?php echo @$total_hours_data; ?> </td>
                                            
                                            
                                            

                                            <?php 
                                            $all_userdata = $this->session->userdata('logged_in');
                                            if($all_userdata['usrRoleld']==1){
                                            ?>
                                            <td style="font-size:11px;  width:90px !important;"><?php echo number_format($totalFinaMurVal, 2);?></td> 
                                            <?php }?>

                                        </tr>
                                        <tr  style='mso-yfti-irow:3'>
                                            <td style="font-size:11px;background-color:lightgray;padding-left: 5px; font-weight: bold;" colspan="14"><?php echo $tempVal . '&nbsp;'; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    $total_units = 0;
                                    $to = 0;
                                    $toMinute = 0;
                                    $totalFinaMurVal = 0;
                                }
                                $t2 = $emp_detail->end_time;
                                $t1 = $emp_detail->start_time;
                                $e_seconds = strtotime($t2);
                                $s_seconds = strtotime($t1);
                                $end_time = $t2;
                                $seconds = strtotime($end_time);
                                $st_time = $t1;
                                $seconds = strtotime($st_time);
                                $total = $e_seconds - $s_seconds;
                                $minut = $total / 60;
                                $total_hours1 =  convertToHoursMins($minut);//date('H:i', mktime(0,$minut));//gmdate("H:i", ($minut * 60)); //changed by satish
                                // echo 'to'.$to; 

                                @$to = $to + $total;
                                $minut = $to / 60;
                                $total_hours_data = convertToHoursMins($minut);//date('H:i', mktime(0,$minut));//gmdate("H:i", ($minut * 60));//changed by satish
                                // $total_hours_data = $minut;
                                //----------- GET MUR RATE FROM HELPER ACCORDING TO DATE START --------
                                $getMurRateHelper = $common->userRoleRateMur($emp_detail->id, $emp_detail->timesheet_date);
                                if($getMurRateHelper){
                                    $rate_mur = $getMurRateHelper->hourly_rate;
                                } else{
                                    $rate_mur = 0;
                                }
                                //----------- GET MUR RATE FROM HELPER ACCORDING TO DATE END --------
                                $forMinuteMurVal = explode(':',$total_hours1);
                                $forMinuteMurValCalculate = $forMinuteMurVal[1]*0.0167;
                                $HourMurVal = $forMinuteMurVal[0]+$forMinuteMurValCalculate;
                                $FinalMurVal = $HourMurVal*$rate_mur;
                                $totalFinaMurVal = $totalFinaMurVal + $FinalMurVal;
                                ?>    
                                <tr style='mso-yfti-irow:3'>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $emp_detail->company_name; ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left" ><?php echo $emp_detail->client_name; ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo ($emp_detail->project_name !='0' ) ? $emp_detail->project_name : ''; ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $emp_detail->team_name; ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $emp_detail->empName . " " . $emp_detail->surname; ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $emp_detail->activity_name; ?> <br/><?php if ($emp_detail->subactivity_name) { ?> (<?php echo $emp_detail->subactivity_name; ?>) <?php } ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $emp_detail->disbursement; ?></td>
                                    <?php if ($description == 1) { ?>
                                        <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $emp_detail->comments; ?></td>
                                    <?php } ?>
                                    <td style="font-size:11px;  width:90px !important; padding-left: 20px;" align="left"> <?php // echo $emp_detail->time_units; ?> </td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"> <?php if ($emp_detail->billable == 0) { ?> <?php echo "No"; ?> <?php } else { ?><?php echo "Yes"; ?> <?php } ?> </td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo date('d F Y',  strtotime($emp_detail->timesheet_date));  ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $emp_detail->start_time; ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $emp_detail->end_time; ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $total_hours1; ?>  </td>


                                    <?php 
                                    $all_userdata = $this->session->userdata('logged_in');
                                    if($all_userdata['usrRoleld']==1){?>
                                    <td style="font-size:11px;  width:90px !important;" align="left"> <?php echo number_format($FinalMurVal, 2); ?></td>
                                    <?php }?>


                                    
                                    
                                    
                                        <?php
                                        $total_units = @$total_units + $emp_detail->time_units;
                                        ?>
                                </tr>
                            <?php }
                            } 
                            ?>
                        <tr style='mso-yfti-irow:3'>
                            <td  colspan="7" style="font-size:12px;  width:90px !important;"><b>Total</b></td>
                            <?php if ($description == 1) { ?>
                                <td style="font-size:12px;  width:90px !important; text-align: center;"></td>
                            <?php } ?>
                            <td style="font-size:11px;  width:90px !important; padding-left: 20px;font-weight: bold;" align="left" ><?php if (@$total_units >= 0) { ?><?php // echo @$total_units; ?> <?php } ?></td>
                            <td style="font-size:12px;  width:90px !important;text-align: center; "><?php //echo @$total_hours_data;    ?></td>
                            <td style="font-size:12px;  width:90px !important;text-align: center; "><?php //echo @$total_end_time;     ?></td>
                            <td style="font-size:12px;  width:90px !important;text-align: center;" > </td>
                            <td style="font-size:12px;  width:90px !important;text-align: center;" > </td>
                            <td style="font-size:11px;  width:90px !important;text-align: left;font-weight: bold;" ><?php echo @$total_hours_data; ?></td>
                            
                            
                             <?php 
                               $all_userdata = $this->session->userdata('logged_in');
                               if($all_userdata['usrRoleld']==1){
                               ?>
                              <td style="font-size:12px; width:90px !important;text-align: left;font-weight: bold;" ><?php echo number_format($totalFinaMurVal, 2); ?></td>
                             <?php }?>
                        </tr>
                    </table>
                    <p class=MsoNormal><span lang=EN-US style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>
        </div>
    </body>
</html>