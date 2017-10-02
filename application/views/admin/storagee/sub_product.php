
<div class="col-sm-11 col-xs-12">
    <!--div class="col-xs-12 r-side-table">
        <div class="col-sm-9">
            <h4> <span> <i class="fa fa-users" aria-hidden="true"></i></span> إدارة المخازن  </h4>
        </div>
        <div class="col-sm-3">
            <h5> موظف استقبال </h5>
            <h5>   اخر دخول  : 27 / 5 / 2017</h5>
        </div>
    </div-->
<!--    <div class="col-xs-12 r-bottom">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li ><a href="<?php /*echo base_url()*/?>dashboard/secretary_part"> أضافة الجهات والمعاملات  </a></li>
                <li><a href="<?php /*echo base_url()*/?>dashboard/secretary_export"> أضافة الصادر </a></li>
                <li class="active"><a href="<?php /*echo base_url()*/?>dashboard/secretary_import"> أضافة الوارد </a></li>
            </ul>
        </div>
    </div>
-->    

 <?php
            $this->load->view('admin/Storage/main_tables'); 
            ?>
<?php if(isset($results)):?>

        <?php echo form_open_multipart('dashboard/update_sub_product/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

        <div class="details-resorce">
            <div class="col-xs-12 r-inner-details">

                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-5">
                            <h4 class="r-h4"> اختار المخزن </h4>
                        </div>
                        <div class="col-xs-6 r-input r-import">
                            <div class="col-xs-6" >
                                <select name="p_storage_code_fk" class="box5">
                                    <option> - اختر - </option>
                                    <?php foreach ($stores as $record):

                                        if($record->id == $results['p_storage_code_fk']){

                                            $selected='selected';

                                        }else{

                                            $selected='';

                                        }
                                        ?>

                                        <option  value="<?php echo $record->id ?>"  <?php echo $selected ?> ><?php echo $record->storage_name ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <h4 class="r-h4"> كود الصنف </h4>

                                <input type="text" class="box6" name="p_code" value="<?php echo $results['p_code'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 r-inner-details">
                <div class="col-xs-12">
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  اختار الأصناف الرئيسية  </h4>
                            </div>
                            <div class="col-xs-6 r-input"  >
                                <select name="p_from_id_fk">
                                    <option> - اختر - </option>
                                    <?php foreach ($main as $record):
                                        if($record->id == $results['p_from_id_fk']){

                                            $selected='selected';

                                        }else{

                                            $selected='';

                                        }

                                        ?>
                                        <option value="<?php echo $record->id ?>" <?php echo $selected ?>><?php echo $record->p_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> نوع الصنف </h4>
                            </div>
                            <div class="col-xs-6 r-input r-import">
                                <div class="col-xs-6" >
                                    <select name="p_type_fk">
                                        <?php if($results['p_type_fk']==2){

                                            echo'<option value="2" selected> مركب </option>
                                        <option value="1"> عادي </option>';
                                        }else{
                                            echo'<option value="2" > مركب </option>
                                        <option value="1" selected> عادي </option>';
                                        } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  اسم الصنف الفرعي </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" class="r-inner-h4" value="<?php echo $results['p_name'] ?>" name="p_name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-5">
                                <h4 class="r-h4"> اختار الوحدة </h4>
                            </div>
                            <div class="col-xs-6 r-input r-import">
                                <div class="col-xs-6" >
                                    <select name="p_unit_fk"  required>
                                        <option> - اختر - </option>
                                        <?php foreach ($units as $record):
                                            if($record->id == $results['p_unit_fk']){

                                                $selected='selected';

                                            }else{

                                                $selected='';

                                            }

                                            ?>
                                            <option  value="<?php echo $record->id ?>" <?php echo $selected ?>><?php echo $record->unit_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  سعر التوريد </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number" class="r-inner-h4 " value="<?php echo $results['p_supply_price'] ?>" name="p_supply_price">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  سعر الصرف </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" class="r-inner-h4 " value="<?php echo $results['p_exchange_price'] ?>" name="p_exchange_price">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  رصيد اول </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <form class="r-block" >

                                <?php if($results['p_past_amount']==0  ){

                                    echo' <input type="radio" class="r-radio" value="0" onclick="show1();" name="import_type_id_fk" checked id="r-in"/> لا
                                <input type="radio" class="r-radio" value="1" onclick="show2();" name="import_type_id_fk" id="r-out"/> نعم';
                                }else{

                                    echo' <input type="radio" class="r-radio" value="0" onclick="show1();" name="import_type_id_fk"  id="r-in"/> لا
                                <input type="radio" class="r-radio" value="1" onclick="show2();" name="import_type_id_fk" id="r-out" checked/> نعم';
                                } ?>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <?php if($results['p_past_amount']==0  ){

                        echo'<div class="form-group "  id="box" style="display: none">';
                    }else{

                        echo'<div class="form-group ">';

                    } ?>
                    
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  الكمية </h4>
                            </div>
                            <div class="col-xs-6 r-input">

                                <input type="number" class="r-inner-h4" value="<?php echo $results['p_past_amount'] ?>" name="p_past_amount" />
                            </div>

                        </div>
                    </div>


                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">  التكلفة الوحدة </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number" class="r-inner-h4 " value="<?php echo $results['p_past_amount_cost'] ?>" name="p_past_amount_cost">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xs-4 " style="margin-right: 400px">
                    <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
                </div>

            </div>

            <?php echo form_close()?>

        </div>

    <?php else: ?>

        <?php echo form_open_multipart('dashboard/add_sub_product',array('class'=>"",'role'=>"form" ))?>

        <div class="details-resorce">

            <div class="col-xs-12 r-inner-details">

                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-5">
                            <h4 class="r-h4"> اختار المخزن </h4>
                        </div>
                        <div class="col-xs-6 r-input r-import">
                            <div class="col-xs-6" >
                                <select name="p_storage_code_fk" class="box5" required>
                                    <option> - اختر - </option>
                                    <?php foreach ($stores as $record): ?>
                                        <option  value="<?php echo $record->id ?>"><?php echo $record->storage_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <h4 class="r-h4"> كود الصنف </h4>

                                <input type="text" class="box6" name="p_code" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-xs-12 r-inner-details">
                <div class="col-xs-12">
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  اختار الأصناف الرئيسية  </h4>
                            </div>
                            <div class="col-xs-6 r-input" >
                                <select name="p_from_id_fk" required>
                                    <option> - اختر - </option>
                                    <?php foreach ($main as $record): ?>
                                    <option value="<?php echo $record->id ?>"><?php echo $record->p_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> نوع الصنف </h4>
                            </div>
                            <div class="col-xs-6 r-input r-import">
                                <div class="col-xs-6" >
                                    <select name="p_type_fk" required>
                                        <option> - اختر - </option>
                                        <option value="2"> مركب </option>
                                        <option value="1"> عادي </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  اسم الصنف الفرعي </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" class="r-inner-h4 " name="p_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">


                        <div class="col-xs-12">
                            <div class="col-xs-5">
                                <h4 class="r-h4"> اختار الوحدة </h4>
                            </div>
                            <div class="col-xs-6 r-input r-import">
                                <div class="col-xs-6" >
                                    <select name="p_unit_fk"  required>
                                        <option> - اختر - </option>
                                        <?php foreach ($units as $record): ?>
                                            <option  value="<?php echo $record->id ?>"><?php echo $record->unit_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  سعر التوريد </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number" class="r-inner-h4 " name="p_supply_price" required>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  سعر الصرف </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" class="r-inner-h4 " name="p_exchange_price" required>
                </div>
            </div>
        </div>
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  رصيد اول </h4>
                </div>
                <div class="col-xs-6 ">
                    <form class="r-block" >


                        <input type="radio" class="r-radio" value="0" onclick="show1();" name="import_type_id_fk" checked id="r-in"/> لا
                        <input type="radio" class="r-radio" value="1" onclick="show2();" name="import_type_id_fk" id="r-out"/> نعم
                    </form>
                </div>
            </div>
        </div>
              <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
              <div class="form-group " id="box" style="display: none">
                  <div class="col-xs-12">
                      <div class="col-xs-6">
                          <h4 class="r-h4">  الكمية </h4>
                      </div>
                      <div class="col-xs-6 r-input">

                      <input type="number" class="r-inner-h4" name="p_past_amount"  />
                      </div>

                  </div>
              </div>


              <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-12" >
                      <div class="col-xs-6" >
                          <h4 class="r-h4">  التكلفة الوحدة </h4>
                      </div>
                      <div class="col-xs-6 r-input">
                          <input type="number" class="r-inner-h4 " name="p_past_amount_cost">
                      </div>
                  </div>
              </div>
                  
            </div>
            <div class="col-xs-12 r-inner-details">
                <div class="col-xs-4 " style="margin-right: 400px">
                    <input type="submit" class="btn btn-blue btn-next"  name="add" value="حفظ" />
                </div>

            </div>

            <?php echo form_close()?>

        </div>
        <!--end-form------>

        <!---table------>
    <?php if(isset($records)&&$records!=null):?>


            <div class="col-xs-11 r-secret-table">
                <div class="panel-body">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true">
                        <option data-subtext=""> بـحــث . . . . </option>
                        <option data-subtext=" "> احمد محمد </option>
                        <option data-subtext=" "> ريهام </option>
                        <option data-subtext=" "> اشرف </option>
                        <option data-subtext=" "> اسماء</option>
                        <option data-subtext=" " disabled="disabled"> none </option>
                    </select>
                    <div class="fade in active">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="text-center"> م </th>
                                <th class="text-center"> اسم المنتج الفرعي  </th>
                                <th class="text-center"> كود المنتج الفرعي </th>
                                <th class="text-center"> المخزن </th>
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
                                        <td> <?php echo $record->p_name; ?> </td>
                                        <td>  <?php echo $record->p_code; ?> </td>

                                        <td>
                                            <?php
                                            if($record->p_storage_code_fk){
                                                $this->db->select('*');
                                                $this->db->from('stores');
                                                $this->db->where('id',$record->p_storage_code_fk);
                                                $query2 = $this->db->get();
                                                $dataa2= $query2->row_array();

                                                echo $dataa2['storage_name'] ;
                                            }else{

                                            }
                                            ?>
                                           </td>
                                        <td><a href="<?php echo base_url('dashboard/delete_sub_product').'/'.$record->id ?>"> حذف </a> <span>/</span> <a href="<?php echo base_url('dashboard/update_sub_product').'/'.$record->id ?>"> تعديل </a> </td>

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


    <script>
        function show1(){
            document.getElementById('box').style.display ='none';
        }
        function show2(){
            document.getElementById('box').style.display = 'block';
        }
    </script>

