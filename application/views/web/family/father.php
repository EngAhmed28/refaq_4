<?php if(isset($all_links['father']) && $all_links['father']!=null){
         
          $f_first_name=$all_links['father']['f_first_name'];
          $f_grandfather_name=$all_links['father']['f_grandfather_name'];
          $f_national_id=$all_links['father']['f_national_id'];
          $f_national_id_type=$all_links['father']['f_national_id_type'];//
          
          
          $f_birth_date=date("Y-m-d",$all_links['father']['f_birth_date']);
          $f_job=$all_links['father']['f_job'];//
          $f_death_id_fk=$all_links['father']['f_death_id_fk'];//
          $f_child_num=$all_links['father']['f_child_num'];
          $f_father_name=$all_links['father']['f_father_name'];
          $f_family_name=$all_links['father']['f_family_name'];
          $f_nationality_id_fk=$all_links['father']['f_nationality_id_fk'];//
          $nationality_other =$all_links['father']['nationality_other'];
          
          
          $f_national_id_place=$all_links['father']['f_national_id_place'];
          $f_death_date=date("Y-m-d",$all_links['father']['f_death_date']);
          $f_job_place=$all_links['father']['f_job_place'];
          $f_death_reason_fk=$all_links['father']['f_death_reason_fk'];
          $f_wive_count=$all_links['father']['f_wive_count'];//
     }else{
          $f_first_name="";
          $f_grandfather_name='';
          $f_national_id_type='';//
          $f_national_id='';
          $f_birth_date='';
          $f_job="";//
          $f_death_id_fk='';//
          $f_child_num='';
          $f_father_name='';
          $f_family_name='';
          $f_nationality_id_fk='';//
          $nationality_other='';
          $f_national_id_place='';
          $f_death_date='';
          $f_job_place='';
          $f_death_reason_fk='';
          $f_wive_count='';//  
     }
?>
<!---------------------------------------------------------------------------------------------------->
<section class="family">
	<div class="container">
	
		<?php $this->load->view('web/family/tabs_link'); ?>

		<div class="content">
<?php echo form_open('web/father',array('class'=>"",'role'=>"form" ))?>
<div class="basic-info active">
<div class="col-sm-6">
<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">الاسم الأول</label>
	<input type="text" name="f_first_name" class="form-control col-xs-6" value="<?php echo $f_first_name;?>" required="required"/>
</div>
<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">إسم الجد</label>
	<input type="text" name="f_grandfather_name" value="<?= $f_grandfather_name;?>" class="form-control col-xs-6 no-padding" required="required"/>
</div>
<div class="clearfix"></div>
<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">نوع الهوية</label>
	<select class="col-xs-6 no-padding " name="f_national_id_type">
    <?php $arr_natunal=array('اختر','الهوية الوطنية','إقامة','كارت عائلة','جواز سفر');?>
    <?php for($r=0;$r<sizeof($arr_natunal);$r++):
            $selected="";if($r== $f_national_id_type){$selected="selected";}  ?>		
        <option value="<?php echo $r?>" <?php echo $selected;?> ><?php echo $arr_natunal[$r]?></option>
    <?php endfor?>    
	</select>
</div>
<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">رقم الهوية</label>
	<input type="number" name="f_national_id" value="<?= $f_national_id;?>" id="f_national_id" onkeyup="return valid();" class="form-control col-xs-6 no-padding" required="required"/>
	<span  id="validate1" class="help-block col-xs-6"> </span> 
</div>
<div class="clearfix"></div>

<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">تاريخ الميلاد</label>
    <input type="date" name="f_birth_date" value="<?php echo $f_birth_date ;?>" class="form-control" required="required"/>

</div>

<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">المهنة </label>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<select class="col-xs-6 no-padding " id="f_job" name="f_job" >
   <?php $arr_gob=array('اختر','موظف حكومي','موظف قطاع خاص','اعمال حره','لا يعمل'); ?>
	  <?php for($i=0;$i<sizeof($arr_gob);$i++):
      $selected="";if($i== $f_job){$selected="selected";} ?>
    	<option value="<?php echo $i?>" <?php echo $selected?> ><?php echo $arr_gob[$i];?></option>
      <?php endfor;?>  
	</select>
</div>


<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">سبب الوفاة</label>
	<select class="col-xs-6 no-padding " onchange="admSelectCheck(this);" name="f_death_id_fk">
    <?php $arr_deth=array('اختر','طبيعية','حادثة','مرض');?>
	  <?php for($i=0;$i<sizeof($arr_deth);$i++):
      $selected="";if($i== $f_death_id_fk){$selected="selected";} ?>
    	<option value="<?php echo $i?>" <?php echo $selected?> ><?php echo $arr_deth[$i];?></option>
      <?php endfor;?>  
		<option value="5" id="admOption">اخرى</option>
	</select>
</div>


<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">عدد الأبناء</label>
	<input type="number" name="f_child_num" value="<?php echo $f_child_num ?>" class="form-control col-xs-6 no-padding" required="required"/>
</div>





<div class="form-group">
<a href="<?php echo base_url().'Web/basic' ?>"> <button type="" class="btn btn-blue btn-previous" >السابق </button> </a>	
<?php if(isset($all_links['father']) && $all_links['father']!=null){
      $input_name1='update';$input_name2='update_save';
      }else{  $input_name1='add';$input_name2='add_save';}
 ?>

	<input type="submit" class="btn btn-blue btn-next"  name="<?php echo $input_name1?>" value="حفظ و إستمرار" />
	<input type="submit" class="btn btn-blue btn-close" name="<?php echo $input_name2?>"  value="حفظ و إغلاق "/>
</div>

</div>
<div class="col-sm-6">
<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">إسم الأب</label>
	<input type="text" class="form-control  col-xs-6 no-padding" value="<?php echo $f_father_name?>" name="f_father_name" required="required"/>
</div>
<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">إسم العائلة</label>
	<input type="text" name="f_family_name" class="form-control col-xs-6 no-padding" value="<?php echo $f_family_name?>" required="required"/>
</div>

<!--
<div class="form-group">

	<label class="right main-label col-xs-6 no-padding">الجنسية</label>
	<select class="col-xs-6 no-padding " name="f_nationality_id_fk">
		<option>اختر</option>
	<?php if(isset($nationality) && $nationality!=null): 
    foreach($nationality as $one_nationality):
      $selected=''; if($one_nationality->id == $f_nationality_id_fk){ $selected="selected";} ?>
    	<option value="<?php echo $one_nationality->id?>" <?php echo $selected?> ><?php echo $one_nationality->title;?></option>
     <?php endforeach;endif;?>				
	</select>


</div>
-->



<div class="form-group">
<label class="right main-label col-xs-6 no-padding">الجنسية</label>
<select class="col-xs-3 no-padding " name="f_nationality_id_fk" id="f_nationality_id_fk" required="required">
	<option>اختر</option>

		<?php if(isset($nationality) && $nationality!=null): 
    foreach($nationality as $one_nationality):
      $selected=''; if($one_nationality->id == $f_nationality_id_fk){ $selected="selected";} ?>
    	<option value="<?php echo $one_nationality->id?>" <?php echo $selected?> ><?php echo $one_nationality->title;?></option>
     <?php endforeach;endif;?>	
</select>

<input type="text" name="nationality_other" value="<?php echo $nationality_other;  ?>" 
 class="form-control col-xs-4 no-padding"
 placeholder="أخري" style="width: 25%" id="nationality_other" disabled="" />

</div>













<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">مصدر الهوية</label>
	<input type="text" class="form-control col-xs-6 no-padding" value="<?php echo $f_national_id_place;?>" name="f_national_id_place"/>
</div>
<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">تاريخ الوفاة</label>
      <input type="date" name="f_death_date" class="form-control" value="<?php echo $f_death_date ?>" required="required" />

</div>

<div class="form-group red box"  style="display: none">
	<label class="right main-label col-xs-6 no-padding">مكان العمل</label>
	<input type="text" class="form-control col-xs-6 no-padding" value="<?php echo $f_job_place ?>" name="f_job_place" />
	</div>


<div class="form-group">
	<div id="admDivCheck" style="display:none;">
		<label class="right main-label col-xs-6 no-padding">السبب</label>
		<input type="text" class="form-control col-xs-6 no-padding" value="<?php echo $f_death_reason_fk?>" name="f_death_reason_fk" />
	</div>
</div>

<div class="form-group">
	<label class="right main-label col-xs-6 no-padding">عدد الزوجات</label>
	<select class="col-xs-6 no-padding " name="f_wive_count">
	 <option >اختر</option>
     <?php for($i=1;$i<5;$i++):
      $selected="";if($i== $f_wive_count){$selected="selected";} ?>
    	<option value="<?php echo $i?>" <?php echo $selected?> ><?php echo $i;?></option>
      <?php endfor;?>  
	</select>
</div>


</div>

</div>
<?php echo form_close()?>

</div>

</div>
</section>

<script>

	$(document).ready(function() {
		$("#f_job").change(function() {
			var color = $(this).val();
			if (color == "1") {
				$(".box").not(".1").hide();
				$(".red").show();
			} else if (color == "2") {
				$(".box").not(".2").hide();
				$(".red").show();
			} else {
				$(".box").hide();
			}
		});


	});
</script>

<script>
	function admSelectCheck(nameSelect)
	{
		console.log(nameSelect);
		if(nameSelect){
			admOptionValue = document.getElementById("admOption").value;
			if(admOptionValue == nameSelect.value){
				document.getElementById("admDivCheck").style.display = "block";
			}
			else{
				document.getElementById("admDivCheck").style.display = "none";
			}
		}
		else{
			document.getElementById("admDivCheck").style.display = "none";
		}

	}
    
  
  
  	document.getElementById("f_nationality_id_fk").onchange = function () {



		if (this.value == 20)
			document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
		else{
			document.getElementById("nationality_other").setAttribute("disabled", "disabled");
              $("#nationality_other").val("");
		}
	};
  
    
    
</script>
<script>
  function valid()
    {
        if($("#f_national_id").val().length > 10){
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = '';
        }else{
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'رقم الهوية من عشر أرقام';
        }
    }



</script>
