<?php

class Job_titles extends CI_Model
{

    public function select(){
        $this->db->select('*');
        $this->db->from('job_titles');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }




    //=======================================================================

 //========================================================start===============

    public function select_employ_job(){
        $this->db->select('*');
        $this->db->from('job_titles');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `job_titles` WHERE `id`='.$row->id);
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

}

