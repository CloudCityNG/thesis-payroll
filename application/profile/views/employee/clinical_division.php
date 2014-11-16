
<fieldset class="title-container">
<legend  class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i> Clinical Division</legend>
<?=action_button($data['permission']);?>

<?php
echo (isset($success) ? $success :null);
?>

<table class="table table-striped table-hover table-custom display" style="font: 12px 'Arial';margin-top:10px" id="module">
		<thead>
			  <th>#</th>
			  <th>Division Name</th>
			  <th class="acl">Activated</th>
			  <th class="width110">Action</th>
			        </thead>
		<tbody>
	<?php
		$ctr = 1;
		foreach($division as $k =>$v){
			$delete 	="<a href='#delete' name='Division' role='button'  data-toggle='modal' class='actions delete' id='division_id_".$v->division_id."'><i class='icon-remove-circle'></i> Delete</a>";
			$edit 		="<a href='".base_url()."xadmin/clinic_divisions/edit/".genKey($v->division_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>";
			$actions 	=  $edit." ".$delete;
			$activated 	= ($v->status==1) ? "icon-ok" : "icon-remove";
			$checkbox = ($v->division_id!=1) ? "<input type='checkbox' style='margin:0' />" : "<input type='checkbox' style='margin:0' disabled='true' />";
		echo "<tr id='delete_".$v->division_id."'><td style='width:20px'>".($ctr++)."</td><td class='text-align'><strong>".$v->division."</strong></td><td class='align-center'><i class='".$activated."'></i></td><td>".$actions."</td></tr>";
		}
			
			
			?>
		</tbody>
	</table>
</fieldset>
