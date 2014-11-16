<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Department</legend>
	<p><strong class="label label-success">Note :</strong> <span class="required">*</span> Indicates fields are required.</p>
	<form action="<?=base_url('xadmin/department/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
	<input type="hidden" id="department_id" name="department_id" value="<?=$result['department_id']?>" />
	
		<div class="control-group">
			<label class="control-label" for="department">Department <span class="required">*</span></label>
			<div class="controls">
			  <input type="text" id="department" name="department" class="col-md-4 form-control alphanumeric" style="float:left" value="<?=$result['department']?>"><span class="validation-status pull-left"></span>
			</div>
		 </div>
					  
		 <div class="control-group">
			<label class="control-label" for="status">Status </label>
			<div class="controls">
			  	<label class="radio inline pull-left">
				  <input type="radio" name="status" id="status_1" value="1" <?=($result['status']==1) ? 'checked' : null;?> > 
				  Active 
				</label>
				<label class="radio inline pull-left" style="margin-left:20px">
				  <input type="radio" name="status" id="status_0" value="0"  <?=($result['status']==0) ? 'checked' : null;?>>
				 Deactive
				</label>
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
			department:{
				required:true,
				remote: "<?=base_url('xadmin/api/doesexists/')?><?=strtolower($action)?>/?current=<?=$result['department']?>"
			}
		
		},messages:{ 
			department:{
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
});

</script>

<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
	.btn-group.bootstrap-select{margin-left: 0px!important;}
</style>