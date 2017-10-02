 <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-users" aria-hidden="true"></i></span> شؤون الاسرة </h4>
                    </div>
                    <div class="col-sm-3">
                        <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                    </div>
                </div>
                <div class="col-xs-12 r-bottom">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                     <?php    $active='';if(isset($is_active)){$active='class="active"';}?>
                    <li <?php echo $active;?> ><a href="<?php echo  base_url()."Family"?>"> الاسرة الجديده </a></li>
                    
                 <?php $arr=array('approved_family'=>"الاسرة المعتمده ",
                                  'archives_family'=>"ارشيف الاسر",
                                  'family_services'=>" خدمات الاسر ",
                                  'certified_services'=>" خدمات معتمده ",
                                  'services_archive'=>"ارشيف خدمات"); ?>       
                      <?php foreach($arr as $key=>$value):
                          $active=''; if($this->uri->segment(2)== $key){$active='class="active"';} ?>   
                              <li <?php echo $active;?>  ><a  href="<?php echo base_url()."Family/".$key?>"><?php echo $arr[$key]; ?> </a></li>
                       <?php endforeach; ?>
                        </ul>
                    </div>
                    </div>
             