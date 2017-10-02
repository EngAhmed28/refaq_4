<?php

class Sub_product extends CI_Model
{
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }
    public  function  insert1(){
        $data['p_code'] = $this->chek_Null($this->input->post('p_code').'00001');
        $data['p_name'] = $this->chek_Null($this->input->post('p_name'));
        $data['p_from_id_fk'] = $this->chek_Null($this->input->post('p_from_id_fk'));
        $data['p_unit_fk'] = $this->chek_Null($this->input->post('p_unit_fk'));
        $data['p_type_fk'] = $this->chek_Null($this->input->post('p_type_fk'));
        $data['p_supply_price'] = $this->chek_Null($this->input->post('p_supply_price'));
        $data['p_exchange_price'] = $this->chek_Null($this->input->post('p_exchange_price'));
        $data['p_past_amount'] = $this->chek_Null($this->input->post('p_past_amount'));
        $data['p_past_amount_cost'] = $this->chek_Null($this->input->post('p_past_amount_cost'));
        $data['p_storage_code_fk'] = $this->chek_Null($this->input->post('p_storage_code_fk'));

        $this->db->insert('storage_products',$data);
    }


    public  function  insert($x){

            $data['p_code'] = $this->chek_Null($this->input->post('p_code').'0000'.$x+1);
        $data['p_name'] = $this->chek_Null($this->input->post('p_name'));
        $data['p_from_id_fk'] = $this->chek_Null($this->input->post('p_from_id_fk'));
        $data['p_unit_fk'] = $this->chek_Null($this->input->post('p_unit_fk'));
        $data['p_type_fk'] = $this->chek_Null($this->input->post('p_type_fk'));
        $data['p_supply_price'] = $this->chek_Null($this->input->post('p_supply_price'));
        $data['p_exchange_price'] = $this->chek_Null($this->input->post('p_exchange_price'));
        $data['p_past_amount'] = $this->chek_Null($this->input->post('p_past_amount'));
        $data['p_past_amount_cost'] = $this->chek_Null($this->input->post('p_past_amount_cost'));
        $data['p_storage_code_fk'] = $this->chek_Null($this->input->post('p_storage_code_fk'));

        $this->db->insert('storage_products',$data);
    }
//==========================select


    public function select(){
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->order_by('id','DESC');
        $this->db->where('p_from_id_fk!=',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_main_product(){
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->order_by('id','DESC');
        $this->db->where('p_from_id_fk',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_stores(){
    $this->db->select('*');
    $this->db->from('stores');
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

    public function select_units(){
        $this->db->select('*');
        $this->db->from('units');
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

    public function select_count($id){
        $this->db->select('p_storage_code_fk, COUNT(p_storage_code_fk) as total');
        $this->db->group_by('p_storage_code_fk');
        $this->db->from('storage_products');
        $this->db->where('p_storage_code_fk',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }





//==========================================================

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('storage_products');
    }


    public function getById($id){
        $h = $this->db->get_where('storage_products', array('id'=>$id));
        return $h->row_array();
    }


    public function update($id){
        $data['p_code'] = $this->chek_Null($this->input->post('p_code'));
        $data['p_name'] = $this->chek_Null($this->input->post('p_name'));
        $data['p_from_id_fk'] = $this->chek_Null($this->input->post('p_from_id_fk'));
        $data['p_unit_fk'] = $this->chek_Null($this->input->post('p_unit_fk'));
        $data['p_type_fk'] = $this->chek_Null($this->input->post('p_type_fk'));
        $data['p_supply_price'] = $this->chek_Null($this->input->post('p_supply_price'));
        $data['p_exchange_price'] = $this->chek_Null($this->input->post('p_exchange_price'));
        $data['p_past_amount'] = $this->chek_Null($this->input->post('p_past_amount'));
        $data['p_past_amount_cost'] = $this->chek_Null($this->input->post('p_past_amount_cost'));
        $data['p_storage_code_fk'] = $this->chek_Null($this->input->post('p_storage_code_fk'));

        $this->db->where('id', $id);
        if($this->db->update('storage_products',$data)) {
            return true;
        }else{
            return false;
        }
    }








}