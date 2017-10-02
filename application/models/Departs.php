<?php

class Departs extends CI_Model
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
        $data['main_dep_name'] = $this->input->post('name');

            $data['date'] = strtotime(date("m/d/Y"));
            $data['date_s']=time();
            $date['publisher'] =$_SESSION['user_id'];
            $date['type'] =0;
            $date['suspend'] =0;

        $this->db->insert('departments',$data);
        }

    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('type',0);
        $this->db->where('deleted',1);
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
            $this->db->where('type',0);
            $this->db->where('deleted',1);
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
                            'main_dep_name'=>$this->input->post('name') ,
                            'type'=>0,
                            'suspend'=>0,
                        );
                        $this->db->where('id', $id);
                        if($this->db->update('departments',$update)) {
                            return true;
                        }else{
                            return false;
                        }
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
//-------------------------------------------------------------------
 public function select_all_of_main($id){
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('id',$id);
        $this->db->order_by('id','DESC');

        $query = $this->db->get();
        if($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
              $query2 =$this->db->query('SELECT * FROM `departments` WHERE `depart_from_id_fk` = '.$row->id);
                //--------
                 if($query2->num_rows() > 0) {
                 $arr=array();
                 foreach ($query2->result() as  $row2) {
                    //---------------------
                    $query3 =$this->db->query('SELECT * FROM `departments` WHERE `depart_from_id_fk` = '.$row2->id);
                    $sub_sub_data=array();
                    if($query3->num_rows() > 0) {

                    foreach($query3->result() as  $row3){
                       $sub_sub_data[$row3->id]=$row3->name;
                     }// end for 3
                     }// end if 3
                    //---------------------
                    $arr[$row2->id]=$sub_sub_data;
                  }  // end for 2
                 }// end if 2
                //--------
                $arr=$arr;
         }
            return $arr;
        }// end if 1
        return false;
    }
//----------------------------------------------------------------------------------------------------------
public function select_id(){
       $this->db->select('*');
        $this->db->from('departments');
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

    ////////////////////////////////////////////////dep name


    public function select_dep_name_web(){
        $this->db->select('*');
        $this->db->from('departments');
        //$this->db->where('depart_from_id_fk', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `departments` WHERE `id`='.$row->id);
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



}//END CLASS