<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Users</legend>
	<p class="alert alert-info" style='margin-top:10px'><span class="required">*</span> Indicates fields are required</p>
	
	<form action="<?=base_url('xadmin/users/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
			
				<div class="" id="email-container">
				<input type="hidden" id="users_id" name="users_id" value="<?=$result['users_id']?>" />
				 <div class="control-group">
							<label class="control-label" for="course_code">Select Role <span class="required">*</span></label>
							<div class="controls">
								<select name="role_id" id="role_id" class="selectpicker show-tick" style="float:left">
									
									 <option value="">Select Role</option>
									<?php
										foreach($role as $k => $v){
										$selected = ($result['role_id']==$v->role_id) ? "selected" : null;
										?>
										 <option value="<?=$v->role_id?>" <?=$selected?>><?=$v->role?></option>
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
						  <input type="text" id="firstname" name="firstname" class="col-md-4 form-control alphanumeric-n" style="float:left" value="<?=$result['firstname']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					    <div class="control-group">
						<label class="control-label" for="middlename">Middle Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="middlename" name="middlename"  class="col-md-4 form-control alphanumeric-n" style="float:left" value="<?=$result['middlename']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					   <div class="control-group">
						<label class="control-label" for="lastname">Last Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="lastname" name="lastname"  class="col-md-4 form-control alphanumeric-n" style="float:left" value="<?=$result['lastname']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  	 <div class="control-group">
								<label class="control-label" for="mobilenumber">Mobile Number <span class="required">*</span></label>
								<div class="controls">
								        <span class="input-group-addon" style="width: 37px;float: left;margin-right: 0px;background: none;border: none;margin-top: 4px;padding-left: 0px;">+639</span>
								        <input type="text" style="width: 242px;" class="form-control col-md-3 numeric number" id="mobile_number" name="mobile_number" maxlength="9" value="<?=$result['mobile_number']?>" />
						        		<span class="validation-status pull-left"></span>
								  </div>
							  </div>
						
						  <div class="control-group">
						<label class="control-label" for="email">Email <span class="required">*</span></label>
						<div class="controls">
						<input type="text" id="email" name="email" class="col-md-4 form-control" style="float:left" value="<?=$result['email']?>"><span class="validation-status pull-left"></span>
						
						
						</div>
					  </div>
						  <div class="control-group">
						<label class="control-label" for="password">Password <span class="required">*</span></label>
						<div class="controls">
						<?php
							
							if($action!='Edit'){
							
							?>
							<input type="password" id="password" name="password" class="col-md-4 form-control" style="float:left"><span class="validation-status pull-left"></span>
							<?php
							}else{
							?>
							<input type="button" id="reset-password" name="reset-password" value="Reset Password" class="btn btn-warning btn-small" onClick="return reset()">
						
							<?php
							} 
						
						?>
						
						</div>
					  </div>
					  
					  
					  <div class="control-group">
						<label class="control-label" for="status">Status  <?=($result['status']==1) ? 'checked' : null;?></label>
						<div class="controls">
						  <label class="radio inline pull-left">
							  <input type="radio" name="status" id="status_1" value="1" <?=($result['status']==1) ? 'checked' : null;?> > 
							  Active 
							</label>
							<label class="radio inline pull-left">
							  <input type="radio" name="status" id="status_0" value="0"  <?=($result['status']==0) ? 'checked' : null;?>>
							 Deactive
							</label>
						</div>
					  </div>
				
			
				</div>
				
			
					
    <div class="form-actions">
			<button type="submit" class="btn btn-primary" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> <button type="reset" class="btn btn-default">Clear</button>
  
    </div>
		
	</form>	
</fieldset>

<script type="text/javascript">
$(document).ready(function(){
	$('.number').numeric();
	$('.alphanumeric-n').alpha({allow:". "});
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-d').alphanumeric({allow:"-"});
	var validator = $("#validate-form").validate({
		rules: {
			firstname:{
				required:true
			},middlename:{
				required:true
			},lastname:{
				required:true,
			},password:{
				required:true,
				minlength: 6
			},mobile_number:{
				required:true,
				maxlength: 9,
				minlength: 9
			},role_id:{
				required:true
			},email:{
				required:true,
				email:true
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

	$('#reset-password').click(function(){
		//$("#validate-form").submit();
	});

});

</script>

<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
	.btn-group.bootstrap-select{margin-left: 0px!important;}
</style>