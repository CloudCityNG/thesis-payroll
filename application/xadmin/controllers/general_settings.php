<?php
class general_settings extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if ($this->session->_get('xadminlogin')==false) { redirect('xadmin/home/auth');}
	}
	public function index(){
		redirect('xadmin/general-settings/leave-request');
	}

	public function payroll(){
		$data['page'] = 'payroll';
		$this->template->_admin('xadmin/general_settings',$data,$this->load);
	}
	
	public function leave_request(){
		if(isAjax()){
			$result['days_prior'] = $_POST['days_prior'];
				echo $this->crud->update('_tleavesettings',$result,array('leavesettings_id'=>1));
			die();
		}
	
		$data['page'] = 'leave';
		$data['leave_days_prior'] = $this->crud->read("SELECT * FROM _tleavesettings WHERE leavesettings_id = 1",array(),'assoc');
		$this->template->_admin('xadmin/general_settings',$data,$this->load);
	}
	
	public function overtime_request(){
		$data['page'] = 'overtime';
		$this->template->_admin('xadmin/general_settings',$data,$this->load);
	}
	
	
}