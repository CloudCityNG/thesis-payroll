<fieldset class="title-container">
<legend  class="information-title"><i class="custom-icon-users" style="margin-top:-3px"></i> Information list</legend>
<div style="margin-bottom: 10px;"><?=action_button($data['permission']);?><br style="clear:both" /></div>
<?php
echo (isset($success) ? $success :null);
?>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-custom display" style="font: 12px 'Arial';" id="informationx">
		<thead>
			 
			  <th>Full Name</th>
			  
			  <th>Company</th>
			  <th>SSS #</th>
			  <th>TIN #</th>
			  <th>PAGIBIG #</th>
			  <th>Contact Number</th>
			  <th class="width110">EMP Status</th>
			  <th class="width110">Action</th>
			        </thead>
		<tbody>
	<?php
		
		$ctr = 1;
		foreach($information as $k =>$v){
			if($data['permission']['_delete']==1){
			$delete 	= ($v->information_id!=1) ? "<a href='#delete' name='User' role='button'  data-toggle='modal' class='actions delete' id='information_id_".$v->information_id."' title='Delete'><i class='icon-remove'></i></a>": '- -';
			
			}
			if($data['permission']['_update']==1){
			$edit 		= ($v->information_id!=1) ? "<a href='".base_url()."xadmin/information/edit/".genKey($v->information_id)."' class='actions' title='Edit'><i class='icon-pencil'></i></a>" : "- - ";
			
			}
			$remarks 		= ($v->information_id!=1) ? "<a href='".base_url()."xadmin/information/view/".genKey($v->information_id)."' class='actions' title='View'><i class='icon-share'></i></a>" : "- - ";
		
			$actions 	=  $remarks." ".$edit." ".$delete;
			$activated 	= ($v->status==1) ? "icon-ok" : "icon-remove";
			$imagex = ($v->picture=="avatar.jpg") ? "assets/images/".$v->picture :  "uploads/".$v->picture;
			$checkbox = ($v->information_id!=1) ? "<input type='checkbox' style='margin:0' />" : "<input type='checkbox' style='margin:0' disabled='true' />";
		echo "<tr id='delete_".$v->information_id."'><td class='text-align'><img src='".base_url().$imagex."' class='avtar' /><strong>".$v->firstname." ".$v->lastname." </strong><br /> <i>".$v->id_number."</i></td><td class='text-align'><strong>".$v->company."</strong></td><td class='text-align'><strong>".$v->sss." </strong></td><td class='text-align'><strong>".$v->tin." </strong></td><td class='text-align'><strong>".$v->pagibig." </strong></td><td class='text-align'><strong>".$v->contactnumber." </strong></td><td style='vertical-align: middle;'>".$v->employee_status."</td><td style='vertical-align: middle;'>".$actions."</td></tr>";
		
		$ctr++;
		}
			
			
			?>
		</tbody>
	</table>

</fieldset>
 <script src="<?=base_url();?>assets/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$('#informationx').dataTable({
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": true,
					"bAutoWidth": false,
					"bScrollCollapse": false,
					 "oLanguage": {
							"sLengthMenu": "Display _MENU_ records per page",
							/* "sZeroRecords": "Nothing found - sorry",
							"sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
							"sInfoEmpty": "Showing 0 to 0 of 0 records",
							"sInfoFiltered": "(filtered from _MAX_ total records)" */
						},
					 "sScrollY": "400px","sPaginationType": "full_numbers",
					/*  "aLengthMenu": [[2, 25, 50, -1], [2, 25, 50]] */
					
					});
	/*  {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "<?=base_url()?>xadmin/information/informationlist/",
				
				"aoColumns": [
					{ "mData": "fullname" },
					{ "mData": "sss" },
					{ "mData": "tin" }
				]
				
			}  */
		
	});
</script>
<style type="text/css">
		#informationx_length select{width:70px}
	.avtar{float:left;width: 50px;margin-right: 5px;}
	.toolbar{float:left}
</style>
