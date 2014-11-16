<?php
if(!defined('APPS')) exit ('No direct access allowed');

class gData extends crackerjack_model{
	public function __construct(){
		parent::__construct();
	}

	public function users(){
		$mConfig['aColumns'] =  array('','first_name','last_name','email','role' ,'x.status','x.date_created','x.last_update');
		$mConfig['iColumn'] = 'xusers_id';
		$mConfig['tName'] = '_xusers';
		$mConfig['qJoin'] = 'as x inner join _xroles as r ON x.xroles_id = r.xroles_id';
		return $mConfig;
	}

	public function role(){
		$mConfig['aColumns'] =  array('','role', 'date_created','last_update','status');
		$mConfig['iColumn'] = 'xroles_id';
		$mConfig['tName'] = '_xroles';
		$mConfig['qJoin'] = '';
		return $mConfig;
	}

	public function department_management(){
		$mConfig['aColumns'] =  array('','department','status', 'date_created','last_update');
		$mConfig['iColumn'] = 'department_id';
		$mConfig['tName'] = '_tdepartment';
		$mConfig['qJoin'] = '';
		return $mConfig;
	}

	public function position_management(){
		$mConfig['aColumns'] =  array('','position','department','p.status', 'p.date_created','p.last_update');
		$mConfig['iColumn'] = 'position_id';
		$mConfig['tName'] = '_tposition';
		$mConfig['qJoin'] = 'AS p INNER JOIN _tdepartment AS d ON p.department_id = d.department_id';
		return $mConfig;
	}

	public function employees(){
		//SELECT e.*,p.position,d.department FROM _temployee AS e INNER JOIN _tposition AS p ON e.position_id = p.position_id INNER JOIN _tdepartment AS d ON p.department_id = d.department_id ORDER BY e.eid
		$mConfig['aColumns'] =  array('','eid','avatar','firstname','lastname','rate','mobile_number','email','status', 'date_created','last_update');
		$mConfig['iColumn'] = 'employee_id';
		$mConfig['tName'] = '_temployee';
		$mConfig['qJoin'] = '';
		return $mConfig;
	}

	public function daily_attendance(){
		//SELECT e.*,p.position,d.department FROM _temployee AS e INNER JOIN _tposition AS p ON e.position_id = p.position_id INNER JOIN _tdepartment AS d ON p.department_id = d.department_id ORDER BY e.eid
		$mConfig['aColumns'] =  array('','eid','avatar','firstname','lastname','rate','p.position','d.department','mobile_number','email','e.status', 'e.date_created','e.last_update');
		$mConfig['iColumn'] = 'employee_id';
		$mConfig['tName'] = '_temployee';
		$mConfig['qJoin'] = 'AS e INNER JOIN _tposition AS p ON e.position_id = p.position_id INNER JOIN _tdepartment AS d ON p.department_id = d.department_id';
		return $mConfig;
	}

	

}