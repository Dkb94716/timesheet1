<?php
//echo "<pre />"; print_r($grid_data); echo "<pre />";
?>
<table class="dynamicTable1 tableTools table table-striped overflow-x">
    <thead>
        <tr style="background-color:#c72a25; color:#FFF;">
            <th class="thead-th-padg" width="160px">Checklist number</th>
            <th class="thead-th-padg" width="160px">Remark</th>
            <th class="thead-th-padg" width="160px" style="text-align:left;">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grid_data as $item) { 
        ?>
        <tr class="gradeX">
            <td><span class="td-text-area"><?php echo $item['check_list_no']; ?></span></td>
            <td><span class="td-text-area"><?php echo $item['remarks']; ?></span></td>
            <td style="width:100px !important; text-align:left;" class="">
                <a onclick="edit_compliance_bar(<?php echo $item['compliance_id'];?>);" href="#edit-compliance-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                <a onclick="delete_compliance_bar(<?php echo $item['compliance_id'];?>);" href="#delete-compliance-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>