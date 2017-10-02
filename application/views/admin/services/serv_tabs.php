<div class="col-xs-12 r-inner-details">
    <div class="col-xs-12">
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> فئة الخدمة  </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4 " value="<? echo $main_service_name; ?>">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> عدد الخدمات  </h4>
                </div>
                <?
                if(empty($count)){
                    $number=0;

                }else{
                    $number =sizeof($count);
                }
?>
                <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4 " value=" <? echo $number ;?> ">
                </div>
            </div>
        </div>

        <? if (!empty($service_name)):?>
        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
            <div class="col-xs-12 r-center-text-2">
                <div class="col-xs-6">
                    <h4 class="r-h4"> نوع الخدمة العامة  </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4 " value="<? echo $service_name; ?>">
                </div>
            </div>
        </div>
        <? endif;?>
    </div>
</div>