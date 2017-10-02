<div class="col-sm-11 col-xs-12">
    <div class="col-xs-12 r-side-table">
        <div class="col-sm-9">
            <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span> إعدادات المخازن  </h4>
        </div>
        <div class="col-sm-3">
            <h5> <?php echo $_SESSION['user_username']?> </h5>
            <h5>   اخر دخول  : <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
        </div>
    </div>

    <!---form------>

    <?php if(isset($results)):?>

        <?php echo form_open_multipart('dashboard/update_storage/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

        <div class="details-resorce">


            <div class="col-xs-12 r-inner-details">
                <div class="col-xs-12">
                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-3">
                                <h4 class="r-h4"> اسم المخزن </h4>
                            </div>
                            <div class="col-sm-9 r-input">
                                <input type="text" class="r-inner-h4 " name="storage_name" value="<?php echo $results['storage_name'] ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-3">
                                <h4 class="r-h4"> كود المخزن  </h4>
                            </div>
                            <div class="col-sm-9 r-input">
                                <input type="text" class="r-inner-h4 " value="<?php echo $results['id'] ?>" readonly>
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

        <?php echo form_open_multipart('dashboard/add_storage',array('class'=>"",'role'=>"form" ))?>

        <div class="details-resorce">


            <div class="col-xs-12 r-inner-details">
                <div class="col-xs-12">
                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-3">
                                <h4 class="r-h4"> اسم المخزن </h4>
                            </div>
                            <div class="col-sm-9 r-input">
                                <input type="text" class="r-inner-h4 " name="storage_name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-3">
                                <h4 class="r-h4"> كود المخزن  </h4>
                            </div>
                            <div class="col-sm-9 r-input">
                                <input type="text" class="r-inner-h4 " value="<?php


                                if($last ==null) {
                                    echo   $last=1;
                                }else{

                                  $a= $last[0]->id;
                                    echo $a+1;
                                }

                                  ?>"  readonly>
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
                                <th class="text-center"> كود المخزن </th>
                                <th class="text-center"> اسم المخزن </th>
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
                                        <td>  <?php echo $record->id; ?> </td>
                                        <td>  <?php echo $record->storage_name; ?> </td>
                                        <td><a href="<?php echo base_url('dashboard/delete_storage').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_storage').'/'.$record->id ?>"> تعديل </a> </td>
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

<!--

<script>
    function lood(num,div,page){
        var cleer = '#' + page;
        if(num != 0)
        {
            var id = num;
            var dataString = 'num=' + id + '&page=' + page;
            $.ajax({
                type:'post',
                url: '<?php /*echo base_url() */?>/dashboard/secretary_export',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $(div).html(html);
                }
            });

            return false;
        }
        else
        {
            $(cleer).val('');
            $(div).html('');
            return false;
        }
    }

</script>

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script>

<style>
    .modal-style{
        transform: translate(0%, 0%) !important;
        top: 0% !important;
        max-width: 100%;
        width: 100% !important;
    }
</style>
-->