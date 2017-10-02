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
                            <li class="active"><a href="<?php echo  base_url()."Family/update_father/".$result['mother_national_num_fk'];?>"> بيانات الأب </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_mother/".$result['mother_national_num_fk'];?>">البيانات الزوجة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_family_members/".$result['mother_national_num_fk'];?>">أفراد الأسرة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_house/".$result['mother_national_num_fk'];?>">بيانات السكن</a></li>
                            <li><a href="<?php echo  base_url()."Family/update_money/".$result['mother_national_num_fk'];?>"> البيانات المالية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_devices/".$result['mother_national_num_fk'];?>">  الأجهزة المنزلية</a></li>
                       	  <li><a href="<?php echo  base_url()."Family/researcher_opinion/".$result['mother_national_num_fk'];?>"> رأى الباحث الاجتماعى</a></li>
           
                        </ul>
                    </div>
                     
<!-------------------------------------------------------------------------------------------------------------------------->
<?php echo form_open_multipart('Family/update_father/'.$result['mother_national_num_fk'])?>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

          
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> الاسم الاول </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="f_first_name" class="no-padding r-inner-h4" value="<?php echo $result['f_first_name']?>" required="required"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> اسم الجد </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="f_grandfather_name" value="<?php echo $result['f_grandfather_name']?>" class="no-padding r-inner-h4" required="required"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> نوع الهوية </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select name="f_national_id_type" class="no-padding  form-control" >
                        <?php if($result['f_national_id_type']==1){
                            echo'
                        <option value="1" selected>الهوية الوطنية</option>
                        <option value="2"  >إقامة</option>
                        <option value="3"   >وثيقة</option>
                        <option value="4"   >جواز سفر</option>';
                         }elseif($result['f_national_id_type']==2){ echo'
                        <option value="1" >الهوية الوطنية</option>
                        <option value="2"  selected>إقامة</option>
                        <option value="3"   >وثيقة</option>
                        <option value="4"   >جواز سفر</option>';
                        }elseif($result['f_national_id_type']==3){
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
                    <input type="number" name="f_national_id" value="<?php echo $result['f_national_id']?>"  class="no-padding r-inner-h4" required="required"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> تاريخ الميلاد </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="date" name="f_birth_date" value="<?php echo date('Y-m-d',$result['f_birth_date']);?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>

            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> المهنة </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <select class="form-control no-padding " id="f_job" name="f_job" >
                        <?php if($result['f_job']==1){
                            echo'
                        <option value="1" selected>موظف حكومي</option>
                     <option value="2"  >موظف قطاع خاص</option>
                        <option value="3"  >اعمال حره</option>
                        <option value="4" >لا يعمل</option>';
                        }elseif($result['f_job']==2){ echo'
                        <option value="1"  >موظف حكومي</option>
                        <option value="2"  selected>موظف قطاع خاص</option>
                     <option value="3"  >اعمال حره</option>
                        <option value="4" >لا يعمل</option>';
                        }elseif($result['f_job']==3){
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
                    <select class="form-control no-padding " onchange="admSelectCheck(this);" name="f_death_id_fk">
                        <?php if($result['f_death_id_fk']==1){
                            echo'
                        
                       <option value="1" selected>طبيعية</option>
                        <option value="2">حادثة</option>
                        <option value="3">مرض</option>
                        <option value="4">مقتول</option>
                        <option value="5" id="admOption">اخرى</option>';
                        }elseif($result['f_death_id_fk']==2){ echo'
                        <option value="1" >طبيعية</option>
                        <option value="2" selected>حادثة</option>
                        <option value="3">مرض</option>
                        <option value="4">مقتول</option>
                        <option value="5" id="admOption">اخرى</option>';
                        }elseif($result['f_death_id_fk']==3){
                            echo'  <option value="1" >طبيعية</option>
                        <option value="2" >حادثة</option>
                        <option value="3" selected>مرض</option>
                        <option value="4">مقتول</option>
                        <option value="5" id="admOption">اخرى</option>';

                        }elseif($result['f_death_id_fk']==4){ echo'
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
                
                  <input type="number" name="f_child_num" value="<?php echo $result['f_child_num'];?>" class="no-padding r-inner-h4" />

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
                    <input type="text" class="no-padding r-inner-h4" value="<?php echo $result['f_father_name']?>"  name="f_father_name" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  إسم العائلة</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="f_family_name" value="<?php echo $result['f_family_name']?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  الجنسية    </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="f_nationality_id_fk">
                        <option>اختر</option>

                        <?php if(isset($nationality) && $nationality!=null):
                            foreach($nationality as $one_nationality):?>
                                <?php  if($one_nationality->id == $result['f_nationality_id_fk'] ){
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
                    <input type="text" class="no-padding r-inner-h4" value="<?php echo $result['f_national_id_place']?>" name="f_national_id_place"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  تاريخ الوفاة   </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="date" name="f_death_date" class="form-control" value="<?php echo date('Y-m-d',$result['f_death_date']);?>" required="required" />

                </div>
            </div>
            <div class="col-xs-12 red box" >
                <div class="col-xs-6">
                    <h4 class="r-h4">  مكان العمل   </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" class="no-padding r-inner-h4" value="<?php echo $result['f_job_place']?>" name="f_job_place" />

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  السبب   </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" class="no-padding r-inner-h4" value="<?php echo $result['f_death_reason_fk']?>" name="f_death_reason_fk" />
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">   عدد الزوجات   </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select class="form-control no-padding " name="f_wive_count">
                        <?php if($result['f_wive_count']==1){
                            echo'
                        <option value="1" selected>1</option>
                        <option value="2">2 </option>
                        <option value="3">3 </option>
                        <option value="4">4 </option>';
                        }elseif($result['f_wive_count']==2){ echo'
                        <option value="1">1</option>
                        <option value="2" selected > 2</option>
                        <option value="3">3 </option>
                        <option value="4">4 </option>';
                        }elseif($result['f_wive_count']==3){ echo'
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4 </option>';
                        }else{ echo'
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3" selected >4</option>';
                        } ?>
                    </select>
                </div>
            </div>

        </div>

             
<!--------------------------------------------------------------------------------------------------------------------------> 
               
                    </div>
                    <!--3 -->
                    <div class="col-xs-12 r-inner-btn">
                       
                        <div class="col-md-4 col-sm-3 col-xs-6 inner-details-btn">
                         
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                         <a  href="<?php  echo base_url().'Family/basic/'.$result['mother_national_num_fk']?>">
                            <button type="button" class="btn btn-info">عودة</button> </a>   
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                       <input type="submit" role="button" name="update_father" class="btn btn-blue btn-next"  value="التالى" />
                        </div>
                   
                        <div class="col-md-3"></div>
                    </div>
                    <!--3 -->
                </div>
            </div>
     <?php echo form_close()?>       


<script>

    $(document).ready(function() {
        $("#f_job").change(function() {
            var color = $(this).val();
            if (color == "1") {
                $(".box").not(".1").hide();
                $(".red").show();
            } else if (color == "2") {
                $(".box").not(".2").hide();
                $(".red").show();
            } else {
                $(".box").hide();
            }
        });


    });
</script>

<script>
    function admSelectCheck(nameSelect)
    {
        console.log(nameSelect);
        if(nameSelect){
            admOptionValue = document.getElementById("admOption").value;
            if(admOptionValue == nameSelect.value){
                document.getElementById("admDivCheck").style.display = "block";
            }
            else{
                document.getElementById("admDivCheck").style.display = "none";
            }
        }
        else{
            document.getElementById("admDivCheck").style.display = "none";
        }

    }
</script>
