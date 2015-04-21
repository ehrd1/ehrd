<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DateRange extends CI_Controller {
  function __construct() {
    parent::__construct();
    if( ! $this->session->userdata('logged_in')  ) {
      redirect('/login/', 'refresh');
    }	
    //$this->load->model('dateRange_model');
  }
	
  function planSetDateRangeSet(){
    $this->load->view('pages/head'); 
    $this->load->view('dateRange/planSetDateRangeSet_view');
    $this->load->view('pages/footer');		
	}
	
  function planReportDateRangeSet(){
    $this->load->view('pages/head'); 
    $this->load->view('dateRange/planSetDateRangeSet_view');
    $this->load->view('pages/footer');
  }
}
?>