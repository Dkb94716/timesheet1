<?php // echo "<pre>"; print_r($permit_data); die;?>
<table class="dynamicTable2 tableTools dt_width table table-striped overflow-x">
                                            <thead>
                                                <tr style="background-color:#c72a25; color:#FFF;">
                                                    <th class="thead-th-padg" width="263px">Type of permit</th>
                                                    <th class="thead-th-padg" width="263px">Name of permit holder</th>
                                                    <th class="thead-th-padg" width="263px">Date of issue</th>
                                                    <th class="thead-th-padg" width="263px">Date of expiry</th>
                                                    <th class="thead-th-padg" width="263px" style="text-align:center;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($permit_data as $item) {
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
                                                    <td><span class="td-text-area"><?php echo $item['permit_type_name']; ?></span></td>
                                                    <td><span class="td-text-area"><?php echo $item['name_of_permit_holder']; ?></span></td>
                                                    <td><span class="td-text-area"><?php echo $issue_date; ?></span></td>
                                                    <td><span class="td-text-area"><?php echo $expiry_date; ?></span></td>
                                                    <td style="width:200px !important; text-align:center;" class="">
                                                        <a href="#edit-permit-modal-box" data-toggle="modal" onclick="edit_permit_bar(<?php echo $item['permit_id'];?>);" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                                        <a href="#delete-permit-modal-box" data-toggle="modal" onclick="delete_permit_bar(<?php echo $item['permit_id'];?>)" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

<script>
    $(document).ready(function(){
//        setTimeout(function(){
                   // initTables();
//
//        },5000);
    });
</script>
