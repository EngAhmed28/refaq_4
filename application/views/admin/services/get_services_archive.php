<?php
$val = $_POST['valu'];

if($val ==1){
    if (!empty($all_operations)):?>
    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">رقم الطلب </th>
            <th class="text-center">   إسم الأم</th>
            <th class="text-center">فئة الخدمة</th>
            <th class="text-center">نوع الخدمة</th>
            <th class="text-center">حالة الخدمة</th>
            <th class="text-center">عرض</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?


        foreach ($all_operations as $record):
            if($record->process==1){
                $condition ='موافقة' ;
            }elseif ($record->process==2){
                $condition ='رفض' ;
            }elseif ($record->process==3){
                $condition ='الإطلاع' ;
            }elseif ($record->process==4){
                $condition ='تم الإعتماد' ;
            }elseif ($record->process==5){
                $condition ='التنفيذ' ;
            }
           ?>

            <tr>
                <td><? echo $record->id;?></td>
                <td><? echo $record->order_id_fk;?></td>
                <td><? echo $record->mother_national_num_fk;?></td>
                <td><? if(!empty($service_type[$record->order_id_fk])): echo $all[$service_type[$record->order_id_fk][0]->service_id_fk]; endif;?></td>
                <td>مستحقة</td>
                <td><? echo $condition;?></td>
                <td><a href="<?php echo base_url()?>family/certified_services_details/<? echo $record->order_id_fk;?>"<i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
            </tr>
        <?     endforeach;?>

        </tbody>
    </table>
    <?else:?>
        <div class="col-xs-12 alert alert-danger" >لا توجد سجلات للعرض</div>
    <? endif;?>
<?  }elseif($val >1){

    if(!empty($select_id[$val])):
    $id =$select_id[$val] ;
    if (!empty($select_all_operations[$id[0]->id])):

    ?>
            <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                <thead>
                <tr>
                    <th class="text-center">م</th>
                    <th class="text-center">رقم الطلب </th>
                    <th class="text-center">   إسم الأم</th>
                    <th class="text-center">فئة الخدمة</th>
                    <th class="text-center">نوع الخدمة</th>
                    <th class="text-center">حالة الخدمة</th>
                    <th class="text-center">عرض</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?
        for($s=0;$s<sizeof($select_id[$val]);$s++){
        foreach ($select_all_operations[$id[$s]->id] as $row):
            if($row->process==1){
                $condition ='موافقة' ;
            }elseif ($row->process==2){
                $condition ='رفض' ;
            }elseif ($row->process==3){
                $condition ='الإطلاع' ;
            }elseif ($row->process==4){
                $condition ='تم الإعتماد' ;
            }elseif ($row->process==5){
                $condition ='التنفيذ' ;
            }
                    ?>
                    <tr>
                        <td><? echo $row->id;?></td>
                        <td><? echo $row->order_id_fk;?></td>
                        <td><? echo $row->mother_national_num_fk;?></td>
                        <td><? if(!empty($service_type[$row->order_id_fk])): echo $all[$service_type[$row->order_id_fk][0]->service_id_fk]; endif;?></td>
                        <td>مستحقة</td>
                        <td><? echo $condition;?></td>
                        <td><a href="<?php echo base_url()?>family/certified_services_details/<? echo $row->order_id_fk;?>"<i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                    </tr>
                <?     endforeach;?>
        <? }?>
                </tbody>
            </table>

    <?  else: ?>
        <div class="col-xs-12 alert alert-danger" >لا توجد سجلات للعرض</div>

    <? endif;?>

    <?else:?>
        <div class="col-xs-12 alert alert-danger" >لا توجد سجلات للعرض</div>
<?   endif;}?>

