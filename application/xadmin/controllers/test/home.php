<?php

class home extends crackerjack{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			echo app_base_url();
		}

		public function testing($a = false){
		
		}
		
}