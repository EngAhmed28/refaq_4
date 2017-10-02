<?php

class Service extends CI_Model
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
//---------------------------------------------------
    public function select(){
        $this->db->select('*');
        $this->db->from('service_setting');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `service_setting` WHERE `main_service_id`='.$row->main_service_id);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->main_service_id]=$arr;
            }
            return $data;
        }
        return false;
    }





    //=======================================================================
    public function select_main(){
        $this->db->select('*');
        $this->db->from('service_setting');
        $this->db->where('main_service_id',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    public function select_sub(){
        $this->db->select('*');
        $this->db->from('service_setting');
        $this->db->where('main_service_id',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    //=================================================================
    public function getById($id){
        $h = $this->db->get_where('service_setting', array('id'=>$id));
        return $h->row_array();
    }
    //================================================================
    public function select_devices(){
        $this->db->select('*');
        $this->db->from('electrical_equipment');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //========================================================================
    public function count_services($num){
        $this->db->select('*');
        $this->db->from('all_services_orders');
        $this->db->where('mother_national_id_fk',$num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    //===================================================insert=================================
    public  function  insert($mother_national_id_fk,$main_service,$sub_service,$device_file,$proofed_file,$fatora_file,$medicine_device_file,$car_repair_file,$car_num_file,$repair_device_file,$home_file,$family_card_file,$marriage_contract_file,$identity_img_file,$personal_picture_file,$hall_contract_file,$definition_of_salary_file,$imam_recommendation_file,$course_employment_cv_file,$course_employment_qualification_file){
        if(!empty($sub_service)){
           $data['service_id_fk']= $sub_service;
        }else{
           $data['service_id_fk']= $main_service;
        }
        $data['mother_national_id_fk']=$this->chek_Null($mother_national_id_fk);
        $data['order_num']= rand(0,100000);
        //electral_equipment
        $data['device_id_fk']=$this->chek_Null( $this->input->post('device_id_fk'));
        $data['number_of_device']=$this->chek_Null( $this->input->post('number_of_device'));
        $data['device_note']=$this->chek_Null( $this->input->post('device_note'));
        $data['device_img']=$this->chek_Null($device_file);
        //healthcare
        $data['name_id_fk']=$this->chek_Null( $this->input->post('name_id_fk'));
        $data['number_of_pays']=$this->chek_Null( $this->input->post('number_of_pays'));
        $data['date_of_travel']=$this->chek_Null( strtotime($this->input->post('date_of_travel')));
        $data['day_name']=$this->chek_Null( $this->input->post('day_name'));
        $data['treatment_place']=$this->chek_Null( $this->input->post('treatment_place'));
        $data['proofed_date_file']=$this->chek_Null($proofed_file);
        //electricty_bills-water_bills
        $data['fatora_num']=$this->chek_Null( $this->input->post('fatora_num'));
        $data['fatora_cost']=$this->chek_Null( $this->input->post('fatora_cost'));
        $data['fatora_date']=$this->chek_Null( strtotime($this->input->post('fatora_date')));
        $data['fatora_sanad_daf3_date']=$this->chek_Null( strtotime($this->input->post('fatora_sanad_daf3_date')));
        $data['fatora_img']=$this->chek_Null($fatora_file);
        //school_supplies
        $data['school_member_id_fk']=$this->chek_Null( $this->input->post('school_member_id_fk'));
        $data['school_requirement_id_fk']=$this->chek_Null( $this->input->post('school_requirement_id_fk'));
        //hij-omra
        $data['hij_family_id_fk']=$this->chek_Null( $this->input->post('hij_family_id_fk'));
        $data['relationship']=$this->chek_Null( $this->input->post('relationship'));
        $data['birth_date']=$this->chek_Null( strtotime($this->input->post('birth_date')));
        $data['first_hij']=$this->chek_Null( $this->input->post('first_hij'));
        $data['muhrem_hij_name']=$this->chek_Null( $this->input->post('muhrem_hij_name'));
        //medical
        $data['medicine_device_id_fk']=$this->chek_Null( $this->input->post('medicine_device_id_fk'));
        $data['medicine_device_family_id_fk']=$this->chek_Null( $this->input->post('medicine_device_family_id_fk'));
        $data['medicine_device_name']=$this->chek_Null( $this->input->post('medicine_device_name'));
        $data['medicine_device_file_attachment']=$this->chek_Null( $medicine_device_file);
        //car
        $data['car_nearest_name']=$this->chek_Null( $this->input->post('car_nearest_name'));
        $data['car_owner_name']=$this->chek_Null( $this->input->post('car_owner_name'));
        $data['car_problem']=$this->chek_Null( $this->input->post('car_problem'));
        $data['car_num']=$this->chek_Null( $this->input->post('car_num'));
        $data['car_repair_fatora_img']=$this->chek_Null( $car_repair_file);
        $data['car_num_img']=$this->chek_Null( $car_num_file);
        //device_repair
        $data['repair_device_id_fk']=$this->chek_Null( $this->input->post('repair_device_id_fk'));
        $data['repair_device_number']=$this->chek_Null( $this->input->post('repair_device_number'));
        $data['repair_device_note']=$this->chek_Null( $this->input->post('repair_device_note'));
        $data['repair_device_img']=$this->chek_Null($repair_device_file);
        //home_repair-home_restoration
        $data['home_place']=$this->chek_Null( $this->input->post('home_place'));
        $data['home_type_id_fk']=$this->chek_Null( $this->input->post('home_type_id_fk'));
        $data['home_img']=$this->chek_Null($home_file);
        //help_marriage
        $data['help_marriage_family_id_fk']=$this->chek_Null( $this->input->post('help_marriage_family_id_fk'));
        $data['help_marriage_place']=$this->chek_Null( $this->input->post('help_marriage_place'));
        $data['help_marriage_contract__num']=$this->chek_Null( $this->input->post('help_marriage_contract__num'));
        $data['help_marriage_issuer_of_contract']=$this->chek_Null( $this->input->post('help_marriage_issuer_of_contract'));
        $data['help_marriage_wife_nationalty_id_fk']=$this->chek_Null( $this->input->post('help_marriage_wife_nationalty_id_fk'));
        $data['help_marriage_wife_national_type_id_fk']=$this->chek_Null( $this->input->post('help_marriage_wife_national_type_id_fk'));
        $data['help_marriage_mob']=$this->chek_Null( $this->input->post('help_marriage_mob'));
        $data['help_marriage_city']=$this->chek_Null( $this->input->post('help_marriage_city'));
        $data['help_marriage_date']=$this->chek_Null(strtotime($this->input->post('help_marriage_date')));
        $data['help_marriage_contract_date']=$this->chek_Null(strtotime($this->input->post('help_marriage_contract_date')));
        $data['help_marriage_dowry_cost']=$this->chek_Null( $this->input->post('help_marriage_dowry_cost'));
        $data['help_marriage_wife_national_card_num']=$this->chek_Null( $this->input->post('help_marriage_wife_national_card_num'));
        //files
        $data['family_card']=$this->chek_Null( $family_card_file);
        $data['marriage_contract']=$this->chek_Null( $marriage_contract_file);
        $data['identity_img']=$this->chek_Null( $identity_img_file);
        $data['personal_picture']=$this->chek_Null($personal_picture_file);
        $data['hall_contract']=$this->chek_Null( $hall_contract_file);
        $data['definition_of_salary']=$this->chek_Null($definition_of_salary_file);
        $data['imam_recommendation']=$this->chek_Null($imam_recommendation_file);
        //transfer_to_medical centers
        $data['transfer_to_medical_family_member_id_fk']=$this->chek_Null( $this->input->post('transfer_to_medical_family_member_id_fk'));
        $data['transfer_to_medical_diseases_type_name']=$this->chek_Null( $this->input->post('transfer_to_medical_diseases_type_name'));
        //electronic_cards
        $data['treatment_card_name']=$this->chek_Null( $this->input->post('treatment_card_name'));
        $data['treatment_card_service_type_id_fk']=$this->chek_Null( $this->input->post('treatment_card_service_type_id_fk'));
        $data['treatment_card_national_number']=$this->chek_Null( $this->input->post('treatment_card_national_number'));
         //traning_and_jops
        $data['course_employment_id_fk']=$this->chek_Null( $this->input->post('course_employment_id_fk'));
        $data['course_employment_last_education_degree']=$this->chek_Null( $this->input->post('course_employment_last_education_degree'));
        $data['course_employment_course_type_id_fk']=$this->chek_Null( $this->input->post('course_employment_course_type_id_fk'));
        $data['course_employment_job']=$this->chek_Null( $this->input->post('course_employment_job'));
        $data['course_employment_mob']=$this->chek_Null( $this->input->post('course_employment_mob'));
        $data['course_employment_family_id_fk']=$this->chek_Null( $this->input->post('course_employment_family_id_fk'));
        $data['course_employment_education_level']=$this->chek_Null( $this->input->post('course_employment_education_level'));
        $data['course_employment_course_period']=$this->chek_Null( $this->input->post('course_employment_course_period'));
        $data['course_employment_cv_file']=$course_employment_cv_file;
        $data['course_employment_qualification_file']=$course_employment_qualification_file;
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('all_services_orders',$data);
    }

    //=======================================================
    public function selec($num){
        $this->db->select('*');
        $this->db->from('all_services_orders');
        $this->db->where('mother_national_id_fk',$num);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }

    //=====================================================================
    public function get_sub_name(){
        $this->db->select('*');
        $this->db->from('service_setting');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `service_setting` WHERE `id`='.$row->id);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->id]=$arr;
            }
            return $data;
        }
        return false;
    }

    //======================================22-6-2017

    public function select_type(){
        $this->db->select('*');
        $this->db->from('all_services_orders');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `all_services_orders` WHERE `id`='.$row->id);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->id]=$arr;
            }
            return $data;
        }
        return false;
    }
    ////
    public function select_id(){
        $this->db->select('*');
        $this->db->from('all_services_orders');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `all_services_orders` WHERE `service_id_fk`='.$row->service_id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;
                }
                $data[$row->service_id_fk]=$arr;
            }
            return $data;
        }
        return false;
    }
}

