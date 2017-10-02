<?php

class Endowments extends CI_Model
{
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    //===================================================insert=================================

    public  function  insert(){
        $data['endowment_name']=$this->chek_Null( $this->input->post('endowment_name'));
        $data['endowment_cost']=$this->chek_Null( $this->input->post('endowment_cost'));
        $data['stock_cost']=$this->chek_Null( $this->input->post('stock_cost'));
        $data['endowment_account_num']=$this->chek_Null( $this->input->post('endowment_account_num'));
        $data['houses_num']=$this->chek_Null( $this->input->post('houses_num'));
        $data['commercial_Lounges']=$this->chek_Null( $this->input->post('commercial_Lounges'));
        $data['floor_num']=$this->chek_Null( $this->input->post('floor_num'));
        $data['employee_in_charge']=$this->chek_Null( $this->input->post('employee_in_charge'));
        $data['employee_mobile']=$this->chek_Null( $this->input->post('employee_mobile'));
        $data['address']=$this->chek_Null( $this->input->post('address'));
        $data['endowment_type']=$this->chek_Null( $this->input->post('endowment_type'));
        $data['stock_num']=$this->chek_Null( $this->input->post('stock_num'));
        $data['Land_area']=$this->chek_Null( $this->input->post('Land_area'));
        $data['bank_id']=$this->chek_Null( $this->input->post('bank_id'));
        $data['shops_num']=$this->chek_Null( $this->input->post('shops_num'));
        $data['other_facilities']=$this->chek_Null( $this->input->post('other_facilities'));
        $data['responsible_for_endowment']=$this->chek_Null( $this->input->post('responsible_for_endowment'));
        $data['city']=$this->chek_Null( $this->input->post('city'));
        $data['notes']=$this->chek_Null( $this->input->post('notes'));
        $data['endowment_start']=strtotime( $this->input->post('endowment_start'));
        $data['endowment_end']=strtotime( $this->input->post('endowment_end'));
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('endowments',$data);
    }

    //=======================================================
    public  function  update($id){

        $data['endowment_name']=$this->chek_Null( $this->input->post('endowment_name'));
        $data['endowment_cost']=$this->chek_Null( $this->input->post('endowment_cost'));
        $data['stock_cost']=$this->chek_Null( $this->input->post('stock_cost'));
        $data['endowment_account_num']=$this->chek_Null( $this->input->post('endowment_account_num'));
        $data['houses_num']=$this->chek_Null( $this->input->post('houses_num'));
        $data['commercial_Lounges']=$this->chek_Null( $this->input->post('commercial_Lounges'));
        $data['floor_num']=$this->chek_Null( $this->input->post('floor_num'));
        $data['employee_in_charge']=$this->chek_Null( $this->input->post('employee_in_charge'));
        $data['employee_mobile']=$this->chek_Null( $this->input->post('employee_mobile'));
        $data['address']=$this->chek_Null( $this->input->post('address'));
        $data['endowment_type']=$this->chek_Null( $this->input->post('endowment_type'));
        $data['stock_num']=$this->chek_Null( $this->input->post('stock_num'));
        $data['Land_area']=$this->chek_Null( $this->input->post('Land_area'));
        $data['bank_id']=$this->chek_Null( $this->input->post('bank_id'));
        $data['shops_num']=$this->chek_Null( $this->input->post('shops_num'));
        $data['other_facilities']=$this->chek_Null( $this->input->post('other_facilities'));
        $data['responsible_for_endowment']=$this->chek_Null( $this->input->post('responsible_for_endowment'));
        $data['city']=$this->chek_Null( $this->input->post('city'));
        $data['notes']=$this->chek_Null( $this->input->post('notes'));
        $data['endowment_start']=strtotime( $this->input->post('endowment_start'));
        $data['endowment_end']=strtotime( $this->input->post('endowment_end'));
        $this->db->where('id', $id);
        $this->db->update('endowments',$data);

    }
    //=================================================
}

