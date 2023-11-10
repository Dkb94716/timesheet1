<table class="dynamicTable1 tableTools dt_width table table-striped overflow-x">
    <thead>
        <tr style="background-color:#c72a25; color:#FFF;">
            <th class="thead-th-padg" width="160px">Name of trust</th>
            <th class="thead-th-padg" width="200px">Are there trustees other than anex?</th>
            <th class="thead-th-padg" width="200px">Trust deed available</th>
            <th class="thead-th-padg" width="200px">Declaration of non-residence available</th>
            <th class="thead-th-padg" width="150px" style="text-align:center;" id="th-trusinfo-action">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grid_data as $item) {
            $is_other_than_anex = ($item['is_other_than_anex']==1)?'Yes':'No';
            $is_trust_deed = ($item['is_trust_deed']==1)?'Yes':'No';
            $is_non_residence = ($item['is_non_residence'])?'Yes':'No';
        ?>
        <tr class="gradeX">
            <td><span class="td-text-area"><?php echo $item['name_of_trust'];?></span></td>
            <td><span class="td-text-area"><?php echo $is_other_than_anex;?></span></td>
            <td><span class="td-text-area"><?php echo $is_trust_deed;?></span></td>
            <td><span class="td-text-area"><?php echo $is_non_residence;?></span></td>
            <td style="width:100px !important; text-align:center;" class="">
                <a onclick="edit_trust_trustinfo_bar(<?php echo $item['trustinfo_id'];?>);" href="#edit-trusts_individual-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                <a onclick="delete_trust_trustinfo_bar(<?php echo $item['trustinfo_id'];?>);" href="#delete-trusts_individual-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
