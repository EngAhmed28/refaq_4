<?php
class General_assembly extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
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

   /* public function  index(){

            $data['subview'] = 'admin/general_assembly/add_member';
            $this->load->view('admin_index', $data);
       

    }*/


        public function  add_member()
    {
       $this->load->model('general_assembly_model/general_assembly_model');
        $this->load->model('general_assembly_model/Difined_model');
         $data['records'] = $this->Difined_model->select_all('general_assembly_members','','','','');
         if($this->input->post('save')){
            $this->general_assembly_model->insert();
            redirect('General_assembly/add_member', 'refresh');
        }else {
            $data['subview'] = 'admin/general_assembly/add_member';
            $this->load->view('admin_index', $data);
        }

    }

        public function  add_subscription(){
       $this->load->model('general_assembly_model/general_assembly_model');
        $this->load->model('general_assembly_model/Difined_model');
         $data['records'] = $this->Difined_model->select_all('general_assembly_subscription','','','','');
          $data['members'] = $this->Difined_model->select_all('general_assembly_members','','','','');
            $data['name'] = $this->general_assembly_model->get_data();
         if($this->input->post('save')){
            $this->general_assembly_model->insert_subscription();
           redirect('General_assembly/add_subscription', 'refresh');
        }else {
            $data['subview'] = 'admin/general_assembly/add_subscription';
            $this->load->view('admin_index', $data);
        }

    }

    public function delete_member($id){
    $this->load->model("general_assembly_model/Difined_model");
    $Conditions_arr=array("id"=>$id);
    $this->Difined_model->delete("general_assembly_members",$Conditions_arr);
    redirect('General_assembly/add_member');
}
    public function delete_subscription($id){
        $this->load->model("general_assembly_model/Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("general_assembly_subscription",$Conditions_arr);
        redirect('General_assembly/add_subscription');
    }



    public function  R_current_subscription()
    {
        $this->load->model('general_assembly_model/general_assembly_model');
        $data['name'] = $this->general_assembly_model->get_data();
        $data['records'] = $this->general_assembly_model->select_by_month();
         $data['subview'] = 'admin/general_assembly/R_current_subscription';
         $this->load->view('admin_index', $data);

    }

    public function R_previous_subscription()
    {
        $this->load->model('general_assembly_model/general_assembly_model');
        $data['name'] = $this->general_assembly_model->get_data();
        $data['records'] = $this->general_assembly_model->select_previous_months();
        $data['count'] = $this->general_assembly_model->select_all(2);
        $data['subview'] = 'admin/general_assembly/R_previous_subscription';
        $this->load->view('admin_index', $data);

    }

    }// END CLASS