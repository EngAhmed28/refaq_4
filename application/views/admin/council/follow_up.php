
            <div class="col-sm-11 col-xs-12">
                 <!--  -->
                    <?php $this->load->view('admin/council/main_tabs'); ?>
                    <!--  -->
                <!---table------>
                <?php if(!empty($all_council_dates)):?>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  اختر التاريخ </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="session_date"  id="session_date" onchange="return sent($('#session_date').val());">
                                <option> - اختر - </option>

                                    <?php foreach ($all_council_dates as $record):?>
                                        <option value="<? echo $record->session_date; ?>"><?php echo date('m-d-Y',$record->session_date);?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <?php  endif; if(isset($records)):?>
                <div class="col-xs-12" >
                        <div class="panel-body">
                            <div class="fade in active" id="optionearea2">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">تاريخ الجلسة</th>
                                            <th class="text-center">بنود الجلسة/القرارات </th>
                                            <th class="text-center">الأعضاء</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php if(isset($records)&&$records!=null):?>

                                    <?php
                                    $a=1;
                                    foreach ($records as $record ):?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><?php echo date('d-m-Y',$record->session_date) ?></td>
                                            <td>
                                                <button type="button" class="btn center-block  btn-info button" data-toggle="modal" data-target="#myModal_z<?php echo $record->id  ?>" > عرض</button>
                                                <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal_z<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
                                                        <div id="modal-table-1"  class="center-block">
                                                            <div class="details-resorce" >
                                                                <?php echo form_open_multipart('admin/Directors/follow_up/')?>
                                                                <div class="col-xs-12 r-inner-details" style="margin-top: 150px">
                                                                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                                                        <thead><tr>
                                                                            <th style="color:#0c72ca; ">رقم البند</th>
                                                                            <th style="color:#0c72ca; ">نص البند</th>
                                                                            <th style="color:#0c72ca; ">القرار</th>
                                                                            <th style="color:#0c72ca; ">حالة القرار</th>
                                                                        </tr></thead>
                                                                        <tbody>
                                                                        <?php if (!empty($decisions[$record->id])):
                                                                            foreach ($decisions[$record->id] as $row):
                                                                                $condition='';
                                                                                if($row->motab3a ==0){
                                                                                    $condition='جاري';
                                                                                }elseif ($row->motab3a ==1){
                                                                                    $condition='تم التنفيذ';
                                                                                }elseif ($row->motab3a ==2){
                                                                                    $condition='لم يتم التنفيذ';
                                                                                }
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?echo$row->item_num;?></td>
                                                                                    <td><?echo$row->item_title;?></td>
                                                                                    <td><?echo$row->decision_title;?></td>
                                                                                    <td><?echo$condition;?></td>
                                                                                </tr>
                                                                            <?php  endforeach;endif;?>
                                                                        <?php echo form_close()?>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                               <!----------------------------------------------------------------->
<button type="button" class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>
<div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
    <div id="modal-table-1"  class="center-block">
        <div class="details-resorce" >
            <div class="col-xs-12 r-inner-details" style="margin-top: 150px">
                <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                            <h4 class="r-table-text text-left"> التوقيعات : </h4>
                            <thead><tr>
                                <th style="color:#0c72ca; ">م</th>
                                <th style="color:#0c72ca; ">إسم العضو</th>
                                <th style="color:#0c72ca; ">المسمي الوظيفي</th>
                            </tr></thead>
                            <tbody>
                         <?php if(!empty($all_members[$record->id])):
                             $a=1;
                             foreach ($all_members[$record->id] as $row):
                            ?>
                         <tr>
                            
                        <td><?php  echo $a ;?></td>
                        <td> <?php echo $get_job_title[$row->members_nums]->member_name?></td>
                        <td> <?php echo $job_title[$get_job_title[$row->members_nums]->job_title_id_fk]->name?></td>
                       </tr>
                        <?php  $a++;  endforeach; endif;?>
                        </tbody>
                        </table>
                    </div>
        </div>
    </div>
</div>
</div>
<!----------------------------------------------------------------->

                                               
                                               </td>
                                            <td>
                                                <button type="button" class="btn center-block   btn-success button" data-toggle="modal" data-target="#myModal_<?php echo $record->id  ?>" > تعديل</button>
                                                <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal_<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
                                                        <div id="modal-table-1"  class="center-block">
                                                            <div class="details-resorce" >
                                                                <?php // echo form_open_multipart('admin/Directors/follow_up')?>
                                                                <div class="col-xs-12 r-inner-details" style="margin-top: 150px">
                                                                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                                                        <thead><tr>
                                                                            <th style="color:#0c72ca; ">رقم البند</th>
                                                                            <th style="color:#0c72ca; ">نص البند</th>
                                                                            <th style="color:#0c72ca; ">القرار</th>
                                                                            <th style="color:#0c72ca; ">حالة القرار</th>
                                                                            <th style="color:#0c72ca; ">الإجراء</th>
                                                                        </tr></thead>
                                                                        <tbody>
                                                                        <?php if (!empty($decisions[$record->id])):
                                                                            foreach ($decisions[$record->id] as $row):
                                                                                $condition='';
                                                                                if($row->motab3a ==0){
                                                                                    $condition='جاري';
                                                                                }elseif ($row->motab3a ==1){
                                                                                    $condition='تم التنفيذ';
                                                                                }elseif ($row->motab3a ==2){
                                                                                    $condition='لم يتم التنفيذ';
                                                                                }
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $row->item_num;?></td>
                                                                                    <td><?php echo $row->item_title;?></td>
                                                                                    <td><?php echo $row->decision_title;?></td>
                                                                                    <td><?php echo $condition;?></td>
                                                                                    <td>
                                                                                      <a href="<?php echo base_url()."admin/Directors/update_motab3a_state/".$row->id."/0" ?>">
                                                                                         <button type="button"   style="width: 80px;" class="btn btn-success ">جاري  </button> </a>
                                                                                       
                                                                                      <a href="<?php echo base_url()."admin/Directors/update_motab3a_state/".$row->id."/1" ?>">
                                                                                         <button type="button" style="width: 80px;" class="btn btn-warning ">تم التنفيذ  </button> </a>
                                                                                       
                                                                                      <a href="<?php echo base_url()."admin/Directors/update_motab3a_state/".$row->id."/2" ?>">
                                                                                         <button type="button" style="width: 100px;"  class="btn btn-danger ">لم يتم التنفيذ  </button> </a>
                                                                                       
                                                                                       <!-- <input type="submit" class="btn btn-success btn-md"  style="width: 80px;" name="update_current" value="جاري" />
                                                                                        <input type="submit" class="btn btn-warning btn-md"  style="width: 100px;" name="update_done" value="تم التنفيذ" />
                                                                                        <input type="submit" class="btn btn-danger btn-md"  style="width: 100px;" name="update_notdone" value="لم يتم التنفيذ" />
                                                                                        <input type="hidden"  name="id" value="<? echo $row->id; ?>"/>
                                                                                     -->   
                                                                                     </td>
                                                                                </tr>
                                                                            <?php  endforeach;endif;?>
                                                                        <?php // echo form_close()?>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
                <?php endif; ?>

            </div>
            </div>
        <!------------------------------------------------------------------------------>
            <script>
                function sent(valu)
                {
                    if(valu)
                    {
                        var dataString = 'valu=' + valu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>admin/Directors/follow_up',
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