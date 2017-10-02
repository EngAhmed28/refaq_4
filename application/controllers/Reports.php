<?php
class Reports extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        if($this->session->userdata('is_logged_in')==0){
            redirect('login');
        }
        $this->load->helper(array('url','text','permission','form'));

        $this->load->model('Products/Composite');

        //  $this->load->model('finance_resource_models/Donors');
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




        if($this->input->post('form_date') && $this->input->post('to_date') && $this->input->post('type')){
        $data['form_date']=$this->input->post('form_date');
        $data['to_date']=$this->input->post('to_date');
        $data['type']=$this->input->post('type');
        if($this->input->post('type') == 1){
            $this->load->model('Supplies/Orders');

            $data['products']= $this->Orders->products();
            $data['units']= $this->Orders->units();
            $data["donors"] = $this->Orders->doners();
            $data["store"] = $this->Orders->store();
            $data["table"] = $this->Orders->select_from_to($this->input->post('form_date'),$this->input->post('to_date'));
            $data["items"] = $this->Orders->select_items();
        }else{

            $this->load->model('Exchange/Orders');
            $data['products']= $this->Orders->products();
            $data['units']= $this->Orders->units();
            $data["donors"] = $this->Orders->doners();
            $data["store"] = $this->Orders->store();
            $data["table"] = $this->Orders->select_from_to($this->input->post('form_date'),$this->input->post('to_date'));
            $data["items"] = $this->Orders->select_items();
        }
        $this->load->view('admin/reports/load', $data);

        }else{
            $data['records']= $this->Composite->select_composite_p_all();
            $data["composite_p"] = $this->Composite->select_composite_p();
            $data['subview'] = 'admin/reports/all_data';
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
    
    public function all_products(){
        $this->load->model('Report');
        
        $data['compination']= $this->Report->products(2);
        $data['ordinary']= $this->Report->products(1);
        $data['subview'] = 'admin/reports/all_products';
        $this->load->view('admin_index', $data);
    }
}