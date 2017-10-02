<?php
if(isset($_POST['guarantees'])){
?>
    <!---->

      <?php if(isset($all_select) && $all_select!=null){?>
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
          <tr>
              <th class="text-center">م</th>
              <th class="text-center">رقم الطلب </th>
              <th class="text-center">إسم الكافل</th>
              <th class="text-center">نوع الطلب</th>
              <th class="text-center">عدد الأيتام</th>
              <th class="text-center">العدد الفعلي</th>
              <th class="text-center">تاريخ الكفالة</th>
              <th class="text-center">حالة الطلب</th>
              <th class="text-center">الموظف المسئول</th>
              <th class="text-center">عرض</th>
              <th class="text-center">إلغاء</th>
              <th class="text-center last-th">الإجراء</th>
          </tr>
          </thead>
          <tbody class="text-center">

          <?php
          $x=0;
          foreach ($all_select as $record):
              $x++;?>
              <tr>
                  <td><?php echo $x;?></td>
                  <td><?php echo $record->id;?></td>
                  <td><?php if(!empty($select_donor[$record->guarantee_id])) echo $select_donor[$record->guarantee_id]->user_name;?></td>
                  <td><?php if(!empty($select_type[$record->guaranty_type])) echo $select_type[$record->guaranty_type]->title;?></td>
                  <td><? echo $record->number;?></td>
                  <td>العدد الفعلي</td>

                  <td><? echo date('Y-m-d',$record->guaranty_start);?></td>
                  <td>جديد</td>
                  <td>الموظف المسئول</td>
                  <td><a href="<?php echo base_url().'Finance_resource/edit_guaranty/'.$record->id.'/view'?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                  <td>إلغاء</td>
                  <td><a href="<?php echo base_url().'Finance_resource/delete_guaranty/'.$record->id?>"><i class="fa fa-trash button" aria-hidden="true"></i></a>/<a href="<?php echo base_url().'Finance_resource/edit_guaranty/'.$record->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
              </tr>
          <?php endforeach;?>

      </tbody>
      </table>
  <? }?>
<? }?>
 <!-- first if-->

