<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['sub_fields'] = 'active'; 
            $this->load->view('admin/public_relations/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result))
                        $id = $result['id'];
                     else
                        $id = 0;
                    echo form_open_multipart('public_relations/sub_fields/'.$id.'')?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">إسم المجال الرئيسي:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <select name="main_field_id" id="main_field_id" class="no-padding form-control" data-show-subtext="true" data-live-search="true" required>
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
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" value="<?php if(isset($result)) echo $result['sub_field_name'] ?>" class="r-inner-h4 " name="sub_field_name" id="sub_field_name" required>
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
                                    <img src="'.base_url().'uploads/images/'.$result['img'].'"  />
                                  </div>';
                        ?>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">عن المجال الفرعي:</h4>
                            </div>
                            
                            <div class="col-xs-9">
                                <textarea class="r-textarea" name="about" id="about" required><?php if(isset($result)) echo $result['about'] ?></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">تفاصيل المقطع:</h4>
                            </div>
                            
                            <div class="col-xs-9">
                                <textarea class="r-textarea" name="details" id="details" required><?php if(isset($result)) echo $result['details'] ?></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">مقطع إرشادي:</h4>
                            </div>
                            
                            <div class="col-xs-9">
                                <textarea class="r-textarea" name="details2" id="details2" required><?php if(isset($result)) echo $result['details2'] ?></textarea>
                            </div>
                        </div>
                        
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
                                        <th class="text-center">التفاصيل</th>
                                        <th class="text-center">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                for($x = 0 ; $x < count($table) ; $x++){
                                    echo '<tr>
                                            <td rowspan="'.count($table[key($table)]).'">'.($x+1).'</td>
                                            <td rowspan="'.count($table[key($table)]).'">'.$main[key($table)]->main_field_name.'</td>';
                                    for($z = 0 ; $z < count($table[key($table)]) ; $z++){
                                        echo   '<td>'.$table[key($table)][$z]->sub_field_name.'</td>
                                                <td>
                                                <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal" data-target=".firstModal'.$table[key($table)][$z]->id .'"></i>
                                                </td>
                                                <td>
                                                <a href="'.base_url().'public_relations/sub_fields/'.$table[key($table)][$z]->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
    
                                                <a  href="'.base_url().'public_relations/delete_main/'.$table[key($table)][$z]->id.'/sub_fields" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                                </td>
                                              </tr>';
                                        echo'<div class=" modal fade firstModal'.$table[key($table)][$z]->id.'" tabindex="-1" id="firstModal'.$table[key($table)][$z]->id.'" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="width: 55% !important;height: 100% ;max-width: none;">
                                                <div class="modal-dialog modal-md modal-dialog-manage">
                                                    <h6 class="pop-manage-h4"> جميع التفاصيل المتعلقة بمجال التبرع لـ <span class="pop-manage-span"> '.$table[key($table)][$z]->sub_field_name.' </span></h6>
                                                    
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                         <h4><b> الصورة : </b></h4>
                                                         </div>
                                                         <div class="col-sm-8">
                                                         <img src="'.base_url().'uploads/images/'.$table[key($table)][$z]->img.'" width="100%" style="height:250px;">
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                         <h4><b> عن المجال الفرعي : </b></h4>
                                                         </div>
                                                         <div class="col-sm-8">
                                                         <h4>'.$table[key($table)][$z]->about.'</h4>
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                         <h4><b> تفاصيل المقطع : </b></h4>
                                                         </div>
                                                         <div class="col-sm-8">
                                                         <h4>'.$table[key($table)][$z]->details.'</h4>
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                         <div class="col-md-4">
                                                         <h4><b> مقطع إرشادي : </b></h4>
                                                         </div>
                                                         <div class="col-sm-8">
                                                         <h4>'.$table[key($table)][$z]->details2.'</h4>
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="modal-footer ">
                                                        <button type="button" class="btn manage-close-pop" data-dismiss="modal">اغلاق</button>
                                                    </div>
                                                </div>
                                            </div>';
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