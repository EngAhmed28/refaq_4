<?php
class Storage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url', 'text', 'permission', 'form'));
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
      $this->load->model('storage/Supplies');
        $this->load->model('finance_resource_models/Donors');

      //  $this->load->model('secretary/Search');//
      //  $this->load->model('secretary/Details_report');
    }

    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }


    public function  index(){

        //if($this->input->post('add')){
          //  $this->Part->insert();
//            $this->message('success','تم الاضافة ');
           // redirect('admin/Secretary/secretary_part');
      //  }
       // if($this->input->post('submit')){
          //  $this->Part->insert_part();
//            $this->message('success','تم الاضافة ');
          //  redirect('admin/Secretary/secretary_part');
       // }
    //  $data['records'] = $this->Part->select();
      //  $data['parts'] = $this->Part->select_part();
       $data['subview'] = 'admin/Storage/home';
       $this->load->view('admin_index', $data);
    }
    public function add_supplies(){

        if ($this->input->post('store_id')) {
            $id = $this->input->post('store_id');

            $data['recordes']= $this->Supplies->select_store_of_products($id);
            $this->load->view('admin/Storage/get_products',$data);
        }elseif($this->input->post('products_id')){
            $id = $this->input->post('products_id');
            $data['recordess']= $this->Supplies->select_unite_of_products($id);
            $this->load->view('admin/Storage/get_unite',$data);
        }elseif($this->input->post('data')) {
           $this->load->view('admin/Storage/asnaf');

        }else{

            $data["count"] = $this->Supplies->countSuppliers();
            $data["donors"] = $this->Donors->select();
            $data["store"] = $this->Supplies->select_store();
            $data['subview'] = 'admin/Storage/add_supplies';
            $this->load->view('admin_index', $data);
        }
    }

}
    ?>