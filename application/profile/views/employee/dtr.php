<fieldset class="title-container">
<legend><i class="custom-icon-role pull-left"></i> Daily Time Record<br /> <small>Employees daily time attendance</small></legend>
<input type="hidden" id="module" value="<?=$data['permission']['module_id']?>"/>
<input type="hidden" id="data" />
<?=(isset($success) ? $success :null);?>
<a href="#upload" data-toggle="modal" data-index="1" class="btn btn-sm btn-warning pull-left" style="margin-right:10px"><i class="icon-upload icon-white"></i> Import DTR</a>
<div id="xrole">
<table class="table table-hover table-striped table-custom display" style="font: 12px 'Arial';" id="dtr">
		<thead>
			<tr>
			   <th>Date</th>
			   <th style="width:60px">EID</th>
			   <th>Employee Name</th>
			   <th style="width:100px">Position</th>
			  <th class="acl" style="width:90px;text-align:center">Total Hours</th>
			</tr>
        </thead>
		<tbody>
			
		<?php
		$ctr = 1;
		foreach($dtr as $k){
		echo "<tr id='delete_".($ctr)."'><td class='text-align' style='width:110px'>".(date("F j, Y",strtotime($k->_date)))."</td><td class='text-align'><strong>".$k->eid."</strong></td><td class='text-align'><strong>".$k->lastname.",".$k->firstname."</strong></td><td style='width:90px;text-align:center'><i>".$k->position."</i></td><td style='width:90px;text-align:center'><i>".$k->total_hrs."</i></td></tr>";
		$ctr++;
		}
		?>
			
		
			
		</tbody>
	</table>
	</div>
</fieldset>
<div id="upload" class="modal fade" tabindex="-1" data-focus-on="input:first"  data-keyboard="false" style="display: none;">
      <div class="modal-dialog" style="width:350px;margin-top: 15%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="close" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Upload file</h4>
      </div>
      <div class="modal-body">
        <p style="color:#555">Upload Daily Time Record in Excel format. No format yet? <a href="<?=base_url()?>documents/DTR-format.xlsx" style="text-decoration:none"><span class="label label-success">Download Format</span></a></p>
			  
			  <form action="<?=base_url()?>xadmin/dtr/upload" method="post" enctype="multipart/form-data" id="uploadFile">
					<input type="file" name="myfile">
					<p style="color:#555">Valid Format: .xls,.xlsx</p>
					<div id="status"></div>
					<div class="progress">
						<div class="bar"></div >
					</div>
					
					<input type="submit" value="Upload File" class="btn btn-success btn-sm" id="sumbit" />
				</form>
				
      </div>
    </div>
</div>

 
    
    
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/ver3.0/js/')?>jquery.dataTables.js" ></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/ver3.0/js/')?>dataTables.bootstrap.js" ></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/media/js/')?>ZeroClipboard.js" ></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/media/js/')?>TableTools.js" ></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/ver3.0/js/')?>jquery.PrintArea.js" ></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url('assets/ver3.0/js/')?>jquery.form.js" ></script>
<style type="text/css">
.row{margin-left: 0px;margin-right: 0px}
.bar{background: #008DE6;
height: 20px;
width: 0%;
-webkit-transition: width .3s;
-moz-transition: width .3s;
transition: width .3s;}

.percent {
position: absolute;
display: inline-block;
color: #333;
}
.progress{display:none}
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
		var oTable =  $('#dtr').dataTable({
		 	 "sDom": "<'row pull-left'T><'row pull-right forprint'f><'clr'>t<'row pull-right forprint'p><'clr'>",
		
		        "oTableTools": {
		            "sSwfPath": "<?=base_url()?>/assets/media/swf/copy_csv_xls_pdf.swf",
		           	"sRowSelect": "multi",
		             "aButtons": [
                                {
                                        "sExtends": "pdf",
                                        "sButtonText": "<span class='glyphicon glyphicon-export'></span> Export to PDF",
                                        "bSelectedOnly": true,
                                        "sFileName": "Daily Time Record.pdf",
                                        "mColumns": [0, 1,2,3,4]
                                },
                                {
                                        "sExtends": "xls",
                                        "sButtonText": "<span class='glyphicon glyphicon-export'></span> Export to Excel",
                                        "sFileName": "Daily Time Record.xls",	
                                        "bSelectedOnly": true,
                                      	"mColumns": [0, 1,2,3,4]

                                }
                             ]
		        }

		});
		/* end of datatable
		----------------------------------*/

var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');
   
		$('#uploadFile').ajaxForm({
			dataType:  'json',
			beforeSend: function() {
				//status.fadeOut();
				bar.width('0%');
				percent.html('0%');
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				bar.width(percentVal)
				percent.html(percentVal);
				$('#sumbit').attr('disable','true');
				$('.progress').css('display','block');
			},
			
			complete: function(xhr) {
				if(xhr.responseText==1){
					$('#sumbit').attr('disable','true');
					status.html("File was successfully uploaded!").fadeIn().css({'color':'green'});
				}else if(xhr.responseText==2){
					status.html("Upload Fail: Unknown error occurred!").fadeIn().css({'color':'red'});
				}else if(xhr.responseText==3){
					status.html("Upload Fail: Unsupported file format or It is too large to upload!!").fadeIn().css({'color':'red'});
				}else if(xhr.responseText==4){
					status.html("Upload Fail: File not uploaded!").fadeIn().css({'color':'red'});
				}else if(xhr.responseText==5){
					status.html("Bad request!").fadeIn().css({'color':'red'});
				}else if(xhr.responseText > 7){
					result ="<p>Daily Time Record was successfully imported.</p><button type='button' data-dismiss='modal' class='btn btn-default btn-sm'>Ok</button>";
					$('.modal-body').html(result).css({'color':'green','text-align':'center'});
				}
				//status.html(data.responseJSON.status).fadeIn();
			}
		}); 
	
	setTimeout(function(){ jQuery(".alert").fadeOut(); }, 3000);
	
	
 });
 
 function select_file(){
	document.getElementById('image').click();
			return false;
}
</script>
