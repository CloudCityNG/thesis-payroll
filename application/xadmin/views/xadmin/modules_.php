<fieldset class="title-container">
<legend><i class="ico ico-<?=$user['permission']['_url']?>"></i>Modules</legend>
<form action="<?=base_url('xadmin/'.$user['permission']['_url'].'/'.strtolower($action))?>" method="POST" class="form-horizontal" id="form">
      <?php
      $action = ($action=='new-record') ? 'add' : 'edit';
      if(strtolower($action)=='edit'){
        ?>
        <input type="hidden" name="xparentmodule_id" id="xparentmodule_id" value="<?=$result['xparentmodule_id']?>" />
        <?php
      }
      ?>
      <table id="create-new-table"  class="table" style="font: 12px 'Arial';border:none!important">
        <thead>
          <tr>
            <th>Parent Label</th>
            <th>Module name</th>
            <th>URL</th>
            <th class="acl">Activated</th>
            <th class="acl">Create</th>
            <th class="acl">Read</th>
            <th class="acl">Update</th>
            <th class="acl">Delete</th>
            <th class="acl">Export</th>
            <th class="acl" style="width:35px!important">Print</th>
            <th class="acl" style="width:35px!important">Upload</th>
          </tr>
        </thead>
        <tbody> 
        <tr><td>
          <?=htmlSelect($label,'xparentlabel_id','xparentlabel_id','label','selectpicker show-tick',$result['xparentlabel_id'],false)?>
          
          </td>
          <td>
          <input type="text" style="width:230px" class="toUpperCase form-control" name="parentmodule" id="parentmodule" value="<?=(isset($result['parentmodule']) ? $result['parentmodule'] : null)?>" />
          </td>
          <td><input type="text" style="width:120px" class="form-control"   name="_xurl" id="_xurl" value="<?=(isset($result['_xurl']) ? $result['_xurl'] : null)?>" /></td>
          <td style="text-align:center"><center><?=createCheckBox('status',$result['status'])?></center></td>
          <td style="text-align:center"> <?=createCheckBox('_xcreate',$result['_xcreate'])?></td>
          <td style="text-align:center"> <?=createCheckBox('_xread',$result['_xread'])?></td>
          <td style="text-align:center"> <?=createCheckBox('_xupdate',$result['_xupdate'])?></td>
          <td style="text-align:center"> <?=createCheckBox('_xdelete',$result['_xdelete'])?></td>
          <td style="text-align:center"> <?=createCheckBox('_xexport',$result['_xexport'])?></td>
          <td style="width:35px!important;text-align:center"> <?=createCheckBox('_xprint',$result['_xprint'])?></td>
          <td style="width:35px!important;text-align:center"> <?=createCheckBox('_xupload',$result['_xupload'])?></td></tr>
        </tbody>
      </table>
    <div class="action-btn-container">
      <button type="submit" class="btn btn-sm btn-success" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> or <a href="javascript:history.back()">Cancel</a> 
      <!---or <a href="#" class="to-hide" data-hide="email-container">Cancel</a>//-->

  </form> 
</fieldset>

</fieldset>
<script type="text/javascript">
  $(document).ready(function(){
    var validator = $("#form").validate({
    rules: {
      xparentlabel_id:{
        required:true
      },parentmodule: {
        required: true,
        /*remote: "<?=base_url('xadmin/module/add')?>"*/
      },_xurl:{
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

						
						
				
	



