<?php

class Subdepart extends CI_Model
{

    public function __construct()
    {
        parent:: __construct();

    }

    public  function record_count(){
        return $this->db->count_all("departments");

    }

    public  function  insert()
        {


            $data['sub_dep_name'] = $this->input->post('name');
            $data['main_dep_f_id'] = $this->input->post('depart_from_id_fk') ;
            $data['date'] = strtotime(date("m/d/Y"));
            $data['date_s']=time();
            $data['publisher'] =$_SESSION['user_id'];
            $data['suspend'] =0;



        $this->db->insert('departments',$data);
        }

    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('main_dep_f_id !=',0);
        $this->db->order_by('id','DESC');
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
    /////////////////

        public function select_all(){
        $this->db->select('*');
        $this->db->from('departments');
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
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('departments');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('departments', array('id'=>$id));
        return $h->row_array();
    }




    public function update($id){

                $update = array(
                            'sub_dep_name'=>$this->input->post('name') ,
                           'main_dep_f_id'=>$this->input->post('depart_from_id_fk')

                        );


                        $this->db->where('id', $id);
                        if($this->db->update('departments',$update)) {
                            return true;
                        }else{
                            return false;
                        }
    }


        public function select_blood(){
        $this->db->select('*');
        $this->db->from('blood_types');
        $this->db->order_by('id','ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function suspend($id,$clas)
    {
        if($clas == 'danger')
        {
            $update = array(
                'suspend' => 1
            );
        }
        else
        {
            $update = array(
                'suspend' => 0
            );
        }

        $this->db->where('id', $id);
        if($this->db->update('departments',$update)) {
            return true;
        }else{
            return false;
        }
    }




}