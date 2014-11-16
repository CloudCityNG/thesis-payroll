
<fieldset class="title-container">
<legend  class="module-title"><i class="custom-icon-info" style="margin-top:-3px"></i> Patients List</legend>
<form class="form-inline" method="GET">
	<?=action_button($data['permission']);?>
        <div class="input-append pull-right">
    <input class="span3" id="appendedInputButton" type="text" name="q">
    <button class="btn btn-success" type="submit">Search</button>
    </div>
    </form>
<?php
echo (isset($success) ? $success :null);
?>

<table class="table table-striped table-hover table-custom display" style="font: 12px 'Arial';margin-top:10px" id="module">
		<thead>
			  <th>#</th>
			  <th>Patient Name</th>
			  <th>Control ID</th>
			  <th>Date Registered</th>
			  <th class="acl">Status</th>
			  <th class="width110" style="width:200px!important">Action</th>
			        </thead>
		<tbody>
	<?php
		$ctr = 1;
		foreach($patients as $k =>$v){
			$delete 	= "<a href='#delete' name='Patient' role='button'  data-toggle='modal' class='actions delete' id='patient_id_".$v->patient_id."'><i class='icon-remove-circle'></i> Delete</a>";
			$edit 		= "<a href='".base_url()."xadmin/patients/edit/".genKey($v->patient_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>";
			$view 		= "<a href='".base_url()."xadmin/patients/view/".genKey($v->patient_id)."' class='actions'><i class='icon-edit'></i> View Record</a>";
			$actions 	=  $view." ".$edit." ".$delete;
			$activated 	= ($v->status==1) ? "icon-ok" : "icon-remove";
			
			$checkbox = ($v->patient_id!=1) ? "<input type='checkbox' style='margin:0' />" : "<input type='checkbox' style='margin:0' disabled='true' />";
		echo "<tr id='delete_".$v->patient_id."'><td style='width:20px'>".($ctr++)."</td><td class='text-align'><strong>".$v->lastname.", ".$v->firstname."</strong></td><td>".$v->control_id."</td><td>".date('F j, Y',strtotime($v->date_registered))."</td><td class='align-center'><i class='".$activated."'></i></td><td>".$actions."</td></tr>";
		}
			
			
			?>
		</tbody>
	</table>
</fieldset>
