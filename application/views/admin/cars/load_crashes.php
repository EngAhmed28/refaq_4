<?php
if(isset($_POST['count']) && $_POST['count'] != null){
    for($x = 0 ; $x < $_POST['count'] ; $x++){
        echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
              <h2 class="text-center">العطل رقم '.($x+1).'</h2>  
              </div>
                
              <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-3">
                    <h4 class="r-h4">إسم العطل:</h4>
                  </div>
                                    
                  <div class="col-xs-3 r-input">
                    <input type="text" class="r-inner-h4 " name="crashe_name'.$x.'" id="crashe_name'.$x.'" required>
                  </div>
                  
                  <div class="col-xs-3">
                    <h4 class="r-h4">حالة العطل:</h4>
                  </div>
                                    
                  <div class="col-xs-3 r-input">
                    <select name="crashe_status'.$x.'" id="crashe_status'.$x.'" class="no-padding form-control" required>
                        <option value="">--قم بإختيار حالة العطل--</option>
                        <option value="0">لم يتم التصليح</option>
                        <option value="1">جاري التصليح</option>
                        <option value="2">تم التصليح</option>
                    </select>
                  </div>
              </div>
                    
              <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">            
                  <div class="col-xs-3">
                    <h4 class="r-h4">ملاحظات:</h4>
                  </div>
                                    
                  <div class="col-xs-9">
                    <textarea class="r-textarea" name="notes'.$x.'" id="notes'.$x.'" required></textarea>
                  </div>
              </div>';
    }
}
?>