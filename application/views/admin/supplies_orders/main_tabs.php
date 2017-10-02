<div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
        <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span>  أوامر التوريد </h4>
    </div>
    <div class="col-sm-3">
     <h5> <?php echo $_SESSION['user_username']?></h5>
     <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
    </div>
</div>
<div class="col-xs-12 r-bottom">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="<?php if(isset($index)) echo $index; ?>"><a href="<?php echo base_url()?>Supplies_orders/index/0"> إضافة أمر توريد</a></li>
            <li class="<?php if(isset($update_order)) echo $update_order; ?>"><a href="<?php echo base_url()?>Supplies_orders/update_order"> تعديل أمر توريد</a></li>
            <li class="<?php if(isset($index2)) echo $index2; ?>"><a href="<?php echo base_url()?>Exchange_orders/index/0"> إضافة أمر صرف</a></li>
            <li class="<?php if(isset($update_order2)) echo $update_order2; ?>"><a href="<?php echo base_url()?>Exchange_orders/update_order"> تعديل أمر صرف</a></li>
       
        </ul>
    </div>
    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>