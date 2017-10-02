<div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
        <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span>  الشئون الإدارية </h4>
    </div>
    <div class="col-sm-3">
     <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
    </div>
</div>
<div class="col-xs-12 r-bottom">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
        <?php $arr=array("add_employee"=>"إضافة موظف",
                         'add_permits'=>"إضافة إذن",
                         "add_manager_report"=>"إعتماد الأذونات",
                         "add_vacation"=>"إضافة أجازة",
                         "VacationsApproved"=>"اعتماد الاجازات",
                         "emp_attendance"=>"الحضور والإنصراف",
                         "attendance_upload"=>"رفع ملف الحضور والإنصراف",
                         "EvaluationSetting"=>"اعدادات التقييم",
                         "StaffEvaluation"=>"تقييم الموظفين ",
                         "add_penalty"=>"الجزاءات",
                         "all_depart_emp"=>"تقرير الموظفين",
                         'EmployeesDebts'=>'طلبات السلف',
                         "EmployeesDebtsApproved"=>"إعتماد طلبات السلف",
                         "EmployeesDebtsReport"=>"تقرير  طلبات السلف",
                         "all_permissions_alltime"=>"تقرير إحصائى الاذونات",
                         'all_permissions_period'=>"تقرير الاذونات خلال فترة",
                          "all_permissions_emp"=>"اذونات الموظفين");
                         ?>
        
         <?php foreach($arr as $key=>$value):
                          $active=''; 
                          if(isset($update_link) && $update_link !=null){
                           if($update_link == $key){ $active='class="active"';} 
                          }else{
                            if($this->uri->segment(2)== $key){ $active='class="active"';}  
                          } 
                           ?>
                              <li <?php echo $active;?>  ><a  href="<?php echo base_url()."Administrative_affairs/".$key?>">
                                          <?php echo $arr[$key]; ?> </a></li>
                       <?php endforeach; ?>
        <!--    <li class=""><a href="<?php echo base_url()?>Administrative_affairs/attendance_upload">رفع ملف الحضور والإنصراف</a></li>
      -->
  
  
   </ul>
    </div>

                            <?php
                            if(isset($_SESSION['message']))
                                echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            ?>


</div>