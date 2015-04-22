<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Account extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		if( ! $this->session->userdata('logged_in')  ) {
			redirect('/login/', 'refresh');
		}	
		$this->load->model('account_model');
	}
	
	function index(){
		$data = array(
			'accountListData'=> $this->account_model->SelectAccountList(),
			'status'=>array(
				'<span class="label">停用</span>',
				'<span class="label label-success">啟用</span>'
			)
		);

		$this->load->view('pages/head'); 
		$this->load->view('account/account_list_view',$data);
		$this->load->view('pages/footer');			
	}
	
	function add(){
		if( empty($_POST['userName']) ){
			$this->load->model('unit_model');
			$this->load->model('jobtitle_model');
			$data = array (
				'unitData'=>$this->unit_model->SelectUnitList(),
				'jobtitleData'=>$this->jobtitle_model->SelectJobTitleList()
			);
			$this->load->view('pages/head'); 
			$this->load->view('account/account_add_view',$data);
			$this->load->view('pages/footer');
		}else{
			$result = $this->account_model->InsertAccount();
			//var_dump($result);
			redirect('/account/', 'refresh');
		}	
	}
	
	function update($unit_id){
		if( empty($_POST['unitName']) ){
			$this->load->model('unit_model');
			$data ['unitData'] = $this->unit_model->SelectUnitByUnitID($unit_id);
			$this->load->view('pages/head'); 
			$this->load->view('unit/unit_edit_view',$data);
			$this->load->view('pages/footer');
		}else{
			$result = $this->unit_model->UpdateUnitByUnitID($unit_id);
			//var_dump($result);
			redirect('/unit/', 'refresh');
		}	
	}
	
	function del($id){
		$result = $this->account_model->DelAccountByID($id);
		redirect('/account/', 'refresh');
	}
	

	
}
?>