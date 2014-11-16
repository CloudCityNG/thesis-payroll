<fieldset class="title-container">
<legend><i class="custom-icon-<?=$data['permission']['url']?> pull-left"></i> Transactions <br> <small> View all transaction with a detailed information</small></legend>
<input type="hidden" id="transactions" value="<?=$data['permission']['module_id']?>"/>
<input type="hidden" id="data" />
<?=action_button($data['permission']);?>
<div id="xrole">
<table class="table table-hover table-custom display" style="font: 12px 'Arial';margin-top:10px" id="clients_tbl">
		<thead>
			  <th>Client</th>
			  <th>Mobile</th>
			  <th class="">Contact Person</th>
			  <th class="">Purchase No.</th>
			  <th class="">Reference No.</th>
			  <th class="">Amount</th>
			  <th class="" style="width:75px!important">Date</th>
			  <th class="">Payment terms</th>
			  <th class=""  style="width:75px!important">Due Date</th>
			  <th class="">Status</th>
			  <th class="width110">Action</th>
			        </thead>
		<tbody>
		<?php
		$ctr = 1;
		foreach($transactions as $x => $k){
			$delete 	=  "<a href='#stack1' class='delete actions' data-toggle='modal' data-index='".($ctr)."' id='transactions_id_".genKey($k->transactions_id)."'><i class='icon-remove-circle'></i> Delete</a>";
			$edit 		=  "<a href='".base_url()."xadmin/transactions/edit/".genKey($k->transactions_id)."' class='actions'><i class='icon-pencil'></i> Edit</a>";
			$checkbox 		= ($k->transactions_id!=2) ? "<input type='checkbox' class='check css-checkbox' name='_".($ctr)."' id='_".($k->transactions_id)."' value='".genericKey($k->transactions_id)."'><label for='_".($ctr)."' class='css-label'></label>" : "<div style='height:14px;width:14px;border:1px solid #ddd'></div>";
			$actions 	=  '';
			if($data['permission']['_update']==1){
			$actions .= $edit;
			}
			if($data['permission']['_delete']==1){
			$actions .= " ".$delete;
			}
			$activated 	= ($k->status==1) ? "Active" : "De-Active";
			$s 	= ($k->status==1) ? "label label-success" : "label label-warning";
			$p 	= ($k->payment_status=="Paid") ? "label label-success" : "label label-warning";
			$ddate = date("Y-m-d",strtotime($k->_date."+".$k->payment_terms." day"));
			$warning = date("Y-m-d",strtotime($ddate."-3 day"));
			$warning = (date("Y-m-d") >= $warning) ? "label label-danger" : "";
		//	$activated 	= ($k->status==1) ? "icon-ok" : "icon-remove";
		echo "<tr id='delete_".($ctr)."'><td class='text-align'><strong>".$k->clients."</strong></td><td class='text-align'><i>".$k->mobile_number."/".$k->telephone_number."</i></td><td class='text-align'><i>".$k->contact_person1."</i></td><td class='text-align'><i>".$k->purchase_number."</i></td><td class='text-align'><i>".$k->reference_number."</i></td><td style='text-align:right'><i>".number_format($k->amount,2)."</i></td><td class='text-align'><i>".$k->_date."</i></td><td class='text-align'><i>".$k->payment_terms." days</i></td><td class='text-align'><i class='".$warning."'>".$ddate."</i></td><td class='text-align'><i class='".$p."'>".$k->payment_status."</i></td><td class=\"align-center \">".$actions."</td></tr>";
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
		var oTable =  $('#clients_tbl').dataTable({
		 	 "sDom": "<'row pull-left'T><'row pull-right forprint'f><'clr'>t<'row pull-right forprint'p><'clr'>",
		
		        "oTableTools": {
		            "sSwfPath": "<?=base_url()?>assets/media/swf/copy_csv_xls_pdf.swf",
		           	"sRowSelect": "multi",
		             "aButtons": [
                                {
                                        "sExtends": "pdf",
                                        "sButtonText": "<span class='glyphicon glyphicon-export'></span> Export to PDF",
                                        "bSelectedOnly": true,
                                        "sFileName": "transactions.pdf",
                                        "mColumns": [0, 1, 2, 3, 4,5,6,7]
                                },
                                {
                                        "sExtends": "xls",
                                        "sButtonText": "<span class='glyphicon glyphicon-export'></span> Export to Excel",
                                        "sFileName": "transactions.xls",	
                                        "bSelectedOnly": true,
                                      	"mColumns": [0, 1, 2, 3, 4,5,6,7]

                                }
                             ]
		        }

		});
		/* end of datatable
		----------------------------------*/
	
 });
</script>


