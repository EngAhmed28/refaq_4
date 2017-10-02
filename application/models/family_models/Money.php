<?php

class Money extends CI_Model
{
 public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
  public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
          $val="";
            return $val;
        }else{
            return $post_value;
        }
    }
//---------------------------------------------------
    public  function  insert()
    {
        $data['mother_national_num_fk']=$this->chek_Null($_SESSION['mother_national_num']);
        $data['f_pension_amount']=$this->chek_Null($this->input->post('f_pension_amount'));
        $data['f_warranty_amount']=$this->chek_Null($this->input->post('f_warranty_amount'));
       // $data['f_owner_ship_amount']=$this->chek_Null($this->input->post('f_owner_ship_amount'));
        $data['f_insurance_amount']=$this->chek_Null($this->input->post('f_insurance_amount'));
        $data['f_annual_amount']=$this->chek_Null($this->input->post('f_annual_amount'));
        $data['f_other_amount']=$this->chek_Null($this->input->post('f_other_amount'));
        $data['f_workers_id_fk']=$this->chek_Null($this->input->post('f_workers_id_fk'));
        $data['f_workers_num']=$this->chek_Null($this->input->post('f_workers_num'));
        $data['f_commerical_activity_id_fk']=$this->chek_Null($this->input->post('f_commerical_activity_id_fk'));
        $data['f_bank_id_fk']=$this->chek_Null($this->input->post('f_bank_id_fk'));
        $data['f_bank_account_num']=$this->chek_Null($this->input->post('f_bank_account_num'));
        $data['f_official_account_name']=$this->chek_Null($this->input->post('f_official_account_name'));
        $this->db->insert('financial',$data);

    }
//----------------------------------------------------------
   public function getById($id){
        $h = $this->db->get_where('financial', array('mother_national_num_fk'=>$id));
        return $h->row_array();
    }

    public function update($id){
        $data['f_pension_amount']=$this->chek_Null($this->input->post('f_pension_amount'));
        $data['f_warranty_amount']=$this->chek_Null($this->input->post('f_warranty_amount'));
      //  $data['f_owner_ship_amount']=$this->chek_Null($this->input->post('f_owner_ship_amount'));
        $data['f_insurance_amount']=$this->chek_Null($this->input->post('f_insurance_amount'));
        $data['f_annual_amount']=$this->chek_Null($this->input->post('f_annual_amount'));
        $data['f_other_amount']=$this->chek_Null($this->input->post('f_other_amount'));
        $data['f_workers_id_fk']=$this->chek_Null($this->input->post('f_workers_id_fk'));
        if($this->input->post('f_workers_id_fk')==0){
            $data['f_workers_num']=0;
        }else{$data['f_workers_num']=$this->chek_Null($this->input->post('f_workers_num'));
        }
        $data['f_commerical_activity_id_fk']=$this->chek_Null($this->input->post('f_commerical_activity_id_fk'));
        $data['f_bank_id_fk']=$this->chek_Null($this->input->post('f_bank_id_fk'));
        $data['f_bank_account_num']=$this->chek_Null($this->input->post('f_bank_account_num'));
        $data['f_official_account_name']=$this->chek_Null($this->input->post('f_official_account_name'));
        $this->db->where('mother_national_num_fk', $id);
        if($this->db->update('financial',$data)) {
            return true;
        }else{
            return false;
        }
    }




}// END CLASS 