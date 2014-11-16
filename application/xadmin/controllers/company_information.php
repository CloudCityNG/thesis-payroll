<?php
class company_information extends crackerjack{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			if ($this->session->_get('xadminlogin')==false) {
				redirect('xadmin/home/auth');
			}

			$this->template->_admin('xadmin/company_information',$data,$this->load);
		}
}