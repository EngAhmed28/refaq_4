<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
    <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> رقم حساب فاتورة الكهرباء </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" readonly="" name="h_electricity_account" class="no-padding r-inner-h4" value="<?php echo $result_house['h_electricity_account']?>" required="required"/>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> المدينة </h4>
            </div>
            <div class="col-xs-6 r-input">
                <select class="form-control" disabled="" name="h_city_id_fk" id="h_city_id_fk" onchange="return rent($('#h_city_id_fk').val());">
                    <option>اختر المدينة</option>
                    <?php
                    foreach($main_depart as $record):
                        $selected='';
                        if($record->id == $result_house['h_city_id_fk']){
                         $selected='selected';
                        } ?>
             <option value="<? echo $record->id; ?>" <? echo $selected; ?>><? echo $record->main_dep_name; ?></option>

                    <? endforeach;?>
                </select>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> الشارع </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" name="h_street" readonly="" value="<?php echo $result_house['h_street']?>" class="no-padding r-inner-h4" required="required"/>

            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> أقرب مدرسة </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" name="h_nearest_school" readonly="" value="<?php echo $result_house['h_nearest_school']?>" class="no-padding r-inner-h4" required="required"/>

            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> نوع السكن </h4>
            </div>
            <div class="col-xs-6 r-input">
                <select class="form-control" disabled="" id="h_house_type_id_fk" name="h_house_type_id_fk" >
                    <?php if($result_house['h_house_type_id_fk']==1){
                        echo'
         <option value="1" selected >دورين مسلح</option>
				<option value="2">دور مسلح</option>
				<option value="3">شقة</option>';
                    }elseif($result_house['h_house_type_id_fk']==2){ echo'
           <option value="1"  >دورين مسلح</option>
				<option value="2" selected>دور مسلح</option>
				<option value="3">شقة</option>';
                    }else{
                        echo'
            <option value="1"  >دورين مسلح</option>
				<option value="2" >دور مسلح</option>
				<option value="3" selected>شقة</option>';

                    } ?>

                </select>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> لون المنزل </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" name="h_house_color" readonly="" value="<?php echo $result_house['h_house_color']?>" class="no-padding r-inner-h4" required="required"/>

            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> عدد الغرف </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" name="h_rooms_account" readonly="" value="<?php echo $result_house['h_rooms_account']?>" class="no-padding r-inner-h4" required="required"/>

            </div>
        </div>
        <!----------------------------------------->
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> مقترض من البنك العقارى </h4>
            </div>
            <div class="col-xs-3 r-input">
                <select class="form-control" disabled="" id="loan"  name="h_borrow_from_bank">
                    <?php if($result_house['h_borrow_from_bank']==1){echo ' <option value="1" selected>نعم</option>
            <option value="2">لا</option>';
                    }else{echo ' <option value="1" >نعم</option>
            <option value="2" selected>لا</option>';}  ?>
                </select>

            </div>
            <div class="col-xs-3 r-input">
                <input type="number" name="h_borrow_remain" readonly="" value="<?php echo $result_house['h_borrow_remain']?>" class="no-padding r-inner-h4" placeholder="القيمة المتبقية"   id="loan-cost" >
            </div>

        </div>


        <!-------------------------------------->

        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> اتجاه المنزل </h4>
            </div>
            <div class="col-xs-6 r-input">
                <select class="form-control" name="h_house_direction" disabled="">
                    <?php if($result_house['h_house_direction']==1){

                        echo'  <option value="1" selected>شمال</option>
            <option value="2">جنوب</option>
            <option value="3">شرق</option>';
                    }elseif($result_house['h_house_direction']==2){
                        echo'  <option value="1" >شمال</option>
            <option value="2" selected>جنوب</option>
            <option value="3">شرق</option>';
                    }else{ echo'  <option value="1" >شمال</option>
            <option value="2" >جنوب</option>
            <option value="3" selected>شرق</option>';} ?>

                </select>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> الحالة </h4>
            </div>
            <div class="col-xs-6 r-input">
                <select class="form-control" name="h_house_status_id_fk" disabled="">
                    <?php if($result_house['h_house_status_id_fk']==1){

                        echo' 	<option value="1" selected>جيد</option>
				<option value="2">متوسط</option>
				<option value="3">يحتاج لترميم</option>';
                    }elseif($result_house['h_house_status_id_fk']==2){
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
                <input type="text" readonly="" class="no-padding r-inner-h4" value="<?php echo $result_house['h_health_number']?>"  name="h_health_number" required="required"/>
            </div>
        </div>


        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">  الحى</h4>
            </div>
            <div class="col-xs-6 r-input">
                <select class="form-control" name="h_hai_id_fk" id="optionearea2" disabled="">
                    <option>اختر الحي</option>

                    <?
                    if(!empty($sub_depart[$result_house['h_hai_id_fk']])):
                     foreach ($sub_depart[$result_house['h_hai_id_fk']] as $record):
                         $select='';
                         if($record->id ==$result_house['h_hai_id_fk']){
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
                <input type="text" readonly="" name="h_house_area" value="<?php echo $result_house['h_house_area']?>" class="no-padding r-inner-h4" required="required"/>

            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">  أقرب مسجد    </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" readonly="" name="h_mosque" value="<?php echo $result_house['h_mosque']?>" class="no-padding r-inner-h4" required="required"/>

            </div>
        </div> <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">  أقرب معلم    </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" readonly="" name="h_nearest_teacher" value="<?php echo $result_house['h_nearest_teacher']?>" class="no-padding r-inner-h4" required="required"/>

            </div>
        </div>

        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> ملكية السكن </h4>
            </div>
            <div class="col-xs-6 r-input">
                <select class="form-control"  name="h_house_owner_id_fk" id="buliding" disabled="">
                    <?php if($result_house['h_house_owner_id_fk']==1){

                        echo' 	<option value="1" selected>ملك</option>
				<option value="2">ايجار</option>
				<option value="3">هبه</option>';
                    }elseif($result_house['h_house_status_id_fk']==2){
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
                <input type="text" readonly=""  name="h_rent_amount"  class="no-padding r-inner-h4" value="<?php echo $result_house['h_rent_amount']?>" id="buliding-cost"/>

            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">  عدد دورات المياه   </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" readonly="" class="no-padding r-inner-h4" value="<?php echo $result_house['h_bath_rooms_account']?>" name="h_bath_rooms_account"/>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">  مساحة البناء   </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" readonly="" class="no-padding r-inner-h4" value="<?php echo $result_house['h_house_size']?>" name="h_house_size"/>

            </div>
        </div>

        <!----------------------------------------->
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> قرض ترميم من بنك التسليف </h4>
            </div>
            <div class="col-xs-3 r-input">
                <select class="form-control" disabled="" id="loan_restoration"  name="h_loan_restoration">
                    <?php if($result_house['h_loan_restoration']==1){
                        echo ' <option value="1" selected>نعم</option>
                        <option value="2">لا</option>';
                    }else{echo ' 
                       <option value="1" >نعم</option>
                       <option value="2" selected>لا</option>';}  ?>
                </select>

            </div>
            <div class="col-xs-3 r-input">
                <input type="number" readonly="" name="h_loan_restoration_remain" value="<?php echo $result_house['h_loan_restoration_remain']?>" class="form-control col-xs-3 no-padding" placeholder="القيمة المتبقية"   id="h_loan" >
            </div>

        </div>
        
        </div>