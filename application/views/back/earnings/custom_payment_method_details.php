<?php
    $details = $this->db->get_where('package_payment', array('package_payment_id' => $payment_id))->row();
    if(in_array($details->payment_type,['custom_payment_method_1','custom_payment_method_2','custom_payment_method_3','custom_payment_method_4'])){ ?>
        <div class="modal-body"  style="word-wrap: break-word">
            <table class="table table-condensed table-bordered">
                <tbody>
                    <tr>
                        <th><?php echo translate('payment_method')?></th>
                        <td><?php echo $details->custom_payment_method_name; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo translate('transaction_id')?></th>
                        <td><?php echo $details->custom_payment_method_transaction_id; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo translate('Comment')?></th>
                        <td><?php echo $details->custom_payment_method_comment; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo translate('bill_copy')?></th>
                        <td>
                            <?php
                                if ($details->custom_payment_method_bill_copy != null && file_exists('uploads/custom_payment_method_bill_image/'.$details->custom_payment_method_bill_copy)){ ?>
                                    <a href="<?=base_url()?>admin/earnings/download_cpm_bill_copy/<?=$payment_id?>" ><?=translate('download')?></a>
                            <?php }?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--Modal footer-->
        <div class="modal-footer">
            <?php if($details->payment_status == 'due') { ?>
                <button data-target='#accept_payment_modal' data-toggle='modal' onclick="accept_payment(<?=$payment_id?>)" class="btn btn-info add-tooltip"><?=translate('accept_payment')?></button>
            <?php } else {?>
                <button class="btn btn-success add-tooltip"><?=translate('payment_already_accepted')?></button>
            <?php } ?>
            <a href="<?=base_url()?>admin/earnings/download_payment_pdf/<?=$payment_id?>" class="btn btn-primary btn-sm"><?=translate('download_pdf')?></a>
            <button data-dismiss="modal" class="btn btn-danger btn-sm" type="button" id="cp_metho_modal_close"><?php echo translate('close')?></button>
        </div>
        <script>
            function accept_payment(payment_id){
                $('#earnings_modal').modal('hide');
                $("#package_payment_id").val(payment_id);
            }
        </script>
    <?php }

    else { ?>
        <div class="modal-body"  style="word-wrap: break-word">
            <p><?php  $a =$details->payment_details; 
                      $b = json_decode($a);
                        $c = $b->payments;
                        foreach($c as $d){
                           
                        };
                       
            ?></p>
            <table class="table table-condensed table-bordered">
                <tbody>
                    
                    <tr>
                        <th><?php echo translate('payment_id')?></th>
                        <td><?php echo $d->payment_id; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo translate('buyer_name')?></th>
                        <td><?php echo $d->buyer_name; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo translate('phone')?></th>
                        <td><?php echo $d->buyer_phone; ?></td>
                    </tr>
                    <tr>
                     <th><?php echo translate('email')?></th>
                     <td><?php echo $d->buyer_email;?></td>
                    </tr>
                    <tr>
                        <th><?php echo translate('amount')?></th>
                        <td><?php echo $d->amount; ?></td>
                    </tr>
                    <tr>
                     <th><?php echo translate('payment_type')?></th>
                     <td><?php echo $d->status;?></td>
                    </tr>
                    <tr>
                     <th><?php echo translate('currency')?></th>
                     <td><?php echo $d->currency;?></td>
                    </tr>
                    
                </tbody>
            </table>

        </div>
        <!--Modal footer-->
        <div class="modal-footer">
            <a href="<?=base_url()?>admin/earnings/download_payment_pdf/<?=$payment_id?>" class="btn btn-primary btn-sm"><?=translate('download_pdf')?></a>
            <button data-dismiss="modal" class="btn btn-danger btn-sm" type="button" id="cp_metho_modal_close"><?php echo translate('close')?></button>
        </div>
    <?php }?>
