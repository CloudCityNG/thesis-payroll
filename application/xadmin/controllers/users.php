<?php

class users extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if ($this->session->_get('xadminlogin')==false) {
				redirect('xadmin/home/auth');
			}


		
	}
	public function index(){
		//$data['users'] = $this->crud->read('SELECT * FROM _xusers as u LEFT JOIN _role as r ON u.role_id=r.role_id WHERE u.users_id!=:id AND u.users_id!=1',array(':id'=>$this->session->_get('users_id')),'obj');
			if($this->session->_get('message')==1){
					if ($this->session->_get('action')=='add') {
						$data['success'] = '<strong>Congratulations!.</strong> New record successfully added.';
					}

					if ($this->session->_get('action')=='update') {
						$data['success'] = '<strong>Congratulations!.</strong> User was successfully update.';
					}
				$this->session->_set(array('message'=>0,'action'=>''));

			}

		$this->template->_admin('xadmin/users',$data,$this->load);
	}
	
	public function new_record($id = false){
		
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
		unset($result['users_id']);
			
		if($result){
		$result['date_created'] = date("Y-m-d H:i:s");
		$result['password'] =  $this->hash->encryptMe_($result['password']);
				 if( $this->crud->create('_xusers',$result)){
					$this->session->_set(array('message'=>true,'action'=>'add'));
						$data['log_data'] = $result['email'];
					redirect('xadmin/users');
				} 
		}
	$data['role'] = $this->crud->read('SELECT * FROM _xroles WHERE status=1 AND xroles_id!=1',array(),'obj');
	$data['action'] = 'Add';
			$this->template->_admin('xadmin/users_',$data,$this->load);
	}
	
	private function test(){
		echo 1;
	}

	public function modify($id =false){
		$users_id = $this->hash->decryptMe_($id[0]);
		$this->load->libraries(array('form'));
		$reset = $this->form->post('reset-password');
			
		$result = $this->form->post('btn-submit');
		
			if ($result) {
				# code...
				$users_id = $result['xusers_id'];
				unset($result['xusers_id']);
				$isupdate = $this->crud->update('_xusers',$result,array('xusers_id'=>$users_id));
					if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						redirect('xadmin/users');
					}
			}

			
			
			$data['result'] = $this->crud->read('SELECT * FROM _xusers WHERE xusers_id = :id',array(':id'=>$users_id),'assoc');
			$data['action'] = 'Edit';
			$data['role'] = $this->crud->read('SELECT * FROM _xroles WHERE status=1 AND xroles_id!=1',array(),'obj');
			$this->template->_admin('xadmin/users_',$data,$this->load);

	}
	
}