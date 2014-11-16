<?php
if(!defined('APPS')) exit ('No direct access allowed');

class user extends crackerjack_model{
	public function __construct(){
		parent::__construct();
	}

	public function data($id){
		$result =  $this->crud->read("SELECT * FROM _xusers WHERE xusers_id=:id",array(':id'=>$id),'assoc');
		$get = $this->crud->read('SELECT role FROM _xroles WHERE xroles_id = :id',array(':id'=>$result['xroles_id']),'assoc');
		$result['role'] = $get['role'];
		return $result;
	}

	public function isPasswordCorrect($id,$password){
		$return  = false;
			$result = $this->data($id);
				if ($result) {
					$dbpasswrod = $this->hash->decryptMe_($result['password']);
					if ($password==$dbpasswrod) {
						$return = true;
					}
			}

		return $return;
	}



	public function email($id,$email,$password){
		$info = $this->crud->read('SELECT password FROM _temployee WHERE employee_id = :id',array(':id'=>$id),'assoc');
		$pass_data = explode('::',$info['password']);
		$this->hash->hash_encryption($pass_data[0]);
		$passworddb = $this->hash->decrypt($pass_data[1]);
		if($password==$passworddb){
			//if password is match create new key for new password
				$data['email'] = $email;
				return $this->crud->update('_temployee',$data,array('employee_id'=>$id));
			}else{
			return false;
		}	
	}
}