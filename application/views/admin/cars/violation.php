<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
    <div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
        <h4> <span> <i class="fa fa-ticket" aria-hidden="true"></i></span>  مخالفات السيارات </h4>
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

    <?php echo form_open_multipart('dashboard/update_car_violation/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

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
                                <input type="text" class="r-inner-h4 " name="violation_num" value="<?php echo $results['violation_num'] ?>"  readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> تاريخ اليوم </h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="date" class="r-inner-h4 " value="<?php echo date('Y-m-d',$results['date']) ?>" name="date" required />
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
                                        <option value="<?php echo $record->id ?>" <?php echo $selected ?>><?php echo $record->car_code ?></option>
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
                                        <option value="<?php echo $record->id ?>" <?php echo $selected ?>><?php echo $record->driver_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> ملاحظات </h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="text" class="r-inner-h4 " value="<?php echo $results['note'] ?>" name="note" required />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-sm-4">
                                <h4 class="r-h4"> رقم الايصال </h4>
                            </div>
                            <div class="col-sm-8 r-input">
                                <input type="number" class="r-inner-h4 " value="<?php echo $results['receipt_code'] ?>" name="receipt_code" required />
                            </div>
                        </div>
                    </div>

                </div>




                <div class="col-xs-4 " style="margin-right: 400px">
                    <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
                </div>

            </div>


            <?php else: ?>

                <?php echo form_open_multipart('dashboard/add_car_violation',array('class'=>"",'role'=>"form" ))?>

                <div class="details-resorce">


                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-sm-4">
                                        <h4 class="r-h4"> رقم امر التشغيل </h4>
                                    </div>
                                    <div class="col-sm-8 r-input">
                                        <input type="text" class="r-inner-h4 " name="violation_num" value="<?php


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

                                            <?php foreach ($cars as $record):  ?>
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

                                            <?php foreach ($drivers as $record):?>
                                                <option value="<?php echo $record->id ?>"><?php echo $record->driver_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>




                            <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-sm-4">
                                        <h4 class="r-h4"> ملاحظات </h4>
                                    </div>
                                    <div class="col-sm-8 r-input">
                                        <input type="text" class="r-inner-h4 " name="note" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-sm-4">
                                        <h4 class="r-h4"> رقم الايصال </h4>
                                    </div>
                                    <div class="col-sm-8 r-input">
                                        <input type="number" class="r-inner-h4 " name="receipt_code" required />
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
                                        <th class="text-center"> رقم السيارة  </th>
                                        <th class="text-center"> اسم السائق  </th>
                                        <th class="text-center"> ملاحظات   </th>

                                        <th class="text-center"> رقم الايصال </th>
                                        <th class="text-center"> التاريخ  </th>

                                        <th class="text-center"> الاجراء </th>


                                    </tr>
                                    </thead>
                                    <tbody class="text-center">

                                    <?php if(isset($records)&&$records!=null):?>

                                        <?php
                                        $a=1;

                                        foreach ($records as $record ): ?>
                                            <tr>
                                                <td><?php echo $a ?> </td>
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
                                                <td>  <?php echo $record->note; ?> </td>
                                                <td>  <?php echo $record->receipt_code; ?> </td>
                                                <td>  <?php echo date('Y-m-d',$record->date)  ?> </td>


                                                <td><a href="<?php echo base_url('dashboard/delete_car_violation').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_car_violation').'/'.$record->id ?>"> تعديل </a> </td>

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

      
</div>
    </div>
</div>
