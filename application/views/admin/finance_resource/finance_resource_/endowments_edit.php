

<div class="r-program">
	<div class="container">
		<div class="col-sm-11 col-xs-12">
			<?php $this->load->view('admin/finance_resource/main_tabs'); ?>
			<div class="details-resorce">
				<div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('finance_resource/edit_endowments/'.$results[0]->id)?>
					<div class="col-xs-12 ">
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> إسم الوقف </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="endowment_name"  value="<? echo $results[0]->endowment_name;?>" <? echo $readonly;?>>
								</div>
							</div>
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4 ">  بداية  إستقبال الوقف </h4>
								</div>
								<div class="col-xs-6 r-input ">
									<div class="docs-datepicker">
										<div class="input-group">
											<input type="text" class="form-control <? echo $class;?>" name="endowment_start"  value="<? echo date('m/d/Y',$results[0]->endowment_start);?>" <? echo $readonly;?> placeholder="شهر / يوم / سنة ">
										</div>
									</div>
								</div>
							</div>

								<div class="col-xs-12">
									<div class="col-xs-6">
										<h4 class="r-h4"> تكلفة الوقف </h4>
									</div>
									<div class="col-xs-6 r-input">
										<input type="text" class="r-inner-h4 price" name="endowment_cost" id="endowment_cost" value="<? echo $results[0]->endowment_cost;?>" onkeyup="getprice()" <? echo $readonly;?>>
									</div>
								</div>

							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> قيمة السهم </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 price" name="stock_cost" id="stock_cost"  value="<? echo $results[0]->stock_cost;?>" <? echo $readonly;?>>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> رقم حساب الوقف </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="endowment_account_num" id="endowment_account_num" value="<? echo $results[0]->endowment_account_num;?>" <? echo $readonly;?> <? echo $readonly;?>>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> عدد الشقق </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="houses_num" id="houses_num"  value="<? echo $results[0]->houses_num;?>" <? echo $readonly;?>>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> الصالات التجارية </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="commercial_Lounges" id="commercial_Lounges"  value="<? echo $results[0]->commercial_Lounges;?>" <? echo $readonly;?>>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> عدد الطوابق </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " <? echo $readonly;?> name="floor_num" id="floor_num"  value="<? echo $results[0]->floor_num;?>">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> الموظف المسئول </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="employee_in_charge" <? echo $disabled;?>>
										<option value="">إختر</option>
										<?php if(!empty($employee_in_charge)):
											foreach ($employee_in_charge as $record):
												$select='';
												if($results[0]->employee_in_charge ==$record->id){

													$select ='selected';
												}?>
												<option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->name;?></option>
										<?php endforeach; endif;?>

									</select>

								</div>
							</div>
							<div class="col-xs-12">
							<div class="col-xs-6">
									<h4 class="r-h4 "> جوال المسئول </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " <? echo $readonly;?> name="employee_mobile" id="employee_mobile"  value="<? echo $results[0]->employee_mobile;?>" >
								</div>
							</div>
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4 ">العنوان  </h4>
							</div>
							<div class="col-xs-6 r-input">
								<textarea class="r-textarea"  <? echo $readonly;?> name="address"> <? echo $results[0]->address;?></textarea>
							</div>
						</div>

						<!-- end div--></div>
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> نوع الوقف </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="endowment_type"  <? echo $disabled;?> >
										<?php  $arr=array('إختر','فندق','صالة تجارية','ارض','عمارة','بيت','شقة','محلات تجارية');
										for ($s=0;$s<sizeof($arr);$s++):
											$select='';
											if($results[0]->endowment_type ==$s){

												$select ='selected';
											}?>
										<option value="<?echo $s;?>" <? echo $select;?>><? echo $arr[$s];?></option>
										<?php endfor;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12 " >
									<div class="col-xs-6">
										<h4 class="r-h4 ">  إنتهاء تغطية الوقف </h4>
									</div>
									<div class="col-xs-6 r-input ">
										<div class="docs-datepicker">
											<div class="input-group">
												<input type="text"  <? echo $readonly;?> class="form-control docs-date" name="endowment_end"   value="<? echo date('m/d/Y',$results[0]->endowment_end);?>"  placeholder="شهر / يوم / سنة ">
											</div>
										</div>
									</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> عدد الأسهم </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" <? echo $readonly;?>  class="r-inner-h4 price" name="stock_num" id="stock_num"   value="<? echo $results[0]->stock_num;?>" onkeyup="getprice()" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> مساحة الأرض </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" <? echo $readonly;?> class="r-inner-h4 " name="Land_area"  value="<? echo $results[0]->Land_area;?>" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> إسم البنك </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="bank_id">
										<option value=""> - اختر - </option>
										<option value="1">البنك العربي مكرر </option>
										<option value="2"> الرياض </option>
										<option value="3"> مصرف راجحي </option>
										<option value="4"> مصرف الانماء </option>
										<option value="5"> بنك الجزيرة </option>
										<option value="6"> بنك البلاد </option>
										<option value="7"> السعودي الفرنسي </option>
										<option value="8"> الاهلي التجاري</option>
										<option value="9"> ساب </option>
										<option value="10"> سامبا </option>
										<option value="11"> السعودي البريطاني </option>
										<option value="12"> السعودي الهولندي </option>
										<option value="13"> السعودي الاستثمار </option>
										<option value="14"> العربي الوطني</option>
										<option value="15"> الجزيرة مكرر</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> عدد المحلات التجارية </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" <? echo $readonly;?> class="r-inner-h4 " name="shops_num"  value="<? echo $results[0]->shops_num;?>" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> مرافق أخري </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" <? echo $readonly;?> class="r-inner-h4 " name="other_facilities"  value="<? echo $results[0]->other_facilities;?>" >
								</div>
							</div>
							<div class="col-xs-12" style="margin-top: 40px">
								<div class="col-xs-6">
									<h4 class="r-h4 "> المسئول عن الوقف </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" <? echo $readonly;?> class="r-inner-h4 " name="responsible_for_endowment"  value="<? echo $results[0]->responsible_for_endowment;?>" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> إسم المدينة </h4>
								</div>
								<div class="col-xs-6 r-input">
								<select name="city" <? echo $disabled;?>>
									<option value="">إختر</option>
								<?php	foreach($main_depart as $record){
									$select='';
									if($results[0]->city ==$record->id){

										$select ='selected';
									}
									echo '<option value="'.$record->id.'" '.$select.' >'.$record->main_dep_name.'</option>';
									} ?>
								</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 ">ملاحظات  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<textarea class="r-textarea" name="notes" <? echo $readonly;?>> <? echo $results[0]->notes;?></textarea>

								</div>
							</div>
							<!--end div--></div>
					</div>
					<div class="col-xs-12 ">

						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
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
					<div class="col-xs-3">
					<a href="<?php echo base_url()?>finance_resource/all_endowments/?>"><button class="btn pull-left" > عودة </button></a>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>



<script>
	function getprice() {
		$('#stock_cost').val(0);
		if($("#guaranty_amount").val() !='') {
			var sum = (parseFloat($("#endowment_cost").val())) / parseFloat($("#stock_num").val());
			$('#stock_cost').val(sum);
		}
	}
</script>









