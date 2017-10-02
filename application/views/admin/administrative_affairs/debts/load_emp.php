<?php if(!empty($emp) && $emp !=null && isset($emp)):
    ?>
    <option value="">إختر</option>
    <?php  foreach ($emp as $record):?>
    <option value="<? echo $record->id;?>"><? echo $record->employee;?></option>
<?php  endforeach; 
    else:?>
    
    <option value="">لا يوجد موظفين</option>
<?php   endif;?>