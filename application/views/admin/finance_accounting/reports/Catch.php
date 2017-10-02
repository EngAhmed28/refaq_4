<h2 class="text-flat">أوامر القبض<span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
    <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
    <li class="active"><?php echo $title; ?></li>
</ul>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
unset($_SESSION['catch_addtion'.$_SESSION["user_id"]]);
?>
    </span>
<div class="well bs-component" >

        <?php echo form_open_multipart('dashboard/add_catch',array('class'=>"form-horizontal",'role'=>"form", 'id' => 'myform' ))?>
        <fieldset>
          
           <div class="col-md-6">
            <div class="form-group">
                <label for="inputUser" class="control-label">رقم السند</label>
                
                    <input type="number" id="vouch_num"  name="vouch_num"    class="form-control text-right" placeholder="رقم السند" >
               </div> </div>
               
                 <div class="col-md-6">
            <div class="form-group">
                <label for="inputUser" class="control-label">تاريخ السند</label>
                    <input type="date" id="receipt_date"  name="receipt_date" class="form-control text-right" placeholder="تاريخ السندد" >
                </div>
            </div>
             <!---------------------------------------------------->
            <div class="form-group" id="optionearea2">
                <label for="inputUser" class="control-label">طريقة الدفع</label>
                <div class="input-grup">
                    <select name="vouch_type" id="vouch_type" onchange="return rent($('#vouch_type').val());" class="form-control" >
                        <option value="">قم بإختيار طريقة الدفع</option>
                        <option value="1" >نقدي</option>
                        <option value="2" >تحويل بنكي</option>
                        <option value="3" >شيك</option>
                    </select>
                </div>
            </div>
            <!----------------------------------------------------------------------->

          <div class="col-lg-4">
            <div class="form-group" >
                <label for="inputUser" class="control-label">الحساب المدين</label>
                
                            <select name="account_code" id="account_code"  class="selectpicker form-control" data-live-search="true" style="width:100%;">
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
              <!---------------------------------------------->
           <div class="col-lg-4">
            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">القيمة</label>
               
                    <input type="number" id="value"  name="value"    class="form-control text-right" placeholder="القيمة" >
                </div>  </div>
           
             <div class="col-lg-4">
               <div class="form-group">
                <label for="inputUser" class="col-lg-1 control-label">البيان</label>
                  <input type="text" id="byan_abd"  name="byan_abd" class="form-control text-right" placeholder="البيان" >
                </div>
            </div>

          <?php   $date_s=time();  ?>
            <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                    <button type="reset" class="btn btn-default">أبدء من جديد ؟</button>
                    <input type="hidden"  class="btn btn-success" name="action" value="add_accuont" />
                    <input type="hidden"  class="btn btn-success" name="p_id" value="<?  echo $date_s; ?>" />
                    <input type="hidden" name="load_cart" id="load_cart"  value="10" />
                    <input type="submit"  onclick="return session($('#load_cart').val());" name="add" value="إضافة حساب"  class="btn btn-primary" />
                </div>
            </div>
            <div id="results"></div>
        </fieldset>
        <?php echo form_close()?>

</div>

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
            $('#optionearea2').html('');
            return false;
        }

    }
</script>



<script>
    function session()
    {
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
    $("#results").load( "admin/abd/get_catch_add", {"load_cart":"10"});

    e.preventDefault();
</script>
<!--------------------------------------------->

<script>
    $("#results").on('click', 'span.off', function(e) {
        e.preventDefault();
        var pcode = $(this).attr("data-code"); //get product code
        var comment = $(this).parent();
        var commentContainer = comment.parent();
        commentContainer.fadeOut(); //remove item element from box
        $.getJSON( "admin/abd/get_catch_add", {"remove_code":pcode} , function(data){ //get Item count from Server

        });
        $("#results").load( "admin/abd/get_catch_add", {"load_cart":"10"}); //Make ajax request using jQuery Load() & update results
        e.preventDefault();
    });

</script>


