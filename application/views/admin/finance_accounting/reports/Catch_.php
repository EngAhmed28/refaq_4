<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
-->

<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<span id="message">
<?php

if(isset($_SESSION['message'])){echo $_SESSION['message'];}
else{unset($_SESSION['message']);} 
unset($_SESSION['receipt_addtion'.$_SESSION["user_id"]]);
?>
    </span>
    
            <?php echo form_open_multipart('dashboard/add_receipt_catch',array('class'=>"form-horizontal",'role'=>"form", 'id' => 'myform' ))?>
<div class="well bs-component" >


        <fieldset>
        <div class="row">
            <div class="col-md-2">
        <div class="form-group">
                <label for="inputUser" class="control-label">رقم السند:  </label>
                 
                    <input type="text" onkeypress="return isNumberKey(event)" id="vouch_num" name="vouch_num" class="form-control text-right" placeholder="رقم السند" required="required" />
                </div>
            </div>

            <div class="col-md-2">
        <div class="form-group">
                <label for="inputUser" class="control-label">تاريخ السند: </label>


                    <input type="date" id="receipt_date"  name="receipt_date" class="form-control text-right" required >
                </div>
            </div>







     <div class="col-md-3">
            <div class="form-group" >
            
                   <label for="inputUser" class=" control-label">الحساب المدين</label> <br />
              <div class="col-lg-12 input-grup">
                            <select name="account_code" id="account_code"   class="form-control selectpicker" data-live-search="true" style="width:100%;" required  >
                                <option value="">قم بإختيار الحساب</option>
                          <?php 
                          foreach($query_admin as $row1){

                              if( sizeof($query_dep) >0){
                                  echo'<option data-tokens="ketchup mustard"  value="'.$row1->id.'"  disabled>'.$row1->name.'</option>';
                              }else{
                                 echo'<option data-tokens="ketchup mustard"  value="'.$row1->id.'"  >'.$row1->name.'</option>';
                              }
                              //=
                          foreach($query_dep[$row1->id] as $row2){

                              if( sizeof($query_dep[$row2->id]) >0){
                                  echo'<option data-tokens="ketchup mustard"  value="'.$row2->id.'"  disabled>'.$row2->name.'</option>';
                              }else{
                                  echo'<option data-tokens="ketchup mustard"  value="'.$row2->id.'"  >'.$row2->name.'</option>';
                              }
                              //==
                              foreach($query_dep[$row2->id] as $row3){
                                  if(sizeof($query_dep[$row3->id]) >0){
                                      echo'<option data-tokens="ketchup mustard"  value="'.$row3->id.'"  disabled>'.$row3->name.'</option>';
                                  }else{
                                      echo'<option data-tokens="ketchup mustard"  value="'.$row3->id.'"  >'.$row3->name.'</option>';
                                  }
                                 //===
                                  foreach($query_dep[$row3->id] as $row4){
                                      if(sizeof($query_dep[$row4->id]) >0){
                                          echo'<option data-tokens="ketchup mustard"  value="'.$row4->id.'"  disabled>'.$row4->name.'</option>';
                                      }else{
                                          echo'<option data-tokens="ketchup mustard"  value="'.$row4->id.'"  >'.$row4->name.'</option>';
                                      }
                                     //====
                                      foreach ($query_dep[$row4->id] as $row5){
                                          if(sizeof($query_dep[$row5->id]) >0){
                                              echo'<option data-tokens="ketchup mustard"  value="'.$row5->id.'"  disabled>'.$row5->name.'</option>';
                                          }else{
                                              echo'<option data-tokens="ketchup mustard"  value="'.$row5->id.'"  >'.$row5->name.'</option>';
                                          }
                                          //=====
                                      }//row5
                                  }//$row4
                           }//$row3
                          }//$row2
                          }//$row1
                          ?>
                            </select>
                </div>   
            
            
            </div>
            </div>





         <div class="col-md-2">
     <div class="form-group">
                <label for="inputUser" class="col-lg-3 control-label">القيمة</label>
                <div class="col-lg-12 input-grup">
                    <input type="number" id="value"  name="value"    class="form-control text-right" placeholder="القيمة" required >
                </div>
                </div>
                </div>
               
               <div class="col-md-3">
     <div class="form-group">
                <label for="inputUser" class="col-lg-3 control-label">البيان</label>
                <div class="col-lg-12 input-grup">
                <i class="fa fa-list"></i>
                    <input type="text" id="byan_abd"  name="byan_abd" class="form-control text-right" placeholder="البيان" required >
                </div>
            </div>
            </div>





            </div>
                                
             <!---------------------------------------------------->
             <div class="row" id="optionearea2">
        <div class="col-md-6">
            <div class="form-group" >
                <label for="inputUser" class="control-label">طريقة الدفع</label>
                <div class="col-lg-12 input-grup">
                    <select name="vouch_type" id="vouch_type" onchange="return rent($('#vouch_type').val());" class="form-control" required >
                        <option value="">قم بإختيار طريقة الدفع</option>
                        <option value="1" >نقدي</option>
                        <option value="2" >تحويل بنكي</option>
                        <option value="3" >شيك</option>
                    </select>
                </div> </div> </div></div>
            <!----------------------------------------------------------------------->



          <?  $date_s=time();  ?>
            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <!--button type="reset" class="btn btn-default">أبدء من جديد ؟</button-->
                    <input type="hidden"  class="btn btn-success" name="action" value="add_receipt_catch" />
                    <input type="hidden"  class="btn btn-success" name="p_id" value="<?  echo $date_s; ?>" />
                    <input type="hidden" name="load_cart" id="load_cart"  value="10" />
                    <input type="submit"  onclick="return session($('#load_cart').val());" name="add" value="أضف حساب"  class="btn btn-primary" >
                </div>
            </div>
            <div id="results"></div>
        </fieldset>
        

</div>
<?php echo form_close()?>
<!--------------------------------------------->
<script>
    function rent(method)
    {
        if(method)
        {
            var dataString = 'method=' + method;

            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_catch',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea2').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea2').html('<div class="col-md-6"><div class="form-group" ><label for="inputUser" class="col-lg-3 control-label">طريقة الدفع</label><div class="col-lg-12 input-grup"><select name="vouch_type" id="vouch_type" onchange="return rent($(\'#vouch_type\').val());" class=" form-control" required ><option value="">قم بإختيار طريقة الدفع</option><option value="1" >نقدي</option><option value="2" >تحويل بنكي</option><option value="3" >شيك</option></select></div> </div> </div>');
            return false;
        }

    }
</script>



<script>
    function session()
    {
        if($('#vouch_num').val() && $('#receipt_date').val() && $('#vouch_type').val() && $('#account_code').val()
        && $('#value').val() && $('#byan_abd').val()){
          var dataString = $("#myform").serialize();
        
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_catch',
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
<!--------------------------------------------->


<script>
$("#results").on('click', 'span.off', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //get product code
        var comment = $(this).parent();
        var commentContainer = comment.parent();
		commentContainer.fadeOut(); 
        
          var remove_code = 'remove_code=' + pcode + '&load_cart=10';
        
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_catch',
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


<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<style>
    .btn-mobileSelect-gen {
        display:none!important;
    }

    #account_code {
        display:block!important;
    }
</style>

<script type="text/javascript">
    $('.selectpicker').selectpicker({
      });
</script>