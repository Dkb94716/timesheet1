<?php 
//echo "<pre>"; print_r($grid_data); die;
?>
<style>
    .dt-width-on-allotment-grid{
        width:100% !important;
    }
</style>
<table class="dynamicTable2 dt-width-on-allotment-grid tableTools  table table-striped overflow-x">
    <thead>
        <tr style="background-color:#c72a25; color:#FFF;">
            <th class="thead-th-padg" width="160px">Shareholder</th>
            <th class="thead-th-padg" width="160px">Address</th>
            <th class="thead-th-padg" width="160px">Date of allotment</th>
            <th class="thead-th-padg" width="160px">Type of shares</th>
            <th class="thead-th-padg" width="200px" style="text-align:center;" id="th-allot-action">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grid_data as $item) { 
        ?>
        <tr class="gradeX">
            <td><span class="td-text-area" style="white-space: normal!important;"><?php echo $item['shareholder']; ?></span></td>
            <td><span class="td-text-area"><?php echo $item['address']; ?></span></td>
            <td><span class="td-text-area"><?php $date_of_allotment = ($item['date_of_allotment']!="0000-00-00 00:00:00")?date('d F Y', strtotime($item['date_of_allotment'])):""; echo $date_of_allotment; ?></span></td>
            <td><span class="td-text-area"><?php echo $item['type_of_share']; ?></span></td>
            <td style="width:200px !important; text-align:center;" class="">
                <a onclick="edit_shareholder_allotment_bar(<?php echo $item['allotment_id'];?>);" href="#edit-share-holder-corporate-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                <a onclick="delete_shareholder_allotment_bar(<?php echo $item['allotment_id'];?>);" href="#delete-share-holder-corporate-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>



