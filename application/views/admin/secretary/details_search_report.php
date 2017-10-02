<?php if(isset($search) && $search!=null):?>

<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center"> م </th>
            <th class="text-center"> النوع</th>
            <th class="text-center"> الجهة  </th>
            <th class="text-center"> نوع المعاملة </th>
            <th class="text-center"> درجة الاهمية </th>
            <th class="text-center"> التاريخ</th>
            <th class="text-center"> تفاصيل </th>
        </tr>
        </thead>
        <tbody class="text-center">
<?php $a=1;foreach ($search as $record ):  ?>
 <tr>
     <?php if(isset($record->organization_to_id_fk) && $record->organization_to_id_fk !=null ):
                  $out_put=$record->organization_to_id_fk;$out_type='صادر';endif;
                  if(isset($record->organization_from_id_fk) && $record->organization_from_id_fk !=null):
                  $out_put=$record->organization_from_id_fk;$out_type='وارد';endif;?>
       <td><?php echo $a++  ?> </td>
       <td><?php echo $out_type; ?></td>
       <td><?php if(isset($office_setting[$out_put]) && $office_setting[$out_put] !=null){
                 echo $office_setting[$out_put]->name;}else{echo '--';}   ?> </td>
       <td><?php if(isset($office_setting[$record->transaction_id_fk]) && $office_setting[$record->transaction_id_fk] !=null){
                 echo $office_setting[$record->transaction_id_fk]->name;}else{echo '--';} ?> </td>
       <td><?php echo $record->importance_degree_id_fk  ?> </td>
       <td><?php echo $record->date  ?> </td>
       <td> <button class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id.$record->date_s;  ?>" > عرض</button> </td> 
  </tr>  
<!--------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id.$record->date_s; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
<div id="modal-table-1"  class="center-block">
<div class="details-resorce" >
<div class="col-xs-12 r-inner-details">
<div class="col-sm-9">
    <div class="col-xs-12">
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12 r-pop-table">
                <div class="col-xs-6 r-table-padding">
                <?php 
                 if(isset($record->import_type_id_fk)):
                        $check_out=$record->import_type_id_fk;
                        $word='الوارد';
                        //$segmant_out=$signatures_in[$record->id];
                        //$attach_out=$attachment_in[$record->id];
                elseif(isset($record->export_type_id_fk)): 
                        $check_out=$record->export_type_id_fk;  
                        $word='الصادر';
                       // $segmant_out=$signatures_ex[$record->id]; 
                       // $attach_out=$attachment_ex[$record->id];
                endif;
                
                ?>
                
                    <h4 class="r-h4"> تاريخ <?php echo $word  ?>   </h4>
                </div>
                <div class="col-xs-6 r-table-padding r-input">
                    <h4 class="r-inner-h4"> <?php echo $record->date;  ?></h4>
                </div>
            </div>
            <div class="col-xs-12 r-pop-table">
                <div class="col-xs-6 r-table-padding">
                    <h4 class="r-h4"> نوع <?php echo $word  ?>    </h4>
                </div>
                <div class="col-xs-6 r-table-padding r-input">
                    <h4 class="r-inner-h4">
                        <?php if($check_out==1){
                            echo'داخلى'      ;
                          }else{
                            echo'خارجي';
                          }?>
                    </h4>
                </div>
            </div>
            <div class="col-xs-12 r-pop-table">
                <div class="col-xs-6 r-table-padding">
                    <h4 class="r-h4"> نوع المعاملة </h4>
                </div>
                <div class="col-xs-6 r-table-padding r-input">
                    <h4 class="r-inner-h4"><?php if(isset($office_setting[$record->transaction_id_fk]) && $office_setting[$record->transaction_id_fk] !=null){
                 echo $office_setting[$record->transaction_id_fk]->name;}else{echo '--';} ?> </h4>
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
                    <h4 class="r-h4"> رقم <?php echo $word  ?>    </h4>
                </div>
                <div class="col-xs-6 r-table-padding r-input">
                    <h4 class="r-inner-h4">5</h4>
                </div>
            </div>
            <div class="col-xs-12 r-pop-table .col-xs-6">
                <div class="col-xs-6 r-table-padding">
                    <h4 class="r-h4"> الجهه <?php echo $word  ?>  اليها   </h4>
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
                <textarea disabled=""><?php echo strip_tags( $record->content) ?></textarea>
            </div>
        </div>













    </div>
    
</div>
<div id="donotprintdiv" class="col-sm-3">
    <div class="col-xs-12 r-password">
        <div class="col-xs-12 r-table-btn">
            <button class="btn  center-block"  onclick="javascript:printDiv('printablediv<?php echo $record->id  ?>')" type="submit">طباعة</button>
        </div>
        
        <div class="col-xs-12 r-top">
            <button class="btn  center-block" type="submit"> <a href=""  data-dismiss="modal" class="x">اغلاق</a> </button>
        </div>
        <div class="col-xs-12">
            <div id="thumbwrap">
                <a class="thumb" href="#"><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" width="40%"><span><img src="<?php echo base_url()  ?>asisst/admin_asset/img/unnamed.png" alt="" class="center-block"></span></a>
            </div>
        </div>
    </div>
</div>

 





<!---------------------------------------->
</div>
</div>
</div>
</div>
</div> 
<!--------------------------------------------------------------------------------------------------------------------------->                    
<?php endforeach?>
</tbody></table>
<?php else:?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لاتوجد نتائج مطابقة لهذا البحث
</div>
<?php endif;?>