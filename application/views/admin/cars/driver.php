<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
    <div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
        <h4> <span> <i class="fa fa-users" aria-hidden="true"></i></span>  السائقين </h4>
    </div>
    <div class="col-sm-3">
     <h5> <?php echo $_SESSION['user_username']?></h5>
     <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
    </div>
</div>
<div class="col-xs-12 r-bottom">
    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>

    <!---form------>

    <?php if(isset($results)):?>

    <?php echo form_open_multipart('dashboard/update_driver/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

    <div class="details-resorce">

        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> كود السائق </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="text" class="r-inner-h4 " name="driver_code" value="<?php echo $results['driver_code'] ?>"  readonly />
                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> اسم السائق </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="text" class="r-inner-h4 " name="driver_name" value="<?php echo $results['driver_name'] ?>" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> رقم البطاقة </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="number" class="r-inner-h4 " name="driver_card" value="<?php echo $results['driver_card'] ?>" required />
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xs-12">
                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> العنوان </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="text" class="r-inner-h4 " name="driver_address" value="<?php echo $results['driver_address'] ?>" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> رقم الرخصة </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="number" class="r-inner-h4 " name="driver_license_code" value="<?php echo $results['driver_license_code'] ?>" required />
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xs-4 " style="margin-right: 400px">
                <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
            </div>

        </div>


        <?php else: ?>

            <?php echo form_open_multipart('dashboard/add_driver',array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">


                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> كود السائق </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="text" class="r-inner-h4 " name="driver_code" value="<?php


                                    if($last ==null) {
                                        echo   $last=1;
                                    }else{

                                        $a= $last[0]->id;
                                        echo $a+1;
                                    }

                                    ?>"  readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> اسم السائق </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="text" class="r-inner-h4 " name="driver_name" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> رقم البطاقة </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="number" class="r-inner-h4 " name="driver_card" required />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12">
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> العنوان </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="text" class="r-inner-h4 " name="driver_address" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> رقم الرخصة </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="number" class="r-inner-h4 " name="driver_license_code" required />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-4 " style="margin-right: 400px">
                        <input type="submit" class="btn btn-blue btn-next"  name="add" value="حفظ" />
                    </div>

                </div>

                <?php echo form_close()?>

            </div>
            <!--end-form------>

            <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12 r-secret-table">
                    <div class="panel-body">

                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center"> م </th>
                                    <th class="text-center"> كود السائق  </th>
                                    <th class="text-center"> اسم السائق  </th>
                                    <th class="text-center"> رقم البطاقة  </th>
                                    <th class="text-center"> العنوان  </th>

                                    <th class="text-center"> رقم الرخصة </th>
                                    <th class="text-center"> الاجراء </th>
                                </tr>
                                </thead>
                                <tbody class="text-center">

                                <?php if(isset($records)&&$records!=null):?>

                                    <?php
                                    $a=1;

                                    foreach ($records as $record ): ?>
                                        <tr>
                                            <td><?php echo $a ?> </td>
                                            <td>  <?php echo $record->driver_code; ?> </td>
                                            <td>  <?php echo $record->driver_name; ?> </td>
                                            <td>  <?php echo $record->driver_card; ?> </td>
                                            <td>  <?php echo $record->driver_address; ?> </td>
                                            <td>  <?php echo $record->driver_license_code; ?> </td>
                                            <td><a href="<?php echo base_url('dashboard/delete_driver').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_driver').'/'.$record->id ?>"> تعديل </a> </td>
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
                <!--end-table------>
            <?php endif; ?>
        <?php endif; ?>
    </div>


</div>
    </div>
</div>