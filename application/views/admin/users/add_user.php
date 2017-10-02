            <div class="col-sm-11 col-xs-12">
              <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-user-circle-o" aria-hidden="true"></i></span>إضافة مستخدم</h4>
                    </div>
                    <div class="col-sm-3">
                        <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  : 27 / 5 / 2017</h5>
                    </div>
                </div>
               
               
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
<!-------------------------------------------------------------------------------------------------------------------------->
<?php  
if(isset($result)){
echo form_open_multipart('Dashboard/update_users/'.$result['user_id']);    
}else{
echo form_open_multipart('Dashboard/add_users');    
}
?>

<div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-3">
                            <h4 class="r-h4">إسم الدخول</h4>
                        </div>
                        <div class="col-xs-3 r-input">
                            <input type="text" name="user_name" value="<?php if(isset($result)){echo $result['user_name'];}?>" class="form-control col-xs-6"    required="required"/>
                        </div>
                    </div>

<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">                    
                       
                              
                         <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">كلمة المرور</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="password" name="user_pass" id="user_pass"  class="form-control col-xs-6" onkeyup="return valid();" <?php if(isset($result)){}else{echo 'required="required"';}?>/>
                              <span  id="validate1" class="help-block"></span> 
                        </div>
                    </div>

                        
                 <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">المسمى الوظيفى</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                       <?php /* $jobs=array('قم باختيار المسمى الوظيفى','المدير العام','مديرالمركز','رئيس قسم شؤن  الاسر'
                                           ,'رئيس قسم االشؤن الادارية','رئيس قسم الموارد البشرية'
                                           ,'رئيس قسم العلاقات العامة','رئيس الجودة','موظف استقبال'
                                           ,'السكرتارية'); */ ?>    
                    
                          <select name="role_id_fk" class="form-control col-xs-6" required="required">
                          <option>اختر</option>
                    <?php foreach($job_title as $row ):
                    $selected='';
                    if(isset($result)){
                          if($row->id == $result['role_id_fk']){ $selected='selected';}
                    }else{
                         if($row->status == 1){if(in_array($row->id,$in_users)){continue;}}
                    }
                    ?>
                           <option value="<?php echo $row->id."-".$row->from_id_fk?>" <?php echo $selected;?>   ><?php echo $row->name;?></option>
                    <?php endforeach;?>      
                          </select>
                        </div>
                    </div>

        
</div>             

<!---  -->
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">  

<div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">تاكيد كلمة المرور</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="password" name="" id="user_pass_validate"  class="form-control col-xs-6" onkeyup="return valid2();" <?php if(isset($result)){}else{echo 'required="required"';}?>/>
                              <span  id="validate" class="help-block"></span> 
                        </div>
                    </div>

  <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">الموظف</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="emp_code" value="<?php if(isset($result)){echo $result['emp_code'];}?>" class="form-control col-xs-6"  required="required"/>
                        </div>
                    </div>
</div>
<!---  -->


  <div class="col-xs-12 r-inner-btn">
                       
                        <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
               <?php if(isset($result)):?>    
                         
                            <input type="submit" name="UPDATE" value="تعديل" class="btn center-block" /> 
               <?php else:?>
                        <input type="submit" name="ADD" value="إضافة" class="btn center-block" />        
               <?php endif?>       
                        </div>
                    
                    </div>
 <?php echo form_close()?>                    
<!-------------------------------------------------------------------------------------------------------------------------->     
                    </div>
                 
                   
                </div>
              
                
            </div>
            
            
             <!----------------->
 
 <?php if(isset($record)&&$record!=null): ?>

      <div class="col-sm-11 col-xs-12"> 
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                           <thead>
             <tr>
             <th>م</th>
             <th>إسم المستخدم</th>
             <th>المسمى الوظيفى</th>
             <th>كود الموظف</th>
             <th>الاجراء</th>
             <th>حذف</th>
             </tr>
             </thead>
             <tbody>
          <?php  $count=1; foreach($record as $row):?>
             <tr>
             <td><?php echo $count++?></td>
             <td><?php echo $row->user_name?></td>
             <td><?php echo $jobs_name[$row->role_id_fk]->name ?></td>
             <td><?php echo $row->emp_code?></td>
             <td> <a href="<?php echo base_url().'Dashboard/update_users/'.$row->user_id?>"> <i class="fa fa-pencil " aria-hidden="true"></i></a> </td>
             <td> <a href="<?php echo base_url().'Dashboard/delete_users/'.$row->user_id?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> </td>
             </tr>
           <?php endforeach; ?>   
             </tbody>
             </table>      
 </div>
 <?php endif ?>     
            
<!----------------->  
<script>
    function valid()
    {
        if($("#user_pass").val().length > 10){
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور قوية';
        }else{
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور ضعيفة';
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
    




</script>