<?php
class Reports extends CI_Model
{

    public function __construct() {

        parent::__construct();

    }

    public function select($date_from,$date_to,$process){
        $this->db->select('*');
        $this->db->from('all_deports');
        if($process != 'all' && $date_from != '' && $date_to != '')
            $array = array('date >= '=>$date_from,'date <='=>$date_to,'process'=>$process);
        elseif($process == 'all' && $date_from != '' && $date_to != '')
            $array = array('date >= '=>$date_from,'date <='=>$date_to);
        elseif($process == 'all' && $date_from == '' && $date_to == '')
            $array = array('date'=>strtotime(date("Y-m-d")));
        $this->db->where($array);
        $this->db->order_by('pill_num','date','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->date][$row->pill_num][] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function accounts_group(){
        $this->db->select('*');
        $this->db->from('accounts_group');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->code]= $row;
            }
            return $data;
        }
        return false;
    }
    /*
    public function build_child($parent){
        $query = $this->db->query('select * from accounts_group where from_id = '.$parent.'');
        $result = $query->result();
        $roles = array();
        $value = 0;  
        $value2 = 0;    
         
        foreach($result as $key => $val){
            if($result[$key]->from_id == $parent){
         
                
                $query2 = $this->db->query('select SUM(last_value) AS value from accounts_group where from_id = '.$result[$key]->id.'');
                $result2 = $query2->result();
                
                $query = $this->db->query('select SUM(p_cost) AS madeen from all_deports where madeen = '.$result[$key]->code.'');
                $madeen_result = $query->result();
                $query = $this->db->query('select SUM(p_cost) AS dayen from all_deports where dayen = '.$result[$key]->code.'');
                $dayen_result = $query->result();
                if($result[$key]->account_type == 1){
                    $value = $madeen_result[0]->madeen - $dayen_result[0]->dayen;}
                elseif($result[$key]->account_type == 2){
                    $value = $dayen_result[0]->dayen - $madeen_result[0]->madeen;}
                $value2 += $result[$key]->last_value + $value;
                
                $role = array();
                $role['id'] = $result[$key]->id;
                $role['last_value'] = $result[$key]->last_value + $value;
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
    
                $children = $this->build_child($result[$key]->id);
                
                if( !empty($children[0]) ){ 
                    $role['value'] =  $children[1];
                    $role['children'] = $children[0];
                }
                    
                $roles[] = $role;
            }
        }
        return array($roles,$value2);
    }
    
     public function tree(){
        $roles = array();
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->order_by('from_id', 'ASC');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
               
            foreach($result as $key=>$value)
            {
                $role = array();
                $role['id'] = $result[$key]->id;
                $role['last_value'] = $result[$key]->last_value;
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
        
                $children = $this->build_child($result[$key]->id);              
        
  
        
        
                if( !empty($children[0]) ){
                    $query2 = $this->db->query('select SUM(last_value) AS value from accounts_group where from_id = '.$result[$key]->id.'');
                    $result2 = $query2->result();
                    $role['value'] = $result2[0]->value;
                    $role['children'] = $children[0];
                }
        
                $roles[] = $role;                   
            }       
        return $roles;
        }
        return false;
    }
    */
    
        
    public function build_child($parent){
        $query = $this->db->query('select * from accounts_group where from_id = '.$parent.'');
        $result = $query->result();
        $roles = array();
        $value = 0;  
        $value2 = 0;    
         
        foreach($result as $key => $val){
            $role = array();
            
            if($result[$key]->from_id == $parent){
                $query2 = $this->db->query('select SUM(last_value) AS value from accounts_group where from_id = '.$result[$key]->id.'');
                $result2 = $query2->result();
                
                $query = $this->db->query('select SUM(p_cost) AS madeen from all_deports where madeen = '.$result[$key]->code.'');
                $madeen_result = $query->result();
                $query = $this->db->query('select SUM(p_cost) AS dayen from all_deports where dayen = '.$result[$key]->code.'');
                $dayen_result = $query->result();
                if($result[$key]->account_type == 1){
                    $value = $madeen_result[0]->madeen - $dayen_result[0]->dayen;
                    $role['madeen'] = $result[$key]->last_value + $madeen_result[0]->madeen;
                    $role['dayen'] = $dayen_result[0]->dayen;
                }
                elseif($result[$key]->account_type == 2){
                    $value = $dayen_result[0]->dayen - $madeen_result[0]->madeen;
                    $role['madeen'] = $madeen_result[0]->madeen;
                    $role['dayen'] = $result[$key]->last_value + $dayen_result[0]->dayen;
                }
                $value2 += $result[$key]->last_value + $value;
                
                $role['id'] = $result[$key]->id;
                $role['last_value'] = $result[$key]->last_value + $value;
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
    
                $children = $this->build_child($result[$key]->id);
                
                if( !empty($children[0]) ){ 
                    $role['value'] =  $children[1];
                    $role['children'] = $children[0];
                }
                    
                $roles[] = $role;
            }
        }
        return array($roles,$value2);
    }
    
    
             public function tree_test(){
        $roles = array();
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->order_by('from_id', 'ASC');
        $this->db->where('have_branch',2);
       // $this->db->where("type",3)->or_where("type",4);
     
          
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach($result as $key=>$value)
            {
                $role = array();
                $role['id'] = $result[$key]->id;
                $role['last_value'] = $result[$key]->last_value;
                $role['account_type'] = $result[$key]->account_type;
             
                
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
                $role['madeen'] = $result[$key]->last_value_madeen;
                $role['dayen'] = $result[$key]->last_value_dayen;
        
                $children = $this->build_child($result[$key]->id);              
        
                if( !empty($children[0]) ){
                    $query2 = $this->db->query('select SUM(last_value) AS value from accounts_group where from_id = '.$result[$key]->id.'');
                    $result2 = $query2->result();
                    $role['value'] = $result2[0]->value;
                    $role['children'] = $children[0];
                }
        
                $roles[] = $role;                   
            }       
        return $roles;
        }
        return false;
    }
    
    
    
    
    /*************************/
         public function tree_D(){
        $roles = array();
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->order_by('from_id', 'ASC');
        $this->db->where('from_id',0);
        $this->db->where("type",3)->or_where("type",4);
     
          
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach($result as $key=>$value)
            {
                $role = array();
                $role['id'] = $result[$key]->id;
                $role['last_value'] = $result[$key]->last_value;
                $role['account_type'] = $result[$key]->account_type;
             
                
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
                $role['madeen'] = $result[$key]->last_value_madeen;
                $role['dayen'] = $result[$key]->last_value_dayen;
        
                $children = $this->build_child($result[$key]->id);              
        
                if( !empty($children[0]) ){
                    $query2 = $this->db->query('select SUM(last_value) AS value from accounts_group where from_id = '.$result[$key]->id.'');
                    $result2 = $query2->result();
                    $role['value'] = $result2[0]->value;
                    $role['children'] = $children[0];
                }
        
                $roles[] = $role;                   
            }       
        return $roles;
        }
        return false;
    }
    
    
    
    
    
    /*****************************/
     public function tree(){
        $roles = array();
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->order_by('from_id', 'ASC');
        $this->db->where('from_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach($result as $key=>$value)
            {
                $role = array();
                $role['id'] = $result[$key]->id;
                $role['last_value'] = $result[$key]->last_value;
                $role['code'] = $result[$key]->code;
                $role['name'] = $result[$key]->name;
                $role['madeen'] = $result[$key]->last_value_madeen;
                $role['dayen'] = $result[$key]->last_value_dayen;
        
                $children = $this->build_child($result[$key]->id);              
        
                if( !empty($children[0]) ){
                    $query2 = $this->db->query('select SUM(last_value) AS value from accounts_group where from_id = '.$result[$key]->id.'');
                    $result2 = $query2->result();
                    $role['value'] = $result2[0]->value;
                    $role['children'] = $children[0];
                }
        
                $roles[] = $role;                   
            }       
        return $roles;
        }
        return false;
    }
    
    public function select_where($id)
    {
        $this->db->select('*');
        $this->db->from('accounts_group');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function select_account($code){
        $this->db->select('*');
        $this->db->from('all_deports');
        $this->db->order_by('date', 'ASC');
        $this->db->where('(madeen='.$code.')OR(dayen='.$code.')');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
            return $data;
        }
        return false;
    }
    
    public function R_emp($type,$main_dep_f_id){
        $this->db->select('*');
        $this->db->from('departments');
        if($main_dep_f_id != '')
            $array = array('main_dep_f_id'=>$main_dep_f_id,'type'=>$type);
        else
            $array = array('type'=>$type);
        $this->db->order_by('id', 'ASC');
        $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
            return $data;
        }
        return false;
    }
    
    public function emp($dep){
        $this->db->select('*');
        $this->db->from('employees');
        if($dep != '')
            $array = array('sub_dep_f_id'=>$dep);
        else
            $array = array();
        $this->db->order_by('id', 'ASC');
        $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
            return $data;
        }
        return false;
    }
    
    public function vacation($date_from,$date_to){
        $this->db->select('vacations.*,employees.emp_name');
        $this->db->join('employees','employees.id=vacations.emp_id','left');
        $array = array('approved'=>1,'from_date >='=>$date_from,'from_date <='=>$date_to);
        $this->db->order_by('id', 'ASC');
        $this->db->where($array);
        $query = $this->db->get('vacations');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
            return $data;
        }
        return false;
    }
    
    public function emp_vacation($emp_id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $array = array('approved'=>1,'emp_id'=>$emp_id);
        $this->db->order_by('id', 'ASC');
        $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
            return $data;
        }
        return false;
    }
    
    public function debt($date_from,$date_to){
        $this->db->select('on_account.*,employees.emp_name');
        $this->db->join('employees','employees.id=on_account.emp_id','left');
        $array = array('approved'=>1,'from_date >='=>$date_from,'from_date <='=>$date_to);
        $this->db->order_by('id', 'ASC');
        $this->db->where($array);
        $query = $this->db->get('on_account');
        //var_dump($query);die;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->emp_id][]= $row;
            }
            //var_dump($data);die;
            return $data;
        }
        return false;
    }

}

?>