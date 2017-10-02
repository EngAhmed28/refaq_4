
<?php foreach($one_vouch as $row):?>

 <?php echo form_open_multipart('admin/Finance_accounting/deposit_sheek/'.$row->vouch_num.'/'.$row->type,array('class'=>"form-horizontal",'role'=>"form" ))?>


<div class="row">
                             
 <div class="col-md-3">
              <h4>رقم السند:</h4>
         </div>

 <div class="col-md-3">
            <h5><?php echo $row->vouch_num?></h5>
        </div>

                             
 <div class="col-md-3">
              <h4>تاريخ السند:</h4>
         </div>
        <div class="col-md-3">
            <h5><?php echo date("Y-m-d",$row->receipt_date)?></h5>
        </div>
   </div>


</div>
<div class="row">

 <div class="col-md-3">
              <h4>رقم الشيك:</h4>
         </div>
        <div class="col-md-3">
            <h5><?php echo $row->sheek_num?></h5>
        </div>
<div class="col-md-3">
              <h4>تاريخ الاستحقاق:</h4>
         </div>
        <div class="col-md-3">
            <h5><?php echo date("Y-m-d",$row->date_received)?></h5>
        </div>

</div>


<div class="row">

 <div class="col-md-3">
              <h4>إسم البنك:</h4>
         </div>
        <div class="col-md-3">
            <h5><?php echo $account_group[$row->maden]->name?></h5>
        </div>


</div>

  <?php endforeach;?>
<div class="row">

    <div class="col-md-3">
        <label for="inputUser" class=" control-label">الحساب الوسيط  </label>
    </div>
    <div class="col-md-9">
        <select name="from_id" id="from_id" class="selectpicker " data-live-search="true" style="width:100%;"
         onchange="get_code($('#from_id').val())">
            <option data-tokens="ketchup mustard"  value="nothing" style="text-align: right" >قم باختيار الحساب </option>
            <?php foreach($all_accounts  as $record=>$value):?>
                <option data-tokens="ketchup mustard" 
                 value="<?php echo $all_accounts[$record]->code?>" style="text-align: right"   >
                    <?php echo $all_accounts[$record]->name ?></option>
            <?php endforeach;?>
        </select>

    
    </div>




   </div>
<div class="row">

<button type="submit" class="btn btn-default">حفظ</button>

   </div>








   <?php echo form_close()?> 


<link href="<?php echo base_url()?>asisst/js/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>asisst/assets_admin/css/bootstrap-rtl.min.css" rel="stylesheet">

<script type="text/javascript" language="javascript" 
src="<?php echo base_url()?>asisst/js/bootstrap-select.min.js"></script>



<script type="text/javascript">
    $('.selectpicker').selectpicker({
      });
    </script>
