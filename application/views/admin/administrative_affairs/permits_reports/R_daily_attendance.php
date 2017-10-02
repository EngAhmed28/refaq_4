<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <div class="details-resorce">
                <center><h3>الحضور والإنصراف ليوم <?php echo date("d-m-Y") ?></h3></center>
                <?php if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم الموظف</th>
                                        <th class="text-center">الحضور</th>
                                        <th class="text-center">الإنصراف</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                for($x = 0 ; $x < count($table) ; $x++){
                                    $query = $this->db->query('SELECT emp_attendance.* FROM `emp_attendance` 
                                    WHERE emp_attendance.date='.strtotime(date('d-m-Y')).' AND emp_attendance.emp_id='.$table[$x]->id.'');
                                    $result = $query->row_array();
                                    if($query->num_rows() > 0){ 
                                        $presence = $result['presence'];
                                        $dissuasion = $result['dissuasion'];
                                    }
                                    else{
                                        $presence = '<span class ="glyphicon glyphicon-remove"></span>';
                                        $dissuasion = '<span class ="glyphicon glyphicon-remove"></span>';   
                                    }  
            
                                    echo '<tr>
                                            <td>'.($x+1).'</td>
                                            <td>'.$table[$x]->employee.'</td>
                                            <td>'.$presence.'</td>
                                            <td>'.$dissuasion.'</td>
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
                    echo '<div class="alert alert-danger">لا يوجد موظفين</div>';  
                ?>
                
            </div>
        </div>
    </div>
</div>