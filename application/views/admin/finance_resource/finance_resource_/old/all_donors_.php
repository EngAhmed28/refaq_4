<div class="col-sm-11 col-xs-12">
    <!--  -->
    <?php $this->load->view('admin/finance_resource/main_tabs'); ?>
    <!--  -->
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">

            <!-------------------------------------------------------------------------------------------------------------------------->
            <div class="panel-body">
                <a href="<?php echo base_url()?>finance_resource/donors/"><div class="r-add pull-right">
                    <img src="<?php echo base_url()?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
                </div>
                </a>
                  <?php if(isset($all_records) && $all_records!=null):?>

                <div class="fade in active">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">رقم الكافل </th>
                            <th class="text-center">إسم الكافل</th>
                            <th class="text-center">نوع الكافل</th>
                            <th class="text-center">طريقة الدفع</th>
                            <th class="text-center">رقم الجوال</th>
                            <th class="text-center">صفة المتبرع</th>
                            <th class="text-center">عرض</th>
                            <th class="text-center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">

                       <?php
                       $x=0;
                       foreach ($all_records as $record):
                            $donor_type =array('','فردي','مؤسسة');
                            $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');


                           $x++;?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $record->id;?></td>
                            <td><?php echo $record->user_name;?></td>
                            <td><?php echo $donor_type[$record->donor_type];?></td>
                            <td><?php echo $pay[$record->pay_method_id_fk];?></td>
                            <td><?php echo $record->guaranty_mob;?></td>
                            <td><?php echo $record->character_person;?></td>
                              <td><a href="<?php echo base_url().'Finance_resource/edit_donors/'.$record->id.'/view'?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                                      <td><a href="<?php echo base_url().'Finance_resource/delete_guaranty/'.$record->id?>"><i class="fa fa-trash button" aria-hidden="true"></i></a>/<a href="<?php echo base_url().'Finance_resource/edit_guaranty/'.$record->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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

