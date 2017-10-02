<?php
class Attendance extends CI_Model
{
    public function __construct() {

        parent::__construct();

    }

    public function get_emps()
    {
        $query = $this->db->query('SELECT employees.* FROM `employees` 
                                   LEFT JOIN emp_attendance ON emp_attendance.date='.strtotime(date('d-m-Y')).' 
                                   AND emp_attendance.emp_id = employees.id
                                   WHERE emp_attendance.emp_id IS NULL');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select(){
        $this->db->select('emp_attendance.*, employees.employee');
        $this->db->from('emp_attendance');
        $this->db->join('employees','employees.id = emp_attendance.emp_id');
        $this->db->where('emp_attendance.date',strtotime(date('d-m-Y')));
        $this->db->order_by('emp_attendance.emp_id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_all(){
        $this->db->select('emp_attendance.*, employees.employee');
        $this->db->from('emp_attendance');
        $this->db->join('employees','employees.id = emp_attendance.emp_id');
        $this->db->order_by('emp_attendance.emp_id, emp_attendance.date','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public  function insert(){
        $data['emp_id']=$this->input->post('emp_id');
        $data['date']=strtotime(date("d-m-Y"));
        $data['presence']=date('H:i:s',time());
        $data['dissuasion']='';
        $data['diff']='';
        
        $this->db->insert('emp_attendance',$data);
    }
    
    public  function insert_file($file){
        $firstline = true;
        
        while (($emapData = fgetcsv($file, 1000, ";")) !== FALSE){ 
            if($firstline == true){ 
                $firstline = false; 
                continue; 
            }
                        
            $date = $emapData[2];
            $date = str_replace('/', '-', $date);
            $I['date'] = strtotime($date);
            $I['emp_id']   =$emapData[0];
            
            if($emapData[6])
                $I['presence']= $emapData[6].':00';
            else
                $I['presence']= $emapData[6];
            if($emapData[7])
                $I['dissuasion']  =$emapData[7].':00';
            else
                $I['dissuasion']  =$emapData[7];
                    
            if($I['presence'] && $I['dissuasion'])
                $I['diff']  = $this->get_time_difference($I['presence'], $I['dissuasion']);
            else
                $I['diff'] = $emapData[12];
                    
            $query = $this->db->query('SELECT emp_attendance.* FROM `emp_attendance` 
                                       WHERE emp_attendance.date='.strtotime($date).' AND emp_attendance.emp_id='.$I['emp_id'].'');
            $result = $query->row_array();
            if($query->num_rows() > 0){
                $this->db->where('id', $I['emp_id']);
                $this->db->update('emp_attendance',$I);
            }
            else
                $this->db->insert('emp_attendance',$I);
                    
        }
        fclose($file);
    }
    
    public function get_time_difference($time1, $time2)
    {
        $time1 = strtotime("1/1/1980 $time1");
        $time2 = strtotime("1/1/1980 $time2");
    
        if ($time2 < $time1)
            $time2 = $time2 + 86400;
    
        return date("H:i:s", strtotime("1980-01-01 00:00:00") + ($time2 - $time1));
    }
    
    public function update($id){
        $h = $this->db->get_where('emp_attendance', array('id'=>$id));
        $result = $h->row_array();
        
        $update['dissuasion']=date('H:i:s',time());
        $update['diff']=$this->get_time_difference($result['presence'], $update['dissuasion']);
        
        $this->db->where('id', $id);
        $this->db->update('emp_attendance',$update);
    }
    
    public function select_emp(){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function R_period_attendance($from, $to, $id){
        $this->db->select('emp_attendance.*, employees.employee');
        $this->db->from('emp_attendance');
        $this->db->join('employees','employees.id = emp_attendance.emp_id');
        $array = array('emp_attendance.date >='=>$from,'emp_attendance.date <='=>$to,'emp_attendance.emp_id'=>$id);
        $this->db->where($array);
        $this->db->order_by('emp_attendance.date','ASC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    
}

