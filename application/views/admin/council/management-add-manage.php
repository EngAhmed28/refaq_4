







<div class="col-sm-11 col-xs-12">
              <!--  -->
                    <?php $this->load->view('admin/council/main_tabs'); ?>
                    <!--  -->


                <?php if(isset($results)):?>

                <?php echo form_open_multipart('admin/Directors/update_council/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

                    <div class="details-resorce">
                        <div class="col-xs-12 r-inner-details">
                            <div class="col-xs-12">
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> كود المجلس </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" name="" class="r-inner-h4 " value="<?php echo $this->uri->segment(4); ?>" readonly=""/>
                                        </div>
                                    </div>
                                  
                                   <div class="col-xs-12 ">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4 ">  تاريخ التعيين </h4>
                                        </div>
                                        <div class="col-xs-6 r-input ">
                                            <div class="docs-datepicker">
                                                <div class="input-group">
                                                    <input type="text" class="form-control docs-date" value="<?php echo date('m/d/Y',$results['appointment_date']) ?>" name="appointment_date" placeholder="شهر / يوم / سنة ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">  صورة القرار </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <div class="field manage-field">
                                                <input type="file" name="decison_img" class="file_input_with_replacement-1" />

                                               
                                            </div>
                                        
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                   <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> رقم قرار التعيين </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="number" name="appointment_decison_number" class="r-inner-h4 " value="<?php echo $results['appointment_decison_number'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4 ">  تاريخ الانتهاء </h4>
                                        </div>
                                        <div class="col-xs-6 r-input ">
                                            <div class="docs-datepicker">
                                                <div class="input-group">
                                                    <input type="text" class="form-control docs-date" value="<?php echo date('m/d/Y',$results['expiration_date']) ?>" name="expiration_date" placeholder="شهر / يوم / سنة ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 "> 
                                         <div class="col-xs-6"> 
                                             <img src="<?php echo base_url('uploads/images').'/'.$results['decison_img'] ?>" width="100px" height="100px" />
                                        </div></div>
                                    
                                </div>
                            </div>
                           
                             <div class="col-xs-4"></div>
                            <div class="col-xs-2">
                                <input type="submit" class="btn center-block r-manage-btn2"   name="update" value="تعديل" />

                            </div>
                         <div class="col-xs-6"></div>
                            <?php echo form_close()?>

                        </div>
                <?php else: ?>

                <?php echo form_open_multipart('admin/Directors/add_council',array('class'=>"",'role'=>"form" ))?>


                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> كود المجلس </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <?php ?>
                                        <input type="text" name="" class="r-inner-h4 " readonly="" readonly="" value="<?php echo (++$last) ?>">
                                    </div>
                                </div>
                                 <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ التعيين </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" name="appointment_date" placeholder="شهر / يوم / سنة " required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                              
                                
                                 <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> رقم قرار التعيين </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="number" name="appointment_decison_number" class="r-inner-h4 " value="" required/>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ الانتهاء </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" name="expiration_date" placeholder="شهر / يوم / سنة " required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 r-input">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">  صورة القرار </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <div class="field manage-field">
                                            <input type="file" name="decison_img" class="file_input_with_replacement-1" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                        
                        
                        <div class="col-xs-4"></div>
                        <div class="col-xs-2">
                            <input type="submit" class="btn center-block"   name="add" value="حفظ" />
                        </div>
                        <div class="col-xs-6"></div>
                        <?php echo form_close()?>

                    </div>
</div>
<?php endif; ?>                    
                    <!---table------>
<?php if(isset($records)&&$records!=null):?>
                 <div class="col-xs-12">
                        <div class="panel-body">
                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">رقم قرار التعيين </th>
                                            <th class="text-center">تاريخ التعيين </th>
                                            <th class="text-center">تاريخ الانتهاء </th>
                                            <th class="text-center">الاجراء</th>
                                            <th class="text-center">التفاصيل</th>
                                            <th class="text-center">حالة </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
<?php $a=1;foreach ($records as $record ):
                 if($record->status == 1) {
                                    $class = 'manage-run';
                                    $title = 'نشط';
                                    $bt_class='success';
                                    $set=0;
                 }elseif($record->status == 0){
                                    $class = 'manage-work';
                                    $title = 'غير نشط';
                                    $bt_class='danger';
                                    $set=1;
                                }?>
<tr>
    <td><?php echo $a ?> </td>
    <td><?php echo $record->appointment_decison_number ?></td>
    <td><?php echo  date('d-m-Y',$record->appointment_date) ?></td>
    <td><?php echo  date('d-m-Y',$record->expiration_date) ?></td>
    <td><a href="<?php echo base_url().'admin/Directors/update_council/'.$record->id?>">
               <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
        <a href="<?php echo base_url().'admin/Directors/delete_council/'.$record->id?>">
               <i class="fa fa-trash-o" aria-hidden="true"></i></a> 
       <!-- <a class="pop-manage" data-toggle="modal" data-target=".firstModal<?php echo $record->id ?>">
              <i class="fa fa-info" aria-hidden="true"></i></a>  -->
      </td>
       
    <td>
      <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal" data-target=".firstModal<?php echo $record->id ?>"></i>
      </td>
    <td>  <a href="<?php echo base_url().'admin/Directors/suspend_council/'.$record->id.'/'.$set?>"> 
                      <button type="button" class="btn btn-<?php echo $bt_class?>" style="width: 85px;"><?php echo $title ?></button>      </a></td>
</tr>
<!-------------------------------------------------------------------------------------------------------------->
<div class=" modal fade firstModal<?php echo $record->id ?>" tabindex="-1" id="firstModal<?php echo $record->id ?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-manage">
            <h4 class="pop-manage-h4"> جميع التفاصيل المتعلقة بالمجلس رقم <span class="pop-manage-span"> <?php echo $record->appointment_decison_number ?> </span></h4>
            <h4 class="pop-manage-h4"> تاريخ أنشاء المجلس : <span class="pop-manage-span"> <?php echo  date('Y-m-d',$record->appointment_date) ?> </span></h4>
            <h4 class="pop-manage-h4">تاريخ إنتهاء المجلس :<span class="pop-manage-span"><?php echo  date('Y-m-d',$record->expiration_date) ?> </span></h4>
            <h4 class="pop-manage-h4">حالة المجلس الأن :<span class="pop-manage-span"><?php echo $title ?></span></h4>
           <?php if(isset($get_members[$record->id]) && $get_members[$record->id]!=null){?>
            <h4 class="pop-manage-h4">عدد أعضاء المجلس :<span class="pop-manage-span">1</span> <button class="btn pop-member-manage"  data-toggle="modal" data-target=".inner-firstModal<?php echo $record->id ?>"> تفاصيل اللاعضاء</button></h4> 
            <div class="modal fade inner-firstModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-manage next-manage-pop"> 
                    <h4 class="pop-next-manage-h4">الاعضاء المقيدون بالمجلس</h4>
                     <?php $a=1; foreach($get_members[$record->id] as $row):?>  
                    <h4 class="pop-next-manage-h4"> <?php echo $a++?>- <?php echo $jobs[$row->job_title_id_fk]->name?> :
                                  <span class="pop-manage-span"><?php echo $row->member_name?></span>
                    </h4>
                <?php endforeach;?>
                </div>
            </div>
           <?php }?>
            <div class="modal-footer ">
                <button type="button" class="btn manage-close-pop" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
<!-------------------------------------------------------------------------------------------------------------->
<?php $a++;endforeach;  ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
<?php endif; ?>           