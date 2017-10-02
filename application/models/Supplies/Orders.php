<?php
class Orders extends CI_Model
{
    public function insert()
    {
        $mode = reset($_SESSION["supplies_addtion".$_SESSION["user_id"]]);
        $data['order_num'] = $mode['order_num'];
        $data['donar_id_fk'] = $mode['donar_id_fk'];
        $data['order_total_cost'] = $this->input->post('order_total_cost');
        $data['order_notes'] = $this->input->post('order_notes');
        $data['date'] = $mode['date'];
        $data['date_s'] = time();
        $data['added_by'] = $_SESSION['user_username'];
        
        $this->db->insert('supplies_orders', $data);
        
        for($x = 0 ; $x < count($_SESSION["supplies_addtion".$_SESSION["user_id"]]) ; $x++){
            $data2['order_num_id_fk']    = $mode['order_num'];
            $data2['product_code_fk']    = $mode['product_code_fk'];
            $data2['storage_code_fk']    = $mode['storage_code_fk'];
            $data2['product_amount']     = $mode['product_amount'];
            $data2['all_cost_supply']  = $mode['all_cost_exchange'];
            $data2['product_unite']      = $mode['product_unite'];
            $data2['date']               = $mode['date'];
            $data2['date_s']             = time();
            
            
            $this->db->insert('supplies_items', $data2);
            
            $mode = next($_SESSION["supplies_addtion".$_SESSION["user_id"]]);
        }
    }
    
    public function update($id){
        $mode = reset($_SESSION["supplies_addtion".$_SESSION["user_id"]]);
        $update = array(
            'donar_id_fk'=>$mode['donar_id_fk'],
            'order_notes'=>$this->input->post('order_notes'),
            'date_s' => time(),
            'added_by' => $_SESSION['user_id']
        );
        
        $this->db->where('order_num', $id);
        if($this->db->update('supplies_orders',$update)){
            $this->db->where('order_num_id_fk',$id);
            $this->db->delete('supplies_items');
            
            for($x = 0 ; $x < count($_SESSION["supplies_addtion".$_SESSION["user_id"]]) ; $x++){
                $data2['order_num_id_fk']    = $mode['order_num'];
                $data2['product_code_fk']    = $mode['product_code_fk'];
                $data2['storage_code_fk']    = $mode['storage_code_fk'];
                $data2['product_amount']     = $mode['product_amount'];
                $data2['all_cost_supply']  = $mode['all_cost_exchange'];
                $data2['product_unite']      = $mode['product_unite'];
                $data2['date']               = $mode['date'];
                $data2['date_s']             = time();
                
                
                $this->db->insert('supplies_items', $data2);
                
                $mode = next($_SESSION["supplies_addtion".$_SESSION["user_id"]]);
            }
            return true;
        }else{
            return false;
        }
    }
    
    public function getById($id){
        $h = $this->db->get_where('supplies_orders', array('order_num'=>$id));
        return $h->row_array();
    }
    
    public function select()
    {
        $this->db->select('*');
        $this->db->from('supplies_orders');
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
        $this->db->from('supplies_items');
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
        $this->db->from('supplies_items');
        $this->db->where('order_num_id_fk',$id);
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
        $this->db->where('order_num',$id);
        $this->db->delete('supplies_orders');
        
        $this->db->where('order_num_id_fk',$id);
        $this->db->delete('supplies_items');
    }


    public function select_from_to($num1 ,$num2)
    {
        $this->db->select('*');
        $this->db->from('supplies_orders');
        // $this->db->where('date','BETWEEN ',strtotime($num1),'AND',strtotime($num2));
        $this->db->where('date BETWEEN "'.  strtotime($num1). '" and "'. strtotime($num2).'"');
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


}