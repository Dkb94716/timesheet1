<table class="dynamicTable1 tableTools table table-striped overflow-x">
                                <thead>
                                    <tr style="background-color:#c72a25; color:#FFF;">
                                        <th class="thead-th-padg" width="160px">Type of agreement </th>
                                        <th class="thead-th-padg" width="160px">Date signed</th>
                                        <th class="thead-th-padg" width="160px">Date of termination</th>
                                        <th class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($grid_data as $item) { 
                                        
                                        $signed_date = $item['signed_date'];
                                        if ($signed_date == "" || $signed_date == "0000-00-00 00:00:00")
                                        $signed_date = "";
                                        else
                                        $signed_date = date('d F Y', strtotime($item['signed_date']));

                                        $termination_date = $item['termination_date'];
                                        if ($termination_date == "" || $termination_date == "0000-00-00 00:00:00")
                                        $termination_date = "";
                                        else
                                        $termination_date = date('d F Y', strtotime($item['termination_date']));
            
                                    ?>
                                    <tr class="gradeX">
                                        <td><span class="td-text-area"><?php echo $item['agreement_type']; ?></span></td>
                                        <td><span class="td-text-area"><?php echo $signed_date; ?></span></td>
                                        <td><span class="td-text-area"><?php echo $termination_date; ?></span></td>
                                        <td style="width:100px !important; text-align:center;" class="">
                                            <a onclick="edit_agreement_bar(<?php echo $item['agreement_co_id'];?>);" href="#edit-agreements-and-contracts-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                            <a onclick="delete_agreement_bar(<?php echo $item['agreement_co_id'];?>);" href="#delete-agreements-and-contracts-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
