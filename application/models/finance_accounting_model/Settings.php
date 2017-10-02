<?php
class Settings extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }

    ////////////////////////////////////////////////////11-4-2017///////////////////////////////

    public function select_($id)
    {
        $this->db->select('*');
        $this->db->from('settings');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }

    //============================================================================
    public function select_box($tb, $code)
    {
        $this->db->select('*');
        $this->db->from($tb);
        $this->db->where('code', $code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }


    //================================================================
    public function select_acc($code)
    {
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->where('code', $code);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }

    //=====================================================
    public function select_query()
    {
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->where('from_id', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }

    //===============================================vip
    public function select_all_acc()
    {
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `accounts_group` WHERE `from_id`=' . $row->from_id);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->from_id] = $arr;

            }
            return $data;
        }
        return false;
    }

    //====================================================================
    public function query_code()
    {
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `accounts_group` WHERE `code`=' . $row->code);
                $arr = array();
                foreach ($query2->result() as $row2) {
                    $arr[] = $row2;
                }
                $data[$row->code] = $arr;

            }
            return $data;
        }
        return false;
    }


    //=====================================================

    public function getbyid()
    {
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 = $this->db->query('SELECT * FROM `accounts_group` WHERE `id`=' . $row->id);
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

    //=====================================
    
 public function setting_id($id){
       $h = $this->db->get_where('settings', array('id'=>$id));
         $arr_setting=$h->row_array();
      $p=$this->db->get_where('accounts_group', array('code'=>$arr_setting['code']));
         $arr_acount=$p->row_array();
       return $arr_acount['id'];
 }//
//================================================
public function get_form_id($form_id){
       $this->db->select('*');
        $this->db->from('accounts_group');
         $this->db->where('from_id', $form_id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
    $data[]=$row;
    }
    return $data;
    }
    return false;
}



}

