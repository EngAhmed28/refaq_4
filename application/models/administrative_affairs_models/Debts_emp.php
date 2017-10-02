<?php
class Debts_emp extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
     public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value)) || !empty($post_value)){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
 //-------------------------------------
    public  function  insert(){
        $data['emp_id']=$this->input->post('emp_id');
        $data['value']=$this->input->post('value');
        $data['notes']=$this->input->post('notes');
        $data['debt_date']=strtotime($this->input->post('debt_date'));
        $data['date'] = strtotime(date("Y/m/d"));
        $data['publisher'] = $_SESSION['user_username'];
        $data['date_s']=time();
        $this->db->insert('emp_debts',$data);
    }
//-------------------------------------
    public  function  update($debt_id){
        $data['emp_id']=$this->input->post('emp_id');
        $data['value']=$this->input->post('value');
        $data['notes']=$this->input->post('notes');
        $data['debt_date']=strtotime($this->input->post('debt_date'));
        $data['date'] = strtotime(date("Y/m/d"));
        $data['publisher'] = $_SESSION['user_username'];
        $data['date_s']=time();
        $this->db->where('debt_id',$debt_id);
        $this->db->update('emp_debts',$data);
    }
//----------------------------------------
    public function approved_depts($debt_id,$value,$reason){

        $data['approved_publisher'] = $_SESSION["user_username"];
        $data['approved_reason'] = $reason;
        $data['approved_date']=time();
        $data['approved']=$value;
        $this->db->where('debt_id', $debt_id);
        if($this->db->update('emp_debts',$data)) {
            return true;
        }else{
            return false;
        }
    }
    //====================================================================================
    public function get_by_emp($emp_assigned_id){
        $this->db->select("*");
        $this->db->from("employees");
        $this->db->where("id",$emp_assigned_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row->employee;
            }
            return $data;
        }
        return false;
    }
    //====================================================================================
    public function type_depts($approved){
        $this->db->select("*");
        $this->db->from("emp_debts");
        $this->db->where("approved",$approved);
        $this->db->order_by("debt_date","DESC");
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->emp_name= $this->get_by_emp($row->emp_id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }
    //----------------------------------------------------------
      public function type_depts_date($arr){
        $this->db->select("*");
        $this->db->from("emp_debts");
        $this->db->where($arr);
        $this->db->order_by("debt_date","DESC");
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->emp_name= $this->get_by_emp($row->emp_id);
                $query_result[$i]->emp_data= $this->get_emp_data($row->emp_id);
                $i++;
            }
            return $query_result;
        }
        return false;
    }

    //====================================================================================
    public function get_emp_data($id){
        $this->db->select("*");
        $this->db->from("employees");
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        }
        return false;
    }
    
    
}//END CLASS
?>