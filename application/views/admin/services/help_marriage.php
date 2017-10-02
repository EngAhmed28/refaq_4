<div class="col-sm-11 col-xs-12">

    <?php $this->load->view('admin/family/main_tabs'); ?>

    <div class="details-resorce">
        <?php $this->load->view('admin/services/serv_tabs');?>
        <div class="col-xs-12 r-inner-details">
            <?
            $sub_service='';
            $main_service='';
            $mother_national_id_fk='';
            if(!empty($_POST['sub_service'])):
                $sub_service = $_POST['sub_service'];
            endif;
            if(!empty($_POST['main_service'])):
                $main_service = $_POST['main_service'];
            endif;
            if(!empty($_POST['mother_national_id_fk'])):
                $mother_national_id_fk = $_POST['mother_national_id_fk'];
            endif;
            ?>
            <?php  echo form_open('Family/insert_services/'.$mother_national_id_fk.'/'.$main_service.'/'.$sub_service)?>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">   الاسم  </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <select name="help_marriage_family_id_fk">
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
                            <h4 class="r-h4">  مكان الزواج  </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <input type="text" class="r-inner-h4 " name="help_marriage_place">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">   رقم العقد  </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <input type="number" class="r-inner-h4 " name="help_marriage_contract__num">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> جهة اصدار العقد </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <input type="text" class="r-inner-h4 " name="help_marriage_issuer_of_contract">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  جنسية الزوجة   </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <select name="help_marriage_wife_nationalty_id_fk">
                                <option> - اختر - </option>
                                <?php  foreach ($nationality as $record):?>
                                    <option value="<?php  echo $record->id;?>"><?php  echo $record->title;?></option>
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
                                    ?>
                                    <option value="<?php  echo $k;?>"><?php  echo $v;?></option>
                                <?php  endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> رقم الجوال </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <input type="number" class="r-inner-h4 " name="help_marriage_mob">
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
                                    echo '<option value="'.$record->id.'">'.$record->main_dep_name.'</option>';
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
                                    <input type="text" class="form-control docs-date" name="help_marriage_date" placeholder="شهر / يوم / سنة ">
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
                                    <input type="text" class="form-control docs-date" name="help_marriage_contract_date" placeholder="شهر / يوم / سنة ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  قيمة المهر  </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <input type="number" class="r-inner-h4 " name="help_marriage_dowry_cost">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> رقم هوية الزوجة </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <input type="number" class="r-inner-h4 " name="help_marriage_wife_national_card_num">
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  الزواج لاول مرة  </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <form class="r-block">
                                <input type="radio" class="radio2" name="help_marriage_first_marriage" value="1"> نعم
                                <input type="radio" class="radio2" name="help_marriage_first_marriage" value="2"> لا
                            </form>
                        </div>
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
            <div class="col-xs-12 r-inner-btn r-new-button">
                <div class="col-xs-3" style="margin-right: 250px">
                    <input type="submit" role="button" name="add" class="btn pull-right"  value="حفظ">
                </div>
                <?php  echo form_close()?>
                <div class="col-xs-6">
                    <a href="<?php echo base_url()?>family/family_services"><button class="btn pull-left" > عودة </button></a>
                </div>
            </div>


</div>

<!--------------------------------------------------->

