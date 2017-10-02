<?php if(isset($all_links['financial']) && $all_links['financial']!=null){
 
    foreach($all_links['financial'] as  $key=>$value){
        $result[$key]=$all_links['financial'][$key];
    }
}else{
     foreach($all_field as $keys=>$value){
        $result[$all_field[$keys]]='';     
     }   
    }
    $arr_yes_no=array('','نعم','لا');
?>
	<section class="family">
		<div class="container">
	
	<?php $this->load->view('web/family/tabs_link'); ?>

			<div class="content">
				<?php echo form_open('web/money',array('class'=>"",'role'=>"form" ))?>

				<div class="basic-info active">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">مبلغ التقاعد</label>
							<input type="number" name="f_pension_amount" value="<?php echo $result['f_pension_amount']?>"  class="form-control col-xs-6 no-padding"/>
						</div>
						<!--<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">مبلغ الممتلكات</label>
							<input type="number" name="f_owner_ship_amount" value="<?php echo $result['f_owner_ship_amount']?>"  class="form-control col-xs-6 no-padding" />
						</div>-->
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">مقدار العادة السنوية</label>
							<input type="number" name="f_annual_amount" value="<?php echo $result['f_annual_amount']?>"  class="form-control col-xs-6 no-padding" />
						</div>


						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">عمالة</label>
							<select class="col-xs-3 no-padding " id="loan" name="f_workers_id_fk">
								<option>اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['f_workers_id_fk']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
							</select>
							<input type="number" name="f_workers_num" value="<?php echo $result['f_workers_num']?>" class="form-control col-xs-3 no-padding" placeholder="عدد العمال" style="width: 25%;" id="loan-cost" disabled>

						</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">إسم البنك</label>
							<select class="col-xs-6 no-padding " name="f_bank_id_fk">
							<?php $banks=array("اختر",'بنك الجزيرة','بنك البلاد','سامبا','الرياض');?>
                            <?php for($k=0;$k<sizeof($banks);$k++):
                            $selected='';if($k==$result['f_bank_id_fk']){$selected='selected';}?>
                            	<option value="<?php echo $k ?>" <?php echo $selected?>  ><?php echo $banks[$k] ?></option>
                                <?php endfor;?>
							</select>
						</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">الإسم المعتمد للحساب </label>
							<input type="text" name="f_official_account_name" value="<?php echo $result['f_official_account_name']?>"  class="form-control col-xs-6 no-padding" />
						</div>

					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">مبلغ الضمان</label>
							<input type="number" name="f_warranty_amount" value="<?php echo $result['f_warranty_amount']?>"  class="form-control col-xs-6 no-padding" />
						</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">مبلغ التأمينات</label>
							<input type="number" name="f_insurance_amount" value="<?php echo $result['f_insurance_amount']?>"  class="form-control col-xs-6 no-padding" />
						</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">مبالغ أخرى</label>
							<input type="number" name="f_other_amount" value="<?php echo $result['f_other_amount']?>"  class="form-control col-xs-6 no-padding" />
						</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">نشاط تجارى</label>
							<select class="col-xs-6 no-padding " name="f_commerical_activity_id_fk">
									<option>اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['f_commerical_activity_id_fk']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
							</select>
						</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">رقم الحساب</label>
							<input type="number" name="f_bank_account_num" value="<?php echo $result['f_bank_account_num']?>"  class="form-control col-xs-6 no-padding" />
						</div>

					</div>


					<div class="col-sm-12">
						<div class="form-group">
				  <a href="<?php echo base_url().'Web/house'?>"> 
                       <button type="submit" class="btn btn-blue btn-previous">السابق </button> </a>
                      
                <?php  if(isset($all_links['financial']) && $all_links['financial']!=null):
                $input_name1='update';$input_name2='update_save';
                else:  $input_name1='add';$input_name2='add_save'; endif; ?>    
                      	<input type="submit"  name="<?php echo $input_name1?>" class="btn btn-blue btn-next"  value="حفظ و إستمرار" />
                    	<input type="submit"  name="<?php echo $input_name2?>" class="btn btn-blue btn-close"   value="حفظ و إغلاق "/>
					</div>
					</div>


				</div>
				<?php echo form_close()?>

			</div>
		</div>
	</section>



	<script>
		document.getElementById("loan").onchange = function () {

			if (this.value == '1')
				document.getElementById("loan-cost").removeAttribute("disabled", "disabled");
			else{
				document.getElementById("loan-cost").setAttribute("disabled", "disabled");
                $("#loan-cost").val("")
			}
		};

	</script>








