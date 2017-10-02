<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <div class="details-resorce">
                <div class="col-md-12">
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab0default" data-toggle="tab">الاجزات الوارده </a></li>
                                <li class=""><a href="#tab1default" data-toggle="tab">الاجازات المقبوله</a></li>
                                <li class=""><a href="#tab2default" data-toggle="tab">الاجازات المرفوضه </a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab0default">
                                    <!--  srart 1   ------------------------------------------------------------------------------------------------>
                                    <?php if(isset($vacation_recived)&& $vacation_recived!=null && !empty($vacation_recived)):?>
                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>م</th>
                                                <th class="text-center">اسم الموظف</th>
                                                <th class="text-center">الموظف القائم بالعمل</th>
                                                <th class="text-center">مدة الاجازة</th>
                                                <th  class="text-center">تاريخ البداية </th>
                                                <th  class="text-center">تاريخ النهاية</th>
                                                <th  class="text-center">الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php
                                            $a=1;
                                            foreach ($vacation_recived as $record ):
                                                $date1 = new DateTime($record->from_date);
                                                $date2 = new DateTime($record->to_date);
                                                $diff = $date2->diff($date1)->format("%a");
                                                ?>
                                                <tr>
                                                    <td><?php echo $a ?></td>
                                                    <td ><?php echo $record->emp_name ?></td>
                                                    <td ><?php echo $record->emp_assigned_name?></td>
                                                    <td ><?php echo $diff; ?></td>
                                                    <td ><?php echo $record->from_date ?></td>
                                                    <td ><?php echo $record->to_date ?></td>
                                                    <td>
                                                        <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/1'?>" title="موافق">
                                                            <i class="fa fa-check fa-lg" aria-hidden="true"></i> </a>
                                                        <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/2'?>"title="مرفوض">
                                                            <i class="fa fa-times fa-lg" aria-hidden="true"></i> </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $a++;
                                            endforeach;  ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <div class="alert alert-danger" > لا يوجد اجازات واردة </div>
                                    <?php endif; ?>
                                    <!---  end  1   ------------------------------------------------------------------------------------------------>
                                </div>
                                <!--------------------------------------------------------------------------------------------------------------->
                                <!--------------------------------------------------------------------------------------------------------------->
                                <div class="tab-pane fade" id="tab1default">
                                    <!--  srart 2   ------------------------------------------------------------------------------------------------>
                                    <?php if(isset($vacation_accept)&& $vacation_accept!=null && !empty($vacation_accept)):?>
                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>م</th>
                                                <th class="text-center">اسم الموظف</th>
                                                <th class="text-center">الموظف القائم بالعمل</th>
                                                <th class="text-center">مدة الاجازة</th>
                                                <th  class="text-center">تاريخ البداية </th>
                                                <th  class="text-center">تاريخ النهاية</th>
                                                <th  class="text-center">الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php
                                            $a=1;
                                            foreach ($vacation_accept as $record ):
                                                $date1 = new DateTime($record->from_date);
                                                $date2 = new DateTime($record->to_date);
                                                $diff = $date2->diff($date1)->format("%a");
                                                ?>
                                                <tr>
                                                    <td><?php echo $a ?></td>
                                                    <td ><?php echo $record->emp_name ?></td>
                                                    <td ><?php echo $record->emp_assigned_name?></td>
                                                    <td ><?php echo $diff; ?></td>
                                                    <td ><?php echo $record->from_date ?></td>
                                                    <td ><?php echo $record->to_date ?></td>
                                                    <td>
                                                        <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/0'?>" title="استرجاع">
                                                            <i class="fa fa-repeat fa-lg" aria-hidden="true"></i> </a>
                                                        <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/2'?>"title="مرفوض">
                                                            <i class="fa fa-times fa-lg" aria-hidden="true"></i> </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $a++;
                                            endforeach;  ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <div class="alert alert-danger" >لا يوجد اجازات مقبولة</div>
                                    <?php endif; ?>

                                    <!---  end  2   ------------------------------------------------------------------------------------------------>
                                </div>
                                <!--------------------------------------------------------------------------------------------------------------->
                                <!--------------------------------------------------------------------------------------------------------------->
                                <div class="tab-pane fade" id="tab2default">
                                    <!--  srart 3   ------------------------------------------------------------------------------------------------>
                                    <?php if(isset($vacation_refuse)&& $vacation_refuse!=null && !empty($vacation_refuse)):?>
                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>م</th>
                                                <th class="text-center">اسم الموظف</th>
                                                <th class="text-center">الموظف القائم بالعمل</th>
                                                <th class="text-center">مدة الاجازة</th>
                                                <th  class="text-center">تاريخ البداية </th>
                                                <th  class="text-center">تاريخ النهاية</th>
                                                <th  class="text-center">الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php
                                            $a=1;
                                            foreach ($vacation_refuse as $record ):
                                                $date1 = new DateTime($record->from_date);
                                                $date2 = new DateTime($record->to_date);
                                                $diff = $date2->diff($date1)->format("%a");
                                                ?>
                                                <tr>
                                                    <td><?php echo $a ?></td>
                                                    <td ><?php echo $record->emp_name ?></td>
                                                    <td ><?php echo $record->emp_assigned_name?></td>
                                                    <td ><?php echo $diff; ?></td>
                                                    <td ><?php echo $record->from_date ?></td>
                                                    <td ><?php echo $record->to_date ?></td>
                                                    <td>
                                                        <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/0'?>" title="استرجاع">
                                                            <i class="fa fa-repeat fa-lg" aria-hidden="true"></i> </a>
                                                        <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/1'?>"title="موافق">
                                                            <i class="fa fa-check fa-lg" aria-hidden="true"></i> </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $a++;
                                            endforeach;  ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <div class="alert alert-danger" > لا يوجد اجازات مرفوضة </div>
                                    <?php endif; ?>

                                    <!---  end  3   ------------------------------------------------------------------------------------------------>
                                </div>
                                <!---  end Tabs ----------------------------------------------------------------------------------------------------->
                            </div>
                        </div>
                    </div>
                </div>
                <!---  end All ----------------------------------------------------------------------------------------------------->
            </div>
        </div>
    </div>
</div>