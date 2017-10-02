<?php
$session_id=$_SESSION["user_id"];
if(isset($_SESSION["catch_addtion".$session_id]) && count($_SESSION["catch_addtion".$session_id])>0){ //if we have session variable
      //  echo form_open_multipart('dashboard/add_catch',array('class'=>"form-horizontal",'role'=>"form" ));
       
        $table = '<table id="colored-bgg" class="table table-bordered success">
 <thead>
     <tr>
       <th style="text-align: right;">م</th> 
       <th style="text-align: right;">اسم الحساب</th>
       <th style="text-align: right;">القيمة</th>
       <th style="text-align: right;">الأجراء</th>
     </tr>
 </thead>
<tbody>';

        $all_value =0;
        $i=1;
         $mode = current($_SESSION["catch_addtion".$session_id]);
        for($x = 0 ; $x < count($_SESSION["catch_addtion".$session_id]) ; $x++){
            $code = $mode['account_code'];
            if(!empty($name[31]->name)){
                $name =   $name[31]->name;
            }else{
                $name='';
            }
            $table .= '<tr>
                <td scope="row">'.($i).'</td>          
                <td>'.$name.'</td>        
                <td>'.$mode['value'].'</td>     
                                    
                <td><span class="off" data-code='.$code.'><i class="fa fa-times"></i> '.$code.'</span></td>
           </tr> ';
            $i++;
            $all_value += $mode['value']  ;
            $mode = next($_SESSION["catch_addtion".$session_id]);
        }

        $table .= ' <tr>
                <td colspan="2"> الإجمالى</td>
                <td>'.$all_value.'</td><td></td>
                </tr>
                </tbody>
                </table>';
        $table .= '
            <input type="hidden" class="btn btn-success no-border"  name="action" value="add_catch_receipt"  />
            <input type="submit" class="btn btn-success btn-lg btn-block" value="إضافة سند"  />';
//echo form_close();
echo $table;
    }
?>