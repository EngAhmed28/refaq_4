<?php
if(isset($_POST['main'])){
    echo '<option value="">--قم بإختيار العنوان--</option>';
    $array = array("نبذة عن",'الفكرة','الهدف','المبررات'); 
    for($x = 0 ; $x < sizeof($array) ; $x++){
        if(isset($titles) && $titles != null)
            if(in_array($array[$x],$titles))
                continue;
        echo '<option value="'.$array[$x].'">'.$array[$x].'</option>';
    }
}

if(isset($_POST['num'])){
    if($_POST['type'] == 0)
        $title = 'صورة';
    else
        $title = 'فيديو';
    for($s = 0 ; $s < $_POST['num'] && $_POST['num'] < 5 ; $s++)
        echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-3">
                       <h4 class="r-h4">'.$title.' رقم '.($s+1).':</h4>
                  </div>
                  <div class="col-xs-9">
                       <input type="file" name="img'.$s.'" />
                  </div>
              </div>
              <input type="hidden" name="val" value="'.$_POST['num'].'" />
              <input type="hidden" name="type" value="'.$_POST['type'].'" />';
}

die;
?>