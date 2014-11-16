<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Users</legend>
	<a href="<?=base_url('xadmin/illness')?>" class="btn btn-small" ><i class="icon-circle-arrow-left"></i> Back</a>
	<p class="alert alert-info" style='margin-top:10px'><span class="required">*</span> Indicates fields are required</p>
	<form action="<?=base_url('xadmin/illness/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
			<?php
			if(strtolower($action)=='edit'){
				?>
				<div class="" id="email-container">
					<input type="hidden" id="illness_id" name="illness_id" value="<?=$result['illness_id']?>" />
						
				 <div class="control-group">
							<label class="control-label" for="course_code">Select Division <span class="required">*</span></label>
							<div class="controls">
								<select name="division_id" id="division_id" class="selectpicker span3 custom-select show-tick" style="float:left">
									
										 <option value="">Select Clinic Division</option>
									<?php
										foreach($division as $k => $v){
										?>
										 <option value="<?=$v->division_id?>" <?=($result['division_id']==$v->division_id) ? "selected='selected'" : null?>><?=$v->_division?></option>
										<?php
										}
									
									?>
									
							  </select>
							 <span class="validation-status pull-left"></span>
							</div>
						  </div>
					<div class="control-group">
						<label class="control-label" for="illness">Illness Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="illness" name="illness" class="span4 alphanumeric" style="float:left" value="<?=$result['illness']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					   <div class="control-group">
						<label class="control-label" for="description">Description<span class="required">*</span></label>
						<div class="controls">
							  <textarea id="content" name="content" rows="2" cols="30"><?php echo $result['content']?>asdfsdf</textarea>
						
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
				
			
				</div>
				
				<?php
			}else{
				?>
				
				 <div class="control-group">
							<label class="control-label" for="course_code">Select Division <span class="required">*</span></label>
							<div class="controls">
								<select name="division_id" id="division_id" class="selectpicker span3 custom-select show-tick" style="float:left">
									
										 <option value="">Select Clinic Division</option>
									<?php
										foreach($division as $k => $v){
										?>
										 <option value="<?=$v->division_id?>"><?=$v->_division?></option>
										<?php
										}
									
									?>
									
							  </select>
							 <span class="validation-status pull-left"></span>
							</div>
						  </div>
					<div class="control-group">
						<label class="control-label" for="illness">Illness Name <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="illness" name="illness" class="span4 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					   <div class="control-group">
						<label class="control-label" for="description">Description<span class="required">*</span></label>
						<div class="controls">
							  <textarea id="content" name="content"  rows="4" cols="30"></textarea>
						
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
			<button type="submit" class="btn btn-success" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> <button type="reset" class="btn btn-primary">Clear</button>
  
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
	$('.mask').mask("999-99-99");
	
	var validator = $("#validate-form").validate({
		rules: {
			illness:{
				required:true
			},middlename:{
				required:true
			},description:{
				required:true,
				
			},password:{
				required:true
			},contact_number:{
				required:true
			},division_id:{
				required:true
			},email_address:{
				required:true,
				email:true
				
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

	$('#reset-password').click(function(){
		$("#validate-form").submit();
	});
	
	   $('#content').liveEdit({
            height: 350,
            css: ['<?=base_url();?>bootstrap/css/bootstrap.min.css', '<?=base_url();?>bootstrap/bootstrap_extend.css'] /* Apply bootstrap css into the editing area */,
            groups: [
					["group5", "", ["Undo", "Redo"]],
                    ["group1", "", ["Bold", "Italic", "Underline", "ForeColor", "RemoveFormat","Bullets"]],
                    /* ["group2", "", ["Bullets", "Numbering", "Indent", "Outdent"]],
                    ["group3", "", ["Paragraph", "FontSize", "FontDialog", "TextDialog"]],
                    ["group4", "", ["LinkDialog", "ImageDialog", "TableDialog", "Emoticons", "Snippets"]],
                    ["group5", "", ["Undo", "Redo", "FullScreen", "SourceDialog"]] */
                    ] /* Toolbar configuration */
        });

        $('#content').data('liveEdit').startedit();
	
});

</script>

<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
</style>