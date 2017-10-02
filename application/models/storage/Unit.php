<?php

/**
 * Created by PhpStorm.
 * User: DASH
 * Date: 8/12/2017
 * Time: 03:24 م
 */
class Unit extends CI_Model
{





    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    public  function  insert(){
        $data['unit_name'] = $this->chek_Null($this->input->post('unit_name'));
        $this->db->insert('units',$data);
    }



    public function select(){
        $this->db->select('*');
        $this->db->from('units');
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

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('units');
    }

    public function getById($id){
        $h = $this->db->get_where('units', array('id'=>$id));
        return $h->row_array();
    }


    public function update($id){
        $data['unit_name'] = $this->chek_Null($this->input->post('unit_name'));

        $this->db->where('id', $id);
        if($this->db->update('units',$data)) {
            return true;
        }else{
            return false;
        }
    }




}