<?php

class daily_attendance extends crackerjack{
	
	public function __construct(){
		parent::__construct();
		if ($this->session->_get('xadminlogin')==false) { redirect('xadmin/home/auth');}
		
	}
	public function index(){
		if($this->session->_get('message')==1){
			if($this->session->_get('action')=='update'){
				$data['success'] = '<div class="alert alert-success" style="margin-top: 5px;margin-bottom: 5px;" data-fade="3000">Position was successfully updated.<button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
			}
			if($this->session->_get('action')=='add'){
				$data['success'] = '<div class="alert alert-success" style="margin-top: 5px;margin-bottom: 5px;" data-fade="3000">Position was successfully added.<button type="button" class="close fade" data-dismiss="alert">&times;</button></div>';
			}
		$this->session->_set(array('message'=>false,'action'=>''));
		}
		//$data['position'] = $this->crud->read('SELECT p.*,d.department FROM _position AS p LEFT JOIN _department AS d ON p.department_id = d.department_id',array(),'obj');
		$data['dtr'] =$x= $this->crud->read("SELECT *,SUM(dtr.hrs) AS total_hrs FROM _tdailytimerecord AS dtr INNER JOIN _temployee AS e ON dtr.eid = e.eid INNER JOIN _tposition AS p ON e.position_id = p.position_id GROUP BY dtr._date,dtr.eid ORDER BY dtr._date DESC",array(),'obj');
		//	print_pre($x);
		$this->template->_admin('xadmin/dtr',$data,$this->load);
		//$this->template->adminTemplate('xadmin/dtr',$data,$this->load);
	}
	
	
	public function add($id = false){
		
		$this->load->libraries(array('form'));
		$result = $this->form->post('btn-submit');
		unset($result['position_id']);
			
		if($result){
		 if( $this->crud->create('_position',$result)){
			$this->session->_set(array('message'=>true,'action'=>'add'));
			redirect('xadmin/position/index/success');
		} 
		}
	$data['department'] = $this->crud->read('SELECT * FROM _department WHERE status=1',array(),'obj');
	$data['action'] = 'Add';
			$this->template->adminTemplate('xadmin/position_',$data,$this->load);
	}

	public function edit($id =false){
		$this->load->libraries(array('form'));
			
		$result = $this->form->post('btn-submit');
		
			if ($result) {
				# code...
				$position_id = $result['position_id'];
				unset($result['position_id']);
				
				
				 $isupdate = $this->crud->update('_position',$result,array('position_id'=>$position_id));
					if ($isupdate==true) {
						$this->session->_set(array('message'=>true,'action'=>'update'));
						redirect('xadmin/position/index/success');
					} 
			}

			
			$this->hash->hash_encryption($id[0]);
			$id = $this->hash->decrypt(str_replace('_', '/', $id[1]));
			$data['result'] = $this->crud->read('SELECT * FROM _position WHERE position_id = :id',array(':id'=>$id),'assoc');
			$data['action'] = 'Edit';
			$data['department'] = $this->crud->read('SELECT * FROM _department WHERE status=1',array(),'obj');
			$this->template->adminTemplate('xadmin/position_',$data,$this->load);

	}

	public function doesexists($data){
		$mode = $data[0];
		$a = "SELECT count(*) as count FROM _position WHERE department_id =:id AND position=:val LIMIT 0,1";
		 $res =  $this->crud->read($a,array(':id'=>$_REQUEST['department_id'],':val'=>$_REQUEST['position']),'assoc');
			$result = 'true';
				if ($res['count'] > 0) {
					$result = 'false';
					if($_REQUEST['current']==$_REQUEST['position'] && $_REQUEST['department']==$_REQUEST['department_id'] && $mode=='edit'){
								$result = 'true';
					}
				}				
			echo $result;
			
	}
	
	public function upload(){
		//	header('Content-type: application/json');
			$valid_exts = array('xls', 'xlsx'); // valid extensions
			$max_size = 200 * 1024; // max file size (200kb)
			$path = 'uploads/'; // upload directory
			$current_date = strtotime(date('Y-m-d'));
			if ( $_SERVER['REQUEST_METHOD'] === 'POST' )
			{
				if( @is_uploaded_file($_FILES['myfile']['tmp_name']) )
				{
					// get uploaded file extension
					$ext = strtolower(pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION));
					// looking for format and size validity
					if (in_array($ext, $valid_exts) AND $_FILES['myfile']['size'] < $max_size)
					{
						// unique file path
						$path = $path . uniqid(). '.' .$ext;
						// move uploaded file from temp to uploads directory
						if (move_uploaded_file($_FILES['myfile']['tmp_name'], $path))
						{
							//$status = 'Image successfully uploaded!';
							$status = 1;
							set_include_path(get_include_path() . PATH_SEPARATOR . 'vendor/');
							include 'PHPExcel/IOFactory.php';
							$inputFileName = $path;
							try {
								$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
							} catch(Exception $e) {
								header("Location: ".INDEX_PAGE."payslip-m&a=import&mode=import&success=mismatch");
								die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
							}
							
							$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
							
						//	print_r($sheetData);
							if(count($sheetData)>=7){
								$date = str_replace('FOR THE MONTH OF :','',$sheetData[3]['A']);
								$date_ = explode('-',$date);
								$month = preg_replace('/[0-9]/','',$date_[0]);
								$dayFrom = preg_replace('/[a-zA-Z]/','',$date_[0]);
								$getYear = explode(',',$date_[1]);
								$start_date = $date_[0].",".$getYear[1];
								$end_date = $date_x.$date_[1];
								

								//Read the days if days are in range.
								
								$status = 5;
								//print_r($sheetData);
									for($i = 5;$i <= count($sheetData);$i++){
										$id = $sheetData[$i]['A'];
										$key = $i;
										foreach($sheetData[4] as $k =>$v){
											if($v != 0 || $v !=""){
												$days = $month.$v.",".$getYear[1];
												$a = strtolower(date("D",strtotime($days)));
												if($a!="sat" && $a!="sun"){
													//echo $days." - ".$sheetData[$i][$k]."-".$id;
													$data['eid'] = $id;
													$data['_date'] = date("Y-m-d",strtotime($days));
														print_r($data);

													
											}
												
											}
										}
									}
								
								
							}else{
								$status = "File is empty";
							}
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