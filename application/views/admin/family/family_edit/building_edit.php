<?php $yes_no=array('اختر','نعم','لا');?>
<div class="col-sm-11 col-xs-12">
    <!--  -->
    <?php $this->load->view('admin/family/main_tabs'); ?>
    <!--  -->
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li><a href="<?php echo  base_url()."Family/basic/".$result['mother_national_num_fk'];?>"> البيانات الأساسية </a></li> 
                    <li><a href="<?php echo  base_url()."Family/update_father/".$result['mother_national_num_fk'];?>"> بيانات الأب </a></li>
                    <li><a href="<?php echo  base_url()."Family/update_mother/".$result['mother_national_num_fk'];?>">البيانات الزوجة </a></li>
                    <li><a href="<?php echo  base_url()."Family/update_family_members/".$result['mother_national_num_fk'];?>">أفراد الأسرة </a></li>
                    <li class="active"><a href="<?php echo  base_url()."Family/update_house/".$result['mother_national_num_fk'];?>">بيانات السكن</a></li>
                    <li><a href="<?php echo  base_url()."Family/update_money/".$result['mother_national_num_fk'];?>"> البيانات المالية </a></li>
                    <li><a href="<?php echo  base_url()."Family/update_devices/".$result['mother_national_num_fk'];?>">  الأجهزة المنزلية</a></li>
                      <li><a href="<?php echo  base_url()."Family/researcher_opinion/".$result['mother_national_num_fk'];?>"> رأى الباحث الاجتماعى</a></li>
                        
                </ul>
            </div>

            <!-------------------------------------------------------------------------------------------------------------------------->
            <?php if(isset($result) && $result!=null):?>
                <?php echo form_open_multipart('family/update_house/'.$result['mother_national_num_fk'])?>

                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> رقم حساب فاتورة الكهرباء </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="h_electricity_account" class="no-padding r-inner-h4" value="<?php echo $result['h_electricity_account']?>" required="required"/>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> المدينة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select class="form-control no-padding " name="h_city_id_fk" id="h_city_id_fk" onchange="return rent($('#h_city_id_fk').val());">
                                <option>اختر المدينة</option>
                                <?php
                                foreach($main_depart as $record):
                                    $selected='';
                                    if($record->id == $result['h_city_id_fk']){
                                     $selected='selected';
                                    } ?>
                         <option value="<? echo $record->id; ?>" <?php echo $selected; ?>><? echo $record->main_dep_name; ?></option>

                                <? endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الشارع </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="h_street" value="<?php echo $result['h_street']?>" class="no-padding r-inner-h4" required="required"/>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> أقرب مدرسة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="h_nearest_school" value="<?php echo $result['h_nearest_school']?>" class="no-padding r-inner-h4" required="required"/>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> نوع السكن </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select class="form-control no-padding " id="h_house_type_id_fk" name="h_house_type_id_fk" >
                              
                          	<?php $arr_type_house=array("اختر","دور مسلح","دثورين مسلح","شعبى","شقة",
                                           'صندقة','خيمة','ثلاث أدوار');?>		
                      
					<?php for($i=0;$i<sizeof($arr_type_house);$i++):
                       $selected='';if($i==$result['h_house_type_id_fk']){$selected='selected';}?>	
						<option value="<?php echo $i ?>" <?php echo $selected?> ><?php echo $arr_type_house[$i] ?></option>
                    <?php endfor ?>    
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> لون المنزل </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="h_house_color" value="<?php echo $result['h_house_color']?>" class="no-padding r-inner-h4" required="required"/>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> عدد الغرف </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="h_rooms_account" value="<?php echo $result['h_rooms_account']?>" class="no-padding r-inner-h4" required="required"/>

                        </div>
                    </div>
                    <!----------------------------------------->
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> مقترض من البنك العقارى </h4>
                        </div>
                        <div class="col-xs-3 r-input">
                            <select class="no-padding " id="loan"  name="h_borrow_from_bank">
                                <?php if($result['h_borrow_from_bank']==1){echo ' <option value="1" selected>نعم</option>
                        <option value="2">لا</option>';
                                }else{echo ' <option value="1" >نعم</option>
                        <option value="2" selected>لا</option>';}  ?>
                            </select>

                        </div>
                        <div class="col-xs-3 r-input">
                            <input type="number" name="h_borrow_remain" value="<?php echo $result['h_borrow_remain']?>" class="no-padding r-inner-h4" placeholder="القيمة المتبقية"  id="loan-cost" >
                        </div>

                    </div>


                    <!-------------------------------------->

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> اتجاه المنزل </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select class="form-control no-padding " name="h_house_direction">
                          	<?php $arr_direct=array('اختر','شمال','جنوب','شرق','غرب','شمال غرب'
                                           ,'شمال شرق ','شمال غرب','جنوب شرق ','جنوب غرب');?>
                    
		            <?php for($i=0;$i<sizeof($arr_direct);$i++):
                     $selected='';if($i==$result['h_house_direction']){$selected='selected';}?>	
						<option value="<?php echo $i ?>" <?php echo $selected?>  ><?php echo $arr_direct[$i] ?></option>
                    <?php endfor ?>    
                              </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الحالة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select class="form-control no-padding " name="h_house_status_id_fk">
                                <?php if($result['h_house_status_id_fk']==1){

                                    echo' 	<option value="1" selected>جيد</option>
							<option value="2">متوسط</option>
							<option value="3">يحتاج لترميم</option>';
                                }elseif($result['h_house_status_id_fk']==2){
                                    echo'  	<option value="1" >جيد</option>
							<option value="2" selected>متوسط</option>
							<option value="3">يحتاج لترميم</option>';
                                }else{ echo' <option value="1" >جيد</option>
							<option value="2" >متوسط</option>
							<option value="3" selected>يحتاج لترميم</option>';} ?>

                            </select>
                        </div>
                    </div>

                </div>

                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 ">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الرقم الصحى </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="no-padding r-inner-h4" value="<?php echo $result['h_health_number']?>"  name="h_health_number" required="required"/>
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الحى</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select class="form-control no-padding " name="h_hai_id_fk" id="optionearea2">
                                <option>اختر الحي</option>

                                <?php
                                if(!empty($sub_depart[$result['h_hai_id_fk']])):
                                 foreach ($sub_depart[$result['h_hai_id_fk']] as $record):
                                     $select='';
                                     if($record->id ==$result['h_hai_id_fk']){
                                         $select='selected';
                                     }
                                     ?>
                                     <option value="<? echo $record->id; ?>" <? echo $select ;?>><? echo $record->sub_dep_name;?></option>
                                  <? endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  المنطقة    </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="h_house_area" value="<?php echo $result['h_house_area']?>" class="no-padding r-inner-h4" required="required"/>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  أقرب مسجد    </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="h_mosque" value="<?php echo $result['h_mosque']?>" class="no-padding r-inner-h4" required="required"/>

                        </div>
                    </div> <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  أقرب معلم    </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" name="h_nearest_teacher" value="<?php echo $result['h_nearest_teacher']?>" class="no-padding r-inner-h4" required="required"/>

                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> ملكية السكن </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select class="form-control no-padding "  name="h_house_owner_id_fk" id="buliding">
                                <?php if($result['h_house_owner_id_fk']==1){

                                    echo' 	<option value="1" selected>ملك</option>
							<option value="2">ايجار</option>
							<option value="3">هبه</option>';
                                }elseif($result['h_house_status_id_fk']==2){
                                    echo'  <option value="1">ملك</option>
							<option value="2" selected>ايجار</option>
							<option value="3">هبه</option>';
                                }else{ echo' <option value="1">ملك</option>
							<option value="2">ايجار</option>
							<option value="3" selected>هبه</option>';} ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  مقدار الإيجار السنوى   </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text"   name="h_rent_amount"  class="no-padding r-inner-h4" value="<?php echo $result['h_rent_amount']?>" id="buliding-cost"/>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  عدد دورات المياه   </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="no-padding r-inner-h4" value="<?php echo $result['h_bath_rooms_account']?>" name="h_bath_rooms_account"/>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  مساحة البناء   </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="no-padding r-inner-h4" value="<?php echo $result['h_house_size']?>" name="h_house_size"/>

                        </div>
                    </div>

                    <!----------------------------------------->
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> قرض ترميم من بنك التسليف </h4>
                        </div>
                        <div class="col-xs-3 r-input">
                            <select class="form-control no-padding " id="loan_restoration"  name="h_loan_restoration">
                                <?php if($result['h_loan_restoration']==1){
                                    echo ' <option value="1" selected>نعم</option>
                                    <option value="2">لا</option>';
                                }else{echo ' 
                                   <option value="1" >نعم</option>
                                   <option value="2" selected>لا</option>';}  ?>
                            </select>

                        </div>
                        <div class="col-xs-3 r-input">
                            <input type="number" name="h_loan_restoration_remain" value="<?php echo $result['h_loan_restoration_remain']?>" class="no-padding r-inner-h4" placeholder="القيمة المتبقية"  id="h_loan" >
                        </div>

                    </div>
                    <!-------------------------------------->    
      </div>
                <!--3 -->
                <div class="col-xs-12 r-inner-btn">
   <div class="col-md-4"></div>
                  
                    <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                         <a  href="<?php  echo base_url().'Family/update_family_members/'.$result['mother_national_num_fk']?>">
                            <button type="button" class="btn btn-info">عودة</button> </a>  
                    </div>
                    
                      <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <input type="submit" role="button" name="update" class="btn btn-blue btn-next"  value="التالى">

                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                      
                    </div>

                 
                </div>
                <?php  echo form_close()?>
            <?php endif?>
            <!--3 -->
        </div>
    </div>




        <script>
            document.getElementById("loan").onchange = function () {

                if (this.value == '1')
                    document.getElementById("loan-cost").removeAttribute("readonly", "readonly");
                else{
                    document.getElementById("loan-cost").setAttribute("readonly", "readonly");
                    $("#loan-cost").val("");
                }
            };



            document.getElementById("buliding").onchange = function () {

                if (this.value == 2)
                    document.getElementById("buliding-cost").removeAttribute("disabled", "disabled");
                else{
                    document.getElementById("buliding-cost").setAttribute("disabled", "disabled");
                    $("#buliding-cost").val("");
                }
            };

            document.getElementById("loan_restoration").onchange = function () {

                if (this.value == 1)
                    document.getElementById("h_loan").removeAttribute("disabled", "disabled");
                else{
                    document.getElementById("h_loan").setAttribute("disabled", "disabled");
                    $("#h_loan").val("");
                }
            };


        </script>
        <!--------------------------------------->
        <script>
            function rent(valu)
            {
                if(valu)
                {
                    var dataString = 'valu=' + valu;
                    $.ajax({

                        type:'post',
                        url: '<?php echo base_url() ?>/web/house',
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
