<?php

/*echo'<pre>';
var_dump($result);
echo'</pre>';
die;*/
$num = $_POST['num'];
if($num + sizeof($result) >10){
    echo '<div class="alert alert-danger" >
              أقصى عدد 10
    </div>';

}
elseif($num + sizeof($result)<=10)
{
    ?>
    <table class="table table-bordered" id="tab_logic">
        <thead>
        <th>م</th>
        <th style="text-align: center">نوع الجهاز</th>
        <th style="text-align: center">العدد</th>
        <th style="text-align: center">حالة الجهاز</th>
        <th style="text-align: center" >ملاحظات</th>
        <th style="text-align: center">الإجراء</th>
        </thead>
        <?  $x=1;  for($i=0;$i<sizeof($result);$i++){?>
        <tbody>
        <tr >
            <td><? echo $x; ?></td>

            <?

            $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;

            ?>
            <td> <select class="no-padding " style="width: 100%;" name="d_house_device_id_fk<? echo $x;?>" id="try<? echo $x;?>">
                    <?foreach ($devices as $device):
                        $select='' ;
                        if($result[$i]->d_house_device_id_fk == $device->id){
                            $select='selected' ;
                        }
                        ?>
                        <option value="<? echo $device->id;?>" <? echo $select; ?>><? echo $device->title;?> </option>
                    <? endforeach;?>
                </select></td>
            <td> <select class="no-padding " style="width: 100%;" name="d_count<? echo $x;?>" id="try<? echo $x;?>">
                    <option>اختر</option>
                    <? for ($d=1;$d<10;$d++):

                        $select='' ;
                        if($result[$i]->d_count == $d){
                            $select='selected' ;
                        }
                        ?>
                        <option value="<? echo $d; ?>" <? echo $select;?>><? echo $d;?></option>
                    <? endfor;?>
                </select></td>
            <td> <select class="no-padding " style="width: 100%;" name="d_house_device_status_id_fk<? echo $x;?>" id="try<? echo $x;?>">
                    <? foreach ($house_device_status as $k=>$v):

                        $select='' ;
                        if($result[$i]->d_house_device_status_id_fk == $k){
                            $select='selected' ;
                        }

                        ?>
                        <option value="<? echo $k;?>" <? echo $select ;?>><? echo  $v;?></option>
                    <? endforeach;?>
                </select></td>
            <td> <input type="text" name='d_note<? echo $x;?>' placeholder='' value="<? echo $result[$i]->d_note ;?>" style="width: 100%;" id="try<? echo $x;?>" class="form-control" /></td>
            <td>
                <a href="<?php echo base_url()?>dashboard/delete_device/devices/update_devices/<?  echo $result[$i]->id ;?>"><i   style="margin-right: 20px" class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>            </td>
        </tr>
         <input type="hidden" name="type<? echo $x;?>" value="edit"/>
        <input type="hidden" name="id<? echo $x;?>" value="<? echo $result[$i]->id ;?>"/>
        <input type="hidden" name="max_edit" value="<? echo sizeof($result);?>"/>
        <?  $x++; }?>
    <?    for($a=1;$a<=$num;$a++){?>
        <tr >
            <td id="number"><? echo $x; ?></td>

            <?

            $house_device_id_array=array('إختر','ثلاجة','مكيف','غسالة','فرن','برادة','تلفزيون','سيارة خاصة','حاسب ألى','بلاى ستيشن','جوالات');

            $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;

            ?>
            <td> <select class="no-padding " style="width: 100%;" name="d_house_device_id_fk<? echo $x;?>" id="try<? echo $x;?>">
                    <? foreach ($house_device_id_array as $k=>$v):?>
                        <option value="<? echo $k;?>"><? echo  $v;?></option>
                    <? endforeach;?>
                </select></td>
            <td> <select class="no-padding " style="width: 100%;" name="d_count<? echo $x;?>" id="try<? echo $x;?>">
                    <option>اختر</option>
                    <? for ($d=1;$d<10;$d++):?>
                        <option value="<? echo $d; ?>"><? echo $d;?></option>
                    <? endfor;?>
                </select></td>
            <td> <select class="no-padding " style="width: 100%;" name="d_house_device_status_id_fk<? echo $x;?>" id="try<? echo $x;?>">
                    <? foreach ($house_device_status as $k=>$v):?>
                        <option value="<? echo $k;?>"><? echo  $v;?></option>
                    <? endforeach;?>
                </select></td>
            <td> <input type="text" name='d_note<? echo $x;?>' placeholder='' style="width: 100%;" id="try<? echo $x;?>" class="form-control" /></td>
            <td>
                <i style="margin-right: 20px" class="fa fa-trash-o fa-2x" onclick="myFunction(this)" aria-hidden="true"></i>
            </td>
        </tr>

        <script>
            function myFunction(o) {
                var p=o.parentNode.parentNode;
                p.parentNode.removeChild(p);

            }
        </script>
        <input type="hidden" name="type<? echo $x;?>" value="insert"/>
        <input type="hidden" name="max_insert" value="<? echo $num; ?>"/>
        <input type="hidden" name="max" value="<? echo  sizeof($result); ?>"/>
    <?   $x++; }?>
        </tbody>

    </table>
<?}?>