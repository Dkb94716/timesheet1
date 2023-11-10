<table class="dynamicTable1 tableTools dt_width table table-striped overflow-x">
                    <thead>
                        <tr style="background-color:#c72a25; color:#FFF;">
                            <th class="thead-th-padg" width="160px">Shareholder</th>
                            <th class="thead-th-padg" width="160px">Address</th>
                            <th class="thead-th-padg" width="160px">Bank reference</th>
                            <th class="thead-th-padg" width="160px">Proof of address</th>
                            <th class="thead-th-padg" width="160px" style="text-align:center;" id="th-individual-action">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($grid_data as $item) { 
                            $share_holder_name = ($item['name_of_shareholder']!="")? $item['name_of_shareholder'].' '.$item['surname_of_shareholder'] : $item['name_of_corporate_shareholder'];
                            $shareholder_address = ($item['shareholder_address']!="")? $item['shareholder_address'] : $item['corporate_shareholder_address'];
                            $is_bank_ref = ($item['is_bank_ref']!="0")?($item['is_bank_ref']==1)?'Yes':'No':(($item['is_bank_ref_c']==1))?'Yes':'No';
                            $has_address_proof = ($item['has_address_proof']!="0")?($item['has_address_proof']==1)?'Yes':'No':(($item['has_address_proof_c']==1))?'Yes':'No'
                        ?>
                        <tr class="gradeX">
                            <td><span class="td-text-area" style="white-space: normal!important;"><?php echo $share_holder_name;?></span></td>
                            <td><span class="td-text-area"><?php echo $shareholder_address;?></span></td>
                            <td><span class="td-text-area"><?php echo $is_bank_ref;?></span></td>
                            <td><span class="td-text-area"><?php echo $has_address_proof;?></span></td>
                            <td style="width:100px !important; text-align:center;" class="">
                                <a onclick="edit_shareholder_ind_bar(<?php echo $item['shareholder_ind_id'];?>);" href="#edit-share-holder-individual-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                <a onclick="delete_shareholder_ind_bar(<?php echo $item['shareholder_ind_id'];?>);" href="#delete-share-holder-individual-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>


