	<?php $yes_no=array('اختر','نعم','لا');?>
      <?php  echo form_open_multipart('Family/add_member/'.$mother_national_num_fk)?>        
            <div class="col-sm-11 col-xs-12">
                <!--  -->
                	<?php $this->load->view('admin/family/main_tabs'); ?>
                <!--  -->
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                      <div class="panel-heading">
                        <ul class="nav nav-tabs">
                           <li ><a href="<?php echo  base_url()."Family/basic/".$mother_national_num_fk;?>"> البيانات الأساسية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_father/".$mother_national_num_fk;?>"> بيانات الأب </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_mother/".$mother_national_num_fk;?>">البيانات الزوجة </a></li>
                            <li class="active"><a href="<?php echo  base_url()."Family/update_family_members/".$mother_national_num_fk;?>">أفراد الأسرة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_house/".$mother_national_num_fk;?>">بيانات السكن</a></li>
                            <li><a href="<?php echo  base_url()."Family/update_money/".$mother_national_num_fk;?>"> البيانات المالية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_devices/".$mother_national_num_fk;?>">  الأجهزة المنزلية</a></li>
                      <li><a href="<?php echo  base_url()."Family/researcher_opinion/".$mother_national_num_fk;?>"> رأى الباحث الاجتماعى</a></li>
           
                        </ul>
                    </div>
                     
<!-------------------------------------------------------------------------------------------------------------------------->
  
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الاسم الأول   </h4>
    </div>
    <div class="col-xs-6 r-input">
       <input type="text" class="no-padding r-inner-h4" name="member_name" value=""/>
       <input type="hidden" name="mother_national_num_fk" value="<?php echo $mother_national_num_fk?>" />
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الحالة الإجتماعية  </h4>
    </div>
    <div class="col-xs-6 r-input ">
     	<select  name="member_status" class="form-control no-padding " id="work">
							<?php $member_status_arr=array('اختر','أعزب','متزوج','مطلق','أرمل');?>
                          <?php for($x=0;$x<sizeof($member_status_arr);$x++):?>
                            	<option value="<?php echo $x?>"  ><?php echo $member_status_arr[$x];?> </option>
					<?php endfor?>		
                            </select>
    </div>
</div>
 <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4">  الجنس  </h4>
    </div>
    <div class="col-xs-6 r-input">
        	<select  name="member_gender" class="form-control no-padding " id="work">
							<?php $member_gender_arr=array('اختر','ذكر','انثى');?>
                          <?php for($x=0;$x<sizeof($member_gender_arr);$x++):?>
                            	<option value="<?php echo $x?>"   ><?php echo $member_gender_arr[$x];?> </option>
					<?php endfor?>		
                            </select>
    </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4">  رقم الهوية  </h4>
    </div>
    <div class="col-xs-6 r-input ">
          <input type="number" class="no-padding r-inner-h4" name="member_card_num" value=""/>
       </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4">  الجنسية  </h4>
    </div>
    <div class="col-xs-6 r-input ">
        	<select name="member_nationality" class="form-control no-padding selectpicker"  data-show-subtext="true" data-live-search="true">
			<option>اختر</option>
		<?php if(isset($nationalities) && $nationalities!=null):
         foreach($nationalities as $one_nationality): ?>
        	<option value="<?php echo $one_nationality->id; ?>"  ><?php echo $one_nationality->title; ?> </option>
           <?php endforeach;endif ; ?> 
		</select>   
    </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4">  رقم الجوال </h4>
    </div>
    <div class="col-xs-6 r-input ">
                <input type="number" class="no-padding r-inner-h4" name="member_mob" value=""/>
       </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الحالة الصحية</h4>
    </div>
    <div class="col-xs-3 r-input ">
      <select name="member_health_type" class="form-control no-padding" id="health_state">	
                            <option > إختر</option>
                            <?php $health_status_array =array('1'=>'جيد','2'=>'معاق','3'=>'مريض','4'=>'متوفي');
						             foreach ($health_status_array as $k=>$v):?>
							<option value="<?php  echo $k;?>" ><?php  echo $v;?></option>
							<?php  endforeach;?>
							</select>
	</div>
    <div class="col-xs-3 ">
    	<input type="text" name="member_health_type_other" value="" class="form-control no-padding r-inner-h4" placeholder=""  id="health_other"  disabled=""  />
  </div>
    
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الدخل الشهرى </h4>
    </div>
    <div class="col-xs-6 r-input ">
         <input type="number" class="no-padding r-inner-h4" name="member_month_money" value=""/>
    </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> السكن  </h4>
    </div>
    <div class="col-xs-6 r-input ">
       <select name="member_home_type" class="form-control no-padding ">
		<option>اختر</option>
		<option>مع الجد</option>
		<option>فى سكن مستقل</option>
		<option>مع الخالة</option>
	</select>
    </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> أداء فريضة العمرة  </h4>
    </div>
    <div class="col-xs-6 r-input ">
        <select name="member_omra" class="form-control no-padding ">
	
        <?php for($r=0;$r<sizeof($yes_no);$r++):?>
        	<option value="<?php echo $r;?>"    ><?php echo $yes_no[$r];?></option>
   <?php endfor?>
		</select>
    </div>
</div>
  <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4"> ملاحظات </h4>
        </div>
        <div class="col-xs-6 r-input">
            <textarea  name="member_note" class="r-textarea"></textarea>
        </div>
    </div>
  <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4"> تعريف المدرسة </h4>
    </div>
    <div class="col-xs-3 r-input">
    	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class="no-padding browse"/>
		<input type="file" id="browse" name="member_sechool_img" style="display: none" onChange="Handlechange();" class="no-padding"/>
	</div>
    <div class="col-xs-3 r-input">
     										
    </div>
</div>


</div>
<!------------------------------>    
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">إسم الأب </h4>
    </div>
    <div class="col-xs-6 r-input">
    <?php  $name=$fathers[0]->f_first_name." ".$fathers[0]->f_father_name." ".$fathers[0]->f_grandfather_name;  ?>
          <input type="text" class="no-padding r-inner-h4" name="" value="<?php echo $name ; ?>"  readonly="" />
    </div>
</div>
 <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4"> تاريخ الميلاد  </h4>
    </div>
    <div class="col-xs-6 r-input">
       <div class="docs-datepicker">    
		<div class="input-group">
			<input type="text" class="docs-date" name="member_birth_date"  value="" placeholder="شهر / يوم / سنة ">
		</div>
	</div>
 
    </div>
</div>
<div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  المهنة   </h4>
    </div>
    <div class="col-xs-3 r-input">
       <select  name="member_job" class="form-control no-padding " id="career">
			<?php $job_titles_arr=array('اختر','دون  سن الدراسة','طالب','لا يعمل',
                                                        'مزظف حكومة','موظف قطاع  خاص','أعمال حرة');?>
                       <?php for($x=0;$x<sizeof($job_titles_arr);$x++):?>
            	<option value="<?php echo $x?>"><?php echo $job_titles_arr[$x];?></option>
	<?php endfor?>		
            </select>
    </div>
       <div class="col-xs-3 r-input">
            <input type="text" name="member_job_place" disabled="" class="form-control no-padding" placeholder="مكان العمل"  id="member_job_place"  />
          </div>
</div>
    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  نوع الهوية   </h4>
    </div>
    <div class="col-xs-6 r-input">
      	<select name="member_card_type" class="form-control no-padding " required="required">
    	<?php $member_card_type_arr=array('اختر','الهوية الوطنية','إقامة','وثيقة','جواز سفر');?>
          <?php for($x=0;$x<sizeof($member_card_type_arr);$x++): ?>
            	<option value="<?php echo $x?>"><?php echo $member_card_type_arr[$x];?></option>
	<?php endfor?>	   
          
    	</select>
    </div>
</div>
    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  المهارة   </h4>
    </div>
    <div class="col-xs-6 r-input">
          <input type="text" class="no-padding r-inner-h4" name="member_skill" value=""/>
    </div>
</div>
    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  البريد الإلكترونى   </h4>
    </div>
    <div class="col-xs-6 r-input">
            <input type="text" class="no-padding r-inner-h4" name="member_email" value=""/>
    </div>
</div>

    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  مدخن  </h4>
    </div>
    <div class="col-xs-6 r-input">
      <select name="member_smoken" class="form-control no-padding ">
	
        <?php for($r=0;$r<sizeof($yes_no);$r++):?>
        	<option value="<?php echo $r;?>" ><?php echo $yes_no[$r];?></option>
   <?php endfor?>
		</select>
    </div>
</div>


    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">   النشاط   </h4>
    </div>
    <div class="col-xs-3 r-input">
        	<select name="member_activity_type" class="form-control no-padding" id="activity_type" >	
             <option>اختر</option>
             <?php $arr=array('أخري','تجارى');
                 for($t=0;$t<sizeof($arr);$t++): $select='';?>
                  <option value="<?php echo $t?>" ><?php echo $arr[$t];?></option>
					<?php endfor;?>
                    		</select>
    </div>
     <div class="col-xs-3 r-input">
     	<input type="text" name="member_activity_type_other" value="" class="no-padding r-inner-h4 form-control" placeholder="أخري"  id="activity_type_other" />
     </div>
</div>

  <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  عدد الابناء </h4>
    </div>
    <div class="col-xs-6 r-input">
      <input type="number" class="no-padding r-inner-h4" name="member_child_num" value=""/>
    </div>
</div>

    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  هل ينفق على والدته   </h4>
    </div>
    <div class="col-xs-6 r-input">
      <select name="member_distracted_mother" class="form-control no-padding ">
	
        <?php for($r=0;$r<sizeof($yes_no);$r++):?>
        	<option value="<?php echo $r;?>" ><?php echo $yes_no[$r];?></option>
   <?php endfor?>
		</select>
    </div>
</div>
    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  أداة فريضة الحج   </h4>
    </div>
    <div class="col-xs-6 r-input">
       <select name="member_hij" class="form-control no-padding ">
	
        <?php for($r=0;$r<sizeof($yes_no);$r++):?>
        	<option value="<?php echo $r;?>" ><?php echo $yes_no[$r];?></option>
   <?php endfor?>
		</select>
    </div>
</div>
    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  شهادة الميلاد   </h4>
    </div>
    <div class="col-xs-3 r-input">
   	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class="no-padding browse"/>
		<input type="file" id="browse" name="member_birth_card_img" style="display: none" onChange="Handlechange();" class="no-padding"/>
		
     
    </div>
    <div class="col-xs-3 r-input">
     									
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
                         <input  type="submit" role="button" name="add_member" class="btn btn-blue btn-next" value="إضافة" /> 
                        </div>
                        <?php  echo form_close()?>   
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                          <a  href="<?php echo base_url().'Family/update_family_members/'.$mother_national_num_fk?>"><button type="button" class="btn btn-info">عودة</button> </a>  
                        </div>
                        
                        <div class="col-md-3"></div>
                    </div>
                    <!--3 -->
                </div>
            </div>
           
  <script>
  
  document.getElementById("health_state").onchange = function () {

		if (this.value == '1')
        	document.getElementById("health_other").setAttribute("disabled", "disabled");
			
		else{
		document.getElementById("health_other").removeAttribute("disabled", "disabled");
		}
	};
		
        	document.getElementById("activity_type").onchange = function () {

		if (this.value == '0')
			document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
		}
	};		
  	document.getElementById("career").onchange = function () {
							if (this.value >= 4){
                                document.getElementById("member_job_place").removeAttribute("disabled", "disabled");
                            }else{
							    document.getElementById("member_job_place").setAttribute("disabled", "disabled");
                                $("#member_job_place").val("");
                            }
						};
  
  	function HandleBrowseClick()
						{
							var fileinput = document.getElementById("browse");
							fileinput.click();
						}
  </script>     