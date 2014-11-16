<?php
class login extends crackerjack{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			
			$this->load->render('index');
		}

		public function login(){
			if (isAjax()) {
				
			}
			die();

		}
		
}