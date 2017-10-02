<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['status'] = 'active'; 
            $this->load->view('admin/cars/main_tabs3',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <?php 
                        if((isset($table)&& $table!=null) || (isset($order)&& $order!=null)):
                        ?>
                        <table id="example" class=" display table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>إسم السائق</th>
                                    <th>سيارة رقم</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($table)&& $table!=null){
                                for($x = 0 ; $x < count($table) ; $x++){
                                    if(isset($table[$x]->driver_order) && $table[$x]->driver_order != null){
                                        if($table[$x]->driver_order[key($table[$x]->driver_order)]->return == 1){
                                            $status = 'متاح';
                                            $car = '-';
                                        }
                                        if($table[$x]->driver_order[key($table[$x]->driver_order)]->return == 0){
                                            $status = 'غير متاح';
                                            $car = $cars[$table[$x]->driver_order[key($table[$x]->driver_order)]->car_id_fk]->car_code;
                                        }
                                    }
                                    else{
                                        $status = 'متاح';
                                        $car = '-';
                                    }
                                    echo '<tr>
                                          <td>'.($x+1).'</td>
                                          <td>'.$table[$x]->driver_name.'</td>
                                          <td>'.$car.'</td>
                                          <td>'.$status.'</td>
                                          </tr>';
                                }
                            }
                            if(isset($order)&& $order!=null){
                                for($z = 0 ; $z < count($order) ; $z++){
                                    echo '<tr>
                                          <td>'.($x+1).'</td>
                                          <td>-</td>
                                          <td>'.$order[$z]->car_code.'</td>
                                          <td>متاح</td>
                                          </tr>';
                                    $x++;
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php 
                        else:
                            echo '<div class="alert alert-danger" >لا يوجد سائقين أو سيارات مسجلين</div>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>