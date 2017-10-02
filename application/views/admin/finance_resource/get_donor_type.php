<?php
/*echo'<pre>';
var_dump($all_select);
echo'</pre>';*/
if(isset($_POST['donors'])){
?>
    <!---->
      <?php if(isset($all_select) && $all_select!=null){?>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="text-center">م</th>
        <th class="text-center">رقم الكافل </th>
        <th class="text-center">إسم الكافل</th>
        <th class="text-center">نوع الكافل</th>
        <th class="text-center">طريقة الدفع</th>
        <th class="text-center">رقم الجوال</th>
        <th class="text-center">صفة المتبرع</th>
        <th class="text-center">عرض</th>
        <th class="text-center">الإجراء</th>
    </tr>
    </thead>
    <tbody class="text-center">

    <?php
    $x=0;
    foreach ($all_select as $record):
        $donor_type =array('','فردي','مؤسسة');
        $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
        $x++;?>
        <tr>
            <td><?php echo $x;?></td>
            <td><?php echo $record->id;?></td>
            <td><?php echo $record->user_name;?></td>
            <td><?php echo $donor_type[$record->donor_type];?></td>
            <td><?php echo $pay[$record->pay_method_id_fk];?></td>
            <td><?php echo $record->guaranty_mob;?></td>
            <td><?php echo $record->character_person;?></td>
            <td><a href="<?php echo base_url().'Finance_resource/edit_donors/'.$record->id.'/view'?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
            <td><a href="<?php echo base_url().'Finance_resource/delete_guaranty/'.$record->id?>"><i class="fa fa-trash button" aria-hidden="true"></i></a>/<a href="<?php echo base_url().'Finance_resource/edit_guaranty/'.$record->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
        </tr>
    <?php endforeach;?>

    </tbody>
</table>

  <? }?>
<? }?>
 <!-- first if-->

