<div class="col-sm-11 col-xs-12">

 <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-users" aria-hidden="true"></i></span> شؤون الاسرة </h4>
                    </div>
                    <div class="col-sm-3">
                        <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  : 27 / 5 / 2017</h5>
                    </div>
                </div>
 <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
<!------------------------------------------------------------------------------->
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الاسم الأول   </h4>
    </div>
    <div class="col-xs-6 r-input">
       <input type="text" readonly="" class="r-inner-h4" name="member_name" value="<?php echo $result['member_name']?>"/>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الحالة الإجتماعية  </h4>
    </div>
    <div class="col-xs-6 r-input ">
     	<select  name="member_status" disabled="" class="col-xs-6 no-padding " id="work">
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
        	<select  name="member_gender" disabled="" class="col-xs-6 no-padding " id="work">
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
          <input type="text"  readonly=""  class="r-inner-h4" name="member_card_num" value="<?php echo $result['member_card_num']?>"/>
       </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4">  الجنسية  </h4>
    </div>
    <div class="col-xs-6 r-input ">
        	<select name="member_nationality" disabled="" class="col-xs-6 no-padding ">
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
                <input type="text"  readonly=""  class="r-inner-h4" name="member_mob" value="<?php echo $result['member_mob']?>"/>
       </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الحالة الصحية</h4>
    </div>
    <div class="col-xs-3 r-input ">
      <select name="member_health_type" disabled="" class="no-padding" id="health_state">	
                            <option > إختر</option>
                            <?php $health_status_array =array('1'=>'جيد','2'=>'معاق','3'=>'مريض','4'=>'متوفي');
						              $disabled='';if($result['member_health_type'] == 1){$disabled='disabled';} 
                                     foreach ($health_status_array as $k=>$v):
                                     $select='';if($k== $result['member_health_type']){$select='selected';}
                                  ?>
							<option value="<?php  echo $k;?>" <?php echo $select?>  ><?php  echo $v;?></option>
							<?php  endforeach;?>
							</select>
	</div>
    <div class="col-xs-3 ">
    	<input type="text"  readonly=""  name="member_health_type_other" value="<?php echo $result['member_health_type_other'];?>" class="form-control  no-padding" placeholder="" style="width: 25%" id="health_other" <?php echo $disabled?>  />
  </div>
    
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> الدخل الشهرى </h4>
    </div>
    <div class="col-xs-6 r-input ">
         <input type="text"  readonly=""  class="r-inner-h4" name="member_month_money" value="<?php echo $result['member_month_money']?>"/>
    </div>
</div>
   <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4"> السكن  </h4>
    </div>
    <div class="col-xs-6 r-input ">
       <select name="member_home_type" disabled="" class="col-xs-6 no-padding ">
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
        <select name="member_omra" class="col-xs-6 no-padding" disabled="">
	
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
            <textarea  name="member_note"  readonly=""  class="r-textarea"><?php echo $result['member_note']?></textarea>
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
        <input type="text" class="form-control no-padding"  readonly=""  value="<?php echo $out?>" disabled="" />
    </div>
    <div class="col-xs-3 r-input">
     	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class="no-padding browse"/>
		<input type="file" id="browse" name="member_sechool_img" style="display: none" onChange="Handlechange();" class="no-padding"/>
											
    </div>
</div>


</div>
<!----------------------------------------------------------------------------------------->    
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">إسم الأب </h4>
    </div>
    <div class="col-xs-6 r-input">
    <?php  $name=$fathers[0]->f_first_name." ".$fathers[0]->f_father_name." ".$fathers[0]->f_grandfather_name;  ?>
          <input type="text" class="form-control" name=""  readonly=""  value="<?php echo $name ; ?>"  readonly="" />
    </div>
</div>
 <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4"> تاريخ الميلاد  </h4>
    </div>
    <div class="col-xs-6 r-input">
   	<input type="date" name="member_birth_date"  readonly=""  value="<?php echo date("Y-m-d",$result['member_birth_date'])?>" class="form-control col-xs-6 no-padding" required="required" />
    </div>
</div>
<div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  المهنة   </h4>
    </div>
    <div class="col-xs-6 r-input">
       <select  name="member_job" class="col-xs-6 no-padding " id="work" disabled="">
			<?php $job_titles_arr=array('اختر','طالب','مزظف حكومة','موظف قطاع  خاص','لا يعمل','أعمال حرة','دون  سن الدراسة');?>
          <?php for($x=0;$x<sizeof($job_titles_arr);$x++): $select='';if($x==$result['member_job']){$select="selected";}?>
            	<option value="<?php echo $x?>"  <?php echo $select ?> ><?php echo $job_titles_arr[$x];?></option>
	<?php endfor?>		
            </select>
    </div>
</div>
    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  نوع الهوية   </h4>
    </div>
    <div class="col-xs-6 r-input">
      	<select name="member_card_type" class="col-xs-6 no-padding " disabled="">
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
          <input type="text" class="r-inner-h4"  readonly=""  name="member_skill" value="<?php echo $result['member_skill']?>"/>
    </div>
</div>
    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  البريد الإلكترونى   </h4>
    </div>
    <div class="col-xs-6 r-input">
            <input type="text" class="r-inner-h4"   readonly=""  name="member_email" value="<?php echo $result['member_email']?>"/>
    </div>
</div>

 <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  مدخن  </h4>
    </div>
    <div class="col-xs-6 r-input">
      <select name="member_smoken" class="col-xs-6 no-padding" disabled="">
	
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
        	<select name="member_activity_type" class="col-xs-3 no-padding" id="activity_type" disabled="" >	
             <option>اختر</option>
             <?php $arr=array('أخري','تجارى');
              $disabled='';if($result['member_activity_type'] == 2){$disabled='disabled';}
                 for($t=0;$t<sizeof($arr);$t++): $select='';if($t == $result['member_activity_type']){$select='selected';}?>
                  <option value="<?php echo $t?>" <?php echo $select?>    ><?php echo $arr[$t];?></option>
					<?php endfor;?>
                    		</select>
    </div>
     <div class="col-xs-3 r-input">
     	<input type="text"  readonly=""  name="member_activity_type_other" value="<?php echo $result['member_activity_type_other'] ?>" class="form-control col-xs-3 no-padding" placeholder="أخري" style="width: 25%" id="activity_type_other" <?php echo $disabled ?> />
     </div>
</div>

 <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">  عدد الابناء </h4>
    </div>
    <div class="col-xs-6 r-input">
      <input type="number" class=""  readonly=""  name="member_child_num" value="<?php echo $result['member_child_num'] ?>"/>
    </div>
</div>


    <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4">   هل ينفق على والدته  </h4>
    </div>
    <div class="col-xs-6 r-input">
      <select name="member_distracted_mother" class="col-xs-6 no-padding" disabled="">
	
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
       <select name="member_hij" class="col-xs-6 no-padding" disabled="">
	
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
        <input type="text" class="form-control  no-padding"  readonly=""  value="<?php echo $out?>" disabled="" />
    </div>
    <div class="col-xs-3 r-input">
     	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class="no-padding browse"/>
		<input type="file" id="browse" name="member_birth_card_img" style="display: none" onChange="Handlechange();" class="no-padding"/>
											
    </div>
</div>
</div>
  <!-------------------------------------------------------------------------------->
	<div class="col-xs-12 r-inner-btn">

	        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
			    <a href="<?php echo  base_url()."Family/family_details/".$result['mother_national_num_fk'];?>"> 
                 <button type="button" class="btn btn-info">عودة</button>
			
			</div>
		
			<div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
			</div>

			<div class="col-md-3"></div>
		</div>



</div>
</div>
</div>