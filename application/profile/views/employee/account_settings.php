<div class="container-emp">
	<fieldset class="title-container">
		<legend>Account Settings </legend>
<form action="<?=base_url('profile/account/settings')?>" method="POST" class="form-horizontal" id="validate-form">
		<fieldset>
			<legend style="font: bold 16px 'arial';">Change Email Address</legend>
			<h5><?=$info['email']?><!--<a href="#change-email" class="to-show" data-show="email-container" id="change-email" style="font: normal 12px 'Arial';text-decoration: underline;">Change Email</a>//--></h5>
				<div class="" id="email-container">
					 <div class="control-group">
						<label class="control-label" for="inputEmail">Email</label>
						<div class="controls">
						  <input type="text" id="inputEmail" name="inputEmail" placeholder="Email" style="float:left" class="form-control col-md-4">
						   <span class="validation-status pull-left"></span>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="inputPasswordx">Password</label>
						<div class="controls">
						  <input type="password" id="inputPasswordx" name="inputPasswordx" placeholder="Password" style="float:left" class="form-control col-md-4">
						    <span class="validation-status pull-left"></span>
						</div>
					  </div>
				
				<div class="form-actions" style="padding-left:20px">
					<input type="submit" class="btn btn-primary primary blue" name="changeemail" value="Save Changes" /> <!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>//-->
				</div>
				
				</div>
		
		</fieldset>
	</form>

	
	<form action="<?=base_url('profile/account/settings')?>" method="POST" class="form-horizontal" id="validate-form2">
		<fieldset>
			<legend style="font: bold 16px 'arial';">Change password</legend>
			<p> Change your password to prevent from password hacking attack. Chose something you can remember, but not too short or too simple.</p>
			<div id="password-container">	 
				 <div class="control-group">
					<label class="control-label" for="inputOldPassword">Old Password</label>
					<div class="controls">
					  <input type="password" id="inputOldPassword" name="inputOldPassword" placeholder="Old Password" style="float:left" class="form-control col-md-4">
					   <span class="validation-status pull-left"></span>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="newpassword">New Password</label>
					<div class="controls">
					  <input type="password" id="newpassword" name="newpassword" placeholder="Password" style="float:left" class="form-control col-md-4">
					   <span class="validation-status pull-left"></span>
					</div>
				  </div>
				   <div class="control-group">
					<label class="control-label" for="inputPassword">Confirm Password</label>
					<div class="controls">
					  <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" style="float:left" class="form-control col-md-4">
					   <span class="validation-status pull-left"></span>
					</div>
				  </div>
			<div class="form-actions" style="padding-left:20px">
				<input type="submit" class="btn btn-primary primary blue" name="changepassword" value="Change password" />
			</div>
			</div>
		</fieldset>
	</form>	
</fieldset>
</div>


<script type="text/javascript">
$(document).ready(function(){

   /*  $('.selectpicker').selectpicker();
	$('#student_number').numeric();
	*/
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-n').alpha({allow:" "});
	$('.numeric-d').numeric({allow:"-"});
	var validator = $("#validate-form").validate({
		rules: {
			inputEmail:{
				required:true,
				email:true
			},inputPasswordx: {
				required: true,
				
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
			 $.ajax({
		            url: form.action,
		            type: form.method,
		            data: $(form).serialize(),
		            success: function(response) {
		               	if (response > 0) {
		               		var htm = '<div class="alert alert-success alert-fade">Information was successfully updated.  <button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
		               		$('#result').hide().html(htm).fadeIn('slow',function(){
		               			var fn = $('#firstname').val();
		               			var ln = $('#lastname').val();
		               			$('#user-fullname').html(fn+" "+ln);
		               			$('button[type=submit]').removeAttr('disabled');
		               		});
		               		
		               	};
		            }            
		        });
		}
	});
	
	
		var validator = $("#validate-form2").validate({
		rules: {
			inputOldPassword:{
				required:true
			},newpassword: {
				required: true,
			},inputPassword: {
				required: true,
				equalto:$('#newpassword').val()
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
});
</script>