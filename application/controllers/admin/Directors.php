<?php
class Directors extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','text','permission','form'));
         if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
         $this->load->model('council/Council');
         $this->load->model('council/Magls');
         $this->load->model('council/Time_tables');
         $this->load->model('Difined_model');
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
     if ($this->input->post('add')){
            $file_name='decison_img';
            $file= $this->upload_image($file_name);
            $this->Council->insert($file);
            $last=$this->Difined_model->select_last_id('council_admin');
            $this->Council->un_suspend($last);
            redirect('admin/Directors/add_council','refresh');
        }
       $data['jobs']=$this->Council->select_department_jobs();
       $data['records']=$this->Council->select();
       $data['get_members']=$this->Council->get_members();
       $data['last']=$this->Difined_model->select_last_id('council_admin');
        $data['title'] = 'إضافة مجلس';
        $data['metakeyword'] = 'إعدادات المجلس';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/council/management-add-manage';
        $this->load->view('admin_index', $data); 
       
    }
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *                                           مجلس الإدارة 
 * ===============================================================================================================
 */ 
    public function add_council(){
        if ($this->input->post('add')){
            $file_name='decison_img';
            $file= $this->upload_image($file_name);
            $this->Council->insert($file);
            $last=$this->Difined_model->select_last_id('council_admin');
            $this->Council->un_suspend($last);
            redirect('admin/Directors/add_council','refresh');
        }
       $data['jobs']=$this->Council->select_department_jobs();
       $data['records']=$this->Council->select();
       $data['get_members']=$this->Council->get_members();
       $data['last']=$this->Difined_model->select_last_id('council_admin');
        $data['title'] = 'إضافة مجلس';
        $data['metakeyword'] = 'إعدادات المجلس';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/council/management-add-manage';
        $this->load->view('admin_index', $data);
    }

    public function delete_council($id){
       
        $this->Council->delete($id);
        redirect('admin/Directors/add_council');
    }

    public function update_council($id){
      

        if($this->input->post('update')){

            $file_name='decison_img';
            $file= $this->upload_file($file_name);
            $this->Council->update($id,$file);
            redirect('admin/Directors/add_council','refresh');
        }
        $data['results']=$this->Council->getById($id);
        $data['update_link']='add_council';
        $data['subview'] = 'admin/council/management-add-manage';
        $this->load->view('admin_index', $data);
    }

    public function suspend_council($id,$set){
      
        $this->Council->suspend($id,$set);
        $this->Council->un_suspend($id);
       redirect('admin/Directors/add_council','refresh');
    }

 
 
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
      
 public function add_magls(){
      
        if ($this->input->post('add')){
            $this->Magls->insert();
            redirect('admin/Directors/add_magls','refresh');
        }
        $data['last_member']=$this->Difined_model->select_last_id('magls_members_t');
        $data['on_magls']=$this->Magls->all_councils(1);
        $data['off_magls']=$this->Magls->all_councils(0);
        $data['magls']=$this->Magls->select_council();
        $data['all_magls']=$this->Magls->all_details_council();
        $data['job_title']=$this->Magls->select_job_title();
        $data['records']=$this->Magls->select();
        $data['title'] = 'إضافة عضو بالمجلس';
        $data['metakeyword'] = 'إعدادات اعضاء المجلس';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/council/management-add-member';
        $this->load->view('admin_index', $data);
    }

    public function delete_magls($id){
      
        $this->Magls->delete($id);
        redirect('admin/Directors/add_magls');
    }

    public function update_magls($id){
       
        if($this->input->post('update')){
            $this->Magls->update($id);
            redirect('admin/Directors/add_magls','refresh');
        }
        $data['update_link']='add_magls';
        $data['results']=$this->Magls->getById($id);
        $data['magls']=$this->Difined_model->select_all('council_admin',"",'','','');
        $data['job_title']=$this->Magls->select_job_title();
        $data['subview'] = 'admin/council/management-add-member';
        $this->load->view('admin_index', $data);
    }

   public function tester(){
     // $this->test($this->Difined_model->select_search_key('council_items_decisions','session_id_fk !=',0));

   $this->test($this->Difined_model->select_search_key('council_items_decisions','id !=',0));
   //$this->test($this->Difined_model->select_search_key('magls_members_t','id !=',0));
   die;
}


      
  /**
 * ===============================================================================================================
 *
 * ====================================================== time_tables ============================================
 *                                                     AHMED ABDEL GAFAR
 * ===============================================================================================================
 */
    public function add_time_table(){ //
       $last=$this->Difined_model->select_last_id("council_time_tables");
        if ($this->input->post('add')){
            $this->Time_tables->insert($last);
            redirect('admin/Directors/add_time_table','refresh');

        }elseif ($this->input->post('band_num')) {
            if ($this->input->post('band_num') != 0) {
           $data_load['num_item']=$this->Difined_model->select_last_id('council_items_decisions');     
                $this->load->view('admin/council/get_band',$data_load);
            }
        }else{
        
        $data['magls']=$this->Magls->select_council();
        $data['members']=$this->Difined_model->select_search_key('magls_members_t','member_type_id_fk',1);
        $data['records'] = $this->Difined_model->select_all('council_time_tables','','','','');   
        $data['all_members'] = $this->Time_tables->select_members();
        $data['get_job_title'] = $this->Time_tables->select_job_title();
        $data['job_title'] = $this->Time_tables->get_job_title();
        $data['subview'] = 'admin/council/add_time_table';
        $this->load->view('admin_index', $data);
        }
    }

    public function items_decisions($id){
        
        $data['galsa']=$id;
        $data['count'] = $this->Time_tables->select_items();
        $data['all_items']=$this->Difined_model->select_search_key('council_items_decisions','session_id_fk',$id);
        $data['data']=$this->Time_tables->getById($id);
        $data['subview'] = 'admin/council/get_items_decisions';
        $this->load->view('admin_index', $data);
    }

    public function delete_item($id,$link){
       
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("council_items_decisions",$Conditions_arr);
        redirect('admin/Directors/items_decisions/'.$link);
    }

    public function  edit_item($id,$link)
    {
       
        $data['edit']=$this->Difined_model->getById('council_items_decisions',$id);
         $data['edit_galsa']=$this->Difined_model->getById('council_time_tables',$id);
        if($this->input->post('edit')){
            $this->Time_tables->update_item($id);
            redirect('admin/Directors/items_decisions/'.$link);
        }else{
            $data['subview'] = 'admin/council/get_items_decisions';
            $this->load->view('admin_index', $data);
        }
    }

    public function delete_time_table($id){
      
        $this->Time_tables->delete($id);
        redirect('admin/Directors/add_time_table/');
    }


    public function  edit_time_table($id)
    {
        $data['update_link']='add_time_table';
        $data['select_all']=$this->Difined_model->select_search_key('council_time_tables','id',$id);
        $data['select_members']=$this->Difined_model->select_search_key('council_members','council_id_fk',$id);
        $data['members']=$this->Difined_model->select_search_key('magls_members_t','member_type_id_fk',1);
        $data['magls']=$this->Magls->select_council();

        if($this->input->post('edit')){
            $this->Difined_model->delete("council_members",array("council_id_fk "=> $id));
            $this->Time_tables->update_time_table($id);
            $this->Time_tables->update_member($id);
            if($this->input->post('band_num') >0){
            $this->Time_tables->insert_bonod($id);    
            }
           redirect('admin/Directors/add_time_table');
        }else{
            $data['subview'] = 'admin/council/add_time_table';
            $this->load->view('admin_index', $data);
        }
    }
    
    public function band_num(){
        if ($this->input->post('band_num')) {
            if ($this->input->post('band_num') != 0) {
           $data_load['num_item']=$this->Difined_model->select_last_id('council_items_decisions');     
                $this->load->view('admin/council/get_band',$data_load);
            }
        }
        
    }
    
    
    /**
 * ===============================================================================================================
 *
 * =========================== minutes_and_decisions =============================================================
 *
 * ===============================================================================================================
 */
    public function minutes_and_decisions()
    {
        $data['all_members'] = $this->Time_tables->select_members();
        $data['get_job_title'] = $this->Time_tables->select_job_title();
        $data['job_title'] = $this->Time_tables->get_job_title();
        $data['records'] = $this->Difined_model->select_all('council_time_tables', '', '', '', '');
        $data['subview'] = 'admin/council/minutes_and_decisions';
        $this->load->view('admin_index', $data);

    }


    public function add_decisions($id)
    {
       
        if ($this->input->post('add')) {
            $this->Time_tables->update_decision();
           redirect('admin/Directors/minutes_and_decisions', 'refresh');
        }elseif ($this->input->post('edit')) {
         $this->Time_tables->update_decision();
        redirect('admin/Directors/minutes_and_decisions', 'refresh');
         }else{
            $data['all_members'] = $this->Time_tables->select_members();
            $data['get_job_title'] = $this->Time_tables->select_job_title();
            $data['job_title'] = $this->Time_tables->get_job_title();
            $data['details']=$this->Difined_model->select_search_key('council_items_decisions',"session_id_fk",$id); 
            $data['count_members'] = $this->Time_tables->select_members();
            $data['count'] = $this->Time_tables->select_items();
            $data['data']=$this->Time_tables->getById($id);
            $data['subview'] = 'admin/council/add_decisions';
            $this->load->view('admin_index', $data);
        }
    }


    public function delete_decision($id){
       
        $this->Time_tables->delete_decision($id);
        redirect('admin/Directors/minutes_and_decisions/');
    }

/**
 * ===============================================================================================================
 *
 * =============================================== follow up =====================================================
 *
 * ===============================================================================================================
 */
    public function follow_up(){
      
        $data['all_council_dates'] = $this->Difined_model->select_all('council_time_tables','session_date','','','');
        $data['decisions'] = $this->Time_tables->select_decisions();
        $data['all_members'] = $this->Time_tables->select_members();
        $data['get_job_title'] = $this->Time_tables->select_job_title();
        $data['job_title'] = $this->Time_tables->get_job_title();
        $data['select_all_bydate'] = $this->Time_tables->select_all_by_date();
        $data['records'] = $this->Difined_model->select_all('council_time_tables', '', '', '', '');
        if ($this->input->post('valu')){
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/council/get_council_data',$data);
        }elseif ($this->input->post('update_current')) {
            $this->Time_tables->update_motab3a(0);
            redirect('admin/Directors/follow_up', 'refresh');
        }elseif ($this->input->post('update_done')) {
            $this->Time_tables->update_motab3a(1);
            redirect('admin/Directors/follow_up', 'refresh');
        }elseif ($this->input->post('update_notdone')) {
            $this->Time_tables->update_motab3a(2);
           redirect('admin/Directors/follow_up', 'refresh');
        }else{
        $data['subview'] = 'admin/council/follow_up';
        $this->load->view('admin_index', $data);
        }
    }    
    
    public function update_motab3a_state($id,$type){
         $this->Time_tables->update_motab3a($id,$type);
            redirect('admin/Directors/follow_up',  'refresh');
    }
    
/**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 *  
 * ===============================================================================================================
 */    
    
}// END CLASS 