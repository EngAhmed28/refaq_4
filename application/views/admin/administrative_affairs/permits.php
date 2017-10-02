

<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
           
           
                                           <?php 
    
//    print_r($_SESSION);
/*
    echo '<pre/>'; 
    echo $_SESSION['emp_code'];
    echo '<pre>';
    
*/
    
    
     ?>
           
           
           
            <?php if(isset($result)):?>
            <!--edit-->
                         <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('Administrative_affairs/edit_permits/'.$result[0]->id)?>
                    <div class="col-xs-12 ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الطلب </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                               <input type="number" id="permit_num" name="permit_num" value="<?php echo $result[0]->permit_num; ?>" class="form-control text-left"  readonly/>
                                </div>
                            </div>
                             <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">الإسم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name="emp_code" value="<?if(!empty($select[$result[0]->emp_code][0]->employee)): echo  $select[$result[0]->emp_code][0]->employee ; endif;?>"  readonly>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع الإذن </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                   <select name="permit_type"  id="permit_type" >
                                       <?php if($result[0]->permit_type ==1){?>
                                     <option value="1">صباحى</option>
                                     <option value="2">مسائي</option>
                                       <?}elseif($result[0]->permit_type ==2){?>
                                     <option value="2">مسائي</option> 
                                      <option value="1">صباحى</option>  
                                       <?}?>
                                
                                   </select>
                                </div>
                            </div>
                         <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 "> وقت العودة</h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                           <input type="time" id="time_return" name="time_return"  style="    padding-left: 107px;" placeholder="وقت العودة" class="form-control " value="<? echo $result[0]->time_return;?>"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
   
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                   <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  التاريخ</h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date"  value="<? echo date('m-d-Y',$result[0]->date);?>"  name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">المسمي الوظيفي </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name=""  readonly value="<? if(!empty($select[$result[0]->emp_code][0]->department)): echo $job_title[$select[$result[0]->emp_code][0]->department][0]->name; endif;?>">
                                </div>
                            </div>
            
                          <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  وقت الخروج</h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                           <input type="time" id="time_out" name="time_out"  style="    padding-left: 107px;"  value="<? echo $result[0]->time_out;?>" placeholder="وقت الخروج" class="form-control "  required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                			<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> سبب الإذن </h4>
								</div>
								<div class="col-xs-6 r-input">
									<textarea class="r-textarea" name="permit_reason"><? echo $result[0]->permit_reason;?></textarea>
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
                    <?php  echo form_open_multipart('Administrative_affairs/add_permits')?>
                    <div class="col-xs-12 ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الطلب </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                               <input type="number" id="permit_num" name="permit_num" value="<?php echo ($last+1); ?>" class="r-inner-h4"  readonly=""/>
                                </div>
                            </div>
                            

                            




 <div class="col-xs-12">
    <div class="col-xs-6">
        <h4 class="r-h4">الإسم </h4>
    </div>
    

<?php // echo $select[$_SESSION['emp_code']][0]->employee ?>
    <div class="col-xs-6 r-input">    
        <input type="text" class="r-inner-h4" name="emp_code" 
        value="<?if(!empty($select[$_SESSION['emp_code']][0]->employee)): echo  $select[$_SESSION['emp_code']][0]->employee ; endif;?>"  
         readonly="" />
    </div>
</div>


















                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع الإذن </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                   <select name="permit_type"  id="permit_type" >
                                     <option value="">إختر</option>
                                     <option value="1">صباحى</option>
                                     <option value="2">مسائي</option>
                                   </select>
                                </div>
                            </div>
                         <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 "> وقت العودة</h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                           <input type="time" id="time_return" name="time_return"  style="    padding-left: 107px;" placeholder="وقت العودة" class="form-control "  required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
   
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                   <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  التاريخ</h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">المسمي الوظيفي </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name=""  readonly value="<? if(!empty($select[$_SESSION['emp_code']][0]->department)): echo $job_title[$select[$_SESSION['emp_code']][0]->department][0]->name; endif;?>">
                                </div>
                            </div>
            
                          <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  وقت الخروج</h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                           <input type="time" id="time_out" name="time_out"  style="    padding-left: 107px;" placeholder="وقت الخروج" class="form-control "  required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                			<div class="col-xs-12">
								<div class="col-xs-6">
									<h4 class="r-h4"> سبب الإذن </h4>
								</div>
								<div class="col-xs-6 r-input">
									<textarea class="r-textarea" name="permit_reason"></textarea>
								</div>
							</div>
    
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 r-inner-btn">
                    <div class="col-xs-3">
                    </div>
                    <?php
                    if(!empty($permits)){
                           $perm_num=sizeof($permits);
                
                           $ozon_num_max=$affairs_setting[0]->ozon_num;
                           if( $perm_num < $ozon_num_max ){
                            $html_tag=' <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right">';
                           }elseif($perm_num > $ozon_num_max ){
                            $html_tag=' ';
                           }elseif($perm_num == $ozon_num_max ){
                            $html_tag='';
                           }
                        
                    }else{
                        
                         $html_tag='<input type="submit" role="button" name="add" value="حفظ" class="btn pull-right">';  
                        
                    }
                           
                    ?>
                    <div class="col-xs-3">
                      <?php   echo $html_tag;?> 

                    </div>
                    <?php echo form_close()?>
                    <div class="col-xs-2">
                      
                    </div>
                </div>

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
                                            <th class="text-center">تاريخ اليوم</th>
                                            <th class="text-center">نوع الإذن</th>
                                            <th class="text-center">وقت الخروج</th>
                                            <th class="text-center">وقت العودة</th>
                                            <th class="text-center">التفاصيل</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                  

                                    <?php
                                    $a=1;
                                    foreach ($records as $record ):?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                         <td><?echo date('Y-m-d',$record->date); ?></td>
                                                      <?php
                                            if ($record->permit_type ==1){
                                                echo'  <td >صباحى</td>';
                                            }else{
                                                echo'  <td >مسائي</td>';
                                            }
                                            ?>
                                    <td> <?php echo $record->time_out ?></td>
                                    <td> <?php echo $record->time_return ?></td>
                                            <td> <button type="button" style="width:100px" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"> التفاصيل </button></td>
                                            <td> <a href="<?php echo base_url('Administrative_affairs/delete_permits').'/'.$record->id?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url('Administrative_affairs/edit_permits').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                        </tr>
                                                  <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">تفاصيل الأذن : ( <?if(!empty($select[$record->emp_code][0]->emp_name)): echo  $select[$record->emp_code][0]->emp_name ; endif;?>)</h4>
                        </div>
                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5> إسم الموظف:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><?if(!empty($select[$record->emp_code][0]->emp_name)): echo  $select[$record->emp_code][0]->emp_name ; endif;?></h5>
                            </div>
                        </div>

                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5> تاريخ الطلب:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo date('Y-m-d',$record->date); ?></h5>
                            </div>
                        </div>

                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5> وقت الخروج:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo $record->time_out; ?></h5>
                            </div>
                        </div>

                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5> وقت العوده:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo $record->time_return; ?></h5>
                            </div>
                        </div>
                        <div class="row" style="margin-right:10px">
                            <div class="col-sm-3">
                                <h5> سبب الأذن:</h5>
                            </div>
                            <div class="col-sm-9">
                                <h5><? echo $record->permit_reason; ?></h5>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
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
