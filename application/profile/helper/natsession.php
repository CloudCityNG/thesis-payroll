<?php

function islogin(){
		$mvc =Registry::getInstance();
		 if($mvc->session->_get('employeeLogin')==true){
			return true;
		}else{
			return false;
	} 
}
