
<?php
$main = $_POST['valu'];


if(!empty($get_data2[$main])):

    $mainn = $depart_name[$get_data2[$main][0]->administration][0]->name;

        $sub = $depart_name[$get_data2[$main][0]->department][0]->name;;
?>
    <select name="main_depart" id="main_depart" >
        <option value="">إختر</option>
        <?php   foreach($main_departs as $record):
            $dis ='';

            if($get_data2[$main][0]->administration ==$record->id){
                $dis ='selected';
                echo '<script>
document.getElementById("main_depart").disabled = true;
</script>';

           }
            ?>
            <option value="<? echo $record->id;?>" <?echo $dis;?>><? echo $record->name;?></option>
    <?php endforeach;?>
    </select>
<!--    <input type="text" id="main_depart" name="main_depart" value="--><?php //echo$mainn;?><!--">-->
<?php
    endif;

 ?>




