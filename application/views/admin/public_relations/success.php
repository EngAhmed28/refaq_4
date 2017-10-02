<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['success'] = 'active'; 
            $this->load->view('admin/public_relations/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result))
                        $id = $result['id'];
                     else
                        $id = 0;
                    echo form_open_multipart('public_relations/success/'.$id.'')?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">عنوان الصورة:</h4>
                            </div>
                            
                            <div class="col-xs-6 r-input">
                                <input type="text" value="<?php if(isset($result)) echo $result['name'] ?>" class="r-inner-h4 " name="name" id="name" required>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">الصورة:</h4>
                            </div>
                            
                            <div class="col-xs-6 r-input">
                                <input type="file" class="r-inner-h4 " name="img" id="img" <?php if(isset($result)) echo ''; else echo'required' ?> accept="image/*" />
                            </div>
                            
                        </div>
                        
                        <?php
                        if(isset($result))
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-3"></div>
                            
                                    <div class="col-xs-9 r-input">
                                        <img src="'.base_url().'uploads/images/'.$result['img'].'" height="150px" width="150px" />
                                    </div>
                                  </div>';
                        ?>
                        
                        <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                                <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right" />
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
                                        <th class="text-center">عنوان الصورة</th>
                                        <th class="text-center">الصورة</th>
                                        <th class="text-center">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $x = 1;
                                foreach($table as $record){
                                    echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td>'.$record->name.'</td>
                                            <td><img src="'.base_url().'uploads/images/'.$record->img.'" height="100px" width="100px" /></td>
                                            <td>
                                            <a href="'.base_url().'public_relations/success/'.$record->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>

                                            <a  href="'.base_url().'public_relations/delete_success/'.$record->id.'/success" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                            </td>
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