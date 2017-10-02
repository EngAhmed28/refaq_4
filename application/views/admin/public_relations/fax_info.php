<?php
$numtel = $_POST['num'];
if($numtel!=0 && $numtel<=5)
{
    for($i = 1 ; $i <= $numtel ; $i++){
        echo'<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                 <div class="col-xs-3">
                    <h4 class="r-h4">رقم الفاكس '.$i.':</h4>
                 </div>   
                 
                 <div class="col-xs-6">
                    <input type="text" name="fax'.$i.'" onkeypress="return isNumberKey(event)" class="r-inner-h4" required="required" placeholder="يجب أدخال رقم الفاكس" />
                 </div>
             </div>';
    }     
 }
 else
    echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
            <div class="alert alert-danger" >أقصى عدد 5</div>
          </div>';
?>
