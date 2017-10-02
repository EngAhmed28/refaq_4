<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('Administrative_affairs/attendance_upload')?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">مسار الملف</h4>
                            </div>
                            
                            <div class="col-xs-6 r-input">
                                <input type="file" name="upload" class="form-control" accept=".csv" />
                            </div>
                            
                            <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                                <input type="submit" role="button" name="load" value="رفع الملف" class="btn pull-right" />
                            </div>
                            
                        </div>
                    </div>
                    <?php echo form_close()?>
                </div>
                <?php if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم الموظف</th>
                                        <th class="text-center">التاريخ</th>
                                        <th class="text-center">الحضور الفعلي</th>
                                        <th class="text-center">الإنصراف الفعلي</th>
                                        <th class="text-center">عدد ساعات الحضور</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                for($x = 0 ; $x < count($table) ; $x++){
                                    if($table[$x]->presence == '' || $table[$x]->dissuasion == '')
                                        $style = 'color:red;';
                                    else
                                        $style = '';
                                    echo '<tr>
                                            <td>'.($x+1).'</td>
                                            <td>'.$table[$x]->employee.'</td>
                                            <td>'.date("Y-m-d",$table[$x]->date).'</td>
                                            <td>'.$table[$x]->presence.'</td>
                                            <td>'.$table[$x]->dissuasion.'</td>
                                            <td style="'.$style.'">'.$table[$x]->diff.'</td>
                                          </tr>';
                                }
                                ?>   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>