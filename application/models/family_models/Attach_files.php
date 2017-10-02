<?php
class Attach_files extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
      public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//-------------------------------
public function insert_files($all_files,$mother_national_num){
    
    $data['mother_national_num_fk']=$mother_national_num;
    $data['death_certificate']=$this->chek_Null($all_files['death_certificate']);
    $data['family_card']=$this->chek_Null($all_files['family_card']);
    $data['plowing_inheritance']=$this->chek_Null($all_files['plowing_inheritance']);
    $data['instrument_agency_with_orphans']=$this->chek_Null($all_files['instrument_agency_with_orphans']);
    $data['birth_certificate']=$this->chek_Null($all_files['birth_certificate']);
    $data['ownership_housing']=$this->chek_Null($all_files['ownership_housing']);
    $data['definition_school']=$this->chek_Null($all_files['definition_school']);
    $data['social_security_card']=$this->chek_Null($all_files['social_security_card']);
  //  $data['retirement_department']=$this->chek_Null($all_files['retirement_department']);
 //   $data['social_insurance']=$this->chek_Null($all_files['social_insurance']);
    $data['bank_statement']=$this->chek_Null($all_files['bank_statement']);
    $data['date']=strtotime(date("Y-m-d",time()));
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_name'];  
    $this->db->insert('family_attach_files',$data);
}
 
 public function update_files($all_files,$mother_national_num){
    $all_files['date']=strtotime(date("Y-m-d",time()));
    $all_files['date_s']=time();
    $all_files['publisher']=$_SESSION['user_name']; 
    $this->db->where('mother_national_num_fk',$mother_national_num); 
    $this->db->update('family_attach_files',$all_files);
}
 
 
 
 
}//END CLASS 

