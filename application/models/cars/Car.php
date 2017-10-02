<?php

class Car extends CI_Model
{
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    public  function  insert(){
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['address'] = $this->chek_Null($this->input->post('address'));
        $data['tele'] = $this->chek_Null($this->input->post('tele'));
        $data['type'] = 1;
        $this->db->insert('companies_and_cars_types',$data);
    }



    public function select(){
        $this->db->select('*');
        $this->db->from('companies_and_cars_types');
        $this->db->order_by('id','DESC');
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



    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('companies_and_cars_types');
    }

    public function getById($id){
        $h = $this->db->get_where('companies_and_cars_types', array('id'=>$id));
        return $h->row_array();
    }

    public function update($id){
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['address'] = $this->chek_Null($this->input->post('address'));
        $data['tele'] = $this->chek_Null($this->input->post('tele'));
        $data['type'] = 1;
        $this->db->where('id', $id);
        if($this->db->update('companies_and_cars_types',$data)) {
            return true;
        }else{
            return false;
        }
    }




}