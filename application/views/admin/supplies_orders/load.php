<?php
if(isset($_POST['store_id'])){
    echo '<option value="">--قم بالإختيار--</option>';
    if(isset($recordes1))
        for($x = 0 ; $x < count($recordes1) ; $x++)
            echo '<option value="'.$recordes1[$x]->id.'">'.$recordes1[$x]->p_name.'</option>';die;
}
if(isset($_POST['products_id'])){
    echo '<option value="">--قم بالإختيار--</option>';
    if(isset($recordes2))
        for($x = 0 ; $x < count($recordes2) ; $x++)
            echo '<option value="'.$recordes2[$x]->id.'">'.$recordes2[$x]->unit_name.'</option>';die;
}
?>
