<?php
class Family extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->helper(array('url','text','permission','form'));
    }
//--------------------------------------------------  
    private  function test($data=array()){
              echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
//--------------------------------------------------    
    private  function upload_image($file_name){
    $config['upload_path'] = 'uploads/images';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    $config['max_size']    = '1024*8';
    $config['encrypt_name']=true;
    $this->load->library('upload',$config);
    if(! $this->upload->do_upload($file_name)){
      return  false;
    }else{
        $datafile = $this->upload->data();
        $this->thumb($datafile);
       return  $datafile['file_name'];
    }
}
//-----------------------------------------------
     private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
//-------------------------------------------------    
    private function url (){
     unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

/**
 *  ================================================================================================================
 * 
 *  ================================================================================================================
 * 
 *  ================================================================================================================
 */

    public function  index(){
      $this->load->model("Difined_model");
      $this->load->model("family_models/Register");
      $this->load->model("family_models/Operations");
      $this->load->model("Users");
        $data['is_active']=1;
        
        $data['all_family']=$this->Register->family(0);
        $data['jobs_name']=$this->Users->jobs_id();
        $data['last_state']=$this->Operations->last_statues();
        $data['subview'] = 'admin/family/all_family';
        $this->load->view('admin_index', $data);
    }
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
   
   public function basic($id){
    $this->load->model("Difined_model");
    $this->load->model("Users");
    $this->load->model("family_models/Operations"); 
    $data['jobs_name']=$this->Users->jobs_id();
    $data['all_operation']=$this->Operations->select_all($id);
    $data['mother_national_num']=$id;
    $data['basic_data']=$this->Difined_model->select_search_key('basic','mother_national_num',$id);
    $data['subview'] = 'admin/family/family_edit/basic';
        $this->load->view('admin_index', $data);  
   }
 //--------------------------------------  
   public function update_basic($id){
         $this->load->model("Difined_model");
         $this->load->model("family_models/Register");
    $data['mother_national_num']=$id;
    if($this->input->post('updated')){
      $this->Register->updated($id);
       redirect('Family/basic/'.$id);
    }
    $data['basic_data']=$this->Difined_model->select_search_key('basic','mother_national_num',$id);
    $data['subview'] = 'admin/family/family_edit/basic_edit';
        $this->load->view('admin_index', $data);  
   }
   //-----------------------------------
   public function update_pass($id){
      $this->load->model("family_models/Register");
     if($this->input->post('change')){
          $this->Register->update_pass($id);
           redirect('Family/basic/'.$id);
     }
    }
   
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
     public function update_father($id){
        $this->load->model('family_models/Father');
        $this->load->model('Nationality');
        if($this->input->post('update_father')){
            $this->Father->update($id);
           redirect('Family/update_mother/'.$id);
        }
        $data['nationality']=  $this->Nationality->select();
        $data['result'] = $this->Father->getById($id);
        $data['subview'] = 'admin/family/family_edit/father_edit';
        $this->load->view('admin_index', $data);
    }
      
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
 
public function update_mother($id){
    $this->load->model('family_models/Mother');
    $this->load->model('Difined_model');
    $this->load->model('Nationality');
    $this->load->model('Job_titles');
    $data['nationality']=  $this->Nationality->select();
    $data['job_titles']=  $this->Job_titles->select();
    if($this->input->post('update')){
        $this->Mother->update($id);
        redirect('Family/update_family_members/'.$id);
    }
    $data['result']=$this->Difined_model->select_search_key('mother','mother_national_num_fk',$id);
    $data['subview'] = 'admin/family/family_edit/mother_edit';
    $this->load->view('admin_index',$data);
}

      
  /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
   public function update_family_members($id){
        $this->load->model("Difined_model");
        $this->load->model("family_models/Register");
    $data['mothers_data']=$this->Register->select_data();
    $data['mother_national_num']=$id;
    $data['member_data']=$this->Difined_model->select_search_key('f_members','mother_national_num_fk',$id);
    $data['subview'] = 'admin/family/family_edit/family_members_edit';
        $this->load->view('admin_index', $data);  
    
   }
   //------------------------------------------------------
   public function add_member($mother_id){
     $this->load->model("Difined_model");
     $this->load->model("family_models/Family_members");
      if($this->input->post('add_member')){
          $member_sechool_img='member_sechool_img';
          $member_birth_card_img='member_birth_card_img';
         $file['member_sechool_img']= $this->upload_file($member_sechool_img);
         $file['member_birth_card_img']= $this->upload_file($member_birth_card_img);
         $this->Family_members->insert($file,$mother_id);
        redirect('Family/update_family_members/'.$mother_id);  
    }
    $data['nationalities']=$this->Difined_model->select_search_key('nationality',"id!=",0);
    $data['mother_national_num_fk']=$mother_id;
          $mother_ids=(string) $mother_id;
          $arr_condetion=array("mother_national_num_fk"=>$mother_ids);
      $data['fathers']=$this->Difined_model->slect_where('father',$arr_condetion,"","","id","DESC");
      $data['subview'] = 'admin/family/family_edit/one_member_add';
        $this->load->view('admin_index', $data); 
   }
   //------------------------------------------------------
   public function update_one_member($id,$mother_id){
     $this->load->model("Difined_model");
     $this->load->model("family_models/Family_members");
         $mother_ids=(string) $mother_id;
     if($this->input->post('edit_member')){
            $member_sechool_img='member_sechool_img';
            $member_birth_card_img='member_birth_card_img';
              $file['member_sechool_img']= $this->upload_file($member_sechool_img);
              $file['member_birth_card_img']= $this->upload_file($member_birth_card_img);
                
           $this->Family_members->update_member($id,$file);
          redirect('Family/update_family_members/'.$mother_id);
     }     
      $data['nationalities']=$this->Difined_model->select_search_key('nationality',"id!=",0);
      $data['result']=$this->Difined_model->getById('f_members',$id);
               $arr_condetion=array("mother_national_num_fk"=>$mother_ids);
      $data['fathers']=$this->Difined_model->slect_where('father',$arr_condetion,"","","id","DESC");
      $data['subview'] = 'admin/family/family_edit/one_member_edit';
        $this->load->view('admin_index', $data);  
   }
   //------------------------------------------------------
   public function delete_member($id,$mother_id){
    $this->load->model("Difined_model");
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("f_members",$Conditions_arr);
    redirect('Family/update_family_members/'.$mother_id);
   }

   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */   
 public function update_house($id){
    $this->load->model('Department');
    $this->load->model('family_models/House');
    $this->load->model('Difined_model');
    $data['employ_main_depart'] = $this->Department->select_employ_main_dep();
    $data['employ_sub_depart'] = $this->Department->select_employ_sub_dep();
    $data['main_depart'] = $this->Department->select_all();
    $data['sub_depart'] = $this->Department->select_employ_sub_dep();
    if($this->input->post('update')){
        $this->House->update($id);
        redirect('family/update_money/'.$id);
    }
    $data['result'] = $this->House->getById($id);
    $data['subview'] = 'admin/family/family_edit/building_edit';
    $this->load->view('admin_index', $data);
}
   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */       public function update_money($id){
        $this->load->model('family_models/Money');
        if($this->input->post('update_money')){
          $this->Money->update($id);
         redirect('Family/update_devices/'.$id);
        }
        $data['result'] = $this->Money->getById($id);
        $data['subview'] = 'admin/family/family_edit/money_edit';
        $this->load->view('admin_index', $data);
    }

   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
   public function update_devices($id){

    $this->load->model('family_models/Devices');
    $this->load->model('Difined_model');
    $data['devices'] = $this->Difined_model->select_all('electrical_equipment','','',"id","asc");
    $mother_ids=(string) $id;
    $arr_condetion=array("mother_national_num_fk"=>$mother_ids);
    $data['result']=$this->Difined_model->slect_where('devices',$arr_condetion,"","","id","DESC");
    $data['mother_id']=$id;
    if ($this->input->post('num')){
        $data['id']=$this->input->post('num');
        $this->load->view('admin/family/family_edit/get_device_edit',$data);
    }elseif($this->input->post('update')){

        $this->Devices->update($id);
        redirect('Family/researcher_opinion/'.$id);
    }else{
        $data['subview'] = 'admin/family/family_edit/devices_edit';
        $this->load->view('admin_index',$data);
    }
   }

//--------------------------------------------
    public function delete_device($from, $index,$id,$mother_national_num_fk )
    {
    $this->load->model('family_models/Devices');
    $this->Devices->delete($from, $id);
    redirect('Family/'.$index.'/'.$mother_national_num_fk);
   }
     /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */ 
    public function update_attach_files($id){
        $this->load->model("family_models/Attach_files");  
        $data['mother_national_num_fk']=$id;
        if($this->input->post('UPDATE')){
              $death_certificate='death_certificate';
          $files=$this->upload_file($death_certificate);
            $files['family_card']=$this->upload_file('family_card');
            $files['plowing_inheritance']=$this->upload_file('plowing_inheritance');
            $files['instrument_agency_with_orphans']=$this->upload_file('instrument_agency_with_orphans');
            $files['birth_certificate']=$this->upload_file('birth_certificate');
            $files['ownership_housing']=$this->upload_file('ownership_housing');
            $files['definition_school']=$this->upload_file('definition_school');
            $files['social_security_card']=$this->upload_file('social_security_card');
            $files['retirement_department']=$this->upload_file('retirement_department');
            $files['social_insurance']=$this->upload_file('social_insurance');
            $files['bank_statement']=$this->upload_file('bank_statement');
         $this->Attach_files->update_files($files,$id);
           redirect('Family/update_attach_files/'.$id); 
        }
        $data['subview'] = 'admin/family/family_edit/attach_files_edit';
        $this->load->view('admin_index', $data);       
    }
   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */ 
   
   public function researcher_opinion($id){
    $this->load->model("Difined_model");
  
      $this->load->model("family_models/Researcher_opinion");
    $data['mother_national_num']=$id;
         $result=$this->Researcher_opinion->getById($id);
         if(is_array($result)){
         $data['result']=$result;    
         }
    if($this->input->post('add')){
        
        $researcher_name='';$family_leader_name='';
          if($_SESSION['status']==0 && $_SESSION['dep_job_id_fk']==3 ){
            $researcher_name=$_SESSION['user_username'];
          }elseif($_SESSION['status']==1 && $_SESSION['dep_job_id_fk']==3){
            $family_leader_name=$_SESSION['user_username'];
          }
        $this->Researcher_opinion->inserted($id,$researcher_name,$family_leader_name);
        redirect('Family/basic/'.$id);
        }
    if($this->input->post('update')){
    
          $researcher_name='';$family_leader_name='';
          if($_SESSION['status']==0 && $_SESSION['dep_job_id_fk']==3 ){
            $researcher_name=$_SESSION['user_username'];
          }elseif($_SESSION['status']==1 && $_SESSION['dep_job_id_fk']==3){
            $family_leader_name=$_SESSION['user_username'];
          }
        $this->Researcher_opinion->updated($id,$researcher_name,$family_leader_name);
           redirect('Family/basic/'.$id);
       } 
   $data['subview'] = 'admin/family/family_edit/researcher_opinion';
   $this->load->view('admin_index', $data);  
   }
 
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *   
 * ===============================================================================================================
 */   
  
 public function family_details($id){
       $this->load->model('family_models/Father');
       $this->load->model('family_models/Mother');
       $this->load->model('family_models/House');
       $this->load->model("family_models/Register");
       $this->load->model('family_models/Money');
       $this->load->model('family_models/Devices');
       $this->load->model("family_models/Operations");
       $this->load->model("family_models/Researcher_opinion");
       $this->load->model('Nationality');
       $this->load->model('Job_titles');   
       $this->load->model('Department');
       $this->load->model("Difined_model");
       $this->load->model("Users");
        $data['is_active']=1; 
      //================ 
     if($_SESSION['from_id_fk'] != 1){
                if($_SESSION['status'] == 0 ){
               $data['convent']=$this->Difined_model->select_search_key('department_jobs','from_id_fk',$_SESSION['from_id_fk']);   
             }elseif($_SESSION['status'] == 1){
                $condetion_arr=array('from_id_fk <='=> $_SESSION['from_id_fk'],'from_id_fk !='=> 0 );
                $data['convent']=$this->Difined_model->slect_where('department_jobs',$condetion_arr,'','','','');
             }     
     }if($_SESSION['from_id_fk'] == 1){
                $condetion_arr=array('from_id_fk >='=> 2,'from_id_fk ='=> 3 );
                $data['convent']=$this->Difined_model->slect_where('department_jobs',$condetion_arr,'','','','');
     }
     //================
      
       $mother_ids=(string) $id;
       $arr_condetion=array("mother_national_num_fk"=>$mother_ids);
    $data['all_operation']=$this->Operations->select_all($id); 
    $data['jobs_name']=$this->Users->jobs_id();
    $data['mother_id']=$id;  
    $data['employ_main_depart'] = $this->Department->select_employ_main_dep();
    $data['employ_sub_depart'] = $this->Department->select_employ_sub_dep();
    $data['main_depart'] = $this->Department->select_all();
    $data['sub_depart'] = $this->Department->select_employ_sub_dep();   
    $data['mothers_data']=$this->Register->select_data();
    $data['mother_national_num']=$id;
    $data['member_data']=$this->Difined_model->select_search_key('f_members','mother_national_num_fk',$id);
    $data['job_titles']=  $this->Job_titles->select();
    $data['basic_data']=$this->Difined_model->select_search_key('basic','mother_national_num',$id);
    $data['nationality']=  $this->Nationality->select();
    $data['result_father'] = $this->Father->getById($id);
    $data['result_mother']=$this->Difined_model->select_search_key('mother','mother_national_num_fk',$id);  
    $data['result_house'] = $this->House->getById($id); 
    $data['result_money'] = $this->Money->getById($id);
    $data['result_devices']=$this->Difined_model->slect_where('devices',$arr_condetion,"","","id","DESC");
    $data['result_opinion']=$this->Researcher_opinion->getById($id);  
  //  $this->test($data['result_opinion']);  
    $data['subview'] = 'admin/family/family_details';
      $this->load->view('admin_index',$data);  
   }  
//---------------------------------
     public function one_member_details($mother_id,$member_id){
        $this->load->model("family_models/Family_members");
        $this->load->model("Difined_model");
            $mother_ids=(string) $mother_id;
            $arr_condetion=array("mother_national_num_fk"=>$mother_ids);
     $data['result']=$this->Difined_model->getById('f_members',$member_id);
     $data['fathers']=$this->Difined_model->slect_where('father',$arr_condetion,"","","id","DESC");
     $data['subview'] = 'admin/family/family_details/one_member_details';
      $this->load->view('admin_index',$data);    
     } 

/**
 * ===============================================================================================================
 * 
 * ========================                 التحيل و القبول و الرفض                 ==============================
 * 
 * ===============================================================================================================
 */ 
 public function operation($process,$page,$mother_national_num){
    $this->load->model("family_models/Operations");
    if($this->input->post('operation')){
        $this->Operations->insert_op($process,$mother_national_num);
        if($process ==4){
             $this->Operations->approved_basic(1,$mother_national_num);
        }
        
        redirect('Family/'.$page.'/'.$mother_national_num, 'refresh');
    }
    
 }
 
/**
 * ===============================================================================================================
 * 
 * ========================                خدمات اللاسرة                 =========================================
 * 
 * ===============================================================================================================
 */ 
public function family_services(){
    $this->load->model('Difined_model');
    $this->load->model('family_models/Service');
    $this->load->model('family_models/Operation_service');
    $data['last_oper'] = $this->Operation_service->select_last_operation();
    $data['get_job_name'] = $this->Operation_service->get_job_name();
    $data['sub_service'] = $this->Service->select();
    $data['all_records'] = $this->Difined_model->select_all('all_services_orders','','','id','desc');
    $data['get_service_name'] = $this->Service->get_sub_name();
    $this->load->model('family_models/Mother');
    $data['get_mother'] = $this->Mother->get_mother_name();
    $data['main_service'] = $this->Difined_model->select_search_key('service_setting','main_service_id',0);
    if ($this->input->post('valu')){
        $data['id']=$this->input->post('valu');
        $this->load->view('admin/family/get_sub_service',$data);
    }elseif ($this->input->post('number')){
        $data['id']=$this->input->post('number');
        $this->load->view('admin/family/check_number',$data);
    }else{
        $data['subview'] = 'admin/family/family_services';
        $this->load->view('admin_index', $data);

    }
}
//-----------------------------------------------------

//-----------------------------------------------------
public function services_type(){
    $this->load->model('family_models/Service');
    $this->load->model('Difined_model');
    $this->load->model('Nationality');
    $this->load->model('Department');
    $this->load->model('family_models/Mother');
    $this->load->model('family_models/Family_members');
    $data['courses'] = $this->Difined_model->select_all('courses','','','id','asc');
    $data['school_requirement'] = $this->Difined_model->select_all('school_requirement','','','id','asc');
    $data['home_repair_type'] = $this->Difined_model->select_all('home_repair_type','','','id','asc');
    $data['count'] = $this->Service->count_services($this->input->post('mother_national_id_fk'));
    $data['main_service'] = $this->Service->select_main();
    $data['sub_service'] = $this->Service->select_sub();
    $data['devices'] = $this->Service->select_devices();
    $data['nationality']=  $this->Nationality->select();
    $data['main_depart'] = $this->Department->select_all();
    $data['get_mother'] = $this->Mother->get_mother_name();
    $data['get_family_members'] = $this->Family_members->get_family_members();
    $data['subview'] = 'admin/family/family_services';
    
    if($this->input->post('main_service')){
       if(isset($_POST['sub_service'])){
         $arr_out=$this->Service->getById($this->input->post('sub_service'));
         $types=$arr_out['title'];
          $data['get_main_service_name'] = $this->Service->getById($this->input->post('main_service'));
          $data['main_service_name'] = $data['get_main_service_name']['main_service_name'];
           $data['service_name']=$arr_out['sub_service_name'];
       }else{
         $arr_out=$this->Service->getById($this->input->post('main_service'));
          $types=$arr_out['title'];
           $data['get_main_service_name'] = $this->Service->getById($this->input->post('main_service'));
           $data['main_service_name'] = $data['get_main_service_name']['main_service_name'];
            $data['service_name']=$arr_out['main_service_name'];
       }
     $data['subview'] = 'admin/services/'.$types;
    }
    
    $this->load->view('admin_index', $data);

}
//-----------------------------------------------------
public  function insert_services($mother_national_id_fk,$main_service,$sub_service){
    $this->load->model('family_models/Service');
    if($this->input->post('add')){
        //==========files==============
        $device_img ='device_img';
        $device_file = $this->upload_file($device_img);
        $proofed_date_file='proofed_date_file';
        $proofed_file = $this->upload_file($proofed_date_file);
        $fatora_img='fatora_img';
        $fatora_file = $this->upload_file($fatora_img);
        $medicine_device_file_attachment='medicine_device_file_attachment';
        $medicine_device_file = $this->upload_file($medicine_device_file_attachment);
        $car_repair_fatora_img='car_repair_fatora_img';
        $car_repair_file = $this->upload_file($car_repair_fatora_img);
        $car_num_img='car_num_img';
        $car_num_file = $this->upload_file($car_num_img);
        $repair_device_img='repair_device_img';
        $repair_device_file = $this->upload_file($repair_device_img);
        $home_img ='home_img';
        $home_file =$this->upload_file($home_img);
        //====================help_marriage==============//
        $family_card ='family_card';
        $family_card_file =$this->upload_file($family_card);
        $marriage_contract ='marriage_contract';
        $marriage_contract_file =$this->upload_file($marriage_contract);
        $identity_img ='identity_img';
        $identity_img_file =$this->upload_file($identity_img);
        $personal_picture ='personal_picture';
        $personal_picture_file =$this->upload_file($personal_picture);
        $hall_contract ='hall_contract';
        $hall_contract_file =$this->upload_file($hall_contract);
        $definition_of_salary ='definition_of_salary';
        $definition_of_salary_file =$this->upload_file($definition_of_salary);
        $imam_recommendation ='imam_recommendation';
        $imam_recommendation_file =$this->upload_file($imam_recommendation);
        //==================================//
        $course_employment_cv_file ='course_employment_cv_file';
        $course_employment_cv_file =$this->upload_file($course_employment_cv_file);
        $course_employment_qualification_file ='course_employment_qualification_file';
        $course_employment_qualification_file =$this->upload_file($course_employment_qualification_file);
        //==================================//
        $this->Service->insert($mother_national_id_fk,$main_service,$sub_service,$device_file,$proofed_file,$fatora_file,$medicine_device_file,$car_repair_file,$car_num_file,$repair_device_file,$home_file,$family_card_file,$marriage_contract_file,$identity_img_file,$personal_picture_file,$hall_contract_file,$definition_of_salary_file,$imam_recommendation_file,$course_employment_cv_file,$course_employment_qualification_file);
        redirect('family/family_services/');
    }
}
//-----------------------------------------------------
public function service_details($id){
    $this->load->model('Difined_model');
    $this->load->model('family_models/Service');
    $this->load->model('family_models/Mother');
    $this->load->model('Users');
    $this->load->model('family_models/Operation_service');
    $data['check_app'] =$this->Operation_service->getById($id);
   /* if($data['check_app']['approved'] == 4){
      $data['all_operations'] = $this->Operation_service->select_all_operations_except();
    }else {
        $data['all_operations'] = $this->Operation_service->select_all_operations();
    }*/
      $data['all_operations'] = $this->Difined_model->select_search_key('operation_service','order_id_fk',$id);
    $data['get_job_name'] = $this->Operation_service->get_job_name();
    $data['sevice_details'] = $this->Difined_model->getById('all_services_orders',$id);
    $data['get_service_name'] = $this->Service->get_sub_name();
    $data['get_mother'] = $this->Mother->get_mother_name();
    $data['count'] = $this->Service->count_services( $data['sevice_details']['mother_national_id_fk']);
    //==========sections==
    $data['devices'] = $this->Service->select_devices();
    $data['school_requirement'] = $this->Difined_model->select_all('school_requirement','','','id','asc');
    $data['home_repair_type'] = $this->Difined_model->select_all('home_repair_type','','','id','asc');
    //===============
    $user=$this->Users->getBy($_SESSION['role_id_fk']);
    if($user['status'] == 0 ){
        $data['convent']=$this->Difined_model->select_search_key('department_jobs','from_id_fk',$user['from_id_fk']);
    }elseif($user['status'] == 1){
        $condetion_arr=array('from_id_fk >='=> $user['from_id_fk'],'from_id_fk !='=> 0 );
        $data['convent']=$this->Difined_model->slect_where('department_jobs',$condetion_arr,'','','','');
    }
    $data['subview'] = 'admin/services/service_details';
    $this->load->view('admin_index', $data);
}

//--------------------------------------------
public function operation_service($process,$mother_national_num,$id){
    $this->load->model("family_models/Operation_service");
    if($this->input->post('operation_service')){
        $this->Operation_service->insert($process,$mother_national_num,$id);
        redirect('Family/family_services', 'refresh');
    }
}
 /**
 * ===============================================================================================================
 *
 *
 *
 * ===============================================================================================================
 */
    public function certified_services(){
        $this->load->model('family_models/Operation_service');
        $this->load->model('family_models/Service');
        $data['select_all_operations'] = $this->Operation_service->select_all_operations_except();
        $data['all_certified_operations'] = $this->Operation_service->select_all_certified();
        $data['select_id']=$this->Service->select_id();
        $data['service_type']=$this->Service->select_type();
        $data['all'] = $this->Operation_service->select_all();
        if ($this->input->post('valu')){
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/services/get_table',$data);
        }else{
            $data['subview'] = 'admin/services/certified_services';
            $this->load->view('admin_index', $data);
        }

    }
    //====================================certified_services_details
    public function certified_services_details($id){
        $this->load->model('Difined_model');
        $this->load->model('family_models/Service');
        $this->load->model('family_models/Mother');
        $this->load->model('Users');
        $this->load->model('family_models/Operation_service');
        $data['all_operations'] = $this->Operation_service->select_all_operations();
        $data['get_job_name'] = $this->Operation_service->get_job_name();
        $data['sevice_details'] = $this->Difined_model->getById('all_services_orders',$id);
        $data['get_service_name'] = $this->Service->get_sub_name();
        $data['get_mother'] = $this->Mother->get_mother_name();
        $data['count'] = $this->Service->count_services( $data['sevice_details']['mother_national_id_fk']);
        $data['devices'] = $this->Service->select_devices();
        $data['school_requirement'] = $this->Difined_model->select_all('school_requirement','','','id','asc');
        $data['home_repair_type'] = $this->Difined_model->select_all('home_repair_type','','','id','asc');
        $data['subview'] = 'admin/services/certified_services_details';
        $this->load->view('admin_index', $data);
    }
    //=====================================================================
    public function services_archive(){
        $this->load->model('family_models/Operation_service');
        $this->load->model('Difined_model');
        $this->load->model('family_models/Service');
        $data['select_all_operations'] = $this->Operation_service->select_all_operations();
        $data['all_operations'] = $this->Difined_model->select_all('operation_service','','','','');
        $data['select_id']=$this->Service->select_id();
        $data['service_type']=$this->Service->select_type();
        $data['all'] = $this->Operation_service->select_all();
        if ($this->input->post('valu')){
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/services/get_services_archive',$data);
        }else{
            $data['subview'] = 'admin/services/services_archive';
            $this->load->view('admin_index', $data);
        }

    }
    //=====================================================================









 /**
 * ===============================================================================================================
 * 
 * =================================  الاسر المعتمدة =============================================================
 * 
 * ===============================================================================================================
 */ 
 public function approved_family(){
     $this->load->model("Difined_model");
      $this->load->model("family_models/Register");
      $this->load->model("family_models/Operations");
      $this->load->model("Users");
        $data['all_family']=$this->Register->family(1);
        $data['jobs_name']=$this->Users->jobs_id();
        $data['last_state']=$this->Operations->last_statues();
        $data['subview'] = 'admin/family/approved_family';
        $this->load->view('admin_index', $data);
 }

  /**
 * ===============================================================================================================
 * 
 * =================================  ارشيف الاسر ================================================================
 * 
 * ===============================================================================================================
 */ 
  public function archives_family(){
     $this->load->model("Difined_model");
      $this->load->model("family_models/Register");
      $this->load->model("family_models/Operations");
      $this->load->model("Users");
        $data['all_family']=$this->Register->all_archive();
        $data['jobs_name']=$this->Users->jobs_id();
        $data['last_state']=$this->Operations->last_statues();
        $data['subview'] = 'admin/family/archives_family';
        $this->load->view('admin_index', $data);
 }
 
}// END CLASS 