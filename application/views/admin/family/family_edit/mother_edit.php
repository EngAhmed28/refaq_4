            <div class="col-sm-11 col-xs-12">
                <!--  -->
                	<?php $this->load->view('admin/family/main_tabs'); ?>
                <!--  -->
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                      <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li><a href="<?php echo  base_url()."Family/basic/".$result[0]->mother_national_num_fk;?>"> البيانات الأساسية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_father/".$result[0]->mother_national_num_fk;?>"> بيانات الأب </a></li>
                            <li class="active"><a href="<?php echo  base_url()."Family/update_mother/".$result[0]->mother_national_num_fk;?>">البيانات الزوجة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_family_members/".$result[0]->mother_national_num_fk;?>">أفراد الأسرة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_house/".$result[0]->mother_national_num_fk;?>">بيانات السكن</a></li>
                            <li><a href="<?php echo  base_url()."Family/update_money/".$result[0]->mother_national_num_fk;?>"> البيانات المالية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_devices/".$result[0]->mother_national_num_fk;?>">  الأجهزة المنزلية</a></li>
                       <li><a href="<?php echo  base_url()."Family/researcher_opinion/".$result[0]->mother_national_num_fk;?>"> رأى الباحث الاجتماعى</a></li>
           
                        </ul>
                    </div>
		<?php  echo form_open('Family/update_mother/'.$result[0]->mother_national_num_fk)?>                     
<!-------------------------------------------------------------------------------------------------------------------------->

	<div class="col-xs-12">
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">الاسم الأول</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" name="m_first_name" class="no-padding r-inner-h4"  value="<?php echo $result[0]->m_first_name; ?>"/>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">إسم الجد</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" name="m_grandfather_name" class="no-padding r-inner-h4"  value="<?php echo $result[0]->m_grandfather_name; ?>"/>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> تاريخ الميلاد</h4>
								</div>
								<div class="col-xs-6 r-input">
								
                                <div class="docs-datepicker">
										<div class="input-group">
											<input type="text" class="docs-date" name="m_birth_date"  value="<?php echo date('Y-m-d', $result[0]->m_birth_date); ?>" placeholder="شهر / يوم / سنة ">
										</div>
									</div>
                                
                                
										
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">الحالة الإجتماعية</h4>
								</div>
								<div class="col-xs-6 r-input">
									<select class="form-control" name="m_marital_status_id_fk" required="required">
										<option>اختر</option>
										<?php  $marital_status_array =array('1'=>'متزوجة','2'=>'مطلقة','3'=>'أرملة');
										foreach ($marital_status_array as $k =>$v):
											$select='';
											if($result[0]->m_marital_status_id_fk ==$k){
												$select='selected';
											}
											?>
											<option value="<?php  echo $k;?>" <?php echo $select ;?>><?php  echo $v;?></option>
										<?php  endforeach;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">رقم الهوية</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" name="m_national_id" class="no-padding r-inner-h4"  value="<?php  echo $result[0]->m_national_id; ?>" readonly=""/>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">الحالة الصحية</h4>
								</div>
								<div class="col-xs-6 r-input">
									<select class="form-control" name="m_health_status_id_fk" id="m_health_status_id_fk" onClick="check()">
										<option>اختر</option>
										<?php
										$health_status_array =array('1'=>'جيد','2'=>'معاق','3'=>'مريض','4'=>'متوفي');
										foreach ($health_status_array as $k=>$v):
											$select='';
											if($result[0]->m_health_status_id_fk ==$k){
												$select='selected';
											}
											?>
											<option value="<?php  echo $k;?>" <?php echo $select;?>><?php  echo $v;?></option>
										<?php  endforeach;?>
									</select>
								</div>
							</div>
							<?php
							$disabled_style='display:none;';
							$death_reason_style='display:none;';
	                       if($result[0]->m_health_status_id_fk == 2){
							 $disabled_style='';
						   }elseif($result[0]->m_health_status_id_fk ==4){
							   $death_reason_style='';

						   }

							?>
							<div class="col-xs-12" style="<?php echo $death_reason_style; ?>" id="death_reason">
								<div class="col-xs-6">
									<h4 class="r-h4">سبب الوفاة</h4>
								</div>
								<div class="col-xs-3 r-input">
								<select class="form-control" name="death_reason" id="death_reason_id">
									<option>اختر</option>
									<?php
									$death_reason_array =array('1'=>'طبيعية','2'=>'حادث','3'=>'مرض','4'=>'مقتول','0'=>'أخري');
									foreach ($death_reason_array as $k=>$v):
										$select ='';
										if($result[0]->death_reason == $k){
										 $select ='selected';
										}
										?>
										<option value="<?php  echo $k; ?>" <?php echo $select ;?>><?php  echo $v;?></option>
									<?php  endforeach;?>
								</select>
									<?php
									$other_death_reason_style ='disabled';
									$other_death_reason_val ='';
									if($result[0]->death_reason  == 0){
									$other_death_reason_style='';
									$other_death_reason_val = $result[0]->other_death_reason;
									}
									?>
								</div>
                              <div class="col-xs-3">
                              	<input type="text" name="other_death_reason"  class="no-padding r-inner-h4"  value="<?php echo $other_death_reason_val; ?>" placeholder="أخري"  id="death_reason_other"  <?php echo $other_death_reason_style; ?>>
							  </div>  
							</div>
							<?php
							$treatment_style='display:none;';
							if($result[0]->m_health_status_id_fk == 3){
								$treatment_style='';
							}
							?>
							<div class="col-xs-12" style="<?php echo $treatment_style; ?>" id="treatment">
								<div class="col-xs-6">
									<h4 class="r-h4">يتلقى علاج</h4>
								</div>
								<div class="col-xs-6 r-input">
									<select class="form-control " name="receive_treatment" id="receive_treatment" onClick="place()">
										<option>اختر</option>
										<?php
										if($result[0]->receive_treatment ==1 ):?>
											<option value="1" selected>نعم</option>
											<option value="2">لا</option>
										<?php elseif ($result[0]->receive_treatment ==2 ):?>
											<option value="1" >نعم</option>
											<option value="2" selected>لا</option>
										<?php else:?>
                                        	<option value="1" >نعم</option>
											<option value="2" >لا</option>
                                        <?php endif;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12" style="<?php echo $disabled_style; ?>" id="disabled">
								<div class="col-xs-6">
									<h4 class="r-h4">نوع الإعاقة</h4>
								</div>
								<?php
								$DisabilityType_val='';
								if($result[0]->m_health_status_id_fk == 2){
									$DisabilityType_val =$result[0]->DisabilityType;
								}

								?>
								<div class="col-xs-6 r-input">
									<input type="text" name="DisabilityType" id="DisabilityType" class="no-padding r-inner-h4"  value="<?php echo $DisabilityType_val; ?>"/>
								</div>
							</div>
							<div class="col-xs-12" style="<?php echo $disabled_style; ?>" id="disability_Place">
								<div class="col-xs-6">
									<h4 class="r-h4">جهة الدعم</h4>
								</div>
								<?php 
								$disability_Place_val='';
								if($result[0]->m_health_status_id_fk == 2){
									$disability_Place_val=$result[0]->disability_Place;
								}



								?>
								<div class="col-xs-6 r-input">
									<input type="text" name="disability_Place"  id="disability_Place" class="no-padding r-inner-h4"  value="<?php echo $disability_Place_val ;?>"/>
								</div>
							</div>
							<div class="col-xs-12" >
								<div class="col-xs-6">
									<h4 class="r-h4">المهنة</h4>
								</div>
								<div class="col-xs-3 r-input">
									<select  class="selectpicker  no-padding  form-control" data-show-subtext="true" data-live-search="true" name="m_job_id_fk" id="job"  onclick="other()" >
										<option>اختر</option>
										<?php
										foreach ($job_titles as $job):
											$select='';
											if($result[0]->m_job_id_fk ==$k  ){
												$select='selected';
											}
											?>
											?>
											<option value="<?php  echo $job->id; ?>"><?php  echo $job->title;?></option>
										<?php  endforeach;

										$select='';
										if($result[0]->m_job_id_fk == 0  ){
											$select='selected';
										}
										?>

										<option value="0" <?php echo $select ;?>>أخري</option>
									</select>
									<?php
									 $disabled ='disabled';
									 $val='';
									if($result[0]->m_job_id_fk  == 0){
										$disabled ='';
										$val=$result[0]->m_job_other;
									}

									?>
                                  </div>
                                  	<div class="col-xs-3 r-input">
									<input type="text" name="m_job_other"  class="no-padding r-inner-h4"  value="<?php echo $val;?>" placeholder="أخري"  id="jobb-input" <?php echo $disabled; ?> >
								</div>
							</div>
							<div class="col-xs-12" >
								<div class="col-xs-6">
									<h4 class="r-h4">المستوى التعليمى</h4>
								</div>
								<div class="col-xs-6 r-input">
									<select class="form-control no-padding " name="m_education_level_id_fk" id="educate" onclick="edu()">
										<option>اختر</option>
										<?php
										$education_level_array =array('1'=>'أمي','2'=>'محو أمية','3'=>'إبتدائي','4'=>'متوسط','5'=>'ثانوي','6'=>'دبلوم','7'=>'جامعي','8'=>'ماجستير','9'=>'دكتوراة','10'=>'خريج');
										foreach ($education_level_array as $k=>$v):
											$select='';
											if($result[0]->m_education_level_id_fk ==$k){
												$select='selected';
											}
											?>
											<option value="<?php  echo $k;?>" <?php echo $select; ?>><?php  echo $v;?></option>
										<?php  endforeach;?>
									</select>
							    </div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">الحالة الدراسية</h4>
								</div>
								<div class="col-xs-6 r-input">
								<select class="form-control no-padding " name="m_education_status_id_fk">
									<option>اختر</option>
									<?php
									$select1='';
									$select2='';
									$select3='';
									if($result[0]->m_education_status_id_fk ==1 ) {
										$select1 = 'selected';
									}elseif($result[0]->m_education_status_id_fk ==2){
										$select2 = 'selected';
									}elseif($result[0]->m_education_status_id_fk ==3){
										$select3 = 'selected';
									}
									?>
									<option value="1" <?php echo $select1; ?>>مستمرة</option>
									<option value="2" <?php echo $select2; ?> >منقطع</option>
									<option value="3" <?php echo $select3; ?> >متخرج</option>
								</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">أداء فريضة العمرة</h4>
								</div>
								<div class="col-xs-6 r-input">
									<select class="form-control no-padding " name="m_ommra">
										<option>اختر</option>
										<?
										if($result[0]->m_education_status_id_fk ==1 ):?>
											<option value="1" selected>نعم</option>
											<option value="2">لا</option>
										<?php elseif ($result[0]->m_education_status_id_fk ==2 ):?>
											<option value="1" >نعم</option>
											<option value="2" selected>لا</option>
										<?php endif;?>

									</select>
								</div>
							</div>
							<div class="col-xs-12" >
								<div class="col-xs-6">
									<h4 class="r-h4">رقم الجوال </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" name="m_mob" value="<?php echo $result[0]->m_mob;?>"  readonly="readonly" class="no-padding r-inner-h4" required="required"/>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">ترغب فى العمل</h4>
								</div>
								<div class="col-xs-6 r-input">
									<select class="form-control no-padding " name="m_want_work">
										<option>اختر</option>
										<?php
										if($result[0]->m_want_work ==1 ):?>
											<option value="1" selected>نعم</option>
											<option value="2">لا</option>
										<?php elseif ($result[0]->m_want_work ==2 ):?>
											<option value="1" >نعم</option>
											<option value="2" selected>لا</option>
										<?php endif;?>
									</select>
								</div>
							</div>
						</div>
						<!--------------------div2------------------------>
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4">إسم الأب</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" name="m_father_name" class="no-padding r-inner-h4" value="<?php echo $result[0]->m_father_name ;?>"/>
								</div>
							</div>
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4">إسم العائلة</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" name="m_family_name" value="<?php echo $result[0]->m_family_name;?>" class="no-padding r-inner-h4" />
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">الجنسية</h4>
								</div>

								<div class="col-xs-6 r-input">
									<select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="m_nationality">
										<option>اختر</option>
										<?php  foreach ($nationality as $record):
											$select ='';
											if($result[0]->m_nationality == $record->id){
												$select ='selected';
											}
											?>
											<option value="<?php  echo $record->id;?>" <?php echo $select; ?>><?php  echo $record->title;?></option>
										<?php  endforeach;?>
									</select>
								</div>
							</div>
								<div class="col-xs-12">
									<div class="col-xs-6">
										<h4 class="r-h4">السكن</h4>
									</div>
									<div class="col-xs-3 r-input">
										<select class="no-padding form-control " name="m_living_place_id_fk" id="living_place_id" onclick="live()">
											<option>اختر</option>
											<?php
											$living_place_array =array('1'=>'مع الأيتام في بيت الجد','2'=>'مع الأيتام في مسكن مستقل خاص بهم','3'=>'مع الأيتام في بيت زوجها','4'=>'مع الأيتام في بيت الجدة','0'=>'في مكان آخر');
											foreach ($living_place_array as $k=>$v):
												$select='';
												if($result[0]->m_living_place_id_fk ==$k){
													$select='selected';
												}
												?>
												<option value="<?php  echo $k; ?>" <?php echo $select; ?>><?php  echo $v;?></option>
											<?php  endforeach;?>
										</select>
										<?php
										$disabled ='disabled';
										$val='';
										if($result[0]->m_living_place_id_fk  == 0){
											$disabled ='';
											$val=$result[0]->m_living_place;
										}

										?>
                                          </div>
                                        	<div class="col-xs-3 r-input">
										<input type="text" name="m_living_place"  class="no-padding r-inner-h4 form-control"  value="<?php echo $val?>" placeholder="أخري"  id="living-place" <?php echo $disabled;?> >
									</div>
                                  
								</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">نوع الهوية</h4>
								</div>
								<div class="col-xs-6 r-input">
									<select class="form-control no-padding " name="m_national_id_type">
										<option>اختر</option>
										<?php
										$national_id_array =array('1'=>'الهوية الوطنية','2'=>'إقامة','3'=>'وثيقة','4'=>'جواز سفر');
										foreach ($national_id_array as $k=>$v):
											$select='';
											if($result[0]->m_national_id_type ==$k){
												$select='selected';
											}

											?>
											<option value="<?php  echo $k;?>" <?php echo $select;?>><?php  echo $v;?></option>
										<?php  endforeach;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4">المهارة</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" name="m_skill_name" value="<?php echo $result[0]->m_skill_name; ?>" class="no-padding r-inner-h4"/>
								</div>
							</div>
							<div class="col-xs-12 " style="<?php echo $disabled_style; ?>" id="disabled2">
								<div class="col-xs-6">
									<h4 class="r-h4">إعانة</h4>
								</div>
								<div class="col-xs-6 r-input">
									<select class="form-control no-padding " name="Disability_check"  id="Disability_check" onclick="get_type()" >
										<option>اختر</option>
										<?php 
										if($result[0]->Disability_check ==1 ):?>
											<option value="1" selected>نعم</option>
											<option value="2">لا</option>
										<?php elseif ($result[0]->Disability_check ==2 ):?>
											<option value="1" >نعم</option>
											<option value="2" selected>لا</option>
										<?php else:?>
                                        <option value="1" >نعم</option>
										<option value="2" >لا</option>
                                        <?php endif;?>
									</select>
								</div>
							</div>
							<?php
							$disability_amount_style='display:none;';
							$disability_amount_val=	'';
							if($result[0]->m_health_status_id_fk ==2){


							if($result[0]->Disability_check ==1){
							$disability_amount_style='';
								$disability_amount_val=$result[0]->disability_amount;
							}
							}
							?>
							<div class="col-xs-12 "  style="<?php echo $disability_amount_style ;?>" id="disability_amount">
								<div class="col-xs-6">
									<h4 class="r-h4">مبلغ الإعانة</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" name="disability_amount" id="disability_amount"  value="<?php echo $disability_amount_val;?>" class="no-padding r-inner-h4" />
								</div>
							</div>
							<?php
							$treatment_place_style = 'display:none;';
							$treatment_place_val = '';
							$treatment_reasons_style = 'display:none;';
							$treatment_reasons_val = '';
							if($result[0]->m_health_status_id_fk ==3){
								$treatment_place_style = 'display:none;';
								$treatment_place_val = '';
								$treatment_reasons_style = '';
								$treatment_reasons_val = $result[0]->treatment_reasons;
								if ($result[0]->receive_treatment == 1) {
									$treatment_place_style = '';
									$treatment_reasons_style = 'display:none;';
									$treatment_reasons_val = '';
									$treatment_place_val = $result[0]->treatment_place;
								}
							}
							?>
							<div class="col-xs-12 "  style="<?php echo $treatment_place_style ;?>" id="treatment_place">
								<div class="col-xs-6">
									<h4 class="r-h4">مكان العلاج</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" name="treatment_place"   value="<?php echo $treatment_place_val;?>" class="no-padding r-inner-h4" />
								</div>
							</div>
							<div class="col-xs-12 "  style="<?php echo $treatment_reasons_style; ?>" id="treatment_reasons">
								<div class="col-xs-6">
									<h4 class="r-h4">الأسباب</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" name="treatment_reasons"  value="<?php echo $treatment_reasons_val;?>"  class="no-padding r-inner-h4" />
								</div>
							</div>
							<?php 
							$death_date_style='display:none';
							if($result[0]->m_health_status_id_fk ==4){
								$death_date_style='';

							}
							?>
							<div class="col-xs-12 "  style="<?php echo $death_date_style;?>" id="death_date">
								<div class="col-xs-6">
									<h4 class="r-h4">تاريخ الوفاة</h4>
								</div>
								<div class="col-xs-6 r-input">
									<div class="docs-datepicker">
										<div class="input-group">
											<input type="text" class="form-control docs-date" name="death_date" placeholder="شهر / يوم / سنة ">
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 "  >
								<div class="col-xs-6">
									<h4 class="r-h4">الدخل الشهرى</h4>
								</div>
								<div class="col-xs-6 r-input">

									<?php
									$income_val= '';
									$inocme_dis='disabled="disabled"';
									if($result[0]->m_job_id_fk == 3){
									$income_val = $result[0]->m_monthly_income;
									$inocme_dis='';
									}

									?>
									<input type="text" name="m_monthly_income" id="mo-income"  value="<?php echo $income_val; ?>" class="no-padding r-inner-h4" <?php echo $inocme_dis; ?> />
								</div>
							</div>
							<div class="col-xs-12 "  >
								<div class="col-xs-6">
									<h4 class="r-h4">التخصص</h4>
								</div>
								<div class="col-xs-6 r-input">

									<?php
									$dis='disabled="disabled"';
									$edu_val= '';
									if($result[0]->m_education_level_id_fk == 7){
									 $dis ='';
									$edu_val= $result[0]->m_specialization ;
									}

									?>
									<input type="text" name="m_specialization" id="special"  value="<?php echo $edu_val;?>" class="no-padding r-inner-h4" <?php echo $dis;?> />
								</div>
							</div>
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4">ملتحقة بدار نسائية</h4>
								</div>
								<div class="col-xs-3 r-input">
									<select class="form-control no-padding " name="m_female_house_check" id="eldar">
										<option>اختر</option>
										<?php
										if($result[0]->m_female_house_check ==1 ):?>
											<option value="1" selected>نعم</option>
											<option value="2">لا</option>
										<?php elseif ($result[0]->m_female_house_check ==2 ):?>
											<option value="1" >نعم</option>
											<option value="2" selected>لا</option>
										<?php endif;?>
									</select>

									<?php
									$h_disabled='disabled="disabled"';
									$house_val= '';
									if($result[0]->m_female_house_check == 1){
										$h_disabled ='';
										$house_val= $result[0]->m_female_house_name ;
									}

									?>
                                    	</div>
                                   	<div class="col-xs-3 r-input">     
									<input type="text" name="m_female_house_name"    value="<?php echo $house_val; ?>" class="no-padding r-inner-h4" placeholder="اسم الدار"  id="dar-name" <?php echo $h_disabled;?> >
								</div>
							</div>
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4">أداء فريضة الحج</h4>
								</div>
								<div class="col-xs-6 r-input">
									<select class="form-control" name="m_hijri">
										<option>اختر</option>
										<?php
										if($result[0]->m_hijri ==1 ):?>
										<option value="1" selected>نعم</option>
										<option value="2">لا</option>
										<?php elseif ($result[0]->m_hijri ==2 ):?>
											<option value="1" >نعم</option>
											<option value="2" selected>لا</option>
										<?php endif;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12 "  >
								<div class="col-xs-6">
									<h4 class="r-h4">رقم جوال أخر</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" name="m_another_mob"  value="<?php echo $result[0]->m_another_mob;?>" class="no-padding r-inner-h4"/>
								</div>
							</div>
							<div class="col-xs-12 "  >
								<div class="col-xs-6">
									<h4 class="r-h4">البريد الإلكترونى</h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="email" name="m_email" value="<?php echo $result[0]->m_email;?>"  class="no-padding r-inner-h4" />
								</div>
							</div>

						</div>
							<!------------------------------end_div------------------------->
						</div>

             
<!--------------------------------------------------------------------------------------------------------------------------> 
                      
                    </div>
                    <!--3 -->
                    <div class="col-xs-12 r-inner-btn">
                       
                        <div class="col-md-4 col-sm-3 col-xs-6 inner-details-btn">
                          
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                        <a  href="<?php  echo base_url().'Family/update_father/'.$result[0]->mother_national_num_fk?>">
                            <button type="button" class="btn btn-info">عودة</button> </a> 
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                       	<input type="submit" role="button" name="update" class="btn btn-blue btn-next"  value="التالى" />
                        </div>
                      
                        <div class="col-md-3"></div>
                    </div>
                    <!--3 -->
                </div>
            </div>
 	<?php  echo form_close()?>
 <!--------------------------------------->

<script>

	document.getElementById("educate").onchange = function () {

		if (this.value == '7')
			document.getElementById("special").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("special").setAttribute("disabled", "disabled");
		}
	};

	document.getElementById("eldar").onchange = function () {

		if (this.value == 1)
			document.getElementById("dar-name").removeAttribute("disabled", "disabled");
		else{
			$('#m_female_house_name').val('');
			document.getElementById("dar-name").setAttribute("disabled", "disabled");
		}
	};

	document.getElementById("living_place_id").onchange = function () {

		if (this.value == 0)
			document.getElementById("living-place").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("living-place").setAttribute("disabled", "disabled");
		}
	};

	document.getElementById("death_reason_id").onchange = function () {

		if (this.value == 0)
			document.getElementById("death_reason_other").removeAttribute("disabled", "disabled");
		else{
			$('#death_reason_other').val('');
			document.getElementById("death_reason_other").setAttribute("disabled", "disabled");
		}
	};


	document.getElementById("job").onchange = function () {

		if (this.value == '0')
			document.getElementById("jobb-input").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("jobb-input").setAttribute("disabled", "disabled");
		}

		if (this.value == 3)
			document.getElementById("mo-income").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("mo-income").setAttribute("disabled", "disabled");
		}

		if (this.value != 0){
			$('#jobb-input').val('');
		}
		if (this.value != 3){
			$('#mo-income').val('');
		}
	};

	document.getElementById("Disability_check").onchange = function () {
		if (this.value == 2){

		$('#disability_Place').hide();

		}
	};
</script>

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
			//document.getElementById('disability_amount').style.display = 'none';
			$('#disability_Place').hide();
			$('#disability_amount').hide();
			$('#treatment_place').hide();
			$('#death_reason').hide();
			$('#death_date').hide();

		}else if(type == 2){
			$('#disabled').show();
			$('#disabled2').show();
			$('#treatment').hide();
			$('#treatment_place').hide();
			$('#death_reason').hide();
			$('#death_date').hide();
		}else if(type == 3){

			$('#treatment').show();
			$('#disabled').hide();
			$('#disabled2').hide();
			$('#disability_amount').hide();
			$('#disability_Place').hide();
			$('#disability_amount').hide();
			$('#death_reason').hide();
			$('#death_date').hide();

		}else if(type == 4){
			$('#death_reason').show();
			$('#death_date').show();
			$('#disabled').hide();
			$('#disabled2').hide();
			$('#treatment_reasons').hide();
			$('#disability_amount').hide();
			$('#treatment').hide();
			$('#disability_Place').hide();
			$('#disability_amount').hide();
			$('#treatment_place').hide();
		}else {

		}
	}



</script>

<script>
	function get_type() {           s
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

	function other() {
		if($('#job').val() != 0){
			$('#m_job_other').val('');
		}
	}
	function live() {
		if($('#living_place_id').val() != 0){
			$('#m_living_place').val('');
		}
	}

	function edu() {
		if($('#educate').val() != 7){
			$('#special').val('');
		}
	}

</script>
