    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body {
                font-family: sans-serif;
                font-size: 12px;
                margin: 0;
                border: 3px solid #10A182; 
                box-sizing: border-box;
            }

            .page-break {
                page-break-after: always;
            }

            .title-page {
                text-align: center;
                margin-top: 200px;
                padding: 15mm;
            }

            .title-page .report-title {
                margin-top: 60px;    
            }

            .report-logo {
                max-width: 650px; /* increased from 150px */
                height: auto;
                margin-bottom: 10px;
            }


            .company-logo {
                max-width: 150px;
                margin-bottom: 40px;
            }

            .report-heading { 
                margin-top: 20px;
                padding-top: 10px;
                text-align: center;
                margin-bottom: 15px;
                color: #10A182;
                font-size: 24px;
                padding: 0 15mm;
            }

            .report-dates {
                text-align: center;
                margin-top: 15px;
                font-size: 14px;
                padding: 0 15mm;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin: 0 15px 15px 15px;
                /* table-layout: fixed; */
                word-wrap: break-word;
                word-break: break-word;
            }

            th, td {
                border: 1px solid #333;
                text-align: left;
                vertical-align: top;
            }

            th {
                background-color: #10A182;
                color: white;
            }

            .col-slno {
                width: 20px !important; /* Strict width enforcement */
                min-width: 20px; /* Prevent collapsing below 10px */
                max-width: 20px; /* Prevent expanding beyond 10px */
                padding: 0 2px !important; /* Minimal padding to reduce space */
                text-align: center; /* Center the content for better appearance */
            }
            .col-date {
                width: 30px !important;
                min-width: 30px;
                max-width: 30px;
                padding: 8px !important;
                text-align: left;
            }

            /* .col-president, .col-area, .col-legion {
                width: 100px !important;
                min-width: 100px;
                max-width: 100px;
                padding: 8px !important;
                text-align: left;
            } */
             .col-program, .col-program-area {
                width: 70px !important;
                min-width: 70px;
                max-width: 70px;
                padding: 8px !important;
                text-align: left;
            }

            .col-details {
                width: 100px !important;
                min-width: 100px;
                max-width: 100px;
                padding: 8px !important;
                text-align: left;
            }

            .detail-table {
                /* margin: 20px 15mm; */
                border: 2px solid #10A182;
                width: 100% !important;
                table-layout: fixed !important;
                word-wrap: break-word !important;
                word-break: break-word !important;
            }

            .detail-table th, .detail-table td {
                border: 1px solid #10A182;
                padding: 8px;
                vertical-align: top !important;
                box-sizing: border-box !important;
            }

            .detail-table th {
                background-color: #10A182;
                color: white;
            }

            .image-row td {
                text-align: center;
                border: none;
                padding-top: 10px;
            }

            .image-row img {
                max-width: 300px !important;
                max-height: 200px !important;
                margin: 0 0px !important;
                border: 1px solid #ccc !important;
            }

            .wrap-text {
                white-space: normal;
            }
            .report-company{
                font-size: 40px; 
            }
            .legion-info {
               
                /* margin-bottom: 20px; */
                padding-top:140px;

            }
            .legion-info1{
                padding-top:180px;
            }
            .legion-info2{
                padding-top:220px;
            }
            /* First main title */

        </style>
    </head>
    <body>

   <div class="title-page">
    <img src="file://<?= FCPATH . 'uploads/logo1.jpg' ?>" class="report-logo" alt="Company Logo" />
    <h1 class="report-title"><?= htmlspecialchars($title) ?></h1>
    <h1 class="report-company"><?= htmlspecialchars($company) ?></h1>

    <h1 class="legion-info">Name: <?= htmlspecialchars($member_name ?? 'N/A') ?></h1>
    <h1 class="legion-info1">Legion: <?= htmlspecialchars($legion_name ?? 'N/A') ?></h1>
    <h1 class="legion-info2">Area: <?= htmlspecialchars($area_name ?? 'N/A') ?></h1>
</div>




    <div class="page-break"></div>

    <!-- Page 2: Summary Table -->
    <div>
        <h2 class="report-heading">Report List</h2>

        <table>
        <thead>
            <tr>
                <th class="col-slno">Sl. No</th>
                <th class="col-date">Date</th>
                <!-- <th class="col-president">President</th>
                <th class="col-area">Area</th>
                <th class="col-legion">Legion</th> -->
                <th class="col-program">Program</th>
                <th class="col-program-area">Program Area</th>
                <th class="col-details">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($report_data)): ?>
                <?php foreach ($report_data as $i => $row): ?>
 
    <tr>
        <td class="col-slno" ><?= $i + 1 ?></td>
        <td class="col-date"><?= htmlspecialchars($row->date) ?></td>
        <!-- <td class="col-president"><?= htmlspecialchars($row->member_name) ?></td>
        <td class="col-area"><?= htmlspecialchars($row->area_name) ?></td>
        <td class="col-legion"><?= htmlspecialchars($row->legion_name) ?></td> -->
        <td class="col-program"><?= htmlspecialchars($row->title) ?></td>
        <td class="col-program-area"><?= htmlspecialchars($row->program_area) ?></td>
        <td class="col-details"><?= htmlspecialchars($row->description) ?></td>
    </tr>
<?php endforeach; ?>

            <?php else: ?>
                <tr><td colspan="8">No data available</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    
    </div>

    <div class="page-break"></div>

    <!-- Detailed Pages -->
<?php foreach ($report_data as $i => $report): ?>
    <table class="detail-table">
        <tr>
            <th colspan="2">Sl. No: <?= $i + 1 ?> — Project Name: <?= htmlspecialchars($report->title) ?></th>
        </tr>
        <tr>
            <td><strong>Area Name:</strong> <?= htmlspecialchars($report->area_name) ?></td>
            <td><strong>Legion Name:</strong> <?= htmlspecialchars($report->legion_name) ?></td>
        </tr>
        <tr>
            <td colspan="2"><strong>President Name:</strong> <?= htmlspecialchars($report->member_name ?? 'N/A') ?></td>
        </tr>
        <tr>
            <td colspan="2"><strong>President Area:</strong> <?= htmlspecialchars($report->program_area ?? 'N/A') ?></td>
        </tr>
        <tr>
            <td colspan="2" class="wrap-text"><strong>Description:</strong> <?= htmlspecialchars($report->description) ?></td>
        </tr>
        <tr class="image-row">
            <td style="text-align: center; vertical-align: top;">
                <table width="100%">
                    <tr>
                        <td style="font-weight: bold; font-size: 14px; padding: 4px;">Active Image</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?= 'uploads/happy_story_image/' . $report->activity_photo ?>" alt="Active Image" style="max-width: 100%; height: auto; max-height: 200px;">
                        </td>
                    </tr>
                </table>
            </td>
            <td style="text-align: center; vertical-align: top;">
                <table width="100%">
                    <tr>
                        <td style="font-weight: bold; font-size: 14px; padding: 4px;">Press Coverage Image</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?= 'uploads/happy_story_image/' . ($report->press_coverage ?? 'user1.jpeg') ?>" alt="Press Image" style="max-width: 100%; height: auto; max-height: 200px;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>

    <?php if ((($i + 1) % 2 === 0) && ($i + 1 < count($report_data))) : ?>
        <div class="page-break"></div>
    <?php endif; ?>
<?php endforeach; ?>



    </body>
    </html>
