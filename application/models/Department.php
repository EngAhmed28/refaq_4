<?php
class Department extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("departments");
    }

//-----------------------------------------------insert------------------------------------//
    public  function  insert(){
        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['publisher'] = $_SESSION['user_id'];
        $data['date_s']=time();
        $this->db->insert('departments',$data);
    }
    public function insert_album($file,$f_id) {
        $a = 0;
        foreach($file as $record):
            $val['img']=$record;
            $val['dep_id_fk']=$f_id;
            $a++;
            $this->db->insert('albums',$val);
        endforeach;
    }
//----------------------------------------------------select_last---------------------------------------//
    public function select_last(){
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//----------------------------------------------------------select_all------------------------------------//

//--------------------------------------------getdetails---------------------------------//
    public function  getdetails(){
        $this->db->select('*');
        $this->db->from('albums');
        $this->db->group_by('dep_id_fk');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `albums` WHERE `dep_id_fk` = '.$row->dep_id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2->img;
                }
                $data[$row->dep_id_fk]=$arr;
            }
            return $data;
        }
        return false;
    }
//------------------------------------------delete id------------------------------//
     public function delete($id){
$this->db->where('id',$id);
$this->db->delete('departments');
$this->db->where('dep_id_fk',$id);
$this->db->delete('albums');
}
    public function delete_photo($id){
        $this->db->where('id',$id);
        $this->db->delete('albums');
    }
//------------------------------------------------ getimg-----------------------------------//
    public function getById($id){
        $h = $this->db->get_where('departments', array('id'=>$id));
        return $h->row_array();
    }
    public function getimg($id){
        $this->db->select("*");
        $this->db->from("albums");
        $this->db->where('dep_id_fk', $id);
        $query = $this->db->get();
        return $query->result();
    }
    //----------------------------------------------------------update------------------------------//
    public function update($id,$file){
        $h = $this->db->get_where('departments', array('id'=>$id));
        $row = $h->row_array();
        $a = 0;
        foreach($file as $record):
            $a++;
            $val['img']=$record;
            $val['dep_id_fk']=$row['id'];
            $this->db->insert('albums',$val);
        endforeach;
        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['publisher'] = $_SESSION['user_id'];
        $data['date_s']=time();
        $this->db->where('id', $id);
        if($this->db->update('departments',$data)) {
            return true;
        }else{
            return false;
        }
    }
//----------------------------------start-------------------------
    public function select_album_web(){
        $this->db->select('*');
        $this->db->from('albums');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `albums` WHERE `dep_id_fk`='.$row->dep_id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->dep_id_fk]=$arr;

            }
            return $data;
        }
        return false;
    }


    ////////////////////////////////////////////////////8-2-2017///////////////////////////////

    public function select_all(){
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('type',0);
        $this->db->where('deleted',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }

    //============================================================================
    public function select_employ_main_dep(){
        $this->db->select('*');
        $this->db->from('departments');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `departments` WHERE `id`='.$row->id);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->id]=$arr;
            }
            return $data;
        }
        return false;
    }
    //================================================
    public function select_employ_sub_dep(){
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('main_dep_f_id !=','');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `departments` WHERE   `id`='.$row->id);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->id]=$arr;
            }
            return $data;
        }
        return false;
    }
}

