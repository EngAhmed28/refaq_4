<div class="col-sm-11 col-xs-12">
    <!--  -->
    <?php $this->load->view('admin/finance_resource/main_tabs'); ?>
    <!--  -->
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">

            <!-------------------------------------------------------------------------------------------------------------------------->
            <div class="panel-body">
                <a href="<?php echo base_url()?>finance_resource/add_endowments/"><div class="r-add pull-right">
                    <img src="<?php echo base_url()?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
                </div>
                </a>
                   <?php if(isset($all_records) && $all_records!=null):?>
                <div class="fade in active">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">إسم الوقف</th>
                            <th class="text-center">نوع الوقف</th>
                            <th class="text-center">مبلغ الوقف</th>
                            <th class="text-center">المبلغ المتبقي</th>
                            <th class="text-center">النسبة</th>
                            <th class="text-center">المدينة</th>
                            <th class="text-center">عرض</th>
                            <th class="text-center last-th">تعديل</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">

                       <?php
                            $a=0;
                            foreach ($all_records as $record):
                                $arr=array('إختر','فندق','صالة تجارية','ارض','عمارة','بيت','شقة','محلات تجارية');
                                $a++;?>
                        <tr>
                            <td><?php echo $a;?></td>
                            <td><?php echo $record->endowment_name;?></td>
                            <td><?php echo $arr[$record->endowment_type];?></td>
                            <td><? echo $record->endowment_cost;?></td>
                            <td>المبلغ المتبقي</td>
                            <td>100%</td>
                            <td><?  if($main_depart[$record->city])echo $main_depart[$record->city]->main_dep_name;?></td>
                            <td><a href="<?php echo base_url().'Finance_resource/edit_endowments/'.$record->id.'/view'?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                            <td><a href="<?php echo base_url().'Finance_resource/edit_endowments/'.$record->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        </tr>
                            <?php endforeach;?>
                       <?php endif;?>
                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>

    <!--------------------------------------------------->
    <script>
        function sent(valu)
        {
            if(valu)
            {
                var dataString = 'valu=' + valu;
                $.ajax({

                    type:'post',
                    url: '<?php echo base_url() ?>/family/family_services',
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(html){
                        $('#optionearea2').html(html);
                    }
                });
                return false;
            }
            else
            {
                $('#optionearea2').html('');
                return false;
            }

        }
    </script>

    <!-------------------------------------->
    <script>
        function go(number)
        {
            if(number)
            {
                var dataString = 'number=' + number;
                $.ajax({

                    type:'post',
                    url: '<?php echo base_url() ?>/family/family_services',
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(html){
                        $('#optionearea3').html(html);
                    }
                });
                return false;
            }
            else
            {
                $('#optionearea3').html('');
                return false;
            }

        }

    </script>

