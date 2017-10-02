
            <div class="col-sm-11 col-xs-12">
            
                    <!--  -->
                    <?php $this->load->view('admin/council/main_tabs'); ?>
                    <!--  -->
            
            <?php if(isset($select_all)):?>

            <?php
               if(!empty($select_members)):
                $arr =array();
                  foreach( $select_members as $member):
                  $arr[]= $member->members_nums;
                  endforeach;
                   endif;
                echo form_open_multipart('admin/Directors/edit_time_table/'.$select_all[0]->council_id_fk)?>
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ الجلسة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" name="session_date"  value="<? echo date('m-d-Y',$select_all[0]->session_date);?>" placeholder="شهر / يوم / سنة ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">الأعضاء </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <?php if (!empty($members)):
                                            $d=1;
                                            for ($a=0;$a<sizeof($members);$a++):
                                                $checked='';
                                                if(!empty($arr)):
                                                if(in_array($members[$a]->id, $arr)){
                                                $checked ='checked';
                                                }
                                                    endif;
                                                ?>
                                                <input type="checkbox" name="member<? echo$d; ?>" value="<? echo $members[$a]->id;  ?>" <? echo $checked; ?>><? echo $members[$a]->member_name;  ?><br>
                                                <?php $d++;endfor; endif;?>
                                    </div>
                                    <input type="hidden" name="max" value="<? echo sizeof($members); ?>"/>
                                </div>

                              <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> إضافة بنود </h4>
                                    </div>
                                    <div class="col-xs-2 r-input">
                                        <input type="number" id="band_num"  name="band_num" min="1" max="10"
                                           onkeyup="return lood_edit($('#band_num').val());" class="form-control text-right"  />
                                    </div>
                                </div>
                               




                            </div>
                            
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">  اختر كود المجلس </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="council_id_fk">
                                            <option> - اختر - </option>
                                            <?php if(!empty($magls)):

                                                foreach ($magls as $record):
                                                    $select='';
                                                    if($select_all[0]->council_id_fk == $record->id){
                                                     $select='selected';
                                                    }

                                                    ?>
                                                    <option value="<? echo $record->id; ?>" <?php echo $select;?>><? echo $record->id;?></option>
                                                <?php endforeach; endif;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                               <div  class="col-xs-12" id="optionearea2"></div> 
                                 <div class="col-xs-4"></div>
                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="edit" value="تعديل" />
                        </div>
                        <div class="col-xs-7"></div>
                       

                    </div>

                    <!---table------>
                    
                </div>

             <?php echo form_close()?>
             <?php else: ?>
             <?php echo form_open_multipart('admin/Directors/add_time_table')?>

            <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ الجلسة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" name="session_date" placeholder="شهر / يوم / سنة ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">الأعضاء </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <?php if (!empty($members)):
                                            $d=1;
                                            for ($a=0;$a<sizeof($members);$a++):
                                                ?>
                                                <input type="checkbox" name="member<? echo$d; ?>" value="<? echo $members[$a]->id;  ?>"><?php  echo $members[$a]->member_name;  ?><br>
                                        <?php $d++;endfor; endif;?>
                                    </div>
                                    <input type="hidden" name="max" value="<? echo sizeof($members); ?>"/>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">البنود </h4>
                                    </div>
                                    <div class="col-xs-2 r-input">
                                        <input type="number" id="band_num"  name="band_num" min="1" max="10" onkeyup="return lood($('#band_num').val());" class="form-control text-right"  required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">  اختر كود المجلس </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="council_id_fk">
                                            <option> - اختر - </option>
                                     <?php if(!empty($magls)):

                                         foreach ($magls as $record):?>
                                            <option value="<?php echo $record->id; ?>"><?php echo $record->id;?></option>
                                            <?php endforeach; endif;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="col-xs-12" id="optionearea1"></div>
                        <div class="col-xs-4"></div>
                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="add" value="حفظ" />
                        </div>
                        <div class="col-xs-7"></div>
                        <?php echo form_close()?>

                    </div>

                <!---table------>
                <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">تاريخ الجلسة</th>
                                            <th class="text-center">بنود الجلسة </th>
                                            <th class="text-center">الحضور</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                  

                                    <?php
                                    $a=1;
                                    foreach ($records as $record ):?>
                                        <tr>
<td><?php echo $a ?></td>
<td><?php echo date('d-m-Y',$record->session_date) ?></td>
<td><a href="<?php echo base_url().'admin/Directors/items_decisions/'.$record->id?>">
<button type="button" class="btn btn-info btn-md"  ><i class="fa fa-list"></i> عرض </button></a></td>
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
<td> <a href="<?php echo base_url('admin/Directors/delete_time_table').'/'.$record->id?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
</span>  <a href="<?php echo base_url('admin/Directors/edit_time_table').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
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
          

            </div>


            </div>
            <?php endif; ?>
            <script>
                function lood(num){
                    if(num>0 && num != '')
                    {
                        var id = num;
                        var dataString = 'band_num=' + id ;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>admin/Directors/add_time_table',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $("#optionearea1").html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $("#vid_num").val('');
                        $("#optionearea1").html('');
                    }
                }
                
                function lood_edit(num){
                    if(num>0 && num != '')
                    {
                        var id = num;
                        var dataString = 'band_num=' + id ;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>admin/Directors/band_num',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $("#optionearea2").html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $("#vid_num").val('');
                        $("#optionearea2").html('');
                    }
                }
                
                
                
                
                
                
            </script>
