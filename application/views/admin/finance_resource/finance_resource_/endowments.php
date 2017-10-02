

<div class="r-program">
	<div class="container">
		<div class="col-sm-11 col-xs-12">
			<?php $this->load->view('admin/finance_resource/main_tabs'); ?>

			<div class="details-resorce">
				<div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('finance_resource/add_endowments')?>
					<div class="col-xs-12 ">
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> إسم الوقف </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="endowment_name" >
								</div>
							</div>
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4 ">  بداية  إستقبال الوقف </h4>
								</div>
								<div class="col-xs-6 r-input ">
									<div class="docs-datepicker">
										<div class="input-group">
											<input type="text" class="form-control docs-date" name="endowment_start" placeholder="شهر / يوم / سنة ">
										</div>
									</div>
								</div>
							</div>

								<div class="col-xs-12">
									<div class="col-xs-6">
										<h4 class="r-h4"> تكلفة الوقف </h4>
									</div>
									<div class="col-xs-6 r-input">
										<input type="text" class="r-inner-h4 price" name="endowment_cost" id="endowment_cost" onkeyup="getprice()">
									</div>
								</div>

							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> قيمة السهم </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 price" name="stock_cost" id="stock_cost" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> رقم حساب الوقف </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="endowment_account_num" id="endowment_account_num">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> عدد الشقق </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="houses_num" id="houses_num" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> الصالات التجارية </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="commercial_Lounges" id="commercial_Lounges" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> عدد الطوابق </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="floor_num" id="floor_num">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> الموظف المسئول </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="employee_in_charge">
										<option value="">إختر</option>
										<?php if(!empty($employee_in_charge)):
											foreach ($employee_in_charge as $record):?>
												<option value="<? echo $record->id;?>"><? echo $record->name;?></option>
										<?php endforeach; endif;?>

									</select>

								</div>
							</div>
							<div class="col-xs-12">
							<div class="col-xs-6">
									<h4 class="r-h4 "> جوال المسئول </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="employee_mobile" id="employee_mobile" >
								</div>
							</div>
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4 class="r-h4 ">العنوان  </h4>
							</div>
							<div class="col-xs-6 r-input">
								<textarea class="r-textarea" name="address"></textarea>
							</div>
						</div>

						<!-- end div--></div>
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> نوع الوقف </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="endowment_type"  >
										<?php  $arr=array('إختر','فندق','صالة تجارية','ارض','عمارة','بيت','شقة','محلات تجارية');
										for ($s=0;$s<sizeof($arr);$s++):?>
										<option value="<?echo $s;?>"><? echo $arr[$s];?></option>
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
												<input type="text" class="form-control docs-date" name="endowment_end"    placeholder="شهر / يوم / سنة ">
											</div>
										</div>
									</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> عدد الأسهم </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 price" name="stock_num" id="stock_num" onkeyup="getprice()" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> مساحة الأرض </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="Land_area" >
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
									<input type="text" class="r-inner-h4 " name="shops_num" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> مرافق أخري </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="other_facilities" >
								</div>
							</div>
							<div class="col-xs-12" style="margin-top: 40px">
								<div class="col-xs-6">
									<h4 class="r-h4 "> المسئول عن الوقف </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="responsible_for_endowment" >
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> إسم المدينة </h4>
								</div>
								<div class="col-xs-6 r-input">
								<select name="city">
									<option value="">إختر</option>
								<?php	foreach($main_depart as $record){
									echo '<option value="'.$record->id.'" >'.$record->main_dep_name.'</option>';
									} ?>
								</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 ">ملاحظات  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<textarea class="r-textarea" name="notes"></textarea>
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
					<div class="col-xs-3">
						<input type="submit" role="button" name="save" value="حفظ" class="btn pull-right">

					</div>
					<?php echo form_close()?>
					<div class="col-xs-2">
					<button class="btn pull-left" > عودة </button>
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









