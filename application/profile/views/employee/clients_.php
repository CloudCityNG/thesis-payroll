<fieldset class="title-container">
<legend><i class="custom-icon-role pull-left"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Clients<br /> <small>Add, modify and delete your clients</small></legend>
	<p class="alert alert-info" style='margin-top:10px'><span class="required">*</span> Indicates fields are required</p>
	
	<form action="<?=base_url('xadmin/clients/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
			
				<div class="" id="email-container">
				<input type="hidden" id="clients_id" name="clients_id" value="<?=$result['clients_id']?>" />
					<div class="control-group">
						<label class="control-label" for="clients">Client <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="clients" name="clients" class="col-md-6 form-control" style="float:left" value="<?=$result['clients']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					   <div class="control-group">
								<label class="control-label" for="mobile_number">Contact Number <span class="required">*</span></label>
								<div class="controls">
								  <input type="text" id="mobile_number" name="mobile_number" class="col-md-3 form-control" style="float:left" value="<?=$result['mobile_number']?>">
								   <span class="validation-status pull-left"></span>
								  
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="telephone_number">Telephone Number <span class="required">*</span></label>
								<div class="controls">
								  <input type="text" id="telephone_number" name="telephone_number" class="col-md-3 form-control" style="float:left" value="<?=$result['telephone_number']?>">
								   <span class="validation-status pull-left"></span>
								  
								</div>
							  </div>

					    <div class="control-group">
						<label class="control-label" for="branch_name">Branch <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="branch_name" name="branch_name"  class="col-md-4 form-control" style="float:left" value="<?=$result['branch_name']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					   <div class="control-group">
						<label class="control-label" for="contact_person1">Contact Person <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="contact_person1" name="contact_person1"  class="col-md-4 form-control" style="float:left" value="<?=$result['contact_person1']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="contact_person2"></label>
						<div class="controls">
						  <input type="text" id="contact_person2" name="contact_person2"  class="col-md-4 form-control" style="float:left" value="<?=$result['contact_person2']?>"><span class="validation-status pull-left"></span>
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
	$('.alphanumeric-n').alpha();
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-d').alphanumeric({allow:"-"});

	$('#mobile_number').mask("9999-9999999");
	    $('#telephone_number').mask("999-99-99");

	var validator = $("#validate-form").validate({
		rules: {
			clients:{
				required:true
			},contact_person1:{
				required:true
			},contact_person2:{
				required:true,
			},telephone_number:{
				required:true,
			},mobile_number:{
				required:true
			},branch_name:{
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

	$('#reset-password').click(function(){
		//$("#validate-form").submit();
	});

});

</script>

<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
</style>