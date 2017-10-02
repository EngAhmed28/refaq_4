<?php 
 //var_dump($table);die;
if(isset($table)&& $table!=null):
?>
<table id="example" class=" display table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>التاريخ</th>
            <th>رقم إيصال المخالفة</th>
            <th>إسم السائق</th>
            <th>الملاحظة</th>
        </tr>
    </thead>
    <tbody>
    <?php
    for($x = 0 ; $x < count($table) ; $x++){ 
        echo '<tr>
              <td>'.($x+1).'</td>
              <td>'.date('Y-m-d',$table[$x]->date).'</td>
              <td>'.$table[$x]->receipt_code.'</td>
              <td>'.$drivers[$table[$x]->driver_id_fk]->driver_name.'</td>
              <td>'.$table[$x]->note.'</td>
              </tr>';
    }
    ?>
    </tbody>
</table>
<?php 
else:
    echo '<div class="alert alert-danger" >لا توجد مخالفات</div>';
endif;
?>