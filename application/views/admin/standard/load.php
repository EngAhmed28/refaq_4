<?php
if(isset($_POST['product_id']))
    echo '<input type="text" class="r-inner-h4" value="'.$units[$product[0]->p_unit_fk]->unit_name.'" name="unite" id="unite" readonly />';die;
?>
