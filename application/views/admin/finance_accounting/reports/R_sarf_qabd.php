


  <div class="col-sm-11 col-xs-12">
  	<?php $this->load->view('admin/finance_accounting/reports_tabs'); ?>
<?php

if(isset($sarf_group)&&$sarf_group!=null):

if(sizeof($sarf_group)> 0)
{
    echo '
    
    
    <table id="sample_1" class="table table-bordered table-hover table-striped" cellspacing="0"  width="99%" style="margin-right: 6px; direction:rtl;">
           <thead> 
            <tr>
             <th class="text-center">م</th>
             <th class="text-center">تاريخ السند</th>
             <th class="text-center">رقم السند</th>
             <th class="text-center">نوع السند</th>
             <th class="text-center">المدين</th>
             <th class="text-center">الدائن</th>
             <th class="text-center">القيمة</th>
            </tr>
           </thead>
           <tbody>';

    $total = 0;

    for($x = 0 ; $x <sizeof($sarf_group) ; $x++)
    {
          echo '<tr>
               <td rowspan="'.sizeof($query_vouchers[$sarf_group[$x]->vouch_num]).'">'.($x+1).'</td>
               <td rowspan="'.sizeof($query_vouchers[$sarf_group[$x]->vouch_num]).'">'.date('Y/m/d',$sarf_group[$x]->receipt_date).'</td>
               <td rowspan="'.sizeof($query_vouchers[$sarf_group[$x]->vouch_num]).'">'.$sarf_group[$x]->vouch_num.'</td>';

        for($z = 0 ; $z < sizeof($query_vouchers[$sarf_group[$x]->vouch_num]) ; $z++)
        {
            //$name = $db->select('*','accounts_group','WHERE code='.$sarf_group["SELECT"][$x]["dayen"]);
            //$sheek_status = $name["SELECT"][0]["name"];

            if($query_vouchers[$sarf_group[$x]->vouch_num][$z]->type == 1)
            {
                $type = 'صرف'; 
            } elseif($query_vouchers[$sarf_group[$x]->vouch_num][$z]->type == 2)
            {
               $type = 'قبض';  
            }
               
                
                
                $madens = '';
                 if(!empty($query_vouchers[$sarf_group[$x]->vouch_num][$z]->maden)){
             
               $madens =   $dayen[$query_vouchers[$sarf_group[$x]->vouch_num][$z]->maden][0]->name ;
             
                 }
$dayens ='';
            if(!empty($query_vouchers[$sarf_group[$x]->vouch_num][$z]->dayen)) {
               // $dayen = $query_vouchers[$sarf_group[$x]->vouch_num][$z]->dayen;
                 
                $dayens =   $dayen[$query_vouchers[$sarf_group[$x]->vouch_num][$z]->dayen][0]->name ;
                 
            }

                  
                  
                //echo  $account_group[$dayen];


            echo ' <td>'.$type.'</td>
                   <td>'. /*$account_group[$maden][0]->name*/ $madens.'</td>
                   <td>'. /*$account_group[$dayen][0]->name*/ $dayens.'</td>
                   <td>'.sprintf('%.2f',$query_vouchers[$sarf_group[$x]->vouch_num][$z]->value).'</td>
                  </tr>';

            $total = $total + $query_vouchers[$sarf_group[$x]->vouch_num][$z]->value;
        }

        if($x == sizeof($sarf_group)-1)
        {
            echo '<tr><td colspan="6">الإجمالي</td>
                  <td>'.sprintf('%.2f',$total).'</td>';
        }
    }
}
else
    echo '<div class="alert alert-danger">لا توجد سندات قبض أو صرف بتاريخ اليوم</div>';

echo ' </tbody>
      </table>
      
      ';

else:
echo'<div class="alert alert-danger" >
    لا توجد سندات قبض أو صرف بتاريخ اليوم
          </div>';
endif;
?>
</div>