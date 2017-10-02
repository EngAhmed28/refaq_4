<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['drivers'] = 'active'; 
            $this->load->view('admin/cars/main_tabs3',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <?php 
                        if(isset($table)&& $table!=null):
                        ?>
                        <table id="example" class=" display table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>إسم السائق</th>
                                    <th>رقم الرخصة</th>
                                    <th>العنوان</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($x = 0 ; $x < count($table) ; $x++){ 
                                echo '<tr>
                                      <td>'.($x+1).'</td>
                                      <td>'.$table[$x]->driver_name.'</td>
                                      <td>'.$table[$x]->driver_license_code.'</td>
                                      <td>'.$table[$x]->driver_address.'</td>
                                      </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php 
                        else:
                            echo '<div class="alert alert-danger" >لا يوجد سائقين مسجلين</div>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>