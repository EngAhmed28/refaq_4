<?php

class Storage extends CI_Model
{


    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    public  function  insert(){
        $data['storage_name'] = $this->chek_Null($this->input->post('storage_name'));
        $this->db->insert('stores',$data);
    }



    public function select(){
        $this->db->select('*');
        $this->db->from('stores');
        $this->db->order_by('id','DESC');
        //$this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function select_last(){
        $this->db->select('id');
        $this->db->from('stores');
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


    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('stores');
    }

    public function getById($id){
        $h = $this->db->get_where('stores', array('id'=>$id));
        return $h->row_array();
    }









    public function update($id){
        $data['storage_name'] = $this->chek_Null($this->input->post('storage_name'));
        
        $this->db->where('id', $id);
        if($this->db->update('stores',$data)) {
            return true;
        }else{
            return false;
        }
    }


}