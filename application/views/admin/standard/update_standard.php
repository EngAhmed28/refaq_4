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
<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['update_standard'] = 'active'; 
            $this->load->view('admin/standard/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($table) && $table != null){ ?>
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم المنبع</th>
                                        <th class="text-center">التفاصيل</th>
                                        <th class="text-center">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                for($x = 0 ; $x < count($table) ; $x++){
                                    echo '<tr>
                                            <td>'.($x+1).'</td>
                                            <td>'.$products[key($table)]->p_name.'</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target=".bs-example-modal-lg'.key($table).'"><span><i class="fa fa-"></i></span> عرض التفاصيل </button>
                                            </td>
                                            <td>
                                            <a href="'.base_url().'Products/standard/'.key($table).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>

                                            <a  href="'.base_url().'Products/delete_standard/'.key($table).'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a>
                                            </td>
                                          </tr>';
                                    next($table);
                                } 
                                ?>   
                                </tbody>
                            </table>
                            <?php
                            reset($table);
                            for($z = 0 ; $z < count($table) ; $z++){
                                echo '<div class="modal1 fade bs-example-modal-lg'.key($table).'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close store-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"> الأصناف التي تدخل في تركيب المنبع ('.$products[key($table)]->p_name.')</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table style="width:100%">  
                                                        <tr>
                                                            <th>م</th>
                                                            <th>إسم الصنف</th>
                                                            <th>الوحدة</th>
                                                            <th>الكمية</th>
                                                        </tr>';
                                for($x = 0 ; $x < count($table[key($table)]) ; $x++){
                                    echo '<tr>
                                            <td>'.($x+1).'</td>
                                            <td>'.$products[$table[key($table)][$x]->product_sub_code_fk]->p_name.'</td>
                                            <td>'.$units[$products[$table[key($table)][$x]->product_sub_code_fk]->p_unit_fk]->unit_name.'</td>
                                            <td>'.$table[key($table)][$x]->product_sub_amount.'</td>
                                          </tr>';
                                }
                                echo '</table>
                                         </div>
                                            <div class="modal-footer">
                                                <button type="button " class="btn btn-default  store-btn1" data-dismiss="modal">إغلاق</button>
                                            </div>
                                         </div>
                                    </div>
                                </div>';
                                next($table); 
                            }
                            
                            ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>