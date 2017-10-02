<?php
	$numtel = $this->input->post('photo_num');

if($numtel!=0 && $numtel<=5)
 {
    for($i = 1 ; $i <= $numtel ; $i++){
?>

<div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-sm-1"></div>
    <div class="col-sm-2">
        <h4 class="r-h4"> صورة <?php echo $i?></h4>
    </div>
    <div class="col-sm-5 ">
        <input type="file" class="" name="img<?php echo $i?>" />
    </div>
<div class="col-sm-4"></div>
</div>

<?php }?>
       
<?php }else{?>
<?php	}?>  