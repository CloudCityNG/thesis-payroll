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
       <input type="text" id="department" name="department" class="col-md-4 form-control" style="float:left" value="<?=$result['department']?>"><span class="validation-status pull-left"></span>
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
    <?php
      $bLabel = (strtolower($action)=='edit') ? 'Save changes' : 'Create';
      ?>
    <div class="form-actions" style="padding-left:20px">
	     <button type="submit" class="btn btn-primary blue"><?=$bLabel?></button>
	   </div>
</form>
</div>
</fieldset>
<script type="text/javascript">
$(document).ready(function(){
  $('.number').numeric();
  $('.alphanumeric-n').alpha({allow:". "});
  $('.alphanumeric').alphanumeric({allow:"., -'"});
  $('.alphanumeric-d').alphanumeric({allow:"-"});
  var validator = $("#validate-form").validate({
    rules: {
      department:{
        required:true,
       remote: "<?=base_url('xadmin/api/doesexists/')?><?=strtolower($action)?>/?current=<?=htmlentities($result['department'])?>&gConf=<?=$hashConfig?>"
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
        error.appendTo( element.parent().find('span.validation-status'));
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
						
						
				
	



