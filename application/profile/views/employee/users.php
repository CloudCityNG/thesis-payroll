<fieldset class="title-container">
<legend><i class="custom-icon-role pull-left"></i> Users<br /> <small>Add user</small></legend>
<input type="hidden" id="module" value="<?=$data['permission']['module_id']?>"/>
<input type="hidden" id="data" />
<?=action_button($data['permission']);?>
<div id="xrole">
<table class="table table-hover table-custom display" style="font: 12px 'Arial';" id="users">
		<thead>
			<tr>
			   <th>Fullname</th>
			  <th>Username</th>
			  <th>Role</th>
			  <th class="acl">Status</th>
			  <th class="width110 forprint">Action</th>
			</tr>
        </thead>
		<tbody>
			
		<?php
		$ctr = 1;
		foreach($users as $k){
			$delete 	= ($k->users_id !=2) ? "<a href='#stack1' class='delete actions' data-toggle='modal' data-index='".($ctr)."' id='users_id_".genKey($k->users_id)."'><i class='icon-remove-circle'></i> Delete</a>": '- -';
			$edit 		= ($k->users_id!=2) ? "<a href='".base_url()."xadmin/users/edit/".genKey($k->users_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>" : "- - ";
			$checkbox 		= ($k->users_id!=2) ? "<input type='checkbox' class='check css-checkbox' name='_".($ctr)."' id='_".($k->users_id)."' value='".genericKey($k->users_id)."'><label for='_".($ctr)."' class='css-label'></label>" : "<div style='height:14px;width:14px;border:1px solid #ddd'></div>";
			$actions 	=  '';
			if($data['permission']['_update']==1){
			$actions .= $edit;
			}
			if($data['permission']['_delete']==1){
			$actions .= " ".$delete;
			}
			$activated 	= ($k->status==1) ? "Active" : "De-Active";
			$s 	= ($k->status==1) ? "label label-success" : "label label-warning";
		//	$activated 	= ($k->status==1) ? "icon-ok" : "icon-remove";
		echo "<tr id='delete_".($ctr)."'><td class='text-align'><strong>".$k->firstname." ".$k->lastname." </strong></td><td class='text-align'><i>".$k->email."</i></td><td class='text-align'><i>".$k->role."</i></td><td class='align-center'><span class='".$s."'>".$activated."</span></td><td class=\"forprint align-center \">".$actions."</td></tr>";
		$ctr++;
		}
			
			
			?>
			
		
			
		</tbody>
	</table>
	</div>
</fieldset>
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/ver3.0/js/')?>jquery.dataTables.js" ></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/ver3.0/js/')?>dataTables.bootstrap.js" ></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/media/js/')?>ZeroClipboard.js" ></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/media/js/')?>TableTools.js" ></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/ver3.0/js/')?>jquery.PrintArea.js" ></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url()?>jqprint.js" ></script>
<style type="text/css">
.row{margin-left: 0px;margin-right: 0px}
</style>
<script type="text/javascript">
var editor;
var forexport;
$(document).ready(function(){
		$.extend( true, $.fn.DataTable.TableTools.classes, {
				"container": "btn-group",
				"buttons": {
					"normal": "btn btn-default btn-sm",
					"disabled": "btn disabled"
				},
				"collection": {
					"container": "DTTT_dropdown dropdown-menu",
					"buttons": {
						"normal": "",
						"disabled": "disabled"
					}
				}
			} );

		/* Datatable decleration
		-----------------------------*/
		var oTable =  $('#users').dataTable({
		 	 "sDom": "<'row pull-left'T><'row pull-right forprint'f><'clr'>t<'row pull-right forprint'p><'clr'>",
		
		        "oTableTools": {
		            "sSwfPath": "http://localhost/matrix/assets/media/swf/copy_csv_xls_pdf.swf",
		           	"sRowSelect": "multi",
		             "aButtons": [
                                {
                                        "sExtends": "pdf",
                                        "sButtonText": "<span class='glyphicon glyphicon-export'></span> Export to PDF",
                                        "bSelectedOnly": true,
                                        "sFileName": "users.pdf",
                                        "mColumns": [0, 1, 2, 3]
                                },
                                {
                                        "sExtends": "xls",
                                        "sButtonText": "<span class='glyphicon glyphicon-export'></span> Export to Excel",
                                        "sFileName": "users.xls",	
                                        "bSelectedOnly": true,
                                      	"mColumns": [0, 1, 2, 3]

                                }
                             ]
		        }

		});
		/* end of datatable
		----------------------------------*/
	
 });
</script>
