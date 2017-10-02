<?php
class Public_relations extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
           redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
    }
    private function test($data=array()){
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
    private function upload_image($file_name){
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
    private function upload_file($file_name){
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
    private function url(){
        unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    private function message($type,$text){
        if($type =='success') {
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
        }
    }

    public function index($id){ 
        $this->load->model('Public_relations/Relation');
        
        if($this->input->post('add') && $id == 0){
            $this->Relation->insert_main();
            $this->message('success','إضافة مجال رئيسي');
            redirect('Public_relations/index/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $this->Relation->update_main($id);
            $this->message('success','تعديل مجال رئيسي');
            redirect('Public_relations/index/0','refresh');
        }
        if($id != 0)
            $data['result']=$this->Relation->getById_main($id);
            
        $data['records'] = $this->Relation->select_main(0);
        $data['table'] = $data['records'][0];
        $data['subview'] = 'admin/public_relations/public_relations';
        $this->load->view('admin_index', $data);
    }
    
    public function delete_main($id,$page){
        $this->load->model('Public_relations/Relation');
        if($page == 'sub_fields')
            $this->Relation->delete_sub($id);
        else
            $this->Relation->delete_main($id);
        redirect('Public_relations/'.$page.'/0','refresh');
    }
    
    public function sub_fields($id){ 
        $this->load->model('Public_relations/Relation');
        
        if($this->input->post('add') && $id == 0){
            $file_name = 'img';
            $file = $this->upload_image($file_name);
            $this->Relation->insert_sub($file);
            $this->message('success','إضافة مجال فرعي');
            redirect('Public_relations/sub_fields/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $file_name = 'img';
            $file = $this->upload_image($file_name);
            $this->Relation->update_sub($id,$file);
            $this->message('success','تعديل مجال فرعي');
            redirect('Public_relations/sub_fields/0','refresh');
        }
        if($id != 0)
            $data['result']=$this->Relation->getById_main($id);
            
        $data['records'] = $this->Relation->select_main(0);
        $data['main'] = $data['records'][0];
        $data['records'] = $this->Relation->select_main(1);
        $data['table'] = $data['records'][1];
        $data['subview'] = 'admin/public_relations/sub_fields';
        $this->load->view('admin_index', $data);
    }
    
    public function work_donation($id){ 
        $this->load->model('Public_relations/Relation');
        
        if($this->input->post('add') && $id == 0){
            $file_name = 'img';
            $file = $this->upload_image($file_name);
            $this->Relation->insert_work_donation($file);
            $this->message('success','إضافة الأعمال');
            redirect('Public_relations/work_donation/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $file_name = 'img';
            $file = $this->upload_image($file_name);
            $this->Relation->update_work($id,$file);
            $this->message('success','تعديل الأعمال');
            redirect('Public_relations/work_donation/0','refresh');
        }
        if($id != 0){
            $data['result']=$this->Relation->getById_work($id);
            $data['subs'] = $this->Relation->select_sub($data['result']['main_field_id']);
        }
            
        if($this->input->post('main') || $this->input->post('num')){
            if($this->input->post('main') != ''){
                $data['subs']=$this->Relation->select_sub($this->input->post('main'));
                $this->load->view('admin/public_relations/get_sub_fields',$data);
            }
            if($this->input->post('num') != 0)
                $this->load->view('admin/public_relations/get_sub_fields');
        }
        else{    
            $data['records'] = $this->Relation->select_main(0);
            $data['main'] = $data['records'][0];
            $data['records2'] = $this->Relation->select_main(1);
            $data['sub'] = $data['records2'][0];
            $data['table'] = $this->Relation->select_work_donation();            
            $data['subview'] = 'admin/public_relations/work_donation';
            $this->load->view('admin_index', $data);
        }
    }
    
    public function delete_donation($id,$page){
        $this->load->model('Public_relations/Relation');
        $this->Relation->delete_work_donation($id);
        redirect('Public_relations/'.$page.'/0','refresh');
    }
    
    public function add_main_data(){
        $this->load->model('Public_relations/Main_data');
        if ($this->input->post('add')){
            $file_name='logo';
            $file= $this->upload_image($file_name);
            $this->Main_data->insert($file);
            $this->message('success','إضافة البيانات الأساسية');
            redirect('Public_relations/add_main_data');
        }
        $data['table']=$this->Main_data->select('',0);
        $data['result']=$this->Main_data->getById(0);
        if($this->input->post('num'))
        {
            if($this->input->post('num') != 0)
            {
                $page = $this->input->post('page');
                $data['result'] = $this->input->post('num');
                $this->load->view('admin/public_relations/'.$page.'', $data);
            }
        }
        else{
        $data['subview'] = 'admin/public_relations/main_data';
        $this->load->view('admin_index', $data);}
    }
    
    public function update_main_data($id){
        $this->load->model('Public_relations/Main_data');
        if($this->input->post('add')){
            $file_name='logo';
            $file= $this->upload_image($file_name);
            $this->Main_data->update($id,$file);
            $this->message('success','تعديل البيانات الأساسية');
            redirect('Public_relations/add_main_data','refresh');
        }
        $data['table'] = '';
        $data['result']=$this->Main_data->getById($id);
        $data['subview'] = 'admin/public_relations/main_data';
        $this->load->view('admin_index', $data);

    }
    
    public function delete($from,$id,$index){
        $this->load->model('Public_relations/Main_data');
        $this->Main_data->delete($from,$id,$index);
        redirect('Public_relations/update_main_data/'.$id.'');
    }
    
    public function success($id){ 
        $this->load->model('Public_relations/Relation');
        $data['table'] = $this->Relation->select_success();
        
        if($this->input->post('add') && $id == 0){
            $file_name = 'img';
            $file = $this->upload_image($file_name);
            $this->Relation->insert_success($file);
            $this->message('success','إضافة شريك نجاح');
            redirect('Public_relations/success/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $file_name = 'img';
            $file = $this->upload_image($file_name);
            $this->Relation->update_success($id,$file);
            $this->message('success','تعديل شريك نجاح');
            redirect('Public_relations/success/0','refresh');
        }
        if($id != 0)
            $data['result']=$this->Relation->getById_success($id);
        else{                
            $data['subview'] = 'admin/public_relations/success';
            $this->load->view('admin_index', $data);
        }
    }
    
    public function delete_success($id,$page){
        $this->load->model('Public_relations/Relation');
        $this->Relation->delete_success($id);
        redirect('Public_relations/'.$page.'/0','refresh');
    }
    
    public function programs($id){
        $this->load->model('Public_relations/Programs');
        
        if($this->input->post('add') && $id == 0){
            $file_name = 'logo';
            $file = $this->upload_image($file_name);
            $this->Programs->insert($file);
            $this->message('success','إضافة برنامج');
            redirect('Public_relations/programs/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $file_name = 'logo';
            $file = $this->upload_image($file_name);
            $this->Programs->update($id, $file);
            $this->message('success','تعديل برنامج');
            redirect('Public_relations/programs/0','refresh');
        }
        if($this->input->post('code')){
            $this->db->where('id',$this->input->post('code'));
            $this->db->delete('programs_photo');
        }
        if($this->input->post('num')){
            $this->load->view('admin/public_relations/load_program_titles');
        }
        if($id != 0)
            $data['result']=$this->Programs->getById($id);
            
        $data['table'] = $this->Programs->select('');
        $data['all'] = $this->Programs->select_photo('');
        $data['photo'] = $data['all'][0];
        $data['video'] = $data['all'][1];
        $data['subview'] = 'admin/public_relations/programs';
        $this->load->view('admin_index', $data);
    }
    
    public function programs_about($id){ 
        $this->load->model('Public_relations/Programs');
        
        if($this->input->post('add') && $id == 0){
            $this->Programs->insert_about();
            $this->message('success','إضافة عن برنامج');
            redirect('Public_relations/programs_about/0', 'refresh');
        }
        if($this->input->post('add') && $id != 0){
            $this->Programs->update_about($id);
            $this->message('success','تعديل عن برنامج');
            redirect('Public_relations/programs_about/0','refresh');
        }
        if($this->input->post('main')){
            $data['titles']=$this->Programs->select_title($this->input->post('main'));
            $this->load->view('admin/public_relations/load_program_titles',$data);
        }
        if($id != 0)
            $data['result']=$this->Programs->getById_about($id);
            
        $data['programs'] = $this->Programs->select('');
        $data['table'] = $this->Programs->select_about();
        $data['subview'] = 'admin/public_relations/programs_about';
        $this->load->view('admin_index', $data);
    }
    
    public function delete_about($id,$page){
        $this->load->model('Public_relations/Programs');
        $this->Programs->delete_about($id);
        redirect('Public_relations/'.$page.'/0','refresh');
    }
    
    public function delete_programs($id,$page){
        $this->load->model('Public_relations/Programs');
        $this->Programs->delete($id);
        redirect('Public_relations/'.$page.'/0','refresh');
    }
    
    public function programs_photo(){
        $this->load->model('Public_relations/Programs');
        
        if(count($_FILES['imgs']['name']) > 0){
            $filesCount = count($_FILES['imgs']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['imgs']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['imgs']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['imgs']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['imgs']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['imgs']['size'][$i];

                $uploadPath = 'uploads/images';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $file = $fileData['file_name'];
                    $this->Programs->insert_photo($file,0);
                }
            }  
        }
        if($this->input->post('videos')){
            $file = explode('=',$this->input->post('videos'));
            $this->Programs->insert_photo($file[1],1);
        }
        redirect('Public_relations/programs/0', 'refresh');
    }
    
    
    
        /* ===================================================================================================================
 *
 *                                             ---- ABOUT ---
 *
 *=====================================================================================================================
 * */
 public function about_us(){
    $this->load->model("public_relations_models/About");
    $this->load->model("Difined_model");
            if($this->input->post("add")){
               $this->About->insert(); 
               $this->message('success', 'إضافة المقطع');
            redirect('Public_relations/about_us', 'refresh');   
            }       
     $data['all_table']=$this->Difined_model->select_all("about","","","",'');         
     $data['records']=$this->Difined_model->select_all("about","","","",'');      
     $data["select_in"]=$this->About->select_in();
          $data['subview'] = 'admin/public_relations/about_us';
    $this->load->view('admin_index', $data);   
 }
 //-----------------------------------
 public function update_about_us($id){
   $this->load->model("public_relations_models/About");
     $this->load->model("Difined_model");
         if($this->input->post("edit")){
               $this->About->update($id); 
               $this->message('success', 'تعديل المقطع');
            redirect('Public_relations/about_us', 'refresh');   
            }     
     $data['result']=$this->Difined_model->getById("about",$id); 
     $data['all_table']=$this->Difined_model->select_search_key("about","id !=",$id);  
      $data['subview'] = 'admin/public_relations/about_us';
    $this->load->view('admin_index', $data);   
 }
 //-------------------------------------
  public function delete_id($id,$table,$controller){
     $this->load->model("Difined_model");
    $this->load->model("public_relations_models/News");
    $Conditions_arr=array("id" =>$id);
    $this->Difined_model->delete($table,$Conditions_arr);
    if($table == "news"){
     $this->News->delete_where($id);
  
    }
    
   redirect('Public_relations/'.$controller, 'refresh');   
 }
 
  /* ===================================================================================================================
 *
 *                      News                            
 *
 *=====================================================================================================================
 * */
 
  public function add_news(){
     $this->load->model("public_relations_models/News");
     $this->load->model("Difined_model");
         if($this->input->post("add")){
              $this->News->insert_news(2);
          $last=$this->Difined_model->select_last_id('news');
           if ($this->input->post('photo_num') != 0) {
               $max=$this->input->post('photo_num');
               for($x=1;$x<=$max;$x++){
                $input_name='img'.$x;
                $file[]=$this->upload_image($input_name);
               }
               $this->News->insert_photo($last,$file);
            }
        $this->message('success', 'إضافة خبر');
        redirect('Public_relations/add_news','refresh');
     }
     $data['records']=$this->News->select(2);
  
     $data['subview'] = 'admin/public_relations/news';
    $this->load->view('admin_index', $data);  
 }
//------------------------------------------------------------- 
 public function update_news($id){
     $this->load->model("public_relations_models/News");
     $this->load->model("Difined_model");
     if($this->input->post("edit")){
              $this->News->update_news($id);
           if ($this->input->post('photo_num') != 0) {
               $max=$this->input->post('photo_num');
               for($x=1;$x<=$max;$x++){
                $input_name='img'.$x;
                $file[]=$this->upload_image($input_name);
               }
               $this->News->insert_photo($id,$file);
            }
        $this->message('success', 'تعديل بيانات الخبر');
        redirect('Public_relations/add_news','refresh');
     }
    
     $data['result']=$this->Difined_model->getById("news",$id);    
     $data['images']=$this->News->get_photo($id);
     $data['subview'] = 'admin/public_relations/news';
    $this->load->view('admin_index', $data);  
 }
 
  public function load(){
    if ($this->input->post('num') != 0) {
       $this->load->view('admin/public_relations/photos');
     }
 }
 
  public function delete_photo($id,$controler,$main_id){
       $this->load->model("public_relations_models/News");
     $this->News->delete_img($id);
     redirect('Public_relations/'.$controler."/".$main_id,'refresh');
    
 }
  /* ===================================================================================================================
 *
 *                      opinions                         
 *
 *=====================================================================================================================
 * */
  public function add_opinion(){
     $this->load->model("public_relations_models/Opinion");
     $this->load->model("Difined_model");
         if($this->input->post("add")){
           $input_name='img';
                $file=$this->upload_image($input_name);  
        $this->Opinion->insert($file);
        $this->message('success', 'إضافة رأي');
        redirect('Public_relations/add_opinion','refresh');
     }
         $data['records']=$this->Difined_model->select_all("opinions","","","",'');      
  
     $data['subview'] = 'admin/public_relations/opinions';
    $this->load->view('admin_index', $data);  
 }
//------------------------------------------------------------- 
 public function update_opinion($id){
     $this->load->model("public_relations_models/Opinion");
     $this->load->model("Difined_model");
     if($this->input->post("edit")){
            $input_name='img';
                $file=$this->upload_image($input_name);  
    $this->Opinion->update($id,$file); 
        $this->message('success', 'تعديل رأي');
        redirect('Public_relations/add_opinion','refresh');
     }
    
     $data['result']=$this->Difined_model->getById("opinions",$id);    
     $data['subview'] = 'admin/public_relations/opinions';
    $this->load->view('admin_index', $data);  
 }
 

 
    

}