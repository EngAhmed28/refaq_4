<?php

class Report extends CI_Model

{

    public function __construct() {

        parent::__construct();

}

 //===============================================
    public function select_all(){

      //  echo date('m', strtotime(date("m/d/Y")));
         $monthss =     date('m', strtotime(date("m/d/Y")));
        $this->db->select('*');
        $this->db->from('permits');
        $this->db->where('month',$monthss);
        $this->db->group_by('date');
        $this->db->order_by('date','desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //===============================================
    public function select_date($type){
        $this->db->select('*');
        $this->db->from('permits');
        $this->db->where('permit_status',$type);
        $this->db->order_by('date','desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `permits` WHERE  `permit_status` ='.$type.' AND `date`='.$row->date.' order by `date` desc');
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->date]=$arr;
            }
            return $data;
        }
        return false;
    }

    //=================================================
    public function select_number(){
        $this->db->select('*');
        $this->db->from('permits');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `permits` WHERE `emp_code`='.$row->emp_code.' AND `permit_status`=1');
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
    //======================================================
    public function suspend($id)
    {

        if($_POST['accept'] )
        {
            $update = array(
                'permit_status' => 1,
                'permit_manager_refuse_accept' => $_POST['reason'] ,
                'publisher_accept'=>$_SESSION['user_id']
            );
        }
        elseif($_POST['refuse'])
        {
            $update = array(
                'permit_status' => 2 ,
                'permit_manager_refuse_accept' => $_POST['reason'] ,
                'publisher_accept'=>$_SESSION['user_id']
            );
        }

        $this->db->where('id', $id);
        if($this->db->update('permits',$update)) {
            return true;
        }else{
            return false;
        }
    }

    //===================================================================
    public function select_last(){
        $this->db->select('*');
        $this->db->from('permits');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `permits` WHERE `permit_status` !=0 order by `id` desc');
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->date]=$arr;
            }
            return $data;
        }
        return false;
    }

    //====================================
   public function select_by_type($type){
       $monthss =     date('m', strtotime(date("m/d/Y")));
        $this->db->select('*');
        $this->db->from('permits');
        $this->db->where('permit_status',$type);
        $this->db->where('month',$monthss);
        $this->db->group_by('date');
        $this->db->order_by('date','desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //================================================
    public function selectall_by_type($type){
        $monthss =     date('m', strtotime(date("m/d/Y")));
        $this->db->select('*');
        $this->db->from('permits');
        $this->db->where('permit_status',$type);
        $this->db->where('month',$monthss);
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

?>