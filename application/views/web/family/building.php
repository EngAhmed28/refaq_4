<?php if(isset($all_links['houses']) && $all_links['houses']!=null){
 
    foreach($all_links['houses'] as  $key=>$value){
        $result[$key]=$all_links['houses'][$key];
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

        <?php echo form_open('web/house/',array('id'=>'form'))?>

        <div class="content">
			<div class="basic-info active">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">رقم حساب فاتورة الكهرباء</label>
						<input type="text" name="h_electricity_account" value="<?php echo $result['h_electricity_account']?>"  class="form-control col-xs-6 no-padding">
					</div>

					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">المدينة</label>
						<select class="col-xs-6 no-padding " name="h_city_id_fk" id="h_city_id_fk" onchange="return rent($('#h_city_id_fk').val());">
							<option>اختر المدينة</option>
                            <?php
                            foreach($main_depart as $record){
                                  $selected='';if($record->id==$result['h_city_id_fk']){$selected='selected';}
                                echo '<option value="'.$record->id.'" '.$selected.' >'.$record->main_dep_name.'</option>';
                            }
                            ?>
						</select>
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">الشارع </label>
						<input type="text" name="h_street" value="<?php echo $result['h_street']?>"   class="form-control col-xs-6 no-padding">
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">أقرب مدرسة</label>
						<input type="text" name="h_nearest_school" value="<?php echo $result['h_nearest_school']?>"   class="form-control col-xs-6 no-padding">
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">نوع السكن</label>
				<?php 
            // $arr_type_house=array("اختر","دور مسلح","دورين مسلح","شعبى","شقة",'صندقة','خيمة','ثلاث أدوار');
               $arr_type_house=array("اختر","دور مسلح","دورين مسلح","شعبى","شقة",'أخري');?>
             
            
             	
                        <select class="col-xs-6 no-padding " name="h_house_type_id_fk">
					<?php for($i=0;$i<sizeof($arr_type_house);$i++):
                       $selected='';if($i==$result['h_house_type_id_fk']){$selected='selected';}?>	
						<option value="<?php echo $i ?>" <?php echo $selected?> ><?php echo $arr_type_house[$i] ?></option>
                    <?php endfor ?>
                        </select>
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">لون المنزل</label>
						<input type="text" name="h_house_color" value="<?php echo $result['h_house_color']?>"   class="form-control col-xs-6 no-padding">
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">عدد الغرف</label>
						<input type="number" name="h_rooms_account" value="<?php echo $result['h_rooms_account']?>"   class="form-control col-xs-6 no-padding">
					</div>

					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">مقترض من البنك العقارى</label>
						<select class="col-xs-3 no-padding "  name="h_borrow_from_bank" id="bank">
							<option>اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['h_borrow_from_bank']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
						</select>
						<input type="number" name="h_borrow_remain" value="<?php echo $result['h_borrow_remain']?>" class="form-control col-xs-3 no-padding" placeholder="القيمة المتبقية" style="width: 25%;" id="bank-cost" disabled>

					</div>

					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">اتجاه المنزل</label>
					<?php $arr_direct=array('اختر','شمال','جنوب','شرق','غرب','شمال غرب'
                                           ,'شمال شرق ','شمال غرب','جنوب شرق ','جنوب غرب');?>
                    	<select class="col-xs-6 no-padding " name="h_house_direction">
		            <?php for($i=0;$i<sizeof($arr_direct);$i++):
                     $selected='';if($i==$result['h_house_direction']){$selected='selected';}?>	
						<option value="<?php echo $i ?>" <?php echo $selected?>  ><?php echo $arr_direct[$i] ?></option>
                    <?php endfor ?>
						</select>
					</div>

					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">الحالة</label>
						<select class="col-xs-6 no-padding " name="h_house_status_id_fk">
					        	<option>اختر</option>
                          <?php $house_state=array('','جيد','متوسط','يحتاج لترميم');
                           for($i=1;$i<sizeof($house_state);$i++):
                     $selected='';if($i==$result['h_house_status_id_fk']){$selected='selected';}?>	
						<option value="<?php echo $i?>" <?php echo $selected?>  ><?php echo $house_state[$i] ?></option>
                    <?php endfor ?>   
						</select>
					</div>


				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">الرقم الصحى</label>
						<input type="text" name="h_health_number"  value="<?php echo $result['h_health_number']?>"   class="form-control col-xs-6 no-padding">
					</div>

					<div class="form-group" >
						<label class="right main-label col-xs-6 no-padding">الحى</label>
						<select class="col-xs-6 no-padding " name="h_hai_id_fk" id="optionearea2">
							<option>اختر الحي</option>
						</select>
					</div>
                    <div class="form-group">
                        <label class="right main-label col-xs-6 no-padding">المنطقة </label>
                        <input type="text" name="h_house_area"  value="<?php echo $result['h_house_area']?>"   class="form-control col-xs-6 no-padding">
                    </div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">أقرب مسجد </label>
						<input type="text" name="h_mosque" value="<?php echo $result['h_mosque']?>"   class="form-control col-xs-6 no-padding">
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">أقرب معلم</label>
						<input type="text" name="h_nearest_teacher" value="<?php echo $result['h_nearest_teacher']?>"   class="form-control col-xs-6 no-padding">
				
                	</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">ملكية السكن</label>
						<select class="col-xs-6 no-padding" id="buliding" name="h_house_owner_id_fk">
							<option>اختر</option>
					 <?php $house_own=array('','ملك','ايجار','هبه');
                           for($i=1;$i<sizeof($house_own);$i++):
                     $selected='';if($i==$result['h_house_owner_id_fk']){$selected='selected';}?>		
                        	<option value="<?php echo $i?>" <?php echo $selected?>  ><?php echo $house_own[$i] ?></option>
                    <?php endfor ?> 
						</select>
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">مقدار الإيجار السنوى </label>
						<input type="text" name="h_rent_amount" value="<?php echo $result['h_rent_amount']?>"   class="form-control col-xs-6 no-padding" disabled id="buliding-cost">
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">عدد دورات المياه</label>
						<input type="number" name="h_bath_rooms_account"  value="<?php echo $result['h_bath_rooms_account']?>"  class="form-control col-xs-6 no-padding">
					</div>
					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">مساحة البناء</label>
						<input type="number" name="h_house_size"  value="<?php echo $result['h_house_size']?>"   class="form-control col-xs-6 no-padding">
					</div>

					<div class="form-group">
						<label class="right main-label col-xs-6 no-padding">قرض ترميم من بنك التسليف</label>
						<select class="col-xs-3 no-padding " name="h_loan_restoration" id="fix">
								<option>اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['h_loan_restoration']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
						</select>
						<input type="number" name="h_loan_restoration_remain" value="<?php echo $result['h_loan_restoration_remain']?>"   class="form-control col-xs-3 no-padding" placeholder="القيمة المتبقية" style="width: 25%;" id="fix-cost" disabled>

					</div>
				</div>
	<h4 class=" sub-title col-xs-12">خريطة المنزل</h4>
    
    	<label class="right main-label col-xs-6 no-padding">تضمين الخريطة  
     
     ( قم بتضمين خريطة جوجل هنا  )
     </label>
				<div class="col-sm-12">

<input type="text" name="map" value='<?php echo $result['map']  ?>'
    class="form-control col-xs-6 no-padding"/>
				   
<?php

if($result['map'] == '' )
{
   echo ' <div class="alert alert-danger">
لا يوجد خريطة محفوظة 

</div>' ;
}else{
    
     echo $result['map'];
}


 ?>















                
                <!--
                
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3435.605206349302!2d31.010137084746297!3d30.56045638169756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7d68d7ecc134b%3A0x60f7c51b24136594!2z2KfZhNin2KvZitixINiq2YM!5e0!3m2!1sar!2seg!4v1496489937206" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
-->
				</div>







				<div class="col-sm-6">
					<div class="form-group">
					
                    <a href="<?php echo base_url().'Web/family_members'?>"> 
                       <button type="submit" class="btn btn-blue btn-previous">السابق </button> </a>
                       
                            <?php  if(isset($all_links['houses']) && $all_links['houses']!=null):
                $input_name1='update';$input_name2='update_save';
                else:  $input_name1='add';$input_name2='add_save'; endif; ?>    
                      	<input type="submit"  name="<?php echo $input_name1?>" class="btn btn-blue btn-next"  value="حفظ و إستمرار" />
                    	<input type="submit"  name="<?php echo $input_name2?>" class="btn btn-blue btn-close"   value="حفظ و إغلاق "/>
				
                      
                      </div>
				</div>
                <?php echo form_close()?>
			</div>
		</div>
	</div>
</section>

<script>
	document.getElementById("bank").onchange = function () {

		if (this.value == 1)
			document.getElementById("bank-cost").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("bank-cost").setAttribute("disabled", "disabled");
            $("#bank-cost").val('');
		}
	};
	document.getElementById("buliding").onchange = function () {

		if (this.value == 2)
			document.getElementById("buliding-cost").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("buliding-cost").setAttribute("disabled", "disabled");
              $("#buliding-cost").val('');
		}
	};
	document.getElementById("fix").onchange = function () {

		if (this.value == 1)
			document.getElementById("fix-cost").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("fix-cost").setAttribute("disabled", "disabled");
              $("#fix-cost").val('');
		}
	};




</script>
<!--------------------------------------->
<script>
    function rent(valu)
    {
        if(valu)
        {
            var dataString = 'valu=' + valu;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/web/house',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea2').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea2').html('');
            return false;
        }

    }
</script>