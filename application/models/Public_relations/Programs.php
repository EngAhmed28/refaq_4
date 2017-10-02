<?php
class Programs extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insert($file){
        $data['program_name']=$this->input->post('program_name');
        $data['logo']=$file;
        $data['program_from']=strtotime($this->input->post('program_from'));
        $data['program_to']=strtotime($this->input->post('program_to'));
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('programs',$data);
    }
    
    public function insert_about(){
        $data['program_id']=$this->input->post('program_id');
        $data['program_title']=$this->input->post('program_title');
        $data['program_content']=$this->input->post('program_content');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('programs_about',$data);
    }
    
    public function insert_photo($file,$type){
        $data['program_id']=$this->input->post('program_id');
        $data['img']=$file;
        $data['type']=$type;
        $this->db->insert('programs_photo',$data);
    }
    
    public function select($array){
        $this->db->select('*');
        $this->db->from('programs');
        if($array)
            $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_photo($array){
        $data = null;
        $data2 = null;
        $this->db->select('*');
        $this->db->from('programs_photo');
        if($array)
            $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if($row->type == 0)
                    $data[$row->program_id][] = $row;
                else
                    $data2[$row->program_id][] = $row;
            }
            return array($data,$data2);
        }
        return false;
    }
    
    public function getById($id){
        $h = $this->db->get_where('programs', array('id'=>$id));
        return $h->row_array();
    }
    
    public function getById_about($id){
        $h = $this->db->get_where('programs_about', array('id'=>$id));
        return $h->row_array();
    }
    
    public function update($id, $file){
        $update = array(
            'program_name'=>$this->input->post('program_name'),
            'program_from'=>strtotime($this->input->post('program_from')),
            'program_to'=>strtotime($this->input->post('program_to')),
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time()
        );
        if($file)
            $update['logo'] = $file;
        
        $this->db->where('id', $id);
        if($this->db->update('programs',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function update_about($id){
        $update = array(
            'program_content'=>$this->input->post('program_content'),
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time()
        );
        
        $this->db->where('id', $id);
        if($this->db->update('programs_about',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function select_title($program_id){
        $this->db->select('*');
        $this->db->from('programs_about');
        $this->db->where('program_id',$program_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->program_title;
            }
            return $data;
        }
        return false;
    }
    
    public function select_about(){
        $this->db->select('*');
        $this->db->from('programs_about');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->program_id][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function delete_about($id){
        $this->db->where('id',$id);
        $this->db->delete('programs_about');
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('programs');
        
        $this->db->where('program_id',$id);
        $this->db->delete('programs_about');
        
        $this->db->where('program_id',$id);
        $this->db->delete('programs_photo');
    }
}