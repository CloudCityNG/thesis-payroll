<?php
class home extends crackerjack{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->load->render('index');
		}

		public function testing($a = false){
			$this->session->_set(array('islogin'=>true));
			echo islogin();
	
		}
		
}