<?php
class Web extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
    }
 //----------------------------   
    private  function test($data=array()){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
  //----------------------------
    private function thumb($data){
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
//----------------------------
    private  function upload_image($file_name){
    $config['upload_path'] = 'uploads/images';
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
    $config['max_size']    = '1024*8';
    $config['encrypt_name']=true;
    $this->load->library('upload',$config);
    if(! $this->upload->do_upload($file_name)){
      //  $error = array('error' => $this->upload->display_errors());
      return  false;
    }else{
        $datafile = $this->upload->data();
        $this->thumb($datafile);
       return  $datafile['file_name'];
    }
}
//----------------------------
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
          //  $error = array('error' => $this->upload->display_errors());
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
//----------------------------
    private function url (){
     unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
//----------------------------
  private function cheek_link(){
   $this->load->model('Difined_model');
         $key=$_SESSION['mother_national_num'];
         $arr_in=array("mother_national_num_fk"=>$key);
     $cheek_value["father"]=$this->Difined_model->getByArray("father",$arr_in);
     $cheek_value["f_members"]=$this->Difined_model->getByArray("f_members",$arr_in);
     $cheek_value["houses"]=$this->Difined_model->getByArray("houses",$arr_in);
     $cheek_value["mother"]=$this->Difined_model->getByArray("mother",$arr_in);
     $cheek_value["financial"]=$this->Difined_model->getByArray("financial",$arr_in); 
     $cheek_value["devices"]=$this->Difined_model->getByArray("devices",$arr_in); 
     $cheek_value["family_attach_files"]=$this->Difined_model->getByArray("family_attach_files",$arr_in);
    return $cheek_value;
  }
/**
 *  ================================================================================================================
 * 
 *  ----------------------------------------------------------------------------------------------------------------
 * 
 * -----------------------------------------------------------------------------------------------------------------
 */

    public function  index(){
        
        $data['subview'] = 'web/home';
        $this->load->view('web_index', $data);
    }
    
  /**
     * =============================================================================================================
     * 
     *                                                       البيانت الاساسية
     * =============================================================================================================
     */  
   public function read_instructions(){
    if($this->input->post('add_register')){
           redirect('web/Add_Register'); 
    }
      $data['subview'] = 'web/family/instructions';
      $this->load->view('web_index', $data);  
   }
  //------------------------------------------ 
  public function Add_Register(){
     $this->load->model("family_models/Register");
     $this->load->model("Difined_model");
     if($this->input->post('register')){
      $this->Register->inserted(); 
           $userdata['user_name']=$this->input->post('user_name');
           $userdata['mother_national_num']=$this->input->post('mother_national_num');
           $userdata['mother_mob']=$this->input->post('mother_mob');
           $userdata['is_logged_user']=true;
            $this->session->set_userdata($userdata);
      redirect('web/basic');
     }
     if($this->input->post('mother_national_num_chik')){
        $arr["in"]=$this->Difined_model->select_search_key('basic','mother_national_num',$this->input->post('mother_national_num_chik'));
        $this->load->view('web/family/load', $arr);  
     }else{
      $data['subview'] = 'web/family/Add_Register';
      $this->load->view('web_index', $data);  
     }
      
  }
  
  //-----------------------------------------
    public  function check_login_Register(){
        $this->load->model('family_models/Register');
        $userdata=$this->Register->check_regester_data();
        if($userdata !=''){
            $userdata['is_logged_user']=true;
            $this->session->set_userdata($userdata);
              redirect('Web/basic');
        }else{
           $_SESSION['message']= '<script>alert("خطأ فى ادخال البيانات");</script>';
            redirect('Web');
        }
    }
    //-------------------------------------
    public function logout_Register(){
        $this->session->sess_destroy();
        redirect('Web','refresh');
    }

  
/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
    public function basic(){
      
                
      $data['all_links']=$this->cheek_link();
      $data['basic_active']=1;
      $data['header_title']='البيانات الاساسية';   
      $data['subview'] = 'web/family/basic';
      $this->load->view('web_index', $data);  
    }
/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
  public function  father(){
        $this->load->model('family_models/Father');
        $this->load->model('Nationality');
        $data['all_links']=$this->cheek_link();
        $data['nationality']=  $this->Nationality->select();
        //--------------------------------------
        if($this->input->post('add')){
            $this->Father->insert();
             redirect('web/mother');
        }
        if($this->input->post('add_save')){
            $this->Father->insert();
             redirect('web/logout_Register');
        }
        //-------------------------------------
        if($this->input->post('update')){
            $this->Father->update($_SESSION['mother_national_num']);
             redirect('web/mother');
        }
        if($this->input->post('update_save')){
            $this->Father->update($_SESSION['mother_national_num']);
             redirect('web/logout_Register');
        }
        //-------------------------------------
        
        $data['father_active']=1; 
        $data['header_title']='بيانات الأب';  
        $data['subview'] = 'web/family/father';
        $this->load->view('web_index', $data);
    }

/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
public function  mother(){

    $this->load->model('family_models/Mother');
    $this->load->model('Nationality');
    $this->load->model('Job_titles');
    $this->load->model('Difined_model');
    
    $data['all_field']=$this->Difined_model->get_field('mother');
    $data['all_links']=$this->cheek_link();
    $data['nationality']=  $this->Nationality->select();
    $data['job_titles']=  $this->Job_titles->select();
    $data['header_title']='بيانات الأم';
    $data['mother_active']=1;
    //----------------------
       if($this->input->post('add')){
           $this->Mother->insert();
           redirect('web/family_members');
       }
        if($this->input->post('add_save')){
           $this->Mother->insert();
           redirect('web/logout_Register');  
        }
    //---------------------
    if($this->input->post('update')){
           $this->Mother->update( $_SESSION['mother_national_num']);
           redirect('web/family_members');
       }
        if($this->input->post('update_save')){
           $this->Mother->update( $_SESSION['mother_national_num']);
           redirect('web/logout_Register');  
        }
   //----------------------         
    $data['subview'] = 'web/family/mother';
    $this->load->view('web_index', $data);
    
}

/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    


 public function family_members(){
   $this->load->model("family_models/Family_members");
   $this->load->model('Difined_model');
   $this->load->model("family_models/Register");
   
    if($this->input->post('add_one_member')){
          $member_sechool_img='member_sechool_img';
          $member_birth_card_img='member_birth_card_img';
         $file['member_sechool_img']= $this->upload_file($member_sechool_img);
         $file['member_birth_card_img']= $this->upload_file($member_birth_card_img);
    
         $this->Family_members->insert($file,$_SESSION['mother_national_num']);
        redirect('web/family_members');  
    }
    $data['mothers_data']=$this->Difined_model->select_search_key('mother',"mother_national_num_fk ",$_SESSION['mother_national_num']);
    $data['father_table']=$this->Difined_model->select_search_key('father',"mother_national_num_fk ",$_SESSION['mother_national_num']);       
    $data['member_data']=$this->Difined_model->select_search_key('f_members','mother_national_num_fk',$_SESSION['mother_national_num']);
    $data['all_links']=$this->cheek_link();
    $data['nationalities']=$this->Difined_model->select_search_key('nationality',"id!=",0);
    $data['header_title']='بيانات أفراد الاسرة';
    $data['members_active']=1;
    $data['subview'] = 'web/family/family_members';
    $this->load->view('web_index', $data); 
   }
  //-----------------------------  
     public function delete_member($id){
    $this->load->model("Difined_model");
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("f_members",$Conditions_arr);
    redirect('web/family_members');
   }
/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */   
 public function  house(){
   $this->load->model('family_models/House');
   $this->load->model('Department');
   $this->load->model('Difined_model'); 
    $data['all_links']=$this->cheek_link();
    $data['all_field']=$this->Difined_model->get_field('houses');    
    $data['employ_main_depart'] = $this->Department->select_employ_main_dep();
    $data['employ_sub_depart'] = $this->Department->select_employ_sub_dep();
    $data['main_depart'] = $this->Department->select_all();
    $data['header_title']='بيانات السكن';
    $data['house_active']=1;
    if ($this->input->post('valu')){
        $data['id']=$this->input->post('valu');
        $this->load->view('web/family/main_dep',$data);
    }elseif($this->input->post('add')){
        $this->House->insert();
        redirect('web/money','refresh');
    }elseif($this->input->post('add_save')){
        $this->House->insert();
        redirect('web/logout_Register'); 
    }elseif($this->input->post('update')){
        $this->House->update( $_SESSION['mother_national_num']);
          redirect('web/money','refresh'); 
    }elseif($this->input->post('update_save')){
        $this->House->update( $_SESSION['mother_national_num']);
           redirect('web/logout_Register');  
    }else{
        $data['subview'] = 'web/family/building';
        $this->load->view('web_index', $data);
    }
} 
 
/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
    public function  money(){
        $this->load->model('family_models/Money');
       //----------------------
       if($this->input->post('add')){
           $this->Money->insert();
           redirect('web/devices');
       }
        if($this->input->post('add_save')){
           $this->Money->insert();
           redirect('web/logout_Register');  
        }
    //---------------------
    if($this->input->post('update')){
           $this->Money->update( $_SESSION['mother_national_num']);
           redirect('web/devices');
       }
        if($this->input->post('update_save')){
           $this->Money->update( $_SESSION['mother_national_num']);
           redirect('web/logout_Register');  
        }
   //---------------------- 
        $data['all_links']=$this->cheek_link();
        $data['all_field']=$this->Difined_model->get_field('financial');  
        $data['header_title']='البيانات المالية';
        $data['money_active']=1;
        $data['subview'] = 'web/family/money';
        $this->load->view('web_index', $data);
    }
/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    

public function  devices(){
    $this->load->model('family_models/Devices');
    $this->load->model('Difined_model');
    $data['devices'] = $this->Difined_model->select_all('electrical_equipment','','',"id","asc");
    $data['result']=$this->Difined_model->select_search_key('devices',"mother_national_num_fk ",$_SESSION['mother_national_num']);
    $data['devices_name']=$this->Devices->select_ids();
    $data['all_links']=$this->cheek_link();
    $data['basic_active']=1;
    $data['header_title']='البيانات الاساسية';
    if ($this->input->post('num')){
        $data['id']=$this->input->post('num');
        $this->load->view('web/family/get_device',$data);
    }elseif($this->input->post('add')){
        $this->Devices->insert();
        redirect('web/attach_files','refresh');
    }else {
        $data['subview'] = 'web/family/devices';
        $this->load->view('web_index', $data);
    }
}
//------------------------------------
   public function delete_device($id){
     $this->load->model("Difined_model");
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("devices",$Conditions_arr);
    redirect('web/devices');
   }

/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
 public function attach_files(){
     $this->load->model('family_models/Attach_files');
    if($this->input->post("ADD")){
            $files['death_certificate']=$this->upload_file('death_certificate');
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
      $this->Attach_files->insert_files($files,$_SESSION['mother_national_num']);
     redirect('web/final_result','refresh');
    }
    $data['pdf_active']=1;
    $data['all_links']=$this->cheek_link();
    $data['header_title']='رفع الوثائق';
    $data['subview'] = 'web/family/attach_files';
   $this->load->view('web_index', $data);  
 }
 
/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
 public function final_result(){
    
      $data['subview'] = 'web/family/results';
   $this->load->view('web_index', $data);   
 }    
    
    
}// END CLASS 