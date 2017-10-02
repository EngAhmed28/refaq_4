
<div class="col-sm-11 col-xs-12">
    <div class="col-xs-12 r-side-table">
        <div class="col-sm-9">
            <h4> <span> <i class="fa fa-male" aria-hidden="true"></i></span> مجلس الادارة</h4>
        </div>
        <div class="col-sm-3">
            <h5> <?php echo $_SESSION['user_username']?></h5>
            <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
        </div>
    </div>
  
    <?php if(!isset($edit)):?>
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 ">
                        <div class="col-xs-6">
                            <h4 class="r-h4 ">  تاريخ الجلسة </h4>
                        </div>
                        <div class="col-xs-6 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control docs-date" name="session_date" value="<?php echo  date('Y-m-d',$data['session_date']);?>" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-5">
                            <h4 class="r-h4"> رقم الجلسة </h4>
                        </div>
                        <div class="col-xs-4 r-input">
                            <input type="number" id="band_num"  name="band_num"  class="r-inner-h4"   value="<?php echo $galsa ?>" readonly=""/>
                        </div>
                        <div class="col-xs-3">
                            <?php $page='add_time_table';
                            if($this->uri->segment(5) =='minutes_and_decisions'):
                                $page='minutes_and_decisions';
                            endif;?>
                            <a href="<?php echo base_url().'admin/Directors/'.$page?>"><button  class="r-h4" > الرجوع </button></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php endif;?>
        <!---table------>
        <?php if(isset($edit)):?>
            <?php echo form_open_multipart('admin/Directors/edit_item/'.$edit['id'].'/'.$edit['session_id_fk'])?>
            <div class="details-resorce">
           
                <div class="col-xs-12 r-inner-details">
                      <!---------------------------------->
               <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                 
                  <div class="col-xs-12 ">
                        <div class="col-xs-6">
                            <h4 class="r-h4 ">  تاريخ الجلسة </h4>
                        </div>
                        <div class="col-xs-6 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control docs-date" name="session_date" value="<?php echo  date('Y-m-d',$edit_galsa['session_date']);?>" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
              
              </div>
               <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                
                    <div class="col-xs-12">
                        <div class="col-xs-5">
                            <h4 class="r-h4"> رقم الجلسة </h4>
                        </div>
                        <div class="col-xs-4 r-input">
                            <input type="number" id="band_num"  name="band_num"  class="r-inner-h4"   value="<?php echo  $edit['item_num'];?>" readonly=""/>
                        </div>
                        <div class="col-xs-3">
                         </div>
                    </div>
                </div>
              <!------------------------------->
                   
                   
                   
                   
                    <div  class="col-xs-12" >
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">رقم البند  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" name="item_num" class="r-inner-h4" readonly   value="<? echo  $edit['item_num'];?>" />
                                </div>
                            </div>
                        </div>

                    <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-4">
                                <h4 class="r-h4">  البند  </h4>
                            </div>
                            <div class="col-xs-8 r-input">
                                <textarea class="r-textarea" name="item_title" id="item_title" > <?php echo  $edit['item_title']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-xs-3">
                        </div>
                    <div class="col-xs-4">
                        <input type="submit" class="btn center-block r-manage-btn2 "   name="edit" value="تعديل" />
                    </div>
                    <?php echo form_close()?>

                </div>

                <!---table------>
                <?php if(isset($records)):?>
                    <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">تاريخ الجلسة</th>
                                        <th class="text-center">بنود الجلسة </th>
                                        <th class="text-center">الحضور</th>
                                        <th class="text-center">الاجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php if(isset($records)&&$records!=null):?>

                                        <?php
                                        $a=1;
                                        foreach ($records as $record ):?>
                                            <tr>
                                                <td><?php echo $a ?></td>
                                                <td><?php echo date('d-m-Y',$record->session_date) ?></td>
                                                <td><a href="<?php echo base_url().'admin/Directors/items_decisions/'.$record->council_id_fk?>"><button type="button" class="btn btn-info btn-md"  ><i class="fa fa-list"></i> عرض </button></a></td>
                                                <td>popup1</td>
                                                <td>edit</td>
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
                <?php endif; ?>

            </div>
        <?php else: ?>

    </div>
    <?php if(isset($all_items) && $all_items!=null):?>
    <div class="col-xs-12">
        <div class="panel-body">

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">رقم البند</th>
                        <th class="text-center">إسم البند </th>
                        <th class="text-center">الاجراء</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $a=1;
                        foreach ($all_items as $record ):?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo $record->item_num; ?></td>
                                <td><?php echo $record->item_title; ?></td>
                                <td> <a href="<?php echo base_url('admin/Directors/delete_item').'/'.$record->id.'/'.$data['council_id_fk'] ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url('admin/Directors/edit_item').'/'.$record->id .'/'.$data['council_id_fk']?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                            </tr>

                            <?php
                            $a++;
                        endforeach;  ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; endif; ?>

