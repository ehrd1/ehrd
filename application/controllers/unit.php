<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Unit extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		if( ! $this->session->userdata('logged_in')  ) {
			redirect('/login/', 'refresh');
		}	
		$this->load->model('unit_model');
	}
	
	function index(){
		$data = array(
			'unitListData'=> $this->unit_model->SelectUnitList(),
			'status'=>array(
				'<span class="label">停用</span>',
				'<span class="label label-success">啟用</span>'
			)
		);

		$this->load->view('pages/head'); 
		$this->load->view('unit/unit_list_view',$data);
		$this->load->view('pages/footer');			
	}
	
	function add(){
		if( empty($_POST['unitName']) ){
			$this->load->view('pages/head'); 
			$this->load->view('unit/unit_add_view');
			$this->load->view('pages/footer');
		}else{
			$result = $this->unit_model->InsertUnitName();
			//var_dump($result);
			redirect('/unit/', 'refresh');
		}	
	}
	
	function update($unit_id){
		if( empty($_POST['unitName']) ){
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
	
	function del($unit_id){
		$result = $this->unit_model->DelUnitByUnitID($unit_id);
		redirect('/unit/', 'refresh');
	}
	

	
}
?>