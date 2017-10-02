<?php
class News extends CI_Model
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
//-----------------------------------------------------       
    public  function  insert_news(){
        $data['title']=$this->chek_Null($this->input->post('title'));
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['date']=strtotime($this->input->post('date'));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('news',$data);
    }
//---------------------------------------------------  
public  function  update_news($id){
        $data['title']=$this->chek_Null($this->input->post('title'));
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['date']=strtotime($this->input->post('date'));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->where("id",$id);
        $this->db->update('news',$data);
    }    
//----------------------------------------------------
    public  function  insert_photo($last,$file){
        $data['process']='news';
        $data['f_id']=$last;
        foreach($file as $key=>$value){
        $data['img']=$value;    
         $this->db->insert('albums_photo',$data);
        }
        
    }
//-------------------------------------------------------
public function select(){

        $this->db->select('*');
        $this->db->from('news');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query_result=$query->result();
        if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query_result as $row) {
                $query_result[$i]->sub_img = $this->get_photo($row->id);
               $i++;
            }
            return $query_result;
        }
        return false;
    }
//-----------------------------------------------------
public function get_photo($f_id){
        $this->db->select('*');
        $this->db->from('albums_photo');
        $this->db->where("f_id",$f_id);
         $query = $this->db->get();
    if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
}
//-----------------------------------------------------
public function get_image_name($id){
      $h = $this->db->get_where("albums_photo", array('id'=>$id));
        $arr=$h->row_array();
        return $arr['img'];
}
//----------------------------------------------------
public function delete_img($id){
    
        $img_name=$this->get_image_name($id);
         unlink("uploads/images/".$img_name);
        $this->db->where("id",$id);
        $this->db->delete("albums_photo");
}
//--------------------------------------------------
public function delete_where($f_id){
       $this->db->select('*');
        $this->db->from('albums_photo');
        $this->db->where("f_id",$f_id);
         $query = $this->db->get();
    if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
               $this->delete_img($row->id);
            }
            return 1;
        }
        return false;
}


 public function get_all_photo(){
        $this->db->select('*');
        $this->db->from('news_photo');
        $this->db->where("process","news");
        $this->db->group_by('f_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //------------------------------------------------------
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('news');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    //-------------------------------------------------------
    public function getById($id){
        $h = $this->db->get_where('news', array('id'=>$id));
        return $h->row_array();
    }

}//END CLASS
?>