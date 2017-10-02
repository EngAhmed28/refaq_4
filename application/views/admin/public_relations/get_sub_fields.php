<?php
if(isset($_POST['main']) && $_POST['main'] != null){
?>
<select name="sub_field_id" id="sub_field_id" class="no-padding form-control" data-show-subtext="true" data-live-search="true" required>
    <option value="">--قم بإختيار المجال الفرعي--</option>
    <?php
    if(isset($subs) && $subs != null)
        foreach($subs as $sub)
            echo '<option value="'.$sub->id.'">'.$sub->sub_field_name.'</option>';
    ?>
</select>
<?php
}
if(isset($_POST['num']) && $_POST['num'] != null){
    if($_POST['num'] != 0 && $_POST['num'] <= 6)
    {
        for($x = 0 ; $x < $_POST['num'] ; $x++)
        {
            echo '<div class="col-xs-3">
                    <h4 class="r-h4">تفاصيل المقطع رقم '.($x+1).':</h4>
                  </div>
                            
                  <div class="col-xs-9">
                    <textarea class="r-textarea" name="title'.$x.'" id="title'.$x.'" required></textarea>
                  </div>';
        }
    }
    else
        echo '<div class="alert alert-danger" > أقصى عدد 6 </div>';
} 
?>