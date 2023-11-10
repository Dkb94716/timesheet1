<?php
//echo "<pre />"; print_r($bank_data); echo "<pre />";
?>
        <table class="dynamicTable1 tableTools table table-striped overflow-x">
            <thead>
                <tr style="background-color:#c72a25; color:#FFF;">
                    <th class="thead-th-padg" width="160px">Name of bank</th>
                    <th class="thead-th-padg" width="160px">Type of account</th>
                    <th class="thead-th-padg" width="160px">Currency</th>
                    <th class="thead-th-padg" width="160px">Account no.</th>
                    <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bank_data as $item) { 
                ?>
                <tr class="gradeX">
                    <td><span class="td-text-area"><?php echo $item['bank_name']; ?></span></td>
                    <td><span class="td-text-area"><?php echo $item['account_type_name']; ?></span></td>
                    <td><span class="td-text-area"><?php echo $item['currency_name']; ?></span></td>
                    <td><span class="td-text-area"><?php echo $item['account_no']; ?></span></td>
                    <td style="width:100px !important; text-align:center;" class="">
                        <a onclick="edit_bank_bar(<?php echo $item['bank_id'];?>);" href="#edit-bank-accounts-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                        <a onclick="delete_bank_bar(<?php echo $item['bank_id'];?>);" href="#delete-bank-accounts-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>