<?php 

$date = date('Y-m-d');

?>

<table class="dynamicTable1 tableTools table table-striped overflow-x">
    <thead>
        <tr style="background-color:#c72a25; color:#FFF;">
            <th class="thead-th-padg" width="120px">Name of director</th>
            <th class="thead-th-padg" width="120px">Passport</th>
            <th class="thead-th-padg" width="120px">Date of expiry</th>
            <th class="thead-th-padg" width="120px">CV</th>
            <th class="thead-th-padg" width="120px">Bank Reference</th>
            <th class="thead-th-padg" width="120px" style="text-align:center;">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grid_data as $item) { 
        ?>
        <tr class="gradeX">
            <td><span class="td-text-area" style="width:130px;"><?php echo $item['director_name'].' '.$item['director_surname'];?></span></td>
            <td><span class="td-text-area" style="width:130px;"><?php
                                                                    if($item['has_passport']==1)
                                                                        echo "Yes";
                                                                    else
                                                                        echo "No";
                                                                ?></span></td>
            <td><span class="td-text-area" style="width:130px;"><?php
                if($item['date_of_expiry']=="0000-00-00 00:00:00"||$item['date_of_expiry']=="")
                    echo "";
                else
                    echo date('d F Y', strtotime($item['date_of_expiry'])); 
            ?></span></td>
            <td><span class="td-text-area" style="width:130px;"><?php
                                                                    if($item['has_cv']==1)
                                                                        echo "Yes";
                                                                    else
                                                                        echo "No";
                                                                ?>
            </span></td>
            <td><span class="td-text-area" style="width:130px;"><?php
                                                                    if($item['has_bank_ref']==1)
                                                                        echo "Yes";
                                                                    else
                                                                        echo "No";
                                                                ?></span></td>
            <td style="width:100px !important; text-align:center;" class="">
                <a onclick="edit_director_ind_bar(<?php echo $item['id'];?>);" href="#edit-individual-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>