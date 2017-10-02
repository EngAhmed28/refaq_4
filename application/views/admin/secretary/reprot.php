
<div class="col-sm-11 col-xs-12">
     <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-desktop" aria-hidden="true"></i></span> إدارة السكرتارية  </h4>
                    </div>
                    <div class="col-sm-3">
                             <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                    </div>
                </div>
                <div class="col-xs-12 r-bottom">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li><a href="<?php echo base_url()?>admin/Secretary/secretary_part"> أضافة الجهات والمعاملات  </a></li>
                            <li><a href="<?php echo base_url()?>admin/Secretary/secretary_export"> أضافة الصادر </a></li>
                            <li><a href="<?php echo base_url()?>admin/Secretary/secretary_import"> أضافة الوارد </a></li>
                            <li class="active"><a href="<?php echo base_url()?>admin/Secretary/searchreport"> التقرير </a> </li>
                            <li><a href="<?php echo base_url()?>admin/Secretary/search_details">التقرير 2 </a></li>
                       
                        </ul>
                    </div>
                </div>

    <?php echo form_open_multipart('admin/Secretary/reportresult',array('class'=>"",'role'=>"form" ))?>
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> ابدأ من:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control docs-date" id="date_from" name="date_from" placeholder="شهر / يوم / سنة ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الى :  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control docs-date" id="date_to" name="date_to" placeholder="شهر / يوم / سنة ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data r-live">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">  نوع    </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select class="selectpicker" data-show-subtext="true" name="search_type" id="search_type" data-live-search="true">
                                    <option  disabled="disabled"> none </option>
                                    <option  value="3" > الصادر /الوارد </option>
                                    <option  value="1"> الصادر </option>
                                    <option  value="2"> الوارد </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 " style="margin-right: 400px">
                        <input type="submit"  onclick="
            startDate = ($('#date_from').val());
                        endDate = ($('#date_to').val());
                        if (startDate > endDate){
                        alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية');
                        return false;}
                        else{


      return results($('#date_from').val(),$('#date_to').val(),
      $('#search_type').val()

      )}" name="add" value="عرض" class="btn btn-primary"  >
                    </div>

                </div>
            </div>

        </div>

        <?php echo form_close()?>


    </div>

<div id="results" class="col-xs-12"></div>


</div>


<script>
    function results(date_from,date_to,search_type){

        var dataString='date_from='+ date_from + '&date_to=' + date_to   +'&search_type=' + search_type;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/admin/Secretary/searchreport',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $('#results').html(html);
            }
        });
        return false;
    }
</script>
