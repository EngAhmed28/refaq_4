<?php /*$this->load->view('admin/requires/header');
$this->load->view('admin/requires/sidebar');*/?>

<?php if(!$query):?>
    <?php echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لاتوجد نتائج مطابقة لهذا البحث
</div>'?>
<?php else :?>

    <?php if ($_POST['search_type']==2): ?>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center"> م </th>
            <th class="text-center"> الجهة </th>

            <th class="text-center"> نوع المعاملة </th>
            <th class="text-center"> درجة الاهمية </th>

            <th class="text-center"> تاريخ الصادر </th>
            <th class="text-center"> تفاصيل </th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php if(isset($imports)&&$imports!=null): ?>

            <?php
            $a=1;

            foreach ($imports as $record ):  ?>
                <tr>
                    <td><?php echo $a  ?> </td>
                    <td> <?php
                        $this->db->select('*');
                        $this->db->from('office_setting');
                        $this->db->where('id',$record->organization_from_id_fk);
                        $query = $this->db->get();
                        $query->row_array();
                        
                        echo $record->organization_from_id_fk;  ?> </td>

                    <td>  <?php echo $record->name;  ?> </td>
                    <td> <?php echo $record->importance_degree_id_fk; ?> </td>
                    <td> <?php echo $record->date;  ?> </td>
                    <td >
                        <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>


                        <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
                                <div id="modal-table-1"  class="center-block">
                                    <div class="details-resorce" >
                                        <div class="col-xs-12 r-inner-details">
                                            <div class="col-sm-9">
                                                <div class="col-xs-12">
                                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> تاريخ الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"> <?php echo $record->date;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> نوع الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">

                                                                    <?php if($record->import_type_id_fk==1){

                                                                        echo'داخلى'      ;

                                                                    }else{
                                                                        echo'خارجي';
                                                                    }  ?>


                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> نوع المعاملة </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->name;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4">  رقم القيد </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->registration_number;  ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> رقم الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">5</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> الجهه الصادر اليها   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">5</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> درجه الاهمية  </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->importance_degree_id_fk;  ?></h4>
                                                                <h4 class="r-inner-h4"><?php echo $record->importance_degree_other;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4">  طريقة لتسليم  </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->method_recived_id_fk;  ?></h4>
                                                                <h4 class="r-inner-h4"><?php echo $record->method_recived_other;  ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 inner-side r-data">
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4">عنوان الكتاب</h4>
                                                        </div>
                                                        <div class="col-xs-9 r-input r-table-padding">
                                                            <h4 class="r-inner-h4"><?php echo $record->title;  ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4">بشأن</h4>
                                                        </div>
                                                        <div class="col-xs-9 r-table-padding r-input">
                                                            <h4 class="r-inner-h4"><?php echo $record->about;  ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4"> الموضوع </h4>
                                                        </div>
                                                        <div class="col-xs-9 r-table-padding r-input">
                                                            <h4 class="r-inner-h4"><?php echo $record->content ?></h4>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12">
                                                    <table style="width:100%">
                                                        <h4 class="r-table-text text-left"> التوقيعات : </h4>
                                                        <tr>
                                                            <th>م</th>
                                                            <th>الاسم</th>
                                                            <th>الوظيفة</th>
                                                        </tr>

                                                        <?php
                                                        $sign=$signatures[$record->id];
                                                        $job=$get_job[$record->id];
                                                        $s=1;
                                                        for($x=0;$x<  sizeof($sign);$x++) {
                                                            echo' <tr>
                                                                            <td>  '.$s.' </td>
                                                                            <td> '.$sign[$x] .'</td>
                                                                            <td>'. $job[$x] .'</td>
                                                                        </tr>';
                                                            $s++; }  ?>
                                                    </table>
                                                </div>

                                                <div class="col-xs-12">
                                                    <table style="width:100%">
                                                        <h4 class="r-table-text text-left"> المرفقات : </h4>
                                                        <tr>
                                                            <th>م</th>
                                                            <th>الاسم</th>
                                                            <th>الوظيفة</th>
                                                        </tr>


                                                        <?php
                                                        $s=1;
                                                        $photo= $images[$record->id];
                                                        $tit=$title[$record->id];
                                                        for($x=0;$x<  sizeof($photo);$x++) {
                                                            $img = base_url('uploads/images').'/'.$photo[$x];

                                                            echo' <tr>

                                                                            <td>'.$s.'</td>
                                                                            <td>'.$tit[$x].'</td>
                                                                            
';
                                                            $s++;

                                                            echo '
                                                                            <td><img src="'.$img.'" width="50px" height="50px"></td></tr>
                                                                        ';
                                                        }
                                                        ?>

                                                    </table>
                                                </div>
                                            </div>
                                            <div id="donotprintdiv" class="col-sm-3">
                                                <div class="col-xs-12 r-password">
                                                    <div class="col-xs-12 r-table-btn">
                                                        <button class="btn  center-block"  onclick="javascript:printDiv('printablediv<?php echo $record->id  ?>')" type="submit">طباعة</button>




                                                    </div>
                                                    <div class="col-xs-12 r-table-btn">
                                                        <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div id="thumbwrap">
                                                            <a class="thumb" href="#"><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" width="40%"><span><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                $a++;
            endforeach;  ?>
        <?php endif; ?>


        <?php if(isset($exports)&&$exports!=null): ?>

            <?php
            $a=1;

            foreach ($exports as $record ):  ?>
                <tr>
                    <td><?php echo $a  ?> </td>
                    <td> <?php echo $record->organization_to_id_fk;  ?> </td>

                    <td>  <?php echo $record->name;  ?> </td>
                    <td> <?php echo $record->importance_degree_id_fk; ?> </td>
                    <td> <?php echo $record->date;  ?> </td>
                    <td >
                        <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>


                        <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
                                <div id="modal-table-1"  class="center-block">
                                    <div class="details-resorce" >
                                        <div class="col-xs-12 r-inner-details">
                                            <div class="col-sm-9">
                                                <div class="col-xs-12">
                                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> تاريخ الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"> <?php echo $record->date;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> نوع الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">

                                                                    <?php if($record->export_type_id_fk==1){

                                                                        echo'داخلى'      ;

                                                                    }else{
                                                                        echo'خارجي';
                                                                    }  ?>


                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> نوع المعاملة </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->name;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4">  رقم القيد </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->registration_number;  ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> رقم الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">5</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> الجهه الصادر اليها   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">5</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> درجه الاهمية  </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->importance_degree_id_fk;  ?></h4>
                                                                <h4 class="r-inner-h4"><?php echo $record->importance_degree_other;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4">  طريقة لتسليم  </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->method_recived_id_fk;  ?></h4>
                                                                <h4 class="r-inner-h4"><?php echo $record->method_recived_other;  ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 inner-side r-data">
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4">عنوان الكتاب</h4>
                                                        </div>
                                                        <div class="col-xs-9 r-input r-table-padding">
                                                            <h4 class="r-inner-h4"><?php echo $record->title;  ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4">بشأن</h4>
                                                        </div>
                                                        <div class="col-xs-9 r-table-padding r-input">
                                                            <h4 class="r-inner-h4"><?php echo $record->about;  ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4"> الموضوع </h4>
                                                        </div>
                                                        <div class="col-xs-9 r-table-padding r-input">
                                                            <h4 class="r-inner-h4"><?php echo $record->content ?></h4>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12">
                                                    <table style="width:100%">
                                                        <h4 class="r-table-text text-left"> التوقيعات : </h4>
                                                        <tr>
                                                            <th>م</th>
                                                            <th>الاسم</th>
                                                            <th>الوظيفة</th>
                                                        </tr>

                                                        <?php
                                                        $sign=$signatures[$record->id];
                                                        $job=$get_job[$record->id];
                                                        $s=1;
                                                        for($x=0;$x<  sizeof($sign);$x++) {
                                                            echo' <tr>
                                                                            <td>  '.$s.' </td>
                                                                            <td> '.$sign[$x] .'</td>
                                                                            <td>'. $job[$x] .'</td>
                                                                        </tr>';
                                                            $s++; }  ?>
                                                    </table>
                                                </div>

                                                <div class="col-xs-12">
                                                    <table style="width:100%">
                                                        <h4 class="r-table-text text-left"> المرفقات : </h4>
                                                        <tr>
                                                            <th>م</th>
                                                            <th>الاسم</th>
                                                            <th>الوظيفة</th>
                                                        </tr>


                                                        <?php
                                                        $s=1;
                                                        $photo= $images[$record->id];
                                                        $tit=$title[$record->id];
                                                        for($x=0;$x<  sizeof($photo);$x++) {
                                                            $img = base_url('uploads/images').'/'.$photo[$x];

                                                            echo' <tr>

                                                                            <td>'.$s.'</td>
                                                                            <td>'.$tit[$x].'</td>
                                                                            
';
                                                            $s++;

                                                            echo '
                                                                            <td><img src="'.$img.'" width="50px" height="50px"></td></tr>
                                                                        ';
                                                        }
                                                        ?>

                                                    </table>
                                                </div>
                                            </div>
                                            <div id="donotprintdiv" class="col-sm-3">
                                                <div class="col-xs-12 r-password">
                                                    <div class="col-xs-12 r-table-btn">
                                                        <button class="btn  center-block"  onclick="javascript:printDiv('printablediv<?php echo $record->id  ?>')" type="submit">طباعة</button>




                                                    </div>
                                                    <div class="col-xs-12 r-table-btn">
                                                        <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div id="thumbwrap">
                                                            <a class="thumb" href="#"><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" width="40%"><span><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                $a++;
            endforeach;  ?>
        <?php endif; ?>
        </tbody>
    </table>
    <?php elseif ($_POST['search_type']==1): ?>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center"> م </th>
            <th class="text-center"> الجهة </th>

            <th class="text-center"> نوع المعاملة </th>
            <th class="text-center"> درجة الاهمية </th>

            <th class="text-center"> تاريخ الصادر </th>
            <th class="text-center"> تفاصيل </th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php if(isset($exports)&&$exports!=null): ?>

            <?php
            $a=1;

            foreach ($exports as $record ):  ?>
                <tr>
                    <td><?php echo $a  ?> </td>
                    <td> <?php
                        $this->db->select('*');
                        $this->db->from('office_setting');
                        $this->db->where('id',$record->organization_to_id_fk);
                        $query = $this->db->get();
                        $query->row_array();

                        echo $record->organization_to_id_fk;  ?> </td>

                    <td>  <?php echo $record->name;  ?> </td>
                    <td> <?php echo $record->importance_degree_id_fk; ?> </td>
                    <td> <?php echo $record->date;  ?> </td>
                    <td >
                        <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>


                        <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
                                <div id="modal-table-1"  class="center-block">
                                    <div class="details-resorce" >
                                        <div class="col-xs-12 r-inner-details">
                                            <div class="col-sm-9">
                                                <div class="col-xs-12">
                                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> تاريخ الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"> <?php echo $record->date;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> نوع الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">

                                                                    <?php if($record->export_type_id_fk==1){

                                                                        echo'داخلى'      ;

                                                                    }else{
                                                                        echo'خارجي';
                                                                    }  ?>


                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> نوع المعاملة </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->name;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4">  رقم القيد </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->registration_number;  ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> رقم الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">5</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> الجهه الصادر اليها   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">5</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> درجه الاهمية  </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->importance_degree_id_fk;  ?></h4>
                                                                <h4 class="r-inner-h4"><?php echo $record->importance_degree_other;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4">  طريقة لتسليم  </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->method_recived_id_fk;  ?></h4>
                                                                <h4 class="r-inner-h4"><?php echo $record->method_recived_other;  ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 inner-side r-data">
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4">عنوان الكتاب</h4>
                                                        </div>
                                                        <div class="col-xs-9 r-input r-table-padding">
                                                            <h4 class="r-inner-h4"><?php echo $record->title;  ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4">بشأن</h4>
                                                        </div>
                                                        <div class="col-xs-9 r-table-padding r-input">
                                                            <h4 class="r-inner-h4"><?php echo $record->about;  ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4"> الموضوع </h4>
                                                        </div>
                                                        <div class="col-xs-9 r-table-padding r-input">
                                                            <h4 class="r-inner-h4"><?php echo $record->content ?></h4>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12">
                                                    <table style="width:100%">
                                                        <h4 class="r-table-text text-left"> التوقيعات : </h4>
                                                        <tr>
                                                            <th>م</th>
                                                            <th>الاسم</th>
                                                            <th>الوظيفة</th>
                                                        </tr>

                                                        <?php
                                                        $sign=$signatures[$record->id];
                                                        $job=$get_job[$record->id];
                                                        $s=1;
                                                        for($x=0;$x<  sizeof($sign);$x++) {
                                                            echo' <tr>
                                                                            <td>  '.$s.' </td>
                                                                            <td> '.$sign[$x] .'</td>
                                                                            <td>'. $job[$x] .'</td>
                                                                        </tr>';
                                                            $s++; }  ?>
                                                    </table>
                                                </div>

                                                <div class="col-xs-12">
                                                    <table style="width:100%">
                                                        <h4 class="r-table-text text-left"> المرفقات : </h4>
                                                        <tr>
                                                            <th>م</th>
                                                            <th>الاسم</th>
                                                            <th>الوظيفة</th>
                                                        </tr>


                                                        <?php
                                                        $s=1;
                                                        $photo= $images[$record->id];
                                                        $tit=$title[$record->id];
                                                        for($x=0;$x<  sizeof($photo);$x++) {
                                                            $img = base_url('uploads/images').'/'.$photo[$x];

                                                            echo' <tr>

                                                                            <td>'.$s.'</td>
                                                                            <td>'.$tit[$x].'</td>
                                                                            
';
                                                            $s++;

                                                            echo '
                                                                            <td><img src="'.$img.'" width="50px" height="50px"></td></tr>
                                                                        ';
                                                        }
                                                        ?>

                                                    </table>
                                                </div>
                                            </div>
                                            <div id="donotprintdiv" class="col-sm-3">
                                                <div class="col-xs-12 r-password">
                                                    <div class="col-xs-12 r-table-btn">
                                                        <button class="btn  center-block"  onclick="javascript:printDiv('printablediv<?php echo $record->id  ?>')" type="submit">طباعة</button>




                                                    </div>
                                                    <div class="col-xs-12 r-table-btn">
                                                        <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div id="thumbwrap">
                                                            <a class="thumb" href="#"><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" width="40%"><span><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                $a++;
            endforeach;  ?>
        <?php endif; ?>


        <?php if(isset($exports)&&$exports!=null): ?>

            <?php
            $a=1;

            foreach ($exports as $record ):  ?>
                <tr>
                    <td><?php echo $a  ?> </td>
                    <td> <?php echo $record->organization_to_id_fk;  ?> </td>

                    <td>  <?php echo $record->name;  ?> </td>
                    <td> <?php echo $record->importance_degree_id_fk; ?> </td>
                    <td> <?php echo $record->date;  ?> </td>
                    <td >
                        <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>


                        <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
                                <div id="modal-table-1"  class="center-block">
                                    <div class="details-resorce" >
                                        <div class="col-xs-12 r-inner-details">
                                            <div class="col-sm-9">
                                                <div class="col-xs-12">
                                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> تاريخ الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"> <?php echo $record->date;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> نوع الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">

                                                                    <?php if($record->export_type_id_fk==1){

                                                                        echo'داخلى'      ;

                                                                    }else{
                                                                        echo'خارجي';
                                                                    }  ?>


                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> نوع المعاملة </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->name;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4">  رقم القيد </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->registration_number;  ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> رقم الصادر   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">5</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> الجهه الصادر اليها   </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4">5</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4"> درجه الاهمية  </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->importance_degree_id_fk;  ?></h4>
                                                                <h4 class="r-inner-h4"><?php echo $record->importance_degree_other;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table .col-xs-6">
                                                            <div class="col-xs-6 r-table-padding">
                                                                <h4 class="r-h4">  طريقة لتسليم  </h4>
                                                            </div>
                                                            <div class="col-xs-6 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->method_recived_id_fk;  ?></h4>
                                                                <h4 class="r-inner-h4"><?php echo $record->method_recived_other;  ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 inner-side r-data">
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4">عنوان الكتاب</h4>
                                                        </div>
                                                        <div class="col-xs-9 r-input r-table-padding">
                                                            <h4 class="r-inner-h4"><?php echo $record->title;  ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4">بشأن</h4>
                                                        </div>
                                                        <div class="col-xs-9 r-table-padding r-input">
                                                            <h4 class="r-inner-h4"><?php echo $record->about;  ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 r-pop-table">
                                                        <div class="col-xs-3 r-table-padding">
                                                            <h4 class="r-h4"> الموضوع </h4>
                                                        </div>
                                                        <div class="col-xs-9 r-table-padding r-input">
                                                            <h4 class="r-inner-h4"><?php echo $record->content ?></h4>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12">
                                                    <table style="width:100%">
                                                        <h4 class="r-table-text text-left"> التوقيعات : </h4>
                                                        <tr>
                                                            <th>م</th>
                                                            <th>الاسم</th>
                                                            <th>الوظيفة</th>
                                                        </tr>

                                                        <?php
                                                        $sign=$signatures[$record->id];
                                                        $job=$get_job[$record->id];
                                                        $s=1;
                                                        for($x=0;$x<  sizeof($sign);$x++) {
                                                            echo' <tr>
                                                                            <td>  '.$s.' </td>
                                                                            <td> '.$sign[$x] .'</td>
                                                                            <td>'. $job[$x] .'</td>
                                                                        </tr>';
                                                            $s++; }  ?>
                                                    </table>
                                                </div>

                                                <div class="col-xs-12">
                                                    <table style="width:100%">
                                                        <h4 class="r-table-text text-left"> المرفقات : </h4>
                                                        <tr>
                                                            <th>م</th>
                                                            <th>الاسم</th>
                                                            <th>الوظيفة</th>
                                                        </tr>


                                                        <?php
                                                        $s=1;
                                                        $photo= $images[$record->id];
                                                        $tit=$title[$record->id];
                                                        for($x=0;$x<  sizeof($photo);$x++) {
                                                            $img = base_url('uploads/images').'/'.$photo[$x];

                                                            echo' <tr>

                                                                            <td>'.$s.'</td>
                                                                            <td>'.$tit[$x].'</td>
                                                                            
';
                                                            $s++;

                                                            echo '
                                                                            <td><img src="'.$img.'" width="50px" height="50px"></td></tr>
                                                                        ';
                                                        }
                                                        ?>

                                                    </table>
                                                </div>
                                            </div>
                                            <div id="donotprintdiv" class="col-sm-3">
                                                <div class="col-xs-12 r-password">
                                                    <div class="col-xs-12 r-table-btn">
                                                        <button class="btn  center-block"  onclick="javascript:printDiv('printablediv<?php echo $record->id  ?>')" type="submit">طباعة</button>




                                                    </div>
                                                    <div class="col-xs-12 r-table-btn">
                                                        <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div id="thumbwrap">
                                                            <a class="thumb" href="#"><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" width="40%"><span><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                $a++;
            endforeach;  ?>
        <?php endif; ?>
        </tbody>
    </table>
<?php else: ?>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="text-center"> م </th>
                <th class="text-center"> الجهة </th>

                <th class="text-center"> نوع المعاملة </th>
                <th class="text-center"> درجة الاهمية </th>

                <th class="text-center"> تاريخ الصادر </th>
                <th class="text-center"> تفاصيل </th>
            </tr>
            </thead>
            <tbody class="text-center">
            <?php if(isset($imports)&&$imports!=null): ?>

                <?php
                $a=1;

                foreach ($imports as $record ):  ?>
                    <tr>
                        <td><?php echo $a  ?> </td>
                        <td> <?php
                            $this->db->select('*');
                            $this->db->from('office_setting');
                            $this->db->where('id',$record->organization_from_id_fk);
                            $query = $this->db->get();
                            $query->row_array();

                            echo $record->organization_from_id_fk;  ?> </td>

                        <td>  <?php echo $record->name;  ?> </td>
                        <td> <?php echo $record->importance_degree_id_fk; ?> </td>
                        <td> <?php echo $record->date;  ?> </td>
                        <td >
                            <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>


                            <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
                                    <div id="modal-table-1"  class="center-block">
                                        <div class="details-resorce" >
                                            <div class="col-xs-12 r-inner-details">
                                                <div class="col-sm-9">
                                                    <div class="col-xs-12">
                                                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> تاريخ الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"> <?php echo $record->date;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> نوع الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">

                                                                        <?php if($record->import_type_id_fk==1){

                                                                            echo'داخلى'      ;

                                                                        }else{
                                                                            echo'خارجي';
                                                                        }  ?>


                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> نوع المعاملة </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->name;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4">  رقم القيد </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->registration_number;  ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> رقم الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">5</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> الجهه الصادر اليها   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">5</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> درجه الاهمية  </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->importance_degree_id_fk;  ?></h4>
                                                                    <h4 class="r-inner-h4"><?php echo $record->importance_degree_other;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4">  طريقة لتسليم  </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->method_recived_id_fk;  ?></h4>
                                                                    <h4 class="r-inner-h4"><?php echo $record->method_recived_other;  ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4">عنوان الكتاب</h4>
                                                            </div>
                                                            <div class="col-xs-9 r-input r-table-padding">
                                                                <h4 class="r-inner-h4"><?php echo $record->title;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4">بشأن</h4>
                                                            </div>
                                                            <div class="col-xs-9 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->about;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4"> الموضوع </h4>
                                                            </div>
                                                            <div class="col-xs-9 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->content ?></h4>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-xs-12">
                                                        <table style="width:100%">
                                                            <h4 class="r-table-text text-left"> التوقيعات : </h4>
                                                            <tr>
                                                                <th>م</th>
                                                                <th>الاسم</th>
                                                                <th>الوظيفة</th>
                                                            </tr>

                                                            <?php
                                                            $sign=$signatures[$record->id];
                                                            $job=$get_job[$record->id];
                                                            $s=1;
                                                            for($x=0;$x<  sizeof($sign);$x++) {
                                                                echo' <tr>
                                                                            <td>  '.$s.' </td>
                                                                            <td> '.$sign[$x] .'</td>
                                                                            <td>'. $job[$x] .'</td>
                                                                        </tr>';
                                                                $s++; }  ?>
                                                        </table>
                                                    </div>

                                                    <div class="col-xs-12">
                                                        <table style="width:100%">
                                                            <h4 class="r-table-text text-left"> المرفقات : </h4>
                                                            <tr>
                                                                <th>م</th>
                                                                <th>الاسم</th>
                                                                <th>الوظيفة</th>
                                                            </tr>


                                                            <?php
                                                            $s=1;
                                                            $photo= $images[$record->id];
                                                            $tit=$title[$record->id];
                                                            for($x=0;$x<  sizeof($photo);$x++) {
                                                                $img = base_url('uploads/images').'/'.$photo[$x];

                                                                echo' <tr>

                                                                            <td>'.$s.'</td>
                                                                            <td>'.$tit[$x].'</td>
                                                                            
';
                                                                $s++;

                                                                echo '
                                                                            <td><img src="'.$img.'" width="50px" height="50px"></td></tr>
                                                                        ';
                                                            }
                                                            ?>

                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="donotprintdiv" class="col-sm-3">
                                                    <div class="col-xs-12 r-password">
                                                        <div class="col-xs-12 r-table-btn">
                                                            <button class="btn  center-block"  onclick="javascript:printDiv('printablediv<?php echo $record->id  ?>')" type="submit">طباعة</button>




                                                        </div>
                                                        <div class="col-xs-12 r-table-btn">
                                                            <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div id="thumbwrap">
                                                                <a class="thumb" href="#"><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" width="40%"><span><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $a++;
                endforeach;  ?>
            <?php endif; ?>


            <?php if(isset($exports)&&$exports!=null): ?>

                <?php
                $a=1;

                foreach ($exports as $record ):  ?>
                    <tr>
                        <td><?php echo $a  ?> </td>
                        <td> <?php echo $record->organization_to_id_fk;  ?> </td>

                        <td>  <?php echo $record->name;  ?> </td>
                        <td> <?php echo $record->importance_degree_id_fk; ?> </td>
                        <td> <?php echo $record->date;  ?> </td>
                        <td >
                            <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>


                            <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
                                    <div id="modal-table-1"  class="center-block">
                                        <div class="details-resorce" >
                                            <div class="col-xs-12 r-inner-details">
                                                <div class="col-sm-9">
                                                    <div class="col-xs-12">
                                                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> تاريخ الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"> <?php echo $record->date;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> نوع الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">

                                                                        <?php if($record->export_type_id_fk==1){

                                                                            echo'داخلى'      ;

                                                                        }else{
                                                                            echo'خارجي';
                                                                        }  ?>


                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> نوع المعاملة </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->name;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4">  رقم القيد </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->registration_number;  ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> رقم الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">5</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> الجهه الصادر اليها   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">5</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> درجه الاهمية  </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->importance_degree_id_fk;  ?></h4>
                                                                    <h4 class="r-inner-h4"><?php echo $record->importance_degree_other;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4">  طريقة لتسليم  </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->method_recived_id_fk;  ?></h4>
                                                                    <h4 class="r-inner-h4"><?php echo $record->method_recived_other;  ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4">عنوان الكتاب</h4>
                                                            </div>
                                                            <div class="col-xs-9 r-input r-table-padding">
                                                                <h4 class="r-inner-h4"><?php echo $record->title;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4">بشأن</h4>
                                                            </div>
                                                            <div class="col-xs-9 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->about;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4"> الموضوع </h4>
                                                            </div>
                                                            <div class="col-xs-9 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->content ?></h4>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-xs-12">
                                                        <table style="width:100%">
                                                            <h4 class="r-table-text text-left"> التوقيعات : </h4>
                                                            <tr>
                                                                <th>م</th>
                                                                <th>الاسم</th>
                                                                <th>الوظيفة</th>
                                                            </tr>

                                                            <?php
                                                            $sign=$signatures[$record->id];
                                                            $job=$get_job[$record->id];
                                                            $s=1;
                                                            for($x=0;$x<  sizeof($sign);$x++) {
                                                                echo' <tr>
                                                                            <td>  '.$s.' </td>
                                                                            <td> '.$sign[$x] .'</td>
                                                                            <td>'. $job[$x] .'</td>
                                                                        </tr>';
                                                                $s++; }  ?>
                                                        </table>
                                                    </div>

                                                    <div class="col-xs-12">
                                                        <table style="width:100%">
                                                            <h4 class="r-table-text text-left"> المرفقات : </h4>
                                                            <tr>
                                                                <th>م</th>
                                                                <th>الاسم</th>
                                                                <th>الوظيفة</th>
                                                            </tr>


                                                            <?php
                                                            $s=1;
                                                            $photo= $images[$record->id];
                                                            $tit=$title[$record->id];
                                                            for($x=0;$x<  sizeof($photo);$x++) {
                                                                $img = base_url('uploads/images').'/'.$photo[$x];

                                                                echo' <tr>

                                                                            <td>'.$s.'</td>
                                                                            <td>'.$tit[$x].'</td>
                                                                            
';
                                                                $s++;

                                                                echo '
                                                                            <td><img src="'.$img.'" width="50px" height="50px"></td></tr>
                                                                        ';
                                                            }
                                                            ?>

                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="donotprintdiv" class="col-sm-3">
                                                    <div class="col-xs-12 r-password">
                                                        <div class="col-xs-12 r-table-btn">
                                                            <button class="btn  center-block"  onclick="javascript:printDiv('printablediv<?php echo $record->id  ?>')" type="submit">طباعة</button>




                                                        </div>
                                                        <div class="col-xs-12 r-table-btn">
                                                            <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div id="thumbwrap">
                                                                <a class="thumb" href="#"><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" width="40%"><span><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $a++;
                endforeach;  ?>
            <?php endif; ?>
            </tbody>
        </table>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="text-center"> م </th>
                <th class="text-center"> الجهة </th>

                <th class="text-center"> نوع المعاملة </th>
                <th class="text-center"> درجة الاهمية </th>

                <th class="text-center"> تاريخ الصادر </th>
                <th class="text-center"> تفاصيل </th>
            </tr>
            </thead>
            <tbody class="text-center">
            <?php if(isset($exports)&&$exports!=null): ?>

                <?php
                $a=1;

                foreach ($exports as $record ):  ?>
                    <tr>
                        <td><?php echo $a  ?> </td>
                        <td> <?php
                            $this->db->select('*');
                            $this->db->from('office_setting');
                            $this->db->where('id',$record->organization_to_id_fk);
                            $query = $this->db->get();
                            $query->row_array();

                            echo $record->organization_to_id_fk;  ?> </td>

                        <td>  <?php echo $record->name;  ?> </td>
                        <td> <?php echo $record->importance_degree_id_fk; ?> </td>
                        <td> <?php echo $record->date;  ?> </td>
                        <td >
                            <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>


                            <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
                                    <div id="modal-table-1"  class="center-block">
                                        <div class="details-resorce" >
                                            <div class="col-xs-12 r-inner-details">
                                                <div class="col-sm-9">
                                                    <div class="col-xs-12">
                                                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> تاريخ الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"> <?php echo $record->date;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> نوع الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">

                                                                        <?php if($record->export_type_id_fk==1){

                                                                            echo'داخلى'      ;

                                                                        }else{
                                                                            echo'خارجي';
                                                                        }  ?>


                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> نوع المعاملة </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->name;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4">  رقم القيد </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->registration_number;  ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> رقم الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">5</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> الجهه الصادر اليها   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">5</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> درجه الاهمية  </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->importance_degree_id_fk;  ?></h4>
                                                                    <h4 class="r-inner-h4"><?php echo $record->importance_degree_other;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4">  طريقة لتسليم  </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->method_recived_id_fk;  ?></h4>
                                                                    <h4 class="r-inner-h4"><?php echo $record->method_recived_other;  ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4">عنوان الكتاب</h4>
                                                            </div>
                                                            <div class="col-xs-9 r-input r-table-padding">
                                                                <h4 class="r-inner-h4"><?php echo $record->title;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4">بشأن</h4>
                                                            </div>
                                                            <div class="col-xs-9 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->about;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4"> الموضوع </h4>
                                                            </div>
                                                            <div class="col-xs-9 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->content ?></h4>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-xs-12">
                                                        <table style="width:100%">
                                                            <h4 class="r-table-text text-left"> التوقيعات : </h4>
                                                            <tr>
                                                                <th>م</th>
                                                                <th>الاسم</th>
                                                                <th>الوظيفة</th>
                                                            </tr>

                                                            <?php
                                                            $sign=$signatures[$record->id];
                                                            $job=$get_job[$record->id];
                                                            $s=1;
                                                            for($x=0;$x<  sizeof($sign);$x++) {
                                                                echo' <tr>
                                                                            <td>  '.$s.' </td>
                                                                            <td> '.$sign[$x] .'</td>
                                                                            <td>'. $job[$x] .'</td>
                                                                        </tr>';
                                                                $s++; }  ?>
                                                        </table>
                                                    </div>

                                                    <div class="col-xs-12">
                                                        <table style="width:100%">
                                                            <h4 class="r-table-text text-left"> المرفقات : </h4>
                                                            <tr>
                                                                <th>م</th>
                                                                <th>الاسم</th>
                                                                <th>الوظيفة</th>
                                                            </tr>


                                                            <?php
                                                            $s=1;
                                                            $photo= $images[$record->id];
                                                            $tit=$title[$record->id];
                                                            for($x=0;$x<  sizeof($photo);$x++) {
                                                                $img = base_url('uploads/images').'/'.$photo[$x];

                                                                echo' <tr>

                                                                            <td>'.$s.'</td>
                                                                            <td>'.$tit[$x].'</td>
                                                                            
';
                                                                $s++;

                                                                echo '
                                                                            <td><img src="'.$img.'" width="50px" height="50px"></td></tr>
                                                                        ';
                                                            }
                                                            ?>

                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="donotprintdiv" class="col-sm-3">
                                                    <div class="col-xs-12 r-password">
                                                        <div class="col-xs-12 r-table-btn">
                                                            <button class="btn  center-block"  onclick="javascript:printDiv('printablediv<?php echo $record->id  ?>')" type="submit">طباعة</button>




                                                        </div>
                                                        <div class="col-xs-12 r-table-btn">
                                                            <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div id="thumbwrap">
                                                                <a class="thumb" href="#"><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" width="40%"><span><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $a++;
                endforeach;  ?>
            <?php endif; ?>


            <?php if(isset($exports)&&$exports!=null): ?>

                <?php
                $a=1;

                foreach ($exports as $record ):  ?>
                    <tr>
                        <td><?php echo $a  ?> </td>
                        <td> <?php echo $record->organization_to_id_fk;  ?> </td>

                        <td>  <?php echo $record->name;  ?> </td>
                        <td> <?php echo $record->importance_degree_id_fk; ?> </td>
                        <td> <?php echo $record->date;  ?> </td>
                        <td >
                            <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>


                            <div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
                                    <div id="modal-table-1"  class="center-block">
                                        <div class="details-resorce" >
                                            <div class="col-xs-12 r-inner-details">
                                                <div class="col-sm-9">
                                                    <div class="col-xs-12">
                                                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> تاريخ الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"> <?php echo $record->date;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> نوع الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">

                                                                        <?php if($record->export_type_id_fk==1){

                                                                            echo'داخلى'      ;

                                                                        }else{
                                                                            echo'خارجي';
                                                                        }  ?>


                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> نوع المعاملة </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->name;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4">  رقم القيد </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->registration_number;  ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> رقم الصادر   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">5</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> الجهه الصادر اليها   </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4">5</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4"> درجه الاهمية  </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->importance_degree_id_fk;  ?></h4>
                                                                    <h4 class="r-inner-h4"><?php echo $record->importance_degree_other;  ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                <div class="col-xs-6 r-table-padding">
                                                                    <h4 class="r-h4">  طريقة لتسليم  </h4>
                                                                </div>
                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                    <h4 class="r-inner-h4"><?php echo $record->method_recived_id_fk;  ?></h4>
                                                                    <h4 class="r-inner-h4"><?php echo $record->method_recived_other;  ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 inner-side r-data">
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4">عنوان الكتاب</h4>
                                                            </div>
                                                            <div class="col-xs-9 r-input r-table-padding">
                                                                <h4 class="r-inner-h4"><?php echo $record->title;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4">بشأن</h4>
                                                            </div>
                                                            <div class="col-xs-9 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->about;  ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 r-pop-table">
                                                            <div class="col-xs-3 r-table-padding">
                                                                <h4 class="r-h4"> الموضوع </h4>
                                                            </div>
                                                            <div class="col-xs-9 r-table-padding r-input">
                                                                <h4 class="r-inner-h4"><?php echo $record->content ?></h4>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-xs-12">
                                                        <table style="width:100%">
                                                            <h4 class="r-table-text text-left"> التوقيعات : </h4>
                                                            <tr>
                                                                <th>م</th>
                                                                <th>الاسم</th>
                                                                <th>الوظيفة</th>
                                                            </tr>

                                                            <?php
                                                            $sign=$signatures[$record->id];
                                                            $job=$get_job[$record->id];
                                                            $s=1;
                                                            for($x=0;$x<  sizeof($sign);$x++) {
                                                                echo' <tr>
                                                                            <td>  '.$s.' </td>
                                                                            <td> '.$sign[$x] .'</td>
                                                                            <td>'. $job[$x] .'</td>
                                                                        </tr>';
                                                                $s++; }  ?>
                                                        </table>
                                                    </div>

                                                    <div class="col-xs-12">
                                                        <table style="width:100%">
                                                            <h4 class="r-table-text text-left"> المرفقات : </h4>
                                                            <tr>
                                                                <th>م</th>
                                                                <th>الاسم</th>
                                                                <th>الوظيفة</th>
                                                            </tr>


                                                            <?php
                                                            $s=1;
                                                            $photo= $images[$record->id];
                                                            $tit=$title[$record->id];
                                                            for($x=0;$x<  sizeof($photo);$x++) {
                                                                $img = base_url('uploads/images').'/'.$photo[$x];

                                                                echo' <tr>

                                                                            <td>'.$s.'</td>
                                                                            <td>'.$tit[$x].'</td>
                                                                            
';
                                                                $s++;

                                                                echo '
                                                                            <td><img src="'.$img.'" width="50px" height="50px"></td></tr>
                                                                        ';
                                                            }
                                                            ?>

                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="donotprintdiv" class="col-sm-3">
                                                    <div class="col-xs-12 r-password">
                                                        <div class="col-xs-12 r-table-btn">
                                                            <button class="btn  center-block"  onclick="javascript:printDiv('printablediv<?php echo $record->id  ?>')" type="submit">طباعة</button>




                                                        </div>
                                                        <div class="col-xs-12 r-table-btn">
                                                            <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div id="thumbwrap">
                                                                <a class="thumb" href="#"><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" width="40%"><span><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $a++;
                endforeach;  ?>
            <?php endif; ?>
            </tbody>
        </table>

    <?php endif; ?>

<?php endif?>


    <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML =
                "<html><head><title></title></head><body>" +
                divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;


        }
    </script>
<?php
/*$this->load->view('admin/requires/footer');*/
?>