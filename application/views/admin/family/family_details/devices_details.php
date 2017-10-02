	<?php  if(isset($result_devices) && $result_devices!=null):?>
      
            <br />	
			<div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
			
				<div id="optionearea1">
				<table class="table table-bordered" id="tab_logic">
					<thead>
					<th>م</th>
					<th style="text-align: center">نوع الجهاز</th>
					<th style="text-align: center">العدد</th>
					<th style="text-align: center">حالة الجهاز</th>
					<th style="text-align: center" >ملاحظات</th>
				
					</thead>
					<?php  $count=1;
					for($i=0;$i<sizeof($result_devices);$i++){?>
					<tbody>
					<tr >
						<td><?php  echo$count;?></td>

						<?php 
					
						 $size =sizeof($result_devices);
						$house_device_id_array=array('إختر','ثلاجة','مكيف','غسالة','فرن','برادة','تلفزيون','سيارة خاصة','حاسب ألى','بلاى ستيشن','جوالات');

						$house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;

						?>
						<td> <select  disabled="" class="no-padding " style="" name="d_house_device_id_fk<?php  echo $count;?>" id="try<?php  echo $count;?>">
								<?php  foreach ($house_device_id_array as $k=>$v):
									$select='' ;
									if($result_devices[$i]->d_house_device_id_fk == $k){
										$select='selected' ;
									}  ?>
									<option value="<?php  echo $k;?>" <?php  echo $select; ?>><?php  echo  $v;?></option>
								<?php  endforeach;?>
							</select></td>
						<td> <select disabled="" class="no-padding " style="" name="d_count<?php  echo $count;?>" id="try<?php  echo $count;?>">
								<option>اختر</option>
								<?php  for ($d=1;$d<10;$d++):

									$select='' ;
									if($result_devices[$i]->d_count == $d){
										$select='selected' ;
									}
									?>
									<option value="<?php  echo $d; ?>" <?php  echo $select;?>><?php  echo $d;?></option>
								<?php  endfor;?>
							</select></td>
						<td> <select disabled="" class="no-padding " style="width: 100%;" name="d_house_device_status_id_fk<?php  echo $count;?>" id="try<?php  echo $count;?>">
								<?php  foreach ($house_device_status as $k=>$v):

									$select='' ;
									if($result_devices[$i]->d_house_device_status_id_fk == $k){
										$select='selected' ;
									}

									?>
									<option value="<?php  echo $k;?>" <?php  echo $select ;?>><?php  echo  $v;?></option>
								<?php  endforeach;?>
							</select></td>
						<td> <input type="text" readonly="" name='d_note<?php  echo $count;?>' placeholder='' value="<?php  echo $result_devices[$i]->d_note ;?>" style="width: 100%;" id="try<?php  echo $count;?>" class="form-control" /></td>
					
					</tr>
				
					<?php   	$count++; }?>
					</tbody>

				</table>
				</div>	</div>
<?php   else:?>
<div class="alert alert-danger" >
      لم يتم إضافة اجهزة بعد
          </div>

<?php  endif?>