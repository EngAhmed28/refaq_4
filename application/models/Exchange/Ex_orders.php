<?php
class Ex_orders extends CI_Model
{
    public function insert()
    {
        $mode = reset($_SESSION["order_addtion".$_SESSION["user_id"]]);
        $data['order_num'] = $mode['order_num'];
        $data['donar_id_fk'] = $mode['donar_id_fk'];
        $data['order_total_cost'] = $this->input->post('order_total_cost');
        $data['order_notes'] = $this->input->post('order_notes');
        $data['date'] = $mode['date'];
        $data['date_s'] = time();
        $data['added_by'] = $_SESSION['user_username'];
        
        $this->db->insert('exchange_orders', $data);
        
        for($x = 0 ; $x < count($_SESSION["order_addtion".$_SESSION["user_id"]]) ; $x++){
            $data2['order_num_id_fk']    = $mode['order_num'];
            $data2['product_code_fk']    = $mode['product_code_fk'];
            $data2['storage_code_fk']    = $mode['storage_code_fk'];
            $data2['product_amount']     = $mode['product_amount'];
            $data2['all_cost_exchange']  = $mode['all_cost_exchange'];
            $data2['product_unite']      = $mode['product_unite'];
            $data2['date']               = $mode['date'];
            $data2['date_s']             = time();
            
            $this->db->insert('exchange_items', $data2);
            
            $mode = next($_SESSION["order_addtion".$_SESSION["user_id"]]);
        }
    }
    
    public function insert2()
    {
        $mode = reset($_SESSION["standard_addtion".$_SESSION["user_id"]]);
        
        for($x = 0 ; $x < count($_SESSION["standard_addtion".$_SESSION["user_id"]]) ; $x++){
            $data2['product_main_code_fk'] = $mode['product_main_code_fk'];
            $data2['product_sub_code_fk']  = $mode['product_sub_code_fk'];
            $data2['product_sub_amount']   = $mode['product_sub_amount'];
            $data2['date']                 = strtotime(date("Y-m-d"));
            $data2['date_s']               = time();
            
            $this->db->insert('standard_recepies', $data2);
            
            $mode = next($_SESSION["standard_addtion".$_SESSION["user_id"]]);
        }
    }
    
    public function update($id){
        $mode = reset($_SESSION["order_addtion".$_SESSION["user_id"]]);
        if($this->input->post('donar_id_fk2'))
            $doner = $this->input->post('donar_id_fk2');
        else
            $doner = $mode['donar_id_fk'];
        $update = array(
            'donar_id_fk'=>$doner,
            'order_notes'=>$this->input->post('order_notes'),
            'date_s' => time(),
            'added_by' => $_SESSION['user_id']
        );
        
        $this->db->where('order_num', $id);
        if($this->db->update('exchange_orders',$update)){
            $this->db->where('order_num_id_fk',$id);
            $this->db->delete('exchange_items');
            
            for($x = 0 ; $x < count($_SESSION["order_addtion".$_SESSION["user_id"]]) ; $x++){
                $data2['order_num_id_fk']    = $mode['order_num'];
                $data2['product_code_fk']    = $mode['product_code_fk'];
                $data2['storage_code_fk']    = $mode['storage_code_fk'];
                $data2['product_amount']     = $mode['product_amount'];
                $data2['all_cost_exchange']  = $mode['all_cost_exchange'];
                $data2['product_unite']      = $mode['product_unite'];
                $data2['date']               = $mode['date'];
                $data2['date_s']             = time();
                
                $this->db->insert('exchange_items', $data2);
                
                $mode = next($_SESSION["order_addtion".$_SESSION["user_id"]]);
            }
            return true;
        }else{
            return false;
        }
    }
    
    public function update_standard($id){
        $mode = reset($_SESSION["standard_addtion".$_SESSION["user_id"]]);
        
        $this->db->where('product_main_code_fk',$id);
        $this->db->delete('standard_recepies');
            
        for($x = 0 ; $x < count($_SESSION["standard_addtion".$_SESSION["user_id"]]) ; $x++){
            $data2['product_main_code_fk'] = $mode['product_main_code_fk'];
            $data2['product_sub_code_fk']  = $mode['product_sub_code_fk'];
            $data2['product_sub_amount']   = $mode['product_sub_amount'];
            $data2['date']                 = strtotime(date("Y-m-d"));
            $data2['date_s']               = time();
                
            $this->db->insert('standard_recepies', $data2);
                
            $mode = next($_SESSION["standard_addtion".$_SESSION["user_id"]]);
        }
    }
    
    public function getById($id){
        $h = $this->db->get_where('exchange_orders', array('order_num'=>$id));
        return $h->row_array();
    }
    
    public function getById2($id){
        $this->db->select('*');
        $this->db->from('standard_recepies');
        $this->db->where('product_main_code_fk',$id);
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
    
    public function select()
    {
        $this->db->select('*');
        $this->db->from('exchange_orders');
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
        $this->db->from('exchange_items');
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
        $this->db->from('exchange_items');
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
    
    public function products_where($field,$value)
    {
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->where($field,$value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
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
    
    public function select_standard(){
        $this->db->select('*');
        $this->db->from('standard_recepies');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->product_main_code_fk][] = $row;
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
        $this->db->delete('exchange_orders');
        
        $this->db->where('order_num_id_fk',$id);
        $this->db->delete('exchange_items');
    }
    
    public function delete_standard($id){
        $this->db->where('product_main_code_fk',$id);
        $this->db->delete('standard_recepies');
    }
    
    public function products_select(){
        $query = $this->db->query(" SELECT storage_products.*
                                    FROM storage_products 
                                    LEFT JOIN standard_recepies ON 
                                    standard_recepies.product_main_code_fk = storage_products.id
                                    WHERE standard_recepies.product_main_code_fk IS NULL 
                                    AND storage_products.p_type_fk = 2");
        return $query->result();
    }

}