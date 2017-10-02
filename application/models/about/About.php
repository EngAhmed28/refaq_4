<?php

class About extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//-----------------------------------------------------    
    public function insert($file,$type){
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['img'] = $this->chek_Null($file);
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['date'] = strtotime(date("Y-m-d",time()));
        $data['date_s'] = time();
        $data['type'] = $type;
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('about',$data);
    }
    //-----------------------------------------------------    
    public function update($id,$file,$type){
        $data['title'] = $this->chek_Null($this->input->post('title'));
          if($this->chek_Null($file) != ""){
           $data['img'] = $file;
          }
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['date'] = strtotime(date("Y-m-d",time()));
        $data['date_s'] = time();
        $data['type'] = $type;
        $data['publisher'] = $_SESSION['user_username'];
         $this->db->where('id',$id);
        $this->db->update('about',$data);
    }
//-----------------------------------------------------
    public function select($type){

        $this->db->select('*');
        $this->db->from('about');
        $this->db->where('type',$type);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }



}//END CLASS