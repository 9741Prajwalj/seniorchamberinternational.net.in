<?php
// This view renders the payment details for PDF generation
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</title>
    <style>
        body {
            font-family: Arial, sans-serif !important;
            font-size: 12px !important;
            margin: 20px !important;
            color: #000 !important;
            /* Remove width 100% to prevent overflow */
            /* width: 100% !important; */
            overflow: visible !important;
            page-break-inside: avoid !important;
            /* Add relative positioning for footer */
            position: relative !important;
            min-height: 100vh !important;
        }
        .invoice-header, .bill-to, .comments, .summary {
            /* Remove width 100% to allow natural width */
            /* width: 100% !important; */
            margin-bottom: 15px !important;
            /* Remove float and clear for flexbox */
            float: none !important;
            clear: none !important;
            page-break-inside: avoid !important;
        }
        /* Remove flexbox and float styles for invoice-header, company-info, invoice-info */
        .company-info {
            font-size: 14px !important;
            font-weight: bold !important;
            float: none !important;
            width: auto !important;
        }
        .company-info div {
            font-weight: normal !important;
            font-size: 11px !important;
            margin-top: 2px !important;
        }
        .invoice-title {
            font-size: 24px !important;
            font-weight: bold !important;
            color: #5b7db1 !important;
            text-align: right !important;
            margin-bottom: 10px !important;
        }
        .invoice-info {
            float: none !important;
            width: auto !important;
            margin-top: 0 !important;
            margin-bottom: 20px !important;
        }
        .invoice-info-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
        .invoice-info-table td {
            padding: 3px 5px !important;
            font-size: 11px !important;
            border: 1px solid #ccc !important;
        }
        .invoice-info-table td.label {
            font-weight: bold !important;
            text-align: right !important;
            background-color: #dbe4f0 !important;
            width: 50% !important;
        }
        .invoice-info-table td.value {
            text-align: center !important;
            width: 50% !important;
        }
        .bill-to table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-bottom: 15px !important;
        }
        .bill-to table td {
            font-size: 11px !important;
            padding: 3px 5px !important;
        }
        .bill-to-header {
            background-color: #2f4f8a !important;
            color: #fff !important;
            font-weight: bold !important;
            font-size: 12px !important;
            padding: 5px 8px !important;
        }
        .description-table {
            border: 1px solid #000 !important;
            margin-top: 10px !important;
            width: 100% !important;
            border-collapse: collapse !important;
            page-break-inside: avoid !important;
        }
        .description-table th, .description-table td {
            border: 1px solid #000 !important;
            padding: 5px 8px !important;
            font-size: 11px !important;
            /* Center vertically and horizontally */
            vertical-align: middle !important;
            text-align: center !important;
        }
        .description-table th {
            background-color: #2f4f8a !important;
            color: #fff !important;
            text-align: center !important;
        }
        .description-table td.taxed {
            text-align: center !important;
            width: 50px !important;
        }
        .description-table td.amount {
            text-align: right !important;
            width: 80px !important;
        }
        .comments {
            border: 1px solid #2f4f8a !important;
            padding: 8px !important;
            font-size: 11px !important;
            background-color: #f0f4fb !important;
            margin-top: 15px !important;
            page-break-inside: avoid !important;
        }
        .comments-header {
            background-color: #2f4f8a !important;
            color: #fff !important;
            font-weight: bold !important;
            padding: 5px 8px !important;
            font-size: 12px !important;
            margin-bottom: 5px !important;
        }
        .summary {
            width: 40% !important;
            font-size: 11px !important;
            border-collapse: collapse !important;
            margin-top: 15px !important;
            margin-left: auto !important;
            margin-right: 0 !important;
            float: none !important;
            page-break-inside: avoid !important;
        }
        .summary table {
            width: 100% !important;
            border-collapse: collapse !important;
        }
        .summary table td {
            padding: 3px 5px !important;
            border: 1px solid #ccc !important;
        }
        .summary table td.label {
            text-align: right !important;
            width: 60% !important;
            background-color: #f9f9f9 !important;
        }
        .summary table td.value {
            text-align: right !important;
            width: 40% !important;
            background-color: #f9f9f9 !important;
        }
        .summary table tr.total-row td {
            font-weight: bold !important;
            font-size: 14px !important;
            border-top: 2px solid #000 !important;
            background-color: #e1e7f0 !important;
        }
        .footer {
            clear: both !important;
            text-align: center !important;
            font-size: 10px !important;
            margin-top: 50px !important;
            font-style: italic !important;
            page-break-inside: avoid !important;
            /* Fix footer at bottom */
            position: absolute !important;
            bottom: 0 !important;
            width: 100% !important;
        }
        .footer strong {
            font-style: normal !important;
            font-weight: bold !important;
        }
        .clearfix::after {
            content: "" !important;
            clear: both !important;
            display: table !important;
        }
        .page-break {
            page-break-before: always !important;
        }
        @media print {
            body {
                margin: 0 !important;
                padding: 0 !important;
            }
            .invoice-header, .bill-to, .comments, .summary, .footer {
                page-break-inside: avoid !important;
            }
            .description-table {
                page-break-inside: avoid !important;
            }
        }
    </style>
</head>
<body>
    <table class="invoice-header" style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
        <tr>
            <td style="width: 50%; vertical-align: top; font-size: 14px; font-weight: bold;">
                Company Name<br>
                <div style="font-weight: normal; font-size: 11px; margin-top: 2px;">
                    [Street Address]<br>
                    [City, ST ZIP]<br>
                    Phone: [000-000-0000]<br>
                    Fax: [000-000-0000]<br>
                    Website: somedomain.com
                </div>
            </td>
            <td style="width: 45%; vertical-align: top; text-align: right; font-size: 12px;">
                <div style="font-size: 24px; font-weight: bold; color: #5b7db1; margin-bottom: 10px;">INVOICE</div>
                <table class="invoice-info-table" style="width: 100%; border-collapse: collapse; margin-top: 0; margin-bottom: 0;">
                    <tr>
                        <td class="label" style="font-weight: bold; text-align: right; background-color: #dbe4f0; width: 50%; border: 1px solid #ccc; padding: 3px 5px; font-size: 11px;">DATE</td>
                        <td class="value" style="text-align: center; width: 50%; border: 1px solid #ccc; padding: 3px 5px; font-size: 11px;">12/9/2019</td>
                    </tr>
                    <tr>
                        <td class="label" style="font-weight: bold; text-align: right; background-color: #dbe4f0; width: 50%; border: 1px solid #ccc; padding: 3px 5px; font-size: 11px;">INVOICE #</td>
                        <td class="value" style="text-align: center; width: 50%; border: 1px solid #ccc; padding: 3px 5px; font-size: 11px;">[123456]</td>
                    </tr>
                    <tr>
                        <td class="label" style="font-weight: bold; text-align: right; background-color: #dbe4f0; width: 50%; border: 1px solid #ccc; padding: 3px 5px; font-size: 11px;">CUSTOMER ID</td>
                        <td class="value" style="text-align: center; width: 50%; border: 1px solid #ccc; padding: 3px 5px; font-size: 11px;">[123]</td>
                    </tr>
                    <tr>
                        <td class="label" style="font-weight: bold; text-align: right; background-color: #dbe4f0; width: 50%; border: 1px solid #ccc; padding: 3px 5px; font-size: 11px;">DUE DATE</td>
                        <td class="value" style="text-align: center; width: 50%; border: 1px solid #ccc; padding: 3px 5px; font-size: 11px;">1/8/2020</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div class="bill-to">
        <table>
            <tr>
                <td class="bill-to-header">BILL TO</td>
            </tr>
            <tr>
                <td>[Name]</td>
            </tr>
            <tr>
                <td>[Company Name]</td>
            </tr>
            <tr>
                <td>[Street Address]</td>
            </tr>
            <tr>
                <td>[City, ST ZIP]</td>
            </tr>
            <tr>
                <td>[Phone]</td>
            </tr>
        </table>
    </div>
    <?php 
    // Extract description from existing payment details JSON
    $description = '';
    if(isset($details) && in_array($details->payment_type, ['custom_payment_method_1', 'custom_payment_method_2', 'custom_payment_method_3', 'custom_payment_method_4'])) {
        $description = $details->custom_payment_method_comment ?? '';
    } else {
        $a = isset($details->payment_details) ? $details->payment_details : '';
        $b = json_decode($a);
        $c = isset($b->payments) ? $b->payments : [];
        $descArr = [];
        foreach($c as $d){
            if(isset($d->description)) {
                $descArr[] = $d->description;
            }
        }
        $description = implode(", ", $descArr);
    }
    ?>
    <table class="description-table">
        <thead>
            <tr>
                <th>DESCRIPTION</th>
                <th style="width: 60px; text-align:center;">TAXED</th>
                <th style="width: 80px; text-align:right;">AMOUNT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($description) ?: '[Service Fee]'; ?></td>
                <td class="taxed"></td>
                <td class="amount">230.00</td>
            </tr>
            <tr>
                <td>[Labor: 5 hours at $75/hr]</td>
                <td class="taxed" style="text-align:center;">X</td>
                <td class="amount">375.00</td>
            </tr>
            <tr>
                <td>[Parts]</td>
                <td class="taxed"></td>
                <td class="amount">345.00</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="taxed"></td>
                <td class="amount"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="taxed"></td>
                <td class="amount"></td>
            </tr>
        </tbody>
    </table>
    <div class="comments">
        <div class="comments-header">OTHER COMMENTS</div>
        <ol>
            <li>Total payment due in 30 days</li>
            <li>Please include the invoice number on your check</li>
        </ol>
    </div>
    <div class="summary">
        <table>
            <tr>
                <td class="label">Subtotal</td>
                <td class="value">950.00</td>
            </tr>
            <tr>
                <td class="label">Taxable</td>
                <td class="value">345.00</td>
            </tr>
            <tr>
                <td class="label">Tax rate</td>
                <td class="value">6.250%</td>
            </tr>
            <tr>
                <td class="label">Tax due</td>
                <td class="value">21.56</td>
            </tr>
            <tr>
                <td class="label">Other</td>
                <td class="value">-</td>
            </tr>
            <tr class="total-row">
                <td class="label">TOTAL</td>
                <td class="value">₹971.56</td>
            </tr>
        </table>
    </div>
    <div class="footer">
        Make all checks payable to <strong>[Your Company Name]</strong><br><br>
        If you have any questions about this invoice, please contact<br>
        [Name, Phone #, E-mail]<br><br>
        <em>Thank You For Your Business!</em>
    </div>
</body>
</html>
