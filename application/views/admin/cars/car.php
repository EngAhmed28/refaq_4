<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['car'] = 'active'; 
            $this->load->view('admin/cars/main_tabs1',$data); 
            ?>
    <!---form------>

    <?php if(isset($results)):?>

    <?php echo form_open_multipart('dashboard/update_car/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

    <div class="details-resorce">

        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> نوع السيارة </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="text" class="r-inner-h4 " name="name"  value="<?php echo $results['name'] ?>" required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xs-4 " style="margin-right: 400px">
                <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
            </div>

        </div>


        <?php else: ?>

            <?php echo form_open_multipart('dashboard/add_car',array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">


                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> نوع السيارة </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="text" class="r-inner-h4 " name="name" required/>
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
                                    <th class="text-center"> نوع السيارة </th>
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
                                            <td>  <?php echo $record->name; ?> </td>
                                            <td><a href="<?php echo base_url('dashboard/delete_car').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_car').'/'.$record->id ?>"> تعديل </a> </td>
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