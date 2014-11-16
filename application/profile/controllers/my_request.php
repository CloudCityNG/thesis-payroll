<?php

class my_request extends crackerjack{
	public $count = 0;
	public function __construct(){
		parent::__construct();
		}
	public function index(){
		if(islogin()==false){
				redirect('profile/home/auth');
			}
		
		$this->template->employeeTemplate('employee/my_request',$data,$this->load);

	}
	
	public function vacation(){
		if ($_POST) {
			if (isAjax()) {
				if(isset($_POST['sendrequest'])){
					$result = $this->form->post('sendrequest');
					$result['leavesettings_id'] = 1;
					$result['employee_id'] = $this->session->_get('employee_id');
					echo $this->crud->create("_temprequest",$result);
				}
			}
			die();
		}

		$data['vacation_prior'] = $this->crud->read("SELECT * FROM _tleavesettings WHERE leavesettings_id = 1",array(),'assoc');
			$this->template->employeeTemplate('employee/my_request_vacation',$data,$this->load);
	}

	public function auth(){
		
			if ($_POST) {
				$isValid = 0;
					$_postData = $this->form->_serialize($_POST);
					//print_r($_postData);
					if (empty($_postData['username']) || empty($_postData['password'])) {
							$isValid = 1; 
						}else{
							$result = $this->user_auth->validate($_postData['username'],$_postData['password']);
		
							if ($result) {
								$this->session->_set(array('employeeLogin'=>true,'employee_id'=>$result['employee_id']));
								$isValid = 2;
							}
					}
				echo $isValid;
				return false;
			}
		$this->load->render('employee/login',$data);
	}

	

	

	public function changepassword(){
		header('Content-type: application/json');
			$this->load->model(array('employee'));
			$oldpassword = $_POST['inputOldPassword'];
			$newpassword = $_POST['newpassword'];
			$result = $this->employee->changepassword($this->session->_get('employee_id'),$oldpassword,$newpassword);
				if($result){
					$log_data['emodule_id'] = '1';
					$log_data['employee_id'] = $this->session->_get('employee_id');
					$log_data['log_data'] = "Change Password";
					$log_data['action'] = 'edit';
					$log_data['ipaddress'] = $_SERVER['REMOTE_ADDR'];
					$this->crud->create('_elogs',$log_data);
				}

			$y['result'] = ($result) ? true : false;
		echo json_encode($y);
	}
		public function logout(){
			$this->session->_unset();
			redirect('profile/home/auth');
		}


	public function passevaluation(){
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
		$dutiesandresponsibilities_id = $result['dutiesandresponsibilities_id'];

		$dardata['total_weight'] = $result['total_weight'];
		$dardata['total_q_rating'] =$result['total_q_rating'];
		$dardata['total_average'] = $result['total_average'];
		$dardata['total_qnty_rating'] = $result['total_qnty_rating'];
		$dardata['status'] = 1;
		$isupdate = $this->crud->update('_dutiesandresponsibilities',$dardata,array('dutiesandresponsibilities_id'=>$dutiesandresponsibilities_id));
			
		unset($result['total_weight']);
		unset($result['total_q_rating']);
		unset($result['total_qnty_rating']);
		unset($result['total_average']);
		unset($result['dutiesandresponsibilities_id']);
			if ($isupdate) {
					//print_r($result);

				$data = array();
					foreach ($result as $key => $value) {
						$field_nme = $key;
						foreach ($value as $k => $v) {
							$data[$k][$field_nme] = $v;

						}
						
					}
					
			
					foreach ($data as $key => $value) {
						
						$isupdate += $this->crud->update('_dutiesandresponsibilitiesitems',$value,array('dutiesandresponsibilitiesitems_id'=>$key));
							
					}
			}

		if ($isupdate > 0) {
			$this->session->_set(array('message'=>true,'action'=>'submit'));
			redirect('account/task/success');
		}
		//print_pre($data);
	}


		
}