<fieldset class="title-container">
<legend class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i><?=(strtolower($action)=='edit') ? 'Update' : $action ?> Information</legend>
    <div class="form-actions">
	<?php
					if(strtolower($action)!="add" && $result['resume']!=""){
						?>
						<a href="<?=base_url()?>uploads/resume/<?=$result['resume']?>" class="button primary"><i class=" icon-arrow-down"></i> Download Resume</a>
						
						<?php
					}
				?>
			<button type="button" class="print_details button" rel="print_area" ><i class="icon-print"></i> Print Details</button>
  
    </div>
		
	
			<div id="print_area">
			<div class="span2 pull-left" style="margin-right: 30px;float:left">
				<?php
					$image = ($result['picture']=="avatar.jpg") ? 'assets/images/avatar.jpg' : 'uploads/'.$result['picture'];
					$class = ($result['picture']=="avatar.jpg") ? '' : 'img-polaroid';
					$px = "line-height: 8px;margin: 1px auto auto auto;font-size: 12px;font-weight: bold;";
					$spx = "width:120px;margin-left:10px";
					$keys = "width:120px;margin-left:10px;float:left";
					$vals = "float:left";
				?>
				<img src="<?=base_url().$image?>" class="<?=$class?>" style="width: 200px;"/>
			</div>
			<div class="pull-left span8" style="margin-left:0px;float:left">
				<h2><?=ucfirst($result['firstname'])?> <?=ucfirst($result['middlename'])?> <?=ucfirst($result['lastname'])?></h2>
				<fieldset style="margin-top: 10px;padding: 0;margin: 0;border: 0;">
				<legend class="labelx" style="font: bold 16px 'arial';display: block;width: 100%;padding: 0;margin-bottom: 10px;color: #333333;border: 0;border-bottom: 1px solid #e5e5e5;padding-bottom: 3px;">Company Information</legend>
				<div class="customx" style="<?=$px?>"><div style="<?=$keys?>">Company </div> <div style="<?=$$vals?>" class="clear-after">: <?=$result['company']?></div> <br class="clear"/></div>
				
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">Company Address </div> <div style="<?=$$vals?>">: <?=$result['company_address']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">Contact Number</div> <div style="<?=$$vals?>">: <?=$result['company_contactnumber']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">Email Address</div> <div style="<?=$$vals?>">: <?=$result['company_email']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">SSS #</div> <div style="<?=$$vals?>">: <?=$result['company_sss']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">TIN #</div> <div style="<?=$$vals?>">: <?=$result['company_tin']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">PHILHEALTH #</div> <div style="<?=$$vals?>">: <?=$result['company_philhealth']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">PAGIBIG #</div> <div style="<?=$$vals?>">: <?=$result['company_pagibig']?></div><br class="clear"/></div>
				</fieldset>
				
				
				<fieldset style="margin-top: 10px;padding: 0;margin: 0;border: 0;">
				<legend class="labelx" style="font: bold 16px 'arial';display: block;width: 100%;padding: 0;margin-bottom: 10px;color: #333333;border: 0;border-bottom: 1px solid #e5e5e5;padding-bottom: 3px;">Personal Details</legend>
				<div class="customx" style="<?=$px?>"><div style="<?=$keys?>">ID Number </div> <div style="<?=$$vals?>" class="clear-after">: <?=$result['id_number']?></div> <br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div style="<?=$keys?>">Hire Date </div> <div style="<?=$$vals?>" class="clear-after">: <?=dateFormat($result['hire_date'],'F d, Y')?></div> <br class="clear"/></div>
				
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">Address </div> <div style="<?=$$vals?>">: <?=$result['address']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">Contact Number</div> <div style="<?=$$vals?>">: <?=$result['contactnumber']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">Email Address</div> <div style="<?=$$vals?>">: <?=$result['email']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">SSS #</div> <div style="<?=$$vals?>">: <?=$result['sss']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">TIN #</div> <div style="<?=$$vals?>">: <?=$result['tin']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">PAGIBIG #</div> <div style="<?=$$vals?>">: <?=$result['pagibig']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">PHILHEALTH #</div> <div style="<?=$$vals?>">: <?=$result['philhealth']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">Date of Birth</div> <div style="<?=$$vals?>">: <?=$result['dob']?> (<?=calculateBirthday($result['dob'])?> years old)</div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">Place of Birth</div> <div style="<?=$$vals?>">: <?=$result['pob']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">Contact Person</div> <div style="<?=$$vals?>">: <?=$result['contact_person']?></div><br class="clear"/></div>
				<div class="customx" style="<?=$px?>"><div class="span1x" style="<?=$keys?>">Number</div> <div style="<?=$$vals?>">: <?=$result['contact_person_number']?></div><br class="clear"/></div>
				</fieldset>
				
				<!---Work background-->
				
				<fieldset class="title-container" style="margin-top: 10px;padding: 0;margin: 0;border: 0;">
				<legend class="labelx" class="labelx" style="font: bold 16px 'arial';display: block;width: 100%;padding: 0;margin-bottom: 10px;color: #333333;border: 0;border-bottom: 1px solid #e5e5e5;padding-bottom: 3px;">Work Experience</legend>
					<?php
						if(count($workexperience)>0){
							foreach($workexperience as $k){
								?>
								<h5><span class="span1x"><?=$k->position?> </span></h5>
								<br style="clear:both" />
								<div class="customx"><div class="pull-left"><span class="span3x"><?=dateFormat($k->hired_date,'Y-m-d')?> - <?=dateFormat($k->end_date,'Y-m-d')?></span>:</div> <div class="pull-left" style="margin-left:4px"> <strong><?=$k->company?></strong></div><br style="clear:both" /></div>
								<?php
							}
						}
					
					?>
					
			
				</fieldset>
				<!---educational background-->
				
				<fieldset class="title-container" style="margin-top: 10px;padding: 0;margin: 0;border: 0;">
				<legend class="labelx" class="labelx" style="font: bold 16px 'arial';display: block;width: 100%;padding: 0;margin-bottom: 10px;color: #333333;border: 0;border-bottom: 1px solid #e5e5e5;padding-bottom: 3px;">Educational Background</legend>
								<h5><span class="span1x">Tertiary </span></h5>
								<br style="clear:both" />
					<?php
						if(count($tertiary)>0){
							foreach($tertiary as $k){
								?>
								<div class="customx"><div class="pull-left"><span class="span2x"><?=$k->ter_from?> - <?=$k->ter_to?></span>:</div> <div class="pull-left" style="margin-left:4px"> <strong><?=$k->ter_school?></strong><br /><span><?=$k->ter_school?></span></div><br style="clear:both" /></div>
								<?php
							}
						}
					
					?>
					<h5><span class="span1x">Secondary </span></h5>
								<br style="clear:both" />
								<div class="customx"><div class="pull-left"><span class="span2x"><?=$result['secondary_from_date']?> - <?=$result['secondary_to_date']?></span>:</div> <div class="pull-left" style="margin-left:4px"> <strong> <?=$result['secondary']?></strong><br /><span><?=$result['secondary_address']?></span></div><br style="clear:both" /></div>
					<h5><span class="span1x">Primary </span></h5>
								<br style="clear:both" />
								<div class="customx"><div class="pull-left"><span class="span2x"><?=$result['primary_from_date']?> - <?=$result['primary_to_date']?></span>:</div> <div class="pull-left" style="margin-left:4px"> <strong> <?=$result['_primary']?></strong><br /><span><?=$result['primary_address']?></span></div><br style="clear:both" /></div>
								
				</fieldset>
				
					<!---Character References-->
				
				<fieldset class="title-container" style="margin-top: 10px;padding: 0;margin: 0;border: 0;">
				<legend class="labelx" class="labelx" style="font: bold 16px 'arial';display: block;width: 100%;padding: 0;margin-bottom: 10px;color: #333333;border: 0;border-bottom: 1px solid #e5e5e5;padding-bottom: 3px;">Character References</legend>
					<ul>
					<?php
						if(count($character_references)>0){
							foreach($character_references as $k){
								?>
								<li><strong><?=$k->ref_fullname?></strong> 
								<br style="clear:both" />
								<div class="customx"><strong style="margin-left: 50px;"><?=$k->ref_company?></strong><br /><span class="span3x"><?=$k->ref_position?><br /> <?=$k->ref_contact_number?></span></div>
								<br style="clear:both" />
								</li>
								<?php
							}
						}
					
					?>
					</ul>
			
				</fieldset>
				
				<fieldset class="title-container" style="margin-top: 10px;padding: 0;margin: 0;border: 0;">
				<legend class="labelx" class="labelx" style="font: bold 16px 'arial';display: block;width: 100%;padding: 0;margin-bottom: 10px;color: #333333;border: 0;border-bottom: 1px solid #e5e5e5;padding-bottom: 3px;">Remarks</legend>
					<ul>
					<?php
						if(count($remarks)>0){
							foreach($remarks as $k){
								?>
								<li><strong><?=dateFormat($k->date_recorded,'F d,Y H:i:s')?></strong> 
								<br style="clear:both" />
								<div class="customx"><strong style="margin-left: 50px;"><?=$k->remarks?></strong></div>
								<br style="clear:both" />
								</li>
								<?php
							}
						}
					
					?>
					</ul>
			
				</fieldset>
			</div>
			<br style="clear:both" />
		</div>
			<div class="span2 pull-left" style="margin-right: 30px">
			
			</div>
			<div class="pull-left span8" style="margin-left:0px">
					<fieldset class="title-container">
				<legend class="labelx" >Add Remarks</legend>
					<form action="" method="POST">
					<textarea rows="5" class="span8" name="remarks"></textarea>
					 <button type="file" class="button primary" name="btn-submit"><i class="icon-plus-sign icon-white"></i> Attachment</button>
					 <button type="submit" class="button" name="btn-submit"><i class="icon-plus-sign"></i> Submit Remarks</button>
					</form>
			
				</fieldset>
					
			</div>
			<br style="clear:both" />
    <div class="form-actions">
	<?php
					if(strtolower($action)!="add" && $result['resume']!=""){
						?>
						<a href="<?=base_url()?>uploads/resume/<?=$result['resume']?>" class="button primary"><i class=" icon-arrow-down"></i> Download Resume</a>
						
						<?php
					}
				?>
			<button type="button" class="print_details button" rel="print_area" ><i class="icon-print"></i> Print Details</button>
  
    </div>
		

</fieldset>

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.PrintArea.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 $('.print_details').click(function(){
	var container = $(this).attr('rel');
		$('#' + container).printArea();
		return false;
 });
 
 

});
</script>

<style type="text/css">

	select#reference_id{width: 180px!important}
	input.error,select.error{border: 1px solid red!important}
	.validation-status{display:none}
	.line-height-zero{line-height:0px;margin-top: 5px;}
	fieldset legend.labelx{font-size: 16px;}
	.datepicker{width: 220px;}
	.span1x{width:120px;margin-left:10px}
	.span2x{width:120px;margin-left: 50px;}
	.span3x{width: 145px;margin-left: 50px;}
	p.customx{line-height: 15px;margin: 1px auto auto auto;font-size: 12px;font-weight: bold;}

</style>