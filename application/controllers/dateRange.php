<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DateRange extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    if( ! $this->session->userdata('logged_in')  ) {
      redirect('/login/', 'refresh');
    }	
    $this->load->model('dateRange_model');
  }
	
  function planSetDateRangeSet($active=null)
  {
    if( $active =='update' ) {
      if( empty( $_POST['open_time'] )){
        redirect('/dateRange/planSetDateRangeSet', 'refresh');
      }else{
        $this->dateRange_model->updatePlanSetDate();
        redirect('/dateRange/planSetDateRangeSet', 'refresh');
      }
    }else{
      $data['option_01'] = $this->dateRange_model->getPlanSetDate();
      $this->load->view('pages/head');
      $this->load->view('dateRange/planSetDateRangeSet_view',$data);
      $this->load->view('pages/footer');
    }
  }
	
  function planReportDateRangeSet($active=null)
  {
    if( $active =='update' ) {
      if( empty( $_POST['open_time'] ) && empty( $_POST['end_time'] ) ){
        redirect('/dateRange/planReportDateRangeSet', 'refresh');
      }else{
        $this->dateRange_model->updatePlanReportDateRange();
        redirect('/dateRange/planReportDateRangeSet', 'refresh');
      }
    }else{
      $data = $this->dateRange_model->getPlanReportDateRange();
      print_r($data);
      $this->load->view('pages/head');
      $this->load->view('dateRange/planReportDateRangeSet_view',$data);
      $this->load->view('pages/footer');
    }
  }
}
?>