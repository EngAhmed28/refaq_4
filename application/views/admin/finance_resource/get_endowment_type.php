<?php
if(isset($_POST['endowment'])){
?>
    <?php
    if($_POST['endowment']  ==0) {
        if (isset($all_records) && $all_records != null) {
            ?>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th class="text-center">م</th>
                    <th class="text-center">إسم الوقف</th>
                    <th class="text-center">نوع الوقف</th>
                    <th class="text-center">مبلغ الوقف</th>
                    <th class="text-center">المبلغ المتبقي</th>
                    <th class="text-center">النسبة</th>
                    <th class="text-center">المدينة</th>
                    <th class="text-center">عرض</th>
                    <th class="text-center last-th">تعديل</th>
                </tr>
                </thead>
                <tbody class="text-center">

                <?php
                $a = 0;
                foreach ($all_records as $record):
                    $arr = array('إختر', 'فندق', 'صالة تجارية', 'ارض', 'عمارة', 'بيت', 'شقة', 'محلات تجارية');
                    $a++; ?>
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td><?php echo $record->endowment_name; ?></td>
                        <td><?php echo $arr[$record->endowment_type]; ?></td>
                        <td><? echo $record->endowment_cost; ?></td>
                        <td>المبلغ المتبقي</td>
                        <td>100%</td>
                        <td><? if ($main_depart[$record->city]) echo $main_depart[$record->city]->main_dep_name; ?></td>
                        <td>
                            <a href="<?php echo base_url() . 'Finance_resource/edit_endowments/' . $record->id . '/view' ?>"><i
                                    class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                        <td><a href="<?php echo base_url() . 'Finance_resource/edit_endowments/' . $record->id ?>"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php }

    }else {
        ?>


        <?php if (isset($all_select) && $all_select != null) { ?>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th class="text-center">م</th>
                    <th class="text-center">إسم الوقف</th>
                    <th class="text-center">نوع الوقف</th>
                    <th class="text-center">مبلغ الوقف</th>
                    <th class="text-center">المبلغ المتبقي</th>
                    <th class="text-center">النسبة</th>
                    <th class="text-center">المدينة</th>
                    <th class="text-center">عرض</th>
                    <th class="text-center last-th">تعديل</th>
                </tr>
                </thead>
                <tbody class="text-center">

                <?php
                $a = 0;
                foreach ($all_select as $record):
                    $arr = array('إختر', 'فندق', 'صالة تجارية', 'ارض', 'عمارة', 'بيت', 'شقة', 'محلات تجارية');
                    $a++; ?>
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td><?php echo $record->endowment_name; ?></td>
                        <td><?php echo $arr[$record->endowment_type]; ?></td>
                        <td><? echo $record->endowment_cost; ?></td>
                        <td>المبلغ المتبقي</td>
                        <td>100%</td>
                        <td><? if ($main_depart[$record->city]) echo $main_depart[$record->city]->main_dep_name; ?></td>
                        <td>
                            <a href="<?php echo base_url() . 'Finance_resource/edit_endowments/' . $record->id . '/view' ?>"><i
                                    class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                        <td><a href="<?php echo base_url() . 'Finance_resource/edit_endowments/' . $record->id ?>"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <? }

    }?>

<? }?>

 <!-- first if-->

