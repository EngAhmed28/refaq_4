<style>
.r-pop-up {
    padding: 0;
}

.r-pop-up img {
    width: 93%;
    height: 150px;
}

.r-pop-up .chip {
    margin-top: 20px;
}

.r-pop-up .chip iframe {
    width: 96%;
    height: 180px;
}

.r-pop-up .closebtn {
    padding-left: 10px;
    color: #888;
    font-weight: bold;
    float: right;
    font-size: 20px;
    cursor: pointer;
    position: absolute;
    top: 0;
    right: 8%;
}

.r-pop-up .closebtn:hover {
    color: #000;
}
.modal1{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
.r-sss{
    width: 100px;
    height: auto;
    background-color: #0c1e56;
    color: #fff;

}
.r-sss:hover{
    color: #0c1e56;
    background-color: #fff;
}
</style>
<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['program'] = 'active'; 
            $this->load->view('admin/public_relations/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result))
                        $id = $result['id'];
                     else
                        $id = 0;
                    echo form_open_multipart('public_relations/programs/'.$id.'')?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">إسم البرنامج:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" value="<?php if(isset($result)) echo $result['program_name'] ?>" class="r-inner-h4 " name="program_name" id="program_name" required>
                            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">لوجو البرنامج:</h4>
                            </div>
                            
                            <?php
                            if(isset($result))
                                $require = '';
                            else
                                $require = 'required';
                            ?>
                            
                            <div class="col-xs-3 r-input">
                                <input type="file" class="r-inner-h4 " name="logo" id="logo" <?php echo $require ?> >
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">فترة البرنامج من:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input ">
				                <div class="docs-datepicker">
								    <div class="input-group">
								        <input type="text" value="<?php if(isset($result)) echo date("Y-m-d",$result['program_from']) ?>" class="form-control docs-date" id="program_from" name="program_from" placeholder="شهر / يوم / سنة " required>
								    </div>
								</div>
				            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">فترة البرنامج إلى:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input ">
				                <div class="docs-datepicker">
								    <div class="input-group">
								        <input type="text" value="<?php if(isset($result)) echo date("Y-m-d",$result['program_to']) ?>" class="form-control docs-date" id="program_to" name="program_to" placeholder="شهر / يوم / سنة " required>
								    </div>
								</div>
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
                                        <th class="text-center">لوجو البرنامج</th>
                                        <th class="text-center">فترة البرنامج من</th>
                                        <th class="text-center">فترة البرنامج إلى</th>
                                        <th>ألبومات وفيديوهات</th>
                                        <th class="text-center">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $x = 1;
                                foreach($table as $record){
                                    echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td>'.$record->program_name.'</td>
                                            <td><image src="'.base_url().'uploads/images/'.$record->logo.'" style="height:150px; width:150px"></td>
                                            <td>'.date("Y-m-d",$record->program_from).'</td>
                                            <td>'.date("Y-m-d",$record->program_to).'</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target=".bs-example-modal-lg'.$record->id.'"><span><i class="fa fa-"></i></span> صور وقيديوهات </button>
                                            </td>
                                            <td>
                                            <a href="'.base_url().'public_relations/programs/'.$record->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>

                                            <a  href="'.base_url().'public_relations/delete_programs/'.$record->id.'/programs" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                            </td>
                                          </tr>';
                                          
                                    echo '<div class="modal1 fade bs-example-modal-lg'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel"> صور وفيديوهات لبرنامج '.$record->program_name.'</h4>
                                                    </div>
                                                    <form method="post" name="form'.$record->id.'" enctype="multipart/form-data" action="'.base_url().'Public_relations/programs_photo">
                                                    <div class="modal-body">
                                                        <div class="col-xs-12">
                                                            <div id="content">
                                                                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                                                    <li class="active"><a href="#red'.$record->id.'" data-toggle="tab">صور</a></li>
                                                                    <li><a href="#orange'.$record->id.'" data-toggle="tab">فيديو</a></li>
                                                                </ul>
                                                                <div id="my-tab-content" class="tab-content">
                                                                    <div class="tab-pane active" id="red'.$record->id.'">
                                                                        <br />
                                                                        <div class="col-xs-12">
                                                                            <div class="col-xs-3">
                                                                                <h4 class="r-h4">أضف الصور:</h4>
                                                                            </div>
                                                                            <div class="col-xs-3">
                                                                                <input type="file" name="imgs[]" multiple/>
                                                                                <!--input type="text" class="r-inner-h4" onkeyup="return lood($(\'#img_num'.$record->id.'\').val(),\'#optionearea'.$record->id.'\','.$id.',\'#img_num'.$record->id.'\',0);" name="img_num'.$record->id.'" id="img_num'.$record->id.'" onkeypress="return isNumberKey(event)" placeholder="أقصى عدد 4"-->
                                                                            </div>
                                                                            <div class="col-xs-12" id="optionearea'.$record->id.'"></div>
                                                                        </div>
                                                                        <div class="col-xs-12 r-pop-up">';
                                    if(isset($photo[$record->id]) && $photo[$record->id] != null){
                                        for($z = 0 ; $z < count($photo[$record->id]) ; $z++)
                                            echo '                              <div class="chip col-md-3 col-sm-6 col-xs-12">
                                                                                    <img src="'.base_url().'uploads/images/'.$photo[$record->id][$z]->img.'" alt="Person" class="center-block">
                                                                                    <span title="حذف" style="top: -22px; right: 3%;" class="closebtn" onclick="del('.$photo[$record->id][$z]->id.','.$id.');this.parentElement.style.display=\'none\';">&times;</span>
                                                                                </div>';
                                    }
                                    else
                                        echo '<div class="alert alert-warning chip col-xs-12">
                                                    <h2>لا توجد صور تمت إضافتها</h2>
                                              </div>';
                                                                            
                                    echo '                              </div>
    
                                                                    </div>
                                                                    <div class="tab-pane" id="orange'.$record->id.'">
                                                                        <br />
                                                                        <div class="col-xs-12">
                                                                            <div class="col-xs-3">
                                                                                <h4 class="r-h4">أضف لينك الفيديو:</h4>
                                                                            </div>
                                                                            <div class="col-xs-6">
                                                                                <input type="text" name="videos"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 r-pop-up">';                                    
                                    if(isset($video[$record->id]) && $video[$record->id] != null){
                                        for($z = 0 ; $z < count($video[$record->id]) ; $z++)
                                            echo '                              <div class="chip col-md-3 col-sm-6 col-xs-12">
                                                                                    <iframe src="https://www.youtube.com/embed/'.$video[$record->id][$z]->img.'" frameborder="0" allowfullscreen></iframe>
                                                                                    <span title="حذف" class="closebtn" style="top: -22px; right: 0%;" onclick="del('.$video[$record->id][$z]->id.','.$id.');this.parentElement.style.display=\'none\'">&times;</span>
                                                                                </div>';
                                    }
                                    else
                                        echo '<div class="alert alert-warning chip col-xs-12">
                                                    <h2>لا توجد فيديوهات تمت إضافتها</h2>
                                              </div>';
                                                                            
                                    echo '                              </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="program_id" value="'.$record->id.'" />
                                                        <!--input type="hidden" name="type'.$record->id.'" /-->
                                                        <button type="submit" name="add_photo" class="btn btn-default store-btn1 r-sss">حفظ</button>
                                                        <button type="button" class="btn btn-default store-btn1 r-sss" data-dismiss="modal">إغلاق</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>';
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
    function del(code, id){
        if(code != '')
        {
            var dataString = 'code=' + code;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Public_relations/programs/'+id,
                data:dataString,
                dataType: 'html',
                cache:false
            });
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
 function lood(num,div,id,inpu,type){
    if(num != 0)
    {
        var dataString = 'num=' + num + '&type=' + type;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/Public_relations/programs/'+ id,
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $(div).html(html);
            } 
        });
        return false;
        }
    else
    {
        $(inpu).val('');
        $(div).html('');
        return false;
    }  
 }
</script>