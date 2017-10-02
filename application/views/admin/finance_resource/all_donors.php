<div class="col-sm-11 col-xs-12">
    <!--  -->
    <?php $this->load->view('admin/finance_resource/main_tabs'); ?>
    <!--  -->
    <div class="details-resorce">
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">نوع المتبرع</h4>
                </div>
                <div class="col-xs-6 ">
                    <select name="donor_type" id="donor_type" onchange="return change_donor()">
                    <option value="all">الكل</option>
                    <option value="1">فرد</option>
                    <option value="2">مؤسسة</option>
                    </select>
                </div>
            </div>
            <!---->
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">النوع</h4>
                </div>
                <div class="col-xs-6 ">
                    <select name="gender_type" id="gender_type" onchange="return change_donor();">
                        <option value="all">الكل</option>
                        <option value="1">ذكر</option>
                        <option value="2">أنثي</option>
                    </select>
                </div>
            </div>
            <!---->
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">طريقة الدفع</h4>
                </div>
                <div class="col-xs-6 ">
                    <select name="df3_type" id="df3_type" onchange="return change_donor();">
                        <?  $pay = array('الكل','نقدي','شيك','تحويل','استقطاع','شبكه');
                        for($a=0;$a<sizeof($pay);$a++):?>
                            <option value="<?echo $a;?>"><?echo $pay[$a];?></option>
                        <?endfor?>
                    </select>
                </div>
            </div>
        </div>
        <!---->

    </div>
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <!-------------------------------------------------------------------------------------------------------------------------->
            <div class="panel-body">
                <a href="<?php echo base_url()?>finance_resource/donors/"><div class="r-add pull-right">
                    <img src="<?php echo base_url()?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
                </div>
                </a>
                  <?php if(isset($all_records) && $all_records!=null):?>

                <div class="fade in active" id="optionearead">
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
    <!-------------------------------------->
    <script>
        function change_donor()
        {    var donors ='donors';
            var donor='';
            var gender= '';
            var df3 ='';
            if($('#donor_type').val() !=0 ){
                var donor = $('#donor_type').val();
            }
            if($('#gender_type').val() !=0 ){
                var gender = $('#gender_type').val();
            }
            if($('#df3_type').val() !=0 ){
                var df3 = $('#df3_type').val();
            }
            var dataString = 'donor='+ donor + '&gender='+ gender +'&df3='+ df3  +'&donors='+ donors;
         //   alert(dataString);
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>/Finance_resource/all_donors',
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(html){
                        $('#optionearead').html(html);
                    }
                });
                return false;
        }
    </script
