<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['main_data'] = 'active'; 
            $this->load->view('admin/public_relations/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(empty($table) && $table == null){
                        if(isset($result))
                            $form = 'update_main_data/'.$result['id'];
                        else
                            $form = 'add_main_data';
                    echo form_open_multipart('public_relations/'.$form.'')?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">إسم الجمعية:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" value="<?php if(isset($result)) echo $result['name'] ?>" class="r-inner-h4" name="name" id="name" placeholder="إسم الجمعية" required="required" />
                            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">تاريخ الإنشاء:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input ">
				                <div class="docs-datepicker">
								    <div class="input-group">
								        <input type="text" value="<?php if(isset($result)) echo $result['date_construct'] ?>" class="form-control docs-date" id="date_construct" name="date_construct" placeholder="شهر / يوم / سنة " required="required" />
								    </div>
								</div>
				            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">العنوان:</h4>
                            </div>
                            
                            <div class="col-xs-9 r-input">
                                <input type="text" class="r-inner-h4" value="<?php if(isset($result)) echo $result['address'] ?>" name="address" id="address" placeholder="العنوان" required="required" />
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">اللوجو:</h4>
                            </div>
                            
                            <div class="col-xs-9 r-input">
                                <input type="file" class="r-inner-h4 " name="logo" id="logo" <?php if(isset($result)) echo ''; else echo'required' ?> accept="image/*" />
                            </div>
                            
                        </div>
                        
                        <?php
                        if(isset($result))
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-3"></div>
                            
                                    <div class="col-xs-9 r-input">
                                        <img src="'.base_url().'uploads/images/'.$result['logo'].'" height="150px" width="150px" />
                                    </div>
                                  </div>';
                        ?>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">عدد أرقام التليفون:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" class="r-inner-h4" onkeyup="return lood($('#tele_info').val(),'#optionearea1','tele_info');" name="tele_info" id="tele_info" onkeypress="return isNumberKey(event)" placeholder="أقصى عدد 5" <?php if(isset($result)) echo ''; else echo'required' ?> />
                            </div>
                            
                        </div>
                        
                        <div id="optionearea1"></div>
                        
                        <?php
                        if(isset($result)){
                            $telephone=unserialize($result['tele_info']);
                            if($telephone){
                                echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                      <div class="col-xs-3"></div>
                            
                                      <div class="col-xs-6 r-input">
                                      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>';
                                for($x = 0 ; $x < count($telephone) ; $x++){
                                    if(count($telephone) > 1)
                                       $td = '<td>
                                                   <a  href="'.base_url().'public_relations/delete/tele_info/'.$result['id'].'/'.$x.'">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                              </td>';
                                    else
                                        $td = '';
                                        
                                    echo '<tr class="">
                                            <td>
                                                <input type="text" name="phone_old'.$x.'" onkeypress="return isNumberKey(event)" class="r-inner-h4" value="'.$telephone[$x].'" required="required" placeholder="يجب أدخال رقم للتليفون"/>
                                            </td>
                                            '.$td.'
                                          </tr>';
                                }
                                echo '</thead></table></div>';
                            }
                        }
                        ?>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">عدد أرقام الفاكس:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" class="r-inner-h4" onkeyup="return lood($('#fax_info').val(),'#optionearea2','fax_info');" name="fax_info" id="fax_info" onkeypress="return isNumberKey(event)" placeholder="أقصى عدد 5" <?php if(isset($result)) echo ''; else echo'required' ?> />
                            </div>
                            
                        </div>
                        
                        <div id="optionearea2"></div>
                        
                        <?php
                        if(isset($result)){
                            $fax=unserialize($result['fax_info']);
                            if($fax){
                                echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                      <div class="col-xs-3"></div>
                            
                                      <div class="col-xs-6 r-input">
                                      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                      <thead>';
                                for($x = 0 ; $x < count($fax) ; $x++){
                                    if(count($fax) > 1)
                                    {
                                        $td = '<td>
                                               <a  href="'.base_url().'public_relations/delete/fax_info/'.$result['id'].'/'.$x.'">
                                                <i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                               </td>';
                                    }
                                    else
                                        $td = '';
                                        
                                    echo '<tr class="">
                                          <td>
                                          <input type="text" onkeypress="return isNumberKey(event)" name="fax_old'.$x.'" class="r-inner-h4" value="'.$fax[$x].'" required="required" placeholder="يجب أدخال رقم للفاكس"/>
                                          </td>
                                          '.$td.'
                                          </tr>';
                                }
                                echo '</thead></table></div>';
                            }
                        }
                        ?>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">عدد البريد الألكتروني:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" class="r-inner-h4" onkeyup="return lood($('#email_info').val(),'#optionearea3','email_info');" name="email_info" id="email_info" onkeypress="return isNumberKey(event)" placeholder="أقصى عدد 5" <?php if(isset($result)) echo ''; else echo'required' ?> />
                            </div>
                            
                        </div>
                        
                        <div id="optionearea3"></div>
                        
                        <?php
                        if(isset($result)){
                            $email=unserialize($result['email_info']);
                            if($email){
                                echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                                      <div class="col-xs-3"></div>
                            
                                      <div class="col-xs-6 r-input">
                                      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                      <thead>';
                                for($x = 0 ; $x < count($email) ; $x++){
                                    if(count($email) > 1)
                                    {
                                        $td = '<td>
                                               <a  href="'.base_url().'public_relations/delete/email_info/'.$result['id'].'/'.$x.'">
                                                <i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                               </td>';
                                    }
                                    else
                                        $td = '';
                                        
                                    echo '<tr class="">
                                          <td>
                                          <input type="email" name="email_old'.$x.'" class="r-inner-h4" value="'.$email[$x].'" required="required" placeholder="يجب إدخال الإيميل"/>
                                          </td>
                                          '.$td.'
                                          </tr>';
                                }
                                echo '</thead></table></div>';
                            }
                        }
                        ?>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">عنوان الموقع:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" value="<?php if(isset($result)) echo $result['web_info'] ?>" class="r-inner-h4" name="web_info" id="web_info" placeholder="عنوان الموقع" required="required" />
                            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">فيس بوك:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" class="r-inner-h4" value="<?php if(isset($result)) echo $result['facebook'] ?>" name="facebook" id="facebook" placeholder="فيس بوك" required="required" />
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">تويتر:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" class="r-inner-h4" name="twitter" value="<?php if(isset($result)) echo $result['twitter'] ?>" id="twitter" placeholder="تويتر" required="required" />
                            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">يوتيوب:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" class="r-inner-h4" value="<?php if(isset($result)) echo $result['youtube'] ?>" name="youtube" id="youtube" placeholder="يوتيوب" required="required" />
                            </div>
                            
                        </div>
                        
                        <?php if($result){ ?>
                        <input type="hidden" name="count_phone" value="<?php echo count($telephone) ?>" />
                        <input type="hidden" name="count_fax" value="<?php echo count($fax) ?>" />
                        <input type="hidden" name="count_mail" value="<?php echo count($email) ?>" />
                        <?php } ?>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3 r-inner-btn">
                                <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right" />
                            </div>
                        </div>
                        
                    </div>
                    <?php echo form_close(); }?>
                </div>
                <?php if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">إسم الجمعية</th>
                                        <th class="text-center">التحكم</th>
                                        <th width="15%" class="text-center">عرض</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                    echo '<tr>
                                            <td>'.$table[0]->name.'</td>
                                            <td>
                                                <a href="'.base_url().'public_relations/update_main_data/'.$table[0]->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target="#myModal"><span><i class="fa fa-"></i></span> عرض التفاصيل </button>
                                            </td>
                                          </tr>';
                                     
                                ?>   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 55% !important;height: 100% ;max-width: none;">
      <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-body">
           <div class="row">
              <table id="" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%" style="margin-right: 6px;">
              <tr>
              <td>إسم المركز </td>
              <td><?php echo $table[0]->name ?></td>
              </tr>
              <tr>
              <td>اللوجو</td>
              <td  style="width: 76%;"><img src="<?php echo base_url('uploads/images/'.$table[0]->logo.''); ?>" width="15%"/></td>
              </tr>
              <tr>
              <td>تاريخ الإنشاء</td>
              <td><?php echo $table[0]->date_construct ?></td>
              </tr>
              <tr>
              <td><h5>ارقام التليفون</h5></td>
              <td>
              <?php
                $phones = unserialize($table[0]->tele_info);
                for($x = 0 ; $x < count($phones) ; $x++)
                    echo '<h5>'.$phones[$x].'</h5>';
              ?>
              </td>
              </tr>
              <tr>
              <td><h5>ارقام الفاكس</h5></td>
              <td>
              <?php
                $faxes = unserialize($table[0]->fax_info);
                for($x = 0 ; $x < count($faxes)  ;$x++)
                    echo '<h5>'.$faxes[$x].'</h5>';
              ?>
              </td>
              </tr>
              <tr>
              <td><h5>الايميلات</h5></td>
              <td>
              <?php
                $emails = unserialize($table[0]->email_info);
                for($x = 0 ; $x < count($emails) ; $x++)
                    echo '<h5>'.$emails[$x].'</h5>';  
              ?>
              </td>
              </tr>
              <tr>
              <td>العنوان</td>
              <td><?php echo $table[0]->address ?></td>
              </tr>
              <tr>
              <td>الموقع الإلكتروني</td>
              <td><?php echo $table[0]->web_info ?></td>
              </tr>
              <tr>
              <td>رابط الفيسبوك</td>
              <td><?php echo $table[0]->facebook ?></td>
              </tr>
              <tr>
              <td>رابط تويتر</td>
              <td><?php echo $table[0]->twitter ?></td>
              </tr>
              <tr>
              <td>رابط اليوتيوب</td>
              <td><?php echo $table[0]->youtube ?></td>
              </tr>
              </table>
            </div>
      </div>    
    </div>
    
    <div class="modal-footer ">
        <button type="button" class="btn manage-close-pop" data-dismiss="modal">اغلاق</button>
    </div>
    
  </div>
</div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>

<script>
 function lood(num,div,page){
    var cleer = '#' + page;
    if(num != 0)
    {
        var id = num;
        var dataString = 'num=' + id + '&page=' + page;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/Public_relations/add_main_data',
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
        $(cleer).val('');
        $(div).html('');
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