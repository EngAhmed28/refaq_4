<?php

class Administrative_affairs_setting extends CI_Model
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


      public  function  insert(){
         $data['set_name']=$this->chek_Null( $this->input->post('set_name'));
           $data['ozon_num']=$this->chek_Null( $this->input->post('ozon_num'));
        $data['ozon_num_extra']=$this->chek_Null( $this->input->post('ozon_num_extra'));
        $data['holiday_num']=$this->chek_Null( $this->input->post('holiday_num'));
        $this->db->insert('administrative_affairs_settings',$data);
    }
    //===========================================================
        public  function  update($id){
           $data['set_name']=$this->chek_Null( $this->input->post('set_name'));
           $data['ozon_num']=$this->chek_Null( $this->input->post('ozon_num'));
        $data['ozon_num_extra']=$this->chek_Null( $this->input->post('ozon_num_extra'));
        $data['holiday_num']=$this->chek_Null( $this->input->post('holiday_num'));
        $this->db->where('id', $id);
        $this->db->update('administrative_affairs_settings',$data);
    }
     public function select_all($table,$grouby,$limit,$order_by,$order_by_desc_asc){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->group_by($grouby);
        $this->db->order_by($order_by,$order_by_desc_asc);
        $this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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
          public function select_search_key_2($table,$search_key_1,$search_key_value_1,$search_key_2,$search_key_value_2){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($search_key_1,$search_key_value_1);    
        $this->db->where($search_key_2,$search_key_value_2);  
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    
    
    
    
     public function delete($table,$Conditions_arr){
       foreach($Conditions_arr as $key=>$value){
        $this->db->where($key,$Conditions_arr[$key]);    }
        $this->db->delete($table);
} 
    
/*
public function select_affairs_settings()
{
$this->db->select('*');
$this->db->from('administrative_affairs_settings');
$query = $this->db->get();
if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
        $query2 = $this->db->query('SELECT * FROM `employees` WHERE `group_affairs_id_fk`=' . $row->id);
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
*/

    public function select_affairs_setings(){
        $this->db->select('*');
        $this->db->from('administrative_affairs_settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

/*
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
        //var_dump($id);
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
*/

}

