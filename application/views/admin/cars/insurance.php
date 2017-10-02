<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['insurance'] = 'active'; 
            $this->load->view('admin/cars/main_tabs1',$data); 
            ?>
    <!---form------>

    <?php if(isset($results)):?>

    <?php echo form_open_multipart('dashboard/update_insurance/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

    <div class="details-resorce">

        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> اسم الشركة </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="text" class="r-inner-h4 " name="name"  value="<?php echo $results['name'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> رقم الهاتف </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="number" class="r-inner-h4 " name="tele" value="<?php echo $results['tele'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> العنوان </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="text" class="r-inner-h4 " name="address" value="<?php echo $results['address'] ?>" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 " style="margin-right: 400px">
                <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
            </div>

        </div>


        <?php else: ?>

            <?php echo form_open_multipart('dashboard/add_insurance',array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">


                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> اسم الشركة </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="text" class="r-inner-h4 " name="name" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> رقم الهاتف </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="number" class="r-inner-h4 " name="tele" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> العنوان </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="text" class="r-inner-h4 " name="address" required/>
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
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true">
                            <option data-subtext=""> بـحــث . . . . </option>

                            <option data-subtext=" " disabled="disabled"> none </option>
                        </select>
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center"> م </th>
                                    <th class="text-center"> اسم الشركة </th>
                                    <th class="text-center"> رقم الهاتف </th>
                                    <th class="text-center"> العنوان </th>

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
                                            <td>  <?php echo $record->tele; ?> </td>
                                            <td>  <?php echo $record->address; ?> </td>
                                            <td><a href="<?php echo base_url('dashboard/delete_insurance').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_insurance').'/'.$record->id ?>"> تعديل </a> </td>
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