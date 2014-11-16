<div class="container-emp">
	<fieldset class="title-container">
		<legend>Account Information </legend>
			<form action="<?=base_url('profile/account/information')?>" method="POST" class="form-horizontal" id="validate-form" enctype="multipart/form-data">
				<p>To change information just click save changes.</p>
				<div class="" id="email-container">
					<div id="result"></div>
					<div class="control-group">
						<label class="control-label" for="firstname">Firstname :</label>
						<div class="controls">
						  <input type="text" id="firstname" name="firstname"  value="<?=$info['firstname']?>" class="form-control col-md-4 alphanumeric-n isChange" style="float:left">
						   <span class="validation-status"></span>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="middlename">Middlename :</label>
						<div class="controls">
						  <input type="text" id="middlename" name="middlename"  value="<?=$info['middlename']?>" class="form-control col-md-4 alphanumeric-n isChange" style="float:left">
						   <span class="validation-status"></span>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label class="control-label" for="companyname">Lastname :</label>
						<div class="controls">
						  <input type="text" id="lastname" name="lastname"  value="<?=$info['lastname']?>" class="form-control col-md-4 alphanumeric-n" style="float:left">
						   <span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					
					 <div class="control-group">
						<label class="control-label" for="mobilenumber">Mobile Number</label>
						<div class="controls">
							<div class="input-group col-md-3">
								<span class="input-group-addon">+639</span>
								<input type="text" class="form-control col-md-3" id="mobile_number" name="mobile_number" maxlength="9" value="<?=$info['mobile_number']?>" />
							  </div>
						  </div>
					  </div>
					
				</div>
			    <div class="form-actions" style="padding-left:20px">
					<button type="reset" class="btn btn-default">Clear</button>
					<button type="submit" class="btn btn-primary blue" name="changeinfomation">Save changes</button>
				</div>		
	</form>
	</fieldset>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-n').alpha({allow:" "});
	$('.numeric-d').numeric({allow:"-"});
	var validator = $("#validate-form").validate({
		rules: {
			avatar:{
				accept: "(png|jpg|jpeg)"
				
			},lastname:{
				required:true
			},firstname: {
				required: true,
			},address:{
				required:true
			},mobile_number:{
				required:true
			},contact_number:{
				required:true
			},status:{
				required:true
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
			// $(form).unbind('submit');
		}
	});
	
});
</script>