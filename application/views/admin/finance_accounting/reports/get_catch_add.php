<?php
$session_id=$_SESSION["user_id"];

if(isset( $_POST['receipt_date'] ))
 {
    foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
	}
    //---------------------
   if(isset($_POST['vouch_type'])){
    $new_product['vouch_type'] = $_POST["vouch_type"];
        if($_POST['vouch_type'] ==1){
             $new_product['box_name'] = $_POST["box_name"];     
        }elseif($_POST['vouch_type'] ==2 || $_POST['vouch_type'] ==3 ){
             $new_product['bank_name']=$_POST['bank_name'];
             $new_product['check_num']=$_POST['check_num'];
             $new_product['recive_date']=$_POST['recive_date']; 
        }
    
   }elseif(!(isset($_POST['vouch_type']))){
    $modes=current($_SESSION["catch_addtion".$session_id]);
    $new_product['vouch_type']=$modes['vouch_type'];
        if($modes['vouch_type'] ==1){
           $new_product['box_name'] = $modes["box_name"];   
        }elseif($modes['vouch_type'] ==2 || $modes['vouch_type'] ==3 ){
             $new_product['bank_name']=$modes['bank_name'];
             $new_product['check_num']=$modes['check_num'];
             $new_product['recive_date']=$modes['recive_date']; 
        }
   }
   //------------------------
if(isset($_SESSION["catch_addtion".$session_id])){  //if session var already exist
	if(isset($_SESSION["catch_addtion".$session_id][$new_product['account_code']])) //check item exist in products array
	{
		unset($_SESSION["catch_addtion".$session_id][$new_product['account_code']]); //unset old item
	}
 }

 $_SESSION["catch_addtion".$session_id][$new_product['account_code']] = $new_product;	//update products with new item array



  if(isset($_POST['vouch_type'])){
    if($_POST["vouch_type"]==1){

        echo '<script>
      document.getElementById("vouch_num").readOnly = true;
      document.getElementById("receipt_date").readOnly = true;
      document.getElementById("vouch_type").disabled = true;
      document.getElementById("box_name").disabled = true;
      </script>';
    }elseif($_POST["vouch_type"]==2){
        echo '<script>
     document.getElementById("vouch_num").readOnly = true;
     document.getElementById("receipt_date").readOnly = true;
     document.getElementById("vouch_type").disabled = true;
     document.getElementById("bank_name").disabled = true;
     document.getElementById("check_num").disabled = true;
     document.getElementById("recive_date").disabled = true;
 </script>';
    }elseif($_POST["vouch_type"]==3){
        echo '<script>
    document.getElementById("vouch_num").readOnly = true;
    document.getElementById("receipt_date").readOnly = true;
    document.getElementById("vouch_type").disabled = true;
    document.getElementById("bank_name").disabled = true;
    document.getElementById("check_num").disabled = true;
    document.getElementById("recive_date").disabled = true;
     </script>';
    }
      }//if  
echo ' <script> 
        $("#value").val("");
        $("#byan_sarf").val("");
         $("#account_code").val("");
        </script>';

 }
################## listt ###################


if(isset($_POST["remove_code"]) && isset($_SESSION["catch_addtion".$session_id]))
{
	$product_code   = filter_var($_POST["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove
   
	if(isset($_SESSION["catch_addtion".$session_id][$product_code]))
	{
		unset($_SESSION["catch_addtion".$session_id][$product_code]);
	}

}

if(isset($_POST["load_cart"]) && $_POST["load_cart"]==10)
 {


if(isset($_SESSION["catch_addtion".$session_id]) && count($_SESSION["catch_addtion".$session_id])>0){ //if we have session variable
    echo form_open_multipart('dashboard/add_catch',array('class'=>"form-horizontal",'role'=>"form" ));
    $mode = current($_SESSION["catch_addtion".$session_id]);
$table = '<table id="colored-bgg" class="table table-bordered success">
 <thead>
     <tr>
       <th class="text-right">م</th> 
       <th class="text-right">اسم الحساب</th>
       <th class="text-right">القيمة</th>
       <th width="10%" class="text-center">حذف</th>
     </tr>
 </thead>
<tbody>';

$all_value =0;
$i=1;
for($x = 0 ; $x < count($_SESSION["catch_addtion".$session_id]) ; $x++){
    if(!empty($name[$mode["account_code"]][0]->name)){
     $names =   $name[$mode["account_code"]][0]->name;
    }else{
        $names='';
    }
$table .= '<tr>
                <td scope="row">'.($i).'</td>          
                <td>'.$names.'</td>        
                <td>'.sprintf('%.2f',$mode['value']).'</td>                            
                <td style="padding-right:3%"><span class="off" data-code='.$mode['account_code'].'><i class="fa fa-trash fa-2x"></i></span></td>
           </tr> ';
    $i++;
$all_value += $mode['value']  ;
$mode = next($_SESSION["catch_addtion".$session_id]);
}

$table .= ' <tr>
                <th class="text-center" colspan="2"> الإجمالى</th>
                <td colspan="2">'.sprintf('%.2f',$all_value).'</td>
                </tr>
                </tbody>
                </table>';
$table .= '<div class="row">
            <input type="hidden" class="btn btn-success no-border"  name="action" value="add_sanad_abd"  />
            <input type="submit" class="btn btn-success btn-lg btn-block" value="إضافة سند"  />
            </div>';

echo $table;
 }

 }
echo form_close();
################# remove item ################
 


?>
