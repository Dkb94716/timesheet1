<?php
//echo "<pre />"; print_r($account_data);
?>
<table class="dynamicTable1 tableTools table table-striped overflow-x">
                    <thead>
                        <tr style="background-color:#c72a25; color:#FFF;">
                            <th class="thead-th-padg" width="160px">Accounting team</th>
                            <th class="thead-th-padg" width="160px">Financial year ending</th>
                            <th class="thead-th-padg" width="160px"></th>
                            <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($account_data as $item) { 
                        ?>
                        <tr class="gradeX">
                            <td><span class="td-text-area"><?php echo $item['account_team'];?></span></td>
                            <td><span class="td-text-area"><?php echo $item['financial_year_date']." ".$item['financial_year_month']; ?></span></td>
                            <td><span class="td-text-area"></span></td>
                            <td style="width:100px !important; text-align:center;" class="">
                                <a href="#modal-account-edit" data-toggle="modal" class="btn-xs btn-warning" onclick="edit_account_bar(<?php echo $item['account_id'];?>);" style="margin-left:5px;">Edit</a>
                                <a href="#modal-delete" data-toggle="modal" class="btn-xs btn-danger" onclick="delete_account_bar(<?php echo $item['account_id'];?>)" style="margin-left:5px;">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
