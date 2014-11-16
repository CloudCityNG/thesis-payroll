<fieldset class="title-container">
<legend><i class="fa fa-user"></i> <?=ucwords($user['permission']['module'])?></legend>
<div id="result"></div>

<?=isset($success) ? showMessage($success) : null;?>
<div class="res-container-x">
<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="validate-form">
<input type="hidden" name="employee_id" value="<?=$result['employee_id']?>">
     
    <fieldset class="fieldset-group">
    <legend>Basic Information</legend>
<?=showMessageSmall('<strong>Note : </strong><span class="required">*</span>  Indicates fields are required.','warning')?>
      <div class="form-group">
          <label class="col-sm-3 control-label ckey"><span class="required">*</span> Upload Picture</label>
          <div class="col-sm-7">
           <?php
              $avatar = ($result['avatar']=="") ? base_url()."media/images/no_avatar.jpg" : base_url()."uploads/avatar/".$result['avatar'];
              $avatarx = ($result['avatar']=="") ? "no_avatar.jpg" : $result['avatar'];
            ?>
            <img src="<?=$avatar?>" id="img_preview" class="img-thumbnail" style="width:100px;margin-right:10px" />
            <a href="#uploadModal" id="uploadBTN" data-toggle="modal" class="btn btn-default"><i class="fa fa-upload"></i> Upload Picture</a>
            <br class="clear" /><br />
            <input type="hidden" id="avatar" name="avatar" value="<?=$avatarx?>" />
            
          </div>
        </div> 

      <div class="box-left">
         
        <div class="form-group">
          <label class="col-sm-3 control-label ckey">Employee Number</label>
          <div class="col-sm-3">
            <input type="text" id="eid" name="eid" class="col-md-2 number form-control" readonly style="float:left;background:#fff" value="<?=$result['eid']?>"><span class="validation-status pull-left"></span>
            </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label ckey"><span class="required">*</span> Hire Date</label>
          <div class="col-sm-5">
            <input type="text" id="hire_date" name="hire_date" readonly class="col-md-2 form-control alphanumeric-n" style="float:left;background: #fff;cursor: pointer;" value="<?=isset($result['hired_date']) ? date("m/d/Y",strtotime($result['hired_date'])) : date("m/d/Y")?>">
          </div>
        </div>

      <div class="form-group">
        <label class="col-sm-3 control-label ckey"><span class="required">*</span> Position</label>
        <div class="col-sm-7">
            <select name="position_id" id="position_id" class="form-control col-md-4 show-tick" required="" style="float:left">
                      
                       <option value="">Select Position</option>
                      <?php
                        foreach($position as $k => $v){
                        $selected = ($result['position_id']==$v->position_id) ? "selected" : null;
                        ?>
                         <option value="<?=$v->position_id?>" <?=$selected?>><?=$v->position?></option>
                        <?php
                        }
                      
                      ?>
                    
                    </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label ckey"><span class="required">*</span> First Name</label>
        <div class="col-sm-7">
         <input type="text" id="firstname" name="firstname" class="col-md-4 form-control alphanumeric-n" style="float:left" value="<?=$result['firstname']?>">
           </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label ckey"><span class="required">*</span> Middle Name</label>
        <div class="col-sm-7">
        <input type="text" id="middlename" name="middlename"  class="col-md-4 form-control alphanumeric-n" style="float:left" value="<?=$result['middlename']?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label ckey"><span class="required">*</span> Last Name</label>
        <div class="col-sm-7">
         <input type="text" id="lastname" name="lastname"  class="col-md-4 form-control alphanumeric-n" style="float:left" value="<?=$result['lastname']?>">
        </div>
      </div>  
      
        <div class="form-group">
        <label class="col-sm-3 control-label ckey"><span class="required">*</span> Monthly Rate</label>
        <div class="col-sm-5">
     
                      <select class="form-control col-md-4 show-tick" name="rate"  class="col-md-4 form-control numberx" style="float:left" value="<?=$result['rate']?>">
                    <option value=""> Monthly Rate</option>
                    <option value="10000" <?=(strtolower($result['Monthly Rate'])=='10')? 'selected' : null?>> 10000</option>
                    <option value="15000" <?=(strtolower($result['Monthly Rate'])=='15000')? 'selected' : null?>> 15000</option>
					 <option value="20000" <?=(strtolower($result['Monthly Rate'])=='20000')? 'selected' : null?>> 20000</option>
                    <option value="25000" <?=(strtolower($result['Monthly Rate'])=='25000')? 'selected' : null?>> 25000</option>
					<option value="30000" <?=(strtolower($result['Monthly Rate'])=='30,000 - above')? 'selected' : null?>> 30000</option>
                   
                </select>
		 
		 
		 
		 
		 
        </div>
      </div> 
       
        </div>

        <div class="box-left">
            <div class="form-group">
              <label class="col-sm-3 control-label ckey"><span class="required">*</span> Mobile Number</label>
              <div class="col-sm-7">
                <div class="input-group">
                  <span class="input-group-addon">+639</span>
                  <input type="text" class="form-control col-md-3 numeric number" id="mobile_number" name="mobile_number" maxlength="9" value="<?=$result['mobile_number']?>" />
                </div>
                <br />
               </div>

            <div class="form-group">
              <label class="col-sm-3 control-label ckey"><span class="required">*</span> Civil Status</label>
              <div class="col-sm-5">
                <select class="form-control col-md-4 show-tick" name="civil_status" id="civil_status">
                    <option value=""> Select Status</option>
                    <option value="Single" <?=(strtolower($result['civil_status'])=='single')? 'selected' : null?>> Single</option>
                    <option value="Married" <?=(strtolower($result['civil_status'])=='married')? 'selected' : null?>> Married</option>
                </select>

              </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label ckey">Address</label>
                <div class="col-sm-7">
                <input type="text" class="form-control col-md-3" id="address1" name="address1" placeholder="House No., Street" value="<?=$result['address1']?>" /></div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label ckey"></label>
                <div class="col-sm-7">
                <input type="text" class="form-control col-md-3" id="address2" name="address2" placeholder="Brgy or Zone"  value="<?=$result['address2']?>" /></div>
              </div>

               <div class="form-group">
                <label class="col-sm-3 control-label ckey"></label>
                <div class="col-sm-7">
                <input type="text" class="form-control col-md-3" id="address3" name="address3" placeholder="City, Country"  value="<?=$result['address3']?>" /></div>
              </div>

        </div>
      </fieldset>
   



     <fieldset class="fieldset-group">
    <legend>Personal Information</legend>
  <div class="box-left">
      <div class="form-group _s">
        <label class="col-sm-3 control-label ckey" style=""><span class="required">*</span> Social Security (SSS)</label>
        <div class="col-sm-7">
        <input type="text" class="form-control col-md-3" id="_sss" name="_sss" value="<?=$result['_sss']?>" />
        <span class="validation-status" id="_sssv"></span>
        </div>
      </div>

      <div class="form-group _s">
        <label class="col-sm-3 control-label ckey"><span class="required">*</span> Philhealth</label>
        <div class="col-sm-7">
        <input type="text" class="form-control col-md-3" id="_philhealth" name="_philhealth" value="<?=$result['_philhealth']?>" />
         <span class="validation-status" id="_sssv"></span>
        </div>
      </div>

       <div class="form-group _s">
        <label class="col-sm-3 control-label ckey"><span class="required">*</span> Pagibig</label>
        <div class="col-sm-7">
        <input type="text" class="form-control col-md-3" id="_pagibig" name="_pagibig" value="<?=$result['_pagibig']?>" />
           <span class="validation-status" id="_sssv"></span>
        </div>
      </div>

      <div class="form-group _s">
        <label class="col-sm-3 control-label ckey"><span class="required">*</span> TIN</label>
        <div class="col-sm-7">
        <input type="text" class="form-control col-md-3" id="_tin" name="_tin" value="<?=$result['_tin']?>" />
         <span class="validation-status" id="_sssv"></span>
        </div>
      </div>
  </div>
  <div class="box-left" style="width:545px">

   
    <div class="form-group _s">
        <label class="col-sm-3 control-label ckey"><span class="required">*</span> Username/Email address</label>
        <div class="col-sm-7 clearfix">
        <input type="text" id="email" name="email" class="col-md-2 form-control" style="float:left;width:140px;border-right:0" value="<?=$result['email']?>">
        <select class="form-control" name="email_extension" id="email_extension" style="float:left;width:140px;">
          <option value="@gmail.com">@gmail.com</option>
          <option value="@hotmail.com">@hotmail.com</option>
          <option value="@yahoo.com">@yahoo.com</option>
        </select>
        <span class="validation-status" id="_sssv"></span>
        </div>
      </div>
	  
	  
	  
	  
	  
      <div class="form-group">
        <label class="col-sm-3 control-label ckey"><span class="required">*</span> Password</label>
        <div class="col-sm-7">
       <?php
                  if($action!='Edit'){
                  
                  ?>
                  <input type="text" id="password" name="password" class="col-sm-3 form-control" style="float:left;width:150px" placeholder="Atleast 6 character">
                <button type="button" id="generate" class="btn btn-warning btn-sm tTip" data-placement="top" title="Generate Password" style="float: left;margin-right: -43px;margin-left: 5px;"><i class="fa fa-refresh" style="color:#fff"></i></button>
                  <?php
                  }else{
                  ?>
                  <input type="button" id="resetPassword" name="resetPassword" value="Reset Password" class="btn btn-warning btn-sm">
                
                  <?php
                  } 
                
                ?>
         </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label ckey">Account Status</label>
        <div class="col-sm-7">
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
  </div>
  <br class="clear"/>
    </fieldset>
    <?php
      $bLabel = (strtolower($action)=='edit') ? 'Save changes' : 'Submit';
      ?>
    <div class="form-actions" style="padding-left:20px">
       <button type="submit" class="btn btn-primary blue"><?=$bLabel?></button>
	     <button type="reset" class="btn btn-default">Clear</button>
	   </div>

    

</form>
</div>
</fieldset>

 <div id="success-popup" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
      <div class="modal-dialog" style="width:350px;margin-top: 15%;">
      <div class="modal-header">
		 <h4 class="modal-title" style="color:#333">Successful</h4>
      </div>
      <div class="modal-body">
        <p style="">Record was successfully added.</p>
        
      </div>
      <div class="modal-footer" style="text-align:center;margin-top:0px">
        <a href="<?=base_url()?>xadmin/employees/" class="btn btn-primary btn-sm pull-right" style="margin-left: 5px;">View All</a>
        <a href="#vew-employee" id="view-employee" class="btn btn-primary btn-sm pull-right">View Employee</a>
        <a href="<?=base_url()?>xadmin/employees/new-record" class="btn btn-success btn-sm pull-right">Add New</a>
       
      </div>
    </div>
</div>


 <div id="uploadModal" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
      <form name="thumbnail" id="uploadfrm" action="<?=base_url()?>xadmin/employees/upload" method="post"  enctype="multipart/form-data">
      <div class="modal-dialog" style="width:700px;margin-top: 5%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Upload picture</h4>
      </div>
      <div class="modal-body">
      <input type="file" name="img" id="imginput" style="display:none" />

    <div class="upload">
      <div class="file-preview" style="width: 660px;height:300px;float:left;overflow:hidden;margin-top: 10px;">
        <img src="<?=base_url()?>media/images/defult.jpg" id="img" />
        
      </div>

     <!--  <div style="margin-left:15px;border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width:200px; height:200px;margin-top: 10px;" id="previewimage">
          <img src="<?=base_url()?>media/images/defult.jpg" style="position: relative;" alt="Thumbnail Preview" id="preview" />
      </div> -->
      <br class="clear" />
    </div>

       <div id="preview-pane">
        <div class="preview-container">
          <img src="<?=base_url()?>media/images/defult.jpg" class="jcrop-preview" alt="Preview" />
        </div>
      </div>
      <br class="clear" />
     
  </div>
      <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancel</button>
            <button type="submit" id="yesDone" class="btn btn-primary btn-sm">Done</button>
      
      </div>
    </div>
<input type='hidden' name="y" id="y" value=""/>
    <input type='hidden' name="x" id="x" value=""/>
    <input type='hidden' name="h" id="h" value=""/>
    <input type='hidden' name="w" id="w" value=""/>
    <input type='hidden' name="i" id="i" value="new"/>

    </form>
    </div>


<script type="text/javascript" src="<?=base_url()?>media/js/datepicker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/js/datepicker/google-datepicker.css" />
<script type="text/javascript" src="<?=base_url()?>media/js/jcrop/jquery.Jcrop.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/js/jcrop/jquery.Jcrop.css" />
<?php
$tbl = '_temployee';
$_sss = array('iColumn'=>'_sss','tName'=>$tbl);
$_philhealth = array('iColumn'=>'_philhealth','tName'=>$tbl);
$_pagibig = array('iColumn'=>'_pagibig','tName'=>$tbl);
$_tin = array('iColumn'=>'_tin','tName'=>$tbl);
$email = array('iColumn'=>'email','tName'=>$tbl);

      $_sssHash = base64_encode(serialize($_sss));
      $_philhealthHash = base64_encode(serialize($_philhealth));
      $_pagibigHash = base64_encode(serialize($_pagibig));
      $_tinHash = base64_encode(serialize($_tin));
      $email = base64_encode(serialize($email));
?>
<script type="text/javascript">
$(document).ready(function(){

  $('.number').numeric();
  $('.numberx').numeric({'allow':','});
  $('.alphanumeric-n').alpha({allow:". "});
  $('.alphanumeric').alphanumeric({allow:"., -'"});
  $('.alphanumeric-d').alphanumeric({allow:"-"});
  document.getElementById("validate-form").reset();
  var validator = $("#validate-form").validate({
    rules: {
      _sss:{
        required:true,
       remote: "<?=base_url('xadmin/api/coldoesexists/')?><?=strtolower($action)?>/?current=<?=htmlentities($result['_sss'])?>&gConf=<?=$_sssHash?>"
      },
      _philhealth:{
        required:true,
       remote: "<?=base_url('xadmin/api/coldoesexists/')?><?=strtolower($action)?>/?current=<?=htmlentities($result['_philhealth'])?>&gConf=<?=$_philhealthHash?>"
      },
      _pagibig:{
        required:true,
       remote: "<?=base_url('xadmin/api/coldoesexists/')?><?=strtolower($action)?>/?current=<?=htmlentities($result['_pagibig'])?>&gConf=<?=$_pagibigHash?>"
      },
      _tin:{
        required:true,
       remote: "<?=base_url('xadmin/api/coldoesexists/')?><?=strtolower($action)?>/?current=<?=htmlentities($result['_tin'])?>&gConf=<?=$_tinHash?>"
      },
      email:{
        required:true,
        remote : {
            url : "<?=base_url('xadmin/employees/coldoesexists/')?><?=strtolower($action)?>/?current=<?=htmlentities($result['email'])?>&gConf=<?=$email?>",
            data : {
                email_extension : function(){
                    return $('#email_extension').val();
                }
            }
      
          }
        },
      /*remote: "<?=base_url('xadmin/api/coldoesexists/')?><?=strtolower($action)?>/?current=<?=htmlentities($result['email'])?>&gConf=<?=$email?>"
      */
      password:{
        required:true
      },hired_date:{
        required:true
      },
      firstname:{
        required:true
      },middlename:{
        required:true
      },lastname:{
        required:true
      },position_id:{
        required:true
      },civil_status:{
        required:true
      },mobile_number:{
        required:true
      }
    
    },messages:{ 
      _sss:{
        required:function(e){
          //  $('._s').css({"margin-bottom":"0px"});
        },
        remote: $.format("<strong>{0}</strong> is already exists.")
      }, _philhealth:{
         required:function(e){
            //$('._s').css({"margin-bottom":"0px"});
        },
        remote: $.format("<strong>{0}</strong> is already exists.")
      }, _pagibig:{
         required:function(e){
          //  $('._s').css({"margin-bottom":"0px"});
        },
        remote: $.format("<strong>{0}</strong> is already exists.")
      }, _tin:{
         required:function(e){
            //$('._s').css({"margin-bottom":"0px"});
        },
        remote: $.format("<strong>{0}</strong> is already exists.")
      },email:{
         required:function(e){
           // $('._s').css({"margin-bottom":"0px"});
        }, remote: $.format("<strong>{0}</strong> is already exists.")
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
      	 $.ajax({
		            url: form.action,
		            type: form.method,
		            data: $(form).serialize(),
		            success: function(response) {
						response = response.split('~@~');
		               	if (response[0] > 0) {
		               		var htm = '<div class="alert alert-success alert-fade">Employees Record was successfully added.  <button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
		               		//$('#result').hide().html(htm).fadeIn('slow',function(){
								$('#view-employee').attr('href','<?=base_url()?>xadmin/employees/view/'+response[1]);
								$('#success-popup').modal({
										show: true,
										keyboard: false,
										backdrop: 'static'
									});
		               		//});
		               		
		               	};
		            }            
		        });
    }
  });

  $('#uploadBTN').click(function(){
      $('#imginput').trigger('click');
  });


var files;
  $('input[type=file]').change(function(e) {
  files = e.target.files;
        if(typeof FileReader == "undefined") return true;
        var elem = $(this);
        var files = e.target.files;

        for (var i=0, file; file=files[i]; i++) {
          if (file.type.match('image.*')) {
                  if(elem.val()!=""){
                     $('#i').val('new');
                      $("#uploadfrm").ajaxForm({complete:function(xhr){
                            $('.file-preview img').attr({"src":""+xhr.responseText+""}).css({"width":"440px","background-color":"#000"});
                            $('#previewimage img').attr({"src":""+xhr.responseText+""}).css({"width":"440px"});
                      }}).submit();
                  }
             /* $("#uploadfrm").ajaxForm(
                 dataType:  'json',
                complete: function(xhr) {
                 $('.file-preview img').attr({"src":""+xhr.responseText+""}).css({"width":"440px","background-color":"#000"});
                  $('#previewimage img').attr({"src":""+xhr.responseText+""}).css({"width":"440px"});

                }).submit();*/
          /*  var reader = new FileReader();
            reader.onload = (function(theFile) {
              return function(e) {
                var image = e.target.result;
                previewDiv = $('.file-preview', elem.parent());
                bgWidth = previewDiv.width();
                //alert(bgWidth);
               $('.file-preview img').attr({"src":""+image+""}).css({"width":"440px","background-color":"#000"});
                $('#previewimage img').attr({"src":""+image+""}).css({"width":"440px"});
              };
            })(file);
            reader.readAsDataURL(file);*/
          }
        }
      });

 // Create variables (in this scope) to hold the API and image size
    var jcrop_api,
        boundx,
        boundy,

        // Grab some information about the preview pane
        $preview = $('#preview-pane'),
        $pcnt = $('#preview-pane .preview-container'),
        $pimg = $('#preview-pane .preview-container img'),

        xsize = $pcnt.width(),
        ysize = $pcnt.height();
    
    console.log('init',[xsize,ysize]);
    $('#img').Jcrop({
      onChange: updatePreview,
      onSelect: updatePreview,
      aspectRatio: 1
    },function(){
      // Use the API to get the real image size
      var bounds = this.getBounds();
      boundx = bounds[0];
      boundy = bounds[1];
      // Store the API in the jcrop_api variable
      jcrop_api = this;

      // Move the preview into the jcrop container for css positioning
      $preview.appendTo(jcrop_api.ui.holder);
    });

    function updatePreview(c)
    {
      if (parseInt(c.w) > 0)
      {
        var rx = xsize / c.w;
        var ry = ysize / c.h;

        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);

        $pimg.css({
          width: Math.round(rx * boundx) + 'px',
          height: Math.round(ry * boundy) + 'px',
          marginLeft: '-' + Math.round(rx * c.x) + 'px',
          marginTop: '-' + Math.round(ry * c.y) + 'px'
        });
      }
    };
/*
$('#uploadfrm').ajaxForm({
      dataType:  'json',
      complete: function(xhr) {
        $('#img_preview').attr('src',"<?=base_url()?>uploads/avatar/"+xhr.responseText);
        $('#avatar').val(xhr.responseText);
        $('#uploadModal').modal('hide');
      }
    }); */

$('#yesDone').click(function(){
    $('#i').val('old');
      $('#uploadfrm').ajaxForm({
      dataType:  'json',
      complete: function(xhr) {
        $('#img_preview').attr('src',"<?=base_url()?>uploads/avatar/"+xhr.responseText);
        $('#avatar').val(xhr.responseText);
        $('#uploadModal').modal('hide');
      }
    });
})


  $('#generate').click(function(){
     var text = "";
     var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      for( var i=0; i < 8; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));
        $('#password').val(text);
    });

  $('#email_extension').change(function(){
      $('#email').val("");
  });



});

</script>
						
						
				
	

<style type="text/css">
 #preview-pane {
/*  display: block;
  position: absolute;
  z-index: 2000;
*/  top: 10px;
/*  right: -280px;*/
  padding: 6px;
  border: 1px #ddd solid;
  background-color: white;
  float: right;
  margin-right: -220px;
}

/* The Javascript code will set the aspect ratio of the crop
   area based on the size of the thumbnail preview,
   specified here */
#preview-pane .preview-container {
  width: 200px;
  height: 200px;
  overflow: hidden;
}


.jcrop-tracker{
  border: 1px solid #ddd;
}
</style>

