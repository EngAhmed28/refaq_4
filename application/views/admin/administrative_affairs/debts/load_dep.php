<?php if(!empty($dep) && $dep !=null && isset($dep)):
    ?>
    <option value="">إختر</option>
    <?php  foreach ($dep as $record):?>
    <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
<?php  endforeach;
else:?>

    <option value="">لا يوجد أقسام</option>
<?php   endif;?>