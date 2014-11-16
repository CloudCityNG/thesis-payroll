<?php
class employee extends crackerjack_model{
	private $info = array();
	private $data = array();
	private $id = null;
	private $model_registry = null;
	public function __construct(){
	parent::__construct();
	}
	/* 
	@information  it returns all information of the user
	return associated array
	date September 28, 2013
	author red
	*/
	public function information(){
		$mvc = Registry::getInstance();
		return $this->crud->read('SELECT e.*,p.position,d.department FROM _temployee AS e INNER JOIN _tposition AS p ON e.position_id = p.position_id JOIN _tdepartment AS d ON p.department_id = d.department_id WHERE employee_id = :id',array(':id'=>$this->session->_get('employee_id')),'assoc');
	}
	
	
	/* 
	@navigation  it returns user permission for particular modules
	return mixed
	date September 28, 2013
	author red
	*/
	private function navigation(){
		$navigation = array();
		if($this->info['role_id']==1){
			$result =  $this->crud->read('SELECT * FROM _module LEFT JOIN _label ON _module.label_id = _label.label_id WHERE _module.status = 1 ORDER BY _module.label_id,_module.module',array(),'obj');
		}else{
			$result =  $this->crud->read('SELECT p.*,m.module,m.url,m.label_id,l.* FROM _acl AS p LEFT JOIN _module AS m ON p.module_id = m.module_id LEFT JOIN _label AS l ON m.label_id = l.label_id WHERE p.role_id = :id AND m.status=1 AND p._read=1 ORDER BY m.label_id,m.module',array('id'=>$this->info['role_id']),'obj');
			
		}
		
		foreach($result as $key){
				//$navigation[][$key->module_id] = array();
				$navigation[$key->label_id]['label'] = $key->label ;
				if($this->info['role_id']!=1){
				$navigation[$key->label_id][$key->module_id]['acl_id'] = $key->acl_id;
				}
				$navigation[$key->label_id][$key->module_id]['module_id'] = $key->module_id;
				$navigation[$key->label_id][$key->module_id]['url'] = $key->url;
				$navigation[$key->label_id][$key->module_id]['module'] = $key->module;
				$navigation[$key->label_id][$key->module_id]['_create'] = $key->_create;
				$navigation[$key->label_id][$key->module_id]['_update'] = $key->_update;
				$navigation[$key->label_id][$key->module_id]['_delete'] = $key->_delete;
				$navigation[$key->label_id][$key->module_id]['_read'] = $key->_read;
				$navigation[$key->label_id][$key->module_id]['_export']= $key->_export;
				$navigation[$key->label_id][$key->module_id]['_print'] = $key->_print;
			}
		return $navigation;
	} 


	public function permission($module_id){
		$this->info = $this->information();
		$result = $this->crud->read('SELECT p.*,m.url,m.module FROM _acl p LEFT JOIN _module m ON p.module_id = m.module_id WHERE p.role_id=:rid AND p.module_id=:mid',array(':rid'=>$this->info['role_id'],':mid'=>$module_id),'assoc');
		return (is_array($result) ? $result : false);
	}
	
	public function data(){
		$this->info = $this->information();
		$this->data['info'] = array();
		$this->data['info'] = $this->info;
		$this->data['info']['fullname'] = $this->info['firstname'] ." ". $this->info['lastname'];
		$this->data['nagivation'] = $this->navigation();
		return $this->data;
	}
	
	public function validate($email,$passw,$which = 'employee'){
		if ($email!=null && $passw!=null) {
			$info = $this->crud->read('SELECT * FROM _employee WHERE email = :user AND status=1',array(':user'=>$email),'assoc');
			$pass_data = explode('::',$info['password']);
			$this->hash->hash_encryption($pass_data[0]);
			$password = $this->hash->decrypt($pass_data[1]);
					if(count($info) >0){
							unset($info['password']);
							$info['islogin'] = true;
							$result =  ($password==$passw)? $info :  false;
						}else{
							$result = false;
						} 
			}
		return ($result==false) ? false : $result;
	}
	
	
	public function changepassword($id,$old,$pass){
	//fetch old password
		$info = $this->crud->read('SELECT password FROM _employee WHERE employee_id = :id',array(':id'=>$id),'assoc');
		$pass_data = explode('::',$info['password']);
		$this->hash->hash_encryption($pass_data[0]);
		$password = $this->hash->decrypt($pass_data[1]);
		if($password==$old){
				$vars = $this->hash->varkeydump();
				$this->hash->hash_encryption($vars);
				$data['password'] =  $vars."::".$this->hash->encrypt($pass);
				return $this->crud->update('_employee',$data,array('employee_id'=>$id));
			}else{
			return false;
		}	
	}
	
	public function email($id,$email,$password){
		$info = $this->crud->read('SELECT password FROM _users WHERE users_id = :id',array(':id'=>$id),'assoc');
		$pass_data = explode('::',$info['password']);
		$this->hash->hash_encryption($pass_data[0]);
		$passworddb = $this->hash->decrypt($pass_data[1]);
		if($password==$passworddb){
			//if password is match create new key for new password
				$data['email'] = $email;
				return $this->crud->update('_users',$data,array('users_id'=>$id));
			}else{
			return false;
		}	
	}
	
	public function reset($email){
		$result = $this->crud->read('SELECT password FROM _users WHERE email = :email',array(':email'=>$email),'assoc');
		$pass_data = explode('::',$result['password']);
		$this->hash->hash_encryption($pass_data[0]);
		$password = $this->hash->decrypt($pass_data[1]);
		$resultx = array();
		$resultx['password'] = $password;
		return (count($result) > 0 ) ? $resultx : false;
	}
	
	public function changeinformation($id,$vals){
		return $this->crud->update('_users',$vals,array('users_id'=>$id));
	}

	/*
	* print navigation
	*/
	public function navigationx(){

		$menu_label = array();
		$menu =  $this->crud->read('SELECT * FROM _module_label',array(),'obj');
			foreach ($menu as $key => $value) {
					$module = $this->crud->read('SELECT module,label_id,url,module_id,_create,_read,_update,_delete,_export,_print FROM _module WHERE label_id=:id AND status=1',array(':id'=>$value->label_id),'obj');
						foreach ($module as $xk => $xv) {
							if($value->label_id==$xv->label_id){
								$menu_label[$xv->label_id]['module'] = $module;
								$menu_label[$xv->label_id]['label'] = $value->label;
							}
						}

			}
		return $menu_label;
	}
}