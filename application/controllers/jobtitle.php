<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jobtitle extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		if( ! $this->session->userdata('logged_in')  ) {
			redirect('/login/', 'refresh');
		}	
		$this->load->model('jobtitle_model');
	}
	
	function index(){
		$data = array(
			'jobTitleListData'=> $this->jobtitle_model->SelectJobTitleList(),
			'status'=>array(
				'<span class="label">停用</span>',
				'<span class="label label-success">啟用</span>'
			)
		);

		$this->load->view('pages/head'); 
		$this->load->view('jobtitle/jobtitle_list_view',$data);
		$this->load->view('pages/footer');			
	}
	
	function add(){
		if( empty($_POST['jobtitleName']) ){
			$this->load->view('pages/head'); 
			$this->load->view('jobtitle/jobtitle_add_view');
			$this->load->view('pages/footer');
		}else{
			$result = $this->jobtitle_model->InsertJobTitleName();
			//var_dump($result);
			redirect('/jobtitle/', 'refresh');
		}	
	}
	
	function update($jobtitle_id){
		if( empty($_POST['jobtitleName']) ){
			$data ['jobtitleData'] = $this->jobtitle_model->SelectJobTitleByJobTitleID($jobtitle_id);
			$this->load->view('pages/head'); 
			$this->load->view('jobtitle/jobtitle_edit_view',$data);
			$this->load->view('pages/footer');
		}else{
			$result = $this->jobtitle_model->UpdateJobTitleByJobTitleID($jobtitle_id);
			//var_dump($result);
			redirect('/jobtitle/', 'refresh');
		}	
	}
	
	function del($jobtitle_id){
		$result = $this->jobtitle_model->DelJobTitleByJobTitleID($jobtitle_id);
		redirect('/jobtitle/', 'refresh');
	}
	

	
}
?>