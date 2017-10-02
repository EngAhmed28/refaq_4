<div class="col-xs-12 r-side-table">
                <div class="col-sm-9">
                    <h4> <span> <i class="fa fa-file" aria-hidden="true"></i></span>  التقارير </h4>
                </div>
                <div class="col-sm-3">
                    <h5> <?php echo $_SESSION['user_username']?></h5>
                    <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                </div>
            </div>
<div class="col-xs-12 r-bottom">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="<?php if(isset($drivers)) echo $drivers; ?>"><a href="<?php echo base_url()?>dashboard/R_drivers">تقرير بأسماء السائقين</a></li>
            <li class="<?php if(isset($status)) echo $status; ?>"><a href="<?php echo base_url()?>dashboard/R_driver_status">تقرير بحالة السائقين والسيارات</a></li>
            <li class="<?php if(isset($violatin)) echo $violatin; ?>"><a href="<?php echo base_url()?>dashboard/R_violation">تقرير بالمخالفات خلال فترة</a></li>
            <li class="<?php if(isset($carss)) echo $carss; ?>"><a href="<?php echo base_url()?>dashboard/R_cars">بيان عام لكل السيارات </a></li>
        </ul>
    </div>
    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>