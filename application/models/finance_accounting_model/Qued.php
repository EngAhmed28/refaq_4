<?php
class Qued extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
//--------------------------------------
 public  function record_count(){
        return $this->db->count_all("quod");

    }
//=====================================
public function insert(){
    $data['qued_num']=$this->input->post('qued_num');
    $data['qued_date']=strtotime($this->input->post('qued_date'));
    $data['qued_byan']=$this->input->post('qued_byan');
    $data['date']=strtotime(date("Y-m-d",time()));
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_name'];
      for($x=1;$x<=$this->input->post('total_madeen_num');$x++){
    $data['maden']=$this->input->post('madeen_acoount_name'.$x);
    $data['dayen']=0;
    $data['value']=$this->input->post('madeen_value'.$x);    
      $this->db->insert('quod', $data);
    }
     for($y=1;$y<=$this->input->post('total_dayen_num');$y++){
    $data['maden']=0;
    $data['dayen']=$this->input->post('dayen_acoount_name'.$y);
    $data['value']=$this->input->post('dayen_value'.$y);    
      $this->db->insert('quod', $data);
    }
}
//----------------------------------------------------------------
public function select($statem,$goupby){
        $this->db->select('*');
        $this->db->from('quod');
        foreach($statem as $key=>$value){
        $this->db->where($key,$statem[$key]);    
        }
        if($goupby=='groupby'){
         $this->db->group_by('qued_num');     
        }elseif($goupby==''){
            
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//---------------------------------------------------------------
public function delete($type,$id){
    if($type ==1){
         $this->db->where('qued_num',$id);
         $this->db->delete('quod');
    }elseif($type ==2){
         $this->db->where('id',$id);
         $this->db->delete('quod');    
    }
}
//----------------------------------------------------------------
public function all_qued_details(){
    
        $this->db->select('*');
        $this->db->from('quod');
        $this->db->group_by('qued_num');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                   $query2 = $this->db->query("SELECT * FROM `quod` WHERE   `qued_num`=".$row->qued_num);
                  $sub_data=array();
                     foreach ($query2->result() as $row2) {        
                        $sub_data[]=$row2;
                     }
                $data[$row->qued_num] = $sub_data;
            }
            return $data;
        }
        return false;
}
//----------------------------------------------------------------
public function depotr($deport,$qued_num){    
        $this->db->select('*');
        $this->db->where('qued_num',$qued_num);
        $this->db->from('quod');
        $query = $this->db->get();
     if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                   $I['pill_num']=$row->qued_num;
                   $I['madeen']=$row->maden;
                   $I['dayen']=$row->dayen;
                   $I['p_cost']=$row->value;
                   $I['process']=8;
                   $I['date']=strtotime(date("Y-m-d",time()));
                   $I['date_s']=time() ;
                   $I['publisher']=$_SESSION['user_name'];
                $this->db->insert('all_deports',$I);  
            }
            return true;
        }
        return false;
}
//-----------------------------------------------------------------
public function update_deport($deport,$qued_num){
      $x['deport']=$deport;
      $this->db->where('qued_num',$qued_num);
      $this->db->update('quod', $x); 
}
//-----------------------------------------------------------------
public function delete_deport($qued_num){
    $this->db->where('pill_num',$qued_num);
    $this->db->delete('all_deports'); 
    
}


}// end class 

