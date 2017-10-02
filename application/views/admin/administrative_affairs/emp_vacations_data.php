<?php



   $year = date("Y");


//echo 'valuesx = ' . $_POST['valuesx'] .'<br/>';

$query2 =$this->db->query('SELECT * FROM `vacations` WHERE `deleted`=1 AND `emp_id`='.$_POST['valuesx'].' and approved = 1 and year = '.$year.'' );
$arr=array();
foreach ($query2->result() as  $row2) {
    $arr[] =$row2;
}
 ?>
 
 
 <?php
 /*
 echo '<pre>';
 print_r($arr);
 echo '<pre/>'; 
 */
 ?>
 
  <?php

if (sizeof($arr)>0) {   ?>
<table class="table table-bordered table-striped "  style="width: 69%; margin-right: 100px; margin-top: 10px;" >
<thead>
	<tr>
    <th style="text-align: center">م</th>
    <th style="text-align: center">اليوم</th>
     <th style="text-align: center">نوع الأجازة</th>
    <th style="text-align: center">المدة</th>
    </tr>
</thead>
<tbody>
<?    $vacation=array('','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
$counter=0;
$diff = 0;
foreach ($arr as  $row):
    $counter++;
    $day_from=$row->from_date;
    $day_to= $row->to_date;

    $date1 = new DateTime($day_from);
    $date2 = new DateTime($day_to);

//    $diff += $date2->diff($date1)->format("%a");


$query_emp = $this->db->query('SELECT * FROM `employees` WHERE  `emp_code`='.$row->emp_id);
$past_days = 0;
//$holiday_num = 0;
if ($query_emp->num_rows() > 0)
{
   $row_emp = $query_emp->row_array(); 
   
  $past_days=  $row_emp['past_days'] ;
   
   
//echo 'group_affairs_id_fk = ' . $row_emp['group_affairs_id_fk'] .'<br/>';   
   //echo $row_emp['group_affairs_id_fk'];
$query_setting_affairs = $this->db->query('SELECT * FROM `administrative_affairs_settings` WHERE  `id` = '. $row_emp['group_affairs_id_fk']);
$row_setting_affairs = $query_setting_affairs->row_array(); 

$holiday_num =  $row_setting_affairs['holiday_num'];



}

/*
echo 'holiday_num = '. $holiday_num .'<br/>';
echo 'past_days = '. $past_days .'<br/>';
echo 'diff = '. $diff .'<br/>';
echo 'year = '. $year .'<br/>';
*/





if($year == $row->year ){
    // 2017 = 2017
    $diff += $date2->diff($date1)->format("%a"); 

}elseif($year > $row->year){
    // 2018 > 2017
    
    $diff = 0 ;
    
}elseif($year < $row->year){
    // 2018 < 2017
    $diff = 0 ; 
    
}



$total_holiday_remain = $holiday_num + $past_days - ($diff);






if($total_holiday_remain >= 0){
    
    $msg = ' الرصيد المتبقي هو  ' . $total_holiday_remain;
    
}elseif($total_holiday_remain <= 0){
    
    
    $msg = 'رصيدك المتبقي هو '  . $total_holiday_remain;
    
}










/*
$query_emp =$this->db->query('SELECT * FROM `employees` WHERE  `emp_code`='.$row->emp_id);
$arr_emp =array();
foreach ($query_emp->result() as  $row_emp) {
    $arr_emp[] =$row_emp;
}*/


//echo $arr_emp['group_affairs_id_fk'];

//echo $arr_emp->group_affairs_id_fk;
//print_r($arr_emp);






?>


<?php
    echo'<tr>
     <tr>
    <td colspan="4">'.$msg.'</td>
  </tr>
        <td>'.$counter.'</td>
        <td>'.$day_from.'</td>
        <td>'.$vacation[$row->vacation_id].'</td>
        <td>'.$diff.'</td>
    </tr>';

endforeach;  } 





 ?>




<?php
$idea_emp_id=  $_POST['valuesx'];
$depart=  $_POST['depart'];

$query2 =$this->db->query('SELECT * FROM `employees` WHERE `administration`='.$depart.' And `id` !='.$idea_emp_id);
$arr=array();
foreach ($query2->result() as  $row2) {
    $arr[] =$row2;
}

?>
<div class="col-xs-12 ">
<div class="col-xs-6">
    <h4 class="r-h4 ">  الموظف القائم بالعمل </h4>
</div>
<div class="col-xs-6 r-input">
  <select name="emp_assigned_id"  required id="emp_assigned_id" class="form-control"   >
            <option value="">إختر </option>
      <?php    foreach($arr as $record): ?>
                <option value="<? echo $record->id;?>"><? echo $record->employee;?></option>
            <? endforeach;?>
            </select>
</div>
</div>









