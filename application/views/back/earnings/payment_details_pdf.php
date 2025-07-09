<?php
// This view renders the payment details for PDF generation
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Payment Details</h2>
    <?php if(in_array($details->payment_type,['custom_payment_method_1','custom_payment_method_2','custom_payment_method_3','custom_payment_method_4'])): ?>
        <table>
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
                                <?=translate('bill_copy_available')?>
                        <?php } else { ?>
                            <?=translate('no_bill_copy')?>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php else: 
        $a = $details->payment_details; 
        $b = json_decode($a);
        $c = $b->payments;
        foreach($c as $d){};
    ?>
        <table>
            <tbody>
                <tr>
                    <th><?php echo translate('payment_id')?></th>
                    <td><?php echo $d->payment_id; ?></td>
                </tr>
                <tr>
                    <th><?php echo translate('members_name')?></th>
                    <td><?php echo $d->members_name; ?></td>
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
    <?php endif; ?>
</body>
</html>
