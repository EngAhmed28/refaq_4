<div class="r-program">
<div class="container">
<div class="col-sm-11 col-xs-12">
<?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
<div class="details-resorce">
<div class="col-xs-12 r-inner-details">

<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4 ">الفترة من </h4>
    </div>
    <div class="col-xs-6 r-input ">
        <div class="docs-datepicker">
            <div class="input-group">
                <input type="text" name="debt_date_from"  id="debt_date_from" class="form-control docs-date" required="required"   placeholder="شهر / يوم / سنة ">
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12" >
    <div class="col-xs-6">
        <h4 class="r-h4"> الحالة </h4>
    </div>
    <div class="col-xs-6 r-input">
        <select name="type" id="type" required="required">
         <option value="">إختر</option>
            <option value="3">الكل</option>
             <option value="1">الموافق</option>
              <option value="2">المرفوض</option>
               <option value="0">لم يتم الاجراء</option>
        </select>
    </div>
</div>


</div>

<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4 "> الفترة الى </h4>
    </div>
    <div class="col-xs-6 r-input ">
        <div class="docs-datepicker">
            <div class="input-group">
                <input type="text" name="debt_date_to" id="debt_date_to"  class="form-control docs-date" required="required"   placeholder="شهر / يوم / سنة ">
            </div>
        </div>
    </div>
</div>
</div>

<div class="col-xs-12 r-inner-btn">
        <div class="col-xs-3"> </div>
        <div class="col-xs-3">
        <button type="button"  name="report" onclick="return lood();"></button>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>
</div>


 <div class="col-xs-12 r-inner-details" id="optionearea2"></div>

</div>
</div>
</div>

<script>
    function lood(){
        var date_t=$("#debt_date_to").val();
        var date_f=$("#debt_date_from").val();
        var type=$("#type").val();
      //    alert(1);
        if(date_f !='' && type != '' && date_t!='')
        {
        //    alert(2);
            var dataString = 'debt_date_to=' + date_t +"&debt_date_from="+date_f+"&type="+type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/EmployeesDebtsReport',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea2").html(html);
                }
            });
            return false;
        }
    }
</script>