<?php
$session_id = $_SESSION["user_id"];

foreach($_POST as $key => $value){
    $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
}


if((!(isset($_SESSION["supplies_addtion".$session_id])) || $_SESSION["supplies_addtion".$session_id] == null) && !(isset($_POST["remove_code"]))){
    $new_product['date']              = strtotime($_POST["date"]);
    $new_product['donar_id_fk']       = $_POST["donar_id_fk"];
    $new_product['storage_code_fk']   = $_POST["storage_code_fk"];
}
else{
    $mode = reset($_SESSION["supplies_addtion".$session_id]);
    $new_product['date']              = strtotime($mode["date"]);
    $new_product['donar_id_fk']       = $mode["donar_id_fk"];
    $new_product['storage_code_fk']   = $mode["storage_code_fk"];
}

if(isset($_POST["order_num"])){
    $new_product['order_num']         = $_POST["order_num"];
    $new_product['product_code_fk']   = $_POST["product_code_fk"];
    $new_product['product_unite']     = $_POST["unite"];
    $new_product['product_amount']    = $_POST["product_amount"];
    $new_product['all_cost_exchange'] = $_POST["all_cost_exchange"];
    $new_product['one_cost']          = $_POST["one_cost"];
    
    if(isset($_SESSION["supplies_addtion".$session_id])){  //if session var already exist
        if(isset($_SESSION["supplies_addtion".$session_id][$new_product['product_code_fk']])) //check item exist in products array
        {
            unset($_SESSION["supplies_addtion".$session_id][$new_product['product_code_fk']]); //unset old item
        }			
    }

    $_SESSION["supplies_addtion".$session_id][$new_product['product_code_fk']] = $new_product;	//update products with new item array
}
    
echo '<script>
          document.getElementById("date").disabled = true;
          document.getElementById("donar_id_fk").disabled = true;
          document.getElementById("storage_code_fk").disabled = true;
      </script>';
echo '<script> 
          $("#optionearea1").val("");
          $("#optionearea2").val("");
          $("#product_amount").val("");
          $("#all_cost_exchange").val("");
          $("#one_cost").val(0);
      </script>';

if(isset($_POST["remove_code"]) && isset($_SESSION["supplies_addtion".$session_id]))
{
	$product_code   = filter_var($_POST["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove
   
	if(isset($_SESSION["supplies_addtion".$session_id][$product_code]))
	{
		unset($_SESSION["supplies_addtion".$session_id][$product_code]);
	}

}

if(isset($_POST["load"]) && $_POST["load"]==10){

    if(isset($_SESSION["supplies_addtion".$session_id]) && count($_SESSION["supplies_addtion".$session_id])>0){ //if we have session variable
        $mode = reset($_SESSION["supplies_addtion".$session_id]);
        $table = '<div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                          <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                   <th class="text-right">م</th> 
                                   <th class="text-right">إسم الصنف</th>
                                   <th class="text-right">الوحدة</th>
                                   <th class="text-right">الكمية</th>
                                   <th class="text-right">الإجمالي</th>
                                   <th width="10%" class="text-center">حذف</th>
                                 </tr>
                             </thead>
                            <tbody>';
        $all_value = 0;
        for($x = 0 ; $x < count($_SESSION["supplies_addtion".$session_id]) ; $x++){
            $table .= '<tr>
                            <td>'.($x+1).'</td>          
                            <td>'.$products[$mode['product_code_fk']]->p_name.'</td>  
                            <td>'.$units[$mode['product_unite']]->unit_name.'</td>
                            <td>'.$mode['product_amount'].'</td>          
                            <td>'.sprintf('%.2f',$mode['all_cost_exchange']).'</td>                            
                            <td><span class="off" data-code='.$mode['product_code_fk'].'><i class="fa fa-trash fa-2x"></i></span></td>
                       </tr> ';
        $all_value += $mode['all_cost_exchange'];
        $mode = next($_SESSION["supplies_addtion".$session_id]);
        }
        
        if(isset($resultt) && $resultt != null){
            $note = $resultt['order_notes'];
            $id = $resultt['order_num'];
        }
        else{
            $note = '';
            $id = 0;
        }

        $table .= ' <tr>
                        <td colspan="4"> الإجمالى</td>
                        <td class="text-right" colspan="2">'.sprintf('%.2f',$all_value).'</td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    
                    <div class="col-xs-2">
                        <h4 class="r-h4">البيان:</h4>
                    </div>
                            
                    <div class="col-xs-10 r-input">
                        <input type="text" class="r-inner-h4" name="order_notes" value="'.$note.'" id="order_notes" required />
                    </div>
                    
                    <div class="col-xs-3 r-inner-btn" style="padding-top: 20px;">
                        <input type="hidden" name="order_total_cost" id="order_total_cost"  value="'.$all_value.'" />
                        <input type="submit" role="button" name="save" value="حفظ أمر التوريد" class="btn pull-right" />
                    </div>
                    
                    </div>
                    </div>';
    echo form_open_multipart('Supplies_orders/index/'.$this->uri->segment(3).'');
    echo $table;
    echo form_close();
    }
}

if(isset($_POST["remove_code"]) && isset($_SESSION["supplies_addtion".$session_id]))
{
	$product_code   = filter_var($_POST["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

	if(isset($_SESSION["supplies_addtion".$session_id][$product_code]))
	{
		unset($_SESSION["supplies_addtion".$session_id][$product_code]);
	} 
    if($_SESSION["supplies_addtion".$session_id] == null){
        echo '<script>
                  document.getElementById("date").removeAttribute("disabled");
                  document.getElementById("donar_id_fk").removeAttribute("disabled");
                  document.getElementById("storage_code_fk").removeAttribute("disabled");
                  document.getElementById("date").disabled = false;
                  document.getElementById("donar_id_fk").disabled = false;
                  document.getElementById("storage_code_fk").disabled = false;
              </script>';
    }
}
?>

<script>
$("#results").on('click', 'span.off', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //get product code
        var comment = $(this).parent();
        var commentContainer = comment.parent();
		commentContainer.fadeOut(); 
        
          var remove_code = 'remove_code=' + pcode + '&load=10';
        
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Supplies_orders/index/0',
                data:remove_code,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
        e.preventDefault();
});    
</script>