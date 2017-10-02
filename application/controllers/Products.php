<?php
class Products extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('Products/Composite');
        $this->load->model('Supplies/Orders');
        $this->load->model('storage/Supplies');
        $this->load->model('Exchange/Ex_orders');
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

        $data['products']= $this->Orders->products();


        if($this->input->post('save') && $this->uri->segment(3) == 0){

            $this->Composite->insert();
            $this->message('success','إضافة بيانات التشغيل');
            redirect('Products/index/0', 'refresh');
          }elseif($this->input->post('update')  && $this->uri->segment(3) != 0){


            $this->Composite->update($this->uri->segment(3));
            $this->message('success','تعديل بيانات امر التشغيل');
            redirect('Products/index/0','refresh');

        }else{
            $data['records']= $this->Composite->select_composite_p_all();
            $data["composite_p"] = $this->Composite->select_composite_p();
            $data['subview'] = 'admin/products/run_output';
            $this->load->view('admin_index', $data);
         }

    }

    public function update_data($id){
        $data['products']= $this->Orders->products();
        $data["composite_p"] = $this->Composite->select_composite_p();
        $data["result"] = $this->Composite->getById($id);
        $data['subview'] = 'admin/products/run_output';
        $this->load->view('admin_index', $data);
    }

    public function delete($id){

            $this->Composite->delete($id);
        $this->message('success','تمت عملية الحذف بنجاح');
            redirect('Products/index/0');

    }
    
    
    
    
    
    
    
    
    public function standard($id){
        $data['all_products']= $this->Ex_orders->products();
        $data['units']= $this->Ex_orders->units();
        
        if($this->input->post('save') && $this->uri->segment(3) == 0){
            $this->Ex_orders->insert2();
            $this->message('success','إضافة معيار لصنف مركب');
            redirect('Products/standard/0', 'refresh');
        }
        if($this->input->post('save') && $this->uri->segment(3) != 0){
            $this->Ex_orders->update_standard($this->uri->segment(3));
            $this->message('success','تعديل معيار لصنف مركب');
            redirect('Products/update_standard','refresh');
        }
        if($id != 0 && $this->input->post('load') != 10){
            $data['result']=$this->Ex_orders->getById2($id);
        }    
        if($this->input->post('product_id')){
            $data['product']= $this->Ex_orders->products_where('id',$this->input->post('product_id'));
            $this->load->view('admin/standard/load',$data);
        }
        if($this->input->post('load') == 10){
            $data['resultt']=$this->Ex_orders->getById($this->uri->segment(3));
            $this->load->view('admin/standard/session', $data);
        }
        else{
            $data['products']= $this->Ex_orders->products_where('p_type_fk',1);
            $data["main"] = $this->Ex_orders->products_where('p_type_fk',2);
            $data['subview'] = 'admin/standard/standard';
            $this->load->view('admin_index', $data);
        }
    }
    
    public function update_standard(){ 
        $data['products']= $this->Ex_orders->products();
        $data['units']= $this->Ex_orders->units();
        $data["table"] = $this->Ex_orders->select_standard();
        $data['subview'] = 'admin/standard/update_standard';
        $this->load->view('admin_index', $data); 
    }
    
    public function delete_standard($id){
        $this->Ex_orders->delete_standard($id);
        redirect('Products/update_standard');
    }
}