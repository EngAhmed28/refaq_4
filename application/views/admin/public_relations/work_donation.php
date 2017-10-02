<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['work_donation'] = 'active'; 
            $this->load->view('admin/public_relations/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result))
                        $id = $result['id'];
                     else
                        $id = 0;
                    echo form_open_multipart('public_relations/work_donation/'.$id.'')?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">إسم المجال الرئيسي:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <select name="main_field_id" id="main_field_id" onchange="return lood($('#main_field_id').val());" class="no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                                    <option value="">--قم بإختيار مجال التبرع--</option>
                                        <?php 
                                        if(isset($main) && $main != null)
                                            foreach($main as $record){
                                                if(isset($result['main_field_id']) && $result['main_field_id'] == $record->id)
                                                    $select = 'selected';
                                                else
                                                    $select = '';
                                                echo '<option value="'.$record->id.'" '.$select.'>'.$record->main_field_name.'</option>';
                                            }
                                        ?>
                                </select>
                            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">إسم المجال الفرعي:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input" id="optionalarea1">
                                <select name="sub_field_id" id="sub_field_id" class="no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                                    <option value="">--قم بإختيار المجال الفرعي--</option>
                                    <?php 
                                        if(isset($subs) && $subs != null)
                                            foreach($subs as $record){
                                                if(isset($result['sub_field_id']) && $result['sub_field_id'] == $record->id)
                                                    $select = 'selected';
                                                else
                                                    $select = '';
                                                echo '<option value="'.$record->id.'" '.$select.'>'.$record->sub_field_name.'</option>';
                                            }
                                    ?>
                                </select>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">صورة المقطع:</h4>
                            </div>
                            <div class="col-xs-3">
                                <input type="file" class="r-inner-h4 " name="img" id="img" <?php if(isset($result)) echo ''; else echo'required' ?> />
                            </div>
                        </div>
                        
                        <?php
                        if(isset($result))
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                        <img src="'.base_url().'uploads/images/'.$result['img'].'" height="150px" width="150px" />
                                  </div>
                                  
                                  <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                        <div class="col-xs-3">
                                            <h4 class="r-h4">المقطع :</h4>
                                        </div>
                                        
                                        <div class="col-xs-9">
                                            <textarea class="r-textarea" name="title" id="title" required>'.$result['title'].'</textarea>
                                        </div>
                                  </div>';
                        else{
                        ?>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">عدد المقاطع:</h4>
                            </div>
                            
                            <div class="col-xs-3">
                                <input type="text" onkeyup="return lood2($('#num_title').val());" onkeypress="return isNumberKey(event)" class="r-inner-h4 " name="num_title" id="num_title" placeholder="أقصى عدد 6">
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data" id="optionalarea2">
                            
                        </div>
                        
                        <?php } ?>
                        
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
                                        <th class="text-center">م</th>
                                        <th class="text-center">المجال الرئيسي</th>
                                        <th class="text-center">المجال الفرعي</th>
                                        <th class="text-center">الصورة</th>
                                        <th class="text-center">التفاصيل</th>
                                        <th class="text-center">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                for($x = 0 ; $x < count($table) ; $x++){ 
                                    $totalTickets = array_sum(array_map("count", $table[key($table)]));
                                
                                    echo '<tr>
                                            <td rowspan="'.$totalTickets.'">'.($x+1).'</td>
                                            <td rowspan="'.$totalTickets.'">'.$main[key($table)]->main_field_name.'</td>';
                                    for($a = 0 ; $a < count($table[key($table)]) ; $a++){
                                        echo   '<td rowspan="'.count($table[key($table)][key($table[key($table)])]).'">'.$sub[key($table[key($table)])]->sub_field_name.'</td>
                                                <td rowspan="'.count($table[key($table)][key($table[key($table)])]).'"><img src="'.base_url().'uploads/images/'.$table[key($table)][key($table[key($table)])][0]->img.'" height="100px" width="100px" /></td>';
                                        for($z = 0 ; $z < count($table[key($table)][key($table[key($table)])]) ; $z++){ 
                                            echo '  <!--td><img src="'.base_url().'uploads/images/'.$table[key($table)][key($table[key($table)])][0]->img.'" height="40px" width="100px" /></td-->
                                                    <td>'.word_limiter($table[key($table)][key($table[key($table)])][$z]->title,6).'</td>
                                                    <td>
                                                        <a href="'.base_url().'public_relations/work_donation/'.$table[key($table)][key($table[key($table)])][$z]->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
            
                                                        <a  href="'.base_url().'public_relations/delete_donation/'.$table[key($table)][key($table[key($table)])][$z]->id.'/work_donation" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
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
    function lood(main){
        if(main != '')
        {
            var dataString = 'main=' + main;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Public_relations/work_donation/0',
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
            $('#optionalarea1').html('<select name="sub_field_id" id="sub_field_id" class="no-padding form-control" data-show-subtext="true" data-live-search="true" required><option value="">--قم بإختيار المجال الفرعي--</option></select>');
            return false;
        }  
    }
</script>

<script>
    function lood2(num){
        if(num != 0)
        {
            var dataString = 'num=' + num;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Public_relations/work_donation/0',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                 $('#optionalarea2').html(html);
                } 
            });
            return false;
        }
        else
        {
            $('#num_title').val('');
            $('#optionalarea2').html('');
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