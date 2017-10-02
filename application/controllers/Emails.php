<?php
class Emails extends CI_Controller
{
    public $email_count;
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
           redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        
        $this->load->model('email/Email');
        $this->email_count = $this->Email->email_count();
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
            return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> Êã ÈäÌÇÍ ...</h4><p>'.$text.'!</p></div>');
        }elseif($type=='wiring'){
            return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> ÊÍĞíÑ åÇã ...</h4><p>'.$text.'</p></div>');
        }elseif($type=='error'){
            return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> ÎØÂ ...</h4><p>'.$text.'</p></div>');
        }
    }
    
    public function inbox($type, $id){
        if($this->input->post('send') == 1){
            $email_id = $this->Email->insert($this->uri->segment(3));
            
            if($_FILES['files']['name'][0] != ''){
                $filesCount = count($_FILES['files']['name']);
                for($i = 0; $i < $filesCount; $i++){
                    $_FILES['userFile']['name'] = $_FILES['files']['name'][$i];
                    $_FILES['userFile']['type'] = $_FILES['files']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['userFile']['error'] = $_FILES['files']['error'][$i];
                    $_FILES['userFile']['size'] = $_FILES['files']['size'][$i];
    
                    $uploadPath = 'uploads/images';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('userFile')){
                        $fileData = $this->upload->data();
                        $file = $fileData['file_name'];
                        $this->Email->insert_files($file,$email_id);
                    }
                }
            }
            redirect('Emails/inbox');
        }  
        if($id != 0){
            $data['result'] = $this->Email->getById($id);
            $data['files'] = $this->Email->files($data['result']['email_id']);
        }
        
        $data['type'] = $type;
        $data['users'] = $this->Email->select_users();
        $data['fetch_users'] = $this->Email->fetch_users();
        $data['allDep'] = $this->Email->select_allDep();
        $data['emails_sent'] = $this->Email->select_emails('','','from',1);
        $data['emails_to_me'] = $this->Email->select_emails('','','to','');
        $data['starred'] = $this->Email->select_emails(1,'','to',''); 
        $data['deleted'] = $this->Email->select_emails('',1,'to','');            
        $data['subview'] = 'admin/email/email';
        $this->load->view('admin_index', $data);
    }
    
    public function inbox_table($status){
        if($this->input->post('id')){
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('emails',array("starred"=>$this->input->post('starred')));
        }
        
        if($this->input->post('status')){
            if($this->input->post('status') != 'deleted')
                $value = 1;
            else
                $value = 2;
            foreach($this->input->post('check') as $checked){
                $this->db->where('id',$checked);
                $this->db->update('emails',array("deleted"=>$value));
            }
        }
        
        $data['status'] = $status;
        $data['users'] = $this->Email->select_users();
        $data['emails_sent'] = $this->Email->select_emails('','','from',1);
        $data['emails_to_me'] = $this->Email->select_emails('','','to','');
        $data['starred'] = $this->Email->select_emails(1,'','to',''); 
        $data['deleted'] = $this->Email->select_emails('',1,'to','');
        $data['subview'] = 'admin/email/inbox';
        $this->load->view('admin_index', $data);
    }
    
    public function delete_selected($page){
        if($page != 'deleted')
            $value = 1;
        else
            $value = 2;
        foreach($_POST['check'] as $checked){
            $this->db->where('id',$checked);
            $this->db->update('emails',array("deleted"=>$value));
        }
        redirect('Emails/inbox_table/'.$page.'');
    }
    
    public function reading($id){
        $this->db->where('id',$id);
        $this->db->update('emails',array("readed"=>1));
        
        $data['result'] = $this->Email->getById($id);
        $data['files'] = $this->Email->files($data['result']['email_id']);
        $data['users'] = $this->Email->select_users();
        $data['emails_sent'] = $this->Email->select_emails('','','from',1);
        $data['emails_to_me'] = $this->Email->select_emails('','','to','');
        $data['starred'] = $this->Email->select_emails(1,'','to',''); 
        $data['deleted'] = $this->Email->select_emails('',1,'to','');
        $data['subview'] = 'admin/email/reading';
        $this->load->view('admin_index', $data);
    }
    
    public function downloads($file,$id)
    {
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/images/'.$file); 
        force_download($name, $data); 
        redirect('Emails/reading/'.$id.'','refresh');
    }

}