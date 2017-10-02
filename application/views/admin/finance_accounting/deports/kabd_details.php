 <?php   if(isset($all)&&$all!=null):?> 
    <?php foreach($all as $record):?>
    <div class="modal fade" id="myMooodal<?php echo $record->vouch_num?>" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  
  
  
  
  
   
                <h4 class="modal-title">تفاصيل السند</h4>
            

    
  
                    <table  style="width:98%" class="inner-pop-table">
                   <thead>
                  <tr><th style="text-align: right;">مسلسل</th>
                <th style="text-align: right;">دائن</th>
                    <th style="text-align: right;">مدين</th> 
                   <th style="text-align: right;">إسم الحساب</th>
                   </tr>
                   </thead>
                   <tbody>
    <?php $y=1; 
    $total=0;
    foreach($all_details[$record->vouch_num] as $sub_row):?>
    <tr>
    <td><?php  echo $y++;?></td>
    <td>  <?php echo $sub_row->value ?> </td>
    <td> - </td>
    <td> <?php echo $account_group[$sub_row->dayen]->name ?> </td>
    </tr>
    <?php $total+=$sub_row->value ?>
    <?php endforeach;?>
    
    <tr>
    <td> <?php  echo $y++;?> </td> 
    <td> - </td> 
    <td> <?php echo $total?> </td> 
    <td> <?php echo $account_group[$record->maden]->name ?> </td> 
    </tr>
                   </tbody>
                   </table>
                  
    
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
       
      </div>
    </div>
  </div>

    <?php endforeach;endif;?>