
<style>
    /************** مخازن ***************/

    .r-cont {
        width: 95%;
    }

    .r-stores {
        /* border-top: 1px dashed #dcdbdb;*/
        margin-bottom: 60px;
        background: linear-gradient(to bottom, #eee 0%, #fff 100%);
        border-radius: 10px;
    }

    .r-stores img {
        padding-top: 15px;
        width: 46%;
        height: auto;
    }

    .r-stores h3 {
        font-size: 18px;
        color: #0c1e56;
        padding-bottom: 15px;
        margin-top: 15px;
    }

    .r-stores a {
        text-decoration: none;
        outline: none;
    }

    .store-btn {
        width: auto;
        outline: none;
    }

    .store-btn1 {
        width: 59px;
        height: 35px;
        background-color: #123456;
        color: #fff;
        outline: none;
    }

    .store-btn1:hover {
        background-color: #123456;
        color: #123456;
    }

    @media (max-width:768px) {
        .r-stores tr {
            display: table-row !important;
        }
    }

    @media (max-width:400px) {
        .r-cont {
            padding: 0;
        }
    }


    .modal1{
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        display: none;
        overflow: hidden;
        -webkit-overflow-scrolling: touch;
        outline: 0;
    }


</style>
<?php


if(isset($_POST['form_date']) && isset($_POST['to_date']) &&  isset($_POST['type'])){
if($_POST['type'] == 1){ ?>

                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-sm-9">
                            <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span>  أوامر التوريد </h4>
                        </div>
                        <?php
                        //echo form_open_multipart('Exchange_orders/update_order');
                        if(isset($table) && $table != null){ ?>
                            <div class="panel-body">
                                <div class="fade in active">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">التاريخ</th>
                                            <th class="text-center">رقم أمر التوريد</th>
                                            <th class="text-center">التفاصيل</th>

                                        </tr>
                                        </thead>
                                        <tbody class="text-center">

                                        <?php
                                        $x = 1;
                                        foreach($table as $record){
                                            echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td>'.date("Y-m-d",$record->date).'</td>
                                            <td>'.$record->order_num.'</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target=".bs-example-modal-lg'.$record->id.'"><span><i class="fa fa-"></i></span> عرض التفاصيل </button>
                                            </td>
                                          
                                          </tr>';
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                    <?php
                                    foreach($table as $record){
                                        echo '<div class="modal1 fade bs-example-modal-lg'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close store-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"> جدول الأصناف</h4>
                                                </div>
                                                <div class="modal-body">
                                                     <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                                                        <div class="col-xs-2">
                                                            <h4 class="r-h4">التاريخ:</h4>
                                                        </div>
                                                        
                                                        <div class="col-xs-2 r-input">
                                                            <label style="padding-top:6px">'.date("Y-m-d",$record->date).'</label>
                                                        </div>
                                                        
                                                        <div class="col-xs-2">
                                                            <h4 class="r-h4">المتبرع:</h4>
                                                        </div>
                                                        
                                                        <div class="col-xs-2 r-input">
                                                            <label style="padding-top:6px">'.$donors[$record->donar_id_fk]->user_name.'</label>
                                                        </div>
                                                        
                                                        <div class="col-xs-2">
                                                            <h4 class="r-h4">رقم التوريد:</h4>
                                                        </div>
                                                        
                                                        <div class="col-xs-2 r-input">
                                                            <label style="padding-top:6px">'.$record->order_num.'</label>
                                                        </div>
                                                    </div>
                                                    <br /><br /><br />
                                                    <table style="width:100%">  
                                                        <tr>
                                                            <th>م</th>
                                                            <th>إسم الصنف</th>
                                                            <th>الوحدة</th>
                                                            <th>الكمية</th>
                                                            <th>الإجمالي</th>
                                                        </tr>';
                                        $total = 0;
                                        for($x = 0 ; $x < count($items[$record->order_num]) ; $x++){
                                            echo '<tr>
                                            <td>'.($x+1).'</td>
                                            <td>'.$products[$items[$record->order_num][$x]->product_code_fk]->p_name.'</td>
                                            <td>'.$units[$items[$record->order_num][$x]->product_unite]->unit_name.'</td>
                                            <td>'.$items[$record->order_num][$x]->product_amount.'</td>
                                            <td>'.sprintf("%.2f",$items[$record->order_num][$x]->all_cost_supply).'</td>
                                          </tr>';
                                            $total += $items[$record->order_num][$x]->all_cost_supply;
                                        }

                                        echo '          <tr>
                                                    <td colspan="4">الإجمالي</td>
                                                    <td>'.sprintf("%.2f",$total).'</td>
                                                </tr>  
                                       </table>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button " class="btn btn-default  store-btn1" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php }else{
                            echo ' <div class=\'alert-danger\'> عفوا لا يوجد بيانات للبحث ... </div>';
                        }
                        //echo form_close(); ?>
                    </div>
                </div>

<?php }else{ ?>



                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-sm-9">
                            <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span>  أوامر الصرف </h4>
                        </div>
                        <?php
                        //echo form_open_multipart('Exchange_orders/update_order');
                        if(isset($table) && $table != null){ ?>
                            <div class="panel-body">
                                <div class="fade in active">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">التاريخ</th>
                                            <th class="text-center">رقم أمر الصرف</th>
                                            <th class="text-center">التفاصيل</th>

                                        </tr>
                                        </thead>
                                        <tbody class="text-center">

                                        <?php
                                        $x = 1;
                                        foreach($table as $record){
                                            echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td>'.date("Y-m-d",$record->date).'</td>
                                            <td>'.$record->order_num.'</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target=".bs-example-modal-lg'.$record->id.'"><span><i class="fa fa-"></i></span> عرض التفاصيل </button>
                                            </td>
                                          
                                          </tr>';
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                    <?php
                                    foreach($table as $record){
                                        echo '<div class="modal1 fade bs-example-modal-lg'.$record->id.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close store-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"> جدول الأصناف</h4>
                                                </div>
                                                <div class="modal-body">
                                                     <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                                                        <div class="col-xs-2">
                                                            <h4 class="r-h4">التاريخ:</h4>
                                                        </div>
                                                        
                                                        <div class="col-xs-2 r-input">
                                                            <label style="padding-top:6px">'.date("Y-m-d",$record->date).'</label>
                                                        </div>
                                                        
                                                        <div class="col-xs-2">
                                                            <h4 class="r-h4">المتبرع:</h4>
                                                        </div>
                                                        
                                                        <div class="col-xs-2 r-input">
                                                            <label style="padding-top:6px">'.$donors[$record->donar_id_fk]->user_name.'</label>
                                                        </div>
                                                        
                                                        <div class="col-xs-2">
                                                            <h4 class="r-h4">رقم الصرف:</h4>
                                                        </div>
                                                        
                                                        <div class="col-xs-2 r-input">
                                                            <label style="padding-top:6px">'.$record->order_num.'</label>
                                                        </div>
                                                    </div>
                                                    <br /><br /><br />
                                                    <table style="width:100%">  
                                                        <tr>
                                                            <th>م</th>
                                                            <th>إسم الصنف</th>
                                                            <th>الوحدة</th>
                                                            <th>الكمية</th>
                                                            <th>الإجمالي</th>
                                                        </tr>';
                                        $total = 0;
                                        for($x = 0 ; $x < count($items[$record->order_num]) ; $x++){
                                            echo '<tr>
                                            <td>'.($x+1).'</td>
                                            <td>'.$products[$items[$record->order_num][$x]->product_code_fk]->p_name.'</td>
                                            <td>'.$units[$items[$record->order_num][$x]->product_unite]->unit_name.'</td>
                                            <td>'.$items[$record->order_num][$x]->product_amount.'</td>
                                            <td>'.sprintf("%.2f",$items[$record->order_num][$x]->all_cost_exchange).'</td>
                                          </tr>';
                                            $total += $items[$record->order_num][$x]->all_cost_exchange;
                                        }

                                        echo '          <tr>
                                                    <td colspan="4">الإجمالي</td>
                                                    <td>'.sprintf("%.2f",$total).'</td>
                                                </tr>  
                                       </table>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button " class="btn btn-default  store-btn1" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php  }else{
                            echo ' <div class=\'alert-danger\'> عفوا لا يوجد بيانات للبحث ... </div>';
                        }
                         ?>
                    </div>
                </div>


<?php }

}else{
    echo "<div class='alert-danger'> عفوا خطأ ... </div>";
}

if(isset($_POST['store_id'])){
    echo '<option value="">--قم بالإختيار--</option>';
    if(isset($recordes1))
        for($x = 0 ; $x < count($recordes1) ; $x++)
            echo '<option value="'.$recordes1[$x]->id.'">'.$recordes1[$x]->p_name.'</option>';die;
}
if(isset($_POST['products_id'])){
    echo '<option value="">--قم بالإختيار--</option>';
    if(isset($recordes2))
        for($x = 0 ; $x < count($recordes2) ; $x++)
            echo '<option value="'.$recordes2[$x]->id.'">'.$recordes2[$x]->unit_name.'</option>';die;
}
?>
