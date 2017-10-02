
            <div class="col-sm-11 col-xs-12">
                <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-users" aria-hidden="true"></i></span> مجلس الادارة</h4>
                    </div>
                    <div class="col-sm-3">
                      <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                    </div>
                </div>
                 <div class="col-xs-12 r-bottom">
                     <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <?php 
                             $active2=''; $active='';$active3='';
                            if($this->uri->segment(2) == 'add_city' || $this->uri->segment(2) == 'update_city' ){
                                $active='active';
                               
                            }elseif($this->uri->segment(2) == 'add_neighborhood' || $this->uri->segment(2) == 'update_neighborhood'){
                                $active2='active';

                            }elseif($this->uri->segment(2) == 'definitions_devides' || $this->uri->segment(2) == 'update_definitions_devides'){
                                 $active3='active';
                            }
                            ?>
                            <li class="<? echo $active;?>"><a href="<?php echo base_url()?>Dashboard/add_city"> إضافة مدينة  </a></li>
                            <li class="<? echo $active2;?>"><a href="<?php echo base_url()?>Dashboard/add_neighborhood"> إضافة حي  </a></li>
                            <li class="<? echo $active3;?>"><a href="<?php echo base_url()?>Dashboard/definitions_devides"> إضافة جهاز منزلى </a></li>
                        </ul>
                    </div>


                </div>




            <?php if(isset($result)):?>

            <?php echo form_open_multipart('dashboard/update_neighborhood/'.$result['id'])?>
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">المدينة</h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select  name="depart_from_id_fk" id="depart_from_id_fk" class="form-control" required>
                                            <option value="" >--قم بالإختيار--</option>
                                            <?php
                                            foreach($main_depart as $record){
                                                if($record->id == $result['main_dep_f_id']){
                                                    $sel ="selected";
                                                }else{
                                                    $sel='';
                                                }
                                                echo '<option value="'.$record->id.'" '.$sel.'>'.$record->main_dep_name.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">إسم الحي </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="name" value="<?php echo $result['sub_dep_name'] ?>" >
                                    </div>
                                </div>


                            </div>

                        </div>
  <div class="col-xs-3"></div>
                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="update" value="حفظ" />
                        </div>
                    </div>

                </div>
                <?php echo form_close()?>


            <?php else: ?>

            <?php echo form_open_multipart('dashboard/add_neighborhood',array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">المدينة</h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="depart_from_id_fk" id="depart_from_id_fk" class="form-control" required>
                                            <option value="">--قم بالإختيار--</option>
                                            <?php
                                            foreach($main_depart as $record){
                                                echo '<option value="'.$record->id.'">'.$record->main_dep_name.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">إسم الحي </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="name" >
                                    </div>
                                </div>

                            </div>

                        </div>
<div class="col-xs-3"></div>
                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="add" value="حفظ" />
                        </div>
                        <?php echo form_close()?>

                    </div>

                <!---table------>
                <?php if(isset($records)):?>


                <div class="col-xs-12">
                        <div class="panel-body">
                            <div class="fade in active">
                                <table id="no-more-tables" class="table table-bordered" role="table">
                                    <thead>

                                    <tr>
                                        <th class="text-center">م</th>
                                        <th  class="text-center">المدينة</th>
                                        <th  class="text-center">الحي </th>
                                        <th  class="text-center">الإجراء</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    <?php
                                    $ser = 1;
                                    for($x=0 ;$x<count($main_depart);$x++){?>
                                    <?
                                    $this->db->select('*');
                                    $this->db->from('departments');
                                    $this->db->where('main_dep_f_id', $main_depart[$x]->id);
                                    $query = $this->db->get();
                                    $dataa= $query->result();

                                    if(empty($dataa)){

                                    }else{
                                    ?>
                                    <tr>
                                        <td  class="text-center" rowspan="<?php echo count($dataa); ?>" ><?php echo($ser++)?></td>
                                        <td rowspan="<?php echo count($dataa); ?>"><?php echo $main_depart[$x]->main_dep_name?></td>
                                        <?php
                                        for($y=0;$y<count($dataa);$y++){
                                            echo'<td>'.$dataa[$y]->sub_dep_name.'</td> ';?>

                                            <td class="text-center"><!-- <a href="<?php echo base_url('dashboard/delete_neighborhood').'/'.$dataa[$y]->id ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span> --> <a href="<?php echo base_url('dashboard/update_neighborhood').'/'.$dataa[$y]->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                            <? echo'</tr>';
                                        }
                                        ?>
                                        <?}
                                        ?>



                                        <? }

                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>


            </div>
            <?php endif; ?>