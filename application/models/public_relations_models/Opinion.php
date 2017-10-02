<?php

class Opinion extends CI_Model
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
//-------------------------------------------------
   public  function  insert($img){
   
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['title']=$this->chek_Null($this->input->post('title'));
        $data['job']=$this->chek_Null($this->input->post('job'));
        if(!empty($img)){
          $data['img']=$img;   
        }
       
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        $this->db->insert('opinions',$data);
    }
//-------------------------------------------------
   public  function  update($id,$img){
     
         $data['content']=$this->chek_Null($this->input->post('content'));
       $data['title']=$this->chek_Null($this->input->post('title'));
        $data['job']=$this->chek_Null($this->input->post('job'));
        if(!empty($img)){
          $data['img']=$img;   
        }
       
         $this->db->where("id",$id);
         $this->db->update('opinions',$data);
    }
 //------------------------------------------------
    public  function  select_in(){
        $this->db->select('*');
        $this->db->from('opinions');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->type;
            }
            return $data;
        }
        return false;
    }
//----------------------------------------------- 

 
 
 
 
 
 
    
}// END CLASS 
?>  