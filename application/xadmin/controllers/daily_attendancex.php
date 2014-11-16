<?php

class daily_attendance extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if ($this->session->_get('xadminlogin')==false) { redirect('xadmin/home/auth');}
	}
	public function index(){
			if($this->session->_get('message')==1){
			if($this->session->_get('action')=='update'){
				$data['success'] = 'Employee was successfully updated.';
			}
			if($this->session->_get('action')=='add'){
				$data['success'] = 'Employee was successfully added';
			}
		$this->session->_set(array('message'=>false,'action'=>''));
		}
		$this->template->_admin('xadmin/attendance',$data,$this->load);
	}
}
