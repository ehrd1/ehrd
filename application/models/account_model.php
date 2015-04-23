<?php
class Account_model extends CI_Model
{

	function checkUnitName($unitName)
	{
		$this -> db ->select('*')->from('unit')->where('unit_name', $unitName)->limit(1); 
		$query = $this -> db -> get(); 
		if($query -> num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	function SelectUnitByUnitID($unit_id)
	{
		$this -> db ->select('unit_id,unit_name,unit_status')->from('unit')->where('unit_id', $unit_id); 
		$query = $this -> db -> get(); 
		return $query->result_array();
	}
	
	function UpdateUnitByUnitID($unit_id)
	{
		$unitName = $this->input->post('unitName');
		$unitStatus = $this->input->post('unitStatus');
		$user_id= $this->session->userdata('user_id');
		$userIP = $this->input->ip_address();
		$data = array(
			'unit_name' => $unitName ,
			'unit_status' => $unitStatus ,
			'modify_user' => $user_id,
			'modify_ip' => $userIP
		);
		$this->db->set('modify_date_time', 'NOW()', FALSE);
		$this->db->where('unit_id', $unit_id);		
		return $this->db->update('unit', $data);
	}
	
	function DelUnitByUnitID($unit_id)
	{
		$this->db->where('unit_id', $unit_id);
		return $this->db->delete('unit'); 
	}
	
	function DelAccountByID($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('users');
	}
	
	function SelectAccountList()
	{
		$this -> db -> select('T1.id,T1.account,T1.name,T1.unit_id,T2.unit_name,T3.jobtitle_id,T3.jobtitle_name,T1.email,T1.status');
		$this -> db -> from('users AS T1');
		$this -> db -> join('unit AS T2', 'T1.unit_id = T2.unit_id','left');
		$this -> db -> join('jobtitle AS T3', 'T1.jobtitle_id = T3.jobtitle_id','left');
		$this -> db -> order_by('T1.create_time ASC'); 
		$query = $this -> db -> get(); 
		return $query->result_array();	
	}
	
	function InsertAccount()
	{
		$account = $this->input->post('account');
		$userName = $this->input->post('userName');
		$password = md5('123456');
		$unit_id = $this->input->post('unitID');
		$jobtitle_id = $this->input->post('jobtitleID');
		//$permission_id = $this->input->post('permission_id');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$mobile_phone = $this->input->post('mobilePhone');
		$fax = $this->input->post('fax');
		$status = $this->input->post('userStatus');
		//echo $account;
		$data = array(
			'account' => $account,
			'name' => $userName,
			'password' => $password,
			'unit_id' => $unit_id,
			'jobtitle_id' => $jobtitle_id,
			'email' => $email,
			'phone' => $phone,
			'mobile_phone' => $mobile_phone,
			'fax' => $fax,
			'status' => $status
		);
		$this->db->set('create_time', 'NOW()', FALSE);
		return $this->db->insert('users', $data); 		
	}
}
?>