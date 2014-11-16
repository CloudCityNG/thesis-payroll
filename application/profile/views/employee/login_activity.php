<fieldset class="title-container">
<legend><i class="custom-icon-role pull-left"></i> Login Acitivity<br /> <small>Last login information of every users</small></legend>
<input type="hidden" id="data" />
<?=action_button($data['permission']);?>
<div id="xrole">
<table class="table table-hover table-custom display" style="font: 12px 'Arial';" id="users">
		<thead>
			<tr>
			   <th>Fullname</th>
			  <th>Username</th>
			  <th>Role</th>
			  <th style="width: 190px!important;text-align:center">Last Logged-in</th>
			</tr>
        </thead>
		<tbody>
			
		<?php
		$ctr = 1;
		foreach($users as $k){
			$actions = date("F j, Y H:i:s",strtotime($k->date_log));
		echo "<tr id='delete_".($ctr)."'><td class='text-align'><strong>".$k->firstname." ".$k->lastname." </strong></td><td class='text-align'><i>".$k->email."</i></td><td class='text-align'><i>".$k->role."</i></td><td class=\"forprint align-center \">".$actions."</td></tr>";
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
                                        "sFileName": "Login-Activity.pdf",
                                        "mColumns": [0, 1, 2, 3]
                                },
                                {
                                        "sExtends": "xls",
                                        "sButtonText": "<span class='glyphicon glyphicon-export'></span> Export to Excel",
                                        "sFileName": "Login-Activity.xls",	
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
