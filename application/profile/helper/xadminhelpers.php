<?php

function action_button($permission){
	$action = '';
	//print_r($permission);
	if ($permission['_create']==1) {
		$action .=  '{';
        $action .=  ' "sExtends": "addBtn",';
        $action .=  ' "sButtonText":"<i class=\'fa fa-plus white\'></i> New record",';
        $action .=  ' "sUrl":"'.base_url().'xadmin/'.$permission['_url'].'/new-record"';
        $action .=  ' },';
	}

	if ($permission['_print']==1) {
		$action .=  '{';
        $action .=  ' "sExtends": "pdf",';
        $action .=  ' "sButtonText":"Export as PDF",';
        $action .=  ' },';
	}

	if ($permission['_export']==1) {
		$action .=  '{';
        $action .=  ' "sExtends": "xls",';
        $action .=  ' "sButtonText":"Export as Excel",';
        $action .=  ' },';
	}

	return $action;
}
