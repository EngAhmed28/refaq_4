<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> الاسم الاول </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="f_first_name" class="no-padding r-inner-h4" value="<?php echo $result_father['f_first_name']?>" required="required" readonly=""/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> اسم الجد </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="f_grandfather_name" value="<?php echo $result_father['f_grandfather_name']?>" class="no-padding r-inner-h4" readonly="" required="required"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> نوع الهوية </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select name="f_national_id_type" class="form-control" disabled="" >
                        <?php if($result_father['f_national_id_type']==1){
                            echo'
                        <option value="1" selected>الهوية الوطنية</option>
                        <option value="2"  >إقامة</option>
                        <option value="3"   >وثيقة</option>
                        <option value="4"   >جواز سفر</option>';
                         }elseif($result_father['f_national_id_type']==2){ echo'
                        <option value="1" >الهوية الوطنية</option>
                        <option value="2"  selected>إقامة</option>
                        <option value="3"   >وثيقة</option>
                        <option value="4"   >جواز سفر</option>';
                        }elseif($result_father['f_national_id_type']==3){
                            echo'
                        <option value="1" >الهوية الوطنية</option>
                        <option value="2"  >إقامة</option>
                        <option value="3"  selected >وثيقة</option>
                        <option value="4"   >جواز سفر</option>';

                        }else{ echo'
                        <option value="1" >الهوية الوطنية</option>
                        <option value="2"  >إقامة</option>
                        <option value="3"   >وثيقة</option>
                        <option value="4"   selected>جواز سفر</option>';
                        } ?>

                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> رقم الهوية </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" name="f_national_id" value="<?php echo $result_father['f_national_id']?>"  class="no-padding r-inner-h4" readonly="" required="required"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> تاريخ الميلاد </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="date" name="f_birth_date" value="<?php echo date('Y-m-d',$result_father['f_birth_date']);?>" class="no-padding r-inner-h4" readonly="" required="required"/>

                </div>
            </div>

            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> المهنة </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <select class="form-control" id="f_job" name="f_job" disabled="" >
                        <?php if($result_father['f_job']==1){
                            echo'
                        <option value="1" selected>موظف حكومي</option>
                     <option value="2"  >موظف قطاع خاص</option>
                        <option value="3"  >اعمال حره</option>
                        <option value="4" >لا يعمل</option>';
                        }elseif($result_father['f_job']==2){ echo'
                        <option value="1"  >موظف حكومي</option>
                        <option value="2"  selected>موظف قطاع خاص</option>
                     <option value="3"  >اعمال حره</option>
                        <option value="4" >لا يعمل</option>';
                        }elseif($result_father['f_job']==3){
                            echo'
                        <option value="1"  >موظف حكومي</option>
                        <option value="2"  >موظف قطاع خاص</option>
                        <option value="3"  selected >اعمال حره</option>
                         <option value="4" >لا يعمل</option>';

                        }else{ echo'
                        <option value="1"  >موظف حكومي</option>
                        <option value="2"  >موظف قطاع خاص</option>
                        <option value="3"  >اعمال حره</option>
                        <option value="4"   selected>لا يعمل</option>';
                        } ?>

                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> سبب الوفاة </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select class="form-control" onchange="admSelectCheck(this);" name="f_death_id_fk" disabled="">
                        <?php if($result_father['f_death_id_fk']==1){
                            echo'
                        
                       <option value="1" selected>طبيعية</option>
                        <option value="2">حادثة</option>
                        <option value="3">مرض</option>
                        <option value="4">مقتول</option>
                        <option value="5" id="admOption">اخرى</option>';
                        }elseif($result_father['f_death_id_fk']==2){ echo'
                        <option value="1" >طبيعية</option>
                        <option value="2" selected>حادثة</option>
                        <option value="3">مرض</option>
                        <option value="4">مقتول</option>
                        <option value="5" id="admOption">اخرى</option>';
                        }elseif($result_father['f_death_id_fk']==3){
                            echo'  <option value="1" >طبيعية</option>
                        <option value="2" >حادثة</option>
                        <option value="3" selected>مرض</option>
                        <option value="4">مقتول</option>
                        <option value="5" id="admOption">اخرى</option>';

                        }elseif($result_father['f_death_id_fk']==4){ echo'
                        <option value="1" >طبيعية</option>
                        <option value="2" >حادثة</option>
                        <option value="3">مرض</option>
                        <option value="4" selected>مقتول</option>
                        <option value="5" id="admOption">اخرى</option>';
                        }else{
                            echo'  <option value="1">طبيعية</option>
                        <option value="2">حادثة</option>
                        <option value="3">مرض</option>
                        <option value="4">مقتول</option>
                        <option value="5" id="admOption" selected>اخرى</option>';
                        } ?>

                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> عدد الأبناء </h4>
                </div>
                <div class="col-xs-6 r-input">
                       <input type="number" name="f_child_num" value="<?php echo $result_father['f_child_num'];?>" class="no-padding r-inner-h4" readonly=""/>

                </div>
            </div>
        </div>
<!----------------------------------------------------------->
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> إسم الأب </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" readonly="" class="no-padding r-inner-h4" value="<?php echo $result_father['f_father_name']?>"  name="f_father_name" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  إسم العائلة</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" readonly="" name="f_family_name" value="<?php echo $result_father['f_family_name']?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  الجنسية    </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="f_nationality_id_fk" disabled="">
                        <option>اختر</option>

                        <?php if(isset($nationality) && $nationality!=null):
                            foreach($nationality as $one_nationality):?>
                                <?php  if($one_nationality->id == $result_father['f_nationality_id_fk'] ){
                                    $sel ="selected";
                                }else{
                                    $sel='';
                                } ?>
                                <option value="<?php echo $one_nationality->id ?>" <?php echo $sel ?> ><?php echo $one_nationality->title;?></option>
                            <?php endforeach;endif;?>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> مصدر الهوية </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" readonly="" class="no-padding r-inner-h4" value="<?php echo $result_father['f_national_id_place']?>" name="f_national_id_place"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  تاريخ الوفاة   </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" readonly="" name="f_death_date" class="no-padding r-inner-h4" value="<?php echo date('Y-m-d',$result_father['f_death_date']);?>" required="required" />

                </div>
            </div>
            <div class="col-xs-12 red box" >
                <div class="col-xs-6">
                    <h4 class="r-h4">  مكان العمل   </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" disabled="" class="no-padding r-inner-h4" value="<?php echo $result_father['f_job_place']?>" name="f_job_place" />

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  السبب   </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" readonly="" class="no-padding r-inner-h4" value="<?php echo $result_father['f_death_reason_fk']?>" name="f_death_reason_fk" />
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">   عدد الزوجات   </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select class="form-control" name="f_wive_count" disabled="">
                        <?php if($result_father['f_wive_count']==1){
                        echo'
                             <option value="1" selected>1</option>
                             <option value="2">2</option>
                             <option value="3">3</option>
                             <option value="4">4</option>';
                        }elseif($result_father['f_wive_count']==2){
                        echo'<option value="1">1</option>
                             <option value="2" selected > 2</option>
                             <option value="3">3</option>
                             <option value="4">4</option>';
                        }elseif($result_father['f_wive_count']==3){ echo'
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3" selected>3</option>
                          <option value="4">4</option>';
                        }else{ echo'
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="3" selected>4</option>';
                        } ?>
                    </select>
                </div>
            </div>

        </div>
