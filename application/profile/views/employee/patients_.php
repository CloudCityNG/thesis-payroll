<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Patients</legend>
	<p class="alert alert-info" style='margin-top:10px'><span class="required">*</span> Indicates fields are required</p>
	<form action="<?=base_url('xadmin/patients/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
			<?php
			if(strtolower($action)=='edit'){
				?>
				<div class="" id="email-container">
				<input type="hidden" id="patient_id" name="patient_id" value="<?=$result['patient_id']?>" />
					
				 <div class="control-group">
							<label class="control-label" for="course_code">Select Division <span class="required">*</span></label>
							<div class="controls">
								<select name="division_id" id="division_id" class="selectpicker span3 custom-select show-tick" style="float:left">
									
										 <option value="">Select Clinic Division</option>
									<?php
										foreach($division as $k => $v){
										?>
										 <option value="<?=$v->division_id?>" <?=($result['division_id']==$v->division_id) ? "selected='selected'" : null?>><?=$v->division?></option>
										<?php
										}
									
									?>
									
							  </select>
							 <span class="validation-status pull-left"></span>
							</div>
						  </div>
					<div class="control-group">
						<label class="control-label" for="firstname">First Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="firstname" name="firstname" class="span4 alphanumeric" style="float:left" value="<?=$result['firstname']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					   <div class="control-group">
						<label class="control-label" for="lastname">Last Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="lastname" name="lastname" onKeyUp="return onKey_UP()" class="span4 alphanumeric" value="<?=$result['lastname']?>" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
						
						 <div class="control-group">
						<label class="control-label" for="gender">Gender </label>
						<div class="controls">
						  <label class="radio inline">
							  <input type="radio" name="gender" id="gender" value="male" <?=($result['gender']=="male") ? "checked" : null?>>
							  Male
							</label>
							<label class="radio inline">
							  <input type="radio" name="gender" id="gender" value="female" <?=($result['gender']=="female") ? "checked" : null?>>
							 Female
							</label>
						</div>
					  </div>
					         <div class="control-group">
								<label class="control-label" for="birthdate">Birth Date</label>
								<div class="controls">
								  <input type="text" id="birthdate" name="birthdate" class="span3 numeric-d" readonly style="float:left" value="<?=$result['birthdate']?>">
								   <span class="validation-status pull-left"></span>
								  
								</div>
							  </div>
							<div class="control-group">
								<label class="control-label" for="civil_status">Civil Satus</label>
								<div class="controls">
									<select name="civil_status" id="civil_status" style="float:left">
										<option value="">Select Status</option>
										<option value="single" <?=($result['civil_status']=="single") ? "selected" : null?>>Single</option>
										<option value="married" <?=($result['civil_status']=="married") ? "selected" : null?>>Married</option>
									</select>
								  <span class="validation-status pull-left"></span>
								  
								</div>
							  </div>
						
						  <div class="control-group">
						<label class="control-label" for="occupation">Occupation <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="occupation" name="occupation" class="span3" style="float:left" value="<?=$result['civil_status']?>" ><span class="validation-status pull-left"></span>
						</div>
					  </div>
						  <div class="control-group">
						<label class="control-label" for="employeer">Employeer <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="employeer" name="employeer" class="span3" style="float:left" value="<?=$result['employeer']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					    <div class="control-group">
						<label class="control-label" for="philhealth">Philhealth <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="philhealth" name="philhealth" class="span3 number" style="float:left" value="<?=$result['philhealth']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					  
					  <div class="control-group">
						<label class="control-label" for="status">Status </label>
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
				
			
				</div>
				
				<?php
			}else{
				?>
				
				 <div class="control-group">
							<label class="control-label" for="course_code">Select Division <span class="required">*</span></label>
							<div class="controls">
								<select name="division_id" id="division_id" class="selectpicker span3 custom-select show-tick" style="float:left">
									
										 <option value="">Select Division</option>
									<optgroup label="">
									<?php
										foreach($division as $k => $v){
										?>
										 <option value="<?=$v->division_id?>"><?=$v->division?></option>
										<?php
										}
									
									?>
									</optgroup>
							  </select>
							 <span class="validation-status pull-left"></span>
							</div>
						  </div>
					<div class="control-group">
						<label class="control-label" for="firstname">First Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="firstname" name="firstname" class="span4 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					   <div class="control-group">
						<label class="control-label" for="lastname">Last Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="lastname" name="lastname" onKeyUp="return onKey_UP()" class="span4 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
						
						 <div class="control-group">
						<label class="control-label" for="gender">Gender </label>
						<div class="controls">
						  <label class="radio inline">
							  <input type="radio" name="gender" id="gender" value="male" checked>
							  Male
							</label>
							<label class="radio inline">
							  <input type="radio" name="gender" id="gender" value="female">
							 Female
							</label>
						</div>
					  </div>
					         <div class="control-group">
								<label class="control-label" for="birthdate">Birth Date</label>
								<div class="controls">
								  <input type="text" id="birthdate" name="birthdate" class="span3 numeric-d" readonly style="float:left">
								   <span class="validation-status pull-left"></span>
								  
								</div>
							  </div>
							<div class="control-group">
								<label class="control-label" for="civil_status">Civil Satus</label>
								<div class="controls">
									<select name="civil_status" id="civil_status" style="float:left">
										<option value="">Select Status</option>
										<option value="single">Single</option>
										<option value="married">Married</option>
									</select>
								  <span class="validation-status pull-left"></span>
								  
								</div>
							  </div>
						
						  <div class="control-group">
						<label class="control-label" for="occupation">Occupation <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="occupation" name="occupation" class="span3" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
						  <div class="control-group">
						<label class="control-label" for="employeer">Employeer <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="employeer" name="employeer" class="span3" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					    <div class="control-group">
						<label class="control-label" for="philhealth">Philhealth <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="philhealth" name="philhealth" class="span3 number" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="status">Status </label>
						<div class="controls">
						  <label class="radio inline">
							  <input type="radio" name="status" id="status" value="1" checked>
							  Active
							</label>
							<label class="radio inline">
							  <input type="radio" name="status" id="status" value="0">
							 Deactive
							</label>
						</div>
					  </div>
						
				<?php
			}
			?>
					
    <div class="form-actions">
			<button type="submit" class="btn btn-success" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> <button type="reset" class="btn btn-primary">Clear</button> <a href="<?=base_url('xadmin/patients')?>" class="btn" ><i class="icon-circle-arrow-left"></i> Back</a>
	
  
    </div>
		
	</form>	
</fieldset>

<script type="text/javascript">
$(document).ready(function(){
	$('#employee_number').numeric();
	$('.number').numeric();
	$('.alphanumeric-n').alpha();
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-d').alphanumeric({allow:"-"});
	$('#birthdate').datepicker({minDate:1});
	$('.mask').mask("999-99-99");
	
	var validator = $("#validate-form").validate({
		rules: {
			firstname:{
				required:true
			},middlename:{
				required:true
			},lastname:{
				required:true,
				
			},employeer:{
				required:true
			},birthdate:{
				required:true
			},division_id:{
				required:true
			},occupation:{
				required:true
				
			},philhealth:{
				required:true,
				
			},civil_status:{
				required:true,
				
			}
		
		},messages:{
			division_id:{
				required : "",
				remote: $.format("<strong>{0}</strong> is already exists.")
			}, employee_number:{
				required : "",
				remote: $.format("<strong>{0}</strong> is already exists.")
			}
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

	$('#reset-employeer').click(function(){
		$("#validate-form").submit();
	});

});

</script>

<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
	.datepicker{width: 200px!important;}
</style>