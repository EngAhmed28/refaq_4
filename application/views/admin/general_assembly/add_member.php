<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/general_assembly/main_tabs'); ?>

            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('General_assembly/add_member')?>
                    <div class="col-xs-12">
                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إسم العضو </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الهاتف </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" id="mobile" name="mobile" class="form-control" required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">العنوان </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" id="address" name="address" class="form-control" required>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 ">

                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الإيميل  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> تاريخ التعيين  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="date_of_hiring" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 ">

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 r-inner-btn">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" role="button" name="save" value="حفظ" class="btn pull-right">
                    </div>
                    <?php echo form_close()?>
                    <div class="col-xs-2">
                        <button class="btn pull-left" > عودة </button>
                    </div>
                    <div class="col-xs-7"></div>
                </div>
                <div class="col-sm-12 col-xs-12 r-inner-details">
                  <?php if(!empty($records)):?>
                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer" style="width: 70%;margin-right: 160px">
                        <thead><tr>
                            <th >م</th>
                            <th >إسم العضو</th>
                            <th >العنوان</th>
                            <th >التفاصيل</th>
                            <th >الإجراء</th>
                        </tr></thead>
                        <tbody>
                      <?php  $serial = 0;
                        foreach($records as $record):
                            $serial++; ?>
                        <tr>
                            <td><?php echo $serial ?></td>
                                  <td><?php echo $record->name;?></td>
                                  <td><?php echo $record->address;?></td>
                            <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                            <td> <a href="<?php echo base_url('General_assembly/delete_member').'/'.$record->id ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span></td>
                        </tr>
                                 <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="gridSystemModalLabel">التفاصيل</h4>
                                        </div>
                                        <br />
                          
                                    
                                        <div class="col-sm-3" style="font-size: 16px;">إسم الموظف</div>
                                        <div class="col-sm-9"  style="font-size: 16px;">
                                            <?php echo $record->name?>
                                        </div>
                                        <br />
                                        <div class="col-sm-3" style="font-size: 16px;">العنوان</div>
                                        <div class="col-sm-9"  style="font-size: 16px;">
                                            <?php echo$record->address;?>
                                        </div>
                                        <br /><br />
                                        <div class="col-sm-3" style="font-size: 16px;">رقم الهاتف</div>
                                        <div class="col-sm-9"  style="font-size: 16px;">
                                            <?php echo$record->mobile;?>
                                        </div>
                                        <br /><br />
                                        <div class="col-sm-3" style="font-size: 16px;">الإيميل</div>
                                        <div class="col-sm-9"  style="font-size: 16px;">
                                            <?php echo$record->email;?>
                                        </div>
                                        <br /><br />
                                        <div class="modal-body">
                                           
                        
                                            <div class="col-md-3" style="font-size: 16px;"></div>
                                            <div class="col-md-9"></div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                    <?php endforeach ;?>
                        </tbody>
                    </table>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>












