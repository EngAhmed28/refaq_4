<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            unset($_SESSION["order_addtion".$_SESSION["user_id"]]);
            $data['update_order'] = 'active';
            $this->load->view('admin/products/main_tabs',$data);
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
<?php
if(isset($result))
    $id = $result['id'];
else
    $id = 0;

echo form_open_multipart('Products/index/'.$id.'',array('class'=>"myform"))?>

                    <div class="col-xs-12">

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">تاريخ اليوم:</h4>
                            </div>

                            <div class="col-xs-6 r-input">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control docs-date" name="date" <?php
                                        if(isset($result)){
                                            echo 'value="'.date("m/d/Y",$result['date']).'"';

                                        } ?> id="date" placeholder="شهر/يوم/سنة " required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">اختر المنتج:</h4>
                            </div>

                            <div class="col-xs-6 r-input">
                                <select name="composite_p" id="composite_p" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                                    <option value="">--قم بالإختيار--</option>
                                    <?php
                                    if(isset($composite_p))
                                        for($x = 0 ; $x < count($composite_p) ; $x++){
                                            if(isset($result) && $composite_p[$x]->id == $result['product_main_code_fk'])
                                                $selected = 'selected';
                                            else
                                                $selected = '';
                                            echo '<option value="'.$composite_p[$x]->id.'" '.$selected.'>'.$composite_p[$x]->p_name.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">الكمية </h4>
                            </div>

                            <div class="col-xs-6 r-input">
                                <input type="number" class="form-control" name="amount" <?php if(isset($result)) {echo 'value="'.$result['product_main_amount'].'"'; } ?>  required>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">وصف العملية </h4>
                            </div>

                            <div class="col-xs-6 r-input">
                                <input type="text" class="form-control" name="note" <?php if(isset($result)) {echo 'value="'.$result['note'].'"';} ?>  required>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-3 r-inner-btn" style="padding-top: 20px;">

                        <?php if(isset($result)) {?>
                            <input type="submit" role="button" name="update" value="تعديل البيانات" class="btn pull-right" />
                        <?php }else{?>
                        <input type="submit" role="button" name="save" value="حفظ البيانات" class="btn pull-right" />
                        <?php }?>
                    </div>
                </div>



                <?php
                if(isset($records) && $records!= null){?>


                    <div class="col-xs-12 r-inner-details">
                        <div class="panel-body">
                            <div class="fade in active">
                                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-right">م</th>
                                        <th class="text-right">تالايخ اليوم</th>
                                        <th class="text-right">أسم المنتج</th>
                                        <th class="text-right">الكمية</th>
                                        <th class="text-right">الاجراء</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($records as $record):
                                        $x=0;?>
                                    <tr>
                                        <td><?php echo ++$x;?></td>
                                        <td> <?php echo date("Y-m-d", $record->date);?></td>
                                        <td><?php echo $products[$record->product_main_code_fk]->p_name?></td>
                                        <td><?php echo $record->product_main_amount; ?></td>
                                        <td>
                                            <a href="<?php echo base_url().'Products/update_data/'.$record->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>

                                            <a  href="<?php echo base_url().'Products/delete/'.$record->id?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                        </td>

                                    </tr>
                                 <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>



                        </div>
                    </div>
                <?php }else{

                }
                ?>
            </div>
        </div>
    </div>


