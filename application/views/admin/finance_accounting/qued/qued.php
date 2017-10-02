<br />

          <div class="col-sm-11 col-xs-12">
               
                <!--  -->
                	<?php $this->load->view('admin/finance_accounting/qued_tabs'); ?>




<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<div class="well bs-component" >
<?php echo form_open_multipart('admin/finance_accounting/sanad/',array('class'=>"form-horizontal",'role'=>"form" ,"method"=>"post"))?>



<div class="row">  

 <div class="col-md-2">
 <div class="form-group">
 <label class="control-label">رقم القيد</label>
<input type="number" id="qued_num"  name="qued_num" value="<?php echo $qied_num?>"   class="form-control text-right" placeholder="رقم القيد" readonly="readonly"/>
 </div>
 </div>



<div class="col-xs-2 r-input ">

<div class="docs-datepicker"> 
    <div class="input-group">
    <label class="control-label">رقم القيد</label>
        <input type="text" class="form-control docs-date" id="qued_date" name="qued_date" placeholder="شهر / يوم / سنة " />
    </div>
</div>
</div>


<!--
 <div class="col-md-2">
 <div class="form-group">
 <label class="control-label">تاريخ القيد</label>
  <input type="date" id="qued_date"  name="qued_date" class="form-control text-right" placeholder="تاريخ القيد" />
 </div>
 </div>
-->

 <div class="col-md-2">
 <div class="form-group">
 <label class="control-label">عدد حسابات المدين</label>
<input type="number" id="madeen_num"  name="madeen_num"    class="form-control text-right" placeholder="عدد  حسابات المدين" />
 </div>
 </div>

 <div class="col-md-2">
 <div class="form-group">
 <label class="control-label">عدد  حسابات الدائن</label>
<input type="number" id="dayen_num"  name="dayen_num"    class="form-control text-right" placeholder="عدد  حسابات الدائن" />
 </div>
 </div>
 <div class="col-md-3">
 <div class="form-group">
 <label class="control-label">البيان</label>
   <input type="text" id="qued_byan"  name="qued_byan" class="form-control text-right" placeholder="البيان"/>
 </div>
 </div>
 
  <div class="col-md-1">
 <div class="form-group">
 <label class="control-label">إضافة</label>
   <input type="submit"  onclick="return go($('#dayen_num').val(),$('#madeen_num').val());" name="add" value="إضافة "  class="btn btn-sm btn-primary" />
 </div>
 </div>
 
 
</div>

</div>



         
           
<br />
<div class="row" id="option3"></div>
  <?php echo form_close()?> 
</div><!--- main div --->




 
<script>
  function go(dayen_num,madeen_num)
    {
        if(dayen_num && madeen_num )
        {
   
       var  qued_date =$("#qued_date").val();
       var  qued_num =$("#qued_num").val();
       var  qued_byan=$("#qued_byan").val();
     var dataString = 'dayen_num=' + dayen_num + '&madeen_num='+madeen_num +"&qued_date="+qued_date+"&qued_num="+qued_num +"&qued_byan="+qued_byan ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/admin/finance_accounting/qued',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#option3').html(html);
                }
            });
            return false;

        }
        else
        {
            $('#option3').html('');
            return false;
        }
    }
</script>

    








