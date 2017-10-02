<?php
class Sending extends CI_Controller
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

    public function  index(){

            $data['subview'] = 'admin/messages/add_message';
            $this->load->view('admin_index', $data);
       

    }



        public function  add_message()
    {
       $this->load->model('Message');
        $this->load->model('Difined_model');
        $data['count'] = $this->Difined_model->select_all('employees','','1','id','desc');
        $data['employees'] = $this->Difined_model->select_all('employees','','','','');
         $data['records'] = $this->Difined_model->select_all('messages','','','','');
         $data['descrption'] = $this->Message->get_data();
         if($this->input->post('save')){
            $this->Message->insert(1);
            redirect('Sending/add_message', 'refresh');
        }else {
            $data['subview'] = 'admin/messages/add_message';
            $this->load->view('admin_index', $data);
        }

    }

        public function  add_message_dep(){
            
       $this->load->model('Message');
        $this->load->model('Difined_model');
        $data['department'] = $this->Difined_model->select_search_key('department_jobs','from_id_fk',0);
         $data['records'] = $this->Difined_model->select_all('messages','','','','');
         $data['descrption'] = $this->Message->get_data();
         if($this->input->post('save')){
            $this->Message->insert_dep();
           redirect('Sending/add_message_dep', 'refresh');
        }else {
            $data['subview'] = 'admin/messages/add_message_dep';
            $this->load->view('admin_index', $data);
        }

    }

        public function delete_message($id){
        $this->load->model("Difined_model");
        $Conditions_arr=array("id"=>$id);
        $this->Difined_model->delete("messages",$Conditions_arr);
        redirect('sending/add_message');
    }

    }// END CLASS