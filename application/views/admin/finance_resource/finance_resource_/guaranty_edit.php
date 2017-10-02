

<div class="r-program">
	<div class="container">
		<div class="col-sm-11 col-xs-12">
			<?php $this->load->view('admin/finance_resource/main_tabs'); ?>

			<div class="details-resorce">
				<div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('finance_resource/edit_guaranty/'.$results[0]->id)?>
					<div class="col-xs-12">
						<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> كافل </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select   name="guarantee_id"  <?php echo $disabled; ?>>
							   <option value="">إختر</option>
							    <?php if (!empty($donors)):
							   foreach ($donors as $record):
								   $select='';
								   if($results[0]->guarantee_id == $record->id){
									   $select ='selected';
								   }

								   ?>
							  <option value="<? echo $record->id; ?>" <? echo $select;?>><? echo $record->user_name; ?></option>
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
									<select name="guaranty_type"  <? echo $disabled;?> id="guaranty_type" onchange="search($('#guaranty_type').val());">
										<option  n value=""> إختر</option>
										<?php if(!empty($guaranty_types)):
											foreach ($guaranty_types as $record):
												 $select='';
												if($results[0]->guaranty_type == $record->id){
													$select='selected';
												}?>
												<option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->title;?></option>
										<?php  endforeach;endif;?>
									</select>
								</div>
							</div>

								<div class="col-xs-12">
									<div class="col-xs-6">
										<h4 class="r-h4"> طريقة السداد </h4>
									</div>
									<div class="col-xs-6 r-input">
										<select name="payment_method" <? echo $disabled;?>>
											<?php $arr =array('إختر','شهري','ثلاثة شهور','ستة شهور','سنوي','خمس سنوات','كامل المبلغ');
												for ($d=0;$d <sizeof($arr);$d++):

													$select='';
													if($results[0]->payment_method == $d){
														$select='selected';
													}?>
													<option value="<? echo $d;?>" <? echo $select;?>><? echo $arr[$d];?></option>
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
											<input type="text" class="form-control <? echo $class;?>" name="guaranty_start"  value="<? echo date('m/d/Y',$results[0]->guaranty_start);?>" <?echo $readonly;?> placeholder="شهر / يوم / سنة ">
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> المبلغ الشهري  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<input type="text" class="r-inner-h4 " name="guaranty_amount" id="guaranty_amount" value="<? echo $get_data[0]->amount;?>" readonly>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> تحديد الجنس </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="sex_determination"  <? echo $disabled;?> id="sex_determination" onclick="checkgender()">
										<? if($results[0]->sex_determination ==2){?>
										<option  selected value="2">لا</option>
										<option value="1">نعم</option>
										<?}elseif($results[0]->sex_determination ==1){?>
										<option  selected value="1">نعم</option>
										<option value="2">لا</option>
										<?}?>
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
									<select name="number"  id="number" <? echo $disabled;?>  onclick="getprice()">
										<option value="">إختر</option>
										<? for($a=1;$a<=50;$a++):
											$select='';
											if($results[0]->number == $a){
												$select='selected';
											}

											?>
											<option value="<? echo $a;?>" <? echo $select;?>><? echo $a;?></option>
										<? endfor;?>
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4 "> المدة </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="duration" id="duration" <? echo $disabled;?> onclick="checkduration()">
										<? if($results[0]->duration ==2){?>
											<option  selected value="2">مستمرة</option>
											<option  value="1">محددة</option>
										<?}elseif($results[0]->duration ==1){?>
											<option  selected value="1">محددة</option>
											<option value="2">مستمرة</option>
										<?}?>

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
											<input type="text" class="form-control <? echo $class;?>" name="guaranty_end"  value="<? echo date('m/d/Y',$results[0]->guaranty_end);?>"  <?echo $readonly;?>  placeholder="شهر / يوم / سنة ">
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
									<input type="text" class="r-inner-h4 " name="guaranty_amount_all" id="guaranty_amount_all" value="<? echo $results[0]->guaranty_amount_all;?>" readonly>
								</div>
							</div>
							<? if ($results[0]->sex_determination ==1):?>
							<div class="col-xs-12" id="gender" style="display:none">
								<div class="col-xs-6">
									<h4 class="r-h4"> الجنس  </h4>
								</div>
								<div class="col-xs-6 r-input">
									<select name="gender" <? echo $disabled;?>>
										<? if($results[0]->duration ==2){?>
											<option  selected value="2">أنثي</option>
											<option   value="1">ذكر</option>
										<?}elseif($results[0]->sex_determination ==1){?>
											<option  selected value="1">ذكر</option>
											<option value="2">أنثي</option>
										<?}?>
									</select>
								</div>
							</div>
							<? endif;?>
						<!--end div--></div>
						<div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
						<div class="col-xs-12">
							<div class="col-xs-3">
								<h4 class="r-h4">  ملاحظات  </h4>
							</div>
							<div class="col-xs-8 r-input">
								<textarea class="r-textarea" name="guaranty_note" id="guaranty_note" readonly ><? echo $get_data[0]->description;?></textarea>
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
					<?if($this->uri->segment(4) !='view'):?>
					<div class="col-xs-3">
						<input type="submit" role="button" name="save" value="حفظ" class="btn pull-right">
					</div>
					<? endif;?>
					<?php echo form_close()?>
					<div class="col-xs-3">
						<a href="<?php echo base_url()?>finance_resource/all_guaranty/?>"><button class="btn pull-left" > عودة </button></a>
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











