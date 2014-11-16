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
        <th class="align-center">User Role</th>
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
    "sAjaxSource": "api/data/?gConf=<?=$hashConfig?>",
    
    "aoColumns":[

                {"bSearchable":false,"mData":"button","sWidth":"80px"},
                {"bSearchable":true,"mData":"role"},
                {"bSearchable":false,"mData":"status","sWidth":"100px","sClass":'align-center'},
                {"bSearchable":false,"mData":"date_created","sWidth":"170px","sClass":'align-right'},
                {"bSearchable":false,"mData":"last_update","sWidth":"170px","sClass":'align-left'},
                ],
    "aoColumnDefs":[
                  {'bSortable':false,'aTargets':[0]},
                  {'bSortable':true,'aTargets':[1]},
                  {'bSortable':true,'aTargets':[2]},
                  {'bSortable':false,'aTargets':[3]},
                  {'bSortable':false,'aTargets':[4]},
                  ],
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
           
            "sScrollY": "380px",
            "bScrollCollapse": false,
            "iDisplayLength": 50,

    })
    /* end of datatable
    ----------------------------------*/

 });



</script>