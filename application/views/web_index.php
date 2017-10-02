<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if($subview == 'web/home'){
$this->load->view('web/requires/home_header');

$this->load->view($subview);

$this->load->view('web/requires/footer');
}else{
$this->load->view('web/requires/header');

$this->load->view($subview);

$this->load->view('web/requires/footer');
    
    
}






?>