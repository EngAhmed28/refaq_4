<?php
require'../requires/global.inc.php';
//-------------------------------------------------------------------------------------------------------------------
//////--------------- 25 -12-2016 ----------------------------------
$query_admin=$db->select('*','accounts_group','WHERE from_id = 0 ');

$live_select ='<select name="load_account" id="load_account"   class="selectpicker form-control"  data-live-search="true"  style="width:50%;">';
//$live_select.= '<option data-tokens="ketchup mustard" > لإضافة حساب الأعباء ( إضغط هنا لإضافة حساب الأعباء علي الفاتورة في حاله عدم الاختيار سوف يتم ترحيل قيمة الأعباء ضمن حساب الدائن في الفاتورة   ) </option>';
$live_select.= '<option data-tokens="ketchup mustard" value="0"> إختر إسم الحساب  </option>';





for($x = 0 ; $x < $query_admin['MAX'] ; $x++){

    $query_dep=$db->select('*','accounts_group','WHERE   from_id ='.$query_admin['SELECT'][$x]['id']);
    if( $query_dep['MAX'] >0){
        $live_select.= '<option data-tokens="ketchup mustard"  value="'.$query_admin['SELECT'][$x]['id'].'"  disabled>'.$query_admin['SELECT'][$x]['name'].'</option>';
    }else{
        $live_select.=  '<option data-tokens="ketchup mustard"  value="'.$query_admin['SELECT'][$x]['code'].'"  >'.$query_admin['SELECT'][$x]['name'].'</option>';
    }
    for($a = 0 ; $a < $query_dep['MAX'] ; $a++){

        $query_d=$db->select('*','accounts_group','WHERE   from_id ='.$query_dep['SELECT'][$a]['id']);

        if( $query_d['MAX'] >0){
            $live_select.= '<option data-tokens="ketchup mustard"  value="'.$query_dep['SELECT'][$a]['id'].'" disabled>---'.$query_dep['SELECT'][$a]['name'].'</option>';
        }else{
            $live_select.= '<option data-tokens="ketchup mustard"  value="'.$query_dep['SELECT'][$a]['code'].'" >---'.$query_dep['SELECT'][$a]['name'].'</option>';
        }


        for($d = 0 ; $d < $query_d['MAX'] ; $d++){

            $query_a=$db->select('*','accounts_group','WHERE   from_id ='.$query_d['SELECT'][$d]['id']);

            if($query_a['MAX'] >0){
                $live_select.=  '<option data-tokens="ketchup mustard"  value="'.$query_d['SELECT'][$d]['id'].'" disabled>----'.$query_d['SELECT'][$d]['name'].'</option>';

            }else{
                $live_select.=  '<option data-tokens="ketchup mustard"  value="'.$query_d['SELECT'][$d]['code'].'" >----'.$query_d['SELECT'][$d]['name'].'</option>';

            }

            for($v = 0 ; $v < $query_a['MAX'] ; $v++){
                $query_last=$db->select('*','accounts_group','WHERE   from_id ='.$query_a['SELECT'][$v]['id']);
                if($query_last['MAX'] >0){
                    $live_select.= '<option data-tokens="ketchup mustard"  value="'.$query_a['SELECT'][$v]['id'].'" disabled>-----'.$query_a['SELECT'][$v]['name'].'</option>';

                }else{
                    $live_select.= '<option data-tokens="ketchup mustard"  value="'.$query_a['SELECT'][$v]['code'].'" >-----'.$query_a['SELECT'][$v]['name'].'</option>';

                }


                $query_l=$db->select('*','accounts_group','WHERE   from_id ='.$query_a['SELECT'][$v]['id']);
                for($vv = 0 ; $vv < $query_l['MAX'] ; $vv++){
                    $query_y=$db->select('*','accounts_group','WHERE   from_id ='.$query_l['SELECT'][$vv]['id']);
                    if($query_y['MAX'] >0){
                        $live_select.= '<option data-tokens="ketchup mustard"  value="'.$query_l['SELECT'][$vv]['id'].'" disabled>------'.$query_l['SELECT'][$vv]['name'].'</option>';

                    }else{
                        $live_select.= '<option data-tokens="ketchup mustard"  value="'.$query_l['SELECT'][$vv]['code'].'" >------'.$query_l['SELECT'][$vv]['name'].'</option>';

                    }
                }
            }
        }
    }
}
$live_select.='</select>';
//////--------------- 25 -12-2016 -----------------------------------------------------------------------------
$total = 0;
$session_id=$_SESSION['admin'];

if( $_POST["fatora_code"] &&   $_POST["all_buy_cost"]  )

//if( $_POST['supp_code'])
{ //var_dump($_POST);
    foreach($_POST as $key => $value){
        $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
    }

    /*******************************************/

    if($_POST["expired_date"] == 'لا يوجد تاريخ إنتهاء صلاحية'){
        $expired_date='9999999999';
    }else {
        $expired_date=strtotime($_POST["expired_date"]);
    }


    /***********************************************/
    $new_product['fatora_code'] = $_POST['fatora_code'] ;
    $new_product['fatora_date'] = $_POST["fatora_date"];
    $new_product['marge3_num'] = $_POST["marge3_num"];
    $new_product['sanf'] = $_POST["sanf"];
    $new_product['pay_method'] = $_POST["pay_method"];


    $new_product['supp_code'] = $_POST["supp_code"];
    $new_product['unit_selected'] = $_POST["unit_selected"];
    $new_product['expired_date'] = $expired_date;
    $new_product['all_buy_cost'] = $_POST["all_buy_cost"];
    $new_product['amount'] = $_POST["amount"];
    $new_product['one_buy_cost'] = $_POST["one_buy_cost"];
    $new_product['one_buy_sell'] = $_POST["one_buy_sell"];

    $new_product['bank_name'] = $_POST["bank_name"];
    $new_product['check_num'] = $_POST["check_num"];
    $new_product['check_value'] = $_POST["check_value"];
    $new_product['recive_date'] = $_POST["recive_date"];

    $new_product['ma5zon'] = $_POST["ma5zon"];
    /* $new_product['box_name'] = $_POST["box_name"];
     $new_product['cart_number'] = $_POST["cart_number"];
     */
    if(isset($_SESSION["purchases_add".$session_id])){  //if session var already exist
        if(isset($_SESSION["purchases_add".$session_id][$new_product['sanf']])) //check item exist in products array
        {
            unset($_SESSION["purchases_add".$session_id][$new_product['sanf']]); //unset old item
        }
    }

    $_SESSION["purchases_add".$session_id][$new_product['sanf']] = $new_product;	//update products with new item ar/ray

//fatora_date - fatora_code marge3_num  pay_method  supp_code


    if($_POST["pay_method"] == 1){
        echo' <script>
               document.getElementById("fatora_code").readOnly = true;
               document.getElementById("pay_method").disabled = true;
              document.getElementById("fatora_date").disabled = true;
              
               document.getElementById("marge3_num").disabled = true;
               document.getElementById("supp_code").disabled = true;
               
               
               </script>';
    }
    elseif($_POST["pay_method"] == 2){
        echo '<script>
              document.getElementById("fatora_code").readOnly = true;
            document.getElementById("fatora_date").readOnly = true;  
               document.getElementById("marge3_num").disabled = true;
              document.getElementById("pay_method").disabled = true;
              document.getElementById("supp_code").disabled = true;
              </script>';
    }
    elseif($_POST["pay_method"] == 3){
        echo '<script>
         document.getElementById("fatora_code").readOnly = true;
          document.getElementById("fatora_date").readOnly = true;       
          document.getElementById("pay_method").disabled = true;
          document.getElementById("supp_code").disabled = true;
          document.getElementById("bank_name").disabled = true;
          document.getElementsByName("check_num").readOnly = true;
          document.getElementsByName("check_value").readOnly = true;
          document.getElementsByName("recive_date").readOnly = true;
          </script>';
    }elseif($_POST["pay_method"]  == 0){
        echo '<script>
          document.getElementById("fatora_code").readOnly = true;
          document.getElementById("fatora_date").disabled = true;
           document.getElementById("marge3_num").disabled = true;
            document.getElementById("supp_code").disabled = true;
          </script>
          
          
          
          ';

    }


    echo ' <script>
     document.getElementById("expired_date").readOnly = false;
     document.getElementById("expired_date").type = "date";
    </script> ';
    echo ' <script> 
        $("#txt_all_big_amount").val("");
        $("#txt_all_buy").val("");
        $("#txt_one_big_cost").val("");
        $("#ma5zon").val("");
          $("#one_buy_sell").val("");
        $("#sanf").val("");
         $("#expired_date").val("");
        
        </script>';


}//end if post
elseif(  $_POST["all_buy_cost"]){
    //  var_dump("2");
    foreach($_POST as $key => $value){
        $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
    }
    $modes = current($_SESSION["purchases_add".$session_id]);


    /*   $new_product['sanf'] = $_POST['sanf'] ;
       $new_product['pay_method'] = $modes["pay_method"];
       $new_product['sanf_id'] = $_POST["sanf_id"];
       $new_product['supplier_id'] = $modes["supplier_id"];
       $new_product['amount'] = $_POST["amount"];
       $new_product['each_price'] = $_POST["each_price"];
       $new_product['total_price'] = $_POST["total_price"];
       $new_product['data'] = $modes["fatora_date"];
       $new_product['bank_name'] = $modes["bank_name"];
       $new_product['check_num'] = $modes["check_num"];
       $new_product['check_value'] = $modes["check_value"];
       $new_product['recive_date'] = $modes["recive_date"];
       $new_product['ma5zon'] = $_POST["ma5zon"];
       $new_product['box_name'] = $modes["box_name"];
       $new_product['cart_number'] = $_POST["cart_number"];

         */

    // --------------------- 27-4-2017
    if($_POST["expired_date"] == 'لا يوجد تاريخ إنتهاء صلاحية'){
        $expired_date='9999999999';
    }else {
        $expired_date=strtotime($_POST["expired_date"]);
    }
    // --------------------- 27-4-2017


    $new_product['fatora_code'] = $modes['fatora_code'] ;
    $new_product['fatora_date'] = $modes["fatora_date"];
    $new_product['marge3_num'] = $modes["marge3_num"];
    $new_product['sanf'] = $_POST["sanf"];
    $new_product['pay_method'] = $modes["pay_method"];


    $new_product['supp_code'] = $modes["supp_code"];
    $new_product['unit_selected'] = $_POST["unit_selected"];
    $new_product['expired_date'] = $expired_date;
    $new_product['all_buy_cost'] = $_POST["all_buy_cost"];
    $new_product['amount'] = $_POST["amount"];
    $new_product['one_buy_cost'] = $_POST["one_buy_cost"];
    $new_product['one_buy_sell'] = $_POST["one_buy_sell"];

    $new_product['bank_name'] = $modes["bank_name"];
    $new_product['check_num'] = $modes["check_num"];
    $new_product['check_value'] = $modes["check_value"];
    $new_product['recive_date'] = $modes["recive_date"];
    $new_product['ma5zon'] = $modes["ma5zon"];






    if(isset($_SESSION["purchases_add".$session_id])){  //if session var already exist
        if(isset($_SESSION["purchases_add".$session_id][$new_product['sanf']])) //check item exist in products array
        {
            unset($_SESSION["purchases_add".$session_id][$new_product['sanf']]); //unset old item
        }
    }

    $_SESSION["purchases_add".$session_id][$new_product['sanf']] = $new_product;	//update products with new item array
    /*  echo ' <script>
         $("#txt2").val("");
         $("#txt1").val("");
         $("#txt3").val("");
         $("#ma5zon").val("");
         $("#sanf").val("");
         </script>';*/
    echo ' <script>
     document.getElementById("expired_date").readOnly = false;
     document.getElementById("expired_date").type = "date";
    </script> ';


    echo ' <script> 
        $("#txt_all_big_amount").val("");
        $("#txt_all_buy").val("");
        $("#txt_one_big_cost").val("");
         $("#one_buy_sell").val("");
        
        $("#ma5zon").val("");
        $("#sanf").val("");
          $("#expired_date").val("");
        </script>';

}
################## list products in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{

    if(isset($_SESSION["purchases_add".$session_id]) && count($_SESSION["purchases_add".$session_id])>0){ //if we have session variable




        $mode = current($_SESSION["purchases_add".$session_id]);
        $table = '<table id="colored-bgg" class="table table-bordered success">
                 <thead>
                  <tr>
                   <th>م</th> 
                   <th>اسم الصنف</th> 
                   <th>الكمية  	</th> 
                   <th>الوحدة	</th> 
                   <th>سعر شراء الوحدة</th> 
                   <th>إجمالي تكلفة الشراء</th> 
                   <th>الأجراء</th>
                   </tr>
                </thead>
              <tbody>';

        for($x = 0 ; $x < count($_SESSION["purchases_add".$session_id]) ; $x++){
            $code = $mode['sanf'];

            if($mode['unit_selected']==1){$unite ='وحدة كبرى' ;}else{ $unite='وحدة صغرى';}

            $sanf_name =$db->select('*','accounts_group','WHERE code='.$mode['sanf']);
            $sanfs_card=$db->select('*','sanfs_card','WHERE sanf_code='.$mode['sanf']);

            $table .= '<tr>
                    <td scope="row">'.($i+1).'</td>
                    <td>'.$sanfs_card['SELECT'][0]['sanf_name'].'</td> 
                    <td>'.$mode['amount'].'</td> 
                    <td>'.$unite.'</td> 
                    <td>'.$mode['one_buy_cost'].'</td>  
                    <td>'.$mode['all_buy_cost'].'</td> 
                    <td> 
                   <span class="off" data-code='.$code.'><i class="fa fa-times"></i></span>
                   </td>
                   </tr> ';

            $Total_fatora +=   $mode['all_buy_cost'] ;
            $mode = next($_SESSION["purchases_add".$session_id]);
        }
        $table .= '</tbody></table>
              <form action="action.php" method="POST">
               <div class="form-group">	
                 <div class="col-xs-2"> 
                 <label>قيمة الفاتورة</label>
                 </div>
                <div class="col-xs-10 col-sm-10"> 
                <input type="text" readonly class="form-control price" id="text99"   name="value" value="'.$Total_fatora.'"   placeholder="قيمة الفاتورة">
              </div> </div> ';

        $table .= ' 
         <div class="form-group">	
         <div class="col-sm-2">  <label>قيمة الاعباء</label> </div>  
            <div class="col-sm-3">   
            <input type="number" min="0"  step="1" required  id="text22" class="form-control price" name="load_value" value=""   placeholder="قيمة الاعباء">
            </div>
           <div class="col-sm-2">  <label>حساب الإعباء</label> </div>  ';


        $table .= '<div class="col-sm-5"> 	'.$live_select.'  </div>';

        $table .= '</div>';

        /*
        $table .= '<div class="col-xs-10 col-sm-7">
                         <select name="box_name"  id="box_name2" class="form-control"  >
                    <option value="0" >  لإضافة حساب الأعباء ( إضغط هنا لإضافة حساب الأعباء علي الفاتورة في حاله عدم الاختيار سوف يتم ترحيل قيمة الأعباء ضمن حساب الدائن في الفاتورة   )</option>
                    ';
              $box_table = $db->select("*","settings","where id = 3 ");
            $box_root = $db->select("*",$box_table["SELECT"][0]["name"],"WHERE code = ".$box_table["SELECT"][0]["code"]);
            $box_branches = $db->select("*",$box_table["SELECT"][0]["name"],"WHERE from_id = ".$box_root["SELECT"][0]["id"]);
                   for ($ii = 0 ; $ii < $box_branches["MAX"] ; $ii++)
                    {
                     $table .=  '<option value="'.$box_branches['SELECT'][$ii]['code'].'">'.$box_branches['SELECT'][$ii]['name'].'</option>';
                   }
                     $table .= '</select>
                                </div>';
        */


        $table .=  '        <div class="form-group">      
                <div class="col-sm-2">  <label>بيان الاعباء</label> </div>
                    <div class="col-xs-10 col-sm-10">   
                         <input type="text"  class="form-control " name="pyan_load"  placeholder="بيان الاعباء" >
                           </div></div>';
        $table .='
<div class="form-group">	
<div class="col-xs-2"> 
<label>قيمة الفاتورة النهائية</label>
</div>
<div class="col-xs-10 col-sm-10">   
<input type="text" readonly id="text55" class="form-control price" name="total_all_f_price"    placeholder="إجمالي الفاتورة">
</div> </div> 
<div class="form-group">	
<div class="col-xs-2"> 
<label>البيان</label>
</div>
<div class="col-xs-10 col-sm-10">   
<input type="text"  class="form-control " name="byan_fatora"    placeholder="البيان">
</div> 

</div> 
<input type="hidden" name="fatota_time" value="'.time().'" />
<input type="hidden" name="total_value_fatora" value="'.$Total_fatora.'" />
 <input type="hidden" name="action" value="add_purchases_add" />  

<input type="hidden" name="table" value="other" />
  <input type="submit" class="btn btn-success btn-lg btn-block" value="حفظ الفاتورة"  /> 
</div></form>';





    }
    echo $table;
}



################# remove item ################
if(isset($_GET["remove_code"]) && isset($_SESSION["purchases_add".$session_id]))
{
    $product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

    if(isset($_SESSION["purchases_add".$session_id][$product_code]))
    {
        unset($_SESSION["purchases_add".$session_id][$product_code]);
    }

}
###################################################################







?><p style="font-size:+3; color:#13CEE6;"></p>

<style>

    .bootstrap-select{
        width: 50% !important;
    }

</style>



<script type="text/javascript">
    $('.selectpicker').selectpicker({
    });
</script>



<script>
    $('.price').keyup(function () {
        var sum = parseFloat($("#txt1").val()) / parseFloat($("#txt2").val()) ;
        $('#txt3').val(sum);
        var total_amount2 = parseFloat($("#text99").val()) + parseFloat($("#text22").val()) ;
        $('#text55').val(total_amount2);

    });


