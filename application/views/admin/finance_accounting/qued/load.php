<?php echo form_open_multipart('admin/finance_accounting/qued/',array('class'=>"form-horizontal",'role'=>"form" ,"method"=>"post"))?>

<script>
 document.getElementById("qued_date").readOnly = true;
 document.getElementById("qued_byan").readOnly = true;
</script>


<div class="col-md-10">

<table  class="table table-bordered "  >
   <thead>
  <tr>
      <th style="text-align: right;">مسلسل</th>
      <th style="text-align: right;"><center>دائن </center></th>
      <th style="text-align: right;"><center> مدين </center></th> 
      <th style="text-align: right;">إسم الحساب</th>
  </tr>
   </thead>
   <tbody>
 <?php $count=1 ;for($x=1;$x<=$madeen_num;$x++){ ?>
    
    <tr>
       <td><?php echo $count++ ?></td>
       <td style="text-align: center;">  <center> --- </center>   </td>
       <td><input type="number" value="0" id="madeen_value<?php echo $x; ?>" name="madeen_value<?php echo $x; ?>" class="form-control clmadeen" /></td>
       <td> 
          
           <select name="madeen_acoount_name<?php echo $x; ?>" id="madeen_acoount_name<?php echo $x; ?>" class="selectpicker form-control " data-live-search="true" style="width:100%;">
            <option data-tokens="ketchup mustard"  value="nothing" style="text-align: right" >قم باختيار الحساب </option>
            <?php foreach($all_accounts  as $record=>$value):?>
                <option data-tokens="ketchup mustard"  value="<?php echo $all_accounts[$record]->code?>" style="text-align: right"   >
                    <?php echo $all_accounts[$record]->name ?></option>
            <?php endforeach;?>
       
       </td>
    </tr>
    
 <?php }?>  
 
 <?php for($y=1;$y<=$dayen_num;$y++){ ?>
  <tr>
        <td><?php echo $count++ ?></td>
        <td><input type="number" value="0" id="dayen_value<?php echo $y; ?>" name="dayen_value<?php echo $y; ?>" class="form-control cldayen" /></td>
        <td style="text-align: center;"> <center> --- </center>  </td>
        <td> 
           <select name="dayen_acoount_name<?php echo $y; ?>" id="dayen_acoount_name<?php echo $y; ?>" class="selectpicker form-control " data-live-search="true" style="width:100%;" >
            <option data-tokens="ketchup mustard"  value="nothing" style="text-align: right" >قم باختيار الحساب </option>
            <?php foreach($all_accounts  as $record=>$value):?>
                <option data-tokens="ketchup mustard"  value="<?php echo $all_accounts[$record]->code?>" style="text-align: right"   >
                    <?php echo $all_accounts[$record]->name ?></option>
            <?php endforeach;?>
        </td>
  </tr>
   <?php }?> 
  <tr>
  <td> الإجمالى  </td>
  <td> <input type="number"  value="0" id="total_dayen" class="form-control cldayen"  readonly="readonly" /> </td>
  <td> <input type="number"  value="0" id="total_madeen"   class="form-control clmadeen"  readonly="readonly" /></td>
  <td></td>
  </tr>
   
                      
                   </tbody>
                   </table>
            
            </div>
            
<div class="row">
 <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
                   <input type="hidden" name="total_madeen_num" value="<?php echo $post['madeen_num'] ?>" />
                   <input type="hidden" name="total_dayen_num" value="<?php echo $post['dayen_num'] ?>" />
                   <input type="hidden" name="qued_num" value="<?php echo $post['qued_num'] ?>" />
                   <input type="hidden" name="qued_date" value="<?php echo $post['qued_date'] ?>" />
                   <input type="hidden" name="qued_byan" value="<?php echo $post['qued_byan'] ?>" />
                   
                    <input type="submit"  onclick="return checkas();" name="add_vouch" value="حفظ "  class="btn btn-primary" />
                </div>
            </div>

</div>       
        <?php echo form_close()?>              
           
    <?php
	echo '<script>
 $(".cldayen").keyup(function () {
  kar='.$dayen_num.';
  totalSum = 0;
          for (i = 1; i <= kar; i++) { 
    end=($("#dayen_value"+i).val());
  totalSum +=  parseFloat(end);
  }           
   $("#total_dayen").val(totalSum);
     });                   
</script>

<script>
function checkas(){
   var dayeen= $("#total_dayen").val();
   var madeen= $("#total_madeen").val();
   var sub= parseFloat(dayeen) - parseFloat(madeen) ;
if( sub != 0  ){
    alert("خطأ فى الارقام الحسابية");
}    
    
    
}
</script>

<script>
 $(".clmadeen").keyup(function () {
  kar='.$madeen_num.';
  totalSum = 0;
          for (i = 1; i <= kar; i++) { 
    end=($("#madeen_value"+i).val());
  totalSum +=  parseFloat(end);
  }           
   $("#total_madeen").val(totalSum);
     });                   
</script>


';
?>               



<link href="<?php echo base_url()?>asisst/js/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo base_url()?>asisst/assets_admin/css/bootstrap-rtl.min.css" rel="stylesheet">
<script type="text/javascript" language="javascript" src="<?php echo base_url()?>asisst/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
    $('.selectpicker').selectpicker({
      });
</script>
                   
                   
                   
                   
                   
                   
                   