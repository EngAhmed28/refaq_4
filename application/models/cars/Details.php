<?php


class Details extends CI_Model
{



    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    public  function  insert(){
        $data['car_type_id_fk'] = $this->chek_Null($this->input->post('car_type_id_fk'));
        $data['engine_code'] = $this->chek_Null($this->input->post('engine_code'));
        $data['company_id_fk'] = $this->chek_Null($this->input->post('company_id_fk'));
        $data['insurance_cost'] = $this->chek_Null($this->input->post('insurance_cost'));
        $data['insurance_date'] = $this->chek_Null(strtotime($this->input->post('insurance_date')));
        $data['car_code'] = $this->chek_Null($this->input->post('car_code'));
        $this->db->insert('cars',$data);
    }


    public function select_search_key($table,$search_key,$search_key_value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key,$search_key_value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select(){
        $this->db->select('*');
        $this->db->from('cars');
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
    public function select_company(){
        $this->db->select('*');
        $this->db->from('companies_and_cars_types');
        $this->db->order_by('id','DESC');
        $this->db->where('type',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function select_car_type(){
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
        $this->db->delete('cars');
    }

    public function getById($id){
        $h = $this->db->get_where('cars', array('id'=>$id));
        return $h->row_array();
    }

    public function update($id){
        $data['car_type_id_fk'] = $this->chek_Null($this->input->post('car_type_id_fk'));
        $data['engine_code'] = $this->chek_Null($this->input->post('engine_code'));
        $data['company_id_fk'] = $this->chek_Null($this->input->post('company_id_fk'));
        $data['insurance_cost'] = $this->chek_Null($this->input->post('insurance_cost'));
        $data['insurance_date'] = $this->chek_Null(strtotime($this->input->post('insurance_date')));
        $data['car_code'] = $this->chek_Null($this->input->post('car_code'));
        $this->db->where('id', $id);
        if($this->db->update('cars',$data)) {
            return true;
        }else{
            return false;
        }
    }


}