<table class="dynamicTable3 tableTools dt_width table table-striped overflow-x">
                    <thead>
                        <tr style="background-color:#c72a25; color:#FFF;">
                            <th id="th1" class="thead-th-padg" width="160px">Shareholder</th>
                            <th id="th2" class="thead-th-padg" width="160px">Type of share</th>
                            <th id="th3" class="thead-th-padg" width="160px">No. of shares</th>
                            <th id="th4" class="thead-th-padg" width="160px">Date</th>
                            <th id="th_red" class="thead-th-padg" width="160px" style="text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($grid_data as $item) { 
                            $share_holder_name =$item['shareholder_name'];
                            $type_of_share = $item['type_of_share'];
                            $no_of_share = $item['no_of_shares'];
                            $date_of_redemption = ($item['date_of_redemption'] != "0000-00-00 00:00:00") ? date('d F Y', strtotime($item['date_of_redemption'])) : "";
                        ?>
                        <tr class="gradeX">
                            <td><span class="td-text-area" style="white-space: normal!important;"><?php echo $share_holder_name;?></span></td>
                            <td><span class="td-text-area"><?php echo $type_of_share;?></span></td>
                            <td><span class="td-text-area"><?php echo $no_of_share;?></span></td>
                            <td><span class="td-text-area"><?php echo $date_of_redemption;?></span></td>
                            <td style="width:188px !important; text-align:center;" class="">
                                <a onclick="edit_shareholder_redemption_buyback_bar(<?php echo $item['redemption_id'];?>);" href="#edit-share-holder-redemption-share-modal-box" data-toggle="modal" class="btn-xs btn-warning" style="margin-left:5px;">Edit</a>
                                <a onclick="delete_shareholder_redemption_share_bar(<?php echo $item['redemption_id'];?>);" href="#delete-add-share-holder-redemption-buyback-modal-box" data-toggle="modal" class="btn-xs btn-danger" style="margin-left:5px;">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>


