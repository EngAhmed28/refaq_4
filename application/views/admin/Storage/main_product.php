<div class="col-sm-11 col-xs-12">
    <!--div class="col-xs-12 r-side-table">
        <div class="col-sm-9">
            <h4> <span> <i class="fa fa-users" aria-hidden="true"></i></span> إدارة المخازن  </h4>
        </div>
        <div class="col-sm-3">
            <h5> موظف استقبال </h5>
            <h5>   اخر دخول  : 27 / 5 / 2017</h5>
        </div>
    </div-->

    <!---form------>
    
     <?php
            $this->load->view('admin/Storage/main_tables'); 
            ?>

    <?php if(isset($results)):?>

    <?php echo form_open_multipart('dashboard/update_main_product/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

    <div class="details-resorce">


        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12 r-inner-details">
                <div class="col-xs-12">
                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-3">
                                <h4 class="r-h4"> اسم الفئة الرئيسية للأصناف </h4>
                            </div>
                            <div class="col-sm-9 r-input">
                                <input type="text" class="r-inner-h4 " value="<?php echo $results['p_name'] ?>" name="p_name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 " style="margin-right: 400px">
                    <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
                </div>

            </div>

            <?php echo form_close()?>

        </div>

        <?php else: ?>

            <?php echo form_open_multipart('dashboard/add_main_product',array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">


                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-3">
                                    <h4 class="r-h4"> اسم الفئة الرئيسية للأصناف </h4>
                                </div>
                                <div class="col-sm-9 r-input">
                                    <input type="text" class="r-inner-h4 " name="p_name" required>
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
                                    <th class="text-center"> اسم الفئة الرئيسية للأصناف </th>
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
                                            <td>  <?php echo $record->p_name; ?> </td>
                                            <td><a href="<?php echo base_url('dashboard/delete_main_product').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_main_product').'/'.$record->id ?>"> تعديل </a> </td>
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

