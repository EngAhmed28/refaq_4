

<option value="">إختر</option>
<?php if(!empty($recordess)):
    foreach ($recordess as $record):?>
        <option value="<? echo $record->id;?>"><? echo $record->unit_name;?></option>
    <?php  endforeach; endif;?>
