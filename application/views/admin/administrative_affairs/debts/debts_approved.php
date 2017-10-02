<div class="r-program">
<div class="container">
<div class="col-sm-11 col-xs-12">
<?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
<div class="details-resorce">
<div class="col-md-12">
<div class="panel with-nav-tabs panel-default">
<div class="panel-heading">
<ul class="nav nav-tabs">
<li class="active"><a href="#tab0default" data-toggle="tab">طلبات السلفة الوارده </a></li>
<li class=""><a href="#tab1default" data-toggle="tab">طلبات السلفة المقبولة</a></li>
<li class=""><a href="#tab2default" data-toggle="tab">طلبات السلفة المرفوضة </a></li>
</ul>
</div>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="tab0default">
<!--  srart 1   ------------------------------------------------------------------------------------------------>
<?php if(isset($depts_recived)&& $depts_recived!=null && !empty($depts_recived)):?>
<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<thead>
<tr>
<th>م</th>
<th class="text-center">اسم الموظف</th>
<th  class="text-center">تاريخ السلفة </th>
<th class="text-center">قيمة السلفة</th>
<th  class="text-center">الإجراء</th>
</tr>
</thead>
<tbody class="text-center">
<?php
$a=1;
foreach ($depts_recived as $record ):?>
<tr>
    <td><?php echo $a ?></td>
    <td ><?php echo $record->emp_name ?></td>
   
    <td ><?php echo date("Y-m-d",$record->debt_date)  ?></td>
     <td ><?php echo $record->value?></td>
    <td>
           <a href="#"  data-toggle="modal" data-target="#accept<?php echo $record->debt_id?>" title="موافق">
                 <i class="fa fa-check fa-lg" aria-hidden="true"></i> </a>

      
        <a href="#" data-toggle="modal" data-target="#refus<?php echo $record->debt_id?>" title="مرفوض">
            <i class="fa fa-times" aria-hidden="true"></i> </a>
    </td>
</tr>
<?php
$a++;
endforeach;  ?>
</tbody>
</table>
<?php else: ?>
<div class="alert alert-danger" >لايوجد طلبات وارده </div>
<?php endif; ?>
<!---  end  1   ------------------------------------------------------------------------------------------------>
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab1default">
<!--  srart 2   ------------------------------------------------------------------------------------------------>
<?php if(isset($depts_accept)&& $depts_accept!=null && !empty($depts_accept)):?>
<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<thead>
<tr>
<th>م</th>
<th class="text-center">اسم الموظف</th>
<th  class="text-center">تاريخ السلفة </th>
<th class="text-center">قيمة السلفة</th>
<th  class="text-center">الإجراء</th>
</tr>
</thead>
<tbody class="text-center">
<?php
$a=1;
foreach ($depts_accept as $record ):?>
<tr>
    <td><?php echo $a ?></td>
    <td ><?php echo $record->emp_name ?></td>
    <td ><?php echo date("Y-m-d",$record->debt_date)  ?></td>
    <td ><?php echo $record->value?></td>
    
    <td>
        <a href="<?php  echo base_url().'Administrative_affairs/DoDebtsApproved/'.$record->debt_id.'/0'?>" title="تحويل">
            <i class="fa fa-repeat fa-lg" aria-hidden="true"></i> </a>
         <a href="#" data-toggle="modal" data-target="#refus<?php echo $record->debt_id?>" title="مرفوض">
            <i class="fa fa-times" aria-hidden="true"></i> </a>
    </td>
</tr>
<?php
$a++;
endforeach;  ?>
</tbody>
</table>
<?php else: ?>
<div class="alert alert-danger" >لايوجد طلبات وارده </div>
<?php endif; ?>

<!---  end  2   ------------------------------------------------------------------------------------------------>
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab2default">
<!--  srart 3   ------------------------------------------------------------------------------------------------>
<?php if(isset($depts_refuse)&& $depts_refuse!=null && !empty($depts_refuse)):?>
<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<thead>
<tr>
<th>م</th>
<th class="text-center">اسم الموظف</th>
<th  class="text-center">تاريخ السلفة </th>
<th class="text-center">قيمة السلفة</th>
<th  class="text-center">الإجراء</th>
</tr>
</thead>
<tbody class="text-center">
<?php
$a=1;
foreach ($depts_refuse as $record ):?>
<tr>
     <td><?php echo $a ?></td>
    <td ><?php echo $record->emp_name ?></td>
    <td ><?php echo date("Y-m-d",$record->debt_date)  ?></td>
    <td ><?php echo $record->value?></td>
    <td>
         <a href="#"  data-toggle="modal" data-target="#accept<?php echo $record->debt_id?>" title="موافق">
                 <i class="fa fa-check fa-lg" aria-hidden="true"></i> </a>

        <a href="<?php  echo base_url().'Administrative_affairs/DoDebtsApproved/'.$record->debt_id.'/0'?>"title="تحويل">
            <i class="fa fa-repeat fa-lg" aria-hidden="true"></i> </a>
    </td>
</tr>
<?php
$a++;
endforeach;  ?>
</tbody>
</table>
<?php else: ?>
<div class="alert alert-danger" >لايوجد طلبات وارده </div>
<?php endif; ?>


<!---  end  3   ------------------------------------------------------------------------------------------------>
</div>
<!---  end Tabs ----------------------------------------------------------------------------------------------------->
</div>
</div>
</div>
</div>
<!---  end All ----------------------------------------------------------------------------------------------------->
</div>
</div>
</div>
</div>

  <?php foreach($all_debts as $row):?>
        <div id="accept<?php echo $row->debt_id?>" class="modal fade" role="dialog">
   <?php echo form_open_multipart('Administrative_affairs/DoDebtsApproved/'.$row->debt_id.'/1')?>
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">قبول الطلب</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
<div class="col-xs-3">
<label > الاسباب  </label>
</div>
<div class="col-xs-9">
<textarea name="reason" class="form-control"></textarea>
</div>

<div class="col-xs-3"></div>
<div class="col-xs-6">
<input class="btn  center-block" name="operation" type="submit" value=" قبول الطلب" />
</div>

</div> 
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
  <?php  echo form_close()?>
</div>


  <div id="refus<?php echo $row->debt_id?>" class="modal fade" role="dialog">
   <?php echo form_open_multipart('Administrative_affairs/DoDebtsApproved/'.$row->debt_id.'/2')?>
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">رفض الطلب</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
<div class="col-xs-3">
<label > الاسباب  </label>
</div>
<div class="col-xs-9">
<textarea name="reason" class="form-control"></textarea>
</div>

<div class="col-xs-3"></div>
<div class="col-xs-6">
<input class="btn  center-block" name="operation" type="submit" value=" رفض الطلب" />
</div>
      </div>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
  <?php  echo form_close()?>
</div>
          <?php  endforeach?>

