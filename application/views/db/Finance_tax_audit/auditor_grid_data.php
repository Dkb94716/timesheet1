<?php
//echo "<pre>"; print_r($grid_data); echo "<pre />";
?>

<table class="dynamicTable2 dt_width tableTools table table-striped overflow-x">
                    <thead>
                        <tr style="background-color:#c72a25; color:#FFF;">
                            <th class="thead-th-padg" width="160px">Auditor</th>
                            <th class="thead-th-padg" width="160px">Date of appointment</th>
                            <th class="thead-th-padg" width="160px">Date of resignation</th>
                            <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($grid_data as $item) { ?>
                        <tr class="gradeX">
                            <td><span class="td-text-area"><?php echo $item['auditors']; ?></span></td>
                            <td><span class="td-text-area"><?php $appointment_date = ($item['appointment_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($item['appointment_date'])):""; echo $appointment_date;  ?></span></td>
                            <td><span class="td-text-area"><?php $resignation_date = ($item['resignation_date']!="0000-00-00 00:00:00")?date('d F Y', strtotime($item['resignation_date'])):""; echo $resignation_date;   ?></span></td>
                            <td style="width:100px !important; text-align:center;" class="">
                                <a href="#auditors-modal-box-edit" data-toggle="modal" onclick="edit_auditor_bar(<?php echo $item['auditor_id'];?>);" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                <a href="#auditors-modal-box-delete" data-toggle="modal" onclick="delete_auditor_bar(<?php echo $item['auditor_id'];?>);" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>


