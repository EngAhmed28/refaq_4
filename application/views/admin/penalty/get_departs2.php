
<?php
$main = $_POST['valuu'];
if(!empty($get_data2[$main])):
        $sub = $depart_name[$get_data2[$main][0]->department][0]->name;;
?>

    <select id="suh_depart" name=suh_depart">
        <option value="">إختر</option>
        <?php if(!empty($subb[$get_data2[$main][0]->administration])):
            foreach ($subb[$get_data2[$main][0]->administration] as $record):
                $dis ='';

                if($get_data2[$main][0]->department ==$record->id){
                    $dis ='selected';
                    echo '<script>
document.getElementById("suh_depart").disabled = true;
</script>';

                }
                ?>
                <option value="<? echo $record->id?>" <?echo $dis;?>><? echo $record->name;?></option>
    <?  endforeach; endif;?>
    </select>

<?php
    endif;

 ?>




