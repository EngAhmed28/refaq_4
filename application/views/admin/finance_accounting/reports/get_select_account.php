<?php if(isset($records)&&$records!=null){
?>

<!--
<div style="float:left" >
<button onClick="window.print()" class="btn btn-sm btn-success hidden-print" > <span class="glyphicon glyphicon-print"></span> طبـاعه </button>
</div> <br/> <br/>
-->

    <table id="no-more-tables" class="table table-bordered" role="table">

        <thead>
        
        <tr>
            
            <th class="text-center" colspan="2">إسم الحساب</th>
            
            <th class="text-center" colspan="4"><?php echo $account[0]->name; ?></th>
            
        </tr>

        <tr>

            <th class="text-center">تاريخ</th>

            <th class="text-center">شرح</th>
            
            <th class="text-center">رقم المستند</th>
            
            <th class="text-center">دائن</th>
            
            <th class="text-center">مدين</th>
            
            <th class="text-center">رصيد</th>

        </tr>

        </thead>
        <tbody>
        
        <?php
        
        $madeen = 0;
        $dayen = 0;
        $total = $account[0]->last_value;
        
        if($account[0]->account_type == 1){
            $madeen = sprintf('%.2f',$account[0]->last_value);
            $dayen = '-';
        }
        elseif($account[0]->account_type == 2){
            $madeen = '-';
            $dayen = sprintf('%.2f',$account[0]->last_value);
        }
        
        echo '<tr>
              <td>رصيد أول مدة</td>
              <td>-</td>
              <td>-</td>
              <td>'.$dayen.'</td>
              <td>'.$madeen.'</td>
              <td>'.sprintf('%.2f',$account[0]->last_value).'</td>
              </tr>';
        
        for($x = 0 ; $x < count($records) ; $x++){
            if($records[$x]->madeen == $account[0]->code && $account[0]->account_type == 1){
                $madeen = sprintf('%.2f',$records[$x]->p_cost);
                $dayen = '-';
                $total = sprintf('%.2f',($total + $madeen));
            }
            elseif($records[$x]->dayen == $account[0]->code && $account[0]->account_type == 1){
                $madeen = '-';
                $dayen = sprintf('%.2f',$records[$x]->p_cost);
                $total = sprintf('%.2f',($total - $dayen));
            }
            elseif($records[$x]->dayen == $account[0]->code && $account[0]->account_type == 2){
                $madeen = '-';
                $dayen = sprintf('%.2f',$records[$x]->p_cost);
                $total = sprintf('%.2f',($total + $dayen));
            }
            elseif($records[$x]->madeen == $account[0]->code && $account[0]->account_type == 2){
                $madeen = sprintf('%.2f',$records[$x]->p_cost);
                $dayen = '-';
                $total = sprintf('%.2f',($total - $madeen));
            }
            echo '<tr>
                  <td>'.date('Y-m-d',$records[$x]->date).'</td>
                  <td>-</td>
                  <td>'.$records[$x]->pill_num.'</td>
                  <td>'.$dayen.'</td>
                  <td>'.$madeen.'</td>
                  <td>'.$total.'</td>
                  </tr>';
        }
      
        ?>
        
        </tbody>

    </table>

<?php 
 }
else
echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا توجد حركات لهذا الحساب
</div>';

?>