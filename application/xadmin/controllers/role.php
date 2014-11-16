<?php

class role extends crackerjack{
	private $modules = array();
	private $result;
	public function __construct(){
		parent::__construct();

		//print_pre($_SESSION);
		$query = 'SELECT * FROM _xparentmodule WHERE status=1 AND xparentmodule_id !=1 ORDER BY xparentlabel_id';
			if($this->session->_get('role_id')!=1){

				//$query = 'SELECT * FROM _xparentmodule WHERE status=1 AND xparentmodule_id > 2 ORDER BY xparentlabel_id';
			}
		$this->result= $this->crud->read($query,array(),'obj');

		foreach($this->result as $k => $g){

			$this->modules[$g->xparentmodule_id] = array();
			$this->modules[$g->xparentmodule_id]['_xcreate'] =  0;
			$this->modules[$g->xparentmodule_id]['_xread'] 	=  0;
			$this->modules[$g->xparentmodule_id]['_xupdate'] =  0;
			$this->modules[$g->xparentmodule_id]['_xdelete'] =  0;
			$this->modules[$g->xparentmodule_id]['_xprint'] 	=  0;
			$this->modules[$g->xparentmodule_id]['_xexport'] =  0;
			$this->modules[$g->xparentmodule_id]['_xupload'] =  0;
		}


	}

	public function index(){
		$data['result'] = $this->result;
		if(isset($_POST['_delete'])){
				$id = $_POST['id'];
					$result = $this->crud->read("SELECT xrole_id FROM _users WHERE role_id=:id",array('id'=>$id),'obj');
					if(empty($result)){
						$result = $this->crud->delete('_role',array('role_id' => $id));
						$result = $this->crud->delete('_acl',array('role_id' => $id));
						echo 1;
					}else{
						echo 0;
					} 
				return false;
			}

			if($this->session->_get('message')==1){
					if ($this->session->_get('action')=='add') {
						$data['success'] = '<strong>Congratulations!.</strong> New record successfully added.';
					}

					if ($this->session->_get('action')=='update') {
						$data['success'] = '<strong>Congratulations!.</strong> Role was successfully update.';
					}
				$this->session->_set(array('message'=>0,'action'=>''));

			}

		$this->load->model(array('admin'));
		$data['userRole']  = $result=  $this->crud->read('SELECT * FROM _xroles WHERE xroles_id > 1',array(),'obj');
		$childList = array();
		foreach ($result as $key => $value) {
				# code...
				if ($value->xroles_id !=2) {
					$childList[$value->xroles_id] =  $this->admin->getChild($value->xroles_id);
				}
				
			}
		$data['child'] = $childList;
		
		$this->template->_admin('xadmin/role_',$data,$this->load);
	}


	public function new_record(){
		$ifsuccess = 0;
				$result = $this->form->post('btn-submit');
				 if($result){
					//create role
					$role_data['role'] = $result['role'];
					$role_data['status'] =  $result['status'];
					unset($result['role']);
					unset($result['role_id']);
					unset($result['status']);
					$role_data['date_created'] = date('Y-m-d H:i:s');
					$role_id = $this->crud->create('_xroles',$role_data);
					
				

				foreach($result as $k => $v){
					$xparentmodule_id = str_replace('_','',$k);
					//echo $k;
					$roleData['xparentmodule_id'] = $xparentmodule_id;
					$roleData['xroles_id'] = $role_id;
					$roleData['_xcreate'] 	= ($v['_xcreate']==0)? 0 : $v['_xcreate'];
					$roleData['_xread'] 	= ($v['_xread']==0)	? 0 : $v['_xread'];
					$roleData['_xupdate'] 	= ($v['_xupdate']==0)? 0 : $v['_xupdate'];
					$roleData['_xdelete'] 	= ($v['_xdelete']==0)? 0 : $v['_xdelete'];
					$roleData['_xexport'] 	= ($v['_xexport']==0)? 0 : $v['_xexport'];
					$roleData['_xprint'] 	= ($v['_xprint']==0)? 0 : $v['_xprint'];
					$roleData['_xupload'] 	= ($v['_xupload']==0)? 0 : $v['_xupload'];
					$ifsuccess += $this->crud->create('_xacl',$roleData);

					
				}

				if($ifsuccess > 0){
					$this->session->_set(array('message'=>true,'action'=>'add'));
					redirect('xadmin/role');
				}
					
				
			}
		$data['result'] = $this->result;
		$data['action'] = "new-record";
		$this->template->_admin('xadmin/role_create',$data,$this->load);
	}
	
	public function add(){
		$this->load->libraries(array('form'));
		$ifsuccess = 0;
				$result = $this->form->post('btn-submit');
				 if($result){
					//create role
					$role_data['role'] = $result['role'];
					unset($result['role']);
					$role_data['status'] =  1;

					$role_id = $this->crud->create('_role',$role_data);
					//print_pre($result);
					
					foreach($result as $k => $v){
						$k = str_replace('_','',$k);
						$this->modules[$k]['_create'] = $v['_create'];
						$this->modules[$k]['_read'] = $v['_read'];
						$this->modules[$k]['_update'] = $v['_update'];
						$this->modules[$k]['_delete'] = $v['_delete'];
						$this->modules[$k]['_export'] = $v['_export'];
						$this->modules[$k]['_print'] = $v['_print'];
						$this->modules[$k]['_upload'] = $v['_upload'];
						//;
					
					}
					
					$x = array();
					foreach($this->modules as $k => $v){
						$x['module_id'] = $k;
						$x['role_id'] = $role_id;
						$x['_create'] 	= ($v['_create']==0)? 0 : $v['_create'];
						$x['_read'] 	= ($v['_read']==0)	? 0 : $v['_read'];
						$x['_update'] 	= ($v['_update']==0)? 0 : $v['_update'];
						$x['_delete'] 	= ($v['_delete']==0)? 0 : $v['_delete'];
						$x['_export'] 	= ($v['_export']==0)? 0 : $v['_export'];
						$x['_print'] 	= ($v['_print']==0)? 0 : $v['_print'];
						$x['_upload'] 	= ($v['_upload']==0)? 0 : $v['_upload'];
						$ifsuccess += $this->crud->create('_acl',$x);
					}
				if($ifsuccess>0){
					$this->session->_set(array('message'=>true,'action'=>'add'));
						$data['log_data'] = $result['role'];
						redirect('xadmin/role');
				}
			}
	
		$data['result'] = $this->result;
		$data['role'] = $this->crud->read('SELECT * FROM _role WHERE status=1',array(),'obj');
		$data['action'] = "add";
		$this->template->adminTemplate('xadmin/role_create',$data,$this->load);
	
	}
	
	public function modify($id = false){
	 $role_id = $this->hash->decryptMe_($id[0]);
	$result = $this->form->post('btn-submit');
	//print_pre($result);
	$ifsuccess = 0;
	if($result){
				
				$role_data['role'] = $result['role'];
				$role_data['status'] = $result['status'];
				unset($result['role']);
				unset($result['role_id']);
				unset($result['status']);
				print_r($role_data);
					$ifsuccess = $this->crud->update('_xroles',$role_data,array('xroles_id'=>$role_id));
			//	print_pre($result);
				foreach($result as $k => $v){
					$xparentmodule_id = str_replace('_','',$k);
					//echo $k;
					$roleData['xparentmodule_id'] = $xparentmodule_id;
					$roleData['xroles_id'] = $role_id;
					$roleData['_xcreate'] 	= ($v['_xcreate']==0)? 0 : $v['_xcreate'];
					$roleData['_xread'] 	= ($v['_xread']==0)	? 0 : $v['_xread'];
					$roleData['_xupdate'] 	= ($v['_xupdate']==0)? 0 : $v['_xupdate'];
					$roleData['_xdelete'] 	= ($v['_xdelete']==0)? 0 : $v['_xdelete'];
					$roleData['_xexport'] 	= ($v['_xexport']==0)? 0 : $v['_xexport'];
					$roleData['_xprint'] 	= ($v['_xprint']==0)? 0 : $v['_xprint'];
					$roleData['_xupload'] 	= ($v['_xupload']==0)? 0 : $v['_xupload'];

					$resultx = $this->crud->read('SELECT count(xroles_id) AS count FROM _xacl WHERE xparentmodule_id=:id AND xroles_id=:idx',array(':id'=>$xparentmodule_id,':idx'=>$role_id),'assoc');
					if($resultx['count']==1){
						$ifsuccess +=$this->crud->update('_xacl',$roleData,array('xparentmodule_id'=>$xparentmodule_id,'xroles_id'=>$role_id),'=');
					}else{
						$ifsuccess += $this->crud->create('_xacl',$roleData);
					}
				}

				if($ifsuccess > 0){
					$this->session->_set(array('message'=>true,'action'=>'update'));
					redirect('xadmin/role');
				}
				
			}
	
	
		
		$data['result'] = $this->result;	
		$data['role'] = $this->crud->read('SELECT * FROM _xroles WHERE xroles_id=:id',array(':id'=>$role_id),'assoc');
		$result = $this->crud->read('SELECT * FROM _xparentmodule AS m INNER JOIN _xacl AS p ON m.xparentmodule_id=p.xparentmodule_id WHERE p.xroles_id=:id AND m.xparentmodule_id!=2',array(':id'=>$role_id),'obj');
		$modules = array();
		$modules_init = array();
		foreach($result as $k => $g){
			if ($g->xparentmodule_id !=2) {
			$modules[$g->xparentmodule_id] = array();
			$modules[$g->xparentmodule_id]['_xcreate'] = ($g->_xcreate==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xread'] = ($g->_xread ==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xupdate'] = ($g->_xupdate==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xdelete'] = ($g->_xdelete==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xexport'] = ($g->_xexport==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xprint'] = ($g->_xprint==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xupload'] = ($g->_xupload==1) ? 1 : 0;
		}
		}
		//print_pre($result);
		$data['modules'] = $modules;
		$data['action'] = "edit";
		$this->template->_admin('xadmin/role_create',$data,$this->load);
	}

	public function view($id = false){
	 $role_id = $this->hash->decryptMe_($id[0]);
	$result = $this->form->post('btn-submit');
	//print_pre($result);
	$ifsuccess = 0;
	if($result){
				
				$role_data['role'] = $result['role'];
				$role_data['status'] = $result['status'];
				unset($result['role']);
				unset($result['role_id']);
				unset($result['status']);
				print_r($role_data);
					$ifsuccess = $this->crud->update('_xroles',$role_data,array('xroles_id'=>$role_id));
			//	print_pre($result);
				foreach($result as $k => $v){
					$xparentmodule_id = str_replace('_','',$k);
					//echo $k;
					$roleData['xparentmodule_id'] = $xparentmodule_id;
					$roleData['xroles_id'] = $role_id;
					$roleData['_xcreate'] 	= ($v['_xcreate']==0)? 0 : $v['_xcreate'];
					$roleData['_xread'] 	= ($v['_xread']==0)	? 0 : $v['_xread'];
					$roleData['_xupdate'] 	= ($v['_xupdate']==0)? 0 : $v['_xupdate'];
					$roleData['_xdelete'] 	= ($v['_xdelete']==0)? 0 : $v['_xdelete'];
					$roleData['_xexport'] 	= ($v['_xexport']==0)? 0 : $v['_xexport'];
					$roleData['_xprint'] 	= ($v['_xprint']==0)? 0 : $v['_xprint'];
					$roleData['_xupload'] 	= ($v['_xupload']==0)? 0 : $v['_xupload'];

					$resultx = $this->crud->read('SELECT count(xroles_id) AS count FROM _xacl WHERE xparentmodule_id=:id AND xroles_id=:idx',array(':id'=>$xparentmodule_id,':idx'=>$role_id),'assoc');
					if($resultx['count']==1){
						$ifsuccess +=$this->crud->update('_xacl',$roleData,array('xparentmodule_id'=>$xparentmodule_id,'xroles_id'=>$role_id),'=');
					}else{
						$ifsuccess += $this->crud->create('_xacl',$roleData);
					}
				}

				if($ifsuccess > 0){
					$this->session->_set(array('message'=>true,'action'=>'update'));
					redirect('xadmin/role');
				}
				
			}
	
	
		
		$data['result'] = $this->result;	
		$data['role'] = $this->crud->read('SELECT * FROM _xroles WHERE xroles_id=:id',array(':id'=>$role_id),'assoc');
	/*	$result = $this->crud->read('SELECT * FROM _xparentmodule AS m WHERE m.xparentmodule_id!=2',array(),'obj');
		$modules = array();
		$modules_init = array();
		foreach($result as $k => $g){
			if ($g->xparentmodule_id !=2) {
			$modules[$g->xparentmodule_id] = array();
			$modules[$g->xparentmodule_id]['_xcreate'] = ($g->_xcreate==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xread'] = ($g->_xread ==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xupdate'] = ($g->_xupdate==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xdelete'] = ($g->_xdelete==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xexport'] = ($g->_xexport==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xprint'] = ($g->_xprint==1) ? 1 : 0;
			$modules[$g->xparentmodule_id]['_xupload'] = ($g->_xupload==1) ? 1 : 0;
		}
		}*/
		//print_pre($result);
		$data['modules'] = $modules;
		$data['action'] = "edit";
		$this->template->_admin('xadmin/role_view',$data,$this->load);
	}

	public function xtest(){
		$db_array=array( 
					"sql"=>'SELECT movie,year,rating_imdb,genre FROM films', /* Spell out columns names no SELECT * Table */
					"table"=>'films', /* DB table to use assigned by constructor*/
				    "idxcol"=>'id' /* Indexed column (used for fast and accurate table cardinality) */
					);
		$db_array = 'test';
		echo $a =  base64_encode(serialize($db_array));
		echo "<br />";
		echo $d=unserialize(base64_decode($a));
		print_pre($d); 
	}
	
	
}