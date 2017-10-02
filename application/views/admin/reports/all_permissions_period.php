<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-2">
                                <h4 class="r-h4">منذ فترة :</h4>
                            </div>
                            <div class="col-xs-2 r-input">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control docs-date" name="date_from"  id="date_from" placeholder="شهر/يوم/سنة " required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <h4 class="r-h4">إلي فترة  :</h4>
                            </div>
                            <div class="col-xs-2 r-input">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control docs-date" name="date_to"  id="date_to" placeholder="شهر/يوم/سنة " required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <h4 class="r-h4">نوع الإذن :</h4>
                            </div>
                            <div class="col-xs-2 r-input">
                                <select name="type" id="type" required>
                                    <option value="">إختر  </option>
                                    <option value="2">إستثنائي </option>
                                    <option value="1"> عادي </option>
                                    <option value="3"> الكل </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3 r-inner-btn" style="padding-top: 20px;">
                            <input type="submit" role="button" name="add" value=" بحث " onclick="return lood();" class="btn pull-right" />
                        </div>
                            
                    </div>
                </div>
                <div id="optionearea1"></div>
            </div>
        </div>
    </div>
</div>
<script>
    function lood(){
    var num1=   $('#date_from').val();
    var num2=   $('#date_to').val();
   var type=   $('#type').val();
  if( num1 != '' && num2 != '' && type != ''){
      var dataString = 'form_date=' + num1 + '&to_date=' + num2 + '&type=' + type;
      $.ajax({
          type:'post',
          url: '<?php echo base_url() ?>Administrative_affairs/all_permissions_period',
          data:dataString,
          dataType: 'html',
          cache:false,
          success: function(html){
              $("#optionearea1").html(html);
          }
      });
      return false;
  }
    }
</script>
