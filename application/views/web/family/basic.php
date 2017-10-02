
	<section class="family">
		<div class="container">
		<?php $this->load->view('web/family/tabs_link'); ?>
			<div class="content">
				<div class="basic-info active">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">رقم السجل المدني للأم</label>
							<label class="left result-label col-xs-6 no-padding"> <?php if(isset($_SESSION['mother_national_num']) && $_SESSION['mother_national_num']!=null){echo $_SESSION['mother_national_num'];} ?></label>
						</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">رقم الجوال</label>
							<label class="left result-label col-xs-6 no-padding"> <?php if(isset($_SESSION['mother_mob']) && $_SESSION['mother_mob']!=null){echo $_SESSION['mother_mob'];} ?></label>
						</div>

						<div class="form-group">
				        	<a href="<?php echo  base_url()."web/father" ?>">	<button type="submit" class="btn btn-blue btn-next" > إستمرار </button></a>
						</div>

					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">اسم المستخدم</label>
							<label class="left result-label col-xs-6 no-padding"> <?php if(isset($_SESSION['mother_national_num']) && $_SESSION['mother_national_num']!=null){echo $_SESSION['mother_national_num'];} ?> </label>
						</div>
						<div class="form-group">
							<label class="right main-label col-xs-6 no-padding">تغيير كلمة المرور</label>
							<label class="left result-label col-xs-6 no-padding"> <a href="#">اضغط هنا</a></label>
						</div>

					</div>

				</div>
			</div>
		</div>
	</section>





