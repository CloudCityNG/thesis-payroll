<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i>Add Employee</legend>
	<p><strong class="label label-success">Note :</strong> <span class="required">*</span> Indicates fields are required.</p>
	<form action="<?=base_url('xadmin/employees/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
			<?php
				//print_pre($result);
			?>
				<div class="" id="email-container">
				<input type="hidden" id="employee_id" name="employee_id" value="<?=$result['employee_id']?>" />
				 <div class="control-group">
							<label class="control-label" for="course_code">Select Position <span class="required">*</span></label>
							<div class="controls">
								<select name="position_id" id="position_id" class="form-control col-md-4 show-tick" required="" style="float:left">
									
									 <option value="">Select Position</option>
									<?php
										foreach($position as $k => $v){
										$selected = ($result['position_id']==$v->position_id) ? "selected" : null;
										?>
										 <option value="<?=$v->position_id?>" <?=$selected?>><?=$v->position?></option>
										<?php
										}
									
									?>
								
							  </select>
							 <span class="validation-status pull-left"></span>
							</div>
						  </div>
					<div class="control-group">
						<label class="control-label" for="eid">Employee Number <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="eid" name="eid" class="col-md-2 number form-control" readonly style="float:left;background:#fff" value="<?=$result['eid']?>"><span class="validation-status pull-left"></span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="hired_date">Hire date <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="hired_date" name="hired_date" readonly class="col-md-2 form-control alphanumeric-n" style="float:left;background: #fff;cursor: pointer;" value="<?=isset($result['hired_date']) ? date("m/d/Y",strtotime($result['hired_date'])) : null?>"><span class="validation-status pull-left"></span>
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
						<input type="text" id="email" name="email" class="col-md-4 form-control" style="float:left" value="<?=$result['email']?>" placeholder="e.g. email@domain.com"><span class="validation-status pull-left"></span>
						
						
						</div>
					  </div>
						  <div class="control-group">
						<label class="control-label" for="password">Password <span class="required">*</span></label>
						<div class="controls">
						<?php
							
							if($action!='Edit'){
							
							?>
							<input type="password" id="password" name="password" class="col-md-4 form-control" style="float:left" placeholder="Atleast 6 character"><span class="validation-status pull-left"></span>
								<br class="clr" />
						<button type="button" id="generate" class="btn btn-warning btn-sm" style="margin-top: 10px;">Generate password</button>
							<?php
							}else{
							?>
							<input type="button" id="resetPassword" name="resetPassword" value="Reset Password" class="btn btn-warning btn-sm">
						
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
							<label class="radio inline pull-left" style="margin-left: 10px;">
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
<?
	if(strtolower($action)=="add"){
?>
    <div id="generate_modal" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
      <div class="modal-dialog" style="width:350px;margin-top: 15%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Generate password</h4>
      </div>
      <div class="modal-body">
		<input type="text" name="gpassword" id="gpassword" class="form-control" style="float: left;width: 220px;" />
		<input type="button" id="passwordajax" value="Generate" class="btn btn-success" style="margin-left:7px"/>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
        <button type="button" id="yesUseit" class="btn btn-primary btn-sm">Yes, Use it!</button>
      </div>
    </div>
    </div>
<?php
}

if(strtolower($action)=="edit"){
?>	
 <div id="resetModal" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
      <div class="modal-dialog" style="width:350px;margin-top: 15%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Reset password</h4>
      </div>
      <div class="modal-body">
		<input type="text" name="gpassword" id="gpassword" class="form-control" style="float: left;width: 220px;" />
		<input type="button" id="passwordajax" value="Generate" class="btn btn-success" style="margin-left:7px"/>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
        <button type="button" id="yesReset" class="btn btn-primary btn-sm">Reset Password</button>
      </div>
    </div>
    </div>
<?php
}
?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/ver3.0/css/google-datepicker.css" />
<script type="text/javascript" src="<?=base_url()?>assets/ver3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.number').numeric();
	$('.alphanumeric-n').alpha({allow:". "});
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-d').alphanumeric({allow:"-"});
	$('#hired_date').datepicker("option", "dateFormat", "yy-mm-dd");
	var validator = $("#validate-form").validate({
		rules: {
			eid:{
				required:true
			},hired_date:{
				required:true
			},firstname:{
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
			},position_id:{
				required:true
			},email:{
				required:true,
				email:true,
				remote: "<?=base_url('xadmin/api/usernameisexists/')?><?=strtolower($action)?>/?current=<?=$result['email']?>"
			}
		
		},messages:{
			email:{
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

	$('#generate').click(function(){
		$("#generate_modal").modal('show');
	});

	$('#resetPassword').click(function(){
		$("#resetModal").modal('show');
	});
	
	$('#passwordajax').click(function(){
		 var text = "";
		 var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
			for( var i=0; i < 8; i++ )
				text += possible.charAt(Math.floor(Math.random() * possible.length));
				$('#gpassword').val(text);
	});
	
	$('#yesUseit').click(function(){
		var pass = $('#gpassword').val();
			if(pass==""){
				$('#gpassword').focus();
			}else{
				$("#generate_modal").modal('hide');
				$('#password').val(pass);
			}
	});
	
	$('#lastname').keyup(function(){
		var lastname = $(this).val();
		var eid = $('#eid').val();
		var email = lastname+"."+eid+"@matrix.com";
		$('#email').val(email);
	});
	
	$('#yesReset').click(function(){
		var password = $('#gpassword').val();
		if(password==""){
				$('#gpassword').focus();
			}else{
				$.post('<?=base_url()?>xadmin/employees/reset',{password:password,id:'<?=genKey($result['employee_id'])?>'},function(data){
					if(data.status=="true"){
						$('.modal-footer').hide();
						result = "<p style='color:green'>Password was successfully reset.</p>";
						$('.modal-body').html(result);
					}
				},'json');
			}
	});

});

</script>

<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
	.btn-group.bootstrap-select{margin-left: 0px!important;}
</style>