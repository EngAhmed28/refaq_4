<?php if(isset($all_links['mother']) && $all_links['mother']!=null){
 
    foreach($all_links['mother'] as  $key=>$value){
        $result[$key]=$all_links['mother'][$key];
    }
}else{
     foreach($all_field as $keys=>$value){
        $result[$all_field[$keys]]='';     
     }
     $result['m_birth_date']=time();   
    }
$arr_yes_no=array('','نعم','لا');
?>



<section class="family">
	<div class="container">
		<?php  $this->load->view('web/family/tabs_link'); ?>
		<?php  echo form_open('web/mother/',array('id'=>'form'))?>
		<div class="content">
			<div class="basic-info active">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">الاسم الأول</label>
						<input type="text" name="m_first_name" value="<?php echo $result['m_first_name']?>" class="form-control col-xs-6" required="required"/>
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">إسم الجد</label>
						<input type="text" name="m_grandfather_name" value="<?php echo $result['m_grandfather_name']?>"  class="form-control col-xs-6 no-padding" required="required"/>
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">تاريخ الميلاد</label>
						<input type="date" name="m_birth_date" value="<?php echo date("Y-m-d",$result['m_birth_date'])?>"  class="form-control col-xs-6 no-padding" required="required"/>
					</div>

					<div class="clearfix"></div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">الحالة الإجتماعية</label>
						<select class="col-xs-6 no-padding" name="m_marital_status_id_fk" required="required">
						
                        	<option>اختر</option>
							<?php  $marital_status_array =array('1'=>'متزوجة','2'=>'مطلقة','3'=>'أرملة');
							foreach ($marital_status_array as $k =>$v):
							 $selected='';if($k==$result['m_marital_status_id_fk']){$selected='selected';}   ?>
							<option value="<?php  echo $k;?>"  <?php echo $selected?>  ><?php  echo $v;?></option>
							<?php  endforeach;?>
						</select>
					</div>

					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">رقم الهوية</label>
						<input type="text" name="m_national_id" value="<?php echo $_SESSION['mother_national_num']?>"  class="form-control col-xs-6 no-padding" value="<?php echo $_SESSION['mother_national_num']?>" readonly=""/>
					</div>

					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">الحالة الصحية</label>
						<select class="col-xs-6 no-padding "  name="m_health_status_id_fk" id="m_health_status_id_fk" onClick="check()">
							<option>اختر</option>
							<?php 
							$health_status_array =array('1'=>'جيد','2'=>'معاق','3'=>'مريض','4'=>'متوفي');
							foreach ($health_status_array as $k=>$v):
						 $selected='';if($k==$result['m_health_status_id_fk']){$selected='selected';}	?>
							<option value="<?php  echo $k;?>"   <?php echo $selected?>  ><?php  echo $v;?></option>
							<?php  endforeach;?>
						</select>
					</div>
					<div class="form-group" style="display:none;" id="death_reason">
						<label class="right main-label col-xs-6 no-padding">سبب الوفاة</label>
						<select class="col-xs-3 no-padding " name="death_reason" id="death_reason_id">
							<option>اختر</option>
							<?php 
							$death_reason_array =array('1'=>'طبيعية','2'=>'حادث','3'=>'مرض','4'=>'مقتول','0'=>'أخري');
							foreach ($death_reason_array as $k=>$v):
								 $selected='';if($k==$result['death_reason']){$selected='selected';}	?>
								<option value="<?php  echo $k; ?>" <?php echo $selected?> ><?php  echo $v;?></option>
							<?php  endforeach;?>
						</select>
						<input type="text" name="other_death_reason" class="form-control col-xs-4 no-padding" placeholder="أخري" style="width: 25%" id="death_reason_other" disabled="" >
					</div>
					<div class="form-group"  style="display:none;" id="treatment">
						<label class="right main-label col-xs-6 no-padding">يتلقى علاج</label>
						<select class="col-xs-6 no-padding " name="receive_treatment" id="receive_treatment" onClick="place()">
							<option>اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['receive_treatment']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
                        </select>
					</div>

					<div class="form-group" style="display:none;" id="disabled">
						<label class="right main-label col-xs-6 no-padding">نوع الإعاقة</label>
						<input type="text" name="DisabilityType" value="<?php echo $result['DisabilityType']?>"  class="form-control col-xs-6 no-padding">
					</div>
					<div class="form-group" style="display:none;" id="disability_Place">
						<label class="right main-label col-xs-6 no-padding" >جهة الدعم</label>
						<input type="text" name="disability_Place"  value="<?php echo $result['disability_Place']?>"  class="form-control col-xs-6 no-padding" >
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">المهنة</label>
						<select class="col-xs-3 no-padding " name="m_job_id_fk" id="job" required="required">
							<option>اختر</option>
							<?php 
							foreach ($job_titles as $job):
							  $selected='';if($job->id==$result['m_job_id_fk']){$selected='selected';}	?>
								<option value="<?php  echo $job->id; ?>"  <?php echo $selected?> ><?php  echo $job->title;?></option>
							<?php  endforeach;?>
							<option value="0">أخري</option>
						</select>
						<input type="text" name="m_job_other"  value="<?php echo $result['m_job_other']?>" class="form-control col-xs-4 no-padding" placeholder="أخري" style="width: 25%" id="jobb-input" disabled="" >

					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">المستوى التعليمى</label>
						<select class="col-xs-6 no-padding " name="m_education_level_id_fk" id="educate">
							<option>اختر</option>

							<?php 
	$education_level_array =array('1'=>'أمي','2'=>'محو أمية','3'=>'إبتدائي','4'=>'متوسط','5'=>'ثانوي','6'=>'دبلوم','7'=>'جامعي','8'=>'ماجستير','9'=>'دكتوراة','10'=>'خريج');
							foreach ($education_level_array as $k=>$v):
							 $selected='';if($k==$result['m_education_level_id_fk']){$selected='selected';}	?>
								<option value="<?php  echo $k;?>"  <?php echo $selected?> ><?php  echo $v;?></option>
							<?php  endforeach;?>
						</select>

					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">الحالة الدراسية</label>
						<select class="col-xs-6 no-padding " name="m_education_status_id_fk">
							<option>اختر</option>
					<?php $arr_ed_state=array('','مستمرة','منقطع','متخرج');
                       for($r=1;$r<sizeof($arr_ed_state);$r++):
                         $selected='';if($r==$result['m_education_status_id_fk']){$selected='selected';}	?>	
							<option value="<?php  echo $r;?>"  <?php echo $selected?> ><?php  echo $arr_ed_state[$r];?></option>
							<?php  endfor;?>
						</select>

					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">أداء فريضة العمرة</label>
						<select class="col-xs-6 no-padding " name="m_ommra">
							<option>اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['m_ommra']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
						</select>

					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">رقم الجوال </label>
						<input type="number" name="m_mob" value="<?php  echo $_SESSION['mother_mob']?>"  readonly="readonly" class="form-control col-xs-6 no-padding" required="required"/>

					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">ترغب فى العمل </label>
						<select class="col-xs-6 no-padding " name="m_want_work">
							<option>اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['m_want_work']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
						</select>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<a href="<?php echo base_url().'Web/father' ?>"> <button type="button" class="btn btn-blue btn-previous" >السابق </button> </a>
                    
               <?php if(isset($all_links['mother']) && $all_links['mother']!=null):
                $input_name1='update';$input_name2='update_save';
                else:  $input_name1='add';$input_name2='add_save'; endif; ?>    
                      	<input type="submit"  name="<?php echo $input_name1?>" class="btn btn-blue btn-next"  value="حفظ و إستمرار" />
                    	<input type="submit"  name="<?php echo $input_name2?>" class="btn btn-blue btn-close"   value="حفظ و إغلاق "/>
					</div>

				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">إسم الأب</label>
						<input type="text" name="m_father_name" value="<?php echo $result['m_father_name']?>"  class="form-control col-xs-6 no-padding" required="required"/>
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">إسم العائلة</label>
						<input type="text" name="m_family_name" value="<?php echo $result['m_family_name']?>"  class="form-control col-xs-6 no-padding" required="required"/>
					</div>
                    
                    
                    
                    
            <!--        
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">الجنسية</label>
						<select class="col-xs-6 no-padding" name="m_nationality">
							<option>اختر</option>
							<?php  foreach ($nationality as $record):
                              $selected='';if($record->id==$result['m_nationality']){$selected='selected';}?>
							<option value="<?php  echo $record->id;?>" <?php echo $selected?>  ><?php  echo $record->title;?></option>
							<?php  endforeach;?>
						</select>
					</div>
                    
  -->
  
  
  
  <div class="form-group">
<label class="right main-label col-xs-6 no-padding">الجنسية</label>
<select class="col-xs-3 no-padding " name="m_nationality" id="m_nationality" required="required">
	<option>اختر</option>
	<?php  foreach ($nationality as $record):
                              $selected='';if($record->id==$result['m_nationality']){$selected='selected';}?>
							<option value="<?php  echo $record->id;?>" <?php echo $selected?>  ><?php  echo $record->title;?></option>
							<?php  endforeach;?>
</select>

<input type="text" name="nationality_other" value="<?php echo $result['nationality_other']?>" 
 class="form-control col-xs-4 no-padding"
 placeholder="أخري" style="width: 25%" id="nationality_other" disabled="" />

</div>
  
  

  
  
  
  
  
                   
                    
                    
                    
                    
                    
                    
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">السكن</label>
						<select class="col-xs-3 no-padding " name="m_living_place_id_fk" id="living_place_id" required="required">
							<option>اختر</option>
							<?php 
							$living_place_array =array('1'=>'مع الأيتام في بيت الجد','2'=>'مع الأيتام في مسكن مستقل خاص بهم','3'=>'مع الأيتام في بيت زوجها','4'=>'مع الأيتام في بيت الجدة','0'=>'في مكان آخر');
							foreach ($living_place_array as $k=>$v):
						  $selected='';if($k==$result['m_living_place_id_fk']){$selected='selected';}	?>
								<option value="<?php  echo $k; ?>"<?php echo $selected?>  ><?php  echo $v;?></option>
							<?php  endforeach;?>
						</select>
						<input type="text" name="m_living_place" value="<?php echo $result['m_living_place']?>"  class="form-control col-xs-4 no-padding" placeholder="أخري" style="width: 25%" id="living-place" disabled="" >
					</div>

					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">نوع الهوية</label>
						<select class="col-xs-6 no-padding " name="m_national_id_type">
							<option>اختر</option>
							<?php 
							$national_id_array =array('1'=>'الهوية الوطنية','2'=>'إقامة','3'=>'كارت عائلة','4'=>'جواز سفر');
							 foreach ($national_id_array as $k=>$v):
						 $selected='';if($k==$result['m_national_id_type']){$selected='selected';}	?>
							<option value="<?php  echo $k;?>" <?php echo $selected?>  ><?php  echo $v;?></option>
							<?php  endforeach;?>
						</select>

					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">المهارة</label>
						<input type="text" name="m_skill_name" value="<?php echo $result['m_skill_name']?>"  class="form-control col-xs-6 no-padding"/>
					</div>
					<div class="form-group" style="display:none;" id="disabled2">
						<label class="right main-label col-xs-6 no-padding" >إعانة</label>
						<select class="col-xs-6 no-padding " name="Disability_check"  id="Disability_check" onclick="get_type()" >
							<option>اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['Disability_check']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
						</select>
					</div>
					<div class="form-group" style="display:none;" id="disability_amount">
						<label class="right main-label col-xs-6 no-padding" >مبلغ الإعانة</label>
						<input type="text" name="disability_amount"  value="<?php echo $result['disability_amount']?>"  class="form-control col-xs-6 no-padding" />
					</div>
					<div class="form-group" style="display:none;" id="treatment_place">
						<label class="right main-label col-xs-6 no-padding" >مكان العلاج</label>
						<input type="text" name="treatment_place"  value="<?php echo $result['treatment_place']?>"  class="form-control col-xs-6 no-padding" />
					</div>
					<div class="form-group" style="display:none;" id="treatment_reasons">
						<label class="right main-label col-xs-6 no-padding" >الأسباب</label>
						<input type="text" name="treatment_reasons" value="<?php echo $result['treatment_reasons']?>"   class="form-control col-xs-6 no-padding" />
					</div>
					<div class="form-group" style="display:none;" id="death_date">
						<label class="right main-label col-xs-6 no-padding">تاريخ الوفاة</label>
						<input type="date" name="death_date" value="<?php echo $result['death_date']?>"  class="form-control col-xs-6 no-padding" />
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding" >الدخل الشهرى</label>
						<input type="text" name="m_monthly_income" value="<?php echo $result['m_monthly_income']?>"  id="mo-income" class="form-control col-xs-6 no-padding" disabled="disabled" />
					</div>

					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding" >التخصص</label>
						<input type="text" name="m_specialization" value="<?php echo $result['m_specialization']?>"  id="special" class="form-control col-xs-6 no-padding" disabled="disabled" />
					</div>

					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">ملتحقة بدار نسائية</label>
						<select class="col-xs-3 no-padding " name="m_female_house_check" id="eldar">
							<option>اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['m_female_house_check']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
						</select>
						<input type="text" name="m_female_house_name" value="<?php echo $result['m_female_house_name']?>"  class="form-control col-xs-6 no-padding" placeholder="اسم الدار" style="width: 25%" id="dar-name" disabled="" >
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">أداء فريضة الحج</label>
						<select class="col-xs-6 no-padding " name="m_hijri">
							<option>اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['m_hijri']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
						</select>

					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">رقم جوال أخر</label>
						<input type="number" name="m_another_mob" value="<?php echo $result['m_another_mob']?>"  class="form-control col-xs-6 no-padding"/>
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">البريد الإلكترونى</label>
						<input type="email" name="m_email" value="<?php echo $result['m_email']?>"  class="form-control col-xs-6 no-padding" />
					</div>


				</div>
				<?php  echo form_close()?>
			</div>
		</div>
	</div>
</section>
<script>



    	document.getElementById("m_nationality").onchange = function () {



		if (this.value == 20)
			document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("nationality_other").setAttribute("disabled", "disabled");
              $("#nationality_other").val("");
		}
	};
  



	document.getElementById("educate").onchange = function () {

		if (this.value >= 5 )
			document.getElementById("special").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("special").setAttribute("disabled", "disabled");
             $("#special").val(""); 
            
		}
	};

	document.getElementById("eldar").onchange = function () {

		if (this.value == 1 )
			document.getElementById("dar-name").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("dar-name").setAttribute("disabled", "disabled");
              $("#dar-name").val("");
		}
	};

	document.getElementById("living_place_id").onchange = function () {

		if (this.value == 0)
			document.getElementById("living-place").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("living-place").setAttribute("disabled", "disabled");
              $("#living-place").val("");
		}
	};

	document.getElementById("death_reason_id").onchange = function () {

		if (this.value == 0)
			document.getElementById("death_reason_other").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("death_reason_other").setAttribute("disabled", "disabled");
             $("#death_reason_other").val("");
		}
	};


	document.getElementById("job").onchange = function () {

		if (this.value == 0 )
			document.getElementById("jobb-input").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("jobb-input").setAttribute("disabled", "disabled");
            $("#jobb-input").val("");
		}

		if (this.value == 3)
			document.getElementById("mo-income").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("mo-income").setAttribute("disabled", "disabled");
            $("#mo-income").val("");
		}
	};

</script>
<!--------------------------------------------------------------------->
<script>
	function check() {
	var type =$('#m_health_status_id_fk').val();
	if(type == 1){
		$('#disabled').hide();
		$('#disabled2').hide();
		$('#treatment').hide();
		$('#death_reason').hide();
		$('#death_date').hide();
		$('#disabled').hide();
		$('#disabled2').hide();
		$('#treatment_reasons').hide();
	}else if(type == 2){
		 $('#disabled').show();
		 $('#disabled2').show();
		 $('#treatment').hide();
	 }else if(type == 3){

		$('#treatment').show();
		$('#disabled').hide();
		$('#disabled2').hide();
	}else if(type == 4){
		$('#death_reason').show();
		$('#death_date').show();
		$('#disabled').hide();
		$('#disabled2').hide();
		$('#treatment_reasons').hide();
	}else {

	}
	}



</script>

 <script>
	 function get_type() {
		 var type =$('#Disability_check').val();
		 if(type == 1) {
			 $('#disability_Place').show();
			 $('#disability_amount').show();
		 }else if (type == 2){
			 $('#disability_Place').hide();
			 $('#disability_amount').hide();
		 }else {

		 }

	 }
	 function place() {
		 var type =$('#receive_treatment').val();
		 if(type == 1) {
			 $('#treatment_place').show();
		 }else if (type == 2){
			 $('#treatment_reasons').show();
			 $('#treatment_place').hide();
		 }else {

		 }
	 }
	 </script>














