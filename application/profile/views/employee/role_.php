<fieldset class="title-container">
<legend><i class="custom-icon-role pull-left"></i> Users Role <br /> <small>Create role for group or particular user.</small></legend>
<input type="hidden" id="module" value="<?=$data['permission']['module_id']?>"/>
<input type="hidden" id="data" />
<?=action_button($data['permission']);?>
<div id="xrole">
<table class="table table-hover table-custom display" style="font: 12px 'Arial';" id="role">
		<thead>
			<tr>
			  <th>Role Name</th>
			  <th>Modules</th>
			  <th class="acl">Status</th>
			  <th class="width110 forprint">Action</th>
			</tr>
        </thead>
		<tbody>
			
		<?php
		$ctr = 1;
		foreach($userRole as $k){
			$delete 	= ($k->role_id !=2) ? "<a href='#stack1' class='delete actions' data-toggle='modal' data-index='".($ctr)."' id='role_id_".genKey($k->role_id)."'><i class='icon-remove-circle'></i> Delete</a>": '- -';
			$edit 		= ($k->role_id!=2) ? "<a href='".base_url()."xadmin/role/edit/".genKey($k->role_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>" : "- - ";
			$checkbox 		= ($k->role_id!=2) ? "<input type='checkbox' class='check css-checkbox' name='_".($ctr)."' id='_".($k->role_id)."' value='".genericKey($k->role_id)."'><label for='_".($ctr)."' class='css-label'></label>" : "<div style='height:14px;width:14px;border:1px solid #ddd'></div>";
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
		echo "<tr id='delete_".($ctr)."'><td class='text-align'><strong>".$k->role."</strong></td><td class='text-align'><i>".rtrim($child[$k->role_id],',')."</i></td><td class='align-center'><span class='".$s."'>".$activated."</span></td><td class=\"forprint align-center \">".$actions."</td></tr>";
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
var options = { container: $('#role'), showIndeterminate: true };
 $('#check-all').checkAll(options);
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
		var oTable =  $('#role').dataTable({
		 	 "sDom": "<'row pull-left'T><'row pull-right forprint'f><'clr'>t<'row pull-right forprint'p><'clr'>",
		
		        "oTableTools": {
		            "sSwfPath": "http://localhost/matrix/assets/media/swf/copy_csv_xls_pdf.swf",
		           	"sRowSelect": "multi",
		             "aButtons": [
                                {
                                        "sExtends": "pdf",
                                        "sButtonText": "<span class='glyphicon glyphicon-export'></span> Export to PDF",
                                        "bSelectedOnly": true,
                                        "sFileName": "Role.pdf",
                                        "mColumns": [0, 1, 2]
                                },
                                {
                                        "sExtends": "xls",
                                        "sButtonText": "<span class='glyphicon glyphicon-export'></span> Export to Excel",
                                        "sFileName": "Role.xls",	
                                        "bSelectedOnly": true,
                                      	"mColumns": [0, 1, 2]

                                }
                             ]
		        }

		});
		/* end of datatable
		----------------------------------*/
	
 });
</script>