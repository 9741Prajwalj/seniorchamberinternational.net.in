<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<div id="page-head">
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow" style="display:table-cell"><?= translate('my_business')?></h1>
                    <div class="col-md-6" style="margin-left:280px;margin-top: -10px;">
                        <div id="tabs-container">
                            <ul class="tabs">
                                <li class="tab  dropdown" onclick="openTab('tab1')"><img src="<?= base_url()?>nav-icon-message.svg" alt="">
                                    <div class="dropdown-content">
                                        <a href="<?= base_url()?>admin/inbox" class="dropdown-item"><?= translate('inbox')?></a>
                                        <a href="<?= base_url()?>admin/sendMessage" class="dropdown-item"><?= translate('sent')?></a>
                                        <a href="<?= base_url()?>admin/composeMessage" class="dropdown-item"><?= translate('compose')?></a>
                                    </div>
                                </li>
                                <li class="tab tab2">
                                    <a href="<?= base_url()?>admin/add_connection"><img src="<?= base_url()?>nav-icon-search.svg" alt=""></a>
                                </li>
                                <li class="tab tab2" onclick="openTab('tab3')"><img src="<?= base_url()?>nav-icon-print.svg" alt=""></li>
                                <li class="tab tab2"><img src="<?= base_url()?>nav-icon-help.svg" alt=""></li>
                            </ul>
                        </div>
                    </div>
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->
		<!--Breadcrumb-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<ol class="breadcrumb">
			<li><a href="<?=base_url()?>admin"><?= translate('home')?></a></li>
			<li><a href="#"><?= translate('my_business')?></a></li>
			<li><a href="#"><?= translate('tracked')?></a></li>

		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->
	</div>
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content">
		<div class="panel">
			<?php if (!empty($success_alert)): ?>
				<div class="alert alert-success" id="success_alert" style="display: block">
	                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
	                <?=$success_alert?>
	            </div>
			<?php endif ?>
			<!--<?php if (!empty($danger_alert)): ?>-->
			<!--	<div class="alert alert-danger" id="danger_alert" style="display: block">-->
	  <!--              <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>-->

	  <!--              <?=$danger_alert?>-->
	  <!--               <?=validation_errors()?>-->
	  <!--          </div>-->
			<!--<?php endif ?>-->
	    	<?php if (!empty(validation_errors())): ?>
                <div class="widget" id="profile_error">
                    <div style="border-bottom: 1px solid #e6e6e6;">
                        <!--<div class="card-title" style="padding: 0.5rem 1.5rem; color: #fcfcfc; background-color: #de1b1b; border-top-right-radius:0.25rem; border-top-left-radius:0.25rem;">You <b>Must Provide</b> the Information(s) bellow</div>-->
                        <div class="card-body" style="padding: 0.5rem 1.5rem; background: rgba(222, 27, 27, 0.10);">
                            <style>
                                #profile_error p {
                                    color: #DE1B1B !important; margin: 0px !important; font-size: 12px !important;
                                }
                            </style>
                            <!--<?= validation_errors();?>-->
                        </div>
                    </div>
                </div>
            <?php
                endif;
            ?>

		    <div class="panel-heading">
                <div class="col-md-6" align="left" style="margin: 5px 0px 0px -10px;">		
			
		        <h3 class="panel-title"><?= translate('referral_tracking_sheet')?></h3>
				</div>
                <div class="col-md-6" align="right" style="margin: 14px 0px 0px -10px;">		
                        <button type="button" class="top-button" onclick="goBack()">Back</button>
				</div>
		        <div class="col-md-12" style="margin-top: -26px;">
                    <hr>
                </div>
		    </div>
		    <div class="panel-body">
	    		<div class="col-md-12 top-content" align="left">
                    <div class="top-content" style="color: #9F9F9F;">Select a date:</div>
                </div>
                <div class="col-md-12 top-border">
                    <!-- <form action="" method="post"> -->
                        <div class="col-md-12 container-box" align="center">
                            <label for="track_start_date"><?= translate('start_date')?></label>
                            <input type="date" name="track_start_date" id="track_start_date">
                        </div>
                        <div class="col-md-12" align="center">
                            <div class="col-md-12 container-box" align="center">
                                <label for="track_end_date"><?= translate('end_date')?></label>
                                <input type="date" name="track_end_date" id="track_end_date">
                            </div>
                        </div>
                        <div class="col-md-12" align="center">
                            <div class="container-box">
                                <label for="track_status"><?= translate('staus')?></label>
                                <select name="track_status" id="track_status">
                                    <option><?= translate('all')?></option>
                                    <option><?= translate('not_contacted_yet')?></option>
                                    <option><?= translate('contacted')?></option>
                                    <option><?= translate('got_the_business')?></option>
                                    <option><?= translate('not_response')?></option>
                                    <option><?= translate('not_a good_fit')?></option>
                                    <option><?= translate('confidential')?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" align="center">
                            <div class="button-box">
                                <button style=""><?= translate('go')?></button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
                <div class="col-md-12" style="margin-top: 10px;">
                <table id="stories_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>
							<?php echo translate('referral_name')?>
						</th>
						<th>
							<?php echo translate('email')?>
						</th>
						<th>
							<?php echo translate('phone')?>
						</th>
						<th>
							<?php echo translate('date')?>
						</th>
						<th>
							<?php echo translate('status')?>
						</th>
						<th>
							<?php echo translate('TYFCB')?>
						</th>
						<th>
							<?php echo translate('options')?>
						</th>
                        
						
						
					</tr>
					</thead>

					    <tbody>
                         
                        </tbody> 

				</table>
                </div>
		    </div>
		</div>
	</div>
</div>
<script>
	setTimeout(function() {
	    $('#success_alert').fadeOut('fast');
	    $('#danger_alert').fadeOut('fast');
	}, 5000); // <-- time in milliseconds
</script>
<script>
    $(document).ready(function () {
        $('#stories_table').DataTable();
    }); 
</script>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<style>
    :root{
        --blackColor:#000;
        --purpleColor:#4D2D6B;
        --whiteColor:#fff;
    }
     .tabs {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            border-radius:10px;
            
        }

        .tab {
            position: relative;
            flex: 1;
            text-align: center;
            padding: 0px;
            background-color: var(--purpleColor);
            cursor: pointer;
        }

        .tab:hover {
            background-color: var(--blackColor);
        }
        .tab2:hover{
            background-color: var(--purpleColor);
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: var(--purpleColor);
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            top: 100%;
            left: 0;
            width: 100%;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-item {
            padding: 12px 16px;
            display: block;
            text-align: left;
            text-decoration: none;
            color: var(--whiteColor);
        }

        .dropdown-item:hover {
            background-color: var(--blackColor);
            color:var(--whiteColor);
        }
</style>
<style>
    .panel hr {
    border-color: #D7D7D7;
    }
    hr {
    border: 0;
    border-top: 1px solid #eee;
    }
    .top-content{
        background-color: #ECECEC;
        padding: 5px;
        font-weight: bolder;
        font-size:13px;
        border-top-left-radius:10px;
        border-top-right-radius:10px;
    }
    .top-button{
        padding: 5px 20px;
        color: var(--purpleColor);
        background-color: #fff;
        border-radius:5px;
        border:1px solid ;
    }
    .top-button:hover{
        background-color: var(--purpleColor);
        color: #fff;
    }
    .top-border{
        border:1px solid;
        border-top:none;
    }
    .container-box{
        padding: 10px;
        border-bottom:1px solid
    }
    .container-box input
    {
        width:30%;
        border:1px solid ;
        padding: 5px 10px;
        border-radius:5px;
        margin-left: 10px;
        color: #000;
    }
    .container-box select{
        width:25%;
        border:1px solid ;
        padding: 5px 10px;
        border-radius:5px;
        margin-left: 15px;
        color: #000;
    }
    .button-box{
        padding: 10px;
    }
    .container-box label{
        color: #A6A5AA;
    }
    .button-box button{
        background-color: var(--purpleColor);
        color:#fff;
        padding:5px 20px;
        border-radius:5px;
        border:none
    }
</style>
