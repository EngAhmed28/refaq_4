<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['details'] = 'active'; 
            $this->load->view('admin/cars/main_tabs1',$data); 
            ?>

    <!---form------>

    <?php if(isset($results)):?>

    <?php echo form_open_multipart('dashboard/update_car_details/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

    <div class="details-resorce">

        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> رقم السيارة </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="number" class="r-inner-h4 " name="car_code" value="<?php echo $results['car_code'] ?>" required/>
                        </div>
                    </div>
                </div>

                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  نوع السيارة  </h4>
                        </div>
                        <div class="col-xs-6 r-input" >
                            <select name="car_type_id_fk">
                                <option> - اختر - </option>

                                <?php foreach ($cars as $record):
                                    if($record->id==$results['car_type_id_fk']){
                                        $selected='selected';
                                    }else{
                                        $selected='';
                                    }


                                    ?>
                                    <option value="<?php echo $record->id ?>" <?php echo $selected ?> ><?php echo $record->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> رقم المحرك </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="number" class="r-inner-h4 " id="engine_code" name="engine_code" value="<?php echo $results['engine_code'] ?>" required/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">

                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  شركة التأمين  </h4>
                        </div>
                        <div class="col-xs-6 r-input" >
                            <select name="company_id_fk">
                                <?php if($results['company_id_fk']==0): ?>
                                <option value="0" selected> - لا يوجد - </option>
                                <?php else: ?>
                                    <option value="0" > - لا يوجد - </option>
                                <?php endif; ?>
                                <?php foreach ($company as $record):
                                    if($record->id==$results['company_id_fk']){
                                        $selected='selected';
                                    }else{
                                        $selected='';
                                    }
                                    ?>
                                    <option value="<?php echo $record->id ?>" <?php echo $selected ?>><?php echo $record->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> مبلغ التأمين </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="number" class="r-inner-h4 " name="insurance_cost" value="<?php echo $results['insurance_cost'] ?>" required/>
                        </div>
                    </div>
                </div>

                <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-4">
                            <h4 class="r-h4"> تاريخ التأمين </h4>
                        </div>
                        <div class="col-sm-8 r-input">
                            <input type="date" class="r-inner-h4 " name="insurance_date" value="<?php echo date('mm/dd/YYYY',$results['insurance_date']) ?>" required/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-4 " style="margin-right: 400px">
                <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
            </div>

        </div>


        <?php else: ?>

            <?php echo form_open_multipart('dashboard/add_car_details',array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">


                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> رقم السيارة </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="number" class="r-inner-h4 " name="car_code" required/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">  نوع السيارة  </h4>
                                        </div>
                                        <div class="col-xs-6 r-input" >
                                            <select name="car_type_id_fk">
                                                <option> - اختر - </option>

                                                <?php foreach ($cars as $record): ?>
                                                    <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    </div>



                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> رقم المحرك </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="number" class="r-inner-h4 " id="engine_code" name="engine_code" onkeyup="return pass_name();" required/>
                                </div>
                            </div>
                            <span  id="optia2" > </span>

                        </div>
                    </div>

                    <div class="col-xs-12">

                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  شركة التأمين  </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <select name="company_id_fk">
                                        <option> - اختر - </option>

                                        <?php foreach ($company as $record): ?>
                                            <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> مبلغ التأمين </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="number" class="r-inner-h4 " name="insurance_cost" required/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4  col-sm-4 col-xs-4 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-4">
                                    <h4 class="r-h4"> تاريخ التأمين </h4>
                                </div>
                                <div class="col-sm-8 r-input">
                                    <input type="date" class="r-inner-h4 " name="insurance_date" required/>
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
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true">
                            <option data-subtext=""> بـحــث . . . . </option>

                            <option data-subtext=" " disabled="disabled"> none </option>
                        </select>
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center"> م </th>
                                    <th class="text-center"> رقم السيارة </th>
                                    <th class="text-center"> نوع السيارة </th>
                                    <th class="text-center"> رقم المحرك </th>
                                    <th class="text-center"> تفاصيل </th>
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
                                            <td>  <?php echo $record->car_code; ?> </td>
                                            <td>  <?php
                                                if($record->car_type_id_fk){
                                                    $this->db->select('*');
                                                    $this->db->from('companies_and_cars_types');
                                                    $this->db->where('id',$record->car_type_id_fk);
                                                    $query2 = $this->db->get();
                                                    $dataa2= $query2->row_array();

                                                    echo $dataa2['name'] ;
                                                }else{

                                                }
                                                ?> </td>
                                            <td>  <?php echo $record->engine_code; ?> </td>
                                            <td >
                                                <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>" > عرض</button>

                                                <div class="modal fade modal-style" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div id="modal-table"  class="center-block" style="width: 95%;top: 10%; left: auto;">
                                                            <div class="details-resorce" >
                                                                <div class="col-xs-12 r-inner-details">
                                                                    <div class="col-sm-9 col-md-12">
                                                                        <div class="col-xs-12">
                                                                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                                                <div class="col-xs-12 r-pop-table">
                                                                                    <div class="col-xs-6 r-table-padding">
                                                                                        <h4 class="r-h4"> رقم السيارة   </h4>
                                                                                    </div>
                                                                                    <div class="col-xs-6 r-table-padding r-input">
                                                                                        <h4 class="r-inner-h4"> <?php echo $record->car_code; ?></h4>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xs-12 r-pop-table">
                                                                                    <div class="col-xs-6 r-table-padding">
                                                                                        <h4 class="r-h4"> نوع السيارة   </h4>
                                                                                    </div>
                                                                                    <div class="col-xs-6 r-table-padding r-input">
                                                                                        <h4 class="r-inner-h4">

                                                                                            <?php
                                                                                            if($record->car_type_id_fk){
                                                                                                $this->db->select('*');
                                                                                                $this->db->from('companies_and_cars_types');
                                                                                                $this->db->where('id',$record->car_type_id_fk);
                                                                                                $query2 = $this->db->get();
                                                                                                $dataa2= $query2->row_array();

                                                                                                echo $dataa2['name'] ;
                                                                                            }else{

                                                                                            }
                                                                                            ?>


                                                                                        </h4>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xs-12 r-pop-table">
                                                                                    <div class="col-xs-6 r-table-padding">
                                                                                        <h4 class="r-h4"> رقم المحرك </h4>
                                                                                    </div>
                                                                                    <div class="col-xs-6 r-table-padding r-input">
                                                                                        <h4 class="r-inner-h4"><?php echo $record->engine_code; ?></h4>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xs-12 r-pop-table">
                                                                                    <div class="col-xs-6 r-table-padding">
                                                                                        <h4 class="r-h4">  شركة التأمين </h4>
                                                                                    </div>
                                                                                    <div class="col-xs-6 r-table-padding r-input">
                                                                                        <h4 class="r-inner-h4"> <?php
                                                                                            if($record->company_id_fk){
                                                                                                $this->db->select('*');
                                                                                                $this->db->from('companies_and_cars_types');
                                                                                                $this->db->where('id',$record->company_id_fk);
                                                                                                $query2 = $this->db->get();
                                                                                                $dataa2= $query2->row_array();

                                                                                                echo $dataa2['name'] ;
                                                                                            }else{

                                                                                            }
                                                                                            ?></h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                                                <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                                    <div class="col-xs-6 r-table-padding">
                                                                                        <h4 class="r-h4"> مبلغ التأمين   </h4>
                                                                                    </div>
                                                                                    <div class="col-xs-6 r-table-padding r-input">
                                                                                        <h4 class="r-inner-h4"><?php echo $record->insurance_cost; ?></h4>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                                    <div class="col-xs-6 r-table-padding">
                                                                                        <h4 class="r-h4"> تاريخ التأمين   </h4>
                                                                                    </div>
                                                                                    <div class="col-xs-6 r-table-padding r-input">
                                                                                        <h4 class="r-inner-h4"><?php echo date('d-m-Y',$record->insurance_date) ?></h4>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    <div  class="col-sm-3">
                                                                        <div class="col-xs-12 r-password">
                                                                            <div class="col-xs-12 r-table-btn">
                                                                                <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>
                                            </td>
                                            <td><a href="<?php echo base_url('dashboard/delete_car_details').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_car_details').'/'.$record->id ?>"> تعديل </a> </td>
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
                <?php else: ?>
                <div class="col-sm-9">
                    <h4> <span  style="color: #F00;" class="help-block col-xs-6"> لا يوجد بيانات <span> <i class="fa fa-warning" aria-hidden="true"></i></span>  </span></h4>
                </div>

            <?php endif; ?>

        <?php endif; ?>
    </div>


</div>
    </div>
</div></div>
    <script>

        function pass_name(){

            var user_username=$('#engine_code').val();
            if(user_username != "" &&  user_username !=0){
                var dataString ='engine_num_chik='+ user_username ;
                $.ajax({

                    type:'post',
                    url: '<?php echo base_url() ?>dashboard/add_car_details',
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(html){
                        $("#optia2").html(html);
                    }
                });
            }

        }// end function

    </script>
