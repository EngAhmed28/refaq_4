
            <div class="col-sm-11 col-xs-12">
                <!--  -->
                	<?php $this->load->view('admin/family/main_tabs'); ?>
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                          <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="<?php echo  base_url()."Family/basic/".$mother_national_num;?>"> البيانات الأساسية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_father/".$mother_national_num;?>"> بيانات الأب </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_mother/".$mother_national_num;?>">البيانات الزوجة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_family_members/".$mother_national_num;?>">أفراد الأسرة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_house/".$mother_national_num;?>">بيانات السكن</a></li>
                            <li><a href="<?php echo  base_url()."Family/update_money/".$mother_national_num;?>"> البيانات المالية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_devices/".$mother_national_num;?>">  الأجهزة المنزلية</a></li>
                            <li><a href="<?php echo  base_url()."Family/researcher_opinion/".$mother_national_num;?>"> رأى الباحث الاجتماعى</a></li>
                        
                        </ul>
                    </div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="one">
                                <div class="col-xs-12 r-inner-details">
                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">إسم المستخدم</h4>
                                            <h4 class="r-h4">رقم الجوال</h4>
                                            <h4 class="r-h4">حالة الاسرة </h4>
                                            <h4 class="r-h4"> أخر تعديل تم بواسطة </h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4 class="r-inner-h4"><?php echo $basic_data[0]->user_name?></h4>
                                            <h4 class="r-inner-h4"><?php echo $basic_data[0]->mother_mob?></h4>
                                            <h4 class="r-inner-h4">حالة الاسرة </h4>
                                            <h4 class="r-inner-h4"><?php echo $basic_data[0]->publisher?></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> رقم السجل المدنى للام</h4>
                                            <h4 class="r-h4"> تغير كلمة المرور</h4>
                                        
                                            <h4 class="r-h4">  تاريخ التسجيل </h4>
                                            <h4 class="r-h4">تاريخ أخر تعديل </h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4 class="r-inner-h4"><?php echo $basic_data[0]->mother_national_num?></h4>
                                          <a class="button">   <h4 class="r-inner-h4"> تغير كلمة المرور</h4> </a> 
                                               <!---->
                        <?php echo form_open_multipart('family/update_pass/'.$mother_national_num)?>                           
                                       <div class="modal-bg">
                                    <div id="modal">
                                        <span class="text-center"> تغير كلمة المرور 
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                             <a href="#close" id="close">&#215;</a></span>
                                        <div class="r-form-add">
                                           <div class="row form-group">
                                               <div class="col-xs-5">
                                                <label >  كلمة المرور  الجديدة</label>
                                               </div>
                                               <div class="col-xs-7">
                                                <input type="password" id="user_pass" name="user_password" class="form-control" onkeyup="return valid();" />
                                                <p  id="validate1" class="help-block"></p>
                                               </div>
                                           </div>
                                            <div class="row form-group">
                                               <div class="col-xs-5">
                                                <label > تاكيد كلمة المرور </label>
                                               </div>
                                               <div class="col-xs-7">
                                                <input type="password" id="user_pass_validate" class="form-control" onkeyup="return valid2();"  />
                                                 <p  id="validate" class="help-block"></p>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="col-xs-3"></div>
                                          <div class="col-xs-6">
                                        <input class="btn  center-block" name="change" type="submit" value="تعديل" />
                                          </div>
                                    </div>
                                </div>
                                  <?php echo form_close()?>
                                     <!---->  
                                           
                                           
                                           
                                           
                                           
                                            <h4 class="r-inner-h4"><?php echo date("Y-m-d",$basic_data[0]->date_registration)?> </h4>
                                            <h4 class="r-inner-h4"><?php echo date("Y-m-d",$basic_data[0]->date)?></h4>
                                      
                                        </div>
                                    </div>
                                </div>

                            </div>
                         </div>
                    </div>
                    <div class="col-xs-12 r-inner-btn">
                         <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn"></div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                                                </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                          <a href="<?php  echo base_url().'Family/update_father/'.$basic_data[0]->mother_national_num?>"> 
                          <button class="btn  center-block">التالى  </button> </a>  
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                             <a href="<?php  echo base_url().'Family/update_basic/'.$basic_data[0]->mother_national_num?>"> 
                          <button class="btn  center-block">تحديث  </button> </a>  
                        </div>
                      
                       
                    </div>
                <?php if(isset($all_operation) && $all_operation!=null ):?>        
                    <div class="col-xs-12 r-inner-details">
                        <h4 class="r-head"> الاجراءات المتخذة</h4>
                        <table style="width:100%">
                            <tr>
                                <th>م </th>
                                <th>من</th>
                                <th> الي</th>
                                <th>الحالة </th>
                                <th>التاريخ </th>
                                <th>الوقت</th>
                                <th>الاجراءات </th>
                                <th> ملاحظات </th>
                            </tr>  <!-- Y-m-d H:i:s -->
                    <?php $count=1; foreach($all_operation as $row):?>
                            <tr>
                                <td><?php echo $count++?></td>
                                <td><?php echo  $jobs_name[$row->family_file_from]->name?></td>
                                <td><?php echo  $jobs_name[$row->family_file_to]->name?></td>
                                <td><?php if($row->process ==1){
                                              echo ' قبول الملف';
                                          }elseif($row->process ==2){
                                              echo 'رفض الملف';
                                          }elseif($row->process ==3){
                                               echo 'للإطلاع عند'.$jobs_name[$row->family_file_to]->name;
                                          }elseif($row->process ==4){
                                                 echo 'اعتماد الملف';
                                          }?>
                                </td>
                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                <td><?php if($row->process ==1){
                                              echo 'قبول';
                                          }elseif($row->process ==2){
                                              echo 'رفض';
                                          }elseif($row->process ==3){
                                               echo 'تحويل';
                                          }elseif($row->process ==4){
                                                 echo 'اعتماد';
                                          }?>
                               </td>
                               <td><?php echo $row->reason ?></td>
                            </tr>
                     <?php endforeach;?>       
                        </table>
                        
                    </div>
                 <?php endif;?> 
                 </div>
            </div>
            
            
<!-------------------------------------------------------------------------------------->            
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
       