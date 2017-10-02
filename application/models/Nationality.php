<?php

class Nationality extends CI_Model
{

    public function select(){
        $this->db->select('*');
        $this->db->from('nationality');
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



}

