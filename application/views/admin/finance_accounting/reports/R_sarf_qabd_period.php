

 
  <div class="col-sm-11 col-xs-12">

	<?php $this->load->view('admin/finance_accounting/reports_tabs'); ?>


    <?php echo form_open_multipart('admin/finance_accounting/add_receipt_report',array('class'=>"form-horizontal",'role'=>"form", 'id' => 'myform' ))?>

     


<div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="inputUser" class="control-label">تاريخ من </label>
                <input type="date" id="date_from"  name="date_from"    class="form-control text-right" placeholder=" تاريخ من" />
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="inputUser" class="control-label">تاريخ إلي </label>
                <input type="date" id="date_to"  name="date_to"    class="form-control text-right" placeholder=" تاريخ الي" />
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="inputUser" class="control-label">نوع السند</label>
                <select name="sanad_type" id="sanad_type" class="form-control">
                    <option value="1">إختر نوع السند</option>
                    <option value="1">سند صرف</option>
                    <option value="2">سند قبض</option>
                </select>
                </div>
                </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="inputUser" class="control-label">البحث</label>


          
            <input type="hidden"  class="btn btn-success" name="action" value="add_receipt_report" />
            <input type="submit"  onclick="
            startDate = ($('#date_from').val());
                        endDate = ($('#date_to').val());
                        if (startDate > endDate){
                        alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية');
                        return false;}
                        else{


      return results($('#date_from').val(),$('#date_to').val(),
      $('#sanad_type').val()

      )};" name="add" value="عرض" class="btn btn-primary"  >




            </div>
            </div>


</div>

  

    <?php echo form_close()?>
    <div id="results"></div>
</div>

<!---------------------------------------------------------------------->
<!---------------------------------------------------------------------->
<script>
    function results(date_from,date_to,sanad_type){

        var dataString='date_from='+ date_from + '&date_to=' + date_to   +'&sanad_type=' + sanad_type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/admin/finance_accounting/add_receipt_report',
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
