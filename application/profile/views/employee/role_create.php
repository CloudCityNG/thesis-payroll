<fieldset class="title-container">
<legend><i class="custom-icon-role"></i> Users Role</legend>
<style>
#create-new-table thead tr th.acl{width:100px!important}
#create-new-table tbody tr td{text-align:center;background:#fff}
input.error{border:1px solid red!important}
</style>
	<form action="" method="POST" class="form-horizontal" id="role-form">
						 <input type="hidden" style="width:525px" name="role_id" id="role_id" style="float:left" value="<?=$role['role_id']?>" />
	<div class="control-group">
						<label class="control-label" for="firstname">Role Name<span class="required">*</span></label>
						<div class="controls">
						 <input type="text" style="width:525px;float:left" name="role" id="role" value="<?=$role['role']?>" class="form-control"/><span class="validation-status" style="float:left"></span>
						</div>
					  </div>
<table class="table table-striped table-hover table-custom display" style="font: 12px 'Arial';margin-top:10px" id="module">
		<thead>
        <tr>
          <th>Module</th>
          <th>Create</th>
          <th>Read</th>
          <th>Update</th>
          <th>Delete</th>
          <th>Export</th>
          <th>Print</th>
        </tr>
      </thead>
      <tbody>
          
        
       
	   <?php
	   
	
	   $ctr = 1;
		foreach($result as $key => $get){
			$_create = ($get->_create != 1) ? 'disabled' : null;
			$_read = ($get->_read != 1) ? 'disabled' : null;
			$_update = ($get->_update != 1) ? 'disabled' : null;
			$_delete = ($get->_delete != 1) ? 'disabled' : null;
			$_export = ($get->_export != 1) ? 'disabled' : null;
			$_print = ($get->_print != 1) ? 'disabled' : null;
			$_create_ = ($modules[$get->module_id]['_create'] == 1) ? 'checked' : null;
			$_read_ = ($modules[$get->module_id]['_read'] == 1) ? 'checked' : null;
			$_update_ = ($modules[$get->module_id]['_update'] == 1) ? 'checked' : null;
			$_delete_ = ($modules[$get->module_id]['_delete'] == 1) ? 'checked' : null;
			$_export_ = ($modules[$get->module_id]['_export'] == 1) ? 'checked' : null;
			$_print_ = ($modules[$get->module_id]['_print'] == 1) ? 'checked' : null;
		
				
			?>
        <tr>
          <td><?=$get->module?></td>
          <td><input type="checkbox" name="<?="_".$get->module_id?>[_create]" value="<?=$get->_create?>" <?=$_create?> <?=$_create_?> /></td>
          <td><input type="checkbox" name="<?="_".$get->module_id?>[_read]" value="<?=$get->_read?>" <?=$_read?> <?=$_read_?> /></td>
          <td><input type="checkbox" name="<?="_".$get->module_id?>[_update]" value="<?=$get->_update?>"<?=$_update?> <?=$_update_?> /></td>
          <td><input type="checkbox" name="<?="_".$get->module_id?>[_delete]" value="<?=$get->_delete?>"<?=$_delete?> <?=$_delete_?> /></td>
          <td><input type="checkbox" name="<?="_".$get->module_id?>[_export]" value="<?=$get->_export?>"<?=$_export?> <?=$_export_?> /></td>
          <td><input type="checkbox" name="<?="_".$get->module_id?>[_print]" value="<?=$get->_print?>"<?=$_print?> <?=$_print_?> /></td>
       
	   </tr>
			<?php
		}
	   
	   ?>
      </tbody>
    </table>
				 <div class="form-actions">
	
					<input type="submit" class="btn btn-success" name="btn-submit" value="Create New" /> or <a href="javascript:history.back()">Cancel</a> 
					<!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>//-->
				</div>
		
		
	</form>	
</fieldset>

<script type="text/javascript">
$(document).ready(function(){
	var validator = $("#role-form").validate({
		rules: {
					
			role: {
				required: true,
				//remote: "<?=base_url('xadmin/role/create-new')?>"
			},
		
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
			$('input[type=submit]').attr('disabled', 'true');
			$(this).bind("keypress", function(e) { if (e.keyCode == 13) return false; });
			form.submit(form);
		}
	});
});
</script>