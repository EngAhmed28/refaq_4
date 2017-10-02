            <div class="col-sm-11 col-xs-12">
              <!--  -->
                <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
               <!--  -->
               
               
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
<!-------------------------------------------------------------------------------------------------------------------------->

    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
<?php if(isset($result) && $result!=null):?>
  <?php echo form_open_multipart('Administrative_affairs/edit_penalty/'.$result[0]->id)?>
    <div class="col-xs-12">
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> تاريخ اليوم  </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <div class="docs-datepicker">
                        <div class="input-group">
                            <input type="text" class="form-control docs-date" name="date" value="<? echo date('Y-m-d', $result[0]->date); ?>" placeholder="شهر / يوم / سنة ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> الإدارة </h4>
                </div>
                <div class="col-xs-6 r-input" >

                    <select name="main_depart" id="main_depart" disabled >
<option><?php if(!empty($get_data2[$result[0]->emp_id]))echo $depart_name[$get_data2[$result[0]->emp_id][0]->administration][0]->name;?></option>

                    </select>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> نوع الجزاء </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select name="penalty_type" id="penalty_type" onchange="checkduration()">
                        <?
                        if($result[0]->penalty_type ==1){?>
                            <option value="1">مادية</option>
                            <option value="2">أخري</option>

                        <?  }elseif($result[0]->penalty_type ==2){?>

                            <option value="2">أخري</option>
                            <option value="1">مادية</option>

                        <?}
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> التفاصيل </h4>
                </div>
                <div class="col-xs-6 r-input" >
                    <textarea name="content" id="content"  class="form-control"><? echo $result[0]->content; ?> </textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  إسم الموظف </h4>
                </div>
                <div class="col-xs-6 r-input">

                    <select name="emp_id" id="emp_id" disabled >
                        <option> - اختر - </option>
                        <?php if (!empty($employs)):?>
                            <?php  foreach ($employs as $record):
                                $dis ='';
                                if($result[0]->emp_id == $record->id){
                                    $dis ='selected';

                                }?>
                                <option value="<?php  echo $record->id;?>" <?echo $dis;?>><?php  echo $record->employee;?></option>
                            <?php  endforeach;?>
                        <?php endif;?>
                    </select>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> القسم </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select name="sub_depart" disabled>
                        <option><?php if(!empty($get_data2[$result[0]->emp_id]))echo$depart_name[$get_data2[$result[0]->emp_id][0]->department][0]->name;?></option>
                    </select>
                </div>
            </div>
           <? if($result[0]->penalty_type ==1){?>
            <div class="col-xs-12" id="value" >
                <div class="col-xs-6">
                    <h4 class="r-h4"> القيمة </h4>
                </div>
                <div class="col-xs-6 r-input" >
                    <input type="number"  name="value" value="<? echo $result[0]->value;?>" >
                </div>
            </div>
            <?}elseif($result[0]->penalty_type ==2){?>

               <div class="col-xs-12" id="value" style="display: none">
                   <div class="col-xs-6">
                       <h4 class="r-h4"> القيمة </h4>
                   </div>
                   <div class="col-xs-6 r-input" >
                       <input type="number"  name="value">
                   </div>
               </div>

           <? }?>
        </div>
    </div>
    <div class="col-xs-12 r-inner-btn">

        <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">

            <input type="submit" name="edit" value="تعديل" class="btn center-block" />

        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>

    </div>


<?php else:?>
    <?php echo form_open_multipart('Administrative_affairs/add_penalty/')?>
    <div class="col-xs-12">
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> تاريخ اليوم  </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <div class="docs-datepicker">
                        <div class="input-group">
                            <input type="text" class="form-control docs-date" name="date" placeholder="شهر / يوم / سنة ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> الإدارة </h4>
                </div>
                <div class="col-xs-6 r-input" id="optionearea3">
                    <?php if($_SESSION['role_id_fk'] ==2):?>
                    <input type="text"  name="main_depart" readonly value="<?php echo $depart_name[$get_data['administration']][0]->name;?>">
                    <?else:?>
                        <input type="text" name="main_depart">
                    <?endif;?>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> نوع الجزاء </h4>
                </div>
                <div class="col-xs-6 r-input">
                  <select name="penalty_type" id="penalty_type" onchange="checkduration()">
                      <option value="">إختر</option>
                      <option value="1">مادية</option>
                      <option value="2">أخري</option>
                  </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> التفاصيل </h4>
                </div>
                <div class="col-xs-6 r-input" >
                    <textarea name="content" id="content"  class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  إسم الموظف </h4>
                </div>
                <div class="col-xs-6 r-input">
                        <?php if($_SESSION['role_id_fk'] ==2):?>
                            <input type="text" name="emp_id" value="<?php echo $get_data['employee'];?>">
                            <?else:?>
                    <select name="emp_id" id="emp_id" onchange="getTermsAndCredits(this.value);">
                        <option> - اختر - </option>
                        <?php if (!empty($employs)):?>
                  <?php  foreach ($employs as $record):?>
                            <option value="<?php  echo $record->id;?>"><?php  echo $record->employee;?></option>
                        <?php  endforeach;?>
                        <?php endif;?>
                        <?php endif;?>
                    </select>
                    <div id="optionearea3"></div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> القسم </h4>
                </div>
                <div class="col-xs-6 r-input" id="optionearea4">
                    <?php if($_SESSION['role_id_fk'] ==2):?>
                        <input type="text"  name="sub_depart"  readonly value="<?php echo $depart_name[$get_data['department']][0]->name;?>">
                    <?else:?>
                        <input type="text" name="sub_depart">
                    <?endif;?>
                </div>
            </div>
            <div class="col-xs-12" id="value" style="display: none">
                <div class="col-xs-6">
                    <h4 class="r-h4"> القيمة </h4>
                </div>
                <div class="col-xs-6 r-input" >
                    <input type="number"  name="value">
                </div>
            </div>
        </div>
    </div>
        <div class="col-xs-12 r-inner-btn">

            <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
            <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">

                <input type="submit" name="add" value="إضافة" class="btn center-block" />

            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>

        </div>

       <?php echo form_close()?>
   <?php endif?>
    </div>

                        <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                        <?php if (!empty($records)):?>

                            <div class="col-xs-12">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>تاريخ اليوم</th>
                                        <th>إسم الموظف</th>
                                        <th>الإدارة</th>
                                        <th>القسم</th>
                                        <th>الاجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $count=1; foreach($records as $row):?>
                                        <tr>
                                            <td><?php echo $count++?></td>
                                            <td><?php echo date('Y-m-d',$row->date);?></td>
                                            <td><?php echo$get_data2[$row->emp_id][0]->employee;?></td>
                                            <td><?php if(!empty($get_data2[$row->emp_id]))echo $depart_name[$get_data2[$row->emp_id][0]->administration][0]->name;?></td>
                                            <td><?php if(!empty($get_data2[$row->emp_id]))echo$depart_name[$get_data2[$row->emp_id][0]->department][0]->name;?></td>
                                            <td> <a href="<?php echo base_url().'Administrative_affairs/edit_penalty/'.$row->id?>">
                                                    <i class="fa fa-pencil " aria-hidden="true"></i></a>
                                                <a href="<?php echo base_url().'Administrative_affairs/delete_penalty/'.$row->id?>">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                                <?php if($_SESSION['role_id_fk'] == 1 ||$_SESSION['role_id_fk'] == 0):?>
                                                <button type="button" class="btn btn-info btn-xs col-lg-4" data-toggle="modal" data-target="#myModal<?php echo $row->id;?>"> الإعتماد </button>
                                             <?php endif;?>
                                            </td>
                                        </tr>

                                                 <!--start-->
                                        <div class="modal fade" id="myModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                   <h4 class="modal-title">   الإعتماد</h4>
                                                    </div>
                                                    <br /><br />
                                                    <?php echo form_open_multipart('Administrative_affairs/suspend_penalty/'.$row->id)?>
                                                    <div class="modal-body">
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-4" style="font-size: 16px;">السبب</div>
                                                            <div class="col-sm-8">
                                                                <textarea name="reason" style="height: 100px;" id="reason" cols="60"
                                                                          rows="10"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-sm-12">
                                                        <div class="col-sm-6" style="font-size: 16px;"><input type="submit" name="accept" value="موافقة" class="btn btn-success btn-xs " /></div>
                                                            <div class="col-sm-6" style="font-size: 16px;">  <input type="submit" name="ref" value="رفض" class="btn btn-danger btn-xs " /></div>
                                                        </div>

                                                        <br /><br />
                                                        <?php echo form_close()?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn manage-close-pop" data-dismiss="modal">إغلاق</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>

                                            <!--end-->
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>





                        <?php endif;?>
                        </div>
  
<!-------------------------------------------------------------------------------------------------------------------------->     
                    </div>
                </div>
            </div>
             <!----------------->
            <script>

                function getTermsAndCredits(value) {
                    search(value);
                    go(value);
                }

                function search(valu)
                {
                    if(valu)
                    {
                        var dataString = 'valu=' + valu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>/administrative_affairs/add_penalty',
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

            <script>
                function go(valuu)
                {
                    if(valuu)
                    {
                        var dataString = 'valuu=' + valuu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>/administrative_affairs/add_penalty',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $('#optionearea4').html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $('#optionearea4').html('');
                        return false;
                    }

                }

            </script>
            <script>
                $('#value').hide();
                function checkduration() {
                    var penalty_type =$("#penalty_type").val();
                    if(penalty_type ==1){
                        $('#value').show();
                    }else{
                        $('#value').hide();
                    }
                }
            </script>

