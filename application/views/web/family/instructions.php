
<section class="instructions ">
<?php  echo form_open_multipart('Web/read_instructions')?>

	<div class="container">
	<div class="col-xs-6">
		<h5 class="heading">شروط التسجيل</h5>
		<ul>
			<li>أن تكون الأسرة فاقدة الأب ( أسرة أيتام ).</li>
			<li>أن تكون الأسرة من سكان مدينة حائل   والقرى التابعة لها إدارياً .</li>
			<li>أن يكون لدى الأسرة أبناء من سن ( 18 ) عاماً فما دون</li>
		
			<li>أن تستكمل الأسرة جميع المستندات المطلوبة للتسجيل.</li>
		</ul>
		<h5 class="heading">المستندات المطلوبة</h5>
		<ul>
			<li>صـورة من شـهـــادة الـوفـاة مع الأصل للمطابقة .</li>
			<li>صورة من بطاقة العائلة (حديث) مع الأصل للمطابقة .</li>
		
			<li>صورة من صك الولاية الشرعية أو الوكالة على الأيتام .</li>
			<li>صورة من شهادات الميلاد للابناء.</li>
			<li>صورة من عقد الإيجار أو صك ملكية السكن مع الأصل للمطابقة  أو فاتورة الكهرباء.</li>
			<li>تعريف من المدرسة لجميع الأبناء والبنات مختوم وموقع من المدرسة وبتاريخ جديد .</li>
			<li>صورة من بطاقة الضمان الاجتماعي .</li>
		

			<li>رقم الحساب البنكي (( الإيبان ))</li>

		</ul>
		<div class="checkbox">
			<input type="checkbox" name="enter" required=""/> قرأت كافة شروط التسجيل ، وأوافق بالإلتزام بما جاء فيها .  
		</div>
	<!--	<a href="<?php echo base_url()."web/Add_Register"?>" class="btn-blue">متابعة</a>
      -->  <input type="submit" class="btn btn-blue btn-next" name="add_register"  value="متابعة"/>
	</div>
	</div>
    <?php echo form_close()?>  
</section>






