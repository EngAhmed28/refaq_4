<?php
class Composite extends CI_Model
{
    public function insert()
    {

        $data['product_main_code_fk'] = $this->input->post('composite_p');
        $data['product_main_amount'] = $this->input->post('amount');
        $data['note'] = $this->input->post('note');
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['added_by'] = $_SESSION['user_username'];

        $this->db->insert('production_system', $data);


    }
    
    public function update($id){


        $data['product_main_code_fk'] = $this->input->post('product_main_code_fk');
        $data['product_main_code_fk'] = $this->input->post('composite_p');
        $data['product_main_amount'] = $this->input->post('amount');
        $data['note'] = $this->input->post('note');

        $this->db->where('id', $id);
        $this->db->update('production_system', $data);
    }
    
    public function getById($id){
        $h = $this->db->get_where('production_system', array('id'=>$id));
        return $h->row_array();
    }
    
    public function select()
    {
        $this->db->select('*');
        $this->db->from('production_system');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_items()
    {
        $this->db->select('*');
        $this->db->from('production_system');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->order_num_id_fk][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_items_where($id)
    {
        $this->db->select('*');
        $this->db->from('production_system');
        $this->db->where('id',$id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function products()
    {
        $this->db->select('*');
        $this->db->from('storage_products');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function units()
    {
        $this->db->select('*');
        $this->db->from('units');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
    }
    
    public function doners(){
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function store()
    {
        $this->db->select('*');
        $this->db->from('stores');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('production_system');

    }
    public function select_composite_p(){

        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->where('p_type_fk=',2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_composite_p_all(){
        $this->db->select('*');
        $this->db->from('production_system');
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

}