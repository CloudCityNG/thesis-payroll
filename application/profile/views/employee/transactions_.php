<fieldset class="title-container">
<legend><i class="custom-icon-<?=$data['permission']['url']?> pull-left"></i> Transactions <br> <small> View all transaction with a detailed information</small></legend>
<form action="<?=base_url('xadmin/transactions/'.strtolower($action))?>" method="POST" class="form-horizontal" id="validate-form">
<p class="alert alert-info" style="margin-top:10px"><span class="required">*</span> Indicates fields are required</p>
				<div class="" id="email-container">
					<input type="hidden" id="transactions_id" name="transactions_id" value="<?=$result['transactions_id']?>" />
						<div class="control-group">
							<label class="control-label" for="clients_id">Select Client <span class="required">*</span></label>
							<div class="controls">
								<select name="clients_id" id="clients_id" class="form-control show-tick " style="float:left">
									
									 <option value="">Select Client</option>
									<?php
										foreach($clients as $k => $v){
										$selected = ($result['clients_id']==$v->clients_id) ? "selected" : null;
										?>
										 <option value="<?=$v->clients_id?>" <?=$selected?>><?=$v->clients?></option>
										<?php
										}
									
									?>
								
							  </select>
							 <span class="validation-status pull-left"></span>
							</div>
						  </div>

					<div class="control-group">
						<label class="control-label" for="purchase_number">Purchase No. <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="purchase_number" name="purchase_number" class="col-md-4 form-control number" style="float:left" value="<?=$result['purchase_number']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					    <div class="control-group">
						<label class="control-label" for="reference_number">Reference No. <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="reference_number" name="reference_number"  class="col-md-4 form-control number" style="float:left" value="<?=$result['reference_number']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					<div class="control-group">
						<label class="control-label" for="amount">Amount <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="amount" name="amount" class="col-md-4 form-control number" style="float:left" value="<?=$result['amount']?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
					   <div class="control-group">
						<label class="control-label" for="_date">Date <span class="required">*</span></label>
						<div class="controls">
						  <input type="text" id="_date" name="_date"  class="col-md-3 form-control" style="float:left" readonly value="<?=isset($result['_date']) ? date("m/d/Y",strtotime($result['_date'])) : ""?>"><span class="validation-status pull-left"></span>
						</div>
					  </div>
						 <div class="control-group">
								<label class="control-label" for="contactnumber">Terms of Payment <span class="required">*</span></label>
								<div class="controls">
						<select name="payment_terms" id="payment_terms" class="form-control show-tick " style="float:left">
									
									 <option value="">Select Payment Terms</option>
									<?php
										$Terms =  array(5,10,15,20,25,30);
										foreach($Terms as $k){
										$selected = ($result['payment_terms']==$k) ? "selected" : null;
										?>
										 <option value="<?=$k?>" <?=$selected?>><?=$k?> days</option>
										<?php
										}
									
									?>
								
							  </select>
							</div>
						</div>
						 <div class="control-group">
								<label class="control-label" for="payment_status">Payment Status </label>
								<div class="controls">
						<select name="payment_status" id="payment_status" class="form-control show-tick " style="float:left">
									<?php
										$payment_status =  array("Pending","Paid");
										foreach($payment_status as $k){
										$selected = ($result['payment_status']==$k) ? "selected" : null;
										?>
										 <option value="<?=$k?>" <?=$selected?>><?=$k?></option>
										<?php
										}
									
									?>
								
							  </select>
							</div>
						</div>
					
				</div>
				
			
					
    <div class="form-actions">
			<button type="submit" class="btn btn-primary" name="btn-submit"><?=(strtolower($action)== 'add') ? 'Create New' : 'Save Changes'?></button> <button type="reset" class="btn btn-default">Clear</button>
  
    </div>
		
	</form>	
</fieldset>
<style type="text/css">
.form-horizontal .control-group {
margin-bottom: 10px!important;
}
.btn-group.bootstrap-select{margin-left: 0px!important;}
	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
</style>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/ver3.0/css/')?>google-datepicker.css">
<script type="text/javascript" src="<?=base_url('assets/ver3.0/js/')?>bootstrap-datepicker.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.number').numeric();
	$('.alphanumeric-n').alpha();
	$('.alphanumeric').alphanumeric({allow:"., -"});
	$('.alphanumeric-d').alphanumeric({allow:"-"});
	$('#_date').datepicker();

	$('#mobile_number').mask("9999-9999999");
	    $('#telephone_number').mask("999-99-99");

	var validator = $("#validate-form").validate({
		rules: {
			clients:{
				required:true
			},purchase_number:{
				required:true
			},reference_number:{
				required:true,
			},_date:{
				required:true,
			},mobile_number:{
				required:true
			},clients_id:{
				required:true
			},payment_terms:{
				required:true
			},amount:{
				required:true
			}
		
		},messages:{
		
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
		//$("#validate-form").submit();
	});

});

</script>

<style type="text/css">

</style>