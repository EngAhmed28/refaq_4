<?php
class Users_constriction extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function userename_exists($username){
        $this->db->select('*'); 
        $this->db->from('users');
        $this->db->where('user_name', $username);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function select() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('user_id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_dep($code){
        $this->db->select('*');
        $this->db->from('department_jobs');
        if($code == 1)
            $this->db->where(array('from_id_fk' => $code, 'status' => 1));
        elseif ($code == 2) 
            $this->db->where(array('from_id_fk!=' => 1, 'status' => 1));
        else
            $this->db->where(array('from_id_fk!=' => 0, 'status' => 0));
        $query = $this->db->get();
         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_emp($code){
        $query =  $this->db->query('SELECT employees.*
                                    FROM employees
                                    LEFT JOIN users ON users.emp_code = employees.id
                                    WHERE users.emp_code IS NULL AND employees.department = '.$code.'');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_allEmp(){
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }

    public function insert($file){
        $password=$this->input->post('user_pass',true);
        $password=sha1(md5($password));
        $data=array(
            "user_name"=>$this->input->post('user_name'),
            "user_username"=>$this->input->post('user_username'),
            "emp_code"=>$this->input->post('emp_code'),
            "user_pass"=>$password,
            "user_email"=>$this->input->post('user_email'),
            "role_id_fk"=>$this->input->post('role_id_fk'),
            "user_phone"=>$this->input->post('user_phone'),
            "dep_job_id_fk"=>$this->input->post('dep_job_id_fk'),
            "administration_id"=>$this->input->post('administration_id'.$this->input->post('emp_code').''),
            "user_photo"=>$file
        );
        $done=$this->db->insert('users',$data);
        if($done==1){
            return true;
        }else{
            return false;
        }
    }

    public function display($id){
        $this->db->where('user_id',$id);
        $query=$this->db->get('users');
        return $query->row_array();
    }

    public function update($id,$user_photo){
        $data=array(
            'user_name'=>$this->input->post('user_name'),
            'user_username'=>$this->input->post('user_username'),
            "emp_code"=>$this->input->post('emp_code'),
            'user_email'=>$this->input->post('user_email'),
            "role_id_fk"=>$this->input->post('role_id_fk'),
            "dep_job_id_fk"=>$this->input->post('dep_job_id_fk'),
            "administration_id"=>$this->input->post('administration_id'.$this->input->post('emp_code').''),
            'user_phone'=>$this->input->post('user_phone')
        );
        if($user_photo !=''){
            $data['user_photo']=$user_photo;
        }
        $password=$this->input->post('user_pass',true);
        if($password !=''){
            $data['user_pass']=sha1(md5($password));
        }
        $this->db->where('user_id',$id);
        $update= $this->db->update('users',$data);
        if($update==1){
           return true;
        }
        return false;
    }

    public function delete($id){
        $this->db->where('user_id',$id);
        $this->db->delete('users');
    }
    
}