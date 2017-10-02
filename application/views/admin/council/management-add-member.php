
            <div class="col-sm-11 col-xs-12">
                <!--  -->
                    <?php $this->load->view('admin/council/main_tabs'); ?>
                    <!--  -->
            <?php if(isset($results)):?>

            <?php echo form_open_multipart('admin/Directors/update_magls/'.$results['id'],array('class'=>"",'role'=>"form" )); ?>

                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">  اختر كود المجلس </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="council_id_fk" >
                                            <option>-اختر-</option>



                                            <?php foreach ($magls as $mag): ?>
                                                <?php
                                                $selected='';
                                                if($results['council_id_fk']== $mag->id){
                                                    $selected='selected';
                                                }
                                                                        
                                                ?>

                                                <option value="<?php echo $mag->id ?>" <?php echo $selected ?> ><?php echo $mag->id ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">رقم العضو </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="member_code" value="<?php echo $results['member_code'] ?>"  readonly=""/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">إسم العضو </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="member_name" value="<?php echo $results['member_name'] ?>">
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-xs-12 r-input">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">  اختر وظيفة العضو </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="job_title_id_fk">

                                            <option> - اختر - </option>

                                            <?php foreach ($job_title as $job): ?>

                                                <?php
                                                $selected='';
                                                if($results['job_title_id_fk']== $job->id){
                                                    $selected='selected';
                                                }?>
                                                <option value="<?php echo $job->id ?>" <?php echo $selected ?> ><?php echo $job->name ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">  اختر نوع العضوية </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="member_type_id_fk">

                                            <?php if($results['member_type_id_fk']==1): ?>
                                            <option value="1" selected> دائم </option>
                                            <option value="2"> غير دائم </option>
                                            <option value="3"> رجل اعمال </option>
                                            <option value="4"> عضوية نسائية </option>
                                            <?php elseif($results['member_type_id_fk']==2): ?>
                                                <option value="1"> دائم </option>
                                                <option value="2"selected> غير دائم </option>
                                                <option value="3"> رجل اعمال </option>
                                                <option value="4"> عضوية نسائية </option>
                                            <?php elseif($results['member_type_id_fk']==3): ?>
                                                <option value="1"> دائم </option>
                                                <option value="2"> غير دائم </option>
                                                <option value="3"selected> رجل اعمال </option>
                                                <option value="4"> عضوية نسائية </option>
                                            <?php else: ?>
                                                <option value="1"> دائم </option>
                                                <option value="2"> غير دائم </option>
                                                <option value="3"> رجل اعمال </option>
                                                <option value="4"selected> عضوية نسائية </option>
                                            <?php endif; ?>




                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
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
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ الانتهاء </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" value="<?php echo date('m/d/Y',$results['expired_date']) ?>" name="expired_date" placeholder="شهر / يوم / سنة ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-xs-4"></div>
                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="update" value="تعديل" />
                        </div>
                          <div class="col-xs-7"></div>
                    </div>

                </div>
                <?php echo form_close()?>


            <?php else: ?>

            <?php echo form_open_multipart('admin/Directors/add_magls',array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">  اختر كود المجلس </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="council_id_fk" >
                                            <option>-اختر-</option>
                                           <?php foreach ($magls as $mag): ?>
                                            <option value="<?php echo $mag->id ?>" ><?php echo $mag->id ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">رقم العضو </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" value="<?php echo ($last_member+1)?>" class="r-inner-h4 " name="member_code" readonly=""/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">إسم العضو </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="member_name" value=""/>
                                    </div>
                                </div>
                     

                            </div>
                        </div>
                        <div class="col-xs-12 r-input">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">  اختر وظيفة العضو </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="job_title_id_fk">
                                            
                                            <option> - اختر - </option>

                                            <?php foreach ($job_title as $job): ?>
                                                <option value="<?php echo $job->id ?>" ><?php echo $job->name ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">  اختر نوع العضوية </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="member_type_id_fk">
                                            <option> - اختر - </option>
                                            <option value="1"> دائم </option>
                                            <option value="2"> غير دائم </option>
                                            <option value="3"> رجل اعمال </option>
                                            <option value="4"> عضوية نسائية </option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ التعيين </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" name="appointment_date" placeholder="شهر / يوم / سنة ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ الانتهاء </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" name="expired_date" placeholder="شهر / يوم / سنة ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4"></div>
                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="add" value="حفظ" />
                        </div>
                        <div class="col-xs-7"></div>
                        <?php echo form_close()?>

                    </div>
 <?php endif; ?>
                <!---table------>
 <?php // if((isset($on_magls)&& $on_magls!=null) && (isset($off_magls)&& $off_magls!=null)):?>
<div class="col-md-12">
<div class="panel with-nav-tabs panel-default">
<div class="panel-heading">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab0default" data-toggle="tab">المجلس الحالى</a></li>
    <li class=""><a href="#tab1default" data-toggle="tab">المجالس الاخرى</a></li>    
</ul>
</div>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="tab0default">
<!--  srart 1   ------------------------------------------------------------------------------------------------>
<?php if(isset($on_magls)&&$on_magls!=null):?>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">كود العضوية</th>
            <th class="text-center">أسم العضو </th>
            <th class="text-center">تاريخ التعيين</th>
            <th class="text-center">تاريخ الانتهاء </th>
            <th class="text-center">الاجراء</th>
            <th class="text-center">الحالة</th>
        </tr>
    </thead>
    <tbody class="text-center">
    <?php $a=1; foreach ($on_magls as $key=>$value):
    foreach ($value as $record):
    if($record->expired_date < time()){
        $state='danger';
        $title='عضوية منتهية';
    }elseif($record->expired_date > time()){
        $state='primary';
        $title='عضوية سارية';   
    }?>
        
        <tr>
            <td><?php echo $a ?></td>
            <td><?php echo $record->member_code ?></td>
            <td><?php echo $record->member_name ?></td>
            <td><?php echo  date('d-m-Y',$record->appointment_date) ?></td>
            <td><?php echo  date('d-m-Y',$record->expired_date) ?></td>
            <td><a href="<?php echo base_url().'admin/Directors/update_magls/'.$record->id?>">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
              
                <a href="<?php echo base_url().'admin/Directors/delete_magls/'.$record->id?>">
                  <i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </td>
            <td>
              <button type="button" class="btn btn-<?php echo $state?>"> <?php echo $title?></button>
          </td>
        </tr>

        <?php $a++;  endforeach; endforeach; ?>
  
    </tbody>
</table>
<?php else:?>
<div class="alert alert-danger" >
    لم يتم اضافة اعضاء للمجاس الحالى
          </div>
<?php endif;?>
<!---  end  1   ------------------------------------------------------------------------------------------------> 
</div>                                                                                   
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab1default">
<!--  srart 2   ------------------------------------------------------------------------------------------------>
<?php if(isset($off_magls)&&$off_magls!=null):?>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  
    <tbody class="text-center">
    <?php $a=1; foreach ($off_magls as $key=>$value):?>
    <tr> <td colspan="2">كود المجلس :</td> 
         <td colspan="1"><?php echo $all_magls[$key]->id?></td>
         <td colspan="2">رقم قرار التعين : </td>  
         <td colspan="2"><?php echo $all_magls[$key]->appointment_decison_number?></td>
    </tr>
      
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">كود العضوية</th>
            <th class="text-center">أسم العضو </th>
            <th class="text-center">تاريخ التعيين</th>
            <th class="text-center">تاريخ الانتهاء </th>
            <th class="text-center">الاجراء</th>
            <th class="text-center">الحالة</th>
        </tr>
   
   <?php foreach ($value as $record): if($record->expired_date < time()){
        $state='danger';
        $title='عضوية منتهية';
    }elseif($record->expired_date > time()){
        $state='primary';
        $title='عضوية سارية';   
    }?>
        <tr>
            <td><?php echo $a ?></td>
            <td><?php echo $record->member_code ?></td>
            <td><?php echo $record->member_name ?></td>
            <td><?php echo  date('d-m-Y',$record->appointment_date) ?></td>
            <td><?php echo  date('d-m-Y',$record->expired_date) ?></td>
            <td><a href="<?php echo base_url().'admin/Directors/update_magls/'.$record->id?>">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
              
                <a href="<?php echo base_url().'admin/Directors/delete_magls/'.$record->id?>">
                  <i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </td>
            <td>
              <button type="button" class="btn btn-<?php echo $state?>"> <?php echo $title?></button>
          </td>
        </tr>

        <?php $a++;  endforeach; endforeach; ?>
  
    </tbody>
</table>
<?php else:?>
<div class="alert alert-danger" >
    لا يوجد اعضاء
          </div>
<?php endif;?>

<!---  end  2   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<!---  end Tabs ----------------------------------------------------------------------------------------------------->                  
                    </div>
                </div>
            </div>
        </div>
<!---  end All ----------------------------------------------------------------------------------------------------->                  
 <?php  //endif; ?>