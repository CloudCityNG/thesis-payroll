<fieldset class="title-container">
<legend><i class="custom-icon-<?=$data['permission']['url']?> pull-left"></i> Manage Modules <br> <small>Create, modify module and assign permission</small></legend>
<input type="hidden" id="module" value="<?=$data['permission']['module_id']?>"/>
<?=action_button($data['permission']);?>
<?php
//	print_r($data['permission']);
?>
<div style="clear:both"></div>
<?php
echo (isset($success) ? $success :null);
?>
<table class="table table-hover table-custom display" style="font: 12px 'Arial';margin-top:10px" id="module">
		<thead>
			  <th>Module Name</th>
			  <th class="acl">Activated</th>
			  <th class="acl">Create</th>
			  <th class="acl">Read</th>
			  <th class="acl">Update</th>
			  <th class="acl">Delete</th>
			  <th class="acl">Export</th>
			  <th class="acl">Print</th>
			  <th class="width110 acl">Action</th>
			        </thead>
		<tbody>
	<?php
		$ctr = 1;
		foreach($modules as $k =>$v){
			$delete 	= ($v->module_id!=0) ? "<a href='#stack1' class='delete actions' data-toggle='modal' data-index='".($ctr)."' id='module_id_".genKey($v->module_id)."'><i class='icon-remove-circle'></i> Delete</a>": '- -';
			$edit 		= ($v->module_id!=0) ? "<a href='".base_url()."xadmin/module/edit/".genKey($v->module_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>" : "- - ";
						$actions 	=  '';
			if($data['permission']['_update']==1){
			$actions .= $edit;
			}
			if($data['permission']['_delete']==1){
			$actions .= " ".$delete;
			}
			$delete 	= ($v->_delete==1) ? "icon-ok" : "icon-remove";
			$update 	= ($v->_update==1) ? "icon-ok" : "icon-remove";
			$read 		= ($v->_read==1) ? "icon-ok" : "icon-remove";
			$create 	= ($v->_create==1) ? "icon-ok" : "icon-remove";
			$activated 	= ($v->status==1) ? "icon-ok" : "icon-remove";
			$export 	= ($v->_export==1) ? "icon-ok" : "icon-remove";
			$print 	= ($v->_print==1) ? "icon-ok" : "icon-remove";
			$checkbox = ($v->module_id!=1) ? "<input type='checkbox' style='margin:0' />" : "<input type='checkbox' style='margin:0' disabled='true' />";
		echo "<tr id='delete_".($ctr)."'><td class='text-align'><strong>".$v->module."</strong><br/ > <a href='".base_url('xadmin/').$v->url."'><i style='color:rgb(153, 153, 153);'>/".$v->url."</i></a></td><td class='align-center'><i class='".$activated."'></i></td><td class='align-center'><i class='".$create."'></i></td><td class='align-center'><i class='".$read."'></i></td><td class='align-center'><i class='".$update."'></i></td><td class='align-center'><i class='".$delete."'></i></td><td class='align-center'><i class='".$export."'></i></td><td class='align-center'><i class='".$print."'></i></td><td class='align-center'>".$actions."</td></tr>";
		$ctr++;
		}
			
			
			?>
		</tbody>
	</table>
</fieldset>

