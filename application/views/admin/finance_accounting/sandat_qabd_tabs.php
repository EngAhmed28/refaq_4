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
                
                
                
                
                <!--
                <div class="col-xs-12 r-bottom">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#"> سندات القبض </a></li>
                            <li><a href="#"> تعديل سندات القبض </a></li>
                            <li><a href="#"> ترحيل سندات القبض  </a></li>
                            <li><a href="#"> سندات الصرف </a></li>
                            <li><a href="#"> تعديل سندات الصرف </a></li>
                            <li><a href="#"> ترحيل سندات الصرف  </a></li>
                        </ul>
                    </div>
                </div>
                -->
                
                           <div class="col-xs-12 r-bottom">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                     <?php    $active='';if(isset($is_active)){$active='class="active"';}?>
                <!--<li <?php echo $active;?> ><a href="<?php echo  base_url()."admin/Finance_accounting"?>"> سندات  </a></li>
                    -->
                 <?php $arr=array('sand_qabd'=>" سند القبض  ",
                                  'deport_kabd_sanad'=>"ترحيل سندات القبض",
                                  'kabd_deport_sheck'=>'إيداع الشيكات بالبنك ',
                                  'deport_deposit_kabd_sheek'=>"ترحيل الشيكات تحت التحصيل ",
                                  'accept_refuse_sheck'=>"تحصيل الشيكات تحت التحصيل"
                                
                                 ); ?>       
                      <?php foreach($arr as $key=>$value):
                          $active=''; if($this->uri->segment(3)== $key){$active='class="active"';} ?>   
                              <li <?php echo $active;?>  ><a  href="<?php echo base_url()."admin/Finance_accounting/".$key?>"><?php echo $arr[$key]; ?> </a></li>
                       <?php endforeach; ?>
                        </ul>
                    </div>
                    </div>
                
                