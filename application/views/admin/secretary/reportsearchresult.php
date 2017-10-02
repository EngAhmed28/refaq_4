<?php /*$this->load->view('admin/requires/header');
$this->load->view('admin/requires/sidebar');*/?>
<?php if(!$query):?>
    <?php echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لاتوجد نتائج مطابقة لهذا البحث
</div>'?>
<?php else :?>

    <div id="sample_1" class="table table-bordered table-hover table-striped" cellspacing="0"   style="margin-right: 6px; direction:rtl;" >
            <div  class="col-xs-12 r-secret-table">
                <div class="panel-body">
                    <div class="fade in active">
                        <table id="sample_1" class="table table-bordered" role="table">
                            <thead>
                            <tr>

                           <?php
                           if($_POST['search_type']==2){
                               echo'<th class="text-center" > عدد الوارد </th>';
                           }elseif($_POST['search_type']==1){
                               echo'<th class="text-center"> عدد الصادر </th>';
                           }else{
                               echo'<th class="text-center"> عدد الصادر </th>';

                               echo'<th class="text-center"> عدد الوارد </th>';
                           }

                           ?>

                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <tr>

                                <?php
                                if($_POST['search_type']==2){

                                    echo' <td> '.  count($query) .'</td>';

                                }elseif($_POST['search_type']==1){

                                    echo' <td> '.  count($query) .'</td>';

                                }else{
                                    echo' <td> '.  count($exports) .'</td>';

                                    echo' <td> '.  count($imports) .'</td>';

                                }
                                ?>


                                
                            </tr>
                            </tbody>
                        </table>


                        <table id="sample_1" class="table table-bordered" role="table">
                            <thead>
                            <tr>
                                <?php
                                if($_POST['search_type']==2) {

                                    echo '<th class="text-center"> م </th>';

                                    echo '<th class="text-center"> اسم الجهة </th>';

                                    echo '<th class="text-center"> عدد الوارد </th>';
                                }elseif($_POST['search_type']==1) {

                                    echo '<th class="text-center"> م </th>';

                                    echo '<th class="text-center"> اسم الجهة </th>';

                                    echo '<th class="text-center"> عدد الصادر </th>';


                                }else{
                                    echo '<th class="text-center"> م </th>';

                                    echo '<th class="text-center"> اسم الجهة </th>';

                                    echo '<th class="text-center"> عدد الصادر </th>';

                                    echo '<th class="text-center"> عدد الوارد </th>';

                                }

                                ?>

                            </tr>
                            </thead>
                            <tbody class="text-center">


                                <?php
                                $a=1;
                                if($_POST['search_type']==2) {
                               if(isset($orgnize)&&$orgnize!=null){

                                foreach ($orgnize as $org => $value) {
                                        echo '<tr> <td> ' . $a . '</td>';

                                        echo ' <td> ' . $org . '</td>';


                                        echo ' <td> ' . $value . '</td></tr>';
                                        $a++;
                                    }}
                                }elseif($_POST['search_type']==1) {

                                if(isset($orgnize_ex)&&$orgnize_ex!=null) {

                                    foreach ($orgnize_ex as $org => $value) {
                                        echo '<tr> <td> ' . $a . '</td>';

                                        echo ' <td> ' . $org . '</td>';


                                        echo ' <td> ' . $value . '</td></tr>';
                                        $a++;


                                    }
                                }
                                }else{
                                if(isset($orgnize_ex)&&$orgnize_ex!=null) {

                                    foreach ($orgnize_ex as  $org => $value) {

                                        echo '<tr> <td> ' . $a . '</td>';

                                        echo ' <td> ' . $org . '</td>';

                                            echo ' <td> ' . $value . '</td>';
                                        if(isset($orgnize)&&$orgnize!=null) {

                                            foreach ($orgnize as $org => $value) {

                                                echo ' <td> ' . count($value) . '</td></tr>';
                                                $a++;
                                            }
                                        }
                                        }

                                        }


                                }
                                ?>
                            </tbody>
                        </table>

                        <?php if($_POST['search_type']==2): ?>
                            <h1>الوارد</h1>

                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="text-center"> م </th>
                                <th class="text-center"> تاريخ الوارد </th>
                                <th class="text-center"> نوع المعاملة </th>
                                <th class="text-center"> تفاصيل </th>
                            </tr>
                            </thead>
                            <tbody class="text-center">

                            <?php if(isset($import)&&$import!=null):?>

                                <?php
                                $a=1;

                                foreach ($import as $record ): ?>
                                    <tr>
                                        <td><?php echo $a ?> </td>
                                        <td> <?php echo $record->date; ?> </td>
                                        <td>  <?php echo $record->name; ?> </td>
                                        <td>
                                            <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>" > عرض</button>

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
                                                                                    <h4 class="r-h4"> تاريخ الوارد   </h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"> <?php echo $record->date; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> نوع الوارد   </h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4">

                                                                                        <?php if($record->import_type_id_fk==1){

                                                                                            echo'داخلى'      ;

                                                                                        }else{
                                                                                            echo'خارجي';
                                                                                        } ?>


                                                                                    </h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> نوع المعاملة </h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $record->name; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4">  رقم القيد </h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $record->registration_number; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> رقم الوارد   </h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4">5</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4"> الجهه الوارد اليها   </h4>
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
                                                                                    <h4 class="r-inner-h4"><?php echo $record->importance_degree_id_fk; ?></h4>
                                                                                    <h4 class="r-inner-h4"><?php echo $record->importance_degree_other; ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                                <div class="col-xs-6 r-table-padding">
                                                                                    <h4 class="r-h4">  طريقة لتسليم  </h4>
                                                                                </div>
                                                                                <div class="col-xs-6 r-table-padding r-input">
                                                                                    <h4 class="r-inner-h4"><?php echo $record->method_recived_id_fk; ?></h4>
                                                                                    <h4 class="r-inner-h4"><?php echo $record->method_recived_other; ?></h4>
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
                                                                                <h4 class="r-inner-h4"><?php echo $record->title; ?></h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 r-pop-table">
                                                                            <div class="col-xs-3 r-table-padding">
                                                                                <h4 class="r-h4">بشأن</h4>
                                                                            </div>
                                                                            <div class="col-xs-9 r-table-padding r-input">
                                                                                <h4 class="r-inner-h4"><?php echo $record->about; ?></h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 r-pop-table">
                                                                            <div class="col-xs-3 r-table-padding">
                                                                                <h4 class="r-h4"> الموضوع </h4>
                                                                            </div>
                                                                            <div class="col-xs-9 r-table-padding r-input">
                                                                                <h4 class="r-inner-h4"><?php echo $record->content?></h4>
                                                                            </div>
                                                                        </div>

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
                                                                            <button class="btn  center-block"  onclick="javascript:printDiv('printablediv<?php echo $record->id ?>')" type="submit">طباعة</button>




                                                                        </div>
                                                                        <div class="col-xs-12 r-table-btn">
                                                                            <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
                                                                        </div>
                                                                        <div class="col-xs-12">
                                                                            <div id="thumbwrap">
                                                                                <a class="thumb" href="#"><img src="<?php echo base_url() ?>asisst/admin_asset/img/unnamed.png" alt="" width="40%"><span><img src="<?php echo base_url() ?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block"></span></a>
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
                            <h1>الصادر</h1>

                           <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="text-center"> م </th>
                                <th class="text-center"> تاريخ الصادر </th>
                                <th class="text-center"> نوع المعاملة </th>
                                <th class="text-center"> تفاصيل </th>
                            </tr>
                            </thead>
                            <tbody class="text-center">

                            <?php if(isset($export)&&$export!=null):?>

                                <?php
                             $a=1;

                                foreach ($export as $record ):  ?>
                                    <tr>
                                        <td><?php echo $a  ?> </td>
                                        <td> <?php echo $record->date;  ?> </td>
                                        <td>  <?php echo $record->name;  ?> </td>
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
                                                                          $sign=$signatures_ex[$record->id];
                                                                            $job=$get_job_ex[$record->id];
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
                                                                            $photo= $images_ex[$record->id];
                                                                            $tit=$title_ex[$record->id];
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
                                endforeach;   ?>
                            <?php endif;  ?>
                            </tbody>
                        </table>
                      <?php else: ?>
                            <h1>الوارد</h1>
                         <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center"> م </th>
                                    <th class="text-center"> تاريخ الوارد </th>
                                    <th class="text-center"> نوع المعاملة </th>
                                    <th class="text-center"> تفاصيل </th>
                                </tr>
                                </thead>
                                <tbody class="text-center">

                                <?php if(isset($import)&&$import!=null): ?>

                                    <?php
                                   $a=1;

                                    foreach ($import as $record ):  ?>
                                        <tr>
                                            <td><?php echo $a  ?> </td>
                                            <td> <?php echo $record->date;  ?> </td>
                                            <td>  <?php echo $record->name;  ?> </td>
                                            <td>
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
                                                                                        <h4 class="r-h4"> تاريخ الوارد   </h4>
                                                                                    </div>
                                                                                    <div class="col-xs-6 r-table-padding r-input">
                                                                                        <h4 class="r-inner-h4"> <?php echo $record->date;  ?></h4>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xs-12 r-pop-table">
                                                                                    <div class="col-xs-6 r-table-padding">
                                                                                        <h4 class="r-h4"> نوع الوارد   </h4>
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
                                                                                        <h4 class="r-h4"> رقم الوارد   </h4>
                                                                                    </div>
                                                                                    <div class="col-xs-6 r-table-padding r-input">
                                                                                        <h4 class="r-inner-h4">5</h4>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xs-12 r-pop-table .col-xs-6">
                                                                                    <div class="col-xs-6 r-table-padding">
                                                                                        <h4 class="r-h4"> الجهه الوارد اليها   </h4>
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
                                    endforeach;   ?>
                                <?php endif;  ?>

                                </tbody>
                            </table>
                        <h1>الصادر</h1>

                           <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center"> م </th>
                                    <th class="text-center"> تاريخ الصادر </th>
                                    <th class="text-center"> نوع المعاملة </th>
                                    <th class="text-center"> تفاصيل </th>
                                </tr>
                                </thead>
                                <tbody class="text-center">

                                <?php if(isset($export)&&$export!=null): ?>

                                    <?php
                                   $a=1;

                                    foreach ($export as $record ):  ?>
                                        <tr>
                                            <td><?php echo $a  ?> </td>
                                            <td> <?php echo $record->date;  ?> </td>
                                            <td>  <?php echo $record->name;  ?> </td>
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


                    </div>
                </div>
            </div>
        </div>


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