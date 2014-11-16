<?php
class home extends crackerjack{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			/*$result = $this->permission->subModule(1,5);
			*/
			//print_pre($_SESSION);

			if ($this->session->_get('xadminlogin')==false) {
				redirect('');
			}
			
			//echo $this->hash->decryptMe_('rfW7PS5Jj9rjeDo::tBm1jly0+Vgv9xbes6sxEGf0vBKkFiKbcgzv');

			$this->template->_admin('xadmin/dashboard',$data,$this->load);
		}

		public function ajaxlogin(){
			if (isAjax()) {
				echo $this->session->_get('xadminlogin')==false ? null : true;
			}
		}

		public function testing($a = false){
			$this->template->_admin('xadmin/dashboard',$data,$this->load);
		}

		public function auth(){
				if (isAjax()) {
				if ($_POST) {
				$isValid = 0;
					$_postData = $this->form->_serialize($_POST);
					//print_r($_postData);
					if (empty($_postData['username']) || empty($_postData['password'])) {
							$isValid = 1; 
						}else{
							$result = $this->user_auth->validate($_postData['username'],$_postData['password']);
		
							if ($result) {
								//$this->session->_set(array('employeeLogin'=>true,'employee_id'=>$result['employee_id']));
								$this->session->_set(array('xadminlogin'=>true,'user_id'=>$result['xusers_id'],'role_id'=>$result['xroles_id']));
									
								$isValid = 2;
							}
					}
				echo $isValid;
		
				}
			die();
			}
				redirect('xadmin/home');
			if ($this->session->_get('xadminlogin')==true) {
			}
			if (isset($_POST['btn_success'])) {
				$invalid = 'Invalid Username or password.';
					$_postData = $this->form->_serialize($_POST);
						if (empty($_postData['username']) || empty($_postData['password'])) {
							$data['error'] = $invalid; 
						}else{
							$result = $this->user_auth->validate($_postData['username'],$_postData['password']);
							if ($result) {
								$this->session->_set(array('xadminlogin'=>true,'user_id'=>$result['xusers_id'],'role_id'=>$result['xroles_id']));
								redirect('xadmin');
								
							}else{
								$data['error'] = $invalid;
							}
						}

			}
								
			$data['title'] = "Administrator login";
			$data['notlogin'] = 'login';
			$this->load->render('notlogin/index',$data);
		}

		public function forgot(){
				redirect('');
			if ($this->session->_get('xadminlogin')==true) {
			}

			if (isset($_POST['btn_success'])) {
				$invalid = 'Email address not exists in database.';
					$_postData = $this->form->_serialize($_POST);
						$result = $this->user_auth->forgot($_postData['username']);
						
						if ($result) {
							//to do
							$data['success'] = 'Password was successfully reset. Kindly check your email.';
						}else{
							$data['error'] = $invalid;
						}
			}
			$data['title'] = "Forgot Password";
			$data['notlogin'] = 'forgot';
			$this->load->render('notlogin/index',$data);
		}

		public function logout(){
			$this->session->_unset();
			redirect('');
		}

		public function reg(){
			$a = "text.test_s_sd";
			echo preg_replace("/[a-zA-Z0-9_]*+./","$2",$a);
		}
		
}