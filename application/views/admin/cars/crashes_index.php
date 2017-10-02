<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['carsh_index'] = 'active'; 
            $this->load->view('admin/cars/main_tabs2',$data); 
            ?>
            <br /> <br /> <br /> <br />
            <div class="details-resorce">
                <br /> <br /> <br /> <br /><br /> <br />
                <div class="panel with-nav-tabs panel-default">

                    <div class="panel-heading">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#tab0default" data-toggle="tab">الأعطال التي لم يتم تصليحها </a></li>
                            <li><a href="#tab1default" data-toggle="tab">الأعطال الجاري تصليحها</a></li>
                            <li><a href="#tab2default" data-toggle="tab">الأعطال التي تم تصليحها</a></li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        <div class="tab-content">

                            <div class="tab-pane fade in active" id="tab0default">
                                <?php 
                                if(isset($table)&& $table!=null):
                                ?>
                                <table id="example" class=" display table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="danger">
                                            <th>#</th>
                                            <th>رقم السيارة</th>
                                            <th>رقم العطل</th>
                                            <th>إسم العطل</th>
                                            <th>التحكم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for($x = 0 ; $x < count($table) ; $x++){ 
                                        $totalTickets = array_sum(array_map("count", $table[key($table)]));
                                    
                                        echo '<tr>
                                                <td rowspan="'.$totalTickets.'">'.($x+1).'</td>
                                                <td rowspan="'.$totalTickets.'">'.$cars[key($table)]->car_code.'</td>';
                                        for($a = 0 ; $a < count($table[key($table)]) ; $a++){
                                            echo   '<td rowspan="'.count($table[key($table)][key($table[key($table)])]).'">'.$table[key($table)][key($table[key($table)])][0]->crashe_num.'</td>';
                                            for($z = 0 ; $z < count($table[key($table)][key($table[key($table)])]) ; $z++){ 
                                                echo '  <td>'.$table[key($table)][key($table[key($table)])][$z]->crashe_name.'</td>
                                                        <td>
                                                            <a title="تم التصليح" href="'.base_url().'dashboard/crash_status/2/'.$table[key($table)][key($table[key($table)])][$z]->id.'" class="btn btn-success btn-xs"> <i class="fa fa-check"></i> </a>
                
                                                            <a title="جاري التصليح" href="'.base_url().'dashboard/crash_status/1/'.$table[key($table)][key($table[key($table)])][$z]->id.'" class="btn btn-warning btn-xs"> <i class="fa fa-cogs"></i> </a>
                                                        </td>
                                                      </tr>';
                                            }
                                            next($table[key($table)]);
                                        }
                                        next($table);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php 
                                else:
                                    echo '<div class="alert alert-danger" >لا توجد أعطال لم يتم تصليحها</div>';
                                endif;
                                ?>
                            </div>

                            <div class="tab-pane fade" id="tab1default">
                                <?php
                                if(isset($table1)&& $table1!=null):
                                ?>
                                <table id="example" class=" display table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="warning">
                                            <th>#</th>
                                            <th>رقم السيارة</th>
                                            <th>رقم العطل</th>
                                            <th>إسم العطل</th>
                                            <th>التحكم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for($x = 0 ; $x < count($table1) ; $x++){ 
                                        $totalTickets = array_sum(array_map("count", $table1[key($table1)]));
                                    
                                        echo '<tr>
                                                <td rowspan="'.$totalTickets.'">'.($x+1).'</td>
                                                <td rowspan="'.$totalTickets.'">'.$cars[key($table1)]->car_code.'</td>';
                                        for($a = 0 ; $a < count($table1[key($table1)]) ; $a++){
                                            echo   '<td rowspan="'.count($table1[key($table1)][key($table1[key($table1)])]).'">'.$table1[key($table1)][key($table1[key($table1)])][0]->crashe_num.'</td>';
                                            for($z = 0 ; $z < count($table1[key($table1)][key($table1[key($table1)])]) ; $z++){ 
                                                echo '  <td>'.$table1[key($table1)][key($table1[key($table1)])][$z]->crashe_name.'</td>
                                                        <td>
                                                            <a title="لم يتم التصليح" href="'.base_url().'dashboard/crash_status/0/'.$table1[key($table1)][key($table1[key($table1)])][$z]->id.'" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> </a>
                
                                                            <a title="تم التصليح" href="'.base_url().'dashboard/crash_status/2/'.$table1[key($table1)][key($table1[key($table1)])][$z]->id.'" class="btn btn-success btn-xs"> <i class="fa fa-check"></i> </a>
                                                        </td>
                                                      </tr>';
                                            }
                                            next($table1[key($table1)]);
                                        }
                                        next($table1);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php 
                                else:
                                    echo '<div class="alert alert-warning" >لا توجد أعطال جاري تصليحها</div>';
                                endif;
                                ?>
                            </div>

                            <div class="tab-pane fade" id="tab2default">
                                <?php
                                if(isset($table2)&& $table2!=null):
                                ?>
                                <table id="example" class=" display table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="success">
                                            <th>#</th>
                                            <th>رقم السيارة</th>
                                            <th>رقم العطل</th>
                                            <th>إسم العطل</th>
                                            <th>التحكم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for($x = 0 ; $x < count($table2) ; $x++){ 
                                        $totalTickets = array_sum(array_map("count", $table2[key($table2)]));
                                    
                                        echo '<tr>
                                                <td rowspan="'.$totalTickets.'">'.($x+1).'</td>
                                                <td rowspan="'.$totalTickets.'">'.$cars[key($table2)]->car_code.'</td>';
                                        for($a = 0 ; $a < count($table2[key($table2)]) ; $a++){
                                            echo   '<td rowspan="'.count($table2[key($table2)][key($table2[key($table2)])]).'">'.$table2[key($table2)][key($table2[key($table2)])][0]->crashe_num.'</td>';
                                            for($z = 0 ; $z < count($table2[key($table2)][key($table2[key($table2)])]) ; $z++){ 
                                                echo '  <td>'.$table2[key($table2)][key($table2[key($table2)])][$z]->crashe_name.'</td>
                                                        <td>
                                                            <a title="لم يتم التصليح" href="'.base_url().'dashboard/crash_status/0/'.$table2[key($table2)][key($table2[key($table2)])][$z]->id.'" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> </a>
                
                                                            <a title="جاري التصليح" href="'.base_url().'dashboard/crash_status/1/'.$table2[key($table2)][key($table2[key($table2)])][$z]->id.'" class="btn btn-warning btn-xs"> <i class="fa fa-cogs"></i> </a>
                                                        </td>
                                                      </tr>';
                                            }
                                            next($table2[key($table2)]);
                                        }
                                        next($table2);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php 
                                else:
                                    echo '<div class="alert alert-success" >لا توجد أعطال تمت تصليحها</div>';
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
td { cursor: pointer; cursor: hand; }
</style>