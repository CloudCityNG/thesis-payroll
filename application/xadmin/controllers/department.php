<?php

class department extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if ($this->session->_get('xadminlogin')==false) { redirect('xadmin/home/auth');}
	}
	public function index(){
		if($this->session->_get('message')==1){
			if($this->session->_get('action')=='update'){
				$data['success'] = 'Department was successfully updated.';
			}
			if($this->session->_get('action')=='add'){
				$data['success'] = 'Department was successfully added';
			}
		$this->session->_set(array('message'=>false,'action'=>''));
		}
		$data['department'] = $this->crud->read('SELECT * FROM _tdepartment',array(),'obj');
		$this->template->_admin('xadmin/department',$data,$this->load);
	}
	
	public function new_record($id = false){
		
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
		unset($result['department_id']);
			
		if($result){
			$result['date_created'] = date('Y-m-d H:i:s');
		 if( $this->crud->create('_tdepartment',$result)){
			$this->session->_set(array('message'=>true,'action'=>'add'));
			$data['log_data'] = $result['department'];
			redirect('xadmin/department');
		} 
		}
	$data['result'] = $this->crud->read('SELECT * FROM _xroles WHERE status=1 AND xroles_id!=1',array(),'obj');
	$data['action'] = 'Add';
			$this->template->_admin('xadmin/department_',$data,$this->load);
	}

	public function modify($id =false){
		$indexId = $this->hash->decryptMe_($id[0]);
			
		$result = $this->form->post('btn-submit');
		
			if ($result) {
				# code...
				$department_id = $result['department_id'];
				unset($result['department_id']);
				
				$isupdate = $this->crud->update('_tdepartment',$result,array('department_id'=>$department_id));
					if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						$data['log_data'] = $result['department'];
						redirect('xadmin/department');
					}
			}

		
			$data['result'] = $this->crud->read('SELECT * FROM _tdepartment WHERE department_id = :id',array(':id'=>$indexId),'assoc');
			$data['action'] = 'Edit';
			$this->template->_admin('xadmin/department_',$data,$this->load);

	}
	
}