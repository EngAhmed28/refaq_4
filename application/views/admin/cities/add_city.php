
            <div class="col-sm-11 col-xs-12">
                <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-users" aria-hidden="true"></i></span> مجلس الادارة</h4>
                    </div>
                    <div class="col-sm-3">
                      <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                    </div>
                </div>
                 <div class="col-xs-12 r-bottom">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <?php 
                             $active2=''; $active='';$active3='';
                            if($this->uri->segment(2) == 'add_city' || $this->uri->segment(2) == 'update_city' ){
                                $active='active';
                               
                            }elseif($this->uri->segment(2) == 'add_neighborhood' || $this->uri->segment(2) == 'update_neighborhood'){
                                $active2='active';

                            }elseif($this->uri->segment(2) == 'definitions_devides' || $this->uri->segment(2) == 'update_definitions_devides'){
                                 $active3='active';
                            }
                            ?>
                            <li class="<? echo $active;?>"><a href="<?php echo base_url()?>Dashboard/add_city"> إضافة مدينة  </a></li>
                            <li class="<? echo $active2;?>"><a href="<?php echo base_url()?>Dashboard/add_neighborhood"> إضافة حي  </a></li>
                            <li class="<? echo $active3;?>"><a href="<?php echo base_url()?>Dashboard/definitions_devides"> إضافة جهاز منزلى </a></li>
                        </ul>
                    </div>


                </div>



            <?php if(isset($results)):?>

            <?php echo form_open_multipart('dashboard/update_city/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">إسم المدينة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="name" value="<?php echo $results['main_dep_name'] ?>" >
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block"   name="update" value="حفظ" />
                        </div>
                    </div>

                </div>
                <?php echo form_close()?>


            <?php else: ?>

            <?php echo form_open_multipart('dashboard/add_city',array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">إسم المدينة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="name" >
                                    </div>
                                </div>

                            </div>

                        </div>
                <div class="col-xs-3"></div>
                        <div class="col-xs-3">
                            <input type="submit" role="button"  class="btn btn-blue btn-next"   name="add" value="حفظ" />
                        </div>
                        <?php echo form_close()?>

                    </div>

                <!---table------>
                <?php if(isset($records)):?>


                <div class="col-xs-12">
                        <div class="panel-body">
                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">إسم المدينة</th>
                                            <th class="text-center">الاجراء</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php if(isset($records)&&$records!=null):?>

                                    <?php
                                    $a=1;
                                    foreach ($records as $record ):


                                        ?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><?php echo $record->main_dep_name; ?></td>
                                            <td><!-- <a href="<?php echo base_url('dashboard/delete_main_depart').'/'.$record->id ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span> --> <a href="<?php echo base_url('dashboard/update_city').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>

                                        </tr>

                                        <?php
                                        $a++;
                                    endforeach;  ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>


            </div>
            <?php endif; ?>