<?php // echo "<pre />"; print_r($license_data); die; ?>


<table class="dynamicTable1 dt_width tableTools table table-striped overflow-x">
    <thead>
        <tr style="background-color:#c72a25; color:#FFF;">
            <th class="thead-th-padg" width="160px">Type of license</th>
            <th class="thead-th-padg" width="160px">Date of issue</th>
            <th class="thead-th-padg" width="160px">Date of expiry</th>
            <th class="thead-th-padg" width="160px">License number</th>
            <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
        </tr>
    </thead>
    <tbody >
        <?php foreach ($license_data as $item) {
            
            $issue_date = $item['issue_date'];
            if ($issue_date == "" || $issue_date == "0000-00-00 00:00:00")
                $issue_date = "";
            else
                $issue_date = date('d F Y', strtotime($item['issue_date']));

            $expiry_date = $item['expiry_date'];
            if ($expiry_date == "" || $expiry_date == "0000-00-00 00:00:00")
                $expiry_date = "";
            else
                $expiry_date = date('d F Y', strtotime($item['expiry_date']));
            ?>
            <tr class="gradeX">
                <td><span class="td-text-area"><?php echo $item['license_type_name']; ?></span></td>
                <td><span class="td-text-area"><?php echo $issue_date; ?></span></td>
                <td><span class="td-text-area"><?php echo $expiry_date; ?></span></td>
                <td><span class="td-text-area"><?php echo $item['license_no']; ?></span></td>
                <td style="width:100px !important; text-align:center;" class="">
                    <a href="#edit-license-modal-box" onclick="edit_license_bar(<?php echo $item['license_id'];?>);" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                    <a href="javascript:void(0)" data-toggle="modal" onclick="delete_license_bar(<?php echo $item['license_id'];?>)" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        //initTables();
    });
</script>



