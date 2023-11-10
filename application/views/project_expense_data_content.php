<script>
    // $(document).ready(function(){
    function remove_data_tbody() {
        $("#tbody_data").empty();
    }
    // }
</script>

<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml" xmlns:mv="http://macVmlSchemaUri" xmlns="http://www.w3.org/TR/REC-html40">

<head>
    <style>
        <!--
        /* Font Definitions */
        @font-face {
            font-family: Arial;
            panose-1: 2 11 6 4 2 2 2 2 2 4;
            mso-font-charset: 0;
            mso-generic-font-family: auto;
            mso-font-pitch: variable;
            mso-font-signature: -536859905 -1073711037 9 0 511 0;
        }

        @font-face {
            font-family: "ＭＳ 明朝";
            mso-font-charset: 78;
            mso-generic-font-family: auto;
            mso-font-pitch: variable;
            mso-font-signature: 1 134676480 16 0 131072 0;
        }

        @font-face {
            font-family: "ＭＳ 明朝";
            mso-font-charset: 78;
            mso-generic-font-family: auto;
            mso-font-pitch: variable;
            mso-font-signature: 1 134676480 16 0 131072 0;
        }

        @font-face {
            font-family: "Lucida Grande";
            panose-1: 2 11 6 0 4 5 2 2 2 4;
            mso-font-charset: 0;
            mso-generic-font-family: auto;
            mso-font-pitch: variable;
            mso-font-signature: -520090897 1342218751 0 0 447 0;
        }

        /* Style Definitions */
        p.MsoNormal,
        li.MsoNormal,
        div.MsoNormal {
            mso-style-unhide: no;
            mso-style-qformat: yes;
            mso-style-parent: "";
            margin: 0cm;
            margin-bottom: .0001pt;
            mso-pagination: widow-orphan;
            font-size: 12.0pt;
            font-family: Cambria;
            mso-ascii-font-family: Cambria;
            mso-ascii-theme-font: minor-latin;
            mso-fareast-font-family: "ＭＳ 明朝";
            mso-fareast-theme-font: minor-fareast;
            mso-hansi-font-family: Cambria;
            mso-hansi-theme-font: minor-latin;
            mso-bidi-font-family: "Times New Roman";
            mso-bidi-theme-font: minor-bidi;
            mso-ansi-language: EN-US;
        }

        p.MsoAcetate,
        li.MsoAcetate,
        div.MsoAcetate {
            mso-style-noshow: yes;
            mso-style-priority: 99;
            mso-style-link: "Balloon Text Char";
            margin: 0cm;
            margin-bottom: .0001pt;
            mso-pagination: widow-orphan;
            font-size: 9.0pt;
            font-family: "Lucida Grande";
            mso-fareast-font-family: "ＭＳ 明朝";
            mso-fareast-theme-font: minor-fareast;
            mso-ansi-language: EN-US;
        }

        span.BalloonTextChar {
            mso-style-name: "Balloon Text Char";
            mso-style-noshow: yes;
            mso-style-priority: 99;
            mso-style-unhide: no;
            mso-style-locked: yes;
            mso-style-link: "Balloon Text";
            mso-ansi-font-size: 9.0pt;
            mso-bidi-font-size: 9.0pt;
            font-family: "Lucida Grande";
            mso-ascii-font-family: "Lucida Grande";
            mso-hansi-font-family: "Lucida Grande";
            mso-bidi-font-family: "Lucida Grande";
        }

        span.SpellE {
            mso-style-name: "";
            mso-spl-e: yes;
        }

        span.GramE {
            mso-style-name: "";
            mso-gram-e: yes;
        }

        .MsoChpDefault {
            mso-style-type: export-only;
            mso-default-props: yes;
            font-family: Cambria;
            mso-ascii-font-family: Cambria;
            mso-ascii-theme-font: minor-latin;
            mso-fareast-font-family: "ＭＳ 明朝";
            mso-fareast-theme-font: minor-fareast;
            mso-hansi-font-family: Cambria;
            mso-hansi-theme-font: minor-latin;
            mso-bidi-font-family: "Times New Roman";
            mso-bidi-theme-font: minor-bidi;
            mso-ansi-language: EN-US;
        }

        @page WordSection1 {
            size: 595.0pt 842.0pt;
            margin: 42.55pt 42.55pt 42.55pt 42.55pt;
            mso-header-margin: 35.4pt;
            mso-footer-margin: 35.4pt;
            mso-paper-source: 0;
        }

        div.WordSection1 {
            page: WordSection1;
        }
        -->
    </style>
</head>

<body lang=EN-IN style='tab-interval:36.0pt'>
    <div class=WordSection1>
        <div class=" col-md-12" style="padding:0px; margin-top: 10px; margin-bottom: 20px;">
            <span style="font-size:16px; float: left;margin-top: -5px;" colspan="8">Total Estimate Cost: <b style="margin-left: 30px;"><?php if ($project_total_estimate_amount > 0) {
                                                                                                                                            echo number_format($project_total_estimate_amount, 2);
                                                                                                                                        } ?></b></span>
        </div>
        <div class=" col-md-12" style="padding:0px; margin-top: 10px; margin-bottom: 20px;">
            <span style="font-size:16px; float: left;margin-top: -5px;" colspan="8">Month Wise Development Cost:<b style="margin-left: 30px;"><?php if ($monthWiseDevelopmentCost > 0) {
                                                                                                                                                    echo number_format($monthWiseDevelopmentCost, 2);
                                                                                                                                                } ?></b></span>
        </div>
        <p class=MsoNormal>
            <span lang=EN-US style='font-family:Arial;mso-no-proof:yes'>
                <table width="100%" style="margin-bottom: 10px;">
                    <tr>
                        <th style="font-size:14px;  width:70px !important;">Month</th>
                        <th style="font-size:14px;  width:70px !important;">Year</th>
                        <th style="font-size:14px;  width:70px !important;">Amount</th>
                    </tr>
                </table>
                <?php
                $counter1 = 0;
                if (!empty($projectDevelopmentExpense)) {
                ?>
                    <?php
                    foreach ($projectDevelopmentExpense as $value) {
                        $counter1++;
                    ?>
                        <table width="100%" class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse;mso-table-layout-alt:fixed;
                                   border:none;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
                                   mso-border-insideh:none;mso-border-insidev:none'>
                            <h5></h5>
                            <tr style='mso-yfti-irow:3'>
                                <td style="font-size:14px;  width:90px !important;" align="left">
                                    <?php
                                    $month = '01-' . $value['month'] . '-' . $value['year'];
                                    echo date('F',  strtotime($month));
                                    ?>
                                </td>
                                <td style="font-size:14px;  width:90px !important;" align="left"><?php echo $value['year']; ?></td>
                                <td style="font-size:14px;  width:90px !important;" align="left"><?php echo number_format($value['total_expense'], 2); ?> </td>

                            </tr>
                    <?php }
                }
                    ?>
                        </table>
                        <p class=MsoNormal><span lang=EN-US style='font-family:Arial'>
                                <o:p>&nbsp;</o:p>
                            </span></p>
            </span>
            <span lang=EN-US style='font-family:Arial;mso-no-proof:yes'>
                <p style="margin-top: 20px; margin-bottom: 20px;">Other Expense</p>
                <table width="100%" style="margin-bottom: 10px;">
                    <tr>
                        <th style="font-size:14px;  width:70px !important;">Title</th>
                        <th style="font-size:14px;  width:70px !important;">Date</th>
                        <th style="font-size:14px;  width:70px !important;">Amount</th>
                    </tr>
                </table>
                <?php
                $counter = 0;
                if (!empty($project_expense)) {
                ?>
                    <?php
                    $tolal_expense_amount = 0;
                    foreach ($project_expense as $value1) {
                        $tolal_expense_amount = ($tolal_expense_amount + $value1->expense_amount);
                    ?>
                        <table width="100%" class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse;mso-table-layout-alt:fixed;
                                   border:none;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
                                   mso-border-insideh:none;mso-border-insidev:none'>
                            <h5></h5>
                            <tr style='mso-yfti-irow:3'>
                                <td style="font-size:14px;  width:90px !important;" align="left"><?php echo $value1->expense_type; ?></td>
                                <td style="font-size:14px;  width:90px !important;" align="left"><?php echo date('d F Y',  strtotime($value1->expense_date)); ?></td>
                                <td style="font-size:14px;  width:90px !important;" align="left"><?php echo number_format($value1->expense_amount, 2); ?> </td>
                            </tr>
                    <?php }
                }
                    ?>
                        </table>
                        <p style="margin-top: 30px;"><span><b>Total Expense:<span style="margin-left: 10px;"><?php
                                                                                                                $tolal_expense = ($tolal_expense_amount + $monthWiseDevelopmentCost);
                                                                                                                echo number_format($tolal_expense, 2); ?></span></b></span></p>
                        <?php
                        $final_amount = ($project_total_estimate_amount - $tolal_expense);
                        if ($final_amount > 0) {
                        ?>
                            <p style="margin-top: 30px;"><span><b>Total Profit:<span style="margin-left: 10px;"><?php echo number_format($final_amount, 2); ?></span></b></span></p>
                        <?php } else { ?>
                            <p style="margin-top: 30px;"><span><b>Total Loss:<span style="margin-left: 10px;"><?php echo number_format($final_amount, 2); ?></span></b></span></p>
                        <?php } ?>
                        <p class=MsoNormal><span lang=EN-US style='font-family:Arial'>
                                <o:p>&nbsp;</o:p>
                            </span></p>
            </span>
        </p>
    </div>
</body>
</html>