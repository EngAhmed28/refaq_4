<?php
$main = $_POST['valu'];
if(!empty($sub_service[$main])):
if(sizeof($sub_service[$main]) >0){   ?>
    <div class="col-xs-12 r-password" >
        <div class="col-xs-5">
            <h5 class="r-password"> نوع الخدمة </h5>
        </div>
        <div class="col-xs-7">
            <select required  name="sub_service" id="sub_service">
                <option value=""> - اختر - </option>

                <? foreach ($sub_service[$main] as $sub):?>
                <option value="<? echo $sub->id;?>"><? echo $sub->sub_service_name;?></option>
               <? endforeach;?>
            </select>
        </div>
    </div>

<?}else{  return;
    ?>

<?}

    endif;?>