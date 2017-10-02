<div class="col-xs-12 r-side-table">
                <div class="col-sm-9">
                    <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span>  صيانة السيارات </h4>
                </div>
                <div class="col-sm-3">
                    <h5> <?php echo $_SESSION['user_username']?></h5>
                    <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                </div>
            </div>
<div class="col-xs-12 r-bottom">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="<?php if(isset($crashes)) echo $crashes; ?>"><a href="<?php echo base_url()?>dashboard/car_crash/0">أعطال السيارات</a></li>
            <li class="<?php if(isset($carsh_index)) echo $carsh_index; ?>"><a href="<?php echo base_url()?>dashboard/crashes_index">بيان الأعطال</a></li>
        </ul>
    </div>
    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>