<?php
class Jobtitle_model extends CI_Model {

	function checkJobTitleName($jobtitleName){
		$this -> db ->select('*')->from('jobtitle')->where('jobtitle_name', $jobtitleName)->limit(1); 
		$query = $this -> db -> get(); 
		if($query -> num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}
	
	function SelectJobTitleByJobTitleID($jobtitle_id){
		$this -> db ->select('jobtitle_id,jobtitle_name,jobtitle_status')->from('jobtitle')->where('jobtitle_id', $jobtitle_id); 
		$query = $this -> db -> get(); 
		return $query->result_array();
	}
	
	function UpdateJobTitleByJobTitleID($jobtitle_id){
		$jobtitleName = $this->input->post('jobtitleName');
		$jobtitleStatus = $this->input->post('jobtitleStatus');
		$user_id= $this->session->userdata('user_id');
		$userIP = $this->input->ip_address();
		$data = array(
			'jobtitle_name' => $jobtitleName ,
			'jobtitle_status' => $jobtitleStatus ,
			'modify_user' => $user_id,
			'modify_ip' => $userIP
		);
		$this->db->set('modify_date_time', 'NOW()', FALSE);
		$this->db->where('jobtitle_id', $jobtitle_id);		
		return $this->db->update('jobtitle', $data);
	}
	
	function DelJobTitleByJobTitleID($jobtitle_id){
		$this->db->where('jobtitle_id', $jobtitle_id);
		return $this->db->delete('jobtitle'); 
	}
	
	function SelectJobTitleList() {
		$this -> db ->select('*')->from('jobtitle')->order_by('jobtitle_status ASC'); 
		$query = $this -> db -> get(); 
		return $query->result_array();	
	}
	
	function InsertJobTitleName(){
		$jobtitleName = $this->input->post('jobtitleName');
		$jobtitleStatus = $this->input->post('jobtitleStatus');
		$user_id= $this->session->userdata('user_id');
		$userIP = $this->input->ip_address();
		//echo $account;
		$data = array(
			'jobtitle_name' => $jobtitleName ,
			'jobtitle_status' => $jobtitleStatus ,
			'create_user' => $user_id,
			'create_ip' => $userIP
		);
		$this->db->set('create_date_time', 'NOW()', FALSE);
		return $this->db->insert('jobtitle', $data); 		
	}
}
?>