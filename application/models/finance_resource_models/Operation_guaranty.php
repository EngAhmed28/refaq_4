<?php

class Operation_guaranty extends CI_Model
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
//-------------------------------------------------
public function insert_op($process,$guarantee_id){
    
    $data['guarantee_id']=$guarantee_id;
    $data['guaranty_from']=$_SESSION['role_id_fk'];
    $data['guaranty_to']=$this->input->post('guaranty_to');
    $data['process']=$process;
    $data['reason']=$this->input->post('reason');
    $data['date']=strtotime(date("Y-m-d",time()));
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_name'];
    
    $this->db->insert('operation_guaranty',$data);
}
 //----------------------------
 public function select_all($guarantee_id){
  
        $this->db->select('*');
        $this->db->from('operation_guaranty');
        $this->db->where('guarantee_id',$guarantee_id);    
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
 }

 //-------------------------------


   

    
}// END CLASS 

