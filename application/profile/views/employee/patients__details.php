<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Patients Check up details</legend>
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
					 <h4>Check up details</h4>
					 	<div class="control-group">
						<label class="control-label" for="firstname"><strong>Illness :</strong></label>
						<div class="controls" style="padding-top:5px">
								<?=$result['illness']?>
						  </div>
						  <br style="clear:both" />
						  <label class="control-label" style="margin-top: -15px;margin-bottom: 0px;"><strong>General Purpose:</strong></label>
							<div class="controls" style="padding-top:5px;margin-top: -15px;margin-bottom: 0px;">
								<?=$result['general_appearance']?>
						  </div>
						   <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Height :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=$result['height']?></strong>
						  </div>
						  <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Weight :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=$result['weight']?></strong>
						  </div>
						  
						   <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Blood Pressure :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=$result['blood_pressure']?></strong>
						  </div>
						  
						   <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Skin and Mucossa :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=$result['skin_mucossa']?></strong>
						  </div>
						  
						   <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Eyes :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=$result['eyes']?></strong>
						  </div>
						  
						   <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Pharynx :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=$result['pharynx']?></strong>
						  </div>
						  
						   <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Tonsils :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=$result['tonsils']?></strong>
						  </div>
						  
						   <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Teeth and Gums :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=$result['teeth_gums']?></strong>
						  </div>
						  
						   <br style="clear:both" />
						  <label class="control-label" style="margin-top: -25px;margin-bottom: 0px;">Ears and Throat :</label>
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong><?=$result['ears_throat']?></strong>
						  </div>
						  
						 
					  </div>
					 
					 
							<div class="controls" style="padding-top:5px;margin-top: -25px;margin-bottom: 0px;">
								<strong></strong>
						  </div>
						  <br />
						
					</div>		
 <div class="form-actions">
			<a href="javascript:history.back()" class="btn" ><i class="icon-circle-arrow-left"></i> Back</a> <a href="javascript:print_summary()" class="btn btn-primary" ><i class="icon-print icon-white"></i> Print Details</a>
  
    </div>
		   
	</form>	
</fieldset>

<script type="text/javascript">
$(document).ready(function(){
	
	
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