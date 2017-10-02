<?php
class Page404 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->helper('url');
        $this->output->set_status_header('404');
        $data['message']="عذرا المسار غير صحيح  قم بالرجوع للصفحة الرئيسية ومن ثم تتبع المسار الصحيح";
        $data['heading']="انتبة";
        $this->load->view('errors/html/error_404',$data);//loading in my template
    }


}