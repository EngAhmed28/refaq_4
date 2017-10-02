<?php
class Exchange_orders extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
           redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));
        
        $this->load->model('storage/Supplies');
        $this->load->model('Exchange/Ex_orders');
        $this->load->model('finance_resource_models/Donors');
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
        $data['products']= $this->Ex_orders->products();
        $data['units']= $this->Ex_orders->units();
        
        if($this->input->post('save') && $this->uri->segment(3) == 0){
            $this->Ex_orders->insert();
            $this->message('success','إضافة أمر صرف');
            redirect('Exchange_orders/index/0', 'refresh');
        }
        if($this->input->post('save') && $this->uri->segment(3) != 0){
            $this->Ex_orders->update($this->uri->segment(3));
            $this->message('success','تعديل أمر الصرف');
            redirect('Exchange_orders/update_order','refresh');
        }
        if($id != 0 && $this->input->post('load') != 10){
            $data['result']=$this->Ex_orders->getById($id);
            $data['result2']=$this->Ex_orders->select_items_where($id);
            $data['products2']= $this->Supplies->select_store_of_products($data['result2'][0]->storage_code_fk);
        }    
        if($this->input->post('store_id') || $this->input->post('products_id')){
            $data['recordes1']= $this->Supplies->select_store_of_products($this->input->post('store_id'));
            $data['recordes2']= $this->Supplies->select_unite_of_products($this->input->post('products_id'));
            $this->load->view('admin/exchange_orders/load',$data);
        }
        if($this->input->post('load') == 10){
            $data['resultt']=$this->Ex_orders->getById($this->uri->segment(3));
            $data['id'] = $this->input->post('id');
            $data['load'] = $this->input->post('load');
            $this->load->view('admin/exchange_orders/session', $data);
        }
        else{
            $data["count"] = $this->Ex_orders->select();
            $data["donors"] = $this->Donors->select();
            $data["store"] = $this->Supplies->select_store();
            $data['subview'] = 'admin/exchange_orders/exchange_orders';
            $this->load->view('admin_index', $data);
        }
    }
    
    public function update_order(){ 
        $data['products']= $this->Ex_orders->products();
        $data['units']= $this->Ex_orders->units();
        $data["donors"] = $this->Ex_orders->doners();
        $data["store"] = $this->Ex_orders->store();
        $data["table"] = $this->Ex_orders->select();
        $data["items"] = $this->Ex_orders->select_items();
        $data['subview'] = 'admin/exchange_orders/update_order';
        $this->load->view('admin_index', $data); 
    }
    
    public function delete($id){
        $this->Ex_orders->delete($id);
        redirect('Exchange_orders/update_order');
    }
}