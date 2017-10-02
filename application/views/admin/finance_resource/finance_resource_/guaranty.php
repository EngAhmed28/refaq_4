

<div class="r-program">
	<div class="container">
		<div class="col-sm-11 col-xs-12">
			<?php $this->load->view('admin/finance_resource/main_tabs'); ?>

			<div class="details-resorce">
				<div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('finance_resource/guaranty')?>
					<div class="col-xs-12">
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> كافل </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select   name="guarantee_id" >
							   <option value="">إختر</option>
							    <?php if (!empty($donors)):
							   foreach ($donors as $record):?>
							  <option value="<? echo $record->id; ?>"><? echo $record->user_name; ?></option>
							   <?php  endforeach; endif;?>
									</select>

								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 ">
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> نوع الكفالة </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="guaranty_type" id="guaranty_type" onchange="search($('#guaranty_type').val());">
										<option  n value=""> إختر</option>
										<?php if(!empty($guaranty_types)):
											foreach ($guaranty_types as $record):?>
												<option value="<? echo $record->id;?>"><? echo $record->title;?></option>
										<?php  endforeach;endif;?>
									</select>
								</div>
							</div>

								<div class="col-xs-12">
									<div class="col-xs-6">
										<h4 class="r-h4"> طريقة السداد </h4>
									</div>
									<div class="col-xs-6 r-input">
										<select name="payment_method">
											<?php $arr =array('إختر','شهري','ثلاثة شهور','ستة شهور','سنوي','خمس سنوات','كامل المبلغ');
												for ($d=0;$d <sizeof($arr);$d++):?>
													<option value="<? echo $d;?>"><? echo $arr[$d];?></option>
												<?php  endfor;?>
										</select>
									</div>
								</div>
							<div class="col-xs-12 ">
								<div class="col-xs-6">
									<h4 class="r-h4 ">  بداية الكفالة </h4>
								</div>
								<div class="col-xs-6 r-input ">
									<div class="docs-datepicker">
										<div class="input-group">
											<input type="text" class="form-control docs-date" name="guaranty_start" placeholder="شهر / يوم / سنة ">
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> المبلغ الشهري  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="guaranty_amount" id="guaranty_amount" value="" readonly>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> تحديد الجنس </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="sex_determination" id="sex_determination" onclick="checkgender()">
										<option value="2">لا</option>
										<option value="1">نعم</option>
									</select>
								</div>
							</div>
						<!-- end div--></div>
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> العدد </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="number"  id="number"  onclick="getprice()">
										<option value="">إختر</option>
										<? for($a=1;$a<=50;$a++):?>
											<option value="<? echo $a;?>"><? echo $a;?></option>
										<? endfor;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> المدة </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="duration" id="duration" onclick="checkduration()">
										<option value="">إختر</option>
										<option value="1">محددة</option>
										<option value="2">مستمرة</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 " >
								<div id="guaranty_end">
								<div class="col-xs-6">
									<h4 class="r-h4 ">  نهاية الكفالة </h4>
								</div>
								<div class="col-xs-6 r-input ">
									<div class="docs-datepicker">
										<div class="input-group">
											<input type="text" class="form-control docs-date" name="guaranty_end"    placeholder="شهر / يوم / سنة ">
										</div>
									</div>
								</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> المبلغ الإجمالي  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="guaranty_amount_all" id="guaranty_amount_all" readonly>
								</div>
							</div>
							<div class="col-xs-12" id="gender" style="display:none">
								<div class="col-xs-6">
									<h4 class="r-h4"> الجنس  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="gender">
									<option value="1">ذكر</option>
									<option value="2">أنثي</option>
									</select>
								</div>
							</div>
						<!--end div--></div>
						<div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
						<div class="col-xs-12">
							<div class="col-xs-3">
								<h4 class="r-h4">  ملاحظات  </h4>
							</div>
							<div class="col-xs-8 r-input">
								<textarea class="r-textarea" name="guaranty_note" id="guaranty_note" ></textarea>
							</div>
						</div>
							<div id="optionearea3"></div>
					</div>
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
					<div class="col-xs-3">
					<button class="btn pull-left" > عودة </button>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>




<script>

	function getprice() {
		$('#guaranty_amount_all').val(0);
		if($("#guaranty_amount").val() !='') {
			var sum = (parseFloat($("#guaranty_amount").val())) * parseFloat($("#number").val());
			$('#guaranty_amount_all').val(sum);
		}
	}
	function checkduration() {
		var duration =$("#duration").val();
		if(duration ==2){
			$('#guaranty_end').hide();
		}else if(duration ==1){
			$('#guaranty_end').show();
		}
	}
	function checkgender() {
		var gender =$("#sex_determination").val();
		if(gender ==1){
			$('#gender').show()
		}
	}
</script>

<!-------------------------------------->
<script>
	function search(valu)
	{
		if(valu)
		{
			var dataString = 'valu=' + valu;
			$.ajax({

				type:'post',
				url: '<?php echo base_url() ?>/Finance_resource/guaranty',
				data:dataString,
				dataType: 'html',
				cache:false,
				success: function(html){
					$('#optionearea3').html(html);
				}
			});
			return false;
		}
		else
		{
			$('#optionearea3').html('');
			return false;
		}

	}

</script>











