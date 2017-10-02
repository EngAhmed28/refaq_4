<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <div class="details-resorce">
                <?php if((isset($records) && $records != null)): ?>
                    <div class="col-xs-12 r-inner-details">
                        <div class="panel-body">
                            <div class="fade in active">


                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم الموظف</th>
                                        <th class="text-center">إجمالي الأذونات</th>
                                        <th class="text-center">عادي</th>
                                        <th class="text-center">إستثنائي</th>
                                        <th class="text-center">تم القبول</th>
                                        <th class="text-center">تم الرفض</th>
                                        <th class="text-center">لم يتم النظر</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $a=1;
                                    foreach ($records as $record ):
                                        ?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><?echo $get_name[$record->emp_code][0]->employee; ?></td>
                                            <td><?php echo sizeof($this->CI->checks($record->emp_code,0,0)) ;?></td>
                                            <td><?php echo sizeof($this->CI->checks($record->emp_code,'permit_table_type',1)) ;?></td>
                                            <td><?php echo sizeof($this->CI->checks($record->emp_code,'permit_table_type',2)) ;?></td>
                                            <td><?php echo sizeof($this->CI->checks($record->emp_code,'permit_status',1)) ;?></td>
                                            <td><?php echo sizeof($this->CI->checks($record->emp_code,'permit_status',2)) ;?></td>
                                            <td><?php echo sizeof($this->CI->checks($record->emp_code,'permit_status',0)) ;?></td>
                                        </tr>
                                   <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>