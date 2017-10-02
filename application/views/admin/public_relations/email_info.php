<?php
$numtel = $_POST['num'];
if($numtel!=0 && $numtel<=5)
{
    for($i = 1 ; $i <= $numtel ; $i++){
        echo'<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                 <div class="col-xs-3">
                    <h4 class="r-h4">البريد الألكتروني رقم '.$i.':</h4>
                 </div>   
                 
                 <div class="col-xs-6">
                    <input type="text" name="email'.$i.'" class="r-inner-h4" required="required" placeholder="يجب أدخال البريد الألكتروني" />
                 </div>
             </div>';
    }     
 }
 else
    echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
            <div class="alert alert-danger" >أقصى عدد 5</div>
          </div>';
?>
