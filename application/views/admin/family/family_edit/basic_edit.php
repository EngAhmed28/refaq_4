
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
       <?php echo form_open_multipart('Family/update_basic/'.$mother_national_num)?>             
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="one">
                                <div class="col-xs-12 r-inner-details">
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                            <div class="col-xs-6">
                               <h4 class="r-h4">إسم المستخدم</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                         <input type="text" name="user_name" class="form-control" value="<?php echo $basic_data[0]->user_name?>" required="required"/>  
                            </div>
            </div>                  
            <div class="col-xs-12">
                            <div class="col-xs-6">
                                   <h4 class="r-h4">رقم الجوال</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                          <input type="text" name="mother_mob" class="form-control" value="<?php echo $basic_data[0]->mother_mob?>" required="required"/>
                               </div>
            </div>   
            <div class="col-xs-12">
                            <div class="col-xs-6">
                                     <h4 class="r-h4">حالة الاسرة </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                         <input type="text" name="" class="form-control" value="حالة الاسرة" required="required"/>
                                 </div>
            </div>    
            <div class="col-xs-12">                                       
                            <div class="col-xs-6">
                                <h4 class="r-h4"> أخر تعديل تم بواسطة </h4>
                            </div>
                            <div class="col-xs-6">
                              <input type="text" name="publisher" class="form-control" readonly="" value="<?php echo $basic_data[0]->publisher ?>" required="required"/>
                             </div>
            
              </div>             
              
  </div>
<!----------------------------------------------------->  
                   <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
   <div class="col-xs-12">   
                <div class="col-xs-6"> 
                  <h4 class="r-h4"> رقم السجل المدنى للام</h4>              
                   </div>
                     <div class="col-xs-6">   
                   <input type="text" name="mother_national_num" class="form-control" value="<?php echo $basic_data[0]->mother_national_num?>" readonly="" required="required"/>
              </div>
    </div>
     <div class="col-xs-12">   
                <div class="col-xs-6">    
                        <h4 class="r-h4"> تغير كلمة المرور</h4>          
                   </div>
                     <div class="col-xs-6">
                    
                                          <a class="button">   <h4 class="r-inner-h4"> تغير كلمة المرور</h4> </a> 
                          
                   </div>
    </div>
     <div class="col-xs-12">   
                <div class="col-xs-6">
                  <h4 class="r-h4">  تاريخ التسجيل </h4>               
                   </div>
                     <div class="col-xs-6">
                      <input type="text" name="date_registration" class="form-control" readonly="" value="<?php echo date("Y-m-d",$basic_data[0]->date_registration)?>" required="required"/>
             </div>
    </div>
     <div class="col-xs-12">   
                <div class="col-xs-6">               
                  <h4 class="r-h4">تاريخ أخر تعديل </h4>
                   </div>
                     <div class="col-xs-6">               
                    <input type="text" name="date" class="form-control" readonly="" value="<?php echo date("Y-m-d",$basic_data[0]->date)?>" required="required"/>
              </div>
    </div>               
                                          
                                     
                                          
                                           
                                       
                                    </div>
<!-------------------------------------------------->                                      
                                </div>
                            </div>
                         </div>
                    </div>
<!------------------------------------------------------------------------------------------------------------>                    
                    <div class="col-xs-12 r-inner-btn">
                       
                        <div class="col-md-4 col-sm-3 col-xs-6 inner-details-btn">
                     
                        </div>
                      
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                             <input type="submit" role="button" name="updated" class="btn btn-blue btn-next"  value="تحديث" />
                        </div>
                      
                        <div class="col-md-3"></div>
                    </div>
          <?php echo form_close()?>
                </div>
            </div>
       
       
       
       
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