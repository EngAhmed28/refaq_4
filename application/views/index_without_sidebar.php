<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$ci =& get_instance();
$maincontroller=strtolower($ci->router->fetch_class());
if ($maincontroller=='dashboard'){
    $this->load->view('admin/requires/header');
    $this->load->view($subview);
    $this->load->view('admin/requires/footer');
}else{
    $this->load->view('admin/home');
}
?>