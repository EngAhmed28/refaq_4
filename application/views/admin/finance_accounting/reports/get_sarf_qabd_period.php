<?php



//echo $_POST['date_to'];



if($_POST['date_to'] && $_POST['date_from']) {
    if (sizeof($query) > 0) {
        echo '<table id="" class="table table-bordered table-hover table-striped" cellspacing="0"  width="99%" style="margin-right: 6px; direction:rtl;">
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
        $count = 0;
        for($a=0;$a<sizeof($query);$a++) {
            $count++;
            echo '<tr>
               <td rowspan="' . sizeof($query_vouchers[$query[$a]->vouch_num]) . '">' . ($a + 1) . '</td>
               <td rowspan="' . sizeof($query_vouchers[$query[$a]->vouch_num]) . '">' . date('Y/m/d', $query[$a]->receipt_date) . '</td>
               <td rowspan="' . sizeof($query_vouchers[$query[$a]->vouch_num]) . '">' . $query[$a]->vouch_num . '</td>';

            //=============================
            if (!empty($query_vouchers[$query[$a]->vouch_num])) {
                for ($d=0;$d<sizeof($query_vouchers[$query[$a]->vouch_num]);$d++){
                    $type='';
                    if ($query_vouchers[$query[$a]->vouch_num][$d]->type == 1) {
                        $type = 'صرف';
                    } elseif ($query_vouchers[$query[$a]->vouch_num][$d]->type == 2) {
                        $type = 'قبض';
                    }

                    $maden='';
                    if(!empty($query_vouchers[$query[$a]->vouch_num][$d]->maden )){
                        $maden = $dayen[$query_vouchers[$query[$a]->vouch_num][$d]->maden][0]->name ;

                    }
                    $dayens='';
                    if(!empty($query_vouchers[$query[$a]->vouch_num][$d]->dayen)){
                        $dayens = $dayen[$query_vouchers[$query[$a]->vouch_num][$d]->dayen][0]->name ;
                    }

                    echo ' <td>' . $type . '</td>
                   <td>' . $maden . '</td>
                <td>' . $dayens . '</td>
                   <td>' . sprintf('%.2f', $query_vouchers[$query[$a]->vouch_num][$d]->value) . '</td>
                  </tr>';

                    $total = $total + $query_vouchers[$query[$a]->vouch_num][$d]->value;


                }


            }

            if ($a == sizeof($query) - 1) {
                echo '<tr><td colspan="6">الإجمالي</td>
                  <td>' . sprintf('%.2f', $total) . '</td>';
            }


            //==========================
        }

    }else{

        if ($_POST['sanad_type'] == 1) {
            $msg = 'سندات صرف';
        } elseif ($_POST['sanad_type'] == 2) {
            $msg = 'سندات قبض';
        }

        echo '<div class="alert alert-danger"> لا توجد ' . $msg . ' عن تلك الفترة</div>';


    }


    echo ' </tbody>
      </table>';




}
?>