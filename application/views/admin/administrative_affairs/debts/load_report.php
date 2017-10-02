<?php if(isset($table)&& $table!=null && !empty($table) ):?>
<div class="panel-body">
<div class="fade in active">
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th>م</th>
          <th class="text-center">اسم الموظف</th>
         <th  class="text-center">تاريخ السلفة </th>
        <th class="text-center">قيمة السلفة</th>
          <th  class="text-center">الحالة</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php
        $a=1;
        foreach ($table as $record ):
        if($record->approved == 0){
            $state="لم يتم الاجراء";
        }elseif($record->approved == 1){
             $state="مقبولة";
        }elseif($record->approved == 2){
             $state="مرفوضة";
        }
        ?>
            <tr>
              <td><?php echo $a ?></td>
              <td ><?php echo $record->emp_name ?></td>
            
              <td ><?php echo date("Y-m-d",$record->debt_date)  ?></td>
                <td ><?php echo $record->value?></td>
                <td ><?php echo $state?></td>
            </tr>
            <?php
            $a++;
        endforeach;  ?>
        </tbody>
    </table>
</div>
</div>
  <?php  endif; ?>