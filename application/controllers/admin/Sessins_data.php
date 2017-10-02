<?php
class Sessins_data  extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
         if($this->session->userdata('is_logged_in')==0){
           redirect('login');
      }
        $this->load->helper(array('url','text','permission','form'));        
    }
    private  function test($data=array()){
              echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
//----------------------------------------------------------------------------	   
  public function sanad_sarf_account(){
         $this->load->model("finance_accounting_model/Add_level");
         $this->load->model("finance_accounting_model/Settings");
         $this->load->model("finance_accounting_model/Sarf");
//---------------------------------------    
    if($this->input->post("times") == "frist"){   
      $admin=$this->input->post("admin");
   foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
	}// END FOR
       $account_settting=$this->Add_level->get_by_code($new_product['account_code']);
       $new_product['account_name']=$account_settting['name'];
       if(isset($_SESSION["sanad_sarf_".$admin.""])){  //if session var already exist
			if(isset($_SESSION["sanad_sarf_".$admin.""][$new_product['account_code']])) //check item exist in products array
			{
				unset($_SESSION["sanad_sarf_".$admin.""][$new_product['account_code']]); //unset old item
			}			
		}
		$_SESSION["sanad_sarf_".$admin.""][$new_product['account_code']] = $new_product;	//update products with new item array
       $date["session_name"]="sanad_sarf_".$admin."";   
       $this->load->view('admin/finance_accounting/sarf/load',$date);
//---------------------------------------     
    }elseif($this->input->post("times") == "second"){
      $admin=$this->input->post("admin");   
   foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
	}// END FOR
       $modes=current($_SESSION["sanad_sarf_".$admin.""]);
        $new_product['vouch_type']=$modes['vouch_type'];
        $new_product['box_name'] = $modes["box_name"];   
        $new_product['bank_name']=$modes['bank_name'];
        $new_product['check_num']=$modes['check_num'];
        $new_product['recive_date']=$modes['recive_date']; 
       $account_settting=$this->Add_level->get_by_code($new_product['account_code']);
       $new_product['account_name']=$account_settting['name'];
       if(isset($_SESSION["sanad_sarf_".$admin.""])){  //if session var already exist
			if(isset($_SESSION["sanad_sarf_".$admin.""][$new_product['account_code']])) //check item exist in products array
			{
				unset($_SESSION["sanad_sarf_".$admin.""][$new_product['account_code']]); //unset old item
			}			
		}	
	   $_SESSION["sanad_sarf_".$admin.""][$new_product['account_code']] = $new_product;	//update products with new item array
       $date["session_name"]="sanad_sarf_".$admin."";
       $this->load->view('admin/finance_accounting/sarf/load',$date);
//---------------------------------------  session_name  
    }elseif($this->input->post("code") && $this->input->post("session_name") ){
      //  $this->test("Sss");
        $session_name=$this->input->post("session_name");
        $code=$this->input->post("code");
        if(isset($_SESSION[$session_name][$code])){
             unset($_SESSION[$session_name][$code]);}
        $date["session_name"]=$session_name;
       $this->load->view('admin/finance_accounting/sarf/load',$date);
    }
      
  }
//----------------------------------------------------------------------------	   

  public function sanad_qabd_account(){
         $this->load->model("finance_accounting_model/Add_level");
         $this->load->model("finance_accounting_model/Settings");
         $this->load->model("finance_accounting_model/Qabd");
//---------------------------------------    
    if($this->input->post("times") == "frist"){   
      $admin=$this->input->post("admin");
   foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
	}// END FOR
       $account_settting=$this->Add_level->get_by_code($new_product['account_code']);
       $new_product['account_name']=$account_settting['name'];
       if(isset($_SESSION["sanad_qabd_".$admin.""])){  //if session var already exist
			if(isset($_SESSION["sanad_qabd_".$admin.""][$new_product['account_code']])) //check item exist in products array
			{
				unset($_SESSION["sanad_qabd_".$admin.""][$new_product['account_code']]); //unset old item
			}			
		}
		$_SESSION["sanad_qabd_".$admin.""][$new_product['account_code']] = $new_product;	//update products with new item array
       $date["session_name"]="sanad_qabd_".$admin."";   
       $this->load->view('admin/finance_accounting/qabd/load',$date);
//---------------------------------------     
    }elseif($this->input->post("times") == "second"){
      $admin=$this->input->post("admin");   
   foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
	}// END FOR
       $modes=current($_SESSION["sanad_qabd_".$admin.""]);
        $new_product['vouch_type']=$modes['vouch_type'];
        $new_product['box_name'] = $modes["box_name"];   
        $new_product['bank_name']=$modes['bank_name'];
        $new_product['check_num']=$modes['check_num'];
        $new_product['recive_date']=$modes['recive_date']; 
       $account_settting=$this->Add_level->get_by_code($new_product['account_code']);
       $new_product['account_name']=$account_settting['name'];
       if(isset($_SESSION["sanad_qabd_".$admin.""])){  //if session var already exist
			if(isset($_SESSION["sanad_qabd_".$admin.""][$new_product['account_code']])) //check item exist in products array
			{
				unset($_SESSION["sanad_qabd_".$admin.""][$new_product['account_code']]); //unset old item
			}			
		}	
	   $_SESSION["sanad_qabd_".$admin.""][$new_product['account_code']] = $new_product;	//update products with new item array
       $date["session_name"]="sanad_qabd_".$admin."";
       $this->load->view('admin/finance_accounting/qabd/load',$date);
//---------------------------------------  session_name  
    }elseif($this->input->post("code") && $this->input->post("session_name") ){
      //  $this->test("Sss");
        $session_name=$this->input->post("session_name");
        $code=$this->input->post("code");
        if(isset($_SESSION[$session_name][$code])){
             unset($_SESSION[$session_name][$code]);}
        $date["session_name"]=$session_name;
       $this->load->view('admin/finance_accounting/qabd/load',$date);
    }
      
  }



//----------------------------------------------------------------------------	   

//----------------------------------------------------------------------------	   

//----------------------------------------------------------------------------	   

//----------------------------------------------------------------------------	   

       
}// END CLASS 
?>