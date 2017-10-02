          <div class="col-sm-11 col-xs-12">
               
                <!--  -->
                	<?php $this->load->view('admin/finance_accounting/sandat_tabs'); ?>
               <!--  --> 
                <div class="details-resorce">
                  
 <!-------------------------------------------------------------------------------------------------------------------------> 
    <div class="col-md-6 r-sanad-col-md  r-show-sanad-data">
    <div class="col-xs-12 r-inner-details r-inner-details-bord">
        <div class="col-xs-12 r-sanads">
             <ul id="menu-group-1" class="nav">
             
             <!---- 1 --> 
             <?php  $i=1; foreach($levels as $level ):?>
                <li class="parent parent-bottom">
                    <a class="" href="#">
                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#item-<?php echo $i?>" class="sign"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="lbl"><?php echo $level->name?></span>
                    </a>
                    
                    
                    
                    <ul class="collapse" id="item-<?php echo $i?>">
                       
                       <?php  if(sizeof($level->sub) >0):
                         $leve_1=1; foreach($level->sub as $level_one): ?>
                        <!--- 2 -->
                        <li class="parent active">
                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-<?php echo $leve_1?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            <span class="lbl"> <?php echo $level_one->name?> </span>
                            <button class="btn btn-success sanad-btn pull-right"> <i class="fa fa-pencil" aria-hidden="true"></i></button>
                            <button class="btn btn-primary sanad-btn pull-right"><i class="fa fa-plus " aria-hidden="true"></i></button>

                            <ul class="collapse" id="sub-item-<?php echo $leve_1?>">
                               
                                <?php  if(sizeof($level_one->sub) >0):
                         $leve_2=1; foreach($level_one->sub as $level_two): ?>
                               <!--- 3 -->
                                <li class="parent active">
                                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-<?php echo $leve_2?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    <span class="lbl"><?php echo $level_two->name?></span>
                                    <button class="btn btn-danger sanad-btn pull-right"> <i class="fa fa-trash-o " aria-hidden="true"></i></button>
                                    <button class="btn btn-success sanad-btn pull-right"> <i class="fa fa-plus " aria-hidden="true"></i></button>
                                </li>

                                <li>
                                    <ul class="collapse" id="sub-<?php echo $leve_2?>">
                                       
                                        <?php  if(sizeof($level_two->sub) >0):
                                         $leve_3=1; foreach($level_two->sub as $leve_three): ?>
                                       <!---- 4 ------>
                                        <li class="parent active">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#subitem-<?php echo $leve_3?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                            <span class="lbl"> <?php echo $leve_three->name?> </span>
                                            <button class="btn btn-danger sanad-btn pull-right"> <i class="fa fa-trash-o " aria-hidden="true"></i></button>
                                            <button class="btn btn-success sanad-btn pull-right"> <i class="fa fa-plus " aria-hidden="true"></i></button>

                                        </li>
                                        <li>
                                            <ul class="collapse" id="subitem-<?php echo $leve_3?>">
                                               <?php  if(sizeof($leve_three->sub) >0):
                                         $leve_4=1; foreach($leve_three->sub as $leve_four): ?>
                                               <!-- 5 ------>
                                                <li class="parent active">
                                                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#s-item-<?php echo $leve_4?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <span class="lbl"><?php echo $leve_four->name?> </span>
                                                    <button class="btn btn-danger sanad-btn pull-right"> <i class="fa fa-trash-o " aria-hidden="true"></i></button>
                                                    <button class="btn btn-success sanad-btn pull-right"> <i class="fa fa-plus " aria-hidden="true"></i></button>

                                                </li>
                                                 <?php $leve_4++;  endforeach;endif; ?>
                                               <!-- 5 ------> 
                                            </ul>

                                        </li>
                                         <?php $leve_3++;  endforeach;endif; ?>
                                  <!---- 4 ------>
                                    </ul>

                                </li>
                                 <?php $leve_2++;  endforeach;endif; ?>
                               <!--- 3 -->
                            </ul>


                        </li>
                        <?php $leve_1++;  endforeach;endif; ?>
                        <!--- 2 -->
                        
                        
                    </ul>
                    
                </li>
                 <?php  $i++; endforeach?>
                <!---- 1 -->                   
                                   
                                   
                                   
                                </ul>
                          
        </div>
    </div>
</div>

                </div>
            </div>
   