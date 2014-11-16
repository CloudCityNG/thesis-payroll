<fieldset class="title-container">
<legend><i class="fa fa-user"></i> <?=ucwords($user['permission']['module'])?></legend>
<input type="hidden" id="department_id" value="<?=$user['permission']['department_id']?>"/>
<input type="hidden" id="data" />
<?=isset($success) ? showMessage($success) : null;?>
<div id="xrole">
<table class="table table-hover table-custom display" style="font: 12px 'Arial';" id="table">
		<thead>
			<tr>
				
        <th class="align-center">Action</th>
        <th class="align-center">Image</th>
        <th class="align-center">EID</th>
        <th class="align-center">First Name</th>
        <th class="align-center">Last Name</th>
        <th class="align-center">Rate</th>
        <th class="align-center">Position</th>
        <th class="align-center">Department</th>
        <th class="align-center">Mobile Number</th>
        <th class="align-center">Email</th>
        <th class="align-center">Status</th>
        <th class="align-center">Date Created</th>
        <th class="align-center">Last Update</th>
			</tr>
        </thead>
		<tbody>
		</tbody>
	</table>
	</div>
</fieldset>

<style type="text/css">
.row{margin-left: 0px;margin-right: 0px}
</style>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-gridTools.js"></script>
<script type="text/javascript">
var data = [];
$(document).ready(function(){
		/* Datatable decleration
		-----------------------------*/
	 var oTable =  $('#table').dataTable({
	 	"sDom":"Tf<'clear'>rtip<'clear'>",
		"bProcessing": true,	
		"bServerSide": true,
		"sAjaxSource": "<?=base_url()?>xadmin/api/data/?gConf=<?=$hashConfig?>",
    
		"aoColumns":[

                {"bSearchable":false,"mData":"button","sWidth":"50px"},
                {"bSearchable":false,"mData":"image","sWidth":"35px","sClass":'align-center'},
                {"bSearchable":true,"mData":"eid","sWidth":"50px","sClass":'align-center'},
                {"bSearchable":true,"mData":"firstname","sWidth":"70px","sClass":'align-right'},
                {"bSearchable":true,"mData":"lastname","sWidth":"100px","sClass":'align-left'},
                {"bSearchable":true,"mData":"rate","sWidth":"50px","sClass":'align-left'},
                {"bSearchable":true,"mData":"position","sWidth":"100px","sClass":'align-left'},
                {"bSearchable":true,"mData":"department","sWidth":"100px","sClass":'align-left'},
                {"bSearchable":true,"mData":"mobile_number","sWidth":"90px","sClass":'align-center'},
                {"bSearchable":true,"mData":"email","sWidth":"130px","sClass":'align-center'},
                {"bSearchable":false,"mData":"status","sWidth":"50px","sClass":'align-center'},
                {"bSearchable":false,"mData":"date_created","sWidth":"170px","sClass":'align-right'},
                {"bSearchable":false,"mData":"last_update","sWidth":"170px","sClass":'align-right'},
                ],
    "aoColumnDefs":[
                  {'bSortable':false,'aTargets':[0]},
                  {'bSortable':false,'aTargets':[1]},
                  {'bSortable':true,'aTargets':[2]},
                  {'bSortable':true,'aTargets':[3]},
                  {'bSortable':true,'aTargets':[4]},
                  {'bSortable':true,'aTargets':[5]},
                  {'bSortable':true,'aTargets':[6]},
                  {'bSortable':true,'aTargets':[7]},
                  {'bSortable':true,'aTargets':[8]},
                  {'bSortable':false,'aTargets':[9]},
                  {'bSortable':false,'aTargets':[10]},
                  {'bSortable':false,'aTargets':[11]},
                  ],
      "order": [[ 2, "desc" ]],
        "oTableTools": {
              "sRowSelect": "multi",
                 "aButtons": [

                              <?php
                                if ($user['permission']['_create']==1) {
                                  ?>
                                         {
                                          "sExtends": "addBtn",
                                          "sButtonText":"<i class='fa fa-plus white'></i> New record",
                                          "sUrl":"<?=base_url()?>xadmin/<?=$user['permission']['_url']?>/new-record"
                                        },
                                      <?php
                                    }
                                       ?>
                              {
                                "sExtends": "refreshBtn",
                              },
                              <?php
                                    if ($user['permission']['_update']==1) {
                                  ?>
                                       {
                                          "sExtends": "bActivate",
                                          "dxConfig" : "<?=$hashConfig?>"
                                        },
                                        {
                                          "sExtends": "bDeactivate",
                                          "dxConfig" : "<?=$hashConfig?>"
                                        },
                                      <?php
                                    }
                                  ?>
                            
                             ]
            },
           "oLanguage": {
            "sProcessing": "<img src='<?=base_url()?>media/images/loading.gif'> Processing..."
            },
            "sScrollY": "",
            "sScrollX": "300px",
            "bScrollCollapse": true,
            "iDisplayLength": 50,

    })
		/* end of datatable
		----------------------------------*/
 
 });



</script>