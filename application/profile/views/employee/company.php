<fieldset class="title-container">
<legend  class="information-title"><i class="custom-icon-users" style="margin-top:-3px"></i> <?=$data['permission']['module']?></legend>
<div style="margin-bottom: 10px;"><?=action_button($data['permission']);?><br style="clear:both" /></div>
<?php
echo (isset($success) ? $success :null);
?>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-custom display" style="font: 12px 'Arial';" id="informationx">
		<thead>
			  <th>#</th>
			  <th>Company</th>
			  <th style="width: 50px;">Status</th>
			  <th class="width110">Action</th>
			        </thead>
		<tbody>
	<?php
		
		$ctr = 1;
		foreach($company as $k =>$v){
			if($data['permission']['_delete']==1){
			$delete 	= "<a href='#delete' name='Company' role='button'  data-toggle='modal' class='actions delete' id='company_id_".$v->company_id."' title='Delete'><i class='icon-remove'></i></a>";
			
			}
			if($data['permission']['_update']==1){
			$edit 		= "<a href='".base_url()."xadmin/".$data['permission']['url']."/edit/".genKey($v->company_id)."' class='actions' title='Edit'><i class='icon-pencil'></i></a>";
			
			}
			
			$actions 	=  $edit." ".$delete;
			$status 	= ($v->status==1) ? "icon-ok" : "icon-remove";
			$imagex = ($v->logo=="no-logo.png") ? "assets/images/".$v->logo :  "uploads/".$v->logo;
			$checkbox = ($v->company_id!=1) ? "<input type='checkbox' style='margin:0' />" : "<input type='checkbox' style='margin:0' disabled='true' />";
		echo "<tr id='delete_".$v->company_id."'><td style='width:20px'>".$ctr."</td><td class='text-align'><img src='".base_url().$imagex."' class='avtar' /><strong>".$v->company." </strong><br /> <i>".$v->company_address."</i></td><td style='vertical-align: middle;' style='width: 50px;'><i class='".$status."'></i></td><td style='vertical-align: middle;'>".$actions."</td></tr>";
		
		$ctr++;
		}
			
			
			?>
		</tbody>
	</table>

</fieldset>
<script type="text/javascript">
	$(function(){
	
	});
</script>
<style type="text/css">
		#informationx_length select{width:70px}
	.avtar{float:left;width: 50px;margin-right: 5px;}
	.toolbar{float:left}
</style>
