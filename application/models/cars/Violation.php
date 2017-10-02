<?php

class Violation extends CI_Model
{





    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    public function insert(){
        $data['violation_num'] = $this->chek_Null($this->input->post('violation_num'));

        $data['car_id_fk'] = $this->chek_Null($this->input->post('car_id_fk'));
        $data['driver_id_fk'] =  $this->chek_Null($this->input->post('driver_id_fk'));
        $data['receipt_code'] = $this->chek_Null($this->input->post('receipt_code'));
        $data['note'] =  $this->chek_Null($this->input->post('note'));
        $data['date'] = $this->chek_Null($this->input->post('date'));
        $data['date_s'] = time();
        $data['added_by'] = $_SESSION["user_id"];
        $this->db->insert('car_violation',$data);
    }

    //////////////////////////


///////////selecting data//////////////////


    public function select(){

        $this->db->select('*');
        $this->db->from('car_violation');
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


    public function select_last(){

        $this->db->select('*');
        $this->db->from('car_violation');
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




    public function select_car_type(){
        $this->db->select('cars.*');
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


    public function select_drivers(){
        $this->db->select('*');
        $this->db->from('drivers');
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
    //////////////////////////


    /////delete/////


    public function delete($id){

        $this->db->where('id',$id);
        $this->db->delete('car_violation');

    }


    //////////////////////////


///////////update//////////////////


    public function getById($id){

        $h = $this->db->get_where('car_violation', array('id'=>$id));
        return $h->row_array();

    }


    public function update($id){
        $data['violation_num'] = $this->chek_Null($this->input->post('violation_num'));
        $data['car_id_fk'] = $this->chek_Null($this->input->post('car_id_fk'));
        $data['driver_id_fk'] =  $this->chek_Null($this->input->post('driver_id_fk'));
        $data['receipt_code'] = $this->chek_Null($this->input->post('receipt_code'));
        $data['note'] =  $this->chek_Null($this->input->post('note'));
        $data['date'] = $this->chek_Null(strtotime($this->input->post('date')));
        $data['date_s'] = time();
        $data['added_by'] = $_SESSION["user_id"];
        $this->db->where('id', $id);
        if($this->db->update('car_violation',$data)) {

            return true;

        }else{

            return false;

        }
    }




}