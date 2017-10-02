<?php
class Sarf extends CI_Model{
    public function __construct() {
        parent::__construct();
}    
//-------------------------------------------------
 public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value)) || empty($post_value) ){
            return 0;
        }else{
            return $post_value;
        }
    }
//-------------------------------------------------
    public function insert($session_name){
         $mod = current($_SESSION["sanad_sarf_".$session_name]);
      for ($x = 0; $x < count($_SESSION["sanad_sarf_".$session_name]); $x++) {
            $data['receipt_date'] = strtotime($mod['receipt_date']);
            $data['vouch_num'] = $mod['vouch_num'];
            $data['vouch_type'] = $mod['vouch_type'];
            $data['details'] = $mod['byan_sarf'];
            $data['value'] = $mod['value'];
            $data['type'] = 1; 
             if($mod['vouch_type']==1){
                 $data['maden']= $mod['account_code'];
                 $data['dayen']=$mod['box_name'];
                 $data['date_received']="";
                 $data['sheek_num']="";
             }elseif($mod['vouch_type']==2 || $mod['vouch_type']==3){
                 $data['maden']=$mod['account_code'];
                 $data['dayen']=$mod['bank_name'];
                 $data['date_received']=strtotime($mod['recive_date']);
                 $data['sheek_num']=$mod['check_num'];
             }
            $data['date'] = strtotime(date("m/d/Y"));
            $data['date_s'] = time();
            $mod = next($_SESSION["sanad_sarf_".$session_name]);
            $this->db->insert('vouchers', $data);   
        }//END FOR
    } 
//-------------------------------------------------
    
//-------------------------------------------------
    
//-------------------------------------------------
    
//-------------------------------------------------
    
//-------------------------------------------------
    
//-------------------------------------------------
    
    
    public function query_vouchers_sarf()
{
    $this->db->select('*');
    $this->db->from('vouchers');
    $this->db->where('type', 1);
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}
    
 public function select_sarf_group()
{
    
    $this->db->select('*');
    $this->db->from('vouchers');
  
         $array = array('type' => 1, 'deport' => 0);
        $this->db->where($array);
    $this->db->order_by('id', 'DESC');
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
    

public function select_all_value()
{
    $this->db->select('*');
    $this->db->from('vouchers');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $query2 = $this->db->query('SELECT * FROM `vouchers` WHERE `vouch_num`=' . $row->vouch_num);
            $arr = array();
            foreach ($query2->result() as $row2) {
                $arr[] = $row2;
            }
            $data[$row->vouch_num] = $arr;

        }
        return $data;
    }
    return false;
}
    
    
    
    

}// END CLASS   
?>