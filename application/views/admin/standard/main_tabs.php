<div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
        <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span>  إعدادات الأصناف </h4>
    </div>
    <div class="col-sm-3">
     <h5> <?php echo $_SESSION['user_username']?></h5>
     <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
    </div>
</div>
<div class="col-xs-12 r-bottom">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="<?php if(isset($standard)) echo $standard; ?>"><a href="<?php echo base_url()?>Products/standard/0">إضافة معايير لتركيبات الأصناف</a></li>
            <li class="<?php if(isset($update_standard)) echo $update_standard; ?>"><a href="<?php echo base_url()?>Products/update_standard">تعديل معايير لتركيبات الأصناف</a></li>
            <li class="<?php  if(isset($update_order)) echo $update_order; ?>"><a href="<?php echo base_url()?>Products/index/0"> إضافة أمر تشغيل  </a></li>
        </ul>
    </div>
    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>