<?php

class Mother extends CI_Model
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
    public  function  insert(){
        $data['mother_national_num_fk']=$this->chek_Null( $_SESSION['mother_national_num']);
        $data['m_first_name']=$this->chek_Null( $this->input->post('m_first_name'));
        $data['m_father_name']=$this->chek_Null( $this->input->post('m_father_name'));
        $data['m_grandfather_name']=$this->chek_Null( $this->input->post('m_grandfather_name'));
        $data['m_family_name']=$this->chek_Null( $this->input->post('m_family_name'));
        $data['m_birth_date']=$this->chek_Null( strtotime($this->input->post('m_birth_date')));
        $data['m_nationality']=$this->chek_Null( $this->input->post('m_nationality'));
           $data['nationality_other']=$this->chek_Null( $this->input->post('nationality_other'));
        
        
        
        $data['m_marital_status_id_fk']=$this->chek_Null( $this->input->post('m_marital_status_id_fk'));
        $data['m_living_place_id_fk']=$this->chek_Null( $this->input->post('m_living_place_id_fk'));
        $data['m_living_place']=$this->chek_Null( $this->input->post('m_living_place'));
        $data['m_national_id']=$this->chek_Null( $this->input->post('m_national_id'));
        $data['m_national_id_type']=$this->chek_Null( $this->input->post('m_national_id_type'));
        $data['m_education_status_id_fk']=$this->chek_Null( $this->input->post('m_education_status_id_fk'));
        $data['m_specialization']=$this->chek_Null( $this->input->post('m_specialization'));
        $data['m_health_status_id_fk']=$this->chek_Null( $this->input->post('m_health_status_id_fk'));
        $data['DisabilityType']=$this->chek_Null( $this->input->post('DisabilityType'));
        $data['Disability_check']=$this->chek_Null( $this->input->post('Disability_check'));
        $data['disability_Place']=$this->chek_Null( $this->input->post('disability_Place'));
        $data['disability_amount']=$this->chek_Null( $this->input->post('disability_amount'));
        $data['receive_treatment']=$this->chek_Null( $this->input->post('receive_treatment'));
        $data['treatment_place']=$this->chek_Null( $this->input->post('treatment_place'));
        $data['treatment_reasons']=$this->chek_Null( $this->input->post('treatment_reasons'));
        $data['death_reason']=$this->chek_Null( $this->input->post('death_reason'));
        $data['other_death_reason']=$this->chek_Null( $this->input->post('other_death_reason'));
        $data['death_date']=$this->chek_Null( strtotime($this->input->post('death_date')));
        $data['m_skill_name']=$this->chek_Null( $this->input->post('m_skill_name'));
        $data['m_job_id_fk']=$this->chek_Null( $this->input->post('m_job_id_fk'));
        $data['m_job_other']=$this->chek_Null( $this->input->post('m_job_other'));
        $data['m_monthly_income']=$this->chek_Null( $this->input->post('m_monthly_income'));
        $data['m_education_level_id_fk']=$this->chek_Null( $this->input->post('m_education_level_id_fk'));
        $data['m_education_level_id_fk']=$this->chek_Null( $this->input->post('m_education_level_id_fk'));
        $data['m_female_house_check']=$this->chek_Null( $this->input->post('m_female_house_check'));
        $data['m_female_house_name']=$this->chek_Null( $this->input->post('m_female_house_name'));
        $data['m_hijri']=$this->chek_Null( $this->input->post('m_hijri'));
        $data['m_ommra']=$this->chek_Null( $this->input->post('m_ommra'));
        $data['m_mob']=$this->chek_Null( $this->input->post('m_mob'));
        $data['m_another_mob']=$this->chek_Null( $this->input->post('m_another_mob'));
        $data['m_email']=$this->chek_Null( $this->input->post('m_email'));
        $data['m_want_work']=$this->chek_Null( $this->input->post('m_want_work'));
        
        $this->db->insert('mother',$data);
    }




    //=======================================================================

    //=======================================================================
    public  function  update($id){
   
        $data['m_first_name']=$this->chek_Null( $this->input->post('m_first_name'));
        $data['m_father_name']=$this->chek_Null( $this->input->post('m_father_name'));
        $data['m_grandfather_name']=$this->chek_Null( $this->input->post('m_grandfather_name'));
        $data['m_family_name']=$this->chek_Null( $this->input->post('m_family_name'));
        $data['m_birth_date']=$this->chek_Null( strtotime($this->input->post('m_birth_date')));
        $data['m_nationality']=$this->chek_Null( $this->input->post('m_nationality'));
                 $data['nationality_other']=$this->chek_Null( $this->input->post('nationality_other'));
        $data['m_marital_status_id_fk']=$this->chek_Null( $this->input->post('m_marital_status_id_fk'));
        $data['m_living_place_id_fk']=$this->chek_Null( $this->input->post('m_living_place_id_fk'));
        $data['m_living_place']=$this->chek_Null( $this->input->post('m_living_place'));
        $data['m_national_id']=$this->chek_Null( $this->input->post('m_national_id'));
        $data['m_national_id_type']=$this->chek_Null( $this->input->post('m_national_id_type'));
        $data['m_education_status_id_fk']=$this->chek_Null( $this->input->post('m_education_status_id_fk'));
        $data['m_specialization']=$this->chek_Null( $this->input->post('m_specialization'));
        $data['m_health_status_id_fk']=$this->chek_Null( $this->input->post('m_health_status_id_fk'));
        $data['DisabilityType']=$this->chek_Null( $this->input->post('DisabilityType'));
        $data['Disability_check']=$this->chek_Null( $this->input->post('Disability_check'));
        $data['disability_Place']=$this->chek_Null( $this->input->post('disability_Place'));
        $data['disability_amount']=$this->chek_Null( $this->input->post('disability_amount'));
        $data['receive_treatment']=$this->chek_Null( $this->input->post('receive_treatment'));
        $data['treatment_place']=$this->chek_Null( $this->input->post('treatment_place'));
        $data['treatment_reasons']=$this->chek_Null( $this->input->post('treatment_reasons'));
        $data['death_reason']=$this->chek_Null( $this->input->post('death_reason'));
        $data['other_death_reason']=$this->chek_Null( $this->input->post('other_death_reason'));
        $data['death_date']=$this->chek_Null( strtotime($this->input->post('death_date')));
        $data['m_skill_name']=$this->chek_Null( $this->input->post('m_skill_name'));
        $data['m_job_id_fk']=$this->chek_Null( $this->input->post('m_job_id_fk'));
        $data['m_job_other']=$this->chek_Null( $this->input->post('m_job_other'));
        $data['m_monthly_income']=$this->chek_Null( $this->input->post('m_monthly_income'));
        $data['m_education_level_id_fk']=$this->chek_Null( $this->input->post('m_education_level_id_fk'));
        $data['m_education_level_id_fk']=$this->chek_Null( $this->input->post('m_education_level_id_fk'));
        $data['m_female_house_check']=$this->chek_Null( $this->input->post('m_female_house_check'));
        $data['m_female_house_name']=$this->chek_Null( $this->input->post('m_female_house_name'));
        $data['m_hijri']=$this->chek_Null( $this->input->post('m_hijri'));
        $data['m_ommra']=$this->chek_Null( $this->input->post('m_ommra'));
        $data['m_mob']=$this->chek_Null( $this->input->post('m_mob'));
        $data['m_another_mob']=$this->chek_Null( $this->input->post('m_another_mob'));
        $data['m_email']=$this->chek_Null( $this->input->post('m_email'));
        $data['m_want_work']=$this->chek_Null( $this->input->post('m_want_work'));

        $this->db->where('mother_national_num_fk', $id);
        $this->db->update('mother',$data);

    }
 //------------------------------------------------------------------------   
 public function get_mother_name(){
        $this->db->select('*');
        $this->db->from('mother');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->mother_national_num_fk] = $row;
            }
            return $data;
        }
        return false;
    }




}// END CLASS

