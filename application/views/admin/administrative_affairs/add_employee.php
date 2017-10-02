
<style>
.col-sm-11.left_side.padding-4 {
    width: 95% !important;
    
}

.r-input {
    margin-top: 3px;
    padding-left: 0px;
    padding-right: 0px;
}

</style>



        <div class="col-sm-11 col-xs-12 left_side padding-4">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <?php if(isset($result)):?>
            <!--edit-->
                        <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('Administrative_affairs/edit_employee/'.$result[0]->id)?>
                    <div class="col-xs-12 ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">كود الموظف </h4>
                                </div>
                                <?php  
    
                                if(!empty($count)){
                                $value=($count[0]->id)+1;
                                }else{
                                    $value =1;
                                }?>
                                <div class="col-xs-6 r-input">
                                    <input type="text" readonly class="r-inner-h4" name="emp_code" value="<? echo $result[0]->id;?>">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الإدارة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="administration" id="administration"   onchange="return lood($('#administration').val());">
                                  
                                        <?php if(!empty($admin)):
                                       
                                        foreach ($admin as $record):
                                            $sect='';
                                        if( $result[0]->administration ==$record->id ){
                                            $sect ='selected';
                                        }
                                        ?>
                                            <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->name;?></option>
                                        <?php  endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع التعيين </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                   <select name="contract"  id="contract" onchange=" return go($('#contract').val())">
                                       <?if($result[0]->contract ==0){?>
                                       <option value="0">مكلف</option>
                                       <option value="1">مكافأة</option>
                                       <?}elseif($result[0]->contract ==1){?>   
                                       <option value="1">مكافأة</option>
                                       <option value="0">مكلف</option>
                                       <?}?>
                            
                                   </select>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  تاريخ الميلاد </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                    <input type="text" class="form-control " name="birth_date" value="<? echo date('m-d-Y',$result[0]->birth_date); ?>"  placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">رقم الهاتف </h4>
                                </div>
                               
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" name="phone_num" value="<?echo $result[0]->phone_num;?>" >
                                </div>
                            </div>
                          <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">الراتب </h4>
                                </div>
                               
                                <div class="col-xs-4 r-input">
                                    <input type="number" class="r-inner-h4" name="salary" value="<?echo $result[0]->salary;?>"  >
                              </div>
                               <div class="col-xs-2 r-input">
                                          <label>ريال</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إسم الموظف </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name="employee" value="<?echo $result[0]->employee;?>" >
                                </div>
                            </div>
                            <div class="col-xs-12" id="optionearea1">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> القسم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
         <select  name="department">
            <option value="">إختر</option>
            <?php if(!empty($admin)):
                foreach ($departs[$result[0]->administration] as $record):
            $select='';
             if($record->id == $result[0]->department ){
              $select='selected';    
             }
             ?>
                    <option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->name;?></option>
                <?php  endforeach; endif;?>
        </select>
                                </div>
                            </div>
                            <? if($result[0]->contract ==0){?>
                            <div class="col-xs-12"   id="contract_id">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">قرار التكليف </h4>
                                </div>

                                <div class="col-xs-6 r-input">
                                    <div class="field">

                                        <input type="text"  value="" size="40" style=" height:35px;" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="img" class="file_input_with_replacement">
                                    </div>
                                </div>
                            </div>
                            <? }?>
                               <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الهوية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" name="id_num" value="<?echo $result[0]->id_num;?>">
                                </div>
                            </div>
                             <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">العنوان</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name="address" value="<?echo $result[0]->address;?>">
                                </div>
                            </div>
                              <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">البريد الإلكتروني </h4>
                                </div>
                               
                                <div class="col-xs-6 r-input">
                                    <input type="email" class="r-inner-h4" name="email" value="<?echo $result[0]->email;?>" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<div class="col-xs-12 r-inner-details">
<div class="col-xs-6">
<h4 class="r-h4"> إعدادات الأجازات والأذونات </h4>
</div>
<div class="col-xs-12 ">
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">



<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> إعدادات الأجازات والأذونات </h4>
</div><div class="col-xs-6 r-input">
<select name="group_affairs_id_fk" id="group_affairs_id_fk" class="form-control" >

    <?php if(!empty($affairs_settings_options_FK)):
   
    foreach ($affairs_settings_options_FK as $record):
        $sect='';
    if( $result[0]->group_affairs_id_fk ==$record->id ){
        $sect ='selected';
    }
    ?>
        <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->set_name;?></option>
    <?php  endforeach; endif;?>
</select>
</div>                           
</div> 






<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> رصيد أجازات سابق </h4>
</div><div class="col-xs-6 r-input">
<input type="text" class="r-inner-h4 form-control" name="past_days"   value="<?php echo $result[0]->past_days;?>" />
</div>                           
</div> 






</div>
</div> 
</div>









                <div class="col-xs-12 r-inner-btn">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" role="button" name="edit" value="حفظ" class="btn pull-right">

                    </div>
                    <?php echo form_close()?>
                    <div class="col-xs-2">
                      
                    </div>
                </div>

            </div>
            <!--edit-->
             <?php else: ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('Administrative_affairs/add_employee')?>
                    <div class="col-xs-12 ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> كود الموظف </h4>
                                </div>
                                <?php  
    
                                if(!empty($count)){
                                $value=($count[0]->id)+1;
                                }else{
                                    $value =1;
                                }?>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" readonly name="emp_code" value="<? echo $value;?>">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الإدارة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="administration" id="administration"   onchange="return lood($('#administration').val());">
                                    <option value="">إختر</option>
                                        <?php if(!empty($admin)):
                                        foreach ($admin as $record):?>
                                            <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                                        <?php  endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع التعيين </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                   <select name="contract"  id="contract" onchange=" return go($('#contract').val())">
                                       <option value="">إختر</option>
                                       <option value="0">مكلف</option>
                                       <option value="1">مكافأة</option>
                                   </select>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  تاريخ الميلاد </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="birth_date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">رقم الهاتف </h4>
                                </div>
                               
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" name="phone_num" >
                                </div>
                            </div>
                          <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">الراتب </h4>
                                </div>
                               
                                <div class="col-xs-4 r-input">
                                    <input type="number" class="r-inner-h4" name="salary" >
                              </div>
                               <div class="col-xs-2 r-input">
                                          <label>ريال</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إسم الموظف </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name="employee">
                                </div>
                            </div>
                            <div class="col-xs-12" id="optionearea1">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> القسم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="department">
                                        <option value="">إختر</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12" id="contract_id" style="display: none" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4">قرار التكليف </h4>
                                </div>

                                <div class="col-xs-6 r-input">
                                    <div class="field">

                                        <input type="text"  value="" size="40" style=" height:35px;" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="img" class="file_input_with_replacement">
                                    </div>
                                </div>
                            </div>
                               <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الهوية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" name="id_num">
                                </div>
                            </div>
                             <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">العنوان</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name="address">
                                </div>
                            </div>
                              <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">البريد الإلكتروني </h4>
                                </div>
                               
                                <div class="col-xs-6 r-input">
                                    <input type="email" class="r-inner-h4" name="email" >
                                </div>
                            </div>
                            
                            
                            
                            
                        </div>
                        
                        
                        
                        
               
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
<div class="col-xs-12 r-inner-details">
<div class="col-xs-6">
<h4 class="r-h4"> إعدادات الأجازات والأذونات </h4>
</div>
<div class="col-xs-12 ">
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> إعدادات الأجازات والأذونات </h4>
</div><div class="col-xs-6 r-input">
<select name="group_affairs_id_fk" id="group_affairs_id_fk" >
<option value="">إختر</option>
<?php if(!empty($affairs_settings_options)):
foreach ($affairs_settings_options as $record):?>
<option value="<? echo $record->id;?>"><? echo $record->set_name;?></option>
<?php  endforeach; endif;?>
</select>   </div>                           
</div>  

<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> رصيد أجازات سابق </h4>
</div><div class="col-xs-6 r-input">
<input type="text" class="r-inner-h4" name="past_days">
</div>                           
</div> 

</div>
</div> 
</div>




                <div class="col-xs-12 r-inner-btn">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right">

                    </div>
                    <?php echo form_close()?>
                    <div class="col-xs-2">
                       
                    </div>
                </div>

            </div>
            <!---table------>
                <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12 r-inner-details">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">إسم الموظف</th>
                                        
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                   

                                    <?php
                                    $a=1;
                                    foreach ($records as $record ):?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><? echo $record->employee;?></td>
                                            <td> <a href="<?php echo base_url('Administrative_affairs/delete_employee').'/'.$record->id?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url('Administrative_affairs/edit_employee').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                        </tr>
                                        <?php
                                        $a++;
                                    endforeach;  ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php  endif; endif; ?>
<!---table------>
        </div>
    </div>
</div>

   
        
          

<script>
    function lood(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'admin_num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Administrative_affairs/add_employee',
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
</script>

<script>
    $(document).ready(function () {
        $('#contract_id').hide();
    });

    function go(valu) {
        if(valu === '0'){
            $('#contract_id').show();
        }else{
            $('#contract_id').hide();
        }

    }
</script>
