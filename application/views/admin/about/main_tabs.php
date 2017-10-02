 <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-database" aria-hidden="true"></i></span>
                            البيانات الأساسية  </h4>
                    </div>
                    <div class="col-sm-3">
                         <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                    </div>
                </div>
                <div class="col-xs-12 r-bottom">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                          <!--  <li class="active"><a href="#"> البيانات الاساسية </a></li>
                            <li><a href="#">عن الجمعية</a></li>
                            <li><a href="#"> أهداف الجمعية </a></li>
                            <li><a href="#">أخبار الجمعية </a></li>
                            <li><a href="#"> طرق التبرع </a></li> -->
                <?php $arr=array('main_data'=>"البيانات الأساسية ",
                                 'about'=>" عن الجمعية",
                                 'goals'=>"أهداف الجمعية",
                                 'news'=>"أخبار الجمعية",
                                 'main_ways_donate'=>" طرق التبرع"); ?>
                      <?php foreach($arr as $key=>$value):
                          $active=''; 
                          if(isset($update_link) && $update_link !=null){
                           if($update_link == $key){ $active='class="active"';} 
                          }else{
                            if($this->uri->segment(3)== $key){ $active='class="active"';}  
                          } 
                           ?>
                              <li <?php echo $active;?>  ><a  href="<?php echo base_url()."admin/About_association/".$key?>">
                                          <?php echo $arr[$key]; ?> </a></li>
                       <?php endforeach; ?>
                        </ul>
                    </div>
                </div>