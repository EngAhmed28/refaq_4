<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['program_about'] = 'active'; 
            $this->load->view('admin/public_relations/main_tabs',$data);
            $array = array("نبذة عن",'الفكرة','الهدف','المبررات'); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result))
                        $id = $result['id'];
                     else
                        $id = 0;
                    echo form_open_multipart('public_relations/programs_about/'.$id.'')?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">إختر البرنامج:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <select name="program_id" id="program_id" onchange="return lood($('#program_id').val(),<?php echo $id ?>);" required>
                                    <?php
                                    if(isset($result))
                                        echo '<option value="'.$result['program_id'].'" selected>'.$programs[$result['program_id']]->program_name.'</option>';
                                    else{
                                        echo '<option value="">--قم بإختيار البرنامج--</option>';
                                        foreach($programs as $program)
                                            echo '<option value="'.$program->id.'">'.$program->program_name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">العنوان:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <select name="program_title" id="optionalarea1" required>
                                    <?php
                                    if(isset($result))
                                        echo '<option value="'.$result['program_title'].'">'.$result['program_title'].'</option>';
                                    else
                                        echo '<option value="">--قم بإختيار العنوان--</option>';
                                    ?>
                                </select>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">تفاصيل المقطع:</h4>
                            </div>
                            
                            <div class="col-xs-9 r-input">
		                         <textarea id="program_content" name="program_content" class="r-textarea" required ><?php  if(isset($result)) echo $result['program_content'] ?></textarea>
				            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        
                            <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
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
                                        <th class="text-center">إسم البرنامج</th>
                                        <th class="text-center">العنوان</th>
                                        <th class="text-center">المقطع</th>
                                        <th class="text-center">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                for($x = 0 ; $x < count($table) ; $x++){
                                    echo '<tr>
                                            <td rowspan="'.count($table[key($table)]).'">'.($x+1).'</td>
                                            <td rowspan="'.count($table[key($table)]).'">'.$programs[key($table)]->program_name.'</td>';
                                    for($z = 0 ; $z < count($table[key($table)]) ; $z++)
                                        echo '<td>'.$table[key($table)][$z]->program_title.'</td>
                                              <td>'.word_limiter($table[key($table)][$z]->program_content,10).'</td>  
                                              <td>
                                                <a href="'.base_url().'public_relations/programs_about/'.$table[key($table)][$z]->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
    
                                                <a  href="'.base_url().'public_relations/delete_about/'.$table[key($table)][$z]->id.'/programs_about" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                                </td>
                                              </tr>';
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
    function lood(main,id){
        $('#optionalarea1').html('<option>--قم بإختيار العنوان--</option>');
        if(main != '')
        {
            var dataString = 'main=' + main;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Public_relations/programs_about/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                 $('#optionalarea1').html(html);
                } 
            });
            return false;
        }  
    }
</script>