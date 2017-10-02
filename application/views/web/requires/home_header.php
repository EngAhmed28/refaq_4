<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>جمعية رفاق</title>
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/owl.carousel.css" >
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/owl.theme.css" >
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/web_asset/css/responsive.css">

<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-32x32.png">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
	


</head>

<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">
	<!-- start bottom button -->
	<div class="bottom-button">
		<a id="to-top" class="btn btn-lg btn-inverse page-scroll" href="#page-top"> <span class="sr-only">Toggle to Top Navigation</span> <i class="fa fa-chevron-up"></i> </a>
	</div>

	<div class="top-nav">
		<div class="container">
			<div class="right col-sm-6">
				<ul class="list-unstyled">
				
                
                	<?php echo form_open('Web/check_login_Register',array('role'=>'form'))?>
			
            <?php if(isset($_SESSION["is_logged_user"]) && $_SESSION["is_logged_user"] == true):?>
            
              <li> <a href="<?php echo base_url('Web/logout_Register')?>"> خروج <i class="fa fa-power-off" aria-hidden="true"></i>   </a>   </li>
            <?php else :?>
                	<li class="dropdown account">
						<a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in" aria-hidden="true"></i> الدخول </a>

						<ul class="dropdown-menu text-center" style="display: none;">
							<li role="separator" class="divider"></li>
							<li><input type="text" name="user_name" class="form-control" placeholder="إسم المستخدم"></li>
							<li><input type="password" name="user_pass" class="form-control" placeholder="الرقم السرى"></li>
							<li><label for="rememberme"> 
								<input name="rememberme" type="checkbox" id="rememberme" value="forever"> تذكرنى 
							</label></li>
							<li><button name="login" class="enter" type="submit">دخول</button></li>
							<li><p class="register">هل أنت مستخدم جديد ؟ <a href="#">التسجيل</a> </p></li>
							<hr>
							<li><p class="social">إستخدام حساب <a href="#" class="facebook">فيسبوك</a> <a href="#" class="google">جوجل </a></p></li>
						</ul>
					</li>
                      <?php endif?>      
                    <?php echo form_close()?>  
                    
					<li><a href="#">English <i class="fa fa-language" aria-hidden="true"></i></a></li>
				</ul>
			</div>

			<div class="left col-sm-6">
				<ul class="list-unstyled">
					<li> <a href="#"><i class="fa fa-calculator" aria-hidden="true"></i> حاسبة الزكاة </a></li>
					<li><a href="#">مناقصات </a></li>
					<li class="dropdown currency">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-money" aria-hidden="true"></i> ريال سعودى - SAR <span class="caret"></span></a>

						<ul class="dropdown-menu text-center">
							<li> <a href="#">دولاار أمريكى</a></li>
							<li><a href="#">ريال سعودى</a></li>
							<li><a href="#">ريال سعودى</a></li>
							<li><a href="#">درهم إمارتى</a></li>

						</ul>
					</li>
					<li class="pull-right"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

					
				</ul>
			</div>


		</div>
	</div>

	<section class="middle-nav  col-xs-12">
		<div class="col-sm-2 col-xs-2 hidden-xs no-padding">
			<a href="index.html"><img src="<?php echo base_url()?>asisst/web_asset/img/logo.png" class="logo"></a>
		</div>

		<div class="col-sm-10 no-padding" >
			<ul class="list-unstyled visible-xs listofnav">
				<li class="dropdown search-menu">
					<a href="#" class="dropdown-toggle search" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></a>
					<ul class="dropdown-menu">

						<li><h5 class="heading"><i class="fa fa-search" aria-hidden="true"></i> البحث</h5> </li>
						<li><input type="text" name="" class="form-control" placeholder="كلمة البحث"></li>
						<li role="separator" class="divider"></li>
						<li>
							<select class="form-control">
								<option>كل مجالات التبرع</option>
								<option>التعليم</option>
								<option>الصحة</option>
								<option>المياه والأبار</option>
								<option>الإسكان</option>
								<option>تحسين الدخل</option>
								<option>الكفالات</option>
								<option>مساجد وثقافة</option>
								<option>الصدقات</option>
								<option>الزكاة</option>
							</select>
						</li>
						<li role="separator" class="divider"></li>
						<li>
							<select class="form-control">
								<option>مساهمات</option>
								<option>مشاريع</option>
								<option>كفالات</option>
								<option>إحتياجات كفالات</option>

							</select>
						</li>
						<li role="separator" class="divider"></li>
						<li>
							<select class="form-control">
								<option>كل الدول</option>
								<option>مصر</option>
								<option>السعودية</option>
								<option>الكويت</option>
								<option>البحرين</option>
								<option>الإمارات</option>
								<option>عمان</option>
								<option>العراق</option>
								<option>سوريا</option>
								<option>فلسطين</option>
								<option>ليبيا</option>
								<option>الجزائر</option>
								<option>السودان</option>
							</select>
						</li>
						<li role="separator" class="divider"></li>
						<li>
							<select class="form-control">
								<option>أى مبلغ</option>
								<option>1-1000</option>
								<option>1000-5000</option>
								<option>5000-10000</option>
								<option>10000-15000</option>
								<option>15000-20000</option>
								<option>20000-30000</option>
							</select>
						</li>
						<li role="separator" class="divider"></li>
						<li class="text-center"><button  class="btn search-btn">بحث</button></li>
					</ul>
				</li>
				<li><a href="#" class="tbra"> <i class="fa fa-heart-o"></i> تبرع الأن</a></li>
				


			</ul>
			<nav class="navbar navbar-default " data-spy="affix" data-offset-top="150">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand visible-xs" href="#">
							جمعية رفاق بحائل 
						</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav ">
							<li class="active"><a href="index.html">الرئيسية <span class="sr-only">(current)</span></a></li>
							<li><a href="about.html">من نحن</a></li>
							<li><a href="news.html">الأخبار</a></li>
							<li><a href="kfala.html">كفالات</a></li>
							<li><a href="projects.html">مشاريع</a></li>
							<li><a href="departments.html">الإستقطاعات</a></li>
							<li><a href="kfala-form.html">اكفلنى</a></li>
							<li><a href="program.html">برامجنا</a></li>
							<li><a href="contact.html">اتصل بنا</a></li>
							<li><a href="#">غرفة الأسر</a></li>
							<li><a href="#">غرفة المتبرعين</a></li>
                            	<li><a href="<?php echo base_url()  ?>login"> البرنامج</a></li>
							<li class="dropdown search-menu">
								<a href="#" class="dropdown-toggle search" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></a>
								<ul class="dropdown-menu">

									<li><h5 class="heading"><i class="fa fa-search" aria-hidden="true"></i> البحث</h5> </li>
									<li><input type="text" name="" class="form-control" placeholder="كلمة البحث"></li>
									<li role="separator" class="divider"></li>
									<li>
										<select class="form-control">
											<option>كل مجالات التبرع</option>
											<option>التعليم</option>
											<option>الصحة</option>
											<option>المياه والأبار</option>
											<option>الإسكان</option>
											<option>تحسين الدخل</option>
											<option>الكفالات</option>
											<option>مساجد وثقافة</option>
											<option>الصدقات</option>
											<option>الزكاة</option>
										</select>
									</li>
									<li role="separator" class="divider"></li>
									<li>
										<select class="form-control">
											<option>مساهمات</option>
											<option>مشاريع</option>
											<option>كفالات</option>
											<option>إحتياجات كفالات</option>

										</select>
									</li>
									<li role="separator" class="divider"></li>
									<li>
										<select class="form-control">
											<option>كل الدول</option>
											<option>مصر</option>
											<option>السعودية</option>
											<option>الكويت</option>
											<option>البحرين</option>
											<option>الإمارات</option>
											<option>عمان</option>
											<option>العراق</option>
											<option>سوريا</option>
											<option>فلسطين</option>
											<option>ليبيا</option>
											<option>الجزائر</option>
											<option>السودان</option>
										</select>
									</li>
									<li role="separator" class="divider"></li>
									<li>
										<select class="form-control">
											<option>أى مبلغ</option>
											<option>1-1000</option>
											<option>1000-5000</option>
											<option>5000-10000</option>
											<option>10000-15000</option>
											<option>15000-20000</option>
											<option>20000-30000</option>
										</select>
									</li>
									<li role="separator" class="divider"></li>
									<li class="text-center"><button  class="btn search-btn">بحث</button></li>
								</ul>
							</li>
						</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="social-media text-right">
			<div class="col-md-9">
				<label class="pull-left col-md-2 col-xs-3 no-padding">أخر الأخبار</label>
				<marquee class="news-sh col-md-10 col-xs-9 no-padding"  scrolldelay="120" direction="right" onmouseover="this.stop();" onmouseout="this.start();">
                    بسم الله الرحمن الرحيم <img src="<?php echo base_url()?>asisst/web_asset/img/logo.png" width="20" height="20">
                     بسم الله الرحمن الرحيم <img src="<?php echo base_url()?>asisst/web_asset/img/logo.png" width="20" height="20"> 
                     بسم الله الرحمن الرحيم <img src="<?php echo base_url()?>asisst/web_asset/img/logo.png" width="20" height="20"> 
                     بسم الله الرحمن الرحيم <img src="<?php echo base_url()?>asisst/web_asset/img/logo.png" width="20" height="20">
                </marquee>
			</div>
			<div class="col-md-3">
				<a href="#"><img src="<?php echo base_url()?>asisst/web_asset/img/social/facebook.png"></a>
				<a href="#"><img src="<?php echo base_url()?>asisst/web_asset/img/social/google-plus.png"></a>
				<a href="#"><img src="<?php echo base_url()?>asisst/web_asset/img/social/instagram.png"></a>
				<a href="#"><img src="<?php echo base_url()?>asisst/web_asset/img/social/linkedin.png"></a>
				<a href="#"><img src="<?php echo base_url()?>asisst/web_asset/img/social/rss.png"></a>
				<a href="#"><img src="<?php echo base_url()?>asisst/web_asset/img/social/twitter.png"></a>
				<a href="#"><img src="<?php echo base_url()?>asisst/web_asset/img/social/youtube.png"></a>
			</div>
		</div>

	</div>
	<div class="clearfix"></div>
</section>




<div class="clearfix"></div>
<div class="right-nav">
	<nav class="navbar navbar-fixed-left navbar-minimal animate" role="navigation">
		<div class="navbar-toggler animate text-center">
			<span class="menu-icon"></span>تبرع الأن
			<img src="<?php echo base_url()?>asisst/web_asset/img/icons/0-Photo2017-04-04_10-22-05-AM.png" class="heart" width="35" height="35">
		</div>

		<ul class="navbar-menu animate">
			<div>

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">صدقة</a></li>
					<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">كفالات</a></li>
					<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">إفطار صائم</a></li>
					<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">مشاريع</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="col-xs-12 forma">
							<h4>تبرع إفطار</h4>
							<hr>
							<div class="col-xs-6 text-center">
								<select class="form-control">
									<option>كل الدول</option>
									<option>مصر</option>
									<option>السعودية</option>
									<option>الإمارات</option>
									<option>الكويت</option>
									<option>البحرين</option>
								</select>
								<br>

								<select class="form-control">
									<option>العدد</option>

								</select>
								<br>
								<a href="#" class="tbra"><i class="fa fa-heart-o"></i> تبرع الأن</a>


							</div>
							<div class="col-xs-6 text-center">
								<select class="form-control">
									<option>سعر الوحدة</option>
									<option>5</option>
									<option>10</option>
									<option>15</option>
									<option>20</option>
									<option>25</option>
								</select>
								<br>

								<input class="form-control text-center" type="text" disabled="" vtype="number" title="" value="" placeholder="SAR">
								<br>
								<a href="#" class="add"> <i class="fa fa-cart-plus" aria-hidden="true"></i> أضف </a>

							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="profile">
						<div class="col-xs-12 forma">
							<h4 class="text-center">كفالات سريعة</h4>
							<hr>
							<div class="col-xs-6 text-center">
								<select class="form-control">
									<option>فئة المكفول</option>
									<option>مصر</option>
									<option>السعودية</option>
									<option>الإمارات</option>
									<option>الكويت</option>
									<option>البحرين</option>
								</select>
								<br>

								<select class="form-control">
									<option>عدد المكفولين</option>

								</select>
								<br>
								<a href="#" class="tbra"><i class="fa fa-heart-o"></i> تبرع الأن</a>


							</div>
							<div class="col-xs-6 text-center">
								<select class="form-control">
									<option>مبلغ الكفالة</option>
									<option>5</option>
									<option>10</option>
									<option>15</option>
									<option>20</option>
									<option>25</option>
								</select>
								<br>

								<input class="form-control text-center" type="text" disabled="" vtype="number" title="" value="" placeholder="SAR">
								<br>
								<a href="#" class="add"> <i class="fa fa-cart-plus" aria-hidden="true"></i> أضف </a>

							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="messages">
						<div class="col-xs-12 forma">
							<h4>مساهمات</h4>
							<hr>
							<div class="col-xs-12 text-center">
								<select class="form-control">
									<option>صدقة</option>
									<option>نذر</option>
									<option>ذبيحة</option>
									<option>عقيقة</option>
									<option>اطعام مسكين</option>
									<option>كسوة مسكين</option>
								</select>
								<br>
							</div>
							<div class="col-xs-6 text-center">
								<select class="form-control">
									<option>العدد</option>
								</select>
								<br>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">تبرع لمرة واحدة
									</label>
								</div>
								<br>
								<a href="#" class="tbra"><i class="fa fa-heart-o"></i> تبرع الأن</a>
							</div>
							<div class="col-xs-6 text-center">
								<input class="form-control text-center" type="text" disabled="" vtype="number" title="" value="" placeholder="SAR">
								<br>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">شهرياَ
									</label>
								</div>
								<br>
								<a href="#" class="add"> <i class="fa fa-cart-plus" aria-hidden="true"></i> أضف </a>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="settings">...</div>
				</div>

			</div>
		</ul>
	</nav>
</div>



<div class="left-nav">
	
	<ul class="list-unstyled lista" id="myul">
	<li>  <a href="<?php echo base_url()."web/read_instructions"?>">   <button class="left-button">التسجيل</button> </a> </li>
		<li><a href="instructions.html"><img src="<?php echo base_url()?>asisst/web_asset/img/icons/icon5.png" width="24" height="24"><br> أسرة</a></li>
		<li class="divider"></li>
		<li><a href="instructions.html"><img src="<?php echo base_url()?>asisst/web_asset/img/icons/icon11.png" width="24" height="24"><br>كافل</a></li>
	</ul>
	<div class="toggle-left" >
	<a href="#" id="toggle-btn" class=" infinite animated flash"><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
	</div>
</div>

<img class="ramadan-fixed-left visible-lg" src="<?php echo base_url()?>asisst/web_asset/img/ramadan-logo.png" width="220" height="230">

<img class="ramadan-fixed-right visible-lg" src="<?php echo base_url()?>asisst/web_asset/img/helal.png" width="372" height="230">
