
<fieldset class="title-container">
<legend  class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i> Illness Classification</legend>
<?=action_button($menu);?>

<?php
echo (isset($success) ? $success :null);
?>

<table class="table table-striped table-hover table-custom display" style="font: 12px 'Arial';margin-top:10px" id="module">
		<thead>
			  <th>#</th>
			  <th>Classification</th>
			  <th>Clinical Division</th>
			  <th class="acl">Status</th>
			  <th class="width110">Action</th>
			        </thead>
		<tbody>
	<?php
		$ctr = 1;
		foreach($illness as $k =>$v){
			$delete 	= "<a href='#delete' name='Illness Classification' role='button'  data-toggle='modal' class='actions delete' id='illness_id_".$v->illness_id."'><i class='icon-remove-circle'></i> Delete</a>";
			$edit 		= "<a href='".base_url()."xadmin/illness/edit/".genKey($v->illness_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>";
			$actions 	=  $edit." ".$delete;
			$activated 	= ($v->status==1) ? "icon-ok" : "icon-remove";
			
			$checkbox = ($v->illness_id!=1) ? "<input type='checkbox' style='margin:0' />" : "<input type='checkbox' style='margin:0' disabled='true' />";
		echo "<tr id='delete_".$v->illness_id."'><td style='width:20px'>".($ctr++)."</td><td class='text-align'><strong>".$v->illness."</strong></td><td>".$v->_division."</td><td class='align-center'><i class='".$activated."'></i></td><td>".$actions."</td></tr>";
		}
			
			
			?>
		</tbody>
	</table>
</fieldset>
