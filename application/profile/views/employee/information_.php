<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Information</legend>
	<p class="alert alert-info" style='margin-top:10px'><span class="required">*</span> Indicates fields are required </p>
	
	<form action="<?=base_url('xadmin/information/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form" enctype="multipart/form-data">
			
			
			
			
				
				<input type="hidden" id="information_id" name="information_id" value="<?=$result['information_id']?>" />
				
				<fieldset class="title-container">
				<legend class="labelx">Personal Details</legend>
				<div style="width:300px;float:left">
						<!------Next Line-----//-->
						 <div class="full-left line-height-zero span3">
						<label for="id_number">ID Number <span class="required">*</span></label><br />
						<input type="text" id="id_number" name="id_number" class="form-control" style="float:left" value="<?=$result['id_number']?>"><span class="validation-status pull-left"></span>
						</div>
						
						 <div class="full-left line-height-zero span3">
						<label for="contact_person_number">Company <span class="required">*</span></label><br />
						<?=htmlSelect($company,'company_id','company_id','company','selectpicker',$result['company_id'])?>
						</div>
						 <div class="full-left line-height-zero span3">
						<label for="contact_person_number">Employee Status <span class="required">*</span></label><br />
						<?=htmlSelect($employee_status,'employee_status_id','employee_status_id','employee_status','span3',$result['employee_status_id'])?>
							
						</div>
						
						<br style="clear:both" />
				</div>
				
			