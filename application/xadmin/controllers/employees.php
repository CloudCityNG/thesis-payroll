<?php
class employees extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if ($this->session->_get('xadminlogin')==false) { redirect('xadmin/home/auth');}
	}
	public function index(){
			if($this->session->_get('message')==1){
			if($this->session->_get('action')=='update'){
				$data['success'] = 'Employee was successfully updated.';
			}
			if($this->session->_get('action')=='add'){
				$data['success'] = 'Employee was successfully added';
			}
		$this->session->_set(array('message'=>false,'action'=>''));
		}
		$this->template->_admin('xadmin/employees',$data,$this->load);
	}

	public function new_record(){
		if ($_POST) {
				if (isAjax()) {
				$postData = $this->form->post($_POST['btn-submit']);
				unset($postData['btn-submit']);
				$postData['password'] =  $this->hash->encryptMe_($postData['password']);
				$postData['date_created'] = date("Y-m-d H:i:s");
				$postData['hire_date'] = date("Y-m-d",strtotime($postData['hire_date']));
				$postData['email'] = $postData['email'].$postData['email_extension'];
				unset($postData['email_extension']);
					$idx = $this->crud->create('_temployee',$postData);
					$idxs = $this->hash->encryptMe_($idx);
					echo $idx."~@~".$idxs;
				}
				die();
			}
		$emp_number = $this->crud->read('SELECT max(eid) + 1 AS id FROM _temployee LIMIT 0,1',array(),'assoc');
		$emp_number = ($emp_number['id']=="") ? 1 : $emp_number['id'];
		$data['result']['eid'] = str_pad(($emp_number), 4, "0000", STR_PAD_LEFT);
		$data['position'] = $this->crud->read("SELECT position_id,position, department, p.status, p.date_created, p.last_update FROM _tposition AS p INNER JOIN _tdepartment AS d ON p.department_id = d.department_id WHERE p.status = 1 AND d.status=1",array(),'obj');
		$data['action'] = 'New';
		$this->template->_admin('xadmin/employees_',$data,$this->load);
	}
	
	public function modify($params =false){
		$eID = $this->hash->decryptMe_($params[0]);
		if ($_POST) {
				
				$postData = $this->form->post($_POST['btn-submit']);
				$employee_id = $postData['employee_id'];
				unset($postData['employee_id']);
				unset($postData['btn-submit']);
				$postData['email'] = $postData['email'].$postData['email_extension'];
				unset($postData['email_extension']);
				$isupdate = $this->crud->update('_temployee',$postData,array('employee_id'=>$employee_id));
				// if ($isupdate==true) {
				// 		$this->session->_set(array('message'=>true,'action'=>'update'));
				// 		redirect('xadmin/employees');
				// }
				$idxs = $this->hash->encryptMe_($isupdate);
					echo $isupdate."~@~".$idxs;
				die();
			}
		$data['action'] = 'Edit';
		$data['result'] = $this->crud->read('SELECT * FROM _temployee WHERE employee_id =:id',array(':id'=>$eID),'assoc');
		$data['position'] = $this->crud->read('SELECT * FROM _tposition WHERE status=1',array(),'obj');
		$this->template->_admin('xadmin/employees_',$data,$this->load);
	}
	
	public function edit($id =false){
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
	
			if($result){
				$employee_id = $result['employee_id'];
				unset($result['employee_id']);
					$position_id = $result['position_id'];
				$dep = $this->crud->read("SELECT department_id FROM _position WHERE position_id=:id",array(':id'=>$position_id),'assoc');
					$result['department_id'] = $dep['department_id'];

				$isupdate = $this->crud->update('_employee',$result,array('employee_id'=>$employee_id));
				if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						redirect('xadmin/employees/index/success');
					}
			}
			
		$this->hash->hash_encryption($id[0]);
		$id = $this->hash->decrypt(str_replace('_', '/', $id[1]));
		$data['result'] = $this->crud->read('SELECT * FROM _employee WHERE employee_id =:id',array(':id'=>$id),'assoc');
		$data['position'] = $this->crud->read('SELECT * FROM _position WHERE status=1',array(),'obj');
		$data['action'] = 'Edit';
		$this->template->_admin('xadmin/employees_',$data,$this->load);

	}

	public function view($params = false){
		if($params[0]){
			$eID = $this->hash->decryptMe_($params[0]);
			$data['result'] = $this->crud->read('SELECT * FROM _temployee AS te INNER JOIN _tposition AS tp ON te.position_id = tp.position_id JOIN _tdepartment AS td ON tp.department_id = td.department_id WHERE employee_id =:id',array(':id'=>$eID),'assoc');
			$this->template->_admin('xadmin/employees_view',$data,$this->load);
		}else{
			redirect('xadmin/employees');
		}
	}

	public function coldoesexists($get=false){
		if (isset($_GET['gConf'])) {
				$gConfig = unserialize(base64_decode($_GET['gConf']));
				extract($gConfig);
			}

			$current = html_entity_decode(r_string($_GET['current']));
			$aColumn = $iColumn;
			$sTable = $tName;
			$value = $_GET[$aColumn];
			$value = $value.$_GET['email_extension'];
			$result = 'true';
				$dbResult = $this->crud->read("SELECT $aColumn FROM $sTable WHERE $aColumn = :val LIMIT 0,1",array(':val'=>$value),'assoc');
				if($dbResult){
					$result = "false";
					if ($dbResult[$aColumn]==$current && strtolower(r_string($get[0]))=="edit") {
						$result = "true";
					}
				
				}
				echo $result;		
			$this->db->dbClose();

	}

	public function upload(){
		//	header('Content-type: application/json');
			$valid_exts = array('jpg', 'jpeg','png','gif'); // valid extensions
			$max_size = 1000 * 1024; // max file size (200kb)
			$path = 'uploads/avatar/'; // upload directory
			$current_date = strtotime(date('Y-m-d'));
			if ( $_SERVER['REQUEST_METHOD'] === 'POST' )
			{
				if( @is_uploaded_file($_FILES['img']['tmp_name']) )
				{
					// get uploaded file extension
					$ext = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
					// looking for format and size validity
					if (in_array($ext, $valid_exts) AND $_FILES['img']['size'] < $max_size)
					{
						// unique file path
						$path = $path . uniqid(). '.' .$ext;
						// move uploaded file from temp to uploads directory
						if (move_uploaded_file($_FILES['img']['tmp_name'], $path))
						{
								

								switch($_FILES['img']['type'])
								{
									case 'image/gif':
										$get_func = 'imagecreatefromgif';
										$suffix = ".gif";
									break;
									case 'image/jpeg';
										$get_func = 'imagecreatefromjpeg';
										$suffix = ".jpg";
									break;
									case 'image/png':
										$get_func = 'imagecreatefrompng';
										$suffix = ".png";
									break;
								}
							 	
								 	list($width,$height)=getimagesize($path);
									$img_original = call_user_func( $get_func, $path );

									$newwidth=440;
									$newheight=($height/$width)*440;
									$tmp=imagecreatetruecolor($newwidth,300);
	 
									// this line actually does the image resizing, copying from the original
									// image into the $tmp image
									$aResult = imagecopyresampled($tmp,$img_original,0,0,0,0,$newwidth,300,$width,$height);
									$fname = "avatar_".uniqid().'.jpg';
									$filename_final = "uploads/avatar/".$fname;
									imagejpeg($tmp,$filename_final,100);
									$status = base_url().$filename_final;
									unlink($path);
										
									$targ_w = $targ_h = 200;
									$jpeg_quality = 100;

									$img_r = imagecreatefromjpeg($filename_final);
									$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
									
									$aR = false;
									if ($_POST['x']!="" || $_POST['y']!="") {

									}

									if ($_POST['i']=='old') {
											$h = ($_POST['h']=="") ? 215 : $_POST['h'];
											$w = ($_POST['w']=="") ? 215 : $_POST['w'];
											$x = ($_POST['x']=="") ? 1 : $_POST['x'];
											$y = ($_POST['y']=="") ? 0 : $_POST['y'];
											imagecopyresampled($dst_r,$img_r,0,0,$x,$y,$targ_w,$targ_h,$w,$h);

											unlink($filename_final);	
											$fname = "avatar_".uniqid().'.jpg';
											$filename_final = "uploads/avatar/".$fname;
											imagejpeg($dst_r,$filename_final,$jpeg_quality);
											
										$status = $fname;

									}

									//$status  = base_url.$filename_final;
/*									if ($_POST['x']!="" || $_POST['y']!="") {
											$img_r = imagecreatefromjpeg($filename_final);
											$dst_r = ImageCreateTrueColor(200,200);
											
											imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$_POST['w'],$_POST['h'],$aWidth,$aHeight);								
											$fname = "avatar_".uniqid().'.jpg';
											$filename_final = "uploads/avatar/_".$fname;
											imagejpeg($dst_r,$filename_final,100);
									

												imagedestroy($img_original);
												imagedestroy($tmp);
												$status = base_url().$filename_final; 
									}*/

								
								/*list($aWidth, $aHeight) = getimagesize($filename_final);
								*/
						}
						else {
							//$status = 'Upload Fail: Unknown error occurred!';
							$status = 2;
						}
					}
					else {
						//$status = 'Upload Fail: Unsupported file format or It is too large to upload!';
						$status = 3;
					}
				}
				else {
					//$status = 'Upload Fail: File not uploaded!';
					$status = 4;
				}
			}
			else {
				//$status = 'Bad request!';
				$status = 5;
			}

			// echo out json encoded status
	//echo json_encode(array('status' => $status));
	echo $status;
	}
	
	
}