<?php
$val = $_POST['valu'];
if(isset($val)){
    if (!empty($select_all_bydate[$val])):?>
       
        <div class="col-xs-12" >
            <div class="panel-body">
                <div class="fade in active" >
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
                            <?php $a=1;
                            foreach ($select_all_bydate[$val] as $record ):?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><?php echo date('d-m-Y',$record->session_date) ?></td>
                                    <td>
                                <button type="button" class="btn center-block btn-info button" data-toggle="modal" data-target="#myModal<?php echo $record->council_id_fk  ?>" > عرض</button>
                            <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->council_id_fk ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-bg-table-1" id="printablediv<?php echo $record->council_id_fk ?>" >
                                <div id="modal-table-1"  class="center-block">
                                    <div class="details-resorce" >
                                        <?php echo form_open_multipart('admin/Directors/follow_up/')?>
                                        <div class="col-xs-12 r-inner-details" style="margin-top: 150px">
                                            <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                                <thead><tr>
                                                    <th >رقم البند</th>
                                                    <th >نص البند</th>
                                                    <th >القرار</th>
                                                    <th >حالة القرار</th>
                                                </tr></thead>
                                                <tbody>
                                                <?php if (!empty($decisions[$record->council_id_fk])):
                                                    foreach ($decisions[$record->council_id_fk] as $row):
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
                                        <button type="button" class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->council_id_fk  ?>" > عرض</button>
                                        <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->council_id_fk ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-bg-table-1" id="printablediv<?php echo $record->council_id_fk ?>" >
                                                <div id="modal-table-1"  class="center-block">
                                                    <div class="details-resorce" >
                                                        <div class="col-xs-12 r-inner-details" style="margin-top: 150px">
                                                            <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                                                <thead><tr>
                                                                    <th >م</th>
                                                                    <th >إسم العضو</th>
                                                                    <th >المسمي الوظيفي</th>
                                                                </tr></thead>
                                                                <tbody>
                                                                <tr>
                                                                    <?php if(!empty($all_members[$record->council_id_fk])):
                                                                    $a=1;
                                                                    foreach ($all_members[$record->council_id_fk] as $row):
                                                                    ?>
                                                                    <td><? echo $a ;?></td>
                                                                    <td><?echo $row->members_nums;?></td>
                                                                    <td><?
                                                                        if(!empty($get_job_title[$row->members_nums]->job_title_id_fk)):
                                                                            if(!empty($job_title[$get_job_title[$row->members_nums]->job_title_id_fk])):
                                                                                echo $job_title[$get_job_title[$row->members_nums]->job_title_id_fk]->title;
                                                                            endif;
                                                                        endif;
                                                                        ?></td>
                                                                </tr>
                                                                <?php  $a++;  endforeach; endif;?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></td>
                                    <td>
                                        <button type="button" class="btn center-block  btn-success button" data-toggle="modal" data-target="#myModals<?php echo $record->council_id_fk  ?>" >تعديل</button>
                                        <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModals<?php echo $record->council_id_fk ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-bg-table-1" id="printablediv<?php echo $record->council_id_fk ?>" >
                                                <div id="modal-table-1"  class="center-block">
                                                    <div class="details-resorce" >
                                                        <?php echo form_open_multipart('admin/Directors/follow_up/')?>
                                                        <div class="col-xs-12 r-inner-details" style="margin-top: 150px">
                                                            <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                                                <thead><tr>
                                                                    <th >رقم البند</th>
                                                                    <th >نص البند</th>
                                                                    <th >القرار</th>
                                                                    <th >حالة القرار</th>
                                                                    <th >الإجراء</th>
                                                                </tr></thead>
                                                                <tbody>
                                                                <?php if (!empty($decisions[$record->council_id_fk])):
                                                                    foreach ($decisions[$record->council_id_fk] as $row):
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
                                                                            <td>
                                                                                <input type="submit" class="btn btn-success btn-md"  style="width: 100px;" name="update_current" value="جاري" />
                                                                                <input type="submit" class="btn btn-warning btn-md"  style="width: 100px;" name="update_done" value="تم التنفيذ" />
                                                                                <input type="submit" class="btn btn-danger btn-md"  style="width: 100px;" name="update_notdone" value="لم يتم التنفيذ" />
                                                                                <input type="hidden"  name="id" value="<? echo $row->id; ?>"></td>
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
<?  }?>