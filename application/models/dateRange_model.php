<?php
class DateRange_model extends CI_Model {

    function getPlanSetDate()
    {
        $item = 'plan_set_date';
        $this -> db ->select('option_01')->from('system_setup')->where('item', $item)->limit(1);
        $query = $this -> db -> get();
        if($query -> num_rows() == 1) {
            $row = $query->row();
            return $row->option_01;;
        }else{
            return false;
        }
    }

    function updatePlanSetDate()
    {
        $item = 'plan_set_date';
        $option_01 = $this->input->post('open_time');
        $data = array(
            'option_01' => $option_01
        );
        $this->db->where('item', $item);
        return $this->db->update('system_setup', $data);
    }

    function getPlanReportDateRange()
    {
        $item = 'plan_report_date_range';
        $this -> db ->select('option_01,option_02')->from('system_setup')->where('item', $item)->limit(1);
        $query = $this -> db -> get();
        if($query -> num_rows() == 1) {
            $row = $query->row();
            $result['option_01']=$row->option_01;
            $result['option_02']=$row->option_02;
            return $result;
        }else{
            return false;
        }
    }
}
?>