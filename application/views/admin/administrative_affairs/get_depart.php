<?php

if(!empty($_POST['admin_num'])):?>

    <div class="col-xs-12" id="optionearea1">
        <div class="col-xs-6">
            <h4 class="r-h4"> القسم </h4>
        </div>
        <div class="col-xs-6 r-input">
            <select  name="department">
                <option value="">إختر</option>
                <?php if(!empty($admin)):
                    foreach ($departs[$_POST['admin_num']] as $record):?>
                        <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                    <?php  endforeach; endif;?>
            </select>
        </div>
    </div>


<? endif;?>
