<?php if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم الموظف</th>
                                        <th class="text-center">التاريخ</th>
                                        <th class="text-center">الحضور الفعلي</th>
                                        <th class="text-center">الإنصراف الفعلي</th>
                                        <th class="text-center">عدد ساعات الحضور</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                for($x = 0 ; $x < count($table) ; $x++){
                                    echo '<tr>
                                            <td>'.($x+1).'</td>
                                            <td>'.$table[$x]->employee.'</td>
                                            <td>'.date("Y-m-d",$table[$x]->date).'</td>
                                            <td>'.$table[$x]->presence.'</td>
                                            <td>'.$table[$x]->dissuasion.'</td>
                                            <td>'.$table[$x]->diff.'</td>
                                          </tr>';
                                }
                                ?>   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<?php 
}
else
    echo '<div class="alert alert-danger">لم يحضر خلال تلك الفترة</div>'; 
?>