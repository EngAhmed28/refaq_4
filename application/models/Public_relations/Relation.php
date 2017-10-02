<?php
class Relation extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insert_main(){
        $data['main_field_name']=$this->input->post('main_field_name');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_id'];
        $this->db->insert('donation',$data);
    }
    
    public function insert_sub($file){
        $data['main_field_id']=$this->input->post('main_field_id');
        $data['sub_field_name']=$this->input->post('sub_field_name');
        $data['img']=$file;
        $data['about']=$this->input->post('about');
        $data['details']=$this->input->post('details');
        $data['details2']=$this->input->post('details2');
        $data['type'] = 1;
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_id'];
        $this->db->insert('donation',$data);
    }
    
    public function insert_success($file){
        $data['name']=$this->input->post('name');
        $data['img']=$file;
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $data['publisher']=$_SESSION['user_id'];
        $this->db->insert('success',$data);
    }
    
    public function update_success($id,$file){
        $update = array(
            'name'=>$this->input->post('name'),
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
            'publisher' => $_SESSION['user_id']
        );
        if($file)
            $update['img'] = $file;
        
        $this->db->where('id', $id);
        if($this->db->update('success',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function insert_work_donation($file){
        for($x = 0 ; $x < $this->input->post('num_title') ; $x++){
            $data['main_field_id']=$this->input->post('main_field_id');
            $data['sub_field_id']=$this->input->post('sub_field_id');
            $data['img']=$file;
            $data['title']=$this->input->post('title'.$x.'');
            $data['date'] = strtotime(date("Y/m/d"));
            $data['date_s']=time();
            $data['publisher']=$_SESSION['user_id'];
            $this->db->insert('work_donation',$data);
        }
        $this->db->select('*');
        $this->db->from('work_donation');
        $this->db->where('sub_field_id',$this->input->post('sub_field_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $update['img'] = $file;
            foreach ($query->result() as $row) {
                $this->db->where('id', $row->id);
                $this->db->update('work_donation',$update);
            }
        }
    }
    
    public function update_work($id,$file){
        $update = array(
            'main_field_id'=>$this->input->post('main_field_id'),
            'sub_field_id'=>$this->input->post('sub_field_id'),
            'title'=>$this->input->post('title'),
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
            'publisher' => $_SESSION['user_id']
        );
        
        $this->db->where('id', $id);
        $this->db->update('work_donation',$update);
        
        if($file){
            $update2['img'] = $file;
            
            $this->db->select('*');
            $this->db->from('work_donation');
            $this->db->where('sub_field_id',$this->input->post('sub_field_id'));
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $this->db->where('id', $row->id);
                    $this->db->update('work_donation',$update2);
                }
            }
        }
    }
    
    public function update_sub($id,$file){
        $update = array(
            'main_field_id'=>$this->input->post('main_field_id'),
            'sub_field_name'=>$this->input->post('sub_field_name'),
            'about'=>$this->input->post('about'),
            'details'=>$this->input->post('details'),
            'details2'=>$this->input->post('details2'),
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
            'publisher' => $_SESSION['user_id']
        );
        if($file)
            $update['img'] = $file;
        
        $this->db->where('id', $id);
        if($this->db->update('donation',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function update_main($id){
        $update = array(
            'main_field_name'=>$this->input->post('main_field_name'),
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
            'publisher' => $_SESSION['user_id']
        );
        
        $this->db->where('id', $id);
        if($this->db->update('donation',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function getById_main($id){
        $h = $this->db->get_where('donation', array('id'=>$id));
        return $h->row_array();
    }
    
    public function getById_work($id){
        $h = $this->db->get_where('work_donation', array('id'=>$id));
        return $h->row_array();
    }
    
    public function getById_success($id){
        $h = $this->db->get_where('success', array('id'=>$id));
        return $h->row_array();
    }
    
    public function delete_main($id){
        $this->db->where('id',$id);
        $this->db->delete('donation');
        
        $this->db->where('main_field_id',$id);
        $this->db->delete('donation');
        
        $this->db->where('main_field_id',$id);
        $this->db->delete('work_donation');
    }
    
    public function delete_sub($id){
        $this->db->where('id',$id);
        $this->db->delete('donation');
        
        $this->db->where('sub_field_id',$id);
        $this->db->delete('work_donation');
    }
    
    public function delete_work_donation($id){
        $this->db->where('id',$id);
        $this->db->delete('work_donation');
    }
    
    public function delete_success($id){
        $this->db->where('id',$id);
        $this->db->delete('success');
    }
    
    public function select_main($type){
        $this->db->select('*');
        $this->db->from('donation');
        $this->db->where('type',$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
                $data2[$row->main_field_id][] = $row;
            }
            return array($data,$data2);
        }
        return false;
    }
    
    public function select_sub($main){
        $this->db->select('*');
        $this->db->from('donation');
        $this->db->where('main_field_id',$main);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_work_donation(){
        $this->db->select('*');
        $this->db->from('work_donation');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->main_field_id][$row->sub_field_id][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_success(){
        $this->db->select('*');
        $this->db->from('success');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_all_sub(){
        $this->db->select('*');
        $this->db->from('donation');
        $this->db->where('type',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_donation($id){
        $this->db->select('*');
        $this->db->from('donation');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_work_donation_where($id){
        $this->db->select('*');
        $this->db->from('work_donation');
        $this->db->where('sub_field_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
}