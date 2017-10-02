<?php
$val = $_POST['band_num'];
if($val>10){
    echo '<div class="alert alert-danger" >
              أقصى عدد 10
              </div>';

}
elseif($val<=10)
{
    for($i=1;$i<=$val;$i++){
        $num =$num_item;
        echo '<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">رقم البند '.$i.' </h4>
                </div>
                <div class="col-xs-6 r-input">
                   <input type="text" name="item_num'.$i.'" class="form-control" readonly   value="'.($num+$i).'" />
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
				<div class="col-xs-12">
							<div class="col-xs-4">
								<h4 class="r-h4">  البند '.$i.'  </h4>
							</div>
							<div class="col-xs-8 r-input">
								<textarea class="r-textarea" name="item_title'.$i.'" id="item_title" ></textarea>
						</div>
				</div>
        </div>';
         if(isset($_POST['val'])):
        echo'<div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
				<div class="col-xs-12">
							<div class="col-xs-4">
								<h4 class="r-h4">  القرار عليه '.$i.'  </h4>
							</div>
							<div class="col-xs-8 r-input">
								<textarea class="r-textarea" name="decision_title'.$i.'" id="decision_title" ></textarea>
						</div>
				</div>
        </div><br><br><br><br><br><br><br><br>';
       endif;
  }

}


?>
