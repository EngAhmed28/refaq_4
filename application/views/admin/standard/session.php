<?php
$session_id = $_SESSION["user_id"];

foreach($_POST as $key => $value){
    $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
}

if(isset($_SESSION["standard_addtion".$session_id]) && isset($_POST["session2"]) && $_POST["session2"] == 1){  //if session var already exist
    unset($_SESSION["standard_addtion".$session_id]); //unset old item     			
}

if(!(isset($_POST["session2"]))){

if((!(isset($_SESSION["standard_addtion".$session_id])) || $_SESSION["standard_addtion".$session_id] == null) && !(isset($_POST["remove_code"])))
    $new_product['product_main_code_fk']  = $_POST["product_main_code_fk"];

else{
    $mode = reset($_SESSION["standard_addtion".$session_id]);
    $new_product['product_main_code_fk'] = $mode["product_main_code_fk"];
}

if(isset($_POST["product_sub_code_fk"])){
    $new_product['product_sub_code_fk']   = $_POST["product_sub_code_fk"];
    $new_product['product_sub_amount']    = $_POST["product_sub_amount"];
    
    if(isset($_SESSION["standard_addtion".$session_id])){  //if session var already exist
        if(isset($_SESSION["standard_addtion".$session_id][$new_product['product_sub_code_fk']])) //check item exist in products array
        {
            unset($_SESSION["standard_addtion".$session_id][$new_product['product_sub_code_fk']]); //unset old item
        }			
    }

    $_SESSION["standard_addtion".$session_id][$new_product['product_sub_code_fk']] = $new_product;	//update products with new item array
}
    
echo '<script>
          document.getElementById("product_main_code_fk").disabled = true;
      </script>';
echo '<script> 
          $("#unite").val("");
          $("#product_sub_code_fk").val("");
          $("#product_sub_amount").val("");
      </script>';

if(isset($_POST["remove_code"]) && isset($_SESSION["standard_addtion".$session_id]))
{
	$product_code   = filter_var($_POST["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove
   
	if(isset($_SESSION["standard_addtion".$session_id][$product_code]))
	{
		unset($_SESSION["standard_addtion".$session_id][$product_code]);
	}

}

if(isset($_POST["load"]) && $_POST["load"]==10){

    if(isset($_SESSION["standard_addtion".$session_id]) && count($_SESSION["standard_addtion".$session_id])>0){ //if we have session variable
        $mode = reset($_SESSION["standard_addtion".$session_id]);
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
                                   <th width="10%" class="text-center">حذف</th>
                                 </tr>
                             </thead>
                            <tbody>';
        $all_value = 0;
        for($x = 0 ; $x < count($_SESSION["standard_addtion".$session_id]) ; $x++){
            $table .= '<tr>
                            <td>'.($x+1).'</td>          
                            <td>'.$all_products[$mode['product_sub_code_fk']]->p_name.'</td>  
                            <td>'.$units[$all_products[$mode['product_sub_code_fk']]->p_unit_fk]->unit_name.'</td>
                            <td>'.$mode['product_sub_amount'].'</td>                                     
                            <td><span class="off" data-code='.$mode['product_sub_code_fk'].'><i class="fa fa-trash fa-2x"></i></span></td>
                       </tr> ';
        $mode = next($_SESSION["standard_addtion".$session_id]);
        }

        $table .= ' </tbody>
                    </table>
                    </div>
                    
                    <div class="col-xs-3 r-inner-btn" style="padding-top: 20px;">
                        <input type="submit" role="button" name="save" value="حفظ معيار المنبع" class="btn pull-right" />
                    </div>
                    
                    </div>
                    </div>';
    echo form_open_multipart('Products/standard/'.$this->uri->segment(3).'');
    echo $table;
    echo form_close();
    }
}

if(isset($_POST["remove_code"]) && isset($_SESSION["standard_addtion".$session_id]))
{
	$product_code   = filter_var($_POST["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

	if(isset($_SESSION["standard_addtion".$session_id][$product_code]))
	{
		unset($_SESSION["standard_addtion".$session_id][$product_code]);
	} 
    if($_SESSION["standard_addtion".$session_id] == null){
        echo '<script>
                  document.getElementById("product_main_code_fk").removeAttribute("disabled");
                  document.getElementById("product_main_code_fk").disabled = false;
              </script>';
    }
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
                url: '<?php echo base_url() ?>Products/standard/0',
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