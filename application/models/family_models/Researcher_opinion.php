<?php
class Researcher_opinion extends CI_Model
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
//--------------------------------------------
public function inserted($id,$researcher_name,$family_leader_name){
    
    $data['mother_national_num_fk']=$id;
    $data['is_mother_present']=$this->input->post('is_mother_present');
    $data['mother_impression_visit']=$this->input->post('mother_impression_visit');
    $data['home_cleaning']=$this->input->post('home_cleaning');
    $data['child_cleanliness']=$this->input->post('child_cleanliness');
    
    $data['family_type']=$this->input->post('family_type');
    $data['videos_researcher']=$this->input->post('videos_researcher');
    $data['video_family_leader']=$this->input->post('video_family_leader');
    $data['family_leader_name']=$family_leader_name;
    $data['researcher_name']=$researcher_name;
    
    $data['date']=strtotime(date('Y-m-d',time()));
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_username'];
        $this->db->insert('researcher_opinion',$data);
}
//-------------------------------------------
public function updated($id,$researcher_name,$family_leader_name){
    
    $data['is_mother_present']=$this->input->post('is_mother_present');
    $data['mother_impression_visit']=$this->input->post('mother_impression_visit');
    $data['home_cleaning']=$this->input->post('home_cleaning');
    $data['child_cleanliness']=$this->input->post('child_cleanliness');
   
    $data['family_type']=$this->input->post('family_type');
    $data['videos_researcher']=$this->input->post('videos_researcher');
    $data['video_family_leader']=$this->input->post('video_family_leader');
  if($family_leader_name !=''){
    $data['family_leader_name']=$family_leader_name;
  }
  if($researcher_name !=''){
    $data['researcher_name']=$researcher_name;
    }
    $data['date']=strtotime(date('Y-m-d',time()));
    $data['date_s']=time();
    $data['publisher']=$_SESSION['user_username'];
        $this->db->where('mother_national_num_fk', $id);
        $this->db->update('researcher_opinion',$data);
    
}
//-------------------------------------------  
   public function getById($id){
        $h = $this->db->get_where('researcher_opinion', array('mother_national_num_fk'=>$id));
        if($h->num_rows() > 0) {
        return $h->row_array();
       }
       return 0;
   }
}//END CLASS 

