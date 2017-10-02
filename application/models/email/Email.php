<?php
class Email extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function insert($type){
        $users = $this->Email->select_users();
        $to = '';
        $count = 0;
        
        if($type == 'forward')
            $data['forward'] = 1;
        if($type == 'reply')
            $data['reply'] = 1;
        
        if(isset($_FILES['files']['name'][0]) && $_FILES['files']['name'][0] != '')
            $data['file_attached']=1;
        
        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['email_from']=$_SESSION['user_id'];
        foreach($this->input->post('email_to') as $key=>$value){
            $to .= $users[$value]->user_name;
            if($count < count($this->input->post('email_to'))-1)
                $to .= ' , ';
            $count++;
        }
        $data['email_to'] = $to;
        $data['sent'] = 1;
        $data['readed'] = 1;
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('emails',$data);
        
        $email_id = $this->db->insert_id();
        
        foreach($this->input->post('email_to') as $key=>$value){
            $data['sent'] = 0;
            $data['readed'] = 0;
            $data['email_to'] = $value;
            $data['email_id'] = $email_id;
            $this->db->insert('emails',$data);
        }
        
        return $email_id;
    }
    
    public function insert_files($file,$email_id){
        $data['email_id'] = $email_id;
        $data['file_name'] = $file;
        $this->db->insert('email_files',$data);
    }
    
    public function select_users(){
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->user_id] = $row;
            }
            return $data;
        }
        return false;
    }

    public function fetch_users(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('role_id_fk','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                if($_SESSION['role_id_fk'] == 1){
                    if($row->administration_id == 1)
                        $data[$row->role_id_fk][$row->administration_id][] = $row;
                    else{
                        if($row->role_id_fk == 2){
                            $data[$row->role_id_fk][$row->administration_id][] = $row;
                            
                            $this->db->select('*');
                            $this->db->from('users');
                            $this->db->where(array('administration_id'=>$row->administration_id,'role_id_fk'=>3));
                            $query2 = $this->db->get();
                            if ($query2->num_rows() > 0) {
                                foreach ($query2->result() as $row2) {
                                    $data[$row->role_id_fk][$row->administration_id][] = $row2;
                                }
                            }
                        }
                    }
                }
                if($_SESSION['role_id_fk'] == 2){
                    if($row->administration_id == 1)
                        $data[$row->role_id_fk][$row->administration_id][] = $row;
                    else{
                        if($row->role_id_fk == 2 && $_SESSION['administration_id'] == $row->administration_id){
                            $data[$row->role_id_fk][$row->administration_id][] = $row;
                            
                            $this->db->select('*');
                            $this->db->from('users');
                            $this->db->where(array('administration_id'=>$row->administration_id,'role_id_fk'=>3));
                            $query2 = $this->db->get();
                            if ($query2->num_rows() > 0) {
                                foreach ($query2->result() as $row2) {
                                    $data[$row->role_id_fk][$row->administration_id][] = $row2;
                                }
                            }
                        }
                        elseif($row->role_id_fk == 2 && $_SESSION['administration_id'] != $row->administration_id){
                            $data[$row->role_id_fk][$row->administration_id][] = $row;
                        }
                    }
                }
                if($_SESSION['role_id_fk'] == 3){
                    if($row->role_id_fk == 2 && $_SESSION['administration_id'] == $row->administration_id){
                        $data[$row->role_id_fk][$row->administration_id][] = $row;
                        
                        $this->db->select('*');
                        $this->db->from('users');
                        $this->db->where(array('administration_id'=>$row->administration_id,'role_id_fk'=>3));
                        $query2 = $this->db->get();
                        if ($query2->num_rows() > 0) {
                            foreach ($query2->result() as $row2) {
                                $data[$row->role_id_fk][$row->administration_id][] = $row2;
                            }
                        }
                    }
                }
            }
            return $data;
        }
        return false;
    }

    public function select_allDep(){
        $this->db->select('*');
        $this->db->from('department_jobs');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_dep_emps($admin_id,$id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('user_id!='=>$id,'administration_id'=>$admin_id));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_emails($starred,$deleted,$option,$sent){
        $this->db->select('*');
        $this->db->from('emails');
        if($option == 'from')
            $field = 'email_from';
        if($option == 'to')
            $field = 'email_to';
            
        $array = array($field=>$_SESSION['user_id'],'email_id!='=>null,'deleted'=>0);
        
        if($starred != '')
            $array = array('(email_from='.$_SESSION['user_id'].'OR email_to='.$_SESSION['user_id'].')','starred'=>1,'deleted'=>0);
        if($deleted != '')
            $array = array('(email_from='.$_SESSION['user_id'].'OR email_to='.$_SESSION['user_id'].')','deleted'=>1);
        if($sent != '')
            $array = array($field=>$_SESSION['user_id'],'email_id'=>null,'deleted'=>0);
            
        $this->db->where($array);
        $this->db->order_by('date_s','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function email_count(){
        $query = $this->db->query('SELECT ee.*   
                                    , (SELECT COUNT(*) FROM emails WHERE emails.email_to = '.$_SESSION['user_id'].' AND emails.deleted = 0  AND emails.readed = 0) AS to_me
                                    , (SELECT COUNT(*) FROM emails WHERE emails.email_from = '.$_SESSION['user_id'].' AND emails.sent = 1 AND emails.deleted = 0 AND emails.readed = 0) AS sent
                                    , (SELECT COUNT(*) FROM emails WHERE (emails.email_from='.$_SESSION['user_id'].' OR emails.email_to='.$_SESSION['user_id'].') AND emails.deleted = 1 AND emails.readed = 0) AS deleted
                                    , (SELECT COUNT(*) FROM emails WHERE (emails.email_from='.$_SESSION['user_id'].' OR emails.email_to='.$_SESSION['user_id'].') AND emails.starred = 1 AND emails.deleted = 0 AND emails.readed = 0) AS starred
                                    FROM emails ee');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function getById($id){
        $h = $this->db->get_where('emails', array('id'=>$id));
        return $h->row_array();
    }
    
    public function files($id){
        $this->db->select('*');
        $this->db->from('email_files');
        $array = array('email_id'=>$id);
        $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    
}