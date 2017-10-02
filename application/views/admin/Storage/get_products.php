

    <option value="">إختر</option>
    <?php if(!empty($recordes)):
        foreach ($recordes as $record):?>
            <option value="<? echo $record->id;?>"><? echo $record->p_name;?></option>
        <?php  endforeach; endif;?>
