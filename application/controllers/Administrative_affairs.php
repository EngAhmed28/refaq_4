<?php
class Administrative_affairs extends CI_Controller
{
     public $CI = NULL;
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
         $this->CI = & get_instance();
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->helper(array('url','text','permission','form'));
    }
    private  function test($data=array()){
              echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
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
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    private function url (){
     unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
 //-----------------------------------------   
 private function message($type,$text){
          if($type =='success') {
              return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
          }elseif($type=='wiring'){
              return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
          }elseif($type=='error'){
              return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
          }
        }
/**
 *  ================================================================================================================
 *
 *  ================================================================================================================
 *
 *  ================================================================================================================
 */

    public function  index(){
        $this->load->model('administrative_affairs_models/employee');
        $this->load->model('Difined_model');
        $data['count'] = $this->Difined_model->select_all('employees','','1','id','desc');
        $data['admin'] = $this->employee->select_by();
        $data['departs'] = $this->employee->select_depart();
        $data['records'] = $this->Difined_model->select_all('employees','','','','');
         if($this->input->post('add')){
            $img ='img';
            $img_file =$this->upload_file($img);
            $this->employee->insert($img_file);
            redirect('Administrative_affairs/add_employee', 'refresh');
        }elseif ($this->input->post('admin_num')) {
            $data['id']=$this->input->post('admin_num');
                $this->load->view('admin/administrative_affairs/get_depart',$data);
        }else {
            $data['subview'] = 'admin/administrative_affairs/add_employee';
            $this->load->view('admin_index', $data);
        }

    }
    
    
    
    
   public function  administrative_affairs_setting(){
    
    
      $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['records'] = $this->administrative_affairs_setting->select_all('administrative_affairs_settings','','','','');
      
      
     if($this->input->post('add')){
    $this->administrative_affairs_setting->insert();
    redirect('Administrative_affairs/administrative_affairs_setting', 'refresh');
    }else{
    
    
    
    
           $data['subview'] = 'admin/administrative_affairs/administrative_affairs_setting';
           $this->load->view('admin_index', $data);
        
   }   }
   
   
   
   
    public function   edit_administrative_affairs_setting($id){
      $this->load->model('administrative_affairs_models/administrative_affairs_setting');
      $data['result'] = $this->administrative_affairs_setting->select_search_key('administrative_affairs_settings','id',$id);
               
       if($this->input->post('edit')){
    $this->administrative_affairs_setting->update($id);
    
    redirect('Administrative_affairs/administrative_affairs_setting', 'refresh');       
        
       } else{     $data['subview'] = 'admin/administrative_affairs/administrative_affairs_setting';
           $this->load->view('admin_index', $data);}
   
    }
  
    
public function delete_administrative_affairs_setting($id){
     $this->load->model('administrative_affairs_models/administrative_affairs_setting');
    $Conditions_arr=array("id"=>$id);
    $this->administrative_affairs_setting->delete("administrative_affairs_settings",$Conditions_arr);
    redirect('Administrative_affairs/administrative_affairs_setting');
}
    
    
    
    
    
    
    
 /**
 * ===============================================================================================================
 *
 * =======================================================//add_employee//====================================================
 *
 * ===============================================================================================================
 */


public function  add_employee(){
    $this->load->model('administrative_affairs_models/employee');
    $this->load->model('Difined_model');
  
    $this->load->model('administrative_affairs_models/administrative_affairs_setting');
    $data['affairs_settings_options'] = $this->administrative_affairs_setting->select_all('administrative_affairs_settings','','','','');
      
    $data['count'] = $this->Difined_model->select_all('employees','','1','id','desc');
    $data['admin'] = $this->employee->select_by();
    $data['departs'] = $this->employee->select_depart();
    $data['records'] = $this->Difined_model->select_all('employees','','','','');
    if($this->input->post('add')){
    $img ='img';
    $img_file =$this->upload_file($img);
    $this->employee->insert($img_file);
    redirect('Administrative_affairs/add_employee', 'refresh');
    }elseif ($this->input->post('admin_num')) {
    $data['id']=$this->input->post('admin_num');
    $this->load->view('admin/administrative_affairs/get_depart',$data);
    }else {
    $data['subview'] = 'admin/administrative_affairs/add_employee';
    $this->load->view('admin_index', $data);
    }
}

public function  edit_employee($id){
    $this->load->model('Difined_model');
    $this->load->model('administrative_affairs_models/employee');
   $data['result'] = $this->Difined_model->select_search_key('employees','id',$id);
    $data['count'] = $this->Difined_model->select_all('employees','','1','id','desc');
    $this->load->model('administrative_affairs_models/administrative_affairs_setting');
    $data['affairs_settings_options_FK'] = $this->administrative_affairs_setting->select_all('administrative_affairs_settings','','','','');
    $data['admin'] = $this->employee->select_by();
    $data['departs'] = $this->employee->select_depart();
    $data['update_link']="add_employee";
    if($this->input->post('edit')){
    $img ='img';
    $img_file =$this->upload_file($img);
    $this->employee->update($id,$img_file);
    redirect('Administrative_affairs/add_employee', 'refresh');
    }else{
    $data['subview'] = 'admin/administrative_affairs/add_employee';
    $this->load->view('admin_index', $data);
}
}

public function delete_employee($id){
    $this->load->model("Difined_model");
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("employees",$Conditions_arr);
    redirect('Administrative_affairs/add_employee');
}
 /**
 * ===============================================================================================================
 *
 * ======================================================= add_permits  ==========================================
 *
 * ===============================================================================================================
 */

public function  add_permits(){
    $this->load->model('administrative_affairs_models/Permit');
    $this->load->model('administrative_affairs_models/employee');
    $this->load->model('Difined_model');
    $this->load->model('administrative_affairs_models/administrative_affairs_setting');
$data['group_affairs_id_fk'] = $this->administrative_affairs_setting->select_search_key('employees','emp_code',$_SESSION['emp_code']);

     foreach($data['group_affairs_id_fk'] as $value) {
      $x = $value->group_affairs_id_fk;
      }

$data['affairs_setting'] = $this->administrative_affairs_setting->select_search_key('administrative_affairs_settings','id',$x);
$data['permits'] = $this->administrative_affairs_setting->select_search_key_2('permits','emp_code',$_SESSION['emp_code'],'month',date("m"));

    
    $data['last']=$this->Difined_model->select_last_id("permits");
    $data['select'] = $this->employee->select_employ_();
    $data['job_title'] = $this->employee->select_depart_name();
    $data['records'] = $this->Difined_model->select_all('permits','','','','');
    
    if($this->input->post('add')){
    $this->Permit->insert(1);
    redirect('Administrative_affairs/add_permits', 'refresh');
    }else{
    $data['subview'] = 'admin/administrative_affairs/permits';
    $this->load->view('admin_index', $data);
}
}

        public function  edit_permits($id){
        $this->load->model('Difined_model');
        $this->load->model('administrative_affairs_models/employee');
        $this->load->model('administrative_affairs_models/Permit');
        $data['select'] = $this->employee->select_employ_();
        $data['job_title'] = $this->employee->select_depart_name();
        $data['result'] = $this->Difined_model->select_search_key('permits','id',$id);
        $data['update_link']="add_permits";
        if($this->input->post('edit')){
            $this->Permit->update($id);
            redirect('Administrative_affairs/add_permits', 'refresh');
        }else{
            $data['subview'] = 'admin/administrative_affairs/permits';
            $this->load->view('admin_index', $data);
        }
    }

        public function delete_permits($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("permits",$Conditions_arr);
        redirect('Administrative_affairs/add_permits');
    }
    //================================================================


    public function report()
    {    $this->load->model('administrative_affairs_models/Report');
        $this->load->model('Difined_model');
        $data['records'] = $this->Difined_model->select_all('permits','','','','');
        $this->load->model('administrative_affairs_models/employee');
        $data['select'] = $this->employee->select_depart_sub();
        $data['select_all'] = $this->Report->select_number();
        //==================departments==========================//
        $data['job_title'] = $this->employee->select_depart_name();
        $this->load->model('Departs');
        $data['main_depart'] = $this->Departs->select_dep_name_web();
         //====================================
        if ($this->input->post('type')) {
            if($this->input->post('type') == 'current'){
                $type = 0;
            }else{
                $type =  $this->input->post('type');
            }
            $data['dates'] = $this->Report->select_date($type);
            //==========================================================
            $data['records_acc'] = $this->Report->select_by_type(1);
            $data['dates_acc'] = $this->Report->select_date(1);
            $data['select_last_acc'] = $this->Report->select_last(1);
            //====================================================
            $data['records_ref'] = $this->Report->select_by_type(2);
            $data['dates_ref'] = $this->Report->select_date(2);
            $data['select_last_ref'] = $this->Report->select_last(2);
            //====================================================
            $data['select_all_by_type'] = $this->Report->selectall_by_type(0);
            $data['select_all_by_type_acc'] = $this->Report->selectall_by_type(1);
            $data['select_all_by_type_ref'] = $this->Report->selectall_by_type(2);
            //====================================================
            $data['id']=$this->input->post('type');
            $Conditions_arr =array('permit_status'=>$type);
          $data['all_select'] =$this->Difined_model->slect_where('permits',$Conditions_arr,'date','','','');
            $this->load->view('admin/administrative_affairs/permits_reports/get_report',$data);
        }else {
            $data['subview'] = 'admin/administrative_affairs/permits_reports/report';
            $this->load->view('admin_index', $data);
        }
    }


    public function add_manager_report(){
        $this->load->model('administrative_affairs_models/Report');
        $data['records'] = $this->Report->select_all();
        $data['dates'] = $this->Report->select_date(0);
        $data['select_last'] = $this->Report->select_last();
        $this->load->model('administrative_affairs_models/employee');
        $data['select'] = $this->employee->select_depart_sub();
        $data['select_all'] = $this->Report->select_number();
        $this->load->model('Job_titles');
        $data['job'] = $this->Job_titles->select_employ_job();
        $data['job_title'] = $this->employee->select_depart_name();
        //==================departments==========================//
        $this->load->model('Departs');
        $data['main_depart'] = $this->Departs->select_dep_name_web();
        //==========================================================
        $data['records_acc'] = $this->Report->select_by_type(1);
        $data['dates_acc'] = $this->Report->select_date(1);
        $data['select_last_acc'] = $this->Report->select_last(1);
        //====================================================
        $data['records_ref'] = $this->Report->select_by_type(2);
        $data['dates_ref'] = $this->Report->select_date(2);
        $data['select_last_ref'] = $this->Report->select_last(2);
        //====================================================
        $data['select_all_by_type'] = $this->Report->selectall_by_type(0);
        $data['select_all_by_type_acc'] = $this->Report->selectall_by_type(1);
        $data['select_all_by_type_ref'] = $this->Report->selectall_by_type(2);
        //====================================================
        $data['title'] = 'الأذونات الواردة';
        $data['subview'] = 'admin/administrative_affairs/permits_reports/report';
        $this->load->view('admin_index', $data);
    }

    //=========================================================================
    public function suspendreports(){
        $this->load->model('administrative_affairs_models/Report');
        $this->Report->suspend($_POST['id']);
        $sort ='add_manager_report';
        if(!empty($_POST['sort'])){
            $sort = 'all_perm_report';
        }
        redirect('Administrative_affairs/'.$sort);
    }
//=======================================================================================
/**
 * ===============================================================================================================
 *
 * =======================================================/add_vacation//====================================================
 *
 * ===============================================================================================================
 */
    public function add_vacation(){
        $this->load->model('administrative_affairs_models/Employee');
        $this->load->model('administrative_affairs_models/Vacation');
        $this->load->model('Department');
        $this->load->model('Difined_model');
        $this->load->model('administrative_affairs_models/administrative_affairs_setting');
        $data['year'] = date("Y");
        $data['group_affairs_id_fk'] = $this->administrative_affairs_setting->select_search_key('employees','emp_code',$_SESSION['emp_code']);

        $past_days = 0;
        $total_holiday_remain = 0;
        foreach($data['group_affairs_id_fk'] as $value) {
            $x = $value->group_affairs_id_fk;
            $past_days = $value->past_days;
        }

        $data['affairs_setting'] = $this->administrative_affairs_setting->select_search_key('administrative_affairs_settings','id',$x);
        $holiday_num = 0;
        if(!empty($data['affairs_setting'])){

            foreach($data['affairs_setting'] as $seting) {
                $holiday_num  = $seting->holiday_num;
            }
        }
        $data['vacations'] = $this->administrative_affairs_setting->select_search_key_2('vacations','emp_id',$_SESSION['emp_code'],'year',$data['year']);
        $diff = 0;
        if(!empty($data['vacations'])){

            foreach($data['vacations'] as $vacation) {

                $day_from=$vacation->from_date;
                $day_to= $vacation->to_date;
                $date1 = new DateTime($day_from);
                $date2 = new DateTime($day_to);
                $diff += $date2->diff($date1)->format("%a");

            }}

        $total_holiday_remain = $holiday_num + $past_days - $diff ;
        $data ['total_holiday_remain'] = $total_holiday_remain;
        $data['get_depart_name'] = $this->Employee->select_depart_name();
        $data['admin'] = $this->Employee->select_by();
        $data['employ_name'] = $this->Employee->select_employ_name();
        $data['main_depart'] = $this->Difined_model->select_all('department_jobs','','','','');
        $data['main_depart'] = $this->Department->select_all();
        if($this->input->post('values')){
            $data['id']=$this->input->post('values');
            $this->load->view('admin/administrative_affairs/get_emp_assigned',$data);
        }elseif($this->input->post('valuesx')){
            $data_load['id']=$this->input->post('valuesx');
            $this->load->view('admin/administrative_affairs/emp_vacations_data',$data_load);
        }elseif ($this->input->post('add')){
            $start_date =$_POST['from_date'];
            $end_date =$_POST['to_date'];
            $query_check =$this->db->query('SELECT * FROM `vacations` WHERE  `emp_id`='.$_POST['emp_id'].' And year = '.$data['year'].' AND  ( `from_date` >= '.$start_date.' or `to_date` <= '.$end_date.')');
            $arr=array();
            foreach ($query_check->result() as  $row2) {
                $arr[] =$row2;
            }
            if ( sizeof($arr)< 0) {
                $this->message('error','  لا يمكن الإضافة الموظف لدية أجازة من   '.$start_date  .'  الى  '.$end_date);
                redirect('Administrative_affairs/add_vacation','refresh');
            }else{
                $type =0; if($_SESSION['role_id_fk'] ==3): $type=1; else: $type=2; endif;
                $this->Vacation->insert($type);
                $this->message('success','إضافة أجازة');
                redirect('Administrative_affairs/add_vacation','refresh');
            }

        }else {



            $data['records'] = $this->Vacation->select_all();
            $data['subview'] = 'admin/administrative_affairs/add_vacation';
            $this->load->view('admin_index', $data);
        }
    }

//=================================================
public function delete_vacation($id){
    $this->load->model('administrative_affairs_models/Vacation');;
    $this->Vacation->delete($id);
    redirect('Administrative_affairs/add_vacation','refresh');
}
//=============================================
public function update_vacation($id){
    $this->load->model('administrative_affairs_models/Employee');
    $this->load->model('administrative_affairs_models/Vacation');;
    $this->load->model('Department');
    $data['main_depart'] = $this->Department->select_all();
    if($this->input->post('update')){
        $this->Vacation->update($id);
        $this->message('success','تم التعديل ');
        redirect('Administrative_affairs/add_vacation','refresh');
    }
    $data['update_link']="add_vacation";
    $data['result']=$this->Vacation->getById($id);
    $data['all_empolyees'] = $this->Employee-> select_employ_by_dep();
    $data['admin'] = $this->Employee->select_by();
    $data['employ_name'] = $this->Employee->select_employ_name();
    $data['subview'] = 'admin/administrative_affairs/add_vacation';
    $this->load->view('admin_index', $data);
}
//=============================================================
public function suspend_vacation($id,$clas){
    $this->load->model('administrative_affairs_models/Vacation');
    $this->Vacation->suspend($id,$clas);
    if($clas == 'danger')
        $this->message('success','الأجازة نشط');
    else
        $this->message('success','الأجازة غير نشط');
    redirect('Administrative_affairs/add_vacation');
}
//==================================================
/**
 * 
 * emp_attendace
 * 
 **/
 
 public function emp_attendance(){
    $this->load->model('administrative_affairs_models/Attendance');
    
    if($this->input->post('save')){
        $this->Attendance->insert();
        $this->message('success','إثبات الحضور');
        redirect('Administrative_affairs/emp_attendance','refresh');
    }
    $data['table'] = $this->Attendance->select();
    $data['emps'] = $this->Attendance->get_emps();
    $data['subview'] = 'admin/administrative_affairs/emp_attendance';
    $this->load->view('admin_index', $data);
 }
 
 public function dissuasion($id){
    $this->load->model('administrative_affairs_models/Attendance');
    
    $this->Attendance->update($id);
    $this->message('success','إثبات الإنصراف');
    redirect('Administrative_affairs/emp_attendance','refresh');
 }
 
 public function attendance_upload(){
    $this->load->model('administrative_affairs_models/Attendance');
    
    if($this->input->post('load')){
        mb_internal_encoding('UTF-8');  
        
        $filename = $_FILES['upload']['tmp_name'];             // the original directory of the file.
        $file_name = basename($_FILES['upload']['name']);      // the name of the uploaded file with file extension.
        $type = $_FILES['upload']['type'];                     // the type of the uploaded file. 
        $size = $_FILES['upload']['size'];                     // the size in bytes of the uploaded file.
        $error = $_FILES['upload']['error']; 
      
        if($_FILES['upload']['size'] > 0){
            $file = fopen($filename, "r");
            $this->Attendance->insert_file($file);
            $this->message('success','رفع الملف');
            redirect('Administrative_affairs/attendance_upload','refresh');
        }
        else
            $this->message('danger','الملف تالف');
    }
    $data['table'] = $this->Attendance->select_all();
    $data['subview'] = 'admin/administrative_affairs/attendance_upload';
    $this->load->view('admin_index', $data);
 }
 
 public function R_daily_attendance(){
    $this->load->model('administrative_affairs_models/Attendance');
    
    $data['table'] = $this->Attendance->select_emp();
    $data['subview'] = 'admin/administrative_affairs/permits_reports/R_daily_attendance';
    $this->load->view('admin_index', $data);
 }
 
 public function R_period_attendance(){
    $this->load->model('administrative_affairs_models/Attendance');
    
    if($this->input->post('date_from') && $this->input->post('date_to') && $this->input->post('emp_id')){
        $data['table'] = $this->Attendance->R_period_attendance(strtotime($this->input->post('date_from')),strtotime($this->input->post('date_to')),$this->input->post('emp_id'));
        $this->load->view('admin/administrative_affairs/permits_reports/get_period_attendance',$data);
    }
    else{
        $data['emps'] = $this->Attendance->select_emp();
        $data['subview'] = 'admin/administrative_affairs/permits_reports/R_period_attendance';
        $this->load->view('admin_index', $data);
    }
 }
  /*
     * =======================================================================================================
     *
     * =======================================================================================================
     */
    public function StaffEvaluation(){
     $this->load->model('Difined_model');
     $this->load->model('administrative_affairs_models/Evaluation');
     if($this->input->post('ADD')){
         $this->Evaluation->insert_emp_eval();
         redirect('Administrative_affairs/StaffEvaluation','refresh');
     }
     $data['table']=$this->Evaluation->select_all();
     //$this->test($data['table']);
     $data['eval_setting']=$this->Difined_model->select_all("evaluation_setting","","","id","DESC");
     $data['employees']=$this->Difined_model->select_all("employees","","","id","DESC");
     $data['title'] = 'تقييم الموظفين';
     $data['subview'] = 'admin/administrative_affairs/staff_evaluation';
     $this->load->view('admin_index', $data);
 }
    //--------------------------------------------------------
    public function UpdateStaffEvaluation($emp_id,$evaluation_date,$date_s){
        $this->load->model('Difined_model');
        $this->load->model('administrative_affairs_models/Evaluation');
        if($this->input->post('UPDATE')){
        $this->Evaluation->update_emp_eval();
           redirect('Administrative_affairs/StaffEvaluation','refresh');
        }
        $data['result']=$this->Evaluation->get_emp_eval($emp_id,$evaluation_date,$date_s);
        $data['employees']=$this->Difined_model->select_all("employees","","","id","DESC");
        $data['title'] = 'تقييم الموظفين';
        $data['subview'] = 'admin/administrative_affairs/staff_evaluation';
        $this->load->view('admin_index', $data);
    }
    //------------------------------------------------------
    public function DeleteStaffEvaluation($emp_id,$evaluation_date,$date_s){
        $this->load->model('Difined_model');
        $this->Difined_model->delete("emp_evaluation",array("emp_id"=>$emp_id,"date_s"=>$date_s,"evaluation_date"=>$evaluation_date));
        redirect('Administrative_affairs/StaffEvaluation','refresh');
    }
    //--------------------------------------------------------
    public function EvaluationSetting(){
    $this->load->model('Difined_model');
    $this->load->model('administrative_affairs_models/Evaluation');
    if($this->input->post('ADD')){
        $this->Evaluation->insert();
        redirect('Administrative_affairs/EvaluationSetting','refresh');
    }
    $data['records']=$this->Difined_model->select_all("evaluation_setting","","","id","DESC");
    $data['title'] = 'تقييم الموظفين';
    $data['subview'] = 'admin/administrative_affairs/evaluation_setting';
    $this->load->view('admin_index', $data);
}
    //--------------------------------------------------------
    public function UpdateEvaluationSetting($id){
      $this->load->model('Difined_model');
      $this->load->model('administrative_affairs_models/Evaluation');
      if($this->input->post('UPDATE')){
          $this->Evaluation->update($id);
          redirect('Administrative_affairs/EvaluationSetting','refresh');
      }
      $data['result']=$this->Difined_model->getById("evaluation_setting",$id);
      $data['title'] = 'تقييم الموظفين';
      $data['subview'] = 'admin/administrative_affairs/evaluation_setting';
      $this->load->view('admin_index', $data);
  }
    //--------------------------------------------------------
    public function DeleteEvaluationSetting($id){
        $this->load->model('Difined_model');
        $this->Difined_model->delete("emp_evaluation",array("id"=>$id));
        redirect('Administrative_affairs/EvaluationSetting','refresh');
    }
    //--------------------------------------------------------
    public function VacationsApproved(){
        $this->load->model('Difined_model');
        $this->load->model('administrative_affairs_models/Vacation');
        $data["vacation_recived"]=$this->Vacation->type_vacation(0);
        $data["vacation_accept"]=$this->Vacation->type_vacation(1);
        $data["vacation_refuse"]=$this->Vacation->type_vacation(2);
        $data['title'] = 'إعتماد الاجازات';
        $data['subview'] = 'admin/administrative_affairs/vacations_approved';
        $this->load->view('admin_index', $data);
    }
   //------------------------------------------------------------
   public function DoVacationsApproved($id,$value){
       $this->load->model('administrative_affairs_models/Vacation');
       $this->Vacation->approved_vacation($id,$value);
       
       redirect('Administrative_affairs/VacationsApproved','refresh');
   }
    /*
       * =======================================================================================================
       *
       * =======================================================================================================
       */
 
# -----------------------------------------------------------------------------------------------------------------------------------#
#                                              //BIG IMPORTANT COMMENTS IN PERL/SH//                                                 #
# -----------------------------------------------------------------------------------------------------------------------------------#

    public function  add_penalty()
    {
        $this->load->model('Penalty_model');
        $this->load->model('Difined_model');
        $data['records'] = $this->Difined_model->select_all('penalty','','','','');
        $data['main_departs'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['subb']=$this->Penalty_model->select_sub_depart();
        $data['employs'] = $this->Difined_model->select_all('employees','','','','');
        $data['get_data'] = $this->Penalty_model->getById($_SESSION['emp_code']);
        $data['get_data2'] = $this->Penalty_model->select_emp_name();
        $data['depart_name'] = $this->Penalty_model->get_department_name();
        if($this->input->post('add')){
            $this->Penalty_model->insert();
            redirect('Administrative_affairs/add_penalty', 'refresh');
        }elseif ($this->input->post('valu')) {
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/penalty/get_departs',$data);
        }elseif ($this->input->post('valuu')) {
            $data['id']=$this->input->post('valuu');
            $this->load->view('admin/penalty/get_departs2',$data);
        }else {
            $data['subview'] = 'admin/penalty/add_penalty';
            $this->load->view('admin_index', $data);
        }

    }

    public function  edit_penalty($id){
        $this->load->model('Penalty_model');
        $this->load->model('Difined_model');
        $data['result'] =$this->Difined_model->select_search_key('penalty','id',$id);
        $data['main_departs'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['employs'] = $this->Difined_model->select_all('employees','','','','');
        $data['get_data'] = $this->Penalty_model->getById($_SESSION['emp_code']);
        $data['get_data2'] = $this->Penalty_model->select_emp_name();
        $data['depart_name'] = $this->Penalty_model->get_department_name();
        if($this->input->post()){
            $this->Penalty_model->update($id);
            redirect('Administrative_affairs/add_penalty', 'refresh');
        }else{
            $data['subview'] = 'admin/penalty/add_penalty';
            $this->load->view('admin_index', $data);
        }
    }
    public function delete_penalty($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("penalty",$Conditions_arr);
        redirect('Administrative_affairs/add_penalty');
    }
    public function suspend_penalty($id){
        $this->load->model('Penalty_model');
        if($this->input->post('accept')){
            $this->Penalty_model->approved($id,1);
        }elseif ($this->input->post('ref')){
            $this->Penalty_model->approved($id,2);
        }
        redirect('Administrative_affairs/add_penalty');
    }
    public function all_depart_emp(){
        $this->load->model('Penalty_model');
        $this->load->model('Difined_model');
        $data['records'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['employs'] = $this->Difined_model->select_all('employees','','','','');
        $data['subview'] = 'admin/report_emp/all_departs_emp';
        $this->load->view('admin_index', $data);
    }
# -----------------------------------------------------------------------------------------------------------------------------------#
#                                              //BIG IMPORTANT COMMENTS IN PERL/SH//                                                 #
# -----------------------------------------------------------------------------------------------------------------------------------#
  /*
       * =======================================================================================================
       *
       * =======================================================================================================
       */

  public  function EmployeesDebts(){ //
      $this->load->model('Difined_model');
      $this->load->model('administrative_affairs_models/Debts_emp');
      $this->load->model('administrative_affairs_models/employee');
      if($this->input->post('ADD')){
          $this->Debts_emp->insert();
          redirect('Administrative_affairs/EmployeesDebts','refresh');
      }
      $data["emp_data"]=$this->Difined_model->getByArray("employees",array("emp_code"=>$_SESSION['emp_code']));
      $data['admin'] = $this->employee->select_by();
      $data["departs"]=$this->Difined_model->select_search_key("department_jobs","from_id_fk !=",0);
      $data['employees']=$this->Difined_model->select_all("employees","","","id","DESC");
        if(isset($data["emp_data"]) && !empty($data["emp_data"]) && $data["emp_data"]!=null){
            $data["table"]=$this->Debts_emp->type_depts_date(array("emp_id"=>$data["emp_data"]["id"]));
        }else{
            $data["table"]=$this->Debts_emp->type_depts_date(array("emp_id !="=>0));
        }
      $data['title'] = 'إضافة السلف';
      $data['subview'] = 'admin/administrative_affairs/debts/employee_debts';
      $this->load->view('admin_index', $data);
  }
    //-----------------------------------------------
    public function UpdateEmployeesDebts($debt_id){
       $this->load->model('Difined_model');
        $this->load->model('administrative_affairs_models/Debts_emp');
        $this->load->model('administrative_affairs_models/employee');
        if($this->input->post('UPDATE')){
            $this->Debts_emp-> update($debt_id);
            redirect('Administrative_affairs/EmployeesDebts','refresh');
        }
        $data['result']=$this->Debts_emp->type_depts_date(array("debt_id"=>$debt_id));
        $data['admin'] = $this->employee->select_by();
        $data["departs"]=$this->Difined_model->select_search_key("department_jobs","from_id_fk !=",0);
        $data['employees']=$this->Difined_model->select_all("employees","","","id","DESC");
        $data['title'] = 'تعديل طلب السلفه';
        $data['subview'] = 'admin/administrative_affairs/debts/employee_debts';
        $this->load->view('admin_index', $data);
    }

   public  function LoadPAges(){ //
       $this->load->model('Difined_model');
       $this->load->model('administrative_affairs_models/Debts_emp');
       $this->load->model('administrative_affairs_models/employee');
       if ($this->input->post('admin_num')) {
           $data['dep']=$this->Difined_model->select_search_key("department_jobs","from_id_fk",$this->input->post('admin_num'));
           $this->load->view('admin/administrative_affairs/debts/load_dep',$data);
       }
       if ($this->input->post('dep_num')) {
           $data['emp']=$this->Difined_model->select_search_key("employees","department",$this->input->post('dep_num'));
           $this->load->view('admin/administrative_affairs/debts/load_emp',$data);
       }
   }
    public function EmployeesDebtsApproved(){
        $this->load->model('Difined_model');
        $this->load->model('administrative_affairs_models/Debts_emp');
        $this->load->model('administrative_affairs_models/employee');
        $data["depts_recived"]=$this->Debts_emp->type_depts(0);
        $data["depts_accept"]=$this->Debts_emp->type_depts(1);
        $data["depts_refuse"]=$this->Debts_emp->type_depts(2);
        $data["all_debts"]=$this->Difined_model->select_all("emp_debts","","","","");
        $data['title'] = 'إعتماد  طلبات السلف';
        $data['subview'] = 'admin/administrative_affairs/debts/debts_approved';
        $this->load->view('admin_index', $data);
    }
    public function DoDebtsApproved($id,$value){
       $this->load->model('administrative_affairs_models/Debts_emp');
        if($value == 0){ 
        $this->Debts_emp->approved_depts($id,$value,"");
        redirect('Administrative_affairs/EmployeesDebtsApproved','refresh');
        }
        if($this->input->post('operation')){
           $this->Debts_emp->approved_depts($id,$value,$this->input->post('reason'));  
           redirect('Administrative_affairs/EmployeesDebtsApproved','refresh');
        }
    }
    
     public function EmployeesDebtsReport(){
        $this->load->model('Difined_model');
        $this->load->model('administrative_affairs_models/Debts_emp');
         if ($this->input->post('debt_date_to') && $this->input->post('debt_date_from') && $this->input->post('type')) {
        $date_f =strtotime($this->input->post('debt_date_from'));
        $date_t =strtotime($this->input->post('debt_date_to'));        
     $arr_con=array("debt_date <="=>$date_t ,"debt_date >="=>$date_f );
            if($this->input->post('type') == 2){
                $arr_con["approved"]=2;
            }elseif($this->input->post('type') == 1){
                $arr_con["approved"]=1;    
            }elseif($this->input->post('type') == 0){
                $arr_con["approved"]=0;
            }
             $data["table"]=$this->Debts_emp->type_depts_date($arr_con);
           //  $this->test($this->db->last_query());
              $this->load->view('admin/administrative_affairs/debts/load_report',$data);
         }else{
        $data['title'] = 'تقرير طلبات السلف';
        $data['subview'] = 'admin/administrative_affairs/debts/debts_report';
        $this->load->view('admin_index', $data);    
         }
     }
    //-----------------------------------------------
 public function all_permissions_alltime()
    {   $this->load->model('administrative_affairs_models/Permit');
        $this->load->model('Difined_model');
        $this->load->model('Penalty_model');
      //  $this->test($this->CI);
        $data['records'] = $this->Difined_model->select_all('permits','emp_code','','','');
        $data['get_name'] = $this->Penalty_model->select_emp_name();
        $data['subview'] = 'admin/reports/all_permissions_alltime';
        $this->load->view('admin_index', $data);

    }
    //====================================
  public function checks($emp,$diff,$value){
        $this->db->select('*');
        $this->db->from('permits');
        $this->db->where('emp_code',$emp);
        $this->db->where($diff,$value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
/**
 * ======================================================================================================================
 * 
 * 
 * ======================================================================================================================
 *  */
//===============================================================================================//
    //reports

    public function all_permissions_period()
    {   $this->load->model('administrative_affairs_models/Permit');
        $this->load->model('Difined_model');
        $this->load->model('Penalty_model');
        $data['get_name'] = $this->Penalty_model->select_emp_name();
        if ($this->input->post('form_date') && $this->input->post('to_date') && $this->input->post('type')) {
            $data['views'] =  $this->Permit->get_details_beetween_dates(strtotime($this->input->post('form_date')),strtotime($this->input->post('to_date')),$this->input->post('type'));
            $this->load->view('admin/reports/get_permission_data',$data);
        }else {
            $data['subview'] = 'admin/reports/all_permissions_period';
            $this->load->view('admin_index', $data);
        }
    }

    //====================================


    public function all_permissions_emp()
    {
        $this->load->model('administrative_affairs_models/Permit');
        $this->load->model('Difined_model');
        $this->load->model('Penalty_model');
        $data['emp'] = $this->Difined_model->select_all('employees','','','','');
        $data['get_name'] = $this->Penalty_model->select_emp_name();
        if ($this->input->post('form_date') && $this->input->post('to_date') && $this->input->post('emp')) {
            $data['views'] =  $this->Permit->get_details_beetween_dates_emp(strtotime($this->input->post('form_date')),strtotime($this->input->post('to_date')),$this->input->post('emp'));
            $this->load->view('admin/reports/get_permission_data_byemp',$data);
        }else {
            $data['subview'] = 'admin/reports/all_permissions_emp';
            $this->load->view('admin_index', $data);
        }
    }











    }// END CLASS