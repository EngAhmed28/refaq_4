<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['all_products'] = 'active'; 
            $this->load->view('admin/reports/main_tabs',$data); 
            ?>
            <div class="details-resorce">
            <?php if((isset($compination) && $compination != null) || (isset($ordinary) && $ordinary != null)){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" rowspan="2">م</th>
                                        <th class="text-center" rowspan="2">الأصناف</th>
                                        <th class="text-center" rowspan="2">رصيد أول</th>
                                        <th class="text-center" colspan="2">الوارد</th>
                                        <th class="text-center" colspan="2">المنصرف</th>
                                        <th class="text-center" colspan="2">التشغيل</th>
                                        <th class="text-center" rowspan="2">صافي</th>
                                    </tr>
                                    <tr>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $s = 1;
                                if(isset($compination) && $compination != null){
                                    for($x = 0 ; $x < count($compination) ; $x++)
                                        echo '<tr>
                                              <td>'.($s++).'</td>
                                              <td>'.$compination[$x]->p_name.'</td>
                                              <td>'.$compination[$x]->p_past_amount.'</td>
                                              <td>'.$compination[$x]->supplies.'</td>
                                              <td></td>
                                              <td>'.$compination[$x]->exchange.'</td>
                                              <td></td>
                                              <td>'.$compination[$x]->production.'</td>
                                              <td></td>
                                              <td>'.($compination[$x]->p_past_amount + $compination[$x]->supplies + $compination[$x]->production - $compination[$x]->exchange).'</td>
                                              </tr>';
                                }
                                if(isset($ordinary) && $ordinary != null){
                                    for($x = 0 ; $x < count($ordinary) ; $x++)
                                        echo '<tr>
                                              <td>'.($s++).'</td>
                                              <td>'.$ordinary[$x]->p_name.'</td>
                                              <td>'.$ordinary[$x]->p_past_amount.'</td>
                                              <td>'.$ordinary[$x]->supplies.'</td>
                                              <td></td>
                                              <td>'.$ordinary[$x]->exchange.'</td>
                                              <td></td>
                                              <td>'.$ordinary[$x]->production.'</td>
                                              <td></td>
                                              <td>'.(($ordinary[$x]->p_past_amount + $ordinary[$x]->supplies) - ($ordinary[$x]->production + $ordinary[$x]->exchange)).'</td>
                                              </tr>';
                                }
                                ?>   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>