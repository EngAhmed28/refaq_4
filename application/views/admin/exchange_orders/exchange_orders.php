<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            unset($_SESSION["order_addtion".$_SESSION["user_id"]]);
            $data['index2'] = 'active'; 
            $this->load->view('admin/exchange_orders/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result))
                        $id = $result['order_num'];
                     else
                        $id = 0;
                    echo form_open_multipart('Exchange_orders/index/'.$id.'',array('class'=>"myform"))?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">رقم التوريد:</h4>
                            </div>
                            
                            <div class="col-xs-2 r-input">
                                <input type="text" value="<?php if(!(isset($result))){if(isset($count) && $count != null) echo ($count[0]->id+1); else echo 1;}else echo $id; ?>" class="r-inner-h4 " name="order_num" id="order_num" readonly />
                            </div>
                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">تاريخ اليوم:</h4>
                            </div>
                            
                            <div class="col-xs-2 r-input">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control docs-date" name="date" <?php if(isset($result)) {echo 'value="'.date("m/d/Y",$result['date']).'"'; echo "disabled";} ?> id="date" placeholder="شهر/يوم/سنة " required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">المتبرعين:</h4>
                            </div>
                            
                            <div class="col-xs-2 r-input">
                                <select name="donar_id_fk" id="donar_id_fk" onchange="$('#donar_id_fk2').val($('#donar_id_fk').val());)" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                                    <option value="">--قم بالإختيار--</option>
                                    <?php
                                    if(isset($donors))
                                        for($x = 0 ; $x < count($donors) ; $x++){
                                            if(isset($result) && $donors[$x]->id == $result['donar_id_fk'])
                                                $selected = 'selected';
                                            else
                                                $selected = '';
                                            echo '<option value="'.$donors[$x]->id.'" '.$selected.'>'.$donors[$x]->user_name.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">إسم المخزن:</h4>
                            </div>
                            <?php
                            if(isset($result2) && $result2 != null){
                                $disabled = 'disabled="disabled"';
                                $script = 'session2('.$id.')';
                            }
                            else{
                                $disabled = '';
                                $script = '';
                            }
                            ?>
                            <div class="col-xs-2 r-input">
                                <select name="storage_code_fk" id="storage_code_fk" onchange="lood($('#storage_code_fk').val(),<?php echo $id ?>); <?php echo $script ?>;" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true"<?php //echo $disabled ?> required>
                                    <option value="">--قم بالإختيار--</option>
                                    <?php
                                    if(isset($store))
                                        for($x = 0 ; $x < count($store) ; $x++){
                                            if($store[$x]->id == $result2[0]->storage_code_fk)
                                                $selected = 'selected';
                                            else
                                                $selected = '';
                                            echo '<option value="'.$store[$x]->id.'" '.$selected.'>'.$store[$x]->storage_name.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">فئة الأصناف:</h4>
                            </div>
                            
                            <div class="col-xs-2 r-input">
                                <select name="product_code_fk" id="optionearea1" onchange="return lood2($('#optionearea1').val(),<?php echo $id ?>);" class="no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                                    <option value="">--قم بالإختيار--</option>
                                    <?php
                                    if(isset($products2))
                                        for($x = 0 ; $x < count($products2) ; $x++)
                                            echo '<option value="'.$products2[$x]->id.'">'.$products2[$x]->p_name.'</option>';
                                    ?>
                                </select>
                            </div>
                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">الوحدة:</h4>
                            </div>
                            
                            <div class="col-xs-2 r-input">
                                <select name="unite" id="optionearea2" class="no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                                    <option value="">--قم بالإختيار--</option>
                                </select>
                            </div>
                        
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        
                            <div class="col-xs-2">
                                <h4 class="r-h4">الكمية:</h4>
                            </div>
                            
                            <div class="col-xs-2 r-input">
                                <input type="text" onkeyup="return diving();" onkeypress="return isNumberKey(event)" class="r-inner-h4 " name="product_amount" id="product_amount" required />
                            </div>
                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">سعر تكلفة الكمية:</h4>
                            </div>
                            
                            <div class="col-xs-2 r-input">
                                <input type="text" onkeyup="return diving();" onkeypress="return isNumberKey(event)" class="r-inner-h4 " name="all_cost_exchange" id="all_cost_exchange" required />
                            </div>
                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">سعر الوحدة:</h4>
                            </div>
                            
                            <div class="col-xs-2 r-input">
                                <input type="text" value="0" class="r-inner-h4 " name="one_cost" id="one_cost" readonly />
                            </div>
                            
                        </div>
                        
                        <div class="col-xs-3 r-inner-btn" style="padding-top: 20px;">
                            <input type="hidden" name="load" id="load"  value="10" />
                            <input type="submit" role="button" name="add" value="إضافة الصنف" onclick="return session(<?php echo $id; ?>);" class="btn pull-right" />
                        </div>
                            
                    </div>
                    <?php echo form_close()?>
                    
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data" id="results">
                <?php
                if(isset($result2) && $result2 != null){
                    echo form_open_multipart('Exchange_orders/index/'.$id.'');
                    echo '<div class="col-xs-12 r-inner-details">
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
                    for($x = 0 ; $x < count($result2) ; $x++){
                        $new_product['date']              = $result2[$x]->date;
                        $new_product['donar_id_fk']       = $result["donar_id_fk"];
                        $new_product['storage_code_fk']   = $result2[$x]->storage_code_fk;
                        $new_product['order_num']         = $result["order_num"];
                        $new_product['product_code_fk']   = $result2[$x]->product_code_fk;
                        $new_product['product_unite']     = $result2[$x]->product_unite;
                        $new_product['product_amount']    = $result2[$x]->product_amount;
                        $new_product['all_cost_exchange'] = $result2[$x]->all_cost_exchange;
                        $new_product['one_cost']          = $result2[$x]->all_cost_exchange/$result2[$x]->product_amount;
                        
                        $_SESSION["order_addtion".$_SESSION["user_id"]][$new_product['product_code_fk']] = $new_product;
                        
                        $all_value += $new_product['all_cost_exchange'];
                        
                        echo '<tr>
                                    <td>'.($x+1).'</td>          
                                    <td>'.$products[$new_product['product_code_fk']]->p_name.'</td>  
                                    <td>'.$units[$new_product['product_unite']]->unit_name.'</td>
                                    <td>'.$new_product['product_amount'].'</td>          
                                    <td>'.sprintf('%.2f',$new_product['all_cost_exchange']).'</td>                            
                                    <td><span class="off" onclick="return del('.$id.','.$new_product['product_code_fk'].');" data-code='.$new_product['product_code_fk'].'><i class="fa fa-trash fa-2x"></i></span></td>
                               </tr> ';
                    }
                    echo ' <tr>
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
                                <input type="text" class="r-inner-h4" value="'.$result['order_notes'].'" name="order_notes" id="order_notes" required />
                            </div>
                            
                            <div class="col-xs-3 r-inner-btn" style="padding-top: 20px;">
                                <input type="hidden" name="order_total_cost" id="order_total_cost" value="'.$all_value.'" />
                                <input type="hidden" name="donar_id_fk2" id="donar_id_fk2" />
                                <input type="submit" role="button" name="save" value="حفظ أمر التوريد" class="btn pull-right" />
                            </div>
                            
                            </div>
                            </div>';
                    echo form_close();
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    function lood(num,id){
        $("#optionearea1").html('<option value="">--قم بالإختيار--</option>');
        $("#optionearea2").html('<option value="">--قم بالإختيار--</option>');
        if(num>0 && num != '')
        {
            var dataString = 'store_id=' + num ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Exchange_orders/index/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
    }
</script>

<script>
    function lood2(num,id){
        $("#optionearea2").html('<option value="">--قم بالإختيار--</option>');
        
        if(num >0 && num != '')
        {
            var id = num;
            var dataString = 'products_id=' + num ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Exchange_orders/index/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea2").html(html);
                }
            });
            return false;
        }
    }
</script>

<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<script>
    function diving(){
        if($("#all_cost_exchange").val() != '' && $("#product_amount").val() != ''){
            var div = parseFloat($("#all_cost_exchange").val()) /  parseFloat($("#product_amount").val()) ;
            $('#one_cost').val(div);
        }
        else
            $('#one_cost').val(0);
    }
</script>

<script>
    function session(id)
    {
        if($('#date').val() && $('#donar_id_fk').val() && $('#storage_code_fk').val() && $('#optionearea1').val()
        && $('#all_cost_exchange').val() && $('#product_amount').val() && $('#optionearea2').val()){
          var dataString = $(".myform").serialize();
            
          document.getElementById("date").removeAttribute("disabled");
          document.getElementById("donar_id_fk").removeAttribute("disabled");
          document.getElementById("storage_code_fk").removeAttribute("disabled");
          document.getElementById("date").disabled = false;
          document.getElementById("donar_id_fk").disabled = false;
          document.getElementById("storage_code_fk").disabled = false;
            
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Exchange_orders/index/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
            return false;
            }
    }
</script>

<script>
function del(id,code){
        var comment = $(".off").parent();
        var commentContainer = comment.parent();
		commentContainer.fadeOut(); 
          
          var remove_code = 'remove_code=' + code + '&load=10' + '&id=' + id;
        
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Exchange_orders/index/'+id,
                data:remove_code,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
}    
</script>

<script>
    function session2(id)
    {
          var dataString = 'session2=1' + '&load=10';
            
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Exchange_orders/index/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
            return false;
    }
</script>