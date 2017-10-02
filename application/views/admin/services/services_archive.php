<div class="col-sm-11 col-xs-12">
        <!--main tabs -->
              	<?php $this->load->view('admin/family/main_tabs'); ?>
         
                <!--main tabs -->

    <div class="details-resorce">
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">فئة الخدمة</h4>
                </div>
                <div class="col-xs-6 ">
                    <select name="service_id" id="service_id" onchange="return sent($('#service_id').val());">
                       <? if(!empty($all)): foreach ($all as $k=>$v):
                           if( $k == "1") $v="الكل";
                           ?>
                        <option value="<? echo $k;?>"><? echo $v; ?></option>
                       <? endforeach; endif;?>

                   </select>
                </div>
            </div>
        </div>
        </div>
            <div  id="optionearea2">
                <? if (!empty($all_operations)):?>
                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الطلب </th>
                        <th class="text-center">   إسم الأم</th>
                        <th class="text-center">فئة الخدمة</th>
                        <th class="text-center">نوع الخدمة</th>
                        <th class="text-center">حالة الخدمة</th>
                        <th class="text-center">عرض</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?
                    foreach ($all_operations as $record):
                        if($record->process==1){
                            $condition ='موافقة' ;
                        }elseif ($record->process==2){
                            $condition ='رفض' ;
                        }elseif ($record->process==3){
                            $condition ='الإطلاع' ;
                        }elseif ($record->process==4){
                            $condition ='تم الإعتماد' ;
                        }elseif ($record->process==5){
                            $condition ='التنفيذ' ;
                        }
                        ?>

                        <tr>
                            <td><? echo $record->id;?></td>
                            <td><? echo $record->order_id_fk;?></td>
                            <td><? echo $record->mother_national_num_fk;?></td>
                            <td><? if(!empty($service_type[$record->order_id_fk])): echo $all[$service_type[$record->order_id_fk][0]->service_id_fk]; endif;?></td>
                            <td>مستحقة</td>
                            <td><? echo $condition;?></td>
                            <td><a href="<?php echo base_url()?>family/certified_services_details/<? echo $record->order_id_fk;?>"<i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                        </tr>
                    <?     endforeach;?>

                    </tbody>
                </table>
                    <?else:?>
                    <div class="col-xs-12 alert alert-danger" >لا توجد سجلات للعرض</div>
                <? endif;?>
            </div>
   </div>

</div>

<!--------------------------------------------------->
<script>
    function sent(valu)
    {
        if(valu)
        {
            var dataString = 'valu=' + valu;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/family/services_archive',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea2').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea2').html('');
            return false;
        }

    }
</script>
