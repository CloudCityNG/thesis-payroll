<?php
class template{
	public $registry ;
	public function __construct(){
		$this->registry = Registry::getInstance();

	}

	public function employeeTemplate($body,$data = array(),$loader,$module = false){
		//$this->registry->load->models(array('employee'));

		$loader->model(array('employee'));
		$data['info'] = $this->registry->employee->information();
		$loader->render('employee/common/head_',$data);
		$loader->render($body,$data);
		$loader->render('employee/common/footer_',$data);
	}

}