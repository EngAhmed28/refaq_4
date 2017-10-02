            <div class="col-sm-11 col-xs-12">
                <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-desktop" aria-hidden="true"></i></span> إدارة السكرتارية  </h4>
                    </div>
                    <div class="col-sm-3">
                          <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                    </div>
                </div>
                <div class="col-xs-12 r-bottom">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="<?php echo base_url()?>admin/Secretary/secretary_part"> أضافة الجهات والمعاملات  </a></li>
                            <li><a href="<?php echo base_url()?>admin/Secretary/secretary_export"> أضافة الصادر </a></li>
                            <li><a href="<?php echo base_url()?>admin/Secretary/secretary_import"> أضافة الوارد </a></li>
                            <li><a href="<?php echo base_url()?>admin/Secretary/searchreport"> التقرير </a> </li>
                            <li><a href="<?php echo base_url()?>admin/Secretary/search_details">التقرير 2 </a></li>
                        </ul>
                    </div>
                </div>
                <div class="details-resorce">

                    <div class="col-xs-12 r-inner-details">

<span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);

?>
    </span>
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">    تحديد جهة / معاملة </h4>
                                    </div>
                                    <div class="col-xs-6 ">
                                        <form class="r-block">
                                            <?php if(isset($results)):?>
                                                 <?php if($results['type_id_fk']==2): ?>
                                                         <input type="radio" class="r-radio"  name="" id="r-style" checked="" /> معاملة
                                                    <?php else: ?>
                                                         <input type="radio" class="r-radio" name=""  id="r-geha" checked="" /> جهة
                                                  <?php endif; ?>
                                            <?php else: ?>
                                                <input type="radio" class="r-radio" name="gender"  id="r-geha" checked /> جهة
                                                <input type="radio" class="r-radio"  name="gender" id="r-style" /> معاملة
                                            <?php endif; ?>


                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            </div>
                        </div>


                        <?php if(isset($results)):?>
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                            <?php if($results['type_id_fk']==2): ?>
                            <div class="col-xs-12">
                                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">

                                    <?php echo form_open_multipart('admin/Secretary/update_secretary_part/'.$results['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
                                    <div class="col-xs-12 r-geha">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> اسم المعاملة    </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" class="r-inner-h4 " width="100px" value="<?php echo $results['name'] ?> " name="name">
                                        </div>
                                        <div class="col-xs-12 r-input">
                                            <input type="submit" class="btn btn-blue btn-next"  name="update_part" value="حفظ و إستمرار" />
                                        </div>
                                    </div>
                                    <?php echo form_close()?>
                                    <?php else: ?>
                                <?php echo form_open_multipart('admin/Secretary/update_secretary_part/'.$results['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

                                    <div class="col-xs-12 r-geha">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> اسم الجهة    </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" class="r-inner-h4 " value=" <?php echo $results['name'] ?>" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 r-geha">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> العنوان  </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" class="r-inner-h4 "  value=" <?php echo $results['address'] ?>" name="address" >
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12 r-geha">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">   الجوال  </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" class="r-inner-h4 "  value=" <?php echo $results['mob'] ?>" name="mob" >
                                        </div>
                                    </div>
                                    <div class="col-xs-12 r-geha">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> الايميل  </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="email" class="r-inner-h4 " value=" <?php echo $results['email'] ?>" name="email" >
                                        </div>
                                        <div class="col-xs-7 r-input">
                                            <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ و إستمرار" />
                                        </div>
                                    </div>

                                </div>
                                <?php echo form_close()?>
</div></div>
                                <?php endif; ?>



                        <?php else: ?>
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                                <?php echo form_open('admin/Secretary/secretary_part',array('class'=>"",'role'=>"form" ))?>
                                <div class="col-xs-12 r-style">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> اسم المعاملة    </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="name" required>
                                    </div>
                                    <div class="col-xs-4 r-input">
                                        <input type="submit" class="btn btn-blue btn-next"  name="submit" value="حفظ و إستمرار" />
                                    </div>
                                </div>
                                <?php echo form_close()?>

                                <?php echo form_open('admin/Secretary/secretary_part',array('class'=>"",'role'=>"form" ))?>

                                <div class="col-xs-12 r-geha">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> اسم الجهة    </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 "  name="name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 r-geha">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> العنوان  </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="address" required>
                                    </div>
                                     <div class="col-xs-4 r-input">
                                    <input type="submit" class="btn btn-blue btn-next"  name="add" value="حفظ " />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12 r-geha">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">   الجوال  </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="number" class="r-inner-h4 " name="mob" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 r-geha">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> الايميل  </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="email" class="r-inner-h4 " name="email" required>
                                    </div>
                                   
                                </div>

                            </div>
                            <?php echo form_close()?>

                        </div>

                    </div>

                        <div class="col-xs-12 r-secret-table">
                        <div class="col-xs-12 r-inner-details table-geha">
                            <?php if(isset($records)&&$records!=null):?>

                                <table style="width:100%">
                                <tr>
                                    <th> م </th>
                                    <th> اسم الجهة </th>
                                    <th> الجوال </th>
                                    <th> العنوان</th>
                                    <th> الاصدار </th>
                                </tr>
                                <?php
                                $x=1;
                                foreach ($records as $record): ?>

                                <tr>
                                    <td> <?php echo $x; ?> </td>
                                    <td>  <?php echo $record->name  ?> </td>
                                    <td>  <?php echo $record->mob  ?> </td>
                                    <td>  <?php echo $record->address  ?> </td>
                                    <td> <a href="<?php echo base_url('admin/Secretary/delete_secretary_part').'/'.$record->id ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> / 
                                    </span> <a href="<?php echo base_url('admin/Secretary/update_secretary_part').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                </tr>
                                    <?php
                                    $x++;
                                endforeach; ?>

                            </table>
                            <?php endif; ?>

                        </div>
                            <?php if(isset($parts)&&$parts!=null):?>

                            <div class="col-xs-12 r-inner-details table-style">
                            <table style="width:100%">
                                <tr>
                                    <th> م </th>
                                    <th> اسم المعاملة </th>
                                    <th> الاصدار </th>
                                </tr>
<?php
$x=1;

foreach ($parts as $record): ?>

                                <tr>
                                    <td> <?php echo $x; ?> </td>
                                    <td> <?php echo $record->name  ?> </td>
                                    <td> <a href="<?php echo base_url('admin/Secretary/delete_secretary_part').'/'.$record->id ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> / 
                                    </span> <a href="<?php echo base_url('admin/Secretary/update_secretary_part').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                </tr>
<?php
$x++;
endforeach; ?>



                            </table>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
                <?php endif; ?>
