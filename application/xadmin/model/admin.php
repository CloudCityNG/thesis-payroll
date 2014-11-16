<?php
if(!defined('APPS')) exit ('No direct access allowed');

class admin extends crackerjack_model{
	public function __construct(){
		parent::__construct();
	}

	public function getChild($ref){
		$result = $this->crud->read('SELECT module.parentmodule FROM _xacl acl LEFT JOIN _xparentmodule module ON acl.xparentmodule_id = module.xparentmodule_id WHERE xroles_id=:id AND module.status = 1 AND (acl._xcreate=:permission OR acl._xread=:permission OR acl._xupdate=:permission OR acl._xdelete=:permission)',array(':id'=>$ref,':permission'=>1),'obj');
		$list = "";
		foreach ($result as $key => $value) {
			$list .= $value->parentmodule.', ';
		}
		return rtrim($list,',');
	
	}

}