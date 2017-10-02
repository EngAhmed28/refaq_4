<?php
class Deport extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
//----------------------------------------------------------------------
   public function all_sanadat($deport,$type)
    {
        $this->db->select('id,vouch_type, vouch_num,maden,receipt_date,deport,dayen, sum(value) as sum');
        $this->db->from('vouchers');
        $this->db->where('deport',$deport);    
        $this->db->where('type',$type);
        $this->db->group_by('vouch_num');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//---------------------------------------------------------------------  
 public function account_groups(){
     $this->db->select('*');
     $this->db->from('accounts_group');
     $query = $this->db->get();
    if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->code] = $row;
            }
            return $data;
        }
        return false;
 }
//----------------------------------------------------------------------
public function depotr($vouch_num,$process){
    
        $this->db->select('*');
        $this->db->where('vouch_num',$vouch_num);
        $this->db->from('vouchers');
        $query = $this->db->get();
     if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                   $I['pill_num']=$row->vouch_num;
                   $I['paid_type']=$row->vouch_type; 
                   if($row->vouch_type == 1){
                   $I['madeen']=$row->maden;
                   $I['dayen']=$row->dayen;
                   }elseif($row->vouch_type == 2 || $row->vouch_type == 3){
                    $setting_code=$this->select_(8);
                  /* $I['madeen']=$row->maden;
                   $I['dayen']=$setting_code[0]->code;    */
                   $I['madeen']=$setting_code[0]->code; 
                   $I['dayen']=$row->dayen;                
                   }
                   $I['p_cost']=$row->value;
                   $I['process']=$process;
                   $I['date']=strtotime(date("Y-m-d",time()));
                   $I['date_s']=time() ;
                   $I['publisher']=$_SESSION['user_name'];
                $this->db->insert('all_deports',$I);  
            }
              
            return true;
        }
        return false;
}



public function depotr_sarf($vouch_num,$process){
    
        $this->db->select('*');
        $this->db->where('vouch_num',$vouch_num);
        $this->db->from('vouchers');
        $query = $this->db->get();
     if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                   $I['pill_num']=$row->vouch_num;
                   $I['paid_type']=$row->vouch_type; 
                   if($row->vouch_type == 1){
                   $I['madeen']=$row->maden;
                   $I['dayen']=$row->dayen;
                   }elseif($row->vouch_type == 2 || $row->vouch_type == 3){
                    $setting_code=$this->select_(9);
                   $I['madeen']=$row->maden;
                   $I['dayen']=$setting_code[0]->code;    
                  /* $I['madeen']=$setting_code[0]->code; 
                   $I['dayen']=$row->dayen;    */            
                   }
                   $I['p_cost']=$row->value;
                   $I['process']=$process;
                   $I['date']=strtotime(date("Y-m-d",time()));
                   $I['date_s']=time() ;
                   $I['publisher']=$_SESSION['user_name'];
                $this->db->insert('all_deports',$I);  
            }
              
            return true;
        }
        return false;
}





//----------------------------------------------------------------------------
public function update_deport($vouch_num,$deport_value){
                $x['deport']=$deport_value;
                $x['deposit_date']=strtotime(date("Y-m-d",time()));
                $this->db->where('vouch_num',$vouch_num);
                $this->db->update('vouchers', $x);   
    
}
//---------------------------------------------------------------------------
public function delelte_deport($pill_num){
    
      $this->db->where('pill_num', $pill_num);
      $this->db->delete('all_deports'); 
}
//-----------------------------------------------------------------------------

public function all_deport_details($type){
    
    $this->db->select('');
        $this->db->from('vouchers');
        $this->db->where('type',$type);
        $this->db->group_by('vouch_num');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                   $query2 = $this->db->query("SELECT * FROM `vouchers` WHERE  type=".$type." AND `vouch_num`=".$row->vouch_num);
                  $sub_data=array();
                     foreach ($query2->result() as $row2) {
                        
                        $sub_data[]=$row2;
                     }
                $data[$row->vouch_num] = $sub_data;
            }
            return $data;
        }
        return false;
}
//----------------------------------------------------------------------



   public function all($type)
    {
        $this->db->select('*');
        $this->db->from('vouchers'); 
        $this->db->where('type',$type);
        $this->db->group_by('vouch_num');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
//======================================================================


public function select_($id)
    {
        $this->db->select('*');
        $this->db->from('settings');
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
//======================================================================
public function deserved_sanadat($statem){
        $this->db->select('`id`, `vouch_num`, `receipt_date`, `vouch_type`, `maden`,
                         `dayen`, `value`, `details`, `sheek_num`, `sheek_status`,
                         `accept_date`, `date_received`, `deportation_value`,
                         `deposit_date`, `deport`,`sheek_under_recived`, `sheek_under_date`, 
                         `sheek_under_date_s`, `sheek_under_publisher`, `type`, `date`, `date_s` ,sum(value) as sum');
        $this->db->from('vouchers');
        foreach($statem as $key=>$value){
        $this->db->where($key,$statem[$key]);    
        }
        $this->db->group_by('vouch_num');
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

public function insert_sheek_status($vouch_num,$vouch_type,$case,$process){
     $setting_code=$this->select_(9);
        $this->db->select('*');
        $this->db->where('vouch_num',$vouch_num);
        $this->db->where('type',$vouch_type);
        $this->db->from('vouchers');
        $query = $this->db->get();
     if ($query->num_rows() > 0) {
            foreach ($query->result() as $row):
     $I['pill_num']=$row->vouch_num;
     $I['paid_type']=$row->vouch_type; 
     $I['madeen']=$setting_code[0]->code;
    if($case ==1){
        $I['dayen']=$row->dayen; 
    }elseif($case ==2){
        $I['dayen']=$row->maden;
    }
     $I['p_cost']=$row->value;
     $I['process']=$process;
     $I['date']=strtotime(date("Y-m-d",time()));
     $I['date_s']=time() ;
     $I['publisher']=$_SESSION['user_name'];
              
  $this->db->insert('all_deports',$I);  
    endforeach;
    }// endif
      //------------------------------- 
      $x['sheek_status']=$case;
      $x['accept_date']=strtotime(date('Y-m-d',time()));
  $this->db->where('vouch_num',$vouch_num);
  $this->db->update('vouchers', $x);  
     //--------------------------------
}
//=======================================================================
public function update_vouch($vouch_num,$type,$arr_up){
            $this->db->where('vouch_num',$vouch_num);
            $this->db->where('type',$type); 
            $this->db->update('vouchers',$arr_up);   
    
}
//----------------------------------------------------------------------
public function deports_sheeks($vouch_num,$process,$madeen,$dayen,$arr_vouch){
     
     
     $I['pill_num']=$vouch_num;
     $I['paid_type']=$arr_vouch[0]->vouch_type; 
     $I['madeen']=$madeen;
     $I['dayen']=$dayen;
     $I['p_cost']=$arr_vouch[0]->sum;
     $I['process']=$process;
     $I['date']=strtotime(date("Y-m-d",time()));
     $I['date_s']=time() ;
     $I['publisher']=$_SESSION['user_name'];
              
  $this->db->insert('all_deports',$I);  
    
     //------------------------------- 
      $x['deport']=2;
  $this->db->where('vouch_num',$vouch_num);
  $this->db->update('vouchers', $x);  
     //--------------------------------
    
}












//------------- 29-5-2017 ---------------------------------------------------------

public function accept_refuse_sheek($action,$vouch_num,$arr_vouch,$arr_select){
   
     $I['process']=4;
     $I['date']=strtotime(date("Y-m-d",time()));
     $I['date_s']=time() ;
     $I['publisher']=$_SESSION['user_name'];
   
    if($action==1){
        
         $I['pill_num']=$vouch_num;
         $I['paid_type']=$arr_vouch[0]->vouch_type; 
         $I['madeen']=$arr_vouch[0]->maden;
         $I['dayen']=$arr_vouch[0]->sheek_under_recived;
         $I['p_cost']=$arr_vouch[0]->sum;
    $this->db->insert('all_deports',$I);  
        
    }elseif($action==2){
        //-------
        $arr_vouch_all=$this->slect_where("vouchers",$arr_select,"id");
        //------
        foreach($arr_vouch_all as $row):
           $I['pill_num']=$vouch_num;
           $I['paid_type']=$row->vouch_type; 
           $I['madeen']=$row->dayen;
           $I['dayen']=$row->sheek_under_recived;
           $I['p_cost']=$row->value;
     $this->db->insert('all_deports',$I);  
        endforeach;
     }// end adtion if 
     
     //------------------------------- 
      $x['deport']=3;
      $x['sheek_status']=$action;
      $x['accept_date']=strtotime(date("Y-m-d",time()));
  $this->db->where('vouch_num',$vouch_num);
  $this->db->where('type',$arr_vouch[0]->type);
  $this->db->update('vouchers', $x);  
     //--------------------------------
    
}
//---------------------------------------------------------------------------------
 public function slect_where($table,$statem,$grouby){
        $this->db->select('*');
        $this->db->from($table);
        foreach($statem as $key=>$value){
        $this->db->where($key,$statem[$key]);    
        }
        $this->db->group_by($grouby);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }











}// end class 

