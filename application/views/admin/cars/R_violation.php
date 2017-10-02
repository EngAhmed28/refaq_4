<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['violatin'] = 'active'; 
            $this->load->view('admin/cars/main_tabs3',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-2">
                            <h4 class="r-h4 ">التاريخ من :</h4>
                        </div>
                        <div class="col-xs-2 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control docs-date" name="date" placeholder="شهر/يوم/سنة" name="date_from" id="date_from" onchange="return loadd($('#date_from').val(),$('#date_to').val(),$('#car_id_fk').val());">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-2">
                            <h4 class="r-h4 ">التاريخ إلى :</h4>
                        </div>
                        <div class="col-xs-2 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control docs-date" name="date" placeholder="شهر/يوم/سنة" name="date_to" id="date_to" onchange="return loadd($('#date_from').val(),$('#date_to').val(),$('#car_id_fk').val());">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-2">
                            <h4 class="r-h4 ">رقم السيارة :</h4>
                        </div>
                        <div class="col-xs-2 r-input ">
                            <select name="car_id_fk" id="car_id_fk" class="no-padding form-control" onchange="return loadd($('#date_from').val(),$('#date_to').val(),$('#car_id_fk').val());" >
                                    <option value="">--قم بإختيار السيارة--</option>
                                        <?php 
                                        if(isset($cars) && $cars != null)
                                            foreach($cars as $record){
                                                echo '<option value="'.$record->id.'">'.$record->car_code.'</option>';
                                            }
                                        ?>
                                </select>
                        </div>
                    </div>
                    
                <div class="col-xs-12 r-inner-details" id="optionearea1"></div>
                
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function loadd(date_from,date_to,car){
    if(date_from && date_to && car)
    {
        startDate = date_from;
        endDate = date_to;
        if (startDate > endDate){
            alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية ');
            $("#date_from").val('');
            $("#date_to").val('');
            $("#car_id_fk").val('');
            $("#optionearea1").html('');
            return false;
        }
        else{ 
            var dataString = 'date_from=' + date_from + '&date_to=' + date_to + '&car=' + car;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/R_violation',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                } 
            });
        }
        return false; 
    }     
}
</script>