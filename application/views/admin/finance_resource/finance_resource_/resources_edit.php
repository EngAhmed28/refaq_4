
<style>
	#myImg {
		border-radius: 5px;
		cursor: pointer;
		transition: 0.3s;
	}

	#myImg:hover {opacity: 0.7;}

	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
	}

	/* Modal Content (image) */
	.modal-content {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
	}

	/* Caption of Modal Image */
	#caption {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
		text-align: center;
		color: #ccc;
		padding: 10px 0;
		height: 150px;
	}

	/* Add Animation */
	.modal-content, #caption {
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
		from {-webkit-transform:scale(0)}
		to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
		from {transform:scale(0)}
		to {transform:scale(1)}
	}

	/* The Close Button */
	.close {
		position: absolute;
		top: 15px;
		right: 35px;
		color: #f1f1f1;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
	}

	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}

	/* 100% Image Width on Smaller Screens */
	@media only screen and (max-width: 700px){
		.modal-content {
			width: 100%;
		}
	}
</style>
<div class="r-program">
	<div class="container">
		<div class="col-sm-11 col-xs-12">
			<?php $this->load->view('admin/finance_resource/main_tabs'); ?>

			<div class="details-resorce">
				<div class="col-xs-12 r-inner-details">
					<?php  echo form_open_multipart('finance_resource/edit_donors/'.$results[0]->id)?>
					<?/* echo'<pre>';
					var_dump($results[0]->id);
					echo'</pre>';
					die  ;*/
					?>
					<div class="col-xs-12 ">

						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> نوع المتبرع </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select id="r-moasasa"  name="donor_type" onchange="change($('#r-moasasa').val());" <? echo $disabled;?>>
										<? $arr=array('إختر','فردي','مؤسسة');
										  for($s=0;$s<sizeof($arr);$s++):
											  $select='';
										  if($results[0]->donor_type ==$s){
											  $select='selected';
										  }
										?>
										  <option value="<? echo $s; ?>" <? echo $select;?>><? echo$arr[$s]; ?></option>
										<? endfor;?>

									</select>
								</div>
							</div>
						</div>
						<input type="hidden" name="types"  id="types" value="<? echo $results[0]->donor_type ;?>"/>
					</div>


					<?if($results[0]->donor_type ==1){
						$stylez= 'display: none;';
						$style= '';
					}elseif($results[0]->donor_type ==2){
						$style= 'display: none;';
						$stylez= '';
					}?>

                  <!--section1111-->
					<div class="col-xs-12 mo_types" style="<? echo $style;?>" >
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> اسم المستخدم </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="person_name" value="<? echo $results[0]->user_name; ?>" <? echo $readonly;?> <? echo $readonly;?>>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  كلمة المرور  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="password" class="r-inner-h4 " id="person_password" name="person_password"   />
								</div>
							</div>

							<div class="col-xs-12 r-input">
								<div class="col-xs-6">
									<h4 class="r-h4"> صفه الفرد </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="character_person" value="<? echo $results[0]->character_person;?>" <? echo $readonly;?>>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> وسيط الكفالة </h4>
								</div>
								<div class="col-xs-6 r-input">
									<div class="panel panel-default">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
											<div class="panel-heading">
												<h4 class="panel-title">
													<i class="indicator glyphicon glyphicon-chevron-down"></i>
												</h4>
											</div>
										</a>
										<div id="collapseOne" class="panel-collapse collapse ">
											<div class="panel-body">
												<h4 class="r-h4"> اسم الكافل   </h4>
												<input type="text" class="r-inner-h4 r-inside" name="donor_mediator_name" value="<? echo $results[0]->donor_mediator_name;?>" <? echo $readonly;?>>
												<h4 class="r-h4">  العلاقة   </h4>
												<input type="text" class="r-inner-h4 r-inside" name="donor_mediator_status" value="<? echo $results[0]->donor_mediator_status;?>" <? echo $readonly;?>>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> الاسم الاول </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="guaranty_name" value="<? echo $results[0]->guaranty_name;?>" <? echo $readonly;?>>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> اسم الجد </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="grand_father_name" value="<? echo $results[0]->grand_father_name;?>" <? echo $readonly;?>>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> الجنسية </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="nationality_id_fk" <? echo $disabled;?>>
										<option value="0"> - اختر - </option>
										<?php  foreach ($nationality as $record):
											$select='';
											if($results[0]->nationality_id_fk==$record->id){
											$select='selected';
											}?>
											<option value="<?php  echo $record->id;?>" <? echo $select;?>><?php  echo $record->title;?></option>
										<?php  endforeach;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> رقم الهوية </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" class="r-inner-h4" <? echo $readonly;?> name="national_id_fk" value="<? echo $results[0]->national_id_fk;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> المهنة </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="guaranty_job" <? echo $disabled;?>>
										<? $job_arr =array('إختر','موظف حكومي','موظف قطاع خاص','اعمال حرة','لا يعمل');
										for($d=0;$d<sizeof($job_arr);$d++):
										    $sec='';
											if($results[0]->guaranty_job == $d){
											 $sec='selected';
										 }
										?>

										<option value="<? echo $d;?>" <? echo $sec;?>><? echo $job_arr[$d];?></option>
							             <? endfor;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> المدينة </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="person_guaranty_city" <? echo $disabled;?>>
										<option value="0"> - اختر - </option>
										<?php
										foreach($main_depart as $record):
											$sec='';
											if($results[0]->guaranty_city == $record->id){
												$sec='selected';
											}?>
											<option value="<? echo $record->id; ?>" <? echo $sec;?>><? echo $record->main_dep_name ;?></option>
										<? endforeach;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> رقم الجوال </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" class="r-inner-h4 " <? echo $readonly;?> name="person_guaranty_mob" value="<? echo $results[0]->guaranty_mob;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">   البريد الالكتروني </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="email" class="r-inner-h4 "    <? echo $readonly;?> id="user_email" name="guaranty_email" value="<? echo $results[0]->guaranty_email;?>" />
								</div>
							</div>
						<?php
						if($results[0]->pay_method_id_fk >1):?>
							<div class="col-xs-12 r-resoursez" >
								<div class="col-xs-6">
									<h4 class="r-h4">  اسم البنك  </h4>
								</div>
								<div class="col-xs-6 r-input ">
									<select name="bank_code_fk">
										<option value="0"> - اختر - </option>
										<option>البنك العربي مكرر </option>
										<option> الرياض </option>
										<option> مصرف راجحي </option>
										<option> مصرف الانماء </option>
										<option> بنك الجزيرة </option>
										<option> بنك البلاد </option>
										<option> السعودي الفرنسي </option>
										<option> الاهلي التجاري</option>
										<option> ساب </option>
										<option> سامبا </option>
										<option> السعودي البريطاني </option>
										<option> السعودي الهولندي </option>
										<option> السعودي الاستثمار </option>
										<option> العربي الوطني</option>
										<option> الجزيرة مكرر</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 r-resoursez">
								<div class="col-xs-6">
									<h4 class="r-h4"> رقم حساب اضافي   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "   <? echo $readonly;?> name="bank_account_another_number" value="<? echo $results[0]->bank_account_another_number;?>">
								</div>
							</div>
							<div class="col-xs-12 r-resoursez">
								<div class="col-xs-6">
									<h4 class="r-h4">  اسم صاحب الحساب </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "  <? echo $readonly;?> name="bank_account_person_name" value="<? echo $results[0]->bank_account_person_name ;?>">
								</div>
							</div>

							<div class="col-xs-12 r-resoursez1" style="display: none;">
								<div class="col-xs-6">
									<h4 class="r-h4"> رقم العضوية    </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "   <? echo $readonly;?>name="membership_number" value="<? echo $results[0]->membership_number ;?>">
								</div>
							</div>
							<?   endif;?>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> ملاحظات </h4>
								</div>
								<div class="col-xs-6 r-input">
									<textarea class="r-textarea" name="guaranty_note"  <? echo $readonly;?>><? echo $results[0]->guaranty_note ;?></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4 ">  تاريخ الكفالة </h4>
								</div>
								<div class="col-xs-6 r-input ">
									<div class="docs-datepicker">
										<div class="input-group">
											<input type="text" class="form-control  <? echo $class;?>" name="guaranty_date" placeholder="شهر / يوم / سنة " value="<?  if(!empty($results[0]->guaranty_date)): echo date('m-d-Y',$results[0]->guaranty_date); endif;?>"  <? echo $readonly;?>>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 r-center-text2">
								<div class="col-xs-6">
									<h4 class="r-h4">   تأكيد  كلمة المرور  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="password" class="r-inner-h4 "  id="person_password_validate"  onkeyup="return valid_chik_one();"  />
									<span  id="validate_one" class="help-block"></span>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  حالة الكافل</h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="guaranty_status"  <? echo $disabled;?>>
										<? $arrays =array('إختر','علي قيد الحياه','متوفي');
										for($f=0;$f<sizeof($arrays);$f++):
											$select='';
											if($f == $results[0]->guaranty_status){
												$select='selected';
											}
										?>
										<option value="<? echo $f; ?>" <? echo $select;?> ><? echo $arrays[$f]; ?> </option>
										<? endfor;?>

									</select>
								</div>
							</div>

							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> اسم العائلة </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "  <? echo $readonly;?> name="family_name" value="<? echo $results[0]->family_name;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  الجنس   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="gender_id_fk"  <? echo $disabled;?>>
										<?  $gender_arr= array('إختر','ذكر','أنثي');
										for ($n=0;$n<sizeof($gender_arr);$n++):
											$sec='';
											if($n == $results[0]->gender_id_fk){
												$sec='selected';
											}?>
										<option value="<? echo $n;?>" <? echo $sec;?> > <? echo $gender_arr[$n]?></option>
											<? endfor;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  نوع الهوية   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="national_type_id_fk"  <? echo $disabled;?>>
										<?php
										$national_id_array =array('- اختر -','الهوية الوطنية','إقامة','وثيقة','جواز سفر');
										foreach ($national_id_array as $k=>$v):

											$sec='';
											if($k == $results[0]->national_type_id_fk){
												$sec='selected';
											}?>
											<option value="<?php  echo $k;?>" <? echo $sec;?>><?php  echo $v;?></option>
										<?php  endforeach;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  جهه العمل   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "  <? echo $readonly;?> name="guaranty_job_place" value="<? echo$results[0]->guaranty_job_place;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">   طريقه السداد   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select id="r-style-resours" name="person_pay_method_id_fk"  <? echo $disabled;?>
											onchange="go($('#r-style-resours').val());">
										<?  $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');

										for($a=0;$a<sizeof($pay);$a++):
											$sec='';
											if($a == $results[0]->pay_method_id_fk){
												$sec='selected';
											}?>
											<option value="<?echo $a;?>" <? echo $sec;?>><?echo $pay[$a];?></option>
										<?endfor?>

									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> رقم جوال اضافي  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" class="r-inner-h4 "  <? echo $readonly;?> name="person_guaranty_another_mob" value="<? echo$results[0]->guaranty_another_mob;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">   تاكيد البريد الاكتروني   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="email" class="r-inner-h4 "   <? echo $readonly;?> id="user_email_validate" name="guaranty_email" onkeyup="return validate_e();" value="<? echo $results[0]->guaranty_email;?>"/>
									<span  id="validate_E" class="help-block"></span>
								</div>
							</div>
							<input type="hidden" name="id"  id="id" value="<? echo $results[0]->pay_method_id_fk;?>"/>
							<? if($results[0]->pay_method_id_fk >1):?>
							<div class="col-xs-12 r-resoursez">
								<div class="col-xs-6">
									<h4 class="r-h4"> رقم حساب البنكي   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "  <? echo $readonly;?> name="bank_account_number" value="<? echo $results[0]->bank_account_number ;?>">
								</div>
							</div>
							<div class="col-xs-12 r-resoursez">
								<div class="col-xs-6">
									<h4 class="r-h4"> اسم البنك      </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="bank_code_fk">
										<option value="0"> - اختر - </option>
										<option>البنك العربي مكرر </option>
										<option> الرياض </option>
										<option> مصرف راجحي </option>
										<option> مصرف الانماء </option>
										<option> بنك الجزيرة </option>
										<option> بنك البلاد </option>
										<option> السعودي الفرنسي </option>
										<option> الاهلي التجاري</option>
										<option> ساب </option>
										<option> سامبا </option>
										<option> السعودي البريطاني </option>
										<option> السعودي الهولندي </option>
										<option> السعودي الاستثمار </option>
										<option> العربي الوطني</option>
										<option> الجزيرة مكرر</option>
									</select>
								</div>
							</div>
							  <? endif;?>
						</div>
					</div>
					<!--section1111-->
					<!--section222-->
					<div class="col-xs-12 mo_type r-inner-details" style="<? echo $stylez;?>">
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> 22اسم المستخدم </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "  <? echo $readonly;?> name="corporation_name" value="<? echo $results[0]->user_name;?>" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  كلمة المرور  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="password" class="r-inner-h4 " id="corporation_password" name="corporation_password" />
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  اسم المؤسسة    </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "  <? echo $readonly;?> name="corporation_guaranty_name" value="<? echo $results[0]->guaranty_name;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> المدينة </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="corporation_guaranty_city"  <? echo $disabled;?>>
										<option value="0"> - اختر - </option>
										<?php
										foreach($main_depart as $record):
											$sec='';
											if($results[0]->guaranty_city == $record->id){
												$sec='selected';
											}?>
											<option value="<? echo $record->id; ?>" <? echo $sec;?>><? echo $record->main_dep_name ;?></option>
										<? endforeach;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  رقم الجوال     </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" class="r-inner-h4 "  <? echo $readonly;?> name="corporation_guaranty_mob" value="<? echo $results[0]->guaranty_mob;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">البريد الالكتروني   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="email" class="r-inner-h4 "   <? echo $readonly;?> id="user_email" name="corporation_guaranty_email" value="<? echo $results[0]->guaranty_email;?>" />
								</div>
							</div>
							<input type="hidden" name="ids"  id="ids" value="<? echo $results[0]->pay_method_id_fk;?>"/>

							<? if($results[0]->pay_method_id_fk >1):?>
							<div class="col-xs-12 r-resoursezm">
								<div class="col-xs-6">
									<h4 class="r-h4">  اسم البنك  </h4>
								</div>
								<div class="col-xs-6 r-input ">
									<select name="bank_code_fk">
										<option value="0"> - اختر - </option>
										<option>البنك العربي مكرر </option>
										<option> الرياض </option>
										<option> مصرف راجحي </option>
										<option> مصرف الانماء </option>
										<option> بنك الجزيرة </option>
										<option> بنك البلاد </option>
										<option> السعودي الفرنسي </option>
										<option> الاهلي التجاري</option>
										<option> ساب </option>
										<option> سامبا </option>
										<option> السعودي البريطاني </option>
										<option> السعودي الهولندي </option>
										<option> السعودي الاستثمار </option>
										<option> العربي الوطني</option>
										<option> الجزيرة مكرر</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 r-resoursezm">
								<div class="col-xs-6">
									<h4 class="r-h4">  رقم حساب اضافي     </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "   <? echo $readonly;?> name="bank_account_another_number" value="<? echo $results[0]->bank_account_another_number;?>">
								</div>
							</div>
							<div class="col-xs-12 r-resoursezm">
								<div class="col-xs-6">
									<h4 class="r-h4"> اسم صاحب الحساب  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "  <? echo $readonly;?>  name="bank_account_person_name" value="<? echo $results[0]->bank_account_person_name;?>">
								</div>
							</div>
							<div class="col-xs-12 r-resoursezm1"  style="display: none;">
								<div class="col-xs-6">
									<h4 class="r-h4"> رقم العضوية  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "  <? echo $readonly;?>  name="membership_number" value="<? echo $results[0]->membership_number;?>">
								</div>
							</div>
							<? endif;?>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  رقم التصريح     </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" class="r-inner-h4 "  <? echo $readonly;?> name="permit_number" value="<? echo $results[0]->permit_number;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  العنوان  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "  <? echo $readonly;?> name="address" value="<? echo $results[0]->address;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> الرمز البريدي  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" class="r-inner-h4 "  <? echo $readonly;?> name="postal_code" value="<? echo $results[0]->postal_code;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> التحويلة </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "   <? echo $readonly;?> name="transformation" value="<? echo $results[0]->transformation;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> موقع المؤسسة   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "   <? echo $readonly;?> name="organization_web_site" value="<? echo $results[0]->organization_web_site;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">  المشاريع     </h4>
								</div>
								<div class="col-xs-6 r-input">
									<textarea class="r-textarea" name="projects"  <? echo $readonly;?> ><? echo $results[0]->projects;?></textarea>
								</div>
							</div>


						</div>
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12 r-center-text3">
								<div class="col-xs-6">
									<h4 class="r-h4">   تأكيد  كلمة المرور  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="password" class="r-inner-h4 " id="corporation_password_validate" onkeyup="return valid_chik_org();"/>
									<span  id="validate_org" class="help-block"></span>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4">   طريقه السداد   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select   <? echo $disabled;?> id="r-style-resours1" name="corporation_pay_method_id_fk" onchange="go_($('#r-style-resours1').val());">
										<?  $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
										for($a=0;$a<sizeof($pay);$a++):
											$sec='';
											if($a == $results[0]->pay_method_id_fk){
												$sec='selected';
											}?>
											<option value="<?echo $a;?>" <? echo $sec;?>><?echo $pay[$a];?></option>
										<?endfor?>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> الهاتف  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" class="r-inner-h4 "  <? echo $readonly;?> name="corporation_guaranty_another_mob" value="<? echo $results[0]->guaranty_another_mob;?>">
								</div>
							</div>
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4"> تأكيد البريد   الالكتروني   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="email" class="r-inner-h4 "   <? echo $readonly;?> id="user_email_validate" onkeyup="return validate_e();"  value="<? echo $results[0]->guaranty_email;?>"/>
									<span  id="validate_E" class="help-block"></span>
								</div>
							</div>
							<div class="col-xs-12 r-resoursezm">
								<div class="col-xs-6">
									<h4 class="r-h4"> رقم الحساب البنكي   </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 "  <? echo $readonly;?> name="bank_account_number" value="<? echo $results[0]->bank_account_number;?>">
								</div>
							</div>
							<div class="col-xs-12  r-resoursezm">
								<div class="col-xs-6">
									<h4 class="r-h4">  اسم البنك  </h4>
								</div>
								<div class="col-xs-6 r-input ">
									<select>
										<option value="0"> - اختر - </option>
										<option>البنك العربي مكرر </option>
										<option> الرياض </option>
										<option> مصرف راجحي </option>
										<option> مصرف الانماء </option>
										<option> بنك الجزيرة </option>
										<option> بنك البلاد </option>
										<option> السعودي الفرنسي </option>
										<option> الاهلي التجاري</option>
										<option> ساب </option>
										<option> سامبا </option>
										<option> السعودي البريطاني </option>
										<option> السعودي الهولندي </option>
										<option> السعودي الاستثمار </option>
										<option> العربي الوطني</option>
										<option> الجزيرة مكرر</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 r-center-text4">
								<div class="col-xs-6">
									<h4 class="r-h4">   رقم الصندوق  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" class="r-inner-h4 "   <? echo $readonly;?> name="box_number" value="<? echo $results[0]->box_number;?>">
								</div>
							</div>
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4"> فاكس </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="number" class="r-inner-h4 "  <? echo $readonly;?>  name="fax_number" value="<? echo $results[0]->fax_number;?>">
								</div>
							</div>
							<div class="col-xs-12 r-center-text1">
								<div class="col-xs-6">
									<h4 class="r-h4">   شروط الدعم  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<textarea class="r-textarea" name="condition_support"  <? echo $readonly;?> ><? echo $results[0]->condition_support;?></textarea>
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
							<th> ارفاق</th>
							<th>فتح الملف</th>

						</tr>
						<tr>
							<td>1</td>
							<td>صور الهوية الوطنية</td>
							<td style="width: 35%;">
								<div class="field">

									<input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
									<input type="file" name="<? echo $v;?>" class="file_input_with_replacement">
								</div>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>2</td>
							<td>بطاقة المصرف</td>
							<td style="width: 35%;">
								<div class="field">

									<input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
									<input type="file" name="bank_card_img" class="file_input_with_replacement">
								</div>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>3</td>
							<td>وصل إستقطاع البنك </td>
							<td style="width: 35%;">
								<div class="field">

									<input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
									<input type="file" name="bank_deduction_voucher_img" class="file_input_with_replacement">
								</div>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>4</td>
							<td>أخري</td>
							<td style="width: 35%;">
								<div class="field">

									<input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
									<input type="file" name="other_img" class="file_input_with_replacement">
								</div>
							</td>

							<td></td>
						</tr>
					</table>
					<div class="col-xs-12 r-xs">
						<h5 class="text-center">تفاصيل</h5>
						<div class="col-xs-12 r-del">
							<div class="col-xs-5">
								<h4> م : </h4>
								<h4> اسم الملف : </h4>
								<h4> ارفاق : </h4>
								<h4> فتح الملف : </h4>
							</div>
							<div class="col-xs-7">
								<h4>1 </h4>
								<h4> موظف استقبال</h4>
								<h4> موظف استقبال </h4>
								<h4>   </h4>
							</div>
						</div>
						<div class="col-xs-12 r-del">
							<div class="col-xs-5">
								<h4> م : </h4>
								<h4> اسم الملف : </h4>
								<h4> ارفاق : </h4>
								<h4> فتح الملف : </h4>
							</div>
							<div class="col-xs-7">
								<h4>2 </h4>
								<h4> موظف استقبال</h4>
								<h4> موظف استقبال </h4>
								<h4>   </h4>
							</div>
						</div>

						<div class="col-xs-12 r-del">
							<div class="col-xs-5">
								<h4> م : </h4>
								<h4> اسم الملف : </h4>
								<h4> ارفاق : </h4>
								<h4> فتح الملف : </h4>
							</div>
							<div class="col-xs-7">
								<h4>3</h4>
								<h4> موظف استقبال</h4>
								<h4> موظف استقبال </h4>
								<h4>   </h4>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xs-12 r-inner-btn">
					<div class="col-xs-3">
					</div>
					<?if($this->uri->segment(4) !='view'):?>
						<div class="col-xs-3">
							<input type="submit" role="button" name="save" value="حفظ" class="btn pull-right">
						</div>
					<? endif;?>
					<?php echo form_close()?>
					<div class="col-xs-5">
						<button class="btn pull-left" > عودة </button>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>





<script>
	function valid_chik_one()
	{
		if($("#person_password").val() == $("#user_pass_validate").val()){
			document.getElementById('validate_one').style.color = '#00FF00';
			document.getElementById('validate_one').innerHTML = 'كلمة المرور متطابقة';
		}else{
			document.getElementById('validate_one').style.color = '#F00';
			document.getElementById('validate_one').innerHTML = 'كلمة المرور غير متطابقة';
		}
	}

	function valid_chik_org()
	{
		if($("#corporation_password").val() == $("#corporation_password_validate").val()){
			document.getElementById('validate_org').style.color = '#00FF00';
			document.getElementById('validate_org').innerHTML = 'كلمة المرور متطابقة';
		}else{
			document.getElementById('validate_org').style.color = '#F00';
			document.getElementById('validate_org').innerHTML = 'كلمة المرور غير متطابقة';
		}
	}


	function validate_e()
	{alert($("#user_email_validate").val());
		if($("#user_email").val() == $("#user_email_validate").val()){
			document.getElementById('validate_E').style.color = '#00FF00';
			document.getElementById('validate_E').innerHTML = 'الايميل متطابق';
		}else{
			document.getElementById('validate_E').style.color = '#F00';
			document.getElementById('validate_E').innerHTML = 'الايميل غير متطابق';
		}
	}



	function as(selc){

		if (selc == 1) {
			$(".r-farde").show();
			$(".r-moasasa").hide();

		} else if (selc == 2) {
			$(".r-farde").hide();
			$(".r-moasasa").show();
		} else {
			$(".r-farde").show();
			$(".r-moasasa").hide();
		}
	}


</script>


   <script>
	   function go(valu) {
		   var dods = $("#id").val();
		   if (dods == 4) {
			   $(".r-resoursez").show();
			   $(".r-resoursez1").show();
		   } else if (dods != 4) {
			   $(".r-resoursez1").hide();
		   }
		   if (valu == 1) {
			   $(".r-resoursez").hide();
			   $(".r-resoursez1").hide();
		   } else if (valu == 2 || valu == 3 || valu == 5) {
			   $(".r-resoursez").show();
			   $(".r-resoursez1").hide();
		   } else if (valu == 4 ) {
			   $(".r-resoursez").show();
			   $(".r-resoursez1").show();
		   } else {
			   $(".r-resoursez").hide();
			   $(".r-resoursez1").hide();
		   }

	   }
   </script>
<script>
	function go_(valu) {
		var dods = $("#ids").val();
		if (dods == 4) {
			$(".r-resoursezm").show();
			$(".r-resoursezm1").show();
		} else if (dods != 4) {
			$(".r-resoursezm1").hide();
		}
		if (valu == 1) {
			$(".r-resoursezm").hide();
			$(".r-resoursezm1").hide();
		} else if (valu == 2 || valu == 3 || valu == 5) {
			$(".r-resoursezm").show();
			$(".r-resoursezm1").hide();
		} else if (valu == 4 ) {
			$(".r-resoursezm").show();
			$(".r-resoursezm1").show();
		} else {
			$(".r-resoursezm").hide();
			$(".r-resoursezm1").hide();
		}

	}
</script>


<script>

	   function change(datas){
		   var doda = $("#types").val();
		   if (doda ==1) {
			  $(".mo_types").show();
			   $(".mo_type").hide();
		   } else if (doda ==2) {
			   $(".mo_type").show();
			   $(".mo_types").hide();
		   }

		   if (datas == 1) {
			   $(".mo_types").show();
			   $(".mo_type").hide();

		   } else if (datas == 2) {
			   $(".mo_type").show();
			   $(".mo_types").hide();
		   }

	   }


   </script>

