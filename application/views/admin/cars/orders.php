<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
    <div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
        <h4> <span> <i class="fa fa-handshake-o" aria-hidden="true"></i></span>  أمر شغل </h4>
    </div>
    <div class="col-sm-3">
     <h5> <?php echo $_SESSION['user_username']?></h5>
     <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
    </div>
</div>
<div class="col-xs-12 r-bottom">
    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>

    <!---form------>

    <?php if(isset($results)):?>

    <?php echo form_open_multipart('dashboard/update_orders_car/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

    <div class="details-resorce">

        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12 r-inner-details">
                <div class="col-xs-12">
                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> رقم امر التشغيل </h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="text" class="r-inner-h4 " name="orders_num" value="<?php echo $results['orders_num'] ?>"  readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> تاريخ اليوم </h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="date" class="r-inner-h4 " name="date" value="<?php echo date('Y-m-d',$results['date']) ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  رقم السيارة  </h4>
                            </div>
                            <div class="col-xs-6 r-input" >
                                <select name="car_id_fk">
                                    <option> - اختر - </option>

                                    <?php foreach ($cars as $record):
                                        if($record->id==$results['car_id_fk']){
                                            $selected='selected';
                                        }else{
                                            $selected='';
                                        }
                                        ?>
                                        <option value="<?php echo $record->id ?>" <?php echo $selected  ?>><?php echo $record->car_code ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>



                </div>


                <div class="col-xs-12">

                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  السائق  </h4>
                            </div>
                            <div class="col-xs-6 r-input" >
                                <select name="driver_id_fk">
                                    <option> - اختر - </option>

                                    <?php foreach ($drivers as $record):
                                        if($record->id==$results['driver_id_fk']){
                                            $selected='selected';
                                        }else{
                                            $selected='';
                                        }

                                        ?>
                                        <option value="<?php echo $record->id ?>" <?php echo $selected  ?>><?php echo $record->driver_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> رقم العداد </h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="number" class="r-inner-h4 " name="counter_number_go" value="<?php echo $results['counter_number_go'] ?>" required />
                            </div>
                        </div>
                    </div>
            <?php if($results['return']==1): ?>

                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> رقم العدادالعودة </h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="number" class="r-inner-h4 " name="counter_number_returns"
                                       value="<?php echo $results['counter_number_return'] ?>" required />
                            </div>
                        </div>
                    </div>

                    <?php else:?>


                    <?php endif; ?>

                </div>



                <div class="col-xs-12">
                    <h4>جهة المأمورية</h4>

                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> من </h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="text" class="r-inner-h4 " value="<?php echo $results['place_from'] ?>" name="place_from" required />
                            </div>
                        </div>
                    </div>




                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> الي </h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="text" class="r-inner-h4 "  value="<?php echo $results['place_to'] ?>" name="place_to" required />
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12">
                    <h4>التاريخ</h4>

                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> من تاريخ </h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="date" class="r-inner-h4 " value="<?php echo date('Y-m-d',$results['date_from']) ?>" name="date_from" required />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> الي تاريخ</h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="date" class="r-inner-h4 "  value="<?php echo date('Y-m-d',$results['date_to']) ?>" name="date_to" required />
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-xs-4 " style="margin-right: 400px">
                <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
            </div>

        </div>


        <?php else: ?>

            <?php echo form_open_multipart('dashboard/add_orders_car',array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">


                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> رقم امر التشغيل </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="text" class="r-inner-h4 " name="orders_num" value="<?php


                                    if($last ==null) {
                                        echo   $last=1;
                                    }else{

                                        $a= $last[0]->id;
                                        echo $a+1;
                                    }

                                    ?>"  readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> تاريخ اليوم </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="date" class="r-inner-h4 " name="date" required />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  رقم السيارة  </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <select name="car_id_fk">
                                        <option> - اختر - </option>

                                        <?php foreach ($cars as $record):
                                            if(in_array($record->id,$all)){

                                                continue;
                                            }

                                            ?>
                                            <option value="<?php echo $record->id ?>"><?php echo $record->car_code ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>



                    </div>


                    <div class="col-xs-12">

                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  السائق  </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <select name="driver_id_fk">
                                        <option> - اختر - </option>

                                        <?php foreach ($drivers as $record):

                                            if(in_array($record->id,$ddd)){

                                                continue;
                                            }

                                            ?>
                                            <option value="<?php echo $record->id ?>"><?php echo $record->driver_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>




                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> رقم العداد </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="number" class="r-inner-h4 " name="counter_number_go" required />
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="col-xs-12">
                        <div class="col-xs-12">
                        <label>جهة المأمورية</label>
                        </div>
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> من </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="text" class="r-inner-h4 " name="place_from" required />
                                </div>
                            </div>
                        </div>




                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> الي </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="text" class="r-inner-h4 " name="place_to" required />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12">

                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                            <label>التاريخ</label>
                            </div>
                            <div class="col-xs-12">

                                <div class="col-sm-4">
                                    <h4 class="r-h4"> من تاريخ </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="date" class="r-inner-h4 " name="date_from" required />
                                </div>
                            </div>
                        </div>




                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> الي تاريخ</h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="date" class="r-inner-h4 " name="date_to" required />
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="col-xs-4 " style="margin-right: 400px">
                        <input type="submit" class="btn btn-blue btn-next"  name="add" value="حفظ" />
                    </div>

                </div>

                <?php echo form_close()?>

            </div>
            <!--end-form------>

            <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12 r-secret-table">
                    <div class="panel-body">

                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center"> م </th>
                                    <th class="text-center"> رقم امر التشغيل   </th>
                                    <th class="text-center"> رقم السيارة  </th>
                                    <th class="text-center"> اسم السائق  </th>
                                    <th class="text-center"> جهة من   </th>

                                    <th class="text-center"> جهة الي </th>
                                    <th class="text-center"> التاريخ من </th>
                                    <th class="text-center"> التاريخ الي </th>

                                    <th class="text-center"> الاجراء </th>

                                    <th class="text-center"> اجراء العودة </th>

                                </tr>
                                </thead>
                                <tbody class="text-center">

                                <?php if(isset($records)&&$records!=null):?>

                                    <?php
                                    $a=1;

                                    foreach ($records as $record ): ?>
                                        <tr>
                                            <td><?php echo $a ?> </td>
                                            <td>  <?php echo $record->orders_num; ?> </td>
                                            <td> <?php
                                                if($record->car_id_fk){
                                                    $this->db->select('*');
                                                    $this->db->from('cars');
                                                    $this->db->where('id',$record->car_id_fk);
                                                    $query2 = $this->db->get();
                                                    $dataa2= $query2->row_array();

                                                    echo $dataa2['car_code'] ;
                                                }else{

                                                }
                                                ?></td>
                                            <td>  <?php
                                                if($record->driver_id_fk){
                                                    $this->db->select('*');
                                                    $this->db->from('drivers');
                                                    $this->db->where('id',$record->driver_id_fk);
                                                    $query2 = $this->db->get();
                                                    $dataa2= $query2->row_array();

                                                    echo $dataa2['driver_name'] ;
                                                }else{

                                                }
                                                ?>  </td>
                                            <td>  <?php echo $record->place_from; ?> </td>
                                            <td>  <?php echo $record->place_to; ?> </td>
                                            <td>  <?php echo date('d-m-Y',$record->date_from) ?> </td>
                                            <td>  <?php echo date('d-m-Y',$record->date_to) ?> </td>
                                            <td><a href="<?php echo base_url('dashboard/delete_orders_car').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_orders_car').'/'.$record->id ?>"> تعديل </a> </td>
                                     <?php if($record->return ==1): ?>
                                         <td><?php echo  $record->counter_number_go - $record->counter_number_return  ?></td>
                                            <?php else: ?>
                                      <td>
                                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>">
                                              تسجيل العودة
                                          </button>

                                         </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php
                                        $a++;
                                    endforeach;  ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end-table------>
            <?php endif; ?>
        <?php endif; ?>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">اجراء العودة</h4>
                    </div>
                    <?php echo form_open_multipart('dashboard/update_orders_car_return/'.$record->id,array('class'=>"",'role'=>"form" ))?>

                    <div class="modal-body">
                        <div class="form-group col-sm-12">
                            <label>رقم العداد</label>

                            <input type="number" class="form-control" name="counter_number_return" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-blue btn-next"  name="add_return" value="حفظ" />

                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
        
        
</div>
    </div>
</div>