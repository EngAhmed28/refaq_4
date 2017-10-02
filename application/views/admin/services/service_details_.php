<div class="col-sm-11 col-xs-12">
    <!--  -->
    <div class="col-xs-12 r-side-table">
        <div class="col-sm-9">
            <h4> <span> <i class="fa fa-users" aria-hidden="true"></i></span> شؤون الاسرة </h4>
        </div>
        <div class="col-sm-3">
            <h5> <?php echo $_SESSION['user_username']?></h5>
            <h5>   اخر دخول  : 27 / 5 / 2017</h5>
        </div>
    </div>
    <div class="col-xs-12 r-bottom">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li ><a href="details.html"> الاسرة الجديده </a></li>
                <li><a href="details1.html">الاسرة المعتمده </a></li>
                <li><a href="details2.html">ارشيف الاسر </a></li>
                <li class="active"><a href="<?php echo base_url()?>family/family_services" /> خدمات الاسر </a></li>
                <li><a href="<?php echo  base_url()."Family/certified_services"?>"> خدمات معتمده </a></li>
                <li><a href="details5.html">  ارشيف خدمات </a></li>
            </ul>
        </div>
    </div>
    <!--  -->
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">رقم الطلب </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <input type="text" class="r-inner-h4 " value="<? echo $sevice_details['order_num'] ;?>" readonly>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6">
                            <h4 class="r-h4">رقم الأسرة</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " value="<? echo $sevice_details['mother_national_id_fk'] ;?>" readonly>
                        </div>
                    </div>
                    <? if(empty($count)){$number=0;}else{$number =sizeof($count);} ?>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> عدد الخدمات </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " value="<? echo $number;?>">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> فئة الخدمة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " value="<? if(!empty($get_service_name[$sevice_details['service_id_fk']])):
                                if($get_service_name[$sevice_details['service_id_fk']][0]->sub_service_name == ''){
                                    echo $get_service_name[$sevice_details['service_id_fk']][0]->main_service_name;
                                }else{
                                    echo $get_service_name[$sevice_details['service_id_fk']][0]->sub_service_name;
                                }endif;?>" readonly>
                        </div>
                    </div>

                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">إسم الأم</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="field">
                                <input type="text" class="r-inner-h4 " value="<? if(!empty($get_mother[$sevice_details['mother_national_id_fk']])):  echo $get_mother[$sevice_details['mother_national_id_fk']]->m_first_name; endif;?>" readonly>

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">نوع الخدمة</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="field">
                                <input type="text" class="r-inner-h4 " value="" readonly>

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">تاريخ الخدمة</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="field">
                                <input type="text" class="r-inner-h4 " value="<? echo date('Y-m-d',$sevice_details['date']) ;?>" readonly>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-------------------section2------------------------>
        <div class="col-xs-12 r-inner-details">
                <? if ($sevice_details['service_id_fk'] == 2){?>
                    <div class="col-xs-12">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   الاسم  </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <select name="help_marriage_family_id_fk" disabled>
                                        <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):
                                            $select='';
                                            if($sevice_details['help_marriage_family_id_fk'] == $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk ){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>" <? echo $select; ?>><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                                        <? endif;?>
                                        <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                            foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):
                                                $selected='';
                                                if($sevice_details['help_marriage_family_id_fk'] == $member->id ){
                                                    $selected='selected';
                                                }
                                                ?>
                                                <option value="<? echo $member->id; ?>" <? echo $selected; ?>><? echo $member->member_name; ?></option>
                                            <? endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  مكان الزواج  </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <input type="text" class="r-inner-h4 " name="help_marriage_place" value="<? echo $sevice_details['help_marriage_place'];?>" readonly>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   رقم العقد  </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <input type="text" class="r-inner-h4 " name="help_marriage_contract__num" value="<? echo $sevice_details['help_marriage_contract__num'] ;?>" readonly>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> جهة اصدار العقد </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <input type="text" class="r-inner-h4 " name="help_marriage_issuer_of_contract" value="<? echo $sevice_details['help_marriage_issuer_of_contract'] ;?>" readonly>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  جنسية الزوجة   </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <select name="help_marriage_wife_nationalty_id_fk">
                                        <option> - اختر - </option>
                                        <?php  foreach ($nationality as $record):
                                            $select='';
                                            if($record->id == $sevice_details['help_marriage_wife_nationalty_id_fk']){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<?php  echo $record->id;?>" <? echo $select ;?>><?php  echo $record->title;?></option>
                                        <?php  endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع هوية الزوجة </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <select name="help_marriage_wife_national_type_id_fk">
                                        <option> - اختر - </option>
                                        <?php
                                        $national_id_array =array('1'=>'الهوية الوطنية','2'=>'إقامة','3'=>'وثيقة','4'=>'جواز سفر');
                                        foreach ($national_id_array as $k=>$v):
                                            $select='';
                                            if($sevice_details['help_marriage_wife_national_type_id_fk'] == $k){
                                             $select='selected';
                                            }
                                            ?>
                                            <option value="<?php  echo $k;?>" <? echo $select;?>><?php  echo $v;?></option>
                                        <?php  endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الجوال </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <input type="text" class="r-inner-h4 " name="help_marriage_mob">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> المدينة </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <select name="help_marriage_city">
                                        <option> - اختر - </option>
                                        <?php
                                        foreach($main_depart as $record){
                                            $select='';
                                            if($record->id == $sevice_details['help_marriage_city']){
                                              $select='selected';
                                            }
                                            echo '<option value="'.$record->id.'" '.$select.'>'.$record->main_dep_name.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> تاريخ الزواج  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="help_marriage_date" placeholder="شهر / يوم / سنة " value="<? echo date('Y-m-d',$sevice_details['help_marriage_date']); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> تاريخ العقد  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="help_marriage_contract_date" placeholder="شهر / يوم / سنة " value="<? echo date('Y-m-d',$sevice_details['help_marriage_contract_date']); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  قيمة المهر  </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <input type="text" class="r-inner-h4 " name="help_marriage_dowry_cost" value="<? echo $sevice_details['help_marriage_dowry_cost']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم هوية الزوجة </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <input type="text" class="r-inner-h4 " name="help_marriage_wife_national_card_num" value="<? echo $sevice_details['help_marriage_wife_national_card_num']; ?>" readonly>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  الزواج لاول مرة  </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <form class="r-block">
                                        <? if($sevice_details['help_marriage_first_marriage'] ==1){?>
                                        <input type="radio" class="radio2"  checked name="help_marriage_first_marriage" value="1"> نعم
                                        <input type="radio" class="radio2" name="help_marriage_first_marriage" value="2"> لا
                                        <?}elseif($sevice_details['help_marriage_first_marriage'] ==2){?>
                                            <input type="radio" class="radio2" name="help_marriage_first_marriage" value="1"> نعم
                                            <input type="radio" class="radio2"  checked name="help_marriage_first_marriage" value="2"> لا
                                        <?}?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 r-inner-details">
                        <table style="width:100%">
                            <tr>
                                <th>م </th>
                                <th>اسم الملف </th>
                                <th>فتح الملف / ارفاق</th>
                            </tr>
                            <tr class="r-tr">
                                <td> 1 </td>
                                <td> بطاقة العائلة </td>
                                <td style="width: 35%;">
                                    <div class="field">
                                        <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                        <input type="file" name="family_card" class="file_input_with_replacement">
                                    </div>
                                </td>
                            </tr>
                            <tr class="r-tr">
                                <td> 2 </td>
                                <td> عقد النكاح </td>
                                <td style="width: 35%;">
                                    <div class="field">
                                        <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                        <input type="file" name="marriage_contract" class="file_input_with_replacement">
                                    </div>
                                </td>
                            </tr>
                            <tr class="r-tr">
                                <td> 3 </td>
                                <td> صورة الهوية </td>
                                <td style="width: 35%;">
                                    <div class="field">
                                        <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                        <input type="file" name="identity_img" class="file_input_with_replacement">
                                    </div>
                                </td>
                            </tr>
                            <tr class="r-tr">
                                <td> 4 </td>
                                <td> الصورة الشخصية </td>
                                <td style="width: 35%;">
                                    <div class="field">
                                        <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                        <input type="file" name="personal_picture" class="file_input_with_replacement">
                                    </div>
                                </td>
                            </tr>
                            <tr class="r-tr">
                                <td> 5 </td>
                                <td> عقد القاعة </td>
                                <td style="width: 35%;">
                                    <div class="field">
                                        <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                        <input type="file" name="hall_contract" class="file_input_with_replacement">
                                    </div>
                                </td>
                            </tr>
                            <tr class="r-tr">
                                <td> 6 </td>
                                <td> تعريف بالراتب </td>
                                <td style="width: 35%;">
                                    <div class="field">
                                        <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                        <input type="file" name="definition_of_salary" class="file_input_with_replacement">
                                    </div>
                                </td>
                            </tr>
                            <tr class="r-tr">
                                <td> 7 </td>
                                <td> تزكية الامام </td>
                                <td style="width: 35%;">
                                    <div class="field">
                                        <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                        <input type="file" name="imam_recommendation" class="file_input_with_replacement">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?}elseif ($sevice_details['service_id_fk'] == 3){?>
                    <div class="col-xs-12">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الاسم  </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <select name="transfer_to_medical_family_member_id_fk" disabled>
                                        <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):
                                            $select='';
                                            if($sevice_details['transfer_to_medical_family_member_id_fk'] == $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk ){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>" <? echo $select; ?>><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                                        <? endif;?>
                                        <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                            foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):
                                                $selected='';
                                                if($sevice_details['transfer_to_medical_family_member_id_fk'] == $member->id ){
                                                    $selected='selected';
                                                }
                                                ?>
                                                <option value="<? echo $member->id; ?>" <? echo $selected; ?>><? echo $member->member_name; ?></option>
                                            <? endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع المرض </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="transfer_to_medical_diseases_type_name" value="<? echo $sevice_details['transfer_to_medical_diseases_type_name']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                <?}elseif ($sevice_details['service_id_fk'] == 4){?>
                    <div class="col-xs-12">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الاسم  </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <select name="treatment_card_name">
                                        <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):
                                            $select='';
                                            if($sevice_details['treatment_card_name'] == $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk ){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>" <? echo $select; ?>><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                                        <? endif;?>
                                        <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                            foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):
                                                $selected='';
                                                if($sevice_details['treatment_card_name'] == $member->id ){
                                                    $selected='selected';
                                                }
                                                ?>
                                                <option value="<? echo $member->id; ?>" <? echo $selected; ?>><? echo $member->member_name; ?></option>
                                            <? endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع خدمة البطاقة  </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <select name="treatment_card_service_type_id_fk">
                                  <?  $reatment_card_service =array('','تألف','مفقود','تجديد','تغيير الرقم السري','إصدار');
                                  foreach ($reatment_card_service as $k=>$v):
                                      $select='';
                                      if($k ==  $sevice_details['treatment_card_service_type_id_fk']){
                                          $select='selected';
                                      }
                                      ?>
                                        <option value="<? echo $k ;?>" <? echo $select; ?>> <? echo $v; ?> </option>
                                        <? endforeach;?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الهوية  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="treatment_card_national_number" value="<? echo $sevice_details['treatment_card_national_number'];?>"  readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                <?}elseif ($sevice_details['service_id_fk'] == 5){?>
                    <!--not complete   -->

                <?}elseif ($sevice_details['service_id_fk'] == 6){?>

                    <div class="col-xs-12">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  نوع الخدمة </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <form class="r-block">
                                         <? if($sevice_details['course_employment_id_fk'] ==1){?>
                                             <input type="radio" class="radio2" name="course_employment_id_fk"  checked value="1" id="r-train"> الدورات التدريبية
                                             <input type="radio" class="radio2" name="course_employment_id_fk"  value="2" id="r-jop"> توظيف
                                        <?}elseif($sevice_details['course_employment_id_fk'] ==2){?>
                                             <input type="radio" class="radio2" name="course_employment_id_fk"  value="1" id="r-train"> الدورات التدريبية
                                             <input type="radio" class="radio2" name="course_employment_id_fk" checked value="2" id="r-jop"> توظيف
                                        <? }?>

                                    </form>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اخر درجة تعليمية  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="course_employment_last_education_degree"  value="<?  echo $sevice_details['course_employment_last_education_degree']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-xs-12 r-type">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع الدورة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="course_employment_course_type_id_fk">
                                        <option> - اختر - </option>
                                        <? foreach ($courses as $course):
                                            $select='';
                                            if($course->id ==  $sevice_details['course_employment_course_type_id_fk']){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<? echo $course->id;?>" <? echo $select;?>> <? echo $course->title;?> </option>
                                        <? endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 r-jop-name">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اسم الوظيفة  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="course_employment_job" value="<? echo $sevice_details['course_employment_job'];?>" readonly>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الجوال </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="course_employment_mob" value="<? echo $sevice_details['course_employment_mob']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   الاسم  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="course_employment_family_id_fk">
                                        <option> - اختر - </option>
                                        <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):?>
                                            <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>"><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                                        <? endif;?>
                                        <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                            foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):?>
                                                <option value="<? echo $member->id; ?>"><? echo $member->member_name; ?></option>
                                            <? endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> المرحلة التعليمية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="course_employment_education_level">
                                </div>
                            </div>
                            <div class="col-xs-12 r-times">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> مدة الدورة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="course_employment_course_period">
                                        <option> - اختر - </option>
                                        <option value="1"> شهر </option>
                                        <option value="2"> ثلاثة شهور </option>
                                        <option value="3"> ستة شهور </option>
                                        <option value="4"> سنة </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 r-top">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  السيرة الذاتية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="field">
                                        <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                        <input type="file" name="course_employment_cv_file" class="file_input_with_replacement">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  المؤهلات  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="field">
                                        <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                        <input type="file" name="course_employment_qualification_file" class="file_input_with_replacement">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

          <? }elseif ($sevice_details['service_id_fk'] == 7){?>
            <div class="col-xs-12">
              <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> نوع  الجهاز  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="device_id_fk" disabled>
                                    <?foreach ($devices as$device):
                                        $select ='';
                                        if($device->id ==$sevice_details['device_id_fk'] ){
                                            $select ='selected';
                                        }
                                        ?>
                                        <option value="<? echo $device->id;?>" <? echo $select; ?>><? echo $device->title;?> </option>
                                    <? endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-6">
                                <h4 class="r-h4">   ملاحظات  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <textarea class="r-textarea" name="device_note" readonly><? echo $sevice_details['device_note'] ;?></textarea>
                            </div>
                        </div>
                    </div>
              <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> العدد    </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number" name="number_of_device" class="r-inner-h4 " value="<? echo $sevice_details['number_of_device'] ;?>"  readonly>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> صوره  الجهاز</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <div class="field">
                                    <input type="text"  value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                    <input type="file" name="device_img"   class="file_input_with_replacement">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
          <?}elseif ($sevice_details['service_id_fk'] == 8){?>
            <div class="col-xs-12">
              <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-12">
                      <div class="col-xs-6">
                          <h4 class="r-h4"> نوع  الجهاز  </h4>
                      </div>
                      <div class="col-xs-6 r-input">
                          <select name="device_id_fk" disabled>
                              <?foreach ($devices as$device):
                                  $select ='';
                                  if($device->id ==$sevice_details['device_id_fk'] ){
                                      $select ='selected';
                                  }
                                  ?>
                                  <option value="<? echo $device->id;?>" <? echo $select; ?>><? echo $device->title;?> </option>
                              <? endforeach;?>
                          </select>
                      </div>
                  </div>
                  <div class="col-xs-12 ">
                      <div class="col-xs-6">
                          <h4 class="r-h4">   ملاحظات  </h4>
                      </div>
                      <div class="col-xs-6 r-input">
                          <textarea class="r-textarea" name="device_note" readonly><? echo $sevice_details['device_note']?></textarea>
                      </div>
                  </div>
              </div>
              <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-12">
                      <div class="col-xs-6">
                          <h4 class="r-h4"> العدد    </h4>
                      </div>
                      <div class="col-xs-6 r-input">
                          <input  value="<? echo $sevice_details['number_of_pays'] ;?>type="number" name="number_of_device" class="r-inner-h4 " value="<? echo $sevice_details['number_of_device']?>" >
                      </div>
                  </div>
                  <div class="col-xs-12">
                      <div class="col-xs-6">
                          <h4 class="r-h4"> صوره  الجهاز</h4>
                      </div>
                      <div class="col-xs-6 r-input">
                          <div class="field">
                              <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                              <input type="file" name="device_img" class="file_input_with_replacement">
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          <?}elseif ($sevice_details['service_id_fk'] == 9){?>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> الاسم </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <select name="name_id_fk" disabled>
                                  <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):
                                      $select='';
                                      if($sevice_details['name_id_fk'] == $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk ){
                                      $select='selected';
                                      }
                                      ?>
                                      <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>" <? echo $select; ?>><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                                  <? endif;?>
                                  <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                      foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):
                                          $selected='';
                                          if($sevice_details['name_id_fk'] == $member->id ){
                                              $selected='selected';
                                          }
                                          ?>
                                          <option value="<? echo $member->id; ?>" <? echo $selected; ?>><? echo $member->member_name; ?></option>
                                      <? endforeach; endif;?>
                              </select>
                          </div>
                      </div>
                      <div class="col-xs-12 ">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> تاريخ السفر </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="docs-datepicker">
                                  <div class="input-group">
                                      <input  readonlytype="text" class="form-control docs-date" name="date_of_travel" placeholder="شهر / يوم / سنة " value="<?  echo date('Y-m-d',$sevice_details['date_of_travel']);?>">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> جهة العلاج </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input readonlytype="text" class="r-inner-h4 " name="treatment_place" value="<? echo $sevice_details['nametreatment_place_id_fk'] ;?>">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> عدد الايام </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input readonly type="number" class="r-inner-h4 " name="number_of_pays" value="<? echo $sevice_details['number_of_pays'] ;?>"  >
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> اسم اليوم</h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <select name="day_name" disabled>
                               <? $days =array('','السبت','الاحد','الاثنين','الثلاثاء','الاربعاء','الخميس','الجمعة');?>
                                <?foreach ($days as $k=>$v):
                                    $select='';
                                   if($sevice_details['day_name'] == $k ){
                                       $select='selected';
                                   }
                                    ?>
                                  <option value="<? echo $k; ?>" <? echo $select; ?>> <? echo $v;?> </option>
                                  <? endforeach;?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data r-top">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  ارفاق اثبات الموعد </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="field">
                                  <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                  <input type="file" name="proofed_date_file" class="file_input_with_replacement">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data"></div>
              </div>
          <?}elseif ($sevice_details['service_id_fk'] == 10){?>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> رقم الفاتورة </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input readonly type="number" class="r-inner-h4 " name="fatora_num" value="<? echo $sevice_details['fatora_num'];?>">
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> تاريخ الفاتورة  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="docs-datepicker">
                                  <div class="input-group">
                                      <input readonly type="text" class="form-control docs-date" name="fatora_date" placeholder="شهر / يوم / سنة " value="<? echo date('y-m-d',$sevice_details['fatora_date']);?>">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  مبلغ الفاتورة </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input  readonlytype="number" class="r-inner-h4 " name="fatora_cost" value="<? echo $sevice_details['fatora_cost']; ?>">
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> تاريخ سند الدفع </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="docs-datepicker">
                                  <div class="input-group">
                                      <input  readonly type="text" class="form-control docs-date" name="fatora_sanad_daf3_date" placeholder="شهر / يوم / سنة " value="<? echo date('Y-m-d',$sevice_details['fatora_sanad_daf3_date']); ?>">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12 r-top">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  صورة الفاتورة </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="field">
                                  <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                  <input type="file" name="fatora_img" class="file_input_with_replacement">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data"></div>
              </div>

          <?}elseif ($sevice_details['service_id_fk'] ==11){?>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> الاسم  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <select name="school_member_id_fk" disabled>
                                  <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):
                                      $select='';
                                      if($sevice_details['school_member_id_fk'] == $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk ){
                                          $select='selected';
                                      }
                                      ?>
                                      <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>" <? echo $select; ?>><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                                  <? endif;?>
                                  <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                      foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):
                                          $selected='';
                                          if($sevice_details['school_member_id_fk'] == $member->id ){
                                              $selected='selected';
                                          }
                                          ?>
                                          <option value="<? echo $member->id; ?>" <? echo $selected; ?>><? echo $member->member_name; ?></option>
                                      <? endforeach; endif;?>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  اسم المستلزمات المدرسية  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <select name="school_requirement_id_fk">
                                  <?foreach ($school_requirement as $record):
                                      $select='';
                                      if($record->id ==$sevice_details['school_requirement_id_fk']){
                                       $select='selected';
                                      }?>
                                      <option value="<? echo $record->id;?>" <? echo $select;?>> <? echo $record->title ;?> </option>
                                  <? endforeach;?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>

          <?}elseif ($sevice_details['service_id_fk'] == 12){?>
              <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-12">
                      <div class="col-xs-6">
                          <h4 class="r-h4"> الاسم  </h4>
                      </div>
                      <div class="col-xs-6 r-input">
                          <select name="hij_family_id_fk" disabled>
                              <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):
                                  $select='';
                                  if($sevice_details['hij_family_id_fk'] == $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk ){
                                      $select='selected';
                                  }
                                  ?>
                                  <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>" <? echo $select; ?>><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                              <? endif;?>
                              <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                  foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):
                                      $selected='';
                                      if($sevice_details['hij_family_id_fk'] == $member->id ){
                                          $selected='selected';
                                      }
                                      ?>
                                      <option value="<? echo $member->id; ?>" <? echo $selected; ?>><? echo $member->member_name; ?></option>
                                  <? endforeach; endif;?>
                          </select>
                      </div>
                  </div>
                  <div class="col-xs-12">
                      <div class="col-xs-6">
                          <h4 class="r-h4"> اسم المحرم  </h4>
                      </div>
                      <div class="col-xs-6 r-input">
                          <input type="text" class="r-inner-h4 " name="muhrem_hij_name" value="<?echo $sevice_details['muhrem_hij_name'];?>">
                      </div>
                  </div>
                  <div class="col-xs-12">
                      <div class="col-xs-6">
                          <h4 class="r-h4">  الحج لاول مرة  </h4>
                      </div>
                      <div class="col-xs-6 r-input">
                          <select name="first_hij" disabled>
                        <? if($sevice_details['first_hij'] ==1){ ?>
                            <option value="1"> نعم </option>
                            <option value="2"> لا </option>
                        <?  }elseif($sevice_details['first_hij'] ==2){ ?>
                            <option value="2"> لا </option>
                            <option value="1"> نعم </option>
                        <? }  ?>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-12">
                      <div class="col-xs-6">
                          <h4 class="r-h4"> العلاقة </h4>
                      </div>
                      <div class="col-xs-6 r-input">
                          <input  readonly type="text" class="r-inner-h4 " name="relationship" value="<? echo $sevice_details['relationship'];?>">
                      </div>
                  </div>
                  <div class="col-xs-12">
                      <div class="col-xs-6">
                          <h4 class="r-h4"> تاريخ الميلاد  </h4>
                      </div>
                      <div class="col-xs-6 r-input">
                          <div class="docs-datepicker">
                              <div class="input-group">
                                  <input  readonly type="text" class="form-control docs-date" name="birth_date" placeholder="شهر / يوم / سنة " value="<? echo date('Y-m-d', $sevice_details['birth_date'])?>">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          <?}elseif ($sevice_details['service_id_fk'] == 13){?>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> الاسم  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <select name="hij_family_id_fk" disabled>
                                  <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):
                                      $select='';
                                      if($sevice_details['hij_family_id_fk'] == $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk ){
                                          $select='selected';
                                      }
                                      ?>
                                      <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>" <? echo $select; ?>><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                                  <? endif;?>
                                  <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                      foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):
                                          $selected='';
                                          if($sevice_details['hij_family_id_fk'] == $member->id ){
                                              $selected='selected';
                                          }
                                          ?>
                                          <option value="<? echo $member->id; ?>" <? echo $selected; ?>><? echo $member->member_name; ?></option>
                                      <? endforeach; endif;?>
                              </select>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> اسم المحرم  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input type="text" class="r-inner-h4 " name="muhrem_hij_name" value="<?echo $sevice_details['muhrem_hij_name'];?>">
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  العمرة لاول مرة  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <select name="first_hij" disabled>
                                  <? if($sevice_details['first_hij'] ==1){ ?>
                                      <option value="1"> نعم </option>
                                      <option value="2"> لا </option>
                                  <?  }elseif($sevice_details['first_hij'] ==2){ ?>
                                      <option value="2"> لا </option>
                                      <option value="1"> نعم </option>
                                  <? }  ?>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> العلاقة </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input type="text" class="r-inner-h4 " name="relationship">
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> تاريخ الميلاد  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="docs-datepicker">
                                  <div class="input-group">
                                      <input type="text" class="form-control docs-date" name="birth_date" placeholder="شهر / يوم / سنة ">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          <?}elseif ($sevice_details['service_id_fk'] == 14){?>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">   دواء او جهاز  </h4>
                          </div>
                          <div class="col-xs-6 ">
                              <form class="r-block">
                                  <? if($sevice_details['medicine_device_id_fk'] ==1){?>
                                      <input type="radio" class="radio2"  checked name="medicine_device_id_fk" value="1"> دواء
                                      <input type="radio" class="radio2" name="medicine_device_id_fk" value="2"> جهاز
                                 <? }else{?>
                                      <input type="radio" class="radio2"   name="medicine_device_id_fk" value="1"> دواء
                                      <input type="radio" class="radio2" checked name="medicine_device_id_fk" value="2">
                                  <?}?>

                              </form>
                          </div>
                      </div>
                      <div class="col-xs-12 ">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> أسم الدواء او الجهاز </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input  readonly type="text" class="r-inner-h4 " name="medicine_device_name" value="<? echo $sevice_details['medicine_device_name'];?>">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> الاسم </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <select name="medicine_device_family_id_fk" disabled>
                                  <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):
                                      $select='';
                                      if($sevice_details['medicine_device_family_id_fk'] == $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk ){
                                          $select='selected';
                                      }
                                      ?>
                                      <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>" <? echo $select; ?>><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                                  <? endif;?>
                                  <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                      foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):
                                          $selected='';
                                          if($sevice_details['medicine_device_family_id_fk'] == $member->id ){
                                              $selected='selected';
                                          }
                                          ?>
                                          <option value="<? echo $member->id; ?>" <? echo $selected; ?>><? echo $member->member_name; ?></option>
                                      <? endforeach; endif;?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data r-top">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  تقرير  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="field">
                                  <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                  <input type="file" name="medicine_device_file_attachment" class="file_input_with_replacement">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data"></div>
              </div>
          <?}elseif ($sevice_details['service_id_fk'] == 15){?>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> اسم القريب </h4>
                          </div>
                          <div class="col-xs-6 ">
                              <input  readonly type="text" class="r-inner-h4 " name="car_nearest_name" value="<? echo $sevice_details['car_nearest_name'];?>">
                          </div>
                      </div>
                      <div class="col-xs-12 ">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> وصف المشكلة </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input  readonly type="text" class="r-inner-h4 " name="car_problem" value="<? echo $sevice_details['car_problem'];?>">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> اسم صاحب السيارة  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input  readonly type="text" class="r-inner-h4 " name="car_owner_name" value="<? echo $sevice_details['car_owner_name'];?>">
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  رقم استمارة السيارة  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input  readonly type="text" class="r-inner-h4 " name="car_num" value="<? echo $sevice_details['car_num'];?>">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12 r-top">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  قانون الاصلاح  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="field">
                                  <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                  <input type="file" name="car_repair_fatora_img" class="file_input_with_replacement">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  صورة استمارة السيارة  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="field">
                                  <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                  <input type="file" name="car_num_img" class="file_input_with_replacement">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          <?}elseif ($sevice_details['service_id_fk'] == 16){?>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> نوع  الجهاز  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <select name="repair_device_id_fk" disabled>
                                  <?foreach ($devices as$device):
                                      $select ='';
                                      if($device->id ==$sevice_details['device_id_fk'] ){
                                          $select ='selected';
                                      }
                                      ?>
                                      <option value="<? echo $device->id;?>" <? echo $select; ?>><? echo $device->title;?> </option>
                                  <? endforeach;?>
                              </select>
                          </div>
                      </div>
                      <div class="col-xs-12 ">
                          <div class="col-xs-6">
                              <h4 class="r-h4">   ملاحظات  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <textarea class="r-textarea" name="repair_device_note" readonly><? echo $sevice_details['repair_device_note'];?></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> العدد    </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <input type="text" class="r-inner-h4 " name="repair_device_number" value="<? echo $sevice_details['repair_device_note'];?>" readonly>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> صوره  الجهاز</h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="field">
                                  <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                  <input type="file" name="repair_device_img" class="file_input_with_replacement">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          <?}elseif ($sevice_details['service_id_fk'] == 17){?>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> مكان الصيانة  </h4>
                          </div>
                          <div class="col-xs-6 ">
                              <input type="text" class="r-inner-h4 " name="home_place"  value="<? echo $sevice_details['home_place'];?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> نوع الاصلاح </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <select name="home_type_id_fk" disabled>
                                  <? foreach ($home_repair_type as $record):
                                      $select='';
                                      if($record->id == $sevice_details['home_type_id_fk']){
                                          $select='selected';
                                      }
                                      ?>
                                      <option value="<? echo $record->id ;?>"><? echo $record->title;?> </option>
                                  <? endforeach;?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12 r-top">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> صورة مكان الصيانة </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="field">
                                  <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                  <input type="file" name="home_img" class="file_input_with_replacement">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  </div>
              </div>
          <?}elseif($sevice_details['service_id_fk'] == 18){?>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> مكان الترميم  </h4>
                          </div>
                          <div class="col-xs-6 ">
                              <input type="text" class="r-inner-h4 " name="home_place" value="<? echo $sevice_details['home_place'];?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> نوع الترميم </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <select name="home_type_id_fk" disabled>
                                  <? foreach ($home_repair_type as $record):
                                      $select='';
                                      if($record->id == $sevice_details['home_type_id_fk']){
                                          $select='selected';
                                      }
                                      ?>
                                      <option value="<? echo $record->id ;?>"><? echo $record->title;?> </option>
                                  <? endforeach;?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12 r-top">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> صورة مكان الترميم </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="field">
                                  <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                  <input type="file" name="home_img" class="file_input_with_replacement">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  </div>
              </div>
          <?}elseif ($sevice_details['service_id_fk'] == 19){?>
              <div class="col-xs-12">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  رقم الفاتورة  </h4>
                          </div>
                          <div class="col-xs-6 ">
                              <input type="text" class="r-inner-h4 " name="fatora_num" value="<? echo $sevice_details['fatora_num'];?>" readonly>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> تاريخ الفاتورة  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="docs-datepicker">
                                  <div class="input-group">
                                      <input type="text" class="form-control docs-date" name="fatora_date" placeholder="شهر / يوم / سنة "  value="<? echo $sevice_details['fatora_date']; ?>" readonly>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4">  مبلغ الفاتورة  </h4>
                          </div>
                          <div class="col-xs-6 ">
                              <input type="text" class="r-inner-h4 " name="fatora_cost"  value="<? echo $sevice_details['fatora_cost']; ?>" readonly>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> تاريخ سند الدفع  </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="docs-datepicker">
                                  <div class="input-group">
                                      <input type="text" class="form-control docs-date" name="fatora_sanad_daf3_date" placeholder="شهر / يوم / سنة " value="<? echo $sevice_details['fatora_sanad_daf3_date'];?>" readonly>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="col-xs-12 r-top">
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                      <div class="col-xs-12">
                          <div class="col-xs-6">
                              <h4 class="r-h4"> صورة  الفاتورة </h4>
                          </div>
                          <div class="col-xs-6 r-input">
                              <div class="field">
                                  <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                  <input type="file" name="fatora_img" class="file_input_with_replacement">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  </div>
              </div>
          <?}?>


        </div>
        <!------------------- endsection2------------------------>
        </div>
            <div class="col-xs-12 r-inner-btn r-new-button">
                <div class="col-xs-2" style="margin-right: 100px">
                    <input type="submit" role="button" name="accept"  data-toggle="modal" data-target="#myModal1" class="btn pull-right"  value="قبول">
                    <?php echo form_open_multipart('Family/operation_service/1/'.$sevice_details['mother_national_id_fk'].'/'.$sevice_details['id']);?>
                    <div class=" modal fade" id="myModal1" >
                        <div id="modal">
                            <span class="text-center">  قبول الملف
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             <a href="#close" id="close" data-dismiss="modal">&#215;</a></span>
                            <div class="r-form-add">
                                <div class="row form-group">
                                    <div class="col-xs-3">
                                        <label > تحويل الى </label>
                                    </div>
                                    <div class="col-xs-9">
                                        <select class="form-control" name="service_file_to"  >
                                            <option >اختر</option>
                                            <?php if(isset($convent) && $convent!=null):
                                                foreach($convent as $one): ?>
                                                    <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                                <?php endforeach; endif?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-xs-3">
                                        <label > الملاحظات </label>
                                    </div>
                                    <div class="col-xs-9">
                                        <textarea name="reason" class="form-control"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-3"></div>
                            <div class="col-xs-6">
                                <input class="btn  center-block" name="operation_service" type="submit" value="قبول" />
                            </div>
                        </div>
                    </div>
                    <?php echo form_close()?>
                    <!---->
                </div>
                <div class="col-xs-2" >
                    <input type="submit" role="button" name="refuse"  data-toggle="modal" data-target="#myModal2" class="btn pull-right"  value="رفض">
                    <?php echo form_open_multipart('Family/operation_service/2/'.$sevice_details['mother_national_id_fk'].'/'.$sevice_details['id']);?>
                    <div class=" modal fade" id="myModal2" >
                        <div id="modal">
                            <span class="text-center">  رفض الملف
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             <a href="#close" id="close" data-dismiss="modal">&#215;</a></span>
                            <div class="r-form-add">
                                <div class="row form-group">
                                    <div class="col-xs-3">
                                        <label > تحويل الى </label>
                                    </div>
                                    <div class="col-xs-9">
                                        <select class="form-control" name="service_file_to"  >
                                            <option >اختر</option>
                                            <?php if(isset($convent) && $convent!=null):
                                                foreach($convent as $one): ?>
                                                    <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                                <?php endforeach; endif?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">

                                    <div class="col-xs-3">
                                        <label > الملاحظات </label>
                                    </div>
                                    <div class="col-xs-9">
                                        <textarea name="reason" class="form-control"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-3"></div>
                            <div class="col-xs-6">
                                <input class="btn  center-block" name="operation_service" type="submit" value="رفض" />
                            </div>
                        </div>
                    </div>
                    <?php echo form_close()?>
                    <!---->
                </div>
                <div class="col-xs-2" >
                    <input type="submit" role="button" name="transfer"  data-toggle="modal" data-target="#myModal3" class="btn pull-right"  value="تحويل">
                    <!---->
                    <?php echo form_open_multipart('Family/operation_service/3/'.$sevice_details['mother_national_id_fk'].'/'.$sevice_details['id']);?>
                    <div class=" modal fade" id="myModal3" >
                        <div id="modal">
                                        <span class="text-center">  تحويل الملف
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             <a href="#close" id="close" data-dismiss="modal">&#215;</a></span>
                            <div class="r-form-add">
                                <div class="row form-group">
                                    <div class="col-xs-3">
                                        <label > تحويل الى </label>
                                    </div>
                                    <div class="col-xs-9">
                                        <select class="form-control" name="service_file_to"  >
                                            <option >اختر</option>
                                            <?php if(isset($convent) && $convent!=null):
                                                foreach($convent as $one): ?>
                                                    <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                                <?php endforeach; endif?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">

                                    <div class="col-xs-3">
                                        <label > الملاحظات </label>
                                    </div>
                                    <div class="col-xs-9">
                                        <textarea name="reason" class="form-control"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-3"></div>
                            <div class="col-xs-6">
                                <input class="btn  center-block" name="operation_service" type="submit" value=" تحويل الملف" />
                            </div>
                        </div>
                    </div>
                    <?php echo form_close()?>
                    <!---->
                </div>

               <? if($_SESSION['role_id_fk']  < 13 && $_SESSION['dep_job_id_fk'] !=0):?>
                <div class="col-xs-2" >
                    <input type="submit" role="button" name="transfer"  data-toggle="modal" data-target="#myModal4" class="btn pull-right"  value="إعتماد">
                    <!---->
                    <?php echo form_open_multipart('Family/operation_service/4/'.$sevice_details['mother_national_id_fk'].'/'.$sevice_details['id']);?>
                    <div class=" modal fade" id="myModal4" >
                        <div id="modal">
                                        <span class="text-center">  إعتماد الملف
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             <a href="#close" id="close" data-dismiss="modal">&#215;</a></span>
                            <div class="r-form-add">
                                <div class="row form-group">

                                </div>
                                <div class="row form-group">

                                    <div class="col-xs-3">
                                        <label > الملاحظات </label>
                                    </div>
                                    <div class="col-xs-9">
                                        <textarea name="reason" class="form-control"></textarea>
                                    </div>

                                </div>
                            </div>
                           <div class="col-xs-3"></div>
                            <div class="col-xs-6">
                                <input class="btn  center-block" name="operation_service" type="submit" value=" إعتماد الملف" />
                            </div>
                        </div>
                    </div>
                    <?php echo form_close()?>
                    <!---->
                </div>
                 <? endif;?>

                <div class="col-xs-2" >
                    <input type="submit" role="button" name="transfer"  data-toggle="modal" data-target="#myModal5" class="btn pull-right"  value="تنفيذ">
                    <!---->
                    <?php echo form_open_multipart('Family/operation_service/5/'.$sevice_details['mother_national_id_fk'].'/'.$sevice_details['id']);?>
                    <div class=" modal fade" id="myModal5" >
                        <div id="modal">
                                        <span class="text-center"> التنفيذ
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             <a href="#close" id="close" data-dismiss="modal">&#215;</a></span>
                            <div class="r-form-add">
                                <div class="row form-group">
                                    <div class="col-xs-3">
                                        <label > تحويل الى </label>
                                    </div>
                                    <div class="col-xs-9">
                                        <select class="form-control" name="service_file_to"  >
                                            <option >اختر</option>
                                            <?php if(isset($convent) && $convent!=null):
                                                foreach($convent as $one): ?>
                                                    <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                                <?php endforeach; endif?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">

                                    <div class="col-xs-3">
                                        <label > الملاحظات </label>
                                    </div>
                                    <div class="col-xs-9">
                                        <textarea name="reason" class="form-control"></textarea>
                                    </div>

                                </div>
                            </div>
                         <div class="col-xs-3"></div>
                            <div class="col-xs-6">
                                <input class="btn  center-block" name="operation_service" type="submit" value=" التنفيذ" />
                            </div>
                        </div>
                    </div>
                    <?php echo form_close()?>
                    <!---->
                </div>


            </div>
            <div>
                <?php
                if(!empty($all_operations[$sevice_details['id']])):?>
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">من </th>
                            <th class="text-center">  إلي</th>
                            <th class="text-center">الحالة</th>
                            <th class="text-center">الوقت</th>
                            <th class="text-center">موافقة الموظف</th>
                            <th class="text-center">ملاحظات</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $x=0;
                        foreach ($all_operations[$sevice_details['id']] as $records):
                            $x++;
                            if($records->process==1){
                                $condition ='موافقة' ;
                            }elseif ($records->process==2){
                                $condition ='رفض' ;
                            }elseif ($records->process==3){
                                $condition ='الإطلاع' ;
                            }elseif ($records->process==4){
                                $condition ='تم الإعتماد';
                            }elseif ($records->process==5){
                                $condition ='التنفيذ' ;
                            }
                            ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php if(!empty($get_job_name[$records->service_file_from])) echo $get_job_name[$records->service_file_from][0]->name;?></td>
                                <td><?php if(!empty($get_job_name[$records->service_file_to])) echo $get_job_name[$records->service_file_to][0]->name;?></td>
                                <td><?php if(!empty($get_job_name[$records->service_file_to])) echo $get_job_name[$records->service_file_to][0]->name;?></td>
                                <td><?php echo date('Y-m-d h:i:sa',$records->date_s);?></td>
                                <td><?php echo $condition ;?></td>
                                <td><?php echo $records->reason;?></td>
                            </tr>
                        <? endforeach;?>
                        </tbody>
                    </table>
                <? endif;?>
            </div>
   </div>

</div>

<!--------------------------------------------------->

