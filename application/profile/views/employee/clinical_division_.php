<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Clinical Division</legend>
	<p class="alert alert-info"><span class="required">*</span> Indicates fields are required</p>
	<form action="<?=base_url('xadmin/clinic_divisions/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
		
					<?php
					//print_r($division);
						if(strtolower($action)=="edit"){
						?>
						<input type="hidden" id="division_id" name="division_id" value="<?=$division['division_id']?>" />
						<div class="control-group">
						<label class="control-label" for="division">Division Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="division" name="division" class="span4 alphanumeric" style="float:left" value="<?php echo $division[division]?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>

				
					  <div class="control-group">
						<label class="control-label" for="status">Status </label>
						<div class="controls">
						  <label class="radio inline">
							  <input type="radio" name="status" id="status" value="1" <?=($division['status']==1) ? "checked" : null?>>
							  Active
							</label>
							<label class="radio inline">
							  <input type="radio" name="status" id="status" value="0" <?=($division['status']==0)? "checked" : null?>>
							 Deactive
							</label>
						</div>
					  </div>
						<?php
						
						}else{
						?>
						<div class="control-group">
						<label class="control-label" for="division">Division Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="division" name="division" class="span4 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
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
			<button type="submit" class="btn btn-success" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> <button type="reset" class="btn btn-primary">Clear</button> <a href="<?=base_url('xadmin/clinic_divisions')?>" class="btn" ><i class="icon-circle-arrow-left"></i> Back</a><br style="clear:both" /><br />
	
  
    </div>
		
	</form>	
</fieldset>

<script type="text/javascript">
$(document).ready(function(){
	var validator = $("#validate-form").validate({
		rules: {
			division:{
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
			form.submit(form);
		}
	});
});
</script>

<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
</style>