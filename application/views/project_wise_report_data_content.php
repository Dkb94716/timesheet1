<script>
    function remove_data_tbody(){
        $("#tbody_data").empty();
    }
    
    function show_report(event,emp_id,task_id) {
        $('#show-report').on('shown.bs.modal', function (e) {
            e.preventDefault();
        });
        var request = $.ajax({
            url: CURRENT_URL + '/report/task_wise_report',
            type: "POST",
            data: {emp_id:emp_id,task_id:task_id},
            // dataType: "html"
        });
        request.done(function (msg) {
            $("#tbody_data").empty();
            $("#tbody_data").append(msg); 

        });
        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }                                   
</script>

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
                                <th style="font-size:11px;  width:70px !important;">Task</th>
                                <th style="font-size:11px;  width:70px !important;">Users</th>
                                <th style="font-size:11px;  width:70px !important;">Actual Hours</th>
                                <th style="font-size:11px;  width:70px !important;">Consumed Hours</th>
                                <th style="font-size:11px;  width:70px !important;">Added Date </th>
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
                    
                    $total_res = count($final_report_detail);
                    if (!empty($final_report_detail)) {
                        ?>
                        <?php
                        $common = new Common();
                        $total_actual_hours = 0;
                        $consume_total_hrs = 0;
                        $consume_total_min = 0;
                        foreach ($final_report_detail as $emp_detail) {
                            $counter++;
                            $total_actual_hours = ($total_actual_hours+$emp_detail['actual_hours']);
                            $consume_total_hrs = ($consume_total_hrs+$emp_detail['totalTaskHors']);
                            $consume_total_min = ($consume_total_min+$emp_detail['totalTaskMins']);
                        ?>
                            <table width="100%" class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
                                   style='border-collapse:collapse;mso-table-layout-alt:fixed;
                                   border:none;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
                                   mso-border-insideh:none;mso-border-insidev:none'>
                                <h5></h5>
                                <?php
                                $total_hrs_in_min = ($emp_detail['totalTaskHors']*60);
                                $total_consume_min = ($total_hrs_in_min+$emp_detail['totalTaskMins']);
                                $total_hours1 =  convertToHoursMins($total_consume_min);
                                ?>    
                                <tr style='mso-yfti-irow:3'>
                                    <td style="font-size:11px;  width:90px !important;" align="left" ><?php echo $emp_detail['task_name']; ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $emp_detail['empName']; ?></td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $emp_detail['actual_hours']; ?>  </td>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo $total_hours1; ?>  </td>
                                    <?php
                                    $all_userdata = $this->session->userdata('logged_in');
                                    ?>
                                    <td style="font-size:11px;  width:90px !important;" align="left"><?php echo date('d F Y',  strtotime($emp_detail['timesheet_date']));  ?> </td>
                                </tr>
                            <?php }
                            } 
                            $consume_total_hrs_in_min = ($consume_total_hrs*60);
                            $consume_total_time = ($consume_total_hrs_in_min+$consume_total_min);
                            $total_time_consume =  convertToHoursMins($consume_total_time);
                            ?>
                        <tr style='mso-yfti-irow:3'>
                            <td  colspan="2" style="font-size:12px;  width:90px !important;"><b>Total</b></td>
                            <td style="font-size:11px;  width:90px !important;text-align: left;font-weight: bold;" ><?php echo @number_format((float)$total_actual_hours, 2, '.', ''); ?></td>
                            <td style="font-size:11px;  width:90px !important;text-align: left;font-weight: bold;" ><?php echo @$total_time_consume;?></td>
                        </tr>
                    </table>
                    <p class=MsoNormal><span lang=EN-US style='font-family:Arial'><o:p>&nbsp;</o:p></span></p>
        </div>
        
        <div class="modal fade" id="show-report">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Project Wise Report</h4>
                        <button type="button" onclick="remove_data_tbody()" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Date</th>
                                    <th>Actual Hrs</th>
                                    <th>Consumed Hrs</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_data">
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="remove_data_tbody()">Close</button>
                    </div>
                </div>
            </div>
        </div>                              
    </body>
</html>
