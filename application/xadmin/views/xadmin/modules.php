<fieldset class="title-container">
<legend><i class="ico ico-<?=$user['permission']['_url']?>"></i>Modules</legend>
<?=isset($success) ? showMessage($success) : null;?>
<input type="hidden" id="module" value="<?=$user['permission']['xparentmodule_id']?>" />
<table class="table table-hover table-custom display" style="font: 12px 'Arial';margin-top:10px" id="table">
    <thead>
        <th>Module Name</th>
        <th class="acl">Activated</th>
        <th class="acl">Create</th>
        <th class="acl">Read</th>
        <th class="acl">Update</th>
        <th class="acl">Delete</th>
        <th class="acl">Export</th>
        <th class="acl">Print</th>
        <th class="acl">Upload</th>
        <th class="width110 acl">Action</th>
              </thead>
    <tbody>
  <?php

    $ctr = 1;
    foreach($result as $k =>$v){
      $delete   = ($v->xparentmodule_id!=0) ? "<a href='#stack1' class='delete actions' data-toggle='modal' data-index='".($ctr)."' id='xparentmodule_id_".genKey($v->xparentmodule_id)."'><i class='fa fa-times red'></i> Delete</a>": '- -';
      $edit     = ($v->xparentmodule_id!=0) ? "<a href='".base_url('xadmin/'.$user['permission']['_url']).'/modify/'.genKey($v->xparentmodule_id)."' class='actions'><i class='fa fa-pencil' style='color:orange'></i> Edit</a>" : "- - ";
      $add     = ($v->xparentmodule_id!=0) ? "<a href='".base_url('xadmin/'.$user['permission']['_url']).'/modify/'.genKey($v->xparentmodule_id)."' class='actions'><i class='fa fa-plus-circle'></i> Add Sub module</a>" : "- - ";
            $actions  =  '';
     // if($data['permission']['_update']==1){
      //$actions .= $edit;
     // }
      //if($data['permission']['_delete']==1){
      //$actions .= " ".$delete;
      //}


      $dropdown ='<ul class="nav navbar-nav navbar-right action-dropdown" style="width: 42px;margin: 0 auto;">';
      $dropdown .='       <li class="dropdown">';
      $dropdown .='         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear gray"></i></a>';
      $dropdown .='        <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="border-radius: 0px;margin-top: -43px;">';
      $dropdown .='        <li>'.$edit.'</li>';
      $dropdown .='        <li>'.$delete.'</li>';
      $dropdown .='        <li class="divider"></li>';
                          
      $dropdown .='         </ul>';
      $dropdown .='       </li>';
      $dropdown .='     </ul>';
      $actions .=$dropdown;

      $delete   = ($v->_xdelete==1) ? "fa fa-check" : "fa fa-times grey";
      $update   = ($v->_xupdate==1) ? "fa fa-check" : "fa fa-times grey";
      $read     = ($v->_xread==1) ? "fa fa-check" : "fa fa-times grey";
      $create   = ($v->_xcreate==1) ? "fa fa-check" : "fa fa-times grey";
      $activated  = ($v->status==1) ? "fa fa-check" : "fa fa-times grey";
      $export   = ($v->_xexport==1) ? "fa fa-check" : "fa fa-times grey";
      $print  = ($v->_xprint==1) ? "fa fa-check" : "fa fa-times grey";
      $upload  = ($v->_xupload==1) ? "fa fa-check" : "fa fa-times grey";
      $checkbox = ($v->xparentmodule_id!=1) ? "<input type='checkbox' style='margin:0' />" : "<input type='checkbox' style='margin:0' disabled='true' />";
      $url = base_url('xadmin/'.$v->_xurl);
    echo "<tr id='delete_".($ctr)."'><td class='text-align'><strong>".$v->parentmodule."</strong><br/ > <a href='".$url."'><i style='color:rgb(153, 153, 153);'>".$url."</i></a></td><td class='align-center'><i class='".$activated."'></i></td><td class='align-center'><i class='".$create."'></i></td><td class='align-center'><i class='".$read."'></i></td><td class='align-center'><i class='".$update."'></i></td><td class='align-center'><i class='".$delete."'></i></td><td class='align-center'><i class='".$export."'></i></td><td class='align-center'><i class='".$print."'></i></td><td class='align-center'><i class='".$upload."'></i></td><td class='align-center action-cell'>".$actions."</td></tr>";
    $ctr++;
    }
      
      
      ?>
    </tbody>
  </table>

      
</fieldset>

</fieldset>
<script type="text/javascript">
  $(document).ready(function(){

 TableTools.BUTTONS.addBtn = $.extend( true,{}, $.fn.DataTable.TableTools.buttonBase, {
        'sButtonText': "Add New",
         'fnClick': function(nButton,oConfig){
             //$('#success_modal').modal();
             window.location = oConfig.sUrl
          }

      });
    $.extend( true, $.fn.DataTable.TableTools.classes, {
        "container": "DTTT btn-group",
        "buttons": {
          "normal": "btn btn-default btn-sm",
          "disabled": "btn disabled"
        },
        "collection": {
          "container": "DTTT_dropdown dropdown-menu",
          "buttons": {
            "normal": "btn btn-default",
            "disabled": "disabled"
          }
        }
      } );

   var oTable =  $('#table').dataTable({
       "sDom": "<'row pull-left action-panel'T><'row pull-right search 'f><'clr'>t<'row pull-right pagination'p><'clr'>",
      //  "aoColumns":[{"sWidth":"10px"},{"sWidth":"10px"},{"sWidth":"10px"},{"sWidth":"10px"},{"sWidth":"10px"}],
      "sPaginationType": "bootstrap",
      "oLanguage": {
        "sLengthMenu": "_MENU_ records per page"
      },
        "oTableTools": {
               "sRowSelect": "multi",
                 "aButtons": [
                               {
                                "sExtends": "addBtn",
                                "sButtonText":"<i class='fa fa-plus white'></i> New record",
                                "sUrl":"<?=base_url()?>xadmin/<?=$user['permission']['_url']?>/new-record"
                              },
                              {
                                "sExtends": "pdf",
                                "sButtonText":"Export as PDF"
                              },
                              {
                                "sExtends": "xls",
                                "sButtonText":"Export as Excel"
                              }
                           
                             ]
            }
    });


  });
</script>

						
						
				
	



