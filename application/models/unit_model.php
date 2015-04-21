<?php
class Unit_model extends CI_Model {

	function checkUnitName($unitName) {
		$this -> db ->select('*')->from('unit')->where('unit_name', $unitName)->limit(1); 
		$query = $this -> db -> get(); 
		if($query -> num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}
	function SelectUnitByUnitID($unit_id){
		$this -> db ->select('unit_id,unit_name,unit_status')->from('unit')->where('unit_id', $unit_id); 
		$query = $this -> db -> get(); 
		return $query->result_array();
	}
	
	function UpdateUnitByUnitID($unit_id){
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
	
	function DelUnitByUnitID($unit_id){
		$this->db->where('unit_id', $unit_id);
		return $this->db->delete('unit'); 
	}
	
	function SelectUnitList() {
		$this -> db ->select('*')->from('unit')->order_by('unit_status ASC'); 
		$query = $this -> db -> get(); 
		return $query->result_array();	
	}
	
	function InsertUnitName(){
		$unitName = $this->input->post('unitName');
		$unitStatus = $this->input->post('unitStatus');
		$user_id= $this->session->userdata('user_id');
		$userIP = $this->input->ip_address();
		//echo $account;
		$data = array(
			'unit_name' => $unitName ,
			'unit_status' => $unitStatus ,
			'create_user' => $user_id,
			'create_ip' => $userIP
		);
		$this->db->set('create_date_time', 'NOW()', FALSE);
		return $this->db->insert('unit', $data); 		
	}
}
?>