<?php

class Permit extends CI_Model
{
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    //====================================================================================
       public  function  insert($type){
           
        $data['permit_num']=$this->input->post('permit_num');
        $data['permit_type']=$this->input->post('permit_type');
        $data['time_out']=$this->input->post('time_out');
        $data['time_return']=$this->input->post('time_return');
        $data['permit_reason']=$this->input->post('permit_reason');
        $data['date'] = strtotime(date("m/d/Y"));
        $data['month'] = date('m', strtotime(date("m/d/Y")));
        $data['permit_table_type']=$type;
        $data['emp_code'] =$_SESSION['emp_code'];
        $data['date_s']=time();
        $data['permit_status']=0;
        
        $data['permit_manager_refuse_accept']=$this->input->post('permit_type');
        $this->db->insert('permits',$data);
    }
    //===========================================================
        public  function  update($id){
        $data['permit_type']=$this->input->post('permit_type');
        $data['time_out']=$this->input->post('time_out');
        $data['time_return']=$this->input->post('time_return');
        $data['permit_reason']=$this->input->post('permit_reason');
        $data['date'] = strtotime(date("m/d/Y"));
        $data['month'] = date('m', strtotime(date("m/d/Y")));
        $data['emp_code'] =$_SESSION['emp_code'];
        $data['date_s']=time();
        $data['permit_status']=$this->input->post('permit_type');
        $data['permit_manager_refuse_accept']=0;
        $this->db->where('id', $id);
        $this->db->update('permits',$data);
    }
    //====================================================================================
  
    public function get_details_beetween_dates($from,$to,$type)
    {
        $this->db->select('*');
        $this->db->from('permits');
        $this->db->where('date>=',$from);
        $this->db->where('date <= ',$to);
        if($type != 3){
            $this->db->where('permit_table_type',$type);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    //====================================================================================
    public function get_details_beetween_dates_emp($from,$to,$emp)
    {
        $this->db->select('*');
        $this->db->from('permits');
        $this->db->where('date>=',$from);
        $this->db->where('date <= ',$to);
        $this->db->where('emp_code',$emp);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

}

