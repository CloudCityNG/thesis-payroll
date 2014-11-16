<?php
class template{
	public $registry ;
	public function __construct(){
		$this->registry = Registry::getInstance();

	}

	public function _admin($path,$data,$mvc){
		$userID = $this->registry->session->_get('user_id');
		$data['user'] = $user = $this->registry->user->data($userID);
	
		//Find the parent module if exists

		$a = str_replace("_","-",getController());
		
		$module = $this->registry->crud->read("SELECT * FROM _xparentmodule WHERE _xurl = :url",array(':url'=>$a),'assoc');
		$module_id = $module['xparentmodule_id'];
		$method = (getMethod()!='index') ? getMethod() : null;

		$acl = $this->registry->permission->getUserPermission($user['xroles_id']);

		$permission = $acl['module'][$module_id];
		if ($user['xroles_id']==1 || $user['xroles_id']==2) {
				$permission['_url'] = $acl['module'][$module_id]['_url'];
				$permission['_created'] = 1;
				$permission['_read'] 	= 1;
				$permission['_update'] 	= 1;
				$permission['_delete'] 	= 1;
				$permission['_print'] 	= 1;
				$permission['_export'] 	= 1;

			}
		
		$data['user']['permission'] = $permission;
		$data['user']['navigation'] = $acl['nav'];
		$data['title'] = ucfirst($permission['module']);
		$mConfig = array();
		$mConfig['uPermission'] =  $permission;
		$data['hashConfig'] = base64_encode(serialize($mConfig));
		$mvc->render('xadmin/common/header',$data);
			if ($a=='account') {
				$permission['_read'] = 1;
			}
		if ($permission['_read']==1) {
				$file = APPS.getApplication().DS."views".DS.$path.EXT;
				if (file_exists($file)) {
						$mvc->render($path,$data);
					}else{
						echo '<div class="container">
							<h1>File Not found <span>:(</span></h1>

							<p>Sorry, but the page you were trying to view does not exist.</p>

							<p>It looks like this was the result of either:</p>
							<ul>
								<li>you don\'t have a permission to access</li>
								<li>a mistyped address</li>
								<li>an out-of-date link</li>
							</ul>
						</div>';
					}
					
		}else{
			echo '<div class="container">
							<h1>Not found <span>:(</span></h1>

							<p>Sorry, but the page you were trying to view does not exist.</p>

							<p>It looks like this was the result of either:</p>
							<ul>
								<li>you don\'t have a permission to access</li>
								<li>a mistyped address</li>
								<li>an out-of-date link</li>
							</ul>
						</div>';
		}
		$mvc->render('xadmin/common/footer',$data);	
/*
		$data['permission'] = $permissionResult;
		$mvc->render('xadmin/common/header',$data);
		if ($moduleId) {
			if($permission){

				$file = APPS.getApplication().DS."views".DS.$path.EXT;
					if (file_exists($file)) {
						$mvc->render($path,$data);
					}else{
						echo '<div class="container">
							<h1>File Not found <span>:(</span></h1>

							<p>Sorry, but the page you were trying to view does not exist.</p>

							<p>It looks like this was the result of either:</p>
							<ul>
								<li>you don\'t have a permission to access</li>
								<li>a mistyped address</li>
								<li>an out-of-date link</li>
							</ul>
						</div>';
					}
			}else{
				echo '<div class="container">
							<h1>Not found <span>:(</span></h1>

							<p>Sorry, but the page you were trying to view does not exist.</p>

							<p>It looks like this was the result of either:</p>
							<ul>
								<li>you don\'t have a permission to access</li>
								<li>a mistyped address</li>
								<li>an out-of-date link</li>
							</ul>
						</div>';
			}
		}
	
		$mvc->render('xadmin/common/footer');*/
		/*
		*/
	}
}