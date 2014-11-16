<?php

class account extends crackerjack{
	public $count = 0;
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
				redirect('profile/home/auth');
			}
	
		}
	public function index(){
		$this->information();
	}

	public function information(){
		if ($_POST) {
			if (isAjax()) {
				$result = $this->form->post('changeinfomation');
				echo $this->crud->update('_temployee',$result,array('employee_id'=>$this->session->_get('employee_id')));
			}
			die();
		}

		$this->template->employeeTemplate('employee/account_information',$data,$this->load);
	}

	public function settings(){
		if ($_POST) {
			if (isAjax()) {
				if(isset($_POST['changeemail'])){
					$result = $this->form->post('changeemail');
					$email = $result['inputEmail'];
					$password = $result['inputPasswordx'];
					echo $this->user->email($this->session->_get('employee_id'),$email,$password);
				}
			}
			die();
		}

		if(isset($_POST['changeemail'])){
			$result = $this->form->post('changeemail');
			$email = $result['inputEmail'];
			$password = $result['inputPasswordx'];
				if(empty($email) || empty($password)){
					$data['message'] = "<div class='alert alert-error alert-fade'>Enter email and password.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}else{
					$result =  $this->user->email($this->session->_get('users_id'),$email,$password);
						
				if($result==true){
					$data['message'] = "<div class='alert alert-success alert-fade'>Email is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
					}else{
					$data['message'] = "<div class='alert alert-error alert-fade'>Password is not match.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}
				
				}
		}

		if(isset($_POST['changepassword'])){

			$passresult = $this->form->post('changepassword');

			if(empty($passresult['newpassword']) || empty($passresult['inputOldPassword'])){
				$data['message'] = "<div class='alert alert-error alert-fade'>Please enter password.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}else{
			$result =  $this->user->changepassword($this->session->_get('users_id'),$passresult['inputOldPassword'],$passresult['newpassword']);
				if($result==true){
					$data['message'] = "<div class='alert alert-success alert-fade'>Password is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
					}else{
				$data['message'] = "<div class='alert alert-error alert-fade'>Old Password is not match.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}
			}
		}
		$this->template->employeeTemplate('employee/account_settings',$data,$this->load);
	}


}