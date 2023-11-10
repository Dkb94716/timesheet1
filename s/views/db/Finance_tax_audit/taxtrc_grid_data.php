<?php

?>

<table class="dynamicTable3 dt_width tableTools table table-striped overflow-x">
                    <thead>
                        <tr style="background-color:#c72a25; color:#FFF;">
                            <th class="thead-th-padg" width="160px">VAT No.</th>
                            <th class="thead-th-padg" width="160px">TAN No.</th>
                            <th class="thead-th-padg" width="160px">Last tax return filed</th>
                            <th class="thead-th-padg" width="160px">TRC available</th>
                            <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($grid_data as $item) { ?>
                        <tr class="gradeX">
                            <td><span class="td-text-area"><?php echo $item['vat_no']; ?></span></td>
                            <td><span class="td-text-area"><?php echo $item['tan_no']; ?></span></td>
                            <td><span class="td-text-area"><?php $last_tax_returned_on = ($item['last_tax_returned_on']!="0000-00-00 00:00:00")?date('d F Y', strtotime($item['last_tax_returned_on'])):""; echo $last_tax_returned_on; ?></span></td>
                            <td><span class="td-text-area">
                                    <?php
                                        if($item['trc_available']==1)
                                            echo "Yes";
                                        else
                                            echo "No";
                                    ?>
                                </span></td>
                            <td style="width:160px !important; text-align:center;" class="">
                                <a href="#tax-trc-modal-box-edit" onclick="edit_taxtrc_bar(<?php echo $item['taxtrc_id'];?>);" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                <a href="#tax-trc-modal-box-delete" onclick="delete_taxtrc_bar(<?php echo $item['taxtrc_id'];?>);" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>