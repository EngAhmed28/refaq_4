<?php
class Finance_resource extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        $this->load->model('Difined_model'); 
        $this->load->model('Nationality');
        $this->load->model('Department');
        $this->load->model('finance_resource_models/Guaranty');
        $this->load->model('finance_resource_models/Endowments');
        $this->load->model('finance_resource_models/Operation_guaranty');
        $this->load->model('finance_resource_models/Donors');
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

    /**
     *  ================================================================================================================
     *
     *  ================================================================================================================
     *
     *  ================================================================================================================
     */

    public function  index(){
       
     $data['all_records'] = $this->Difined_model->select_all('donors_t','','','','');
        $arr=array();
        if ($this->input->post('donors')){
            if ($this->input->post('donor') !='all') {
             $arr['donor_type'] = $this->input->post('donor');
            }
            if ($this->input->post('gender') !='all') {
                $arr['gender_id_fk'] = $this->input->post('gender');
            }
            if ($this->input->post('df3') !=0) {
                $arr['pay_method_id_fk'] = $this->input->post('df3');
            }
            $data['all_select'] =$this->Difined_model->slect_where('donors_t',$arr,'','','','');
            $data['id']=$this->input->post('donor');
            $this->load->view('admin/finance_resource/get_donor_type',$data);
        }else {
            $data['subview'] = 'admin/finance_resource/all_donors';
            $this->load->view('admin_index', $data);
        }
    }
    /**
     * ===============================================================================================================
     *
     * =======================================================//Donors//====================================================
     *
     * ===============================================================================================================
     */
     public function  all_donors()
    {
        $this->load->model('finance_resource_models/Donors');
        $this->load->model('Difined_model');
        $data['all_records'] = $this->Difined_model->select_all('donors_t','','','','');
        $arr=array();
        if ($this->input->post('donors')){
            if ($this->input->post('donor') !='all') {
             $arr['donor_type'] = $this->input->post('donor');
            }
            if ($this->input->post('gender') !='all') {
                $arr['gender_id_fk'] = $this->input->post('gender');
            }
            if ($this->input->post('df3') !=0) {
                $arr['pay_method_id_fk'] = $this->input->post('df3');
            }
            $data['all_select'] =$this->Difined_model->slect_where('donors_t',$arr,'','','','');
            $data['id']=$this->input->post('donor');
            $this->load->view('admin/finance_resource/get_donor_type',$data);
        }else {
            $data['subview'] = 'admin/finance_resource/all_donors';
            $this->load->view('admin_index', $data);
        }
    }
/*
    public function  all_donors(){
        $data['all_records'] = $this->Difined_model->select_all('donors_t','','','','');
        $data['subview'] = 'admin/finance_resource/all_donors';
        $this->load->view('admin_index', $data);

    } */

    //====================================================

    public function  donors(){
        $data['nationality']=  $this->Nationality->select();
        $data['main_depart'] = $this->Department->select_all();
        if($this->input->post('save')){
            $national_id_img ='national_id_img';
            $national_id_file =$this->upload_file($national_id_img);
            $bank_card_img ='bank_card_img';
            $bank_card_file =$this->upload_file($bank_card_img);
            $bank_deduction_voucher_img ='bank_deduction_voucher_img';
            $bank_deduction_voucher_file =$this->upload_file($bank_deduction_voucher_img);
            $other_img ='other_img';
            $other_img_file =$this->upload_file($other_img);
            $this->Donors->insert($national_id_file,$bank_card_file,$bank_deduction_voucher_file,$other_img_file);

            redirect('Finance_resource/all_donors', 'refresh');
        }
        $data['subview'] = 'admin/finance_resource/resources';
        $this->load->view('admin_index', $data);
    }

    public function delete_donors($id){
      
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("donors_t",$Conditions_arr);
        redirect('finance_resource/all_donors');
    }


    public function  edit_donors($id)
    {
        $type= $this->uri->segment(4);
        if($type =='view'){
            $data['readonly'] ='readonly';
            $data['disabled'] ='disabled';
            $data['class']=' docs-date';
        }else {
            $data['readonly'] = '';
            $data['disabled'] = '';
            $data['class'] = '';
        }
      
        $data['update_link']='donors';
        $data['main_depart'] = $this->Department->select_all();
        $data['results'] = $this->Difined_model->select_search_key('donors_t','id',$id);
        $data['nationality']=  $this->Nationality->select();
        if($this->input->post('save')){
            $national_id_img ='national_id_img';
            $national_id_file =$this->upload_file($national_id_img);

            $bank_card_img ='bank_card_img';
            $bank_card_file =$this->upload_file($bank_card_img);
            $bank_deduction_voucher_img ='bank_deduction_voucher_img';
            $bank_deduction_voucher_file =$this->upload_file($bank_deduction_voucher_img);
            $other_img ='other_img';
            $other_img_file =$this->upload_file($other_img);
            $this->Donors->update($id,$national_id_file,$bank_card_file,$bank_deduction_voucher_file,$other_img_file);
            redirect('Finance_resource/all_donors', 'refresh');
        }else{
            $data['subview'] = 'admin/finance_resource/resources_edit';
            $this->load->view('admin_index', $data);
        }
    }
    /**
     * ===============================================================================================================
     *
     * ======================================================== guaranty =============================================
     *
     * ===============================================================================================================
     */
     public function  all_guaranty()
    {
        $this->load->model('finance_resource_models/Guaranty');
        $this->load->model('Difined_model');
        $data['guaranty_types'] = $this->Difined_model->select_all('guaranty_settings','','','','');

        $data['select_type'] = $this->Guaranty->select_type();
        $data['select_donor'] = $this->Guaranty->select_donor();
        $data['all_records'] = $this->Difined_model->select_all('guarantees','','','','');
        $arr=array();
        if ($this->input->post('guarantees')){
            if ($this->input->post('guaranty') !='all') {
                $arr['guaranty_type'] = $this->input->post('guaranty');
            }
            if ($this->input->post('gender') !='all') {
                $arr['gender'] = $this->input->post('gender');
            }
            if ($this->input->post('payment') !=0) {
                $arr['payment_method'] = $this->input->post('payment');
            }
            $data['all_select'] =$this->Difined_model->slect_where('guarantees',$arr,'','','','');
            $data['id']=$this->input->post('guarantees');
            $this->load->view('admin/finance_resource/get_guaranty_type',$data);
        }else {
            $data['subview'] = 'admin/finance_resource/all_guaranty';
            $this->load->view('admin_index', $data);
        }
    }

   
   
   /* public function  all_guaranty(){
      
        $data['select_type'] = $this->Guaranty->select_type();
        $data['select_donor'] = $this->Guaranty->select_donor();
        $data['all_records'] = $this->Difined_model->select_all('guarantees','','','','');
        
        $data['subview'] = 'admin/finance_resource/all_guaranty';
        $this->load->view('admin_index', $data);

    } */
   //------------------------------------------- 
    public function  guaranty(){
       
        $data['guaranty_types'] = $this->Difined_model->select_all('guaranty_settings','','','','');
        $data['donors'] = $this->Difined_model->select_all('donors_t','','','','');
        if ($this->input->post('valu')){
            $data['get_data'] = $this->Difined_model->select_search_key('guaranty_settings','id',$this->input->post('valu'));
            $data['id']=$this->input->post('valu');
            $this->load->view('admin/finance_resource/get_guaranty_data',$data);
        }elseif($this->input->post('save')){
            $this->Guaranty->insert();
            redirect('Finance_resource/all_guaranty', 'refresh');
        }else{
            $data['subview'] = 'admin/finance_resource/guaranty';
            $this->load->view('admin_index', $data);
        }
    }
    //-------------------------------------------
    public function  edit_guaranty($id){
        $this->load->model("Users");
        $type= $this->uri->segment(4);
        if($type =='view'){
            $data['readonly'] ='readonly';
            $data['disabled'] ='disabled';
            $data['class']=' docs-date';
        }else{
            $data['readonly'] ='';
            $data['disabled'] ='';
            $data['class']='';
        }
     
        $data['jobs_name']=$this->Users->jobs_id();
        $condetion_arr=array('from_id_fk ='=> 3 );
        $data['convent']=$this->Difined_model->slect_where('department_jobs',$condetion_arr,'','','','');
        $data['all_operation']=$this->Operation_guaranty->select_all($id);
        $data['update_link']='guaranty';
        $data['all_records'] = $this->Difined_model->select_all('guarantees','','','','');
        $data['results'] = $this->Difined_model->select_search_key('guarantees','id',$id);
        $data['get_data'] = $this->Difined_model->select_search_key('guaranty_settings','id',$this->input->post('valu'));
        $data['guaranty_types'] = $this->Difined_model->select_all('guaranty_settings','','','','');
        $data['donors'] = $this->Difined_model->select_all('donors_t','','','','');
        $data['get_data'] = $this->Difined_model->select_search_key('guaranty_settings','id',$data['results'][0]->guaranty_type);
        if($this->input->post('save')){
            $this->Guaranty->update($id);
            redirect('Finance_resource/all_guaranty', 'refresh');
        }else{
            $data['subview'] = 'admin/finance_resource/guaranty_edit';
            $this->load->view('admin_index', $data);
        }
    }
    //-------------------------------------------
    public function delete_guaranty($id){
      
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("guarantees",$Conditions_arr);
        redirect('finance_resource/all_guaranty/');
    }
    /**
     * ===============================================================================================================
     *
     * =======================================================//endowments//====================================================
     *
     * ===============================================================================================================
     */
   
     public function  all_endowments()
    {
        $this->load->model('Difined_model');
        $this->load->model('Department');
        $data['main_depart'] = $this->Department->select_all();
        $data['all_records'] = $this->Difined_model->select_all('endowments','','','','');
        if ($this->input->post('endowment')){
            $data['id']=$this->input->post('endowment');
            $data['all_select'] =$this->Difined_model->select_search_key('endowments','endowment_type',$this->input->post('endowment'));
            $this->load->view('admin/finance_resource/get_endowment_type',$data);
        }else {
            $data['subview'] = 'admin/finance_resource/all_endowments';
            $this->load->view('admin_index', $data);
        }
    }
   
   
   
   /* public function  all_endowments()
    {
       
        $data['main_depart'] = $this->Department->select_all();
        $data['all_records'] = $this->Difined_model->select_all('endowments','','','','');
        $data['subview'] = 'admin/finance_resource/all_endowments';
        $this->load->view('admin_index', $data);
    }*/
  //---------------------------------------  
    public function  add_endowments()
    {
        
        $data['employee_in_charge'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['main_depart'] = $this->Department->select_all();
        if($this->input->post('save')){
            $this->Endowments->insert();
            redirect('Finance_resource/all_endowments', 'refresh');
        }else{
            $data['subview'] = 'admin/finance_resource/endowments';
            $this->load->view('admin_index', $data);
        }
    }
    public function  edit_endowments($id)
    {
        $type= $this->uri->segment(4);
        if($type =='view'){
            $data['readonly'] ='readonly';
            $data['disabled'] ='disabled';
            $data['class']=' docs-date';
        }else {
            $data['readonly'] = '';
            $data['disabled'] = '';
            $data['class'] = '';
        }
      
        $data['update_link']='add_endowments';
        $data['employee_in_charge'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
        $data['main_depart'] = $this->Department->select_all();
        $data['all_records'] = $this->Difined_model->select_all('endowments','','','','');
        $data['results'] = $this->Difined_model->select_search_key('endowments','id',$id);
        if($this->input->post('save')){
            $this->Endowments->update($id);
            redirect('Finance_resource/all_endowments', 'refresh');
        }else{
            $data['subview'] = 'admin/finance_resource/endowments_edit';
            $this->load->view('admin_index', $data);
        }
    }
 //---------------------------------------------
 
 public function operation($process,$page,$guarantee_id){
  //  $this->load->model('finance_resource_models/Operation_guaranty');
  /*$this->test($_POST);
  print_r($_POST);
  
  die;*/
  
    if($this->input->post('operation')){
        $this->Operation_guaranty->insert_op($process,$guarantee_id);
       // redirect('Finance_resource/'.$page.'/'.$guarantee_id.'/view', 'refresh');
        redirect('Finance_resource/all_guaranty', 'refresh');
    }
    }
 
 
    
}// END CLASS