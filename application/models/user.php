<?php
class User extends CI_Model {

	function login($account, $password) {
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('account', $account);
		$this -> db -> where('password', MD5($password));
    $this -> db -> where('status', 1);
		$this -> db -> limit(1); 
		$query = $this -> db -> get(); 
		if($query -> num_rows() == 1) {
			return $query->result();
		}else{
			return false;
		}
	}
	
	function getUserDataByAccount($account) {
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('account', $account);
		$this -> db -> limit(1); 
		$query = $this -> db -> get(); 
		if($query -> num_rows() == 1) {
			return $query->result();
		}else{
			return false;
		}
	}
	
	function checkUserAccountPW($userAccount , $password) {
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('account', $userAccount);
		$this -> db -> where('password', MD5($password));
		$this -> db -> limit(1); 
		$query = $this -> db -> get(); 
		if($query -> num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}
	
	function checkUserAccount($userAccount) {
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('account', $userAccount);
		$this -> db -> limit(1); 
		$query = $this -> db -> get(); 
		if($query -> num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}
	
	function checkUserEmail($email) {
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('email', $email);
		$this -> db -> limit(1); 
		$query = $this -> db -> get(); 
		if($query -> num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}
}
?>