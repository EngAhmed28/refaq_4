<?php
class Operations extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    
//-------------------------------
public function insert_op($process,$mother_national_num){
    
    $data['mother_national_num_fk']=$mother_national_num;
    $data['family_file_from']=$_SESSION['role_id_fk'];
    $data['family_file_to']=$this->input->post('family_file_to');
    $data['process']=$process;
    $data['reason']=$this->input->post('reason');
    $data['date']=strtotime(date("Y-m-d",time()));
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_name'];
    
    $this->db->insert('operation_table',$data);
}
 //----------------------------
 public function select_all($mother_national_num_fk){
  
        $this->db->select('*');
        $this->db->from('operation_table');
        $this->db->where('mother_national_num_fk',$mother_national_num_fk);    
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
//---------------------------------
public function last_statues(){
        $this->db->select('*');
        $this->db->from('operation_table');
		$this->db->group_by('mother_national_num_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
               $query2 = $this->db->query("SELECT * FROM `operation_table` WHERE `mother_national_num_fk`=".$row->mother_national_num_fk." ORDER BY id DESC LIMIT 1");
              $sub_data=array();
                        foreach ($query2->result() as $row2) {
                            $sub_data = $row2;
                        }
                 $data[$row->mother_national_num_fk] =$sub_data;
            }
          return $data;
        }
        return false;
} 
 //-------------------------------
 public function approved_basic($value,$id){
    $data['suspend']=$value;
        $this->db->where('mother_national_num',$id);
    $this->db->update('basic',$data);
 }
 
 
}//END CLASS 

