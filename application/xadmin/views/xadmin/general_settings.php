<fieldset class="title-container">
<legend><i class="fa fa-user"></i> <?=ucwords($user['permission']['module'])?></legend>
<input type="hidden" id="department_id" value="<?=$user['permission']['department_id']?>"/>
<input type="hidden" id="data" />
<?=isset($success) ? showMessage($success) : null;?>
<div id="common-container">
	<div class="gs-left-panel pull-left">
		<ul class="nav nav-list">
			<!--
			<li><a href="<?=base_url()?>xadmin/general-settings/payroll" class="<?=$page=='payroll' ? 'gs-active' : null?>">Payroll Day</a></li>
			//-->
			<li><a href="<?=base_url()?>xadmin/general-settings/leave-request" class="<?=$page=='leave' ? 'gs-active' : null?>">Leave Request</a></li>
			<li><a href="<?=base_url()?>xadmin/general-settings/overtime-request" class="<?=$page=='overtime' ? 'gs-active' : null?>">Overtime Request</a></li>
		</ul>
	
	</div>
	
	<div class="gs-right-panel pull-left col-sm-7">
		<?php
			if($page=='leave'){
				?>
				<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="validate-form">
				<div class="alert alert-success" id="message_result" style="display:none">
					
				</div>
				<fieldset class="fieldset-group">
					<legend>Vacation Leave - <small> Should be filed 2 weeks prior</small></legend>
				</fieldset>
						 <fieldset class="fieldset-group">
							 <div class="form-group">
								  <label class="col-sm-3 control-label ckey"><span class="required">*</span> Number of days prior</label>
										<div class="col-sm-5">
										 <input type="text" id="days_prior" name="days_prior" class="form-control col-md-2 alphanumeric-n isChange" value="<?=$leave_days_prior['days_prior']?>" style="float:left;width:50px;margin-right:10px">
										<button type="button" name="save" class="btn btn-default btn-sm full-left" id="leave_save"> <i class="fa fa-save" style="color:#333"></i> Save</button>
										</div>
								</div>
						</fieldset>
				<fieldset class="fieldset-group">
					<legend>Sick Leave - <small> Just present medical certificate</small></legend>
				</fieldset>
				<fieldset class="fieldset-group">
					<legend>Emergency Leave - <small> Just submit requirements to HR department</small></legend>
				</fieldset>
					</form>
				<?php
			}else if($page=="overtime"){
				?>
				<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="validate-form">
				<div class="alert alert-success" id="message_result" style="display:none">
					
				</div>
				<fieldset class="fieldset-group">
					<legend>Overtime Request - <small> is under approval by the supervisor</small></legend>
				</fieldset>
					
					</form>
				<?php
			}
		
		?>
	
	</div>
	<br class="clear clr" />
</div>
</fieldset>
<style type="text/css">
	.gs-left-panel{
		width: 200px;
		padding: 10px 0px;background-color:#f8f8f8;border-right:1px solid #e7e7e7;
	}
	.gs-left-panel .nav
	{
	}
	
	.gs-left-panel .nav li a
	{
		padding:3px 10px;font-size:12px;color:#333
	}
	
	.gs-left-panel .nav li a.gs-active,.gs-left-panel .nav li a:hover
	{
		border-right:3px solid #6f5499
	}
</style>
<script type="text/javascript">
	$('#leave_save').click(function(){
		var leave_prior = $('#days_prior').val();
			if(leave_prior < 14 || leave_prior == ""){
				alert("Leave prior should 2 weeks or more prior.");
			}else{
				$.post('<?=base_url()?>xadmin/general-settings/leave-request',{days_prior:leave_prior},function(data){
					if(data > 0){
						$('#message_result').fadeIn().html("Leave prior was successfully changed.");
					}
				});
			}
	});
</script>