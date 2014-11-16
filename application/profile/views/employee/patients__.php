<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Patients</legend>
	<?//=base_url('xadmin/patients/'.strtolower($action))?>
<form action="" method="POST" class="form-horizontal" id="validate-form">
<div id="print_area">
<link href="<?=base_url('public');?>/admin/css/loader.css" rel="stylesheet" type="text/css">
<?php
//print_pre($result);
?>
					<div class="control-group">
						<label class="control-label" for="firstname">Patient Name :</label>
						<div class="controls" style="padding-top:5px">
								<strong style="font-size:16px;"><?=ucwords($result['lastname']).". ".ucwords($result['firstname'])?></strong>
						  </div>
						  <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Registered Since :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=date('d F Y',strtotime($result['date_registered']))?></strong>
						  </div>
						   <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Control ID :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=$result['control_id']?></strong>
						  </div>
					  </div>
					  
					  <div class="form-actions">
								<a href="<?=base_url('xadmin/patients')?>" class="btn" ><i class="icon-circle-arrow-left"></i> Back</a> <a href="javascript:void(0);" class="btn btn-success" id="add_history">Add Check up</a></div>
					<br />
					
					<div id="history_form" style="margin-bottom:10px;display:none;width:100%">
					
					 
					 <div class="control-group">
						<label class="control-label" for="weight">Weight <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="weight" name="weight" class="span2 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					  <div class="control-group">
						<label class="control-label" for="height">Height <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="height" name="height" class="span2 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					   <div class="control-group">
						<label class="control-label" for="blood_pressure">Blood Pressure <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="blood_pressure" name="blood_pressure" class="span4 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					   
					   <div class="control-group">
						<label class="control-label" for="skin_mucossa">Skin and Mucossa <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="skin_mucossa" name="skin_mucossa" class="span4 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>

					  <div class="control-group">
						<label class="control-label" for="eyes">Eyes <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="eyes" name="eyes" class="span2 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					   <div class="control-group">
						<label class="control-label" for="pharynx">Pharynx <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="pharynx" name="pharynx" class="span2 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					  
					   <div class="control-group">
						<label class="control-label" for="tonsils">Tonsils <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="tonsils" name="tonsils" class="span2 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					   <div class="control-group">
						<label class="control-label" for="teeth_gums">Teeth and Gums <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="teeth_gums" name="teeth_gums" class="span2 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					   
					   <div class="control-group">
						<label class="control-label" for="ears_throat">Ears and Throat <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="ears_throat" name="ears_throat" class="span2 alphanumeric" style="float:left"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					  
					  
					   <div class="control-group">
						<label class="control-label" for="general_appearance">General Appearance<span class="required">*</span></label>
						<div class="controls">
							  <textarea id="general_appearance" rows="2" cols="30" name="general_appearance"></textarea>
						
						  </div>
					  </div>
					  
					  
					  <div class="control-group">
						<label class="control-label" for="illness">Illness<span class="required">*</span></label>
						<div class="controls">
							  <textarea id="illness" rows="2" cols="30" name="illness"></textarea>
						
						  </div>
					  </div>
					<input type="hidden" name="patient_id" id="patient_id" value="<?=$result['patient_id']?>" />
					    <div class="form-actions">
								<a href="#" class="btn" id="cancel" ><i class="icon-circle-arrow-left"></i> Cancel</a>

								<button type="submit" class="btn btn-primary"  name="submit-btn" id="submit-btn">Submit </button> <button type="reset" class="btn btn-primary" name="clear" id="clear" >Clear</button>
								</div>
						
					  
					  
					</div>
					<br />
					 <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;"><strong>Check up History</strong></label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong></strong>
						  </div>
						  <br />
						  <table class="table table-striped table-bordered">
						  <thead>
						  <th>#</th>
						  <th class="">Illness</th>
						  <th class="">General Purpose</th>
						  <th class="">Date</th>
						  <th class="">Action</th>
						  
								</thead>
								
									<tbody>
	<?php
	//print_r($history);
		$ctr = 1;
		foreach($history as $k =>$v){
			
		echo "<tr id='delete_".$v->id."'><td style='width:20px'>".($ctr++)."</td><td class='align-left'>".$v->illness."</i></td><td class='align-left'>".$v->general_appearance."</i></td><td>".date('F j, Y',strtotime($v->created_at))."</td><td valign='center'><a href='".base_url('xadmin/patients/details/'.genKey($v->history_id))."' class='btn btn-primary'>View Details</a></tr>";
		}
			
			
			?>
		</tbody>
						  </table>
					</div>		
 <div class="form-actions">
			<a href="<?=base_url('xadmin/patients')?>" class="btn" ><i class="icon-circle-arrow-left"></i> Back</a>
  
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
	$('#birthdate').datepicker({minDate:1});
	$('.mask').mask("999-99-99");
	
	$('#illness').liveEdit({
            height: 50,
            css: ['<?=base_url();?>bootstrap/css/bootstrap.min.css', '<?=base_url();?>bootstrap/bootstrap_extend.css'] /* Apply bootstrap css into the editing area */,
            groups: [
					["group5", "", ["Undo", "Redo"]],
                    ["group1", "", ["Bold", "Italic", "Underline", "ForeColor", "RemoveFormat","Bullets"]],
                     ["group2", "", ["Bullets", "Numbering", "Indent", "Outdent"]],
                    ["group3", "", ["Paragraph", "FontSize", "FontDialog", "TextDialog"]],
                    ["group4", "", ["LinkDialog", "ImageDialog", "TableDialog", "Emoticons", "Snippets"]],
                    ["group5", "", ["Undo", "Redo", "FullScreen", "SourceDialog"]] 
                    ] /* Toolbar configuration */
        });
        $('#illness').data('liveEdit').startedit();
		
		$('#general_appearance').liveEdit({
            height: 50,
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

        $('#general_appearance').data('liveEdit').startedit();
		
		$('#add_history').click(function(){
		
			$('#history_form').css({'display':'inline-block'})
		});
		
		$('#cancel').click(function(){
		
			$('#history_form').css({'display':'none'})
		});
	
	var validator = $("#validate-form").validate({
		rules: {
			weight:{
				required:true
			},height:{
				required:true
			},blood_pressure:{
				required:true,
				
			},skin_mucossa:{
				required:true
			},eyes:{
				required:true
			},pharynx:{
				required:true
			},tonsils:{
				required:true
				
			},philhealth:{
				required:true,
				
			},teeth_gums:{
				required:true,
				
			},ears_throat:{
				required:true,
				
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
			var xhtml = $('#illness').data('liveEdit').getXHTMLBody();
			var xhtml2 = $('#general_appearance').data('liveEdit').getXHTMLBody();
			$('#illness').val(xhtml);
			$('#general_appearance').val(xhtml2);
			$('button[type=submit]').attr('disabled', 'true');
			$(this).bind("keypress", function(e) { if (e.keyCode == 13) return false; });
			form.submit(form);
		}
	});

	$('#reset-employeer').click(function(){
		$("#validate-form").submit();
	});
	
});
function print_summary(){
	$('#print_area').jqprint({ operaSupport: false });
}

    function save() {
        var sHtml = $('#content').data('liveEdit').getXHTMLBody(); //Use before finishedit()
        alert(sHtml); /*You can use the sHtml for any purpose, eg. saving the content to your database, etc, depend on you custom app */

        var sHtml2 = $('#content2').data('liveEdit').getXHTMLBody();
        alert(sHtml2); 
    }
</script>

<style type="text/css">
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
	.datepicker{width: 200px!important;}
</style>