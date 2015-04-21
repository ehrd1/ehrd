<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function index() {

		//var_dump($this->session->all_userdata());
		if( $this->session->userdata('logged_in')  ) {			
			$account = $this->session->userdata('account');
			//$this->load->model('user');
			//$userData = $this->user->getUserDataByAccount($account);
			//foreach( $userData as $v) {
			//	$sessionData = array(
			//		'account'=>$v->account,
			//		'name'=>$v->name,
			//		'logged_in'=>true
			//		);					
			//}
			$this->load->view('pages/head'); 
			$this->load->view('pages/footer');
		}elseif( empty($_POST) ){
			$data['no_visible_elements'] = true;
			$this->load->view('pages/head',$data);
			$this->load->view('login_view');   
			$this->load->view('pages/footer');
		}else {
			$userAccount = $this->input->post('userAccount');
			$password = $this->input->post('password');
			$this->load->model('user');
			$userData = $this->user->login($userAccount, $password);
			if($userData){
				foreach( $userData as $v) {
					$sessionData = array(
						'user_id'=>$v->id,
						'account'=>$v->account,
						'name'=>$v->name,
						'logged_in'=>true
						);					
				}
				$this->session->set_userdata($sessionData);
				redirect('/login/', 'refresh');
			}else{
				$data = array(
				'alert'=>'找不到使用者，請確認是否密碼輸入錯誤',
				'no_visible_elements'=> true
				);
				$this->load->view('pages/head',$data);
				$this->load->view('login_view');   
				$this->load->view('pages/footer');
			}			
		}		
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('/login/', 'refresh');
	}
}
 
?>