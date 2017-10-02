<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result) && $result!=null && !empty($result)){
                        $out['emp_id']=$result[0]->emp_id;
                        $out['evaluation_date']=date('m-d-Y',$result[0]->evaluation_date);
                        $out['input']='<input type="submit" role="button" name="UPDATE" value="تعديل" class="btn pull-right">';
                        $out['form']='Administrative_affairs/UpdateStaffEvaluation/'.$result[0]->emp_id."/".$result[0]->evaluation_date."/".$result[0]->date_s;
                        $out['readonly']='readonly="readonly"';
                        $eval_setting=$result;
                    }else{
                        $out['emp_id']='';
                        $out['readonly']='';
                        $out['evaluation_date']='';
                        $out['input']='<input type="submit" role="button" name="ADD" value="حفظ" class="btn pull-right">';
                        $out['form']='Administrative_affairs/StaffEvaluation';
                    }
                    ?>
                    <?php  echo form_open_multipart($out['form']);?>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">إسم الموظف  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                             <!--   <input type="text" class="r-inner-h4" name="title" value="<?php echo $out['emp_id'];?>" />
                            -->
                            <select name="emp_id"  class="selectpicker form-control" data-show-subtext="true" data-live-search="true" required="required" >
                       <option value=""> إختر الموظف</option>
                        <?php foreach ($employees as $row):
                       $select="";  if($row->id == $out['emp_id']){$select='selected="selected"';}?>
                             <option value="<?php echo $row->id?>" <?php echo $select?>> <?php echo $row->employee?></option>
                                <?php  endforeach?>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12 ">
                            <div class="col-xs-6">
                                <h4 class="r-h4 "> تاريخ التقييم </h4>
                            </div>
                            <div class="col-xs-6 r-input ">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control docs-date" <?php echo $out['readonly']?> required="required" value="<?php echo $out['evaluation_date']?>" name="evaluation_date" placeholder="شهر / يوم / سنة ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<br/><br/><br/>
<div class="col-xs-12">
    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">عنصر التقييم</th>
            <th class="text-center">درجة النهاية العظمى</th>
            <th class="text-center"> درجة  التقييم </th>
        </tr>
        </thead>
        <?php
        $a=1;$total=0;$total_emp_eval=0;
        foreach ($eval_setting as $rows ):?>
            <?php  if(isset($result) && $result!=null && !empty($result)){
                $emp_grade=$rows->evaluation_type_grade;
                $evaluation_type_id=$rows->evaluation_type_id;
                $total_emp_eval +=$rows->evaluation_type_grade;
                ?>
                <input type="hidden" name="id_for_update<?php echo $a ?>"  value="<?php  echo $rows->id;?>"/>
            <?php }else{
                $emp_grade=0;
                $evaluation_type_id=$rows->id;
            }?>
            <tr>
                <td><?php echo $a ?></td>
                <td><? echo $rows->title;?>
                 <input type="hidden" name="evaluation_type_id<?php echo $a ?>"  value="<?php  echo $evaluation_type_id;?>"/>
                </td>
                <td><?php  echo $rows->grade;?>
                    <input type="hidden" id="max<?php echo $a ?>"  value="<?php  echo $rows->grade;?>"/>  </td>
                <td>   <input type="number" class="r-inner-h4" id="grade<?php echo $a ?>" min="0" max="<?php echo $rows->grade;?>"
                               name="evaluation_type_grade<?php echo $a ?>" value="<?php echo $emp_grade?>" onchange="CalculateTotal(<?php echo $a ?>);" /> </td>
            </tr>
            <?php
            $a++;  $total+=$rows->grade  ;
        endforeach;  ?>
        <tr>
            <td><?php echo $a?> </td>
            <td>المجموع </td>
            <td><? echo $total;?> </td>
            <td><input type="number" class="r-inner-h4" name="totalgrade" id="totalgrade" value="<?php echo $total_emp_eval?>" readonly="readonly" /> </td>

        </tr>
        </tbody>
    </table>
</div>
<script>
    function CalculateTotal(num) {
        var max_grade=parseInt($("#max"+num).val()) ;
        var emp_grade=parseInt($("#grade"+num).val());
        
        if(emp_grade >  max_grade){
            alert("يجب ان تكون درجة التقييم أقل من او مساويه لدرجة النهاية العظمى " );
            $("#grade"+num).val(max_grade);
        }
        total=0;
        var max= <?php echo sizeof($eval_setting);?>;
     for(i = 1; i <= max; i++){
      var onegrade=parseInt($('#grade'+i).val());
         total+=parseInt(onegrade);
     }
    $('#totalgrade').val(total);
    }
</script>
                    <div class="col-xs-12 r-inner-btn">
                        <input type="hidden" name="MAX" value="<?php echo sizeof($eval_setting);?>"/>
                        <div class="col-xs-3"> </div>
                        <div class="col-xs-3"><?php echo  $out['input']?></div>
                        <div class="col-xs-2"></div>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
            <!---table------>
            <?php if(isset($table)&& $table!=null && !empty($table) ):?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">إسم الموظف </th>
                                    <th class="text-center">درجة التقييم</th>
                                    <th class="text-center">الاجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                $a=1;
                                foreach ($table as $record ):?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><?php  echo $record->employee;?></td>
                                        <td><?php   echo $record->sub;?></td>
                                        <td> <a href="<?php  echo base_url().'Administrative_affairs/DeleteStaffEvaluation/'.$record->employee_id."/".$record->sub_date[0]."/".$record->sub_date[1]?>"
                                                onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" > <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url().'Administrative_affairs/UpdateStaffEvaluation/'.$record->employee_id."/".$record->sub_date[0]."/".$record->sub_date[1] ?>">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                    </tr>
                                    <?php
                                    $a++;
                                endforeach;  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php  endif; ?>
            <!---table------>
        </div>
    </div>
</div>