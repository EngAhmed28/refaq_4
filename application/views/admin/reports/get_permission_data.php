
<?php
if(!empty($views) && isset($views) && $views!=null ):?>
    <div class="col-xs-12">
        <div class="panel-body">

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">إسم الموظف</th>
                        <th class="text-center">نوع الإذن</th>
                        <th class="text-center">التاريخ</th>
                        <th class="text-center">حالة الإذن</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">


                    <?php
                    $a=1;
                    foreach ($views as $record ):
                        ?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td><?echo $get_name[$record->emp_code][0]->employee; ?></td>

                            <?php
                            if ($record->permit_table_type ==1){
                                echo'  <td >إستثنائي</td>';
                            }elseif($record->permit_table_type ==2){
                                echo'  <td >عادى</td>';
                            }
                            ?>
                            <td><?echo date('Y-m-d',$record->date); ?></td>
                            <?php
                            if ($record->permit_status ==0){
                                echo'  <td >لم يتم النظر</td>';
                            }elseif ($record->permit_status ==1){
                                echo'  <td >موافق</td>';
                            }elseif ($record->permit_status ==2){
                                echo'  <td >رفض</td>';
                            }
                            ?>
                        </tr>
                        <?php
                        $a++;
                    endforeach;  ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else :?>
 <div class="col-lg-12 alert alert-danger" >
      لا يوجد اذونات خلال الفترة
          </div>

<?php endif;?>


