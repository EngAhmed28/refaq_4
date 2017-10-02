           <div class="col-sm-11 col-xs-12">
                <!--  -->
                	<?php $this->load->view('admin/family/main_tabs'); ?>
                <!--  -->
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                      <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li><a href="<?php echo  base_url()."Family/basic/".$mother_national_num_fk;?>"> البيانات الأساسية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_father/".$mother_national_num_fk;?>"> بيانات الأب </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_mother/".$mother_national_num_fk;?>">البيانات الزوجة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_family_members/".$mother_national_num_fk;?>">أفراد الأسرة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_house/".$mother_national_num_fk;?>">بيانات السكن</a></li>
                            <li><a href="<?php echo  base_url()."Family/update_money/".$mother_national_num_fk;?>"> البيانات المالية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_devices/".$mother_national_num_fk;?>">  الأجهزة المنزلية</a></li>
                            <li class="active"><a href="<?php echo  base_url()."Family/update_attach_files/".$mother_national_num_fk;?>"> إرفاق الوثائق</a></li>
                            <li><a href="<?php echo  base_url()."Family/researcher_opinion/".$mother_national_num_fk;?>"> رأى الباحث الاجتماعى</a></li>
           
                        </ul>
                    </div>
                    
     	<?php  echo form_open_multipart('Family/update_attach_files/'.$mother_national_num_fk)?>                  
<!-------------------------------------------------------------------------------------------------------------------------->
       <div class="col-xs-12 r-inner-details">
            <table style="width:100%">
                <tr>
                    <th>م </th>
                    <th>اسم الملف </th>
                    <th>فتح الملف</th>
                    <th>ارفاق </th>
                </tr>
                <tr class="r-tr">
                    <td> 1 </td>
                    <td>شهادة الوفاة</td>
                    <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                           <!-- <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                           --> <input type="file" name="death_certificate" value="ss" class="" />
                        </div>
                    </td>
                </tr>
                <tr class="r-tr">
                    <td> 2 </td>
                    <td> بطاقة العائلة </td>
                    <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                            <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                            <input type="file" name="family_card" class="file_input_with_replacement">
                        </div>
                    </td>
                </tr>
                <tr class="r-tr">
                    <td> 3 </td>
                    <td> صك حرث الارث </td>
                    <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                            <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                            <input type="file" name="plowing_inheritance" class="file_input_with_replacement">
                        </div>
                    </td>
                </tr>
                <tr class="r-tr">
                    <td> 4 </td>
                    <td> صك الولاية أو الوكالة  مع الأيتام</td>
                    <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                            <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                            <input type="file" name="instrument_agency_with_orphans" class="file_input_with_replacement">
                        </div>
                    </td>
                </tr>
                <tr class="r-tr">
                    <td> 5 </td>
                    <td> شهادات الميلاد</td>
                    <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                            <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                            <input type="file" name="birth_certificate" class="file_input_with_replacement">
                        </div>
                    </td>
                </tr>
                <tr class="r-tr">
                    <td> 6 </td>
                    <td> صك ملكية السكن أو عقد الايجار </td>
                    <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                            <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                            <input type="file" name="ownership_housing" class="file_input_with_replacement">
                        </div>
                    </td>
                </tr>
                <tr class="r-tr">
                    <td> 7 </td>
                    <td> تعريف من المدرسة بجميع الأبناء و البنات</td>
                     <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                            <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                            <input type="file" name="definition_school" class="file_input_with_replacement">
                        </div>
                    </td>
                </tr>
                 <tr class="r-tr">
                    <td> 8 </td>
                    <td>بطاقة الضمان  الاجتماعى</td>
                     <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                            <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                            <input type="file" name="social_security_card" class="file_input_with_replacement">
                        </div>
                    </td>
                </tr>
                 <tr class="r-tr">
                    <td> 9 </td>
                    <td> نسخة من مصلحة التقاعد</td>
                     <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                            <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                            <input type="file" name="retirement_department" class="file_input_with_replacement">
                        </div>
                    </td>
                </tr>
                 <tr class="r-tr">
                    <td> 10 </td>
                    <td> مستند من التأمينات الاجتماعية</td>
                     <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                            <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                            <input type="file" name="social_insurance" class="file_input_with_replacement">
                        </div>
                    </td>
                </tr>
                   <tr class="r-tr">
                    <td> 11 </td>
                    <td> كشف حساب بنكى لأخر ثلاث شهور</td>
                     <td>---</td>
                    <td style="width: 35%;">
                        <div class="field">
                            <input type="text"  value="" size="40" class="file_input_replacement" placeholder="ارفاق"/>
                            <input type="file" name="bank_statement" class="file_input_with_replacement">
                        </div>
                    </td>
                </tr>
            </table>
        </div>

  <!--3 -->
                    <div class="col-xs-12 r-inner-btn">
                        <div class="col-md-2"></div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                          <a href="<?php echo base_url().'Family/update_devices/'.$mother_national_num_fk?>"> <button class="btn  center-block"> عودة </button> </a>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                          	<input type="submit" role="button" name="UPDATE" class="btn btn-blue btn-next"  value="تعديل" />   
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                            <a href="<?php echo base_url().'Family/researcher_opinion/'.$mother_national_num_fk?>"> <button class="btn  center-block"> التالى </button> </a>
                       </div>
                      
                       
                    </div>
                    <!--3 -->
             
<!--------------------------------------------------------------------------------------------------------------------------> 
     <?php  echo form_close()?>                 
                    </div>
                  
                </div>
            </div>
  