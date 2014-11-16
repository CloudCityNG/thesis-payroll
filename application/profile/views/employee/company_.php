<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Company</legend>
<?php
echo (isset($success) ? $success :null);
?>
	<p class="alert alert-info" style='margin-top:10px'><span class="required">*</span> Indicates fields are required</p>
	<form action="<?=base_url('xadmin/'.$data['permission']['url']."/".strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form" enctype="multipart/form-data">
		<input type="hidden" id="company_id" name="company_id" value="<?=$result['company_id']?>" />
					<div class="control-group">
						<label class="control-label" for="company">Upload Company logo <span class="required">*</span></label>
						<div class="controls">
								<div class="full-left line-height-zero ">
								<?php
									$image = ($result['logo']=="no-logo.png" || !isset($result['logo'])) ? 'assets/images/no-logo.png' : 'uploads/'.$result['logo'];
									$class = ($result['logo']=="no-logo.png" || !isset($result['logo'])) ? '' : 'img-polaroid';
								?>
								<img src="<?=base_url().$image?>" class="<?=$class?>" style="width: 100px;float:left;margin-right:10px"/>
								<label for="logo"><i>File format: .jpg, .png</i></label><br />
								<label for="logo"><i>File size: 200px X 200px</i></label><br />
								<input type="file" id="logo" name="logo" class="span3" style="float:left"><span class="validation-status pull-left"></span>
								<br style="clear:both" />
								</div>
						 
						 </div>
					  </div>

				
					 <div class="control-group">
						<label class="control-label" for="company">Company Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="company" name="company" class="span5 alphanumeric" style="float:left" value="<?=$result['company']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					   <div class="control-group">
						<label class="control-label" for="company_address">Company Address <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="company_address" name="company_address" class="span5 alphanumeric" style="float:left" value="<?=$result['company_address']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					    <div class="control-group">
						<label class="control-label" for="company_contactnumber">Company Contact Number <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="company_contactnumber" name="company_contactnumber" class="span5 alphanumeric" style="float:left" value="<?=$result['company_contactnumber']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					    <div class="control-group">
						<label class="control-label" for="company_email">Company Email <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="company_email" name="company_email" class="span5 alphanumeric" style="float:left" value="<?=$result['company_email']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					     <div class="control-group">
						<label class="control-label" for="company_sss">SSS # <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="company_sss" name="company_sss" class="span3 alphanumeric" style="float:left" value="<?=$result['company_sss']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					     <div class="control-group">
						<label class="control-label" for="company_philhealth">Philhealth <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="company_philhealth" name="company_philhealth" class="span3 alphanumeric" style="float:left" value="<?=$result['company_philhealth']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					     <div class="control-group">
						<label class="control-label" for="company_tin">TIN <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="company_tin" name="company_tin" class="span3 alphanumeric" style="float:left" value="<?=$result['company_tin']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					     <div class="control-group">
						<label class="control-label" for="company_pagibig">PAGIBIG <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="company_pagibig" name="company_pagibig" class="span3 alphanumeric" style="float:left" value="<?=$result['company_pagibig']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label class="control-label" for="status">Status  <?=($result['status']==1) ? 'checked' : null;?></label>
						<div class="controls">
						  <label class="radio inline">
							  <input type="radio" name="status" id="status_1" value="1" <?=($result['status']==1) ? 'checked' : null;?> > 
							  Active 
							</label>
							<label class="radio inline">
							  <input type="radio" name="status" id="status_0" value="0"  <?=($result['status']==0) ? 'checked' : null;?>>
							 Deactive
							</label>
						</div>
					  </div>
			
		
	<div class="form-actions">
			<button type="submit" class="button primary blue" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> <button type="reset" class="button primary blue">Clear</button>
    </div>
	</form>

</fieldset>
<script type="text/javascript">
	$(function(){
			$('#company_sss').mask("99-9999999-9");
	$('#company_tin').mask("999-999-999-999");
	$('#company_philhealth').mask("99-9999999999");
	$('#company_pagibig').mask("9999-9999-9999");
		var validator = $("#validate-form").validate({
		rules: {
			logo:{
				accept:"(png|jpg|jpeg)"
			}
			,company:{
				required:true
			}	,company_email:{
				required:true,
				email:true
			},company_address:{
				required:true
			},company_sss:{
				required:true
			},company_tin:{
				required:true
			},company_philhealth:{
				required:true
			}
		
		},messages:{
		},
		
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.next() );
			else
				error.appendTo( element.parent().find('span.validation-status') );
		},
		success: "valid",
		submitHandler: function(form){
			$('button[type=submit]').attr('disabled', 'true');
			$(this).bind("keypress", function(e) { if (e.keyCode == 13) return false; });
			form.submit(form);
		}
	});
	});
</script>
<style type="text/css">
.line-height-zero{line-height:0px;margin-top: 5px;}
	fieldset legend.labelx{font-size: 16px;}
</style>
