<?php
//    echo "<pre>"; print_r($grid_data); 
?>

<table class="dynamicTable4 dt_width tableTools table table-striped overflow-x">
                    <thead>
                        <tr style="background-color:#c72a25; color:#FFF;">
                            <th class="thead-th-padg" width="357px">Office premises in mauritius</th>
                            <th class="thead-th-padg" width="357px">Employs on a full time basis</th>
                            <th class="thead-th-padg" width="357px">Adopted arbitration clause in the constitution</th>
                            <th class="thead-th-padg" width="357px" style="text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($grid_data as $item) { 
                            
                            $office_premises = ($item['office_premises']==1)?($item['office_address']!="")?'Yes('.$item['office_address'].')':'Yes':'No';
                            $employee_full_time = ($item['employee_full_time']==1)?'Yes':'No';
                            $adopted_arbitration = ($item['adopted_arbitration']==1)?'Yes':'No';
                            
                            ?>
                        <tr class="gradeX">
                            <td><span class="td-text-area"><?php echo $office_premises; ?></span></td>
                            <td><span class="td-text-area"><?php echo $employee_full_time; ?></span></td>
                            <td><span class="td-text-area"><?php echo $adopted_arbitration; ?></span></td>
                            <td style="width:200px !important; text-align:center;" class="">
                                <a href="#substance-conditions-adopted-modal-box-edit" onclick="edit_substance_bar(<?php echo $item['substance_id'];?>);" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                <a href="#substance-conditions-adopted-modal-box-delete" onclick="delete_substance_bar(<?php echo $item['substance_id'];?>);" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

