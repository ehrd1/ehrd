<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Ajax extends CI_Controller{
	
		function checkUserAccountPW() {
			$userAccount = $this->input->post('userAccount');
			$password = $this->input->post('password');

			$this->load->model('user');
			$result = $this->user->checkUserAccountPW($userAccount , $password);
			if( $result ) {
				echo 'checkTRUE';
			} else	{
				echo 'checkFALSE';
			}
		}
		
		function checkUserAccount() {
			$userAccount = $this->input->get('account');
			$this->load->model('user');
			$result = $this->user->checkUserAccount($userAccount);
			if( $result ) {
				echo 'false';
			} else	{
				echo 'true';
			}
		}
		
		function checkUserEmail() {
			$email = $this->input->get('email');
			$this->load->model('user');
			$result = $this->user->checkUserEmail($email);
			if( $result ) {
				echo 'false';
			} else	{
				echo 'true';
			}
		}
		
		function checkUnitName() {
			$unitName = $this->input->post('unitName');
			$this->load->model('unit_model');
			$result = $this->unit_model->checkUnitName($unitName);
			if( $result ) {
				echo 'FALSE';
			} else	{
				echo 'TRUE';
			}
		}
		
		function checkJobTitleName(){
			$jobtitleName = $this->input->post('jobtitleName');
			$this->load->model('jobtitle_model');
			$result = $this->jobtitle_model->checkJobTitleName($jobtitleName);
			if( $result ) {
				echo 'FALSE';
			} else	{
				echo 'TRUE';
			}
		
		}
		
	}
?>