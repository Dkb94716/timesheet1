<style>
    .td-text-area1{
        width:100px !important;
    }
    
</style>
<table class="dynamicTable1 tableTools dt_width table table-striped overflow-x" style="min-width:500px !important;">
                    <thead>
                        <tr id="heading" style="background-color:#c72a25; color:#FFF;">
                            <th id="firstTh" class="thead-th-padg">Name of beneficial owner</th>
                            <th class="thead-th-padg" >CV</th>
                            <th class="thead-th-padg" >Passport</th>
                            <th class="thead-th-padg" >Date of expiry</th>
                            <th class="thead-th-padg" >Proof of address</th>
                            <th class="thead-th-padg"  style="text-align:center;" id="lastTh">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($grid_data as $item) { 
                        ?>
                        <tr class="gradeX">
                            <td ><span class="td-text-area" style="width:100px;"><?php echo $item['owner_name'] .' '. $item['owner_surname'];?></span></td>
                            <td><span class="td-text-area" style="width:100px;"><?php if($item['has_cv']=="1")
                                                                    echo "Yes";
                                                                 else
                                                                     echo "No";
                                                            ?>
                                </span></td>
                            <td><span class="td-text-area" style="width:100px;"><?php if($item['has_passport']=="1")
                                                                    echo "Yes";
                                                                 else
                                                                     echo "No";
                                                            ?></span></td>
                            <td><span class="td-text-area" style="width:100px;"><?php 
                            if($item['date_of_expiry']=="0000-00-00 00:00:00"||$item['date_of_expiry']=="")
                                echo "";
                            else
                                echo date('d F Y', strtotime($item['date_of_expiry'])); 
                            
                            ?></span></td>
                            <td><span class="td-text-area" style="width:100px;"><?php if($item['has_address_proof']=="1")
                                                                    echo "Yes";
                                                                 else
                                                                     echo "No";
                                                            ?></span></td>
                            <td style="width:100px !important; text-align:center;" class="">
                                <a onclick="edit_beneficial_ind_bar(<?php echo $item['beneficial_ind_id'];?>);" href="#edit-beneficial-owner-individual-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                <a onclick="delete_beneficial_ind_bar(<?php echo $item['beneficial_ind_id'];?>);" href="#delete-beneficial-owner-individual-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

<script>
$(document).ready(function(){
    setTimeout(function(){
        $('#firstTh').width('245px');
        $('#lastTh').width('232px');
        
    },100);
})
</script>