<?php
class modules extends crackerjack{
		private $labels;
		public function __construct(){
			parent::__construct();
			if ($this->session->_get('xadminlogin')==false) {
				redirect('xadmin/home/auth');
			}
			$this->labels = $this->crud->read("SELECT * FROM _xparentlabel WHERE status=1",array(),'obj');

		}

		public function index(){
			if($this->session->_get('message')==1){
					if ($this->session->_get('action')=='add') {
						$data['success'] = '<strong>Congratulations!.</strong> New record successfully added.';
					}
					$this->session->_set(array('message'=>0,'action'=>''));

			}
			$data['result'] = $this->crud->read("SELECT * FROM _xparentmodule",array(),'obj');
			$this->template->_admin('xadmin/modules',$data,$this->load);
		}

		public function new_record(){
			if ($_POST) {
				
				$postData = $this->form->post($_POST['btn-submit']);
				unset($postData['btn-submit']);
				
				if( $this->crud->create('_xparentmodule',$postData)){
					$this->session->_set(array('message'=>true,'action'=>'add'));
					redirect('xadmin/modules');
				}
			}
			$data['label'] = $this->crud->read("SELECT * FROM _xparentlabel WHERE status=1",array(),'obj');
			$data['action'] = 'new-record';
			$this->template->_admin('xadmin/modules_',$data,$this->load);

		}

		public function modify($id = false){
			$module_id = $this->hash->decryptMe_($id[0]);

			if ($_POST) {
				
				$result = $this->form->post($_POST['btn-submit']);
				$module_id = $result['xparentmodule_id'];
				unset($result['xparentmodule_id']);
				unset($result['btn-submit']);
				print_pre($result);
				$result['_xcreate'] 	= isset($result['_xcreate']) ? $result['_xcreate'] : 0 ;
				$result['_xread'] 		= isset($result['_xread']) 	? $result['_xread']	 : 0 ;
				$result['_xupdate'] 	= isset($result['_xupdate']) ? $result['_xupdate'] : 0 ;
				$result['_xdelete'] 	= isset($result['_xdelete']) ? $result['_xdelete'] : 0 ;
				$result['status'] 		= isset($result['status']) ? $result['status'] : 0 ;
				$result['_xexport'] 	= isset($result['_xexport']) ? $result['_xexport'] : 0 ;
				$result['_xprint'] 		= isset($result['_xprint']) ? $result['_xprint'] : 0 ;
				$result['_xupload'] 		= isset($result['_xupload']) ? $result['_xupload'] : 0 ;

				$isupdate = $this->crud->update('_xparentmodule',$result,array('xparentmodule_id'=>$module_id));
					if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						redirect('xadmin/modules');
					}
			}

			$data['result'] = $this->crud->read("SELECT * FROM _xparentmodule WHERE xparentmodule_id=:id",array(':id'=>$module_id),'assoc');
			$data['label'] = $this->crud->read("SELECT * FROM _xparentlabel WHERE status=1",array(),'obj');
			$data['action'] = 'modify';
			$this->template->_admin('xadmin/modules_',$data,$this->load);
		}


}