
<section class="family">
	<div class="container">
			<?php $this->load->view('web/family/tabs_link'); ?>
		<div class="content">
        <?php if(isset($result) && $result!=null):?>
        	<table class="table table-bordered" id="tab_logic">
					<thead>
					<th>م</th>
					<th style="text-align: center">نوع الجهاز</th>
					<th style="text-align: center">العدد</th>
					<th style="text-align: center">حالة الجهاز</th>
					<th style="text-align: center" >ملاحظات</th>
					<th style="text-align: center">الإجراء</th>
					</thead>
               <tbody>
        <?php 
        	$house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;
        foreach($result as $row): ?>      
              <tr>
              <td></td>
              <td><?php echo $devices_name[$row->d_house_device_id_fk]; ?> </td>
              <td><?php echo $row->d_count?></td>
              <td><?php echo $house_device_status[$row->d_house_device_status_id_fk]?></td>
              <td><?php echo $row->d_note?></td>
              <td>
              <a href="<?php  echo base_url()?>Web/delete_device/<?php   echo $row->id ;?>">
                  <i   style="margin-right: 20px" class="fa fa-trash-o " aria-hidden="true"></i></a>
              </td>
              </tr> 
        <?php endforeach ?>
               </tbody>     
        </table>
        
        <?php endif?>
        
			<div class="form-group">
				<label for="inputUser" class="col-lg-2 control-label">عدد الأجهزة</label>
				<div class="col-lg-2 input-grup">
					<input type="number" id="device_num"  name="device_num" min="1" max="10" onkeyup="return lood($('#device_num').val());" class="form-control text-right" required>
				</div>
			</div>
			<div class="basic-info active">
				<?php echo form_open('web/devices/',array('id'=>'form'))?>
			   <div id="optionearea1">
        	   </div>
    		<div class="col-sm-12">
					<div class="form-group">
						<input type="hidden" name="max" id="max" />
						<button type="submit" class="btn btn-blue btn-previous" onclick="location.href = 'money.html'">السابق </button>
						<input type="submit" role="button" name="add" class="btn btn-blue btn-next" onclick="location.href = 'family.html'"  value="حفظ و إستمرار">
						<button type="submit" class="btn btn-blue btn-close" onclick="location.href = ''">حفظ و إغلاق </button>
					</div>
			</div>
				<?php echo form_close()?>
			</div>
		</div>
	</div>
</section>
<script>
	function lood(num){
		if(num>0 && num != '')
		{
			var id = num;
			var dataString = 'num=' + id ;
			$.ajax({
				type:'post',
				url: '<?php echo base_url() ?>/web/devices',
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