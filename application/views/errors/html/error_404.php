<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>صفحة خطا</title>
	<meta name="keywords" content="نظام اجيال لادارة الرسوم المدرسية" />
	<meta http-equiv="refresh" content="1;url=<?php echo base_url()?>">

	<link href="<?php echo  base_url("asisst/404/css/style.css")?>" rel="stylesheet" type="text/css"  media="all" />
	<link rel="shortcut icon" href="<?php echo base_url()?>asisst/img/favicon.png"/>

</head>
<body>
<!--start-wrap--->
<div class="wrap">
	<!---start-header---->
	<div class="header">
		<div class="logo">
			<h1><a href="<?php echo base_url()?>">خطأ</a></h1>
		</div>
	</div>
	<!---End-header---->
	<!--start-content------>
	<div class="content">
		<img src="<?php echo  base_url("asisst/404/images/error-img.png")?>" title="error" />
		<p><span><label> </label><?php echo $heading; ?></span><?php echo $message; ?></p>
		<a href="<?php echo base_url()?>">الصفحة الرئيسية</a>
		<div class="copy-right">
			<p>&#169 حقوق الدعم محفوظة ل <a href="http://alatheertech.com/">شركة الاثير تك لتقنية المعلومات </a></p>
		</div>
	</div>
	<!--End-Cotent------>
</div>
<!--End-wrap--->
</body>
</html>
