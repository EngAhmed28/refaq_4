<?php
class Car_crashes extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function select(){
        $this->db->select('*');
        $this->db->from('car_crashes');
        $this->db->order_by('crashe_num','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_violation($date_from,$date_to,$car_id){
        $this->db->select('*');
        $this->db->from('car_violation');
        $this->db->order_by('id','DESC');
        $array = array('date>='=>$date_from,'date<='=>$date_to,'car_id_fk'=>$car_id);
        $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_orders($driver_id){
        $this->db->select('*');
        $this->db->from('orders_car');
        $this->db->order_by('id','ASC');
        $this->db->where('driver_id_fk',$driver_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->driver_id_fk] = $row;
            }
            return $data;
        }
        return null;
    }
    
    public function select_drivers(){
        $this->db->select('*');
        $this->db->from('drivers');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->driver_order = $this->select_orders($row->id);
                $i++;
                $data2[$row->id] = $row;
            }
            return array($data,$data2);
        }
        return false;
    }
    
    public function unordered_cars(){
        $query = $this->db->query('SELECT car.*
                            FROM cars car
                            LEFT JOIN orders_car orders ON orders.car_id_fk = car.id
                            WHERE orders.car_id_fk IS NULL');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function R_cars(){
        $date_from = strtotime( 'first day of ' . date( 'F Y'));
        $date_to = strtotime(date('Y-m-d'));
        $query = $this->db->query('SELECT car.*
                                    , (SELECT COUNT(*) FROM orders_car WHERE orders_car.car_id_fk = car.id AND orders_car.date >= '.$date_from.' AND orders_car.date <= '.$date_to.') AS count_orders
                                    , (SELECT COUNT(*) FROM car_violation WHERE car_violation.car_id_fk = car.id AND car_violation.date >= '.$date_from.' AND car_violation.date <= '.$date_to.') AS count_vio
                                    , (SELECT COUNT(*) FROM car_crashes WHERE car_crashes.car_id_fk = car.id AND car_crashes.date >= '.$date_from.' AND car_crashes.date <= '.$date_to.') AS count_crash
                                    FROM cars car');
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
        $this->db->delete('car_crashes');
    }
    
    public function select_cars(){
        $this->db->select('*');
        $this->db->from('cars');
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
    
    public function select_all(){
        $this->db->select('*');
        $this->db->from('car_crashes');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->car_id_fk][$row->crashe_num][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_all_where($status){
        $this->db->select('*');
        $this->db->from('car_crashes');
        $this->db->order_by('id','DESC');
        $this->db->where('crashe_status',$status);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->car_id_fk][$row->crashe_num][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function insert(){
        for($x = 0 ; $x < $this->input->post('count') ; $x++){
            $data['crashe_num']=$this->input->post('crashe_num');
            $data['car_id_fk']=$this->input->post('car_id_fk');
            $data['crashe_name']=$this->input->post('crashe_name'.$x.'');
            $data['crashe_status']=$this->input->post('crashe_status'.$x.'');
            $data['notes']=$this->input->post('notes'.$x.'');
            $data['date'] = strtotime(date("Y/m/d"));
            $data['date_s']=time();
            $data['publisher']=$_SESSION['user_id'];
            $this->db->insert('car_crashes',$data);
        }
    }
    
    public function getById($id){
        $h = $this->db->get_where('car_crashes', array('id'=>$id));
        return $h->row_array();
    }
    
    public function update($id){
        $update = array(
            'car_id_fk'=>$this->input->post('car_id_fk'),
            'crashe_name'=>$this->input->post('crashe_name_old'),
            'crashe_status'=>$this->input->post('crashe_status_old'),
            'notes'=>$this->input->post('notes_old'),
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
            'publisher' => $_SESSION['user_id']
        );
        
        $this->db->where('id', $id);
        if($this->db->update('car_crashes',$update)) {
            if($this->input->post('count') != '')
                $this->insert();
        }
    }
    
    public function update_status($status,$id){
        $update = array(
            'crashe_status'=>$status
        );
        
        $this->db->where('id', $id);
        $this->db->update('car_crashes',$update);
    }
}