	<?php $yes_no=array('اختر','نعم','لا');?>
      <?php  echo form_open_multipart('Family/update_one_member/'.$result['id'].'/'.$result['mother_national_num_fk'])?>        
            <div class="col-sm-11 col-xs-12">
                <!--  -->
                	<?php $this->load->view('admin/family/main_tabs'); ?>
                <!--  -->
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                      <div class="panel-heading">
                        <ul class="nav nav-tabs">
                          <li ><a href="<?php echo  base_url()."Family/basic/".$result['mother_national_num_fk'];?>"> البيانات الأساسية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_father/".$result['mother_national_num_fk'];?>"> بيانات الأب </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_mother/".$result['mother_national_num_fk'];?>">البيانات الزوجة </a></li>
                            <li class="active"><a href="<?php echo  base_url()."Family/update_family_members/".$result['mother_national_num_fk'];?>">أفراد الأسرة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_house/".$result['mother_national_num_fk'];?>">بيانات السكن</a></li>
                            <li><a href="<?php echo  base_url()."Family/update_money/".$result['mother_national_num_fk'];?>"> البيانات المالية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_devices/".$result['mother_national_num_fk'];?>">  الأجهزة المنزلية</a></li>
                         <li><a href="<?php echo  base_url()."Family/researcher_opinion/".$result['mother_national_num_fk'];?>"> رأى الباحث الاجتماعى</a></li>
           
                        </ul>
                    </div>
                     
<!-------------------------------------------------------------------------------------------------------------------------->
  
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الاسم الأول   </h4>
    </div>
    <div class="col-xs-6 r-input">
       <input type="text" class="no-padding r-inner-h4" name="member_name" value="<?php echo $result['member_name']?>"/>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الحالة الإجتماعية  </h4>
    </div>
    <div class="col-xs-6 r-input ">
     	<select  name="member_status" class="form-control no-padding " id="work">
							<?php $member_status_arr=array('اختر','أعزب','متزوج','مطلق','أرمل');?>
                          <?php for($x=0;$x<sizeof($member_status_arr);$x++):  $select='';
                          if($result['member_status'] == $x ){$select='selected';}?>
                            	<option value="<?php echo $x?>"  <?php echo $select?> ><?php echo $member_status_arr[$x];?> </option>
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
                          <?php for($x=0;$x<sizeof($member_gender_arr);$x++):  $select='';
                          if($result['member_gender'] == $x ){$select='selected';}?>
                            	<option value="<?php echo $x?>"  <?php echo $select?> ><?php echo $member_gender_arr[$x];?> </option>
					<?php endfor?>		
                            </select>
    </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4">  رقم الهوية  </h4>
    </div>
    <div class="col-xs-6 r-input ">
          <input type="text" class="no-padding r-inner-h4" name="member_card_num" value="<?php echo $result['member_card_num']?>"/>
       </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4">  الجنسية  </h4>
    </div>
    <div class="col-xs-6 r-input ">
        	<select name="member_nationality" class="form-control no-padding ">
			<option>اختر</option>
		<?php if(isset($nationalities) && $nationalities!=null):
         foreach($nationalities as $one_nationality): 
         $select='';if($one_nationality->id ==  $result['member_nationality']){$select ='selected';}?>
        	<option value="<?php echo $one_nationality->id; ?>" <?php echo $select;?> ><?php echo $one_nationality->title; ?> </option>
           <?php endforeach;endif ; ?> 
		</select>   
    </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4">  رقم الجوال </h4>
    </div>
    <div class="col-xs-6 r-input ">
                <input type="text" class="no-padding r-inner-h4" name="member_mob" value="<?php echo $result['member_mob']?>"/>
       </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الحالة الصحية</h4>
    </div>
    <div class="col-xs-3 r-input ">
      <select name="member_health_type" class="no-padding r-inner-h4" id="health_state">	
                            <option > إختر</option>
                            <?php $health_status_array =array('','جيد','معاق','مريض','متوفي');
						              $disabled='';if($result['member_health_type'] == 1){$disabled='disabled';} 
                                     for($k=1;$k<sizeof($health_status_array);$k++):
                                     $select='';if($k== $result['member_health_type']){$select='selected';}
                                  ?>
							<option value="<?php  echo $k;?>" <?php echo $select?>  ><?php  echo $health_status_array[$k];?></option>
							<?php  endfor;?>
							</select>
	</div>
    <div class="col-xs-3 ">
    	<input type="text" name="member_health_type_other" value="<?php echo $result['member_health_type_other'];?>" class="form-control  no-padding" placeholder=""  id="health_other" <?php echo $disabled?>  />
  </div>
    
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الدخل الشهرى </h4>
    </div>
    <div class="col-xs-6 r-input ">
         <input type="text" class="no-padding r-inner-h4" name="member_month_money" value="<?php echo $result['member_month_money']?>"/>
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
	
        <?php for($r=0;$r<sizeof($yes_no);$r++): $select='';if($r==$result['member_omra']){$select='selected';}?>
        	<option value="<?php echo $r;?>" <?php echo $select;?>   ><?php echo $yes_no[$r];?></option>
   <?php endfor?>
		</select>
    </div>
</div>

  <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4"> ملاحظات </h4>
        </div>
        <div class="col-xs-6 r-input">
            <textarea  name="member_note" class="r-textarea"><?php echo $result['member_note']?></textarea>
        </div>
    </div>


  <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4"> تعريف المدرسة </h4>
    </div>
    <div class="col-xs-3 r-input">
    <?php if($result['member_sechool_img'] !=0 && $result['member_sechool_img'] !=''){
        $out=$result['member_sechool_img'];
    }else {$out= "لا يوجد مرفقات";} ?>
        <input type="text" class="no-padding r-inner-h4" value="<?php echo $out?>" disabled="" />
    </div>
    <div class="col-xs-3 r-input">
     	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class="no-padding browse"/>
		<input type="file" id="browse" name="member_sechool_img" style="display: none" onChange="Handlechange();" class="no-padding"/>
											
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
   	<input type="date" name="member_birth_date" value="<?php echo date("Y-m-d",$result['member_birth_date'])?>" class="form-control col-xs-6 no-padding" required="required" />
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
          <?php for($x=0;$x<sizeof($job_titles_arr);$x++): $select='';if($x==$result['member_job']){$select="selected";}?>
            	<option value="<?php echo $x?>"  <?php echo $select ?> ><?php echo $job_titles_arr[$x];?></option>
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
          <?php for($x=0;$x<sizeof($member_card_type_arr);$x++): $select='';if($x==$result['$member_card_type_arr']){$select="selected";}?>
            	<option value="<?php echo $x?>"  <?php echo $select ?> ><?php echo $member_card_type_arr[$x];?></option>
	<?php endfor?>	   
          
    	</select>
    </div>
</div>
    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  المهارة   </h4>
    </div>
    <div class="col-xs-6 r-input">
          <input type="text" class="no-padding r-inner-h4" name="member_skill" value="<?php echo $result['member_skill']?>"/>
    </div>
</div>
    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  البريد الإلكترونى   </h4>
    </div>
    <div class="col-xs-6 r-input">
            <input type="text" class="no-padding r-inner-h4" name="member_email" value="<?php echo $result['member_email']?>"/>
    </div>
</div>

 <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  مدخن  </h4>
    </div>
    <div class="col-xs-6 r-input">
      <select name="member_smoken" class="form-control no-padding ">
	
         <?php for($r=0;$r<sizeof($yes_no);$r++): $select='';if($r==$result['member_smoken']){$select='selected';}?>
        	<option value="<?php echo $r;?>" <?php echo $select;?>   ><?php echo $yes_no[$r];?></option>
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
              $disabled='';if($result['member_activity_type'] == 2){$disabled='disabled';}
                 for($t=0;$t<sizeof($arr);$t++): $select='';if($t == $result['member_activity_type']){$select='selected';}?>
                  <option value="<?php echo $t?>" <?php echo $select?>    ><?php echo $arr[$t];?></option>
					<?php endfor;?>
                    		</select>
    </div>
     <div class="col-xs-3 r-input">
     	<input type="text" name="member_activity_type_other" value="<?php echo $result['member_activity_type_other'] ?>" class="form-control  no-padding" placeholder="أخري"  id="activity_type_other" <?php echo $disabled ?> />
     </div>
</div>

 <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  عدد الابناء </h4>
    </div>
    <div class="col-xs-6 r-input">
      <input type="number" class="" name="member_child_num" value="<?php echo $result['member_child_num'] ?>"/>
    </div>
</div>


    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">   هل ينفق على والدته  </h4>
    </div>
    <div class="col-xs-6 r-input">
      <select name="member_distracted_mother" class="form-control no-padding ">
	
        <?php for($r=0;$r<sizeof($yes_no);$r++): $select='';if($r==$result['member_distracted_mother']){$select='selected';}?>
        	<option value="<?php echo $r;?>" <?php echo $select;?>   ><?php echo $yes_no[$r];?></option>
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
	
        <?php for($r=0;$r<sizeof($yes_no);$r++): $select='';if($r==$result['member_hij']){$select='selected';}?>
        	<option value="<?php echo $r;?>" <?php echo $select;?>   ><?php echo $yes_no[$r];?></option>
   <?php endfor?>
		</select>
    </div>
</div>
    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  شهادة الميلاد   </h4>
    </div>
    <div class="col-xs-3 r-input">
    <?php if($result['member_birth_card_img'] !=0 && $result['member_birth_card_img'] !=''){
        $out=$result['member_birth_card_img'];
    }else {$out= "لا يوجد مرفقات";} ?>
        <input type="text" class="form-control  no-padding  " value="<?php echo $out?>" disabled="" />
    </div>
    <div class="col-xs-3 r-input">
     	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class="no-padding browse"/>
		<input type="file" id="browse" name="member_birth_card_img" style="display: none" onChange="Handlechange();" class="no-padding"/>
											
    </div>
</div>
</div>
                   
<!--------------------------------------------------------------------------------------------------------------------------> 
                      
                    </div>
                    <!--3 -->
                    <div class="col-xs-12 r-inner-btn">
                       
                       <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                           
                        </div>
                      
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                         <input  type="submit" name="edit_member"  class="btn center-block" value="تعديل" /> 
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                          <a  href="http://localhost/refaq/Family/update_family_members/01009428727">  <button type="button" class="btn btn-info">عودة</button>  </a>  
                        </div>
                        
                        <div class="col-md-3"></div>
                    </div>
                    <!--3 -->
                </div>
            </div>
 <?php echo form_close()?>             
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