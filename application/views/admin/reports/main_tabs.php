<div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
        <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span> إدارة التقارير </h4>
    </div>
    <div class="col-sm-3">
     <h5> <?php echo $_SESSION['user_username']?></h5>
     <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
    </div>
</div>
<div class="col-xs-12 r-bottom">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="<?php if(isset($index)) echo $index; ?>"><a href="<?php echo base_url()?>Reports/index/0">تقارير أوامر التوريد والصرف خلال فتره </a></li>
            <li class="<?php if(isset($all_products)) echo $all_products; ?>"><a href="<?php echo base_url()?>Reports/all_products"> تقرير حركة مخزون </a></li>

        </ul>
    </div>
    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>