<div class="container-emp">

	<fieldset class="title-container">
		<legend>Vacation Leave </legend>
		<p>Vacation leave should be filed 2 weeks or 14 days prior</p>
		<div id="requestresult">
		<form action="<?=base_url('profile/my-request/vacation')?>" method="POST" class="form-horizontal" id="validate-form" enctype="multipart/form-data">
			
				<div class="control-group">
				<div class="clear clr" style="height:10px"></div>
					<label class="control-label" for="date_from"><span class="required">*</span> Date From :</label>
					<div class="controls">
					  <input type="text" id="date_from" name="date_from" readonly class="form-control col-md-3 alphanumeric-n isChange" style="float:left" value="<?=date("m/d/Y",strtotime("+".$vacation_prior['days_prior']." days",strtotime(date("m/d/Y"))))?>">
					   <span class="validation-status"></span>
					</div>
					<div class="clear clr" style="height:10px"></div>
					<label class="control-label" for="date_to"><span class="required">*</span> Date To :</label>
					<div class="controls">
					  <input type="text" id="date_to" name="date_to" readonly  class="form-control col-md-3 alphanumeric-n isChange" style="float:left" value="<?=date("m/d/Y",strtotime("+".$vacation_prior['days_prior']." days",strtotime(date("m/d/Y"))))?>">
					   <span class="validation-status"></span>
					</div>
					<div class="clear clr" style="height:10px"></div>
					<label class="control-label" for="reason"><span class="required">*</span> Reason :</label>
					<div class="controls">
						<textarea name="reason" id="reason"></textarea>
					   <span class="validation-status"></span>
					</div>
					<div class="clear clr" style="height:10px"></div>
					<label class="control-label"></label>
					<div class="controls">
						<button type="submit" class="btn btn-primary blue" name="sendrequest">Send Request</button>
					</div>
				  </div>
		</form>
		</div>
	</fieldset>
	
</div>

<link href="<?=base_url()?>assets/employee/bootstrap-datepicker/google-datepicker.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>assets/employee/bootstrap-datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<link href="<?=base_url()?>assets/employee/bootstrap-live2/bootstrap/bootstrap_extend.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>assets/employee/bootstrap-live2/scripts/innovaeditor.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/employee/bootstrap-live2/scripts/innovamanager.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	 
	var checkin = $('#date_from').datepicker({
	startDate: '+<?=$vacation_prior['days_prior']?>d',
	onClose: function( selectedDate ) {
        $( "#date_to" ).val(selectedDate).datepicker( "option", "minDate", selectedDate );
      }
	});
	
	$('#date_to').datepicker({
	startDate: '+<?=$vacation_prior['days_prior']?>d',
	onClose: function( selectedDate ) {
        $( "#date_from" ).datepicker( "option", "maxDate", selectedDate );
      }
	});
	
	
		  $('#reason').liveEdit({
				height: 350,
				css: ['<?=base_url()?>assets/employee/css/bootstrap.css', '<?=base_url()?>assets/employee/bootstrap-live2/bootstrap/bootstrap_extend.css'] /* Apply bootstrap css into the editing area */,
				groups: [
						["group1", "", ["Bold", "Italic", "Underline", "ForeColor", "RemoveFormat","Bullets", "Numbering", "Indent", "Outdent","Undo", "Redo"]],
					  
						] /* Toolbar configuration */
			});
			$('#reason').data('liveEdit').startedit();
		

	var validator = $("#validate-form").validate({
		rules: {
		
			reason:{
				required:true
			},date_from: {
				required: true,
			},date_to:{
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
			//$('button[type=submit]').attr('disabled', 'true');
			$(this).bind("keypress", function(e) { if (e.keyCode == 13) return false; });
			  var sHtml2 = $('#reason').data('liveEdit').getXHTMLBody();
			  sHtml2 = sHtml2.trim();
			 
					if(sHtml2==""){
						alert("Reason is required. Please state your reason.");
						$('#reason').focus();
					}else{
					
						$('button[type=submit]').attr('disabled', 'true');
						$.ajax({
							url: form.action,
							type: form.method,
							data: $(form).serialize(),
							success: function(response) {
								if (response > 0) {
									var htm = '<div class="alert alert-success alert-fade">Request was successfully sent. You will be notified after your request is confirmed.  <button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
									$('#requestresult').hide().html(htm).fadeIn('slow',function(){
										$('button[type=submit]').removeAttr('disabled');
									});
									
								};
							}            
						}) 
					}
					
			/*  */;
			// $(form).unbind('submit');
		}
	});
	})
</script>
