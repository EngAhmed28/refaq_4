<?php

/**
 * Created by PhpStorm.
 * User: DASH
 * Date: 8/12/2017
 * Time: 03:51 م
 */
class Main_product extends CI_Model
{





    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    public  function  insert(){
        $data['p_name'] = $this->chek_Null($this->input->post('p_name'));

        $this->db->insert('storage_products',$data);
    }



    public function select(){
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->order_by('id','DESC');
        $this->db->where('p_from_id_fk',0);
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
        $this->db->delete('storage_products');
    }

    public function getById($id){
        $h = $this->db->get_where('storage_products', array('id'=>$id));
        return $h->row_array();
    }


    public function update($id){
        $data['p_name'] = $this->chek_Null($this->input->post('p_name'));

        $this->db->where('id', $id);
        if($this->db->update('storage_products',$data)) {
            return true;
        }else{
            return false;
        }
    }




}

