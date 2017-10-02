<?php  $yes_no=array('اختر','نعم','لا');?>
<div class="col-sm-11 col-xs-12">
	<!--  -->
	<?php  $this->load->view('admin/family/main_tabs'); ?>
	<!--  -->
	<div class="details-resorce">
		<div class="col-xs-12 r-inner-details">
			<div class="panel-heading">
				<ul class="nav nav-tabs">
			            <li><a href="<?php echo  base_url()."Family/basic/".$mother_id;?>"> البيانات الأساسية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_father/".$mother_id;?>"> بيانات الأب </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_mother/".$mother_id;?>">البيانات الزوجة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_family_members/".$mother_id;?>">أفراد الأسرة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_house/".$mother_id;?>">بيانات السكن</a></li>
                            <li><a href="<?php echo  base_url()."Family/update_money/".$mother_id;?>"> البيانات المالية </a></li>
                            <li class="active"><a href="<?php echo  base_url()."Family/update_devices/".$mother_id;?>">  الأجهزة المنزلية</a></li>
                            <li><a href="<?php echo  base_url()."Family/researcher_opinion/".$mother_id;?>"> رأى الباحث الاجتماعى</a></li>
           	   </ul>
			</div>

			<!-------------------------------------------------------------------------------------------------------------------------->
	<?php  if(isset($result) && $result!=null):?>
        	<?php   echo form_open('Family/update_devices/'.$mother_id)?>

			<div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
				<div class="form-group">
					<label for="inputUser" class="col-lg-2 control-label">عدد الأجهزة</label>
					<div class="col-lg-2 input-grup">
						<input type="number" id="device_num"  name="device_num" min="1" max="10" onkeyup="return lood($('#device_num').val());" class="form-control text-right" >
					<input type="hidden" name="size" id="size" value="<?php  echo sizeof($result);?>" />
					</div>
				</div>
				<div id="optionearea1">
				<table class="table table-bordered" id="tab_logic">
					<thead>
					<th>م</th>
					<th style="text-align: center">نوع الجهاز</th>
					<th style="text-align: center">العدد</th>
					<th style="text-align: center">حالة الجهاز</th>
					<th style="text-align: center" >ملاحظات</th>
					<th style="text-align: center">الإجراء</th>
					</thead>
					<?php  $count=1;
					for($i=0;$i<sizeof($result);$i++){?>
					<tbody>
					<tr >
						<td><?php  echo$count;?></td>

						<?php 
						 $size =sizeof($result);
						$house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;?>
						<td> <select class="no-padding " style="width: 100%;" name="d_house_device_id_fk<?php  echo $count;?>" id="try<?php  echo $count;?>">
								<?php foreach ($devices as $device):
									$select='' ;
									if($result[$i]->d_house_device_id_fk == $device->id){
										$select='selected' ;
									}
									?>
									<option value="<?php  echo $device->id;?>" <?php  echo $select; ?>><?php  echo $device->title;?> </option>
								<?php  endforeach;?>
							</select></td>
						<td> <select class="no-padding" style="width: 100%;" name="d_count<?php  echo $count;?>" id="try<?php  echo $count;?>">
								<option>اختر</option>
								<?php  for ($d=1;$d<10;$d++):
									$select='';
									if($result[$i]->d_count == $d){
										$select='selected' ;
									}
									?>
									<option value="<?php  echo $d; ?>" <?php  echo $select;?>><?php  echo $d;?></option>
								<?php  endfor;?>
							</select></td>
						<td> <select class="no-padding " style="width: 100%;" name="d_house_device_status_id_fk<?php  echo $count;?>" id="try<?php  echo $count;?>">
								<?php  foreach ($house_device_status as $k=>$v):
									$select='' ;
									if($result[$i]->d_house_device_status_id_fk == $k){
										$select='selected' ;
									}

									?>
									<option value="<?php  echo $k;?>" <?php  echo $select ;?>><?php  echo  $v;?></option>
								<?php  endforeach;?>
							</select></td>
						<td> <input type="text" name='d_note<?php  echo $count;?>' placeholder='' value="<?php  echo $result[$i]->d_note ;?>" style="width: 100%;" id="try<?php  echo $count;?>" class="form-control" /></td>
						<td>
							<a href="<?php  echo base_url()?>Family/delete_device/devices/update_devices/<?php echo $result[$i]->id.'/'.$result[$i]->mother_national_num_fk ;?>"><i   style="margin-right: 20px" class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
						</td>
					</tr>
					<input type="hidden" name="type<?php  echo $count;?>" value="edit"/>
					<input type="hidden" name="id<?php  echo $count;?>" value="<?php  echo $result[$i]->id ;?>"/>
					<input type="hidden" name="max_edit" value="<?php  echo sizeof($result);?>"/>

					<?php   	$count++; }?>
					</tbody>

				</table>
				</div>

			<!-------------------------------------------------------------------------------------------------------------------------->

		</div>

		<!--3 -->
		<div class="col-xs-12 r-inner-btn">
  	<div class="col-md-3"></div>
  	<div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
		 <a  href="<?php  echo base_url().'Family/update_money/'.$mother_id?>">
                            <button type="button" class="btn btn-info">عودة</button> </a> 
			</div>

			<div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
				<input type="submit" role="button" name="update" class="btn btn-blue btn-next"  value="إضافة" />

			</div>
		
			<div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
				 <a  href="<?php  echo base_url().'Family/researcher_opinion/'.$mother_id?>">
            	<button type="button" class="btn btn-info"> التالى </button> </a>  
			</div>

		
		</div>
			<?php   echo form_close()?>
                <?php  endif?>
		<!--3 -->
	</div>
</div>

	<script>
		function lood(num){
			if(num>0 && num != '')
			{

				  var size =  $('#size').val();
				var id = num;
				var dataString =    { num: id,size: size}
				$.ajax({
					type:'post',
					url: '<?php  echo base_url()."/Family/update_devices/".$mother_id ?>',
					data:dataString,
					dataType: 'html',
					cache:false,
					success: function(html){
						$("#optionearea1").html(html);
					}
				});
				return false;
			}
			else
			{
				$("#photo_num").val('');
				$("#optionearea1").html('');
			}
		}
	</script>
<script>

	document.getElementById("health_state").onchange = function () {

		if (this.value == '1')
			document.getElementById("health_other").setAttribute("disabled", "disabled");

		else{
			document.getElementById("health_other").removeAttribute("disabled", "disabled");
            $("#health_other").val("");
		}
	};

	document.getElementById("activity_type").onchange = function () {

		if (this.value == '0')
			document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
		    $("#activity_type_other").val("");
        }
	};



</script>

	<!--------------------------------------------->
