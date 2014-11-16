<?php
if(!defined('APPS')) exit ('No direct access allowed');
class api extends crackerjack{

	private $status;
	public function __construct(){
		parent::__construct();
			if ($this->session->_get('xadminlogin')==false) {
				redirect('xadmin/home/auth');
			}

			if (isAjax()==false) {
				redirect('xadmin/home/auth');
			}

	}

	public function index($id = false){
		require_once('system/core/error.php');	
	}

	public function isexist($get){
		$result = 'true';
		$email = r_string($_GET['inputEmail']);
		$g = $this->crud->read("SELECT email FROM _users WHERE email = :email LIMIT 0,1",array(':email'=>$email),'assoc');
		if($g){
			$result = "false";
			if ( ($g['email']==$get[0]) && ($get[1]=="edit") ) {
				$valid = "true";
			}
		}

		echo $result;

	}
	
	public function usernameisexists($get){
		$result = 'true';
		$email = r_string($_GET['email']);
		$current = r_string($_GET['current']);
		$g = $this->crud->read("SELECT email FROM _employee WHERE email = :email LIMIT 0,1",array(':email'=>$email),'assoc');
		if($g){
			$result = "false";
			if ($g['email']==$current && strtolower(r_string($get[0]))=="edit") {
				$result = "true";
			}
		
		}
	//	print_pre($get);

		echo $result;

	}



	public function doesexists($get){
		
			if (isset($_GET['gConf'])) {
				$gConfig = unserialize(base64_decode($_GET['gConf']));
				extract($gConfig['uPermission']);
			}
				//print_pre($gConfig);
				$aModule = trim(strtolower($module));
				$aModule = str_replace(' ', '_', $aModule);
				$mxConfig = $this->gData->$aModule();
				$sIndexColumn = $mxConfig['iColumn'];
				$sTable = $mxConfig['tName'];
				$value = end($_GET); 
				$aColumnx = key($_GET);
				$current = html_entity_decode(r_string($_GET['current']));

				$result = 'true';
				$dbResult = $this->crud->read("SELECT $aColumnx FROM $sTable WHERE $aColumnx = :val LIMIT 0,1",array(':val'=>$value),'assoc');
					
				if($dbResult){
					$result = "false";
					if ($dbResult[$aColumnx]==$current && strtolower(r_string($get[0]))=="edit") {
						$result = "true";
					}
				
				}
				echo $result;		
			$this->db->dbClose();
		
	}

	public function coldoesexists($get=false){
		if (isset($_GET['gConf'])) {
				$gConfig = unserialize(base64_decode($_GET['gConf']));
				extract($gConfig);
			}

			$current = html_entity_decode(r_string($_GET['current']));
			$aColumn = $iColumn;
			$sTable = $tName;
			$value = $_GET[$aColumn];
			$result = 'true';
				$dbResult = $this->crud->read("SELECT $aColumn FROM $sTable WHERE $aColumn = :val LIMIT 0,1",array(':val'=>$value),'assoc');
				if($dbResult){
					$result = "false";
					if ($dbResult[$aColumn]==$current && strtolower(r_string($get[0]))=="edit") {
						$result = "true";
					}
				
				}
				echo $result;		
			$this->db->dbClose();

	}

	public function dactive($id = false){
		if (isset($_POST['act'])) {
			if (isset($_GET['gConf'])) {
				$gConfig = unserialize(base64_decode($_GET['gConf']));
				extract($gConfig['uPermission']);
			}

				$aModule = trim(strtolower($module));
				$aModule = str_replace(' ', '_', $aModule);
				$mxConfig = $this->gData->$aModule();
				$row = $_POST['row'];
				$sIndexColumn = $mxConfig['iColumn'];
				$sTable = $mxConfig['tName'];
				$sts = isset($_POST['status']) ? $_POST['status'] : $id[0];
				$data['status'] =$sts;
				$aResult = 0;
				if (is_array($row)) {
					foreach ($row as $value) {
						$tid = $this->hash->decryptMe_($value);
					$aResult =+ $this->crud->update($sTable,$data,array($sIndexColumn=>$tid));
					}
				}else{
					$tid = $this->hash->decryptMe_($row);
					$aResult = $this->crud->update($sTable,$data,array($sIndexColumn=>$tid));
				}

				echo $aResult;
					$this->db->dbClose();
		}
	}

	public function action(){
		if($_POST['_delete']){
			if (isset($_GET['gConf'])) {
				$gConfig = unserialize(base64_decode($_GET['gConf']));
				extract($gConfig['uPermission']);
			}
				$aModule = trim(strtolower($module));
				$aModule = str_replace(' ', '_', $aModule);
				$mxConfig = $this->gData->$aModule();
				$row = $_POST['row'];
				$id = $this->hash->decryptMe_($row);
				$sIndexColumn = $mxConfig['iColumn'];
				$sTable = $mxConfig['tName'];

			echo $this->crud->delete($sTable,array($sIndexColumn=>$id));
			
				
			
			$this->db->dbClose();
		}
	}

	public function data(){
		
		//config
		if (isset($_GET['gConf'])) {
			$gConfig = unserialize(base64_decode($_GET['gConf']));
			extract($gConfig['uPermission']);
			}
		//	echo $_url;
		//print_r($gConfig['uPermission']);
		$aModule = trim(strtolower($module));
		$aModule = str_replace(' ', '_', $aModule);
		$mxConfig = $this->gData->$aModule();
		$aColumns =$mxConfig['aColumns'];
		$sIndexColumn = $mxConfig['iColumn'];
		$sTable = $mxConfig['tName']." ".$mxConfig['qJoin'];
		//$sTable = $mxConfig['qJoin'];

		//print_r($gConfig);

		//Paging
		$sLimit = "";
			if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
			{
				$sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
					intval( $_GET['iDisplayLength'] );
			}

		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
			{
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
				{
					
					/*$aSort = $aColumns[ intval( $_GET['iSortCol_'.$i] ) ];
						if ($aSort=='status') {
							$aSort = 'status';
						}*/
						$aSort = preg_replace("/[a-zA-Z0-9_]*+./","$2", $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]);
					$sOrder .= "`".$aSort."` ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}




		$sWhere = "";
		$aWhere = array();
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
			$sWhere = "WHERE ";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
				{
					$sWhere .= $aColumns[$i]." LIKE :".$aColumns[$i]." OR ";
					$aWhere[':'.$aColumns[$i]] = $_GET['sSearch'].'%';
				}
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= '';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= $aColumns[$i]." LIKE '".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
			}
		}
		//print_pre($_SESSION);
		//echo $aModule;
		switch ($aModule) {
			case 'role':
					if ($sWhere!="") {
						$sWhere .= 'AND xroles_id > 1';
					}else{
						$sWhere = ' WHERE xroles_id > 1';
					}
				break;
			case 'users':
					if ($sWhere!="") {
						$sWhere .= 'AND x.xusers_id > 1 AND x.xusers_id!='.$this->session->_get('user_id').'';
					}else{
						$sWhere = ' WHERE x.xusers_id > 1 AND .x.xusers_id!='.$this->session->_get('user_id').'';
					}
				break;
			
			
			default:
				# code...
				break;
		}
		/*
		 * SQL queries
		 * Get data to display
		 */
		$sQuery = "SELECT $sIndexColumn,".str_replace(" , ", " ", implode(", ", array_filter($aColumns)))." FROM $sTable $sWhere $sOrder $sLimit";
		 $sQueryx = "SELECT $sIndexColumn,".str_replace(" , ", " ", implode(", ", array_filter($aColumns)))." FROM $sTable $sWhere $sOrder";
		//echo $sQuery;
		$result = $this->crud->read($sQuery,$aWhere,'obj');
		$count = $this->crud->read($sQueryx,$aWhere,'obj');
		
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => count($result),
			"iTotalDisplayRecords" => count($count),
			"aaData" => array()
		);
			if (count($result) > 0) {
				$ctr = 1;

				//print_r($result);
				foreach ($result as $v) {
					$row = array();
					for ( $i=0 ; $i<count($aColumns) ; $i++ ){
						if ($aColumns[$i]!="") {
							$mCol = preg_replace("/[a-zA-Z0-9_]*+./","$2",$aColumns[$i]);
							$row[$mCol] = $v->$mCol;
								
								if ($mCol=="avatar") {
										$img = '<img src="'.base_url().'uploads/avatar/no_avatar.jpg" style="width:30px" />';
										$img2 = '<img src="'.base_url().'uploads/avatar/'.$v->$mCol.'" style="width:30px" />';
									$row['avatar'] = ( $v->$mCol=='' || $v->$mCol==null) ? $img : $img2;
								}

								if ($mCol=="status") {
										$a = ($v->$mCol==1) ? "<span class='badge badge-success'>Active</span>" : "<span class='badge badge-warning'>Deactive</span>";
					 					
									$row[$mCol] = $a;
								}
								if ($mCol=="date_created") {
										$a = date('F j, Y H:s a',strtotime($v->$mCol));
									$row[$mCol] = $a;
								}
								if ($mCol=="last_update") {
										$a = date('F j, Y H:s a',strtotime($v->$mCol));
									$row[$mCol] = $a;
								}

								if ($mCol=="rate") {
										$a = number_format($v->$mCol,0);
									$row[$mCol] = $a;
								}

							
						}
					}

					
					$sLabel = ($v->status==1) ? 'Deactive' : 'Activate';
					 $sLabelx = ($v->status==1) ? 0 : 1;

					 $activate   = "<a href='javascript:void()' onClick=\"fActivate(".$ctr.",'".genKey($v->$sIndexColumn)."','".$_GET['gConf']."','".$sLabelx."')\" class='activate actions' data-toggle='modal' data-index='".($ctr)."' id='".genKey($indxColumn)."'><i class='fa fa-check green w16'></i> ".$sLabel."</a>";
					 $delete   = "<a href='javascript:void()' onClick=\"fDelete(".$ctr.",'".genKey($v->$sIndexColumn)."','".$_GET['gConf']."')\" class='delete actions' data-toggle='modal' data-index='".($ctr)."' id='".genKey($v->$sIndexColumn)."'><i class='fa fa-times red w16'></i> Delete</a>";
      				 $edit     = "<a href='".base_url('xadmin/'.$_url).'/modify/'.genKey($v->$sIndexColumn)."' class='actions'><i class='fa fa-pencil w16' style='color:orange'></i> Edit</a>";
      				 $view     = "<a href='".base_url('xadmin/'.$_url).'/view/'.genKey($v->$sIndexColumn)."' class='actions'><i class='fa fa-pencil w16' style='color:orange'></i> View</a>";
      
      				 
      				 	$Last = ($ctr >=8) ? '-115px' : '-28px';
					 $dropdown ='<ul class="nav navbar-nav navbar-left action-dropdown " style="width: 42px;margin: 0 auto;">';
				      $dropdown .='       <li class="dropdown">';
				      $dropdown .='         <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="width:25px;padding:0;text-align:center"><i class="fa fa-gear gray"></i> <b class="caret"></b></a>';
				      $dropdown .='        <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="border-radius: 0px;margin-top: '.$Last.';">';
				      if ($_update==1) {
				      	$a = '<li>'.$edit.'</li>';
				      			if(strtolower($module)=='role' && $xparentmodule_id ==3 && $v->xroles_id==2 ) {
				      				$a = '';
				      			}
				      	$dropdown .= $a;
				      		//if(strtolower($module)!='role' && $xparentmodule_id !=3 && $v->xroles_id!=2 ) {
				      			$dropdown .='       ';
				      		//}
				      	//$dropdown .='        <li>'.$activate.'</li>';
				      }

				        if ($_read==1 && strtolower($module)=='role' && $xparentmodule_id ==3 && $v->xroles_id==2 ) {
				      
				      	$dropdown .='        <li>'.$view.'</li>';
				      }
					  
					   if ($_read==1 && strtolower($module)=='employees') {
				      
				      	$dropdown .='        <li>'.$view.'</li>';
				      }

				      if ($_delete==1) {
				      	if (strtolower($module)!='role' && strtolower($module)!='users') {
				      		$dropdown .='        <li>'.$delete.'</li>';
				      	}else if(($v->$sIndexColumn > 2 && strtolower($module)=='role') || ($v->$sIndexColumn > 2 && strtolower($module)=='users' )){
				      		$dropdown .='        <li>'.$delete.'</li>';
				      	}
				      }
				      $dropdown .='        <li class="divider"></li>';
				                          
				      $dropdown .='         </ul>';
				      $dropdown .='       </li>';
				      $dropdown .='     </ul>';
		
				    $row['DT_RowId'] = genKey($v->$sIndexColumn);
					$row['checkbox'] = '<input type="checkbox"/>';
					$row['button'] = $dropdown;
					$output['aaData'][] = $row;
					$ctr++;
				}
			}
		header('Content-Type: application/json');
		echo json_encode($output);
	}



	
}