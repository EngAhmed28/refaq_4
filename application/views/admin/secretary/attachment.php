<?php echo form_open_multipart('dashboard/secretary_export',array('class'=>"form-horizontal",'role'=>"form" ))?>
<?php

$numtel = $_POST['num'];

if($numtel!=0 && $numtel<=5)
 {
    for($i = 1 ; $i <= $numtel ; $i++){
        echo'
                            
                                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-sm-5">
                                        <h4 class="r-h4"> اسم المرفق '.$i.'</h4>
                                    </div>
                                    <div class="col-sm-7 r-input">
                                        <input type="text" class="r-inner-h4 " name="title'.$i.'" >
                                    </div>
                                </div>
                            </div>
                                    <br>  
                                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-sm-5">
                                        <h4 class="r-h4"> ارفاق المرفق '.$i.'</h4>
                                    </div>
                                    <div class="col-sm-7 r-input">
                                        <input type="file" class="r-inner-h4 " name="img'.$i.'" />
                                    </div>
                                </div>
                            </div><br/><br/><br/>
             ';
    }     
 }
 else
    echo '<div class="alert alert-danger" >
              أقصى عدد 5
              </div>';

?>

<?php echo form_close()?>