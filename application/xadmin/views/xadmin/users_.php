<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Users</legend>
	<p class="alert alert-info" style='margin-top:10px'><span class="required">*</span> Indicates fields are required</p>
	
	<form action="" method="POST" class="form-horizontal" id="validate-form">
				<input type="hidden" id="xusers_id" name="xusers_id" value="<?=$result['xusers_id']?>" />
			<div class="form-group">
		    	<label class="col-sm-3 control-label ckey"><span class="required">*</span> Select Role</label>
		    	<div class="col-sm-5">
	      			<select name="xroles_id" id="xroles_id" class="selectpicker show-tick" style="float:left">
								<?php
									foreach($role as $k => $v){
									$selected = ($result['xroles_id']==$v->role_id) ? "selected" : null;
									?>
									 <option value="<?=$v->xroles_id?>" <?=$selected?>><?=$v->role?></option>
									<?php
									}
								
								?>
							
						  </select>
		      	</div>
			</div>


			<div class="form-group">
		    	<label class="col-sm-3 control-label ckey"><span class="required">*</span> First Name</label>
		    	<div class="col-sm-5">
	      				 <input type="text" id="first_name" name="first_name" class="col-md-4 form-control alphanumeric-n" style="float:left" value="<?=$result['first_name']?>">
						 
		      	</div>
			</div>

			<div class="form-group">
		    	<label class="col-sm-3 control-label ckey"><span class="required">*</span> Middle Name</label>
		    	<div class="col-sm-5">
	      				 <input type="text" id="middle_name" name="middle_name"  class="col-md-4 form-control alphanumeric-n" style="float:left" value="<?=$result['middle_name']?>">
						
		      	</div>
			</div>

			<div class="form-group">
		    	<label class="col-sm-3 control-label ckey"><span class="required">*</span> Last Name</label>
		    	<div class="col-sm-5">
	      				<input type="text" id="last_name" name="last_name"  class="col-md-4 form-control alphanumeric-n" style="float:left" value="<?=$result['last_name']?>">
					
		      	</div>
			</div>

			<div class="form-group">
		    	<label class="col-sm-3 control-label ckey"><span class="required">*</span> Email</label>
		    	<div class="col-sm-3">
	      				<input type="email" id="email" name="email" class="col-md-4 form-control" style="float:left" value="<?=$result['email']?>" placeholder="e.g. email@host.com">
						
		      	</div>
			</div>

			<div class="form-group">
		    	<label class="col-sm-3 control-label ckey"><span class="required">*</span> Password</label>
		    	<div class="col-sm-3">
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

			 <div class="form-group">
			    <label class="col-sm-3 control-label ckey">Status</label>
			    <div class="col-sm-5">
			      	<label class="radio inline pull-left scaffolding-lbl">
					  <input type="radio" name="status" id="status_1" value="1" <?=($result['status']==1) ? 'checked' : null;?> > 
					  Active 
					</label>
					<label class="radio inline pull-left scaffolding-lbl" style="margin-left:20px">
					  <input type="radio" name="status" id="status_0" value="0"  <?=($result['status']==0) ? 'checked' : null;?>>
					 Deactive
					</label> 
			      </div>
			  </div>

			   <div class="form-actions">

				<input type="submit" class="btn btn-success" name="btn-submit" value="Create New" /> or <a href="javascript:history.back()">Cancel</a> 
				<!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>//-->
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
			first_name:{
				required:true
			},middle_name:{
				required:true
			},last_name:{
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
				email:true,
				 remote: "<?=base_url('xadmin/api/doesexists/')?><?=strtolower($action)?>/?current=<?=htmlentities($result['email'])?>&gConf=<?=$hashConfig?>"
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