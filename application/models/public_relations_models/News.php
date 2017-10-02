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
    public  function  insert_news($news_type){
        $data['title']=$this->chek_Null($this->input->post('title'));
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['news_category']=$this->chek_Null($this->input->post('news_category'));
        $data['news_type']=$news_type;
        $data['date']=strtotime($this->input->post('date'));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('news',$data);
    }
//---------------------------------------------------  
public  function  update_news($id){
        $data['title']=$this->chek_Null($this->input->post('title'));
        $data['content']=$this->chek_Null($this->input->post('content'));
        $data['news_category']=$this->chek_Null($this->input->post('news_category'));
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
         $this->db->insert('news_photo',$data);
        }
        
    }
//-------------------------------------------------------
public function select($news_type){

        $this->db->select('*');
        $this->db->from('news');
        $this->db->where("news_type",$news_type);
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
        $this->db->from('news_photo');
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
      $h = $this->db->get_where("news_photo", array('id'=>$id));
        $arr=$h->row_array();
        return $arr['img'];
}
//----------------------------------------------------
public function delete_img($id){
    $this->load->helper('file');    
        $img_name=$this->get_image_name($id);
         delete_files(base_url()."uploads/images/".$img_name);
        $this->db->where("id",$id);
        $this->db->delete("news_photo");
}
//--------------------------------------------------
public function delete_where($f_id){
       $this->db->select('*');
        $this->db->from('news_photo');
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
//---------------------------------------------
public function insert_show($file){
        $data['name']=$this->input->post('name');
        $data['img']= $file;
        $data['publisher'] = $_SESSION['user_username'];
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s']=time();
        $this->db->insert('live_show',$data); 
    
}
//----------------------------------------------
public function update_show($file,$id){
 $data = array('name'=>$this->input->post('name') );
        $data['publisher'] = $_SESSION['user_username'];
        $data['date'] = strtotime(date("m/d/Y"));
        $data['date_s']=time();
        if($this->chek_Null($file) != ''){
            $data['img']=$file ;
        }
        $this->db->where('id', $id);
        if($this->db->update('live_show',$data)) {
            return true;
        }else{
            return false;
        }
}

}//END CLASS
?>