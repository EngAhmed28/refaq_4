<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('Administrative_affairs/R_period_attendance')?>
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">التاريخ من:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input ">
				                <div class="docs-datepicker">
								    <div class="input-group">
								        <input type="text" class="form-control docs-date" onchange="return loadd($('#date_from').val(),$('#date_to').val(),$('#emp_id').val());" id="date_from" name="date_from" placeholder="شهر / يوم / سنة " required>
								    </div>
								</div>
				            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">التاريخ إلى:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input ">
				                <div class="docs-datepicker">
								    <div class="input-group">
								        <input type="text" class="form-control docs-date" onchange="return loadd($('#date_from').val(),$('#date_to').val(),$('#emp_id').val());" id="date_to" name="date_to" placeholder="شهر / يوم / سنة " required>
								    </div>
								</div>
				            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">إسم الموظف</h4>
                            </div>
                            
                            <div class="col-xs-6 r-input">
                                <select name="emp_id" id="emp_id" onchange="return loadd($('#date_from').val(),$('#date_to').val(),$('#emp_id').val());" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                                    <option value="">--قم بإختيار موظف--</option>
                                        <?php 
                                        if(isset($emps) && $emps != null)
                                            for($x = 0 ; $x < count($emps) ; $x++)
                                                echo '<option value="'.$emps[$x]->id.'">'.$emps[$x]->employee.'</option>';
                                        ?>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <?php echo form_close()?>
                </div>
                
                <div id="optionearea1" class="col-xs-12 r-inner-details"></div>
                
            </div>
        </div>
    </div>
</div>

<script>
 function loadd(date_from,date_to,emp){
    
    if(date_from && date_to && emp != '')
    {
        startDate = date_from;
        endDate = date_to;
        if (startDate > endDate){
            alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية');
            return false;}
        else{ 
            var dataString = 'date_from=' + date_from + '&date_to=' + date_to + '&emp_id=' + emp ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Administrative_affairs/R_period_attendance',
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
        else{
            $("#optionearea1").html('');
        }
       
 }
</script>