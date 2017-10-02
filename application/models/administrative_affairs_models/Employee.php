<?php

class Employee extends CI_Model
{
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    //====================================================================================

    public function select_by(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->where('id !=',9);
        $this->db->where('from_id_fk',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //=======================================================
    public function select_depart()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `from_id_fk`=' . $row->from_id_fk);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->from_id_fk] = $arr;
            }
            return $data;
        }
        return false;
    }

    //===============================================================
       public  function  insert($img_file){
        $data['emp_code']=$this->chek_Null( $this->input->post('emp_code'));
        $data['employee']=$this->chek_Null( $this->input->post('employee'));
        $data['administration']=$this->chek_Null( $this->input->post('administration'));
        $data['department']=$this->chek_Null( $this->input->post('department'));
        $data['birth_date']=$this->chek_Null( strtotime($this->input->post('birth_date')));
        $data['id_num']=$this->chek_Null( $this->input->post('id_num'));
        $data['address']=$this->chek_Null( $this->input->post('address'));
        $data['phone_num']=$this->chek_Null( $this->input->post('phone_num'));
        $data['email']=$this->chek_Null( $this->input->post('email'));
        $data['contract']=$this->chek_Null( $this->input->post('contract'));
        $data['salary']=$this->chek_Null( $this->input->post('salary'));
        $data['img']=$img_file ;
        $data['group_affairs_id_fk']=$this->chek_Null( $this->input->post('group_affairs_id_fk'));
        $data['past_days']=$this->chek_Null( $this->input->post('past_days'));         
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('employees',$data);
    }
    //===========================================================
        public  function  update($id,$img_file){
        $data['emp_code']=$this->chek_Null( $this->input->post('emp_code'));
        $data['employee']=$this->chek_Null( $this->input->post('employee'));
        $data['administration']=$this->chek_Null( $this->input->post('administration'));
        $data['department']=$this->chek_Null( $this->input->post('department'));
        $data['birth_date']=$this->chek_Null( strtotime($this->input->post('birth_date')));
        $data['id_num']=$this->chek_Null( $this->input->post('id_num'));
        $data['address']=$this->chek_Null( $this->input->post('address'));
        $data['phone_num']=$this->chek_Null( $this->input->post('phone_num'));
        $data['email']=$this->chek_Null( $this->input->post('email'));
        $data['contract']=$this->chek_Null( $this->input->post('contract'));
        $data['salary']=$this->chek_Null( $this->input->post('salary'));
        $data['img']=$img_file ;
        $data['group_affairs_id_fk']=$this->chek_Null( $this->input->post('group_affairs_id_fk'));
        $data['past_days']=$this->chek_Null( $this->input->post('past_days')); 
        $this->db->where('id', $id);
        $this->db->update('employees',$data);
    }
    //====================================================================================
      public function select_employ_(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `emp_code`='.$row->emp_code);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->emp_code]=$arr;
            }
            return $data;
        }
        return false;
    }
    //============================================================
     public function select_depart_name()
    {
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `id`=' . $row->id);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->id] = $arr;
            }
            return $data;
        }
        return false;
    }

    //================================================ start========================
    public function select_depart_sub(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `emp_code`='.$row->emp_code);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->emp_code]=$arr;
            }
            return $data;
        }
        return false;
    }

    //======================================================start2
    public function select_employ_name(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `id`='.$row->id);
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
    //===========================================================================
    public function select_employ_by_dep(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `employees` WHERE `administration`='.$row->administration);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->administration]=$arr;
            }
            return $data;
        }
        return false;
    }
        //=================================up

    public function select_emp_assigned($dep,$id){
       // var_dump($id);
      //  die;
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('administration',$dep);
        $this->db->where('id !=',$id);
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

