<?php
class About_association extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
   if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
       $this->load->model('about/About');
       $this->load->model('about/News');
       $this->load->model('about/Main_data');
       $this->load->model('Difined_model');
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
     //      return  false;
       return $this->upload->display_errors(); 
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
 
 
 //------------------------------------------
  public function laod_pages(){
       if($this->input->post('photo_num')) {
            if ($this->input->post('photo_num') != 0) {
                $this->load->view('admin/about/load_photos');
            }
        }
      //----------------------
      if($this->input->post('tel_num')) {
            if ($this->input->post('tel_num') != 0) {
                $this->load->view('admin/about/load_comunication');
            }
        } 
      //----------------------
      if($this->input->post('email_num')) {
            if ($this->input->post('email_num') != 0) {
                $this->load->view('admin/about/load_comunication');
            }
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
        
      if($this->input->post('ADD')){
         $img=$this->upload_image('logo');
         $this->Main_data->insert($img);
         if($this->input->post('tel_nums') > 0){
            $this->Main_data->insert_com('tel_nums',"phone",'tel');
         }
         if($this->input->post('email_nums') > 0){
            $this->Main_data->insert_com('email_nums',"email",'email');
         }
          redirect('admin/About_association/main_data','refresh'); 
       }
      $data['records']=$this->Difined_model->select_all('main_data',"","","","");
      $data['subview'] = 'admin/about/main_data';
        $this->load->view('admin_index', $data);
    }
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
 
 public function main_data(){ //Main_data
       if($this->input->post('ADD')){
         $img=$this->upload_image('logo');
         $this->Main_data->insert($img);
         if($this->input->post('tel_nums') > 0){
            $this->Main_data->insert_com('tel_nums',"phone",'tel');
         }
         if($this->input->post('email_nums') > 0){
            $this->Main_data->insert_com('email_nums',"email",'email');
         }
          redirect('admin/About_association/main_data','refresh'); 
       }
      $data['records']=$this->Difined_model->select_all('main_data',"","","","");
      $data['subview'] = 'admin/about/main_data';
        $this->load->view('admin_index', $data);
 } 
 //--------------------------------------------------
 public function update_main_data($id){ //Main_data
       if($this->input->post('UPDATE')){
      //  $this->test(sizeof());
         $img=$this->upload_image('logo');
         $this->Main_data->update($img,$id);
         if($this->input->post('tel_nums') > 0){
            $this->Main_data->insert_com('tel_nums',"phone",'tel');
         }
         if($this->input->post('email_nums') > 0){
            $this->Main_data->insert_com('email_nums',"email",'email');
         }
          redirect('admin/About_association/main_data','refresh'); 
       }
      $data['result']=$this->Difined_model->getById("main_data",$id); 
      $data['phones']=$this->Difined_model->select_search_key('main_data_com',"type","phone");
      $data['emails']=$this->Difined_model->select_search_key('main_data_com',"type","email"); 
      $data['subview'] = 'admin/about/main_data';
        $this->load->view('admin_index', $data);
 } 
 //---------------------------------------------------
 public function delete_com($id,$controller,$table){
    $main_id=$this->uri->segment(7);
      $Conditions_arr=array('id'=>$id);
     $this->Difined_model->delete($table,$Conditions_arr);
   if($table =='main_data'){
       $this->Difined_model->table_truncate('main_data_com'); 
   }
   if($table == "news"){
     $this->News->delete_where($id);
   }
    redirect('admin/About_association/'.$controller."/".$main_id,'refresh'); 
 }
 
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
   public function  about(){
       
        if($this->input->post('ADD')){
            $this->About->insert("",1);
            redirect('admin/About_association/about','refresh');
        }
        $data['result']=$this->About->select(1);
        $data['subview'] = 'admin/about/about';
        $this->load->view('admin_index', $data);
    }
 //---------------------------------------------
 public function update_about($id){
   
     if($this->input->post('UPDATE')){
            $this->About->update($id,"",1);
            redirect('admin/About_association/about','refresh');
        }
     $data['update_link']='about';   
     $data['result_edite']=$this->Difined_model->getById('about',$id);   
     $data['subview'] = 'admin/about/about';
     $this->load->view('admin_index', $data); 
 }
 //-------------------------------------------
 public function delete_about($controller,$id){
    $Conditions_arr=array('id'=>$id);
     $this->Difined_model->delete("about",$Conditions_arr);
     redirect('admin/About_association/'.$controller,'refresh');  
    
 } 
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */ 
 public function goals(){
    
    if($this->input->post('ADD')){
          $imag_name="img";
          $image=$this->upload_image($imag_name);
            $this->About->insert($image,2);
            redirect('admin/About_association/goals','refresh');
        }
     $data['record']=$this->About->select(2);
     $data['subview'] = 'admin/about/goals';
     $this->load->view('admin_index', $data);  
 } 
 //-----------------------------------
 public function update_goals($id){
    if($this->input->post('UPDATE')){
        $imag_name="img";
          $image=$this->upload_image($imag_name);
            $this->About->update($id,$image,2);
            redirect('admin/About_association/goals','refresh');
        }
     $data['update_link']='goals'; 
     $data['result']=$this->Difined_model->getById('about',$id);   
     $data['subview'] = 'admin/about/goals';
     $this->load->view('admin_index', $data); 
 }
 
 
 /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */  
 public function  main_ways_donate(){
       
        if($this->input->post('ADD')){
            $this->About->insert("",3);
            redirect('admin/About_association/main_ways_donate','refresh');
        }
        $data['result']=$this->About->select(3);
        $data['subview'] = 'admin/about/main_ways_donate';
        $this->load->view('admin_index', $data);
    }
 //---------------------------------------------
 public function update_main_ways_donate($id){
   
     if($this->input->post('UPDATE')){
            $this->About->update($id,"",3);
            redirect('admin/About_association/main_ways_donate','refresh');
        }
     $data['update_link']='main_ways_donate';    
     $data['result_edite']=$this->Difined_model->getById('about',$id);   
     $data['subview'] = 'admin/about/main_ways_donate';
     $this->load->view('admin_index', $data); 
 }
  /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
   public function ways_donate(){
    
    if($this->input->post('ADD')){
          $imag_name="img";
          $image=$this->upload_image($imag_name);
            $this->About->insert($image,4);
            redirect('admin/About_association/ways_donate','refresh');
        }
     $data['update_link']='main_ways_donate';   
     $data['record']=$this->About->select(4);
     $data['subview'] = 'admin/about/ways_donate';
     $this->load->view('admin_index', $data);  
 } 
 //-----------------------------------
 public function update_ways_donate($id){
    if($this->input->post('UPDATE')){
        $imag_name="img";
          $image=$this->upload_image($imag_name);
            $this->About->update($id,$image,4);
            redirect('admin/About_association/ways_donate','refresh');
        }
     $data['update_link']='main_ways_donate';    
     $data['result']=$this->Difined_model->getById('about',$id);   
     $data['subview'] = 'admin/about/ways_donate';
     $this->load->view('admin_index', $data); 
 }
  /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
    public function news(){
         if($this->input->post('ADD')){
          $this->News->insert_news();
          $last=$this->Difined_model->select_last_id('news');
           if ($this->input->post('photo_num') != 0) {
               $max=$this->input->post('photo_num');
               for($x=1;$x<=$max;$x++){
                $input_name='img'.$x;
                $file[]=$this->upload_image($input_name);
               }
               $this->News->insert_photo($last,$file);
            }
            redirect('admin/About_association/news','refresh');
        }
     $data['record']=$this->News->select();
     $data['subview'] = 'admin/about/news';
     $this->load->view('admin_index', $data); 
  }
//------------------------------------------------- 
   public function update_news($id){
       if($this->input->post('UPDATE')){
       // $this->test($_POST);
         $this->News->update_news($id);
           if ($this->input->post('photo_num') != 0) {
               $max=$this->input->post('photo_num');
               for($x=1;$x<=$max;$x++){
                $input_name='img'.$x;
                $file[]=$this->upload_image($input_name);
               }
               $this->News->insert_photo($id,$file);
            }
            redirect('admin/About_association/news','refresh');
        }
    $data['update_link']='news'; 
    $data['result']=$this->Difined_model->getById("news",$id);    
    $data['images']=$this->News->get_photo($id); 
    $data['subview'] = 'admin/about/news';
    $this->load->view('admin_index', $data); 
   }
//------------------------------------------------
   public function delete_image($id,$controller,$main_id){
    
    $this->News->delete_img($id);
    redirect('admin/About_association/'.$controller."/".$main_id,'refresh');
   }
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