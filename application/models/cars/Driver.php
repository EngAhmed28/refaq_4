<?php

class Driver extends CI_Model
{


    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    public function insert(){
        $data['driver_code'] = $this->chek_Null($this->input->post('driver_code'));
        $data['driver_name'] =  $this->chek_Null($this->input->post('driver_name'));
        $data['driver_card'] = $this->chek_Null($this->input->post('driver_card'));
        $data['driver_address'] =  $this->chek_Null($this->input->post('driver_address'));
        $data['driver_license_code'] = $this->chek_Null($this->input->post('driver_license_code'));
        $this->db->insert('drivers',$data);
    }

    //////////////////////////


///////////selecting data//////////////////


    public function select(){

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


    public function select_last(){

        $this->db->select('*');
        $this->db->from('drivers');
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


    //////////////////////////


    /////delete/////


    public function delete($id){

        $this->db->where('id',$id);
        $this->db->delete('drivers');

    }


    //////////////////////////


///////////update//////////////////


    public function getById($id){

        $h = $this->db->get_where('drivers', array('id'=>$id));
        return $h->row_array();

    }


    public function update($id){

        $data['driver_code'] = $this->chek_Null($this->input->post('driver_code'));
        $data['driver_name'] =  $this->chek_Null($this->input->post('driver_name'));
        $data['driver_card'] = $this->chek_Null($this->input->post('driver_card'));
        $data['driver_address'] =  $this->chek_Null($this->input->post('driver_address'));
        $data['driver_license_code'] = $this->chek_Null($this->input->post('driver_license_code'));
        $this->db->where('id', $id);
        if($this->db->update('drivers',$data)) {

            return true;

        }else{

            return false;

        }
    }




}