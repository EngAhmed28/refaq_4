<?php
  function getgroups($sessionrole){
      $ci=&get_instance();
      $ci->load->model('Permission');
      $data=$ci->Permission->get_all_groups($sessionrole);
      return $data;

}
  function getpages($session,$groupid){
      $ci=&get_instance();
      $ci->load->model('Permission');
      $data=$ci->Permission->get_all_pages($session,$groupid);
      return $data;

 }

