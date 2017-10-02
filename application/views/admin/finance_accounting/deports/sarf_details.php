 <?php   if(isset($all)&&$all!=null):?> 
    <?php foreach($all as $record):?>
   
   
   
    <div class="modal fade" id="myMooodal<?php echo $record->vouch_num?>" 
    tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

 <div class="modal-dialog modal-md modal-dialog-manage">
     <h4 class="pop-manage-h4 text-center"> تفاصيل السند </h4>

                   <table  style="width:98%" class="inner-pop-table">
                   <thead>
                  <tr>
                  <th>مسلسل</th>
                  <th >مدين</th> 
                  <th >دائن</th>
                   <th >إسم الحساب</th>
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
    <td> <?php echo $account_group[$sub_row->maden]->name ?> </td>
    </tr>
    <?php $total+=$sub_row->value ?>
    <?php endforeach;?>
    
    <tr>
    <td> <?php  echo $y++;?> </td> 
    <td> - </td> 
    <td> <?php echo $total?> </td> 
    <td> <?php echo $account_group[$record->dayen]->name ?> </td> 
    </tr>
                   </tbody>
                   </table>
               
    
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
       
      </div>
      </div>
 
</div>
    <?php endforeach;endif;?>