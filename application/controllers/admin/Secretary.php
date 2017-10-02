<?php
class Secretary extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
          if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
         $this->load->model('secretary/Part');
         $this->load->model('secretary/Export');
         $this->load->model('secretary/Import');
         $this->load->model('secretary/Search');//
         $this->load->model('secretary/Details_report');
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
 *  ----------------------------------------------------------------------------------------------------------------
 * 
 * -----------------------------------------------------------------------------------------------------------------
 */

    public function  index(){
        
        if($this->input->post('add')){
            $this->Part->insert();
//            $this->message('success','تم الاضافة ');
            redirect('admin/Secretary/secretary_part');
        }
        if($this->input->post('submit')){
            $this->Part->insert_part();
//            $this->message('success','تم الاضافة ');
            redirect('admin/Secretary/secretary_part');
        }
        $data['records'] = $this->Part->select();
        $data['parts'] = $this->Part->select_part();
        $data['subview'] = 'admin/secretary/secretary_part';
        $this->load->view('admin_index', $data);
    }
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */ 
 
    public function secretary_export(){
       
        if ($this->input->post('add')){
            $this->Export->insert();
            $last=$this->Export->select_last();
            for ($x = 1; $x <= $this->input->post('attachment'); $x++) {
                $file_name = 'img' . $x;
                $file[] = $this->upload_image($file_name);
            }
            $this->Part->insert_attachment($file,$last[0]->id,1);
            $this->Part->insert_signatures($last[0]->id,1);
//            $this->message('success','إضافة ');
            redirect('admin/Secretary/secretary_export');
        }
        if($this->input->post('num')){
            if($this->input->post('num') != 0){
                $page = $this->input->post('page');
                $data['result'] = $this->input->post('num');
                $this->load->view('admin/secretary/'.$page.'', $data);
            }
        }else {
            $data['transactions'] = $this->Export->select_transaction();
            $data['organizations'] = $this->Export->select_organization();
            $data['records'] = $this->Export->select();
            $data['signatures'] = $this->Export->select_signatures();
            $data['get_job'] = $this->Export->select_sign();
            $data['images'] = $this->Export->getdetails();
            $data['title'] = $this->Export->getdetails_tit();
            $data['subview'] = 'admin/secretary/secretary_export';
        $this->load->view('admin_index', $data);
            }
    }
    
 
//--------------------------------------------    
    public function update_secretary_export($id){
      
        if($this->input->post('update')) {
            if ($this->input->post('attachment') != 0) {
                for ($x = 1; $x <= $this->input->post('attachment'); $x++) {
                    $file_name = 'img' . $x;
                    $file[] = $this->upload_image($file_name);
                }
                $this->Part->insert_attachment($file,$id,1);
            }//signatures
            if($this->input->post('signatures') != 0){
                $this->Part->insert_signatures($id,1);  
            }
            $this->Export->update($id /*, $file */);
//            $this->message('success', 'تعديل ');
            redirect('admin/Secretary/secretary_export', 'refresh');
        }else {
            $data['results'] = $this->Export->getById($id);
            $data['get_img'] = $this->Export->getimg($id);
            $data['get_sign'] = $this->Export->getsign($id);
            $data['transactions'] = $this->Export->select_transaction();
            $data['organizations'] = $this->Export->select_organization();
            $data['subview'] = 'admin/secretary/secretary_export';
            $this->load->view('admin_index', $data);
        }
    }
  //--------------------------------------------    
    public function delete_export($id){
      
        $this->Export->delete($id);
        redirect('admin/Secretary/secretary_export', 'refresh');
    }
//--------------------------------------------    
    public function delete_photo($id,$all_id){
       
        $this->Export->delete_photo($id);
        redirect('admin/Secretary/update_secretary_export/'.$all_id.'');
    }
//--------------------------------------------    
    public function delete_sign($id,$all_id){
       
        $this->Export->delete_signatures($id);
        redirect('admin/Secretary/update_secretary_export/'.$all_id.'');
    }
  
//=====================================================================
    public function secretary_import(){
        
        if ($this->input->post('add')){
            $this->Import->insert();
            $last=$this->Import->select_last();
            for ($x = 1; $x <= $this->input->post('attachment'); $x++) {
                $file_name = 'img' . $x;
                $file[] = $this->upload_image($file_name);
            }
            $this->Part->insert_attachment($file,$last[0]->id,1);
//            $this->message('success','إضافة ');
            redirect('admin/Secretary/secretary_import');
        }
        if($this->input->post('num')){
            if($this->input->post('num') != 0){
                $page = $this->input->post('page');
                $data['result'] = $this->input->post('num');
                $this->load->view('admin/secretary/'.$page.'', $data);
            }
        }else{
            $data['transactions'] = $this->Import->select_transaction();
            $data['organizations'] = $this->Import->select_organization();
            $data['records'] = $this->Import->select();
            $data['images'] = $this->Import->getdetails();
            $data['title'] = $this->Import->getdetails_tit();
            $data['subview'] = 'admin/secretary/secretary_import';
            $this->load->view('admin_index', $data);
        }
    }
//--------------------------------------------    
    public function delete_import($id){
       
        $this->Import->delete($id);
        redirect('admin/Secretary/secretary_import', 'refresh');
    }
//--------------------------------------------    
    public function delete_photo_import($id,$all_id){
       
        $this->Import->delete_photo($id);
        redirect('admin/Secretary/update_secretary_import/'.$all_id.'');
    }
//--------------------------------------------    
    public function update_secretary_import($id){
       
        if($this->input->post('update')) {
            if ($this->input->post('attachment') != 0) {
                for ($x = 1; $x <= $this->input->post('attachment'); $x++) {
                    $file_name = 'img' . $x;
                    $file[] = $this->upload_image($file_name);
                     
                }
                $this->Part->insert_signatures($id,1);
            }else{
                $file= false;
            }
           
            $this->Import->update($id, $file);
//            $this->message('success', 'تعديل ');
            redirect('admin/Secretary/secretary_import', 'refresh');
        }else {
            $data['results'] = $this->Import->getById($id);
            $data['get_img'] = $this->Import->getimg($id);
            $data['transactions'] = $this->Import->select_transaction();
            $data['organizations'] = $this->Import->select_organization();
            $data['subview'] = 'admin/secretary/secretary_import';
            $this->load->view('admin_index', $data);
        }
    }
//=====================================================================
    public function secretary_part(){
      
        if($this->input->post('add')){
            $this->Part->insert();
//            $this->message('success','تم الاضافة ');
            redirect('admin/Secretary/secretary_part');
        }
        if($this->input->post('submit')){
            $this->Part->insert_part();
//            $this->message('success','تم الاضافة ');
            redirect('admin/Secretary/secretary_part');
        }
        $data['records'] = $this->Part->select();
        $data['parts'] = $this->Part->select_part();
        $data['subview'] = 'admin/secretary/secretary_part';
        $this->load->view('admin_index', $data);
    }
//--------------------------------------------    
    public function delete_secretary_part($id){
      
        $this->Part->delete($id);
        redirect('admin/Secretary/secretary_part','refresh');
    }
//---------------------------------------------    
    public function update_secretary_part($id){
      
        if($this->input->post('update_part')){
            $this->Part->update_part($id);
//            $this->message('success','تم التعديل ');
            redirect('admin/Secretary/secretary_part','refresh');
        }
        if($this->input->post('update')){
            $this->Part->update($id);
//            $this->message('success','تم التعديل ');
            redirect('admin/Secretary/secretary_part','refresh');
        }
        $data['results'] = $this->Part->getById($id);
        $data['subview'] = 'admin/secretary/secretary_part';
        $this->load->view('admin_index', $data);
    }
//------------------------------------------------------    
       public function searchreport(){
      
        if ($this->input->post('date_from') && $this->input->post('date_to') AND $this->input->post('search_type') ) {
            $data['id']=$this->input->post('date_from');
            $data['query'] = $this->Search->select_between_dates($this->input->post('date_from'),$this->input->post('date_to'));
            $data['orgnize'] = $this->Search->select_orgnization($this->input->post('date_from'),$this->input->post('date_to'));
            $data['orgnize_ex'] = $this->Search->select_orgnization_ex($this->input->post('date_from'),$this->input->post('date_to'));
            $data['orgnize_all'] = $this->Search->select_orgnization_all(/*$this->input->post('date_from'),$this->input->post('date_to')*/);
            $data['imports']=$this->Search->getallimports($this->input->post('date_from'),$this->input->post('date_to'));
            $data['transactions'] = $this->Search->select_transaction();
            $data['import'] = $this->Search->selectimport($this->input->post('date_from'),$this->input->post('date_to'));
            $data['images'] = $this->Search->getdetails();
            $data['title'] = $this->Search->getdetails_tit();
            $data['exports']=$this->Search->getallexports($this->input->post('date_from'),$this->input->post('date_to'));
            $data['transactions_ex'] = $this->Search->select_transaction_ex();
            $data['organizations_ex'] = $this->Search->select_organization_ex();
            $data['export'] = $this->Search->select_ex($this->input->post('date_from'),$this->input->post('date_to'));
            $data['signatures_ex'] = $this->Search->select_signatures_ex();
            $data['get_job_ex'] = $this->Search->select_sign_ex();
            $data['images_ex'] = $this->Search->getdetails_ex();
            $data['title_ex'] = $this->Search->getdetails_tit_ex();
            $this->load->view('admin/secretary/reportsearchresult',$data);
        }else{
            $data['title'] = '';
            $data['subview'] = 'admin/secretary/reprot';
            $this->load->view('admin_index', $data);

        }
    }
 //====================================================================================================
 public function search_details(){
           if ($this->input->post('date_from') || $this->input->post('date_to') ||
               $this->input->post('search_type')|| $this->input->post('search_organizations') ||
               $this->input->post('importance_type') || $this->input->post('transactions_type') ||
               $this->input->post('method_recived_type')){
        $Conditions_arr=array();
                if($this->input->post('date_from')!=""){ 
                    $Conditions_arr['date >=']=$this->input->post('date_from');
                }
              if($this->input->post('date_to')!=""){
                    $Conditions_arr['date <=']=$this->input->post('date_to');
                }
              if( $this->input->post('importance_type') !="0"){
                   $Conditions_arr['importance_degree_id_fk']=$this->input->post('importance_type');
               }
              if($this->input->post('transactions_type') !="0"){
                 $Conditions_arr['transaction_id_fk']=$this->input->post('transactions_type');
               }
              if($this->input->post('method_recived_type') !="0"){
                 $Conditions_arr['method_recived_id_fk']=$this->input->post('method_recived_type');
               }
                 $Conditions_arr_inp=$Conditions_arr;
                 $Conditions_arr_exp=$Conditions_arr;
              if($this->input->post('search_organizations') !="0"){
               $Conditions_arr_inp['organization_from_id_fk']=$this->input->post('search_organizations');
               $Conditions_arr_exp['organization_to_id_fk']=$this->input->post('search_organizations');  
               }
            
            if($this->input->post('search_type') ==3 || $this->input->post('search_type') ==0){
             $exports=$this->Details_report->select_where('office_exports',$Conditions_arr_exp);
             $imports=$this->Details_report->select_where('office_imports',$Conditions_arr_inp);    
                         if($exports != false && $imports != false ){
                   //            var_dump("ssss");
                            $data_load['search']=array_merge($exports,$imports);
                         }
                         elseif($imports != false){
                     //       var_dump("sss");
                            $data_load['search']=$imports;
                         }elseif($exports != false){
                            $data_load['search']=$exports;
                       //     var_dump("ss");
                         }
            }elseif($this->input->post('search_type') ==1){
             $data_load['search']=$this->Details_report->select_where('office_exports',$Conditions_arr_exp);  
            }elseif($this->input->post('search_type') ==2){
             $data_load['search']=$this->Details_report->select_where('office_imports',$Conditions_arr_inp);  
            }
      $data_load['signatures_ex'] = $this->Details_report->select_detials('signatures',1);
      $data_load['signatures_in'] = $this->Details_report->select_detials('signatures',2);
      $data_load['attachment_ex'] = $this->Details_report->select_detials('exports_imports_attachment',2);
      $data_load['attachment_in'] = $this->Details_report->select_detials('exports_imports_attachment',1);   
      $data_load['office_setting']=$this->Details_report->select_office_setting();
      // $this->test($data_load['attachment_in']);
        $this->load->view('admin/secretary/details_search_report',$data_load); 
           }elseif(! $_POST){
            //========select_query========
            $data['organizations'] = $this->Details_report->select_organization();
            $data['transactions'] = $this->Details_report->select_transaction();
            $data['title'] = '';
            $data['subview'] = 'admin/secretary/details_search';
            $this->load->view('admin_index', $data);

        }
}    
/* 
   public function search_details(){
       

        if ($this->input->post('date_from') && $this->input->post('date_to') AND $this->input->post('search_type') ) {
            $data['id']=$this->input->post('date_from');
            $data['query'] = $this->Details_report->select_between_dates($this->input->post('date_from'), $this->input->post('date_to'), $this->input->post('method_recived_type'), $this->input->post('transactions_type'), $this->input->post('importance_type'), $this->input->post('search_organizations'));

            if($this->input->post('search_type') == 1) {

                $data['exports'] = $this->Details_report->details_search_ex($this->input->post('date_from'), $this->input->post('date_to'), $this->input->post('method_recived_type'), $this->input->post('transactions_type'), $this->input->post('importance_type'), $this->input->post('search_organizations'));
                $data['signatures'] = $this->Details_report->select_signatures();
                $data['get_job'] = $this->Details_report->select_sign();

                $data['images'] = $this->Details_report->getdetails();
                $data['title'] = $this->Details_report->getdetails_tit();
            }elseif($this->input->post('search_type') == 2) {
                $data['imports'] = $this->Details_report->details_search_imp($this->input->post('date_from'), $this->input->post('date_to'), $this->input->post('method_recived_type'), $this->input->post('transactions_type'), $this->input->post('importance_type'), $this->input->post('search_organizations'));
            }else{
                $data['exports'] = $this->Details_report->details_search_ex($this->input->post('date_from'), $this->input->post('date_to'), $this->input->post('method_recived_type'), $this->input->post('transactions_type'), $this->input->post('importance_type'), $this->input->post('search_organizations'));
                $data['imports'] = $this->Details_report->details_search_imp($this->input->post('date_from'), $this->input->post('date_to'), $this->input->post('method_recived_type'), $this->input->post('transactions_type'), $this->input->post('importance_type'), $this->input->post('search_organizations'));
            }
            $this->load->view('admin/secretary/details_search_report',$data);
           }else{
            //========select_query========
            $data['organizations'] = $this->Details_report->select_organization();
            $data['transactions'] = $this->Details_report->select_transaction();
            $data['title'] = '';
            $data['subview'] = 'admin/secretary/details_search';
            $this->load->view('admin_index', $data);

        }
} */   
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
      
  /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
   
   /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
    
/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *  
 * ===============================================================================================================
 */    
    
}// END CLASS 