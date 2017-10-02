<div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
        <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span>  العلاقات العامة والإعلام </h4>
    </div>
    <div class="col-sm-3">
     <h5> <?php echo $_SESSION['user_username']?></h5>
     <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
    </div>
</div>
<div class="col-xs-12 r-bottom">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="<?php if(isset($index)) echo $index; ?>"><a href="<?php echo base_url()?>Public_relations/index/0"> إضافة مجالات التبرع الرئيسية</a></li>
            <li class="<?php if(isset($sub_fields)) echo $sub_fields; ?>"><a href="<?php echo base_url()?>Public_relations/sub_fields/0">إضافة مجالات التبرع الفرعية</a></li>
            <li class="<?php if(isset($work_donation)) echo $work_donation; ?>"><a href="<?php echo base_url()?>Public_relations/work_donation/0">إضافة أعمال مجالات التبرع</a></li>
            <li class="<?php if(isset($main_data)) echo $main_data; ?>"><a href="<?php echo base_url()?>Public_relations/add_main_data">البيانات الأساسية للجمعية</a></li>
            <li class="<?php if(isset($about_us)) echo $about_us; ?>"><a href="<?php echo base_url()?>Public_relations/about_us">عن الجمعية</a></li>
            <li class="<?php if(isset($news)) echo $news; ?>"><a href="<?php echo base_url()?>Public_relations/add_news">الأخبار</a></li>
            <li class="<?php if(isset($opinion)) echo $opinion; ?>"><a href="<?php echo base_url()?>Public_relations/add_opinion">الآراء عن الجمعية</a></li>
            <li class="<?php if(isset($success)) echo $success; ?>"><a href="<?php echo base_url()?>Public_relations/success/0">شركاء النجاح</a></li>
            <li class="<?php if(isset($program)) echo $program; ?>"><a href="<?php echo base_url()?>Public_relations/programs/0">إضافة برنامج</a></li>
            <li class="<?php if(isset($program_about)) echo $program_about; ?>"><a href="<?php echo base_url()?>Public_relations/programs_about/0">عن برنامج</a></li>
        </ul>
    </div>
    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>