
	<section class="family">
		<div class="container">

			<?php $this->load->view('web/family/tabs_link'); ?>

			<div class="content">
				<div class="basic-info active">
		<!----  MAIN ------------------>			
	 <!---------------------------------->
             <?php if(isset($member_data) && $member_data!=null): ?>
                          <table class="table table-bordered" style="width:100%">
                          <header>
                            <tr>
                              <th>م </th><th>الإسم</th> <th> إسم الام</th>
                              <th>رقم الهوية</th> <th>الجنس </th> <th>العمر</th> <th>المهنة </th><th> حذف </th> 
                            </tr>
                          </header>
                          <tbody>
           <?php  $x=1; foreach($member_data as $row):?>   
                          <tr>
                             <td></td>
                             <td><?php echo $row->member_name;  ?></td>  
                             <td><?php echo $mothers_data[0]->m_first_name." ".$mothers_data[0]->m_father_name." ".
                                             $mothers_data[0]->m_grandfather_name." ".$mothers_data[0]->m_family_name; ?></td>
                             <td><?php echo $row->member_card_num; ?></td>
                             <td><?php if($row->member_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                             <td>
                                 <?php  $barth=$row->member_birth_date;$today=time();
                                  $age=$today-$barth;
                                  $age=$age /(60*60 * 24 * 360 );
                                  $age=(int) $age;
                                  echo $age." عام";?>
                             </td>
                             <td>
                                 <?php $job_titles_arr=array('اختر','دون  سن الدراسة','طالب','لا يعمل',
                                                        'مزظف حكومة','موظف قطاع  خاص','أعمال حرة');
                                     echo $job_titles_arr[$row->member_job];  ?>
                             </td>
                             <td> <a href="<?php echo base_url().'Web/delete_member/'.$row->id?>"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
                          </tr>
                            <?php endforeach;?>
                          </tbody>
                          </table>
                    <?php endif;?>  
                           <!----------------------------------> 
   <?php  if(isset($all_links['houses']) && $all_links['houses']!=null){
           $ask_quetion='هل تريد إضافة أبناء أخرين'; ?>
    <?php }else{ $ask_quetion='هل يوجد لديك أبناء؟';}?> 
    
    				<div class="col-sm-6 col-sm-offset-3">
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding"><?php echo $ask_quetion; ?></label>
							<select class="col-xs-6 no-padding " id="children">
								<option>اختر</option>
								<option>نعم</option>
								<option>لا</option>
							</select>
						</div>
					</div>
<!------------------------------------------------------------------------------------------------>
<?php  echo form_open_multipart('Web/family_members')?>			
                    <div id="child-content">
					<h4 class=" sub-title col-xs-12">البيانات الأساسية</h4>
					<div class="clearfix"></div>
					<div class="col-sm-6">

						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">الاسم الأول</label>
							<input type="text" name="member_name" class="form-control col-xs-6"  required="required"/>
						</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">الحالة الإجتماعية</label>
					<select  name="member_status" class="col-xs-6 no-padding " >
							<?php $member_status_arr=array('اختر','أعزب','متزوج','مطلق','أرمل');?>
                          <?php for($x=0;$x<sizeof($member_status_arr);$x++):?>
                            	<option value="<?php echo $x?>"><?php echo $member_status_arr[$x];?></option>
					<?php endfor?>		
                            </select>
                    
                    	</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">الجنس</label>
							<select name="member_gender" class="col-xs-6 no-padding " required="required">
								<option value="0">اختر</option>
								<option value="1">ذكر</option>
								<option value="2">أنثى</option>
							</select>
						</div>
						
                       <div class="form-group">
						<label class="right main-label col-xs-6 no-padding"> رقم الهوية</label>
						<input type="number" name="member_card_num" class="form-control col-xs-6 no-padding"  required="required" />
					</div>
						
						<div class="clearfix"></div>



					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">إسم الأب</label>
                            <?php if(isset($father_table[0]->f_first_name) && $father_table[0]->f_first_name != null){
                                $total_name=$father_table[0]->f_first_name." ".
                                            $father_table[0]->f_father_name." ".
                                            $father_table[0]->f_grandfather_name.' '.$father_table[0]->f_family_name;}  ?>
                            
							<input type="text" value="<?php echo $total_name ?>" class="form-control col-xs-6 no-padding"  readonly=""/>
						</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">تاريخ الميلاد</label>
							<input type="date" name="member_birth_date" class="form-control col-xs-6 no-padding" required="required" />
					
						</div>

						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">المهنة</label>
							<select  name="member_job" class="col-xs-3 no-padding " id="work">
							<?php $job_titles_arr=array('اختر','دون  سن الدراسة','طالب','لا يعمل',
                                                        'مزظف حكومة','موظف قطاع  خاص','أعمال حرة');?>
                          <?php for($x=0;$x<sizeof($job_titles_arr);$x++):?>
                            	<option value="<?php echo $x?>"><?php echo $job_titles_arr[$x];?></option>
					<?php endfor?>		
                            </select>
                 <input type="text" name="member_job_place" disabled=""
                  class="form-control col-xs-3 no-padding" placeholder="مكان العمل" 
                  style="width: 25%" id="member_job_place"  />

						</div>
                         	<div class="form-group">
												<label class="right main-label col-xs-6 no-padding"> نوع الهوية</label>
												
												<select name="member_card_type" class="col-xs-6 no-padding "   required="required">
													<option value="0">اختر</option>
													<option value="1">الهوية الوطنية </option>
													<option value="2">إقامة</option>
													<option value="3">كارت عائلة</option>
                                                    <option value="4">جواز سفر</option>
												</select>
											</div>


					</div>
					<div class="clearfix"></div>

					<div class="col-x-12">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											بيانات إضافية
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<div class="col-sm-6">
<!--
<div class="form-group">
<label class="right main-label col-xs-6 no-padding">الجنسية</label>
<select name="member_nationality" class="col-xs-6 no-padding ">
	<option>اختر</option>
<?php if(isset($nationalities) && $nationalities!=null):
 foreach($nationalities as $one_nationality): ?>
	<option value="<?php echo $one_nationality->id; ?>"><?php echo $one_nationality->title; ?> </option>
   <?php endforeach;endif ; ?> 
</select>
</div>
-->

	<div class="form-group">
		<label class="right main-label col-xs-6 no-padding">إسم المدرسة </label>
    <input type="text" name="school_name" 
                  class="form-control col-xs-3 no-padding" placeholder="إسم المدرسة" 
                 id="school_name" />
    				
</div>


	<div class="form-group">
		<label class="right main-label col-xs-6 no-padding">نوع التعليم  </label>

                 
      	<select name="education_type" class="col-xs-6 no-padding " required="required">
								<option value="0">اختر</option>
								<option value="1">حكومي</option>
								<option value="2">أهلي</option>
							</select>
                 
                 
    				
</div>



	<div class="form-group">
		<label class="right main-label col-xs-6 no-padding">تكاليف الدراسة  </label>
    <input type="text" name="school_cost" 
                  class="form-control col-xs-3 no-padding" placeholder="تكاليف الدراسة " 
                 id="school_cost" />
    				
</div>



<div class="form-group">
<label class="right main-label col-xs-6 no-padding">الجنسية</label>
<select class="col-xs-3 no-padding " name="member_nationality" id="member_nationality" required="required">
	<option>اختر</option>

<?php if(isset($nationalities) && $nationalities!=null):
 foreach($nationalities as $one_nationality): ?>
	<option value="<?php echo $one_nationality->id; ?>"><?php echo $one_nationality->title; ?> </option>
   <?php endforeach;endif ; ?> 

</select>

<input type="text" name="nationality_other" value="" 
 class="form-control col-xs-4 no-padding"
 placeholder="أخري" style="width: 25%" id="nationality_other" disabled="" />

</div>                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
		<div class="form-group">
			<label class="right main-label col-xs-6 no-padding"> رقم الجوال</label>
			<input type="number" name="member_mob" class="form-control col-xs-6 no-padding" />
		</div>
	
                              
                         <div class="form-group">
						<label class="right main-label col-xs-6 no-padding">الحالة الصحية</label>
							<select name="member_health_type" class="col-xs-3 no-padding" id="health_state">	
                            <option > إختر</option>
                            <?php $health_status_array =array('1'=>'جيد','2'=>'معاق','3'=>'مريض','4'=>'متوفي');
						             foreach ($health_status_array as $k=>$v):	?>
							<option value="<?php  echo $k;?>"><?php  echo $v;?></option>
							<?php  endforeach;?>
							</select>
						<input type="text" name="member_health_type_other" class="form-control col-xs-3 no-padding" placeholder="" style="width: 25%" id="health_other"  />

					</div>        
                                    		<div class="form-group">
												<label class="right main-label col-xs-6 no-padding"> الدخل الشهرى </label>
												<input type="number" name="member_month_money" class="form-control col-xs-6 no-padding"  id="profession"  disabled=""/>
											</div>
											<div class="form-group">
												<label class="right main-label col-xs-6 no-padding">السكن</label>
												<select name="member_home_type" class="col-xs-6 no-padding ">
													<option>اختر</option>
													<option>مع الجد</option>
													<option>فى سكن مستقل</option>
													<option>مع الخالة</option>
												</select>
											</div>

											<div class="form-group">
												<label class="right main-label col-xs-6 no-padding">أداء فريضة العمرة</label>
												<select name="member_omra" class="col-xs-6 no-padding ">
													<option value="0">اختر</option>
													<option value="1"> نعم</option>
													<option value="2">لا</option>
												</select>
											</div>
											<div class="clearfix"></div>
										<div class="form-group">
												<label class="right main-label col-xs-6 no-padding">تعريف المدرسة</label>
                                                <input type="file" name="member_sechool_img" value="" /> 
												<!--	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class=" col-xs-3 no-padding browse"/>
												<input type="file" id="browse" name="member_sechool_img" style="display: none" onChange="Handlechange();" class=" col-xs-3 no-padding"/>
												 -->
                                          
											</div>
                                              



										</div>
										<div class="col-sm-6">
										
											<div class="form-group">
												<label class="right main-label col-xs-6 no-padding">المهارة</label>
												<input type="text" name="member_skill" class="form-control col-xs-6 no-padding"/>
											</div>
											<div class="form-group">
												<label class="right main-label col-xs-6 no-padding">البريد الإلكترونى</label>
												<input type="email" name="member_email" class="form-control col-xs-6 no-padding"/>
											</div>
										
                                            <div class="form-group">
						<label class="right main-label col-xs-6 no-padding">النشاط</label>
							<select name="member_activity_type" class="col-xs-3 no-padding" id="activity_type" >	
                            <option>اختر</option>
                            <option value="0">أخري</option>
                            <option value="1">تجارى</option>
							</select>
						<input type="text" name="member_activity_type_other" class="form-control col-xs-3 no-padding" placeholder="أخري" style="width: 25%" id="activity_type_other" disabled="" />

					</div>        
                                       
                                            
											<div class="form-group">
												<label class="right main-label col-xs-6 no-padding">هل يصرف على أمه</label>
												
												<select name="member_distracted_mother" class="col-xs-6 no-padding"">
												<option >اختر</option>
													<option value="1">نعم</option>
													<option value="2"> لا</option>

												</select>
											</div>
											<div class="form-group">
												<label class="right main-label col-xs-6 no-padding">أداة فريضة الحج</label>
												
												<select name="member_hij" class="col-xs-6 no-padding ">
												<option>اختر</option>
													<option value="1">نعم</option>
													<option value="2"> لا</option>

												</select>
											</div>

											<div class="form-group">
												<label class="right main-label col-xs-6 no-padding">شهادة الميلاد</label>
											<input type="file" name="member_birth_card_img" />
                                           
                                            <!--	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class=" col-xs-3 no-padding browse"/>
												<input type="file" id="browse" name="member_birth_card_img" style="display: none" onChange="Handlechange();" class=" col-xs-3 no-padding"/>
											 -->	

											</div>

										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						
						<div class="form-group">
						    <input  type="submit" class="btn btn-blue btn-add" name="add_one_member" value="حفظ الفرد"/> 
                        <a href="<?php echo  base_url()."web/house" ?>">	<input  type="submit" class="btn btn-blue btn-add" value="حفظ و إستمرار"/> </a>
                            <input  type="submit" class="btn btn-blue btn-add" value="السابق"/> 
                            </div>
					</div>


					</div>
<?php echo form_close()?> 
<!------------------------------------------------------------------------------------------------>
					<div class="col-sm-6" id="bottom-pag">
						<div class="form-group">
                    	<a href="<?php echo base_url().'Web/mother' ?>"> <button type="" class="btn btn-blue btn-previous" >السابق </button> </a>	
				        <a href="<?php echo  base_url()."Web/house" ?>"><button type="" class="btn btn-blue btn-next" >حفظ و إستمرار </button></a>
                        <a href="<?php echo  base_url()."Web/logout_Register" ?>"><button type="" class="btn btn-blue btn-close" >حفظ و إغلاق </button></a>
							</div>
					</div>
     <!----  MAIN ------------------>
				</div>
			</div>
	
     
    	</div>
	</section>







					<script>
                      	document.getElementById("member_nationality").onchange = function () {
		if (this.value == 20)
			document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("nationality_other").setAttribute("disabled", "disabled");
              $("#nationality_other").val("");
		}
	};
                    
                    
                    
                    
                    
						document.getElementById("children").onchange = function () {
							
							if (this.value == 'نعم')
							{
							document.getElementById("child-content").style.display='block';
							document.getElementById("bottom-pag").style.display='none';
							}
							else{
							document.getElementById("child-content").style.display='none';
							document.getElementById("bottom-pag").style.display='block';
							}
							
						};


						document.getElementById("work").onchange = function () {
							if (this.value >= 4){
								document.getElementById("profession").removeAttribute("disabled", "disabled");
                                document.getElementById("member_job_place").removeAttribute("disabled", "disabled");
                            }else{
								document.getElementById("profession").setAttribute("disabled", "disabled");
							    document.getElementById("member_job_place").setAttribute("disabled", "disabled");
                            }
						};

					



						function HandleBrowseClick()
						{
							var fileinput = document.getElementById("browse");
							fileinput.click();
						}
//activity_type_other
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
					</script>
