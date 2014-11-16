<?php
function app_base_url($curl=false){
	$confi = new config;
	return $confi->config['base_url'].$curl;
	//return $config['base_url'];
}

function base_url($curl = false){
	 $a = getApplication();
	$config = new config;
	$dUrl = $config->config['base_url'];
	if($a!=DEFAULT_APP){
			$url = explode("/",rtrim($config->config['base_url'],"/"));
			$a = count($url) - 1;
			unset($url[$a]);
			$aUrl = '';
			foreach($url as $k){
				$aUrl.=$k."/";
			}
			$dUrl = $aUrl;
		}
	return $dUrl.$curl;
	//$base_url = $config->config['base_url'];
	//return $base_url."/".$curl;
	//return rtrim($confi->config['base_url'],$a."/")."/".$curl;
}

function getInstance(){
	return registry::getInstance();
}

function show_404(){
	echo 404;
}

function html5($title = false){
	echo "<!DOCTYPE html>\n<html lang=\"en\">\n<head><meta charset=\"utf-8\" />\n<title>".(($title) ? $title : null)."</title>\n";
}

function redirect($url,$ref = false){
	return header('location:'.base_url($url));
}

function icon($where = false){
	$icon = "<link type='icon/image' rel='icon' href='".base_url($where)."' />";
	echo $icon;
}


function readmore($text,$limit,$string = false){

	return (strlen($text)>=$limit) ? substr($text,0,$limit-2).".." :  substr($text,0,$limit);
}

function r_string($string){
	return strip_tags(trimslashes(trim($string)));
}

function trimslashes($string){
	return stripslashes($string);
}

function r_md5($string){
	return md5(r_string($string));
}

function r_sha($string){
	return sha1(r_string($string));
}
function getController(){
	$c = getRequest();
	return $c['_controller'];
}

function getMethod(){
	$c = getRequest();
	return $c['_method'];
}

function getParams(){
	$c = getRequest();
	return $c['_args'];
}

function getApplication(){
	$c = getRequest();
	return $c['_app'];
}

function getUrl(){
	$url = base_url();
	$url .= getController()."/";
	$url .= getMethod()."/";
	$param = '';
	foreach (getParams() as $value) {
			$param .= $value."/";
		}
	$url .=rtrim($param,"/");
	return $url;
}

function getRequest(){
	$mvc = new request;
	$request = array();
	$request['_app'] = $mvc->getApplication();
	$request['_controller'] = $mvc->getController();
	$request['_method'] = $mvc->getMethod();
	$request['_args'] = $mvc->getParams();
	return $request;
}

function print_pre($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function isAjax(){
	return ((!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') )? true : false;
}

function random_string($length=16,$mode=2,$char_set=true) { 
	$string = ''; 
	$possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';   
		if($char_set) {   
			$possible .= strtolower($possible);
			   }   
		switch($mode) {   
			case 3:   $possible .= '`~!@#$%^&*()_-+=|}]{[":;<,>.?/';   
			case 2:   $possible .= '0123456789'; 
			break;   
		}   
		for($i=1;$i<$length;$i++) { 
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1); 
			$string .= $char; 
		}   

		return $string; 
}

function showMessage($messasage = '',$action = 'success'){
	$a = "<div class='alert alert-".$action."'>";
	$a .= $messasage;
	$a .= "</div>";
	return $a;
}

function showMessageSmall($messasage = '',$action = 'success'){
	$a = "<div class='alert alert-".$action." alert-small'>";
	$a .= $messasage;
	$a .= "</div>";
	return $a;
}

function htmlSelect($arr,$name,$id,$val,$classx,$ref = false,$selectx = true){
$select = '';
$select.= '<select name="'.$name.'" id="'.$name.'" class="'.$classx.'">';
if($selectx==true){
$select.= '<option value="">-Select-</option>';
}
	if(count($arr) > 0){
		foreach ($arr as $key => $value) {
			# code...
				if($ref){
					$selected = ($value->$id==$ref) ? 'selected' : null;
					$select.= '<option value="'.$value->$id.'" '.$selected.'>'.$value->$val.'</option>';
				}else{
					$select.= '<option value="'.$value->$id.'">'.$value->$val.'</option>';
				}
												
				}
		}

	$select.= '</select>';	
return $select;
}

function createCheckBox($name,$ischeck=false){
	$value = ($ischeck) ? 1 : 0;
	$check = ($ischeck) ? 'checked' : null;
	$checkbox = '<input type="checkbox" name="'.$name.'" id="'.$name.'" '.$check.' />';
	return $checkbox;
}

function genKey($id){
	$mvc =Registry::getInstance();
	$id = $mvc->hash->encryptMe_($id);
	$hash = str_replace('/', ';', $id);
	return $hash;
}

function dropDown(){
	 $dropdown ='<ul class="nav navbar-nav">';
     $dropdown .='       <li class="dropdown">';
     $dropdown .='         <a href="#" class="dropdown-toggle" data-toggle="dropdown">config</a>';
     $dropdown .='        <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown">';
                        	
     $dropdown .='	       </ul>';
     $dropdown .='       </li>';
     $dropdown .='     </ul>';
}
