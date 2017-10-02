<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            unset($_SESSION["order_addtion".$_SESSION["user_id"]]);
            $data['index'] = 'active'; 
            $this->load->view('admin/reports/main_tabs',$data);
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">


                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-2">
                                <h4 class="r-h4">إختر الامر :</h4>
                            </div>

                            <div class="col-xs-10 r-input">


                                      <select name="type" id="type" required>
                                          <option value="">إختر الامر </option>
                                          <option value="1">أمر توريد </option>
                                          <option value="2">أمر صرف </option>

                                      </select>


                            </div>

                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            

                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">منذ تاريخ :</h4>
                            </div>
                            
                            <div class="col-xs-4 r-input">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control docs-date" name="date_from"  id="date_from" placeholder="شهر/يوم/سنة " required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-2">
                                <h4 class="r-h4">إلي تاريخ  :</h4>
                            </div>

                            <div class="col-xs-4 r-input">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control docs-date" name="date_to"  id="date_to" placeholder="شهر/يوم/سنة " required>
                                    </div>
                                </div>
                            </div>
                            

                            
                        </div>

                        

                        
                        <div class="col-xs-3 r-inner-btn" style="padding-top: 20px;">

                            <input type="submit" role="button" name="add" value=" بحث " onclick="return lood();" class="btn pull-right" />
                        </div>
                            
                    </div>


                </div>
                <div id="optionearea1"></div>
            </div>

        </div>
    </div>
</div>

<script>
    function lood(){
    var num1=   $('#date_from').val();
    var num2=   $('#date_to').val();
   var type=   $('#type').val();
  if( num1 != '' && num2 != '' && type != ''){
      var dataString = 'form_date=' + num1 + '&to_date=' + num2 + '&type=' + type;
      $.ajax({
          type:'post',
          url: '<?php echo base_url() ?>Reports/index/0',
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
function del(id){
		var pcode = $(".off").attr("data-code"); //get product code
        var comment = $(".off").parent();
        var commentContainer = comment.parent();
		commentContainer.fadeOut(); 
        
          var remove_code = 'remove_code=' + pcode + '&load=10' + '&id=' + id;
        
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