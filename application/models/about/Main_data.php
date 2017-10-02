<?php

class Main_data extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value == null || (!isset($post_value) || $post_value == false)){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//-----------------------------------------------------    
    public function insert($file){
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['logo'] = $file;
        $data['date_created'] = $this->chek_Null($this->input->post('date_created'));
        $data['web_name'] = $this->chek_Null($this->input->post('web_name'));
        $data['address'] = $this->chek_Null($this->input->post('address'));
        $data['facebook'] = $this->chek_Null($this->input->post('facebook'));
        $data['google'] = $this->chek_Null($this->input->post('google'));
        $data['youtube'] = $this->chek_Null($this->input->post('youtube'));
        $data['twitter'] = $this->chek_Null($this->input->post('twitter'));
        $data['instagram'] = $this->chek_Null($this->input->post('instagram'));
        $data['date'] = strtotime(date("Y-m-d",time()));
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('main_data',$data);
    }
//-----------------------------------------------------    
    public function update($file,$id){
        $data['name'] = $this->chek_Null($this->input->post('name'));
        if( $this->chek_Null($file) != ""){
            $data['logo'] = $this->chek_Null($file);
        }
        $data['date_created'] = $this->chek_Null($this->input->post('date_created'));
        $data['web_name'] = $this->chek_Null($this->input->post('web_name'));
        $data['address'] = $this->chek_Null($this->input->post('address'));
        $data['facebook'] = $this->chek_Null($this->input->post('facebook'));
        $data['google'] = $this->chek_Null($this->input->post('google'));
        $data['youtube'] = $this->chek_Null($this->input->post('youtube'));
        $data['twitter'] = $this->chek_Null($this->input->post('twitter'));
        $data['instagram'] = $this->chek_Null($this->input->post('instagram'));
        $data['date'] = strtotime(date("Y-m-d",time()));
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->where("id",$id);
        $this->db->update('main_data',$data);
    }
        
//-----------------------------------------------------
   public function insert_com($max_post_name,$type,$post_name){
    $max=$this->input->post($max_post_name);
    for($x=1;$x<=$max;$x++){
        $data['type']=$type;
        $data['data_com']=$this->input->post($post_name.$x);
        $this->db->insert("main_data_com",$data);
    }
   }
//-----------------------------------------------------
   

}//END CLASS