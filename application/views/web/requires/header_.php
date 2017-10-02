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
							<li><input type="text" name="user_name" class="form-control" placeholder="رقم السجل المدني"/></li>
							<li><input type="password" name="user_pass" class="form-control" placeholder="الرقم السرى"/></li>
							<li><label for="rememberme"> 
								<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> تذكرنى 
							</label></li>
							<li><button name="login" class="enter" type="submit">دخول</button> </li>
							<li><p class="register">هل أنت مستخدم جديد ؟ <a href="<?php echo base_url()."web/Add_Register"?>">التسجيل</a> </p></li>
							<hr>
					<!--		<li><p class="social">إستخدام حساب <a href="#" class="facebook">فيسبوك</a> <a href="#" class="google">جوجل </a></p></li>
					-->
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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-money" aria-hidden="true"></i> ريال قطرى - QAR <span class="caret"></span></a>

						<ul class="dropdown-menu text-center">
							<li> <a href="#">دولاار أمريكى</a></li>
							<li><a href="#">ريال قطرى</a></li>
							<li><a href="#">ريال سعودى</a></li>
							<li><a href="#">درهم إمارتى</a></li>

						</ul>
					</li>
					<li class="pull-right"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

					
				</ul>
			</div>


		</div>
	</div>

	<section class="middle-nav">
		<div class="container">
			<div class="col-sm-3">
				<a href="index.html"><img src="<?php echo base_url()?>asisst/web_asset/img/logo.png" class="logo"></a>
			</div>

			<div class="col-sm-8 col-sm-offset-1 hidden-xs" >
				<img src="<?php echo base_url()?>asisst/web_asset/img/yatim2.png" class="leftimg">
			</div>

		</div>
	</section>



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
				<a class="navbar-brand" href="#">
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.html">الرئيسية <span class="sr-only">(current)</span></a></li>
					<li><a href="about.html">من نحن</a></li>
					<li><a href="news.html">الأخبار</a></li>
					<li><a href="kfala.html">كفالات</a></li>
					<li><a href="projects.html">مشاريع</a></li>
					<li><a href="departments.html">الإستقطاعات</a></li>
					<li><a href="program.html">برامجنا</a></li>
					<li><a href="contact.html">اتصل بنا</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
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
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
<!-------------------------------------------->