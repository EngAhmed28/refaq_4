<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['crashes'] = 'active'; 
            $this->load->view('admin/cars/main_tabs2',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    $crashe_status = array('لم يتم التصليح','جاري التصليح','تم التصليح');
                    if(isset($result))
                        $id = $result['id'];
                     else
                        $id = 0;
                    echo form_open_multipart('dashboard/car_crash/'.$id.'')?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        
                            <div class="col-xs-2">
                                <h4 class="r-h4">رقم العطل:</h4>
                            </div>
                            <div class="col-xs-2">
                                <input type="text" class="r-inner-h4 " name="crashe_num" id="crashe_num" value="<?php if(isset($result)) echo $result['crashe_num']; else{if(isset($last) && $last != null) echo ($last[0]->crashe_num+1); else echo 1;} ?>" readonly />
                            </div>
                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">إختر السيارة:</h4>
                            </div>
                            
                            <div class="col-xs-2 r-input">
                                <select name="car_id_fk" id="car_id_fk" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                                    <option value="">--قم بإختيار السيارة--</option>
                                        <?php 
                                        if(isset($cars) && $cars != null)
                                            foreach($cars as $record){
                                                if(isset($result['car_id_fk']) && $result['car_id_fk'] == $record->id)
                                                    $select = 'selected';
                                                else
                                                    $select = '';
                                                echo '<option value="'.$record->id.'" '.$select.'>'.$record->car_code.'</option>';
                                            }
                                        ?>
                                </select>
                            </div>
                            
                            <div class="col-xs-2">
                                <h4 class="r-h4">عدد الأعطال:</h4>
                            </div>
                            <div class="col-xs-2">
                                <?php
                                if(isset($result))
                                    $required = '';
                                else
                                    $required = 'required';
                                ?>
                                <input type="text" class="r-inner-h4 " name="count" id="count" onkeyup="return lood($('#count').val(),<?php echo $id ?>);" onkeypress="return isNumberKey(event)" <?php echo $required ?> />
                            </div>
                            
                        </div>
                        
                        <?php
                        if(isset($result) && $result != null){
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                      <div class="col-xs-3">
                                        <h4 class="r-h4">إسم العطل:</h4>
                                      </div>
                                                        
                                      <div class="col-xs-3 r-input">
                                        <input type="text" class="r-inner-h4" value="'.$result['crashe_name'].'" name="crashe_name_old" id="crashe_name_old" required>
                                      </div>
                                      
                                      <div class="col-xs-3">
                                        <h4 class="r-h4">حالة العطل:</h4>
                                      </div>
                                                        
                                      <div class="col-xs-3 r-input">
                                        <select name="crashe_status_old" id="crashe_status_old" class="no-padding form-control" required>
                                            <option value="">--قم بإختيار حالة العطل--</option>';
                            for($z = 0 ; $z < count($crashe_status) ; $z++){
                                if($z == $result['crashe_status'])
                                    $select = 'selected';
                                else
                                    $select = '';
                                echo '      <option value="'.$z.'" '.$select.'>'.$crashe_status[$z].'</option>';
                            }
                            echo '       </select>
                                      </div>
                                  </div>
                                        
                                  <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">            
                                      <div class="col-xs-3">
                                        <h4 class="r-h4">ملاحظات:</h4>
                                      </div>
                                                        
                                      <div class="col-xs-9">
                                        <textarea class="r-textarea" name="notes_old" id="notes_old" required>'.$result['notes'].'</textarea>
                                      </div>
                                  </div>';
                        }
                        ?>
                        <div id="optionalarea1"></div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3 r-inner-btn">
                                <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right" />
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
                                        <th class="text-center">#</th>
                                        <th class="text-center">رقم السيارة</th>
                                        <th class="text-center">رقم العطل</th>
                                        <th class="text-center">إسم العطل</th>
                                        <th class="text-center">حالة العطل</th>
                                        <th class="text-center">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" id="optionalarea2">
                                   
                                <?php
                                for($x = 0 ; $x < count($table) ; $x++){ 
                                    $totalTickets = array_sum(array_map("count", $table[key($table)]));
                                
                                    echo '<tr>
                                            <td rowspan="'.$totalTickets.'">'.($x+1).'</td>
                                            <td rowspan="'.$totalTickets.'">'.$cars[key($table)]->car_code.'</td>';
                                    for($a = 0 ; $a < count($table[key($table)]) ; $a++){
                                        echo   '<td rowspan="'.count($table[key($table)][key($table[key($table)])]).'">'.$table[key($table)][key($table[key($table)])][0]->crashe_num.'</td>';
                                        for($z = 0 ; $z < count($table[key($table)][key($table[key($table)])]) ; $z++){ 
                                            echo '  <td>'.$table[key($table)][key($table[key($table)])][$z]->crashe_name.'</td>
                                                    <td>'.$crashe_status[$table[key($table)][key($table[key($table)])][$z]->crashe_status].'</td>
                                                    <td>
                                                        <a href="'.base_url().'dashboard/car_crash/'.$table[key($table)][key($table[key($table)])][$z]->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
            
                                                        <a class="deleteItem" href="" onclick="del('.$table[key($table)][key($table[key($table)])][$z]->id.','.$id.');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                                    </td>
                                                  </tr>';
                                        }
                                        next($table[key($table)]);
                                    }
                                    next($table);
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

<script>
    function lood(count,id){
        if(count != 0)
        {
            var dataString = 'count=' + count;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/car_crash/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                 $('#optionalarea1').html(html);
                } 
            });
            return false;
        }
        else
        {
            $('#optionalarea1').html('');
            $('#count').val('');
            return false;
        }  
    }
</script>

<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<script>
    function del(code, id){
        if(code != '')
        {
            if(confirm('هل انت متأكد من عملية الحذف ؟')){
                var dataString = 'code=' + code;
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>/dashboard/car_crash/'+id,
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(dataType){
                        $('a.deleteItem').live('click', function(){ 
                            var tableRow = $(this).closest('tr');
                            tableRow.find('td').fadeOut('slow', 
                                function(){ 
                                    tableRow.remove();                   
                                }
                            );
                        });
                    }
                });
                return false;
            }
        }  
    }
</script>