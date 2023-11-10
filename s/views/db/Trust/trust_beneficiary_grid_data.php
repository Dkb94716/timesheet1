<style>
    .dt-width-on-trust_beneficiary-grid{
        width:100% !important;
    }
</style>
<table class="dynamicTable2 tableTools dt-width-on-trust_beneficiary-grid table table-striped overflow-x" id="trust_beneficiary_data_body">
    <thead>
        <tr style="background-color:#c72a25; color:#FFF;">
            <th class="thead-th-padg" width="160px">KYC documents on Beneficiaries</th>
            <th class="thead-th-padg" width="160px">KYC documents on Protector</th>
            <th class="thead-th-padg" width="160px" style="text-align:center;" id="th-beneficiaries-protector-action">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grid_data as $item) {
            $is_beneficiary = ($item['is_beneficiary']==1)?'Yes':'No';
            $is_protector = ($item['is_protector']==1)?'Yes':'No';
        ?>
        <tr class="gradeX">
            <td><span class="td-text-area"><?php echo $is_beneficiary;?></span></td>
            <td><span class="td-text-area"><?php echo $is_protector;?></span></td>
            <td style="width:160px;" class="">
                <a onclick="edit_trust_beneficiary_bar(<?php echo $item['beneficiary_id'];?>);" href="#edit-trusts_corporate-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                <a onclick="delete_trust_beneficiary_bar(<?php echo $item['beneficiary_id'];?>);" href="#delete-trusts_corporate-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>