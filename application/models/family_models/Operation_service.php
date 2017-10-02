<?php

class Operation_service extends CI_Model
{
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    public  function  insert($process,$mother_national_num,$order_id){
            $data['mother_national_num_fk'] = $this->chek_Null($mother_national_num);
            $data['order_id_fk'] =$this->chek_Null($order_id );
            $data['service_file_from'] = $this->chek_Null($_SESSION['role_id_fk']);
            $data['service_file_to'] =$this->chek_Null($this->input->post('service_file_to'));
            $data['process'] = $this->chek_Null($process);
            $data['reason'] = $this->chek_Null($this->input->post('reason'));
            $data['date'] = strtotime(date("Y/m/d"));
            $data['publisher'] = $_SESSION['user_id'];
            $data['date_s']=time();
            $this->db->insert('operation_service',$data);
             $v['approved'] = $this->chek_Null($process);
             $this->db->where('id', $order_id);
             $this->db->update('all_services_orders',$v);

    }

    //===============================================

    public function select_last_operation(){
        $this->db->select('*');
        $this->db->from('operation_service');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `operation_service` WHERE `order_id_fk`='.$row->order_id_fk.' order by id desc limit 1' );
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->order_id_fk]=$arr;
            }
            return $data;
        }
        return false;
    }
    //=====================================================
    public function get_job_name(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `department_jobs` WHERE `id`='.$row->id );
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->id]=$arr;
            }
            return $data;
        }
        return false;
    }
    //===================================================================

    public function select_all_operations(){
        $this->db->select('*');
        $this->db->from('operation_service');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `operation_service` WHERE `order_id_fk`='.$row->order_id_fk );
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->order_id_fk]=$arr;
            }
            return $data;
        }
        return false;
    }
    //============================================   //22-6-2017
    public function select_all_operations_except(){
        $this->db->select('*');
        $this->db->from('operation_service');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `operation_service` WHERE `process`=4 AND `order_id_fk`='.$row->order_id_fk );
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->order_id_fk]=$arr;
            }
            return $data;
        }
        return false;
    }
    //==================================
    public function getById($id){
        $h = $this->db->get_where('all_services_orders', array('id'=>$id));
        return $h->row_array();
    }

    //==========================================================
    public function select_all(){
        $this->db->select('*');
        $this->db->from('service_setting');
        $this->db->where('main_service_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $arr=array();
            foreach ($query->result() as $row) {
                $arr[$row->id] =$row->main_service_name;
                $query2 =$this->db->query('SELECT * FROM `service_setting` WHERE `main_service_id`='.$row->id );
                foreach ($query2->result() as  $row2) {
                    $arr[$row2->id] =$row2->sub_service_name;
                }
            }
            return $arr;
        }
        return false;
    }
    //============================================
    public function select_all_certified(){
        $this->db->select('*');
        $this->db->from('operation_service');
        $this->db->where('process',4);
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


}

