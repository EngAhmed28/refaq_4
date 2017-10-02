


   <div class="col-sm-11 col-xs-12">

<?php if(isset($records)&&$records!=null){
?>

<!--
<div style="float:left" >
<button onClick="window.print()" class="btn btn-sm  btn-success hidden-print" > <span class="glyphicon glyphicon-print"></span> طبـاعه </button>
</div>
-->


    <table id="no-more-tables" class="table table-bordered" role="table">

        <thead>

        <tr>

            <th width="2%">#</th>

            <th  class="text-right">الإسم</th>
                        <th  class="text-right">مدين</th>
            
            <th  class="text-right">دائن</th>
            
            <th class="text-right">القيمة</th>
               
         
            

        </tr>

        </thead>
        <tbody>
        
        <?php
        $count1 = 1;
       
        function drow($data, $count, $class, $sum=0){
            $total = 0;
            $count1 = $count;
            for($z = 0 ; $z < count($data) ; $z++){
                 
                if(isset($data[$z]['children'])){
                    $class = 'btn-success';
                    $count = drow($data[$z]['children'], $count1, 'btn-info',$sum);
                  //  $sum = $data[$z]['last_value']+$data[$z]['value'];
                  echo 'asd';
                  $sum = $data[$z]['last_value']+$count[1];
                    $count1 = $count[0];
                }   
                else
                 
                    $sum = $data[$z]['last_value'];
                    if($records[$x]['account_type'] == 1 ){
                        
                        $all_val = $data[$z]['madeen'] - $data[$z]['dayen'];
                    }elseif($records[$x]['account_type'] == 2){
                        
                         $all_val = $data[$z]['dayen'] - $data[$z]['madeen'];
                    }
                    
                    
                    echo '<tr class="'.$class.'">
                          <td>'.($count1++).'</td>
                          <td>'.$data[$z]['name'].'</td>
                      <td>'.sprintf("%.2f",$data[$z]['madeen']).'</td>
                      <td>'.sprintf("%.2f",$data[$z]['dayen']).'</td>
                          <td>'.sprintf("%.2f",$all_val).'</td>
                      
                          </tr>';
                $total += $sum;
            }

            
            
            
            return array($count1,$total);
        }
        for($x = 0 ; $x < count($records) ; $x++){
            if(isset($records[$x]['children'])){
                $count = drow($records[$x]['children'], $count1, 'btn-success');
                $sum = $count[1];
                $count1 = $count[0];
            }
            else
             if($records[$x]['account_type'] == 1 ){
                        
                        $all_val = $records[$x]['madeen'] - $records[$x]['dayen'];
                    }elseif($records[$x]['account_type'] == 2){
                        
                         $all_val = $records[$x]['dayen'] - $records[$x]['madeen'];
                    }
            
            
                $sum = $records[$x]['last_value'];
            echo '<tr class="btn-warnings">
                  <td>'.($count1++).'</td>
                  <td>'.$records[$x]['name'].'</td>
                  <td>'.sprintf("%.2f",$records[$x]['madeen']).'</td>
                  <td>'.sprintf("%.2f",$records[$x]['dayen']).'</td>
                  <td>'.sprintf("%.2f",$all_val).'</td>
                
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
  <strong>تنبية!</strong> لا توجد حسابات
</div>';

?>

            </div>
            
            </fieldset>
            
            <?php //echo form_close()?>
