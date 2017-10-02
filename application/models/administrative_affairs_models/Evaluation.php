<?php
class Evaluation extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    //--------------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//--------------------------------------------------------
  public function insert(){
      $data['title']=$this->chek_Null( $this->input->post('title'));
      $data['grade'] = $this->chek_Null( $this->input->post('grade'));
      $this->db->insert('evaluation_setting',$data);
  }
    //--------------------------------------------------------
    public function update($id){
        $data['title']=$this->chek_Null( $this->input->post('title'));
        $data['grade'] = $this->chek_Null( $this->input->post('grade'));
         $this->db->where("id",$id);
         $this->db->update('evaluation_setting',$data);
    }
    //--------------------------------------------------------
  public function insert_emp_eval(){
          $data['emp_id']=$this->chek_Null( $this->input->post('emp_id'));
          $data['evaluation_date']=strtotime($this->chek_Null( $this->input->post('evaluation_date')));
          $data['publisher']=$_SESSION['user_username'];
          $data['date']=strtotime(date("Y-m-d",time()));
          $data['date_s']=time();
      for ($r=1;$r <= $this->input->post("MAX"); $r++){
          $data['evaluation_type_id']=$this->input->post("evaluation_type_id".$r);
          $data['evaluation_type_grade']=$this->input->post("evaluation_type_grade".$r);
       $this->db->insert('emp_evaluation',$data);
      }
  }
    //--------------------------------------------------------
    public function update_emp_eval(){
        $data['emp_id']=$this->chek_Null( $this->input->post('emp_id'));
        $data['publisher']=$_SESSION['user_username'];
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        for ($r=1;$r <= $this->input->post("MAX"); $r++){
             $id=$this->input->post("id_for_update".$r);
            $data['evaluation_type_grade']=$this->input->post("evaluation_type_grade".$r);
            $this->db->where("id",$id);
            $this->db->update('emp_evaluation',$data);
        }
    }
    //--------------------------------------------------------
    public function get_emp_eval($emp_id,$evaluation_date,$date_s){
        $this->db->select('emp_evaluation.* ,
                  evaluation_setting.id as setting_id,evaluation_setting.title,evaluation_setting.grade');
        $this->db->from('emp_evaluation');
        $this->db->join('evaluation_setting', ' evaluation_setting.id = emp_evaluation.evaluation_type_id');
        $this->db->where("emp_evaluation.emp_id",$emp_id);
        $this->db->where("emp_evaluation.evaluation_date",$evaluation_date);
        $this->db->where("emp_evaluation.date_s",$date_s);
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {   foreach ($query->result() as $row) {
            $data[] = $row;
        }
            return $data;
        }
    }
 //-----------------------------------------------------
    public function select_all(){
        $this->db->select('emp_evaluation.evaluation_type_id ,
                           emp_evaluation.evaluation_type_grade,emp_evaluation.emp_id,
                 employees.id as employee_id,employees.employee');
        $this->db->from("emp_evaluation");
        $this->db->join('employees', ' employees.id = emp_evaluation.emp_id',"left");
        $this->db->group_by('emp_id');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
          // $query_result[$i]->sub = $this->get_total_grade($row->evaluation_date,$row->emp_id,$row->date_s);
                $query_result[$i]->sub_date= $this->get_by_emp($row->emp_id);
                $query_result[$i]->sub = $this->get_total_grade( $query_result[$i]->sub_date[0],$row->emp_id,$query_result[$i]->sub_date[1]);
                $i++;
            }
            return $query_result;
        }
        return false;
    }
 // ---------------------------------------------------
    public function get_by_emp($emp_id){
        $this->db->select('*');
        $this->db->from("emp_evaluation");
        $this->db->where("emp_id",$emp_id);
        $this->db->order_by('evaluation_date',"DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $des_date[0] = $row->evaluation_date;
                $des_date[1] = $row->date_s;
            }
            return $des_date;
        }
        return false;
    }

 //---------------------------------------------------
    public function get_total_grade($evaluation_date,$emp_id ,$date_s){
        $this->db->select('*');
        $this->db->from("emp_evaluation");
        $this->db->where("evaluation_date",$evaluation_date);
        $this->db->where("emp_id",$emp_id);
        $this->db->where("date_s",$date_s);
        $query = $this->db->get();
        $total=0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $total+= $row->evaluation_type_grade;
            }
            return $total;
        }
        return false;

    }

}//END CLASS

