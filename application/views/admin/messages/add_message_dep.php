<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/messages/main_tabs'); ?>

            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('sending/add_message_dep')?>
                    <div class="col-xs-12">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> القسم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="emp_depart[]" class="selectpicker  form-control" multiple="multiple">
                                       <option value="">إختر</option>
                                        <?php if(!empty($department)):
                                            foreach ($department as $record):?>
                                     
                                        <option value="<?php echo $record->id;?>"><?php echo $record->name;?></option>
                                        <?php endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-4">
                                    <h4 class="r-h4"> عدد الرسائل </h4>
                                </div>
                                <div class="col-xs-4 r-input">
                                    <input type="text" id="num" value="0">
                              
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 ">

                        <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <h4 class="r-h4">  محتوي الرسالة  </h4>
                                </div>
                                <div class="col-xs-8 r-input">
                                    <textarea class="r-textarea" name="content" id="textarea"  ></textarea>
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
                            <th >رقم الهاتف</th>
                            <th >إسم الموظف</th>
                            <th >التفاصيل</th>
                            <th >الإجراء</th>
                        </tr></thead>
                        <tbody>
                      <?php  $serial = 0;
                    
                        foreach($records as $record):
                            $serial++; ?>
                        <tr>
                            <td><?php echo $serial ?></td>
                                  <td><?php echo $record->emp_mob;?></td>
                                  <td><?php echo $descrption[$record->emp_code][0]->employee;?></td>
                            <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button></td>
                            <td> <a href="<?php echo base_url('sending/delete_message').'/'.$record->id ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span></td>
                        </tr>
                                 <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="gridSystemModalLabel">التفاصيل</h4>
                                        </div>
                                        <br />
                          
                                    
                                        <div class="col-sm-3" style="font-size: 16px;">كود الموظف</div>
                                        <div class="col-sm-9"  style="font-size: 16px;">
                                            <?php echo $record->emp_code?>
                                        </div>
                                        <br />
                                        <div class="col-sm-3" style="font-size: 16px;">إسم الموظف</div>
                                        <div class="col-sm-9"  style="font-size: 16px;">
                                            <?php echo $descrption[$record->emp_code][0]->employee;?>
                                        </div>
                                        <br /><br />
                                        <div class="modal-body">
                                           
                        
                                            <div class="col-md-3" style="font-size: 16px;"></div>
                                            <div class="col-md-9"></div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-4" style="font-size: 16px;">الرسالة</div>
                                                <div class="col-sm-8">
                                                    <?php echo $record->content?>
                                                </div>
                                            </div>
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
                    <?php endif?>
                </div>
            </div>
        </div>
    </div>
</div>




<script>

    $("#textarea").on('keyup', function(event) {
        var currentString = $("#textarea").val();
        var length = currentString.length / 70;
         $("#num").val(parseInt(length));
        $("#numb").val(parseInt(length));
    });

    $('.select2').select2({ placeholder : '' });

    $('.select2-remote').select2({ data: [{id:'A', text:'A'}]});

    $('button[data-select2-open]').click(function(){
        $('#' + $(this).data('select2-open')).select2('open');
    });
</script>







