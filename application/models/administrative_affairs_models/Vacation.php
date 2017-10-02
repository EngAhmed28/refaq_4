<?php
class Vacation extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
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

    public function select_all(){
        $this->db->select('*');
        $this->db->from('vacations');
        $this->db->where('deleted',1);
        $this->db->where('year',date("Y"));
        $this->db->group_by('emp_id');
        $query = $this->db->get();
         $query_result=$query->result();
        if ($query->num_rows() > 0) {
             $i=0;
            foreach ($query_result as $row) {
                $data[$row->id] = $row;
              $query_result[$i]->emp_name= $this->get_by_vac($row->emp_id);    
               $i++;
            }
            return $data;
        }
        return false;
    }
    
      public function get_by_vac($emp_assigned_id){
       $this->db->select("*");
       $this->db->from("vacations");
       $this->db->where("emp_id",$emp_assigned_id);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
               $data = $row->id;
               
           }
           return $data;
       }
       return false;
   } 

    
    

    //============================================================================
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('vacations');
    }
    //================================================================
    public function getById($id){
        $h = $this->db->get_where('vacations', array('id'=>$id));
        return $h->row_array();
    }
    //=====================================

        public  function  insert(){

                $data['emp_id']=  $this->chek_Null( $this->input->post('emp_id'));
                $data['vacation_id']=$this->chek_Null($this->input->post('vacation_id'));
                $data['from_date']= $this->chek_Null($this->input->post('from_date'));
                $data['to_date']= $this->chek_Null($this->input->post('to_date'));
                $data['year']= $this->chek_Null(date("Y"));
                $data['emp_assigned_id']= $this->chek_Null($this->input->post('emp_assigned_id'));
                $data['date'] = strtotime(date("m/d/Y"));
                $data['date_s']=time();
                $data['visa'] = $this->chek_Null($this->input->post('visa'));
                $this->db->insert('vacations',$data);
    }

    //==========================================
    public function update($id){
        $h = $this->db->get_where('vacations', array('id'=>$id));
        $row = $h->row_array();
        $data['vacation_id']=$this->chek_Null($this->input->post('vacation_id'));
        $data['from_date']=$this->chek_Null($this->input->post('from_date'));
        $data['to_date']=$this->chek_Null($this->input->post('to_date'));
        $data['year']= $this->chek_Null(date("Y"));
        $data['emp_assigned_id']= $this->chek_Null($this->input->post('emp_assigned_id'));
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s']=time();
        $data['visa']=$this->chek_Null($this->input->post('visa'));
        $this->db->where('id', $id);
        if($this->db->update('vacations',$data)) {
            return true;
        }else{
            return false;
        }
    }
    //===============================================
    public function suspend($id,$clas)
    {
        if ($clas == 'danger') {
            $update = array(
                'suspend' => 1
            );
        } else {
            $update = array(
                'suspend' => 0
            );
        }
        $this->db->where('id', $id);
        if ($this->db->update('vacations', $update)) {
            return true;
        } else {
            return false;
        }

    }
  public function type_vacation($approved){
        $this->db->select("*");
        $this->db->from("vacations");
        $this->db->where("approved",$approved);
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->emp_name= $this->get_by_emp($row->emp_id);
                $query_result[$i]->emp_assigned_name= $this->get_by_emp($row->emp_assigned_id);
               $i++;
            }
            return $query_result;
        }
        return false;
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
    public function approved_vacation($id,$value){

        $data['approved_publisher'] = $_SESSION["user_id"];
        $data['approved_date']=time();
        $data['approved']=$value;
        $this->db->where('id', $id);
        if($this->db->update('vacations',$data)) {
            return true;
        }else{
            return false;
        }
    }

}//END CLASS

