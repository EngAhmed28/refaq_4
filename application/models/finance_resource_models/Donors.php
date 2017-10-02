<?php

class Donors extends CI_Model
{
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    //===================================================insert=================================

    public  function  insert($national_id_file,$bank_card_file,$bank_deduction_voucher_file,$other_img_file){

       $data['donor_type']=$this->chek_Null( $this->input->post('donor_type'));
        if($data['donor_type'] ==1){
            $data['user_name']=$this->chek_Null( $this->input->post('person_name'));
            $data['password']=sha1(md5($this->chek_Null( $this->input->post('person_password'))));
               $data['pay_method_id_fk']=$this->chek_Null( $this->input->post('person_pay_method_id_fk'));
                    $data['guaranty_mob']=$this->chek_Null( $this->input->post('person_guaranty_mob'));
        $data['guaranty_another_mob']=$this->chek_Null( $this->input->post('person_guaranty_another_mob'));
            $data['guaranty_name']=$this->chek_Null( $this->input->post('guaranty_name'));
               $data['guaranty_email']=$this->chek_Null( $this->input->post('guaranty_email'));
            $data['guaranty_city']=$this->chek_Null( $this->input->post('person_guaranty_city'));
        }elseif ($data['donor_type'] ==2){
            $data['user_name']=$this->chek_Null( $this->input->post('corporation_name'));
            $data['password']=sha1(md5($this->chek_Null( $this->input->post('corporation_password'))));
            $data['pay_method_id_fk']=$this->chek_Null( $this->input->post('corporation_pay_method_id_fk'));
                    $data['guaranty_mob']=$this->chek_Null( $this->input->post('corporation_guaranty_mob'));
        $data['guaranty_another_mob']=$this->chek_Null( $this->input->post('corporation_guaranty_another_mob'));
            $data['guaranty_name']=$this->chek_Null( $this->input->post('corporation_guaranty_name'));
               $data['guaranty_email']=$this->chek_Null( $this->input->post('corporation_guaranty_email'));
            $data['guaranty_city']=$this->chek_Null( $this->input->post('corporation_guaranty_city'));
        }
        $data['character_person']=$this->chek_Null( $this->input->post('character_person'));
        $data['donor_mediator_name']=$this->chek_Null( $this->input->post('donor_mediator_name'));
        $data['donor_mediator_status']=$this->chek_Null( $this->input->post('donor_mediator_status'));
        $data['family_name']=$this->chek_Null( $this->input->post('family_name'));
        $data['grand_father_name']=$this->chek_Null( $this->input->post('grand_father_name'));
        $data['nationality_id_fk']=$this->chek_Null( $this->input->post('nationality_id_fk'));
        $data['gender_id_fk']=$this->chek_Null( $this->input->post('gender_id_fk'));
        $data['national_id_fk']=$this->chek_Null( $this->input->post('national_id_fk'));
        $data['national_type_id_fk']=$this->chek_Null( $this->input->post('national_type_id_fk'));

        $data['guaranty_date']=$this->chek_Null( strtotime($this->input->post('guaranty_date')));
        $data['guaranty_status']=$this->chek_Null( $this->input->post('guaranty_status'));
        $data['guaranty_job']=$this->chek_Null( $this->input->post('guaranty_job'));
        $data['guaranty_job_place']=$this->chek_Null( $this->input->post('guaranty_job_place'));



        $data['guaranty_note']=$this->chek_Null( $this->input->post('guaranty_note'));

        $data['bank_code_fk']=$this->chek_Null( $this->input->post('bank_code_fk'));
        $data['bank_account_number']=$this->chek_Null( $this->input->post('bank_account_number'));
        $data['bank_account_another_number']=$this->chek_Null( $this->input->post('bank_account_another_number'));

        $data['bank_account_person_name']=$this->chek_Null( $this->input->post('bank_account_person_name'));
        $data['membership_number']=$this->chek_Null( $this->input->post('membership_number'));
        //img
        $data['national_id_img']=$national_id_file;
        $data['bank_card_img']=$bank_card_file;
        $data['bank_deduction_voucher_img']=$bank_deduction_voucher_file;
        $data['other_img']=$other_img_file;
        //img
        $data['permit_number']=$this->chek_Null( $this->input->post('permit_number'));
        $data['address']=$this->chek_Null( $this->input->post('address'));
        $data['box_number']=$this->chek_Null( $this->input->post('box_number'));
        $data['postal_code']=$this->chek_Null( $this->input->post('postal_code'));
        $data['transformation']=$this->chek_Null( $this->input->post('transformation'));
        $data['fax_number']=$this->chek_Null( $this->input->post('fax_number'));
        $data['organization_web_site']=$this->chek_Null( $this->input->post('organization_web_site'));
        $data['projects']=$this->chek_Null( $this->input->post('projects'));
        $data['condition_support']=$this->chek_Null( $this->input->post('condition_support'));

        $this->db->insert('donors_t',$data);
    }

    //=======================================================
    public  function  update($id,$national_id_file,$bank_card_file,$bank_deduction_voucher_file,$other_img_file){

        $data['donor_type']=$this->chek_Null( $this->input->post('donor_type'));
        if($data['donor_type'] ==1){
            $data['user_name']=$this->chek_Null( $this->input->post('person_name'));
            $data['password']=sha1(md5($this->chek_Null( $this->input->post('person_password'))));
            $data['pay_method_id_fk']=$this->chek_Null( $this->input->post('person_pay_method_id_fk'));
            $data['guaranty_mob']=$this->chek_Null( $this->input->post('person_guaranty_mob'));
            $data['guaranty_another_mob']=$this->chek_Null( $this->input->post('person_guaranty_another_mob'));
            $data['guaranty_name']=$this->chek_Null( $this->input->post('guaranty_name'));
            $data['guaranty_email']=$this->chek_Null( $this->input->post('guaranty_email'));
            $data['guaranty_city']=$this->chek_Null( $this->input->post('person_guaranty_city'));
        }elseif ($data['donor_type'] ==2){
            $data['user_name']=$this->chek_Null( $this->input->post('corporation_name'));
            $data['password']=sha1(md5($this->chek_Null( $this->input->post('corporation_password'))));
            $data['pay_method_id_fk']=$this->chek_Null( $this->input->post('corporation_pay_method_id_fk'));
            $data['guaranty_mob']=$this->chek_Null( $this->input->post('corporation_guaranty_mob'));
            $data['guaranty_another_mob']=$this->chek_Null( $this->input->post('corporation_guaranty_another_mob'));
            $data['guaranty_name']=$this->chek_Null( $this->input->post('corporation_guaranty_name'));
            $data['guaranty_email']=$this->chek_Null( $this->input->post('corporation_guaranty_email'));
            $data['guaranty_city']=$this->chek_Null( $this->input->post('corporation_guaranty_city'));
        }
        $data['character_person']=$this->chek_Null( $this->input->post('character_person'));
        $data['donor_mediator_name']=$this->chek_Null( $this->input->post('donor_mediator_name'));
        $data['donor_mediator_status']=$this->chek_Null( $this->input->post('donor_mediator_status'));
        $data['family_name']=$this->chek_Null( $this->input->post('family_name'));
        $data['grand_father_name']=$this->chek_Null( $this->input->post('grand_father_name'));
        $data['nationality_id_fk']=$this->chek_Null( $this->input->post('nationality_id_fk'));
        $data['gender_id_fk']=$this->chek_Null( $this->input->post('gender_id_fk'));
        $data['national_id_fk']=$this->chek_Null( $this->input->post('national_id_fk'));
        $data['national_type_id_fk']=$this->chek_Null( $this->input->post('national_type_id_fk'));

        $data['guaranty_date']=$this->chek_Null( strtotime($this->input->post('guaranty_date')));
        $data['guaranty_status']=$this->chek_Null( $this->input->post('guaranty_status'));
        $data['guaranty_job']=$this->chek_Null( $this->input->post('guaranty_job'));
        $data['guaranty_job_place']=$this->chek_Null( $this->input->post('guaranty_job_place'));



        $data['guaranty_note']=$this->chek_Null( $this->input->post('guaranty_note'));

        $data['bank_code_fk']=$this->chek_Null( $this->input->post('bank_code_fk'));
        $data['bank_account_number']=$this->chek_Null( $this->input->post('bank_account_number'));
        $data['bank_account_another_number']=$this->chek_Null( $this->input->post('bank_account_another_number'));

        $data['bank_account_person_name']=$this->chek_Null( $this->input->post('bank_account_person_name'));
        $data['membership_number']=$this->chek_Null( $this->input->post('membership_number'));
        //img
        $data['national_id_img']=$national_id_file;
        $data['bank_card_img']=$bank_card_file;
        $data['bank_deduction_voucher_img']=$bank_deduction_voucher_file;
        $data['other_img']=$other_img_file;
        //img
        $data['permit_number']=$this->chek_Null( $this->input->post('permit_number'));
        $data['address']=$this->chek_Null( $this->input->post('address'));
        $data['box_number']=$this->chek_Null( $this->input->post('box_number'));
        $data['postal_code']=$this->chek_Null( $this->input->post('postal_code'));
        $data['transformation']=$this->chek_Null( $this->input->post('transformation'));
        $data['fax_number']=$this->chek_Null( $this->input->post('fax_number'));
        $data['organization_web_site']=$this->chek_Null( $this->input->post('organization_web_site'));
        $data['projects']=$this->chek_Null( $this->input->post('projects'));
        $data['condition_support']=$this->chek_Null( $this->input->post('condition_support'));
        $this->db->where('id', $id);
        $this->db->update('donors_t',$data);

    }
    
    
    
    
    
    
    
    
      public function select(){

        $this->db->select('*');
        $this->db->from('donors_t');
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

