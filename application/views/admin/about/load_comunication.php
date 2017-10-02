
<?php  //echo form_open_multipart('admin/About_association/news',array('class'=>"form-horizontal",'role'=>"form"));?>
<?php
$numtel = $this->input->post('tel_num');
if($numtel!=0 && $numtel<=5)
 {
    for($i = 1 ; $i <= $numtel ; $i++){
?>

<div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-sm-2"></div>
    <div class="col-sm-3">
        <h4 class="r-h4"> رقم الهاتف <?php echo $i?></h4>
    </div>
    <div class="col-sm-5 r-input">
         <input type="number" name="tel<?php echo $i?>" class="r-inner-h4" value="" required="" />
    </div>
<div class="col-sm-2"></div>
</div>

<?php }?>
       
<?php }else{?>
<?php	}?>
<!------------------------------------------------------------------------------------------------------>
<?php
$email_num = $this->input->post('email_num');
if($email_num!=0 && $email_num<=5)
 {
    for($i = 1 ; $i <= $email_num ; $i++){
?>

<div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-sm-2"></div>
    <div class="col-sm-4">
        <h4 class="r-h4"> البريد الإلكتروني <?php echo $i?></h4>
    </div>
    <div class="col-sm-5 r-input">
         <input type="email" name="email<?php echo $i?>" class="r-inner-h4" value="" required="" />
    </div>
<div class="col-sm-1"></div>
</div>

<?php }?>
       
<?php }else{?>
<?php	}?>

<?php // echo form_close()?>  