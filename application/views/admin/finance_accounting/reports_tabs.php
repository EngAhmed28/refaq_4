 
 
 <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-money" aria-hidden="true"></i></span>
                          
                          <a style="color: white;" href="<?php echo  base_url()."Dashboard/finance"?>"> 
                          
                           الشؤون المالية والمحاسبة
                           
                           
                            </a>
                           
                             
                             
                             </h4>
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
                <!--<li <?php echo $active;?> ><a href="<?php echo  base_url()."admin/Finance_accounting"?>"> سندات  </a></li>
                    -->
                 <?php $arr=array('add_receipt_report'=>" السندات خلال فترة   ",
                                  'add_receipt_report_day'=>"السندات خلال اليوم ",
                                    'R_Report'=>"ارصدة الحسابات ",
                                      'R_select_account'=>"تقرير تفصيلي  لحركة كل حساب "
                                 
                               
                                
                                 ); ?>       
                      <?php foreach($arr as $key=>$value):
                          $active=''; if($this->uri->segment(3)== $key){$active='class="active"';} ?>   
                              <li <?php echo $active;?>  ><a  href="<?php echo base_url()."admin/Finance_accounting/".$key?>"><?php echo $arr[$key]; ?> </a></li>
                       <?php endforeach; ?>
                        </ul>
                    </div>
                    </div>
                
                