<?php

class About extends CI_Model
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
   public  function  insert(){
         $arr_types=array("من نحن","أهدافنا","رسالتنا","رؤيتنا","قيمنا",'الفكر','السلوك','الحيادية','عدم التمييز') ; 
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['title']=$arr_types[$this->input->post('type')];
        $data['type']=$this->chek_Null($this->input->post('type'));
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('about',$data);
    }
//-------------------------------------------------
   public  function  update($id){
     
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['date']=strtotime(date("Y-m-d",time()));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
         $this->db->where("id",$id);
         $this->db->update('about',$data);
    }
 //------------------------------------------------
    public  function  select_in(){
        $this->db->select('*');
        $this->db->from('about');
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

 
 public  function  select(){
        $this->db->select('*');
        $this->db->from('about');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->type] = $row;
            }
            return $data;
        }
        return false;
    }
 
 
 
 
    
}// END CLASS 
?>  