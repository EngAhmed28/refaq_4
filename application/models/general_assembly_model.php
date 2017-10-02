<?php

class General_assembly_model extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//-----------------------------------------------------    
    public function insert(){
        $data['name'] = $this->chek_Null($this->input->post('name'));
        $data['mobile'] = $this->chek_Null($this->input->post('mobile'));
        $data['address'] = $this->chek_Null($this->input->post('address'));
        $data['email'] = $this->chek_Null($this->input->post('email'));
        $data['date_of_hiring'] = $this->chek_Null($this->input->post('date_of_hiring'));
         $this->db->insert('general_assembly_members', $data);

    }

        public function select(){

        $this->db->select('*');
        $this->db->from('about');
    
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    //------------------------------------------------------------------
      public function insert_subscription(){
          $data['date']=$this->chek_Null(strtotime($this->input->post('date')));
          $data['member_id'] = $this->chek_Null($this->input->post('member_id'));
          $data['value'] = $this->chek_Null($this->input->post('value'));
          $data['month'] = $this->chek_Null(date('m', $data['date']));
          $this->db->insert('general_assembly_subscription', $data);


    }
    //-----------------------------------------------------    

    public function  get_data(){
        $this->db->select('*');
        $this->db->from('general_assembly_members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `general_assembly_members` WHERE `id`='.$row->id );
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
    //==========================================================================
    public function select_by_month(){
        $this->db->select('*');
        $this->db->from('general_assembly_subscription');
        $this->db->where('month',date('m'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    //=====================================================
    public function select_all(){
        $this->db->select('*');
        $this->db->from('general_assembly_subscription');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `general_assembly_subscription` WHERE `member_id`='.$row->member_id );
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->member_id]=$arr;
            }
            return $data;
        }
        return false;
    }

    public function select_previous_months(){
        $this->db->select('*');
        $this->db->from('general_assembly_subscription');
        $this->db->where('month !=',date('m'));
        $this->db->group_by('member_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


}//END CLASS