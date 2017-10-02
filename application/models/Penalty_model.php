<?php

class Penalty_model extends CI_Model
{

    public function select()
    {
        $this->db->select('*');
        $this->db->from('penalty');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function chek_Null($post_value)
    {
        if ($post_value == '' || $post_value == null || (!isset($post_value))) {
            $val = '';
            return $val;
        } else {
            return $post_value;
        }
    }

    //=======================================================================

    public function insert()
    {
        $data['emp_id'] = $this->chek_Null($this->input->post('emp_id'));
        $data['penalty_type'] = $this->chek_Null($this->input->post('penalty_type'));
        $data['value'] = $this->chek_Null($this->input->post('value'));
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['date'] = strtotime($this->input->post('date'));
        $data['date_s'] = time();

        $this->db->insert('penalty', $data);
    }

    //=======================================================================
    public function update($id)
    {
        $data['penalty_type'] = $this->chek_Null($this->input->post('penalty_type'));
        $data['value'] = $this->chek_Null($this->input->post('value'));
        $data['date'] = strtotime($this->input->post('date'));
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['date_s'] = time();
        $this->db->where('id', $id);
        $this->db->update('penalty', $data);
    }

    public function getById($id)
    {
        $h = $this->db->get_where('employees', array('emp_code' => $id));
        return $h->row_array();
    }

    public function getById_emp($id)
    {
        $h = $this->db->get_where('employees', array('emp_code' => $id));
        return $h->row_array();
    }

    public function select_emp_name()
    {
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `employees` WHERE `emp_code`=' . $row->emp_code);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->emp_code] = $arr;
            }
            return $data;
        }
        return false;
    }


    public function get_department_name()
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


    public function select_sub_depart()
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


    public function approved($id,$type)
    {
        $data['suspend'] = $type;
        $data['reason'] = $this->chek_Null($this->input->post('reason'));
        $this->db->where('id', $id);
        $this->db->update('penalty', $data);
    }
}

