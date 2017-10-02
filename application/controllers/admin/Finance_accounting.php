<?php
class Finance_accounting extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
         if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->helper(array('url','text','permission','form'));
        
         $this->load->model("finance_accounting_model/Add_level");
         $this->load->model("finance_accounting_model/Settings");
    }
    private  function test($data=array()){
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
    private  function upload_image($file_name){
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
    private  function upload_file($file_name){
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
    private function url (){
     unset($_SESSION['url']);
        $this->session->set_flashdata('url','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
 //-----------------------------------------   
 private function message($type,$text){
          if($type =='success') {
              return $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible shadow" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>'.$text.'!</p></div>');
          }elseif($type=='wiring'){
              return $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>'.$text.'</p></div>');
          }elseif($type=='error'){
              return  $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" ><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>'.$text.'</p></div>');
          }
        }
/**
 *  ================================================================================================================
 * 
 *  ----------------------------------------------------------------------------------------------------------------
 *                                       
 * -----------------------------------------------------------------------------------------------------------------
 */

    public function index(){
       $data['levels'] = $this->Add_level->get_categories();
       $data['subview'] = 'admin/finance_accounting/test';
     $this->load->view('admin_index', $data); 
    }   
  /**
 * ===============================================================================================================
 * 
 * ========================================== الدليل الحسابى =====================================================
 * 
 * ===============================================================================================================
 */    
 public function add_level(){
        if($this->input->post('code_post')){//get_last
            $data['row'] =$this->Add_level->get_by_code($this->input->post('code_post'));
            if($this->input->post('code_post') != 'frist'){   
                $last =$this->Add_level->get_last($data['row']['id']);
                if($last !=false){
                     $data_load1['new_code'] =$last+1;  
                }else{
                    $arr_zeros=array('','0','00','000','0000','00000','000000');
                    $data_load1['new_code']= $data['row']['code'].$arr_zeros[$data['row']['level']]."1";
                }
                $data_load1['level']=($data['row']['level'] +1);
                $data_load1['id_from']=$data['row']['id'];
                $this->load->view('admin/finance_accounting/add_levels/load1',$data_load1);
            }elseif($this->input->post('code_post') == 'frist'){
                $last =$this->Add_level->get_last(0);
                if($last !=false){
                    $data_load1['new_code']=$last+1;
                }else{
                    $data_load1['new_code']=1;
                }
                $data_load1['level']=1;
                $data_load1['id_from']=0;
                $this->load->view('admin/finance_accounting/add_levels/load3',$data_load1);
            }
        }// rased--
        elseif($this->input->post('rased')){
            $this->load->view('admin/finance_accounting/add_levels/load2');
        } // insert data
        elseif($this->input->post('add_code')){
        //$this->test($_POST);
          $this->Add_level->insert();
            
            redirect('admin/Finance_accounting/add_level');
        }else{
        $data['levels'] = $this->Add_level->get_categories();
        $data['root']=$this->Add_level->root();
        $data['all']=$this->Add_level->select_all();
        $data['table']=$this->Add_level->select_all(); 
        $data['subview'] = 'admin/finance_accounting/add_levels/add_level';
     $this->load->view('admin_index', $data); 
     }
 }      
  //=====================================================
  public function update_levels($id){
        if($this->input->post('code_post')){//get_last
            $data['row'] =$this->Add_level->get_by_code($this->input->post('code_post'));
            if($this->input->post('code_post') != 'frist'){
                $last =$this->Add_level->get_last($data['row']['id']);
                
                if($last !=false){
                    $data_load1['new_code']=$last+1;
                }else{
                    $arr_zeros=array('','0','00','000','0000','00000');
                
                    $data_load1['new_code']= $data['row']['code'].$arr_zeros[$data['row']['level']]."1";
                }
                $data_load1['level']=($data['row']['level'] +1);
                $data_load1['id_from']=$data['row']['id'];
                $this->load->view('admin/finance_accounting/add_levels/load1',$data_load1);
            }elseif($this->input->post('code_post') == 'frist'){
                $last =$this->Add_level->get_last(0);
                if($last !=false){
                    $data_load1['new_code']=$last+1;
                }else{
                    $data_load1['new_code']=1;
                }
                $data_load1['level']=1;
                $data_load1['id_from']=0;
                $this->load->view('admin/finance_accounting/add_levels/load3',$data_load1);
            }
        }// rased--
        elseif($this->input->post('rased')){
            $this->load->view('admin/finance_accounting/add_levels/load2');
        }
        elseif($this->input->post('update_code')){
            $this->Add_level->update($id);
            $this->message('success','تم إضافة الدليل الحسابى');
            redirect('admin/Finance_accounting/add_level');
        }else{
            $data['levels'] = $this->Add_level->get_categories();
            $data['result']=  $this->Add_level->get_by_id($id);
            $data['root']=$this->Add_level->root();
            $data['all']=$this->Add_level->select_all();
            $data['subview'] = 'admin/finance_accounting/add_levels/add_level';
        $this->load->view('admin_index', $data); 
     }
  }
 //----------------------------------------
 public function select_code(){
     if($this->input->post('name_post')){
        $data['name']=$this->input->post('name_post');
       $this->load->view('admin/finance_accounting/add_levels/load4',$data);      
     }
 } 
/**
 * ===============================================================================================================
 * 
 * ===============================   الصرف =======================================================================
 *  
 * ===============================================================================================================
 */  
 public function sand_sarf(){
     $this->load->model("finance_accounting_model/Sarf");
    if($this->input->post("ADD") =="ADD"){
       $admin=$this->input->post("admin");
       $this->Sarf->insert($admin);
        unset($_SESSION["sanad_sarf_".$admin]);
          redirect('admin/Finance_accounting/sand_sarf', 'refresh');
    }
        $data['boxs']=$this->Settings->get_form_id($this->Settings->setting_id(3));
        $data['banks']=$this->Settings->get_form_id($this->Settings->setting_id(4));
        $data["accout_groups"]=$this->Add_level->select_all();
        $data['subview'] = 'admin/finance_accounting/sarf/sanad_sarf';
        $this->load->view('admin_index', $data);     
 }


/*************************************************/


 public function edit_sand_sarf(){
   $this->load->model("finance_accounting_model/Sarf");  
   
    $data['records'] = $this->Sarf->query_vouchers_sarf();
    $data['all_sarf'] = $this->Sarf->select_sarf_group();
    $data['select_all_value'] = $this->Sarf->select_all_value();
    
    $data['subview'] = 'admin/finance_accounting/sarf/edit_sanad_sarf';
    $this->load->view('admin_index', $data);     
 }
 
 
 
 
 
 
 
 
 
 








  /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */    
 public function sand_qabd(){
      
        $this->load->model("finance_accounting_model/Qabd");
    if($this->input->post("ADD") =="ADD"){
       $admin=$this->input->post("admin");
       $this->Qabd->insert($admin);
        unset($_SESSION["sanad_qabd_".$admin]);
          redirect('admin/Finance_accounting/sand_qabd', 'refresh');
    }
    
       $data['boxs']=$this->Settings->get_form_id($this->Settings->setting_id(3));
        $data['banks']=$this->Settings->get_form_id($this->Settings->setting_id(4));
        $data["accout_groups"]=$this->Add_level->select_all();
     $data['subview'] = 'admin/finance_accounting/qabd/sanad_qabd';
        $this->load->view('admin_index', $data); 
 } 

    /**
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 * 
 * ===============================================================================================================
 */   
 public function deport_sarf_sanad(){
     $this->load->model('finance_deports_model/Deport');
        $data['vouchers']=$this->Deport->all_sanadat(0,1); 
        $data['all_vouchers']=$this->Deport->all_sanadat(1,1); 
        $data['all']=$this->Deport->all(1);   
        $data['controller']='deport_sarf_sanad';
        $data['process']=3;
        $data['details_page']='sarf_details';
        $data['account_name']='الحساب الدائن';
        $data['all_details']=$this->Deport->all_deport_details(1);
        $data['account_group']=$this->Deport->account_groups();
        $data['title'] = 'ترحيل سندات الصرف';
        
        
       
       $data['subview'] = 'admin/finance_accounting/deports/deport_sarf_sanad';
        $this->load->view('admin_index', $data);
}

   
     public function deports_vouchers_sarf($vouch_num,$deport_value,$process,$controller){
  $this->load->model('finance_deports_model/Deport');


  if($deport_value == 1){
  $this->Deport->depotr_sarf($vouch_num,$process);
  $this->Deport->update_deport($vouch_num,$deport_value);   
  }elseif($deport_value == 0){
     $this->Deport->delelte_deport($vouch_num);  
     $this->Deport->update_deport($vouch_num,$deport_value);  
  } 
    redirect('admin/Finance_accounting/'.$controller,'refresh');    
      
  }
/***************************************************************/
public function deport_kabd_sanad(){
    $this->load->model('finance_deports_model/Deport');
        $data['vouchers']=$this->Deport->all_sanadat(0,2); 
        $data['all_vouchers']=$this->Deport->all_sanadat(1,2); 
        $data['all']=$this->Deport->all(2);   
        $data['controller']='deport_kabd_sanad';
        $data['process']=4;
        $data['details_page']='kabd_details';
        $data['account_name']='الحساب المدين';
        $data['all_details']=$this->Deport->all_deport_details(2);
        $data['account_group']=$this->Deport->account_groups();
        $data['title'] = 'ترحيل سندات القبض';
      //  $data['subview'] = 'admin/deport_sanadat/deport_sanad';
        $data['subview'] = 'admin/finance_accounting/deports/deport_qabd_sanad';
        $this->load->view('admin_index', $data);
}  








/******************************************************************/  
  
  public function deports_vouchers($vouch_num,$deport_value,$process,$controller){
   $this->load->model('finance_deports_model/Deport');

  if($deport_value == 1){
  $this->Deport->depotr($vouch_num,$process);
  $this->Deport->update_deport($vouch_num,$deport_value);   
  }elseif($deport_value == 0){
     $this->Deport->delelte_deport($vouch_num);  
     $this->Deport->update_deport($vouch_num,$deport_value);  
  } 
    redirect('admin/Finance_accounting/'.$controller,'refresh');    
      
  } 
  
  
  








  
  public function all_deserved_sarf_sand(){
    $this->load->model('finance_deports_model/Deport');
    $today=strtotime(date("Y-m-d",time()));
    $array_dally=array('deport'=>1,'type'=>1,'vouch_type!='=>1,'sheek_status'=>0,'date_received'=>$today);
    $array_all=array('deport'=>1,'type'=>1,'vouch_type!='=>1,'sheek_status'=>0);
    $array_finish=array('deport'=>1,'type'=>1,'vouch_type!='=>1,'sheek_status!='=>0);
     
     $data['process']=3;
     $data['controller']='all_deserved_sarf_sand';
     $data['account_group']=$this->Deport->account_groups();
     $data['all']=$this->Deport->all(1); 
     $data['details_page']='sarf_details';
     $data['all_details']=$this->Deport->all_deport_details(1);
     
     $data['dally_sanad']=$this->Deport->deserved_sanadat($array_dally);
     $data['all_sanad']=$this->Deport->deserved_sanadat($array_all);
     $data['finish_sanad']=$this->Deport->deserved_sanadat($array_finish);
     
     $data['title'] = 'سندات الصرف المستحقة';
     $data['subview'] = 'admin/finance_accounting/deports/deserved_sarf_sand';
     $this->load->view('admin_index', $data);

}
  
  public function deserved_sarf_sand($case,$controller,$vouch_num,$vouch_type,$process){
     $this->load->model('finance_deports_model/Deport');
     $this->Deport->insert_sheek_status($vouch_num,$vouch_type,$case,$process);
      redirect('admin/Finance_accounting/'.$controller,'refresh');    
}
  
  
  
  
  
public function kabd_deport_sheck(){
   $this->load->model('finance_deports_model/Deport');
     $this->load->model('finance_accounting_model/Add_level');
       // $this->load->model("Add_level");
        $array_main=array('deport'=>1,'type'=>2,'vouch_type!='=>1,'sheek_status'=>0,'sheek_under_recived'=>0); 
        $data['deposit_sheck']=$this->Deport->deserved_sanadat($array_main);
        $data['all_accounts']=$this->Add_level->select_all();    
        $data['all']=$this->Deport->all(2);   
        $data['details_page']='kabd_details';
        $data['account_group']=$this->Deport->account_groups();
        $data['all_details']=$this->Deport->all_deport_details(2);
          if($this->input->post('vouch_num')) {
            $arr=array('vouch_num'=>$this->input->post('vouch_num'));
               $data['one_vouch']=$this->Deport->deserved_sanadat($arr);
               $this->load->view('admin/finance_accounting/deports/load',$data);
          }else{
        $data['title'] = 'إيداع شيكات القبض';
       // $data['subview'] = 'admin/deport_sanadat/sheck_deposit';
       
            $data['subview'] = 'admin/finance_accounting/deports/sheck_deposit';
        $this->load->view('admin_index', $data);
          }
}
  
  
  
  public function deposit_sheek($vouch_num,$type){
       $this->load->model('finance_deports_model/Deport');
     $arr_up=array('sheek_under_recived'=>$this->input->post('from_id'),
                   'sheek_under_date'=>strtotime(date("Y-m-d",time())), 
                   'sheek_under_date_s'=>time(),
                   'sheek_under_publisher'=>$_SESSION['user_name']);
     $this->Deport->update_vouch($vouch_num,$type,$arr_up);
     
     
     
    // die();
    //  redirect('admin/finance_accounting/kabd_deport_sheck','refresh');  
         redirect('admin/finance_accounting/kabd_deport_sheck','refresh');        
}
  
  
  public function deport_deposit_kabd_sheek(){
       $this->load->model('finance_deports_model/Deport');
      $array_main=array('deport'=>1,'type'=>2,'vouch_type!='=>1,'sheek_status'=>0,'sheek_under_recived!='=>0); 
        $data['all_sheck']=$this->Deport->deserved_sanadat($array_main);
        $data['all']=$this->Deport->all(2);   
        $data['details_page']='kabd_details';
        $data['account_group']=$this->Deport->account_groups();
        $data['all_details']=$this->Deport->all_deport_details(2);
        $data['title'] = 'ترحيل شيكات تحت التحصيل';
        $data['subview'] = 'admin/finance_accounting/deports/deport_deposit_kabd_sheek';
        $this->load->view('admin_index', $data);
    
}
  
  
  
  
  public function deports_sheek($vouch_num){
     $this->load->model('finance_deports_model/Deport');
    $array_finish=array('vouch_num'=>$vouch_num);
    $data['one_vuch']=$this->Deport->deserved_sanadat($array_finish);
    $data['setting']=$this->Deport->select_(8);
    $madeen=$data['one_vuch'][0]->sheek_under_recived;
    $dayen =$data['setting'][0]->code;
    $this->Deport->deports_sheeks($vouch_num,4,$madeen,$dayen,$data['one_vuch']);   
  
    redirect('admin/finance_accounting/deport_deposit_kabd_sheek','refresh');


}

public function deport_status_kabd_sheek(){
    
     $this->load->model('finance_deports_model/Deport');
    $array_main=array('deport'=>2,'type'=>2,'vouch_type!='=>1,'sheek_status'=>0,'sheek_under_recived!='=>0); 
        $data['all_sheck']=$this->Deport->deserved_sanadat($array_main);
        $data['all']=$this->Deport->all(2);   
        $data['details_page']='kabd_details';
        $data['account_group']=$this->Deport->account_groups();
        $data['all_details']=$this->Deport->all_deport_details(2);
        
        $data['title'] = 'تحصيل الشيكات تحت التحصيل ';
        $data['subview'] = 'admin/finance_accounting/deports/deport_status_kabd_sheek';
        $this->load->view('admin_index', $data);
    
}




public function accept_refuse_sheck(){
    
     $this->load->model('finance_deports_model/Deport');
     
     $arr_select_all=array("vouch_type !="=>1,"type"=>2,"deport"=>2,'sheek_status'=>0);
     $arr_accept_sheek=array("vouch_type !="=>1,"type"=>2,"deport"=>3,'sheek_status'=>1);
     $arr_refuse_sheek=array("vouch_type !="=>1,"type"=>2,"deport"=>3,'sheek_status'=>2);
     $arr_all_sheekat=array("vouch_type !="=>1,"type"=>2,"deport !="=>1,'sheek_under_recived !='=>0);
     
     $data['all_sheek']=$this->Deport->deserved_sanadat($arr_select_all);
     $data['accept_sheek']=$this->Deport->deserved_sanadat($arr_accept_sheek);
     $data['refuse_sheek']=$this->Deport->deserved_sanadat($arr_refuse_sheek);
     $data['all_sheekat']=$this->Deport->deserved_sanadat($arr_all_sheekat);
     
     $data['awrak_kabd']=$this->Deport->select_(8);
     $data['all']=$this->Deport->all(2);   
     $data['all_details']=$this->Deport->all_deport_details(2);
     $data['account_group']=$this->Deport->account_groups(); 
     
     $data['title'] = 'تحصيل الشيكات بالبنك ( قبول أو الرفض )';
     $data['subview'] = 'admin/finance_accounting/deports/accept_refuse_sheck';
     $this->load->view('admin_index',$data);
}
//---------------------------------------------------------------------------------
public function ation_accept_refuse_sheek($action,$vouch_num,$vouch_date,$type){
   $this->load->model('finance_deports_model/Deport');
     
     
     $arr_select=array("vouch_num"=>$vouch_num,"date"=>$vouch_date,'type'=>$type);
     $arr_vouch=$this->Deport->deserved_sanadat($arr_select);
     $this->Deport->accept_refuse_sheek($action,$vouch_num,$arr_vouch,$arr_select);
    
    if($action ==1){
        $this->message('success','تم قبول الشيك'); 
    }elseif($action ==2){
         $this->message('success','تم رفض الشيك'); 
    }
      redirect('admin/finance_accounting/accept_refuse_sheck/','refresh'); 
    
}

/************************************************************************************/

/************ القيود *************************/
public function qued(){
    // $this->load->model("Add_level");
     //$this->load->model("Qued");
      $this->load->model('finance_accounting_model/Add_level');
       $this->load->model('finance_accounting_model/Qued');
     
     
      $data['qied_num']= ( 1+ $this->Qued->record_count());
      $data['all_accounts']=$this->Add_level->select_all();    
    if($this->input->post('dayen_num') && $this->input->post('madeen_num')){
    
        $data['post']=$_POST;
        $data['dayen_num']=$this->input->post('dayen_num');
        $data['madeen_num']=$this->input->post('madeen_num');
        $data['total_row']=$data['madeen_num']+$data['dayen_num'];
         $this->load->view('admin/finance_accounting/qued/load',$data);
    }elseif($this->input->post('add_vouch')){
      //  var_dump($_POST);
      //  die;
        $this->Qued->insert();
         redirect('admin/finance_accounting/qued','refresh');
    }else{
    $data['title'] = 'إضافة القيد';
    
    $data['subview'] = 'admin/finance_accounting/qued/qued';
    $this->load->view('admin_index', $data);
    }// end else
    
}


/*********************/

public function all_qued(){
    
   //$this->load->model("Qued");
   //$this->load->model('Deport');
      $this->load->model('finance_deports_model/Deport');
       $this->load->model('finance_accounting_model/Qued');  
     
    
     $data['details']=$this->Qued->all_qued_details(); 
     $data['account_group']=$this->Deport->account_groups();      
     $arr_select_all=array("deport"=>0);
     $data['quod']=$this->Qued->select($arr_select_all,'groupby');
     $data['title'] = 'القيود';
     $data['subview'] = 'admin/finance_accounting/qued/all_qued';
     $this->load->view('admin_index', $data);
    
}
//--------------------------------------
public function update_qued($qued_num){
   /* $this->load->model("Qued");
    $this->load->model('Deport');*/
       $this->load->model('finance_deports_model/Deport');
       $this->load->model('finance_accounting_model/Qued');  
    
    
      
    if($this->input->post('update_qued')){
        //var_dump($_POST);
        //die;
         $this->Qued->delete(1,$this->input->post('qued_num'));
         $this->Qued->insert();
          $this->message('success','تم التعديل ');
         redirect('admin/finance_accounting/all_qued','refresh');
      }
      
      $data['account_group']=$this->Deport->account_groups(); 
      $arr_select=array("qued_num"=>$qued_num);
      $data['result']=$this->Qued->select($arr_select,'');
      $data['title'] = 'تعديل القد';
      $data['subview'] = 'admin/finance_accounting/qued/all_qued';
      $this->load->view('admin_index', $data);
      }
//-------------------------------------
public function delete_qued($type,$id,$qued_num){
  
       $this->load->model('finance_accounting_model/Qued');  
    
      if($type ==1){
         $this->Qued->delete($type,$qued_num);
           $this->message('success','تم الحذف ');
           redirect('admin/finance_accounting/all_qued/','refresh'); 
    }elseif($type ==2){
         $this->Qued->delete($type,$id); 
          $this->message('success','تم الحذف '); 
            redirect('admin/finance_accounting/update_qued/'.$qued_num,'refresh'); 
    }
}
//--------------------------------------
public function deport_qued(){
  /* $this->load->model("Qued");
   $this->load->model('Deport');*/
      $this->load->model('finance_deports_model/Deport');
       $this->load->model('finance_accounting_model/Qued');  
   
     $data['details']=$this->Qued->all_qued_details(); 
     $data['account_group']=$this->Deport->account_groups();      
     $arr_select_all=array("deport"=>0);
     $data['quod']=$this->Qued->select($arr_select_all,'groupby');
     $arr_select_=array("deport"=>1);
     $data['deported_quod']=$this->Qued->select($arr_select_,'groupby');
     
     $data['title'] = ' ترحيل القيود';
     $data['subview'] = 'admin/finance_accounting/qued/deport_qued';
     $this->load->view('admin_index',$data);
}
//-------------------------------------
public function update_qued_deport($deport,$qued_num){
   
       $this->load->model('finance_accounting_model/Qued');  
      
      if($deport ==1){
        $this->Qued->depotr($deport,$qued_num); 
        $this->Qued->update_deport($deport,$qued_num);
            $this->message('success','تم الترحيل '); 
     }elseif($deport ==0){
         $this->Qued->delete_deport($qued_num); 
         $this->Qued->update_deport($deport,$qued_num);
           $this->message('success','تم إلغاء الترحيل '); 
     }
    redirect('admin/finance_accounting/deport_qued/','refresh'); 
}







/******************** نهاية القيود ********/

    public function add_receipt_report(){
        if ($this->input->post('date_from') && $this->input->post('date_to') AND $this->input->post('sanad_type') ) {
            $data['id']=$this->input->post('date_from');
             $this->load->model('finance_accounting_model/Qabd');
            $data['query'] = $this->Qabd->select_between_dates($this->input->post('date_from'),$this->input->post('date_to'),$this->input->post('sanad_type'));
            $data['query_vouchers'] = $this->Qabd->query_vouchers();
            $data['dayen'] = $this->Qabd->select_dayen();
            $this->load->view('admin/finance_accounting/reports/get_sarf_qabd_period',$data);
        }else{
            $data['title'] = '';
            $data['subview'] = 'admin/finance_accounting/reports/R_sarf_qabd_period';
            $this->load->view('admin_index', $data);

        }
    }



    public function add_receipt_report_day(){
          $this->load->model('finance_accounting_model/Qabd');
        $data['sarf_group'] = $this->Qabd->sarf_group();
        $data['query_vouchers'] = $this->Qabd->query_vouchers();
        $data['dayen'] = $this->Qabd->select_dayen();
        $data['title'] = '';
        $data['subview'] = 'admin/finance_accounting/reports/R_sarf_qabd';
        $this->load->view('admin_index', $data);
    }





 public function R_Report(){
    
       $this->load->model("finance_accounting_model/Add_level");
     
     
        $data['root']=$this->Add_level->root();
            $data['all']=$this->Add_level->select_all();
            $data['table']=$this->Add_level->select_all();
         $data['title'] = 'ارصدة الحسابات';
        $data['metakeyword'] = '';
        $data['metadiscription'] = '';
        $data['subview'] = 'admin/finance_accounting/reports/markz';
        $this->load->view('admin_index', $data);
    
 }


      public function R_accounts_group_test(){
        $this->load->model('finance_accounting_model/Reports');
        $data['records'] = $this->Reports->tree_test();
        $data['title'] = ' كشف حساب لجميع الحسابات الفرعية';
        $data['subview'] = 'admin/finance_accounting/reports/R_accounts_group_test';
        $this->load->view('admin_index', $data);

    }
    
    
    public function R_accounts_group(){
           $this->load->model('finance_accounting_model/Reports');
        $data['records'] = $this->Reports->tree();
        $data['title'] = ' تقرير كل الحسابات';
        $data['subview'] = 'admin/finance_accounting/reports/R_accounts_group';
        $this->load->view('admin_index', $data);

    }
    
    
    
        public function R_select_account(){
     $this->load->model('finance_accounting_model/Reports');
       $this->load->model('finance_accounting_model/Settings');
  
    $data['query_admin'] = $this->Settings->select_query();
    $data['query_dep'] = $this->Settings->select_all_acc();
    if ($this->input->post('account_code') && $this->input->post('account_code') != ''){
        $data['account']= $this->Reports->select_where($this->input->post('account_code'));
        $data['records']= $this->Reports->select_account($data['account'][0]->code);
        $this->load->view('admin/finance_accounting/reports/get_select_account',$data);
    }
    else{
        $data['title'] = ' تقرير تفصيلي لحساب';
        $data['subview'] = 'admin/finance_accounting/reports/R_select_account';
        $this->load->view('admin_index', $data);
    }
    
 }
    
    
        
    public function R_accounts_group_D(){
        $this->load->model('finance_accounting_model/Reports');
        $data['records'] = $this->Reports->tree_D();
        $data['title'] = ' تقرير كل الحسابات';
        $data['subview'] = 'admin/finance_accounting/reports/R_accounts_group_D';
        $this->load->view('admin_index', $data);

    }
    
    
 
 
    
}// END CLASS 