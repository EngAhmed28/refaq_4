
<section class="family">
<div class="container">
<h4 class="main-tilte">البيانات الأساسية</h4>
<?php  echo form_open_multipart('Web/Add_Register')?>

<div class="content">
<div class="basic-info active">
 <!----------------------->
<div class="col-sm-12"> 
<div class="col-sm-6">
<label class="right main-label col-xs-6 no-padding">رقم السجل المدني للأم</label>
<input type="number" class="left result-label col-xs-6 no-padding"  name="mother_national_num"   id="mother_national_num" onkeyup="return pass_name(); " required="required" />
<span  id="optia2" > </span> 
  <span  id="lenth" class=""> </span>
</div>

<div class="col-sm-6">
<label class="right main-label col-xs-6 no-padding">إسم المستخدم</label>
<input  type="text" id="user_name" class="left result-label col-xs-6 no-padding" placeholder="رقم السجل المدنى للأم" name="user_name" readonly="readonly"/>
<span  id="lenth" class=""> </span> 
</div>

</div>
  <!----------  ------------->
<div class="col-sm-12"> 
<div class="col-sm-6">
<label class="right main-label col-xs-6 no-padding">كلمة المرور</label>
<input type="password" id="user_pass" class="left result-label col-xs-6 no-padding"  name="user_password" onkeyup="return valid();" required="required" />
<span  id="validate1" class=""> </span> 
</div>

<div class="col-sm-6">
<label class="right main-label col-xs-6 no-padding">تاكيد كلمة المرور</label>
<input type="password"   id="user_pass_validate" class="left result-label col-xs-6 no-padding"  name="" onkeyup="return valid2();" required="required" />
<span  id="validate" class=""> </span> 
</div>

</div>
<!------------ ------------->
<div class="col-sm-12">
<div class="col-sm-6">
<label class="right main-label col-xs-6 no-padding">رقم الجوال</label>
<input class="left result-label col-xs-6 no-padding"  name="mother_mob" required="required" />
</div>
<div class="col-sm-6">
<label class="right main-label col-xs-6 no-padding">مقر التسجيل ( الفرع )</label>
<select name="register_place" class="form-control">
<option value=""> اختر</option>
   <option value="1">حائل</option>
  <option value="2">بقعاء</option>
  <!--    <option value="3"></option> -->
</select>
</div>
</div>
<!------------------------>
<div class="form-group">
<input type="submit" class="btn btn-blue btn-next" name="register" onclick="papass();" value="حفظ"/>
</div>

<!------------------------>
</div>
<?php echo form_close()?>  
</div>
</section>

              
            
  <script>

    function valid()
    {
        if($("#user_pass").val().length < 4){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور اكثر من اربع حروف';
        }else if($("#user_pass").val().length > 4 &&  $("#user_pass").val().length < 10){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور ضعيفة';
        }else if($("#user_pass").val().length > 10){
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور قوية';
        }
        
        
    }
    
    function valid2()
    {
        if($("#user_pass").val() == $("#user_pass_validate").val()){
            document.getElementById('validate').style.color = '#00FF00';
            document.getElementById('validate').innerHTML = 'كلمة المرور متطابقة';
        }else{
            document.getElementById('validate').style.color = '#F00';
            document.getElementById('validate').innerHTML = 'كلمة المرور غير متطابقة';
        }
    }
    
    function pass_name(){
     //-----------------------------------------------------   
        var num =$("#mother_national_num").val();
        $("#user_name").val(num); 
        if($("#mother_national_num").val().length < 10){
        document.getElementById('lenth').style.color = '#F00';
        document.getElementById('lenth').innerHTML = 'إسم المستخدم مكون من عشر ارقام';
        }else{
         document.getElementById('lenth').innerHTML = '';      
        }          
    //-------------------------------------------------------
     var user_username=$('#mother_national_num').val();
     if(user_username != "" &&  user_username !=0){
    var dataString ='mother_national_num_chik='+ user_username ;
        $.ajax({
          
            type:'post',
            url: '<?php echo base_url() ?>Web/Add_Register',
          data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
           $("#optia2").html(html);
            } 
        });
      }
    
    }// end function

</script>
   
  <script>
</script>   
   
   