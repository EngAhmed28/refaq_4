<?php
$numtel = $_POST['num'];
if($numtel>5){
    echo '<div class="alert alert-danger" >
              أقصى عدد 5
              </div>';

}
elseif($numtel<=10)
{
    for($i=1;$i<=$numtel;$i++){
        echo'  <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">عنوان الخبر <label>الصورة '.$i.'</label></h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                  <input type="file" name="img'.$i.'" class="form-control" style=""  required="required" title=""/>
                                </div>
                            </div>';
    }
}
?>
