<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> برنامج اداره </title>
    <meta name="description" content="Examples for creative website header animations using Canvas and JavaScript" />
    <meta name="keywords" content="header, canvas, animated, creative, inspiration, javascript" />
    <meta name="author" content="Codrops" />

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/owl.transitions.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/owlstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">

    <!-------------- اشكال للناف بار ------------->
    <div class="r-program">
        <div class="col-xs-12 center-logo">
            <div class="col-xs-12  r-contact">
                <div class="col-xs-12  r-back2">
                    <img src="<?php echo base_url()?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block">
                </div>
                <div class="col-md-4 col-sm-2 col-xs-0"></div>
                 	<?php echo form_open('login/check_login',array('role'=>'form'))?>
                <div class="col-md-4 col-sm-8 col-xs-12 r-enter">
                    <h3 class="text-center">
                    <span><i class="fa fa-key" aria-hidden="true"></i></span> تسجيل دخول </h3>
                    <div class="form-group center-block">
                    	<?php if(isset($response)):?>
						<h5 class="alert  text-center rtl" style="background:#D5402B">
                        <i class="fa fa-lock fa-fw fa-spin icn-xs"></i><?php echo $response;?></h5>
						<?php endif?>
                        <input type="text" class="form-control"  name="user_name"  placeholder="اسم المستخدم">
                    </div>
                    <div class="form-group center-block">
                        <input type="password" name="user_pass" class="form-control" placeholder=" كلمه المرور ">
                    </div>
                    <div class="col-xs-12 r-button">
                        <div class="col-xs-6">
                           <input class="btn center-block" name="login" type="submit"  value="دخول"/> 
                        </div>
                        <div class="col-xs-6">
                            <button class="btn center-block"> <a href="">تسجيل</a> </button>
                        </div>
                    </div>
                </div>
                      <?php  echo form_close()?>   
                <div class="col-md-4 col-sm-2 col-xs-0"></div>
            </div>
        </div>
    </div>

    <!--------------------------------------->

    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/owl.carousel.min.js"></script>
</body>

</html>