<fieldset class="title-container">
<legend><i class="fa fa-user"></i> <?=ucwords($user['permission']['module'])?></legend>

<?=isset($success) ? showMessage($success) : null;?>
<?=showMessageSmall('<strong>Note : </strong><span class="required">*</span>  Indicates fields are required.','warning')?>
<div class="res-container">
<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="validate-form">
<input type="hidden" name="department_id" value="<?=$result['department_id']?>">
  <div class="form-group">
    <label class="col-sm-3 control-label ckey"><span class="required">*</span> Department</label>
    <div class="col-sm-5">
      <select name="department_id" id="department_id" class="col-md-4 form-control show-tick" style="float:left">
             <option value="">Select Positon</option>
          <?php
            foreach($department as $k => $v){
            $selected = ($result['department_id']==$v->department_id) ? "selected" : null;
            ?>
             <option value="<?=$v->department_id?>" <?=$selected?>><?=$v->department?></option>
            <?php
            }
          
          ?>
                
        </select>   
    </div>
  </div>

    <div class="form-group">
    <label class="col-sm-3 control-label ckey"><span class="required">*</span> Position</label>
    <div class="col-sm-6">
       <input type="text" id="position" name="position" class="col-md-5 form-control alphanumeric" style="float:left" value="<?=$result['position']?>">
   
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
 
    <div class="form-actions" style="padding-left:20px">
	     <button type="submit" class="btn btn-primary blue" name="btn_success">Save changes</button>
	   </div>
</form>
</div>
</fieldset>
<script type="text/javascript">
$(document).ready(function(){
  $('.number').numeric();
  $('.alphanumeric-n').alpha({allow:". "});
  $('.alphanumeric').alphanumeric({allow:"., -"});
  $('.alphanumeric-d').alphanumeric({allow:"-"});
  var validator = $("#validate-form").validate({
    rules: {
      department_id:{
        required:true,
      },
       position:{
        required:true,
      }
    
    },messages:{ 
      department_id:{
        //remote: $.format("<strong>{0}</strong> is already exists.")
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
						
						
				
	



