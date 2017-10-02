<div class="r-program">
<div class="container">
<div class="col-sm-11 col-xs-12">
<?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>


<?php //echo $year; ?>
<?php if(isset($result)):?>
<!--edit-->
<div class="details-resorce">
<div class="col-xs-12 r-inner-details">
<?php  echo form_open_multipart('Administrative_affairs/update_vacation/'.$result['id'])?>
<div class="col-xs-12 ">
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> الإدارة </h4>
</div>
<div class="col-xs-6 r-input">
<select name="main_dep_f_id" id="main_dep_f_id"   disabled>
<option value="">إختر</option>
<?php if(!empty($admin)):
foreach ($admin as $record):
$select ='';
if(!empty($employ_name[$result['emp_id']])){
if($employ_name[$result['emp_id']][0]->administration ==  $record->id ){
$select ='selected';
}
}
?>
<option value="<? echo $record->id;?>" <?echo $select ;?>><? echo $record->name;?></option>
<?php  endforeach; endif;?>
</select>
</div>
</div>
<div class="col-xs-12 " >
<div class="col-xs-6">
<h4 class="r-h4"> الموظف </h4>
</div>
<div class="col-xs-6 r-input">
<select name="emp_id" id="emp_id"   disabled  >
<option value="">إختر</option>
<?php if(!empty($all_empolyees[$employ_name[$result['emp_id']][0]->administration])):
foreach ($all_empolyees[$employ_name[$result['emp_id']][0]->administration] as $records):
$select ='';
if($result['emp_id'] ==  $records->id ){
$select ='selected';
}
?>
<option value="<? echo $records->id;?>" <? echo $select;?>><? echo $records->employee;?></option>
<?php  endforeach; endif;?>
</select>
</div>
</div>
<div class="col-xs-12 ">
<div class="col-xs-6">
<h4 class="r-h4 ">  من </h4>
</div>
<div class="col-xs-6 r-input ">
<div class="docs-datepicker">
<div class="input-group">
<input type="text"   class="form-control docs-date" name="from_date" placeholder="شهر / يوم / سنة " value="<? echo $result['from_date'];?>">
</div>
</div>
</div>
</div>
<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4">التأشيره المطلوبة </h4>
</div>
<div class="col-xs-6 r-input">
<textarea class="r-textarea"  name="visa"><? echo $result['visa'];?></textarea>
</div>
</div>
</div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> نوع الأجازة </h4>
</div>
<div class="col-xs-6 r-input">
<select name="vacation_id"  id="vacation_id" class="form-control" required >
<?php $vacation=array('إختر','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
for($a=0;$a<sizeof($vacation);$a++):
$select='';
if($a ==$result['vacation_id']){
$select='selected';
}
?>
<option value="<? echo $a; ?>" <? echo $select;?>><? echo $vacation[$a]; ?></option>
<? endfor ?>
</select>
</div>
</div>
<div class="col-xs-12 ">
<div class="col-xs-6">
<h4 class="r-h4 ">  إلي </h4>
</div>
<div class="col-xs-6 r-input ">
<div class="docs-datepicker">
<div class="input-group">
<input type="text" class="form-control docs-date"   name="to_date" placeholder="شهر / يوم / سنة " value="<? echo $result['to_date'];?>">
</div>
</div>
</div>
</div>
<div class="col-xs-12 ">
<div class="col-xs-6">
<h4 class="r-h4 ">  الموظف القائم بالعمل </h4>
</div>
<div class="col-xs-6 r-input">
<select name="emp_assigned_id"  required id="emp_assigned_id" class="form-control"   >
<option value="">إختر </option>
<?php
if(!empty($all_empolyees[$employ_name[$result['emp_id']][0]->administration])):
foreach($all_empolyees[$employ_name[$result['emp_id']][0]->administration] as $record):
$select ='';
if($record->id == $result['emp_id']){
continue;
}
if($record->id == $result['emp_assigned_id']){
$select ='selected';
}
?>
<option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->employee;?></option>
<? endforeach; endif;?>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-xs-12 r-inner-btn">
<div class="col-xs-3">
</div>
<div class="col-xs-3">
<input type="submit" role="button" name="update" value="حفظ" class="btn pull-right">
</div>
<?php echo form_close()?>
<div class="col-xs-2">
</div>
</div>
</div>
<!--edit-->
<?php else: ?>
<div class="details-resorce">
<div class="col-xs-12 r-inner-details">
<?php  echo form_open_multipart('Administrative_affairs/add_vacation')?>
<div class="col-xs-12 ">
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> الإدارة </h4>
</div>
<div class="col-xs-6 r-input">
 <?php if($_SESSION['role_id_fk'] ==3):?>
     <input type="text" readonly name="main_dep_f_id" value="<?php echo $get_depart_name[$_SESSION['administration_id']][0]->name;?>">
  <?php else:?>
     <select name="main_dep_f_id" id="main_dep_f_id"  required  onchange="return sub($('#main_dep_f_id').val());">
         <option value="">إختر</option>
         <?php if(!empty($admin)):
             foreach ($admin as $record):?>
                 <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
             <?php  endforeach; endif;?>
     </select>

    <?php endif;?>

</div>
</div>
    <?php if($_SESSION['role_id_fk'] ==3):?>

        <div class="col-xs-12 " >
            <div class="col-xs-6">
                <h4 class="r-h4"> الموظف </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" readonly name="emp_id" value="<?php echo $employ_name[$_SESSION['emp_code']][0]->employee;?>">
            </div>
        </div>
    <?php else:?>
        <div class="col-xs-12 " id="optionearea5">
        </div>
    <?php endif;?>

<div class="col-xs-12 ">
<div class="col-xs-6">
<h4 class="r-h4 ">  من </h4>
</div>
<div class="col-xs-6 r-input ">
<div class="docs-datepicker">
<div class="input-group">
<input type="text"  required class="form-control docs-date" name="from_date" placeholder="شهر / يوم / سنة ">
</div>
</div>
</div>
</div>
<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4">التأشيره المطلوبة </h4>
</div>
<div class="col-xs-6 r-input">
<textarea class="r-textarea" required name="visa"></textarea>
</div>
</div>
</div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> نوع الأجازة </h4>
</div>
<div class="col-xs-6 r-input">
<select name="vacation_id"  id="vacation_id" class="form-control" required >
<?php $vacation=array('إختر','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
for($a=0;$a<sizeof($vacation);$a++):   ?>
<option value="<? echo $a; ?>"><? echo $vacation[$a]; ?></option>
<? endfor ?>
</select>
</div>
</div>
<div class="col-xs-12 ">
<div class="col-xs-6">
<h4 class="r-h4 ">  إلي </h4>
</div>
<div class="col-xs-6 r-input ">
<div class="docs-datepicker">
<div class="input-group">
<input type="text" class="form-control docs-date"  required name="to_date" placeholder="شهر / يوم / سنة ">
</div>
</div>
</div>
</div>
<div class="col-xs-12 " id="optionearea55"></div>
</div>
</div>

</div>

<?php



//echo $total_holiday_remain;

if($total_holiday_remain > 0){
      
     $tag_html = '<div class="col-xs-3">
<input type="submit"  name="add"  value="حفظ"  onclick=" return myFunction()" class="btn pull-right">
</div>'   ;
}elseif($total_holiday_remain <= 0 ){
   $tag_html =  '<div class="col-xs-12"><div class="alert alert-danger">
                   <strong>عذرأ!</strong>  لا تمتلك رصيد كافي من الأجازات
    </div></div>';  
    
}


/*elseif($total_holiday_remain <= 0){
    
     $tag_html =  '<div class="col-xs-12"><div class="alert alert-danger">
                   <strong>عذرأ!</strong>  لا تمتلك رصيد كافي من الأجازات
    </div></div>';
}elseif($total_holiday_remain == 0){
    
     $tag_html =  '<div class="col-xs-12"><div class="alert alert-danger">
                   <strong>عذرأ!</strong>  لا تمتلك رصيد كافي من الأجازات
    </div></div>';
}*/

?>


<?php echo $tag_html ?>









<div class="col-xs-12 r-inner-btn">
<div class="col-xs-3">
</div>










<?php echo form_close()?>
<div class="col-xs-2">
</div>
</div>
</div>
<!---table--------------------------------------------------------->


<?php /*
echo '<pre/>';
print_r($records);
echo '<pre/>';*/
?>


<?php if(isset($records)):?>
<div class="col-xs-12">
<div class="panel-body">
<div class="fade in active">
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<thead>
<tr>
<th>م</th>
<th class="text-center">اسم الموظف</th>
<th class="text-center">الموظف القائم بالعمل</th>
<th class="text-center">مدة الاجازة</th>
<th  class="text-center">حاله الأجازة</th>
<th  class="text-center">الإجراء</th>
<th  class="text-center">التفاصيل</th>
</tr>
</thead>
<tbody class="text-center">
<?php if(isset($records)&&$records!=null):?>
<?php
$a=1;
//$diff = 0;
foreach ($records as $record ):
$date1 = new DateTime($record->from_date);
$date2 = new DateTime($record->to_date);
$diff2 = $date2->diff($date1)->format("%a");


if($record->suspend == 1)
{
$class = 'success';
$title = 'نشط';
}
else
{
$class = 'danger';
$title = 'غير نشط';
}


$query_dif =$this->db->query('SELECT * FROM `vacations` WHERE `emp_id`='.$record->emp_id.' And `deleted`=1  and approved = 1 and year = '.$year.'  ');
$arr_dif=array();
foreach ($query_dif->result() as  $row2_dif) {
$arr_dif[] = $row2_dif;
}
$diff = 0;
foreach ($arr_dif as $row_1):

$date_f = new DateTime($row_1->from_date);
$date_t = new DateTime($row_1->to_date);
$diff += $date_t->diff($date_f)->format("%a");

 endforeach;





//echo $diff;
?>



<tr>
<td><?php echo $a ?></td>
<td ><?   if(!empty($record->emp_id)) :echo $employ_name[$record->emp_id][0]->employee; endif;?></td>
<td ><? if(!empty($record->emp_assigned_id)) : echo $employ_name[$record->emp_assigned_id][0]->employee; endif; ?></td>
<td ><? echo $diff2; ?></td>
<td>
<a href="<?php echo base_url().'Administrative_affairs/suspend_vacation/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-8"><?php echo $title ?> </a>
</td>
<td> <a href="<?php echo base_url('Administrative_affairs/delete_vacation').'/'.$record->id?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
</span>  <a href="<?php echo base_url('Administrative_affairs/update_vacation').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
<td> <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"> التفاصيل </button>
<?php



$query2 =$this->db->query('SELECT * FROM `vacations` WHERE `emp_id`='.$record->emp_id.' And `deleted`=1  and approved = 1 and year = '.$year.'  ');
$all_vac=array();
foreach ($query2->result() as  $row2) {
$all_vac[] = $row2;
}
?>
<div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content" >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">تفاصيل أجازات الموظف </h4>
</div>
<div class="row" style="margin-right:10px">
<div class="col-sm-3">
<h5> إسم الموظف:</h5>
</div>
<div class="col-sm-9">
<h5><?   if(!empty($record->emp_id)) :echo $employ_name[$record->emp_id][0]->employee; endif;?></h5>
</div>
</div>
<div class="modal-body">
<table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
<thead>
<tr>
<th width="5%" class="text-right">م</th>
<th  class="text-right">القائم بالعمل</th>
<th  class="text-right">المدة</th>
<th  class="text-right">نوع الأجازة</th>
<th  class="text-right">تاريخ النهاية</th>
<th class="text-right">اريخ البداية</th>
</tr>
</thead>
<? if (!empty($all_vac)) :?>
<tbody>
<tr>


    <?
    echo'<pre>';
    var_dump($all_vac);
    echo'</pre>';
    die;


    ?>
<?
$count=0;
$sum=0;
foreach ($all_vac as $row):


$count++;
$date1 = new DateTime($row->from_date);
$date2 = new DateTime($row->to_date);
$diff += $date2->diff($date1)->format("%a");
?>
<td><? echo $count;?></td>
<td><? echo $row->emp_assigned_id;?></td>
<td><? echo $diff;?></td>
<td><? echo $row->vacation_id;?></td>
<td><? echo $row->to_date;?></td>
<td><? echo $row->from_date;?></td>
</tr>
<? endforeach;?>




</tbody>
<? endif;?>



</table>
</div>
<div class="row" style="margin-right:10px">
<div class="col-sm-3">
<h5>التأشيرة المطلوبة:</h5>
</div>
<div class="col-sm-9">

<h5><? echo $row->visa;?></h5>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
</div>
</div>
</div>
</div>
</td>
</tr>
<?php
$a++;
endforeach;  ?>
<?php endif; ?>
</tbody>
</table>
<!--popup-->
<!-- end [-->
</div>
</div>
</div>
<?php  endif; endif; ?>
<!---table------>
</div>
</div>
</div>
<!-------------------------------------------------------------------------------------------------->
<script>
function sub(values)
{
if(values)
{
var dataString = 'values=' + values;
$.ajax({
type:'post',
url: '<?php echo base_url() ?>/Administrative_affairs/add_vacation',
data:dataString,
dataType: 'html',
cache:false,
success: function(html){
$('#optionearea5').html(html);
}
});
return false;
}
else
{
$('#optionearea5').html('');
return false;
}
}
</script>
<!-------------------------------------------------------------------------------------------------->