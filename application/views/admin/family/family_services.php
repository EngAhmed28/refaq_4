<div class="col-sm-11 col-xs-12">
    <!--  -->
    <?php $this->load->view('admin/family/main_tabs'); ?>
    <!--  -->
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">

            <!-------------------------------------------------------------------------------------------------------------------------->

            <?php echo form_open_multipart('family/services_type/')?>
            <div class="panel-body">
              
                <div class="r-add pull-right">
                    <img src="<?php echo base_url()?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
                    <div class="modal-bg">
                        <div id="modal">
                            <span class="text-center">  فئه جديده   </span>
                            <div class="col-xs-12 r-password">
                                <div class="col-xs-5">
                                    <h5>  فئة الخدمة </h5>
                                </div>
                                <div class="col-xs-7">
                                    <select  name="main_service" id="main_service" onchange="return sent($('#main_service').val());" required>
                                        <option value=""> - اختر - </option>
                                        <?
                                        if(!empty($main_service)):
                                            foreach ($main_service as $service):?>
                                                <option value="<? echo $service->id; ?>"><? echo $service->main_service_name; ?></option>
                                            <?  endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 r-password" id="optionearea2">
                                <div class="col-xs-5">
                                    <h5 class="r-password"> نوع الخدمة </h5>
                                </div>
                                <div class="col-xs-7">
                                    <select  required>
                                        <option> - اختر - </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 r-password">
                                <div class="col-xs-5">
                                    <h5 class="r-password">  رقم الاسرة </h5>

                                </div>
                                <div class="col-xs-7">
                                    <input type="number" name="mother_national_id_fk" id="mother_national_id_fk" onkeyup="return go($('#mother_national_id_fk').val());"
                                    
                                    onchange="return go($('#mother_national_id_fk').val());"
                                    >
                                </div>
                            </div>
                            <div id="optionearea3"></div>
                            <div class="col-xs-12 r-password">
                                <div class="col-xs-6">
                                    <button class="btn  center-block" id="myBtn" type="submit" name="accept"><a  class="x">موافق </a></button>
                                </div>
                                <div class="col-xs-6">
                                    <button class="btn  center-block" > <a href="#close1" id="close1" class="x">اغلاق</a> </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php  echo form_close()?>
                <div class="fade in active">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">رقم الطلب </th>
                            <th class="text-center">إسم الأم</th>
                            <th class="text-center">فئة الخدمة</th>
                            <th class="text-center">نوع الخدمة</th>
                            <th class="text-center">تاريخ التسجيل</th>
                            <th class="text-center">حالة الطلب</th>
                            <th class="text-center">إسم الموظف</th>
                            <th class="text-center">عرض</th>
                            <th class="text-center">تم التنفيذ</th>
                            <th class="text-center last-th">إغلاق</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php if(!empty($all_records)):
                            $x=0;
                            foreach ($all_records as $record):
                                $x++?>
                                <tr>
                                    <td><?php echo $x; ?></td>
                                    <td><?php echo $record->order_num; ?></td>
                                    <td><?php if(!empty($get_mother[$record->mother_national_id_fk])): echo $get_mother[$record->mother_national_id_fk]->m_first_name; endif;?></td>
                                    <td><?php if(!empty($get_service_name[$record->service_id_fk])):
                                            if($get_service_name[$record->service_id_fk][0]->sub_service_name == ''){
                                                echo $get_service_name[$record->service_id_fk][0]->main_service_name;
                                            }else{
                                                echo $get_service_name[$record->service_id_fk][0]->sub_service_name;
                                            }endif;?></td>
                                    <td>نوع الخدمة</td>
                                    <td><?php echo date('Y-m-d',$record->date); ?></td>

                                    <?php
                                    $condition = 'عند موظف الإستقبال';
                                    $reception = 'موظف الإستقبال';
                                    if(!empty($last_oper[$record->id])) {
                                      if(sizeof($last_oper[$record->id]) >0){
                                          $condition = 'عند المدير العام';
                                          $reception = 'المدير العام';
                                          if(!empty($get_job_name[$last_oper[$record->id][0]->service_file_to][0]->name)):
                                          $condition = 'عند &nbsp;'. $get_job_name[$last_oper[$record->id][0]->service_file_to][0]->name;
                                          $reception = $get_job_name[$last_oper[$record->id][0]->service_file_to][0]->name;
                                          endif;
                                      }
                                    }

                                    ?>
                                    <td><?php echo $condition; ?></td>
                                    <td><?php echo $reception ;?></td>
                                    <td><a href="<?php echo base_url()?>family/service_details/<?php echo $record->id ;?>"<i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                                    <td><? if($record->approved == 5){
                                            echo 'تم التنفيذ';
                                        }else{

                                        }?></td>
                                    <td><? if($record->approved == 5){
                                            echo 'إغلاق';
                                        }else{

                                        }?></td>
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
            if(valu !=0)
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
            if(number !=0)
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

