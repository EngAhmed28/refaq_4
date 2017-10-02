<?php

class Orders extends CI_Model
{
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    public function insert(){
        $data['orders_num'] = $this->chek_Null($this->input->post('orders_num'));
        $data['car_id_fk'] =  $this->chek_Null($this->input->post('car_id_fk'));
        $data['driver_id_fk'] = $this->chek_Null($this->input->post('driver_id_fk'));
        $data['counter_number_go'] =  $this->chek_Null($this->input->post('counter_number_go'));
        $data['place_from'] = $this->chek_Null($this->input->post('place_from'));
        $data['place_to'] = $this->chek_Null($this->input->post('place_to'));
        $data['date_from'] =   $this->chek_Null(strtotime($this->input->post('date_from')));
        $data['date_to'] = $this->chek_Null(strtotime($this->input->post('date_to')));
        $data['date'] =   $this->chek_Null(strtotime($this->input->post('date')));
        $data['date_s'] = time();
        $data['add_by'] = $_SESSION["user_id"];
        $data['return'] =  0;
        $data['counter_number_return'] = $this->chek_Null($this->input->post('counter_number_return'));
        $this->db->insert('orders_car',$data);
    }

    //////////////////////////


///////////selecting data//////////////////


    public function select(){

        $this->db->select('*');
        $this->db->from('orders_car');
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
        $this->db->from('orders_car');
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
    public function select_all(){

        $this->db->select('*');
        $this->db->from('orders_car');
        $this->db->where('return',0);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->car_id_fk;
            }
            return $data;
        }
        return false;
    }

    public function select_driverss(){

        $this->db->select('*');
        $this->db->from('orders_car');
        $this->db->where('return',0);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->driver_id_fk;
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
        $this->db->delete('orders_car');

    }


    //////////////////////////


///////////update//////////////////


    public function getById($id){

        $h = $this->db->get_where('orders_car', array('id'=>$id));
        return $h->row_array();

    }


    public function update($id){
        $data['orders_num'] = $this->chek_Null($this->input->post('orders_num'));
        $data['car_id_fk'] =  $this->chek_Null($this->input->post('car_id_fk'));
        $data['driver_id_fk'] = $this->chek_Null($this->input->post('driver_id_fk'));
        $data['counter_number_go'] =  $this->chek_Null($this->input->post('counter_number_go'));
        $data['place_from'] = $this->chek_Null($this->input->post('place_from'));
        $data['place_to'] = $this->chek_Null($this->input->post('place_to'));
        $data['date_from'] =   $this->chek_Null(strtotime($this->input->post('date_from')));
        $data['date_to'] = $this->chek_Null(strtotime($this->input->post('date_to')));
        $data['date'] =   $this->chek_Null(strtotime($this->input->post('date')));
        $data['date_s'] = time();
        $data['add_by'] = $_SESSION["user_id"];
        $data['counter_number_return'] = $this->chek_Null($this->input->post('counter_number_returns'));

        $this->db->where('id', $id);
        if($this->db->update('orders_car',$data)) {

            return true;

        }else{

            return false;

        }
    }

    public function update_return($id){

        $data['return'] =  1;
        $data['counter_number_return'] = $this->chek_Null($this->input->post('counter_number_return'));
        $this->db->where('id', $id);
        if($this->db->update('orders_car',$data)) {

            return true;

        }else{

            return false;

        }
    }
}